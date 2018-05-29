<?php
include_once 'archivoconexion.php';
$link = conectar();
mysqli_set_charset($link, "utf8");
$patente = $_POST['patente'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$capacidad = $_POST['capacidad'];
$color = $_POST ['color'];
$tipo = $_POST ['tipo'];
$consulta = "UPDATE vehiculo SET modelo='$modelo', marca='$marca', capacidad='$capacidad', color='$color', nombretipo='$tipo'";
$image = $_FILES['imagen'];
if ($image['size'] != 0){
	$var = array(
		'type' => $image['type'],
		'tmp_name' => $image['tmp_name']
	);
	$imagen = addslashes(file_get_contents($var['tmp_name']));
	$tipoimagen = $var['type'];
	$consulta.= ", imagen='$imagen', tipoimagen='$tipoimagen'";
}
$consulta.= "WHERE patente='$patente'";
mysqli_query ($link, $consulta);
header('Location: listarvehiculos.php');
?>