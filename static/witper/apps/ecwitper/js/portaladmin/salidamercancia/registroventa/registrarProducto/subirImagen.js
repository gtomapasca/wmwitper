//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20210726 SUBIR ARCHIVOS JPG Y PNG
// Autor: degui
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20210726 subir archivo de imagen principal
$('.upload').click(function(){
    SubirImagenProducto();
});

// 20210726 subir archivo de imagen
function SubirImagenProducto(){
	let formData = new FormData();
    let files = $('#imageToUpload')[0].files[0];
	let codProd = $('#txtCodProdMod').val();
    formData.append('fileToUpload',files);
    formData.append('codProducto',codProd);
	witper_subirImagenProductoTienda(formData, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   console.log("response-SubirImagenProducto: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
				mostrarMensaje("Se subió el archivo correctamente", 2);
				// llamar al método para cargar la imagen registrada
				cargarImagenProductoTienda(codProd);
		   }else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación para subir una imagen", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al subir la imagen", 2);
		}
	});
}
// 20210804 obtener imagen producto
function cargarImagenProductoTienda(codProd){
	witper_obtenerImagenProductoTienda(codProd, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-cargarImagenProductoTienda: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
				// 20231016 Degui: Se cambia de ruta de subida para imagen
				//let uri_store = '../../../../static/witper/';
				let ruta_raiz 	= '../../../../static/witper/';
				let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
				let uri_store 	= ruta_raiz + ruta_upload + datos[0].dir_img + '/' + datos[0].nom_img;
				console.log(">>> GTPX-cargarImagenProductoTienda-uri_store: " + uri_store);
				//$("#imgProd1Mod").attr("src", uri_store + datos[0].imagen_sm);
				$("#imgProd1Mod").attr("src", uri_store);
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20210726 subir archivo de imagen de galería
$('#btnSubirImagenGaleria').click(function(){
	let cant = $("#hdModGaleriaCant").val();
	if(cant < 4){
		SubirImagenProductoGaleria();
	}else{
		mostrarMensaje("Lo sentimos, ya ha superado el número máximo (4) de imagenes por producto", 2);
	}
});

// 20210726 subir archivo de imagen
function SubirImagenProductoGaleria(){
	let formData = new FormData();
    let files = $('#imageToUploadGaleria')[0].files[0];
	let codProd = $('#txtCodProdMod').val();
    formData.append('fileToUploadGaleria',files);
    formData.append('codProducto',codProd);
	formData.append('txtModNumOrdenImgGaleria', $('#txtModNumOrdenImgGaleria').val());
	//formData.append('txtModNombreImgGaleria', $('#txtModNombreImgGaleria').val());
	//formData.append('txtModDescImgGaleria', $('#txtModDescImgGaleria').val());
	formData.append('chkEstadoImgGaleria', 1); // no ver
	if($("#idChkModEstadoImgGaleria").prop("checked")){ 
		formData.append('chkEstadoImgGaleria', 0); // ver
	}
	witper_subirImagenProductoGaleria(formData, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-SubirImagenProductoGaleria: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let listaMensajes = datosDevuelto.listaMensajes;
		   let msjError = datosDevuelto.msjError;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			mostrarMensaje("Se subió el archivo correctamente", 2);
			// llamar al método para cargar la imagen registrada
			cargarImagenProductoGaleria(codProd, 1);
		   }else{
			//mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			mostrarMensaje(msjError, 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
	// 20220522 iniciar datos por defecto galeria imagen producto
	iniciarFormGaleriaImagen();
}

// 20210804 obtener imagen producto
function cargarImagenProductoGaleria(codProd, op){
	witper_obtenerImagenesGaleriaProductos(codProd, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-cargarImagenProductoGaleria-22xy: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
				cargarListaGaleriaImgProd(datos);
				mostrarGaleriaImagenesProd(datos, op);
		   }/*else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación 22xy", 2);
		   }*/
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener imagen producto galeria", 2);
		}
	});
}

// 20220522 degui: cargar lista de imagenes galeria
function cargarListaGaleriaImgProd(datos){
	let html = "<select id='cboModListaImgGaleria' name='cboModListaImgGaleria' class='form-control'>";
	html += "	<option onclick='javascript:iniciarFormGaleriaImagen()' value='-1' selected>--- Agregar o Seleccione para Modificar ---</option>";
	for(let item of datos){
		html += "	<option onclick='javascript:cargarListaGaleriaImagen("+JSON.stringify(item)+")' value='"+item.id_galeria+"'>"+item.cod_item+"</option>";
	}
	html += "</select>";
	$("#divModListaImgGaleria").html(html);
}

// 20220522 mostrar galeria de productos
function mostrarGaleriaImagenesProd(datos, op){
	let cant = 0;
	// 20231016 Degui: Se cambia de ruta de subida para imagen
	//let uri_store = '../../../../static/witper/';
	let ruta_raiz 	= '../../../../static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
		
	let html = "<h3>Galeria de Productos</h3>";
	html += "<table border='1' width='100%'>";
	html +=	  "<tr>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nro</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Imagen</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nombre</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Ver</b></td>";
	html +=	  "</tr>";
	for(let item of datos){
		let src_img	= ruta_raiz + ruta_upload + item.dir_img + '/' + item.nombre;
		console.log(">>> GTPX-mostrarGaleriaImagenesProd-src_img: " + src_img);
		html += "<tr>";
		html += "<td style='padding:5px;'>"+item.num_orden+"</td>";
		//html += "<td style='padding:5px;'><img style='padding:5px; text-align:center;width:100px;' src='"+uri_store+item.ruta+"'/></td>";
		html += "<td style='padding:5px;'><img style='padding:5px; text-align:center;width:100px;' src='"+src_img+"'/></td>";
		html += "<td style='padding:5px;'>"+item.cod_item+"</td>";
		html += "<td style='padding:5px;'>"+obtenerModEstadoImgProd(item.estado)+"</td>";
		html += "</tr>";
		cant += 1;
	}
	html += "</table><br />";
	$("#panelModGaleriaImagenProducto").html(html);
	$("#hdModGaleriaCant").val(cant); // cantidad total de registros
	// mostrar en cuadro subida
	//if(op==1){$("#imgGaleriaProdMod").attr("src", uri_store + datos[datos.length-1].ruta);}
	let src_img_index = ruta_raiz + ruta_upload + datos[datos.length-1].dir_img + '/' + datos[datos.length-1].nombre;
	if(op==1){$("#imgGaleriaProdMod").attr("src", src_img_index);}
}

// Iniciar datos por defecto
function iniciarFormGaleriaImagen(){
	$('#btnSubirImagenGaleria').prop('disabled', false);
	$('#btnModifImagenGaleria').prop('disabled', true);
	// limpiar datos
	$("#imgGaleriaProdMod").attr("src", "");
	$("#txtModNumOrdenImgGaleria").val("0");
	//$("#txtModNombreImgGaleria").val("");
	//$("#txtModDescImgGaleria").val("");
	$("#imageToUploadGaleria").val("");
	$("#idChkModEstadoImgGaleria").prop("checked", false);
	$("#cboModListaImgGaleria").val("-1").change();
}
// seleccionar item especificacion
function cargarListaGaleriaImagen(item){
	// 20231016 Degui: Se cambia de ruta de subida para imagen
	//let uri_store = '../../../../static/witper/';
	let ruta_raiz 	= '../../../../static/witper/';
	let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
	let src_img	= ruta_raiz + ruta_upload + item.dir_img + '/' + item.nombre;
	console.log(">>> GTPX-cargarListaGaleriaImagen-src_img: " + src_img);

	// habilitar controles
	$('#btnSubirImagenGaleria').prop('disabled', true);
	$('#btnModifImagenGaleria').prop('disabled', false);
	// cargar datos
	//$("#imgGaleriaProdMod").attr("src", uri_store + item.ruta);
	$("#imgGaleriaProdMod").attr("src", src_img);
	$("#txtModNumOrdenImgGaleria").val(item.num_orden);
	//$("#txtModNombreImgGaleria").val(item.nombre);
	//$("#txtModDescImgGaleria").val(item.descripcion);

	if(item.estado == 0){ // 0: activo
		$("#idChkModEstadoImgGaleria").prop("checked", true);
	}else{
		$("#idChkModEstadoImgGaleria").prop("checked", false);
	}
}

function obtenerModEstadoImgProd(cod){	
	let des_estado = "";
	let codigo = cod != null ? cod : -1;
	if (codigo == 0) { des_estado = "Si"; }
	if (codigo == 1) { des_estado = "No"; }
	return des_estado;
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20220525 actualizar archivo de imagen de galería
$('#btnModifImagenGaleria').click(function(){
    modificarImagenProductoGaleria();
});

// 20210726 subir archivo de imagen
function modificarImagenProductoGaleria(){
	let formData = new FormData();
    let files = $('#imageToUploadGaleria')[0].files[0];
	console.log("GTPX-mod-files: " + files);
	let codProd = $('#txtCodProdMod').val();
	console.log("GTPX-codProd: " + codProd);
    formData.append('fileToUploadGaleria',files);
    formData.append('codProducto',codProd);
	formData.append('idGaleria', $('#cboModListaImgGaleria').val());
	formData.append('txtModNumOrdenImgGaleria', $('#txtModNumOrdenImgGaleria').val());
	//formData.append('txtModNombreImgGaleria', $('#txtModNombreImgGaleria').val());
	//formData.append('txtModDescImgGaleria', $('#txtModDescImgGaleria').val());
	formData.append('chkEstadoImgGaleria', 1); // no ver imagen
	if($("#idChkModEstadoImgGaleria").prop("checked")){ 
		formData.append('chkEstadoImgGaleria', 0); // ver imagen
	}
	witper_modificarImagenProductoGaleria(formData, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-modificarImagenProductoGaleria: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let listaMensajes = datosDevuelto.listaMensajes;
		   let msjError = datosDevuelto.msjError;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			mostrarMensaje("Se modifico el archivo correctamente", 2);
			// llamar al método para cargar la imagen registrada
			cargarImagenProductoGaleria(codProd, 1);
		   }else{
			//mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			mostrarMensaje(msjError, 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
	// 20220522 iniciar datos por defecto galeria imagen producto
	iniciarFormGaleriaImagen();
}
//------------------------------------------------------------------------
// 20220528 subir imagenes
/*$("#imageToUploadGaleria").change(function() {
	filename = this.files[0].name;
	console.log(filename);
	$("#divFile22").val(filename);
 });

$(function() {
	$("#labelfile").click(function() {
	  $("#imageupl").trigger('click');
	});
});*/
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------