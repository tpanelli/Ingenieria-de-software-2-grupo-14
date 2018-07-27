<?php include_once 'archivoconexion.php';
   $link = conectar();
    $mail=  $_POST['mail'];
    $idviaje=  $_POST['idviaje'];
	$disponible = $_POST['disponibles'];
	$aceptado = $_POST['aceptado'];
   $postulaciones = mysqli_query($link, "SELECT * FROM viaje_usuario WHERE mail = '$mail' and idviaje = '$idviaje'");
   $pagos = mysqli_query($link, "SELECT * FROM pago WHERE mail = '$mail' AND realizado = '0'");
   $calificaciones = mysqli_query($link, "SELECT * FROM calificaciones WHERE mailvoto = '$mail' AND realizado = '0'");
  echo $cantCalificaciones = mysqli_num_rows($calificaciones);  
   $cant = mysqli_num_rows($postulaciones);  
   $cantDeudas = mysqli_num_rows($pagos);  
   if($cantCalificaciones == 0){
   if ($disponible != 0){
		if ($cantDeudas == 0){
			if ($aceptado != 2){
				if ($cant == 0){
						mysqli_query($link,"INSERT INTO `viaje_usuario`(`idpasajero`, `idviaje`, `mail`) VALUES (NULL, '$idviaje' , '$mail')");
						header ('location:viajesPostulado.php');		
				}else {
						header('location: pagerrores.php?errores=yaPostulado');
					}
			}else{
					header('location: pagerrores.php?errores=rechazado');
				}
		}else{
				header('location: pagerrores.php?errores=deuda');
			}
	}else{
			header('location: pagerrores.php?errores=noDisponible'); 
	    } 	
	}else{
			header('location: pagerrores.php?errores=debesCali'); 
	    } 
				
	
	?>