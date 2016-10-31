<?php
//Файл: users.php
//Призначення: Вивід інформації про користувачів

include("system/data/site_data.php");               //Загальні данні про сайт
include("system/functions/db/db_connect.php");     //База данних

if(isset($_GET["user_id"])) {
	$user_id = $_GET["user_id"];
}

if(!isset($user_id)) {     //Чи є дані про те, кого треба "пробити"
	if(!isset($_SESSION["user_id"])) {
		echo("Для перегляду данного розділу, будь-ласка <a href='".$site_address."/login.php'>авторизуйтесь</a>.");
	}
	else {     //Якщо користувач авторизований - автоматично виведи дані з його профілю
		$user_id = $_SESSION["user_id"];
		goto user_profile;     //Перехід на частину коду, яка друкує дані користувача (до мітки(|GOTO|)
	}
}
else {
	$user_data = mysql_query("SELECT nickname,banned FROM users WHERE id='$user_id'",$db);     //Заради економії данних, спочатку перевіряється чи користувач заблокований, а лише потім беруться інші дані
	$user_data_array = mysql_fetch_array($user_data);

	if($user_data_array) {
		if($user_data_array["banned"] == 1) {
			echo("Користувач ".$user_data_array["nickname"]." заблокований за порушення правил сервісу.");
		}
		else {
			user_profile:     //Сюди переходить команда goto            |GOTO|

			$user_data = mysql_query("SELECT id,nickname,firstname,lastname,email,rdate,warn,country,l_score FROM users WHERE id='$user_id'");
			$user_data_array = mysql_fetch_array($user_data);

			printf("Дані користувача:</br>
				Ім'я: %s %s</br>
				E-Mail: %s</br>
				", $user_data_array["lastname"], $user_data_array["firstname"], $user_data_array["email"]);
		}
	}
	else {
		echo("За цим посиланням не знайдено користувача.");     //Не знайшов? Розкажи про це
	}
}
?>