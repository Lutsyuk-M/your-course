<?php
//Файл: 404.php
//Призанчення: файл на який перенаправляється у випадку помилки 404

define( '_INCLUDE_', 1 );

session_start();

include_once("/system/site_data.php");

header("Location: ".$site_address."/index.php?action=error_404");
?>