<?php
defined('_INCLUDE_') or die('Shit happens!');

if(isset($_SESSION["user_id"])) {
	if(!isset($user_id)) {
		goto user_profile_view;
	}
	else {
		if($user_data_array) {
			if($user_data_array["banned"] == 1) {
				echo("Користувач ".$user_data_array["nickname"]." заблокований за порушення правил сервісу.");
			}
			else {
				user_profile_view:

				if($user_data_array["banned"] == 1 and $user_data_array["id"] == $_SESSION["user_id"]) {
					echo ("Ваш аккаунт заблоковано!");
				}

				echo("E-Mail: ".$user_data_array["email"]."</br>");

				if(!empty($user_data_array["lastname"]) and !empty($user_data_array["firstname"])) {
					echo("Ім'я: ".$user_data_array["lastname"]." ".$user_data_array["firstname"].".</br>");
				}
			}
		}
		else {
			echo("За цим посиланням не знайдено користувача.");
		}
	}
}
else {
	echo("Для перегляду данного розділу, будь-ласка авторизуйтесь.");
}
?>