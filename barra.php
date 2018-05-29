 <html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
</head>
<body background="fondo.jpg">
<div class="barralog">
<script  type="text/javascript" src="funcionesValidacion.js"> </script>
<a href="index.php"><div class="IconoInicio"><img src="logoo.jpeg" style="width:95px;height:95px";></div></a>
	<?php 
	session_start();
	include 'validacion.php';
	$objeto = new Acceso();
	if(!$objeto->Logueado()){ ?>
		
		<div class="login">
			<div><a href="registro.php"><button class="botonIniciarSesion botonLogin"> Registrarse </button></a></div>
			<div><a href="iniciar.php"><button class="botonIniciarSesion botonLogin"> Iniciar Sesion </button></a></div>
		</div>
	<?php 
	} 
	else{ ?>
		<div class="login">	
			<div><a href="cerrar.php"><button class="botonIniciarSesion botonLogin"> Salir </button></a></div>
			<div><a href="verPerfil.php"><button class="botonIniciarSesion botonLogin"><?php echo $_SESSION['nombre'],'','  ',' ',$_SESSION['apellido'] ?></button></a></div>
		</div>

		
	<?php }?>
</div>
<div>
<ul>
  <li><a href="index.php">Inicio</a></li>
  <li><a href="#news">Quienes somos?</a></li>
  <?php if($objeto->Logueado()){ ?>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Mis viajes</a>
    <div class="dropdown-content">
      <a href="#">Publicados</a>
      <a href="#">Postulados</a>
    </div>
  </li>
  <li><a href="listarvehiculos.php">Mis vehiculos</a></li>
  <li><a href="registrotarjeta.php">Registrar tarjeta</a></li>
  <?php } ?>
</ul>
</div>
