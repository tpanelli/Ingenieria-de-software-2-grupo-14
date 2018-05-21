<div class="barralog">
<script  type="text/javascript" src="funcionesvalidacion.js"> </script>
	<?php 
	session_start();
	include 'validacion.php';
	$objeto = new Acceso();
	if(!$objeto->Logueado()){ ?>
		<div class="IconoInicio"><img src="Logo.jpg" style="width:25%;height:100%";></div>
		<div class="login">
			<div><a href="registro.php"><button class="botonIniciarSesion botonLogin"> Registrarse </button></a></div>
			<div><a href="iniciar.php"><button class="botonIniciarSesion botonLogin"> Iniciar Sesion </button></a></div>
		</div>
	<?php 
	} 
	else{ ?>
		<form method="post" action="cerrar.php" onclick="return Confirmar('¿Esta seguro que desea cerrar sesion?')">
		<div class="login">
			<div><a href="cerrar.php"><button class="botonIniciarSesion botonLogin"> Salir </button></a></div>
		</div>
		</form>
		<div class="bienve">
			<div class="bienvenido">¡Bienvenido/a, <?php echo $_SESSION['nombre'] ?>!</div>
	<?php }?>
</div>