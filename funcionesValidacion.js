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
	if (C1 != C2){
		alert('Las contraseña es incorrecta');
		return false;
}

}

function validarRegistro(){
	var Clave1,Clave2;
	Clave1 = document.getElementById("contrasena").value; 
	Clave2 = document.getElementById("confirmar").value;

	if (Clave1 != Clave2){
		alert('Las claves no coinciden');
		return false;
	}
	
}
function goBack() {
    history.back();
}

function Confirmar($mensaje){
	var ok = confirm($mensaje); 
            if (ok) 
            { 
                return true; 
            } 
            else 
            { 
                return false; 
            }
}



