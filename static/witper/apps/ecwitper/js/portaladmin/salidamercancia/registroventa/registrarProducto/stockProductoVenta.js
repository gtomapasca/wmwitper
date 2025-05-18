/************************************************************************/
// 20210526 Degui: JS Productos Tienda
/************************************************************************/
$(document).ready(function () {
    //listarProductosTienda();
    cargarListaProductosTienda("");
	obtenerListaFabricantes();
	obtenerListaTipoCategoria();
	//obtenerListaCategoriaProductos();
	//obtenerListaSubCategoriaProductos();
	cargarListaCategoria("", "");
	cargarListaSubCategoria("", "");
	cargarRangoFecha();
});	
//------------------------------------------------------------------------
// 20220315 cargar datos inicio
function cargarRangoFecha(){
	var d = new Date(); 
	var month = d.getMonth()+1;
	var day = d.getDate();
	//var fecActual = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;
	var fechaIni = d.getFullYear() + '-01-01';
	var fechaFin = d.getFullYear() + '-' + (month<10 ? '0' : '') + month + '-' + (day<10 ? '0' : '') + day;

	$("#dpFecIniBusq").val(fechaIni);
	$("#dpFecFinBusq").val(fechaFin);
}
//------------------------------------------------------------------------
// 20211229 cargar lista de fabricantes
function obtenerListaFabricantes(){
	witper_obtenerListaFabricantes(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaFabricantes(datos);
			}else{
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener lista fabricantes", 2);
		}
	});
}

function cargarListaFabricantes(datos){
	let html1 = '<select id="cboFabricanteBusq" name="cboFabricanteBusq" class="form-control">';
	let html2 = '<select id="cboMarcaMod" name="cboMarcaMod" class="form-control">';
	let html3 = '<select id="cboMarcaReg" name="cboMarcaReg" class="form-control">';
	let html = '	<option value="-1" selected>---Seleccione---</option>';
	for(let item of datos){
		html += '	<option value="'+item.cod_fabricante+'">'+item.fabricante+'</option>';
	}
	html += '</select>';
	html1 += html;
	html2 += html;
	html3 += html;
	$("#divListaFabricanteBusq").html(html1);
	$("#divListaMarcaMod").html(html2);
	$("#divListaMarcaReg").html(html3);
}

// 20220729 cargar lista tipo categoria de productos
function obtenerListaTipoCategoria(){
	witper_obtenerListaTipoCategoriaProductos(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaTipoCategoria(datos);
			}else{
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al listar tipo categoría", 2);
		}
	});
}

function cargarListaTipoCategoria(datos){
	let html1 = '<select id="cboTipoCategoriaBusq" name="cboTipoCategoriaBusq" class="form-control">';
	let html2 = '<select id="cboTipoCategoriaMod" name="cboTipoCategoriaMod" class="form-control">';
	let html3 = '<select id="cboTipoCategoriaReg" name="cboTipoCategoriaReg" class="form-control">';
	let html = '	<option value="-1" selected>---Seleccione---</option>';
	for(let item of datos){
		html += "	<option onclick='javascript:obtenerListaCategoriaSel("+JSON.stringify(item.cod_tipo)+", -1)' value='"+item.cod_tipo+"'>"+item.nom_tipo+"</option>";
	}
	html += '</select>';
	html1 += html;
	html2 += html;
	html3 += html;
	$("#divListaTipoCategoriaProdBusq").html(html1);
	$("#divListaTipoCategoriaProdMod").html(html2);
	$("#divListaTipoCategoriaProdReg").html(html3);
	//console.log(">>> GTPX-cargarListaTipoCategoria... Se cargo la lista...");
}

function obtenerListaCategoriaSel(codigo, sel){
	//console.log(">>> GTP-obtenerListaCategoriaSel: " + codigo);
	witper_obtenerListaCategoriaByTipoCat(codigo, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaSubCategoria("", "");
				cargarListaCategoria(datos, sel);
			}else{
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al listar categoría por tipo", 2);
		}
	});
}

// 20211229 cargar lista categoria de productos
/*function obtenerListaCategoriaProductos(){
	witper_obtenerListaCategoriaProductos(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaCategoria(datos);
			}else{
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
}*/

function cargarListaCategoria(datos, sel){
	let html1 = '<select id="cboCategoriaBusq" name="cboCategoriaBusq" class="form-control">';
	let html2 = '<select id="cboCategoriaMod" name="cboCategoriaMod" class="form-control">';
	let html3 = '<select id="cboCategoriaReg" name="cboCategoriaReg" class="form-control">';
	let html = '	<option value="-1" selected>---Seleccione---</option>';
	for(let item of datos){
		html += "	<option onclick='javascript:obtenerListaSubCategoriaSel("+JSON.stringify(item.cod_categoria)+", -1)' value='"+item.cod_categoria+"'>"+item.nom_categoria+"</option>";
	}
	html += '</select>';
	html1 += html;
	html2 += html;
	html3 += html;
	$("#divListaCategoriaProdBusq").html(html1);
	$("#divListaCategoriaProdMod").html(html2);
	$("#divListaCategoriaProdReg").html(html3);
	//console.log(">>> GTPX-cargarListaCategoria... Se cargo la lista...");
	$("#cboCategoriaMod").val(sel).change();
}

function obtenerListaSubCategoriaSel(codigo, sel){
	//console.log(">>> GTP-obtenerListaSubCategoriaSel: " + codigo);
	witper_obtenerListaSubCategoriaByCodCat(codigo, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaSubCategoria(datos, sel);
			}else{
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al listar subcategoría por código", 2);
		}
	});
}

function cargarListaSubCategoria(datos, sel){
	let html1 = '<select id="cboSubCategoriaBusq" name="cboSubCategoriaBusq" class="form-control">';
	let html2 = '<select id="cboSubCategoriaMod" name="cboSubCategoriaMod" class="form-control">';
	let html3 = '<select id="cboSubCategoriaReg" name="cboSubCategoriaReg" class="form-control">';
	let html = '	<option value="-1" selected>---Seleccione---</option>';
	for(let item of datos){
		html += '	<option value="'+item.cod_subcategoria+'">'+item.nom_subcategoria+'</option>';
	}
	html += '</select>';
	html1 += html;
	html2 += html;
	html3 += html;
	$("#divListaSubCategoriaProdBusq").html(html1);
	$("#divListaSubCategoriaProdMod").html(html2);
	$("#divListaSubCategoriaProdReg").html(html3);
	//console.log(">>> GTPX-cargarListaSubCategoria... Se cargo la lista...");
	$("#cboSubCategoriaMod").val(sel).change();
}

// 20210527 Limpiar
$('#btnLimpiarBusq').click(function(){
    limpiarBusq();
});

function limpiarBusq(){
    $("#txtCodItemBusq").val("");
    $("#txtDescItemBusq").val("");
    $("#cboTipoRangoFecha").val("-1").change();
	$("#cboTipoCodigo").val("-1").change();
	$("#cboTipoBusqDesc").val("-1").change();
    $("#cboEstadoProdBusq").val("-1").change();
	$("#cboEstadoPubliBusq").val("-1").change();
	$("#cboEstadoAlmacBusq").val("-1").change();
	$("#cboTipoCategoriaBusq").val("-1").change();
	$("#cboCategoriaBusq").val("-1").change();
	$("#cboSubCategoriaBusq").val("-1").change();
    $("#cboFabricanteBusq").val("-1").change();
	$("#cboProveedorBusq").val("-1").change();
	$("#cboOrdenarBusq").val("-1").change();
	$("#idChkAlmacenProd").prop("checked", false);
	$("#idChkAlmacenStock").prop("checked", false);
	$("#idAlmacenCheck3").prop("checked", false);
	$("#idChkDestacado").prop("checked", false);
	$("#idChkDescuento").prop("checked", false);
	$('#idRdoAlmacenSI').prop('checked', true);
	$('#idRdoProdStockSI').prop('checked', true);
	$('#idRdoAlmacenSI').prop('disabled', true);
	$('#idRdoAlmacenNO').prop('disabled', true);
	$('#idRdoProdStockSI').prop('disabled', true);
	$('#idRdoProdStockNO').prop('disabled', true);

	cargarRangoFecha();
    cargarListaProductosTienda("");
}


// 20220827 
$("#txtCodItemBusq").keypress(function(e){
	if ( e.which == 13 ) {
		aceptarBusq();
	 }
});

// 20220827 
$("#txtDescItemBusq").keypress(function(e){
	if ( e.which == 13 ) {
		aceptarBusq();
	 }
});

// 20210527 Buscar
$('#btnAceptarBusq').click(function(){
	aceptarBusq();
});

function aceptarBusq(){
	if(isFiltroBusquedaOK()){
		let filtro = {};
		let existeUnFiltro = false;
		if($("#cboTipoRangoFecha").val() != '-1'){
			filtro["fecIniBusq"] = $("#dpFecIniBusq").val();
			filtro["fecFinBusq"] = $("#dpFecFinBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboTipoCodigo").val() != '-1'){
			filtro["mini_codigo"] = $("#txtCodItemBusq").val();
			existeUnFiltro = true;			
		}
		if($("#cboTipoBusqDesc").val() != '-1'){
			filtro["producto"] = $("#txtDescItemBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboEstadoProdBusq").val() != '-1'){
			filtro["estado_prod"] = $("#cboEstadoProdBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboEstadoAlmacBusq").val() != '-1'){
			filtro["almacen_est"] = $("#cboEstadoAlmacBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboEstadoPubliBusq").val() != '-1'){
			filtro["public_est"] = $("#cboEstadoPubliBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboTipoCategoriaBusq").val() != '-1'){
			filtro["cod_tipcategoria"] = $("#cboTipoCategoriaBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboCategoriaBusq").val() != '-1'){
			filtro["cod_categoria"] = $("#cboCategoriaBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboSubCategoriaBusq").val() != '-1'){
			filtro["cod_subcategoria"] = $("#cboSubCategoriaBusq").val();
			existeUnFiltro = true;
		}
		/*if($("#cboEstadoPubliBusq").val() != '-1'){ 
			filtro["estadoPubli"] = $("#cboEstadoPubliBusq").val();
			existeUnFiltro = true;
		}*/
		if($("#cboProveedorBusq").val() != '-1'){ //** */
			filtro["proveedor_ruc"] = $("#cboProveedorBusq").val();
			existeUnFiltro = true;
		}
		if($("#cboFabricanteBusq").val() != '-1'){
			filtro["cod_fabricante"] = $("#cboFabricanteBusq").val();
			existeUnFiltro = true;
		}
		if($("#idChkAlmacenProd").prop("checked")){ 
			existeUnFiltro = true;
			if($("#idRdoAlmacenSI").prop("checked")){ 
				filtro["isProdAlm"] = true;
			}
			if($("#idRdoAlmacenNO").prop("checked")){ 
				filtro["isProdAlm"] = false;
			}
		}
		if($("#idChkAlmacenStock").prop("checked")){ 
			existeUnFiltro = true;
			if($("#idRdoProdStockSI").prop("checked")){ 
				filtro["isStockAlm"] = true;
			}
			if($("#idRdoProdStockNO").prop("checked")){ 
				filtro["isStockAlm"] = false;
			}
		}
		if($("#idChkDestacado").prop("checked")){ 
			existeUnFiltro = true;
			filtro["isDestacado"] = true;
		}
		if($("#idChkDescuento").prop("checked")){ 
			existeUnFiltro = true;
			filtro["isDescuento"] = true;
		}
		if($("#cboOrdenarBusq").val() != '-1'){
			let op = $("#cboOrdenarBusq").val();
			let ordenar = "";
			if(op == '01'){ordenar = " order by pt.producto asc ";}
			if(op == '02'){ordenar = " order by pt.producto desc ";}
			if(op == '03'){ordenar = " order by pt.precio_venta_internet asc ";}
			if(op == '04'){ordenar = " order by pt.precio_venta_internet desc ";}
			if(op == '05'){ordenar = " order by pt.almacen_stock asc ";}
			if(op == '06'){ordenar = " order by pt.almacen_stock desc ";}
			if(op == '07'){ordenar = " order by fb.marca asc ";}
			if(op == '08'){ordenar = " order by fb.marca desc ";}
			if(op == '09'){ordenar = " order by pt.fecha_act asc ";}
			if(op == '10'){ordenar = " order by pt.fecha_act desc ";}
			if(op == '11'){ordenar = " order by pt.almacen_est asc ";}
			if(op == '12'){ordenar = " order by pt.almacen_est desc ";}
			filtro["ordenar"] = ordenar;
		}
		//console.log(">>> GTP-filtro1: " + JSON.stringify(filtro));
		if(existeUnFiltro){
			listarProductosTienda(filtro);	
		}else{
			mostrarMensaje("Debe ingresar almenos un filtro para la búsqueda", 2);
		}
		
	}

}

// 20220701 validar opciones de búsqueda
function isFiltroBusquedaOK(){
	if($("#cboTipoRangoFecha").val() != '-1'){
		if($("#dpFecIniBusq").val() == '' || $("#dpFecFinBusq").val() == ''){
			mostrarMensaje("ingrese rango de fechas", 2);
			return false;			
		}
	}
	if($("#cboTipoCodigo").val() != '-1'){
		if($("#txtCodItemBusq").val().trim() == ''){
			mostrarMensaje("ingrese código del producto", 2);
			return false;			
		}
	}
	if($("#cboTipoBusqDesc").val() != '-1'){
		if($("#txtDescItemBusq").val().trim() == ''){
			mostrarMensaje("ingrese descripción del producto", 2);
			return false;			
		}
	}
	return true;
}

function activarRadiosAlmacenProd(){
	if($("#idChkAlmacenProd").prop("checked")){ 
		$('#idRdoAlmacenSI').prop('disabled', false);
		$('#idRdoAlmacenNO').prop('disabled', false);
	}else{
		$('#idRdoAlmacenSI').prop('disabled', true);
		$('#idRdoAlmacenNO').prop('disabled', true);
	}
}

function activarRadiosAlmacenStock(){
	if($("#idChkAlmacenStock").prop("checked")){ 
		$('#idRdoProdStockSI').prop('disabled', false);
		$('#idRdoProdStockNO').prop('disabled', false);
	}else{
		$('#idRdoProdStockSI').prop('disabled', true);
		$('#idRdoProdStockNO').prop('disabled', true);
	}
}

// 20210524 Listar productos tienda
function listarProductosTienda(datos){
	witper_listarProductosTienda(datos, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-listarProductosTienda: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			if(datos != 0){
				cargarListaProductosTienda(datos);
			}else{
				limpiarBusq();
				mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
				//return false;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al listar producto tienda", 2);
		}
	});
}

// 20210528 Registrar
$('#btnRegistrarBusq').click(function(){
	$('#divBuscarItem').toggle('hide');
	$('#divListarItems').toggle('hide');
	$('#divRegistrarItem').toggle('slow');
	limpiarBusq();
});

//------------------------------------------------------------------------
// 20210523 degui: mostrar datos de productos
function cargarListaProductosTienda(datos){
	let ruta_raiz 	= '../../../../static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';

	let IDIOMA = {
		processing: "Procesando...",
		lengthMenu: "Mostrar _MENU_ registros",
		emptyTable: "No se encontraron registros",
		zeroRecords: "No se encontraron registros",
		search: "Buscar:",
		sLoadingRecords: "Cargando...",
		infoFiltered: "(filtrado de un total de _MAX_ registros)",
		info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		infoEmpty: "Registros del 0 al 0 de un total de 0 registros",
		paginate: {
			"first": "Primero",
			"last": "ltimo",
			"next": "Siguiente >",
			"previous": "< Anterior"
		}
	};
	
	let TABLE_CONF_LISTA_PRODUCTOS_ENCONTRADOS =   {
		"language": IDIOMA,
		"searching": false, 
		"ordering" : true, 
		"scrollY": "250px",
		"scrollX": "100%",
		"scrollCollapse": false,
		"paging": false,
		"processing": true,
		"pageLength": 5,
		"lengthChange": false,
		"searching": true,
		"responsive": false,
		"autoWidth": false,
		"dom": '<"pull-left"f><"pull-right"l>tip',
		"columnDefs": [
		   { "targets": [0,1], "searchable": false }
		 ],
		"info": false,
	}; 

	$("div#divListaProductosEncontrados").empty();
	var htmlTablaDetDcl = '';   
	var htmlTblHeader = '<table id="tblListaProductosEncontrados" style="border: 1px solid #5b616b" width="1050px"><thead><tr>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Item</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Imagen</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Mini-c&oacute;digo</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Producto</th>';
	htmlTblHeader += '<th class="col-sm-2 text-center" >Precio Compra</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Precio Venta</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Stock Almac&eacute;n</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Marca</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Fecha Act.</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >Estado Almac&eacute;n</th>';
	htmlTblHeader += '<th class="col-sm-1 text-center" >&emsp;</th>';
	htmlTblHeader += '</tr></thead>';            
	htmlTablaDetDcl += htmlTblHeader;
	htmlTablaDetDcl += '<tbody>';
	htmlTablaDetDcl += '</tbody></table>';
	$("div#divListaProductosEncontrados").html(htmlTablaDetDcl);
	$.each(datos, function(i, item){
		let uri_store 	= ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
		htmlTablaDetDcl = "";
		htmlTablaDetDcl += "<tr style='border: 1px solid #5b616b'>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ (i+1) +"</td>";  
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'><a href='javascript:cargarDatosParaModificarItem("+JSON.stringify(item)+")'><img style='padding:5px; text-align:center;width:70px;' src='"+(uri_store)+"'/></a></td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ item.mini_codigo +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ item.producto +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-2 text-left'>"+ item.precio_compra_final +"</td>";
		if(item.isFecIni == 1 && item.isFecFin == 1){
			htmlTablaDetDcl += "<td class='col-sm-1 text-center'>";
			htmlTablaDetDcl += "	<span style='text-decoration:line-through;'>S/ "+item.precio_venta_internet+"</span>";
			htmlTablaDetDcl += "	<span style='color:#FF8000;font-weight:bold;'>S/ "+item.descuento_precio+"</span>";
			htmlTablaDetDcl += "</td>";
		}else{
			htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+item.precio_venta_internet+"</td>";
		}
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ item.almacen_stock +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ item.marca +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ item.fecha_act +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>"+ obtenerDescEstadoAlmc(item.almacen_est) +"</td>";
		htmlTablaDetDcl += "<td class='col-sm-1 text-center'>";
		htmlTablaDetDcl += "	<a href='javascript:cargarDatosParaModificarItem("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
		htmlTablaDetDcl += "</td>";
		htmlTablaDetDcl += "</tr>";
		$("div#divListaProductosEncontrados table#tblListaProductosEncontrados tbody").append(htmlTablaDetDcl);
	});
	$('table#tblListaProductosEncontrados').DataTable(TABLE_CONF_LISTA_PRODUCTOS_ENCONTRADOS);
	$('div#tblListaProductosEncontrados_filter input').prop("placeholder", "Filtro por Nombre");

}

function obtenerDescEstadoAlmc(cod){	
	let des_estado = "";
	let codigo = cod != null ? cod : -1;
	if (codigo == '01') { des_estado = "Catálogo"; }
	if (codigo == '02') { des_estado = "Ingresado"; }
	if (codigo == '03') { des_estado = "Disponible"; }
	if (codigo == '04') { des_estado = "Pendiente"; }
	if (codigo == '05') { des_estado = "Suspendido"; }
	if (codigo == '06') { des_estado = "Retirado"; }
	return des_estado;
}
//------------------------------------------------------------------------
// 20210526 Registrar productos
$('#btnAceptarReg').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_registrarNuevoProductoTienda("#formRegistrarItem", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
				//console.log("response-regProducto: " + JSON.stringify(datosDevuelto));
				let exito = datosDevuelto.encontrado;
				let mensj = datosDevuelto.mensaje;
				let datos = datosDevuelto.datos;
				if(exito && datos != 0){
					//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=41052");
					//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-salidamercancia-registroventa-ctrl/ver/menu/?page=21013");
					cargarPaginaSel("adm/app/salmerca/ver/menu/?page=21013");
					mostrarMensaje("Se registro producto correctamente", 1);
				}else{
					mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
				}
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de registrar stock producto tienda", 2);
			}
		});
       	}else{
		mostrarMensaje("Disculpe, complete el formulario", 2);
		return false;
	}
});

// 20210526 cargar datos para modificar producto
function cargarDatosParaModificarItem(item){
	// cargar listas
	obtenerListaCategoriaSel(item.cod_tipcategoria, item.cod_categoria);
	obtenerListaSubCategoriaSel(item.cod_categoria, item.cod_subcategoria);
    
	// 20231016 Degui: Se cambia de ruta de subida para imagen
	/*let uri_store = '../../../../static/witper/';
	if(item.imagen_sm != null){
		$("#imgProd1Mod").attr("src", uri_store + item.imagen_sm);
	}else{
		$("#imgProd1Mod").attr("src", "https://via.placeholder.com/400x400");
	}*/
	let ruta_raiz 	= '../../../../static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
	let uri_store 	= ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
	console.log(">>> GTPX-cargarDatosParaModificarItem-uri_store: " + uri_store);
	if(item.nom_img != null){
		$("#imgProd2Mod").attr("src", uri_store);
	}else{
		$("#imgProd2Mod").attr("src", "https://via.placeholder.com/400x400");
	}

	// setear datos
    $("#hid_codProductoMod").val(item.cod_producto);
	$("#hdModEspecCodProducto").val(item.cod_producto);
    $("#txtCodProdMod").val(item.cod_producto);
    $("#txtMiniCodigoMod").val(item.mini_codigo);
    $("#txtNomProdMod").val(item.producto);
    $("#txtDescProdCortaMod").val(item.descrip_corta);
    $("#txtDescProdLargaMod").val(item.descrip_larga);
    //$("#txtEspecifProdMod").val(item.especificaciones);
	$("#cboIndEspecMod").val(item.ind_especificaciones).change();
	$("#cboIndGaleriaImgMod").val(item.ind_galeriaImagenes).change();
    $("#txtKeyWordMod").val(item.key_word);
    //$("#txtRutaImgSmMod").val(item.imagen_sm);
    //$("#txtRutaImgMdMod").val(item.imagen_md);
    //$("#txtRutaImgLgMod").val(item.imagen_lg);
    $("#txtPrecioCompraMod").val(item.precio_compra_final);
	$("#txtPrecioNormalMod").val(item.precio_venta_normal);
    $("#txtPrecioInterMod").val(item.precio_venta_internet);
    $("#txtStockProveMod").val(item.stock);
	if(item.almacen_ind == 1){
		$("#idChkProdAlmacMod").prop("checked", true);
	}
	if(item.almacen_del == 1){ // 1: activo
		$("#idChkActivoAlmacMod").prop("checked", true);
	}
	$("#txtStockAlmacMod").val(item.almacen_stock);
    $("#cboTipoCategoriaMod").val(item.cod_tipcategoria).change();
	//console.log(">>> GTPX33-codCategoria: " + item.cod_categoria);
	$("#cboCategoriaMod").val(item.cod_categoria).change();
	$("#cboSubCategoriaMod").val(item.cod_subcategoria).change();
    $("#cboMarcaMod").val(item.cod_fabricante).change();
    $("#cboCodEstadoProdMod").val(item.estado_prod).change();
	$("#cboCodEstadoAlmcMod").val(item.almacen_est).change();
	$("#cboCodEstadoPublicMod").val(item.public_est).change();
	if(item.destacado_ind == 1){
		$("#idChkDestacadoMod").prop("checked", true);
	}
	$("#txtPrecioDescMod").val(item.descuento_precio);
	$("#dpFecIniDescMod").val(item.descuento_fecini);
	$("#dpFecFinDescMod").val(item.descuento_fecfin);
	$("#cboRucProveedorMod").val(item.proveedor_ruc).change();
	$("#txtCodProdProvMod").val(item.proveedor_codprod);
    // Carga la pantalla de modificación
    $('#divBuscarItem').toggle('hide');
    $('#divListarItems').toggle('hide');
    $('#divModificarItem').toggle('slow');
	$('#divRegistrarEspecProducto').toggle('slow');
	$('#divGaleriaImagenProducto').toggle('slow');
	// 20220505 mostrar especificacion de producto
	consultarTablaEspec($('#txtCodProdMod').val());
	// 20220515 Iniciar datos por defecto especificaciones
	iniciarFormListaItemEspec();
	// 20220522 mostrar galeria de imagenes
	cargarImagenProductoGaleria($('#txtCodProdMod').val(), 0);
	// 20220522 iniciar datos por defecto galeria imagen producto
	iniciarFormGaleriaImagen();
	// limpiar formulario de busqueda
	limpiarBusq();
}

// 20210526 Modificar producto tienda
$('#btnAceptarMod').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_modificarProductoTienda("#formModificarItem", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   	//console.log("response-modProducto: " + JSON.stringify(datosDevuelto));
			   	let exito = datosDevuelto.encontrado;
			   	let mensj = datosDevuelto.mensaje;
			   	let datos = datosDevuelto.datos;
			   	if(exito && datos != 0){
					//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=41052");
					//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-salidamercancia-registroventa-ctrl/ver/menu/?page=21013");
					cargarPaginaSel("adm/app/salmerca/ver/menu/?page=21013");
					mostrarMensaje("Se actualizo correctamente", 1);
			   	}else{
					mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			   	}
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de actualizar producto", 2);
			}
		});
       	}else{
		mostrarMensaje("Disculpe, complete el formulario", 2);
		return false;
	}
});

//------------------------------------------------------------------------
function validarFormulario(){
	let validar = true;
	let nick = $('#txtNick').val();
	//console.log(">>> nick: " + nick);
	if(nick == ""){
		//console.log(">>> nick false");
		validar = false;
	}
	return validar;
}
//------------------------------------------------------------------------
// 20210526 Cancelar Modificar
$('#btnCancelarMod').click(function(){
	$('#divModificarItem').toggle('hide');
	$('#divRegistrarEspecProducto').toggle('hide');
	$('#divGaleriaImagenProducto').toggle('hide');
	$('#divBuscarItem').toggle('slow');
	$('#divListarItems').toggle('slow');
});
//------------------------------------------------------------------------
// 20210526 Cancelar Registrar
$('#btnCancelarReg').click(function(){
	$('#divRegistrarItem').toggle('hide');
	$('#divBuscarItem').toggle('slow');
	$('#divListarItems').toggle('slow');
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20220307 Calendario
$(function(){
    $("#dpFecIniBusq").datepicker();
	$("#dpFecFinBusq").datepicker();

	$("#dpFecIniDescMod").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(datetext) {
            var d = new Date(); // for now

            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h ;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m ;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s ;

            datetext = datetext + " " + h + ":" + m + ":" + s;

            $('#dpFecIniDescMod').val(datetext);
        }
    });

	$("#dpFecFinDescMod").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(datetext) {
            var d = new Date(); // for now

            var h = d.getHours();
            h = (h < 10) ? ("0" + h) : h ;

            var m = d.getMinutes();
            m = (m < 10) ? ("0" + m) : m ;

            var s = d.getSeconds();
            s = (s < 10) ? ("0" + s) : s ;

            datetext = datetext + " " + h + ":" + m + ":" + s;

            $('#dpFecFinDescMod').val(datetext);
        }
    });
});	
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20220506 Agregar Especificacion producto
$('#btnModAgregarEspec').click(function(){
	let cod = $('#hdModEspecCodProducto').val();
	let numOrd = $('#txtModEspecNumOrden').val();
	let clave = $('#txtModEspecClave').val();
	let valor = $('#txtModEspecValor').val();
	let estado = false;
	if($("#idChkModEspecEstado").prop("checked")){ 
		estado = true;
	}
	if(clave != '' && valor != '' && numOrd != ''){
		witper_setEspecificacion("#formModEspec", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   	//console.log(">>> response-registrarEspecificacion: " + JSON.stringify(datosDevuelto));
			   	let exito = datosDevuelto.encontrado;
			   	let mensj = datosDevuelto.mensaje;
			   	let datos = datosDevuelto.datos;
			   	if(exito && datos != 0){
					consultarTablaEspec($('#txtCodProdMod').val());
			   	}else{
					mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			   	}
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de registrar producto", 2);
			}
		});
    }else{
		mostrarMensaje("Disculpe, para registrar debe llenar el formulario", 2);
		return false;
	}
	// Iniciar datos por defecto especificaciones
	iniciarFormListaItemEspec();
});

// 20220515 Modificar Especificacion producto
$('#btnModModificarEspec').click(function(){
	let cod = $('#hdModEspecCodProducto').val();
	let numOrd = $('#txtModEspecNumOrden').val();
	let clave = $('#txtModEspecClave').val();
	let valor = $('#txtModEspecValor').val();
	let estado = false;
	if($("#idChkModEspecEstado").prop("checked")){ 
		estado = true;
	}
	if(clave != '' && valor != '' && numOrd != ''){
		witper_updateEspecificacion("#formModEspec", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   	//console.log(">>> response-modificarEspecificacion: " + JSON.stringify(datosDevuelto));
			   	let exito = datosDevuelto.encontrado;
			   	let mensj = datosDevuelto.mensaje;
			   	let datos = datosDevuelto.datos;
			   	if(exito && datos != 0){
					consultarTablaEspec($('#txtCodProdMod').val());
			   	}else{
					mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			   	}
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de registrar producto", 2);
			}
		});
    }else{
		mostrarMensaje("Disculpe, para modificar debe llenar el formulario", 2);
		return false;
	}
	// Iniciar datos por defecto especificaciones
	iniciarFormListaItemEspec();
});

// 20210302 consultar especificación
function consultarTablaEspec(codProd){
    witper_getTablaEspec(codProd, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> consultarTablaEspec-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito && datos != 0 ){
				cargarListaEspec(datos);
				mostrarTablaEspec(datos);
			}/*else{
				let html = "<h3>Tabla Especificaciones</h3>";
				html += "<table border='1'>";
				html +=	  "<tr>";
				html +=		"<td style='padding:5px; text-align:center;'><b>Nro</b></td>";
				html +=		"<td style='padding:5px; text-align:center;'><b>Etiqueta</b></td>";
				html +=		"<td style='padding:5px; text-align:center;'><b>Valor</b></td>";
				html +=		"<td style='padding:5px; text-align:center;'><b>Ver</b></td>";
				html +=	  "</tr>";
				html += "</table><br />";
				$("#panelModEspcificacion").html(html);
			}*/
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al consultar especificación", 2);
		}
    });
}

// 20220515 degui: cargar lista de especificaciones
function cargarListaEspec(datos){
	let html = "<select id='cboModListaEspec' name='cboModListaEspec' class='form-control'>";
	html += "	<option onclick='javascript:iniciarFormListaItemEspec()' value='-1' selected>--- Agregar o Seleccione para Modificar ---</option>";
	for(let item of datos){
		html += "	<option onclick='javascript:cargarDatosModificarListaItemEspec("+JSON.stringify(item)+")' value='"+item.id_especificacion+"'>"+item.clave+"</option>";
	}
	html += "</select>";
	$("#divModListaEspec").html(html);
}

// mostrar tabla especificaciones de producto
function mostrarTablaEspec(datos){
	let n = 0;
	let html = "<h3>Tabla Especificaciones</h3>";
	html += "<table border='1' width='100%'>";
	html +=	  "<tr>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nro</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Etiqueta</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Valor</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Ver</b></td>";
	html +=	  "</tr>";
	for(let item of datos){
		html += "<tr>";
		html += "<td style='padding:5px;'>"+item.num_orden+"</td>";
		html += "<td style='padding:5px;'>"+item.clave+"</td>";
		html += "<td style='padding:5px;'>"+item.valor+"</td>";
		html += "<td style='padding:5px;'>"+obtenerModEstadoEspec(item.estado)+"</td>";
		html += "</tr>";
	}
	html += "</table><br />";
	$("#panelModEspcificacion").html(html);
}
// Iniciar datos por defecto
function iniciarFormListaItemEspec(){
	//console.log("cboModListaEspec-val1: " + $("#cboModListaEspec").val());
	$('#btnModAgregarEspec').prop('disabled', false);
	$('#btnModModificarEspec').prop('disabled', true);
	// limpiar datos
	$("#txtModEspecNumOrden").val("0");
	$("#txtModEspecClave").val("");
	$("#txtModEspecValor").val("");
	$("#idChkModEspecEstado").prop("checked", false);
	$("#cboModListaEspec").val("-1").change();
}
// seleccionar item especificacion
function cargarDatosModificarListaItemEspec(item){
	//console.log("cboModListaEspec-item: " + JSON.stringify(item));
	//console.log("cboModListaEspec-val2: " + $("#cboModListaEspec").val());
	// habilitar controles
	$('#btnModAgregarEspec').prop('disabled', true);
	$('#btnModModificarEspec').prop('disabled', false);
	// cargar datos
	$("#txtModEspecNumOrden").val(item.num_orden);
	$("#txtModEspecClave").val(item.clave);
	$("#txtModEspecValor").val(item.valor);
	if(item.estado == 0){ // 0: activo
		$("#idChkModEspecEstado").prop("checked", true);
	}else{
		$("#idChkModEspecEstado").prop("checked", false);
	}
}
function obtenerModEstadoEspec(cod){	
	let des_estado = "";
	let codigo = cod != null ? cod : -1;
	if (codigo == 0) { des_estado = "Si"; }
	if (codigo == 1) { des_estado = "No"; }
	return des_estado;
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
