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
	include_once 'archivoconexion.php';
	include 'validacion.php';
	$objeto = new Acceso();
    $link = conectar();
	mysqli_set_charset($link, "utf8");
   if(!$objeto->Logueado()){ ?>
		<div class="login">
			<div><a href="registro.php"><button class="botonIniciarSesion botonLogin"> Registrarse </button></a></div>
			<div><a href="iniciar.php"><button class="botonIniciarSesion botonLogin"> Iniciar Sesion </button></a></div>
		</div>
	<?php 
	} 
	else{ 
	     $result = mysqli_query($link,"select * from usuario where mail = '$_SESSION[mail]'");
         $row = mysqli_fetch_array($result);?>
		<div class="login">	
			<div><a href="cerrar.php"><button class="botonIniciarSesion botonLogin" onclick="return Confirmar('¿Esta seguro que desea cerrar sesion?')"> Salir </button></a></div>
			<div><a href='verPerfil.php?mail=<?php echo $_SESSION['mail']?>'><button class="botonIniciarSesion botonLogin"><?php echo $row['nombre'],'','  ',' ',$row['apellido'] ?></button></a></div>
		</div>

		
	<?php }?>
</div>
<div>
<ul>
  <li><a href="index.php">Inicio</a></li>
  <li><a href="pagerrores.php?errores=construccion">Quienes somos?</a></li>
  <?php if($objeto->Logueado()){ ?>
  <li class="dropdown">
    <a class="dropbtn">Mis viajes</a>
    <div class="dropdown-content">
      <a href="viajesPublicados.php">Publicados</a>
      <a href="viajesPostulado.php">Postulados</a>
    </div>
  </li>
  <li><a href="listarvehiculos.php">Mis vehiculos</a></li>
  <li><a href="registrotarjeta.php">Registrar tarjeta</a></li>
  <li><a href="elegirTipoViaje.php">Publicar viaje</a></li>
  <li><a href="pagarDeuda.php">Paga tus deudas</a></li>
  <?php } ?>
</ul>
</div>
