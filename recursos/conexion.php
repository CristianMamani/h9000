<?php 

$conexion = mysqli_connect('localhost','root','','cel');

if($conexion === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>