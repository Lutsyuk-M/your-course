<?php
//Файл: log_out.php
//Призначення: вихід із аккаунту на сайті

session_start();

include_once("system/site_data.php");

if(!empty($_SESSION["user_id"])) {
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_group"]);
	unset($_SESSION["user_password"]);
	unset($_SESSION["user_email"]);
	unset($_SESSION["user_nickname"]);

	session_destroy();
}

header("Location: ".$site_address);
?>