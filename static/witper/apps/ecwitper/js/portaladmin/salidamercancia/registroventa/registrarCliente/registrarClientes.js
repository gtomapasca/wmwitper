/************************************************************************/
// 20210523 Degui: JS Clientes
/************************************************************************/
$(document).ready(function () {
    listarClientes();
});	
//------------------------------------------------------------------------
// 20210523 Listar Clientes
function listarClientes(){
	witper_listarClientes(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-listarClientes: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			mostrarDatos(datos);
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al listar clientes", 2);
		}
	});
}
//------------------------------------------------------------------------
// 20210523 degui: mostrar datos de cliente
function mostrarDatos(datos){
	let n = 0;
	let html = "<h1>Clientes registrados</h1>";
	html += "<div class='boxFormReg'>";
	//html += "<a id='linkNewClient' href='#'>Registrar nuevo cliente</a>";
	html += "</div>";
	html += "<table border='1'>";
	html +=	  "<tr>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Item</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>ID</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Tip Doc</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Num Doc</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Fecha Nac.</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nombres</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Ap. Paterno</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Ap. Materno</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Celular</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Email</b></td>";
	html +=		"<td style='padding:5px; text-align:center;' colspan='2'><b>Opciones</b></td>";
	html +=	  "</tr>";
	for(let item of datos){
		html += "<tr>";
		html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.id_ctapersona+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.doc_tip+"</td>";
		html += "<td style='padding:5px;'>"+item.doc_num+"</td>";
		html += "<td style='padding:5px;'>"+item.fecha_nac+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.nombres+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.ape_pat+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.ape_mat+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.celular+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.email+"</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		//html += "<a href='javascript:modificarCliente("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
		html += "</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		//html += "<a href='javascript:eliminarCliente("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-trash'></i></a>";
		html += "</td>";
		html += "</tr>";
	}
	html += "</table><br />";
	$("#divListarClientes").html(html);

	//accion del boton nuevo
	$("#linkNewClient").click(function(e){
		$('#divListarClientes').toggle('hide');
		$('#divRegistrarClientes').toggle('slow');
	});
}
//------------------------------------------------------------------------
// 20210523 Registrar clientes
$('#btnRegistrarCliente').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_registrarNuevoCliente("#formCliente", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   //console.log("response-regUsuario: " + JSON.stringify(datosDevuelto));
			   let exito = datosDevuelto.encontrado;
			   let mensj = datosDevuelto.mensaje;
			   let datos = datosDevuelto.datos;
			   if(exito && datos != 0){
				cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=41051");
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

// 20210523 modificar cliente
function modificarCliente(item){
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
    $('#divListarClientes').toggle('hide');
    $('#divModificarClientes').toggle('slow');
    
}

// 20210523 Registrar cliente
$('#btnModificarCliente').click(function(){
	//let validar = validarFormulario();
	let validar = true;
	if(validar){
		witper_modificarCliente("#formClienteMod", function(errorLanzado, datosDevuelto){
			if(errorLanzado == null){
			   //console.log("response-modUsuario: " + JSON.stringify(datosDevuelto));
			   let exito = datosDevuelto.encontrado;
			   let mensj = datosDevuelto.mensaje;
			   let datos = datosDevuelto.datos;
			   if(exito && datos != 0){
				cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=41051");
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

// 20210523 eliminar cliente
function eliminarCliente(item){
    witper_eliminarCliente(item, function(errorLanzado, datosDevuelto){
	if(errorLanzado == null){
	   //console.log("eliminarUsuario-response: " + JSON.stringify(datosDevuelto));
	   let exito 	= datosDevuelto.encontrado;
	   let mensj 	= datosDevuelto.mensaje;
	   let datos 	= datosDevuelto.datos;
	   if(exito){
		cargarPaginaSel("ecwitper-site-portaladmin/ecwitper-menu-principal-control/ver/menu/?page=41051");
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
// 20210523 Cancelar Modificar
$('#btnCancelarModCli').click(function(){
	$('#divModificarClientes').toggle('hide');
	$('#divListarClientes').toggle('slow');
});
//------------------------------------------------------------------------
// 20210523 Cancelar Registrar
$('#btnCancelarRegCli').click(function(){
	$('#divRegistrarClientes').toggle('hide');
	$('#divListarClientes').toggle('slow');
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
