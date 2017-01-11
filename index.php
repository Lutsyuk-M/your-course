<?php
define( '_INCLUDE_', 1 );

session_start();

include_once("system/site_data.php");     //Дані сайту
include_once("system/functions/db_connect.php");     //Підключення бази данних

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}

switch($action) {
	case "auth":     //Вхід на сайт
		include_once("inc/auth.php");
		break;
	case "logout":     //Вихід з сайту
		include_once("inc/logout.php");
		break;
	case "about":     //Про нас
		$page_content_inc = "about";
		include_once("template/main.php");
		break;
	case "error_404":     //Помилка 404
		$page_content_inc = "error_404";
		include_once("template/main.php");
		break;
	default:
		$page_content_inc = "courses";     //Поки-що тут виводяться курси, через те, що я не маю ідей, відносно того що сюди можна запихнути
		include_once("template/main.php");
		break;
}
?>