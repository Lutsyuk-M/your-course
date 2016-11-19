<?php
//Файл: log_out.php
//Призначення: вихід з аккаунту на сайті

session_start();

include_once("system/data/site_data.php");

if(!empty($_SESSION["user_id"]) and !empty($_SESSION["user_password"])) {
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_password"]);

	echo("Ви вийшли зі свого аккаунту!");
}
?>