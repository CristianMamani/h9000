<?php
//Conectamos a la base de datos
require('conexion.php');

//Obtenemos los datos del formulario de registro

$nombrePOST = $_POST["nombre"];
$precioPOST = $_POST["precio"];
$cantidadPOST = $_POST["cantidad"];
$descripcionPOST = $_POST["descripcion"]; 

//Filtro anti-XSS

$nombrePOST = htmlspecialchars(mysqli_real_escape_string($conexion, $nombrePOST));
$precioPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $precioPOST));
$cantidadPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $cantidadPOST));
$descripcionPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $descripcionPOST));


//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos

$maxCaracteresNombre = "30";
$maxCaracteresDescripcion = "200";



//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente

if(strlen($nombrePOST) > $maxCaracteresNombre) {
	die('<script>$("#modal1").openModal();</script> El nombre del producto no puede superar los '.$maxCaracteresNombre.' caracteres');
};
if(strlen($descripcionPOST) > $maxCaracteresDescripcion) {
	die('<script>$("#modal1").openModal();</script> La descripción no puede superar los '.$maxCaracteresDescripcion.' caracteres');
};

//Escribimos la consulta necesaria
$consultaModelo = "SELECT modelo FROM `productos`";

//Obtenemos los resultados
$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaModelo) or die(mysql_error());



//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if(empty($nombrePOST) || empty($precioPOST) || empty($cantidadPOST)) {
	
	die('<script>$("#modal2").openModal();</script> Debes introducir datos válidos');
}

$variable=false;
$hayResultados = true;
while ($hayResultados==true){
	$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
	if ($datosConsultaUsuarios) { 
		$modeloBD = $datosConsultaUsuarios['modelo'];
		if ($nombrePOST == $modeloBD){
			$variable=true;
		}

	} else {$hayResultados = false;}
}
if ($variable) {
	die('<script>$("#modal2").openModal();</script> Ya existe un producto con el nombre: '.$nombrePOST.'');
}
else {

//Lectura recomendada: https://mimentevuela.wordpress.com/2015/10/08/establecer-blowfish-como-salt-en-crypt-2/
	
	//Armamos la consulta para introducir los datos
	$consulta = "INSERT INTO `productos` (nombre, precio_ref, cantidad, descripcion) 
	VALUES ('$nombrePOST', '$precioPOST' , '$cantidadPOST', '$descripcionPOST')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		die('<script>$(".agregar").val(""); $("#modal1").openModal();</script>
Registrado con éxito <br>
Ya puedes acceder a tu cuenta <br>
<br>
Datos:<br>
CI: '.$userPOST.'<br>
Nombre: '.$nombrePOST.'<br>
Apellidos: '.$apellidosPOST.'<br>
Teléfono: '.$telefonoPOST.'<br>
Contraseña: '.$passPOST);
	} else {
		die('Error');
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>