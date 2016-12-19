<?php
//Файл: header.php
//Призначення: Відображення верхньої частини сайту(кнопка входу, логотип)

defined('_INCLUDE_') or die('Shit happens!');

if(!isset($_SESSION["user_nickname"])) {
	echo("<div class='right'><a href='".$site_address."/index.php?action=auth'><button id='login_button'>Увійти</button></a></div>");     //Вставка кнопки входу
}
else {
	echo("<span class='right'>Привіт, <a href='/users.php?user_id=".$_SESSION["user_id"]."'>".$_SESSION["user_nickname"]."</a>. <a href='logout.php'>Вихід</a></span>");   //Нік та кнопка "Вийти"
}
?>