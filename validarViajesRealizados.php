<?php 
include_once 'archivoconexion.php';
$link = conectar();
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_actual = new DateTime();
$hoy = date('Y-m-d');
$viajes= mysqli_query($link, "SELECT * FROM viaje WHERE realizado = 0 and dia <= '$hoy'");
while ($datos = mysqli_fetch_array($viajes)){
	$duracion= $datos['duracion'];
	$date = $datos['dia'].' '.$datos['hora'];
	$date = date_create_from_format("Y-m-d H:i:s", $date);
	$agregar = 'P0000-00-00T'.$duracion;
	$intervalo = new DateInterval($agregar);
	$date->add($intervalo);
	if ($date < $fecha_actual){ //si se realizo el viaje
		 mysqli_query($link,"UPDATE viaje SET realizado = 1 WHERE idviaje='$datos[idviaje]'");
		 $pasajeros = mysqli_query($link, "SELECT mail FROM viaje_usuario WHERE idviaje = $datos[idviaje] and aceptado = 1");
		 $conductor = $datos['mail'];
		 while ($pasajero = mysqli_fetch_array($pasajeros)){ 
			 //cargo calificaciones por cada pasajero
			 mysqli_query($link, "INSERT INTO calificaciones (mailvoto, mailvotado, rol,idviaje) VALUES ('$conductor', '$pasajero[mail]', 'pasajero','$datos[idviaje]')");
			 mysqli_query($link, "INSERT INTO calificaciones (mailvoto, mailvotado, rol,idviaje) VALUES ('$pasajero[mail]', '$conductor', 'conductor','$datos[idviaje]')");
			 //cargo el pago
			 mysqli_query($link, "INSERT INTO pago (mail, fecha, monto,idviaje) VALUES ('$pasajero[mail]', '$datos[dia]', '$datos[costo]','$datos[idviaje]')");
		 }
	}
}