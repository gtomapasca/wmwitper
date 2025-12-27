/************************************************************************/
// Funciones javascript - Formulario Contacto
/************************************************************************/

var clsSuscribirMail = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

	this.forms = {
		formPrincipal  	: 	{ id: 'frmSuscribirMail' }
    };

    this.inputs = {
        email  : 	{ id: 'txtEmail' }
    };

    this.botones = {
        btnGrabar : { id: 'btnGrabar' }
    };

    this.iniciarForm = function(){
        let refCls = this;
        $("#" + this.botones.btnGrabar.id).click(function(){
            refCls.onClickBtnGrabar();
        });
    };

	this.getJsonDataForm = function(){
        return {
			email  		: 	$("#" + this.inputs.email.id).val()
		};
    };

	this.onClickBtnGrabar = function () {
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		let refCls = this;
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
			//console.log("grabarSuscripcionMail-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tip;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.val;
			if(val){
				refCls.limpiarForm();
				mostrarMensaje("Gracias por suscribirse. Se ha suscrito correctamente.", 0);
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
