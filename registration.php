<?php
//Файл: registration.php
//Призначення: Реєстрація користувачів на сайті

define( '_INCLUDE_', 1 );

include_once("system/site_data.php");
include_once("system/functions/db_connect.php");
include_once("system/functions/global_func.php");

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}

if(isset($_GET["verify_code"])) {
	$verify_code = $_GET["verify_code"];
}

switch($action) {
	case "verification":
		$page_content_inc = "verification";

		if(isset($verify_code)) {
			$check_verification_code = mysql_query("SELECT id, user_id, used, valid FROM verification WHERE verification_code='verify_code'");
			$check_verification_code_array = mysql_fetch_array($check_verification_code);
			if($check_verification_code_array["used"] == 0 and $check_verification_code_array["valid"] >= time()) {
				$user_id = $check_verification_code_array["user_id"];

				$account_data = mysql_query("SELECT nickname, l_score FROM users WHERE id='$user_id'");
				$account_data_array = mysql_fetch_array($account_data);
				$user_l_score = $account_data_array["l_score"] + 15;
				$account_update_query = mysql_query("UPDATE users SET verified='1', l_score='$user_l_score'");
			}
		}
		break;

	default:
	$page_content_inc = "registration";

	echo("vvvvvvvvvvvvvvvvvvvvvvvvvv 12 ");
	if(!isset($_SESSION["email"])) {
		echo("13 ");
		if(isset($_POST["registration_submit"])) {
			echo("15 ");
			if(!empty($_POST["email"]) and !empty($_POST["nickname"]) and !empty($_POST["password"]) and !empty($_POST["password_repeat"])) {
				echo("17 ");
				$email = trim(strtolower(htmlspecialchars($_POST["email"])));
				$nickname = trim(strtolower(htmlspecialchars($_POST["nickname"])));
				$password = trim(htmlspecialchars($_POST["password"]));
				$password_repeat = trim(htmlspecialchars($_POST["password_repeat"]));

				$user_nickname_check = mysql_query("SELECT id FROM users WHERE nickname='$nickname'");
				$user_email_check = mysql_query("SELECT id FROM users WHERE email='$email'");
				if(!$user_nickname_check and !$user_email_check) {
					echo("26 ");
					if($password == $password_repeat) {
						echo("28 ");
						$verification_code = gen_string(32);
						$password_hash = md5(md5($password));
						$validation_date = date('Y-m-d H:m:s', strtotime ('+1 day'));

						$user_create_query = mysql_query("INSERT INTO users SET nickname='$nickname', password='$password_hash', email='$email', rdate='$date', ");
						$user_data = mysql_query("SELECT id FROM users WHERE nickname='$nickname'");
						$user_data_array = mysql_fetch_array($user_data);
						$user_id = $user_data_array["id"];
						$verification_create_query = mysql_query("INSERT INTO verification SET user_id='$user_id', verification_code='$verification_code', valid='$validation_date'");
					}
				}
			}
		}
	}
	break;
}
echo("43 ");
include_once("template/main.php");
?>