/*
* 20240714 UTILS
*/

utils_setSuscribirMail = function(jsonDataForm, callback){
    witper_setSuscribirMail(jsonDataForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al suscribir su e-mail", 2);
            console.log(">>> witper_setSuscribirMail-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};


