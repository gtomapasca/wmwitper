/************************************************************************/
// Funciones javascript - Formulario Contacto
/************************************************************************/

var clsSuscribirMail = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

	this.forms = {
		formPrincipal  	: 	{ id: 'frmSuscribirMail' }
    };

    this.inputs = {
        //nomCli :	{ id: 'txtNombre' },
        //numCel : 	{ id: 'txtCel' },
        email  : 	{ id: 'txtEmail' }
    };

    this.botones = {
        btnGrabar : { id: 'btnGrabar' }
    };

    this.iniciarForm = function(){
		//console.log(">>> GTP-Suscribirmail...");
        var refCls = this;
		//$("#divMsgDatoObligatorio").hide();
		//$("#divResultado").hide();
        $("#" + this.botones.btnGrabar.id).click(function(){
            refCls.onClickBtnGrabar();
        });

		//this.validarForm(); 
    };

	this.getJsonDataForm = function(){
        return {
			email  		: 	$("#" + this.inputs.email.id).val()
			//password  	: 	$("#" + this.inputs.password.id).val()
		};
    };

	this.onClickBtnGrabar = function () {
		//var isFormValido = $("#frmSuscribirMail").valid();
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				refCls.grabarSuscripcionMail();
			}
		}
	};

	// 20240412 registrar contacto
	this.grabarSuscripcionMail = function () {
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		utils_setSuscribirMail(jsonDataForm, function(datosDevuelto){
			console.log("grabarSuscripcionMail-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tipo;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.exito;
			if(val){
				refCls.limpiarForm();
				mostrarMensaje("Se ha suscrito correctamente.", 0);
			}else{
				if(tip == "A"){
					mostrarMensaje("Mensaje validaci&oacute;n: " + msj, 2);
					console.log(">>> grabarSuscripcionMail-Validar: " + msj);
				}else if(tip == "E"){
					mostrarMensaje("Mensaje Error: " + msj, 2);
					console.log(">>> grabarSuscripcionMail-Error: " + msj);
				}
			}
		});
	};

	this.validarDatosFormEnd = function () {
		// validar e-mail
		var email =  $("#" + this.inputs.email.id).val().trim();
		if (email == "") {
			mostrarMensaje("Ingrese un correo electr&oacute;nico", 2);
			return false;
		}	
		if (email != "" && !validarExpresion(email, regExpCorreo) ) {
			mostrarMensaje("El correo electr&oacute;nico no es v&aacute;lido, verificar", 2);
			return false;
		}
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.email.id).val("");
	};
	
}

var regSuscribirMail;
$(document).ready(function() {
	regSuscribirMail = new clsSuscribirMail();
	regSuscribirMail.iniciarForm();
});
