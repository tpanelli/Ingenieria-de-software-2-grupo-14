<?php
include "barra.php";
$mail = $_SESSION['mail'];
$calificaciones = mysqli_query($link, "SELECT * FROM calificaciones WHERE mailvoto = '$mail' and realizado='0'");
$calificacion=mysqli_fetch_array($calificaciones);
if (mysqli_num_rows($calificaciones)==0){ ?>
     <div class="noSeEncontraronResultados">Usted no debe calificaciones<br><br>
	 <button class="botonLogin" onclick="goBack()">Volver</button>
	 </div>
<?php
}else{
	$viajes = mysqli_query($link,"SELECT * FROM viaje WHERE mail = '$mail' and idviaje='$calificacion[idviaje]'");
while ($viaje = mysqli_fetch_array($viajes)){
			$patente = $viaje['patente'];
			$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$mail'");
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
?>