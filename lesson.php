<?php
//Файл: lesson.php
//Призначення: Вивід окремих уроків з курсів

defined('_INCLUDE_') or die('Shit happens!');

if(isset($_GET["lesson_id"])) {
	$lesson_id = $_GET["lesson_id"];
}

if(!isset($lesson_id)) {
	$lessons_data = mysql_query("SELECT id,title,cdate FROM lessons WHERE mcourse_id='$course_id'");

	if(!$lessons_data) {
		echo("Поки що уроки відсутні");
	}
	else {
		while($lessons_data_array = mysql_fetch_array($lessons_data)) {
			printf("
				<a href='%s/courses.php?course_id=%s&lesson_id=%s'>%s</a> %s</br>", $site_address, $course_id, $lessons_data_array["id"], $lessons_data_array["title"], $lessons_data_array["cdate"]);
		}
	}


}
else {
	$lesson_data = mysql_query("SELECT * FROM lessons WHERE id='$lesson_id'");
	$lesson_data_array = mysql_fetch_array($lesson_data);

	if(!$lesson_data_array) {
		echo("За цим посиланням не знайдено уроку.");
	}
	else {
		printf("
			<p>%s</p>
			%s", $lesson_data_array["title"], $lesson_data_array["content"]);
	}
}

?>