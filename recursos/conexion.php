<?php 

$global $host, $user, $pass, $database;

$host='mysql.hostinger.es';

$user='u296913487_root';

$pass='desconocido1';

$database='u296913487_cel';

@$link=mysql_connect($host,$user,$pass) or die ("conexión fallida.");

mysql_select_db($link,$database) or die ("error al conectarse con la base de datos".mysqli_error($link));

?>