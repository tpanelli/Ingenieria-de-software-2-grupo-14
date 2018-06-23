<?php include 'archivoconexion.php';
   $link = conectar();
   $idviaje = $_POST['idviaje'];
   $mail= $_POST['mail'];
   echo $idviaje;
   echo $mail;
   echo 'dasdasdasdasd';
 // mysqli_query($link,"INSERT INTO `viaje_usuario`(`idpasajero`, `idviaje`, `mail`, `aceptado`) VALUES (NULL,'$idviaje','$mail',NULL)");




?>