<?php
//Файл: loginform.php
//Призначення: Вивід форми для входу

defined('_INCLUDE_') or die('Shit happens!');
?>
<br/>
<form action='<?php echo($site_address); ?>/index.php?action=auth<?php echo("&from=".$from); ?>' method='post'>
	<input type='text' name='email' value='' placeholder='E-mail'><br />
	<input type='password' name='password' value='' placeholder='Пароль'><br />
	<input type='submit' name='auth_submit' value='Увійти'><br />
</form>