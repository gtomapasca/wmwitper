/************************************************************************/
// Funciones javascript - Libro Reclamos
/************************************************************************/

var clsRegistrarLibroReclamo = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");
	const MAX_LENGHT_TEXTAREA = 500;

    this.inputs = {
		numDocu : 		{ id: 'txtNumDocu' },
        nombCliente : 	{ id: 'txtNombre' },
        numCelular : 	{ id: 'txtCel' },
        email : 		{ id: 'txtEmail' },
		domicilio : 	{ id: 'txtDomicilio' },
		nroComprob :	{ id: 'txtNroComprob' },
		fecComprob : 	{ id: 'dpFecComprob' },
		codProducto : 	{ id: 'txtCodProd' },
		desProducto : 	{ id: 'txtDesProd' },
		cantProducto : 	{ id: 'txtCantProd' },
		precProducto : 	{ id: 'txtPrecioProd' },
		descMotivo : 	{ id: 'txtMotivo' }
    };

	this.combos = {
        cboTipDocu : 	{ id: 'cboTipDocu' },
		cboRegion : 	{ id: 'cboRegion' },
		cboProvincia : 	{ id: 'cboProvincia' },
		cboDistrito : 	{ id: 'cboDistrito' },
		cboMotivo : 	{ id: 'cboMotivo' },
		cboTipoComprob :{ id: 'cboTipoComprob' }
    };

    this.botones = {
        btnEnviar : { id: 'btnEnviarReclamo' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		$("#txtContadorCaracteres").html("Caracteres restantes : "+ MAX_LENGHT_TEXTAREA);
    	$("#" + this.inputs.descMotivo.id).attr('maxlength', (MAX_LENGHT_TEXTAREA + 50));
		$("#divMsgDatoObligatorio").hide();
		// blur
		$("#" + this.combos.cboTipDocu.id).change(function(){
            refCls.onChangeSelTipoDocu();
        });
		$("#" + this.inputs.descMotivo.id).keyup(function(){
			refCls.onKeyupContadorCaracteres();
	   	});
        $("#" + this.botones.btnEnviar.id).click(function(){
            refCls.onClickBtnGrabarReclamo();
        });
		// Iniciar fecha comprobante
		$("#dpFecComprob").val(getFechaActual());
		$("#dpFecComprob").datepicker({dateFormat:'dd/mm/yy'});
    };

	this.onClickBtnGrabarReclamo = function () {
		var isFormValido = $("#frmLibroReclamo").valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				// validar datos backend
				this.validarDatosBackend();
			}
		}
	};

	this.getJsonDataForm = function(){
        return {
			numDocu  		: 	$("#" + this.inputs.numDocu.id).val(),
			nombCliente  	: 	$("#" + this.inputs.nombCliente.id).val(),
			numCelular  	: 	$("#" + this.inputs.numCelular.id).val(),
			email  			: 	$("#" + this.inputs.email.id).val(),
			domicilio  		: 	$("#" + this.inputs.domicilio.id).val(),
			nroComprob  	: 	$("#" + this.inputs.nroComprob.id).val().trim().toUpperCase(),
			fecComprob  	: 	$("#" + this.inputs.fecComprob.id).val(),
			codProducto  	: 	$("#" + this.inputs.codProducto.id).val(),
			desProducto  	: 	$("#" + this.inputs.desProducto.id).val(),
			cantProducto  	: 	$("#" + this.inputs.cantProducto.id).val(),
			precProducto  	: 	$("#" + this.inputs.precProducto.id).val(),
			descMotivo  	: 	$("#" + this.inputs.descMotivo.id).val(),
			codTipDocu  	: 	$("#" + this.combos.cboTipDocu.id).val(),
			codRegion  		: 	$("#" + this.combos.cboRegion.id).val(),
			codProvincia  	: 	$("#" + this.combos.cboProvincia.id).val(),
			codDistrito  	: 	$("#" + this.combos.cboDistrito.id).val(),
			codMotivo  		: 	$("#" + this.combos.cboMotivo.id).val(),
			codTipoComprob  : 	$("#" + this.combos.cboTipoComprob.id).val()
		};
    };

	// 20240302 validar reclamo
	this.validarDatosBackend = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/publipages/consultar-publicador-paginas/validar-reclamo',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log(">>> contacto-validarDatosBackend-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					refCls.mostrarMensajeConfirmacion(val);
				}else{
					if(tip == "A"){
						MSG.showINF("Mensaje validaci&oacute;n: " + msj);
					}else if(tip == "E"){
						MSG.showERR("Mensaje Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				MSG.showERR("Error al validar datos de usuario: " + JSON.stringify(errorThrown));
			}
		});
	}

	this.mostrarMensajeConfirmacion = function(val){
		if(val){
			mensajeConfirmar(this.registrarReclamo);
		}
	};

	// 20261108 degui: registrar reclamo
	this.registrarReclamo = function(){
		let jsonDataForm = obj.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/publipages/registrar-publicador-paginas/registrar-reclamo',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log(">>> contacto-registrarReclamo-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				let numeroReclamo = response.data;
				let email = $('#txtEmail').val();
				if(val){
					$('#lblemail').html(email);
					$('#divDatosReclamo').toggle('hide');
					$('#divResultado').toggle('slow');
					// 20240406 enviar aviso
					obj.enviarAvisoReclamo(numeroReclamo);
				}else{
					if(tip == "A"){
						MSG.showINF("Mensaje validaci&oacute;n: " + msj);
					}else if(tip == "E"){
						MSG.showERR("Mensaje Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				MSG.showERR("Error al validar datos de usuario: " + JSON.stringify(errorThrown));
			}
		});
	}

	// 20261108 degui: enviar aviso del reclamo
	this.enviarAvisoReclamo = function(numeroReclamo){
		//console.log(">>> enviarAvisoReclamo-numeroReclamo: " + numeroReclamo );
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/publipages/registrar-publicador-paginas/enviar-aviso-reclamo/?numAvisoAsoc='+numeroReclamo,
	   		dataType: "json",
			success: function(response){
				console.log(">>> contacto-registrarReclamo-response: " + JSON.stringify(response));
			},
			error: function(errorThrown) {
				//MSG.showERR("Error al enviar aviso reclamo: " + JSON.stringify(errorThrown));
			}
		});
	}

	this.validarDatosFormEnd = function () {
		// validar tipo documento
		var codTipoDocu =  $("#" + this.combos.cboTipDocu.id).val();
		// 3: DNI, 4: RUC
		if(codTipoDocu != '3' && codTipoDocu != '4'){
			MSG.showERR("Seleccione un tipo de documento");
			$("#" + this.combos.cboTipDocu.id).focus();
			return false;
		}
		// validar número de documento
		var lenNumDocu = $("#" + this.inputs.numDocu.id).val().trim().length
		if(lenNumDocu < 1){
			MSG.showERR("Ingrese un número de documento");
			$("#" + this.inputs.numDocu.id).focus();
			return false;
		}
		// validar nombre cliente
		var nombCliente =  $("#" + this.inputs.nombCliente.id).val().trim();
		if(nombCliente.length < 1){
			MSG.showERR("Ingrese el nombre de cliente o razón social");
			$("#" + this.inputs.nombCliente.id).focus();
			return false;
		}
		// validar celular
		var numCelular =  $("#" + this.inputs.numCelular.id).val().trim();
		if(numCelular.length < 1){
			MSG.showERR("Ingrese n&uacute;mero celular");
			$("#" + this.inputs.numCelular.id).focus();
			return false;
		}
		// validar e-mail
		var email =  $("#" + this.inputs.email.id).val().trim();
		if (email == "") {
			MSG.showERR("El correo electr&oacute;nico es obligatorio");
			return false;
		}	
		if (email != "" && !validarExpresion(email, regExpCorreo) ) {
			MSG.showERR("El correo electr&oacute;nico no es v&aacute;lido, verificar");
			return false;
		}

		// validar Región
		var cboRegion =  $("#" + this.combos.cboRegion.id).val();
		if(cboRegion != '51' && cboRegion != '74'){
			MSG.showERR("Seleccione una regi&oacute;");
			$("#" + this.combos.cboRegion.id).focus();
			return false;
		}
		// validar Provincia
		var cboProvincia =  $("#" + this.combos.cboProvincia.id).val();
		if(cboProvincia != 'CIX' && cboProvincia != 'FER' && cboProvincia != 'LAM'){
			MSG.showERR("Seleccione una provincia;");
			$("#" + this.combos.cboProvincia.id).focus();
			return false;
		}
		// validar Distrito
		var cboDistrito =  $("#" + this.combos.cboDistrito.id).val();
		if(cboDistrito != 'CIX' && cboDistrito != 'JLO' && cboDistrito != 'VIC'){
			MSG.showERR("Seleccione un distrito;");
			$("#" + this.combos.cboDistrito.id).focus();
			return false;
		}
		// validar Motivo
		var cboMotivo =  $("#" + this.combos.cboMotivo.id).val();
		if(cboMotivo != '0' && cboMotivo != '1'){
			MSG.showERR("Seleccione un motivo;");
			$("#" + this.combos.cboMotivo.id).focus();
			return false;
		}
		// validar comprobante
		var cboTipoComprob =  $("#" + this.combos.cboTipoComprob.id).val();
		// 3: Boleta, 4: Factura
		if(cboTipoComprob != '3' && cboTipoComprob != '4'){
			MSG.showERR("Seleccione un tipo de comprobante;");
			$("#" + this.combos.cboTipoComprob.id).focus();
			return false;
		}
		// validar número de comprobante
		var nroComprob =  $("#" + this.inputs.nroComprob.id).val().trim();
		if(nroComprob.length < 1){
			MSG.showERR("Ingrese n&uacute;mero de comprobante");
			$("#" + this.inputs.nroComprob.id).focus();
			return false;
		}
		// validar fecha de emisión de comprobante
		if ($("#" + this.inputs.fecComprob.id).val().length < 1) {
			MSG.showERR("Ingrese la fecha de compra, verificar");
			return false;
		}
		var numFechaActual = formatFechaNumeral(getFechaActualYYYMMDD());
		var numFechaCompra = formatFechaNumeral(getStrFechaYYYMMDD($("#" + this.inputs.fecComprob.id).val()));
		//console.log(">>> numFechaActual: " + numFechaActual);
		//console.log(">>> numFechaCompra: " + numFechaCompra);
		if (numFechaCompra > numFechaActual) {
			MSG.showERR("Fecha de compra no puede ser mayor a la fecha actual, verificar");
			return false;
		}
		// validar nombre de producto
		var desProducto =  $("#" + this.inputs.desProducto.id).val().trim();
		if(desProducto.length < 1){
			MSG.showERR("Ingrese nombre producto");
			$("#" + this.inputs.desProducto.id).focus();
			return false;
		}
		// validar cantidad de producto
		var cantProducto =  $("#" + this.inputs.cantProducto.id).val().trim();
		if(cantProducto.length < 1){
			MSG.showERR("Ingrese cantidad de producto");
			$("#" + this.inputs.cantProducto.id).focus();
			return false;
		}
		if(parseInt(cantProducto) < 1){
			MSG.showERR("Ingrese cantidad de producto mayor a cero");
			$("#" + this.inputs.cantProducto.id).focus();
			return false;
		}
		// validar monto de reclamo
		var precProducto =  $("#" + this.inputs.precProducto.id).val().trim();
		if(precProducto.length < 1){
			MSG.showERR("Ingrese precio de producto");
			$("#" + this.inputs.precProducto.id).focus();
			return false;
		}
		if(parseInt(precProducto) < 1){
			MSG.showERR("Ingrese precio de producto mayor a cero");
			$("#" + this.inputs.precProducto.id).focus();
			return false;
		}
		// validar motivo de reclamo
		var descMotivo =  $("#" + this.inputs.descMotivo.id).val().trim();
		//console.log(">>> descMotivo: " + descMotivo);
		if(descMotivo.length < 1){
			MSG.showERR("Ingrese descripci&oacute;n de motivo");
			$("#" + this.inputs.descMotivo.id).focus();
			return false;
		}
		return true;
	};

	this.onKeyupContadorCaracteres = function(){
		var strLength = $("#" + this.inputs.descMotivo.id).val().length
		var caracterRestante = (MAX_LENGHT_TEXTAREA - strLength);
		
		if(caracterRestante < 0){
			$("#txtContadorCaracteres").html('<span style="color: red;">Has excedido el limite de '+MAX_LENGHT_TEXTAREA+' caracteres</span>');
		}else{
			$("#txtContadorCaracteres").html("Caracteres restantes: " + caracterRestante);
		}
	};

	this.onChangeSelTipoDocu = function(){
		var op = $("#" + this.combos.cboTipDocu.id).val();
		//console.log(">>> tipodoc: " + op);
		$("#" + this.inputs.numDocu.id).val("");
		if(op == '3'){ // DNI
			$("#" + this.inputs.numDocu.id).attr('maxlength', 8);
		}else if(op == '4'){ // RUC
			$("#" + this.inputs.numDocu.id).attr('maxlength', 11);
		}
	};

	this.requeridoselfunc = function(value, element, param) {
		//console.log(">>> requeridoselfunc-value: " + value);
		//console.log(">>> requeridoselfunc-element: " + element);
		//console.log(">>> requeridoselfunc-param: " + JSON.stringify(param));
		if (value != "-1") {
			$("#" + param.id).removeClass("wpr-input-invalid");
			return true; 
		} else {
			$("#" + param.id).addClass("wpr-input-invalid");
			return false;
		}
	};

	this.requeridoinputfunc = function(value, element, param) {
		//console.log(">>> requeridoinputfunc-value: " + value);
		//console.log(">>> requeridoinputfunc-element: " + element);
		//console.log(">>> requeridoinputfunc-param: " + JSON.stringify(param));
		if (value.trim() != "") {
			$("#" + param.id).removeClass("wpr-input-invalid");
			return true;
		} else {
			$("#" + param.id).addClass("wpr-input-invalid");
			return false; 
		}
	};
	
}

var obj;
$(document).ready(function() {
	obj = new clsRegistrarLibroReclamo();
	obj.iniciarForm();
});