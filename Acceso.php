<?php
include 'validacion.php';
$acceso= new Acceso();

try{
	$acceso -> Comparar($_POST['mail'],$_POST['contrasena']);
	ini_set("session.use_trans_sid", "0");
	header('Location: index.php');
}
catch(Exception $e){
	header('location: pagerrores.php?errores=inicio');
}
?>