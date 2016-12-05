<?php
require('recursos/conexion.php');

$_SESSION['filas'] = array(); 
$Sql = "SELECT a.ci_usu, a.ci_cli, c.nombre as nu, c.apellidos as au, b.nombre as nc, b.apellidos as ac, a.total, a.fecha FROM `venta` a, `clientes` b, `usuarios` c WHERE b.CI = a.ci_cli and a.ci_usu = c.CI"; 
$Busq = $conexion->query($Sql); 
while($arr = $Busq->fetch_array()) 
    { 
        $fila[] = array('ciu'=>$arr['ci_usu'], 'nombreu'=>$arr['nu'], 'apellidou'=>$arr['au'],'nombrec'=>$arr['nc'], 'apellidoc'=>$arr['ac'], 'cic'=>$arr['ci_cli'], 'fecha'=>$arr['fecha'], 'total'=>$arr['total']); 
        array_push($_SESSION['filas'],$fila); 
    } 

$_SESSION['fil'] = array(); 
$Sql2 = "SELECT * FROM productos"; 
$Busq2 = $conexion->query($Sql2); 
while($arr2 = $Busq2->fetch_array()) 
    { 
        $fila2[] = array('id'=>$arr2['id'], 'modelo'=>$arr2['modelo'], 'precio_ref'=>$arr2['precio_ref']); 
        array_push($_SESSION['fil'], $fila2); 
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
  <script src="js/jquery.uitablefilter.js"></script>


  <title>Ventas</title>
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
#tabla2{
  border-collapse: collapse;
  border-spacing: 0px;
  border: solid;
  border-color: #000000;
}


.filas_tabla {

   text-align: left;
   vertical-align: top;
   border: 0px solid #000;
   border-collapse: collapse;
   padding: 0em;
   
}

  </style>
</head>
<body>
<div class="row">
<div class="col s11">

<span class="fuente"><h3>Ventas  
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn-floating btn-large red" id="modal" href="#modal1"><i class="material-icons left">add</i></a></h3> 
</span>

<!-- TABLA -->

<table id="tabla1" class="highlight">
  <thead>
    <tr>
        <th data-field="id">CI Usuario</th>
        <th data-field="id">Nombre usuario</th>
        <th data-field="price">CI Cliente</th>
        <th data-field="id">Nombre cliente</th>

        <th data-field="price">Monto total</th>
        <th data-field="price">Fecha de venta</th>
        <th data-field="price">Modificar</th>
        <th data-field="price">Borrar</th>
        <th data-field="price">Ver Usuario</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($fila as $a  => $valor){ ?>
    <tr>
      <td><?php echo $valor["ciu"] ?></td>
      <td><?php echo $valor["nombreu"]." ".$valor["apellidou"]  ?></td>
      <td><?php echo $valor["cic"] ?></td>
      <td><?php echo $valor["nombrec"]." ".$valor["apellidoc"]  ?></td>
      <td><?php echo $valor["total"] ?></td>
      <td><?php echo $valor["fecha"] ?></td>
      <td><a href="#"><i class="material-icons">build</i></a></td>
      <td><a href="#"><i class="material-icons">delete</i></a></td>
      <td><a href="#"><i class="material-icons">search</i></a></td>
    </tr>
  <?php } ?>  
  </tbody>
</table>

<div class="row">
<div id="modal1" class="modal col s10 offset-s1">
  <div class="modal-content">
    <h5>Agregar venta</h5>  
    <p>Datos de cliente</p>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input id="ci" type="number" class="validate">
            <label for="ci">Cédula de identidad:</label>
          </div>
          <div class="input-field col s6">
            <input id="telefono" type="number" class="validate">
            <label for="telefono">Télefono (opcional):</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <input id="nombre" type="text" class="validate">
            <label for="nombre">Nombre:</label>
          </div>
          <div class="input-field col s6">
            <input id="apellidos" type="text" class="validate">
            <label for="apellidos">Apellidos</label>
          </div>
      </div>
      <p>Datos de venta</p>
        <div class="row">
          <!-- FILTRO DE BUSQUEDA -->
          <div class="col s3">
            <div id="busqueda"><input type="text" id="q" name="q" class="browser-default" placeholder="Buscar producto.." /></div>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <!-- TABLA -->
            <table id="tabla2" class="highlight">
              <thead>
                <tr>
                    <th data-field="modelo" class="filas_tabla">Modelo</th>
                    <th data-field="precio_ref" class="filas_tabla">Precio Ref.</th>
                    <th data-field="agregar" class="filas_tabla">Agregar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($fila2 as $a  => $prod){ ?>
                  <tr>
                    <td class="filas_tabla"><?php echo $prod["modelo"] ?></td>
                    <td class="filas_tabla"><?php echo $prod["precio_ref"] ?></td>
                    <td class="filas_tabla left"><a idpro="<?php echo $prod['id']?>" nompro="<?php echo $prod['modelo']?>" prepro="<?php echo $prod['precio_ref']?>"><i class="material-icons right">send</i></a></td>
                  </tr>
                <?php } ?>  
              </tbody>
            </table>

            <div style="border: 0px;" class="center" id="NavPosicion"></div>
          
          </div>

          <div class="input-field col s6">
            <!-- TABLA -->
            <table id="tabla2" class="highlight">
              <thead>
                <tr>
                    <th data-field="modelo" class="filas_tabla">Modelo</th>
                    <th data-field="precio_ref" class="filas_tabla">Precio Ref.</th>
                    <th data-field="agregar" class="filas_tabla">Borrar</th>
                </tr>
              </thead>
              <tbody>

                  <tr>
                    <td class="filas_tabla"></td>
                    <td class="filas_tabla"></td>
                    <td class="filas_tabla left"><a href="#" id="agregar"><i class="material-icons right">delete</i></a></td>
                  </tr>
   
              </tbody>
            </table>
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

var pager = new Pager('tabla2', 5);
pager.init();
pager.showPageNav('pager', 'NavPosicion');
pager.showPage(1);

$(function() {
  theTable = $("#tabla2");
      $("#q").keyup(function() {
      $.uiTableFilter(theTable, this.value);
  });
});

</script>

<script>
$(document).ready(function() {
    
});

</script>


</div>
</div>
</body>
</html>