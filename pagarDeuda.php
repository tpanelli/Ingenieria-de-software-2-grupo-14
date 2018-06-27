<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
	$mail = $_SESSION['mail'];
	$pagos = mysqli_query($link, "SELECT * FROM pago WHERE mail = '$mail' and realizado=0");
	if(mysqli_num_rows($pagos) != 0){
		while ($pago = mysqli_fetch_array($pagos)){
			$monto = $pago['monto'];
			$idviaje = $pago ['idviaje'];
			$idpago = $pago ['idpago'];
			$viajes = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje=$idviaje");
			while ($viaje = mysqli_fetch_array($viajes)){
				$patente = $viaje['patente'];
				$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente'");
				$vehiculo = mysqli_fetch_array($vehiculo);
?>
				<table class="viaje"><tr>
					<?php $idviaje = $viaje['idviaje']; ?>
					<td class="nombre"><?php echo $viaje ['ciudadOrigen'], ' - ', $viaje ['ciudadDestino'];?><td>
					<td class="nombre"> <?php $dia = $viaje ['dia']; echo date("d/m/Y", strtotime($dia));?><td>
					<td class="nombre"><?php echo substr($viaje ['hora'], 0, -3) ;?><td>
					<td class="nombre">Asientos: <?php include 'calcularAsientosDisponibles.php'; ?> <td>
					<div class="precio"><?php echo '$', $viaje['costo']; ?></div>
					<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
				</table>
				<a href='formularioPago.php?idpago=<?php echo $idpago ?>'><button class='botonViajePublicado'> Pagar viaje </button></a>
<?php 		} 
		}
	}else{
		header('Location: pagerrores.php?errores=pagos');
	}
		?>		