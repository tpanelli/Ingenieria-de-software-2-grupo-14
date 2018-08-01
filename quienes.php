<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
?>
<div style="height: 60%; margin-left:20%" class="cuadradoViaje">
	<h2 style="color: black;margin-left:16%"> UnAventon: Innovacion en viajes de corta y larga distancia </h2>
	<br>
	<h3 style="margin-left:13%">Para publicitar su negocio o empresa, comuniquese con: prensa@unaventon.com</h3>
	<br>
	<h3>Presente en Argentina desde el 2018, UnAventon es la mejor y mas nueva red social relacionada a viajes de corta y larga distancia en vehiculo compartido. La red social pone en contacto a personas que quieren realizar un viaje común y coinciden para hacerlo el mismo día.</h3>
	<br>
	<h3>Los usuarios comparten los gastos del viaje sin obtener beneficio. Para esto, UnAventon propone que el conductor cotice su viaje y que este monto se divida entre los participantes del viaje, de modo de repartir gastos de combustible, peaje, mantenimiento, seguros, impuestos, etc. </h3>
	<h3>¿Desea saber mas sobre como utilizar la aplicacion?:<a href="ayuda.php"><button style="margin:8%" class="botonEliminar"> Ayuda </button></a></h3>
	</div>

