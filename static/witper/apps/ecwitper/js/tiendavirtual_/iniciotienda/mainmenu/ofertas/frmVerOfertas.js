$(document).ready(function () {
    initInterfaz();
});

function initInterfaz(){
	obtenerOfertas();
};

// 20220328 obtener ofertas
function obtenerOfertas(){
    witper_obtenerOfertas(null, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
		//console.log(" >>> obtenerOfertas: " + JSON.stringify(datosDevuelto));
		let exito = datosDevuelto.encontrado;
		let mensj = datosDevuelto.mensaje;
		let datos = datosDevuelto.datos;
		if (exito){
		   mostrarOfertas(datos);
		}else{
		   mostrarMensaje(mensj, 2);
		}
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de obtener ofertas", 2);
	}
    });
}

// muestra las ofertas
function mostrarOfertas(datos){
	// 20231025 DEgui: Se cambia ruta de upload imagen
	//let uri_store = '../../../../static/witper/';
	let ruta_raiz 	= '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
	let html =  '';
	for(let item of datos){
		let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
		html += '	<div class="col-md-3 col-xs-6 1thumbnail" style="1border:0; height:400px;">';
		html += '	   <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">';
		//html += '	   <a href="javascript:cargarPagina(\'ecwitper-site-tiendavirtual/ecwitper-gestioncontenido-catalogoproductos-ctrl/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">';
		//html += '	      <img src="'+uri_store+item.imagen_sm+'" class="img-thumbnail" style="border:0">';
		html += '	      <img src="'+src_img+'" class="img-thumbnail" style="border:0">';
		html += '	   </a>';
		html += '	   <div style="text-align:center;color:grase;font-size: 1em;font-weight:bold;text-transform: uppercase;">'+item.marca+'</div>';
		html += '	   <p id="codProd" data-miniCodigo="'+item.mini_codigo+'" style="text-align:center;color:grase;text-transform: uppercase;">';
		html += '	      <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">'+item.producto+'</a>';
		//html += '	      <a href="javascript:cargarPagina(\'ecwitper-site-tiendavirtual/ecwitper-gestioncontenido-catalogoproductos-ctrl/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">'+item.producto+'</a>';
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
	$("#panelOfertas").html(html);
}
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------