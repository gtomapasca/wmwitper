// 20230405 GTP: Utilitarios para generar ventas
consultarDatosCliente = function(tipDoc, numDoc, callback){
    witper_obtenerDatosClienteParaVenta(tipDoc, numDoc, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-obtenerDatosCliente: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al consultar datos del cliente", 2);
            console.log(">>> vta-obtenerDatosCliente-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};

registrarNuevoClienteVta = function(idForm, callback){
    witper_registrarNuevoClienteParaVenta(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-registrarNuevoCliente: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al registrar nuevo cliente", 2);
            console.log(">>> vta-registrarNuevoClienteParaVenta-errorLanzado: " + JSON.stringify(errorLanzado));
        }
    });
};



