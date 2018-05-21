function esAlfabetico(str) {
  	return /^[a-zA-Z]+$/.test(str);
}
function esAlfanumerico(str){
	return /^[a-zA-Z0-9]+$/.test(str);
}	
function validar(){
	var Nombre,Apellido;
	Nombre = document.getElementById("nombre").value;
	Apellido = document.getElementById("apellido").value; 
	if(Nombre == "" || Apellido == ""){
		alert('Es obligatorio completar todos los campos!');
		return false;
	}
	if (!esAlfabetico(Nombre)){
		alert('Nombre solo puede contener caracteres alfabeticos!');
		return false;
	}
	if (!esAlfabetico(Apellido)){
		alert('Apellido solo puede contener caracteres alfabeticos!');
		return false;
	}
}

function validarContraseña(){
    var C1,C2;
	C1 = document.getElementById("c1").value; 
	C2 = document.getElementById("c2").value;
	if (C1 == ""){
		alert('Es obligatorio completar todos los campos!');
		return false;
	}
	if (C1 != C2){
		alert('Las contraseña es incorrecta');
		return false;
}

}

function validarRegistro(){
	var EmailValido = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	var contraValida = /(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
	var vNombre,Apellido,Nombreusuario,Clave1,Clave2,Email,Fecha;
	Nombre = document.getElementById("nombre").value;
	Apellido = document.getElementById("apellido").value; 
	Clave1 = document.getElementById("contra").value; 
	Clave2 = document.getElementById("contra2").value;
	Email = document.getElementById("mail").value;
	if(Nombre == "" || Apellido == "" || Email == "" || Clave1 == "" || Clave2 == "" ){
		alert('Es obligatorio completar todos los campos!');
		return false;
	}
	if (!esAlfabetico(Nombre)){
		alert('Nombre solo puede contener caracteres alfabeticos!');
		return false;
	}
	if (!esAlfabetico(Apellido)){
		alert('Apellido solo puede contener caracteres alfabeticos!');
		return false;
	}

	if(!EmailValido.test(Email)){
		alert('E-mail no valido');
		return false;
	}
	if(Clave1.length<6){
		alert('La clave debe tener al menos 6 caracteres!');
		return false;
	}
	if(!contraValida.test(Clave1)){
		alert('La clave debe contener al menos una letra minuscula y mayuscula, y un caracter especial!');
		return false;
	}
	if (Clave1 != Clave2){
		alert('Las claves no coinciden');
		return false;
	}
	
}
function goBack() {
    history.back();
}




