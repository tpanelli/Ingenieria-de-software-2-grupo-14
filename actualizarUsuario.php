<?php
  include"archivoconexion.php";
  $link = conectar();
  $fecha = $_POST['fecha'];
  $fecha_actual=date("y-m-d");
  $diff = abs(strtotime($fecha_actual) - strtotime($fecha));
  $years = floor($diff / (365*60*60*24));
  if ($years>=18){
		mysqli_query($link," UPDATE usuario set nombre ='$_POST[nombre]', apellido = '$_POST[apellido]', fechanac ='$_POST[fecha]' where mail = '$_POST[mail]'"); 
		header("location: verPerfil.php");
  }else{
	  header('location:pagerrores.php?errores=edad');
  }
   ?>