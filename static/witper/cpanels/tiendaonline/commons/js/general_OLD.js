/************************************************************************/
// Funciones java script - jquery de uso general
/************************************************************************/
$(document).ready(function () {
    initInterfazG();
});	

function initInterfazG(){
    // iniciar sesion
    iniCountUser();
};
//-------------------------------------------------------------------------------------
// modal mensaje
function mostrarMensaje(msj, tipo){
	$("#myModalOne").remove();
	$("body").append(
		'<div class="modal fade" id="myModalOne" role="dialog">'
		+	'<div class="modal-dialog">'
		+		'<div class="modal-content">'
		+			'<div class="modal-header">'
		+				'<button type="button" class="close" data-dismiss="modal">&times;</button>'
		+				'<h4 class="modal-title">Mensaje</h4>'
		+			'</div>'
		+			'<div class="modal-body">'
		+				'<div class="row">'
		+					'<div class="col-md-1"><i class="fa fa-info-circle" style="font-size:45px; color:gray;"></i></div>'
		+					'<div class="col-md-11">'+msj+'</div>'
		+				'</div>'
		+			'</div>'
		+			'<div class="modal-footer">'
		+				'<button type="button" class="btn btn-primary" id="dlgBtnAceptarConfirm">Aceptar</button>'
		+			'</div>'
		+		'</div>'
		+	'</div>'
		+'</div>'
	);
	$("#dlgBtnAceptarConfirm").click(function(e){
		$('#myModalOne').modal('hide');
	});
	$('#myModalOne').modal('show');
};
//-------------------------------------------------------------------------------------
// modal mensaje confirmacion
function mensajeConfirmar(callback){
	$("#myModalConfirm").remove();	
	$("body").append(
		'<div class="modal fade" id="myModalConfirm" role="dialog">'
		+	'<div class="modal-dialog">'
		+		'<div class="modal-content">'
		+			'<div class="modal-header">'
		+				'<button type="button" class="close" data-dismiss="modal">&times;</button>'
		+				'<h4 class="modal-title">Mensaje</h4>'
		+			'</div>'
		+			'<div id ="dlgMensajeAfirmativo1" class="modal-body">'
		+				'<p>Por favor verifique detalladamente los datos ingresados a fin de continuar con su registro, una vez registrada no podrá efectuar modificación.</p>'
		+			'</div>'
		+			'<div id ="dlgMensajeAfirmativo2" class="modal-footer">'
		+				'<button type="button" class="btn btn-info" id="dlgBtnAceptarConfirm">Aceptar</button>'
		+			'</div>'
		+			'<div id ="dlgMensajeConfirma1" class="modal-body" style="display:none;">'
		+				'<p>¿Está seguro de grabar?</p>'
		+			'</div>'
		+			'<div id ="dlgMensajeConfirma2" class="modal-footer" style="display:none;">'
		+				'<button type="button" class="btn btn-basic" id="dlgBtnNo">No</button>'
		+				'<button type="button" class="btn btn-primary" id="dlgBtnSi">Si</button>'
		+			'</div>'
		+		'</div>'
		+	'</div>'
		+'</div>'
	);
	$("#dlgBtnAceptarConfirm").click(function(e){
		$('#dlgMensajeAfirmativo1').toggle('hide');
		$('#dlgMensajeAfirmativo2').toggle('hide');
		$('#dlgMensajeConfirma1').toggle('slow');
		$('#dlgMensajeConfirma2').toggle('slow');
	});
	$("#dlgBtnSi").click(function(e){
		$('#myModalConfirm').modal('hide');
		// ejecuta la funcion que viene por parametro
		callback();
	});
	$("#dlgBtnNo").click(function(e){
		$('#myModalConfirm').modal('hide');
	});
	$('#myModalConfirm').modal('show');
};
//-------------------------------------------------------------------------------------
// 20190928 Menu latera
/* 20240618 GTP: se comenta y retira ya que no tiene proposito crear una función para una sola línea de código
function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	//document.getElementById("main").style.marginLeft = "250px";
	//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	//document.getElementById("main").style.marginLeft= "0";
	//document.body.style.backgroundColor = "white";
}
*/
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// valida si existe una sesion activa al inicio de cargar la web
function iniCountUser(){
	//let usesion = localStorage.getItem("userSesion");
	//let usesion = JSON.parse(sessionStorage.getItem("userSesion"));
	let usesion = sessionStorage.getItem("userSesion");
	//console.log(">>> iniCountUser-usesion: " + usesion);
	$("#txtEmailLogin").val("");
	$("#txtPassword").val("");
	if (usesion == null || usesion == undefined){
      	//$("#nameUser").html("&nbsp; Iniciar Sesion");
		$("#nameUser").html("Usuario");
		$("#nameUserCel").html("");
		//document.getElementById("myContentMenuUsuario").style.display = "block";
		//$('#myContentMenuUsuario').toggle('hide');
	}else{
		//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
		$("#nameUser").html("<b>Hola!</b>");
		$("#nameUserCel").html("<b>Hola!</b>");
		$("#mnulateral-avatar").attr("src", usesion[0].avatar);
		$("#mnulateral-usu").html("Hola " + usesion[0].nick);
		document.getElementById("myContentMenuUsuario").style.display = "none";
	}
}

/* 20240618 GTP: Se comenta y pasa a frmLoginUsuario

//$('#btnLoginUser').on('click',function(){
$('#myBtnMenuUsuario').on('click',function(){
	let usesion = sessionStorage.getItem("userSesion");
	//console.log(">>> btnLoginUser-usesion: " + usesion);
	if (usesion == null || usesion == undefined){
      	//$('#divLoginUser-p1').toggle('slow');
		$('#myContentMenuUsuario').toggle('slow');
	}else{
		//$('#divLoginUser-p2').toggle('slow');		
		//openNav();
		document.getElementById("mySidenav").style.width = "250px";
	}
});


$('#btnInLoginUser').click(function() {
	let email = $("#txtEmailLogin").val();
	//console.log(">>> btnInLoginUser-email: " + email);
	if(email.trim().length > 5){
		//inLoginUser();
		iniciarSesion();
		$("#txtEmailLogin").val("");
		$("#txtPassword").val("");
		return false;
	}
	else{
		mostrarMensaje("Ingrese correctamente su email o password", 0);
		return false
	}
});


// iniciar sesion
function iniciarSesion(){
	witper_iniciarSesion("#formLoginUser", function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("iniciarSesion-datosDevuelto: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito && datos != 0){
				//$('#divLoginUser-p1').toggle('hide');
				//$('#myContentMenuUsuario').toggle('hide');
				document.getElementById("myContentMenuUsuario").style.display = "none";
				let usesion = null;
				sessionStorage.setItem("userSesion", JSON.stringify(datos));
				usesion = JSON.parse(sessionStorage.getItem("userSesion"));
				//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
				$("#nameUser").html("<b>Hola!</b>");
				// 20240521 Degui: se agrega
				$("#mnulateral-avatar").attr("src", usesion[0].avatar);
				$("#mnulateral-usu").html("Hola " + usesion[0].nick);
				//openNav();
				document.getElementById("mySidenav").style.width = "250px";
			}else{
				mostrarMensaje("Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo", 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al iniciar sesión", 2);
		}
	});
}
*/

// Salir de sesion
$('#mnulateral-exit').click(function(){
	sessionStorage.removeItem("userSesion");
	$("#nameUser").html("Usuario");
	//closeNav();
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("myContentMenuUsuario").style.display = "block";
	$('#myContentMenuUsuario').toggle('hide');
});

//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
/* 20210627 Para cel */
$('#btnLoginUserCel').on('click',function(){
	let usesion = sessionStorage.getItem("userSesion");
	if (usesion == null || usesion == undefined){
      		$('#divLoginUser-p2').toggle('slow');
	}else{
		//openNav();
		document.getElementById("mySidenav").style.width = "250px";
	}
});

$('#btnInLoginUserCel').click(function() {
   let email = $("#txtEmailLogin").val();
   if(email.trim().length > 5){
	iniciarSesionCel();
	return false;
   }
   else{
	mostrarMensaje("Ingrese correctamente su email o password", 0);
	return false
   }
});

// iniciar sesion
function iniciarSesionCel(){
	witper_iniciarSesion("#formLoginUserCel", function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		//console.log("iniciarSesion-datosDevuelto: " + JSON.stringify(datosDevuelto));
		let exito = datosDevuelto.encontrado;
		let mensj = datosDevuelto.mensaje;
		let datos = datosDevuelto.datos;
		if(exito && datos != 0){
			$('#divLoginUser-p2').toggle('hide');
			let usesion = null;
			sessionStorage.setItem("userSesion", JSON.stringify(datos));
			usesion = JSON.parse(sessionStorage.getItem("userSesion"));
			//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
			$("#nameUserCel").html("<b>Hola!</b>");
		}else{
			mostrarMensaje("Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo", 2);
		}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
}
//-------------------------------------------------------------------------------------
// 20240618 GTP: Se retira al no tener lugar
/*$('#btnMenuCategorias').on('click',function(){
	$('#divMenuCategorias').toggle('slow');
});*/
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20210301 carga una pagina en general
function cargarPagina(uri){ 
	cargarPagina(uri, null);
}

function cargarPagina(uri, idElemento){ 
	console.log(">> general-cargarPagina-uri: " + uri);
	witper_cargarPagina(uri, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> cargarPagina-datosDevuelto: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito){				
				if(idElemento != null){
					$("#" + idElemento).html(datos);
				}else{
					$("#box-contenido-principal").html(datos);
				}
			}else{
				html = "<html>";
				html += "<body>";
				html += "<h2>Error de Sistema</h2>";
				html += "<h4>Disculpe, no se encontro la página, consulte con el administrador de sistemas.</h4>";
				html += "</body>";
				html += "</html>";
				if(idElemento != null){
					$("#" + idElemento).html(datos);
				}else{
					$("#box-contenido-principal").html(datos);
				}
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar la página general", 2);
			console.log(">>> cargarPagina-errorLanzado: " + JSON.stringify(errorLanzado));
		}
	});
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20220528 Detectar el uso del botón de retroceso frente a los elementos de la página 
// con respecto a la navegación hash, para Aplicaciones de página única con pushState
// https://www.web-dev-qa-db-es.com/es/javascript/como-detectar-el-evento-del-boton-atras-del-navegador-navegador-cruzado/1047886620/
var stateObj = { page: "inicio" };
history.pushState(stateObj, "compuchiclayo", "inicio");

//var currentState = history.state;
//var numeroDeEntradas = window.history.length;
//console.log("GTP-currentState: " + currentState);
//console.log("GTP-numeroDeEntradas: " + numeroDeEntradas);

window.onpopstate = function(event) {
	// "event" object seems to contain value only when the back button is clicked
	// and if the pop state event fires due to clicks on a button
	// or a link it comes up as "undefined" 
	if(event){
	  // Code to handle back button or prevent from navigation
	  //window.location.href = "http://compucix.com";
	  window.location.href = "https://compuchiclayo.com";	  
	}
	else{
	  // Continue user action through link or button
	}
  }
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
//window.scroll(0,0);
//-------------------------------------------------------------------------------------
// 20211111 mensaje emergente
/*let close_button = document.getElementById('close-button');
close_button.addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("window-notice").style.display = "none";
});*/
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
