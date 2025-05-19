//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// NITPER - TECHNOLOGY
// Copyright ©2021 Nitper. Todos los derechos reservados.
// 20210301 biblioteca witper_adm-0.0.1.js degui@nitper.com
// 20230902 biblioteca witper_padm-1.1.1.js degui@nitper.com
//------------------------------------------------------------------------------

//PATH_SMALL 		= "../../../../";
//APP 			= "apps";
//PORTALADMIN		= "ecwitper-site-portaladmin";
//PRINCIPAL 		= "ecwitper-cpaneladmin-mainmenu-ctrl";
//CTRLACCESO 		= "ecwitper-controlacceso-cuentausuario-ctrl";
//INGRESOMERCA 		= "ecwitper-ingresomercancia-registrocompra-ctrl";
//SALIDAMERCA  		= "ecwitper-salidamercancia-registroventa-ctrl";
//ATENCIONCLI		= "ecwitper-atencioncliente-recepcioncli-ctrl";

PATH_SMALL 		= "/";
ECW_CPANELADM_MAINMENU		= "adm/app/mainmenu";
ECW_SALMERCA_REGVENTA		= "adm/app/salmerca";
ECW_INGMERCA_REGCOMPRA		= "adm/app/ingmerca";
ECW_CTRLACCESO_CUENTAU		= "adm/app/ctrlacceso";
ECW_ATENCIONCLI_RECEPCLI	= "adm/app/atencioncli";
//------------------------------------------------------------------------------
// Login
//------------------------------------------------------------------------------
// 20210502 iniciar sesion
function witper_inLoginUser(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + "adm/principal/consultar/validar-usuario",
		 //url: PATH_SMALL + PORTALADMIN + "/"+ PRINCIPAL + "/consultar/validar-usuario",
		 //url: PATH_SMALL + APP + "/" + PORTALADMIN + "/"+ PRINCIPAL + "/consultar/validar-usuario",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/consultar/validar-usuario",
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
	//console.log(">>> wADM-getPageSel-ruta: " + ruta);
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
	//console.log(">>> ADM-loadMenuPrincipal-codUser: " + codUser);
      $.ajax({
	     type: "GET",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/consultar/cargar-menu-principal/?codUser=" + codUser,
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/consultar/cargar-menu-principal/?codUser=" + codUser,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210503 cargar menú lateral
function witper_getMenuLateral(op, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/consultar/obtener-menu-lateral/?codMGProg=" + op,
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/consultar/obtener-menu-lateral/?codMGProg=" + op,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210504 cargar op menú lateral
function witper_getOpcionesMenuLateral(codGProg, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/consultar/obtener-opcion-menu-lateral/?codGProg=" + codGProg,
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/consultar/obtener-opcion-menu-lateral/?codGProg=" + codGProg,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210505 obtener página
function witper_getPageId(codPage, callback){
    $.ajax({
	    type: "POST",
	    //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/consultar/obtener-pagina-id/?codPage=" + codPage,
		url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/consultar/obtener-pagina-id/?codPage=" + codPage,
	    dataType: "json",
	    success: function(response){callback(null, response);},
	    error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Cuenta
//------------------------------------------------------------------------------
// 20210506 obtener lista de usuarios
function witper_obtenerListaUsuarios(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + CTRLACCESO + "/consultar/obtener-lista-usuarios",
		 url: PATH_SMALL + ECW_CTRLACCESO_CUENTAU + "/consultar/obtener-lista-usuarios",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210513 registrar usuario
function witper_registrarNuevoUsuario(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/registrar-nuevo-usuario",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/registrar-nuevo-usuario",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210517 modificar usuario
function witper_modificarUsuario(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/modificar-usuario",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/modificar-usuario",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210518 eliminar usuario
function witper_eliminarUsuario(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/eliminar-usuario",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/eliminar-usuario",
	     data: {'datos': JSON.stringify(datos)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Cliente
//------------------------------------------------------------------------------
// 20210523 obtener lista de clientes
function witper_listarClientes(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-clientes",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-clientes",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210523 registrar cliente
function witper_registrarNuevoCliente(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/registrar-nuevo-cliente",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/registrar-nuevo-cliente",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210523 modificar cliente
function witper_modificarCliente(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/modificar-cliente",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/modificar-cliente",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210523 eliminar cliente
function witper_eliminarCliente(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + PRINCIPAL + "/registrar/eliminar-cliente",
		 url: PATH_SMALL + ECW_CPANELADM_MAINMENU + "/registrar/eliminar-cliente",
	     data: {'datos': JSON.stringify(datos)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// 20210524 Atención al cliente
//------------------------------------------------------------------------------
// 20210523 obtener lista de productos tienda
function witper_listarProductosTienda(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-productos-tienda",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-productos-tienda",
	     data: {'datos': JSON.stringify(datos)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}

function witper_listarPedidos(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-pedidos",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-pedidos",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
function witper_listarSuscriptores(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + ATENCIONCLI + "/consultar/obtener-lista-suscriptores",
		 url: PATH_SMALL + ECW_ATENCIONCLI_RECEPCLI + "/consultar/obtener-lista-suscriptores",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
function witper_listarContactos(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + ATENCIONCLI + "/consultar/obtener-lista-contactos",
		 url: PATH_SMALL + ECW_ATENCIONCLI_RECEPCLI + "/consultar/obtener-lista-contactos",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
function witper_listarLibroReclamos(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + ATENCIONCLI + "/consultar/obtener-lista-libro-reclamos",
		 url: PATH_SMALL + ECW_ATENCIONCLI_RECEPCLI + "/consultar/obtener-lista-libro-reclamos",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}

// 20210529 registrar nuevo producto tienda
function witper_registrarNuevoProductoTienda(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/registrar-nuevo-producto-tienda",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/registrar-nuevo-producto-tienda",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210529 modificar producto tienda
function witper_modificarProductoTienda(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/modificar-producto-tienda",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/modificar-producto-tienda",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// 20210726 Subir Imagen de producto
//------------------------------------------------------------------------------
// 20210726 subir archivo de imagen
function witper_subirImagenProductoTienda(formData, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/registrar-imagen-producto-tienda",
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/registrar-imagen-producto-tienda",
	     data: formData,
	     contentType: false,
	     processData: false,
	     cache: false,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210804 consultar imagen de producto
function witper_obtenerImagenProductoTienda(codProd, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-imagen-producto-tienda/?codProducto=" + codProd,
		 url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-imagen-producto-tienda/?codProducto=" + codProd,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// 20220518 Subir Imagen Galeria
//------------------------------------------------------------------------------
// 20220518 subir archivo de imagen
function witper_subirImagenProductoGaleria(formData, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/registrar-imagen-producto-galeria",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/registrar-imagen-producto-galeria",
	   data: formData,
	   contentType: false,
	   processData: false,
	   cache: false,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20220522 obtener imagenes de galería de productos
function witper_obtenerImagenesGaleriaProductos(codProd, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-imagenes-galeria-productos/?codProducto=" + codProd,
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-imagenes-galeria-productos/?codProducto=" + codProd,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20220525 Modificar imagen galeria
function witper_modificarImagenProductoGaleria(formData, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/modificar-imagen-producto-galeria",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/modificar-imagen-producto-galeria",
	   data: formData,
	   contentType: false,
	   processData: false,
	   cache: false,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
//------------------------------------------------------------------------------
// 20211229 Cargar Listas
//------------------------------------------------------------------------------
// 20211229 obtener lista de fabricantes
function witper_obtenerListaFabricantes(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-fabricantes",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-fabricantes",
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20220729 obtener lista tipo categoria productos
function witper_obtenerListaTipoCategoriaProductos(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-tipo-categoria-prod",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-tipo-categoria-prod",
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20211230 obtener lista categoria productos
function witper_obtenerListaCategoriaProductos(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-categoria-prod",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-categoria-prod",
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20220729 obtener lista sub-categoria productos
function witper_obtenerListaSubCategoriaProductos(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-sub-categoria-prod",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-sub-categoria-prod",
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20220814 obtener lista categoria por tipo
function witper_obtenerListaCategoriaByTipoCat(codTipoCat, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-categoria-by-tipo-cat/?codTipoCat="+codTipoCat,
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-categoria-by-tipo-cat/?codTipoCat="+codTipoCat,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20220815 obtener lista sub-categoria productos por codigo categoria
function witper_obtenerListaSubCategoriaByCodCat(codCat, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-lista-sub-categoria-by-cod-cat/?codCat="+codCat,
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-lista-sub-categoria-by-cod-cat/?codCat="+codCat,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// 20220506 Registrar especificacion de producto
function witper_setEspecificacion(idForm, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/registrar-especificacion-producto",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/registrar-especificacion-producto",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20220515 Modificar especificacion de producto
function witper_updateEspecificacion(idForm, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/registrar/modificar-especificacion-producto",
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/registrar/modificar-especificacion-producto",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20220505 Consultar tabla de especificacion de producto
function witper_getTablaEspec(codProducto, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + SALIDAMERCA + "/consultar/obtener-especificacion-de-producto/?codProducto=" + codProducto,
	   url: PATH_SMALL + ECW_SALMERCA_REGVENTA + "/consultar/obtener-especificacion-de-producto/?codProducto=" + codProducto,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  	});
}

//------------------------------------------------------------------------------
// 20230615 MODULO DE COMPRAS
//------------------------------------------------------------------------------
// 20230615 consultar comprobante de compras
function witper_consultarComprobanteCompras(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + PORTALADMIN + "/" + INGRESOMERCA + "/consultar/consultar-comprobante-compras",
	   url: PATH_SMALL + ECW_INGMERCA_REGCOMPRA + "/consultar/consultar-comprobante-compras",
	   data: {'datos': JSON.stringify(datos)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown){callback(errorThrown);}
  });
}
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
