<?php include 'barra.php';
$idviaje = $_GET['idviaje'];
$viaje = mysqli_query($link, "SELECT * FROM viaje WHERE idviaje = '$idviaje'");
$viaje = mysqli_fetch_array($viaje);
$error = $_GET['error'];
switch($error){
		case 'mail':
			$string = 'No se puede publicar el viaje. Usted tiene un viaje publicado el dia '.
					  date("d/m/Y", strtotime($viaje['dia'])).' a las '.substr($viaje ['hora'], 0, -3).' hs, coincidiendo con el nuevo viaje'; 
		break;
		case 'vehiculo':
			$string = 'No se puede publicar el viaje. Su vehiculo sera utilizado para un viaje el dia '. 
					  date("d/m/Y", strtotime($viaje['dia'])).' a las '. substr($viaje ['hora'], 0, -3).' hs, coincidiendo con el nuevo viaje';
		break;
}
?>
<div class="noSeEncontraronResultados">
	<?php echo $string ?><br><br>
	<button class="botonLogin" onclick="goBack()">Volver</button>
</div>