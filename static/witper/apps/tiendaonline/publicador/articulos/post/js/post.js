$(document).ready(function () {
    initInterfaz();
});	

function initInterfaz(){
    let cod_post = $("#codpost").attr("data-codpost");
    obtenerPostSeleccionado(cod_post);
	obtenerComentariosPost(cod_post);
};

// 20261021 obtener post seleccionado
function obtenerPostSeleccionado(codPost){
	witper_getPostSeleccionado(codPost, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("obtenerPostSeleccionado-response: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito && datos != 0){
				mostrarResultadoPost(datos);
			}else{
				mostrarMensaje(mensj, 2);
			}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al obtener post seleccionado", 2);
			console.log(">>> cli-obtenerPostSeleccionado-errorLanzado: " + JSON.stringify(errorLanzado));
		}
	});
}

function mostrarResultadoPost(datos){		
	let item = datos[0];
	let html =  '<article id="contenidopost">';
	html += '   <h1 style="padding:5px; color:003366;">' + item.titulo + '</h1>';
	html += '   <p><img src="' + item.imagen_xl + '" class="img-responsive"></p>';
	html += '   <p><b>Por:</b> ' + item.nombres + ' ' + item.ape_pat + ' ' + item.ape_mat + '</p>';
	html += '   <p><b>Fecha:</b> ' + item.fecha_creacion + '</p>';
	html += '   <h5>' + item.contenido + '</h5>';
	html += '   </article>';
	$("#panelPost").html(html);
};

// 20210302 obtener comentarios de publicacion
function obtenerComentariosPost(cod_post){
    witper_getCommentPost(cod_post, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
		//console.log("obtenerComentariosPost-response: " + JSON.stringify(datosDevuelto));
		let exito = datosDevuelto.encontrado;
		let datos = datosDevuelto.datos;
		if(exito && datos != 0){
		   let datos = datosDevuelto.datos;
		   mostrarComentarios(datos);
		}
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema al obtener comentarios post", 2);
		console.log(">>> cli-obtenerComentariosPost-errorLanzado: " + JSON.stringify(errorLanzado));
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
	let jsonDataForm = getJsonDataForm();
    witper_setCommentPost(jsonDataForm, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   	//console.log("grabarComentario-response: " + JSON.stringify(datosDevuelto));
	   	let tip = datosDevuelto.tip;
		let msj = datosDevuelto.msj;
		let val = datosDevuelto.val;
	   	if(val){
			limpiar();
			obtenerComentariosPost(jsonDataForm.codPost);
		}else{
			if(tip == "A"){
				mostrarMensaje(datosDevuelto.msj, 2);
				console.log(">>> validarDatosBackend-Validar: " + msj);
			}else if(tip == "E"){
				mostrarMensaje("Error: " + datosDevuelto.msj, 2);
				console.log(">>> validarDatosBackend-Error: " + msj);
			}
	   	}
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema grabar comentario", 2);
		console.log(">>> cli-grabarComentario-errorLanzado: " + JSON.stringify(errorLanzado));
	}
    });
}

function getJsonDataForm(){
        return {
			codUsuario  : 	'24',
			codPost  	: 	$("#hdCodPost").val(),
			nick  		: 	$("#txtNick").val(),
			comentario 	: 	$("#txtComentario").val()
		};
    };
//-------------------------------------------------------------------------------------
// 20220502 para desplazar hacía arriba
window.scroll(0,0);
//-------------------------------------------------------------------------------------