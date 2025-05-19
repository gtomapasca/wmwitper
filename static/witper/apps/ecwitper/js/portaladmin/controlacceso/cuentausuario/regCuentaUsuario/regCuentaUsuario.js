/************************************************************************/
// 20191116 Degui: JS frmUsuarios
/************************************************************************/
$(document).ready(function () {
    obtenerListaUsuarios();
});	

//------------------------------------------------------------------------
function obtenerListaUsuarios(){
	witper_obtenerListaUsuarios(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			mostrarDatos(datos);
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
		}
	});
}
//------------------------------------------------------------------------
// 20191209 degui: mostrar datos de usuarios
function mostrarDatos(datos){
	let n = 0;
	let html = "<h1>Usuarios registrados</h1>";
	html += "<div class='boxNewUser'>";
	html += "<a id='linkNewUser' href='#'>Registrar nuevo usuario</a>";
	html += "</div>";
	html += "<table border='1'>";
	html +=	  "<tr>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Item</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>ID</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nick</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Email</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Celular</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Password</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nivel</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Tipo</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Estado</b></td>";
	html +=		"<td style='padding:5px; text-align:center;' colspan='2'><b>Opciones</b></td>";
	html +=	  "</tr>";
	for(let item of datos){
		html += "<tr>";
		html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.id_usuario+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.nick+"</td>";
		html += "<td style='padding:5px;'>"+item.email+"</td>";
		html += "<td style='padding:5px;'>"+item.cel+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.password+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.cod_nivel_usu+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.cod_tipo_usu+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.estado+"</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		html += "<a href='javascript:modificarUsuario("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
		html += "</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		html += "<a href='javascript:eliminarUsuario("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-trash'></i></a>";
		html += "</td>";
		html += "</tr>";
	}
	html += "</table><br />";
	$("#divListaUsuarios").html(html);

	//accion del boton nuevo
	$("#linkNewUser").click(function(e){
		$('#divListaUsuarios').toggle('hide');
		$('#divRegistrarUsuario').toggle('slow');
	});
}
//------------------------------------------------------------------------
// 20191115 Registrar usuarios
$('#btnRegistrarUsuario').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_registrarNuevoUsuario("#formUsuario", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   //console.log("response-regUsuario: " + JSON.stringify(datosDevuelto));
			   let exito = datosDevuelto.encontrado;
			   let mensj = datosDevuelto.mensaje;
			   let datos = datosDevuelto.datos;
			   if(exito && datos != 0){
				//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=21012");
				cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-controlacceso-cuentausuario-ctrl/ver/menu/?page=71101");
				mostrarMensaje("Se registro usuario correctamente", 1);
			   }else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			   }
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de registrar usuario", 2);
			}
		});
       	}else{
		mostrarMensaje("Disculpe, complete el formulario", 2);
		return false;
	}
});

// 20210517 modificar usuario
function modificarUsuario(item){
    //console.log("item.tipo: " + item.cod_tipo_usu);
    // setear datos
    $("#hid_idUsuario").val(item.id_usuario);
    $("#txtAvatarMod").val(item.avatar);
    $("#txtNickMod").val(item.nick);
    $("#txtEmailMod").val(item.email);
    $("#txtPasswordMod").val(item.password);
    $("#txtCelMod").val(item.cel);
    $("#selNivelMod").val(item.cod_nivel_usu).change();
    $("#selTipoMod").val(item.cod_tipo_usu).change();
    $("#selEstadoMod").val(item.estado).change();
    // Carga la pantalla de modificación
    $('#divListaUsuarios').toggle('hide');
    $('#divModificarUsuario').toggle('slow');
    
}

// 20191115 Registrar usuarios
$('#btnModificarUsuario').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_modificarUsuario("#formUsuarioMod", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   //console.log("response-modUsuario: " + JSON.stringify(datosDevuelto));
			   let exito = datosDevuelto.encontrado;
			   let mensj = datosDevuelto.mensaje;
			   let datos = datosDevuelto.datos;
			   if(exito && datos != 0){
				//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=21012");
				cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-controlacceso-cuentausuario-ctrl/ver/menu/?page=71101");
				mostrarMensaje("Se actualizo correctamente", 1);
			   }else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
			   }
			}else{
				mostrarMensaje("Disculpe, existi&oacute; un problema al tratar de actualizar usuario", 2);
			}
		});
       	}else{
		mostrarMensaje("Disculpe, complete el formulario", 2);
		return false;
	}
});

// 20210517 eliminar usuario
function eliminarUsuario(item){
    witper_eliminarUsuario(item, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("eliminarUsuario-response: " + JSON.stringify(datosDevuelto));
	   let exito 	= datosDevuelto.encontrado;
	   let mensj 	= datosDevuelto.mensaje;
	   let datos 	= datosDevuelto.datos;
	   if(exito){
		//cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=21012");
		cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-controlacceso-cuentausuario-ctrl/ver/menu/?page=71101");
		mostrarMensaje("Se elimino usuario", 1);
	   }else{
		mostrarMensaje("Disculpe, no se pudo realizar la &uacute;ltima operación", 2);
	   }
	}else{
		mostrarMensaje("Disculpe, existi&oacute; un problema", 2);
	}
    });
}
//------------------------------------------------------------------------
function validarFormulario(){
	let validar = true;
	let nick = $('#txtNick').val();
	console.log(">>> nick: " + nick);
	if(nick == ""){
		console.log(">>> nick false");
		validar = false;
	}
	return validar;
}
//------------------------------------------------------------------------
// 20191213 Cancelar Modificar
$('#btnCancelarModUsu').click(function(){
	$('#divModificarUsuario').toggle('hide');
	$('#divListaUsuarios').toggle('slow');
});
//------------------------------------------------------------------------
// 20191213 Cancelar Registrar
$('#btnCancelarRegUsu').click(function(){
	$('#divRegistrarUsuario').toggle('hide');
	$('#divListaUsuarios').toggle('slow');
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
