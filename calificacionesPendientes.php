<?php
include "barra.php";
$mail = $_SESSION['mail'];
$calificaciones = mysqli_query($link, "SELECT * FROM calificaciones WHERE mailvoto = '$mail' and realizado='0'");
;
if (mysqli_num_rows($calificaciones)==0){ ?>
     <div class="noSeEncontraronResultados">Usted no debe calificaciones<br><br>
	 <button class="botonLogin" onclick="goBack()">Volver</button>
	 </div>
<?php
}else{?>
	<div style="margin: 2% 32% 2% 28%"class="noSeEncontraronResultados" >Calificaciones pendientes</div>
<?php while($calificacion=mysqli_fetch_array($calificaciones)){
			$viajes = mysqli_query($link,"SELECT * FROM viaje WHERE idviaje='$calificacion[idviaje]'");
			while ($viaje = mysqli_fetch_array($viajes)){
			$patente = $viaje['patente'];
			$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$viaje[mail]'");
			$vehiculo = mysqli_fetch_array($vehiculo);
?>
			<table class="viaje"><tr>
			<?php $idviaje = $viaje['idviaje']; ?>
			<td class="nombre"><?php echo $viaje ['ciudadOrigen'], ' - ', $viaje ['ciudadDestino'];?><td>
			<td class="nombre"> <?php $dia = $viaje ['dia']; echo date("d/m/Y", strtotime($dia));?><td>
			<td class="nombre"><?php echo substr($viaje ['hora'], 0, -3) ;?><td>
			<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
</table>
<?php
}
}
}
?>