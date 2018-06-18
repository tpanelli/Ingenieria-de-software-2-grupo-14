<?php include 'barra.php'; 
$idviaje = $_GET['id'];
$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = $idviaje");
$datos = mysqli_fetch_array($viaje);
$patente = $datos['patente'];
$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente'");
$vehiculo = mysqli_fetch_array($vehiculo);
$mail = $vehiculo ['mail'];
$usuario =  mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
$usuario =  mysqli_fetch_array($usuario);
?>
<div class="cuadradoViaje"> 
	 Origen: <?php echo $datos['ciudadOrigen'];?><br><br>
	 Destino: <?php echo $datos ['ciudadDestino'];?><br><br>
	 Salida: <?php $dia = $datos ['dia']; echo date("d/m/Y", strtotime($dia)), ' - ', substr($datos ['hora'], 0, -3);?><br><br>
	
	 <div class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfilAjeno.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a>
	 
	 </div>
</div>
<div class="cuadradoReservar">
	Precio: <div class='precioReservar'>$<?php echo $datos['costo']; ?></div><br><br><hr/>
	<div class='asientosDisponibles'><?php include 'calcularAsientosDisponibles.php'; ?> asientos disponibles</div><br><hr/>
	<button class='botonPostularse'> Postularse </button>
</div>