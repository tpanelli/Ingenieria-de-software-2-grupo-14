<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="validacion.js"></script>
</head>
<?php 
 include 'barra.php';
 include_once"archivoconexion.php";
  $link = conectar();
  $result = mysqli_query($link,"select * from usuario where mail = '$_GET[mail]'");
  $row = mysqli_fetch_array($result);
  $calificacionP=mysqli_query($link,"select sum(puntaje) / count(*) as promedio from calificaciones where mailvotado ='$_GET[mail]' and rol='pasajero'");
  $calificacionC=mysqli_query($link,"select sum(puntaje) / count(*) as promedio from calificaciones where mailvotado ='$_GET[mail]' and rol='conductor'");
  $cp=mysqli_fetch_array($calificacionP);
  $cc=mysqli_fetch_array($calificacionC);
?>

<div class="perfil">
	<div class="nombrePerfil"> <?php echo $row['nombre'],' ', $row['apellido'] ?> </div>
</div>
<div class="cuadrado">
<?php 
    $comentarios = mysqli_query($link,"select * from calificaciones where mailvotado = '$_GET[mail]' and realizado = '1'");
	while($comentario = mysqli_fetch_array($comentarios)){

?>
		<table class="comentario"><tr>
			<td><?php echo $comentario['resenia']?><td>
			<td><?php echo $comentario['puntaje']?><td>
		</table>
	<?php } ?>
		</div>
<div class="datos">
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 E-Mail: <?php echo $row['mail']?><br><br>
	 Nacimiento: <?php $fecha=$row['fechanac']; echo date("d/m/Y", strtotime($fecha));?>
	 </div>
	 <?php if ($_GET['mail']== $_SESSION['mail']){?>
	 <div>
			<div><a href="editarPerfil.php"><button class="botonEditarPerfil"> Editar perfil </button></a></div>
	</div>
	<div>
			<div><a href="borrarperfil.php"><button class="botonEditarPerfil" onclick="return Confirmar('¿Esta seguro que desea borrar su cuenta?')"> Borrar cuenta </button></a></div>
	</div>
	 <?php } ?>
</div>
<div class="datos">
     <div style="font-size: 35px; color: white; margin-left: 10%; margin-top: 2%"> Calificaciones </div>
	<div style="color:white; font-size:25px; margin-top: 5% ; margin-left:5%">
	 Conductor: %<?php echo $cp['promedio']*100?> <br><br>
	 Pasajero: %<?php echo $cc['promedio']*100?> 
</div>
</body>
</html>