<?php 
  include"archivoconexion.php";
  $link = conectar();
  echo $id= $_POST['idviaje'];
  echo $pregunta= $_POST['pregunta'];
  echo $mailP= $_POST['mail'];
  echo $mailR= $_POST['mailRespuesta'];
  mysqli_query($link,"INSERT INTO `preguntas`(`idviaje`,`pregunta`,`mailPregunta`,`mailRespuesta`)VALUES('$id','$pregunta','$mailP','$mailR')");
  header('location:detalleViaje.php?id='.$id.'');

  
 ?>