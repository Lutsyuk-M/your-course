<?php
defined('_INCLUDE_') or die('Shit happens!');

$show_course_create_form = true;

if(isset($_SESSION["user_id"])) {
    if(isset($_POST["course_create_submit"])) {
        if(!empty($_POST["course_title"]) and !empty($_POST["course_description"])) {
            if($user_data_check_array["banned"] != 1) {
                if($user_data_check_array["courses_count"] >= $user_data_check_array["max_courses_count"]) {
                    echo("Ви перевищили ліміт на максимальну кількість курсів!");
                }
            }
            else {
                echo("Ваш аккаунт заблокований!");
            }
        }
        else {
            echo("Ви не заповнили усі поля!");
        }
    }
}
else {
    $show_course_create_form = false;
    echo("Для перегляду данного розділу, будь-ласка авторизуйтесь.");
}

if($show_course_create_form) {
    include_once("course_create_form.php");
}
?>