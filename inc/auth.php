<?php
//Файл: log_in.php
//Призначення: Авторизація користувачів на сайті

defined('_INCLUDE_') or die('Shit happens!');

$page_content_inc = "auth";

if(!isset($_SESSION["user_id"])) {
	if(isset($_POST["auth_submit"])) {     //Вхід відбувається лише при наявності данних для log-in'а

			if(!empty($_POST["email"]) and !empty($_POST["password"])) {     //Якщо поля пошти чи пароля пусті - посилаємо користувача назад
				$user_password = htmlspecialchars(trim($_POST["password"]));
				$user_email = strtolower(htmlspecialchars(trim($_POST["email"])));     //Обробляємо пошту і пароль

				$user_data = mysql_query("SELECT id, nickname, password, user_group, verified FROM users WHERE email='$user_email'");     //Беремо з бази дані по потрібному E-Mail'у
				$user_data_array = mysql_fetch_array($user_data);
				
				if($user_data) {
					$user_password_hash = md5(md5($user_password));     //Хешуємо пароль
					if($user_password_hash == $user_data_array["password"]) {     //Якщо хеш паролю з бази співпадає з хешем з бази - вхід відбувся
						if ($user_data_array["verified"] == 1) {
							$_SESSION["user_id"] = $user_data_array["id"];
							$_SESSION["user_group"] = $user_data_array["user_group"];
							$_SESSION["user_nickname"] = $user_data_array["nickname"];
							$_SESSION["user_email"] = $user_data_array["user_email"];
							$_SESSION["user_password"] = $user_data_array["password"];     //Створюємо сессійні змінні і присвоюємо їм значення

							header("Location: ".$site_address);     //Або на головну
						}
					}
				}
			}
		}
	}
else {
	header("Location: ".$site_address);      //Якщо користувач вже увійшов у свій аккаунт - перенаправляємо його на головну сторінку
}

include_once("template/".$site_template."/main.php");     //Підключення головного файлу шаблону
?>