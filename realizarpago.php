<?php
include 'barra.php';
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$idpago=$_POST['idpago'];
$pagos = mysqli_query($link, "SELECT * FROM pago WHERE idpago = '$idpago'");
$pago = mysqli_fetch_array($pagos);
	$idviaje= $pago['idviaje'];
	$monto= $pago['monto'];
	$viajes = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje='$idviaje'");
	$viaje = mysqli_fetch_array($viajes);
		$mail=$viaje['mail'];
		$usuarios = mysqli_query($link, "SELECT * FROM usuario WHERE mail='$mail'");
		$usuario = mysqli_fetch_array($usuarios);
			mysqli_query($link,"UPDATE usuario SET saldo=saldo+$monto WHERE mail='$mail'");
	mysqli_query($link,"UPDATE pago SET realizado=1 WHERE idpago='$idpago'");
	header('Location: pagoRealizado.php');

?>