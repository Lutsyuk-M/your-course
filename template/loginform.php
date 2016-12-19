<?php
defined('_INCLUDE_') or die('Shit happens!');

if(isset($_GET["message"])) {
	$message = $_GET["message"];
}

switch($message) {
	case "wrong_password":
		echo("Чувак! Пароль-то неправильний!");
		break;
	case "wrong_email":
		echo("У нас таких немає!");
		break;
	case "all_fields_req":
		echo("Та ти не усе нам сказав!");
		break;
	default:
		break;
}
?>
<br/>
<form action='<?php echo($site_address); ?>/index.php?action=auth' method='post'>
	<input type='text' name='email' value='' placeholder='E-mail'><br />
	<input type='password' name='password' value='' placeholder='Пароль'><br />
	<input type='submit' name='auth_submit' value='Увійти'><br />
</form>