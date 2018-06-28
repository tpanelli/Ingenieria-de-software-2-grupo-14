<form name="publicar" action="publicarViajePeriodico.php" method="post" class="input" enctype="multipart/form-data"> 
<div style="height: 65%" class="cuadradoViaje"> 
	 Origen: <select name="origen" required/>
							<option value="" disabled selected>Origen</option>
					<?php
						$result=mysqli_query($link, 'SELECT * FROM ciudad');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['nombreciudad'] ?>"> <?php echo $row['nombreciudad']; ?></option>
							<?php
							}
							?>
			    </select>
	 Destino: <select name="destino" required/>
							<option value="" disabled selected>Destino</option>
					<?php
						$result=mysqli_query($link, 'SELECT * FROM ciudad');
							while ($row = mysqli_fetch_array ($result)){
									?>
									<option value="<?php echo $row['nombreciudad'] ?>"> <?php echo $row['nombreciudad']; ?></option>
							<?php
							}
							?>
			    </select><br><br>
	 Primer viaje: <input type="date" name="primerViaje" required/></input> 
	 Ultimo viaje: <input type="date" name="ultimoViaje" required/></input> 
	 Hora de salida: <input type="time" name="hora" required/></input><br><br>
	 Duracion: <input type="time" name="duracion" required/></input> <br><br>
	  Dias: <input type="checkbox" name="dias[]" value="Monday"> Lunes</input>
	 <input type="checkbox" name="dias[]" value="Tuesday"> Martes</input>
	 <input type="checkbox" name="dias[]" value="Wednesday"> Miercoles</input>
	 <input type="checkbox" name="dias[]" value="Thursday"> Jueves</input>
	 <input type="checkbox" name="dias[]" value="Friday"> Viernes</input>
	 <input type="checkbox" name="dias[]" value="Saturday"> Sabado</input>
	 <input type="checkbox" name="dias[]" value="Sunday"> Domingo</input><br><br>
	 Tipo: Periodico <br><br> 
	Costo por asiento: <input type="number" name="costo" required/></input> 
	 <div style="height: 42%" class="conductorViaje">
	  <?php $usuario =  mysqli_query($link, "SELECT * FROM usuario WHERE mail = '$mail'");
			$usuario =  mysqli_fetch_array($usuario); ?>
	Vehiculo: <select name="patente" required/>
					<option disabled selected>Patente</option>
			<?php
					while ($vehiculo = mysqli_fetch_array ($vehiculos)){
					?>
							<option value="<?php echo $vehiculo['patente'] ?>"> <?php echo $vehiculo['patente']; ?></option>
					<?php
					}
				?>
		    </select><br><br>
	  Conductor: <a href='verPerfil.php' > <?php echo $usuario['nombre'],' ', $usuario['apellido'] ?> </a><br><br>
	  Detalle: <br> <textarea name="detalle" style="resize:none;height:80px;width:500px;" required/></textarea>
	 </div>
	 <input type="submit" class='botonViajePublicado'></input>
</div>
</form>