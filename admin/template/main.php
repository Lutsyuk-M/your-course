<?php
defined('_INCLUDE_') or die('Shit happens!');

include_once("system/functions/global_func.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel='icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<link rel='shortcut icon' href='appearance/images/favicon.png' type='image/x-icon'>
	<meta http-equiv='Content-Type' content='text/html'; charset='utf-8'>
	<meta http-equiv="Cache-Control" content="no-cache">
	<title>YourCourses</title>
	<link href='/template/<?php echo($site_template); ?>/css/main-style.css' rel='stylesheet' type='text/css'>
</head>

<body>
	<?php
	include_once("template/".$Apage_content_inc.".php");
	?>
</body>
</html>