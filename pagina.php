<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
  $ciactual = $_SESSION['userCI']; 
	$salir = '<a href="recursos/salir.php" target="_self">Cerrar sesión</a>';
	require('recursos/sesiones.php');
};

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" href="css/materialize.css">
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/materialize.js"></script>
<script type="text/javascript" src="js/paging.js"></script>

<title>Bienvenido</title>
<style>
#titulo1{
	/*font-family: Matura MT Script Capitals;*/
	font-family: Homestead Display;
	color: #ffffff;

}
.fuente{
  font-family: Segoe UI Light;
}

@media only screen and (max-width: 1000px) {
	  #titulo1{
	  	display: none;
	  }
    #imprimir{
      display:none;
    }
}
@media only screen and (max-width: 1300px) {
	  #titulo2{
	  	display: none;
	  }
}
nav ul a:hover {
  background-color: rgba(0, 0, 0, 0.3) !important;
}

.embed-container {
    position: relative;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
}
.embed-container iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}

</style>
</head>

<body>
 <nav>
    <div class="nav-wrapper" style="background-color: #ff5f00;">
    <a href="#!" class="brand-logo">
		<img src="img/logo.png" style="max-height: 56px; width: auto;">
	</a>
	<div class="brand-logo center" id="titulo1">Sistema de control<span id="titulo2"> de Inventario</span></div>
	    <ul class="right hide-on-med-and-down">
        <li><?php echo $estado; ?></li>
        <li><?php echo $salir; ?></li>
      </ul>


    </div>
  </nav>
  
  <nav>
    <div class="nav-wrapper" style="background-color: #ff4f00;">



      <a href="#" class="brand-logo right">LOGO</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#" onclick="cargar('productos');">Productos </a></li>
        <li><a href="#" onclick="cargar('usuarios');">Usuarios</a></li>
        <li><a href="#" onclick="cargar('clientes');">Clientes</a></li>
        <li><a href="#" onclick="cargar('ventas');">Ventas</a></li>
        <li><a href="#" onclick="cargar('reportes');">Reportes</a></li>
      </ul>

      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

      <ul class="side-nav" id="mobile-demo"  style="color: black;">
        <li><?php echo $estado, $ciUSER; ?></li>
    <li><a href="#" onclick="cargar('productos');">Productos</a></li>
    <li><a href="#" onclick="cargar('usuarios');">Usuarios</a></li>
    <li><a href="#" onclick="cargar('clientes');">Clientes</a></li>
    <li><a href="#" onclick="cargar('ventas');">Ventas</a></li>
    <li><a href="#" onclick="cargar('reportes');">Reportes</a></li>
    <li><?php echo $salir; ?></li>
      </ul>

    </div>
  </nav>


<div class="row">
    <div id="cuerpo" class="col s12 l9"></div>
</div>


<script type="text/javascript">
  $(".button-collapse").sideNav();

  function cargar(x){
    var y=".php";
          $("#cuerpo").load(x+y);
  }

  var html5_audiotypes={ 
    "wav": "audio/wav"
  }
  function createsoundbite(sound){
var html5audio=document.createElement('audio')
if (html5audio.canPlayType){ //Comprobar soporte para audio HTML5
for (var i=0; i<arguments.length; i++){
var sourceel=document.createElement('source')
sourceel.setAttribute('src', arguments[i])
if (arguments[i].match(/.(w+)$/i))
sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
html5audio.appendChild(sourceel)
}
html5audio.load()
html5audio.playclip=function(){
html5audio.pause()
html5audio.currentTime=0
html5audio.play()

}
return html5audio
}
else{
return {playclip:function(){throw new Error('Su navegador no soporta audio HTML5')}}
}
}

var hover3 = createsoundbite('audio/botones/3.wav');

</script>
        
</body>

</html>