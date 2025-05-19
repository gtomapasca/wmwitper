/************************************************************************/
// Funciones java script - jquery de uso general
/************************************************************************/
$('#btnRegUsuario').click(function() {
	let email = $("#txtEmailU").val();
	//console.log("usuario: " + email);
	if(email.trim().length > 5){
		crearUsuario();
		return false;
	}
	else{
		mostrarMensaje("Para crear un usuario, debe ingresar correctamente sus datos", 0);
		return false
	}
});

// 20210303 crear usuario
function crearUsuario(){
    witper_createUser("#frmNewUser", function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("response: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   if(exito){
			$('#divRegUser').toggle('hide');
			$('#divMsjUser').toggle('slow');
			mostrarMensaje("Gracias por registrarse.", 0);
	   }else{
			let msjErr = datosDevuelto.mensaje;
			let codErr = datosDevuelto.codeErr;
			mostrarMensaje("Disculpe, no se pudo realizar la última operación. Consulte con el webmaster. ");
			//console.log(">>> Log Error: "+ codErr +", "+ msjErr, 2);
	   }
	}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al crear usuario", 2);
	}
    });
}
//------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------