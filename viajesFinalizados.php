<?php 
include "barra.php";
$mail = $_SESSION['mail'];
$fecha_actual = date("y-m-d");
$viajesFinalizados = mysqli_query($link, "SELECT * FROM viaje WHERE mail = '$mail' and realizado='1'");
?>
 <div style="margin: 2% 32% 2% 28%"class="noSeEncontraronResultados" >Viajes finalizados</div>
<?php
while ($viaje = mysqli_fetch_array($viajesFinalizados)){
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