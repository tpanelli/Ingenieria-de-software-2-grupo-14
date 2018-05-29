<?php
include 'barra.php';
include_once 'archivoconexion.php';
$link = conectar(); 
mysqli_set_charset($link, "utf8");?>
<div class="registrar">
		<h1 style="color: black;margin-left:80px"> Registrar vehiculo </h1>
	    <form  name="agregar" method="post" action="registrarvehiculo.php" class="input" enctype="multipart/form-data" onsubmit="return validarAgregar()">
				<label style="color: black"> Patente </label>
				<input type="text" class="caballo" name="patente" title="Debe contener solo letras y numeros" pattern="^[A-Za-z0-9]+$" required/>
				<label style="color: black"> Modelo </label>
				<input type="text" class="caballo" name="modelo" title="Debe contener solo letras y numeros" pattern="^[A-Za-z0-9\s]+$" required/>
				<label style="color: black"> Marca </label>
				<input type="text" class="caballo" name="marca" title="Debe contener solo letras y numeros" pattern="^[A-Za-z0-9\s]+$" required/> 
				<label style="color: black"> Capacidad </label>
				<input type="number" class="caballo" name="capacidad" title="Debe contener numeros" pattern="^[0-9]+$" required/> 
				<label style="color: black"> Color </label>
				<input type="text" class="caballo" name="color" title="Debe contener solo letras" pattern="^[a-zA-Z]+$" required/>
				<label style="color: black"> Tipo </label>
				<select class="caballo" name="tipo">
					<?php
						$result=mysqli_query($link, 'SELECT * FROM tipovehiculo');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['tipo'] ?>"> <?php echo $row['tipo']; ?></option>
							<?php
							}
							?>
			    </select>
				<label style="color: black"> Imagen </label>
				<input type="file"  class="caballo" name="imagen" placeholder="Imagen">
			<div>
				<input type="submit" class="botonRegistrarse" value="Submit">
			</div>
			</form>
	</div>
</body>
</html>
