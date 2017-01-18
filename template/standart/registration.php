<?php

defined('_INCLUDE_') or die('Shit happens!');


if(isset($_SESSION["user_id"])) {
	echo("Ви вже увійшли у аккаунт!");
}
else {
	$show_regform = true;

	if(isset($_POST["registration_submit"])) {
		if(empty($_POST["email"]) or empty($_POST["nickname"]) or empty($_POST["password"]) or empty($_POST["password_repeat"])) {
			echo("Ви не заповнили усі поля!");
		}
		else {
			if(count($preg_match_errors) == 0) {
				if($user_nickname_check_array != false and $user_email_check_array != false) {
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
						$show_regform = false;

						printf("
							<p>
								Реєстрація пройшла успішно, але ваш акаунт не активовано.</br>
								Ми відправили лист з кодом підтвердження на %s. Він буде дійсний напротязі 1 доби.</br>
								Очікуйте лист напротязі 10 - 15 хвилин. Також перевірте папку \"Спам\".</br>
							</p>
						", $email);
					}
				}
			}
			else {
				foreach ($preg_match_errors as $error) {
					printf("
						<p>
							%s
						</p>
						", $error);
				}
				unset($error);
			}
		}
	}
}

if($show_regform) {
	include_once("regform.php");
}
?>