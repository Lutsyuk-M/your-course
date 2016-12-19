<?php
defined('_INCLUDE_') or die('Shit happens!');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel='icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<link rel='shortcut icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>
	<title>YourCourses</title>
	<?php include('inc/scripts.php'); ?>
	<link href='appearance/css/main-style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id='page_additions'>
		<?php
		include_once("inc/glidemenu.php");
		include_once("inc/header.php");
		?>
	</div>
	<div id='page_content'>
		<?php
		include_once("template/".$page_content_inc.".php");
		?>
	</div>
</body>
</html>