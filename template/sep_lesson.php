<?php
defined('_INCLUDE_') or die('Shit happens!');

if(!$lesson_data_array) {
    echo("За цим посиланням не знайдено уроку.");
}
else {
    printf("
        <a href='%s/courses.php?course_id=%s'>Назад</a>
        <p>%s</p>
        %s", $site_address, $lesson_data_array["mcourse_id"], $lesson_data_array["title"], $lesson_data_array["content"]);
}
?>