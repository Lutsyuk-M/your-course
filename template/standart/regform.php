<?php
defined('_INCLUDE_') or die('Shit happens!');
?>

<form method='post' action='registration.php'>
	<input type='text' name='email' placeholder='E-Mail' /><br />
	<input type='text' name='nickname' placeholder='Нікнейм' /><br />
	<input type='password' name='password' placeholder='Пароль' /><br />
	<input type='password' name='password_repeat' placeholder='Повторіть пароль' /><br />
	<!--- <div class='g-recaptcha' data-sitekey='<?php echo($reCAPTCHA_key);?>'></div> ---->
	<input type='submit' name='registration_submit' value='Реєстрація' />
	<p>Натискаючи кнопку "Реєстрація" ви автоматично приймаєте <a href='about.php'>правила поведінки на сервісі</a>.<p>
</form>