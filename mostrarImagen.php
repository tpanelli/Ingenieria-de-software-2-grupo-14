<?php
// se recibe el valor que identifica la imagen en la tabla
$patente = $_GET['patente'];
include_once 'archivoconexion.php';
$link=conectar();
// se recupera la información de la imagen
$result = mysqli_query($link,"SELECT imagen, tipoimagen FROM vehiculo WHERE patente='$patente'");
$row = mysqli_fetch_array($result);
if (is_null($row['tipoimagen'])){
    header("location:silueta.jpg");
} else {
     header("Content-type:"  . $row["tipoimagen"]);
     echo $row['imagen'];
}

mysqli_close($link);
// se imprime la imagen y se le avisa al navegador que lo que se está
// enviando no es texto, sino que es una imagen un tipo en particular
?>

