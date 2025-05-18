/************************************************************************/
// Funciones javascript - Formulario Contacto
/************************************************************************/

var clsRegistrarSuscripcion = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

    this.inputs = {
        nomCli :	{ id: 'txtNombre' },
        numCel : 	{ id: 'txtCel' },
        email  : 	{ id: 'txtEmail' }
    };

    this.botones = {
        btnGrabar : { id: 'btnGrabar' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		$("#divMsgDatoObligatorio").hide();
		$("#divResultado").hide();
        $("#" + this.botones.btnGrabar.id).click(function(){
            refCls.onClickBtnGrabar();
        });

		// this.validarForm(); // 20241210 degui: se comenta temporalmente	
    };

	this.onClickBtnGrabar = function () {
		var isFormValido = $("#frmSuscribir").valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				// validar datos backend
				this.validarDatosBackend();
			}
		}
	};

	// 20240302 validar reclamo
	this.validarDatosBackend = function(){
		let refCls = this;
		utils_valSuscribir("#frmSuscribir", function(datosDevuelto){
			//console.log("utils_valContactCli-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tipo;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.exito;
			if(val){
				refCls.grabarConctacto();
			}else{
				if(tip == "A"){
					mostrarMensaje(datosDevuelto.msj, 2);
					console.log(">>> validarDatosBackend-Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Error: " + datosDevuelto.msj, 2);
					console.log(">>> validarDatosBackend-Error: " + msj);
				}
			}
		});
	};

	// 20240412 registrar contacto
	this.grabarConctacto = function () {
		let refCls = this;
		utils_setSuscribir("#frmSuscribir", function(datosDevuelto){
			console.log("utils_setSuscribir-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tipo;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.exito;
			if(val){
				refCls.limpiarForm();
				mostrarMensaje("Se ha enviado correctamente su mensaje, muy pronto nos pondrémos en contacto con usted.", 0);
			}else{
				if(tip == "A"){
					mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
					console.log(">>> utils_setSuscribir-Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Mensaje Error: " + msj, 2);
					console.log(">>> utils_setSuscribir-Error: " + msj);
				}
			}
		});
	};

	this.validarDatosFormEnd = function () {
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
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.nomCli.id).val("");
		$("#" + this.inputs.numCel.id).val("");
		$("#" + this.inputs.email.id).val("");
	};

	/*
	this.requeridoinputfunc = function(value, element, param) {
		if (value.trim() != "") {
			$("#" + param.id).removeClass("wpr-input-invalid");
			return true;
		} else {
			$("#" + param.id).addClass("wpr-input-invalid");
			return false; 
		}
	};
	
	$.validator.addMethod("requeridoinput", this.requeridoinputfunc, " * Ingrese dato obligatorio");
	*/	

	// 20241210 degui: se comenta temporalmente	
	/*this.validarForm = function(){
		$("#frmSuscribir").validate({
			//Reglas de validacion
			rules: {
				txtEmail: 	{ email: true }
			},  
			errorPlacement: function(error, element) { 
				error.insertAfter(element);
			},
			highlight: function (element, errorClass) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function (element, errorClass) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			success: function (label, element) {
			},
			errorContainer: "#divMsgDatoObligatorio",
			showErrors: function(errorMap, errorList) {
				$('#divMsgDatoObligatorio').html("Todos los campos marcados con un asterisco (*) son obligatorios");
				this.defaultShowErrors();
			},
			//Mensajes de error
			messages: {
				'txtEmail': { email: '* Por favor, ingrese un email valido' }
			}
	   });	
	};*/
	
}

$(document).ready(function() {
	var registrarSuscripcion = new clsRegistrarSuscripcion();
	registrarSuscripcion.iniciarForm();
});
