<?php
//Файл: registration.php
//Призначення: Реєстрація користувачів на сайті

defined('_INCLUDE_') or die('Shit happens!');

$page_content_inc = "registration";     //Шаблон

if(!isset($_SESSION["email"])) {     //Перевіряємо чи не увійшов вже користувач
	if(isset($_POST["registration_submit"])) {     //Перевіряємо, чи відправлені дані для реєстрації...
		if(!empty($_POST["email"]) and !empty($_POST["nickname"]) and !empty($_POST["password"]) and !empty($_POST["password_repeat"])) {     //...і чи вони не пусті

			//Перевірка на відповідність данних регулярним виразам

			$user_email = trim($_POST["email"]);     //Обробляємо дані
			$user_nickname = trim($_POST["nickname"]);
			$user_password = trim($_POST["password"]);
			$user_password_repeat = trim($_POST["password_repeat"]);

			$preg_match_errors = array();

			if(!preg_match("/^([A-Za-z0-9_\.-]+)@([A-Za-z0-9_\.-]+)\.([A-Za-z\.]{2,6})/", $user_email) and !strlen($user_email) <= 50) {
				$preg_match_errors[] = "Неправильний E-Mail!";
			}

			if(!preg_match("/[A-Za-z_]{4,50}$/", $user_nickname)) {
				$preg_match_errors[] = "Неправильний нік!";
			}

			if(!preg_match("/[A-Za-z0-9_]{5,50}$/", $user_password)) {
				$preg_match_errors[] = "Неправильний пароль!";
			}

			if(count($preg_match_errors) == 0) {

				//Перевірка на унікальність ніку та E-Mail'у

				$user_nickname_check = mysqli_query($db_key, "SELECT id FROM `users` WHERE LOWER(nickname) LIKE '%".$user_nickname."%'");
				$user_nickname_check_array = mysqli_fetch_array($user_nickname_check);
				$user_email_check = mysqli_query($db_key, "SELECT id FROM `users` WHERE LOWER(email) LIKE '%".strtolower($user_email)."%'");
				$user_email_check_array = mysqli_fetch_array($user_email_check);

				if($user_nickname_check_array == false and $user_email_check_array == false) {
					if($user_password == $user_password_repeat) {     //Перевіряємо, чи паролі співпадають
						$verification_code = gen_string(32);     //Генеруємо випадковий код активації
						$salt = mt_rand(1, 9999);     //Сіль для хешування паролю
						$password_hash = md5($local_salt.md5($user_password).$salt);     //Хешуємо пароль
						$date = date("Y-m-d H:m:s");     //Поточна дата

						//Вставка даних в базу

						$user_create_query = mysqli_query($db_key, "INSERT INTO `users` SET nickname='$user_nickname', password='$password_hash', email='$user_email', rdate='$date'");
						$user_data = mysqli_query($db_key, "SELECT id FROM `users` WHERE nickname='$user_nickname'");
						$user_data_array = mysqli_fetch_array($user_data);
						$user_id = $user_data_array["id"];
						$verification_create_query = mysqli_query($db_key, "INSERT INTO `verification` SET user_id='$user_id', verification_code='$verification_code'");
					}
				}
			}
		}
	}
}

include_once("template/".$site_template."/main.php");
?>