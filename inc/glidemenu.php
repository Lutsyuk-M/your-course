<?php
defined('_INCLUDE_') or die('Shit happens!');
?>

<input type='checkbox' id='hmt' class='hidden-menu-ticker'>
<label class='btn-menu' for='hmt'>
	<span class='first'></span>
	<span class='second'></span>
	<span class='third'></span>
</label>
<ul class='hidden-menu'>
	<span id='gmenu_title'>Навігація по <?php echo($site_title); ?></span>
	<div class='gmenu_barray'>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/index.php'>Головна</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/courses.php'>Курси</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/users.php'>Профіль</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/improve.php'>Покращити сервіс</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/help.php'>Служба підтримки</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/index.php?action=about'>Інфо</a></li>
	</div>
	<div>
		
	</div>
</ul>