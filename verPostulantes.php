<?php include "barra.php"; 
$idviaje = $_GET ['idviaje'];
$postulantes = mysqli_query ($link, "SELECT * FROM viaje_usuario WHERE idviaje = $idviaje");
?>
<h1 style="color: black;margin-left:80px"> Postulantes </h1>
<table id="t01" class="postular">
<tr>
    <th class="nombre">Nombre y apellido</th>
    <th class="nombre">Mail</th> 
    <th class="nombre">Estado</th>
	<th class="nombre">Acciones</th>
	<th class="nombre"></th>
  </tr>
<?php
while ($postulante = mysqli_fetch_array($postulantes)){
	$mail = $postulante['mail'];
	$us = mysqli_query ($link, "SELECT * FROM usuario WHERE mail = '$mail'");
	$us = mysqli_fetch_array($us);
	$nombre = $us ['nombre'].' '.$us ['apellido'];
	$aceptado = $postulante ['aceptado'];
?>
			<tr>
			<td class="nombre"> <?php echo $nombre;?></td>
			<td class="nombre"> <?php echo $mail;?></td>
			<td class="nombre"><?php switch($aceptado){
										case 0: echo 'Pendiente'; break;
										case 1: echo 'Aceptado'; break;
										case 2: echo 'Rechazado'; break;
									}?></td>
			<?php
			switch($aceptado){
				case 0:?><td class="nombre"><a href='responderPostulante.php?mail=<?php echo$mail ?>&id=1&idviaje=<?php echo$idviaje ?>'><button class='botonEliminar'> Aceptar </button></a> 
						<td class="nombre"><a href='responderPostulante.php?mail=<?php echo$mail ?>&id=2&idviaje=<?php echo$idviaje ?>'><button class='botonEliminar'> Rechazar </button></a> </td>
		<?php ; break;
				case 1:?>
						<td class="nombre"><a href='responderPostulante.php?mail=<?php echo$mail ?>&id=3&idviaje=<?php echo$idviaje ?>'><button class='botonEliminar'onclick="return Confirmar('¿Esta seguro que desea eliminar al pasajero?')"> Eliminar </button></a> </td>
		<?php ; break;
				case 2:?>
						<td class="nombre">'El pasajero ha sido rechazado'</td>
		<?php ; break;
			
			}
}
?>
</table>