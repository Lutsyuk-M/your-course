<?php
//Файл: courses.php
//Призначення: Перегляд, додавання курсів та уроків

define( '_INCLUDE_', 1 );

session_start();

include_once("system/site_data.php");     //Основні данні сайту
include_once("system/functions/db_connect.php");     //Підключення до бази

if(isset($_GET["course_id"])) {
    $course_id = intval($_GET["course_id"]);     //Перевірка чи існують данні які передаються через GET,
                                        //якщо так, то присвоюєм його значення змінній
}
if(isset($_GET["lesson_id"])) {
    $lesson_id = intval($_GET["lesson_id"]);
}
if(isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch($action) {
    default:
        if(isset($lesson_id)) {     //Окремий урок з курсу
            $page_content_inc = "sep_lesson";     //Вказуємо який файл підключати

            $lesson_data = mysqli_query($db_key, "SELECT id,author_id,mcourse_id,title,content,cdate FROM `lessons` WHERE id='$lesson_id'");
            $lesson_data_array = mysqli_fetch_array($lesson_data);
        }
        else {
            if(!isset($course_id)) {     //Усі курси сайту(це тут тимчсово, потім сюди треба додати пошук курсів, чи щось таке)
                $page_content_inc = "courses";

                $course_data = mysqli_query($db_key, "SELECT `id`,`title`,`author_nick`,`author_id` FROM `courses` WHERE banned='0'",$db);
            }
            else {
                $page_content_inc = "sep_course";

                $course_data = mysqli_query($db_key, "SELECT banned FROM `courses` WHERE id='$course_id'");
                $course_data_array = mysqli_fetch_array($course_data);
                if ($course_data_array == true) {
                    if ($course_data_array["banned"] == '0') {                                                     //Виводим данні з окремого курсу
                        $course_data = mysqli_query($db_key, "SELECT id,title,author_id,author_nick,description FROM `courses` WHERE id='$course_id'");
                        $course_data_array = mysqli_fetch_array($course_data) or die(mysqli_error());
                        $lessons_data = mysqli_query($db_key, "SELECT id,title,cdate FROM `lessons` WHERE mcourse_id='$course_id'");     //Цей участок коду бере з бази усі уроки з курсу, і виводіть посилання на їх повну версію
                    }
                }
            }
        }
    break;

    case "course_create":
        $page_content_inc = "course_create";

        if(isset($_SESSION["user_id"])) {     //Навіщо на сайті вхід, якщо він не використовується?
            if(isset($_POST["course_create_submit"])) {
                if(!empty($_POST["course_title"]) and !empty($_POST["course_description"])) {
                    $course_title = htmlspecialchars(mysqli_real_escape_string($_POST["course_title"]));     //Обобляємо дані
                    $course_description = htmlspecialchars(mysqli_real_escape_string($_POST["course_description"]));

                    $user_data_check = mysqli_query($db_key, "SELECT courses_count, max_courses_count, banned FROM `users` WHERE id='".$_SESSION["user_id"]."'");     //Дані користувача - поточна кількість курсів, максимальна, та статус аккаунту
                    $user_data_check_array = mysqli_fetch_array($user_data_check);
                    if($user_data_check_array["courses_count"] < $user_data_check_array["max_courses_count"] and $user_data_check_array["banned"] != 1) {     //Якщо поточна кількість курсів меньша за максимальну - ідемо далі
                        $user_id = $_SESSION["user_id"];
                        $user_nickname = $_SESSION["user_nickname"];     //Дані користувача в окремі змінні

                        $course_create_query = mysqli_query($db_key, "INSERT INTO `courses` SET title='$course_title', author_id='$user_id', user_nick='$user_nickname', description='$course_description'");     //Створюємо курс

                        $created_course_id = mysqli_insert_id();     //ID цього курсу

                        $new_user_courses_count = $user_data_check_array["courses_count"] + 1;     //Нова кількість курсів на аккаунті
                        $account_update_query = mysqli_query($db_key, "UPDATE `users` SET courses='$new_user_courses_count' WHERE id='$user_id'");     //Вставляємо оновлену кількість курсів в базу

                        header("Location: ".$site_address."/courses.php?course_id=".$created_course_id);     //І перенаправляємо на новенький курс
                    }
                }
            }
        }
    break;

    case "lesson_create":     //Створення уроку
        if(isset($_GET["new_lesson_mcourse_id"])) {
            $new_lesson_mcourse_id = $_GET["new_lesson_mcourse_id"];
        }
        $page_content_inc = "lesson_create";

        if(isset($_SESSION["user_id"])) {     //Створювати курси можуть лише авторизовані користувачі
            if(isset($_POST["lesson_create_submit"])) {     //Якщо є POST дані, обробляємо їх
                if(!empty($_POST["lesson_mcourse_id"]) and !empty($_POST["lesson_title"]) and !empty($_POST["lesson_content"])) {
                    $lesson_mcourse_id = $_POST["lesson_mcourse_id"];
                    $lesson_title = htmlspecialchars(mysqli_real_escape_string($_POST["lesson_title"]));
                    $lesson_content = htmlspecialchars(mysqli_real_escape_string($_POST["lesson_content"]));     //Обробка даних

                    $course_data_check = mysqli_query($db_key, "SELECT author_id,banned FROM `courses` WHERE id='$lesson_mcourse_id'");
                    $course_data_check_array = mysqli_fetch_array($course_data_check);     //Дістаємо дані про курс та обробляємо їх

                    if($course_data_check_array != false) {     //Якщо ми нічого не отримали - нічого не робимо
                        if($course_data_check_array["author_id"] == $_SESSION["user_id"]) {     //Додавати уроки можна лише на свої курси
                            if($course_data_check_array["banned"] != 1) {     //На заблоковані курси уроки додавати заборонено
                                $date = date("Y-m-d H:m:s");     //Поточна дата

                                $lesson_create_query = mysqli_query($db_key, "INSERT INTO `lessons` SET author_id='".$_SESSION["user_id"]."', mcourse_id='$lesson_mcourse_id', title='$lesson_title', content='$lesson_content', cdate='$date'");
                                //Додаємо урок...

                                $created_lesson_id = mysqli_insert_id();     //ID щойно доданого уроку

                                header("Location: ".$site_address."/courses.php?lesson_id=".$created_lesson_id);     //Перенаправляємо на створений урок
                            }
                        }
                    }
                }
            }
        }
    break;

}

include_once("template/".$site_template."/main.php");     //Підключаємо шаблон
?>