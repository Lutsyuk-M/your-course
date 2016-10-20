<?php
//Файл: news.php
//Призначення: друк новин з бази у циклі

include("../../system/data/site_data.php");     //Основні дані
include("../../system/functions/db/db_connect.php");     //

if(isset($_GET["page"])) {
	$page = $_GET["page"];
}


?>