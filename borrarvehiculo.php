<?php
include_once 'archivoconexion.php';
session_start();
$link = conectar();
$patente= $_GET['p'];
$mail = $_SESSION['mail'];
$viajesVehiculo = mysqli_query($link, "SELECT * FROM viaje WHERE patente = '$patente' and mail='$mail' and realizado = '0'");
if (mysqli_num_rows($viajesVehiculo) != 0){
	header ('Location:pagerrores.php?errores=autoViaje');
}
else {
$consulta="UPDATE vehiculo SET activo = '0' WHERE `patente`= '$patente' and mail='$mail'";
mysqli_query($link, $consulta);
header('Location: listarvehiculos.php');
}
?>