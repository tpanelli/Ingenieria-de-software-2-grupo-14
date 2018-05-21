<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="funcionesvalidacion.js"></script>
</head>
<body background="fondo.jpg">
<?php include "barra.php";   ?>
<div>
	<ul>
		<li><a href="index.php"> Inicio</a></li>
		<li><a href="index.php"> ¿Quienes somos?</a></li>
	</ul>
</div>
<div class= "registrar2">
<h1 style="color: Black;margin-left:110px; border-color: blue"> Busca tu Viaje!</h1> 
<form action="modificarcontraseña.php" method="POST" class="input">
  <label> Origen </label>
  <input type="text" id="contraseña1" class="caballo" name="password" placeholder="Origen...">
  <label style="color: black"> Destino </label>
  <input type="password" id="contraseña2" class="caballo"  name="nuevacontraseña" placeholder="Destino...">
  <label style="color: black"> Fecha </label>
  <input type="date" id="" class="caballo"  name="">
  <div><input type="submit" class="botonEntrar" value="Entrar" ></div>
</form>
</div>
<table class="viaje"><tr>
			<td class="nombre">La plata - Capital Federal<td>
			<td class="nombre"> 15/05/34<td>
			<td class="nombre">10:25 pm<td>
			<td class="nombre">Pasajes: 2
			<td>
			<div class="precio">$100
			</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">La plata - Capital Federal<td>
			<td class="nombre"> 15/05/34<td>
			<td class="nombre">10:25 pm<td>
			<td class="nombre">Pasajes: 2<td>
			<div class="precio">$100
			</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">La plata - Capital Federal<td>
			<td class="nombre"> 15/05/34<td>
			<td class="nombre">10:25 pm<td>
			<td class="nombre">Pasajes: 2<td>
			<div class="precio">$100
			</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
		<table class="viaje"><tr>
			<td class="nombre">La plata - Capital Federal<td>
			<td class="nombre"> 15/05/34<td>
			<td class="nombre">10:25 pm<td>
			<td class="nombre">Pasajes: 3<td>
			<div class="precio">$100
			</div>
			<input name="eliminar" value="Ver viaje" type="submit" class="botonEliminar" onclick="return Eliminar()"></input>
		</table>
</body>
</html>