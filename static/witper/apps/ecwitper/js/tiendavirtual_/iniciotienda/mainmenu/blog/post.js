$(document).ready(function () {
    initInterfaz();
});	

function initInterfaz(){
    let cod_post = $("#codpost").attr("data-codpost");
    obtenerComentariosPost(cod_post);
};
//-------------------------------------------------------------------------------------
// 20210302 obtener comentarios de publicacion
function obtenerComentariosPost(cod_post){
    witper_getCommentPost(cod_post, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	        console.log("obtenerComentariosPost-response: " + JSON.stringify(datosDevuelto));
		let exito = datosDevuelto.encontrado;
		if (exito){
		   let datos = datosDevuelto.datos;
		   mostrarComentarios(datos);
		}
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al obtener comentarios post", 2);
	}
    });
}

function mostrarComentarios(datos){		
	let html =  '<div class="container>';
	html += '	    <div class="row text-center">';
	html += '		<h3>Comentarios</h3>';
	html += '	    </div>';
	for(let item of datos){
		html += '<div class="row">';
		html += '	<div class="col-md-10">';
		html += '	     <div class="gtp-marg-blog thumbnail">';
		html += ' 	     	<div class="row">';
		html += '  		   <div class="col-md-2 col-xs-4">';
		html += '		        <img src="'+item.avatar+'" class="img-responsive">';
		html += '   		   </div>';
		html += '   		   <div class="col-md-10 col-xs-8">';
		html += '		   	<p><b>Por: </b>'+item.nick+'</p>';
		html += '			<p><b>Fecha: </b>'+item.fecha_creacion+'</p>';
		html += '			<h5>'+item.comentario+'</h5>';
		html += '   		   </div>';
		html += ' 		</div>';
		html += '	     </div>';
		html += '	</div>';
	    	html += '</div>';
	}
	html += '   </div>';
	$("#panelComentarios").html(html);
};
//-------------------------------------------------------------------------------------
// Grabar comentarios
$('#btnComentar').click(function() {
   let nick = $("#txtNick").val();
   let comentario = $("#txtComentario").val();
   if(nick.trim().length <= 0){
	mostrarMensaje("Ingrese nick", 0);
	return false;
   }else
   if(comentario.trim().length <= 0){
	mostrarMensaje("Ingrese su comentario", 0);
	return false;
   }
   else{
	grabarComentario();
	return false;
   }
});

function limpiar(){
	$("#txtNick").val("");
	$("#txtComentario").val("");
}

// 20210302 grabar comentario de publicacion
function grabarComentario(){
    witper_setCommentPost("#frmComentarioPost", function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("grabarComentario-response: " + JSON.stringify(datosDevuelto));
	   let exito = datosDevuelto.encontrado;
	   let mensj = datosDevuelto.mensaje;
	   let datos = datosDevuelto.datos;
	   if(exito){
		limpiar();
		obtenerComentariosPost(datos.codPost);
	   }else{
		mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema grabar comentario", 2);
	}
    });
}
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------