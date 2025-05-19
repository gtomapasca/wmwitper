/************************************************************************/
// 20191010 Degui: Funciones java script - jquery de uso general
/************************************************************************/
// mensaje flotante
function mostrarMensaje(msj, tipo){
	$("#myModal").remove();
	$("body").append(
		'<div class="modal fade" id="myModal" role="dialog">'
			+'<div class="modal-dialog">'
				+'<div class="modal-content">'
					+'<div class="modal-header">'
					+'	<button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Mensaje</h4>'
					+'</div>'
					+'<div class="modal-body">'
					+				'<div class="row">'
		+					'<div class="col-md-1"><i class="fa fa-info-circle" style="font-size:45px; color:gray;"></i></div>'
		+					'<div class="col-md-11">'+msj+'</div>'
		+				'</div>'
					+'</div>'
					+'<div class="modal-footer">'
					+'	<button type="button" class="btn btn-primary" id="dlgBtnAceptarConfirm">Aceptar</button>'
					+'</div>'
				+'</div>'
			+'</div>'
		+'</div>'
	);
	$("#dlgBtnAceptarConfirm").click(function(e){
		$('#myModal').modal('hide');
	});
	$('#myModal').modal('show');
};
//------------------------------------------------------------------------
// 20191008 menu accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------
// 20210301 carga una pagina en general
function cargarPaginaSel(uri){
	witper_getPageSel(uri, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("verPagina: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito){
			$("#Cpanel-contenido").html(datos);
		   }else{
			$("#Cpanel-contenido").html("<h2>Error de Sistema</h2><h4>Disculpe, no se encontro la página, consulte con el administrador de sistemas.</h4>");
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar la opción seleccionada.", 2);
		}
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
