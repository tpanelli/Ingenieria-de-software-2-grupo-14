<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$num1=$_POST['numero'];
$num2=$_POST['numero2'];
$num3=$_POST['numero3'];
$num4=$_POST['numero4'];
$num=$num1 . $num2 . $num3 . $num4;
$f1=$_POST['fecha1'];
$f2=$_POST['fecha2'];
$fecha=$f1."/".$f2;
session_start();
$mail=$_SESSION['mail'];
if(empty ($num1) || empty ($num2) || empty ($num3) || empty ($num4) || empty ($f1) || empty ($f2)){
	header('Location: pagerrores.php?errores=campostarjeta');
}
if(!empty ($num) && !empty ($fecha)){
	$var="INSERT INTO `usuario_tarjeta`(`mail`, `numerotarjeta`)
	VALUES ('$mail', '$num')";
	mysqli_query($link, $var);
	$vard="INSERT INTO `tarjeta`(`numero`, `fecha`)
	VALUES ('$num', '$fecha')";
	mysqli_query($link, $vard);
}
else{
	header('Location: pagerrores.php?errores=campos');
}
header('Location: index.php');
?>