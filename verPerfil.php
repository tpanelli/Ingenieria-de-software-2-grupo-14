<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="validacion.js"></script>
</head>
<?php 
 include 'barra.php'
?>
<div class="perfil">
	<div class="nombrePerfil"> <?php echo $_SESSION['nombre'],' ', $_SESSION['apellido'] ?> </div>
</div>
<div class="datos">
	<div style="color:white">
	 E-Mail: <?php echo $_SESSION['mail']?><br><br>
	 Nacimiento: <?php echo $_SESSION['fechanac']?>
	</div>
	<div class="">
			<div><a href="editarPerfil.php"><button class="botonEditarPerfil"> Editar Pefil </button></a></div>
	</div>
</div>
</html>