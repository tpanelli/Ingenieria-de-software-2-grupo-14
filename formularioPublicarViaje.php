<?php include 'barra.php';
$mail = $_SESSION['mail'];
$vehiculos = mysqli_query($link, "SELECT * FROM vehiculo WHERE mail = '$mail'");
$tipo = $_GET['tipo'];
if ($tipo == 'Ocasional'){
		include 'formularioOcasional.php';
} 
else {
	include 'formularioPeriodico.php';
} 
?>