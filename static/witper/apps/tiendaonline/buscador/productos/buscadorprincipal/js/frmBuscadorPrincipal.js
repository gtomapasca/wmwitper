/************************************************************************/
// Funciones javascript - Buscador Principal
/************************************************************************/

var clsBuscadorPrincipal = function() {

    this.forms = {
		formPrincipal  	: 	{ id: 'frmBuscadorPrincipal' }
    };

	this.inputs = {
        busqueda  		: 	{ id: 'txtBuscar' }
    };

    this.botones = {
        buscar : { id: 'btnBusquedaProductos' }
    };

    this.iniciarForm = function(){
		//console.log(">>> iniciarBuscadorForm...");
        var refCls = this;
		this.limpiarForm();
		$("#" + this.botones.buscar.id).click(function(){
            refCls.onClickBtnBuscar();
        });
		$("#" + this.inputs.busqueda.id).keyup(function(e){
			//console.log(">>> Buscador > presiono tecla: " + e.keyCode);
            if (e.keyCode === 13) {
				console.log(">>> Buscador > presiono enter...");
				refCls.onClickBtnBuscar();
			}else{
				refCls.iniciarBusqueda(0);
			}
        });
    };

	this.getJsonDataForm = function(){
        return {
			categoria	:	"0",
			busqueda  	: 	$("#" + this.inputs.busqueda.id).val()
		};
    };

	this.onClickBtnBuscar = function () {
		console.log(">>> onClickBtnBuscar...");
		let refCls = this;
		var isFormValido = $("#" + this.forms.formPrincipal.id).valid();
		// validar formulario
		if(isFormValido){
			// valiadar datos ingresados
			if(this.validarDatosFormEnd()){
				//refCls.iniciarBusqueda();
				$("#panelResultadoBusqueda").html('<div></div>');
				//cargarPagina('cpanel/store/catalogo/menu-store/opcion-resultado-busqueda');
				//cargarPagina('app/store/buscador/CPModalBuscadorPrincipal/cargar-resultado-busqueda', "divInicioTienda");
				//this.mostrarResuladoBusquedaTienda();
				refCls.iniciarBusqueda(1);
			}
		}
	};

	this.validarDatosFormEnd = function () {
		// validar búsqueda
		var busqueda =  $("#" + this.inputs.busqueda.id).val().trim();
		if(busqueda.length < 1){
			mostrarMensaje("Ingrese dato para la b&uacute;squeda", 2);
			return false;
		}
		return true;
	};

	// 20240704 iniciar búsqueda
	this.iniciarBusqueda = function (op) {
		console.log(">>> iniciarBusqueda-op: " + op);
		let refCls = this;
		let jsonDataForm = this.getJsonDataForm();
		//console.log(">>> iniciarBusqueda-jsonDataForm: " + JSON.stringify(jsonDataForm));
		utils_iniciarBusqueda(jsonDataForm, function(datosDevuelto){
			//console.log("utils_iniciarBusqueda-response: " + JSON.stringify(datosDevuelto));
			let tip = datosDevuelto.tip;
			let msj = datosDevuelto.msj;
			let val = datosDevuelto.val;
			let datos = datosDevuelto.datos;
			if(val){
				if(op == 0){
					refCls.mostrarResuladoBusquedaWeb(datos);
				}else if(op == 1){
					refCls.mostrarResuladoBusquedaTienda(datos);
				}
			}else{
				if(tip == "A"){
					mostrarMensaje(msj, 2);
					console.log(">>> utils_iniciarBusqueda-Advertencia: " + msj);
				}else if(tip == "E"){
					$("#panelResultadoBusqueda").html('<div></div>');
					mostrarMensaje("Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo", 2);
					console.log(">>> utils_iniciarBusqueda-Error: " + msj);
				}else{
					mostrarMensaje("Disculpe, no se pudo realizar la &uacute;ltima operaci&oacute;n. Consulte con el webmaster. ", 2);
				}
			}
		});
	};

	// muestra el resultado en el mismo buscador
	this.mostrarResuladoBusquedaWeb = function(datos){
		console.log(">>> mostrarResuladoBusquedaWeb...");
		let html = '';
		html += '<div style="position:absolute;background-color:#fff;width:510px;border:1px solid #ddd;z-index:100;">';
		html += this.prepararResuladoBusquedaWeb(datos);
		html += '</div>';
		$("#panelResultadoBusqueda").html(html);
	};

	this.prepararResuladoBusquedaWeb = function(datos){
		let html = '';
		let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:lowercase;';
		if(datos == 0){
			html += '	 <div></div>';
		}else{
			for(let item of datos){
				html += '<div class="1row" style="overflow:hidden;_height:1%;1border:1px solid #000;">';
				html += '	<div style="padding:10px;1border:2px solid green;">';
				//html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusquedaWeb(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
				html += '	    <a style="'+style+'" href="javascript:objBuscadorPrincipal.mostrarProductoBusquedaWeb(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
				html += '	</div>';
				html += '</div>';
			}
		}
		return html;
	};	

	// Muestra producto seleccionado del resultado de la búsqueda
	this.mostrarProductoBusquedaWeb = function(mc){
		// carga la pagina de producto
		//cargarPagina("app/store/catalogo/consultar-catalogo-productos/cargar-producto-sel/?mc="+mc);
		cargarPagina("app/store/catalogo/CPModal-comercio-productos/cargar-producto-sel/?mc="+mc);
		// limpia los datos de busqueda
		$("#panelResultadoBusqueda").html('<div></div>');
		$("#panelResultadoBusquedaCel").html('<div></div>');
		$('#myModalOne').modal('hide');
		$("#txtBuscar").val("");
		$("#txtBuscarCel").val("");
		$("#selCategoria").val(0);
	};

	this.mostrarResuladoBusquedaTienda = function(datos){
		console.log(">>> mostrarResuladoBusquedaTienda...");
		//console.log("datos: " + datos);
		//let uri_wwwstore = '../../../../static/witper/';
		// 20231025 Degui: Se cambia ruta de upload imagen
		let ruta_raiz 	= '/static/witper/';
		let ruta_upload = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';	
		let html = '';
		//let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:lowercase;';
		let style = 'text-decoration:none;font-weight:bold;color:#5D6D7E;text-transform:uppercase;';
		if(datos == 0){
			html += '	 <div>No se encontraron resultados</div>';
		}else{
			for(let item of datos){
				let src_img = ruta_raiz + ruta_upload + item.dir_img + '/' + item.nom_img;
				html += '<div class="row" style="overflow:hidden;_height:1%;1border:1px solid #000;">';
				html += '	<div class="col-md-2" style="1border:2px solid yellow;float:left;max-width:200px;">';
				//html += '	     <a href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">';
				//html += '	     <a href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">';
				html += '	     <a href="javascript:objBuscadorPrincipal.mostrarProductoBusquedaWeb(\''+item.mini_codigo+'\')">';
				//html += '	        <img src="'+uri_wwwstore + item.imagen_sm+'" class="img-responsive" style="">';
				html += '	        <img src="'+src_img+'" class="img-responsive" style="">';
				html += '	     </a>';
				html += '	</div>';
				html += '	<div class="col-md-10" style="padding:20px 2px 2px 2px;1border:2px solid green;">';
				//html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.cod_producto+'\')">'+item.producto+'</a>';
				//html += '	    <a style="'+style+'" href="javascript:mostrarProductoBusqueda(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
				html += '	    <a style="'+style+'" href="javascript:objBuscadorPrincipal.mostrarProductoBusquedaWeb(\''+item.mini_codigo+'\')">'+item.producto+'</a>';
				html += '	</div>';
				//html += '	<div class="col-md-10" style="padding:2px;1border:2px solid green;">';
				//html += '	    <span style="text-transform:lowercase;">'+item.descrip_corta+'</span>';
				//html += '	</div>';
				html += '	<div class="col-md-10" style="padding:2px;1border:2px solid green;">';
				//html += '	    <span style="font-weight:bold;color:#1A5276;">S/ '+item.precio_venta_internet+'</span>';
				// Degui: 20220319 si descuento vigente, muestra precio con descuento
				if(item.isFecIni == 1 && item.isFecFin == 1){ 
					html += '	    <span style="color:#1A5276;text-decoration:line-through">S/ '+item.precio_venta_internet+'</span>';
					html += '	    <span style="font-weight:bold;color:#FF8000;">S/ '+item.descuento_precio+'</span>';
				}else{
					html += '	    <span style="font-weight:bold;color:#FF8000;">S/ '+item.precio_venta_internet+'</span>';
				}
				html += '	</div>';
				html += '</div>';
			}
		}
		//$("#resultadoBusqueda").html(html);
		//$("#divInicioTienda").html(html);

		let htmlBusq = '';
		htmlBusq = '<section class="container-fluid">';
		htmlBusq +=	'	<div class="container 1witper-bgcolor-blancohumo">';
		htmlBusq +=	'		<div class="row">	';
		htmlBusq +=	'		<div class="col-md-1">';
		//htmlBusq +=	'			<div class="panel panel-primary" style="margin-top:20px;">';
		//htmlBusq +=	'				<div class="panel-heading">Marcas</div>';
		//htmlBusq +=	'				<div class="panel-body">';
		//htmlBusq +=	'					<div id="panelTopCategoria1"></div>';
		//htmlBusq +=	'				</div>';
		//htmlBusq +=	'			</div>';
		htmlBusq +=	'		</div>';
		htmlBusq +=	'		<div class="col-md-9">';
		htmlBusq +=	'			<div class="panel panel-warning" style="margin-top:20px;">';
		htmlBusq +=	'					<div class="panel-heading" id="codCategoria">:::: Resultado de la Búsqueda</div>';
		htmlBusq +=	'					<div class="panel-body">';
		htmlBusq +=	'						<div class="row">';
		//htmlBusq +=	'						<div style="padding:25px;" id="resultadoBusqueda"></div>';
		htmlBusq +=	html;
		htmlBusq +=	'					</div>    ';
		htmlBusq +=	'					</div>';
		htmlBusq +=	'			</div>';
		htmlBusq +=	'		</div>     ';
		htmlBusq +=	'		</div>';
		htmlBusq +=	'	</div>';
		htmlBusq +=	'</section>';
		$("#box-contenido-principal").html(htmlBusq);

	}

	this.limpiarForm = function (){
		$("#" + this.inputs.busqueda.id).val("");
	};
	
}

var objBuscadorPrincipal;
$(document).ready(function() {
	objBuscadorPrincipal = new clsBuscadorPrincipal();
	objBuscadorPrincipal.iniciarForm();
});