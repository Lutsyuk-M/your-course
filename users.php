<?php
//Файл: users.php
//Призначення: Вивід інформації про користувачів

define( '_INCLUDE_', 1 );

session_start();

include("system/site_data.php");               //Загальні данні про сайт
include("system/functions/db_connect.php");     //База данних

$page_content_inc = "view_user";     //Вказуємо шо саме виводиться на сторінці

if(isset($_GET["user_id"])) {
	$user_id = intval($_GET["user_id"]);
}

if(!isset($user_id)) {     //Чи є дані про те, кого треба "пробити"
	if(isset($_SESSION["user_id"])) {
		$user_id = $_SESSION["user_id"];
		goto user_profile;     //Перехід на частину коду, яка друкує дані користувача (до мітки(|GOTO|)
	}
}
else {
		user_profile:     //Сюди переходить команда goto            |GOTO|

		$user_data = mysql_query("SELECT id,nickname,firstname,lastname,email,rdate,warn,banned,l_score FROM users WHERE id='$user_id'");
		$user_data_array = mysql_fetch_array($user_data);
}

include_once("template/main.php");     //Головний файл шаблону
?>