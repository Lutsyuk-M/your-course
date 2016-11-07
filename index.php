<?php 
define( '_INCLUDE_', 1 );

include("system/functions/db/db_connect.php");     //Підключення бази данних
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
	<link rel='icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<link rel='shortcut icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<meta http-equiv='Content-Type' content='text/html'; charset=utf-8' />
	<title>YourCourses</title>
	<?php include('inc/scripts.php'); ?>
	<link href='appearance/css/main-style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php
	include("inc/header.php");         //'Шапка' сайту
	include("inc/glidemenu.php");     //'Гамбургер' меню

	
	?>
</body>
</html>