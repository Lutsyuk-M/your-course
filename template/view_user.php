<?php
defined('_INCLUDE_') or die('Shit happens!');

if(!isset($user_id)) {
	if(!isset($_SESSION["user_id"])) {
		echo("Для перегляду данного розділу, будь-ласка <a href='".$site_address."/auth.php'>авторизуйтесь</a>.");
	}
}
else {
	if($user_data_array) {
		if($user_data_array["banned"] == 1) {
			echo("Користувач ".$user_data_array["nickname"]." заблокований за порушення правил сервісу.");
		}
		else {
			printf("Дані користувача:</br>
			Ім'я: %s %s</br>
			E-Mail: %s</br>
			", $user_data_array["lastname"], $user_data_array["firstname"], $user_data_array["email"]);
		}
	}
	else {
		echo("За цим посиланням не знайдено користувача.");
	}
}
?>