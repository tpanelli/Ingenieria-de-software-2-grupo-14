<?php
class Acceso{
	
	private $email;
	private $clave;
	
	
	public function Comparar($m,$c){
		$this->email = $m;
		$this->clave = $c; 
		include_once 'archivoconexion.php';
		$link = conectar();
		$result=mysqli_query($link,'SELECT * FROM `usuario` WHERE `mail` = "'. $this->email .'" and `contrasenia` = "'. $this->clave .'"');
		$cant= mysqli_num_rows($result);
		if($cant != 0){
			if($row = mysqli_fetch_array($result)){
					session_start();
					$_SESSION['nombre']= $row['nombre'];
					$_SESSION['apellido']= $row['apellido'];
					$_SESSION['mail']= $row['mail'];
					$_SESSION['fechanac']= $row['fechanac'];
					$_SESSION['contrasenia']= $row['contrasenia'];
			}
		}
		else {
			throw new Exception('El usuario o la contraseña son incorrectos');
		}
	}
	
	public function Logueado(){
		if(isset ($_SESSION['mail'])){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function Cerrar(){
		session_start();
		session_unset();
		session_destroy();
		header("Location: index.php");
	}
}
?>