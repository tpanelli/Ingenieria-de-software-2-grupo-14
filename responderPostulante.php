<?php
include"archivoconexion.php";
$link = conectar();
session_start();
$id=$_GET['id'];
$idviaje=$_GET['idviaje'];
$mail=$_GET['mail'];
if($id==3){
	$mailvotado = $_SESSION['mail'];
	$mailvoto='UnAventon';
	$reseña='Elimino a un pasajero aceptado';
	$puntaje=0;
	$rol='conductor';
	$realizado=1;
	$consulta = "INSERT INTO calificaciones (mailvoto, mailvotado, resenia, puntaje, rol, realizado, idviaje) VALUES ('$mailvoto', '$mailvotado', '$reseña', '$puntaje', '$rol',
	'$realizado', '$idviaje')";
	mysqli_query($link, $consulta);
	mysqli_query($link,"DELETE FROM viaje_usuario WHERE mail='$mail' and idviaje = '$idviaje'");
	header("location: verPostulantes.php?idviaje=$idviaje");
}else{
	mysqli_query($link,"UPDATE viaje_usuario SET aceptado='$id' WHERE mail='$mail' and idviaje='$idviaje'");
	header("location: verPostulantes.php?idviaje=$idviaje");
}
?>