var clsRegistrarComprobanteCompras = function() {
    this.inputs = {
        inpFechaIniBusq : { id: 'dpFecIniBusqComp' },
        inpFechaFinBusq : { id: 'dpFecFinBusqComp' },
        inpSerieFactura : { id: 'txtSerieFacturaBusq' },
        inpCorreFactura : { id: 'txtCorreFacturaBusq' },
        inpNumeroRuc    : { id: 'txtNumRucBusq' }
    };

    this.selects = {
        selCodEstado    : { id: 'cboCodEstadoBusq' }
    };

    this.botones = {
        btnLimpiarBusq : { id: 'btnLimpiarBusq' },
        btnAceptarBusq : { id: 'btnAceptarBusq' },
        btnCrearComprob: { id: 'btnCrearComprob' }
    };

    this.detalleCompra = undefined;
    this.cantDet = undefined;
    this.iniciarFormBusq = function(){
        var refCls = this;
        this.cargarRangoFechaBusqueda();
        $("#" + this.botones.btnLimpiarBusq.id).click(function(){
            refCls.onClickBtnLimpiarBusq();
        });
        $("#" + this.botones.btnAceptarBusq.id).click(function(){
            refCls.onClickBtnAceptarBusq();
        });
        $("#" + this.botones.btnCrearComprob.id).click(function(){
            refCls.onClickBtnCrearComprob();
        });
        /*
        //----------------------------------
        detalleCompra = [];
        cantDet = 0;
        $("#" + this.inputs.numDocumentoCli.id).keypress(function(e){
            refCls.onKeypressNumDocCli(e);
        });
        $("#" + this.inputs.codProducto.id).keypress(function(e){
            refCls.onKeypressCodProducto(e);
        });
        $("#" + this.inputs.montoPago.id).keypress(function(e){
            refCls.onKeypressMontoPago(e);
        });
        $("#" + this.inputs.cantidad.id).keypress(function(e){
            refCls.onKeypressCantidad(e);
        });
        $("#" + this.botones.btnAgregarProd.id).click(function(){
            refCls.onClickBtnAgregarProd();
        });
        $("#" + this.botones.btnContinuarGen.id).click(function(){
            refCls.onClickBtnContinuarGen();
        });
        //----------------------------------
        $("#" + this.botones.btnRegistrarEmitir.id).click(function(){
            refCls.onClickBtnRegistrarEmitir();
        });
        $("#" + this.botones.btnAceptarEmitir.id).click(function(){
            refCls.onClickBtnAceptarEmitir();
        });
        */
    };
    // ------------------------------------------------------------------------
    // 20220315 cargar rango fecha
    this.cargarRangoFechaBusqueda = function(){
        let fechaIni = util_obtenerFechaActualIniMes();
        let fechaFin = util_obtenerFechaActual();
        $("#" + this.inputs.inpFechaIniBusq.id).val(fechaIni);
        $("#" + this.inputs.inpFechaFinBusq.id).val(fechaFin);
        $("#" + this.inputs.inpFechaIniBusq.id).datepicker();
	    $("#" + this.inputs.inpFechaFinBusq.id).datepicker();
    };

    // ------------------------------------------------------------------------
    // 20230221 Limpiar Busqueda
    this.onClickBtnLimpiarBusq = function () {
        //limpiar controles
    };

    // 20230221 Generar Nuevo Comprobante
    this.onClickBtnCrearComprob = function () {
        $('#divBuscarComprobante').toggle('hide');
        //$('#divListarComprobantes').toggle('hide');
        $('#divGenerarComprobante').toggle('slow');
        //$('#divListarItemsCompras').toggle('slow');
        // iniciar formulario de compras
        this.iniciarFormRegComp();
    };
    
    // 20220701 validar opciones de búsqueda
    this.onClickBtnAceptarBusq = function(){
        if(this.isFiltroBusquedaOK()){
            let filtro = {};
            filtro["fecIniBusq"] = $("#" + this.inputs.inpFechaIniBusq.id).val();
            filtro["fecFinBusq"] = $("#" + this.inputs.inpFechaFinBusq.id).val();
            if($("#" + this.selects.selCodEstado.id).val() != '-1'){
                filtro["estado"] = $("#" + this.selects.selCodEstado.id).val();			
            }
            if($("#" + this.inputs.inpSerieFactura.id).val().trim() != ''){
                filtro["nro_serie"] = $("#" + this.inputs.inpSerieFactura.id).val();		
            }
            if($("#" + this.inputs.inpCorreFactura.id).val().trim() != ''){
                filtro["nro_correlativo"] = $("#" + this.inputs.inpCorreFactura.id).val();
            }
            if($("#" + this.inputs.inpNumeroRuc.id).val().trim() != ''){
                filtro["nro_ruc"] = $("#" + this.inputs.inpNumeroRuc.id).val();
            }
            console.log(">>> GTP-Comprobante-filtro: " + JSON.stringify(filtro));
            this.consultarComprobanteCompras(filtro);
        }
    };

    this.isFiltroBusquedaOK = function(){
        if($("#" + this.inputs.inpFechaIniBusq.id).val() == '' || $("#" + this.inputs.inpFechaFinBusq.id).val() == ''){
            mostrarMensaje("ingrese rango de fechas", 2);
            return false;			
        }
        
        let sComp = $("#" + this.inputs.inpSerieFactura.id).val().trim();
        let nComp = $("#" + this.inputs.inpCorreFactura.id).val().trim();
        if(sComp != '' || nComp != ''){
            if(sComp == ''){
                mostrarMensaje("ingrese serie de factura", 2);
                return false;			
            }else if(nComp == ''){
                mostrarMensaje("ingrese correlativo de factura", 2);
                return false;			
            }
        }
              
        let ruc = $("#" + this.inputs.inpNumeroRuc.id).val().trim();
        if(ruc != ''){
            if(ruc.length != 11){
                mostrarMensaje("no se ha ingresado corectamente los 11 digitos del RUC", 2);
                return false;			
            }
        }
        
        return true;
    };

    this.consultarComprobanteCompras = function(datos){
        let refCls = this;
        consultarComprobanteComprasByFiltro(datos, function(datosDevuelto){
            //console.log("response-consultarComprobanteVentas: " + JSON.stringify(datosDevuelto));
            let exito = datosDevuelto.encontrado;
            //let mensj = datosDevuelto.mensaje;
            let datos = datosDevuelto.datos;
            if(exito){
                if(datos != 0){
                    refCls.mostrarComprobanteCompras(datos);
                }else{
                    mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
                    refCls.mostrarComprobanteCompras("");
                }
            }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
        });
    };

    // 20230225 degui: mostrar datos de comprobantes compras
    this.mostrarComprobanteCompras = function(datos){
        let refCls = this;
        let n = 0;
        let html = "<h3>:: Resultado de la búsqueda</h3>";
        html += "<table border='1'>";
        html +=	  "<tr>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Item</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Fecha Emisión</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Nro Comprobante</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Nro Documento</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Nombre / Razón Social</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Estado</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Medio Pago</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Importe Total</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Opción</b></td>";
        html +=	  "</tr>";
        for(let item of datos){
            html += "<tr>";
            html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+(item.fecha_emision).substring(0, 10)+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+(item.nro_serie + '-' + item.nro_correlativo)+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.num_docume+"</td>";
            html += "<td style='padding:5px;'>"+(item.nom_cli).toUpperCase()+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+this.obtenerDescEstadoComprob(item.estado)+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+this.obtenerDescMedioPago(item.id_mediopago)+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.pago_total+"</td>";
            html += "<td style='padding:5px; text-align:center;'>";
            html += "	<a href='javascript:registrarComprobanteVenta.cargarVistaComprobanteVenta("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
            html += "</td>";
            html += "</tr>";
        }
        html += "</table><br />";
        $("#divListarComprobantes").html(html);

    };

    this.obtenerDescTipoComprob = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;	
        if (codigo == '01') { desc = "Cotización"; }
        if (codigo == '02') { desc = "Nota de Venta"; }
        if (codigo == '03') { desc = "Boleta"; }
        if (codigo == '04') { desc = "Factura"; }
        return desc;
    };
    this.obtenerDescTipoDocu = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '03') { desc = "DNI"; }
        if (codigo == '04') { desc = "RUC"; }
        return desc;
    };
    this.obtenerDescEstadoComprob = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '0') { desc = "Pendiente"; }
        if (codigo == '1') { desc = "Generado"; }
        if (codigo == '2') { desc = "Emitido"; }
        if (codigo == '3') { desc = "Anulado"; }
        return desc;
    };
    this.obtenerDescMedioPago = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '01') { desc = "Efectivo"; }
        if (codigo == '02') { desc = "Pago contra entrega"; }
        if (codigo == '03') { desc = "Pago con tarjeta"; }
        if (codigo == '04') { desc = "Transferencia Bancaria"; }
        if (codigo == '05') { desc = "Yape"; }
        if (codigo == '06') { desc = "Plin"; }
        if (codigo == '99') { desc = "Otros"; }
        return desc;
    };
    this.obtenerDescTipoMoneda = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '01') { desc = "Soles"; }
        if (codigo == '02') { desc = "Dolares"; }
        if (codigo == '03') { desc = "Euros"; }
        if (codigo == '99') { desc = "Otros"; }
        return desc;
    };
    this.obtenerDescEstEnvio = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '0') { desc = "Entrega tienda"; }
        if (codigo == '1') { desc = "Envío producto"; }
        return desc;
    };
    this.obtenerDescUnidadMedida = function(cod){	
        let desc = "";
        let codigo = cod != null ? cod : -1;
        if (codigo == '01') { desc = "Unidad"; }
        else if (codigo == '02') { desc = "Kilogramo"; }
        else if (codigo == '03') { desc = "Caja"; }
        else if (codigo == '04') { desc = "Paquete"; }
        else if (codigo == '05') { desc = "Balde"; }
        else if (codigo == '06') { desc = "Botella"; }
        else if (codigo == '07') { desc = "Centimetro lineal"; }
        else if (codigo == '08') { desc = "Litro"; }
        else if (codigo == '09') { desc = "Metro"; }
        else if (codigo == '10') { desc = "Piezas"; }
        return desc;
    };
    this.habilitarSerieNumComprobBusq = function(op){
        $('#txtSerieComprobBusq').val("");
        $('#txtNumComprobBusq').val("");
        // valores por defecto número documento
        $('#txtNumDocBusq').val("");
        $("#cboTipDocBusq").val("-1").change();
        $('#txtNumDocBusq').prop('disabled', true);
        if(op == "01" || op == "02"){ // Cotización o Nota de Venta
            $('#opSelSinDniBusq').prop('disabled', false);
            $('#opSelDniBusq').prop('disabled', false);
            $('#opSelRucBusq').prop('disabled', false);
        }else if(op == "03"){   // Boleta
            $('#opSelSinDniBusq').prop('disabled', false);
            $('#opSelDniBusq').prop('disabled', false);
            $('#opSelRucBusq').prop('disabled', true);
        }else if(op == "04"){   // Factura
            $('#opSelSinDniBusq').prop('disabled', true);
            $('#opSelDniBusq').prop('disabled', true);
            $('#opSelRucBusq').prop('disabled', false);
        }
    };
    this.habilitarNumDocBusq = function(op){
        $('#txtNumDocBusq').val("");
        if(op == '-1' || op == '01'){
            $('#txtNumDocBusq').prop('disabled', true);
        }else{
            $('#txtNumDocBusq').prop('disabled', false);
        }
    };

    this.cargarVistaComprobanteVenta = function(item){
        $('#divBuscarComprobante').toggle('hide');
        $('#divVistaComprobanteVenta').toggle('slow');
        if(item.cod_tipcom == '01'){
            $("#divTipoComprobanteVista").html("COTIZACIÓN");
        }else if(item.cod_tipcom == '02'){
            $("#divTipoComprobanteVista").html("NOTA DE VENTA");
        }else if(item.cod_tipcom == '03'){ 
            $("#divTipoComprobanteVista").html("BOLETA DE VENTA");
        }else if(item.cod_tipcom == '04'){
            $("#divTipoComprobanteVista").html("FACTURA");
        }
        let numeroComprobante = item.nro_serie + '-' + item.nro_correlativo;
        $("#divRucComprobanteVista").html("R.U.C. 20608326481");
        $("#divNumeroComprobanteVista").html(numeroComprobante);
        $("#txtNumDocCliVista").val(item.num_docume);
        $("#txtNombreCliVista").val((item.nom_cli).toUpperCase());
        $("#txtFechaEmisionVista").val((item.fecha_emision).substring(0, 10));
        $("#txtMedioPagoVista").val(this.obtenerDescMedioPago(item.cod_mediopago));
        $("#txtTipoMonedaVista").val(this.obtenerDescTipoMoneda(item.cod_tipomoneda));
        $("#txtPagoMontoVista").val(item.pago_monto);
        $("#txtPagoVueltoVista").val(item.pago_vuelto);
        $("#txtEstEnvioVista").val(this.obtenerDescEstEnvio(item.envio_codest));
        $("#txtCodUserVentVista").val(item.fk_idusuario);
        $("#txtCodEstComprobVista").val(this.obtenerDescEstadoComprob(item.estado));
        $("#txtObservacionVista").val(item.observacion_cambest);
        // cargar detalle venta
        let idVenta = item.id_venta;
        this.obtenerVistaDetalleVenta(idVenta);
    };

    this.obtenerVistaDetalleVenta = function(idVenta){
        let refCls = this;
        witper_obtenerDetalleVentaById(idVenta, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
            //console.log("response-obtenerVistaDetalleVenta: " + JSON.stringify(datosDevuelto));
            let exito = datosDevuelto.encontrado;
            //let mensj = datosDevuelto.mensaje;
            let datos = datosDevuelto.datos;
            if(exito){
                    if(datos != 0){
                        refCls.mostrarVistaDetalleVenta(datos);
                    }else{
                        mostrarMensaje("No se obtuvieron resultados de la última consulta", 2);
                    }
            }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema al obtener secuencia comprobante", 2);
            }
        });
    };

    // 20230322 degui: vista comprobante venta
    this.mostrarVistaDetalleVenta = function(datos){
        let total_importe   = 0;
        let total_importeIGV = 0;
        let total_importeSum = 0;
        let html = "";
        html += "<table border='1'>";
        html +=	  "<tr>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Código</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Cant.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Unidad</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Producto</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Valor Unit.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Desc.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Precio Unit</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>IGV (%)</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>IGV (Monto)</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Importe</b></td>";
        html +=	  "</tr>";
        for(let item of datos){
            html += "<tr>";
            html += "<td style='padding:5px; text-align:center;'>"+item.mini_codigo+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.cantidad+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+this.obtenerDescUnidadMedida(item.cod_umedida)+"</td>";
            html += "<td style='padding:5px;text-transform:lowercase;'>"+item.producto+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.valor_unit+"</td>";
            if(item.cod_desc == '000'){ // sin descuento
                html += "<td style='padding:5px; text-align:right;'></td>";
                html += "<td style='padding:5px; text-align:right;'>"+item.preciou+"</td>";
            }else if(item.cod_desc == '001'){ // con descuento
                html += "<td style='padding:5px; text-align:right;'>"+(item.preciou - item.precio_desc)+"</td>";
                html += "<td style='padding:5px; text-align:right;'>"+item.precio_desc+"</td>";
            }
            html += "<td style='padding:5px; text-align:right;'>"+item.igv+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.importe_igv+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.importe+"</td>";
            html += "</tr>";
            total_importe     += parseFloat(item.importe);
            total_importeIGV  += parseFloat(item.importe_igv);
            total_importeSum  += parseFloat(item.importe_total);
        }
        html += "<tr>";
        html += "   <td colspan='8' style='padding:5px; text-align:right;'>Sub Total</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importe.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='8' style='padding:5px; text-align:right;'>IGV</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importeIGV.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='8' style='padding:5px; text-align:right;'><b>Importe Total</b></td>";
        html += "   <td colspan='2' style='padding:5px;text-align:right;font-weight:bold;font-size:18px;'><b>S/. "+total_importeSum.toFixed(2)+"</b></td>";
        html += "</tr>";
        html += "</table><br />";
        $("#divVistaDetalleVenta").html(html);
    };

    // ------------------------------------------------------------------------
    // ------------------------------------------------------------------------
    // 20230615 Degui: Inicia registro de compras
    this.iniciarFormRegComp = function(){
        // setear fecha
        let fechaActual = util_obtenerFechaActual();
        $("#dpFecEmisionRegVta").val(fechaActual);
        $("#dpFecEmisionRegVta").datepicker();
        // setear datos
        let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
        let codUser = usesion[0].id_usuario;
        let nicUser = usesion[0].nick;
        let nomUser = codUser + ' - ' + nicUser;
        $("#txtUsuVentasReg").val(nomUser);

    };

    // 20230204 Consultar cliente
    this.onKeypressNumDocCli = function(e){
        if ( e.which == 13 ) {
            let tipDoc = $("#hdTipDocCli").val();
            let numDoc = $("#txtNumDocCli").val();
            // validar ingreso de datos
            if(numDoc.trim() == ''){
                mostrarMensaje("ingrese numero de documento", 2);
                return false;			
            }
            if(tipDoc == '03' && numDoc.length != 8){ //DNI
                mostrarMensaje("no se ha ingresado corectamente los 8 digitos del DNI", 2);
                return false;			
            }
            if(tipDoc == '04' && numDoc.length != 11){ //RUC
                mostrarMensaje("no se ha ingresado corectamente los 11 digitos del RUC", 2);
                return false;			
            }
            // consultar datos cliente
            consultarDatosCliente(tipDoc, numDoc, function(datosDevuelto){
                let exito = datosDevuelto.encontrado;
                let mensj = datosDevuelto.mensaje;
                let datos = datosDevuelto.datos;
                if(exito){
                    if(datos != 0){
                        $("#hdCodUsuCliReg").val(datos.id_ctapersona);
                        $("#hdNumDocCliReg").val(datos.doc_num);
                        $("#txtNombreCli").val(datos.nombres + ' ' + datos.ape_pat + ' ' + datos.ape_mat);
                    }else{
                        mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
                    }
                }else{
                    mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                }
            });
        }
    };

    this.onKeypressCodProducto = function(e){
        if ( e.which == 13 ) {
            if($("#txtCodProducto").val().trim() == ''){
                mostrarMensaje("ingrese código de producto", 2);
                return false;			
            }
            let codFiltro = $("#cboCodFiltroProd").val();
            let codProd = $("#txtCodProducto").val();
            //console.log(">>> GTPX-codFiltro: " + codFiltro);
            //console.log(">>> GTPX-codProd: " + codProd);
            this.obtenerDatosProducto(codFiltro, codProd);
         }
    };

    this.onKeypressCantidad = function(e){
        // code is the decimal ASCII representation of the pressed key.
        let code = (e.which) ? e.which : e.keyCode;
        console.log(">>> code: " + code);
        if(code==8) { // backspace.
            return true;
        } else if(code>=48 && code<=57) { // is a number.
            console.log(">>> 48 & 57");
            return true;
        } else{ // other keys.
            console.log(">>> else...");
            return false;
        }
    }
    
    this.obtenerDatosProducto = function(codFiltro, codProd){
        let refCls = this;
        witper_obtenerDatosProductoParaVenta(codFiltro, codProd, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
               //console.log("response-obtenerDatosProducto: " + JSON.stringify(datosDevuelto));
               let exito = datosDevuelto.encontrado;
               let mensj = datosDevuelto.mensaje;
               let datos = datosDevuelto.datos;
               if(exito){
                    if(datos != 0){
                        refCls.mostrarDatosProducto(datos);
                    }else{
                        mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
                    }
               }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
               }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
            }
        });
    };
    
    this.mostrarDatosProducto = function(datos){
        $("#txtPrecioProd").val(datos.precio_venta_internet);
        $("#txtDescProducto").val(datos.producto);
        $("#hdImgProdReg").val(datos.imagen_sm);
        $("#hdCodProdReg").val(datos.cod_producto);
        $("#hdMiniCodProdReg").val(datos.mini_codigo);
    };

    this.onClickBtnAgregarProd = function(){        
        let item = {};
        let montoIGV = 0;
        let valorUnit = 0;
        let importe = 0;
        if(this.validarProductoAgregar()){
            let precioUnitario = $("#txtPrecioProd").val();
            let precioConDescto = $("#txtPrecioDescuento").val();
            let cant = $("#txtCantidad").val();
            let igv = 18;
            item["codProd"]     = $("#hdCodProdReg").val();
            item["miniCodProd"] = $("#hdMiniCodProdReg").val();
            item["tipo"]        = $("#cboTipoReg").val();
            item["codUniMedida"] = $("#cboUnidadMedidaReg").val();
            item["codMoneda"]   = $("#cboTipoMoneda").val();
            item["descProd"]    = $("#txtDescProducto").val();  // descripcion producto
            item["imgProd"]     = $("#hdImgProdReg").val();
            item["precProd"]    = precioUnitario;
            item["cant"]        = cant;
            item["igv"]         = igv;
            // si se ingresa descuento
            if($("#idChkPrecDescuento").prop("checked")){
                item["codDescuento"] = '001';    // 001: con descuento
                item["precioDescto"] = precioConDescto;
                //montoIGV    = precioConDescto * (igv/100);
                //valorUnit   = precioConDescto - montoIGV;
                valorUnit   = precioConDescto / ((igv+100)*0.01);
                montoIGV    = valorUnit * (igv/100);
                item["valorUnit"]   = valorUnit.toFixed(2);
                item["montoIGV"]    = montoIGV.toFixed(2);
            }else{
                item["codDescuento"] = '000';    // 000: sin descuento
                item["precioDescto"] = '0';
                //montoIGV    = precioUnitario * (igv/100);
                //valorUnit   = precioUnitario - montoIGV;
                valorUnit   = precioUnitario / ((igv+100)*0.01);
                montoIGV    = valorUnit * (igv/100);
                item["valorUnit"]   = valorUnit.toFixed(2);
                item["montoIGV"]    = montoIGV.toFixed(2);
            }
            importe     = valorUnit * cant;
            importeIGV  = montoIGV * cant;
            importeTotal= importe + importeIGV;
            item["importe"]      = importe.toFixed(2);
            item["importeIGV"]   = importeIGV.toFixed(2);
            item["importeTotal"] = importeTotal.toFixed(2);
            //console.log(">>>GTPX-item: "+ JSON.stringify(item));
            detalleCompra[cantDet++] = item;
            //console.log(">>>GTPX-detalleVenta: "+ JSON.stringify(detalleVenta));
            this.cargarListaProductosVenta(detalleCompra);
            this.limpiarLuegoDeAgregarProducto();
        }    
    };

    this.validarProductoAgregar = function() {
        if($("#txtCodProducto").val().trim() == ''){
            mostrarMensaje("ingrese código de producto", 2);
            return false;			
        }
        if($("#txtDescProducto").val().trim() == ''){
            mostrarMensaje("no se ha ingresado la descripción de producto", 2);
            return false;			
        }
        if($("#txtPrecioProd").val().trim() == ''){
            mostrarMensaje("ingrese precio de producto", 2);
            return false;			
        }
        if($("#idChkPrecDescuento").prop("checked")){
            if($("#txtPrecioDescuento").val().trim() == ''){
                mostrarMensaje("ingrese precio de descuento", 2);
                return false;			
            }
        }
        if($("#txtCantidad").val().trim() != ''){
            let cant = parseInt($("#txtCantidad").val());
            if(cant <= 0){
                mostrarMensaje("ingrese un valor mayor a cero, en cantidad", 2);
                return false;
            }
        }else{
            mostrarMensaje("no se ha ingresado cantidad", 2);
            return false;
        }
        let miniCodProducto = $("#txtCodProducto").val();
        for(let item of detalleCompra){
            if(item.miniCodProd == miniCodProducto){
                mostrarMensaje("El producto con código: " + miniCodProducto + ", ya ha sido agregado en el detalle.", 2);
                return false;
            }
        }
        return true;
    }

    this.limpiarLuegoDeAgregarProducto = function() {
        // limpiar controles
        $("#cboUnidadMedidaReg").val("01").change();
        $("#txtCodProducto").val("");
        $("#txtDescProducto").val("");
        $("#txtPrecioProd").val("");
        $("#txtCantidad").val("1");
        $("#txtMontoPago").val("");
        $("#txtMontoVuelto").val("");
        if($("#idChkPrecDescuento").prop("checked")){
            $("#txtPrecioDescuento").val("");
            $('#txtPrecioDescuento').prop('disabled', true);
            $("#idChkPrecDescuento").prop("checked", false);
        }
    }

    // 20230221 Continuar Comprobante
    this.onClickBtnContinuarGen = function() {
        // cargar datos preliminar
        let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
        let codUsuVta = usesion[0].id_usuario;
        let codUsuCli = $("#hdCodUsuCliReg").val();
        let tipComp = $("#cboTipoComprobante").val();
        let fecEmis = $("#dpFecEmisionRegVta").val();
        let tipDocu = $("#hdTipDocCli").val();
        let docuCli = $("#txtNumDocCli").val();
        let nomCli  = $("#txtNombreCli").val();
        let tipMone = $("#cboTipoMoneda").val();
        let tipPago = $("#cboTipoPago").val();
        let pagoTotal = $("#txtMontoTotal").val();
        let pagoMonto = $("#txtMontoPago").val();
        let pagoVuelto = $("#txtMontoVuelto").val();
        let paraEnvio = '0';
        if($("#idChkEstadoEnvio").prop("checked")){
            paraEnvio = '1';
        }
        let obs = "";
        if($("#idChkObservacion").prop("checked")){
            obs = $("#txtObservacionReg").val();
        }

        if(nomCli == '' || pagoTotal == 0){
            mostrarMensaje("Complete correctamente los datos del comprobante de venta para continuar", 2);
            return false;
        }

        $("#hdCodUsuCliPre").val(codUsuCli);
        $("#hdCodUsuVtaPre").val(codUsuVta);
        $("#hdCodTipComprobPre").val(tipComp);
        $("#txtFechaEmiPre").val(fecEmis);
        $("#hdCodTipDocuPre").val(tipDocu);
        $("#txtNumDocCliPre").val(docuCli);
        $("#txtNombreCliPre").val(nomCli);
        $("#hdCodTipoMonedaPre").val(tipMone);
        $("#hdCodTipPagoPre").val(tipPago);
        $("#hdPagoTotalPre").val(pagoTotal);
        $("#hdPagoMontoPre").val(pagoMonto);
        $("#hdPagoVueltoPre").val(pagoVuelto);
        $("#hdVentaEnvioPre").val(paraEnvio);
        $("#hdObservacionPre").val(obs);
        this.cargarListaItemsPreliminar(detalleCompra);
        // Ocultar formularios pre
        $('#divGenerarComprobante').toggle('hide');
        $('#divListarItemsVenta').toggle('hide');
        $('#divPreComprobante').toggle('slow');
    };

    // 20230214 calcular vuelto
    this.onKeypressMontoPago = function(e){
        if ( e.which == 13 ) {
            if($("#txtMontoPago").val().trim() == ''){
                mostrarMensaje("ingrese monto de pago", 2);
                return false;			
            }
            let vuelto = $("#txtMontoPago").val() - $("#txtMontoTotal").val();
            $("#txtMontoVuelto").val(vuelto)
        }
    };

    // 20230203 degui: Activar controles
    this.activarDatosCliSinDNI = function(tipDoc){
        $('#txtNumDocCli').val("");
        $('#txtNombreCli').val("");
        $("#hdTipDocCli").val(tipDoc);
        if(tipDoc == "01"){ // SIN DNI
            $('#btnAgregarCli').prop('disabled', true);
            $('#txtNumDocCli').prop('disabled', true);
            $('#txtNombreCli').prop('disabled', false);
        }else{ 
            $('#btnAgregarCli').prop('disabled', false);
            $('#txtNumDocCli').prop('disabled', false);
            $('#txtNombreCli').prop('disabled', true);
        }
    };

    // 20230407 degui: validr tipo doc
    this.validarTipoDocu = function(op){
        this.activarDatosCliSinDNI('99');
        if(op == "01" || op == "02"){ // Cotización o Nota de Venta
            $('#cboTipDocCli').prop('disabled', false);
            $('#opSelRUC').prop('disabled', false);
            $("#cboTipDocCli").val("03").change();
            $("#hdTipDocCli").val("03");
        }else if(op == "03"){   // Boleta
            $('#cboTipDocCli').prop('disabled', false);
            $('#opSelRUC').prop('disabled', true);
            $("#cboTipDocCli").val("03").change();
            $("#hdTipDocCli").val("03");
        }else if(op == "04"){   // Factura
            $('#cboTipDocCli').prop('disabled', true);
            $("#cboTipDocCli").val("04").change();
            $("#hdTipDocCli").val("04");
        }
    };
    
    this.activarMontoPago = function(tipDoc){
        $('#txtMontoPago').val("");
        $('#txtMontoVuelto').val("");
        if(tipDoc == '01'){
            $('#txtMontoPago').prop('disabled', false);
            $('#divPagoMontoReg').toggle('slow');
            $('#divPagoVueltoReg').toggle('slow');
        }else{
            $('#txtMontoPago').prop('disabled', true);
            //$('#divPagoMontoReg').toggle('hide');
            //$('#divPagoVueltoReg').toggle('hide');
        }
    };
    
    this.activarPrecioDescuento = function(){
        if($("#idChkPrecDescuento").prop("checked")){ 
            $('#txtPrecioDescuento').prop('disabled', false);
        }else{
            $('#txtPrecioDescuento').val("");
            $('#txtPrecioDescuento').prop('disabled', true);
        }
    };
    
    this.activarObservacion = function(){
        if($("#idChkObservacion").prop("checked")){ 
            $('#txtObservacionReg').prop('disabled', false);
        }else{
            $('#txtObservacionReg').val("");
            $('#txtObservacionReg').prop('disabled', true);
        }
    };

    // 20230203 degui: mostrar productos venta
    this.cargarListaProductosVenta = function(datos){
        let n = 0;
        let total_importe   = 0;
        let total_importeIGV = 0;
        let total_importeSum = 0;
        let html = "";
        let uri_store = '../../../../static/witper/';
        html += "<table border='1'>";
        html +=	  "<tr>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Item</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Imagen</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Código</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Cant.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Unidad</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Producto</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Valor Unit.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Desc.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Precio Unit</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>IGV (%)</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>IGV (Monto)</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Importe</b></td>";
        html +=		"<td style='padding:5px; text-align:center;' colspan='2'><b>Opciones</b></td>";
        html +=	  "</tr>";
        for(let item of datos){
            html += "<tr>";
            html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
            //html += "<td><a href='javascript:cargarDatosParaModificarItem("+JSON.stringify(item)+")'><img style='padding:5px; text-align:center;width:100px;' src='"+(uri_store+item.imgProd)+"'/></a></td>";
            html += "<td><img style='padding:5px; text-align:center;width:100px;' src='"+(uri_store+item.imgProd)+"'/></td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.miniCodProd+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.cant+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+this.obtenerDescUnidadMedida(item.codUniMedida)+"</td>";
            html += "<td style='padding:5px;text-transform:lowercase;'>"+item.descProd+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.valorUnit+"</td>";
            if(item.codDescuento == '000'){ // sin descuento
                html += "<td style='padding:5px; text-align:right;'></td>";
                html += "<td style='padding:5px; text-align:right;'>"+item.precProd+"</td>";
            }else if(item.codDescuento == '001'){ // con descuento
                html += "<td style='padding:5px; text-align:right;'>"+(item.precProd - item.precioDescto).toFixed(2)+"</td>";
                html += "<td style='padding:5px; text-align:right;'>"+item.precioDescto+"</td>";
            }
            html += "<td style='padding:5px; text-align:right;'>"+item.igv+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.importeIGV+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.importe+"</td>";
            html += "<td style='padding:5px; text-align:center;'>";
            //html += "<a href='javascript:cargarDatosParaModificarItem("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
            html += "<i class='glyphicon glyphicon-Edit'></i>";
            html += "</td>";
            html += "<td style='padding:5px; text-align:center;'>";
            html += "</td>";
            html += "</tr>";
            total_importe     += parseFloat(item.importe);
            total_importeIGV  += parseFloat(item.importeIGV);
            total_importeSum  += parseFloat(item.importeTotal);
        }
        html += "<tr>";
        html += "   <td colspan='10' style='padding:5px; text-align:right;'>Sub Total</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importe.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='10' style='padding:5px; text-align:right;'>IGV</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importeIGV.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='10' style='padding:5px; text-align:right;'><b>Importe Total</b></td>";
        html += "   <td colspan='2' style='padding:5px;text-align:right;font-weight:bold;font-size:18px;'><b>S/. "+total_importeSum.toFixed(2)+"</b></td>";
        html += "</tr>";
        html += "</table><br />";
        $("#divListarItemsVenta").html(html);
        $("#txtMontoTotal").val(total_importeSum.toFixed(2));
    };

    //------------------------------------------------------------------------
    // 20230227 REGISTRAR COMPROBANTE 
    this.onClickBtnRegistrarEmitir = function(){
        // obtener correlativo de comprobante ***(se debe mejorar la consulta del correlativo incluyendo la serie, ejemp B001)
        let tipComprob = $("#hdCodTipComprobPre").val();
        //let correlativo = obtenerCorrelativoComprobanteVenta(tipComprob);
        this.obtenerCorrelativoComprobanteVenta(tipComprob);
    };

    // 20230315 GTP; obtener la secuencia de la numeración del comprobante de venta (wip_venta.nro_correlativo)
    this.obtenerCorrelativoComprobanteVenta = function(tipComprob){
        let refCls = this;
        witper_obtenerCorrelativoComprobanteVenta(tipComprob, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
            //console.log("response-obtenerCorrelativoComprobanteVenta: " + JSON.stringify(datosDevuelto));
            let exito = datosDevuelto.encontrado;
            let mensj = datosDevuelto.mensaje;
            let datos = datosDevuelto.datos;
            if(exito){
                    if(datos != 0){
                        refCls.armarDataVenta(datos.nro_correlativo);
                    }else{
                        refCls.armarDataVenta('0');
                        //mostrarMensaje("No se obtuvieron resultados de la última consulta", 2);
                    }
            }else{
                    mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema al obtener secuencia comprobante", 2);
            }
        });
    };

    this.armarDataVenta = function(secComprob){

        let tComp = $("#hdCodTipComprobPre").val();
        let lSerie = '';
        if(tComp == '01'){ // Cotización
            lSerie = 'C';
        }else if(tComp == '02'){ // Nota de venta
            lSerie = 'N';
        }else if(tComp == '03'){ // Boleta
            lSerie = 'B';
        }else if(tComp == '04'){ // Factura
            lSerie = 'F';
        }
        //console.log(">>> GTPX-lSerie: " + lSerie);
        //console.log(">>> GTPX-secComprob: " + secComprob);
        let tipDocu = $("#hdCodTipDocuPre").val();
        // cargar datos 
        let dataVenta = {};
        dataVenta["nroSerieVenta"] 	= lSerie + "001";	// 20230331 GTP: queda pendiente la secuencia automática.
        dataVenta["nroCorreVenta"] 	= this.agregarCerosAlaIzq(parseInt(secComprob) + 1);
        dataVenta["rucNegocio"] 	= "20608326481";
        dataVenta["codTipComprob"] 	= $("#hdCodTipComprobPre").val();
        dataVenta["fechaEmision"] 	= $("#txtFechaEmiPre").val();
        dataVenta["codTipDocu"] 	= $("#hdCodTipDocuPre").val();
        dataVenta["desNumDocu"] 	= $("#txtNumDocCliPre").val();
        dataVenta["nombreCli"] 		= $("#txtNombreCliPre").val();
        dataVenta["codTipMoneda"] 	= $("#hdCodTipoMonedaPre").val();
        dataVenta["codTipPago"] 	= $("#hdCodTipPagoPre").val();
        dataVenta["pagoTotal"] 		= $("#hdPagoTotalPre").val();
        dataVenta["pagoMonto"] 		= $("#hdPagoMontoPre").val();
        dataVenta["pagoVuelto"] 	= $("#hdPagoVueltoPre").val();
        dataVenta["ventaEnvio"] 	= $("#hdVentaEnvioPre").val();
        dataVenta["correUsuVent"] 	= $("#hdCodUsuVtaPre").val();
        dataVenta["CodEstado"] 		= "1";	// 1: Generado (registrado)
        dataVenta["observacion"] 	= $("#hdObservacionPre").val();
        
        //console.log("GTPX-dataVenta: " + JSON.stringify(dataVenta));
        //console.log("GTPX-detalleVenta: " + JSON.stringify(detalleVenta));
        this.registrarComprobanteVenta(detalleCompra);
    };

    this.agregarCerosAlaIzq = function(num){
        if(num < 10){
            return "00" + num;
        }else if(num < 100){
            return "0" + num;
        }else if(num < 1000){
            return num;
        }else{
            mostrarMensaje("Ha superado el máximo de numeración: " + num + ", incremente el número de la serie y reinicie el número", 2);
        }
    };

    this.registrarComprobanteVenta = function(dataVenta){
        let refCls = this;
        witper_registrarComprobanteVenta(dataVenta, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
                //console.log("response-registrarComprobanteVenta: " + JSON.stringify(datosDevuelto));
                let exito = datosDevuelto.encontrado;
                //let mensj = datosDevuelto.mensaje;
                //let datos = datosDevuelto.datos;
            if(exito){
                    //generarDetalleVenta(datos);
                    let serieComprob = dataVenta["nroSerieVenta"];
                    let nroComprob 	 = dataVenta["nroCorreVenta"];
                    refCls.obtenerIdComprobanteVenta(serieComprob, nroComprob);
            }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema al registrar venta", 2);
            }
        });
    };


    // 20230315 GTP: Obtener el id o pk del comprobante de venta (wip_venta.id_venta)
    this.obtenerIdComprobanteVenta = function(serieComprob, nroComprob){
        let refCls = this;
        witper_obtenerIdComprobanteVenta(serieComprob, nroComprob, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
            //console.log("response-obtenerIdComprobanteVenta: " + JSON.stringify(datosDevuelto));
            let exito = datosDevuelto.encontrado;
            let mensj = datosDevuelto.mensaje;
            let datos = datosDevuelto.datos;
            if(exito){
                    if(datos != 0){
                        refCls.armarDetalleVenta(datos.id_venta);
                    }else{
                        mostrarMensaje("No se obtuvieron resultados de la última consulta", 2);
                    }
            }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema al obtener secuencia comprobante", 2);
            }
        });
    };

    this.armarDetalleVenta = function(id){
        let detVenta = detalleCompra;
        for(let item of detVenta){
            item["correVenta"] = id;
            this.registrarDetalleVenta(item);
        }
        mostrarMensaje("Se registro correctamente el comprobante de venta ", 1);
        $('#divPreComprobante').toggle('hide');
        $('#divBuscarComprobante').toggle('slow');
        $('#divListarComprobantes').toggle('slow');
        // Limpiar formulario Generar y Preliminar

    };

    this.registrarDetalleVenta = function(datos){
        let refCls = this;
        //console.log("registrarDetalleVenta-datos: " + JSON.stringify(datos));
        witper_registrarDetalleVenta(datos, function(errorLanzado, datosDevuelto){
            if(errorLanzado == null){
            //console.log("response-registrarDetalleVenta: " + JSON.stringify(datosDevuelto));
            let exito = datosDevuelto.encontrado;
            let mensj = datosDevuelto.mensaje;
            //let datos = datosDevuelto.datos;
            if(exito){
                    //mostrarMensaje("Se registro venta correctamente", 1);
            }else{
                mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
            }
            }else{
                mostrarMensaje("Disculpe, existi&oacute; un problema al registrar detalle venta", 2);
            }
        });
    };

    // 20230223 degui: mostrar detalle venta preliminar
    this.cargarListaItemsPreliminar = function(datos){
        //let n = 0;
        let total_importe   = 0;
        let total_importeIGV = 0;
        let total_importeSum = 0;
        let html = "";
        html += "<table border='1'>";
        html +=	  "<tr>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Código</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Unidad</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Producto</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Precio Unit.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Cant.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Importe</b></td>";
        html +=	  "</tr>";
        for(let item of datos){
            html += "<tr>";
            html += "<td style='padding:5px; text-align:center;'>"+item.miniCodProd+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+this.obtenerDescUnidadMedida(item.codUniMedida)+"</td>";
            html += "<td style='padding:5px;text-transform:lowercase;'>"+item.descProd+"</td>";
            if(item.codDescuento == '000'){ // sin descuento
                html += "<td style='padding:5px; text-align:right;'>"+item.precProd+"</td>";
            }else if(item.codDescuento == '001'){ // con descuento
                html += "<td style='padding:5px; text-align:right;'>"+item.precioDescto+"</td>";
            }
            html += "<td style='padding:5px; text-align:center;'>"+item.cant+"</td>";
            html += "<td style='padding:5px; text-align:right;'>"+item.importeTotal+"</td>";
            html += "</tr>";
            total_importe     += parseFloat(item.importe);
            total_importeIGV  += parseFloat(item.importeIGV);
            total_importeSum  += parseFloat(item.importeTotal);
        }
        //html += "<tr><td colspan='4' style='padding:5px; text-align:center;'><b>TOTAL A PAGAR</b></td><td colspan='2' style='padding:5px; text-align:right;'><b>S/. "+total_importeSum.toFixed(2)+"</b></td></tr>";
        html += "<tr>";
        html += "   <td colspan='4' style='padding:5px; text-align:right;'>Sub Total</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importe.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='4' style='padding:5px; text-align:right;'>IGV</td>";
        html += "   <td colspan='2' style='padding:5px; text-align:right;'>S/ "+total_importeIGV.toFixed(2)+"</td>";
        html += "</tr>";
        html += "<tr>";
        html += "   <td colspan='4' style='padding:5px; text-align:right;'><b>Importe Total</b></td>";
        html += "   <td colspan='2' style='padding:5px;text-align:right;font-weight:bold;font-size:18px;'><b>S/. "+total_importeSum.toFixed(2)+"</b></td>";
        html += "</tr>";
        html += "</table><br />";
        $("#divListarDetalleVentaPreliminar").html(html);
    };

    // 20230221 Emitir Comprobante
    this.onClickBtnAceptarEmitir = function(){
        $('#divPreComprobante').toggle('hide');
        $('#divComprobanteEmitido').toggle('slow');
        // cargar datos emitidos
        let nombCli = $("#txtNombreCliPre").val();
        let docuCli = $("#txtNumDocCliPre").val();
        $("#txtNombreCliEmi").val(nombCli);
        $("#txtNumDocCliEmi").val(docuCli);
        this.cargarListaItemsEmitida(detalleCompra);
    };

    // 20230223 degui: mostrar detalle venta emitida
    this.cargarListaItemsEmitida = function(datos){
        let total = 0;
        let html = "";
        html += "<table border='1'>";
        html +=	  "<tr>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Código</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Descripción de Producto</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Precio Venta</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Cant.</b></td>";
        html +=		"<td style='padding:5px; text-align:center;'><b>Subtotal</b></td>";
        html +=	  "</tr>";
        for(let item of datos){
            html += "<tr>";
            html += "<td style='padding:5px; text-align:center;'>"+item.miniCodProd+"</td>";
            html += "<td style='padding:5px;text-transform:lowercase;'>"+item.descProd+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.precProd+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.cant+"</td>";
            html += "<td style='padding:5px; text-align:center;'>"+item.importe+"</td>";
            html += "</tr>";
            total += item.importe;
        }
        html += "<tr><td colspan='4' style='padding:5px; text-align:center;'><b>TOTAL A PAGAR</b></td><td style='padding:5px; text-align:center;'><b>S/. "+total+"</b></tr>";
        html += "</table><br />";
        $("#divListarDetalleVentaEmitida").html(html);
    };



}