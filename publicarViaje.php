<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
session_start();
$mail = $_SESSION['mail'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$duracion = $_POST ['duracion'];
$detalle = $_POST ['detalle'];
$costo = $_POST['costo'];
$tipo = $_POST['tipo'];
$patente = $_POST ['patente'];
$consulta = "INSERT INTO viaje (ciudadOrigen, ciudadDestino, dia, hora, duracion, detalle, costo, nombreTipoViaje, mail, patente) VALUES ('$origen', '$destino', '$dia', '$hora', '$duracion',
'$detalle', '$costo', '$tipo', '$mail', '$patente')";
mysqli_query ($link, $consulta);
header("Location: viajesPublicados.php"); 
?>