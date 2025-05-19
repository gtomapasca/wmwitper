/*
* 20240615 UTILS
*/

utils_valCrearUsuario = function(jsonDataForm, callback){
    witper_valCrearUsuario(jsonDataForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-valLibroReclamo: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al validar usuario", 2);
            console.log(">>> utils_valCrearUsuario-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

utils_setCrearUsuario = function(jsonDataForm, callback){
    witper_setCrearUsuario(jsonDataForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al crear usuario", 2);
            console.log(">>> utils_setCrearUsuario-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};


