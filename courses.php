<?php
//Файл: courses.php
//Призначення: Вивід та перегляд курсів

define( '_INCLUDE_', 1 );

include("system/data/site_data.php");     //Основні данні сайту
include("system/functions/db/db_connect.php");     //Підключення до бази

if(isset($_GET["course_id"])) {
    $course_id = $_GET["course_id"];     //Перевірка чи існують данні які передаються через GET,
                                        //якщо так, то присвоюєм його значення змінній
}
if(isset($_GET["lesson_id"])) {
    $lesson_id = $_GET["lesson_id"];
}

if(isset($lesson_id)) {
    $lesson_data = mysql_query("SELECT * FROM lessons WHERE id='$lesson_id'");     //Берем дані з окремого уроку...
    $lesson_data_array = mysql_fetch_array($lesson_data);

    if(!$lesson_data_array) {
        echo("За цим посиланням не знайдено уроку.");     //...перевіряємо чи ми щось отримали...
    }
    else {
        printf("
            <p>%s</p>
            %s", $lesson_data_array["title"], $lesson_data_array["content"]);     //...і виводимо
    }
}
else {
    if(!isset($course_id)) {
        $course_data = mysql_query("SELECT id,title,author_nick,author_id,s_theme FROM courses WHERE banned='0'",$db);
        if($course_data == false) {
                echo("<p>За данним запитом не існує курсів!</p>");
        }
        else
        {
            while($course_data_array = mysql_fetch_array($course_data))     //Вивід списку курсів у циклі
            {
                    printf("
                            <table>
                            <tr>
                                <td>
                                    <a href='courses.php?course_id=%s'><p>%s</p></a>
                                    <p>Автор курсу: <a href='%s/users.php?user_id=%s'>%s</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td>%s</td>
                            </tr>
                            </table><br><br> ", $course_data_array["id"], $course_data_array["title"], $site_address, $course_data_array["author_id"], $course_data_array["author_nick"], $course_data_array["s_theme"]);
            }
        }
    }
    else {
        $course_data = mysql_query("SELECT banned FROM courses WHERE id='$course_id'");
        $course_data_array = mysql_fetch_array($course_data);

        if ($course_data_array == false) {     //Якщо не знайдено - повідом про це
            echo ("<p>За данним запитом не знайдено курсу!</p>");
        }
        else {
            if ($course_data_array["banned"] == '1') {     //Данні з заблокованих курсів не виводятся
                echo("<p>Данний курс заблокований за порушення правил сервісу.</p>");
            }
            else {                                                      //Виводим данні з окремого курсу
                $course_data = mysql_query("SELECT id,title,author_id,author_nick,verified,description,f_theme,s_theme FROM courses WHERE id='$course_id'");
                $course_data_array = mysql_fetch_array($course_data) or die(mysql_error());

                printf("
                    <p><p>%s</p>
                    Автор курсу: <a href='%s/users.php?user_id=%s'>%s</a></p>", $course_data_array["title"], $site_address, $course_data_array["author_id"], $course_data_array["author_nick"]);

                if(!isset($lesson_id)) {
                    $lessons_data = mysql_query("SELECT id,title,cdate FROM lessons WHERE mcourse_id='$course_id'");     //Цей участок коду бере з бази усі уроки з курсу, і виводіть посилання на їх повну версію

                    if(!$lessons_data) {
                        echo("Поки що уроки відсутні");     //Але якщо їх немає, то пишемо повідомлення про це
                    }
                    else {
                        while($lessons_data_array = mysql_fetch_array($lessons_data)) {
                            printf("
                                <a href='%s/courses.php?course_id=%s&lesson_id=%s'>%s</a> %s</br>", $site_address, $course_id, $lessons_data_array["id"], $lessons_data_array["title"], $lessons_data_array["cdate"]);
                        }
                    }
                }
            }
        }
    }
}