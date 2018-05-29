 <?php
 include "archivoconexion.php";
 $link = conectar();
 echo $_POST['mail'];
 echo $_POST['contrasena'];
 mysqli_query($link,"UPDATE usuario set contrasenia ='$_POST[contrasena]' where mail='$_POST[mail]'");
 header ('location: editarPerfil.php');
 ?>