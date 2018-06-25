<?php
	include 'archivoconexion.php';
	$link = conectar();
    mysqli_set_charset($link, "utf8");
	include 'barra.php';
	$mail = $_SESSION['mail'];
	$idpago=$_GET['idpago'];
		$pagos = mysqli_query($link, "SELECT * FROM pago WHERE idpago = '$idpago'");
				$pago = mysqli_fetch_array($pagos);
				$monto = $pago['monto'];
?>
		<div class= "registrar">
			<h1 style="color: black;margin-left:80px"> Total a pagar: $<?php echo $monto ?> </h1>
			<hr>
		<?php
			$tarjetas = mysqli_query($link, "SELECT * FROM usuario_tarjeta WHERE mail = '$mail'");
			if(mysqli_num_rows($tarjetas) != 0){
				
				
			?>
			
			<h1 style="color: black;margin-left:80px"> Selecciona tu tarjeta </h1>
			
			<form method="POST" action="realizarpago.php" class="input">
				<label style="color: black"> Numero de tarjeta </label>
				<br>
				<select name="tarjeta" class="caballo" required/>
							<option value="" disabled selected>Tarjeta</option>
					<?php while ($tarjeta = mysqli_fetch_array($tarjetas)){?>
									<option value="<?php echo $tarjeta['numerotarjeta'] ?>"> <?php echo $tarjeta['numerotarjeta']; ?></option>7
									<?php } ?>
				</select>
				<br>
				<br>			
				<label style="color: black"> Numero de seguridad </label>
				<br>
				<input type="text" class="chico" maxlength="3" name="numero" title="Debe contener 3 numeros" placeholder="XXXX"  pattern="[0-9]{3}" required/>
				<input type="hidden" name="idpago" value="<?php echo $idpago ?>"> </input>
				<br>
				<br>
				<input type="submit" class="botonRegistrarse" value="Pagar">
			</form>
			<?php
				$usuarios = mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
				$usuario = mysqli_fetch_array($usuarios);
				$saldo = $usuario['saldo'];
				if($saldo >= $monto){
			?>
					<hr>
					<h1 style="color: black;margin-left:80px"> Paga con tu saldo </h1>
			
					<form method="POST" action="realizarpagosaldo.php" class="input">
						<label style="color: black"> Tu saldo: $<?php echo $saldo ?> </label>
						<input type="hidden" name="monto" value="<?php echo $pago['monto'] ?>"> </input>
						<input type="hidden" name="idpago" value="<?php echo $idpago ?>"> </input>
					<input type="submit" class="botonRegistrarse" value="Pagar">
					</form>
			<?php
				}
			?>
			<hr>
			<h1 style="color: black;margin-left:40px"> Registra una nueva tarjeta </h1>
				<a href='registrotarjeta.php'><button class='botonRegistrarse'> Registrar </button></a>
			<?php
			} else {
				?>
				<h1 style="color: black;margin-left:80px"> No posees una tarjeta registrada </h1>
				<label style="color: black"> Registra una </label>
				<br>
				<a href='registrotarjeta.php'><button class='botonRegistrarse'> Registrar </button></a>
				<br>
		</div>
		<?php
			}
		?>
					