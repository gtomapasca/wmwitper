/*
* 20240615 UTILS
*/

utils_iniciarSesion = function(jsonDataForm, callback){
    witper_iniciarSesion(jsonDataForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al iniciar sesion", 2);
            console.log(">>> utils_iniciarSesion-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};
