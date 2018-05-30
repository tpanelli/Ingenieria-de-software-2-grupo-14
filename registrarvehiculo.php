<?php
include_once 'archivoconexion.php';
session_start();
$mail = $_SESSION['mail'];
$link = conectar();
mysqli_set_charset($link, "utf8");
$patente = $_POST['patente'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$capacidad = $_POST['capacidad'];
$color = $_POST ['color'];
$tipo = $_POST ['tipo'];
$comparar = mysqli_query($link, "SELECT * FROM vehiculo WHERE patente='$patente'");
$consulta = "INSERT INTO vehiculo (patente, modelo, marca, capacidad, color, nombretipo, mail";
$image = $_FILES['imagen'];
if ($image['size'] != 0){
	$var = array(
		'type' => $image['type'],
		'tmp_name' => $image['tmp_name']
	);
	$imagen = addslashes(file_get_contents($var['tmp_name']));
	$tipoimagen = $var['type'];
	$consulta.= ", imagen, tipoimagen) VALUES ('$patente', '$modelo', '$marca', '$capacidad', '$color', '$tipo', '$mail', '$imagen', '$tipoimagen')";
}
else{
	$consulta.= ") VALUES ('$patente', '$modelo', '$marca', '$capacidad', '$color', '$tipo', '$mail')";
}
if (mysqli_fetch_array($comparar) == 0) {
mysqli_query ($link, $consulta);
header('Location: listarvehiculos.php');
} 
else {
	header('Location: pagerrores.php?errores=patente');
}