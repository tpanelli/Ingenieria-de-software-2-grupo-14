<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
?>
<div style="height: 60%; margin-left:20%; display: inline_block;" class="cuadradoViaje">
	<h1>Guía de UnAventon</h1>
	<h2>Publicar un viaje:</h2>
	<h3>Cumpliendo con la condicion de haber pagado y de haber calificado a los pasajeros o al conductor en todos los viajes anteriores ya realizados (se explicará mas adelante), se podra acceder a esta posibilidad de publicar un viaje.
	<br>Se presentaran dos opciones con el tipo de viaje que se desea publicar (ocasional o periodico). Una vez elegido el tipo, se debe completar el formulario correspondiente al mismo, y de esta forma, publicar el viaje.
	<br> Una vez publicado el viaje, tendras la posibilidad de elegir entre los postulantes al mismo, quienes viajaran o no.
	<br>Si por algun motivo personal el dueño del viaje desea cancelarlo, puede hacerlo, pero en el caso de tener postulantes aceptados, tendra una penalizacion.</h3>
	<h2>Postularse a un viaje:</h2>
	<h3>En la pantalla de inicio van a aparecer los viajes que se haran dentro de los proximos 30 dias. El usuario podrá postularse a cualquiera de estos, siempre y cuando cumpla con las condiciones de no deber ni pagos ni calificaciones de viajes anteriores. De esta forma entrará a una "lista de espera" donde el propietario del viaje decidirá si viaja con el o no.</h3>
	<h2>Bajarse de un viaje:</h2>
	<h3>Una vez aceptado en el viaje, si por algun motivo personal el usuario decide no viajar, puede bajarse de un viaje, pero si ya estaba aceptado para viajar, tendra una penalizacion.</h3>
	<h2>Pagar deudas:</h2>
	<h3>Cuando se concreta un viaje, se genera una deuda. El usuario podra pagarla con tarjeta de credito registrada en la aplicacion o con su saldo personal de la aplicacion</h3>
</div>