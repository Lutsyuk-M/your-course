<?php
defined('_INCLUDE_') or die('Shit happens!');

if(isset($_SESSION["user_id"])) {
    echo("<span class='right'><a href='".$site_address."/courses.php?action=create_course'>Створити курс</a></span>");
}

if($course_data == false) {
        echo("<p>За данним запитом не існує курсів!</p>");
}
else {
    while($course_data_array = mysql_fetch_array($course_data))     //Вивід списку курсів у циклі
    {
            printf("
                <p>
                    <a href='%s/courses.php?course_id=%s'><p>%s</p></a>
                    <p>Автор курсу: <a href='%s/users.php?user_id=%s'>%s</a></p>
                    </br>
                </p>
                ", $site_address, $course_data_array["id"], $course_data_array["title"], $site_address, $course_data_array["author_id"], $course_data_array["author_nick"]);
    }
}
?>