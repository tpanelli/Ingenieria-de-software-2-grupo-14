<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$idviaje = $_POST ['idviaje'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$duracion = $_POST ['duracion'];
$detalle = $_POST ['detalle'];
$costo = $_POST['costo'];
$consulta = "UPDATE viaje SET ciudadOrigen='$origen', ciudadDestino='$destino', dia='$dia', hora='$hora', duracion='$duracion', detalle='$detalle', costo=$costo WHERE idviaje = $idviaje";
mysqli_query ($link, $consulta);
header("Location: viajesPublicados.php");
?>