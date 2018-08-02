<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
?>
<div style="height: 60%; margin-left:20%; position:relative; overflow: auto;" class="cuadradoViaje">
	<h1>Guía de UnAventon</h1>
	<h2>Publicar un viaje:</h2>
	<h3>Cumpliendo con la condicion de haber pagado y de haber calificado a los pasajeros o al conductor en todos los viajes anteriores ya realizados (se explicará mas adelante), se podra acceder a esta posibilidad de publicar un viaje.
	<br>Se presentaran dos opciones con el tipo de viaje que se desea publicar (ocasional o periodico). Una vez elegido el tipo, se debe completar el formulario correspondiente al mismo, y de esta forma, publicar el viaje.
	<br> Una vez publicado el viaje, tendras la posibilidad de elegir entre los postulantes al mismo, quienes viajaran o no.
	<br>Si por algun motivo personal el dueño del viaje desea cancelarlo, puede hacerlo, pero en el caso de tener postulantes aceptados, tendra una penalizacion.</h3>
	<br>
	<h2>Postularse a un viaje:</h2>
	<h3>En la pantalla de inicio van a aparecer los viajes que se haran dentro de los proximos 30 dias. El usuario podrá postularse a cualquiera de estos, siempre y cuando cumpla con las condiciones de no deber ni pagos ni calificaciones de viajes anteriores. De esta forma entrará a una "lista de espera" donde el propietario del viaje decidirá si viaja con el o no.</h3>
	<br>
	<h2>Bajarse de un viaje:</h2>
	<h3>Una vez aceptado en el viaje, si por algun motivo personal el usuario decide no viajar, puede bajarse de un viaje, pero si ya estaba aceptado para viajar, tendra una penalizacion.</h3>
	<br>
	<h2>Pagar deudas:</h2>
	<h3>Cuando se concreta un viaje, se genera una deuda que aparecerá en la seccion "Paga tus deudas". El usuario podra pagarla con tarjeta de credito registrada en la aplicacion o con su saldo personal de la aplicacion.</h3>
	<br>
	<h2>Calificar usuarios:</h2>
	<h3>Una vez terminado el viaje, se habilitan las calificaciones para los usuarios (tanto para el conductor como para los pasajeros). El conductor podra puntuar a los pasajeros, y los viceversa.<br>
	En la seccion "Calificaciones pendientes" se encontrarán los viajes en los que debe calificaciones.</h3>
	<br>
	<h2>Registrar un vehículo:</h2>
	<h3>En la seccion "Mis vehículos" aparecerán los vehículos registrados en la cuenta del usuario. En caso de no tener uno registrado, puede hacerlo clickeando el boton "Registrar nuevo" y llenar el formulario correspondiente.</h3>
	<br>
	<h2>Registrar una tarjeta:</h2>
	<h3>En caso de que el usuario desée registrar una tarjeta, en la seccion "Registrar tarjeta" debe llenar el formulario que es solicitado con los datos propios de la tarjeta. Esta tarjeta que registre, quedará como opción para utilizarla en un pago futuro.</h3>
	<br>
	<h2>Buscar un viaje:</h2>
	<h3>Un usuario puede buscar un viaje ingresando los datos que él quiera (origen, destino, fecha o tipo de vehículo).</h3>
	<br>
	<h2>Ver perfiles:</h2>
	<h3>Para ver el perfil propio el usuario debe clickear sobre su nombre en la esquina superior derecha. Alli podra ver todos sus datos, sus calificaciones, su saldo y tendrá la posibilidad de editar su perfil y de borrarlo.
	<br>Para ver un perfil ajeno debe tocar en el nombre de otro usuario. Alli podra ver los datos del mismo, asi como tambien su puntuación tanto de conductor como de pasajero y los comentarios que dejaron sobre él otros usuarios.</h3>
</div>