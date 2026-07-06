$(document).ready(function () {
    initInterfaz();
});	

function initInterfaz(){
    consultarListaCarrito();
};

// 20210302 consultar lista de carrito
function consultarListaCarrito(){
    witper_getListCar(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("consultarListaCarrito-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito){
					mostrarListaCarrito(datos);
			}else{
					let html =  "<div class='container'>";
					html += "		<div class='col-md-8'>";
					html += "			<h2 class='wpr-h2-e01'>Carrito::Carrito de Compras</h2>";
					html += "			<h4 class='wpr-h4-e01'>Vaya!, su carrito se encuentra vacío....</h4>";
					html += "			<p class='wpr-p-e01'>Seleccione los productos de su preferencia en nuestra";
					//html += "			<a href='javascript:cargarPagina(\"cli/principal/ver/menu/?page=10101\")' class='btn btn-link' role='button'>";
					html += "			<a href='javascript:cargarPagina(\"cpanel/store/commerce/menu-comercio-productos/opcion-inicio\")' class='btn btn-link' role='button'>";
					html += "			Tienda Virtual";
					html += "			</a></p>";
					html += "   	</div>";
					html += "   </div>";
					$("#panelCarrito").html(html);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener items carrito", 2);
		}
    });
}

function mostrarListaCarrito(datos){
	try { 
		let suma = 0;
		let index = 0;
		//let cant_car = 0;
		let n = 0;
		//let uri_wwwstore = '../../../../static/witper/';
		let ruta_raiz 	= '/static/witper/';
		let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
		let html =  "<div class='container'>";
		html += "	<div class='col-md-10'>";
		html += "		<h2 class='wpr-h2-e01'>Carrito :: Carrito de Compras</h2>";
		html += "		<h4 class='wpr-h4-e01'>Lista de productos añadidos al carrito:</h4>";
		html += "<table border='1'>";
		html +=	  "<tr>";
		html +=		"<td class='colorItems wpr-title-e01' style='padding:5px; text-align:center;'><b>Item</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Imagen</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Código</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Descripción</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Precio</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Cant.</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Subtotal</b></td>";
		html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>opciones</b></td>";
		html +=	  "</tr>";
		for(let item of datos){
			if(item.estado==0){
				let src_img = ruta_raiz + ruta_upload + item.img_dir + '/' + item.img_nom;
				//console.log(">>> GTPX-Carrito-src_img: " + src_img);
				html += "<tr>";
				html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
				html += "<td style='padding:5px; text-align:center;'><img style='width:100px; height:100px;' src='"+src_img+"' /></td>";
				//html += "<td style='padding:5px; text-align:center;'><img style='width:100px; height:100px;' src='"+uri_wwwstore+item.img_producto+"' /></td>";
				//html += "<td style='padding:5px; text-align:center;'>"+item.cod_producto+"</td>";
				html += "<td style='padding:5px; text-align:center;'>"+item.mini_codigo+"</td>";
				html += "<td style='padding:5px;'>"+item.nom_producto+"</td>";
				html += "<td style='padding:5px; text-align:center;'>S/ "+item.precio_venta+"</td>";
				html += "<td style='padding:5px; text-align:center;'>"+item.cantidad+"</td>";
				html += "<td style='padding:5px; text-align:center;'>S/ "+item.precio_venta * item.cantidad+"</td>";
				html += "<td style='padding:5px; text-align:center;'>";
				html += "<a href='javascript:eliminarItemDelCarrito("+index+")'><i class='glyphicon glyphicon-trash'></i></a>";
				html += "</td>";
				html += "</tr>";
				suma += item.precio_venta * item.cantidad;
				//cant_car++;
			}
			index++;
		}
		//mostrar el total
		html += "<tr><td colspan='6' style='padding:5px; text-align:center;'><b>TOTAL A PAGAR</b></td><td style='padding:5px; text-align:center;'><b>S/. "+suma+"</b></td><td>&nbsp;</td></tr>";
		html += "</table><br />";
		html += "<button id='btnContinuarCar' data-toggle='tooltip' type='button' class='btn btn-primary'>Realizar Pedido</button>";
		//html += "<a href='javascript:cargarPagina(\"cli/principal/ver/menu/?page=10101\")' class='btn btn-link' role='button'>Seguir comprando</a>";
		html += "<a href='javascript:cargarPagina(\"cpanel/store/commerce/menu-comercio-productos/opcion-inicio\")' class='btn btn-link' role='button'>Seguir comprando</a>";
		html += "   	</div>";
		html += "   </div>";
		$("#panelCarrito").html(html);
		//accion del boton continuar
		$("#btnContinuarCar").click(function(e){
			$('#divCarProductos').toggle('hide');
			$('#divCarCliente').toggle('slow');
			// 20260101 Degui: setear datos de usuario si existe sesión
			let usesion = JSON.parse(sessionStorage.getItem("userSesion"));
			console.log(">>> btnContinuarCar-usesion: " + usesion);
			if (usesion != null && usesion != undefined){
				console.log(">>> btnContinuarCar-nick: " + usesion.cod_usuario);
				$("#hdIdUsuario").val(usesion.id_usuario);
				$("#hdCodUsuario").val(usesion.cod_usuario);
			}else{
				obtenerUsuarioAnonimo();
			}
		});
	} catch(err) {
		mostrarMensaje("Error: " + err);
	}
}

// 20260102 Degui: obtener usuario anonimo
function obtenerUsuarioAnonimo(){
	$.ajax({
	   	type: "POST",
	   	url: '../../../../cli/app/store/cuenta/consultar-cuenta-usuario/obtener-usuario-anonimo',
	   	//data: {'datos': JSON.stringify({usuario: 'anonimo'})},
	   	dataType: "json",
	   	success: function(response){
			//callback(null, response);
			let tip = response.tip;
			let msj = response.msj;
			let val = response.val;
			if(val){
				let datos = response.datos;
				console.log(">>> obtenerUsuarioAnonimo-datos: " + JSON.stringify(datos));
				console.log(">>> obtenerUsuarioAnonimo-id_usuario: " + datos.id_usuario);
				console.log(">>> obtenerUsuarioAnonimo-cod_usuario: " + datos.cod_usuario);
				$("#hdIdUsuario").val(datos.id_usuario);
				$("#hdCodUsuario").val(datos.cod_usuario);
			}else{
				if(tip == "A"){
					mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
					console.log(">>> grabarSuscripcionMail-Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Mensaje Error: " + msj, 2);
					console.log(">>> grabarSuscripcionMail-Error: " + msj);
				}
			}
		},
	   	error: function(errorThrown) {
			//callback(errorThrown);
			mostrarMensaje("Disculpe, existi&oacute; un problema al iniciar sesion", 2);
            console.log(">>> utils_iniciarSesion-errorLanzado: " + JSON.stringify(errorThrown));
		}
  });
}

// 20210302 consultar lista de carrito
function eliminarItemDelCarrito(index){
	//console.log(">>> GTPX-eliminarItemDelCarrito index: " + index);
    witper_delItemCar(index, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log(">>> eliminarItemDelCarrito-response: " + JSON.stringify(datosDevuelto));
			let exito 	= datosDevuelto.encontrado;
			let mensj 	= datosDevuelto.mensaje;
			let datos 	= datosDevuelto.datos;
			let cant_car = datosDevuelto.ncar;
			if(exito){
				consultarListaCarrito()
				$("#countCar").html(cant_car);
				mostrarMensaje("Se elimino item del carrito de compras.", 1);
			}else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
    });
}

// 20210302 agregar cliente al carrito
$('#btnContinuarCli').click(function(){
	console.log(">>> btnContinuarCli-idUsuario: " + $("#hdIdUsuario").val());
	console.log(">>> btnContinuarCli-codUsuario: " + $("#hdCodUsuario").val());
    witper_setClientCar("#frmCarCliente", function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("btnContinuarCli-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito){
				$('#divCarCliente').toggle('hide');
				$('#divCarPedido').toggle('slow');
				mostrarDetallePedido(datos);
			}else{
				mostrarMensaje("Disculpe, no se pudo registrar datos del cliente en el carrito de comnpras", 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al registrar datos del cliente en el carrito de comnpras", 2);
		}
    });
});

function mostrarDetallePedido(datos){
	let suma = 0;
	let n = 0;
	let datos_cliente   = datos.datos_cliente;
	let datos_productos = datos.car_detalle_producto;
	let html =  "<div class='container'>";
	html += "	<div class='col-md-8'>";
	html += "		<h2 class='wpr-h2-e01'>Carrito :: Pedido</h2>";
	html += "		<h4 class='wpr-h4-e01'>Verifique los datos del pedido. Luego haga click en 'HACER UN PEDIDO' para enviar el pedido:</h4>";
	html += "		<h4 class='wpr-h4-e01'>Datos del Cliente</h4>";
	html += "<table border='1'>";
	html += "<tr><td style='padding:5px;'><p><b>DNI:</b></td><td style='padding:5px;'>"+datos_cliente.docnum+"</td></tr>";
	html += "<tr><td style='padding:5px;'><b>Nombre:</b></td><td style='padding:5px;'>"+datos_cliente.nombre+ " " + datos_cliente.apepat +" "+ datos_cliente.apemat+"</td></tr>";
	html += "<tr><td style='padding:5px;'><b>Teléfono:</b></td><td style='padding:5px;'>"+datos_cliente.telef+"</td></tr>";
	html += "<tr><td style='padding:5px;'><b>E-mail:</b></td><td style='padding:5px;'>"+datos_cliente.email+"</td></tr>";
	html += "<tr><td style='padding:5px;'><b>Dirección:</b></td><td style='padding:5px;'>"+datos_cliente.direc+"</td></tr>";
	html += "</table>";
	html += "<h4 class='wpr-h4-e01'>Detalle de Pedido</h4>";
	html += "<table border='1'>";
	html +=	  "<tr>";
	//html +=		"<td class='colorItems wpr-title-e01' style='padding:5px; text-align:center;'><b>Item</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Item</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Código</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Descripción</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Precio</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Cant.</b></td>";
	html +=		"<td class='wpr-title-e01' style='padding:5px; text-align:center;'><b>Subtotal</b></td>";
	html +=	  "</tr>";
	for(let item of datos_productos){
		if(item.estado==0){
			html += "<tr>";
			html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
			html += "<td style='padding:5px; text-align:center;'>"+item.cod_producto+"</td>";
			html += "<td style='padding:5px;'>"+item.nom_producto+"</td>";
			html += "<td style='padding:5px; text-align:center;'>S/ "+item.precio_venta+"</td>";
			html += "<td style='padding:5px; text-align:center;'>"+item.cantidad+"</td>";
			html += "<td style='padding:5px; text-align:center;'>S/ "+item.precio_venta * item.cantidad+"</td>";
			html += "</tr>";
			suma += item.precio_venta * item.cantidad;
		}
	}
	//muestro el total
	html += "<tr><td colspan='5' style='padding:5px; text-align:center;'><b>TOTAL A PAGAR</b></td><td style='padding:5px; text-align:center;'><b>S/ "+suma+"</b></td></tr>";
	html += "</table><br />";
	html += "<button id='btnContinuarPedido' data-toggle='tooltip' type='button' class='btn btn-primary'>Hacer Pedido</button>";
	//html += "<a href='javascript:cargarPagina(\"cli/principal/ver/menu/?page=10101\")' class='btn btn-link' role='button'>Cancelar Pedido</a>";
	html += "<a href='javascript:cargarPagina(\"cpanel/store/commerce/menu-comercio-productos/opcion-inicio\")' class='btn btn-link' role='button'>Cancelar Pedido</a>";
	html += "   	</div>";
	html += "   </div>";
	$("#panelPedido").html(html);
	//accion del boton continuar
	$('#btnContinuarPedido').click(function(){
		// muestra ventana emergente para confirmar el registro de los datos
		//mensajeConfirmarPedido(registrarCarPedido);
		mensajeConfirmarPedido();
	});
	
}

//-------------------------------------------------------------------------------------
// modal mensaje confirmacion
function mensajeConfirmarPedido(){
	$("#myModalConfirm").remove();	
	$("body").append(
		'<div class="modal fade" id="myModalConfirm" role="dialog">'
		+	'<div class="modal-dialog">'
		+		'<div class="modal-content">'
		+			'<div class="modal-header">'
		+				'<button type="button" class="close" data-dismiss="modal">&times;</button>'
		+				'<h4 class="modal-title">Mensaje</h4>'
		+			'</div>'
		+			'<div id ="dlgMensajeAfirmativo1" class="modal-body">'
		+				'<p>Por favor verifique detalladamente los datos ingresados a fin de continuar con su registro, una vez registrada no podrá efectuar modificación.</p>'
		+			'</div>'
		+			'<div id ="dlgMensajeAfirmativo2" class="modal-footer">'
		+				'<button type="button" class="btn btn-info" id="dlgBtnAceptarConfirm">Aceptar</button>'
		+			'</div>'
		+			'<div id ="dlgMensajeConfirma1" class="modal-body" style="display:none;">'
		+				'<p>¿Está seguro de grabar?</p>'
		+			'</div>'
		+			'<div id ="dlgMensajeConfirma2" class="modal-footer" style="display:none;">'
		+				'<button type="button" class="btn btn-basic" id="dlgBtnNo">No</button>'
		+				'<button type="button" class="btn btn-primary" id="dlgBtnSi">Si</button>'
		+			'</div>'
		+		'</div>'
		+	'</div>'
		+'</div>'
	);
	$("#dlgBtnAceptarConfirm").click(function(e){
		console.log(">>> dlgBtnAceptarConfirm...");
		$('#dlgMensajeAfirmativo1').toggle('hide');
		$('#dlgMensajeAfirmativo2').toggle('hide');
		$('#dlgMensajeConfirma1').toggle('slow');
		$('#dlgMensajeConfirma2').toggle('slow');
	});
	$("#dlgBtnSi").click(function(e){
		$('#myModalConfirm').modal('hide');
		// ejecuta la funcion que viene por parametro
		//callback();
		registrarCarPedido();
	});
	$("#dlgBtnNo").click(function(e){
		$('#myModalConfirm').modal('hide');
	});
	$('#myModalConfirm').modal('show');
};
//-------------------------------------------------------------------------------------

// 20210302 registrar carrito
var registrarCarPedido = function(){
    witper_setCarPedido(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("registrarCarPedido-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			if(exito){
				let mensj 	= datosDevuelto.mensaje;
				let nroPedido 	= datosDevuelto.nro_pedido;
				$("#countCar").html("(0)");
				let html =  "<div class='container'>";
				html += "	<div class='col-md-8'>";
				html += "		<h2 class='wpr-h2-e01'>Carrito :: Mensaje</h2>";
				html += "		<h4 class='wpr-h4-e01'>Su número de pedido es: "+ nroPedido +"</h4>";
				html += "<div>Se registro correctamente su pedido. Recibirá un mensaje de correo electrónico con los detalles de su pedido."
				html += " Muy pronto un agente de ventas se pondrá en contacto con usted.</div>";
				//html += "<div><a href='javascript:cargarPagina(\"cli/principal/ver/menu/?page=10501\")' class='btn btn-link' role='button'>Volver a tienda virtual</a></div>";
				html += "<div><a href='javascript:cargarPagina(\"cpanel/store/commerce/menu-comercio-productos/opcion-inicio\")' class='btn btn-link' role='button'>Volver a tienda virtual</a></div>";
				html += "   	</div>";
				html += "   </div>";
				$("#panelPedido").html(html);
			}else{
				let msjErr = datosDevuelto.mensaje;
				let codErr = datosDevuelto.codeErr;
				mostrarMensaje("Disculpe, no se pudo realizar la última operación. Consulte con el webmaster. ");
				console.log(">>> ERROR: codErr: "+ codErr +", msjErr: "+ msjErr);
			}
		}else{
			console.log(">>> witper_setCarPedido-errorLanzado: " + JSON.stringify(errorLanzado));
			mostrarMensaje("Disculpe, existi&oacute; un problema al registrar pedido");
		}
    });
}
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------