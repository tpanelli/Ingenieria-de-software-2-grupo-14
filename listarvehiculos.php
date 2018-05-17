<?php  
     include 'conexionBD.php';
	 $link = conectar();
	 mysqli_set_charset($link, "utf8");
	 $autoscorrectos= mysqli_query($link, "SELECT * FROM `usuario_vehiculo` WHERE mail = 'aa'");
	 while ($autocorrecto = mysqli_fetch_array ($autoscorrectos)){
		$patente = $autocorrecto['patente'];
		$auto = mysqli_query($link, "SELECT * FROM `vehiculo` WHERE patente = '$patente'");
		while ($datos = mysqli_fetch_array ($auto)){
			echo $datos['patente'], '<br>';
			echo $datos['modelo'], '<br>';
			echo $datos['capacidad'], '<br>';
			echo $datos['marca'], '<br>';
			echo $datos['color'], '<br>';
			echo $datos['nombretipo'], '<br>';
			echo '<br><br>';
		}
	 } 
?>