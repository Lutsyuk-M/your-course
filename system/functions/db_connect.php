<?php
//Файл: db_connect.php
//Призначення: Підключення до бази данних

$db_host = "localhost";     //Хост
$db_user = "uY-C";     //Користувач
$db_pass = "mandarin";     //Пароль
$db_base = "your-course";     //Ім'я бази

$db = mysql_connect($db_host,$db_user,$db_pass);   //Підключення з використанням данних
mysql_select_db($db_base,$db);    //Вибір бази
?>