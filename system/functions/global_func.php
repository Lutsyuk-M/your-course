<?php
//Файл: global_func.php
//Призначення: Головні функції сайту

function gen_string($string_lenght) {
	$symbols = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
	$string = "";
	for($i = 0; $i < $string_lenght; $i++) {
		$symbol = rand(0, count($symbols) - 1);
		$string .= $symbols[$symbol];
	}
	return $string;
}

function get_current_url() {
	$current_url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
	$current_url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
	$current_url .= $_SERVER["REQUEST_URI"];

	return $current_url;
} 
?>