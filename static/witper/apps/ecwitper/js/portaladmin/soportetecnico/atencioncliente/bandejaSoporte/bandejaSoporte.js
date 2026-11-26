/****************========================================================****************/
// 20261106 Controlador Modular JS: Bandeja de Soporte Técnico (Parte 1)
/****************========================================================****************/

$(document).ready(function () {
    inicializarBandejaSoporte();
});

//------------------------------------------------------------------------
// Función Principal: Inicializa los oyentes y carga de datos base
function inicializarBandejaSoporte() {
    configurarFiltrosConmutables();
    configurarTransicionNuevoServicio();
    listarOrdenesTecnicas();
}

//------------------------------------------------------------------------
// Función: Maneja los estados visibles de forma conmutable según el comprobante
function configurarFiltrosConmutables() {
    $("#filtro_comprobante").change(function () {
        let tipoComprobante = $(this).val();
        
        if (tipoComprobante === "COTIZACION") {
            // Oculta estados del taller y activa estados rígidos de cotización
            $("#contenedor_estado_servicio").hide();
            $("#contenedor_estado_cotizacion").css("display", "flex");
        } else {
            // Por defecto (SERVICIO): Activa estados de taller y oculta cotizaciones
            $("#contenedor_estado_servicio").css("display", "flex");
            $("#contenedor_estado_cotizacion").hide();
        }
    });

    // Evento para el botón Limpiar filtros
    $("#btn_limpiar_filtros").click(function () {
        // Restablece el formulario nativo mediante jQuery
        $("#form_filtros_historial")[0].reset();
        // Dispara manualmente el cambio para resincronizar los contenedores visuales
        $("#filtro_comprobante").trigger("change");
    });
}
//------------------------------------------------------------------------
// Función: Maneja la transición asíncrona (SPA) al presionar "Nuevo"
function configurarTransicionNuevoServicio() {
    $("#btn_ir_nuevo").click(function (e) {
        e.preventDefault();
        
        console.log("Transición modular SPA iniciada...");
        
        /* 
           En el entorno de producción de wmwitper, aquí se llama a:
           cargarPaginaSel("ecwitper-site-portaladmin/.../registrarServicio/");
           
           Para tus pruebas visuales e integración local en caliente, 
           activamos esta alerta que confirma el ruteo correcto:
        */
        alert("Flujo SPA Modular: Interceptado correctamente. Tu framework limpiará este contenedor e inyectará 'registrarServicio/frmRegistrarServicioTecnico.html' de forma asíncrona.");
    });
}

//------------------------------------------------------------------------
// Función: Carga el historial inicial imitando el estándar de wmwitper
function listarOrdenesTecnicas() {
    /* 
       Aquí se acoplará la función del core PHP cuando conectemos el backend:
       witper_listarOrdenesTecnicas(null, function(errorLanzado, datosDevuelto){ ... });
    */
    console.log("Bandeja de soporte lista para consumir datos del servidor...");
}
