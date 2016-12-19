<?php
//Файл: courses.php
//Призначення: Вивід та перегляд курсів

define( '_INCLUDE_', 1 );

session_start();

include_once("system/site_data.php");     //Основні данні сайту
include_once("system/functions/db_connect.php");     //Підключення до бази

if(isset($_GET["course_id"])) {
    $course_id = $_GET["course_id"];     //Перевірка чи існують данні які передаються через GET,
                                        //якщо так, то присвоюєм його значення змінній
}
if(isset($_GET["lesson_id"])) {
    $lesson_id = $_GET["lesson_id"];
}

if(isset($lesson_id)) {     //Окремий урок з курсу
    $page_content_inc = "sep_lesson";     //Вказуємо який файл підключати

    $lesson_data = mysql_query("SELECT id,author_id,mcourse_id,title,content,cdate FROM lessons WHERE id='$lesson_id'");
    $lesson_data_array = mysql_fetch_array($lesson_data);
}
else {
    if(!isset($course_id)) {     //Усі курси сайту(це тут тимчсово, потім сюди треба додати пошук курсів, чи щось таке)
        $page_content_inc = "courses";

        $course_data = mysql_query("SELECT id,title,author_nick,author_id,s_theme FROM courses WHERE banned='0'",$db);
    }
else {
        $page_content_inc = "sep_course";

        $course_data = mysql_query("SELECT banned FROM courses WHERE id='$course_id'");
        $course_data_array = mysql_fetch_array($course_data);
        if ($course_data_array == true) {
            if ($course_data_array["banned"] == '0') {                                                     //Виводим данні з окремого курсу
                $course_data = mysql_query("SELECT id,title,author_id,author_nick,verified,description,f_theme,s_theme FROM courses WHERE id='$course_id'");
                $course_data_array = mysql_fetch_array($course_data) or die(mysql_error());
                $lessons_data = mysql_query("SELECT id,title,cdate FROM lessons WHERE mcourse_id='$course_id'");     //Цей участок коду бере з бази усі уроки з курсу, і виводіть посилання на їх повну версію
            }
        }
    }
}

include_once("template/main.php");
?>