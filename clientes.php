<?php
require('recursos/conexion.php');

$_SESSION['filas'] = array(); 
$Sql = "SELECT * FROM clientes"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('ci'=>$arr['CI'], 'nombre'=>$arr['nombre'], 'apellidos'=>$arr['apellidos'], 'telefono'=>$arr['telefono']); 
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

  <title>Clientes</title>
<style>

  .fuente{
    font-family: 'Segoe UI light';
    color: red;
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
<div class="row">
<div class="col s11">

<span class="fuente"><h3>Clientes 
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>

<!-- TABLA -->

  <table id="tabla1" class="highlight">

        <thead>

          <tr>
              <th data-field="id">CI</th>
              <th data-field="name">Nombre</th>
              <th data-field="price">Telefono</th>
              <th data-field="price">Modificar</th>
              <th data-field="price">Borrar</th>
              <th data-field="price">Ver Usuario</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach($fila as $a  => $valor){ ?>
          <tr>
            <td><?php echo $valor["ci"] ?></td>
            <td><?php echo $valor["nombre"]." ".$valor["apellidos"] ?></td>
         
      <td><?php echo $valor["telefono"] ?></td>

            <td><a href="#"><i class="material-icons">build</i></a></td>
            <td><a href="#"><i class="material-icons">delete</i></a></td>
            <td><a href="#"><i class="material-icons">search</i></a></td>
          </tr>
    <?php } ?>  



        </tbody>
    </table>


<div class="row">
<div id="modal1" class="modal col s4 offset-s4">
  <div class="modal-content">
    <h4>Agregar cliente</h4>  
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="ci" type="number" class="validate">
            <label for="ci">CI:</label>
          </div>
        </div>
        <div class="row">  
          <div class="input-field col s6">
            <input id="nombre" type="text" class="validate">
            <label for="nombre">Nombre: </label>
          </div>
          <div class="input-field col s6">
            <input id="apellidos" type="text" class="validate">
            <label for="apellidos">Apellidos:</label>
          </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input id="telefono" type="number">
          <label for="telefono">Teléfono (OPCIONAL): </label>
        </div>
      </div>
      </form>
    </div>
  </div>
  <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
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
</script>

</div>
</div>
</body>
</html>