$(document).ready(function () {
    initInterfazInicio();
});

function initInterfazInicio(){
    // 20210301 obtener items del carrito
    obtenerTotalItemsCarrito(); 
    // 20210301 obtener items del carrito
    //obtenerTopProductos();
	// limpiar
	limpiarPaginaInicio();

	// 20240704 cargar buscador principal
	cargarPagina("app/store/buscador/CPModal-buscador-principal/cargar-buscador-principal", "divBuscadorPrincipal");
	// 20240620 cargar formulario iniciar sesion
	cargarPagina("app/store/publipages/CPModal-publicador-paginas/cargar-frm-iniciar-sesion", "divFormLoginUser");
	// 20240630 cargar catalogo de productos
	cargarPagina("app/store/catalogo/CPModal-comercio-productos/cargar-catalogo-productos", "divInicioTienda");
	// 20240713 cargar susbribir mail
	cargarPagina("app/store/publipages/CPModal-publicador-paginas/cargar-suscribir-mail", "divSuscribirMail");
};

// 20210301 obtener items del carrito
function obtenerTotalItemsCarrito(){
    witper_obtenerCantItemsCarrito(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			let cantItemsCar = datosDevuelto.cantItemsCar;
			let exito    	 = datosDevuelto.encontrado;
			//console.log(">>> obtenerTotalItemsCarrito-datosDevuelto: " + JSON.stringify(datosDevuelto));
			if (exito){
				//$("#countCar").html("("+cantItemsCar+")");
				$("#countCar").html(cantItemsCar);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener total items carritos", 2);
			console.log(">>> obtenerTotalItemsCarrito-errorLanzado: " + JSON.stringify(errorLanzado));
		}
    });
}

// 20220401 limpiar paigna inicio
function limpiarPaginaInicio(){
	$("#txtBuscar").val("");
	$("#txtBuscarCel").val("");
	$("#txtEmail").val("");
	$("#panelResultadoBusqueda").html("");
	$("#panelResultadoBusquedaCel").html("");
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------