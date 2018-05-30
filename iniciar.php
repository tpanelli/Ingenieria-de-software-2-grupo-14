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
<div class="registrar">
	<h1 style="color: black;margin-left:140px"> Inicia sesion </h1> 
			<form  name="regis" method="post" action="Acceso.php" class="input" onsubmit="return sesion()">
				<label style="color: black"> Mail </label>
				<input type="text" id="mail" name="mail" class="caballo" placeholder="Mail..." required/>
				<label style="color: black"> Contraseña </label>
				<input type="password" id="contrasena" name="contrasena" class="caballo" placeholder="Contraseña..." required/>
				<div><input type="submit" class="botonRegistrarse" value="Iniciar sesion"></div>
			</form>
		</div>
	</div>
</div>
</body>
</html>