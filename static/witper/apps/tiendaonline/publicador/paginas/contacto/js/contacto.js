/************************************************************************/
// Funciones javascript - Formulario Contacto
/************************************************************************/
var clsRegistrarContacto = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");
	const MAX_LENGHT_TEXTAREA = 500;

    this.inputs = {
        nomCli :	{ id: 'txtNombre' },
        numCel : 	{ id: 'txtCel' },
        email  : 	{ id: 'txtEmail' },
		asunto : 	{ id: 'txtAsunto' },
		msjContacto : 	{ id: 'txtMensaje' }
    };

    this.botones = {
        btnGrabar : { id: 'btnGrabar' }
    };

	this.divs = {
		msjObligatorio  	: 	{ id: 'divMsgDatoObligatorio' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		$("#txtContadorCaracteres").html("Caracteres restantes : "+ MAX_LENGHT_TEXTAREA);
    	$("#" + this.inputs.msjContacto.id).attr('maxlength', (MAX_LENGHT_TEXTAREA + 50));
		$("#" + this.divs.msjObligatorio.id).hide();
		$("#" + this.inputs.msjContacto.id).keyup(function(){
			refCls.onKeyupContadorCaracteres();
	   	});
        $("#" + this.botones.btnGrabar.id).click(function(){
            refCls.onClickBtnGrabar();
        });
		
		// this.validarForm(); // 20241210 degui: se comenta temporalmente

    };

	this.onClickBtnGrabar = function () {
		var isFormValido = $("#frmContactenos").valid();
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
			nomCli  	: 	$("#" + this.inputs.nomCli.id).val(),
			numCel  	: 	$("#" + this.inputs.numCel.id).val(),
			email  		: 	$("#" + this.inputs.email.id).val(),
			asunto  	: 	$("#" + this.inputs.asunto.id).val(),
			cuerpoMsj  	: 	$("#" + this.inputs.msjContacto.id).val()
		};
    };

	// 20240302 validar reclamo
	this.validarDatosBackend = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/publipages/consultar-publicador-paginas/validar-contacto',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log(">>> contacto-validarDatosBackend-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					refCls.grabarConctacto();
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

	// 20240412 registrar contacto
	this.grabarConctacto = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/publipages/registrar-publicador-paginas/registrar-contacto',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log(">>> contacto-grabarConctacto-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					refCls.limpiarForm();
					let msj = "Se ha enviado correctamente su mensaje, muy pronto nos pondrémos en contacto con usted.";
					MSG.showINF(msj);
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

	this.validarDatosFormEnd = function () {
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
		// validar mensaje de contacto
		var msjContacto =  $("#" + this.inputs.msjContacto.id).val().trim();
		if(msjContacto.length < 10){
			MSG.showERR("Ingrese un mensaje de contácto que sea mayor de 10 caracteres");
			return false;
		}
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.nomCli.id).val("");
		$("#" + this.inputs.numCel.id).val("");
		$("#" + this.inputs.email.id).val("");
		$("#" + this.inputs.asunto.id).val("");
		$("#" + this.inputs.msjContacto.id).val("");
		$("#txtContadorCaracteres").html("Caracteres restantes : "+ MAX_LENGHT_TEXTAREA);
	};

	this.onKeyupContadorCaracteres = function(){
		var strLength = $("#" + this.inputs.msjContacto.id).val().length
		var caracterRestante = (MAX_LENGHT_TEXTAREA - strLength);
		if(caracterRestante < 0){
			$("#txtContadorCaracteres").html('<span style="color: red;">Has excedido el limite de '+MAX_LENGHT_TEXTAREA+' caracteres</span>');
		}else{
			$("#txtContadorCaracteres").html("Caracteres restantes: " + caracterRestante);
		}
	};


	/*this.requeridoinputfunc = function(value, element, param) {
		if (value.trim() != "") {
			$("#" + param.id).removeClass("wpr-input-invalid");
			return true;
		} else {
			$("#" + param.id).addClass("wpr-input-invalid");
			return false; 
		}
	};*/
	
	//$.validator.addMethod("requeridoinput", this.requeridoinputfunc, " * Ingrese dato obligatorio");
	// 20241210 degui: se comenta temporalmente	
	/*this.validarForm = function(){
		$("#frmContactenos").validate({
			//Reglas de validacion
			rules: {
				txtEmail: 	{ email: true },
				txtMensaje: { requeridoinput: {id:"txtMensaje"}}
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
				'txtCel': { minlength: '* Por favor, ingrese almenos 9 digitos' },
				'txtEmail': { email: '* Por favor, ingrese un email valido' }
			}
	   });	
	};*/
	
}

var obj;
$(document).ready(function() {
	obj = new clsRegistrarContacto();
	obj.iniciarForm();
});
