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
		alert('La contraseña es incorrecta');
		return false;
}

}

function validarRegistro(){
	var Clave1,Clave2;
	Clave1 = document.getElementById("contrasena").value; 
	Clave2 = document.getElementById("confirmar").value;

	if (Clave1 != Clave2){
		alert('La clave no coinciden');
		return false;
	}
	
}
function validarContra(){
	var Clave1,Clave2;
	Clave1 = document.getElementById("contraseniaOriginal").value; 
	Clave2 = document.getElementById("contraseniaIngresada").value; 
	ClaveNueva = document.getElementById("contrasena").value;
	ClaveNueva2 = document.getElementById("confirmar").value;

	if (Clave1 != Clave2){
		alert('La clave original es incorrecta');
		return false;
	}
	if (ClaveNueva != ClaveNueva2){
		alert('Las claves nuevas no coinciden');
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

function validarContraRecuperada(){
	var ClaveNueva, ClaveNueva2; 
	ClaveNueva = document.getElementById("contrasena").value;
	ClaveNueva2 = document.getElementById("confirmar").value;

	if (ClaveNueva != ClaveNueva2){
		alert('Las claves nuevas no coinciden');
		return false;
	}
	Confirmar('Se enviara un e-mail a la casilla ingresada. Confirme el cambio desde ese correo, y se hara efectivo en su cuenta. Esta seguro de que el mail ingresado es el de su cuenta?');
	
}





