/************************************************************************/
// Funciones javascript - Formulario Crear Usuario
/************************************************************************/

var clsRegistrarUsuario = function() {

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

	// 20240302 validar reclamo
	this.validarDatosBackend = function(){
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		utils_valCrearUsuario(jsonDataForm, function(datosDevuelto){
			console.log("utils_valCrearUsuario-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tip;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.val;
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
		let jsonDataForm = this.getJsonDataForm();
		utils_setCrearUsuario(jsonDataForm, function(datosDevuelto){
			console.log("utils_setCrearUsuario-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tip;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.val;
			if(val){
				$('#' + refCls.divs.registroUsuario.id).toggle('hide');
				$('#' + refCls.divs.msjResultado.id).toggle('slow');
				mostrarMensaje("¡Se ha creado su usuario con &eacute;xito! Gracias por registrarse.", 0);
				refCls.limpiarForm();
			}else{
				if(tip == "A"){
					mostrarMensaje("Advertencia: " + msj, 2);
					console.log(">>> utils_setCrearUsuario-Advertencia: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Hubo un error: " + msj);
					console.log(">>> utils_setCrearUsuario-Error: " + msj);
				}else{
					mostrarMensaje("Disculpe, no se pudo realizar la &uacute;ltima operaci&oacute;n. Consulte con el webmaster. ", 2);
				}
			}
		});
	};

	this.validarDatosFormEnd = function () {
		let jsonDataForm = this.getJsonDataForm();
		// validar nickname
		//var nick =  $("#" + this.inputs.nick.id).val().trim();
		if(jsonDataForm.nick.length < 1){
			mostrarMensaje("Ingrese nick", 2);
			//$("#" + this.inputs.nick.id).focus();
			return false;
		}
		// validar celular
		//var numCelular =  $("#" + this.inputs.numCel.id).val().trim();
		if(jsonDataForm.numCel.length < 1){
			mostrarMensaje("Ingrese n&uacute;mero celular", 2);
			//$("#" + this.inputs.numCel.id).focus();
			return false;
		}
		// validar e-mail
		//var email =  $("#" + this.inputs.email.id).val().trim();
		if (jsonDataForm.email.length < 1) {
			mostrarMensaje("El correo electr&oacute;nico es obligatorio", 2);
			return false;
		}	
		if (jsonDataForm.email != "" && !validarExpresion(jsonDataForm.email, regExpCorreo) ) {
			mostrarMensaje("El correo electr&oacute;nico no es v&aacute;lido, verificar", 2);
			return false;
		}
		// validar password
		//var password =  $("#" + this.inputs.password.id).val().trim();
		if(jsonDataForm.password.length < 1){
			mostrarMensaje("Ingrese password", 2);
			//$("#" + this.inputs.password.id).focus();
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

$(document).ready(function() {
	var obj = new clsRegistrarUsuario();
	obj.iniciarForm();
});
