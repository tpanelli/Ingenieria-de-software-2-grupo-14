<?php include "barra.php";?>
<div class= "registrar2">
<h1 style="color: Black;margin-left:110px; border-color: blue"> Busca tu viaje!</h1> 
<form method="POST" class="input">
  <label> Origen </label>
  <input type="text" id="contraseña1" class="caballo" name="password" placeholder="Origen...">
  <label style="color: black"> Destino </label>
  <input type="text" id="contraseña2" class="caballo"  name="nuevacontraseña" placeholder="Destino...">
  <label style="color: black"> Fecha </label>
  <input type="date" id="" class="caballo"  name="">
  <label style="color: black"> Tipo </label>
				<select class="caballo" name="tipo">
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
  <div><input type="submit" class="botonEntrar" value="Entrar" ></div>
</form>
</div>
<table class="viaje"><tr>
			<td class="nombre">La Plata - Capital Federal<td>
			<td class="nombre"> 01/06/18<td>
			<td class="nombre">10:25 pm<td>
			<td class="nombre">Asientos: 2
			<td>
			<div class="precio">$150</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">La Plata - Rosario<td>
			<td class="nombre"> 01/06/18<td>
			<td class="nombre">11:30 pm<td>
			<td class="nombre">Asientos: 4<td>
			<div class="precio">$300</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">Mar del Plata - Capital Federal<td>
			<td class="nombre"> 02/06/18<td>
			<td class="nombre">8:00 am<td>
			<td class="nombre">Asientos: 4<td>
			<div class="precio">$350</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">La Pampa - Cordoba<td>
			<td class="nombre"> 02/06/18<td>
			<td class="nombre">1:00 pm<td>
			<td class="nombre">Asientos: 3<td>
			<div class="precio">$400</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
</body>
</html>