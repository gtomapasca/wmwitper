/*
* 20240714 UTILS
*/

utils_setSuscribirMail = function(idForm, callback){
    witper_setSuscribirMail(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            console.log(">>> witper_setSuscribirMail-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};


