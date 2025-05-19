/* 20240204 UTILS */

/**
	Metodo que permite ingresar solo numeros al input
	parametros:
		id - id de input
*/
function soloNumeros(id){
	$("#"+id).keypress(function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			return false;
		}
	});
}

function validarExpresion(valor, regExp) {
	var RegExPattern = regExp;
	if (valor.match(RegExPattern)) return true; 
	else return false; 
}

function getFechaActualYYYMMDD(){
    var f = new Date();
	var result =  f.getFullYear() + "-" +lpad((f.getMonth() +1),2)+ "-" + lpad(f.getDate(),2);
	return result;
}

function getFechaActual(){
	var f = new Date();
	var result = lpad(f.getDate(),2) + "/" + lpad((f.getMonth() +1),2) + "/" + f.getFullYear();
	return result;
}

function getStrFechaYYYMMDD(strFecha){
    var res = strFecha.split("/");
	var result = res[2]+ "-" + res[1] + "-" + res[0];
	return result;
}

function formatFechaNumeral(fecha) {
	return fecha.substring(0, 4) + fecha.substring(5, 7) + fecha.substring(8);
}

function lpad(n, width, z) {
	z = z || '0';
	n = n + '';
	return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}
