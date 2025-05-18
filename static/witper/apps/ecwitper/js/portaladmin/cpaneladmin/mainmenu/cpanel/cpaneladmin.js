/************************************************************************/
// Funciones js page principal
// Degui
// 20191214
/************************************************************************/
//ADMIN 		= "ecwitper-site-portaladmin";
//PRINCIPAL 	= "ecwitper-cpaneladmin-mainmenu-ctrl";

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
      		//$("#nameUser").html("&nbsp; Iniciar Sesion");
		location.href="Controller.php?pagina=login";
	}else{
		$("#nameUser").html("&nbsp;<b>Bienvenido:</b> " + usesion[0].nick);
		//$("#mnulateral-avatar").attr("src", usesion[0].avatar);
		//$("#mnulateral-usu").html("Hola " + usesion[0].nick);
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
	//location.href="Controller.php?pagina=login";
	//cargarPagina('adm/principal/ver/menu/?page=login');
	//location.href="../../../../adm/principal/ver/menu/?page=login";
	//location.href="../../../../ecwitper-site-portaladmin/ecwitper-cpaneladmin-mainmenu-ctrl/ver/menu/?page=login";

	location.href="../../../../adm/cpanel/account/cpanel-portal-admin/login";
	//let uri = "adm/cpanel/account/cpanel-portal-admin/login";
	//console.log(">>> cpaneladmin-salirsesion-uri: " + uri);
	//cargarPaginaSel(uri);
});
//------------------------------------------------------------------------
//------------------------------------------------------------------------
//------------------------------------------------------------------------
// 20191116 Degui: menu principal
function cargarMenuPrincipalCpanel(){
	let usesion = JSON.parse(sessionStorage.getItem("sesionCpanel"));
	let codUser = usesion[0].id_usuario;
	//console.log("cargarMenuPrincipalCpanel-codUser: " + codUser);
	//console.log("cargarMenuPrincipalCpanel-usesion: " + JSON.stringify(usesion));
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
			console.log(">>> cargarMenuPrincipalCpanel-errorLanzado: " + JSON.stringify(errorLanzado));
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
				
				let codPageHtml = datos[0].cod_page;
				let contexto = datos[0].contexto;
				if(contexto == 'ecwitper-cpaneladmin-mainmenu-ctrl'){
					contex = 'mainmenu';
				}else if(contexto == 'ecwitper-controlacceso-cuentausuario-ctrl'){
					contex = 'ctrlacceso';
				}else if(contexto == 'ecwitper-ingresomercancia-registrocompra-ctrl'){
					contex = 'ingmerca';
				}else if(contexto == 'ecwitper-salidamercancia-registroventa-ctrl'){
					contex = 'salmerca';
				}else if(contexto == 'ecwitper-atencioncliente-recepcioncli-ctrl'){
					contex = 'atencioncli';
				}
				//console.log(">>> cpaneladmin-obtenerPaginaId-contexto: " + contexto);
				//console.log(">>> cpaneladmin-obtenerPaginaId-contex: " + contex);
				//console.log(">>> cpaneladmin-obtenerPaginaId-codPage: " + codPageHtml);
				//let uri = "ecwitper-site-portaladmin/" + contexto + "/ver/menu/?page="+codPageHtml;
				//let uri = "adm/app/salmerca/ver/menu/?page="+codPageHtml;
				let uri = "adm/app/"+contex+"/ver/menu/?page="+codPageHtml;
				//console.log(">>> cpaneladmin-obtenerPaginaId-uri: " + uri);
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
