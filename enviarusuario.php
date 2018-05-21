<?php
include_once 'archivoconexion.php';
$link = conectar();
$ap = $_POST['apellido'];
$n = $_POST['nombre'];
$contr = $_POST['contra'];
$confir = $_POST['contra2'];
$mail = $_POST['mail'];
$fecha = $_POST['fecha'];
$com = mysqli_query($link, "SELECT * FROM `usuario` WHERE mail='$mail'");
if(!empty($ap) && !empty($n) && !empty($contr) && !empty($confir) && !empty($mail) && !empty($fecha)){
	if(preg_match("/^[a-zA-Z\-_]{1,50}$/", $ap) == 1) { 
		if(preg_match("/^[a-zA-Z\-_]{1,50}$/", $n) == 1)  {
			if(preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $mail) == 1){
				$fecha_actual=date("d-m-y");
				$diff = abs(strtotime($fecha_actual) - strtotime($fecha));
				$years = floor($diff / (365*60*60*24));
				if ($years>=18){
					if (mysqli_fetch_array($com) == 0) {
						if (preg_match("/(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $contr) == 1){
							if($contr == $confir){
								echo $n;
								echo $contr;
								$var="INSERT INTO `usuario`(`mail`, `nombre`, `apellido`, `contrasenia`, `fechanac`)
									VALUES ('$mail', '$n', '$ap', '$contr', '$fecha')";
								mysqli_query($link, $var);
							} else {
								header('location: pagerrores.php?errores=noiguales');	
							}
						} else {
							header('location: pagerrores.php?errores=contra');	
						}	
					} else {
						header('location: pagerrores.php?errores=yaexiste');
					}
				}else {
					header('location:pagerrores.php?errores=edad');
				}
			}else {
				header('location: pagerrores.php?errores=email');
			}
		} else {
			header('location: pagerrores.php?errores=nombre');
		}
	} else {
		header('location: pagerrores.php?errores=apellido');
	}
}else{
	header('location: pagerrores.php?errores=campos');
}
?>