<?php
define( '_INCLUDE_', 1 );
 
include("system/functions/db/db_connect.php");     //Підключення бази данних
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="icon" href="appearance/images/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="appearance/images/favicon.png" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
	<title>Про нас</title>
	<?php include("appearance/detach/scripts.php"); ?>
	<link href="appearance/css/main-style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include("appearance/detach/header.php");
	include("appearance/detach/glidemenu.php");
	
	
	?>
	<table align='center'>
		<tr>
			<td>
				<img id='leftimg' src='/appearance/images/about/lutsyuk.jpg' width='150' height='150' align='left' 
  vspace='5' hspace='5'>
			</td>
			<td>
				<p><strong>Луцик</strong></p>
				Главний чувачелло який замутив всю цю хігню.</br>
				Любить вівсяне печиво з молоком.</br>
				Голька каже шо він розумний, але дурний.</br>
				Він з цим аабсолютно згоден.</br>
			</td>
		</tr>
		<tr>
			<td>
				<img src='/appearance/images/about/borys.jpg' width='150' height='150' align='left' 
  vspace='5' hspace='5'>
			</td>
			<td>
					<p><strong>Борис</strong></p>
					Короче, кіт Шредінгера.</br>
					(Ні, не в тому сенсі, малі живодери).</br>
					Але в той час, він кіт Луцика.</br>
					Сидить на руках і підказує(підмуркує) шо робити.</br>
			</td>
		</tr>
	</table>
</body>
</html>