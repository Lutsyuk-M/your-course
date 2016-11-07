<?php
//Файл: header.php
//Призначення: Відображення верхньої частини сайту(кнопка входу, логотип)

defined('_INCLUDE_') or die('Shit happens!');

if(!isset($_SESSION["user_nickname"])) {
	include("logintab.php");     //Вставка кнопки входу
}
else {
	echo("<span class='right'>Привіт, ".$_SESSION["user_nickname"].".<a href='?logout=1'>Вихід</a></span>");   //Нік та кнопка "Вийти"
}
?>