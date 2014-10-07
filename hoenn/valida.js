function Validar(){

var mensaje="Llene todos los campos"; 
var error;
var frm = document.forms['enfermera'];
var nom=frm.nombre.value;
	if(nom==''){
	error=1;
}

var ape=frm.apellidos.value;
	if(ape==''){
	error=1;
}

var ced=frm.cedula.value;
	if(ced==''){
	error=1;
}

	if(document.reg.id_centro_pokemon.selectedIndex==0){
	error=1;
	document.reg.id_centro_pokemon.focus()
}

if(error==1){
alert(msn);
}
}