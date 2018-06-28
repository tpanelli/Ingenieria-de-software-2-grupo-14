<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
echo $mail=$_GET['mail'];
$postulaciones = mysqli_query($link, "SELECT * FROM viaje_usuario WHERE mail = '$mail'");
$postulacion = mysqli_fetch_array($postulaciones);
echo $aceptado = $postulacion['aceptado'];
echo $idviaje= $postulacion['idviaje'];
if($aceptado==1){
	$mailvoto='UnAventon';
	$reseña='Se bajo un viaje estando aceptado';
	$puntaje=0;
	$rol='pasajero';
	$realizado=1;
	$consulta = "INSERT INTO calificaciones (mailvoto, mailvotado, resenia, puntaje, rol, realizado, idviaje) VALUES ('$mailvoto', '$mail', '$reseña', '$puntaje', '$rol',
	'$realizado', '$idviaje')";
	mysqli_query($link,$consulta);
	mysqli_query($link,"DELETE FROM viaje_usuario WHERE idviaje='$idviaje' and mail='$mail'");
}else{
	if($aceptado==0){
		mysqli_query($link,"DELETE FROM viaje_usuario WHERE idviaje='$idviaje' and mail='$mail'");
	}
}
header('Location: pagerrores.php?errores=bajado');