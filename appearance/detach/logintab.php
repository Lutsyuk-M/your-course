<?php
//Файл: logintab.php
//Призначення: Відображення кнопки входу та модального вікна з формою для входу.

defined('_INCLUDE_') or die('Shit happens!');

?>
<div id='h_content'>
	<div id='login_button_align'><button type='button' class='l_button' id='login_button' onClick='$("#alert").overlay().load();'>Увійти</button></div>
	<div class='overlay' id='alert'>
		<h2><center>Вхід</center></h2>
		<p>
			<form action='testreg.php' method='post'>
				<p><input type='text' name='login' value='' placeholder='E-mail'></p>
				<p><input type='password' name='password' value='' placeholder='Пароль'></p>
				<p class='remember_me'>
				<label>
						<input type='checkbox' name='remember_me' id='remember_me'>
						Запам'ятати мене
					</label>
				</p>
				<p class='submit'><input type='submit' name='commit' value='Увійти'></p>
				<div id='reg_href'><a href='reg.php'>Зареєструватися</a></div>
			</form>
		</p>
	</div> 
</div>