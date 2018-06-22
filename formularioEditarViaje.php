<?php include 'barra.php';
$idviaje = $_GET ['idviaje'];
$postulantes = mysqli_query ($link, "SELECT * FROM viaje_usuario WHERE idviaje = $idviaje and aceptado < 2");
if (mysqli_num_rows($postulantes) != 0){ ?>
	<div class="noSeEncontraronResultados">No se puede editar. <br> Hay postulantes en su viaje.<br><br>
	<button class="botonLogin" onclick="goBack()">Volver</button>
	</div>
<?php }
else {
$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = $idviaje");
$datos = mysqli_fetch_array($viaje);
$patente = $datos['patente'];
$mail = $datos ['mail'];
$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente' and mail = '$mail'");
$vehiculo = mysqli_fetch_array($vehiculo);
$usuario =  mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
$usuario =  mysqli_fetch_array($usuario);
?>
<form name="editar" method="post"  action="editarViaje.php" class="input" enctype="multipart/form-data"> 
<div class="cuadradoViaje"> 
	 Origen: <select name="origen" required/>
					<?php
						$result=mysqli_query($link, 'SELECT * FROM ciudad');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['nombreciudad'] ?>"<?php if($row['nombreciudad']==$datos['ciudadOrigen']) echo 'selected'?>> <?php echo $row['nombreciudad']; ?></option>
							<?php
							}
							?>
			    </select><br><br>
	 Destino: <select name="destino" required/>
					<?php
						$result=mysqli_query($link, 'SELECT * FROM ciudad');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['nombreciudad'] ?>"<?php if($row['nombreciudad']==$datos['ciudadDestino']) echo 'selected'?>> <?php echo $row['nombreciudad']; ?></option>
							<?php
							}
							?>
			    </select><br><br>
	 Salida: <input type="date" name="dia" value='<?php echo $datos['dia']?>' required/></input> 
	 <input type="time" name="hora" value='<?php echo $datos ['hora'];?>' required/></input><br><br>
	 Duracion: <input type="time" name="duracion" value='<?php echo $datos ['duracion']; ?>'></input>
	 <div class="conductorViaje">
	  <?php echo $vehiculo ['marca'],' ', $vehiculo ['modelo']; ?> <br><br>
	  <?php echo 'Color: ', $vehiculo['color']; ?> <br><br>
	  Conductor: <a href='verPerfilAjeno.php?mail=<?php echo $usuario['mail']?>' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  <textarea name="detalle" style="resize:none;height:80px;width:500px;" required/><?php echo $datos['detalle']; ?></textarea>
	 </div>
	 <input type="hidden" name="idviaje" value="<?php echo $idviaje ?>"> </input>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input type="submit" class='botonViajePublicado'></input>
</form>
<?php } ?>