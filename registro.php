<html>
<head>
	<link type="text/css" rel="stylesheet" href="estilos.css">
	<title> UnAventon</title>
	<script  type="text/javascript" src="funcionesvalidacion.js"> </script>
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
<form method="POST" action="enviarusuario.php" class="input" onsubmit= "return validarRegistro()">
  <label style="color: black"> Nombre </label>
  <input type="text" id="nombre" name="nombre" class="caballo" placeholder="Nombre...">
  <label style="color: black"> Apellido </label>
  <input type="text" id="apellido" name="apellido" class="caballo" placeholder="Apellido...">
  <label style="color: black"> Fecha Nacimiento </label>
  <input type="date" id="fecha" name="fecha" class="caballo" placeholder="Usuario...">
  <label style="color: black"> E-Mail </label>
  <input type="text" id="mail" name="mail" class="caballo"  placeholder="E-Mail...">
  <label style="color: black"> Contraseña </label>
  <input type="password" id="contrasena" name="contrasena" class="caballo" placeholder="Contraseña...">
  <label style="color: black"> Repetir contraseña </label>
  <input type="password" id="confirmar" name="confirmar" class="caballo" placeholder="Repetir Contraseña...">
  <label style="color: black"> Tarjeta de credito (opcional) </label>
  <br><br>
  <label style="color: black"> Numero </label>
  <br>  
  <input type="text" class="chico" maxlength="4" id="numero" name="numero" placeholder="XXXX">
  - <input type="text" class="chico" maxlength="4" id="numero2" name="numero2" placeholder="XXXX">
  - <input type="text" class="chico" maxlength="4" id="numero3" name="numero3" placeholder="XXXX"> 
  - <input type="text" class="chico" maxlength="4" id="numero4" name="numero4" placeholder="XXXX">
  <br>
  <label style="color: black"> Clave de seguridad </label>
  <br>
  <input type="text" class="chico" maxlength="4" id="pin" name="pin" placeholder="CVV">
  <br>
  <label style="color: black"> Fecha de vencimiento </label>
				<br>
				<input type="text" class="chico" maxlength="2" name="fecha1" placeholder="MM"> 
				/ <input type="text" class="chico" maxlength="2" name="fecha2" placeholder="AA">
  <br>	
  <div><input type="submit" class="botonRegistrarse" value="Registrarse"></div>
</form>
</div>
</body>
</html>
</body>
</html>