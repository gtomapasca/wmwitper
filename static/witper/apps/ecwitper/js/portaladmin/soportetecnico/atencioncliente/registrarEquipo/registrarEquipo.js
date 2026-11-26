/****************========================================================****************/
// 20261106 Controlador Modular JS: Modal de Registro Rápido de Equipos
/****************========================================================****************/

$(document).ready(function () {
    inicializarModalEquipo();
});

//------------------------------------------------------------------------
// Función Principal: Coordina las acciones internas del modal flotante de dispositivos
function inicializarModalEquipo() {
    configurarEventosCierreEquipo();
    configurarEnvioEquipoRapido();
}

//------------------------------------------------------------------------
// Función: Controla el cierre y limpieza del formulario al cancelar o cerrar
function configurarEventosCierreEquipo() {
    // Captura el clic en la X de la cabecera o en el botón Cancelar
    $("#btn_cerrar_modal_equipo, #btn_cancelar_modal_equipo").click(function (e) {
        e.preventDefault();
        
        // Oculta el modal cambiando el estado visual a través de CSS
        $("#modalEquipo").hide();
        
        // Limpia el formulario para borrar la caché de datos introducidos
        $("#form_nuevo_equipo").reset();
        console.log("Modal de equipo cerrado y formulario limpiado.");
    });
}

//------------------------------------------------------------------------
// Función: Prepara el envío de los datos enlazándolo con las funciones nativas del core
function configurarEnvioEquipoRapido() {
    $("#form_nuevo_equipo").submit(function (e) {
        e.preventDefault();
        
        console.log("Iniciando proceso de guardado de dispositivo rápido...");
        
        /* 
           Aquí se acoplará la función nativa del core de tu proyecto:
           witper_registrarNuevoEquipo("#form_nuevo_equipo", function(errorLanzado, datosDevuelto){
               // Lógica para cargar el nuevo equipo en el selector principal tras el éxito
           });
        */
        
        alert("Operación simulada: Dispositivo registrado exitosamente bajo el estándar de wmwitper.");
        $("#modalEquipo").hide();
        $("#form_nuevo_equipo").reset();
    });
}
