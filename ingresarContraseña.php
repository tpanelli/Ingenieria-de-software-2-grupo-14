<html>
<head>
<link rel="stylesheet" href="estilos.css">
<meta charset="utf-8"/>
<script src="validacion.js"></script>
</head>

<?php
include"barra.php";  
include_once"archivoconexion.php";
  $link = conectar();
  $result = mysqli_query($link,"select * from usuario where mail = '$_SESSION[mail]'");
  $row = mysqli_fetch_array($result);
?>
<div class= "registrar">
<h1 style="color: black;margin-left:50px"> Modifica tu contraseña</h1> 
<form action="actualizarContraseña.php" method="POST"  class="input" enctype="multipart/form-data" onclick="return validarContra()" >
  <label style="color: black"> Ingresa tu contraseña </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"id="contraseniaIngresada" name="contraseniaIngresada" class="caballo" placeholder="Contraseña..." required/>
  <label style="color: black"> Contraseña Nueva </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"id="contrasena" name="contrasena" class="caballo" placeholder="Contraseña..." required/>
  <label style="color: black"> Repetir contraseña </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="confirmar" name="confirmar" class="caballo" placeholder="Repetir Contraseña..."required/>
  <input value= "<?php echo $row['mail'] ?>" type="hidden" id="mail" name="mail">
  <input value= "<?php echo $row['contrasenia'] ?>" type="hidden" id="contraseniaOriginal" name="contraseniaOriginal"> 
  <div><input type="submit" class="botonRegistrarse" value="Aceptar"></div>
</form>
</div>
<?
 
  
?>
</body> 
</html>