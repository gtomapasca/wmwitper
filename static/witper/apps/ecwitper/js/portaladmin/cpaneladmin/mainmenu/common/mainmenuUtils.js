/************************************************************************/
// 20230301 Degui: utilitarios
/************************************************************************/
// 20230301 obtener fecha actual en formato 2023-02-22
function util_obtenerFechaActual(){
	var d = new Date(); 
	var mes = d.getMonth()+1;
	var dia = d.getDate();
	var fechaActual = d.getFullYear() + '-' + (mes<10 ? '0' : '') + mes + '-' + (dia<10 ? '0' : '') + dia;
	return fechaActual;
}

// 20230301 obtener fecha de inicio del presente mes en formato 2023-01-01
function util_obtenerFechaActualIniMes(){
	var d = new Date(); 
	var mes = d.getMonth()+1;
	//var fechaIni = d.getFullYear() +'-'+ mes +'-01';
	var fechaIni = d.getFullYear() + '-' + (mes<10 ? '0' : '') + mes + '-01';
	return fechaIni;
}

function util_obtenerFechaActualIniAño(){
	var d = new Date(); 
	var fechaIni = d.getFullYear() + '-01-01';
	return fechaIni;
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
