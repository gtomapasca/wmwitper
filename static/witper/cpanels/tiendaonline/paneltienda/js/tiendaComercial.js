/************************************************************************/
// Funciones js page principal
// Degui
// 20200704
/************************************************************************/
$(document).ready(function () {
    initInterfazPrincipal();
});	

function initInterfazPrincipal(){
    // 20210722 cargar página seleccionada
    cargarPaginaSeleccionada();
};

function cargarPaginaSeleccionada(){
    let opcion = $("#box-contenido-principal").attr("data-opcion");
    let clave = $("#box-contenido-principal").attr("data-clave");
    let valor = $("#box-contenido-principal").attr("data-valor");
    // cargar pagina inicio
    if(opcion == "inicio"){
		cargarPagina("cpanel/store/commerce/menu-comercio-productos/opcion-inicio");
    }
	// cargar pagina producto con datos del producto seleccionado
	else if(opcion == "producto"){
		//cargarPagina("app/store/catalogo/consultar-catalogo-productos/cargar-producto-sel/?mc="+valor);
		cargarPagina("app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc="+valor);
    }else if(opcion == "ofertas"){
		//cargarPagina("cpanel/store/catalogo/menu-store/opcion-ofertas");
		cargarPagina("app/store/publipages/CPModal-publicador-paginas/cargar-oferta-productos");
	}
};
//------------------------------------------------------------------------
//------------------------------------------------------------------------
/* 20210625 Para fijar la cabecera */
$(window).scroll(function() {    
    posicionarCabecera();
});
 
function posicionarCabecera() {
    //console.log(">>> ancho: " + screen.width );
    if (screen.width <= 800) {
		//console.log(">>> ancho: <= 770");
		var altura_header_cel_top = $('.header-cel-top').outerHeight(true);
		var altura_header_cel_central = $('.header-cel-central').outerHeight(true);
		if ($(window).scrollTop() >= altura_header_cel_top){
			$('.header-cel-central').addClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', (altura_header_cel_central - altura_header_cel_top) + 'px');
		} else {
			$('.header-cel-central').removeClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', '0');
		}
    }else if (screen.width > 800){
		//console.log(">>> ancho: > 770");
		var altura_header_principal_info = $('.header-principal-info').outerHeight(true);
		var altura_header_principal_central = $('.header-principal-central').outerHeight(true);
		//console.log(">>> altura_header_principal_info: " + altura_header_principal_info);
		//console.log(">>> altura_header_principal_central: " + altura_header_principal_central);
		if ($(window).scrollTop() >= altura_header_principal_info){
			$('.header-principal-central').addClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', (altura_header_principal_central - altura_header_principal_info) + 'px');
		} else {
			$('.header-principal-central').removeClass('fijar-heder-principal');
			$('.contenido-principal').css('margin-top', '0');
		}
    }
}

//-------------------------------------------------------------------------------------
// 20220127 Degui: Menu categoria
function aMenuCategoria() {
	$("#myMenuCategoriaContent").css("display", "none");
}
$("#myMenuCategoriaBtn").mouseenter(function(evento){
	$("#myMenuCategoriaContent").css("display", "block");
}); 
$("#myMenuCategoriaBtn").mouseleave(function(e){
	$("#myMenuCategoriaContent").css("display", "none");
}); 
$("#myMenuCategoriaContent").mouseenter(function(evento){
	$("#myMenuCategoriaContent").css("display", "block");
}); 
$("#myMenuCategoriaContent").mouseleave(function(e){
	$("#myMenuCategoriaContent").css("display", "none");
}); 
//------------------------------------------------------------------------
// 20220327 Degui: Menu categoria Cel
function aMenuCategoriaCel() {
	$("#myMenuCategoriaContentCel").css("display", "none");
}
$("#myMenuCategoriaBtnCel").mouseenter(function(evento){
	$("#myMenuCategoriaContentCel").css("display", "block");
}); 
$("#myMenuCategoriaBtnCel").mouseleave(function(e){
	$("#myMenuCategoriaContentCel").css("display", "none");
}); 
$("#myMenuCategoriaContentCel").mouseenter(function(evento){
	$("#myMenuCategoriaContentCel").css("display", "block");
}); 
$("#myMenuCategoriaContentCel").mouseleave(function(e){
	$("#myMenuCategoriaContentCel").css("display", "none");
}); 
