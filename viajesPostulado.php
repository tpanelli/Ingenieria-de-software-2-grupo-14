<?php include "barra.php"; 
$mail = $_SESSION['mail'];
$postulaciones = mysqli_query($link, "SELECT * FROM viaje_usuario WHERE mail = '$mail' ORDER BY idpasajero DESC");
if (mysqli_num_rows($postulaciones) == 0) { ?>
	 <div class="noSeEncontraronResultados">Usted no se ha postulado a ningun viaje<br><br></div>
	 <?php
} else {
?>
<div style="margin: 2% 32% 2% 28%"class="noSeEncontraronResultados" >Viajes postulados</div>
<?php
	while ($postulacion = mysqli_fetch_array($postulaciones)){
			$idviaje = $postulacion ['idviaje'];
			$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = '$idviaje'");
			$viaje = mysqli_fetch_array($viaje);
			$patente = $viaje['patente'];
			$mailConductor = $viaje['mail'];
			$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$mailConductor'");
			$vehiculo = mysqli_fetch_array($vehiculo);
?>
<table id="t01" class="viaje"><tr>
			<?php $idviaje = $viaje['idviaje']; ?>
			<td class="nombre"><?php echo $viaje ['ciudadOrigen'], ' - ', $viaje ['ciudadDestino'];?><td>
			<td class="nombre"> <?php $dia = $viaje ['dia']; echo date("d/m/Y", strtotime($dia));?><td>
			<td class="nombre"><?php echo substr($viaje ['hora'], 0, -3) ;?><td>
			<td class="nombre">Asientos: <?php include 'calcularAsientosDisponibles.php'; ?> <td>
			<div class="precio"><?php echo '$', $viaje['costo']; ?></div>
			<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
</table>
<button class='botonViajePublicado' disabled> Estado: <?php $aceptado = $postulacion ['aceptado'];
													switch($aceptado){
															case 0: echo 'pendiente<br>'; break;
															case 1: echo 'aceptado<br>'; break;
															case 2: echo 'rechazado<br>'; break;
													}?> 
</button>
<?php
		if($aceptado==1){
?>
		<a href="salirViaje.php?mail=<?php echo $mail?>"><button class="botonViajePublicado" onclick="return Confirmar('¿Esta seguro que desea bajarse del viaje? Habra una penalizacion de 1 punto por estar aceptado.')"> Salir del viaje </button></a>
<?php 
		}else{
			if($aceptado==0){
				?>
				<a href="salirViaje.php?mail=<?php echo $mail?>"><button class="botonViajePublicado" onclick="return Confirmar('¿Esta seguro que desea bajarse del viaje?')"> Salir del viaje </button></a>
				<?php
			}
		}
	} 
}?>