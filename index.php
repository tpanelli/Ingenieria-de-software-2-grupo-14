<?php include "barra.php";?>
<div class= "registrar2">
<h1 style="color: Black;margin-left:110px; border-color: blue"> Busca tu viaje!</h1> 
<form method="POST" class="input" action="pagerrores.php?errores=construccion">
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
<?php
$unmes = date('Y-m-d');
$unmes = strtotime ( '+30 day',strtotime($unmes)) ;
$unmes = date ( 'Y-m-d' , $unmes );
$viajes = mysqli_query($link, "SELECT * FROM viaje WHERE realizado = '0' and dia < '$unmes' ORDER BY dia,hora ");
while ($viaje = mysqli_fetch_array($viajes)){
			$patente = $viaje['patente'];
			$vehiculo = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente = '$patente'");
			$vehiculo = mysqli_fetch_array($vehiculo);
?>
<table style="float:right; margin-right:4.5%; margin-bottom:1%" class="viaje"><tr>
			<?php $idviaje = $viaje['idviaje']; ?>
			<td class="nombre"><?php echo $viaje ['ciudadOrigen'], ' - ', $viaje ['ciudadDestino'];?><td>
			<td class="nombre"> <?php $dia = $viaje ['dia']; echo date("d/m/Y", strtotime($dia));?><td>
			<td class="nombre"><?php echo substr($viaje ['hora'], 0, -3) ;?><td>
			<td class="nombre">Asientos: <?php include 'calcularAsientosDisponibles.php'; ?> <td>
			<div class="precio"><?php echo '$', $viaje['costo']; ?></div>
			<a href="detalleViaje.php?id=<?php echo $idviaje ?>"><input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input></a>
		</table>
<?php } 
include 'validarViajesRealizados.php';?>
		
</body>
</html>