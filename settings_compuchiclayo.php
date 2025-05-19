<?php
/*
 *************************************** 
 * CONSTANTES GENERALES URI 
 ***************************************
 * Dominio: compuchiclayo.com
 ***************************************
*/
// Rutas generales
//const APP_DIR = '/';
//const APP_DIR 				= '/sw201b/witper/witper-1.2.5/application.php';
//const CLI_DEFAULT_APP 	= 'cli';
//const CLI_DEFAULT_MODULE 	= 'principal';
const CLI_DEFAULT_MODULE 	= 'ecwitper-iniciotienda-mainmenu-ctrl';
const CLI_DEFAULT_MODEL 	= 'ver';
const CLI_DEFAULT_RESOURCE 	= 'menu';
const PATH_ROOT 			= '../../../../';
const APP_SITE_PORTALADMIN  = 'ecwitper-site-portaladmin';
//const APP_SITE_PUNTOVENTA   = 'ecwitper-site-puntoventa';
const APP_SITE_TIENDAVIRTUAL= 'ecwitper-site-tiendavirtual';
const APP_SITE_PORTALOPER   = 'ecwitper-site-portaloper';
const APP_SITE_PORTALUSER   = 'ecwitper-site-portaluser';
const APP_SITE_PUNTOVENTA   = 'ecwitper-site-puntoventa';
const PVTA_CPANELCAJA_MAINMENU  = 'ecwitper-cpanelpvta-mainmenu-ctrl';
const PADM_CPANELADMIN_MAINMENU = 'ecwitper-cpaneladmin-mainmenu-ctrl';
const POS_INI = 0; // posición inicial del uri_array; con virtual host = 0, sin virtual host = 3

// constantes cli
const CPANEL_ROOT               = "cpanels";
const CPANEL_TIENDAVIRTUAL      = 'ecwitper-tiendaonline-cpanel';
const CPANEL_DEFAULT_MODULE     = 'cpanel-comercioproductos-ctrl';
const CPANEL_DEFAULT_MODEL 	    = 'cpanel-comercio-productos';
const CPANEL_DEFAULT_RESOURCE 	= 'opcion-principal';

const CPANEL_MODULE_CUENTAUSUARIO = 'cpanel-cuentausuario-ctrl';

// constantes adm
const CPANEL_PORTAL_ADMIN      = 'ecwitper-portaladmin-cpanel';
const CPANEL_MODULEADM_CUENTAUSUARIO = 'cpanel-portaladmin-ctrl';
const CPANEL_ADMDEFAULT_MODULE = 'cpanel-portaladmin-ctrl';
const CPANEL_ADMDEFAULT_MODEL  = 'cpanel-portal-admin';
const CPANEL_ADMDEFAULT_RESOURCE 	= 'login';

const PADM_CPANELADMIN_SALMERCA     = "ecwitper-salidamercancia-registroventa-ctrl";
const PADM_CPANELADMIN_CTRLACCESO   = "ecwitper-controlacceso-cuentausuario-ctrl";
const PADM_CPANELADMIN_ATENCIONCLI	= "ecwitper-atencioncliente-recepcioncli-ctrl";
const PADM_CPANELADMIN_INGMERCA 	= "ecwitper-ingresomercancia-registrocompra-ctrl";


// constantes vta
const CPANEL_MODULEVTA_PTOVTA   = 'cpanel-puntovta-ctrl';
const CPANEL_PORTAL_VTA         = 'ecwitper-puntovta-cpanel';
const CPANEL_VTADEFAULT_MODULE  = 'cpanel-puntovta-ctrl';
const CPANEL_VTADEFAULT_MODEL 	= 'cpanel-punto-vta';
const CPANEL_VTADEFAULT_RESOURCE 	= 'login';

//const APP_TIENDAVIRTUAL         = 'ecwitper-tiendaonline-webapp';
//const APP_DEFAULT_MODULE        = 'catalogo-productos-ctrl';
const APP_MAIN_TIENDAONLINE     = 'ecwitper-tiendaonline-webapp';
//const APP_MODULE_CATALOGOPROD   = 'catalogo-productos-ctrl';
const APP_MODULE_CATALOGOPROD   = 'comercio-productos-ctrl';
const APP_MODULE_BLOGTIENDA     = 'publicador-articulos-ctrl';

const APP_MODULE_CARTIENDA      = 'carrito-compras-ctrl';
const APP_MODULE_CUENTAUSUARIO  = 'cuenta-usuario-ctrl';
const APP_MODULE_PUBLIPAGINAS   = 'publicador-paginas-ctrl';
const APP_MODULE_BUSCADORPROD   = 'buscador-productos-ctrl';

const PVTA_CPANEL_INGCAJA       = "ecwitper-ingresocaja-ventaproducto-ctrl";


/*
 *************************************** 
 * CONSTANTES SITEADMIN 
 ***************************************
*/
// Constantes de rutas principales
// Small, Medium, Large
const SITEADM_PATH_DIR_MEDIUM 	= "static/witper";
//const PATH_STATIC_DIR_ADMIN 	= 'static/witper/';
const SITEADM_PATH_TAG_LARGE	= "PATH_LARGE";
const SITEADM_PATH_DIR_LARGE 	= "../../../../static/witper";
//const SITEADM_PATH_DIR_LARGE 	= "http://localhost/webapps/wmwitper/static/witper";
const SITEADM_PATH_DIR_SKIN		= '/apps/siteadm/skin/compuchiclayo';

// Constantes de paginas comunes
const SITEADM_HTML_TAG_COMMONHEAD	    = "COMMON_HEAD";
//const SITEADM_HTML_DIR_COMMONHEAD	    = SITEADM_PATH_DIR_SKIN . "/html/common/CommonHead.html";
//const SITEADM_HTML_DIR_COMMONHEAD	    = "/apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/common/CommonHead.html";
const SITEADM_HTML_DIR_COMMONHEAD	    = "./apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/common/CommonHead.html";
const SITEADM_HTML_TAG_COMMONHEADER	    = "COMMON_HEADER";
//const SITEADM_HTML_DIR_COMMONHEADER 	= SITEADM_PATH_DIR_SKIN . "/html/common/CommonHeader.html";
const SITEADM_HTML_DIR_COMMONHEADER 	= "./apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/common/CommonHeader.html";
const SITEADM_HTML_TAG_COMMONSIDEMENU	= "COMMON_SIDEMENU";
//const SITEADM_HTML_DIR_COMMONSIDEMENU 	= SITEADM_PATH_DIR_SKIN . "/html/common/CommonSideMenu.html";
const SITEADM_HTML_DIR_COMMONSIDEMENU 	= "./apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/common/CommonSideMenu.html";
const SITEADM_HTML_TAG_COMMONFOOTER	    = "COMMON_FOOTER";
//const SITEADM_HTML_DIR_COMMONFOOTER 	= SITEADM_PATH_DIR_SKIN . "/html/common/CommonFooter.html";
const SITEADM_HTML_DIR_COMMONFOOTER 	= "./apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/common/CommonFooter.html";

// Constantes de cabecera de pagina
const SITEADM_HTML_TAG_SITETITLE	    = "SITEADM_TITLE";
const SITEADM_HTML_DES_SITETITLE 	    = "Compuchiclayo - administración";
const SITEADM_HTML_TAG_SITEDESCRIP	    = "SITEADM_DESCRIPTION";
const SITEADM_HTML_DES_SITEDESCRIP 	    = "Tienda online para venta de equipos de computo y desarrollo de software";
const SITEADM_HTML_TAG_SITEKEYWORDS	    = "SITEADM_KEYWORDS";
const SITEADM_HTML_DES_SITEKEYWORDS     = "Computadora, Laptops, software";
const SITEADM_HTML_TAG_FAVICON 		    = "SITEADM_FAVICON";
//const SITEADM_HTML_DIR_FAVICON 		    = SITEADM_PATH_DIR_SKIN . "/img/principal/site/favicon_compucix.ico";
const SITEADM_HTML_DIR_FAVICON 		    = "/apps/ecwitper/img/portaladmin/cpaneladmin/mainmenu/logo/favicon_compucix.ico";
const SITEADM_CSS_TAG_LIB_BOOTSTRAP	    = "CSS_LIB_BOOTSTRAP";
const SITEADM_CSS_DIR_LIB_BOOTSTRAP	    = "/libs/bootstrap/css/bootstrap.min.css";
//const SITEADM_CSS_DIR_LIB_BOOTSTRAP	    = "/libs/bootstrap-4.6.1/css/bootstrap.min.css";
const SITEADM_CSS_TAG_LIB_FONTAWESOME   = "CSS_LIB_FONTAWESOME";
const SITEADM_CSS_DIR_LIB_FONTAWESOME 	= "/libs/font-awesome/css/font-awesome.min.css";
//const SITEADM_CSS_TAG_LIB_JQUERY_UI	    = "CSS_LIB_JQUERY_UI";
//const SITEADM_CSS_DIR_LIB_JQUERY_UI	    = "/libs/jquery/ui/1.13.1/jquery-ui.min.css";
const SITEADM_CSS_TAG_LIB_RESET  	    = "CSS_LIB_RESET";
const SITEADM_CSS_DIR_LIB_RESET 	    = "/utils/css/reset/reset.css";
const SITEADM_HTML_TAG_LOGO		        = "SITEADM_LOGO";
//const SITEADM_HTML_DIR_LOGO		        = SITEADM_PATH_DIR_SKIN . "/img/principal/site/logo_compucix.png";
const SITEADM_HTML_DIR_LOGO		        = "/apps/ecwitper/img/portaladmin/cpaneladmin/mainmenu/logo/logo_compucix.png";

// Constantes de pie de pagina
const SITEADM_JS_TAG_LIB_JQUERY		    = "JS_LIB_JQUERY";
//const SITEADM_JS_DIR_LIB_JQUERY		    = "/libs/jquery/js/jquery-3.6.0.min.js";
const SITEADM_JS_DIR_LIB_JQUERY		    = "/libs/jquery/js/jquery-3.3.1.min.js";
//const SITEADM_JS_TAG_LIB_JQUERY_UI	    = "JS_LIB_JQUERY_UI";
//const SITEADM_JS_DIR_LIB_JQUERY_UI	    = "/libs/jquery/ui/1.13.1/jquery-ui.min.js";
const SITEADM_JS_TAG_LIB_BSTRAP_JQ	    = "JS_LIB_BSTRAP_JQ";
const SITEADM_JS_DIR_LIB_BSTRAP_JQ 	    = "/libs/bootstrap/js/jquery-1.12.1.min.js";
//const SITEADM_JS_DIR_LIB_BSTRAP_JQ 	    = "";
const SITEADM_JS_TAG_LIB_BOOTSTRAP	    = "JS_LIB_BOOTSTRAP";
const SITEADM_JS_DIR_LIB_BOOTSTRAP	    = "/libs/bootstrap/js/bootstrap.min.js";
//const SITEADM_JS_DIR_LIB_BOOTSTRAP	    = "/libs/bootstrap-4.6.1/js/bootstrap.min.js";
const SITEADM_JS_TAG_LIB_WITPER_ADM 	= "JS_LIB_WITPER_ADM";		// Tag general
//const SITEADM_JS_DIR_LIB_WITPER_ADM 	= "/libs/witper-adm/js/witper_adm-0.0.1.js";
const SITEPADM_JS_DIR_LIB_WITPERPADM 	= "/libs/ecwitper/js/portaladmin/witper_padm-1.1.1.js";
const SITEADM_HTML_TAG_COPYRIGHT	    = "SITEADM_COPYRIGHT";
const SITEADM_HTML_DES_COPYRIGHT 	    = "Copyright ©2021 - 2025 Compuchiclayo.com. Todos los derechos reservados.";

// Constantes de archivos html
//const SITEADM_HTML_DIR_LOGIN			        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_00001_login.html";
//const SITEADM_HTML_DIR_LOGIN			        = "../../../../views/ecwitper-controlseguridad-loginadm-view/src/html/page_login.html";
const SITEADM_HTML_DIR_LOGIN			        = "apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/login/loginadmin.html";
//const SITEADM_HTML_DIR_PRINCIPAL		        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_10101_principal.html";
const SITEADM_HTML_DIR_PRINCIPAL		        = "apps/ecwitper-site-portaladmin/views/ecwitper-cpaneladmin-mainmenu-view/src/html/cpanel/cpaneladmin.html";
const SITEADM_HTML_DIR_INICIO 			        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_10102_inicio.html";
//const SITEADM_HTML_DIR_GESVENT_FRMCLIENTES	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_21011_frmClientes.html";
//const SITEADM_HTML_DIR_GESVENT_FRMUSUARIOS	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_21012_frmUsuarios.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMCLIENTES	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41051_frmClientes.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMPRODUCTOS	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41052_frmProductos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMPEIDOS	        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41053_frmPedidos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMSUSCRIPTORES	= SITEADM_PATH_DIR_SKIN . "/html/principal/page_41054_frmSuscriptores.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMCONTACTOS	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41055_frmContactos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMLIBRORECLAMO	= SITEADM_PATH_DIR_SKIN . "/html/principal/page_41056_frmLibroReclamos.html";
//const SITEADM_HTML_DIR_PVENTA_FRMVENTASCLIENTE	= SITEADM_PATH_DIR_SKIN . "/html/gestionVentas/registrarVentas/page_50101_frmRegistrarVentas.html";
//const SITEADM_HTML_DIR_COMPRA_FRMREGISTCOMPRAS    = SITEADM_PATH_DIR_SKIN . "/html/gestionCompras/registrarCompras/page_31031_frmRegistrarCompras.html";
const SITEADM_ID_FRM_REG_CUENTA_USUARIO         = '71101';
const SITEADM_PATH_FRM_REG_CUENTA_USUARIO       = "apps/ecwitper-site-portaladmin/views/ecwitper-controlacceso-cuentausuario-view/src/html/regCuentaUsuario/frmRegCuentaUsuario.html";
const SITEADM_ID_FRM_REGISTRAR_COMPRAS          = '31031';
const SITEADM_PATH_FRM_REGISTRAR_COMPRAS        = "apps/ecwitper-site-portaladmin/views/ecwitper-ingresomercancia-registrocompra-view/src/html/registrarCompras/frmRegistrarCompras.html";
const SITEADM_ID_FRM_REGISTRAR_CLIENTES         = "21011";
const SITEADM_PATH_FRM_REGISTRAR_CLIENTES       = "apps/ecwitper-site-portaladmin/views/ecwitper-salidamercancia-registroventa-view/src/html/registrarCliente/frmRegistrarClientes.html";
const SITEADM_ID_FRM_REGISTRAR_PRODUCTOS        = "21013";
const SITEADM_PATH_FRM_REGISTRAR_PRODUCTOS      = "apps/ecwitper-site-portaladmin/views/ecwitper-salidamercancia-registroventa-view/src/html/registrarProducto/frmStockProductoVenta.html";
const SITEADM_ID_FRM_ATENDER_PEDIDOS            = "21014";
const SITEADM_PATH_FRM_ATENDER_PEDIDOS          = "apps/ecwitper-site-portaladmin/views/ecwitper-salidamercancia-registroventa-view/src/html/atenderPedidos/frmAtenderPedidos.html";
const SITEADM_ID_FRM_REGISTRAR_SUSCRIPTOR       = "41054";
const SITEADM_PATH_FRM_REGISTRAR_SUSCRIPTOR     = "apps/ecwitper-site-portaladmin/views/ecwitper-atencioncliente-recepcioncli-view/src/html/registroSuscripcion/frmRegistrarSuscriptor.html";
const SITEADM_ID_FRM_REGISTRAR_CONTACTO         = "41055";
const SITEADM_PATH_FRM_REGISTRAR_CONTACTO       = "apps/ecwitper-site-portaladmin/views/ecwitper-atencioncliente-recepcioncli-view/src/html/registroContacto/frmRegistrarContacto.html";
const SITEADM_ID_FRM_ATENDER_LIBRO_RECLAMO      = "41056";
const SITEADM_PATH_FRM_ATENDER_LIBRO_RECLAMO    = "apps/ecwitper-site-portaladmin/views/ecwitper-atencioncliente-recepcioncli-view/src/html/registroLibroReclamo/frmAtenderLibroReclamo.html";


/*
 ***************************************
 * CONSTANTES CPANEL
 ***************************************
*/
// Constantes de rutas principales
// Small, Medium, Large
const CPANEL_PATH_LOCALHOST_TAG	= "PATH_LOCALHOST";
//const CPANEL_PATH_LOCALHOST_DIR = "http://localhost/webapps/wmwitper";
const CPANEL_PATH_LOCALHOST_DIR = "/";

// Constantes de rutas principales
// Small, Medium, Large
const SITECLI_PATH_DIR_MEDIUM 		= "/static/witper/";
const SITECLI_PATH_TAG_LARGE		= "PATH_LARGE";
const SITECLI_PATH_DIR_LARGE 		= "../../../../static/witper"; //"static/witper";
const SITECLI_PATH_DIR_SKIN		    = 'apps/sitecli/skin/compuchiclayo';

// 20241210 Degui: se retira constante
//const APP_PATH_LOCALHOST_TAG		= "APP_PATH_LOCALHOST";
//const APP_PATH_LOCALHOST_DIR 		= "http://localhost/webapps/wmwitper";

// admin
// 20241210 Degui: se retira constante
//const APP_PATH_ADMLOCALHOST_TAG		= "APP_PATH_LOCALHOST";
//const APP_PATH_ADMLOCALHOST_DIR 	= "http://localhost/webapps/wmwitper/static/witper";

// wwwstore
const SITECLI_PATH_TAG_STORE		= "PATH_STORE";
const SITECLI_PATH_DIR_STORE 		= "static/witper";
//const SITECLI_PATH_DIR_STORE 		= "../../../../static/witper";

// Constantes de paginas comunes
//const SITECLI_HTML_TAG_COMMONHEAD	= "COMMON_HEAD";
//const SITECLI_HTML_DIR_COMMONHEAD	= "./apps/ecwitper-site-tiendavirtual/views/ecwitper-iniciotienda-mainmenu-view/src/html/common/CommonHead.html";
//const CPANEL_HTML_DIR_PRINCIPAL	    = "cpanels/ecwitper-tiendaonline-cpanel/views/cpanel-comercioproductos-view/inter-tienda-comercial/src/html/cuerpoTiendaComercial.html";
const CPANEL_HTML_DIR_PRINCIPAL	    = "static/witper/cpanels/tiendaonline/paneltienda/html/cuerpoTiendaComercial.html";
const CPANEL_HTML_TAG_COMMONHEADER	= "COMMON_HEADER";
//const CPANEL_HTML_DIR_COMMONHEADER	= "./cpanels/ecwitper-tiendaonline-cpanel/views/cpanel-comercioproductos-view/inter-tienda-comercial/src/html/cabeceraTiendaComercial.html";
const CPANEL_HTML_DIR_COMMONHEADER	= "static/witper/cpanels/tiendaonline/paneltienda/html/cabeceraTiendaComercial.html";
const CPANEL_HTML_TAG_COMMONFOOTER	= "COMMON_FOOTER";
//const CPANEL_HTML_DIR_COMMONFOOTER	= "./cpanels/ecwitper-tiendaonline-cpanel/views/cpanel-comercioproductos-view/inter-tienda-comercial/src/html/pieTiendaComercial.html";
const CPANEL_HTML_DIR_COMMONFOOTER	= "static/witper/cpanels/tiendaonline/paneltienda/html/pieTiendaComercial.html";
//const SITECLI_HTML_TAG_CHAT		    = "SITECLI_CHAT";
//const SITECLI_HTML_DIR_CHAT	        = "./apps/ecwitper-site-tiendavirtual/views/ecwitper-chat-client-view/src/html/chat/clienteChat.html";

// Constantes de cabecera de pagina
const SITECLI_HTML_TAG_SITETITLE	= "SITECLI_TITLE";
const SITECLI_HTML_DES_SITETITLE 	= "Compuchiclayo - Venta de equipos de computo";
const SITECLI_HTML_TAG_SITEDESCRIP	= "SITECLI_DESCRIPTION";
const SITECLI_HTML_DES_SITEDESCRIP 	= "Tienda online para venta de equipos de computo y desarrollo de software";
const SITECLI_HTML_TAG_SITEKEYWORDS	= "SITECLI_KEYWORDS";
const SITECLI_HTML_DES_SITEKEYWORDS = "Computadora, Laptops, software";
const SITECLI_HTML_TAG_FAVICON 		= "SITECLI_FAVICON";
//const SITECLI_HTML_DIR_FAVICON 		= SITECLI_PATH_DIR_SKIN . "/img/principal/site/compuchiclayo.ico";
const SITECLI_HTML_DIR_FAVICON 	= "/apps/ecwitper/img/tiendavirtual/iniciotienda/mainmenu/principal/logo/compuchiclayo.ico";
const SITECLI_CSS_TAG_LIB_BOOTSTRAP	= "CSS_LIB_BOOTSTRAP";
const SITECLI_CSS_DIR_LIB_BOOTSTRAP	= "/libsExt/bootstrap/css/bootstrap.min.css";
const SITECLI_CSS_TAG_LIB_FONTAWESOME   = "CSS_LIB_FONTAWESOME";
const SITECLI_CSS_DIR_LIB_FONTAWESOME 	= "/libsExt/font-awesome/css/font-awesome.min.css";
const SITECLI_CSS_TAG_LIB_JQUERY_UI	= "CSS_LIB_JQUERY_UI";
const SITECLI_CSS_DIR_LIB_JQUERY_UI	= "/libsExt/jquery/ui/1.13.1/jquery-ui.min.css";
const SITECLI_CSS_TAG_LIB_RESET  	= "CSS_LIB_RESET";
const SITECLI_CSS_DIR_LIB_RESET 	= "/utils/css/reset/reset.css";

const SITECLI_HTML_TAG_LOGO		    = "SITECLI_LOGO";
//const SITECLI_HTML_DIR_LOGO		= SITECLI_PATH_DIR_SKIN . "/img/principal/site/logo_compuchiclayo_azul_v2.0.png";
const SITECLI_HTML_DIR_LOGO 	    = "/apps/ecwitper/img/tiendavirtual/iniciotienda/mainmenu/principal/logo/logo_compuchiclayo_azul_v2.0.png";
const SITECLI_HTML_TAG_LOGOPIE	    = "SITECLI_LOGOPIE";
//const SITECLI_HTML_DIR_LOGOPIE	= SITECLI_PATH_DIR_SKIN . "/img/principal/site/logo_compuchiclayo_blanco_v2.0.png";
const SITECLI_HTML_DIR_LOGOPIE 	    = "/apps/ecwitper/img/tiendavirtual/iniciotienda/mainmenu/principal/logo/logo_compuchiclayo_blanco_v2.0.png";
const SITECLI_HTML_TAG_CARITEMS 	= "TAG_CAR_ITEMS";
const SITECLI_HTML_DES_CARITEMS 	= "0";

// Constantes de pie de pagina
const SITECLI_JS_TAG_LIB_JQUERY		= "JS_LIB_JQUERY";
const SITECLI_JS_DIR_LIB_JQUERY		= "/libsExt/jquery/js/jquery-3.6.0.min.js";
const SITECLI_JS_TAG_LIB_JQUERY_UI	= "JS_LIB_JQUERY_UI";
const SITECLI_JS_DIR_LIB_JQUERY_UI	= "/libsExt/jquery/ui/1.13.1/jquery-ui.min.js";
const SITECLI_JS_TAG_LIB_BSTRAP_JQ	= "JS_LIB_BSTRAP_JQ";
const SITECLI_JS_DIR_LIB_BSTRAP_JQ 	= "/libsExt/bootstrap/js/jquery-1.12.1.min.js";
const SITECLI_JS_TAG_LIB_BOOTSTRAP	= "JS_LIB_BOOTSTRAP";
const SITECLI_JS_DIR_LIB_BOOTSTRAP	= "/libsExt/bootstrap/js/bootstrap.min.js";
const SITECLI_JS_TAG_LIB_WITPER_CLI = "JS_LIB_WITPER_CLI";		// Tag general
//const SITECLI_JS_DIR_LIB_WITPER_CLI = "/libs/witper-cli/js/witper_cli-0.0.1.js";
const SITECLI_JS_DIR_LIB_WITPER_CLI = "/libs/ecwitper/js/tiendavirtual/witper_pcli-1.1.1.js";
const SITECLI_HTML_TAG_COPYRIGHT	= "SITECLI_COPYRIGHT";
const SITECLI_HTML_DES_COPYRIGHT 	= "Copyright ©2021 - 2025 Compuchiclayo.com. Todos los derechos reservados.";


/*
 ***************************************
 * CONSTANTES SITECLI 
 ***************************************
*/

//const TIENDA_HTML_TAG_LOGINUSER	= "FRM_LOGIN_USUARIO";
const TIENDA_HTML_DIR_LOGINUSER	= "static/witper/apps/tiendaonline/cuenta/usuario/loginUsuario/html/frmLoginUsuario.html";
//const TIENDA_HTML_DIR_BUSCADOR	= "apps/ecwitper-tiendaonline-webapp/views/buscador-productos-view/inter-buscadorprincipal-web/src/html/frmBuscadorPrincipal.html";
const TIENDA_HTML_DIR_BUSCADOR	= "static/witper/apps/tiendaonline/buscador/productos/buscadorprincipal/html/frmBuscadorPrincipal.html";
const TIENDA_HTML_DIR_SUSCRIBIRMAIL	= "static/witper/apps/tiendaonline/publicador/paginas/suscribirmail/html/frmSuscribirMail.html";

// Constantes de archivos html
//const SITECLI_HTML_DIR_PRINCIPAL	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10000_principal.html";
//const SITECLI_HTML_DIR_INICIO 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10101_inicio.html";
//const SITECLI_HTML_DIR_NOSOTROS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10201_nosotros.html";
const SITECLI_HTML_DIR_SOLUCIONES 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10301_solucion.html";
const SITECLI_HTML_DIR_SOLSYSEMP 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10302_solemp.html";
const SITECLI_HTML_DIR_SOLSYSGEST 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10303_solerp.html";
const SITECLI_HTML_DIR_SOLSYSCOMMER = SITECLI_PATH_DIR_SKIN . "/html/principal/page_10304_solecommerce.html";
const SITECLI_HTML_DIR_SOLSYSGPS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10305_solgps.html";
const SITECLI_HTML_DIR_SOLSYSCMS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10306_solcms.html";
const SITECLI_HTML_DIR_SOLSYSTOOLS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10311_soltools.html";
const SITECLI_HTML_DIR_SOLTOOLS01 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10312_soltool1.html";
const SITECLI_HTML_DIR_SOLTOOLS02 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10313_soltool2.html";
const SITECLI_HTML_DIR_SERVICIOS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10401_servicio.html";
const SITECLI_HTML_DIR_SERVPROY 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10402_servproy.html";
const SITECLI_HTML_DIR_SERVHOST 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10403_servinfra.html";
const SITECLI_HTML_DIR_TIENDA 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10501_tienda.html";
//const SITECLI_HTML_DIR_BLOG 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10601_blog.html";
//const SITECLI_HTML_DIR_POST		    = SITECLI_PATH_DIR_SKIN . "/html/principal/page_10602_post.html";
//const SITECLI_HTML_DIR_CONTACTENOS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10701_contacto.html";
//const SITECLI_HTML_DIR_LIBRORECLA 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_11001_frmLibroRecla.html";
//const SITECLI_HTML_DIR_FRMNEWUSER	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10901_frmNewUser.html";
//const SITECLI_HTML_DIR_FRMCAR		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10801_frmCarrito.html";
//const SITECLI_HTML_DIR_PRODUCTO	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10502_frmProducto.html";
//const SITECLI_HTML_DIR_PRODUCTOCAT	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20101_ProductoCat.html";
//const SITECLI_HTML_DIR_CIXSERVTEC	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20102_cixservtec.html";
//const SITECLI_HTML_DIR_CIXDEVELOP	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20103_cixdevelop.html";
//const SITECLI_HTML_DIR_CIXTELECOM	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20104_cixtelecom.html";
//const SITECLI_HTML_DIR_CIXSERVERS	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20105_cixservers.html";
//const SITECLI_HTML_DIR_VER_ORDEN	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20201_verorden.html";
//const SITECLI_HTML_DIR_VER_OFERTAS	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20202_verOfertas.html";
//const SITECLI_HTML_DIR_FRMSUSCRIBIR	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20301_frmSuscribir.html";
//const SITECLI_HTML_DIR_FRMRESULBUSQ	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_20302_ResultadoBusqueda.html";
//const SITECLI_HTML_DIR_SPCUENTA		= SITECLI_PATH_DIR_SKIN . "/html/cuenta/page_spCuenta.html";
//const SITECLI_HTML_DIR_SPCARRITO	= SITECLI_PATH_DIR_SKIN . "/html/cuenta/page_spCarrito.html";
//const SITECLI_HTML_DIR_POSTULANTE 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10705_postulante.html";

//const SITECLI_HTML_DIR_PRINCIPAL	= "apps/ecwitper-site-tiendavirtual/views/ecwitper-iniciotienda-mainmenu-view/src/html/principal/principal.html";
//const SITECLI_HTML_DIR_INICIO	    = "apps/ecwitper-site-tiendavirtual/views/ecwitper-iniciotienda-mainmenu-view/src/html/inicio/inicio.html";
//const SITECLI_HTML_DIR_INICIO	    = "apps/ecwitper-tiendaonline-webapp/views/publicador-paginas-view/inter-iniciotienda-web/src/html/inicioTienda.html";
const SITECLI_HTML_DIR_INICIO	    = "static/witper/apps/tiendaonline/publicador/paginas/iniciotienda/html/inicioTienda.html";
//const SITECLI_HTML_DIR_CATALOGO	    = "apps/ecwitper-tiendaonline-webapp/views/comercio-productos-view/inter-catalogoproductos-web/src/html/catalogoProductos.html";
const SITECLI_HTML_DIR_CATALOGO	    = "static/witper/apps/tiendaonline/comercio/productos/catalogoproducto/html/catalogoProductos.html";
const SITECLI_HTML_DIR_FRMCAR	    = "static/witper/apps/tiendaonline/carrito/compras/carritocompras/html/frmCarritoCompras.html";
const SITECLI_HTML_DIR_VER_OFERTAS  = "static/witper/apps/tiendaonline/comercio/productos/ofertaproducto/html/ofertaProductos.html";
const SITECLI_HTML_DIR_FRMNEWUSER   = "static/witper/apps/tiendaonline/cuenta/usuario/crearCuentaUsuario/html/frmCrearCuentaUsuario.html";
const SITECLI_HTML_DIR_PRODUCTO	    = "static/witper/apps/tiendaonline/comercio/productos/especificacionproducto/html/detalleProducto.html";
const SITECLI_HTML_DIR_PRODUCTOCAT  = "static/witper/apps/tiendaonline/comercio/productos/categoriaproducto/html/categoriaProductos.html";
//const SITECLI_HTML_DIR_FRMRESULBUSQ = "apps/ecwitper-tiendaonline-webapp/views/buscador-productos-view/inter-resultadobusqueda-web/src/html/frmResultadoBusqueda.html";
//const SITECLI_HTML_DIR_FRMRESULBUSQ = "static/witper/apps/tiendaonline/buscador/productos/resultadobusqueda/html/frmResultadoBusqueda.html";
const SITECLI_HTML_DIR_BLOG         = "static/witper/apps/tiendaonline/publicador/articulos/blog/html/blog.html";
const SITECLI_HTML_DIR_POST         = "static/witper/apps/tiendaonline/publicador/articulos/post/html/post.html";
const SITECLI_HTML_DIR_NOSOTROS     = "static/witper/apps/tiendaonline/publicador/paginas/nosotros/html/nosotros.html";
const SITECLI_HTML_DIR_CONTACTENOS  = "static/witper/apps/tiendaonline/publicador/paginas/contacto/html/contacto.html";
const SITECLI_HTML_DIR_POSTULANTE   = "static/witper/apps/tiendaonline/publicador/paginas/postulante/html/postulante.html";
const SITECLI_HTML_DIR_LIBRORECLA   = "static/witper/apps/tiendaonline/publicador/paginas/libroreclamo/html/libroReclamo.html";
const SITECLI_HTML_DIR_FRMSUSCRIBIR = "static/witper/apps/tiendaonline/publicador/paginas/suscribir/html/suscribir.html";
const SITECLI_HTML_DIR_CIXSERVTEC   = "static/witper/apps/tiendaonline/publicador/paginas/servicios/html/cixservtec.html";
const SITECLI_HTML_DIR_CIXDEVELOP   = "static/witper/apps/tiendaonline/publicador/paginas/servicios/html/cixdevelop.html";
const SITECLI_HTML_DIR_CIXTELECOM   = "static/witper/apps/tiendaonline/publicador/paginas/servicios/html/cixtelecom.html";
const SITECLI_HTML_DIR_CIXSERVERS   = "static/witper/apps/tiendaonline/publicador/paginas/servicios/html/cixservers.html";
const SITECLI_HTML_DIR_SPPERFILUSUARIO		= "static/witper/apps/tiendaonline/cuenta/usuario/cuentaSesion/html/page_spCuenta.html";
const SITECLI_HTML_DIR_SPCARRITO	= "static/witper/apps/tiendaonline/cuenta/usuario/carrito/html/page_spCarrito.html";

// 20241224
//const TAG_PRINCIPAL_GENERAL_CSS	    = "PRINCIPAL_GENERAL_CSS";
//const DIR_PRINCIPAL_GENERAL_CSS	    = "./cpanels/ecwitper-tiendaonline-cpanel/views/static-commons/cpanel-tiendaonline/src/css/general.css";


/*
 *************************************** 
 * CONSTANTES SITE PUNTO VENTA 
 ***************************************
*/
// Constantes de rutas principales
// Small, Medium, Large
//const SITEADM_PATH_DIR_MEDIUM 	= "static/witper";
const SITEPVTA_PATH_TAG_LARGE	    = "PATH_LARGE";
const SITEPVTA_PATH_DIR_LARGE 	    = "../../../../static/witper";
//const SITEPVTA_PATH_DIR_LARGE 	= "static/witper";
//const SITEADM_PATH_DIR_SKIN		= '/apps/siteadm/skin/compuchiclayo';

// Constantes de paginas comunes
const SITEPVTA_HTML_TAG_COMMONHEAD	    = "COMMON_HEAD";
const SITEPVTA_HTML_DIR_COMMONHEAD	    = "./apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/common/CommonHead.html";
const SITEPVTA_HTML_TAG_COMMONHEADER    = "COMMON_HEADER";
const SITEPVTA_HTML_DIR_COMMONHEADER 	= "./apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/common/CommonHeader.html";
const SITEPVTA_HTML_TAG_COMMONSIDEMENU	= "COMMON_SIDEMENU";
const SITEPVTA_HTML_DIR_COMMONSIDEMENU 	= "./apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/common/CommonSideMenu.html";
const SITEPVTA_HTML_TAG_COMMONFOOTER	= "COMMON_FOOTER";
const SITEPVTA_HTML_DIR_COMMONFOOTER 	= "./apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/common/CommonFooter.html";

// Constantes de cabecera de pagina
const SITEPVTA_HTML_TAG_SITETITLE	    = "SITE_TITLE";
const SITEPVTA_HTML_DES_SITETITLE 	    = "Compuchiclayo - Punto Venta";
const SITEPVTA_HTML_TAG_SITEDESCRIP	    = "SITE_DESCRIPTION";
const SITEPVTA_HTML_DES_SITEDESCRIP 	= "Tienda online para venta de equipos de computo y desarrollo de software";
const SITEPVTA_HTML_TAG_SITEKEYWORDS	= "SITE_KEYWORDS";
const SITEPVTA_HTML_DES_SITEKEYWORDS    = "Computadora, Laptops, software";
const SITEPVTA_HTML_TAG_FAVICON 		= "SITEPVTA_FAVICON";
const SITEPVTA_HTML_DIR_FAVICON 		= "/apps/ecwitper/img/puntoventa/cpanelpvta/mainmenu/logo/favicon_compucix.ico";
const SITEPVTA_CSS_TAG_LIB_BOOTSTRAP	= "CSS_LIB_BOOTSTRAP";
const SITEPVTA_CSS_DIR_LIB_BOOTSTRAP	= "/libs/bootstrap/css/bootstrap.min.css";
//const SITEPVTA_CSS_DIR_LIB_BOOTSTRAP	= "/libs/bootstrap-4.6.1/css/bootstrap.min.css";
const SITEPVTA_CSS_TAG_LIB_FONTAWESOME  = "CSS_LIB_FONTAWESOME";
const SITEPVTA_CSS_DIR_LIB_FONTAWESOME 	= "/libs/font-awesome/css/font-awesome.min.css";
const SITEPVTA_CSS_TAG_LIB_RESET  	    = "CSS_LIB_RESET";
const SITEPVTA_CSS_DIR_LIB_RESET 	    = "/utils/css/reset/reset.css";
const SITEPVTA_HTML_TAG_LOGO		    = "SITE_LOGO";
const SITEPVTA_HTML_DIR_LOGO		    = "/apps/ecwitper/img/puntoventa/cpanelpvta/mainmenu/logo/logo_compucix.png";

// Constantes de pie de pagina
const SITEPVTA_JS_TAG_LIB_JQUERY		= "JS_LIB_JQUERY";
//const SITEPVTA_JS_DIR_LIB_JQUERY	    = "/libs/jquery/js/jquery-3.6.0.min.js";
const SITEPVTA_JS_DIR_LIB_JQUERY		= "/libs/jquery/js/jquery-3.3.1.min.js";
const SITEPVTA_JS_TAG_LIB_BSTRAP_JQ	    = "JS_LIB_BSTRAP_JQ";
const SITEPVTA_JS_DIR_LIB_BSTRAP_JQ 	= "/libs/bootstrap/js/jquery-1.12.1.min.js";
const SITEPVTA_JS_TAG_LIB_BOOTSTRAP	    = "JS_LIB_BOOTSTRAP";
const SITEPVTA_JS_DIR_LIB_BOOTSTRAP	    = "/libs/bootstrap/js/bootstrap.min.js";
const SITEPVTA_JS_TAG_LIB_WITPERPVTA 	= "JS_LIB_WITPERPVTA";
const SITEPVTA_JS_DIR_LIB_WITPERPVTA 	= "/libs/ecwitper/js/puntoventa/witper_pvta-1.1.1.js";
const SITEPVTA_HTML_TAG_COPYRIGHT	    = "SITE_COPYRIGHT";
const SITEPVTA_HTML_DES_COPYRIGHT 	    = "Copyright ©2021 - 2025 Compuchiclayo.com. Todos los derechos reservados.";

// Constantes de archivos html
const SITEPVTA_HTML_DIR_LOGIN	        = "apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/login/loginpvta.html";
const SITEPVTA_HTML_DIR_PRINCIPAL		= "apps/ecwitper-site-puntoventa/views/ecwitper-cpanelpvta-mainmenu-view/src/html/cpanel/cpanelpvta.html";
const SITEVTA_ID_FRM_REGISTRAR_COMPROBANTE_VENTA   = '50101';
const SITEVTA_PATH_FRM_REGISTRAR_COMPROBANTE_VENTA = "apps/ecwitper-site-puntoventa/views/ecwitpe-ingresocaja-ventaproducto-view/src/html/generarComprobante/frmRegistrarComprobanteVenta.html";
//const SITEADM_HTML_DIR_INICIO 			        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_10102_inicio.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMCLIENTES	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41051_frmClientes.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMPRODUCTOS	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41052_frmProductos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMPEIDOS	        = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41053_frmPedidos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMSUSCRIPTORES	= SITEADM_PATH_DIR_SKIN . "/html/principal/page_41054_frmSuscriptores.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMCONTACTOS	    = SITEADM_PATH_DIR_SKIN . "/html/principal/page_41055_frmContactos.html";
//const SITEADM_HTML_DIR_ATENCLI_FRMLIBRORECLAMO	= SITEADM_PATH_DIR_SKIN . "/html/principal/page_41056_frmLibroReclamos.html";
//const SITEADM_HTML_DIR_PVENTA_FRMVENTASCLIENTE	= SITEADM_PATH_DIR_SKIN . "/html/gestionVentas/registrarVentas/page_50101_frmRegistrarVentas.html";
//const SITEADM_HTML_DIR_COMPRA_FRMREGISTCOMPRAS  = SITEADM_PATH_DIR_SKIN . "/html/gestionCompras/registrarCompras/page_31031_frmRegistrarCompras.html";
//const SITEADM_CUSUARIO_FRMREGUSUARIO            = "apps/ecwitper-site-portaladmin/views/ecwitper-controlacceso-cuentausuario-view/src/html/regCuentaUsuario/frmRegCuentaUsuario.html";
//const SITEADM_REGCOMPRAS_FRMREGCOMPRA           = "apps/ecwitper-site-portaladmin/views/ecwitper-ingresomercancia-registrocompra-view/src/html/registrarCompras/frmRegistrarCompras.html";


?>
