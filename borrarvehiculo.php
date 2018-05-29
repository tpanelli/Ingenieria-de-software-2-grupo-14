<?php
include_once 'archivoconexion.php';
session_start();
$link = conectar();
$patente= $_GET['p'];
$mail = $_SESSION['mail'];
$consulta="DELETE FROM `vehiculo` WHERE `patente`= '$patente' and mail='$mail'";
mysqli_query($link, $consulta);
header('Location: listarvehiculos.php');
?>