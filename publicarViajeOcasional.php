<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
session_start();
$mail = $_SESSION['mail'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$duracion = $_POST ['duracion'];
$detalle = $_POST ['detalle'];
$costo = $_POST['costo'];
$patente = $_POST ['patente'];
$fechaInicio = $dia.' '.$hora.':00';
$fechaInicio= date_create_from_format("Y-m-d H:i:s", $fechaInicio);
$agregar = 'P0000-00-00T'.$duracion.':00';
$intervalo = new DateInterval($agregar);
$fechaFin =  date_create_from_format("Y-m-d H:i:s", date_format($fechaInicio, "Y-m-d H:i:s"));
$fechaFin->add($intervalo);
$viajesUsuario = mysqli_query($link, "SELECT * FROM viaje WHERE  mail = '$mail' and realizado = '0'");
while($viaje = mysqli_fetch_array($viajesUsuario)){
	$inicioViaje = $viaje['dia'].' '.$viaje['hora'];
	$inicioViaje= date_create_from_format("Y-m-d H:i:s", $inicioViaje);
	$agregar = 'P0000-00-00T'.$viaje['duracion'];
	$intervalo = new DateInterval($agregar);
	$finViaje =date_create_from_format("Y-m-d H:i:s", date_format($inicioViaje, "Y-m-d H:i:s"));
	$finViaje->add($intervalo);
	$coincide = false; //si pasa los 3 filtros, se puede cargar el viaje
	if (($fechaInicio >= $inicioViaje) and ($fechaInicio <= $finViaje) and ($fechaFin >= $inicioViaje) and ($fechaFin <= $finViaje)){
	     $coincide = true;
	}
	elseif (($fechaInicio < $inicioViaje) and ($fechaFin > $inicioViaje)){
		$coincide = true;
	}
	elseif (($fechaInicio < $finViaje) and ($fechaFin > $finViaje)){
		$coincide = true;
	}
	if($coincide) {
			header("Location: errorviaje.php?idviaje=$viaje[idviaje]&error=mail");
			exit;
	}
}
$consulta = "INSERT INTO viaje (ciudadOrigen, ciudadDestino, dia, hora, duracion, detalle, costo, nombreTipoViaje, mail, patente) VALUES ('$origen', '$destino', '$dia', '$hora', '$duracion',
'$detalle', '$costo', '$tipo', '$mail', '$patente')";
mysqli_query ($link, $consulta);
header("Location: viajesPendientes.php"); 
?>