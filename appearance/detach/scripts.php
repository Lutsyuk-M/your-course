<?php
//Файл: scripts.php
//Призначення: Зберігання усередині JavaScript

defined('_INCLUDE_') or die('Shit happens!');
?>

	<script src="appearance/js/jquery-1.2.1.min.js" type="text/javascript"></script>
	<script src="appearance/js/sidemenu.js" type="text/javascript"></script>
	<script type="text/javascript" src="appearance/js/jquery.tools.min.js"></script>
	<script type="text/javascript">
      $(function() {    
$("#loginwindow").overlay({
      finish: {top: 'center'},
      expose: '#2F2F2F'
});
});
      </script>