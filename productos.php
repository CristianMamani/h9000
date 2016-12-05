<?php

require('recursos/conexion.php');

$_SESSION['filas'] = array(); 
$Sql = "SELECT * FROM productos"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('modelo'=>$arr['modelo'], 'cantidad'=>$arr['cantidad'], 'precio_ref'=>$arr['precio_ref']); 
        array_push($_SESSION['filas'],$fila); 
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/datatable.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/datatable.js"></script>
	<title>Productos</title>

<style>
.fuente{
	font-family: 'Segoe UI light';
	color: red;
}

@media only screen and (max-width: 767px) {

/* NO MOSTRAR ELEMENTOS MENORES A ESTA RESOLUCION*/

}

table.highlight > tbody > tr:hover {
  background-color: #a0aaf0 !important;
}

#tabla1{
	border-collapse: separate;
	border-radius: 5px;
	border-spacing: 1px;
	border: solid;
	border-color: #1f1f1f;
}
.fijo{
  position: fixed !important;
  right: 10px;
  bottom: 5%;
  max-width: 230px;
  z-index: 10 !important;
  width: 230px;

}
.fijo:hover{
  background: #ffffff;
  margin-right:40px;
}
</style>

</head>
<body>

<span class="fuente"><h3>Productos	
  <!-- Modal Trigger -->
	<a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>

<!-- TABLA -->
<table id="tabla1" class="highlight">
  <thead>
    <tr>
        <th data-field="id">Modelo</th>
        <th data-field="name">Precio</th>
        <th data-field="price">Cantidad</th>
        <th data-field="price">Modificar</th>
        <th data-field="price">Borrar</th>
        <th data-field="price">Ver Producto</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($fila as $a  => $valor){ ?>
      <tr>
        <td><?php echo $valor["modelo"] ?></td>
        <td><?php echo $valor["cantidad"] ?></td>
        <td><?php echo $valor["precio_ref"] ?></td>

        <td><a href="#"><i class="material-icons">build</i></a></td>
        <td><a href="#"><i class="material-icons">delete</i></a></td>
        <td><a href="#"><i class="material-icons">search</i></a></td>
      </tr>
    <?php } ?>	



  </tbody>
</table>




  <!-- Modal Structure -->
<div class="row">
<div id="modal1" class="modal col s4 offset-s4">
  <div class="modal-content">
    <h4>Agregar producto</h4>  
    <div class="row">
      <form class="col s12" id="agregar">
        <div class="row">
          <div class="input-field col s12">
            <input id="nombre" type="text" class="validate">
            <label for="nombre">Nombre (modelo)</label>
          </div>
        </div>
        <div class="row">  
          <div class="input-field col s12">
            <input id="precio" type="number" class="validate">
            <label for="precio">Precio referencial (Bs.)</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="cantidad" type="number" class="validate">
            <label for="cantidad">Cantidad</label>
          </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <textarea id="descripcion" class="materialize-textarea"></textarea>
          <label for="descripcion">Descripción</label>
        </div>
      </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
      <button class="btn waves-effect waves-light" type="submit" name="registro">Agregar</button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
  </div>
</div>
</div>

  <!-- Modal Structure -->
 <div class="row">
  <div id="modal2" class="modal col s4 offset-s4">
    <div id="mensaje" class="modal-content">
    <!-- AQUI VA EL CONTENIDO DEL MODAL, OBTENIDO POR PHP DESDE registro.php-->
    </div>
    <div class="modal-footer row">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
    </div>
  </div>
</div>

<div class="fijo" id="imprimir" >
  <a href="#" style="color: red;">
  <div class="card z-depth-5">
    <div class="card-image center" onmouseover="hover3.playclip();">
      <img src="img/print.png" >
    </div>
    <div class="card-action">
      IMPRIMIR TABLA
    </div>
  </div>
  </a>
</div>



<script>
$(document).ready(function() {
    $('#tabla1').dataTable();
    $('#modal').leanModal();
});

$("#agregar").on("submit", function(e){
  //Evitamos que se envíe por defecto
  e.preventDefault();
  //Creamos un FormData con los datos del mismo formulario
  var formData = new FormData(document.getElementById("agregar"));

  //Llamamos a la función AJAX de jQuery
  $.ajax({
    //Definimos la URL del archivo al cual vamos a enviar los datos
    url: "recursos/agregarp.php",
    //Definimos el tipo de método de envío
    type: "POST",
    //Definimos el tipo de datos que vamos a enviar y recibir
    dataType: "HTML",
    //Definimos la información que vamos a enviar
    data: formData,
    //Deshabilitamos el caché
    cache: false,
    //No especificamos el contentType
    contentType: false,
    //No permitimos que los datos pasen como un objeto
    processData: false
  }).done(function(echo){
    //Una vez que recibimos respuesta
    //comprobamos si la respuesta no es vacía
    if (echo !== "") {
      
      //Si hay respuesta (error), mostramos el mensaje
      mensaje.html(echo);
      mensaje.show();
    } else {
      //Si no hay respuesta, redirecionamos a donde sea necesario
      //Si está vacío, recarga la página

      window.location.replace("index.php");
    }
  });
});
</script>
</body>
</html>