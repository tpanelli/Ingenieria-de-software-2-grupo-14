<?php include 'barra.php' ?>
<div class= "registrar">
<h1 style="color: black;margin-left:50px"> Restablecer contraseña</h1> 
<form action="actualizarContraseñaRecuperada.php" method="POST"  class="input" enctype="multipart/form-data" onsubmit="return validarContraRecuperada()">
  <label style="color: black"> E-mail de la cuenta </label>
  <input type="text" id="mail" name="mail" class="caballo" placeholder="E-mail..." required/>
  <label style="color: black"> Contraseña nueva </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"id="contrasena" name="contrasena" class="caballo" placeholder="Contraseña nueva..." required/>
  <label style="color: black"> Repetir contraseña </label>
  <input type="password" title="La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" id="confirmar" name="confirmar" class="caballo" placeholder="Repetir contraseña..."required/>
  <div><input type="submit" class="botonRegistrarse" value="Aceptar"></div>
</form>
</div>