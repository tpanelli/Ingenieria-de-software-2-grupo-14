<?php
include 'barra.php';
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$patente = $_GET['p'];
$auto= mysqli_query($link,"SELECT * FROM vehiculo WHERE patente='$patente'");
if ($datos =mysqli_fetch_array ($auto)){
?>
<div class="registrar">
		<h1 style="color: black;margin-left:80px"> Editar vehiculo </h1>
	    <form  name="editar" method="post" action="editarvehiculo.php" class="input" enctype="multipart/form-data" onsubmit="return validarEditar()">
		        <label style="color: black">Patente: <?php echo $datos['patente'] ?><br><br></label>
				<label style="color: black"> Modelo </label>
				<input type="text" class="caballo" name="modelo" value='<?php echo $datos['modelo']?>'  title="Debe contener solo letras y numeros" pattern="^[A-Za-z0-9\s]+$" required/>
				<label style="color: black"> Marca </label>
				<input type="text" class="caballo" name="marca" value='<?php echo $datos['marca']?>'  title="Debe contener solo letras y numeros" pattern="^[A-Za-z0-9\s]+$" required/> 
				<label style="color: black"> Capacidad </label>
				<input type="number" class="caballo" name="capacidad" value='<?php echo $datos['capacidad']?>' title="Debe contener numeros" pattern="^[0-9]+$" min="1" max="60" required/> 
				<label style="color: black"> Color </label>
				<input type="text" class="caballo" name="color" value='<?php echo $datos['color']?>' title="Debe contener solo letras" pattern="^[a-zA-Z]+$" required/>
				<label style="color: black"> Tipo </label>
				<select class="caballo" name="tipo" required/>
				    <option value="" disabled selected>Tipo</option>
					<?php
					    $link = conectar();
						$result=mysqli_query($link, 'SELECT * FROM tipovehiculo');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['tipo'] ?>"> <?php echo $row['tipo']; ?></option>
							<?php
							}
							?>
			    </select>
				<label style="color: black">Seleccionar imagen nueva (opcional)</label><br>
				<img style="margin-left:4%" class="imagenauto" src= "<?php echo "mostrarImagen.php?patente=$patente";?>"><br>
				<input type="file" class="caballo" name="imagen">
				<input type="hidden" class="caballo" name="patente" value="<?php echo $datos['patente'] ?>"> 
			<div>
				<input type="submit" class="botonRegistrarse" value="Submit">
			</div>
			</form>
	</div>
<?php
}
?>
