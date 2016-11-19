<?php
define( '_INCLUDE_', 1 );

session_start();

include("system/functions/db/db_connect.php");     //Підключення бази данних


if(isset($_GET["action"])) {
	$action = $_GET["action"];
}
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
	<div id='page_additions'>
		<?php
		include("inc/header.php");         //'Шапка' сайту
		include("inc/glidemenu.php");     //'Гамбургер' меню
		?>
	</div>
	<div id='page_content'>
		<?php
		switch($action) {
			case "authorization":
				include_once("inc/auth.php");
				break;
			case "registration":
				echo("Registration");
				break;
			case "logout":
				include_once("inc/logout.php");
				break;
			default:
				echo("<span class='center'>Default</span>");
				break;
		}
		?>
	</div>
</body>
</html>