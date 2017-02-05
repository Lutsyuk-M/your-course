<?php
//Файл: db_connect.php
//Призначення: Підключення до бази данних

$db_host = "localhost";     //Хост
$db_user = "uY-C";     //Користувач
$db_pass = "mandarin";     //Пароль
$db_base = "your-course";     //Ім'я бази

$db_key = mysqli_connect($db_host, $db_user, $db_pass, $db_base);
?>