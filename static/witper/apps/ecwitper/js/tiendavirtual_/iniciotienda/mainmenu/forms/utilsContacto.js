/*
* 20240413 UTILS
*/

utils_valContactCli = function(idForm, callback){
    witper_valContactCli(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-valLibroReclamo: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> utils_valContactCli-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

utils_setContactCli = function(idForm, callback){
    witper_setContactCli(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> utils_setContactCli-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};


