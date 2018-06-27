<?php  
     include 'barra.php';
     include_once 'archivoconexion.php';
	 $link = conectar();
	 mysqli_set_charset($link, "utf8");
	 $mail=$_SESSION['mail'];
	 $autoscorrectos= mysqli_query($link, "SELECT * FROM `vehiculo` WHERE mail='$mail' and activo = '1'");
     if (mysqli_num_rows($autoscorrectos) == 0){?>
		 <div class="noSeEncontraronResultados">Usted no posee vehiculos registrados<br><br>
			<a href="formularioregistrarvehiculo.php"><button class="botonLogin">Registrar nuevo</button></a>
        </div>
	 <?php }
	 else {
	 while ($autocorrecto = mysqli_fetch_array ($autoscorrectos)){
		$patente = $autocorrecto['patente'];
		$auto = mysqli_query($link, "SELECT * FROM `vehiculo` WHERE patente = '$patente' and  mail='$mail'");
		while ($datos = mysqli_fetch_array ($auto)){?>
		<table class="mostrarauto"><tr>
			<td class="nombre"><img class="imagenauto" src= "<?php echo "mostrarImagen.php?patente=$patente";?>"><td>
			<td class="nombre"> <?php echo $datos['marca'],' '; echo $datos['modelo'] ?><td>
			<td class="nombre"><?php echo 'Patente: '.$datos['patente'],' '; echo '<br><br>Capacidad: '.$datos['capacidad'],' ';?><td>
			<td class="nombre"><?php echo 'Color: '.$datos['color'],' '; echo '<br><br>Tipo: '.$datos['nombretipo']; ?><td>
			<a  href="formularioeditarvehiculo.php?p=<?php echo $patente ?>" ><input name="editar" value="Editar" type="submit" class="botonEliminar" ></input></a>
			<a href="borrarvehiculo.php?p=<?php echo $patente ?>"><input name="borrar" value="Borrar" type="submit" class="botonEliminar"  onclick="return Confirmar('¿Esta seguro que desea borrar el vehiculo?')"></input></a>
		</table>
		<?php }
	 } 
?>
  <a href="formularioregistrarvehiculo.php"> <button class="registrarauto">Registrar nuevo</button></a> 
	 <?php } ?>
</body>
</html>

	