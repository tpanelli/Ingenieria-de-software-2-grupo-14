<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
session_start();
$mail = $_SESSION['mail'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$primerViaje = $_POST['primerViaje'];
$ultimoViaje = $_POST['ultimoViaje'];
$hora = $_POST['hora'];
$duracion = $_POST ['duracion'];
$detalle = $_POST ['detalle'];
$costo = $_POST['costo'];
$patente = $_POST ['patente'];
$dias = $_POST['dias'];
$sizeArreglo = count($dias);
$viajesUsuario = mysqli_query($link, "SELECT * FROM viaje WHERE  mail = '$mail' and realizado = '0'");
for($i=$primerViaje;$i<=$ultimoViaje;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
   for($j=0;$j<$sizeArreglo;$j++){
	   if( (date('l', strtotime($i))) == $dias[$j]){
			$fechaInicio = $i.' '.$hora.':00';
			$fechaInicio= date_create_from_format("Y-m-d H:i:s", $fechaInicio);
			$agregar = 'P0000-00-00T'.$duracion.':00';
			$intervalo = new DateInterval($agregar);
			$fechaFin =  date_create_from_format("Y-m-d H:i:s", date_format($fechaInicio, "Y-m-d H:i:s"));
			$fechaFin->add($intervalo);
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
			
	   }
   }
}
for($i=$primerViaje;$i<=$ultimoViaje;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
   for($j=0;$j<$sizeArreglo;$j++){
	   if( (date('l', strtotime($i))) == $dias[$j]){
			 $consulta = "INSERT INTO viaje (ciudadOrigen, ciudadDestino, dia, hora, duracion, detalle, costo, mail, patente) VALUES ('$origen', '$destino', '$i', '$hora', '$duracion',
					   '$detalle', '$costo', '$mail', '$patente')";
			mysqli_query ($link, $consulta);
	   }
   }
}
header("Location: viajesPublicados.php"); 
?>