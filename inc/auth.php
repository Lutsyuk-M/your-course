<?php
//Файл: log_in.php
//Призначення: Авторизація користувачів на сайті

defined('_INCLUDE_') or die('Shit happens!');

session_start();

include_once("system/site_data.php");     //Дані сайту
include_once("system/functions/db_connect.php");     //І підключення до БД

if(!isset($_SESSION["email"])) {     //Вхід відбувається лише при наявності данних для log-in'а
	if(!isset($_POST["auth_submit"])) {     //Якщо дані не відправлені - виводимо форму входу
		$page_content_inc = "loginform";
	}
	else {     //Інакше починаємо перевірки даних і вхід
		if(!empty($_POST["email"]) and !empty($_POST["password"])) {     //Якщо поля пошти чи пароля пусті - посилаємо користувача назад
			$user_password = htmlspecialchars(trim($_POST["password"]));
			$user_email = strtolower(htmlspecialchars(trim($_POST["email"])));     //Обробляємо пошту і пароль

			$user_data = mysql_query("SELECT id,nickname,password FROM users WHERE email='$user_email'");     //Беремо з бази дані по потрібному E-Mail'у
			
			if($user_data) {
				$user_data_array = mysql_fetch_array($user_data);

				$user_password_hash = md5(md5($user_password));     //Хешуємо пароль
				if($user_password_hash == $user_data_array["password"]) {     //Якщо хеш паролю з бази співпадає з хешем з бази - вхід відбувся
					$_SESSION["user_id"] = $user_data_array["id"];
					$_SESSION["user_nickname"] = $user_data_array["nickname"];
					$_SESSION["user_password"] = $user_data_array["password"];     //Створюємо сессійні змінні і присвоюємо їм значення

					header("Location: ".$site_address);     //І перенаправляємо на головну
				}
				else {
					$message = "wrong_password";     //Правильна пошта, але неправильний пароль
				}
			}
			else {
				$message = "wrong_email";     //Такого E-Mail'а немає   
			}
		}
		else {
			$message = "all_fields_req";     //Не усі поля заповнені
		}
	}
}
else {
	header("Location: ".$site_address);      //Якщо користувач вже увійшов у свій аккаунт - перенаправляємо його на головну сторінку
}

if(isset($message)) {
	header("Location: ".$site_address."/index.php?action=auth&message=".$message);     //Перенаправлення на сторінку де виводиться форма входу і повідомлення про помилку
}

include_once("template/main.php");     //Підключення головного файлу шаблону
?>