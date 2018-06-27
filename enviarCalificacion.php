<?php
include_once 'archivoconexion.php';
$link = conectar();
$puntaje = $_POST['puntuacion'];
$mail = $_POST['mail'];
$idviaje = $_POST['idviaje'];
$resenia = $_POST['comentario'];
$calificacionPendiente = mysqli_query($link, "SELECT * FROM calificaciones WHERE idviaje = '$idviaje' and mailvoto = '$mail' and realizado = '0'");
$calificacionPendiente = mysqli_fetch_array($calificacionPendiente);
$idcalificacion = $calificacionPendiente['id_cp'];
mysqli_query($link, "UPDATE calificaciones SET puntaje = '$puntaje', resenia = '$resenia', realizado = '1' WHERE id_cp = '$idcalificacion'");
header('Location: calificacionesPendientes.php');
