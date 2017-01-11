<form action='<?php echo($site_address); ?>/courses.php?action=course_create' method='post'>
	<input type='text' name='course_title' placeholder='Назва курсу' /><br />
	<input type='text' name='course_description' placeholder='Опис' /><br />
	<input type='submit' name='course_create_submit' value='Додати' />
</form>