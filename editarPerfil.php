<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="funcionesValidacion.js"></script>
</head>
<?php
 include"barra.php"; 
include_once"archivoconexion.php";
  $link = conectar();
  $result = mysqli_query($link,"select * from usuario where mail = '$_SESSION[mail]'");
  $row = mysqli_fetch_array($result)
?>

<div class= "registrar">
<h1 style="color: black;margin-left:100px"> Editar Perfil</h1> 
<form action="actualizarUsuario.php" method="POST"  class="input" enctype="multipart/form-data" onsubmit="return validarContraseña()">
  <label style="color: black;margin-left:10px"> Nombre </label>
  <input value="<?php echo utf8_encode ($row['nombre'])?>" type="text" name="nombre" id="nombre" class="caballo" placeholder="Nombre..." required/>
  <label style="color: black;margin-left:10px"> Apellido </label>
  <input  value="<?php echo utf8_encode ($row['apellido'])?>" type="text" id="apellido" name="apellido" class="caballo" placeholder="Apellido"required/>
  <label style="color: black;margin-left:10px"> Fecha de nacimiento </label>
  <input value="<?php echo $row['fechanac']?>" type="date" id="anio" name="fecha" class="caballo" placeholder="Año..."required/>
  <label style="color: black;margin-left:10px"> Ingresar Contraseña </label>
  <input type="password" name="c1" id="c1" class="caballo" placeholder="Contraseña..."required/>
  <input value="<?php echo $row['contrasenia'];?>" type="hidden" name="c2" id="c2">
  <input value= "<?php echo $_SESSION['mail'] ?>" type="hidden" id="mail" name="mail">
  <a href="ingresarContraseña.php" style="color: black;margin-left:10px"> ¿Modificar contraseña? </a>
  <div><input type="submit" class="botonRegistrarse" value="Actualizar"></div>
</form>
</div>
<?
  
?>
</body> 
</html>