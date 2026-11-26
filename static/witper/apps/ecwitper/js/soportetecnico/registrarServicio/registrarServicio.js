/****************========================================================****************/
// 20261111 Controlador JS Integral: Soporte Técnico y Cotizaciones (Bloque 1 de 3)
/****************========================================================****************/

let clienteActualId = null;
let idCotizacionOrigen = null;
let idServicioEditar = null;

//agregamos para imprimir la ficha
let fichaActualParaImprimir = null;
let listaEquiposCliente = [];
let detalleConceptos = [];

$(document).ready(function () {
    inicializarModuloSoporteTecnico();
});

//------------------------------------------------------------------------
// 1. INICIALIZACIÓN DEL MÓDULO
function inicializarModuloSoporteTecnico() {
    $("#divListarServiciosTecnicos").show();
    $("#divRegistrarServicioTecnico").hide();

    establecerFechaEmisionActual();
    configurarNavegacionLocalSPA();
    configurarFiltrosBandeja();
    configurarEventosCliente();
    configurarEventosEquipo();
    configurarEventosConceptos();
    configurarGrabacionServicio();
    configurarEventosModalCotizacionOrigen();
    //agregar imprimir ficha
    configurarImpresionFicha();
    //validacion dni y ruc
    configurarValidacionesDocumento();

    witper_listarOrdenesTecnicasBandeja();
    cargarCatalogoServiciosDesdeBD();
}

//------------------------------------------------------------------------
// 2. NAVEGACIÓN LOCAL SPA (.toggle)
function configurarNavegacionLocalSPA() {
    $("#linkNewServicio").click(function (e) {
        e.preventDefault();
        limpiarFormularioRegistroCompleto();
        $("#divListarServiciosTecnicos").toggle("hide");
        $("#divRegistrarServicioTecnico").toggle("slow");
    });

    $("#btn_cancelar_registro_servicio").click(function (e) {
        e.preventDefault();
        limpiarFormularioRegistroCompleto();
        $("#divRegistrarServicioTecnico").toggle("hide");
        $("#divListarServiciosTecnicos").toggle("slow");
    });
}

//------------------------------------------------------------------------
// 3. BANDEJA DE FILTROS Y LISTADO DE LOS 5 ÚLTIMOS REGISTROS
function configurarFiltrosBandeja() {
    $("#filtro_comprobante").change(function () {
        if ($(this).val() === "COTIZACION") {
            $("#contenedor_estado_servicio").hide();
            $("#contenedor_estado_cotizacion").css("display", "flex");
        } else {
            $("#contenedor_estado_servicio").css("display", "flex");
            $("#contenedor_estado_cotizacion").hide();
        }
        // Filtra automáticamente al cambiar entre Servicios y Cotizaciones
        witper_listarOrdenesTecnicasBandeja();
    });

    // Filtra automáticamente al cambiar entre ABIERTO/CERRADO o estados de servicio
    $("#filtro_estado, #filtro_estado_cotizacion").change(function () {
        witper_listarOrdenesTecnicasBandeja();
    });

    $("#btn_limpiar_filtros").click(function () {
        $("#form_filtros_historial")[0].reset();
        $("#filtro_comprobante").trigger("change");
    });

    $("#form_filtros_historial").submit(function (e) {
        e.preventDefault();
        witper_listarOrdenesTecnicasBandeja();
    });
}

function witper_listarOrdenesTecnicasBandeja() {
    let comprobante = $("#filtro_comprobante").val();
    let comprobanteSQL = (comprobante === "COTIZACION") ? "COTIZACION" : "SERVICIO";
    let estadoFiltro = (comprobante === "COTIZACION") ? $("#filtro_estado_cotizacion").val() : $("#filtro_estado").val();

    let paramsBusqueda = {
        comprobante: comprobanteSQL,
        fecha_inicio: $("#filtro_fecha_inicio").val(),
        fecha_final: $("#filtro_fecha_final").val(),
        codigo_servicio: $("#filtro_codigo").val(),
        estado: estadoFiltro
    };


    $.ajax({
        url: '/adm/app/atencionserv/consultar/obtener-lista-ordenes-tecnicas',
        type: 'POST',
        dataType: 'json',
        data: { datos: JSON.stringify(paramsBusqueda) },
        success: function (response) {
            let tbody = $("#cuerpo_tabla_bandeja_servicios");
            tbody.empty();

            if (response.encontrado && response.datos && response.datos.length > 0) {
                $.each(response.datos, function (index, item) {
                    let filaHtml = `<tr>
                        <td style="font-weight: bold; color: #2b74b9;">${item.codigo_servicio}</td>
                        <td>${item.fecha_ingreso}</td>
                        <td style="font-family: monospace;">${item.doc_num}</td>
                        <td style="text-align: left; padding-left: 15px; font-weight: 500;">${item.cliente_nombre}</td>
                        <td style="text-align: left; padding-left: 15px; color: #555;">${item.equipo_detalle}</td>
                        <td><span class="badge-estado">${item.estado_servicio}</span></td>
                        <td>
                            <button type="button" class="btn btn-primary" style="height: 24px; padding: 2px 10px; font-size: 0.75rem;" onclick="verFichaCompleta(${item.id_servicio})">👁️</button>
                        </td>
                    </tr>`;
                    tbody.append(filaHtml);
                });
            } else {
                tbody.html('<tr><td colspan="7" style="padding: 25px; color: #999; font-style: italic; text-align: center;">No se encontraron registros vigentes bajo los criterios actuales.</td></tr>');
            }
        }
    });
}
//------------------------------------------------------------------------
// 4. BÚSQUEDA Y REGISTRO RÁPIDO DE CLIENTE (wip_cuenta_persona)
function configurarEventosCliente() {
    $("#btn_buscar").click(function () {
        //let tipoDoc = ($("#tipo_doc").val() === "RUC") ? "06" : "01";
        //let numDoc  = $("#dni_input").val().trim();

        //if (numDoc === "") {
            //alert("Por favor ingrese el número de documento.");
            //return;
        //}

        //validacion dni y ruc
        let docTip = $("#tipo_doc").val();
        let tipoDoc = (docTip === "RUC") ? "06" : "01";
        let numDoc  = $("#dni_input").val().trim();
        let reqLen  = (docTip === "RUC") ? 11 : 8;

        if (numDoc.length !== reqLen) {
            alert(`Debe ingresar exactamente ${reqLen} dígitos numéricos para ${docTip}.`);
            $("#dni_input").focus();
            return;
        }
        //fin

                $.ajax({
            url: '/adm/app/atencionserv/consultar/buscar-cliente-por-dni-ruc',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify({ tipDoc: tipoDoc, numDoc: numDoc }) },
                        success: function (response) {
                if (response.encontrado && response.datos && response.datos.length > 0) {
                    let cli = response.datos.slice(0, 1).pop();
                    clienteActualId = cli.id_ctapersona;
                    let nombreCompleto = `${cli.nombres || ''} ${cli.ape_pat || ''} ${cli.ape_mat || ''}`.trim();
                    $("input[placeholder*='Nombre']").val(nombreCompleto);
                    $("#btn_nuevo_cliente").prop("disabled", true);
                    
                    // Habilita la sección de equipos
                    $("#select_equipo, #btn_nuevo_equipo").prop("disabled", false);
                    cargarEquiposDelCliente(clienteActualId);
                } else {
                    clienteActualId = null;
                    $("input[placeholder*='Nombre']").val("");
                    $("#btn_nuevo_cliente").prop("disabled", false);
                    $("#select_equipo, #btn_nuevo_equipo").prop("disabled", true);
                    alert("Cliente no encontrado. Puede registrarlo haciendo clic en 'Agregar Cliente'.");
                }
            }

        });

    });

    // Abrir modal de nuevo cliente
    $("#btn_nuevo_cliente").click(function () {
        $("#modal_dni").val($("#dni_input").val().trim());
        $("#modalCliente").css("display", "flex");
    });

    $("#btn_cerrar_modal_cliente, #btn_cancelar_modal_cliente").click(function () {
        $("#modalCliente").css("display", "none");
        $("#form_nuevo_cliente").reset();
    });

        // Guardar nuevo cliente en wip_cuenta_persona
    $("#form_nuevo_cliente").submit(function (e) {
        e.preventDefault();
        let tipoDoc = ($("#tipo_doc").val() === "RUC") ? "06" : "01";
        let nombreCompleto = $("input[name='nombre']", this).val().trim();
        
        let datosCliente = {
            hdModalTipDocCli: tipoDoc,
            hdModalNumDocCli: $("#modal_dni").val().trim(),
            txtModalNombreCli: nombreCompleto,
            txtModalApePatCli: "",
            txtModalApeMatCli: "",
            txtModalCelCli: $("input[name='telefono']", this).val().trim(),
            txtModalMailCli: $("input[name='correo']", this).val().trim(),
            txtModalDirCli: $("input[name='direccion']", this).val().trim()
        };

        $.ajax({
            url: '/adm/app/atencionserv/registrar/registrar-cliente',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify(datosCliente) },
            success: function (response) {
                if (response.encontrado) {
                    alert(response.mensaje);
                    $("#modalCliente").css("display", "none");
                    $("#form_nuevo_cliente").trigger("reset");
                    $("#btn_buscar").trigger("click");
                } else {
                    alert(response.mensaje);
                }
            },
            error: function (xhr) {
                console.error("Error servidor:", xhr.responseText);
                alert("Error al guardar cliente. Revisa la consola.");
            }
        });
    });

}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 5. GESTIÓN DE EQUIPOS Y ACCESORIOS (wip_equipo_cliente)
function configurarEventosEquipo() {
    $("#btn_nuevo_equipo").click(function () {
        if (!clienteActualId) return;
        $("#modal_equipo_id_cliente").val(clienteActualId);
        $("#modalEquipo").css("display", "flex");
    });

    $("#btn_cerrar_modal_equipo, #btn_cancelar_modal_equipo").click(function () {
        $("#modalEquipo").css("display", "none");
        $("#form_nuevo_equipo").trigger("reset");
    });

    // Guardar nuevo equipo en wip_equipo_cliente
    $("#form_nuevo_equipo").submit(function (e) {
        e.preventDefault();
        let datosEquipo = {
            id_cliente: clienteActualId,
            tipo_equipo: $("select[name='tipo_equipo']", this).val(),
            marca: $("input[name='marca']", this).val().trim(),
            modelo: $("input[name='modelo']", this).val().trim(),
            numero_serie: $("input[name='numero_serie']", this).val().trim(),
            caracteristicas: $("input[name='caracteristicas']", this).val().trim()
        };

        $.ajax({
            url: '/adm/app/atencionserv/registrar/registrar-equipo',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify(datosEquipo) },
            success: function (response) {
                if (response.encontrado) {
                    alert(response.mensaje);
                    $("#modalEquipo").css("display", "none");
                    $("#form_nuevo_equipo").trigger("reset");
                    cargarEquiposDelCliente(clienteActualId);
                } else {
                    alert(response.mensaje);
                }
            },
            error: function (xhr) {
                console.error("Error al registrar equipo:", xhr.responseText);
                alert("Error en servidor al guardar equipo. Revisa Network.");
            }
        });
    });

    // Al seleccionar un equipo: autorrellena Modelo, Serie y muestra Accesorios
    $("#select_equipo").change(function () {
        let idEquipoSel = $(this).val();
        let eq = listaEquiposCliente.find(item => item.id_equipo == idEquipoSel);

        if (eq) {
            $("#info_modelo").val(eq.modelo || "Sin modelo");
            $("#info_serie").val(eq.numero_serie || "S/N");
            renderizarCheckboxesAccesorios([]);
            $("#select_cambio_tipo, #select_estado_servicio").prop("disabled", false);
        } else {
            $("#info_modelo, #info_serie").val("");
            $("#contenedor_accesorios").html('<span class="text-muted" style="font-size: 0.85rem; color: #777;">Seleccione un equipo para cargar accesorios...</span>');
            $("#select_cambio_tipo, #select_estado_servicio").prop("disabled", true);
        }
    });
}

function cargarEquiposDelCliente(idCliente, idEquipoPreseleccionado = null) {
    $.ajax({
        url: '/adm/app/atencionserv/consultar/obtener-equipos-por-cliente',
        type: 'POST',
        dataType: 'json',
        data: { datos: JSON.stringify({ idCliente: idCliente }) },
        success: function (response) {
            let select = $("#select_equipo");
            select.empty().append('<option value="">-- Seleccione el equipo que ingresa al taller --</option>');
            listaEquiposCliente = [];

            if (response.encontrado && response.datos && response.datos.length > 0) {
                listaEquiposCliente = response.datos;
                $.each(response.datos, function (i, eq) {
                    select.append(`<option value="${eq.id_equipo}">${eq.tipo_equipo} ${eq.marca} - ${eq.modelo} (S/N: ${eq.numero_serie})</option>`);
                });
                if (idEquipoPreseleccionado) {
                    select.val(idEquipoPreseleccionado).trigger("change");
                }
            }
        }
    });
}



function renderizarCheckboxesAccesorios(marcados = []) {
    let listaBase = ["Cargador", "Batería", "Cable Poder", "Funda / Mochila", "Mouse / Otros"];
    let html = "";
    listaBase.forEach(acc => {
        let checked = marcados.includes(acc) ? "checked" : "";
        html += `<label class="check-item"><input type="checkbox" name="accesorios_chk" value="${acc}" ${checked}> ${acc}</label>`;
    });
    $("#contenedor_accesorios").html(html);
}

//------------------------------------------------------------------------
// 6. ABRIR FICHA EXISTENTE (CONVERSIÓN DE COTIZACIÓN A SERVICIO)
//------------------------------------------------------------------------
// 6. ABRIR FICHA EXISTENTE (CONVERSIÓN DE COTIZACIÓN A SERVICIO)
//------------------------------------------------------------------------
// 6. ABRIR FICHA EXISTENTE (CONVERSIÓN DE COTIZACIÓN A SERVICIO)
function verFichaCompleta(idServicio) {
    $.ajax({
        url: '/adm/app/atencionserv/consultar/obtener-ficha-completa-por-id',
        type: 'POST',
        dataType: 'json',
        data: { datos: JSON.stringify({ idServicio: idServicio }) },
        success: function (response) {
            if (response.encontrado && response.cabecera) {
                let cab = Array.isArray(response.cabecera) ? response.cabecera.slice(0, 1).pop() : response.cabecera;
                if (!cab) return;
                limpiarFormularioRegistroCompleto();
                //imprimir ficha
                fichaActualParaImprimir = cab;
                //habilita el boton imprimir
                $("#btn_guardar_servicio").prop("disabled", false);

                /*idServicioEditar = cab.id_servicio;
                if (cab.tipo_comprobante === "COTIZACION") {
                    idCotizacionOrigen = cab.id_servicio;
                    $("#select_comprobante").val("COTIZACION");
                    $("#select_estado_servicio").val("GENERADO");
                    $("#codigo_cotizacion_origen").val(cab.codigo_servicio);
                    $("#btn_ver_cotizacion_origen").prop("disabled", false);
                } else {
                    idCotizacionOrigen = cab.id_cotizacion_origen;
                    $("#select_comprobante").val(cab.tipo_comprobante);
                    $("#select_estado_servicio").val(cab.estado_servicio);
                    if (cab.id_cotizacion_origen && cab.codigo_cotizacion_origen) {
                        $("#codigo_cotizacion_origen").val(cab.codigo_cotizacion_origen);
                        $("#btn_ver_cotizacion_origen").prop("disabled", false);
                    } else {
                        $("#codigo_cotizacion_origen").val("");
                        $("#btn_ver_cotizacion_origen").prop("disabled", true);
                    }
                }*/
               //(respeta ANULADO en cotización, rellena #motivo_estado_input y dispara .trigger("change"))
                               idServicioEditar = cab.id_servicio;
                if (cab.tipo_comprobante === "COTIZACION") {
                    idCotizacionOrigen = cab.id_servicio;
                    $("#select_comprobante").val("COTIZACION");
                    $("#select_estado_servicio").val(cab.estado_servicio === "ANULADO" ? "ANULADO" : "GENERADO");
                    $("#codigo_cotizacion_origen").val(cab.codigo_servicio);
                    $("#btn_ver_cotizacion_origen").prop("disabled", false);
                } else {
                    idCotizacionOrigen = cab.id_cotizacion_origen;
                    $("#select_comprobante").val(cab.tipo_comprobante);
                    $("#select_estado_servicio").val(cab.estado_servicio);
                    if (cab.id_cotizacion_origen && cab.codigo_cotizacion_origen) {
                        $("#codigo_cotizacion_origen").val(cab.codigo_cotizacion_origen);
                        $("#btn_ver_cotizacion_origen").prop("disabled", false);
                    } else {
                        $("#codigo_cotizacion_origen").val("");
                        $("#btn_ver_cotizacion_origen").prop("disabled", true);
                    }
                }

                $("#motivo_estado_input").val(cab.motivo_estado || "");
                $("#select_estado_servicio").trigger("change");




                clienteActualId = cab.id_ctapersona;
                $("#tipo_doc").val(cab.doc_tip === "06" ? "RUC" : "DNI");
                $("#dni_input").val(cab.doc_num);
                $("input[placeholder*='Nombre']").val(cab.cliente_nombre);
                $("#select_equipo, #btn_nuevo_equipo").prop("disabled", false);

                cargarEquiposDelCliente(clienteActualId, cab.id_equipo);

                $("#falla_input").val(cab.falla_reportada);
                $("#observaciones_input").val(cab.observacion);
                let accArray = cab.accesorios ? cab.accesorios.split(", ") : [];
                setTimeout(() => renderizarCheckboxesAccesorios(accArray), 300);

                detalleConceptos = [];
                if (response.detalles && response.detalles.length > 0) {
                    response.detalles.forEach(det => {
                        detalleConceptos.push({
                            tipo_concepto: det.tipo_concepto,
                            id_cat_servicio: det.id_cat_servicio,
                            cod_producto: det.cod_producto,
                            descripcion: det.descripcion,
                            precio_unitario: parseFloat(det.precio_unitario),
                            cantidad: parseInt(det.cantidad),
                            subtotal: parseFloat(det.subtotal)
                        });
                    });
                }
                renderizarGrillaConceptos();

                $("#divListarServiciosTecnicos").hide();
                $("#divRegistrarServicioTecnico").show();
            }
        }
    });
}


//------------------------------------------------------------------------
// 7. CATÁLOGO DE SERVICIOS Y GRILLA DINÁMICA DE CONCEPTOS
function cargarCatalogoServiciosDesdeBD() {
    $.ajax({
        url: '/adm/app/atencionserv/consultar/obtener-catalogo-servicios',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            let select = $("#select_servicio");
            select.empty().append('<option value="">-- Seleccione --</option>');
            if (response.encontrado && response.datos) {
                $.each(response.datos, function (i, srv) {
                    select.append(`<option value="${srv.id_cat_servicio}" data-precio="${srv.precio_base}">${srv.nombre}</option>`);
                });
            }
        }
    });
}

function configurarEventosConceptos() {
    $("#select_cambio_tipo").change(function () {
        let tipo = $(this).val();
        if (tipo === "Servicio") {
            $("#sub_campos_producto").hide();
            $("#sub_campos_servicio").css("display", "flex");
        } else if (tipo === "Producto") {
            $("#sub_campos_servicio").hide();
            $("#sub_campos_producto").css("display", "flex");
        } else {
            $("#sub_campos_servicio, #sub_campos_producto").hide();
        }
    });

    // Autorrellena el precio base al elegir un servicio de la tabla
    $("#select_servicio").change(function () {
        let precio = $(this).find(":selected").data("precio") || "0.00";
        $("#precio_servicio").val(parseFloat(precio).toFixed(2));
    });

    // Agregar Tarea / Servicio a la grilla
    $("#btn_agregar_servicio").click(function () {
        let idCat = $("#select_servicio").val();
        let nombreSrv = $("#select_servicio option:selected").text();
        let detalleExtra = $("#detalle_servicio_especifico").val().trim();
        let precio = parseFloat($("#precio_servicio").val()) || 0;

        if (!idCat || precio <= 0) {
            alert("Seleccione un servicio válido y verifique su precio.");
            return;
        }

        let descripcionFinal = detalleExtra ? `${nombreSrv} (${detalleExtra})` : nombreSrv;
        detalleConceptos.push({
            tipo_concepto: "Servicio",
            id_cat_servicio: idCat,
            cod_producto: null,
            descripcion: descripcionFinal,
            precio_unitario: precio,
            cantidad: 1,
            subtotal: precio
        });

        $("#select_servicio").val("");
        $("#precio_servicio, #detalle_servicio_especifico").val("");
        renderizarGrillaConceptos();
    });

    // Agregar Repuesto / Producto a la grilla
        let productoSeleccionadoActual = null;

    // Buscar Repuesto / Producto en tienda (wip_producto_tienda)
    $("#btn_buscar_producto").click(function () {
        let codBuscar = $("#buscar_producto").val().trim();
        if (!codBuscar) {
            alert("Ingrese el código corto (ej. 100001) o código de producto.");
            return;
        }

        $.ajax({
            url: '/adm/app/atencionserv/consultar/buscar-producto-tienda',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify({ codigo: codBuscar }) },
            success: function (response) {
                if (response.encontrado && response.datos && response.datos.length > 0) {
                    let prod = response.datos.slice(0, 1).pop();
                    productoSeleccionadoActual = prod;
                    $("#descripcion_producto_autocompletar").val(`${prod.producto} (S/ ${parseFloat(prod.precio_venta_internet).toFixed(2)})`);
                } else {
                    productoSeleccionadoActual = null;
                    $("#descripcion_producto_autocompletar").val("");
                    alert("Producto no encontrado en tienda. Pruebe con 100001, 100002 o 100003.");
                }
            }
        });
    });

    // Agregar Repuesto / Producto encontrado a la grilla
    $("#btn_agregar_producto").click(function () {
        if (!productoSeleccionadoActual) {
            alert("Primero busque un producto válido con el botón Buscar.");
            return;
        }

        let precioProd = parseFloat(productoSeleccionadoActual.precio_venta_internet) || 0;
        detalleConceptos.push({
            tipo_concepto: "Producto",
            id_cat_servicio: null,
            cod_producto: productoSeleccionadoActual.cod_producto,
            descripcion: productoSeleccionadoActual.producto,
            precio_unitario: precioProd,
            cantidad: 1,
            subtotal: precioProd
        });

        productoSeleccionadoActual = null;
        $("#buscar_producto, #descripcion_producto_autocompletar").val("");
        renderizarGrillaConceptos();
    });


    // Mostrar campo de motivo si el estado es ANULADO o PENDIENTE
    $("#select_estado_servicio").change(function () {
        let est = $(this).val();
        if (est === "ANULADO" || est === "PENDIENTE"|| est === "OBSERVADO") {
            $("#sub_campos_motivo").css("display", "flex");
        } else {
            $("#sub_campos_motivo").hide().find("input").val("");
        }
    });
}

function renderizarGrillaConceptos() {
    let tbody = $("#cuerpo_tabla_historial_servicios");
    tbody.empty();
    let totalAcumulado = 0;

    if (detalleConceptos.length === 0) {
        tbody.html('<tr><td colspan="6" style="padding: 25px; color: #999; font-style: italic; text-align: center;">Ningún servicio o repuesto cargado.</td></tr>');
    } else {
        detalleConceptos.forEach((item, index) => {
            totalAcumulado += item.subtotal;
            let fila = `<tr>
                <td><span class="badge-estado">${item.tipo_concepto}</span></td>
                <td style="text-align: left; padding-left: 15px;">${item.descripcion}</td>
                <td style="text-align: right; padding-right: 15px;">${item.precio_unitario.toFixed(2)}</td>
                <td>${item.cantidad}</td>
                <td style="text-align: right; padding-right: 15px; font-weight: bold;">${item.subtotal.toFixed(2)}</td>
                <td><button type="button" class="btn btn-secondary" style="height: 24px; padding: 2px 8px; font-size: 0.75rem;" onclick="eliminarConceptoGrilla(${index})">X</button></td>
            </tr>`;
            tbody.append(fila);
        });
    }

    $("#cotizacion_input").val(totalAcumulado.toFixed(2));
    $("#costo_total_reparacion").val(totalAcumulado.toFixed(2));
}

function eliminarConceptoGrilla(index) {
    detalleConceptos.splice(index, 1);
    renderizarGrillaConceptos();
}

//------------------------------------------------------------------------
// 8. GRABACIÓN FINAL EN BASE DE DATOS Y UTILIDADES
//------------------------------------------------------------------------
// 8. GRABACIÓN FINAL EN BASE DE DATOS Y UTILIDADES
function configurarGrabacionServicio() {
    $("#btn_grabar_ingreso").click(function () {
        let idEquipo = $("#select_equipo").val();
        if (!clienteActualId || !idEquipo) {
            alert("Debe seleccionar un cliente y un equipo antes de grabar.");
            return;
        }
        if (detalleConceptos.length === 0) {
            alert("Debe agregar al menos un servicio o repuesto a la grilla.");
            return;
        }

        let accesoriosMarcados = [];
        $("input[name='accesorios_chk']:checked").each(function () {
            accesoriosMarcados.push($(this).val());
        });

        /*let tipoComprobante = $("#select_comprobante").val();
        let estadoFinal = (tipoComprobante === "COTIZACION") ? "ABIERTO" : $("#select_estado_servicio").val();
        let esConversionCotizacion = (idCotizacionOrigen && tipoComprobante === "SERVICIO" && idServicioEditar == idCotizacionOrigen);
*/
//permite grabar cotizaciones en ANULADO y exige motivo
        let tipoComprobante = $("#select_comprobante").val();
        let estadoSeleccionado = $("#select_estado_servicio").val();
        let motivoTexto = $("#motivo_estado_input").val().trim();

        if ((estadoSeleccionado === "ANULADO" || estadoSeleccionado === "PENDIENTE" || estadoSeleccionado === "OBSERVADO") && !motivoTexto) {
            alert(`Debe ingresar el motivo para el estado ${estadoSeleccionado}.`);
            $("#motivo_estado_input").focus();
            return;
        }

        let estadoFinal = (tipoComprobante === "COTIZACION")
            ? (estadoSeleccionado === "ANULADO" ? "ANULADO" : "ABIERTO")
            : estadoSeleccionado;
        let esConversionCotizacion = (idCotizacionOrigen && tipoComprobante === "SERVICIO" && idServicioEditar == idCotizacionOrigen);
//fin
        let payload = {
            id_servicio_editar: esConversionCotizacion ? null : idServicioEditar,
            id_cotizacion_origen: idCotizacionOrigen,
            id_ctapersona: clienteActualId,
            id_equipo: idEquipo,
            tipo_comprobante: tipoComprobante,
            fecha_ingreso: $("#fecha_ingreso_editable").val().replace("T", " ") + ":00",
            accesorios: accesoriosMarcados.join(", "),
            falla_reportada: $("#falla_input").val().trim(),
            observacion: $("#observaciones_input").val().trim(),
            cotizacion_estimada: $("#cotizacion_input").val(),
            costo_total: $("#costo_total_reparacion").val(),
            estado_servicio: estadoFinal,
            motivo_estado: $("#motivo_estado_input").val().trim(),
            detalles: detalleConceptos
        };

        $.ajax({
            url: '/adm/app/atencionserv/registrar/grabar-ingreso-orden-tecnica',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify(payload) },
                        success: function (response) {
                if (response.encontrado) {
                    alert(response.mensaje);
                    limpiarFormularioRegistroCompleto();
                    if (tipoComprobante === "COTIZACION") {
                        $("#filtro_estado_cotizacion").val(estadoFinal === "ANULADO" ? "CERRADO" : "ABIERTO");
                    }
                    $("#filtro_comprobante").val(tipoComprobante).trigger("change");
                    $("#divRegistrarServicioTecnico").hide();
                    $("#divListarServiciosTecnicos").show();
                } else {
                    alert(response.mensaje);
                }
            }

        });
    });
}

function establecerFechaEmisionActual() {
    let f = new Date();
    let str = `${f.getFullYear()}-${String(f.getMonth() + 1).padStart(2, '0')}-${String(f.getDate()).padStart(2, '0')}T${String(f.getHours()).padStart(2, '0')}:${String(f.getMinutes()).padStart(2, '0')}`;
    $("#fecha_ingreso_editable").val(str);
}

function limpiarFormularioRegistroCompleto() {
    clienteActualId = null;
    idCotizacionOrigen = null;
    idServicioEditar = null;
    productoSeleccionadoActual = null;
    listaEquiposCliente = [];
    detalleConceptos = [];

    $("#select_comprobante").val("SERVICIO");
    establecerFechaEmisionActual();
    $("#dni_input, #info_modelo, #info_serie, #falla_input, #observaciones_input, #motivo_estado_input").val("");
    $("input[placeholder*='Nombre']").val("");
    $("#btn_nuevo_cliente, #select_equipo, #btn_nuevo_equipo, #select_cambio_tipo, #select_estado_servicio").prop("disabled", true);
    $("#select_equipo").empty().append('<option value="">-- Seleccione el equipo que ingresa al taller --</option>');
    $("#contenedor_accesorios").html('<span class="text-muted" style="font-size: 0.85rem; color: #777;">Seleccione un equipo para cargar accesorios...</span>');
    $("#select_estado_servicio").val("GENERADO");
    $("#select_cambio_tipo").val("");
    $("#sub_campos_motivo, #sub_campos_servicio, #sub_campos_producto").hide();
    //se agrega para limpiar datos de cotizacion de origen
    $("#codigo_cotizacion_origen").val("");
    $("#btn_ver_cotizacion_origen").prop("disabled", true); 
    //fin
    //imprimir ficha
    fichaActualParaImprimir = null;
    $("#btn_guardar_servicio").prop("disabled", true);

    renderizarGrillaConceptos();
}

//------------------------------------------------------------------------
// 9. MODAL DE LECTURA RÁPIDA DE COTIZACIÓN DE ORIGEN
function configurarEventosModalCotizacionOrigen() {
    $("#btn_ver_cotizacion_origen").click(function () {
        if (!idCotizacionOrigen) return;

        $.ajax({
            url: '/adm/app/atencionserv/consultar/obtener-ficha-completa-por-id',
            type: 'POST',
            dataType: 'json',
            data: { datos: JSON.stringify({ idServicio: idCotizacionOrigen }) },
            success: function (response) {
                if (response.encontrado && response.cabecera) {
                    let cot = Array.isArray(response.cabecera) ? response.cabecera.slice(0, 1).pop() : response.cabecera;
                    if (!cot) return;

                    $("#modal_cot_titulo_codigo").text(cot.codigo_servicio);
                    $("#modal_cot_fecha").text(cot.fecha_ingreso);
                    $("#modal_cot_estado").text(cot.estado_servicio);
                    $("#modal_cot_cliente").text(`${cot.doc_num} - ${cot.cliente_nombre}`);
                    $("#modal_cot_equipo").text(`${cot.modelo || ''} (S/N: ${cot.numero_serie || 'S/N'})`);
                    $("#modal_cot_falla").text(`${cot.falla_reportada || 'Sin falla reportada'} ${cot.observacion ? ' | Obs: ' + cot.observacion : ''}`);

                    let tbody = $("#modal_cot_tabla_detalles");
                    tbody.empty();
                    let totalCot = 0;

                    if (response.detalles && response.detalles.length > 0) {
                        response.detalles.forEach(det => {
                            let sub = parseFloat(det.subtotal) || 0;
                            totalCot += sub;
                            tbody.append(`<tr>
                                <td><span class="badge-estado">${det.tipo_concepto}</span></td>
                                <td style="text-align: left; padding-left: 10px;">${det.descripcion}</td>
                                <td style="text-align: right; padding-right: 10px;">${parseFloat(det.precio_unitario).toFixed(2)}</td>
                                <td>${det.cantidad}</td>
                                <td style="text-align: right; padding-right: 10px; font-weight: bold;">${sub.toFixed(2)}</td>
                            </tr>`);
                        });
                    } else {
                        tbody.html('<tr><td colspan="5" style="text-align: center; color: #999;">Sin detalles registrados.</td></tr>');
                    }

                    $("#modal_cot_total").text(totalCot.toFixed(2));
                    $("#modalCotizacionOrigen").css("display", "flex");
                }
            }
        });
    });

    $("#btn_cerrar_modal_cot_origen, #btn_aceptar_modal_cot_origen").click(function () {
        $("#modalCotizacionOrigen").css("display", "none");
    });
}

//------------------------------------------------------------------------
// 10. IMPRESIÓN DE FICHA MAESTRA UNIFICADA (FORMATO A4 COMPUCHICLAYO E.I.R.L.)
function configurarImpresionFicha() {
    $("#btn_guardar_servicio").click(function () {
        if (!fichaActualParaImprimir) {
            alert("Debe abrir una orden o cotización registrada para imprimir.");
            return;
        }

        let cab = fichaActualParaImprimir;
        let esCotizacion = (cab.tipo_comprobante === "COTIZACION");
        let tituloDocumento = esCotizacion
            ? `COTIZACIÓN DE SERVICIO TÉCNICO N° ${cab.codigo_servicio}`
            : `ORDEN DE SERVICIO TÉCNICO / CARGO DE RECEPCIÓN N° ${cab.codigo_servicio}`;

        let filasTabla = "";
        let totalGeneral = 0;

        if (detalleConceptos && detalleConceptos.length > 0) {
            detalleConceptos.forEach((item, idx) => {
                totalGeneral += parseFloat(item.subtotal) || 0;
                filasTabla += `
                    <tr>
                        <td style="text-align:center;">${idx + 1}</td>
                        <td style="text-align:center;">${item.tipo_concepto}</td>
                        <td>${item.descripcion}</td>
                        <td style="text-align:right;">S/ ${parseFloat(item.precio_unitario).toFixed(2)}</td>
                        <td style="text-align:center;">${item.cantidad}</td>
                        <td style="text-align:right; font-weight:bold;">S/ ${parseFloat(item.subtotal).toFixed(2)}</td>
                    </tr>`;
            });
        } else {
            filasTabla = `<tr><td colspan="6" style="text-align:center; color:#666;">Sin servicios o repuestos detallados.</td></tr>`;
        }
        let htmlImpresion = `<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
        <title>${cab.codigo_servicio} - COMPUCHICLAYO E.I.R.L.</title>
        <style>
            @page { size: A4; margin: 10mm; }
            body { font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #111; margin: 0; }
            .contenedor { width: 100%; border: 1.5px solid #000; box-sizing: border-box; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #000; padding: 4px 6px; vertical-align: middle; }
            .header-empresa { text-align: center; background-color: #f4f6f8; }
            .header-empresa h2 { margin: 2px 0; font-size: 14px; }
            .header-empresa p { margin: 2px 0; font-size: 10px; }
            .titulo-doc { background-color: #1f4e78; color: #fff; font-weight: bold; text-align: center; font-size: 12px; padding: 5px; }
            .seccion-titulo { background-color: #d9e1f2; font-weight: bold; text-align: center; font-size: 11px; padding: 3px; }
            .lbl { font-weight: bold; background-color: #f9f9f9; width: 15%; }
            .clausulas { font-size: 8.5px; line-height: 1.3; text-align: justify; padding: 6px 8px; }
            .clausulas p { margin: 3px 0; }
            .firma-box { height: 65px; vertical-align: bottom; text-align: center; font-weight: bold; }
            .pie-web { text-align: center; font-size: 10px; margin-top: 6px; font-weight: bold; color: #1f4e78; }
        </style></head><body>
        <div class="contenedor"><table>
            <tr><td colspan="4" class="header-empresa">
                <h2>20608326481 - COMPUCHICLAYO E.I.R.L.</h2>
                <p><strong>Dirección:</strong> Calle Juan Cuglievan # 848 - Chiclayo &nbsp;|&nbsp; <strong>Cel:</strong> 956 384 120 / <strong>WhatsApp:</strong> 997 656 025</p>
                <p><strong>Atención:</strong> Lunes a Sábados de 9:00 a.m. a 7:00 p.m.</p>
            </td></tr>
            <tr><td colspan="4" class="titulo-doc">${tituloDocumento}</td></tr>
            <tr><td class="lbl">Fecha Emisión:</td><td style="width:35%;">${cab.fecha_ingreso || ''}</td>
                <td class="lbl">Estado Actual:</td><td style="width:35%; font-weight:bold;">${cab.estado_servicio || ''}</td></tr>
            ${cab.codigo_cotizacion_origen ? `<tr><td class="lbl">Cotiz. Origen:</td><td colspan="3"><strong>${cab.codigo_cotizacion_origen}</strong></td></tr>` : ''}
            <tr><td colspan="4" class="seccion-titulo">DATOS DEL CLIENTE</td></tr>
            <tr><td class="lbl">DNI / RUC:</td><td>${cab.doc_num || ''}</td><td class="lbl">Celular / Telf.:</td><td>${cab.telefono || '---'}</td></tr>
            <tr><td class="lbl">Cliente / Raz.S.:</td><td>${cab.cliente_nombre || ''}</td><td class="lbl">E-mail:</td><td>${cab.correo || '---'}</td></tr>
            <tr><td class="lbl">Dirección:</td><td colspan="3">${cab.direccion || '---'}</td></tr>
            <tr><td colspan="4" class="seccion-titulo">DATOS DEL EQUIPO / PRODUCTO</td></tr>
            <tr><td class="lbl">Tipo / Marca:</td><td>${cab.tipo_equipo || ''} ${cab.marca || ''}</td><td class="lbl">Modelo:</td><td>${cab.modelo || '---'}</td></tr>
            <tr><td class="lbl">N° Serie (S/N):</td><td>${cab.numero_serie || '---'}</td><td class="lbl">Accesorios:</td><td>${cab.accesorios || 'Ninguno'}</td></tr>
            <tr><td class="lbl">Falla Reportada:</td><td colspan="3">${cab.falla_reportada || '---'}</td></tr>
            <tr><td class="lbl">Observación:</td><td colspan="3">${cab.observacion || '---'}</td></tr>
        </table>
        <table style="margin-top:-1px;">
            <tr><td colspan="6" class="seccion-titulo">DETALLE DE SERVICIOS Y REPUESTOS</td></tr>
            <tr style="background-color:#f2f2f2; font-weight:bold; text-align:center;">
                <td style="width:6%;">#</td><td style="width:14%;">Clasif.</td><td style="width:44%;">Descripción del Concepto / Repuesto</td>
                <td style="width:13%;">P. Unitario</td><td style="width:8%;">Cant.</td><td style="width:15%;">Subtotal</td>
            </tr>
            ${filasTabla}
            <tr><td colspan="5" style="text-align:right; font-weight:bold; background-color:#f9f9f9;">COSTO TOTAL S/</td>
                <td style="text-align:right; font-weight:bold; font-size:12px; background-color:#eef2f6;">S/ ${totalGeneral.toFixed(2)}</td></tr>
        </table>
        <table style="margin-top:-1px;">
            <tr><td colspan="3" class="seccion-titulo">CONDICIONES IMPORTANTES DEL SERVICIO</td></tr>
            <tr><td colspan="3" class="clausulas">
                <p><strong>COMPUCHICLAYO E.I.R.L., NO SE RESPONSABILIZA POR LA PÉRDIDA DE INFORMACIÓN EN SU EQUIPO, NI OTRO PROBLEMA QUE SURJA PRODUCTO DE LA ATENCIÓN BRINDADA. TODO EQUIPO CON MÁS DE 30 DÍAS PENDIENTE DE RECOJO SERÁ CONSIDERADO COMO MERCADERÍA EN ABANDONO, SIN OPCIÓN A RECLAMO.</strong></p>
                <p><strong>1.</strong> Horario de Atención: de lunes a sábado de 9:00 a.m. a 7:00 p.m. Domingos y feriados no hay atención.</p>
                <p><strong>2.</strong> En ningún caso COMPUCHICLAYO E.I.R.L. se responsabiliza por el software instalado en los productos del cliente (sistemas operativos, aplicativos o programas). En caso se reemplace el disco duro se cambiará la unidad y se instalará el sistema operativo; aplicativos adicionales son responsabilidad del cliente. El cliente confirma haber realizado copia de seguridad (backup) y exonera a COMPUCHICLAYO E.I.R.L. por pérdidas de información.</p>
                <p><strong>3.</strong> La garantía queda invalidada por: daño físico (quiñes, roturas, fisuras), etiquetas de serie removidas/adulteradas, intervención por terceros no autorizados, fluctuaciones eléctricas, manipulación inadecuada o elementos extraños (óxido, líquidos, insectos). No cubre consumibles (tintas, tóner, reveladores).</p>
                <p><strong>4.</strong> Durante la recepción no se determina al 100% las exclusiones de garantía; de hallarse alguna observación será comunicada vía email y/o WhatsApp solicitando aprobación del servicio facturable.</p>
                <p><strong>5.</strong> Notificado el cliente para recojo vía email/WhatsApp, tendrá 30 días máximos; pasado dicho plazo se aplicará tarifa de almacenaje diario de <strong>S/ 5.00</strong> por producto.</p>
                <p><strong>6.</strong> El cliente confirma la veracidad de su email/WhatsApp para notificaciones. Web: <strong>https://compuchiclayo.com</strong> | Buzón: <strong>serviciotecnico@compuchiclayo.com</strong></p>
            </td></tr>
            <tr><td class="firma-box" style="width:33%;">Estado del Servicio: ${cab.estado_servicio || ''}</td>
                <td class="firma-box" style="width:34%;">___________________________<br>Firma del Cliente</td>
                <td class="firma-box" style="width:33%;">___________________________<br>Firma del Técnico</td></tr>
        </table></div>
        <div class="pie-web">Calle Juan Cuglievan #848 – Chiclayo &nbsp;|&nbsp; ://compuchiclayo.com &nbsp;|&nbsp; Cel: 991 914 016</div>
        <script>
            window.onload = function () {
                window.print();
                window.onafterprint = function () { window.close(); };
            };
        <\/script>
        </body></html>`;

                let iframePrint = document.getElementById('iframe_impresion_st');
        if (!iframePrint) {
            iframePrint = document.createElement('iframe');
            iframePrint.id = 'iframe_impresion_st';
            iframePrint.style.position = 'fixed';
            iframePrint.style.width = '0';
            iframePrint.style.height = '0';
            iframePrint.style.border = '0';
            document.body.appendChild(iframePrint);
        }

        let docPrint = iframePrint.contentWindow.document;
        docPrint.open();
        docPrint.write(htmlImpresion);
        docPrint.close();

    });
}
//------------------------------------------------------------------------
// 11. VALIDACIONES ESTRICTAS DE DNI (8 DÍGITOS) Y RUC (11 DÍGITOS)
function configurarValidacionesDocumento() {
    $("#tipo_doc").change(function () {
        let esRuc = ($(this).val() === "RUC");
        let maxLen = esRuc ? 11 : 8;
        let actual = $("#dni_input").val().replace(/\D/g, '').slice(0, maxLen);
        $("#dni_input")
            .attr("maxlength", maxLen)
            .attr("placeholder", esRuc ? "11 dígitos (RUC)" : "8 dígitos (DNI)")
            .val(actual);
    });

    $("#dni_input").on("input", function () {
        let esRuc = ($("#tipo_doc").val() === "RUC");
        let maxLen = esRuc ? 11 : 8;
        let limpio = $(this).val().replace(/\D/g, '').slice(0, maxLen);
        $(this).val(limpio);
    });
}





