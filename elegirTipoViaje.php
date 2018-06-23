<?php include 'barra.php';
$mail = $_SESSION['mail'];
$vehiculos = mysqli_query($link, "SELECT * FROM vehiculo WHERE mail = '$mail'");
if (mysqli_num_rows($vehiculos) == 0) { ?>
	 <div class="noSeEncontraronResultados">Usted no posee vehiculos registrados<br><br>
	 <a href="formularioregistrarvehiculo.php"><button class="botonLogin">Registrar vehiculo</button></a>
	 <button class="botonLogin" onclick="goBack()">Volver</button>
	 </div>
	 <?php
} else { ?>
		<div class="noSeEncontraronResultados"> Que tipo de viaje desea publicar?<br><br>
		<?php $result=mysqli_query($link, 'SELECT * FROM tipoviaje');
			while ($row = mysqli_fetch_array ($result)){
				?>
				<a href="formularioPublicarViaje.php?tipo=<?php echo $row['tipo'];?>"><button class="botonLogin"><?php echo $row['tipo']; ?></button></a>
				<?php
				} ?>							
</div> 
<?php } ?>