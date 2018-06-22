<?php include 'barra.php'; 
$idviaje = $_GET['id'];
$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = $idviaje");
$datos = mysqli_fetch_array($viaje);
$patente = $datos['patente'];
$mail = $datos ['mail'];
$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$mail'");
$vehiculo = mysqli_fetch_array($vehiculo);
$usuario =  mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
$usuario =  mysqli_fetch_array($usuario);
?>
<div class="cuadradoViaje"> 
	 Origen: <?php echo $datos['ciudadOrigen'];?><br><br>
	 Destino: <?php echo $datos ['ciudadDestino'];?><br><br>
	 Salida: <?php $dia = $datos ['dia']; echo date("d/m/Y", strtotime($dia)), ' - ', substr($datos ['hora'], 0, -3),' hs.';?><br><br>
	 Duracion: <?php echo substr($datos ['duracion'], 0, -3),' hs.'; ?>
	 <div class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfilAjeno.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  <?php echo $datos['detalle']; ?>
	 
	 </div>
</div>
<div class="cuadradoReservar">
	Precio: <div class='precioReservar'>$<?php echo $datos['costo']; ?></div><br><br><hr/>
	<div class='asientosDisponibles'><?php include 'calcularAsientosDisponibles.php'; ?> asientos disponibles</div><br><hr/>
	<br>
	<form action="postularse.php"method="post">
	<input name="idviaje" value=" <?php echo $idviaje;?> " type="hidden"></input> 
	<input name="mail" value=" <?php echo $_SESSION['mail'];?> " type="hidden"></input>  
	<input name="eliminar" value="Postularse" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
	</form>
</div>