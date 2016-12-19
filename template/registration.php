<?php
defined('_INCLUDE_') or die('Shit happens!');

if(isset($_SESSION["email"])) {
	echo("Ви вже увійшли у аккаунт!");
}
else {
	$show_regform = true;

	if(isset($_POST["registration_submit"])) {
		if(empty($_POST["email"]) or empty($_POST["nickname"]) or empty($_POST["password"]) or empty($_POST["password_repeat"])) {
			echo("Ви не заповнили усі поля!");
		}
		else {
			if($user_nickname_check and $user_email_check) {
				echo("Ця електронна пошта та нік вже зареєстровані!");
			}
			elseif($user_nickname_check_array) {
				echo("Цей нік вже використовується!");
			}
			elseif($user_email_check_array) {
				echo("Ця електронна адреса вже використовується!");
			}
			else {
				if($password != $password_repeat) {
					echo("Паролі не співпадають!");
				}
				else {
					printf("
						<p>
						Реєстрація пройшла успішно, але ваш акаунт не активовано.</br>
						Ми відправили лист з кодом підтвердження на %s. Він буде дійсний напротязі 1 доби.</br>
						Очікуйте лист напротязі 1 години. Також перевірте папку \"Спам\".</br>
						</p>
					");
				}
			}
		}
	}
}

if($show_regform) {
	include_once("regform.php");
}
?>