/************************************************************************/
// Funciones java script - jquery de uso general
/************************************************************************/
$(document).ready(function () {
    initInterfazG();
});	

function initInterfazG(){
    // carga la pagina de inicio
    //cargarPagina("cli/principal/ver/menu/?page=10101"); 

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
function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
	document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
	document.body.style.backgroundColor = "white";
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// Login User
function iniCountUser(){
	//let usesion = localStorage.getItem("userSesion");
	let usesion = JSON.parse(sessionStorage.getItem("userSesion"));
	//console.log(">>> iniCountUser-usesion: " + usesion);
	if (usesion == null || usesion == undefined){
      	//$("#nameUser").html("&nbsp; Iniciar Sesion");
		$("#nameUser").html("");
		$("#nameUserCel").html("");
	}else{
		//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
		$("#nameUser").html("<b>Hola!</b>");
		$("#nameUserCel").html("<b>Hola!</b>");
		$("#mnulateral-avatar").attr("src", usesion[0].avatar);
		$("#mnulateral-usu").html("Hola " + usesion[0].nick);
	}
}

$('#btnLoginUser').on('click',function(){
	let usesion = sessionStorage.getItem("userSesion");
	//console.log(">>> btnLoginUser-usesion: " + usesion);
	if (usesion == null || usesion == undefined)
      		$('#divLoginUser-p1').toggle('slow');
	else
		//$('#divLoginUser-p2').toggle('slow');
		openNav();
});

$('#btnInLoginUser').click(function() {
	let email = $("#txtEmailLogin").val();
	//console.log(">>> btnInLoginUser-email: " + email);
	if(email.trim().length > 5){
		//inLoginUser();
		iniciarSesion();
		return false;
	}
	else{
		mostrarMensaje("Ingrese correctamente su email o password", 0);
		return false
	}
});

$('#btnMenuCategorias').on('click',function(){
	$('#divMenuCategorias').toggle('slow');
});
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
/* 20210627 Para cel */
$('#btnLoginUserCel').on('click',function(){
	let usesion = sessionStorage.getItem("userSesion");
	if (usesion == null || usesion == undefined)
      		$('#divLoginUser-p2').toggle('slow');
	else
		openNav();
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
// iniciar sesion
function iniciarSesion(){
   witper_iniciarSesion("#formLoginUser", function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
		//console.log("iniciarSesion-datosDevuelto: " + JSON.stringify(datosDevuelto));
		let exito = datosDevuelto.encontrado;
		let mensj = datosDevuelto.mensaje;
		let datos = datosDevuelto.datos;
		if(exito && datos != 0){
			$('#divLoginUser-p1').toggle('hide');
			let usesion = null;
			sessionStorage.setItem("userSesion", JSON.stringify(datos));
			usesion = JSON.parse(sessionStorage.getItem("userSesion"));
			//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
			$("#nameUser").html("<b>Hola!</b>");
			//console.log(">>> Gtpx-hola..");
		}else{
			mostrarMensaje("Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo", 2);
		}
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al iniciar sesión", 2);
	}
   });
}

// Salir de sesion
$('#mnulateral-exit').click(function(){
	sessionStorage.removeItem("userSesion");
	obtenerPagina("cli/principal/ver/menu/?page=10101"); // carga la pagina de inicio
});
//-------------------------------------------------------------------------------------
/*
// Suscripcion
$('#btnSuscripcion').click(function() {
   let email = $("#txtEmail").val();
   if(email.trim().length > 5){
	grabarSuscripcion();
	return false;
   }
   else{
	mostrarMensaje("Para suscribirse, necesita ingresar su email", 0);
	return false
   }
});

function limpiar(){
	$("#txtEmail").val("");
}

// registrar suscripcion
function grabarSuscripcion(){
   registrarSuscripcion("#frmSuscripcion", function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("response: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   let mensj = datosDevuelto.msj;
	   if(exito){
		limpiar();
		mostrarMensaje("Su suscripción fue realizado correctamente", 0);
	   }else{
		mostrarMensaje("Disculpe, no se pudo realizar la última operación " + mensj, 2);
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
	}
   });
}
*/
//-------------------------------------------------------------------------------------
/*
// Busqueda de productos
$('#btnBusquedaProductos').click(function() {
	busquedaProductos2();
});

$("#txtBuscar").keyup(function(e){
	if (e.keyCode === 13) {
		busquedaProductos2();
	}else{
		busquedaProductos1();
	}
});

// validar búsqueda prodducto
function busquedaProductos1(){
  //let categoria = $("#selCategoria").val();
  let categoria = '0';
  let busqueda  = $("#txtBuscar").val();
  //console.log(">>> busqueda2: " + busqueda + ", categoria:" + categoria + ", size: " + busqueda.trim().length);
  if(busqueda.trim().length > 0){
	buscarProducto(categoria, busqueda, 1);
  }else{
	$("#panelResultadoBusqueda").html('<div></div>');
  }
}

// buscar prodducto
function busquedaProductos2(){
   //let categoria = $("#selCategoria").val();
   //let categoria = '0';
   let busqueda  = $("#txtBuscar").val();
   //console.log(">>> busqueda1: " + busqueda + ", categoria:" + categoria + ", size: " + busqueda.trim().length);
   if(busqueda.trim().length > 0){
		$("#panelResultadoBusqueda").html('<div></div>');
		cargarPagina("cli/principal/ver/menu/?page=20302");
		//buscarProducto(categoria, busqueda, 2);
   }
}

// buscar prodducto
function buscarProducto(categoria, busqueda, tipo){
   witper_buscarProducto(categoria, busqueda, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("response: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   let mensj = datosDevuelto.mensaje;
	   let datos = datosDevuelto.datos;
	   if(exito && datos != 0){
		   	if(tipo == 1){
				mostrarResuladoBusqueda1(datos);
		   	}else if(tipo == 2){
				mostrarResuladoBusqueda2(datos);
		   	}else if(tipo == 3){
				mostrarResuladoBusqueda3(datos);
		   	}
	   }else{
			$("#panelResultadoBusqueda").html('<div></div>');
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
	}
   });
}

function prepararResuladoBusqueda(datos){
	let html = '';
	let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:lowercase;';
	if(datos == 0){
		html += '	 <div></div>';
	}else{
		for(let item of datos){
			html += '<div class="1row" style="overflow:hidden;_height:1%;1border:1px solid #000;">';
			html += '	<div style="padding:10px;1border:2px solid green;">';
			//html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">'+item.producto+'</a>';
			html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
			html += '	</div>';
			html += '</div>';
		}
	}
	return html;
};

// muestra el resultado en el mismo buscador
function mostrarResuladoBusqueda1(datos){
	let html = '';
	html += '<div style="position:absolute;background-color:#fff;width:510px;border:1px solid #ddd;z-index:100;">';
	html += prepararResuladoBusqueda(datos);
	html += '</div>';
	$("#panelResultadoBusqueda").html(html);
};


// Muestra producto seleccionado del resultado de la búsqueda
function mostrarProductoBusqueda(mc){
	// carga la pagina de producto
	//cargarPagina('cli/principal/consultar/mostrar-producto-sel/?page=10502&id='+idProd);
	cargarPagina('cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+mc);
	// limpia los datos de busqueda
	$("#panelResultadoBusqueda").html('<div></div>');
	$("#panelResultadoBusquedaCel").html('<div></div>');
	$('#myModalOne').modal('hide');
	$("#txtBuscar").val("");
	$("#txtBuscarCel").val("");
   	$("#selCategoria").val(0);
}

// -------------------- buscar cel [ini] ------------------
// validar búsqueda cel
$("#txtBuscarCel").keyup(function(e){
	// buscar al presionar enter 
	if (e.keyCode === 13) {
		busquedaProductosCel2();
	} // buscar mientras teclea 
	else{
		busquedaProductosCel1();
	}
});

// cel mostrar resultado de la búsqueda mientras teclea
function busquedaProductosCel1(){
	  let categoria = "0"; // para buscar contra todos
	  let busqueda  = $("#txtBuscarCel").val();
	  if(busqueda.trim().length > 0){
		buscarProducto(categoria, busqueda, 3);
	  }else{
		$("#panelResultadoBusquedaCel").html('<div></div>');
	  }
}

// cel mostrar resultado de la búsqueda al presionar enter
function busquedaProductosCel2(){
   	let busqueda  = $("#txtBuscarCel").val();
   	if(busqueda.trim().length > 0){
		$("#panelResultadoBusquedaCel").html('<div></div>');
		$("#txtBuscarCel").val("");
		cargarPagina("cli/principal/ver/menu/?page=20302");
   	}
}

// muestra el resultado en el mismo buscador
function mostrarResuladoBusqueda3(datos){
	let html = '';
	let style = 'text-decoration:none;font-weight: bold;color:#5D6D7E;text-transform:lowercase;';
	html += '<div style="position:absolute;background-color:#fff;width:300px;border:1px solid #ddd;z-index:100;">';
	if(datos == 0){
		html += '<div></div>';
	}else{
		for(let item of datos){
			html += '<div class="1row" style="padding:10px;">';
			html += '  <div class="1col-md-4">';
			//html += '    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">'+item.producto+'</a>';
			html += '    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
			html += '  </div>';
			html += '</div>';
		}
	}
	html += '</div>';
	$("#panelResultadoBusquedaCel").html(html);
};
*/
// -------------------- buscar cel [fin] ------------------
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20210301 carga una pagina en general
function cargarPagina(uri){ 
	console.log(">> GTPX-static-cargarPagina...");
	witper_cargarPagina(uri, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> cargarPagina: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito){
				$("#box-contenido-principal").html(datos);
			}else{
				$("#box-contenido-principal").html("<html><body><h2>Error de Sistema</h2><h4>Disculpe, no se encontro la página, consulte con el administrador de sistemas.</h4></body></html>");
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar la página", 2);
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
window.scroll(0,0);
//-------------------------------------------------------------------------------------
// 20211111 mensaje emergente
/*let close_button = document.getElementById('close-button');
close_button.addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("window-notice").style.display = "none";
});*/
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
