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
<h1 style="color: black;margin-left:80px"> Registra tu tarjeta </h1> 
		<div class="camporegis">
			<form method="POST" action="enviartarjeta.php" class="input" onsubmit= "return validarRegistro()">
				<label style="color: black"> Numero de tarjeta </label>
				<br>
				<input type="text" class="chico" maxlength="4" name="numero" placeholder="XXXX">
				- <input type="text" class="chico" maxlength="4" name="numero2" placeholder="XXXX">
				- <input type="text" class="chico" maxlength="4" name="numero3" placeholder="XXXX">
				- <input type="text" class="chico" maxlength="4" name="numero4" placeholder="XXXX">
				<br>
				<label style="color: black"> Numero de seguridad </label>
				<br>
				<input type="text" class="chico" maxlength="4" name="pin" placeholder="CVV">
				<br>
				<label style="color: black"> Fecha de vencimiento </label>
				<br>
				<input type="text" class="chico" maxlength="2" name="fecha1" placeholder="MM"> 
				/ <input type="text" class="chico" maxlength="2" name="fecha2" placeholder="AA">
				<br><br>
				<input type="submit" class="botonRegistrarse" value="Enviar">
			</form>
		</div>
	</div>
</div>
</body>
</html>