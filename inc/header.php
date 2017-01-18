<?php
//Файл: header.php
//Призначення: Відображення верхньої частини сайту(кнопка входу, логотип)

defined('_INCLUDE_') or die('Shit happens!');

include_once("system/functions/global_func.php");

if(!isset($_SESSION["user_nickname"])) {
	echo("<div class='right'><a href='".$site_address."/index.php?action=auth'><button id='login_button'>Увійти</button></a></div>");     //Вставка кнопки входу
}
else {
	echo("<span class='right'>Привіт, <a href='".$site_address."/users.php?user_id=".$_SESSION["user_id"]."'>".$_SESSION["user_nickname"]."</a>. <a href='".$site_address."/index.php?action=logout'>Вихід</a></span>");   //Нік та кнопка "Вийти"
}
?>