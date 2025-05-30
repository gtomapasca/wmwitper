/************************************************************************/
// 20210523 Degui: JS Clientes
/************************************************************************/
$(document).ready(function () {
    listarPedidos();
});	
//------------------------------------------------------------------------
// 20210524 Listar productos tienda
function listarPedidos(){
	witper_listarPedidos(null, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response-listarPedidos: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			mostrarDatos(datos);
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema en listar pedidos", 2);
		}
	});
}
//------------------------------------------------------------------------
// 20210523 degui: mostrar datos de pedidos
function mostrarDatos(datos){
	let n = 0;
	let html = "<h1>Pedidos registrados</h1>";
	html += "<div class='boxFormReg'>";
	//html += "<a id='linkNewClient' href='#'>Registrar nuevo cliente</a>";
	html += "</div>";
	html += "<table border='1'>";
	html +=	  "<tr>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Item</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Nro Pedido</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>DNI</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Cliente</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Celular</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Email</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Dirección</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Estado</b></td>";
	html +=		"<td style='padding:5px; text-align:center;'><b>Fecha Reg.</b></td>";
	html +=		"<td style='padding:5px; text-align:center;' colspan='2'><b>Opciones</b></td>";
	html +=	  "</tr>";
	for(let item of datos){
		html += "<tr>";
		html += "<td style='padding:5px; text-align:center;'>"+(++n)+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.carrito_nropedido+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.carrito_dni+"</td>";
		html += "<td style='padding:5px;'>"+item.carrito_cliente+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.carrito_celular+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.carrito_email+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.carrito_direccion+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.estado+"</td>";
		html += "<td style='padding:5px; text-align:center;'>"+item.fecha_reg+"</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		//html += "<a href='javascript:modificarCliente("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-Edit'></i></a>";
		html += "</td>";
		html += "<td style='padding:5px; text-align:center;'>";
		//html += "<a href='javascript:eliminarCliente("+JSON.stringify(item)+")'><i class='glyphicon glyphicon-trash'></i></a>";
		html += "</td>";
		html += "</tr>";
	}
	html += "</table><br />";
	$("#divListarItems").html(html);

	//accion del boton nuevo
	$("#linkNewClient").click(function(e){
		$('#divListarClientes').toggle('hide');
		$('#divRegistrarClientes').toggle('slow');
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
