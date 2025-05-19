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
		//cargarPagina("adm/principal/ver/menu/?page=principal");
		//location.href="../../../../adm/principal/ver/menu/?page=principal";
		//location.href="../../../../ecwitper-site-portaladmin/ecwitper-controlseguridad-loginadmin-ctrl/ver/menu/?page=principal";
		//location.href="../../../../ecwitper-site-portaladmin/ecwitper-gestionmenu-admin-ctrl/ver/menu/?page=principal";
		//location.href="../../../../ecwitper-site-portaladmin/ecwitper-cpaneladmin-mainmenu-ctrl/ver/menu/?page=cpaneladmin";

		// 20241103 degui: nueva llamada
		location.href="../../../../adm/cpanel/account/cpanel-portal-admin/cpanel";
		//let uri = "adm/cpanel/account/cpanel-portal-admin/cpanel";
		//console.log(">>> loginadmin-iniciarSesion-uri: " + uri);
		//cargarPaginaSel(uri);

	   }else{
			mostrarMensaje("Su clave o contrase&nacute;a es incorrecta, vuelva a intentarlo", 2);
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al logearse. Comuniquese con el webmaster.", 2);
		console.log(">>> loginadmin-iniciarSesion-errorLanzado: " + JSON.stringify(errorLanzado));
	}
   });
}
//------------------------------------------------------------------------
