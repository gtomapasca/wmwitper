/************************************************************************/
// Funciones js page principal
// Degui
// 20200704
/************************************************************************/
$(document).ready(function () {
    initInterfazPrincipal();
});	

function initInterfazPrincipal(){
    // 20210722 cargar página seleccionada
    cargarPaginaSeleccionada();
};

function cargarPaginaSeleccionada(){
    let opcion = $("#box-contenido-principal").attr("data-opcion");
    let clave = $("#box-contenido-principal").attr("data-clave");
    let valor = $("#box-contenido-principal").attr("data-valor");
    // cargar pagina inicio
    if(opcion == "inicio"){
		// carga la pagina de inicio
    	cargarPagina("cli/principal/ver/menu/?page=10101");
    }
	// cargar pagina producto con datos del producto seleccionado
	else if(opcion == "producto"){
		cargarPagina("cli/principal/consultar/mostrar-producto-sel/?page=10502&mc="+valor);
		//cargarPagina("cli/principal/consultar/mostrar-producto-sel/?page=10502&id="+valor);
		//cargarPagina("cli/principal/consultar/obtener-producto-by-mini-codigo/?page=10502&mc="+valor);  
    }
};
//------------------------------------------------------------------------
//------------------------------------------------------------------------
/* 20210625 Para fijar la cabecera */
$(window).scroll(function() {    
    posicionarCabecera();
});
 
function posicionarCabecera() {
    //console.log(">>> ancho: " + screen.width );
    if (screen.width <= 800) {
		//console.log(">>> ancho: <= 770");
		var altura_header_cel_top = $('.header-cel-top').outerHeight(true);
		var altura_header_cel_central = $('.header-cel-central').outerHeight(true);
		if ($(window).scrollTop() >= altura_header_cel_top){
			$('.header-cel-central').addClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', (altura_header_cel_central - altura_header_cel_top) + 'px');
		} else {
			$('.header-cel-central').removeClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', '0');
		}
    }else if (screen.width > 800){
		//console.log(">>> ancho: > 770");
		var altura_header_principal_info = $('.header-principal-info').outerHeight(true);
		var altura_header_principal_central = $('.header-principal-central').outerHeight(true);
		//console.log(">>> altura_header_principal_info: " + altura_header_principal_info);
		//console.log(">>> altura_header_principal_central: " + altura_header_principal_central);
		if ($(window).scrollTop() >= altura_header_principal_info){
			$('.header-principal-central').addClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', (altura_header_principal_central - altura_header_principal_info) + 'px');
		} else {
			$('.header-principal-central').removeClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', '0');
		}
    }
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
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
 
 function limpiarSuscripcion(){
	 $("#txtEmail").val("");
 }
 
 // registrar suscripcion
 function grabarSuscripcion(){
	witper_registrarSuscripcion("#frmSuscripcion", function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.msj;
			if(exito){
				limpiarSuscripcion();
				mostrarMensaje("Su suscripción fue realizado correctamente", 0);
			}else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación " + mensj, 2);
			}
		}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al suscribirse, intente otra vez", 2);
		}
	});
 }
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
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
	console.log(">>> buscarProducto-tipo: " + tipo);
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
		mostrarMensaje("Disculpe, existi&oacute; un problema al buscar producto", 2);
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
// -------------------- buscar cel [fin] ------------------

//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20220127 Degui: Menu categoria
function aMenuCategoria() {
	$("#myMenuCategoriaContent").css("display", "none");
}
$("#myMenuCategoriaBtn").mouseenter(function(evento){
	$("#myMenuCategoriaContent").css("display", "block");
}); 
$("#myMenuCategoriaBtn").mouseleave(function(e){
	$("#myMenuCategoriaContent").css("display", "none");
}); 
$("#myMenuCategoriaContent").mouseenter(function(evento){
	$("#myMenuCategoriaContent").css("display", "block");
}); 
$("#myMenuCategoriaContent").mouseleave(function(e){
	$("#myMenuCategoriaContent").css("display", "none");
}); 
//------------------------------------------------------------------------
// 20220327 Degui: Menu categoria Cel
function aMenuCategoriaCel() {
	$("#myMenuCategoriaContentCel").css("display", "none");
}
$("#myMenuCategoriaBtnCel").mouseenter(function(evento){
	$("#myMenuCategoriaContentCel").css("display", "block");
}); 
$("#myMenuCategoriaBtnCel").mouseleave(function(e){
	$("#myMenuCategoriaContentCel").css("display", "none");
}); 
$("#myMenuCategoriaContentCel").mouseenter(function(evento){
	$("#myMenuCategoriaContentCel").css("display", "block");
}); 
$("#myMenuCategoriaContentCel").mouseleave(function(e){
	$("#myMenuCategoriaContentCel").css("display", "none");
}); 
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// limpia las cajas de texto de búsqueda
$("#txtBuscar").focusout(function(e){
	//$("#panelResultadoBusqueda").html("");
});
$("#txtBuscarCel").focusout(function(e){
	//$("#panelResultadoBusquedaCel").html("");
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------