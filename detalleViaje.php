<?php include 'barra.php'; 
$idviaje = $_GET['id'];
$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = '$idviaje'");
$datos = mysqli_fetch_array($viaje);
$patente = $datos['patente'];
$mail = $datos ['mail'];
$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$mail'");
$vehiculo = mysqli_fetch_array($vehiculo);
$usuario =  mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
$usuario =  mysqli_fetch_array($usuario);
if($datos['realizado'] == 0){
?>
<div class="cuadradoViaje"> 
	 Origen: <?php echo $datos['ciudadOrigen'];?><br><br>
	 Destino: <?php echo $datos ['ciudadDestino'];?><br><br>
	 Salida: <?php $dia = $datos ['dia']; echo date("d/m/Y", strtotime($dia)), ' - ', substr($datos ['hora'], 0, -3),' hs.';?><br><br>
	 Duracion: <?php echo substr($datos ['duracion'], 0, -3),' hs.'; ?>
	 <div class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfil.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  <?php echo $datos['detalle']; ?>
	 
	 </div>
</div>
<div class="cuadradoReservar">
	Precio: <div class='precioReservar'>$<?php echo $datos['costo']; ?></div><br><br><hr/>
	<div class='asientosDisponibles'><?php include 'calcularAsientosDisponibles.php'; ?> asientos disponibles</div><br><hr/>
	<br>
	<form action="postularse.php"method="post">
	<input name="idviaje" value="<?php echo $_GET['id'];?>" type="hidden"></input> 
	<input name="mail" value="<?php echo $_SESSION['mail'];?>" type="hidden"></input>
	<input name="disponibles" value="<?php echo $disponibles?>" type="hidden"></input> 
<?php if($objeto->Logueado()){
		if ( $mail != $_SESSION['mail']){ ?>
			<input name="eliminar" value="Postularse" type="submit" style="margin-top:-3%" class="botonPostularse" onclick="return Eliminar()"></input>
		<?php } 
    } ?>
	</form>
</div>
<?php
}else if ( $mail != $_SESSION['mail']){
?>
<div class="cuadradoViaje"> 
	 Origen: <?php echo $datos['ciudadOrigen'];?><br><br>
	 Destino: <?php echo $datos ['ciudadDestino'];?><br><br>
	 Salida: <?php $dia = $datos ['dia']; echo date("d/m/Y", strtotime($dia)), ' - ', substr($datos ['hora'], 0, -3),' hs.';?><br><br>
	 Duracion: <?php echo substr($datos ['duracion'], 0, -3),' hs.'; ?>
	 <div class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfil.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  <?php echo $datos['detalle']; ?>
	 
	 </div>
</div>
<?php 
	$calificacionPendiente = mysqli_query($link, "SELECT * FROM calificaciones WHERE idviaje = '$idviaje' and mailvoto = '$_SESSION[mail]' and realizado = '0'");
	if (mysqli_num_rows($calificacionPendiente) > 0){
?>
<div class="cuadradoReservar">
	<div style="margin:2% 1% 6% 15%;font-size:30px">Califica al conductor!</div>
	<form action="enviarCalificacion.php"method="post">
	<input name="idviaje" value="<?php echo $_GET['id'];?>" type="hidden"></input> 
	<input name="mail" value="<?php echo $_SESSION['mail'];?>" type="hidden"></input> 
	<input style="margin:0% 0% 7% 25%" type="radio" name="puntuacion" value="1"required/> Positivo
    <input type="radio" name="puntuacion" value="0"required/>Negativo<br>
	<label style="margin-left:30%">Deja tu comentario</label>
	<input style="margin-left:25%" type="text-area" name="comentario"  required/>
	<input style="margin:2% 5% 7% 37% "name="eliminar" value="Enviar" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
	</form>
</div>
<?php }
} else { ?>
<div style="width:30%;height:55%;"class="cuadradoViaje"> 
	 Origen: <?php echo $datos['ciudadOrigen'];?><br><br>
	 Destino: <?php echo $datos ['ciudadDestino'];?><br><br>
	 Salida: <?php $dia = $datos ['dia']; echo date("d/m/Y", strtotime($dia)), ' - ', substr($datos ['hora'], 0, -3),' hs.';?><br><br>
	 Duracion: <?php echo substr($datos ['duracion'], 0, -3),' hs.'; ?>
	 <div style="width: 93%" class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfil.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  <?php echo $datos['detalle']; ?>
	 
	 </div>
</div>
<br>
<?php 
	$pasajeros = mysqli_query ($link, "SELECT * FROM viaje_usuario WHERE idviaje = '$idviaje' and aceptado = '1' ");
	while($pasajero= mysqli_fetch_array($pasajeros)){
		$calificaciones = mysqli_query ($link, "SELECT * FROM calificaciones WHERE mailvotado = '$pasajero[mail]' and idviaje='$idviaje' and realizado = '0' ");
		$calificacion= mysqli_fetch_array($calificaciones);
		$u = mysqli_query ($link, "SELECT * FROM usuario WHERE mail = '$calificacion[mailvotado]' ");
		$us= mysqli_fetch_array($u);
		if(mysqli_num_rows($u)!= 0){
?>
<div style="margin-left:3%; margin-top:1%"class="puntuar">
	<div style="margin:2% 1% 6% 12%;font-size:30px">Califica a <a href='verPerfil.php?mail=<?php echo $us['mail']?>' > <?php echo $us['nombre'],' ',$us['apellido']?> </a></div>
	<form action="enviarCalificacion.php"method="post">
	<input name="idviaje" value="<?php echo $_GET['id'];?>" type="hidden"></input> 
	<input name="mail" value="<?php echo $_SESSION['mail'];?>" type="hidden"></input> 
	<input style="margin:0% 0% 7% 25%" type="radio" name="puntuacion" value="1"required/> Positivo
    <input type="radio" name="puntuacion" value="0"required/>Negativo<br>
	<label style="margin-left:30%">Deja tu comentario</label>
	<input style="margin-left:25%" type="text-area" name="comentario"  required/>
	<input style="margin:2% 5% 7% 37% "name="eliminar" value="Enviar" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
	</form>
</div>

<?php }
	}
} ?>
