<?php
//Файл: verification.php
//Призначення: Активація аккаунтів користувачів

defined('_INCLUDE_') or die('Shit happens!');

if(isset($_GET["verify_code"])) {
	$verify_code = $_GET["verify_code"];
}

$page_content_inc = "verification";     //Вказуємо який шаблон підключити

if(isset($verify_code)) {
	$check_verification_code = mysqli_query($db_key, "SELECT id, user_id, used FROM `verification` WHERE verification_code='$verify_code'");
	$check_verification_code_array = mysqli_fetch_array($check_verification_code);     //Перевіряємо чи існує такий код
	if($check_verification_code_array["used"] == 0) {     //Якщо код вже використали - нічого не робимо
		$user_id = $check_verification_code_array["user_id"];     //ID аккаунту який буде активовано

		//Оновлюємо дані аккаунту

		$account_update_query = mysqli_query($db_key, "UPDATE `users` SET user_group='1', max_courses_count='1', verified='1', l_score='15'");
		$verification_code_update_query = mysqli_query($db_key, "UPDATE `verification` SET used='1' WHERE verification_code='$verify_code'");
	}
}
?>