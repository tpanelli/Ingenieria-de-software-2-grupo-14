<?php 
include_once 'archivoconexion.php';
$link = conectar();
$capacidad = $vehiculo ['capacidad'];
$pasajeros = mysqli_query($link, "SELECT * FROM viaje_usuario WHERE idviaje = $idviaje and aceptado = 1");
$pasajeros = mysqli_num_rows($pasajeros);
$disponibles = $capacidad - $pasajeros;
echo $disponibles;
?>