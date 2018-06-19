<?php include "barra.php"; 
$idviaje = $_GET ['idviaje'];
$postulantes = mysqli_query ($link, "SELECT * FROM viaje_usuario WHERE idviaje = $idviaje");
echo "Postulantes: <br>";
while ($postulante = mysqli_fetch_array($postulantes)){
	echo $postulante['mail'],' ';
	$aceptado = $postulante ['aceptado'];
	switch($aceptado){
		case 0: echo 'pendiente<br>'; break;
		case 1: echo 'aceptado<br>'; break;
		case 2: echo 'rechazado<br>'; break;
	}
}
?>