/************************************************************************/
// Funciones javascript - Formulario Carrito Compras
/************************************************************************/
var clsCarritoCompras = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

	this.forms = {
		formPrincipal  	: 	{ id: 'frmCarCliente' }
    };

    this.inputs = {
        idUsuario 	:	{ id: 'hdIdUsuario' },
		codUsuario 	:	{ id: 'hdCodUsuario' },
		tipoDocu 	:	{ id: 'hdTipoDocu' },
		dni 		:	{ id: 'txtDNI' },
        nombre 		: 	{ id: 'txtNombre' },
        apePat  	: 	{ id: 'txtApePat' },
		apeMat  	: 	{ id: 'txtApeMat' },
		numCel  	: 	{ id: 'txtCel' },
		email  		: 	{ id: 'txtEmail' },
		direccion  	: 	{ id: 'txtDireccion' }
    };

	this.divs = {
        carProductos:	{ id: 'divCarProductos' },
		carCliente	:	{ id: 'divCarCliente' },
		carDetPedido : 	{ id: 'divCarDetallePedido' },
		carFinPedido : 	{ id: 'divCarFinPedido' }
    };

    this.botones = {
        btnContinuarCar : { id: 'btnContinuarCar' },
		btnContinuarCli : { id: 'btnContinuarCli' },
		btnContinuarPedido : { id: 'btnContinuarPedido' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		$("#" + this.divs.carProductos.id).show();
		$("#" + this.divs.carCliente.id).hide();
		$("#" + this.divs.carDetPedido.id).hide();
		$("#" + this.divs.carFinPedido.id).hide();
        $("#" + this.botones.btnContinuarCar.id).click(function(){
            refCls.onClickBtnContinuarCar();
        });
		$("#" + this.botones.btnContinuarCli.id).click(function(){
            refCls.onClickBtnContinuarCli();
        });
		$("#" + this.botones.btnContinuarPedido.id).click(function(){
            refCls.onClickBtnContinuarPedido();
        });
		this.consultarListaCarrito();
    };

	// 20260110 Consultar Carrito Compras
	this.consultarListaCarrito = function () {
		let refCls = this;
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/carrito/consultar-carrito-compras/obtener-lista-carrito',
			dataType: "json",
			success: function(response){
				//console.log(">>> consultarListaCarrito-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					//console.log(">>> consultarListaCarrito-datos: " + JSON.stringify(response.datos));
					let items = response.datos;
					//refCls.mostrarListaCarrito22(items);
					//refCls.buildTablaItemsCarrito(datos);
					//$("#tabItemsCarrito")[0].scrollIntoView();
					let ruta_raiz 	= '/static/witper/';
					let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
					let importe_total = 0;
					var listItems = Array();
					let nro = 0;
					for(let item of items){
						//console.log(">>> consultarListaCarrito-item: " + JSON.stringify(item));
						if(item.estado==0){
							importe_total += parseFloat(item.precio_venta * item.cantidad);
							let src_img = ruta_raiz + ruta_upload + item.img_dir + '/' + item.img_nom;
                        	var tagImg = "<img style='padding:5px; text-align:center;width:100px;' src='"+(src_img)+"'/>"; 
							let newItem = {
								nro : ++nro,
								index : item.index,
								imagen : tagImg,
								codigo : item.mini_codigo,
								descripcion : item.nom_producto,
								precio : item.precio_venta,
								cantidad : item.cantidad,
								subtotal : (item.precio_venta * item.cantidad).toFixed(2),
								opcion : "<a href='javascript:obj.eliminarItemDelCarrito("+item.index+")'><i class='glyphicon glyphicon-trash'></i></a>"
							};
							listItems.push(newItem);
						}
					}
					//console.log(">>> consultarListaCarrito-listItems: " + JSON.stringify(listItems));
					refCls.buildTablaItemsCarrito(listItems, importe_total);
					$("#" + refCls.botones.btnContinuarCar.id).prop("disabled", listItems.length == 0);
					//$("#divMensaje").html("");
				}else{
					if(tip == "A"){
						//console.log(">>> consultarListaCarrito-else-mensaje: debe limpiar el carrito");
						refCls.buildTablaItemsCarrito("", 0);
						$("#" + refCls.botones.btnContinuarCar.id).prop("disabled", true);
					}else if(tip == "E"){
						mostrarMensaje("Mensaje Error: " + msj, 2);
						//console.log(">>> consultarListaCarrito-Error: " + msj);
					}
					//$("#divMensaje").html("");
				}
			},
			error: function(errorThrown) {
				mostrarMensaje("Disculpe, existi&oacute; un problema al consultar carrito", 2);
				//console.log(">>> consultarListaCarrito-errorLanzado: " + JSON.stringify(errorThrown));
			}
		});
		
	};

	this.onClickBtnContinuarCar = function () {
		$('#divCarProductos').toggle('hide');
		$('#divCarCliente').toggle('slow');
		// 20260101 Degui: setear datos de usuario si existe sesión
		let usesion = JSON.parse(sessionStorage.getItem("userSesion"));
		//console.log(">>> btnContinuarCar-usesion: " + usesion);
		if (usesion != null && usesion != undefined){
			//console.log(">>> btnContinuarCar-nick: " + usesion.cod_usuario);
			$("#hdIdUsuario").val(usesion.id_usuario);
			$("#hdCodUsuario").val(usesion.cod_usuario);
		}else{
			this.obtenerUsuarioAnonimo();
		}
	};
	
	// 20260216 Tabla de items del carrito
	this.buildTablaItemsCarrito = function(lstArchivosAux, total){
		//console.log(">>> buildTablaItemsCarrito: " + JSON.stringify(lstArchivosAux));
		let refCls = this;
		var tblRepCfg = {bResponsive: false};
		refCls.destruirDataTabla("#tabItemsCarrito");
		var columnas = [
			{
				"targets": 0,
				"data": "nro",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 1,
				"data":  "imagen",
				"className": "text-center",
				"width": "10%",
			},
			{
				"targets": 2,
				"data":  "codigo",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 3,
				"data":  "descripcion",
				"className": "text-left",
				"width": "55%",
			},
			{
				"targets": 4,
				"data":  "precio",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 5,
				"data":  "cantidad",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 6,
				"data":  "subtotal",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 7,
				"data":  "opcion",
				"className": "text-center",
				"width": "5%",
			}
		];
		this.construirDataTabla("#tabItemsCarrito", lstArchivosAux, tblRepCfg, columnas);
		// Calcular totales
		var subtotal = (total / 1.18).toFixed(2);
		var igv = (subtotal * 0.18).toFixed(2);
		var totalImporte = parseFloat(subtotal) + parseFloat(igv);
		$("#sSubTotal").html(subtotal);
		$("#sIGV").html(igv);
		$("#sImporteTotal").html((totalImporte).toFixed(2));
	}

	// 20260216 Tabla Detalle de items del carrito
	this.buildTablaDetalleItemsCarrito = function(lstArchivosAux, total){
		//console.log(">>> buildTablaDetalleItemsCarrito: " + JSON.stringify(lstArchivosAux));
		let refCls = this;
		var tblRepCfg = {bResponsive: false};
		//refCls.destruirDataTabla("#tabItemsCarrito");
		//refCls.destruirDataTabla("#tabDetalleItemsCarrito");
		var columnas = [
			{
				"targets": 0,
				"data": "nro",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 1,
				"data":  "imagen",
				"className": "text-center",
				"width": "10%",
			},
			{
				"targets": 2,
				"data":  "codigo",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 3,
				"data":  "descripcion",
				"className": "text-left",
				"width": "55%",
			},
			{
				"targets": 4,
				"data":  "precio",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 5,
				"data":  "cantidad",
				"className": "text-center",
				"width": "5%",
			},
			{
				"targets": 6,
				"data":  "subtotal",
				"className": "text-center",
				"width": "5%",
			}
		];
		this.construirDataTabla("#tabDetalleItemsCarrito", lstArchivosAux, tblRepCfg, columnas);
		// Calcular totales
		var subtotal = (total / 1.18).toFixed(2);
		var igv = (subtotal * 0.18).toFixed(2);
		var totalImporte = parseFloat(subtotal) + parseFloat(igv);
		$("#sDetalleSubTotal").html(subtotal);
		$("#sDetalleIGV").html(igv);
		$("#sDetalleImporteTotal").html((totalImporte).toFixed(2));
	}

	// 20260102 Degui: obtener usuario anonimo
	this.obtenerUsuarioAnonimo = function(){
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/cuenta/consultar-cuenta-usuario/obtener-usuario-anonimo',
			dataType: "json",
			success: function(response){
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					let datos = response.datos;
					//console.log(">>> obtenerUsuarioAnonimo-datos: " + JSON.stringify(datos));
					//console.log(">>> obtenerUsuarioAnonimo-id_usuario: " + datos.id_usuario);
					//console.log(">>> obtenerUsuarioAnonimo-cod_usuario: " + datos.cod_usuario);
					$("#hdIdUsuario").val(datos.id_usuario);
					$("#hdCodUsuario").val(datos.cod_usuario);
				}else{
					if(tip == "A"){
						mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
						//console.log(">>> obtenerUsuarioAnonimo-Validar: " + msj);
					}else if(tip == "E"){
						mostrarMensaje("Mensaje Error: " + msj, 2);
						//console.log(">>> obtenerUsuarioAnonimo-Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				mostrarMensaje("Disculpe, existi&oacute; un problema al obtener usuario", 2);
				//console.log(">>> obtenerUsuarioAnonimo-errorLanzado: " + JSON.stringify(errorThrown));
			}
		});
	}

	// 20260102 Degui: eliminar item del carrito
	this.eliminarItemDelCarrito = function(index){
		//console.log(">>> eliminarItemDelCarrito-index: " + index);
		let refCls = this;
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/carrito/registrar-carrito-compras/eliminar-producto-carrito/?index='+index,
			dataType: "json",
			success: function(response){
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				let datos = response.datos;
				//let cant_car = response.ncar;
				//console.log(">>> eliminarItemDelCarrito-response: " + JSON.stringify(response));
				if(val){
					refCls.consultarListaCarrito();
					$("#countCar").html(datos.nproductos);
					//mostrarMensaje("Se elimino item del carrito de compras.", 1);
					//$("#divMensaje").html("Se elimino item del carrito de compras.");
					MSG.showINF({ mensaje: "Se elimino item del carrito de compras..."});
					//return false;
				}else{
					if(tip == "A"){
						mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
						//console.log(">>> eliminarItemDelCarrito-Validar: " + msj);
					}else if(tip == "E"){
						mostrarMensaje("Mensaje Error: " + msj, 2);
						//console.log(">>> eliminarItemDelCarrito-Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				mostrarMensaje("Disculpe, existi&oacute; un problema al eliminar item del carrito", 2);
				//console.log(">>> eliminarItemDelCarrito-errorLanzado: " + JSON.stringify(errorThrown));
			}
		});
	}
	

	this.getJsonDataForm = function(){
        return {
			idUsuario  	: 	$("#" + this.inputs.idUsuario.id).val(),
			codUsuario 	: 	$("#" + this.inputs.codUsuario.id).val(),
			tipoDocu 	: 	$("#" + this.inputs.tipoDocu.id).val(),
			dni  		: 	$("#" + this.inputs.dni.id).val(),
			nombre  	: 	$("#" + this.inputs.nombre.id).val(),
			apePat  	: 	$("#" + this.inputs.apePat.id).val(),
			apeMat  	: 	$("#" + this.inputs.apeMat.id).val(),
			numCel  	: 	$("#" + this.inputs.numCel.id).val(),
			email  		: 	$("#" + this.inputs.email.id).val(),
			direccion  	: 	$("#" + this.inputs.direccion.id).val()
		};
    };

	this.onClickBtnContinuarCli = function () {
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				// validar datos backend
				this.registrarClienteCar();
			}
		}
	};

	// 20260110 registrar cliente carrito
	this.registrarClienteCar = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/carrito/registrar-carrito-compras/registrar-cliente-carrito',
			data: {'datos': jsonDataForm},
			dataType: "json",
			success: function(response){
				//console.log(">>> validarDatosBackend-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					//refCls.grabarConctacto();
					//$('#divCarCliente').toggle('hide');
					//$('#divCarPedido').toggle('slow');
					let datos = response.datos;
					$('#' + refCls.divs.carCliente.id).toggle('hide');
					$('#' + refCls.divs.carDetPedido.id).toggle('slow');
					refCls.mostrarDetallePedido(datos);
				}else{
					if(tip == "A"){
						mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
						//console.log(">>> registrarClienteCar-Validar: " + msj);
					}else if(tip == "E"){
						mostrarMensaje("Mensaje Error: " + msj, 2);
						//console.log(">>> registrarClienteCar-Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				mostrarMensaje("Disculpe, existi&oacute; un problema al registrar cliente", 2);
				//console.log(">>> registrarClienteCar-errorLanzado: " + JSON.stringify(errorThrown));
			}
		});
	}

	this.mostrarDetallePedido = function(datos){
		//console.log(">>> mostrarDetallePedido: " + JSON.stringify(datos));
		let refCls = this;
		let datos_cliente   = datos.datos_cliente;
		//let datos_productos = datos.car_detalle_producto;
		$("#txtDetalleDNI").val(datos_cliente.dni);
		$("#txtDetalleNombre").val(datos_cliente.nombre+ " " + datos_cliente.apePat +" "+ datos_cliente.apeMat);
		$("#txtDetalleCel").val(datos_cliente.numCel);
		$("#txtDetalleEmail").val(datos_cliente.email);
		$("#txtDetalleDireccion").val(datos_cliente.direccion);

		let items = datos.car_detalle_producto;
		//console.log(">>> mostrarDetallePedido-items: " + JSON.stringify(items));
		let ruta_raiz 	= '/static/witper/';
		let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
		let importe_total = 0;
		var index = 0; 
		var listItems = Array();
		for(let item of items){
			//console.log(">>> mostrarDetallePedido-itemx: " + JSON.stringify(item));
			if(item.estado==0){
				importe_total += parseFloat(item.precio_venta * item.cantidad);
				let src_img = ruta_raiz + ruta_upload + item.img_dir + '/' + item.img_nom;
				var tagImg = "<img style='padding:5px; text-align:center;width:100px;' src='"+(src_img)+"'/>"; 
				let newItem = {
					nro : ++index,
					imagen : tagImg,
					codigo : item.mini_codigo,
					descripcion : item.nom_producto,
					precio : item.precio_venta,
					cantidad : item.cantidad,
					subtotal : (item.precio_venta * item.cantidad).toFixed(2)
				};
				listItems.push(newItem);
			}
		}
		refCls.buildTablaDetalleItemsCarrito(listItems, importe_total);
		
	}

	this.onClickBtnContinuarPedido = function () {
		let refCls = this;
		// muestra ventana emergente para confirmar el registro de los datos
		//mensajeConfirmarPedido(registrarCarPedido);
		//refCls.mensajeConfirmarPedido();
		MSG.showWAR({ 	titulo: "Advertencia", 
						mensaje: "Por favor verifique detalladamente los datos ingresados a fin de continuar con su pedido, ya que, una vez registrado no podrá realizar modificaciones.",
						fnSi: refCls.btnAceptarRegistrarPedido
					});
	};

	this.btnAceptarRegistrarPedido = function () {
		//let refCls = this;
		//MSG.showINF({ mensaje: "¿Está seguro de grabar?"});
		MSG.showCON({ 	titulo: "Confirmación", 
						mensaje: "¿Está seguro de grabar?",
						fnSi: obj.registrarCarDetPedido()
					});
		
	};

	// modal mensaje confirmacion
	this.mensajeConfirmarPedido = function(){
		let refCls = this;
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
			refCls.registrarCarDetPedido();
		});
		$("#dlgBtnNo").click(function(e){
			$('#myModalConfirm').modal('hide');
		});
		$('#myModalConfirm').modal('show');
	};

	// 20260110 registrar pedido carrito
	this.registrarCarDetPedido = function(){
		let refCls = this;
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/carrito/registrar-carrito-compras/registrar-carrito-pedido',
			dataType: "json",
			success: function(response){
				//console.log(">>> registrarCarDetPedido-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					//let nroPedido 	= datosDevuelto.nro_pedido;
					let nroPedido 	= response.datos;
					$('#' + refCls.divs.carDetPedido.id).toggle('hide');
					$('#' + refCls.divs.carFinPedido.id).toggle('slow');
					let htmMsjPedido = "";
					htmMsjPedido =+ "<div>";
					htmMsjPedido =+ "<p>Se registro correctamente su pedido. Su número de pedido es: <b>"+ nroPedido +"</b></p>"; 
					htmMsjPedido =+ "<p>Recibirá un mensaje de correo electrónico con los detalles de su pedido.</p>";
					htmMsjPedido =+ "</div>";
					$("#divMsjPedido").html(htmMsjPedido);
					$("#countCar").html("(0)");
					/*let html =  "<div class='container'>";
					html += "	<div class='col-md-8'>";
					html += "		<h2 class='wpr-h2-e01'>Carrito :: Mensaje</h2>";
					html += "		<h4 class='wpr-h4-e01'>Su número de pedido es: "+ nroPedido +"</h4>";
					html += "<div>Se registro correctamente su pedido. Recibirá un mensaje de correo electrónico con los detalles de su pedido."
					html += " Muy pronto un agente de ventas se pondrá en contacto con usted.</div>";
					html += "<div><a href='javascript:cargarPagina(\"cpanel/store/commerce/menu-comercio-productos/opcion-inicio\")' class='btn btn-link' role='button'>Volver a tienda virtual</a></div>";
					html += "   	</div>";
					html += "   </div>";
					$("#panelPedido").html(html);
					*/
					//mostrarMensaje("¡Se ha creado su usuario con &eacute;xito! Gracias por registrarse.", 0);
					refCls.limpiarForm();
				}else{
					if(tip == "A"){
						mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
						//console.log(">>> registrarCarPedido-Validar: " + msj);
					}else if(tip == "E"){
						mostrarMensaje("Mensaje Error: " + msj, 2);
						//console.log(">>> registrarCarPedido-Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				mostrarMensaje("Disculpe, existi&oacute; un problema al registrar pedido", 2);
				//console.log(">>> registrarCarPedido-errorLanzado: " + JSON.stringify(errorThrown));
			}
		});
	}

	this.validarDatosFormEnd = function () {
		let jsonDataForm = this.getJsonDataForm();
		if(jsonDataForm.dni.length < 1){
			mostrarMensaje("Ingrese número DNI", 2);
			$("#" + this.inputs.dni.id).focus();
			return false;
		}
		if(jsonDataForm.nombre.length < 1){
			mostrarMensaje("Ingrese nombre", 2);
			$("#" + this.inputs.nombre.id).focus();
			return false;
		}
		if(jsonDataForm.apePat.length < 1){
			mostrarMensaje("Ingrese apellido paterno", 2);
			$("#" + this.inputs.apePat.id).focus();
			return false;
		}
		if(jsonDataForm.apeMat.length < 1){
			mostrarMensaje("Ingrese apellido materno", 2);
			$("#" + this.inputs.apeMat.id).focus();
			return false;
		}
		if(jsonDataForm.numCel.length < 1){
			mostrarMensaje("Ingrese n&uacute;mero celular", 2);
			$("#" + this.inputs.numCel.id).focus();
			return false;
		}
		if (jsonDataForm.email.length < 1) {
			mostrarMensaje("El correo electr&oacute;nico es obligatorio", 2);
			return false;
		}	
		if (jsonDataForm.email != "" && !validarExpresion(jsonDataForm.email, regExpCorreo) ) {
			mostrarMensaje("El correo electr&oacute;nico no es v&aacute;lido, verificar", 2);
			return false;
		}
		if(jsonDataForm.direccion.length < 1){
			mostrarMensaje("Ingrese dirección", 2);
			$("#" + this.inputs.direccion.id).focus();
			return false;
		}
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.dni.id).val("");
		$("#" + this.inputs.nombre.id).val("");
		$("#" + this.inputs.apePat.id).val("");
		$("#" + this.inputs.apeMat.id).val("");
		$("#" + this.inputs.numCel.id).val("");
		$("#" + this.inputs.email.id).val("");
		$("#" + this.inputs.direccion.id).val("");
	};

	this.construirDataTabla = function( tableID, tableData, config, columnDefsParams ) {
		let refCls = this;
		this.destruirDataTabla(tableID);
		var oTabla = $(tableID).dataTable({
											data: tableData,
											iDisplayLength: refCls.esNullOUndefined( config.iCantFilas )? 5 : config.iCantFilas,
											pageLength: refCls.esNullOUndefined( config.iCantFilas )? 5 : config.iCantFilas,
											ordering: refCls.esNullOUndefined( config.bOrdenar )? false : config.bOrdenar,
											searching: refCls.esNullOUndefined( config.bBuscar )? false : config.bBuscar,
											responsive: refCls.esNullOUndefined( config.bResponsive )? true : config.bResponsive,
											paging: refCls.esNullOUndefined( config.bPaginar )? true : config.bPaginar,
											bScrollAutoCss: true,
											bStateSave: false,
											bAutoWidth: false,
											bScrollCollapse: false,
											pagingType: "simple_numbers",
											bLengthChange: false,
											fnDrawCallback: function(oSettings) {
												if (oSettings.fnRecordsTotal() == 0) {
													$( tableID + '_info').hide();
													$( tableID + '_paginate').hide();
												} else {
													$( tableID + '_info').show();
													$( tableID + '_paginate').show();
												}
											},
											fnCreatedRow: function( nRow, aData, iDataIndex ) {
												//$(nRow).attr('id', 'id-'+aData.idFormulario);
											},
											language: {
														"sProcessing":     "Procesando...",
														"sLengthMenu":     "Mostrar _MENU_ registros",
														"sZeroRecords":    "No se encontraron resultados",
														"sEmptyTable":     "No se encontraron requisitos para los par&aacute;metros ingresados",
														"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
														"sInfoEmpty":      "Registros del 0 al 0 de un total de 0 registros",
														"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
														"sInfoPostFix":    "",
														"sSearch":         "Buscar:",
														"sUrl":            "",
														"sInfoThousands":  ",",
														"sLoadingRecords": "Cargando...",
														"oPaginate": {
															"sFirst":    "Primero",
															"sLast":     "Último",
															"sNext":     "Siguiente >",
															"sPrevious": "< Anterior"
														},
														"oAria": {
															"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
															"sSortDescending": ": Activar para ordenar la columna de manera descendente"
														}
											},
											columnDefs: columnDefsParams
										});
		oTabla.fnDraw();
		return oTabla;
	}

	this.destruirDataTabla = function(nombreTabla){
		//console.log(">>> destruirDataTabla: " + nombreTabla);
		var oTable = $(nombreTabla).DataTable();				
		oTable.clear(); //se limpia la tabla
		oTable.destroy(); //se destruye la tabla //
	}

	this.esNullOUndefined = function(valor) {
		return valor == null || (typeof valor == "undefined");
	}
	
}

var obj;
$(document).ready(function() {
	obj = new clsCarritoCompras();
	obj.iniciarForm();
});