<?php
  include"archivoconexion.php";
  $link = conectar();
  mysqli_query($link," UPDATE usuario set nombre ='$_POST[nombre]', apellido = '$_POST[apellido]', fechanac ='$_POST[fecha]' where mail = '$_POST[mail]'"); 
  header("location: verPerfil.php");
   ?>