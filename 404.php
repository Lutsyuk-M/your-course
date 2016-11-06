<?php
//Файл: 404.php
//Призанчення: файл на який перенаправляється у вмпадку помилки 404

define( '_INCLUDE_', 1 );

include("/system/data/site_data.php")
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Ой, 404!</title>
		<link href='appearance/css/main-style.css' rel='stylesheet' type='text/css'>
		<link rel='shortcut icon' href='appearance/images/favicon.png' type='image/x-icon'>
		<?php include('appearance/detach/scripts.php'); ?>
	</head>
	<body>
		<?php
			include("appearance/detach/header.php");
			include("appearance/detach/glidemenu.php");
		?>
		<p align='center'>
			<img src='/appearance/images/404_image.png'>
		</p>
		<h1 class='center' id='title_404'>Sorry! Схоже що це помилка 404!</h1>
		<p class='center' id='text_404'>
			Ми подзвонили Холмсу, він вже в дорозі.</br>
			А поки ви можете <a href='<?php echo($site_address);?>'>повернутися на головну сторінку</a>
		</p>
	</body>
</html>