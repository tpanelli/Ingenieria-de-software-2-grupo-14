<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$idviaje=$_GET['idviaje'];
$pasajeros=mysqli_query($link, "SELECT * FROM viaje_usuario WHERE idviaje = '$idviaje' and aceptado = 1");
if(mysqli_num_rows($pasajeros) != 0){
	$viajes=mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = $idviaje");
	$viaje = mysqli_fetch_array($viajes);
	$mailvotado = $viaje['mail'];
	$mailvoto='UnAventon';
	$reseña='Cancelo un viaje con pasajeros aceptados';
	$puntaje=0;
	$rol='conductor';
	$realizado=1;
	$realiza2=2;
	$consulta = "INSERT INTO calificaciones (mailvoto, mailvotado, resenia, puntaje, rol, realizado, idviaje) VALUES ('$mailvoto', '$mailvotado', '$reseña', '$puntaje', '$rol',
	'$realizado', '$idviaje')";
	mysqli_query($link,$consulta);
	$consulta2 = "INSERT INTO calificaciones (mailvoto, mailvotado, resenia, puntaje, rol, realizado, idviaje) VALUES ('$mailvoto', '$mailvotado', '$reseña', '$puntaje', '$rol',
	'$realiza2', '$idviaje')";
	mysqli_query($link,$consulta2);
	$consulta3 = "INSERT INTO calificaciones (mailvoto, mailvotado, resenia, puntaje, rol, realizado, idviaje) VALUES ('$mailvoto', '$mailvotado', '$reseña', '$puntaje', '$rol',
	'$realiza2', '$idviaje')";
	mysqli_query($link,$consulta3);
	mysqli_query($link,"DELETE FROM `viaje` WHERE idviaje=$idviaje");
}else{
	mysqli_query($link,"DELETE FROM `viaje` WHERE idviaje=$idviaje");
}
header('Location: pagerrores.php?errores=viajeEliminado');