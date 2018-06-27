<?php include "barra.php"; 
$mail = $_SESSION['mail'];
$fecha_actual = date("y-m-d");
$viajes = mysqli_query($link, "SELECT * FROM viaje WHERE mail = '$mail'");
if (mysqli_num_rows($viajes) == 0) { ?>
	 <div class="noSeEncontraronResultados">Usted no ha publicado viajes<br><br>
<?php
} else{ ?>
	<div style="margin_bottom:22%"class="noSeEncontraronResultados"> Que viajes deseas ver?<br><br>
				<a href="viajesPendientes.php"><button class="botonLogin">Pendientes</button></a> 
				<a href="viajesFinalizados.php"><button class="botonLogin">Finalizados</button></a>
	</div>
<?php } ?>