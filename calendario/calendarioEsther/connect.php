<?php
$db_host = "localhost";
$db_username = "root";
$db_name = "ecalendar";
$conn = mysql_connect("$db_host","$db_username") or die ("No se pudo conectar a mySQL");
mysql_select_db("$db_name") or die ("no database");
?>