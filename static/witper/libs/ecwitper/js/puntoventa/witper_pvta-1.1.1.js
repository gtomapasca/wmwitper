//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// NITPER - TECHNOLOGY
// Copyright ©2021 Nitper. Todos los derechos reservados.
// 20230828 biblioteca witper_pvta-1.1.1.js degui@nitper.com
//------------------------------------------------------------------------------
//PATH_SMALL 	= "../../../../";
//PORTALPTOVTA	= "ecwitper-site-puntoventa";
//PRINCIPAL 	= "ecwitper-cpanelpvta-mainmenu-ctrl";
//INGRESOCAJA 	= "ecwitper-ingresocaja-ventaproducto-ctrl";

PATH_SMALL 		= "/";
//TOP_MENU		= "vta/app/menu";
ECW_CPANELVTA_MAINMENU		= "vta/app/mainmenu";
ECW_INGRESOCAJA_VTAPROD		= "vta/app/ingcaja";

//------------------------------------------------------------------------------
// Login
//------------------------------------------------------------------------------
// 20210502 iniciar sesion
function witper_inLoginUser(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + "adm/principal/consultar/validar-usuario",
		 //url: PATH_SMALL + PORTALPTOVTA + "/"+ PRINCIPAL + "/consultar/validar-usuario",
		 url: PATH_SMALL + ECW_CPANELVTA_MAINMENU + "/consultar/validar-usuario",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Principal
//------------------------------------------------------------------------------
// 20210301 obtener una pagina en general
function witper_getPageSel(ruta, callback){
	//console.log(">>> VTA-getPageSel-ruta: " + ruta);
    $.ajax({
	    type: "POST",
	    url: PATH_SMALL + ruta,
	    dataType: "json",
	    success: function(response){callback(null, response);},
	    error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210503 cargar menú principal
function witper_loadMenuPrincipal(codUser, callback){
	//console.log(">>> VTA-loadMenuPrincipal-codUser: " + codUser);
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALPTOVTA + "/" + PRINCIPAL + "/consultar/cargar-menu-principal/?codUser=" + codUser,
		 url: PATH_SMALL + ECW_CPANELVTA_MAINMENU + "/consultar/cargar-menu-principal/?codUser=" + codUser,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210503 cargar menú lateral
function witper_getMenuLateral(op, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALPTOVTA + "/" + PRINCIPAL + "/consultar/obtener-menu-lateral/?codMGProg=" + op,
		 url: PATH_SMALL + ECW_CPANELVTA_MAINMENU + "/consultar/obtener-menu-lateral/?codMGProg=" + op,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210504 cargar op menú lateral
function witper_getOpcionesMenuLateral(codGProg, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALPTOVTA + "/" + PRINCIPAL + "/consultar/obtener-opcion-menu-lateral/?codGProg=" + codGProg,
		 url: PATH_SMALL + ECW_CPANELVTA_MAINMENU + "/consultar/obtener-opcion-menu-lateral/?codGProg=" + codGProg,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210505 obtener página
function witper_getPageId(codPage, callback){
    $.ajax({
	    type: "POST",
	    //url: PATH_SMALL + PORTALPTOVTA + "/" + PRINCIPAL + "/consultar/obtener-pagina-id/?codPage=" + codPage,
		url: PATH_SMALL + ECW_CPANELVTA_MAINMENU + "/consultar/obtener-pagina-id/?codPage=" + codPage,
	    dataType: "json",
	    success: function(response){callback(null, response);},
	    error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// 20230204 MODULO DE VENTAS (CAJA)
//------------------------------------------------------------------------------
// 20230204 obtener datos de cliente
function witper_obtenerDatosClienteParaVenta(tipDoc, numDoc, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/obtener-datos-cli-ventas/?tipDoc=" + tipDoc + "&numDoc=" + numDoc,
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/obtener-datos-cli-ventas/?tipDoc=" + tipDoc + "&numDoc=" + numDoc,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}

// 20230204 obtener datos de producto
function witper_obtenerDatosProductoParaVenta(codFiltro, codProd, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/obtener-datos-producto-ventas/?codFiltro=" + codFiltro + "&codProd=" + codProd,
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/obtener-datos-producto-ventas/?codFiltro=" + codFiltro + "&codProd=" + codProd,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}

// 20230225 consultar comprobante de ventas
function witper_consultarComprobanteVentas(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/consultar-comprobante-ventas",
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/consultar-comprobante-ventas",
	   data: {'datos': JSON.stringify(datos)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  });
}

// 20230305 registrar comprobante de venta
function witper_registrarComprobanteVenta(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/registrar/registrar-comprobante-venta",
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/registrar/registrar-comprobante-venta",
	   data: {'datos': JSON.stringify(datos)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  });
}

// 20230313 registrar detalle de venta
function witper_registrarDetalleVenta(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/registrar/registrar-detalle-venta",
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/registrar/registrar-detalle-venta",
	   data: {'datos': JSON.stringify(datos)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}

// 20230315 obtener correlativo comprobante venta
function witper_obtenerCorrelativoComprobanteVenta(tipComprob, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/obtener-correlativo-comprobante-venta/?tipComprob=" + tipComprob,
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/obtener-correlativo-comprobante-venta/?tipComprob=" + tipComprob,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}

// 20230315 obtener id comprobante venta
function witper_obtenerIdComprobanteVenta(s, n, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/obtener-id-comprobante-venta/?serieComprob=" + s + "&nroComprob="+n,
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/obtener-id-comprobante-venta/?serieComprob=" + s + "&nroComprob="+n,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}
// 20230323 obtener detalle de venta por id
function witper_obtenerDetalleVentaById(id, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/consultar/obtener-detalle-venta-by-id/?idVenta="+id,
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/consultar/obtener-detalle-venta-by-id/?idVenta="+id,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  	});
}
// 20230407 registrar nuevo cliente para venta
function witper_registrarNuevoClienteParaVenta(idForm, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALPTOVTA + "/" + INGRESOCAJA + "/registrar/registrar-nuevo-cliente-para-venta",
	   url: PATH_SMALL + ECW_INGRESOCAJA_VTAPROD + "/registrar/registrar-nuevo-cliente-para-venta",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  	});
}
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
