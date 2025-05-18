/************************************************************************/
// Funciones javascript - Formulario Login Usuario
/************************************************************************/

var clsLoginUsuario = function() {

	var regExpCorreo = new RegExp("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$");

    this.forms = {
		formPrincipal  	: 	{ id: 'frmLoginUser' }
    };

	this.inputs = {
        email  		: 	{ id: 'txtEmailLogin' },
		password  	: 	{ id: 'txtPasswordLogin' }
    };

    this.botones = {
        btnMostrarFrmLogin : { id: 'myBtnMenuUsuario' },
		btnIniciarSesion : { id: 'btnInLoginUser' }
    };

    this.iniciarForm = function(){
        var refCls = this;
		this.limpiarForm();
		$("#divMsgDatoObligatorio").hide();
		//$("#divResultado").hide();
        $("#" + this.botones.btnMostrarFrmLogin.id).click(function(){
            refCls.onClickBtnMostrarFrmLogin();
        });
		$("#" + this.botones.btnIniciarSesion.id).click(function(){
            refCls.onClickBtnIniciarSesion();
        });
		//this.validarForm();
    };

	this.getJsonDataForm = function(){
        return {
			email  		: 	$("#" + this.inputs.email.id).val(),
			password  	: 	$("#" + this.inputs.password.id).val()
		};
    };

	this.onClickBtnMostrarFrmLogin = function () {
		let usesion = sessionStorage.getItem("userSesion");
		//console.log(">>> btnLoginUser-usesion: " + usesion);
		if (usesion == null || usesion == undefined){
			$('#myContentMenuUsuario').toggle('slow');
		}else{
			document.getElementById("mySidenav").style.width = "250px";
		}
	};

	this.onClickBtnIniciarSesion = function () {
		let refCls = this;
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				refCls.iniciarSesion();
			}
		}
	};

	// 20240618 validar acceso usuario
	this.iniciarSesion = function () {
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		//console.log(">>> iniciarSesion-jsonDataForm: " + JSON.stringify(jsonDataForm));
		utils_iniciarSesion(jsonDataForm, function(datosDevuelto){
			//console.log("utils_iniciarSesion-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tip;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.val;
			if(val){
				let datos = datosDevuelto.datos[0];
				console.log(">>> iniciarSesion-datos: " + JSON.stringify(datos));
				document.getElementById("myContentMenuUsuario").style.display = "none";
				let usesion = null;
				sessionStorage.setItem("userSesion", JSON.stringify(datos));
				usesion = JSON.parse(sessionStorage.getItem("userSesion"));
				//$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
				$("#nameUser").html("<b>Hola!</b>");
				// 20240521 Degui: se agrega
				$("#mnulateral-avatar").attr("src", usesion.avatar);
				$("#mnulateral-usu").html("Hola " + usesion.nick);
				//openNav();
				document.getElementById("mySidenav").style.width = "250px";
				refCls.limpiarForm();
			}else{
				if(tip == "A"){
					mostrarMensaje(msj, 2);
					console.log(">>> utils_iniciarSesion-Advertencia: " + msj);
				}else if(tip == "E"){
					//mostrarMensaje("Hubo un error: " + msj);
					mostrarMensaje("Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo", 2);
					console.log(">>> utils_iniciarSesion-Error: " + msj);
				}else{
					mostrarMensaje("Disculpe, no se pudo realizar la &uacute;ltima operaci&oacute;n. Consulte con el webmaster. ", 2);
				}
			}
		});
	};

	this.validarDatosFormEnd = function () {
		// validar e-mail
		var email =  $("#" + this.inputs.email.id).val().trim();
		if (email.length < 1) {
			mostrarMensaje("El correo electr&oacute;nico es obligatorio", 2);
			return false;
		}	
		if (email != "" && !validarExpresion(email, regExpCorreo) ) {
			mostrarMensaje("El correo electr&oacute;nico no es v&aacute;lido, verificar", 2);
			return false;
		}
		// validar password
		var password =  $("#" + this.inputs.password.id).val().trim();
		if(password.length < 1){
			mostrarMensaje("Ingrese password", 2);
			return false;
		}
		return true;
	};

	this.limpiarForm = function (){
		$("#" + this.inputs.email.id).val("");
		$("#" + this.inputs.password.id).val("");
	};
	
	// 20241210 Degui: se comenta hasta solucinar error validate
	/*this.validarForm = function(){
		$("#" + this.forms.formPrincipal.id).validate({
			//Reglas de validacion
			rules: {
				txtEmailLogin: 	{ email: true }
				//txtPassword:{ requeridoinput: 	{id:"txtPassword"} } 
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
				$('#divMsgDatoObligatorio').html("* Obligatorio");
				this.defaultShowErrors();
			},
			//Mensajes de error
			messages: {
				'txtEmailLogin': { email: '* Por favor, ingrese un email valido' }
				//'txtPassword': { minlength: '* Por favor, ingrese almenos 6 digitos' }
			}
	   });	
	};*/
	
}

$(document).ready(function() {
	var obj = new clsLoginUsuario();
	obj.iniciarForm();
});
