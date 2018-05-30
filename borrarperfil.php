<?php
include_once 'archivoconexion.php';
session_start();
$link = conectar();
$mail = $_SESSION['mail'];
$consulta="UPDATE usuario SET activo=0 WHERE mail='$mail'";
mysqli_query($link, $consulta);
header('Location: cerrar.php');
?>