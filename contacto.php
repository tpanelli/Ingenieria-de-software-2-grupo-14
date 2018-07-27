<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
?>
<div style="height: 60%" class="cuadradoViaje">
	<h1 style="color: black;margin-left:10px"> Para realizar alguna consulta sobre UnAventon, escribinos </h1>
	<br>
	<form name="comentar" method="post" action="consulta.php" onsubmit="return validarComent()">
		<h3>Consulta:</h3>
		<textarea name="comentario" class="caballoContacto" placeholder="Consulta..."required/></textarea>
		<?php if($objeto->Logueado()){ ?>
			<br>
			<h3>Se enviará la respuesta a <?php echo $_SESSION['mail'] ?></h3>
			<br>
		<?php }else{?>	
			<h3>Mail de referencia:</h3>
			<input type="text" title="mail@ejemplo.com" id="mail" name="mail" class="caballo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="E-Mail..."required/>
		<?php } ?>
		<input style="margin:2% 5% 7% 37% "name="enviar" value="Enviar" type="submit" class="botonEliminar"></input>
	</form>
</div>