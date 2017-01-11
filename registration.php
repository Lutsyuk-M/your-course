<?php
//Файл: registration.php
//Призначення: Реєстрація користувачів на сайті

define( '_INCLUDE_', 1 );

session_start();

include_once("system/site_data.php");
include_once("system/functions/db_connect.php");
include_once("system/functions/global_func.php");

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}

if(isset($_GET["verify_code"])) {
	$verify_code = $_GET["verify_code"];
}

switch($action) {     //Акстивація аккаунту
	case "verification":
		$page_content_inc = "verification";     //Вказуємо який шаблон підключити

		if(isset($verify_code)) {
			$check_verification_code = mysql_query("SELECT id, user_id, used FROM verification WHERE verification_code='$verify_code'");
			$check_verification_code_array = mysql_fetch_array($check_verification_code);     //Перевіряємо чи існує такий код
			if($check_verification_code_array["used"] == 0) {     //Якщо код вже використали - нічого не робимо
				$user_id = $check_verification_code_array["user_id"];     //ID аккаунту який буде активовано

				//Оновлюємо дані аккаунту

				$account_update_query = mysql_query("UPDATE users SET user_group='1', max_courses_count='1', verified='1', l_score='15'");
				$verification_code_update_query = mysql_query("UPDATE verification SET used='1' WHERE verification_code='$verify_code'");
			}
		}
	break;

	default:
		$page_content_inc = "registration";     //Шаблон

		if(!isset($_SESSION["email"])) {     //Перевіряємо чи не увійшов вже користувач
			if(isset($_POST["registration_submit"])) {     //Перевіряємо, чи відправлені дані для реєстрації...
				if(!empty($_POST["email"]) and !empty($_POST["nickname"]) and !empty($_POST["password"]) and !empty($_POST["password_repeat"])) {     //...і чи вони не пусті
					$user_email = trim(htmlspecialchars($_POST["email"]));     //Обробляємо дані
					$user_nickname = trim(htmlspecialchars($_POST["nickname"]));
					$user_password = trim(htmlspecialchars($_POST["password"]));
					$user_password_repeat = trim(htmlspecialchars($_POST["password_repeat"]));

					$email_check_preg_match = false;     //Перевірка на відповідність данних регулярним виразам
					$nickname_check_preg_match = false;
					$password_check_preg_match = false;

					if(preg_match('/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i', $user_email) and strlen($user_email) <= 50) {
						$email_check_preg_match = true;

						if(preg_match("/[A-Za-z_]{4,50}$/", $user_nickname)) {
							$nickname_check_preg_match = true;

							if(preg_match("/[A-Za-z0-9_]{5,50}$/", $user_password)) {
								$password_check_preg_match = true;
								
								$user_email = mysql_real_escape_string($user_email);     //Підготовлюємо дані для вставки в базу
								$user_nickname = mysql_real_escape_string($user_nickname);
								$user_password = mysql_real_escape_string($user_password);
								$user_password_repeat = mysql_real_escape_string($user_password_repeat);

								//Перевірка на унікальність ніку та E-Mail'у

								$user_nickname_check = mysql_query("SELECT id FROM users WHERE LOWER(nickname) LIKE '%".$user_nickname."%'");
								$user_nickname_check_array = mysql_fetch_array($user_nickname_check);
								$user_email_check = mysql_query("SELECT id FROM users WHERE LOWER(email) LIKE '%".strtolower($user_email)."%'");
								$user_email_check_array = mysql_fetch_array($user_email_check);

								if($user_nickname_check_array == false and $user_email_check_array == false) {
									if($user_password == $user_password_repeat) {     //Перевіряємо, чи паролі співпадають
										$verification_code = gen_string(32);     //Генеруємо випадковий код активації
										$password_hash = md5(md5($user_password));     //Хешуємо пароль
										$date = date("Y-m-d H:m:s");     //Поточна дата

										//Вставка даних в базу

										$user_create_query = mysql_query("INSERT INTO users SET nickname='$user_nickname', password='$password_hash', email='$user_email', rdate='$date'");
										$user_data = mysql_query("SELECT id FROM users WHERE nickname='$user_nickname'");
										$user_data_array = mysql_fetch_array($user_data);
										$user_id = $user_data_array["id"];
										$verification_create_query = mysql_query("INSERT INTO verification SET user_id='$user_id', verification_code='$verification_code'");
									}
								}
							}
						}
					}
				}
			}
		}
	break;
}

include_once("template/main.php");
?>