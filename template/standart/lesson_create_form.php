<?php
defined('_INCLUDE_') or die('Shit happens!');
?>

<form action='<?php echo($site_address); ?>/courses.php?action=lesson_create' method='post'>
	<input type='text' name='lesson_mcourse_id' placeholder='ID курсу' 
	<?php if(isset($new_lesson_mcourse_id)) echo("value='".$new_lesson_mcourse_id."'"); ?> /><br />
	<input type='text' name='lesson_title' placeholder='Назва уроку' /><br />
	<input type='text' name='lesson_content' placeholder='Текст' /><br />
	<input type='submit' name='lesson_create_submit' value='Відправити' />
</form>