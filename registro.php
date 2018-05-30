<html>
<head>
	<link type="text/css" rel="stylesheet" href="estilos.css">
	<title> UnAventon</title>
	<script  type="text/javascript" src="funcionesValidacion.js"> </script>
</head>
<body class="body">
<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
	
?>	
  <div class= "registrar">
<h1 style="color: black;margin-left:80px"> Create una cuenta </h1> 
<form method="POST" action="enviarusuario.php" class="input" onsubmit="return validarRegistro()">
  <label style="color: black"> Nombre </label>
  <input type="text" title="Debe contener solo letras" pattern="^[a-zA-Z]+$" id="nombre" name="nombre" class="caballo" placeholder="Nombre..." required/>
  <label style="color: black"> Apellido </label>
  <input type="text" title="Debe contener solo letras" pattern="^[a-zA-Z]+$"id="apellido" name="apellido" class="caballo" placeholder="Apellido..." required/>
  <label style="color: black"> Fecha Nacimiento </label>
  <input type="date" id="fecha" name="fecha" class="caballo" required/>
  <label style="color: black"> E-Mail </label>
  <input type="text" title="mail@ejemplo.com" id="mail" name="mail" class="caballo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-Mail..."required/>
  <label style="color: black"> Contraseña </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"id="contrasena" name="contrasena" class="caballo" placeholder="Contraseña..." required/>
  <label style="color: black"> Repetir contraseña </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="confirmar" name="confirmar" class="caballo" placeholder="Repetir Contraseña..."required/>
  <div><input type="submit" class="botonRegistrarse" value="Registrarse"></div>
</form>
</div>
</body>
</html>
</body>
</html>