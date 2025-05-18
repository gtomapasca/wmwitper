$(document).ready(function () {
    initInterfaz();
});

function initInterfaz(){
    let codCategoria = $("#codCategoria").attr("data-codCategoria");
	let codSubCategoria = $("#codCategoria").attr("data-codSubCategoria");
    let filtro = {"cod_categoria": codCategoria, "cod_subcategoria":codSubCategoria};
    obtenerProductosPorCategoria(filtro);
    //obtenerCantidadFabricantesPorCategoria(codCategoria);
	obtenerCantidadFabricantesPorCategoria(filtro); // 20220919 GTP
};

// 20210321 obtener productos por categoria
function obtenerProductosPorCategoria(filtro){
    witper_obtenerProductosPorCategoria(filtro, function(errorLanzado, datosDevuelto){
		//console.log(">>> GTX-obtenerProductosPorCategoria-datosDevuelto: " + JSON.stringify(datosDevuelto));
		if(errorLanzado == null){
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
				mostrarProductosPorCategoria(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener productos por categoria", 2);
		}
    });
}

// muestra los productos agrupados por categoría al seleccionar la opción del menú
function mostrarProductosPorCategoria(datos){
	// 20231025 Degui: Se cambia ruta de upload imagen
	//let uri_store = '../../../../static/witper/';
	let ruta_raiz 	= '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';	
	let html =  '';
	for(let item of datos){
		let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
		//console.log(">>> GTPX-mostrarProductosPorCategoria-src: " + src_img);
		html += '	<div class="col-md-3 col-xs-6 1thumbnail" style="1border:0; height:350px;">';
		//html += '	   <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&id='+item.cod_producto+'\')">';
		//html += '	   <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&mc='+item.mini_codigo+'\')">';
		html += '	   <a href="javascript:cargarPagina(\'app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc='+item.mini_codigo+'\')">';
		//html += '	      <img src="'+uri_store+item.imagen_sm+'" class="img-thumbnail" style="border:0">';
		html += '	      <img src="'+src_img+'" class="img-thumbnail" style="border:0">';
		html += '	   </a>';
		html += '	   <div style="text-align:center;color:grase;font-size: 1em;font-weight:bold;text-transform: uppercase;">'+item.marca+'</div>';
		//html += '	   <p id="codProd" data-codProd="'+item.cod_producto+'" style="text-align:center;color:grase;text-transform: uppercase;">';
		html += '	   <p id="codProd" data-miniCodigo="'+item.mini_codigo+'" style="text-align:center;color:grase;text-transform: uppercase;">';
		//html += '	      <a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-producto-sel/?page=10502&id='+item.cod_producto+'\')">'+item.producto+'</a>';
		html += '	      <a href="javascript:cargarPagina(\'app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc='+item.mini_codigo+'\')">'+item.producto+'</a>';
		html += '	   </p>';
		//html += '	   <div style="text-align:center;color:#FF8000;font-weight:bold;font-size: 1.2em;">S/ '+item.precio_venta_internet+'</div>';
		// Degui: 20220319 si descuento vigente, muestra precio con descuento
		if(item.isFecIni == 1 && item.isFecFin == 1){ 
			html += '	   <div style="text-align:center;color:#566573;font-size: 1.2em;text-decoration:line-through">S/ '+item.precio_venta_internet+'</div>';
			html += '	   <div style="text-align:center;color:#FF8000;font-weight:bold;font-size: 1.2em;">S/ '+item.descuento_precio+'</div>';
		}else{
			html += '	   <div style="text-align:center;color:#FF8000;font-weight:bold;font-size: 1.2em;">S/ '+item.precio_venta_internet+'</div>';
		}
		html += '	</div>';
	}
	$("#panelTopProducto1").html(html);
}

// 20210618 Degui: obtener cantidad de fabricantes por categoria de productos habilitados
function obtenerCantidadFabricantesPorCategoria(filtro){
    witper_obtenerCantidadFabricantesPorCategoria(filtro, function(errorLanzado, datosDevuelto){
		//console.log("obtenerCantidadFabricantesPorCategoria: " + JSON.stringify(datosDevuelto));
		if(errorLanzado == null){
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
				mostrarCantidadFabricantesPorCategoria(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener cantidad de fabricantes por categoría", 2);
		}
    });
}

function mostrarCantidadFabricantesPorCategoria(datos){
	let codCategoria = $("#codCategoria").attr("data-codCategoria");
	let codSubCategoria = $("#codCategoria").attr("data-codSubCategoria");
    let filtro = {"cod_categoria": codCategoria, "cod_subcategoria":codSubCategoria};
	let html =  "";
	for(let item of datos){
		//html += '<div><input type="checkbox" id="'+item.marca+'" data-codFab = "'+item.cod_fabricante+'" onclick="javascript:listarProductosPorFabricante(\''+item.cod_fabricante+'\')">';
		html += "<div><input type='checkbox' id='chkMarca_"+item.cod_fabricante+"' onclick='javascript:consultarCantidadFabricantesPorCategoria("+JSON.stringify(filtro)+")'>";
		html += '	<label for="'+item.marca+'">&nbsp;'+item.marca+'&nbsp;<span class="badge">'+item.cantidad+'</span></label>';
		html += '</div>';
	}
	$("#panelTopCategoria1").html(html);
}

// 20220925 Consultar cantidad fabricantes por categoría
function consultarCantidadFabricantesPorCategoria(filtro){
    witper_obtenerCantidadFabricantesPorCategoria(filtro, function(errorLanzado, datosDevuelto){
		//console.log(">>> GTPX-consultarCantidadFabricantesPorCategoria: " + JSON.stringify(datosDevuelto));
		if(errorLanzado == null){
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
				let listFab = listarProductosPorFabricante(datos);
				if(listFab == ''){
					obtenerProductosPorCategoria(filtro);
				}else{
					//jsonListFab = Object.assign({}, listFab);
					//filtro['fabricantes'] = jsonListFab;
					filtro['fabricantes'] = JSON.parse(JSON.stringify(listFab));
					//console.log(">> filtro59x: " + JSON.stringify(filtro));
					obtenerProductosPorFabricante(filtro);
				}
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener cantidad fab por cat", 2);
		}
    });
}

function listarProductosPorFabricante(datos){
	//console.log(">>> GTPX-listarProductosPorFabricante-datos: " + JSON.stringify(datos));
	let listFab = [];
	for(let item of datos){
		if($("#chkMarca_"+item.cod_fabricante).prop("checked")){ 
			//console.log(">>> GTPX-codFab: " + item.cod_fabricante);
			listFab.push(item.cod_fabricante);
		}
	}	
	return listFab;
}

// 20210620 obtener productos por filtro
function obtenerProductosPorFabricante(filtro){
    witper_obtenerProductosPorFabricante(filtro, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> GTPX-obtenerProductosPorFabricante-datosDevuelto: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
				mostrarProductosPorCategoria(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener productos por fabricante", 2);
		}
    });
}
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------