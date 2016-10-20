<?php


include ("system/ffunctions/db/db_connect.php");     //Підключення до бази данних

$fct_connect_res = mysql_query ("SELECT COUNT(1) FROM facts", $db_connect);
$fct_count = mysql_fetch_array ( $rand_res );     //COUNT таблиці facts = $fct_count[0]

int mt_rand([,]);
?>