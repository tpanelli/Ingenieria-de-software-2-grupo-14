<?php 
 include 'barra.php';
 include_once"archivoconexion.php";
  $link = conectar();
  $mail = $_GET['mail'];
  $result = mysqli_query($link,"select * from usuario where mail = '$mail' and activo=1");
  if (mysqli_num_rows($result) == 0){
	  echo 'el usuario ya no existe';
  }
  else {
  $row = mysqli_fetch_array($result);
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
		</table><table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
		</table><table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
		</table><table class="comentario"><tr>
			<td>Comentario recibido<td>
		</table>
</div>
<div class="datos">
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 E-Mail: <?php echo $row['mail']?><br><br>
	 Edad: <?php $fecha_actual=date("y-m-d");
				$diff = abs(strtotime($fecha_actual) - strtotime($row['fechanac']));
				$years = floor($diff / (365*60*60*24)); 
				echo $years;?>
	 </div>
</div>
<div class="datos">
     <div style="font-size: 35px; color: white; margin-left: 10%; margin-top: 2%"> Calificaciones </div>
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 Conductor: ? <br><br>
	 Pasajero:  ?
	 </div>
</div>
  <?php } ?>
</body>
</html>