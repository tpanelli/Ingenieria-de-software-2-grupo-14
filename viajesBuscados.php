<?php 
include 'barra.php';
$consulta = "SELECT * FROM viaje ";
$string = " viajes disponibles ";
if (isset ($_GET['t'])){
	$consulta.= "INNER JOIN vehiculo ON viaje.patente = vehiculo.patente WHERE nombretipo = '$_GET[t]' and ";
	$tipo = strtolower ($_GET['t']); //solo para poner en minuscula 
	$string.= "en $tipo ";
} else {
$consulta.= "WHERE ";
}
if (isset ($_GET['o'])){
	$consulta.= "ciudadOrigen = '$_GET[o]' and ";
	$string.= "desde $_GET[o] ";
}
if (isset ($_GET['d'])){
	$consulta.= "ciudadDestino = '$_GET[d]' and ";
	$string.= "hacia $_GET[d] ";
}
if (!empty ($_GET['f'])){
	$consulta.= "dia = '$_GET[f]' and ";
	$fecha = date("d/m/Y", strtotime($_GET['f']));
	$string.= "el dia $fecha ";
}
$consulta.= "realizado = '0' ORDER BY dia,hora";
$viajes = mysqli_query($link, $consulta);
?><div class="viajesEncontrados" ><?php echo mysqli_num_rows($viajes), $string ?></div><br><br><br><br>;<?php
while ($viaje = mysqli_fetch_array($viajes)){
			$patente = $viaje['patente'];
			$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente'");
			$vehiculo = mysqli_fetch_array($vehiculo); ?>
			<table style="margin-right:4.5%; margin-bottom:1%" class="viaje"><tr>
			<?php $idviaje = $viaje['idviaje']; ?>
			<td class="nombre"><?php echo $viaje ['ciudadOrigen'], ' - ', $viaje ['ciudadDestino'];?><td>
			<td class="nombre"> <?php $dia = $viaje ['dia']; echo date("d/m/Y", strtotime($dia));?><td>
			<td class="nombre"><?php echo substr($viaje ['hora'], 0, -3) ;?><td>
			<td class="nombre">Asientos: <?php include 'calcularAsientosDisponibles.php'; ?> <td>
			<div class="precio"><?php echo '$', $viaje['costo']; ?></div>
			<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
		</table>
<?php } ?>
