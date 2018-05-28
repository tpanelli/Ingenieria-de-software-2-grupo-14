<html>
<?php 
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
	
?>
<?php 
	if($objeto->Logueado()){ ?>
		<div class= "registrar">
			<h1 style="color: black;margin-left:80px"> Registra tu tarjeta </h1>
			<form method="POST" action="enviartarjeta.php" class="input" onsubmit= "return validarRegistro()">
				<label style="color: black"> Numero de tarjeta </label>
				<br>
				<input type="text" class="chico" maxlength="4" name="numero" placeholder="XXXX"  pattern="[0-9]{4}" required/>
				- <input type="text" class="chico" maxlength="4" name="numero2" placeholder="XXXX" pattern="[0-9]{4}" required/>
				- <input type="text" class="chico" maxlength="4" name="numero3" placeholder="XXXX" pattern="[0-9]{4}" required/>
				- <input type="text" class="chico" maxlength="4" name="numero4" placeholder="XXXX" pattern="[0-9]{4}" required/>
				<br>
				<label style="color: black"> Fecha de vencimiento </label>
				<br>
				<input type="text" class="chico" maxlength="2" name="fecha1" placeholder="MM" pattern="[0-9]{2}" required/> 
				/ <input type="text" class="chico" maxlength="2" name="fecha2" placeholder="AA" pattern="[0-9]{2}" required/>
				<br><br>
				<input type="submit" class="botonRegistrarse" value="Enviar">
			</form>
		</div>
	<?php 
	} 
	else{ ?>
		<div class= "registrar">
			<h1 style="color: black;margin:5%;text-align:centre"> Debes estar logueado para registrar una tarjeta </h1>
			<div><a href="index.php"><button style="margin:10%" class="botonregistrarse"> Volver al inicio </button></a></div>
		</div>
	<?php }?>
</body>
</html>