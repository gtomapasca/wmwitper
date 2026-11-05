/************************************************************************/
// Funciones javascript - Formulario Crear Usuario
/************************************************************************/

var clsCrearCuentaUsuario = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

	this.forms = {
		formPrincipal  	: 	{ id: 'frmNewUser' }
    };

    this.inputs = {
        nick 		:	{ id: 'txtNick' },
        numCel 		: 	{ id: 'txtCel' },
        email  		: 	{ id: 'txtEmailU' },
		password  	: 	{ id: 'txtPasswordCU' }
    };

	this.divs = {
        registroUsuario		:	{ id: 'divRegUser' },
		msjResultado		:	{ id: 'divMjsResultadoFrmCrearUsuario' },
		msjObligatorio  	: 	{ id: 'divMsjObligatorioFrmCrearUsuario' }
    };

    this.botones = {
        btnGrabar : { id: 'btnGrabar' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		$("#" + this.divs.msjObligatorio.id).hide();
		$("#" + this.divs.msjResultado.id).hide();
        $("#" + this.botones.btnGrabar.id).click(function(){
            refCls.onClickBtnGrabar();
        });
		//this.validarForm();
    };

	this.getJsonDataForm = function(){
        return {
			nick  		: 	$("#" + this.inputs.nick.id).val(),
			numCel  	: 	$("#" + this.inputs.numCel.id).val(),
			email  		: 	$("#" + this.inputs.email.id).val(),
			password  	: 	$("#" + this.inputs.password.id).val()
		};
    };

	this.onClickBtnGrabar = function () {
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				// validar datos backend
				this.validarDatosBackend();
			}
		}
	};

	this.validarDatosBackend = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/cuenta/consultar-cuenta-usuario/validar-form-nuevo-usuario',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log("validarDatosBackend-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					refCls.grabarCuentaUsuario();
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

	this.grabarCuentaUsuario = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		$.ajax({
			type: "POST",
			url: '../../../../cli/app/store/cuenta/registrar-cuenta-usuario/registrar-nuevo-usuario',
			data: {'datos': JSON.stringify(jsonDataForm)},
	   		dataType: "json",
			success: function(response){
				//console.log("grabarCuentaUsuario-response: " + JSON.stringify(response));
				let tip = response.tip;
				let msj = response.msj;
				let val = response.val;
				if(val){
					$('#' + refCls.divs.registroUsuario.id).toggle('hide');
					$('#' + refCls.divs.msjResultado.id).toggle('slow');
					//MSG.showINF("Mensaje validaci&oacute;n: " + msj);
					MSG.showINF("¡Se ha creado su usuario con &eacute;xito! Gracias por registrarse.");
					refCls.limpiarForm();
				}else{
					if(tip == "A"){
						MSG.showINF("Mensaje validaci&oacute;n: " + msj);
					}else if(tip == "E"){
						MSG.showERR("Mensaje Error: " + msj);
					}
				}
			},
			error: function(errorThrown) {
				MSG.showERR("Error al grabar cuenta usuario: " + JSON.stringify(errorThrown));
			}
		});
	}

	this.validarDatosFormEnd = function () {
		let jsonDataForm = this.getJsonDataForm();
		// validar nickname
		if(jsonDataForm.nick.length < 1){
			MSG.showERR("Ingrese nick");
			return false;
		}
		// validar celular
		if(jsonDataForm.numCel.length < 1){
			MSG.showERR("Ingrese n&uacute;mero celular");
			return false;
		}
		// validar e-mail
		if (jsonDataForm.email.length < 1) {
			MSG.showERR("El correo electr&oacute;nico es obligatorio");
			return false;
		}	
		if (jsonDataForm.email != "" && !validarExpresion(jsonDataForm.email, regExpCorreo) ) {
			MSG.showERR("El correo electr&oacute;nico no es v&aacute;lido, verificar");
			return false;
		}
		// validar password
		if(jsonDataForm.password.length < 1){
			MSG.showERR("Ingrese password");
			return false;
		}
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.nick.id).val("");
		$("#" + this.inputs.numCel.id).val("");
		$("#" + this.inputs.email.id).val("");
		$("#" + this.inputs.password.id).val("");
	};
	
	this.requeridoinputfunc = function(value, element, param) {
		if (value.trim() != "") {
			$("#" + param.id).removeClass("wpr-input-invalid");
			return true;
		} else {
			$("#" + param.id).addClass("wpr-input-invalid");
			return false; 
		}
	};
	
	//$.validator.addMethod("requeridoinput", this.requeridoinputfunc, " * Ingrese dato obligatorio");
	// 20241210 degui: se comenta temporalmente	
	/*this.validarForm = function(){
		let refCls = this;
		$("#" + this.forms.formPrincipal.id).validate({
			//Reglas de validacion
			rules: {
				txtNick: 	{ requeridoinput: 	{id:"txtNick"} },
				txtEmailU: 	{ email: true },
				txtPasswordCU:{ requeridoinput: 	{id:"txtPasswordCU"} } 
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
			errorContainer: "#" + refCls.divs.msjObligatorio.id,
			showErrors: function(errorMap, errorList) {
				$('#' + refCls.divs.msjObligatorio.id).html("Todos los campos marcados con un asterisco (*) son obligatorios");
				this.defaultShowErrors();
			},
			//Mensajes de error
			messages: {
				'txtNick': { requeridoinput: '* Por favor, ingrese nick' },
				'txtEmailU': { email: '* Por favor, ingrese un email valido' },
				'txtPasswordCU': { requeridoinput: '* Por favor, ingrese password' }
			}
	   });	
	};*/
	
}

var obj;
$(document).ready(function() {
	obj = new clsCrearCuentaUsuario();
	obj.iniciarForm();
});
