<?php
//Файл: 404.php
//Призанчення: файл на який перенаправляється у випадку помилки 404

include_once("/system/site_data.php");

header("Location: ".$site_address."/index.php?action=error_404");     //На цій сторінці дані не відображаються. Вона лише перенаправляє туди
?>