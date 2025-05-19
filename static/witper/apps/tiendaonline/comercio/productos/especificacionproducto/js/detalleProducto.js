$(document).ready(function () {
    initInterfazFrmProducto();
});
//-------------------------------------------------------------------------------------
function initInterfazFrmProducto(){
	//let codProducto = $("#cod_producto").val();
	//obtenerProductoSeleccionado(codProducto);
	let mc = $("#mini_codigo").val();
	//console.log(">>> GTPX-mc: " + mc);
	obtenerProductoSeleccionado(mc);
};
//-------------------------------------------------------------------------------------
// 20210301 obtener top productos
function obtenerProductoSeleccionado(mc){
    witper_obtenerProductoSeleccionado(mc, function(errorLanzado, datosDevuelto){
		//console.log(">>> GTPX > obtenerProductoSeleccionado: " + JSON.stringify(datosDevuelto));
		if(errorLanzado == null){
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito && datos != 0){
				mostrarProductoSeleccionado(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
    });
}

function mostrarProductoSeleccionado(datos){
	let item = datos;
	let html =  '';
	// 20231025 DEgui: Se cambia ruta de upload imagen
	//let uri_wwwstore = '../../../../static/witper/';
	//let uri_wwwstore = 'static/witper/';
	let ruta_raiz 	= '/static/witper/'; //'static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
	let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
	//console.log(">>> GTPX-mostrarProductoSeleccionado-src_img-24: " + src_img);
	
	html += '<h3 data-codProducto="'+item.cod_producto+'" style="text-transform:uppercase;font-weight:bold;color:003366;padding-left:20px;">'+item.producto+'</h3>';
	$("#panelProductoSel_title").html(html);
	
	html = '';
	html += '	<div>';
	//html += '		<img id="imgProductoGaleria" src="'+uri_wwwstore+item.imagen_sm+'" class="img-responsive imgTopProducto" />';
	html += '		<img id="imgProductoGaleria" src="'+src_img+'" class="img-responsive imgTopProducto" />';
	html += '		<div id="panelGaleriaProductos"></div>';
	html += '	</div>';
	$("#panelProductoSel_1").html(html);

	let texto = encodeURIComponent(item.producto);
	//let url = encodeURIComponent("https://compuchiclayo.com/cli/principal/ver/producto/?page=10502&mc="+item.cod_producto);
    //let url = encodeURIComponent("https://compuchiclayo.com/cli/principal/ver/producto/?mc="+item.mini_codigo);
	// 20241114 Degui: se cambia uri
	//let url_produc = "https://compuchiclayo.com/page/producto/?mc="+item.mini_codigo;
	//let url_encode = encodeURIComponent("https://compucix.com/apps/producto/?mc="+item.mini_codigo);
	let url_produc = "https://compuchiclayo.com/cli/page/producto/?mc="+item.mini_codigo;
	let url_encode = encodeURIComponent("https://compuchiclayo.com/cli/page/producto/?mc="+item.mini_codigo);
    let twProducto = "https://twitter.com/intent/tweet?text="+texto+"&url="+url_encode+"&via=compuchiclayo&hashtags=Chiclayo,Lambayeque";
    let fbProducto = "https://www.facebook.com/sharer/sharer.php?u="+url_encode+"&t="+texto;
    let wsProducto = "whatsapp://send?text="+url_encode;
    
	html = "";
	//---------------------------------------------------------
	html += '	<div>';
	html += '		<form id="frmProducto" role="form">';
	//html += '			<input type="hidden" name="cod_producto" value="{cod_producto}">';
	html += '			<input type="hidden" id="miniCodigo" name="miniCodigo" value="'+item.mini_codigo+'">';
	html += '			<input type="hidden" id="tituloProd" name="tituloProd" value="'+item.producto+'">';
	html += '			<table border = "0">';
	//html += '				<tr><td colspan="2" style="padding:5px; color:003366;">';
	//html += '					<h3 data-codProducto="'+item.cod_producto+'">'+item.producto+'</h3>';
	//html += '				</td></tr>';
	//html += '				<tr><td colspan="2" style="padding:5px;"><img id="imgProductoGaleria" src="'+uri_wwwstore+item.imagen_sm+'" class="img-responsive imgTopProducto" /></td></tr>';
	//html += '				<tr><td colspan="2" style="padding:5px;"><div id="panelGaleriaProductos"></div></td></tr>';
	html += '				<tr><td colspan="2" style="padding:5px;font-weight: bold;"> '+item.descrip_corta+'</td></tr>';
	html += '				<tr><td style="padding:5px;">Código:</td><td style="padding:5px;"> '+item.mini_codigo+'</td></tr>';
	//html += '				<tr><td style="padding:5px;">Stock:</td><td style="padding:5px;"> '+item.stock+'</td></tr>';
	//html += '				<tr><td style="padding:5px;">Stock:</td><td style="padding:5px;"> '+item.almacen_stock+'</td></tr>';
	html += '				<tr><td style="padding:5px;">Marca:</td><td style="padding:5px;"> '+item.marca+'</td></tr>';
	html += '				<tr>';
	html += '					<td style="padding:5px;">Stock:</td>';
	html += '					<td style="padding:5px;">';
	if(item.almacen_ind == 1 && item.almacen_stock > 0){ 
		html += '				<span>disponible</span>';
	}else{
		html += '				<span>para pedido</span>';
	}
	html += '					</td>';
	html += '				</tr>';
	// Degui: 20220319 si descuento vigente, muestra precio con descuento
	if(item.isFecIni == 1 && item.isFecFin == 1){ 
		html += '				<tr><td style="padding:5px;">Precio:</td>';
		html += '					<td style="padding:5px;">';
		html += '						<span style="text-decoration:line-through;">S/ '+item.precio_venta_internet+'</span>';
		html += '						<span style="color:#FF8000;font-weight:bold">S/ '+item.descuento_precio+'</span>';
		html += '					</td>';
		html += '				</tr>';
	}else{
		html += '				<tr><td style="padding:5px;">Precio:</td><td style="padding:5px;"> <b>S/ '+item.precio_venta_internet+'</b></td></tr>';
	}
	//html += '				<tr><td style="padding:5px;">Cantidad:</td><td style="padding:5px;">';
	//html += '					<input type="number" id="txtCantidad" name="txtCantidad" maxlength="3" min="1" max="100" value="1" class="form-control">';
	//html += '				</td></tr>';
	//html += '				<tr><td style="padding:5px;" colspan="2">';
	//html += '					<button type="button" id="btnAddCar" class="btn btn-primary btn-block" onclick="javascript:valCar()">Añadir al carrito</button>';
	//html += '				</td></tr>';
	html += '				<tr>';
	html += '					<td style="padding:5px;">';
	html += '						<div style="float:right;"><input type="text" id="txtCantidad" name="txtCantidad" maxlength="2" value="1" size="3"/></div>';
	html += '					</td><td>';
	html += '						<div"><button type="button" id="btnAddCar" class="btn btn-primary btn-block" onclick="javascript:valCar()">Agregar al carrito</button></div>';
	html += '					</td>';
	html += '				</tr>';
	html += '			</table>';
	html += '		</form>';
	html += '	</div>';
	$("#panelProductoSel_2").html(html);
	//---------------------------------------------------------
	// compartir en redes sociales
	html = '';
	html += '<div style="1border:1px solid #000; padding:5px;">';
	html += '	<div><span style="color:Gray">Comparte con tus amigos: </span></div>';
	html += '	<div style="margin-top:10px">';	
	//html += '		<a href="javascript:getlink(\'https://compuchiclayo.com/cli/principal/ver/producto/?page=10502&mc='+item.cod_producto+'\');" class="btn btn-info">';
	//html += '		<a href="javascript:getlink(\'https://compuchiclayo.com/cli/principal/ver/producto/?mc='+item.mini_codigo+'\');" class="btn btn-info">';
	html += '		<a href="javascript:getlink(\''+url_produc+'\');" class="btn btn-info">';
	html += '			<i class="fa fa-link" style="font-size:22px; color:#FF;"></i>';
	html += '		</a>';
	html += '		<a id="twProducto" href="'+twProducto+'" target="_blank" class="btn btn-info">';
	html += '			<i class="fa fa-twitter" style="font-size:22px; color:#FF;"></i>';
	html += '		</a>';
	html += '		<a id="fbProducto" href="'+fbProducto+'" target="_blank" class="btn btn-info">';
	html += '			<i class="fa fa-facebook-f" style="font-size:22px; color:#FF;"></i>';
	html += '		</a>';
	html += '		<a id="wsProducto" href="'+wsProducto+'" data-action="share/whatsapp/share" target="_blank" class="btn btn-info whatsapp">';
	html += '			<i class="fa fa-whatsapp" style="font-size:22px; color:#FF;"></i>';
	html += '		</a>';
	html += '	<div>';
	html += '</div>';
	$("#panelProductoSel_rs").html(html);

	html = '';
	html += '	<div style="padding:20px;">'+item.descrip_larga+'</div>';
	$("#panelProductoSel_3").html(html);

	// obtener y mostrar tabla de especificaciones
	if(item.ind_especificaciones == 1){
		obtenerEspecificacionProducto(item.cod_producto);
	}

	// obtener y mostrar galería imagenes producto
	if(item.ind_galeriaImagenes == 1){
		obtenerGaleriaImagenesProducto(item.cod_producto);
	}

}
//------------------------------------------------------------------------------
function valCar(){
	//let cod_prod = $("#codProducto").attr("data-codProducto");
	let miniCodigo = $("#miniCodigo").val();
	let cantidad = $("#txtCantidad").val();
	//console.log(">>> GTP miniCodigo: " + miniCodigo);
	//console.log(">>> GTP cantidad: " + cantidad);
	if(cantidad.trim().length <= 0){
		mostrarMensaje("Por favor, ingrese la cantidad", 0);
		return false;
	}
	else{
		agregarAlCarrito();
		return false;
	}
}

function limpiar(){
	$("#txtCantidad").val("");
}

// 20210301 agregar al carrito
function agregarAlCarrito(){
    witper_addCar("#frmProducto", function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> GTPX-agregarAlCarrito-datosDevuelto: " + JSON.stringify(datosDevuelto));
			let datos 		= datosDevuelto.datos;
			let cant_car 	= datosDevuelto.ncar;
			let exito 		= datosDevuelto.encontrado;
			if(exito){
				//limpiar();
				//$("#countCar").html("("+cant_car+")");
				$("#countCar").html(cant_car);
				mostrarMensaje("Se añadio al carrito: " + datos["nom_producto"], 0);
			}else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al agregar al carrito", 2);
			console.log(">>> errorLanzado: " + JSON.stringify(errorLanzado));
		}
    });
}
//-------------------------------------------------------------------------------------
// 20210817 Degui: copiar url en el portapapeles
function getlink(url) {
	//console.log("se esta copiando url: " + url);
	var aux = document.createElement("input");
	//aux.setAttribute("value",window.location.href);
	aux.setAttribute("value",url);
	document.body.appendChild(aux);
	aux.select();
	document.execCommand("copy");
	document.body.removeChild(aux);
}
//-------------------------------------------------------------------------------------
// 20220515 obtener especificacion de producto
function obtenerEspecificacionProducto(codProd){
    witper_obtenerEspecificacionProducto(codProd, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> GTPX > obtenerEspecificacionProducto: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito && datos != 0){
				mostrarEspecificacionProducto(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
    });
}

// pintar tabla de especificaciones
function mostrarEspecificacionProducto(datos){
	let html = "<div class='col-md-12'>";
	html += "<h3>Especificaciones Técnicas</h3>";
	html += "<table width='100%' style='1border: 1px solid #ccc;'>";
	for(let item of datos){
		html += "<tr>";
		//html += "<td style='padding:5px;text-transform:uppercase;border: 1px solid #ccc;'>"+item.clave+"</td>";
		html += "<td style='padding:5px;font-size:.9em;text-transform:uppercase;border:1px solid #ccc;'>"+item.clave+"</td>";
		html += "<td style='padding:5px;font-size:.9em;border:1px solid #ccc;'>"+item.valor+"</td>";
		html += "</tr>";
	}
	html += "</table></div>";
	$("#panelProductoSel_4").html(html);
}
//-------------------------------------------------------------------------------------
// 20220527 obtener especificacion de producto
function obtenerGaleriaImagenesProducto(codProd){
    witper_obtenerGaleriaImagenesProducto(codProd, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito && datos != 0){
				mostrarGaleriaImagenesProducto(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
    });
}

// 20220527 pintar tabla de especificaciones
function mostrarGaleriaImagenesProducto(datos){
	// 20231025 Degui: Se cambia ruta de upload imagen
	//let uri_wwwstore = '../../../../static/witper/';
	//let uri_wwwstore = 'static/witper/';
	let ruta_raiz 	= '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';	

	let html = "<div>";
	for(let item of datos){
		let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nombre;
		//console.log(">>> GTPX-mostrarGaleriaImagenesProducto-src_img: " + src_img);
		html += "<tr><td><a href='javascript:cargarImagenGaleria("+JSON.stringify(item)+")'>";
		//html += "	<img style='padding:5px;text-align:center;width:60px;' src='"+(uri_wwwstore+item.ruta)+"'/>";
		html += "	<img style='padding:5px;text-align:center;width:60px;' src='"+(src_img)+"'/>";
		html += "</a></td><tr>";
	}
	html += "</div>";
	//$("#imgProductoGaleria").attr("src", uri_wwwstore + datos[0].ruta);
	let src_img2 = ruta_raiz + ruta_upload + datos[0].dir_img + '/' + datos[0].nombre;
	$("#imgProductoGaleria").attr("src", src_img2);
	$("#panelGaleriaProductos").html(html);
}

function cargarImagenGaleria(item){
	//let uri_wwwstore = '../../../../static/witper/';
	//let uri_wwwstore = 'static/witper/';
	///$("#imgProductoGaleria").attr("src", uri_wwwstore + item.ruta);
	// 20231025 Degui: Se cambia ruta de upload imagen
	let ruta_raiz 	= '/static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';	
	let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nombre;
	$("#imgProductoGaleria").attr("src", src_img);
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------