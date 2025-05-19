/************************************************************************/
// 20191010 Degui: Funciones JS Login
/************************************************************************/
//------------------------------------------------------------------------
$("#txtUser").keypress(function(e){
	if ( e.which == 13 ) {
		$("#txtPassword").focus();
	 }
});

$("#txtPassword").keypress(function(e){
	if ( e.which == 13 ) {
		validarInicioSesion();
	 }
});

$('#btnInLoginUser').click(function() {
	validarInicioSesion();
});

function validarInicioSesion(){
	let user = $("#txtUser").val();
	let pass = $("#txtPassword").val();
	if(user.trim().length > 0 && pass.trim().length > 0){
		iniciarSesion();
		//return false;
	}
	else{
		mostrarMensaje("Ingrese correctamente su usuario o password", 0);
		//return false
	}
}

//------------------------------------------------------------------------
// iniciar sesion
function iniciarSesion(){
	witper_inLoginUser("#formLoginUser", function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("iniciarSesion-datosDevuelto: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   let mensj = datosDevuelto.mensaje;
	   let datos = datosDevuelto.datos;
	   if(exito && datos != 0){
		sessionStorage.setItem("sesionCpanel", JSON.stringify(datos));
		//location.href="../../../../ecwitper-site-puntoventa/ecwitper-cpanelpvta-mainmenu-ctrl/ver/menu/?page=cpanelpvta";
		// GTP 20241107: se ajusta llamada
		location.href="../../../../vta/cpanel/account/cpanel-punto-vta/cpanel";
	   }else{
		mostrarMensaje("Su clave o contrase&nacute;a es incorrecta, vuelva a intentarlo", 2);
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al iniciar sesi&oacute;n", 2);
		console.log(">>> VTA-iniciarSesion-errorLanzado: " + JSON.stringify(errorLanzado));
	}
   });
}
//------------------------------------------------------------------------
