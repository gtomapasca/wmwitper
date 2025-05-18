/*
* 20240615 UTILS
*/

utils_iniciarBusqueda = function(jsonDataForm, callback){
    witper_buscarProducto(jsonDataForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema en la b&uacute;squeda", 2);
            console.log(">>> utils_iniciarBusqueda-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};
