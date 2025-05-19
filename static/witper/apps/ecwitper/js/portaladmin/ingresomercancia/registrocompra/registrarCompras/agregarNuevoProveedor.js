var clsAgregarNuevoProveedor = function() {
    this.inputs = {
        numDocumento : { id: 'numDocu' }
    };

    this.botones = {
        btnAgregarCli : { id: 'btnAgregarCli' }
    };

    this.iniciarForm = function(){
        var refCls = this;
        $("#" + this.botones.btnAgregarCli.id).click(function(){
            refCls.onClickBtnAgregarCli();
        });

    };

    // 20230331 Agregar cliente desde comprobante de venta
    this.onClickBtnAgregarCli = function () {
        var refCls = this;
        $("#myModalAgregarCli").remove();
        $("body").append(
            '<div class="modal fade" id="myModalAgregarCli" role="dialog">'
                +'<div class="modal-dialog">'
                    +'<div class="modal-content">'
                        +'<div class="modal-header">'
                        +'	<button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Registrar Nuevo Cliente</h4>'
                        +'</div>'
                        +'<div class="modal-body">'
                        +'	<form id="formRegNuevoCliVta" role="form">'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3">'
                        +'			    <input type="hidden" id="hdModalTipDocCli" name="hdModalTipDocCli" />'
                        +'				<select id="cboModalTipDocCli" name="cboModalTipDocCli" class="form-control" disabled>'
                        +'					<option value="03">DNI</option>'
                        +'					<option value="04">RUC</option>'
                        +'				</select>'
                        +'			</div>'
                        +'			<div class="col-md-6">'
                        +'			    <input type="hidden" id="hdModalNumDocCli" name="hdModalNumDocCli" />'
                        +'				<input type="text" id="txtModalNumDocCli" name="txtModalNumDocCli" maxlength="11" placeholder="numero documento" class="form-control" />'
                        +'			</div>'
                        +'			<div class="col-md-2">'
                        +'				<button type="button" class="btn btn-primary" id="btnModalBuscarCli">Buscar</button>'
                        +'			</div>'
                        +'		</div>'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3"></div>'
                        +'			<div class="col-md-8">'
                        +'				<input type="text" id="txtModalNombreCli" name="txtModalNombreCli" maxlength="25" placeholder="nombres" class="form-control" disabled />'
                        +'			</div>'
                        +'		</div>'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3"></div>'
                        +'			<div class="col-md-8">'
                        +'				<input type="text" id="txtModalApePatCli" name="txtModalApePatCli" maxlength="25" placeholder="apellido paterno" class="form-control" disabled/>'
                        +'			</div>'
                        +'		</div>'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3"></div>'
                        +'			<div class="col-md-8">'
                        +'				<input type="text" id="txtModalApeMatCli" name="txtModalApeMatCli" maxlength="25" placeholder="apellido materno" class="form-control" disabled/>'
                        +'			</div>'
                        +'		</div>'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3"></div>'
                        +'			<div class="col-md-8">'
                        +'				<input type="text" id="txtModalCelCli" name="txtModalCelCli" maxlength="20" placeholder="número celular" class="form-control" disabled/>'
                        +'			</div>'
                        +'		</div>'
                        +'		<div class="row" style="padding:5px;">'
                        +'			<div class="col-md-3"></div>'
                        +'			<div class="col-md-8">'
                        +'				<input type="text" id="txtModalMailCli" name="txtModalMailCli" maxlength="45" placeholder="e-mail" class="form-control" disabled/>'
                        +'			</div>'
                        +'		</div>'
                        +'	</form>'
                        +'</div>'
                        +'<div class="modal-footer">'
                        +'	<button type="button" class="btn btn-primary" id="btnModalNuevoCli">Nuevo</button>'
                        +'	<button type="button" class="btn btn-primary" id="btnModalRegistrarCli" disabled>Registrar</button>'
                        +'	<button type="button" class="btn btn-primary" id="btnModalCerrarCli">Salir</button>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>'
        );

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
        // Boton Buscar
        $("#btnModalBuscarCli").click(function(e){
            refCls.habilitarCamposNuevoCli(false, true);
            let tipDoc = $("#cboModalTipDocCli").val();
            let numDoc = $("#txtModalNumDocCli").val();
            if(refCls.valDocuCliente(tipDoc, numDoc)){
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
        });
        // Boton Nuevo
        $("#btnModalNuevoCli").click(function(e){
            let tipDoc = $("#cboModalTipDocCli").val();
            let numDoc = $("#txtModalNumDocCli").val();
            if(refCls.valDocuCliente(tipDoc, numDoc)){
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
                            $('#btnModalRegistrarCli').prop('disabled', false);
                        }    
                    }else{
                        mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                    }   
                });
            }
        });
        // Boton Registrar
        $("#btnModalRegistrarCli").click(function(e){
            if(refCls.valCamposObligatorio()){
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
                        $('#myModalAgregarCli').modal('hide');
                        mostrarMensaje("Se registro nuevo cliente correctamente", 2);
                    }else{
                        mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
                    }
                });
            }
        });
        // Boton Salir
        $("#btnModalCerrarCli").click(function(e){
            $('#myModalAgregarCli').modal('hide');
        });
        $('#myModalAgregarCli').modal('show');
    };

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