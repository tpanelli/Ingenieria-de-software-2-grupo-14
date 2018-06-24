<?php
include"archivoconexion.php";
$link = conectar();
$id=$_GET['id'];
$idviaje=$_GET['idviaje'];
$mail=$_GET['mail'];
if($id=3){
	mysqli_query($link,"DELETE FROM viaje_usuario WHERE mail='$mail'");
	header("location: verPostulantes.php?idviaje=$idviaje");
}else{
	mysqli_query($link,"UPDATE viaje_usuario SET aceptado='$id' WHERE mail='$mail'");
	header("location: verPostulantes.php?idviaje=$idviaje");
}
?>