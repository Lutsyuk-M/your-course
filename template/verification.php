<?php
defined('_INCLUDE_') or die('Shit happens!');

if(isset($verify_code)) {
	if($check_verification_code_array["used"] == 0) {
		echo("Ваш аккаунт активовано! Тепер ви можете увійти на сайт.");
	}
	else {
		echo ("Цей код, на жаль, недійсний. Якщо Ви впевнені що це помилка, будь ласка, <a href='".$site_address."/help.php?action=new_verify_code'>зверніться в службу підтримки</a>.");
	}
}
else {
	echo("Ви не вказали код активації!");
}

?>