//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// NITPER - TECHNOLOGY
// Copyright ©2021 Nitper. Todos los derechos reservados.
// 20210301 biblioteca witper_cli-0.0.1.js degui@nitper.com
// 20230911 biblioteca witper_pcli-1.1.1.js degui@nitper.com
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
// Principal
//------------------------------------------------------------------------------
PATH_SMALL 			= "../../../../";
CLI 				= "ecwitper-site-tiendavirtual";
PRINCIPAL 			= "ecwitper-iniciotienda-mainmenu-ctrl";
CARRITO_COMPRAS		= "ecwitper-ventaselectronicas-carritocompras-ctrl";
CATALOGO_PRODUCTOS 	= "ecwitper-gestioncontenido-catalogoproductos-ctrl";
CUENTA_USUARIO		= "ecwitper-cuentausuario-maninmenu-ctrl";

//APP = "app";
APP = "cli/app";
CPANELS = "cpanel";
//TIENDAONLINE_WEBAPP			= "ecwitper-tiendaonline-webapp";
TIENDAONLINE_WEBAPP			= "store";
//BUSCADOR_TIENDAONLINE_CTRL	= "buscador-tiendaonline-ctrl";
BUSCADOR_TIENDA_CTRL		= "buscador";
//CATALOGO_PRODUCTOS_CTRL		= "catalogo-productos-ctrl";
CATALOGO_PRODUCTOS_CTRL		= "catalogo";
//CUENTA_USUARIO_CTRL			= "cuenta-usuario-ctrl";
CUENTA_USUARIO_CTRL			= "cuenta";
//CARRITO_COMPRAS_CTRL		= "carrito-compras-ctrl";
CARRITO_COMPRAS_CTRL		= "carrito";
//BLOG_TIENDA_CTRL			= "blog-tienda-ctrl";
BLOG_TIENDA_CTRL			= "blog";
PUBLICADOR_PAGINAS_CTRL		= "publipages";


// 20210301 obtener una pagina en general
function witper_cargarPagina(ruta, callback){
	//console.log(">>> cli-witper_cargarPagina-ruta: " + ruta);
    $.ajax({
	    type: "POST",
	    url: PATH_SMALL + ruta,
		//url: 'application.php/' + ruta, *** (20230820 GTP: usar cuando no se use Virtual Host)
	    dataType: "json",
	    success: function(response){callback(null, response);},
	    error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210301 obtener el total de items del carrito
function witper_obtenerCantItemsCarrito(datos, callback){
    $.ajax({
		type: "POST",
		//url: PATH_SMALL + "cli/principal/consultar/obtener-cant-items-carrito",
		//url: PATH_SMALL + CLI + "/" + PRINCIPAL + "/consultar/obtener-cant-items-carrito",
		//url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-cant-items-carrito",
		url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/consultar-carrito-compras/obtener-cant-items-carrito",
		dataType: "json",
		success: function(response){callback(null, response);},
		error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210301 obtener categoria de productos
function obtenerCategoriaProductos(datos, callback){
      $.ajax({
	     type: "POST",
	     url: PATH_SMALL + CLI + "/principal/consultar/listar-categoria-productos",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210301 registrar suscripción
function witper_registrarSuscripcion(idForm, callback){
      $.ajax({
	     type: "POST",
	     url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/registrar-suscripcion",
		 
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210301 buscar producto
//function witper_buscarProducto(cat, busq, callback){
function witper_buscarProducto(jsonDataForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/buscar-producto-by-desc/?categoria="+cat+"&busqueda="+busq,
		 //url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/buscar-productos/buscar-producto-by-desc/?categoria="+cat+"&busqueda="+busq,
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + BUSCADOR_TIENDA_CTRL + "/consultar-buscador-principal/buscar-producto-by-desc",
		 data: {'datos': JSON.stringify(jsonDataForm)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20240412 validar contacto
function witper_valContactCli(idForm, callback){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/validar-contacto",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20210302 registrar contacto
function witper_setContactCli(idForm, callback){
      $.ajax({
	     type: "POST",
	     url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/registrar-contacto",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20240302 validar libro reclamo
function witper_valLibroReclamo(idForm, callback){
      $.ajax({
	     type: "POST",
	     url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/validar-reclamo",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){return callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210303 registrar libro reclamo
function witper_setLibroReclamo(idForm, callback){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/registrar-reclamo",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20210321 obtener productos por categoria
function witper_obtenerProductosPorCategoria(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/listar-productos-por-categoria",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/listar-productos-por-categoria",
	     data: {'datos': JSON.stringify(datos)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210618 Degui: obtener cantidad de fabricantes por categoria de productos habilitados
function witper_obtenerCantidadFabricantesPorCategoria(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/obtener-cantidad-fabricantes-por-categoria",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-cantidad-fabricantes-por-categoria",
		 data: {'datos': JSON.stringify(datos)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20220925 obtener productos por fabricante
function witper_obtenerProductosPorFabricante(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/obtener-productos-por-fabricante",
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-productos-por-fabricante",
	   data: {'datos': JSON.stringify(datos)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}

// 20240416 validar suscripción
function witper_valSuscribir(idForm, callback){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/validar-suscripcion",
	   data: $(idForm).serialize(),
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20240416 registrar suscripción
function witper_setSuscribir(idForm, callback){
    $.ajax({
	     type: "POST",
	     url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/registrar-suscripcion",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20240714 registrar suscripción mail
function witper_setSuscribirMail(jsonDataForm, callback){
    $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/registrar-suscripcion",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + PUBLICADOR_PAGINAS_CTRL + "/registrar-publicador-paginas/registrar-suscripcion-mail",
	     //data: $(idForm).serialize(),
		 data: {'datos': JSON.stringify(jsonDataForm)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Producto
//------------------------------------------------------------------------------
// 20210301 obtener productos top
function witper_obtenerTopProductos(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/" + CATALOGO_PRODUCTOS + "/consultar/listar-productos-catalogo",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/listar-productos-catalogo",
		 //url: 'application.php/' + CLI + "/principal/consultar/listar-productos-catalogo", *** (20230820 GTP: cuando no se use Virtual Host)
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}

// 20210301 agregar al carrito
function witper_addCar(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/principal/registrar/agregar-producto-carrito",
		 //url: PATH_SMALL + CLI + "/"+CATALOGO_PRODUCTOS+"/registrar/agregar-producto-carrito", 
		 //url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/registrar-catalogo-productos/agregar-producto-carrito",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/registrar-carrito-compras/agregar-producto-carrito",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}

// 20220319 obtener producto seleccionado
function witper_obtenerProductoSeleccionado(mc, callback){
	//console.log(">>> cli-witper_obtenerProductoSeleccionado mc: " + mc);
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/principal/consultar/obtener-producto-seleccionado-by-mini-codigo/?mc="+mc,
	   //url: PATH_SMALL + CLI + "/"+CATALOGO_PRODUCTOS+"/consultar/obtener-producto-seleccionado-by-mini-codigo/?mc="+mc,
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-producto-seleccionado-by-mini-codigo/?mc="+mc,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  	});
}
// 20220515 obtener especificacion de producto
function witper_obtenerEspecificacionProducto(cod_prod, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/principal/consultar/obtener-especificacion-producto/?cod_prod=" + cod_prod,
	   //url: PATH_SMALL + CLI + "/"+CATALOGO_PRODUCTOS+"/consultar/obtener-especificacion-producto/?cod_prod=" + cod_prod,
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-especificacion-producto/?cod_prod=" + cod_prod,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20220527 obtener galería imagen de producto
function witper_obtenerGaleriaImagenesProducto(cod_prod, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/principal/consultar/obtener-galeria-imagenes-producto/?cod_prod=" + cod_prod,
	   //url: PATH_SMALL + CLI + "/"+CATALOGO_PRODUCTOS+"/consultar/obtener-galeria-imagenes-producto/?cod_prod=" + cod_prod,
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-catalogo-productos/obtener-galeria-imagenes-producto/?cod_prod=" + cod_prod,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
//------------------------------------------------------------------------------
// Carrito
//------------------------------------------------------------------------------
// 20210302 obtener lista carrito
function witper_getListCar(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/principal/consultar/obtener-lista-carrito",
		 //url: PATH_SMALL + CLI + "/"+CARRITO_COMPRAS+"/consultar/obtener-lista-carrito",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/consultar-carrito-compras/obtener-lista-carrito",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210302 quitar item del carrito
function witper_delItemCar(index, callback){
    $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/principal/registrar/eliminar-producto-carrito/?index="+index,
		 //url: PATH_SMALL + CLI + "/"+CARRITO_COMPRAS+"/registrar/eliminar-producto-carrito/?index="+index,
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/registrar-carrito-compras/eliminar-producto-carrito/?index="+index,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210302 registrar cliente al carrito
function witper_setClientCar(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+CARRITO_COMPRAS+"/registrar/registrar-cliente-carrito",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/registrar-carrito-compras/registrar-cliente-carrito",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210302 registrar carrito
function witper_setCarPedido(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+CARRITO_COMPRAS+"/registrar/registrar-carrito-pedido",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CARRITO_COMPRAS_CTRL + "/registrar-carrito-compras/registrar-carrito-pedido",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Blog
//------------------------------------------------------------------------------
// 20210302 obtener ultimas publicaciones
function witper_getLastPost(datos, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/obtener-ultimas-publicaciones",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + BLOG_TIENDA_CTRL + "/consultar-publicador-articulos/obtener-ultimas-publicaciones",
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210302 obtener comentarios de post
function witper_getCommentPost(cod_post, callback){
    $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/obtener-comentarios-post/?id=" + cod_post,
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + BLOG_TIENDA_CTRL + "/consultar-publicador-articulos/obtener-comentarios-post/?id=" + cod_post,
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
// 20210302 registrar comentario post
function witper_setCommentPost(idForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/agregar-comentario-post",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + BLOG_TIENDA_CTRL + "/registrar-publicador-articulos/agregar-comentario-post",
	     data: $(idForm).serialize(),
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// Cuenta usuario
//------------------------------------------------------------------------------
// 20210301 iniciar sesion
function witper_iniciarSesion(jsonDataForm, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/"+CUENTA_USUARIO+"/consultar/validar-usuario",
	   //url: PATH_SMALL + APPS + "/" + TIENDAONLINE_WEBAPP + "/" + CUENTA_USUARIO_CTRL + "/consultar-cuenta-usuario/validar-usuario",
	   //url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-cuenta-usuario/validar-usuario",
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CUENTA_USUARIO_CTRL + "/consultar-cuenta-usuario/iniciar-sesion",
	   //data: $(idForm).serialize(),
	   data: {'datos': JSON.stringify(jsonDataForm)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20240615 validar usuario
function witper_valCrearUsuario(jsonDataForm, callback){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CUENTA_USUARIO_CTRL + "/consultar-cuenta-usuario/validar-form-nuevo-usuario",
	   //data: $(idForm).serialize(),
	   data: {'datos': JSON.stringify(jsonDataForm)},
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  });
}
// 20210303 crear usuario
function witper_setCrearUsuario(jsonDataForm, callback){
      $.ajax({
	     type: "POST",
	     //url: PATH_SMALL + CLI + "/"+CUENTA_USUARIO+"/registrar/registrar-nuevo-usuario",
		 url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CUENTA_USUARIO_CTRL + "/registrar-cuenta-usuario/registrar-nuevo-usuario",
	     //data: $(idForm).serialize(),
		 data: {'datos': JSON.stringify(jsonDataForm)},
	     dataType: "json",
	     success: function(response){callback(null, response);},
	     error: function(errorThrown) {callback(errorThrown);}
	});
}
//------------------------------------------------------------------------------
// 20220328 ofertas
function witper_obtenerOfertas(datos, callback){
	$.ajax({
	   type: "POST",
	   //url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/consultar/obtener-ofertas-de-productos",
	   //url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + CATALOGO_PRODUCTOS_CTRL + "/consultar-oferta-productos/obtener-ofertas-de-productos",
	   url: PATH_SMALL + APP + "/" + TIENDAONLINE_WEBAPP + "/" + PUBLICADOR_PAGINAS_CTRL + "/consultar-publicador-paginas/obtener-ofertas-de-productos",
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  	});
}
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
// 20240406 ENVIAR AVISO RECLAMO
function witper_enviarAvisoReclamo(numAvisoAsoc){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/enviar-aviso-reclamo/?numAvisoAsoc="+numAvisoAsoc,
	   dataType: "json",
	   success: function(response){},
	   error: function(errorThrown) {}
  	});
}
/*
function witper_enviarAvisoReclamo(numAvisoAsoc, callback){
	$.ajax({
	   type: "POST",
	   url: PATH_SMALL + CLI + "/"+PRINCIPAL+"/registrar/enviar-aviso-reclamo/?numAvisoAsoc="+numAvisoAsoc,
	   dataType: "json",
	   success: function(response){callback(null, response);},
	   error: function(errorThrown) {callback(errorThrown);}
  	});
}
*/
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
//------------------------------------------------------------------------------
