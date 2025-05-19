/************************************************************************/
// Funciones js page principal
// Degui
// 20230824
/************************************************************************/
ADMIN 		= "ecwitper-site-puntoventa";
PRINCIPAL 	= "ecwitper-cpanelpvta-mainmenu-ctrl";

$(document).ready(function () {
    initInterfazPrincipal();
});	

function initInterfazPrincipal(){
    iniCpanel();
    mostrarDatosUsuario();
};
//------------------------------------------------------------------------
// 20191214 Mostrar datos de usuario
function mostrarDatosUsuario(){
	let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
	//console.log("usesion: " + JSON.stringify(usesion));
	if (usesion == null || usesion == undefined){
      	//$("#nameUser").html("&nbsp; Iniciar Sesion");
		location.href="Controller.php?pagina=login";
	}else{
		$("#divDatosUsuario").html("&nbsp;<h4>Bienvenido " + usesion[0].nick + "</h4>");
	}
}
//------------------------------------------------------------------------
// 20191214 link-home
$('#link-home').click(function(){
	$("#divDatosUsuario").html("Home...");
});
//------------------------------------------------------------------------
// 20191214 link-contactos
$('#link-contactosr').click(function(){
	$("#divDatosUsuario").html("User data...");
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// Login User
function iniCpanel(){
	let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
	//console.log("usesion: " + JSON.stringify(usesion));
	if (usesion == null || usesion == undefined){
		location.href="Controller.php?pagina=login";
	}else{
		$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
		cargarMenuPrincipalCpanel();
	}
}

$('#btnLoginUser').on('click',function(){
	let usesion = sessionStorage.getItem("sesionCpanel");
	if (usesion == null || usesion == undefined)
      		$('#divLoginUser-p1').toggle('slow');
	else
		$('#divLoginUser-p2').toggle('slow');
});

// Salir de sesion
$('#mnulogin-exit').click(function(){
	sessionStorage.removeItem("sesionCpanel");
	location.href="../../../../ecwitper-site-puntoventa/ecwitper-cpanelpvta-mainmenu-ctrl/ver/menu/?page=login";
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20191116 Degui: menu principal
function cargarMenuPrincipalCpanel(){
	let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
	let codUser = usesion[0].id_usuario;
	witper_loadMenuPrincipal(codUser, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response menu-principal: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			let i = 1;
			let varCabMenu = '<ul id="sel-mnu-principal" class="nav navbar-nav">';
			for (let item of datos){
				varCabMenu +=	'<li id="item-'+i+'" data-op="'+item.cod_mtgp+'"><a href="#">'+item.nom_meta_prog+'</a></li>';
				i++;
			}
			varCabMenu +=   '</ul>';
			$("#mnuPrincipalCpanel").html(varCabMenu);
			$('#sel-mnu-principal li').on('click',function(){
			   let opcionp = $(this).attr("data-op"); 
			   mostrarMenuLateral(opcionp);
			});
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar menú", 2);
		}
	});
}
//------------------------------------------------------------------------
function mostrarMenuLateral(op){
	witper_getMenuLateral(op, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response menu-lateral: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			let i = 1;
			for (let item of datos){
				$("#title-boxSideMenu-"+i).html(item.nom_grup_prog);
				document.getElementById("witp-sidemnu-box"+i).style.display = "block";
				mostrarOpcionesMenuLateral(item, i);
				i++;
			}
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar menú", 2);
		}
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
function mostrarOpcionesMenuLateral(item, n){
	let codGProg=item.cod_gprog;
	witper_getOpcionesMenuLateral(codGProg, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
		   //console.log("response op-menu-lateral: " + JSON.stringify(datosDevuelto));
		   let exito = datosDevuelto.encontrado;
		   let mensj = datosDevuelto.mensaje;
		   let datos = datosDevuelto.datos;
		   if(exito && datos != 0){
			let varSideMenu = '<ul id="slide-mnu-box'+n+'">';
			let i = 1;
			for (let item of datos){
				varSideMenu += '<li id="item-'+i+'" data-op="'+item.cod_programa+'"><a href="#">'+item.nom_prog+'</a></li>';
				i++;
			}
		  	varSideMenu += '</ul>';
			$("#boxSideMenu-"+n).html(varSideMenu);
			$('#slide-mnu-box'+n+' li').click(function(){
				let opcion = $(this).attr("data-op"); 
				obtenerPaginaId(opcion);
			});
		   }else{
			mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		   }
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar menú", 2);
		}
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
function obtenerPaginaId(codPage){
	witper_getPageId(codPage, function(errorLanzado, datosDevuelto){
		if(errorLanzado == null){
			//console.log("response obtenerPaginaId: " + JSON.stringify(datosDevuelto));
			let exito = datosDevuelto.encontrado;
			let mensj = datosDevuelto.mensaje;
			let datos = datosDevuelto.datos;
			if(exito && datos != 0){
				let contex = "";
				let codPageHtml = datos[0].cod_page;
				let contexto = datos[0].contexto;
				if(contexto == 'ecwitper-cpanelpvta-mainmenu-ctrl'){
					contex = 'mainmenu';
				}else if(contexto == 'ecwitper-ingresocaja-ventaproducto-ctrl'){
					contex = 'ingcaja';
				}
				//console.log(">>> cpanelpvta-obtenerPaginaId-contexto: " + contexto);
				//console.log(">>> cpanelpvta-obtenerPaginaId-contex: " + contex);
				//console.log(">>> cpanelpvta-obtenerPaginaId-codPage: " + codPageHtml);
				//let uri = "ecwitper-site-puntoventa/" + contexto + "/ver/menu/?page="+codPageHtml;
				//let uri = "vta/app/caja/ver/menu/?page="+codPageHtml;
				let uri = "vta/app/"+contex+"/ver/menu/?page="+codPageHtml;
				//console.log(">>> cpanelpvta-obtenerPaginaId-uri: " + uri);
				cargarPaginaSel(uri);
		   	}else{
				mostrarMensaje("Disculpe, no se pudo realizar la última operación", 2);
		  	}
		}else{
			mostrarMensaje("Disculpe, existi&oacute; un problema al cargar la página por código página.", 2);
		}
	});
}
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------