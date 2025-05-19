/*
* 20240413 UTILS
*/

utils_valSuscribir = function(idForm, callback){
    witper_valSuscribir(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-valLibroReclamo: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> witper_valSuscribir-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

utils_setSuscribir = function(idForm, callback){
    witper_setSuscribir(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> witper_setSuscribir-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};


