$(document).ready(function () {
    initInterfazInicio();
});

function initInterfazInicio(){
	// 20240620 cargar formulario iniciar sesion
	//cargarPagina("app/store/tienda/servidor-paginas/cargar-frm-iniciar-sesion", "divFormLoginUser");
    // 20210301 obtener items del carrito
    //obtenerTotalItemsCarrito();
    // 20210301 obtener items del carrito
    obtenerTopProductos();
};

// 20210301 obtiene los productos que se mostraran en la pagina de inicio
function obtenerTopProductos(){
	//console.log(">>> GTPX-obtenerTopProductos...");
    witper_obtenerTopProductos(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> obtenerTopProductos-datosDevuelto: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
			mostrarTopProductos(datos);
			}else{
			mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener la lista de productos", 2);
			console.log(">>> obtenerTopProductos-errorLanzado: " + JSON.stringify(errorLanzado));
		}
    });
}

// muestra los productos en la pagina de inicio
function mostrarTopProductos(datos){
	let html =  '';
	//let uri_wwwstore = '../../../../static/witper/';
	//let uri_wwwstore = 'static/witper/';
	//$uri_wwwstore = 'static/witper/apps/sitecli/skin/compuchiclayo/img/principal/productos/upload/';
	let ruta_raiz = '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
	for(let item of datos){
		let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
		//console.log(">>> GTPX-mostrarTopProductos-src_img: " + src_img);
		html += '	<div class="col-md-3 col-xs-6 1thumbnail" style="1border:0; height:400px;">';
		//html += '	   <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">';
		html += '	   <a href="javascript:cargarPagina(\'app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc='+item.mini_codigo+'\')">';
		//html += '	      <img src="'+uri_wwwstore+item.imagen_sm+'" class="img-thumbnail" style="border:0">';
		html += '	      <img src="'+ src_img +'" class="img-thumbnail" style="border:0">';
		html += '	   </a>';
		html += '	   <div style="text-align:center;color:grase;font-size: 1em;font-weight:bold;text-transform:uppercase;">'+item.marca+'</div>';
		html += '	   <p id="codProd" data-miniCodigo="'+item.mini_codigo+'" style="text-align:center;color:grase;text-transform: uppercase;">';
		//html += '	      	<a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">'+item.producto+'</a>';
		html += '	      	<a href="javascript:cargarPagina(\'app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc='+item.mini_codigo+'\')">'+item.producto+'</a>';
		html += '	   </p>';
		// Degui: 20220319 si descuento vigente, muestra precio con descuento
		if(item.isFecIni == 1 && item.isFecFin == 1){ 
			html += '	   <div style="text-align:center;color:#566573;font-size: 1.2em;text-decoration:line-through">S/ '+item.precio_venta_internet+'</div>';
			html += '	   <div style="text-align:center;color:#FF8000;font-weight:bold;font-size: 1.2em;">S/ '+item.descuento_precio+'</div>';
		}else{
			html += '	   <div style="text-align:center;color:#FF8000;font-weight:bold;font-size: 1.2em;">S/ '+item.precio_venta_internet+'</div>';
		}
		html += '	</div>';
	}
	//$("#panelTopProducto1").html(html);
	$("#divCatalogoProductos").html(html);
}


