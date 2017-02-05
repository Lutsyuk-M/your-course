<?php
//Файл: AP index.php
//Призначення: Головна сторінка панелі адміністрації

define( '_INCLUDE_', 1 );

session_start();

include_once("../system/site_data.php");
include_once("../functions/db_connect.php");

if(isset($_GET["page"])) {
	$page = $_GET["page"];
}

if(isset($_SESSION["user_id"])) {
	if($_SESSION["user_id"] >= $adminpanel_min_usergroup) {
		switch($page) {
			case "users":
				
			break;

			default:
				$Apage_content_inc = "all";
			break;
		}
	}
	
}

include_once("template/main.php");
?>