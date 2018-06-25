<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
session_start();
$mail = $_SESSION['mail'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$primerViaje = $_POST['primerViaje'];
$ultimoViaje = $_POST['ultimoViaje'];
$hora = $_POST['hora'];
$duracion = $_POST ['duracion'];
$detalle = $_POST ['detalle'];
$costo = $_POST['costo'];
$patente = $_POST ['patente'];
$dias = $_POST['dias'];
$sizeArreglo = count($dias);
for($i=$primerViaje;$i<=$ultimoViaje;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
   for($j=0;$j<$sizeArreglo;$j++){
	   if( (date('l', strtotime($i))) == $dias[$j]){
		   $consulta = "INSERT INTO viaje (ciudadOrigen, ciudadDestino, dia, hora, duracion, detalle, costo, mail, patente) VALUES ('$origen', '$destino', '$i', '$hora', '$duracion',
		   '$detalle', '$costo', '$mail', '$patente')";
		   mysqli_query ($link, $consulta);
	   }
   }
}
header("Location: viajesPublicados.php"); 
?>