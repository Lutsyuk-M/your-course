<?php
defined('_INCLUDE_') or die('Shit happens!');

if ($course_data_array == false) {     //Якщо не знайдено - повідом про це
    echo ("<p>За данним запитом не знайдено курсу!</p>");
}
else {
    if ($course_data_array["banned"] == '1') {     //Данні з заблокованих курсів не виводятся
        echo("<p>Данний курс заблокований за порушення правил сервісу.</p>");
    }
    else {                                                      //Виводим данні з окремого курсу
        printf("
            <p>
                <p>
                    <h2>
                        %s
                    </h2>
                </p>
                <p>
                    %s
                </p>
                Автор курсу: <a href='%s/users.php?user_id=%s'>%s</a>
            </p>
            ", $course_data_array["title"], $course_data_array["description"], $site_address, $course_data_array["author_id"], $course_data_array["author_nick"]);
        if(!$lessons_data) {
            echo("Поки що уроки відсутні");     //Але якщо їх немає, то пишемо повідомлення про це
        }
        else {
            while($lessons_data_array = mysql_fetch_array($lessons_data)) {
                printf("
                    <a href='%s/courses.php?lesson_id=%s'>%s</a> %s</br>", $site_address, $lessons_data_array["id"], $lessons_data_array["title"], $lessons_data_array["cdate"]);
            }
        }
    }
}
?>