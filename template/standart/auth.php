<?php

defined('_INCLUDE_') or die('Shit happens!');

if(!isset($_SESSION["user_id"])) {
	if(isset($_POST["auth_submit"])) {
		if(!empty($_POST["email"]) and !empty($_POST["password"])) {
			if($user_data_array) {
				if($user_password_hash == $user_data_array["password"]) {
					if ($user_data_array["verified"] != 1) {
						echo("Ваш аккаунт не активований. Ви не можете увійти.");
					}
				}
				else {
					echo("Неправильний пароль!");
				}
			}
			else {
				echo("Неправильний E-Mail!");
			}
		}
		else {
			echo("Ви не заповнили усі поля!");
		}
	}
}

include_once("loginform.php");
?>