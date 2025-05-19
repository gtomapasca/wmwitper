/*
* 20240305 UTILS
*/

utils_valLibroReclamo = function(idForm, callback){
    witper_valLibroReclamo(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-valLibroReclamo: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> utils_valLibroReclamo-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

utils_setLibroReclamo = function(idForm, callback){
    witper_setLibroReclamo(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> utils_setLibroReclamo-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

utils_enviarAvisoReclamo = function(numAvisoAsoc){
    witper_enviarAvisoReclamo(numAvisoAsoc);
};
