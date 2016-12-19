<?php
defined('_INCLUDE_') or die('Shit happens!');

if($course_data == false) {
        echo("<p>За данним запитом не існує курсів!</p>");
}
else {
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
?>