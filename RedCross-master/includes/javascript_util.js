function validaFormaAdmin(){
	return checkPasswords();
}

function checkPasswords(){
	var password1 = document.getElementById('password1').value;
	var password2 = document.getElementById('password2').value;

	if(!(password1 != "" && password2 != "" && password1 == password2)){
		alert('Las contraseñas no coinciden, favor de corregirlos');
		return false;
	}
	else{
		password2.style.backgroundColor = "";
		return true;
	}
}

function selectOption(select, textOption){
	for(i = 0; i < select.length; i++){
		if(textOption == select[i].value){
			select[i].selected = true;
			break;
		}
	}
}

function markCheckBoxes(idsStr){
  	var dias = idsStr.split(",");
  	for (var i = dias.length - 1; i >= 0; i--) {
  		var checkbox = document.getElementById(dias[i]);
  		if(checkbox !== null && typeof checkbox !== "undefined"){
  			checkbox.checked = true;
  		}
  	}
}

function isValidMatricula(matricula){
	var patt = /^[admcADMC][0-9]+$/i;
	return patt.test(matricula);
}

function isFloat(elementId){
	var number = document.getElementById(elementId);
	var regex = /^[0-9]*\.?[0-9]+$/i;
	if(!regex.test(number.value)){
		alert('Favor de ingresar un numero valido');
		number.style.backgroundColor = "red";
	}
	else{
		number.style.backgroundColor = "";
	}
}

function isInt(elementId){
	var number = document.getElementById(elementId);
	var regex = /^[0-9]+$/i;
	if(!regex.test(number.value)){
		alert('Favor de ingresar un numero valido');
		number.style.backgroundColor = "red";
		return false;
	}
	else{
		number.style.backgroundColor = "";
		return true;
	}
}

function getQueryVariable(variable) {
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		if (pair[0] == variable) {
		  return pair[1];
		}
	} 
}