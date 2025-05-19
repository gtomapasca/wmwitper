var clsAgregarNuevoClienteVentas = function() {
    this.inputs = {
        numDocumento : { id: 'numDocu' }
    };

    this.botones = {
        agregarCliente  : { id: 'btnAgregarCliente' },
        buscarCliRegVta : { id: 'btnBuscarCliRegVta' },
        nuevoCliRegVta  : { id: 'btnNuevoCliRegVta' },
        grabarCliRegVta : { id: 'btnGrabarCliRegVta' },
        cancelarRegVta  : { id: 'btnCancelarRegVta' }
    };

    this.iniciarForm = function(){
        var refCls = this;
        $("#" + this.botones.agregarCliente.id).click(function(){
            $('#divModelRegistrarCliente').modal('show');
            refCls.onClickBtnCargarFrmCliente();
        });
        $("#" + this.botones.buscarCliRegVta.id).click(function(){
            refCls.onClickBtnBuscarCliRegVta();
        });
        $("#" + this.botones.nuevoCliRegVta.id).click(function(){
            refCls.onClickBtnNuevoCliRegVta();
        });
        $("#" + this.botones.grabarCliRegVta.id).click(function(){
            refCls.onClickBtnGrabarCliRegVta();
        });
        $("#" + this.botones.cancelarRegVta.id).click(function(){
            $('#divModelRegistrarCliente').modal('hide');
        });

    };

    // --------------------------------------------------

    // Cargar formulario cliente
    this.onClickBtnCargarFrmCliente = function(){
        // trasladar datos
        //let tipDocu = $("#hdTipDocCli").val();
        if($("#hdTipDocCli").val() == '03'){ // DNI
            $("#cboModalTipDocCli").val('03').change();
        }else if($("#hdTipDocCli").val() == '04'){ // RUC
            $("#cboModalTipDocCli").val('04').change();
        }
        if($("#txtNumDocCli").val() != ''){
            let numDocu = $("#txtNumDocCli").val();
            $("#txtModalNumDocCli").val(numDocu);
        }
    }
    
    // Buscar Cliente
    this.onClickBtnBuscarCliRegVta = function(){
        this.habilitarCamposNuevoCli(false, true);
        let tipDoc = $("#cboModalTipDocCli").val();
        let numDoc = $("#txtModalNumDocCli").val();
        if(this.valDocuCliente(tipDoc, numDoc)){
            consultarDatosCliente(tipDoc, numDoc, function(datosDevuelto){
                let exito = datosDevuelto.encontrado;
                let mensj = datosDevuelto.mensaje;
                let datos = datosDevuelto.datos;
                if(exito){
                    if(datos != 0){
                        $("#txtModalNombreCli").val(datos.nombres);
                        $("#txtModalApePatCli").val(datos.ape_pat);
                        $("#txtModalApeMatCli").val(datos.ape_mat);
                        $("#txtModalCelCli").val(datos.celular);
                        $("#txtModalMailCli").val(datos.email);
                    }else{
                        mostrarMensaje("No se obtuvieron resultados de la última búsqueda", 2);
                    }
                }else{
                    mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                }
            });
        }
    };

    // Nuevo Cliente
    this.onClickBtnNuevoCliRegVta = function(){
        var refCls = this;
        let tipDoc = $("#cboModalTipDocCli").val();
        let numDoc = $("#txtModalNumDocCli").val();
        if(this.valDocuCliente(tipDoc, numDoc)){
            consultarDatosCliente(tipDoc, numDoc, function(datosDevuelto){
                let exito = datosDevuelto.encontrado;
                let mensj = datosDevuelto.mensaje;
                let datos = datosDevuelto.datos;
                if(exito){
                    if(datos != 0){
                        refCls.habilitarCamposNuevoCli(false, true);
                        $("#txtModalNombreCli").val(datos.nombres);
                        $("#txtModalApePatCli").val(datos.ape_pat);
                        $("#txtModalApeMatCli").val(datos.ape_mat);
                        $("#txtModalCelCli").val(datos.celular);
                        $("#txtModalMailCli").val(datos.email);
                        mostrarMensaje("el documento ya se encuentra registrado", 2);
                    }else{
                        refCls.habilitarCamposNuevoCli(true, false);
                        $('#btnGrabarCliRegVta').prop('disabled', false);
                    }    
                }else{
                    mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                }   
            });
        }
    };

    // Grabar Cliente
    this.onClickBtnGrabarCliRegVta = function(){
        if(this.valCamposObligatorio()){
            let tipDoc = $("#cboModalTipDocCli").val();
            let numDoc = $("#txtModalNumDocCli").val();
            let nomCli = $('#txtModalNombreCli').val();
            let apePat = $('#txtModalApePatCli').val();
            let apeMat = $('#txtModalApeMatCli').val();
            $("#hdModalTipDocCli").val(tipDoc);
            $("#hdModalNumDocCli").val(numDoc);
            //console.log("GTPX-> registrarNuevoCli tipDoc: " + $("#hdModalTipDocCli").val() + ", numDoc: " + $("#hdModalNumDocCli").val());
            registrarNuevoClienteVta("#formRegNuevoCliVta", function(datosDevuelto){
                let exito = datosDevuelto.encontrado;
                let mensj = datosDevuelto.mensaje;
                let datos = datosDevuelto.datos;
                if(exito){
                    $("#cboTipDocCli").val(tipDoc).change();
                    $("#txtNumDocCli").val(numDoc);
                    $("#txtNombreCli").val(nomCli +' '+apePat+' '+apeMat);
                    //$('#myModalAgregarCli').modal('hide');
                    $('#divModelRegistrarCliente').modal('hide');
                    $('#divModelRegistrarCliente').slideDown('slow');
                    mostrarMensaje("Se registro nuevo cliente correctamente", 2);
                }else{
                    mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                }
            });
        }        
    };

    // --------------------------------------------------

    this.valDocuCliente = function(tipDoc, numDoc){
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
        return true;
    }

    this.habilitarCamposNuevoCli = function(op1, op2){
        $('#txtModalNumDocCli').prop('disabled', op1);
        $('#txtModalNombreCli').prop('disabled', op2);
        $('#txtModalApePatCli').prop('disabled', op2);
        $('#txtModalApeMatCli').prop('disabled', op2);
        $('#txtModalCelCli').prop('disabled', op2);
        $('#txtModalMailCli').prop('disabled', op2);
        // limpiar campos
        $('#txtModalNombreCli').val('');
        $('#txtModalApePatCli').val('');
        $('#txtModalApeMatCli').val('');
        $('#txtModalCelCli').val('');
        $('#txtModalMailCli').val('');
    }

    this.valCamposObligatorio = function(){
        if($('#txtModalNumDocCli').val() == ''){
            mostrarMensaje("el número de documento es obligatorio", 2);
            return false;
        }else if($('#txtModalNombreCli').val() == ''){
            mostrarMensaje("el nombre de cliente es obligatorio", 2);
            return false
        }
        return true;
    }


}