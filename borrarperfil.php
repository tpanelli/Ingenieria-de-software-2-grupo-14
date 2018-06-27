<?php
include_once 'archivoconexion.php';
session_start();
$link = conectar();
$mail = $_SESSION['mail'];
$pagos = mysqli_query($link, "SELECT * FROM pago WHERE mail = '$mail' AND realizado = '0'");
$calificaciones = mysqli_query($link, "SELECT * FROM calificaciones WHERE mailvoto = '$mail' AND realizado = '0'");
$cantCalificaciones = mysqli_num_rows($calificaciones);    
$cantDeudas = mysqli_num_rows($pagos);
$viajesPendientes = mysqli_query($link, "SELECT * FROM viaje WHERE mail = '$mail' and realizado = '0'");
$viajesPendientes = mysqli_num_rows($viajesPendientes);
if($viajesPendientes == 0){
	if($cantCalificaciones == 0){ 
		if ($cantDeudas == 0) {   	
			$consulta="UPDATE usuario SET activo=0 WHERE mail='$mail'";
			mysqli_query($link, $consulta);
			header('Location: cerrar.php');
		}
		else {
			header('location: pagerrores.php?errores=deuda');
		}
	} 
	else {
		header('location: pagerrores.php?errores=debesCali'); 
    }
}
else {
	header('location: pagerrores.php?errores=viajesPendientes'); 
}
?>