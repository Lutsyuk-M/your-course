<?php
//Файл: log_in.php
//Призначення: Вивід форми для входу, та авторизація користувачів на сайті

defined('_INCLUDE_') or die('Shit happens!');

session_start();

if(!isset($_POST["auth_aubmit"])) {     //Якщо немає данних для входу, виводимо форму авторизації
	include_once("inc/loginform.php");
}
else {
	$show_loginform = true;

	if(!isset($_POST["email"]) or empty($_POST["email"]) or !isset($_POST["password"]) or empty($_POST["password"])) {
		echo("Ви не ввели E-Mail та/або пароль");
		echo("Login_Form");
	}
	else {
		$user_password = trim($_POST["password"]);
		$user_email = trim(strtolower($_POST["email"]));

		$user_data = mysql_query("SELECT id FROM users WHERE email='$user_email'");

		if(!$user_data) {
			echo("Неправильний логін, перевірте його та введіть ще раз.");
		}
		else {
			$user_data_array = mysql_fetch_array($user_data);

			if(md5(md5($user_password)) == $user_data_array["password"]) {
				$_SESSION["user_id"] = $user_data_array["user_id"];
				$_SESSION["user_password"] = $user_data_array["user_password"];

				echo("Ви увійшли у свій аккаунт.");

				$show_loginform = false;
			}
			else {
				echo("Неправильний пароль, перевірте його та введіть ще раз.");
			}
		}
	}
}
if($show_loginform) {
	include_once("inc/loginform.php");
}
?>