<html>
<head>
	<link type="text/css" rel="stylesheet" href="estilos.css">
	<title> UnAventon</title>
	<script  type="text/javascript" src="validacion.js"> </script>
</head>
<body class="body">
<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
	
?>	
<div>
		<ul>
			<li><a href="indexAventon.php"> Inicio</a></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		</div>
  <div class= "registrar">
<h1 style="color: black;margin-left:80px"> Create una cuenta </h1> 
<form method="POST" action="enviarusuario.php" class="input" onsubmit= "return validarRegistro()">
  <label style="color: black"> Nombre </label>
  <input type="text" id="nombre" name="nombre" class="caballo" placeholder="Nombre...">
  <label style="color: black"> Apellido </label>
  <input type="text" id="apellido" name="apellido" class="caballo" placeholder="Apellido...">
  <label style="color: black"> Fecha Nacimiento </label>
  <input type="date" id="nombreusuario" name="fecha" class="caballo" placeholder="Usuario...">
  <label style="color: black"> E-Mail </label>
  <input type="text" id="mail" name="mail" class="caballo"  placeholder="E-Mail...">
  <label style="color: black"> Contraseña </label>
  <input type="password" id="contra" name="contra" class="caballo" placeholder="Contraseña...">
  <label style="color: black"> Repetir contraseña </label>
  <input type="password" id="contra2" name="contra2" class="caballo" placeholder="Repetir Contraseña...">
  <div><input type="submit" class="botonRegistrarse" value="Registrarse"></div>
</form>
</div>
</body>
</html>
</body>
</html>