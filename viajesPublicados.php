<?php include "barra.php";
$mail = $_SESSION['mail'];
$viajes = mysqli_query($link, "SELECT * FROM viaje WHERE mail = '$mail'");
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
			<td class="nombre">Asientos: <?php include 'calcularAsientosDisponibles.php'; ?> <td>
			<div class="precio"><?php echo '$', $viaje['costo']; ?></div>
			<a href="detalleViaje.php?id='<?php echo $idviaje ?>'"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
		</table>
<?php } ?>