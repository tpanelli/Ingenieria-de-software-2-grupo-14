<?php
include "barra.php";
$mail = $_SESSION['mail'];
$fecha_actual = date("y-m-d");
$viajesPendientes = mysqli_query($link, "SELECT * FROM viaje WHERE mail = '$mail' and realizado = '0' ORDER BY dia,hora");
?>
 <div style="margin: 2% 32% 2% 28%"class="noSeEncontraronResultados" >Viajes pendientes</div>
<?php
while ($viaje = mysqli_fetch_array($viajesPendientes)){
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
			<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" input></a>
</table>
<a href="verPostulantes.php?idviaje=<?php echo $idviaje ?>"><button class='botonViajePublicado'> Ver postulantes </button></a>
<a href="formularioEditarViaje.php?idviaje=<?php echo $idviaje?>"><button class='botonViajePublicado'> Editar </button></a>
<?php
		$pasajeros=mysqli_query($link, "SELECT * FROM viaje_usuario WHERE idviaje = '$idviaje' and aceptado = '1'");
		if(mysqli_num_rows($pasajeros) != 0){
?>
			<a href="eliminarViaje.php?idviaje=<?php echo $idviaje?>"></><button class='botonViajePublicado' onclick="return Confirmar('¿Esta seguro que desea eliminar el viaje? Habra una penalizacion de 3 puntos por tener pasajeros aceptados')"> Eliminar </button></a>
<?php 
		}else{
			?>
			<a href="eliminarViaje.php?idviaje=<?php echo $idviaje?>"></><button class='botonViajePublicado' onclick="return Confirmar('¿Esta seguro que desea eliminar el viaje?')"> Eliminar </button></a>
			<?php
		}
	}
?>