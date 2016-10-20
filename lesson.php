<?php
//Файл: lesson.php
//Призначення: Вивід окремих уроків з курсів

include("system/data/site_data.php");     //Основні дані
include("system/functions/db/db_connect.php");     //База

if(isset($_GET["lesson_id"])) {
	$lesson_id = $_GET["lesson_id"];
}
?>