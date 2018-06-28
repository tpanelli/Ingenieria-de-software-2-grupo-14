<html>
<head>
	<link type="text/css" rel="stylesheet" href="estilos.css">
	<title> UnAventon</title>
	<meta charset="utf-8">
	<script  type="text/javascript" src="funcionesvalidacion.js"> </script>
</head>
<body class="body">
<?php
include 'barra.php';
$tipo = isset($_GET['errores']) ? $_GET['errores'] : 'default';
switch($tipo){
		case 'contra':
			$string = '*Error: La contraseña debe tener al menos 6 caracteres, incluyendo una mayuscula, una minuscula y un numero o caracter especial'; 
		break;
		case 'nombre':
			$string = '*Error: El nombre debe contener solo letras y no estar vacio'; 
		break;
		case 'apellido':
			$string = '*Error: El apellido debe contener solo letras y no estar vacio'; 
		break;
		case 'yaexiste':
			$string = '*Error: El mail elegido ya posee una cuenta en UnAventon'; 
		break;
		case 'noiguales':
			$string = '*Error: Las contraseñas ingresadas no coinciden'; 
		break;
		case 'email':
			$string = '*Error: E-mail no valido'; 
		break;
		case 'edad':
			$string = '*Error: Todos los usuarios de esta aplicacion deben ser mayores de edad';
		break;
		case 'campos':
			$string = '*Error: Faltan completar campos';
		break;
		case 'coment':
			$string = '*Error: Usted no ha escrito un comentario o no ha calificado la pelicula';
		break;
		case 'campostarjeta':
			$string = '*Error: Asegurese de ingresar todos los numeros'; 
		break;
		case 'inicio':
			$string = '*Error: El mail o la contraseña ingresados son incorrectos'; 
		break;
		case 'construccion':
			$string = 'Esta funcionalidad esta en proceso de implementacion'; 
		break;
		case 'patente':
			$string = '*Error: Usted ya registro un vehiculo con esa patente'; 
		break;
		case 'yaPostulado':
			$string = '*Error: Usted ya esta postulado en este viaje'; 		
		break;
		case 'deuda':
			$string = '*Error: Usted debe pagos'; 
		break;		
		case 'noDisponible':
			$string = '*Error:	El vehiculo ya esta completo '; 
		break;		
		case 'debesCali':
			$string = '*Error:	Debes calificaciones '; 
		break;
		case 'pagos':
			$string = 'Usted no tiene deudas pendientes'; 
		break;
		case 'autoViaje':
			$string = 'Su vehiculo posee viajes pendientes y no puede ser eliminado'; 
		break;
		case 'viajesPendientes':
			$string = '*Error: Usted posee viajes publicados pendientes. No puede eliminar su cuenta.'; 
		break;
		case 'viajeEliminado':
			$string = 'Su viaje fue eliminado con exito'; 
		break;
}
?>
<div class="noSeEncontraronResultados">
	<?php echo $string ?><br><br>
	<button class="botonLogin" onclick="goBack()">Volver</button>
</div>
</body>
</html>