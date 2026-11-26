/****************========================================================****************/
// 20261106 Controlador Modular JS: Registro de Servicio Técnico (Parte 1)
/****************========================================================****************/

$(document).ready(function () {
    inicializarFormularioServicio();
});

//------------------------------------------------------------------------
// Función Principal: Coordina el arranque de los componentes del formulario
function inicializarFormularioServicio() {
    establecerFechaEmisionActual();
    configurarSelectorConceptos();
}

//------------------------------------------------------------------------
// Función: Inicializa la fecha y hora del sistema en el formato requerido por el navegador
function establecerFechaEmisionActual() {
    let fechaActual = new Date();
    
    // Ajuste de desfase horario para obtener formato YYYY-MM-DDTHH:mm
    let anio = fechaActual.getFullYear();
    let mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
    let dia = String(fechaActual.getDate()).padStart(2, '0');
    let horas = String(fechaActual.getHours()).padStart(2, '0');
    let minutos = String(fechaActual.getMinutes()).padStart(2, '0');
    
    let fechaFormateada = `${anio}-${mes}-${dia}T${horas}:${minutos}`;
    $("#fecha_ingreso_editable").val(fechaFormateada);
}

//------------------------------------------------------------------------
// Función: Conmuta dinámicamente los sub-paneles de Servicio o Producto
function configurarSelectorConceptos() {
    $("#select_cambio_tipo").change(function () {
        let tipoConcepto = $(this).val();
        
        if (tipoConcepto === "Servicio") {
            // Muestra los campos para seleccionar servicios/tareas y oculta repuestos
            $("#sub_campos_producto").hide();
            $("#sub_campos_servicio").css("display", "flex");
        } else if (tipoConcepto === "Producto") {
            // Muestra los campos para buscar repuestos y oculta servicios
            $("#sub_campos_servicio").hide();
            $("#sub_campos_producto").css("display", "flex");
        } else {
            // Si no hay selección válida, oculta ambos sub-paneles
            $("#sub_campos_servicio").hide();
            $("#sub_campos_producto").hide();
        }
    });
}
//------------------------------------------------------------------------
// Función: Configura las acciones finales de grabación y limpieza del formulario
function configurarAccionesFormulario() {
    // Acción del botón Grabar Ingreso
    $("#btn_grabar_ingreso").click(function () {
        console.log("Iniciando proceso de grabación del servicio técnico...");
        /* 
           Aquí se integrará la función del core PHP por similitud a ventas:
           witper_registrarServicioTecnico("#formServicio", function(error, datos){ ... });
        */
        alert("Operación simulada: Los datos de la orden técnica han sido empaquetados bajo el estándar modular de wmwitper.");
    });

    // Acción del botón Limpiar Formulario
    $("#btn_limpiar_formulario").click(function () {
        // Reinicia inputs y selectores estándar
        $("#dni_input, #nombre_cliente, #info_modelo, #info_serie, #falla_input, #observaciones_input").val("");
        $("#select_comprobante, #tipo_doc").val($("#select_comprobante option:first").val());
        
        // Restablece selectores dinámicos deshabilitados por defecto
        $("#select_equipo, #select_cambio_tipo, #select_estado_servicio").val("").prop("disabled", true);
        
        // Sincroniza paneles dinámicos y restablece fecha actual
        $("#select_cambio_tipo").trigger("change");
        establecerFechaEmisionActual();
        
        console.log("Formulario de registro restablecido limpiamente.");
    });
}

//------------------------------------------------------------------------
// Función: Placeholder funcional para la grilla de conceptos acumulados
function administrarGrillaConceptos() {
    console.log("Manejador modular de grilla de conceptos inicializado correctamente.");
    /* 
       Aquí residirán las funciones de empuje dinámico para la tabla:
       function agregarFilaConcepto(datos) { ... }
       function calcularTotalesServicio() { ... }
    */
}
