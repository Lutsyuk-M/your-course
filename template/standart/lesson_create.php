<?php
defined('_INCLUDE_') or die('Shit happens!');

$show_lesson_create_form = true;

if(isset($_SESSION["user_id"])) {
    if(isset($_POST["lesson_create_submit"])) {
        if(!empty($_POST["lesson_mcourse_id"]) and !empty($_POST["lesson_title"]) and !empty($_POST["lesson_content"])) {
            if($course_data_check_array != false) {
                if($course_data_check_array["author_id"] == $_SESSION["user_id"]) {
                    if($course_data_check_array["banned"] == 1) {
                    	echo("Цей курс заблокований!");
                    }
                }
                else {
                	echo("Ви не є автором данного курсу!");
                }
            }
            else {
                echo("Такого курсу не існує!");
            }
        }
        else {
            echo("Ви не заповнили усі поля!");
        }
    }
}
else {
    $show_lesson_create_form = false;

	echo("Для перегляду данного розділу, будь-ласка авторизуйтесь.");
}

if($show_lesson_create_form) {
	include_once("lesson_create_form.php");
}
?>