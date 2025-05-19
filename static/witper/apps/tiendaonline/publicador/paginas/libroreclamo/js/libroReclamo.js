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
		fecComprob : 	{ id: 'txtFecComprob' },
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
		//$('#dtpComprob').datetimepicker({format: 'YYYY-MM-DD', locale: 'es', pickTime: false });
		//$("#" + this.inputs.fecComprob.id).val(getFechaActualYYYMMDD());
		// 20241209 Degui: se comenta hasta resolver error
		//$('#dtpComprob').datetimepicker({format: 'DD//MM/YYYY', locale: 'es', pickTime: false });
		//$("#" + this.inputs.fecComprob.id).val(getFechaActual());
        
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
		
		//this.validarForm();

    };

	this.onClickBtnGrabarReclamo = function () {
		var isFormValido = $("#frmLibroReclamo").valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosIngresados()){
				// validar datos backend
				this.validarReclamo();
			}
		}
	};

	// 20240302 validar reclamo
	this.validarReclamo = function(){
		let refCls = this;
		utils_valLibroReclamo("#frmLibroReclamo", function(datosDevuelto){
			//console.log("utils_valLibroReclamo-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tipo;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.exito;
			if(val){
				//console.log(">>> Exito: " + msj);
				refCls.mostrarMensajeConfirmacion(val);
			}else{
				if(tip == "A"){
					mostrarMensaje("Mensaje validaci&oacute;n: " + datosDevuelto.msj, 2);
					console.log(">>> Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Mensaje Error: " + datosDevuelto.msj, 2);
					console.log(">>> Error: " + msj);
				}
			}
		});
	};

	this.mostrarMensajeConfirmacion = function(val){
		if(val){
			mensajeConfirmar(this.registrarReclamo);
			//return false;
		}
	};

	// 20210303 registrar reclamo
	this.registrarReclamo = function () {
		utils_setLibroReclamo("#frmLibroReclamo", function(datosDevuelto){
			console.log("utils_setLibroReclamo-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tipo;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.exito;
			let numeroReclamo = datosDevuelto.data;
			let email = $('#txtEmail').val();
			if(val){
				//location.href="javascript:cargarPagina('cli/principal/ver/menu/?page=10101')"; // inicio
				//mostrarMensaje("Su reclamo se registro correctamente. Muy pronto nos pondremos en contacto con usted.", 0);
				//cargarPagina('cli/principal/ver/menu/?page=11001'); // pagina libro reclamo
				//$('#lblNumReclamo').html(numeroReclamo);
				$('#lblemail').html(email);
				$('#divDatosReclamo').toggle('hide');
				$('#divResultado').toggle('slow');
				// 20240406 enviar aviso
				utils_enviarAvisoReclamo(numeroReclamo);
			}else{
				if(tip == "A"){
					mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
					console.log(">>> Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Mensaje Error: " + msj, 2);
					console.log(">>> Error: " + msj);
				}
			}
		});
	};

	this.validarDatosIngresados = function () {
		// validar tipo documento
		var codTipoDocu =  $("#" + this.combos.cboTipDocu.id).val();
		if(codTipoDocu != '0' && codTipoDocu != '1'){
			mostrarMensaje("Seleccione un tipo de documento", 2);
			$("#" + this.combos.cboTipDocu.id).focus();
			return false;
		}
		// validar número de documento
		var numDocu =  $("#" + this.inputs.numDocu.id).val().trim();
		if(numDocu.length < 1){
			mostrarMensaje("Ingrese un número de documento", 2);
			$("#" + this.inputs.numDocu.id).focus();
			return false;
		}
		// validar nombre cliente
		var nombCliente =  $("#" + this.inputs.nombCliente.id).val().trim();
		if(nombCliente.length < 1){
			mostrarMensaje("Ingrese el nombre de cliente o razón social", 2);
			$("#" + this.inputs.nombCliente.id).focus();
			return false;
		}
		// validar celular
		var numCelular =  $("#" + this.inputs.numCelular.id).val().trim();
		if(numCelular.length < 1){
			mostrarMensaje("Ingrese n&uacute;mero celular", 2);
			$("#" + this.inputs.numCelular.id).focus();
			return false;
		}
		// validar e-mail
		var email =  $("#" + this.inputs.email.id).val().trim();
		if (email == "") {
			mostrarMensaje("El correo electr&oacute;nico es obligatorio", 2);
			return false;
		}	
		if (email != "" && !validarExpresion(email, regExpCorreo) ) {
			mostrarMensaje("El correo electr&oacute;nico no es v&aacute;lido, verificar", 2);
			return false;
		}

		// validar Región
		var cboRegion =  $("#" + this.combos.cboRegion.id).val();
		if(cboRegion != '51' && cboRegion != '74'){
			mostrarMensaje("Seleccione una regi&oacute;", 2);
			$("#" + this.combos.cboRegion.id).focus();
			return false;
		}
		// validar Provincia
		var cboProvincia =  $("#" + this.combos.cboProvincia.id).val();
		if(cboProvincia != 'CIX' && cboProvincia != 'FER' && cboProvincia != 'LAM'){
			mostrarMensaje("Seleccione una provincia;", 2);
			$("#" + this.combos.cboProvincia.id).focus();
			return false;
		}
		// validar Distrito
		var cboDistrito =  $("#" + this.combos.cboDistrito.id).val();
		if(cboDistrito != 'CIX' && cboDistrito != 'JLO' && cboDistrito != 'VIC'){
			mostrarMensaje("Seleccione un distrito;", 2);
			$("#" + this.combos.cboDistrito.id).focus();
			return false;
		}

		// validar Motivo
		var cboMotivo =  $("#" + this.combos.cboMotivo.id).val();
		if(cboMotivo != '0' && cboMotivo != '1'){
			mostrarMensaje("Seleccione un motivo;", 2);
			$("#" + this.combos.cboMotivo.id).focus();
			return false;
		}
		// validar comprobante
		var cboTipoComprob =  $("#" + this.combos.cboTipoComprob.id).val();
		if(cboTipoComprob != 'B' && cboTipoComprob != 'F'){
			mostrarMensaje("Seleccione un tipo de comprobante;", 2);
			$("#" + this.combos.cboTipoComprob.id).focus();
			return false;
		}
		// validar número de comprobante
		var nroComprob =  $("#" + this.inputs.nroComprob.id).val().trim();
		if(nroComprob.length < 1){
			mostrarMensaje("Ingrese n&uacute;mero de comprobante", 2);
			$("#" + this.inputs.nroComprob.id).focus();
			return false;
		}
		// validar fecha de emisión de comprobante
		if ($("#" + this.inputs.fecComprob.id).val().length < 1) {
			mostrarMensaje("Ingrese la fecha de compra, verificar", 2);
			return false;
		}
		var numFechaActual = formatFechaNumeral(getFechaActualYYYMMDD());
		var numFechaCompra = formatFechaNumeral($("#" + this.inputs.fecComprob.id).val());
		if (numFechaCompra > numFechaActual) {
			mostrarMensaje("Fecha de compra no puede ser mayor a la fecha actual, verificar", 2);
			return false;
		}
		// validar nombre de producto
		var desProducto =  $("#" + this.inputs.desProducto.id).val().trim();
		if(desProducto.length < 1){
			mostrarMensaje("Ingrese nombre producto", 2);
			$("#" + this.inputs.desProducto.id).focus();
			return false;
		}
		// validar cantidad de producto
		var cantProducto =  $("#" + this.inputs.cantProducto.id).val().trim();
		if(cantProducto.length < 1){
			mostrarMensaje("Ingrese cantidad de producto", 2);
			$("#" + this.inputs.cantProducto.id).focus();
			return false;
		}
		if(parseInt(cantProducto) < 1){
			mostrarMensaje("Ingrese cantidad de producto mayor a cero", 2);
			$("#" + this.inputs.cantProducto.id).focus();
			return false;
		}
		// validar monto de reclamo
		var precProducto =  $("#" + this.inputs.precProducto.id).val().trim();
		if(precProducto.length < 1){
			mostrarMensaje("Ingrese precio de producto", 2);
			$("#" + this.inputs.precProducto.id).focus();
			return false;
		}
		if(parseInt(precProducto) < 1){
			mostrarMensaje("Ingrese precio de producto mayor a cero", 2);
			$("#" + this.inputs.precProducto.id).focus();
			return false;
		}
		// validar motivo de reclamo
		var descMotivo =  $("#" + this.inputs.descMotivo.id).val().trim();
		if(descMotivo.length < 1){
			mostrarMensaje("Ingrese descripci&oacute;n de motivo", 2);
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
		if(op == '0'){ // DNI
			$("#" + this.inputs.numDocu.id).attr('maxlength', 8);
		}else if(op == '1'){ // RUC
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
	
	//$.validator.addMethod("requeridoinput", this.requeridoinputfunc, " * Ingrese dato obligatorio");
	//$.validator.addMethod("requeridosel", this.requeridoselfunc, " * Debe seleccionar una opción");
	// 20241210 degui: se comenta temporalmente		
	/*this.validarForm = function(){
		$("#frmLibroReclamo").validate({
			//Reglas de validacion
			rules: {
				cboTipDocu: { requeridosel: 	{id:"cboTipDocu"}},
				txtNumDocu: { requeridoinput: 	{id:"txtNumDocu"}},
				txtNombre: 	{ requeridoinput: 	{id:"txtNombre"} }, 
				txtCel: 	{ requeridoinput: 	{id:"txtCel"}, minlength: 9},
				txtEmail: 	{ email: true },
				cboDistrito: { requeridosel: {id:"cboDistrito"}},
				txtNroComprob: { requeridoinput: {id:"txtNroComprob"}},
				txtCantProd: { requeridoinput: {id:"txtCantProd"}, min: 1},
				txtPrecioProd: { requeridoinput: {id:"txtPrecioProd"}, min: 1},
				txtMotivo: { requeridoinput: {id:"txtMotivo"}}
			},  
			errorPlacement: function(error, element) {         
				//console.log("errorPlacement...");
				//console.log("errorPlacement-error: " + JSON.stringify(error));
				//console.log("errorPlacement-element3: " + JSON.stringify(element));
				//console.log(">>> gtp-element.name: " + element.attr("name"));
				/ * var nom = element.attr("name");
				if (nom == "txtEmail"){
					$("#desErrMail").html("* El valor introducido debe ser una dirección de correo electrónico.");
					if ( element.hasClass( 'customError' )) { 
						// hacer
					}
				}else{
					$("#desErrMail").html("");
				} * /
				error.insertAfter(element);
			},
			highlight: function (element, errorClass) {
				//console.log("highlight...");
				//console.log("highlight-errorClass: " + JSON.stringify(errorClass));
				//console.log("highlight-element: " + JSON.stringify(element));
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function (element, errorClass) {
				//console.log("unhighlight...");
				//console.log("unhighlight-errorClass: " + JSON.stringify(errorClass));
				//console.log("unhighlight-element: " + JSON.stringify(element));
				$(element).closest('.form-group').removeClass('has-error');
			},
			success: function (label, element) {           
				//console.log("success...");
				//console.log("success-label: " + JSON.stringify(label));
				//console.log("success-element: " + JSON.stringify(element));
				//$('#txtDNI').addClass("wpr-input-focus-invalid");
			},
			errorContainer: "#divMsgDatoObligatorio",
			showErrors: function(errorMap, errorList) {
				//console.log("showErrors...");
				//console.log("showErrors-errorMap: " + JSON.stringify(errorMap));
				//console.log("showErrors-errorList: " + JSON.stringify(errorList));
				$('#divMsgDatoObligatorio').html("Todos los campos marcados con un asterisco (*) son obligatorios");

				this.defaultShowErrors();
			},
			//Mensajes de error
			messages: {
				'txtCel': { minlength: '* Por favor, ingrese almenos 9 digitos' },
				'txtEmail': { email: '* Por favor, ingrese un email valido' },
				'txtCantProd': { min: '* Por favor, ingrese un valor mayor o igual a 1' },
				'txtPrecioProd': { min: '* Por favor, ingrese un valor mayor o igual a 1' }
			}
	   });	
	};*/
	
}

$(document).ready(function() {
	var registrarLibroReclamo = new clsRegistrarLibroReclamo();
	registrarLibroReclamo.iniciarForm();
});