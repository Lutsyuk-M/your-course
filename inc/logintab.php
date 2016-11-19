<?php
//Файл: logintab.php
//Призначення: Відображення кнопки входу та модального вікна з формою для входу.

defined('_INCLUDE_') or die('Shit happens!');

?>
<div id='lmenu_input'>
	<div class='right'><button id='login_button' onClick='$("#loginwindow").overlay().load();'>Увійти</button></div>
	<div class='overlay' id='loginwindow'>
		<h2 class='center'>Вхід</h2>
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
				<div id='reg_href'><a href='?action=registration'>Зареєструватися</a></div>
			</form>
		</p>
	</div>
</div>