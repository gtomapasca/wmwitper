$(document).ready(function () {
    initInterfaz();
});

function initInterfaz(){
	let categoria = '0';
	//let busqueda  = "";
	/*if (screen.width <= 800) {
		busqueda = $("#txtBuscarCel").val();	
	}else if (screen.width > 800){
		busqueda = $("#txtBuscar").val();
	}*/

	let buscarWeb = $("#txtBuscar").val();
	let buscarCel = $("#txtBuscarCel").val();
	console.log(">>> buscarWeb: " + buscarWeb);
	console.log(">>> buscarCel: " + buscarCel);
	if(buscarWeb.trim().length > 0){
		buscarProductoTienda(categoria, buscarWeb);
	}else if(buscarCel.trim().length > 0){
		buscarProductoTienda(categoria, buscarCel);
	}else{
		mostrarMensaje("Debe ingresar un parámetro de búsqueda", 2);
	}
	
};

// buscar prodducto
function buscarProductoTienda(categoria, busqueda){
   //console.log(">>> buscarProductoTienda...");
   //console.log(">>> categoria: " + categoria);
   //console.log(">>> busqueda: " + busqueda);
   witper_buscarProducto(categoria, busqueda, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("response: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   let mensj = datosDevuelto.mensaje;
	   let datos = datosDevuelto.datos;
	   if(exito && datos != 0){
		mostrarResuladoBusquedaTienda(datos);
	   }else{
		$("#resultadoBusqueda").html("<h4>No se encontraron resultados de la búsqueda</h4>");
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
	}
   });
}

function mostrarResuladoBusquedaTienda(datos){
	//console.log(">>> mostrarResuladoBusquedaTienda...");
	//console.log("datos: " + datos);
	//let uri_wwwstore = '../../../../static/witper/';
	// 20231025 Degui: Se cambia ruta de upload imagen
	let ruta_raiz 	= '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';	
	let html = '';
	//let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:lowercase;';
	let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:uppercase;';
	if(datos == 0){
		html += '	 <div>No se encontraron resultados</div>';
	}else{
		for(let item of datos){
			let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
			html += '<div class="row" style="overflow:hidden;_height:1%;1border:1px solid #000;">';
			html += '	<div class="col-md-2" style="1border:2px solid yellow;float:left;max-width:200px;">';
			//html += '	     <a href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">';
			html += '	     <a href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">';
			//html += '	        <img src="'+uri_wwwstore + item.imagen_sm+'" class="img-responsive" style="">';
			html += '	        <img src="'+src_img+'" class="img-responsive" style="">';
			html += '	     </a>';
			html += '	</div>';
			html += '	<div class="col-md-10" style="padding:20px 2px 2px 2px;1border:2px solid green;">';
			//html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">'+item.producto+'</a>';
			html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
			html += '	</div>';
			//html += '	<div class="col-md-10" style="padding:2px;1border:2px solid green;">';
			//html += '	    <span style="text-transform:lowercase;">'+item.descrip_corta+'</span>';
			//html += '	</div>';
			html += '	<div class="col-md-10" style="padding:2px;1border:2px solid green;">';
			//html += '	    <span style="font-weight:bold;color:#1A5276;">S/ '+item.precio_venta_internet+'</span>';
			// Degui: 20220319 si descuento vigente, muestra precio con descuento
			if(item.isFecIni == 1 && item.isFecFin == 1){ 
				html += '	    <span style="color:#1A5276;text-decoration:line-through">S/ '+item.precio_venta_internet+'</span>';
				html += '	    <span style="font-weight:bold;color:#FF8000;">S/ '+item.descuento_precio+'</span>';
			}else{
				html += '	    <span style="font-weight:bold;color:#FF8000;">S/ '+item.precio_venta_internet+'</span>';
			}
			html += '	</div>';
			html += '</div>';
		}
	}
	$("#resultadoBusqueda").html(html);
}
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------
