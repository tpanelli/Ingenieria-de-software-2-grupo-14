<?php 
  include"archivoconexion.php";
  $link = conectar();
  echo $id= $_POST['id'];
  echo $respuesta= $_POST['respuesta'];
  mysqli_query($link,"UPDATE `preguntas` SET `respuesta`='$respuesta' WHERE id='$id'");
  header('location:detalleViaje.php?id='.$_POST['idviaje'].'');

  
 ?>