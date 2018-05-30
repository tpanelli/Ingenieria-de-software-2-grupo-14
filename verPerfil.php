<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="validacion.js"></script>
</head>
<?php 
 include 'barra.php';
 include_once"archivoconexion.php";
  $link = conectar();
  $result = mysqli_query($link,"select * from usuario where mail = '$_SESSION[mail]'");
  $row = mysqli_fetch_array($result)
?>

<div class="perfil">
	<div class="nombrePerfil"> <?php echo $row['nombre'],' ', $row['apellido'] ?> </div>
</div>
<div class="cuadrado">
		<table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
		<table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
				<table class="comentario"><tr>
		<td>Comentario recibido<td>
		</table>
     	<table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table><table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
</div>

<div class="datos">
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 E-Mail: <?php echo $row['mail']?><br><br>
	 Nacimiento: <?php echo $row['fechanac']?>
	 </div>
	<div class="">
			<div><a href="editarPerfil.php"><button class="botonEditarPerfil"> Editar Pefil </button></a></div>
	</div>
</div>
<div class="datos">
     <div style="font-size: 35px; color: white; margin-left: 10%; margin-top: 2%"> Calificaciones </div>
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 Conductor: ? <br><br>
	 Pasajero:  ?
	 </div>
</div>
	
	

	</html>