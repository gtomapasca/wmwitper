$(document).ready(function () {
    initInterfaz();
});	

function initInterfaz(){
    obtenerUltimasPublicaciones();
};

// 20210302 obtener ultimas publicaciones
function obtenerUltimasPublicaciones(){
	witper_getLastPost(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("obtenerUltimasPublicaciones-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if (exito){
			mostrarResultadoPost(datos);
			}else{
			mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener las últimas publicaciones", 2);
		}
	});
}

function mostrarResultadoPost(datos){		
	var html =  '<div class="container>';
	html += '	    <div class="row text-center">';
	html += '		<h2>Blog</h2>';
	html += '		<h4>En nuestro Blog encontrarás nuestras últimas publicaciones.</h4>';
	html += '	    </div>';
	html += '	    <div class="row">';
	for(let item of datos){
		html += '	      <section class="col-md-3">';
		html += '		<article class="gtp-marg-blog thumbnail">';
		html += '		    <p><a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-articulo-sel/?page=10602&id='+item.cod_articulo+'\')"><img src="'+item.imagen_sm+'" class="img-responsive"></a></p>';
		html += '		    <p><b><a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-articulo-sel/?page=10602&id='+item.cod_articulo+'\')">'+item.titulo+'</a></b></p>';
		html += '		    <p>'+item.resumen+'<a href="javascript:cargarPagina(\'cli/principal/consultar/mostrar-articulo-sel/?page=10602&id='+item.cod_articulo+'\')">Leer más</a></p>';
		html += '		</article>';
		html += '	      </section>';
	}
	html += '	    </div>';
	html += '   </div>';
	$("#panelBlog").html(html);
};
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------
