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
	<span id='gmenu_title'>Навігація по Your Course</span>
	<div class='gmenu_barray'>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/index.php'>Головна</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/courses.php'>Курси</a></li>
		<li id='gmenu_button'><?php
			if(isset($_SESSION["user_id"])) {
				echo("<a href='".$site_address."/users.php?user_id=".$_SESSION["user_id"]."'>Профіль</a>");
			}
			else {
				echo("<a href='".$site_address."/users.php?message=need_login'>Профіль</a>");
			}
		?>
		</li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/improve.php'>Покращити сервіс</a></li>
		<li id='gmenu_button'><a href='<?php echo($site_address); ?>/index.php?action=about'>Інфо</a></li>
	</div>
	<div>
		
	</div>
</ul>