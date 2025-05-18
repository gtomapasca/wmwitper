// 20230405 Degui: Utilitarios para generar ventas
consultarDatosCliente = function(tipDoc, numDoc, callback){
    witper_obtenerDatosClienteParaVenta(tipDoc, numDoc, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-obtenerDatosCliente: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema al consultar datos del cliente", 2);
        }
    });
};

registrarNuevoClienteVta = function(idForm, callback){
    witper_registrarNuevoClienteParaVenta(idForm, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-registrarNuevoCliente: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
        }
    });
};

// 20230615 Degui: Consultar comprobante compras
consultarComprobanteComprasByFiltro = function(datos, callback){
    witper_consultarComprobanteCompras(datos, function(errorLanzado, datosDevuelto){
        if(errorLanzado == null){
           //console.log("response-consultarComprobanteComprasByFiltro: " + JSON.stringify(datosDevuelto));
           callback(datosDevuelto);
        }else{
            mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
        }
    });
};




