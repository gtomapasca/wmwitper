<?php
/*
 *************************************** 
 * CONSTANTES ADMIN 
 ***************************************
 * Dominio: nitper.com
 ***************************************
*/
// Rutas generales
//const APP_DIR = '/';
const APP_DIR 				= '/sw201b/witper/witper-1.2.5/application.php';
const DEFAULT_MODULE 			= '';
const DEFAULT_MODEL 			= '';
const DEFAULT_RESOURCE 			= '';

//const PATH_ROOT 			= '../../../../';

/*
 *************************************** 
 * CONSTANTES SITEADMIN 
 ***************************************
*/
const PATH_STATIC_DIR_ADMIN 		= 'static/witper/';

// name page
const PATH_HTML_LOGINADMIN		= "apps/siteadm/html/principal/template_login.html";
const PATH_HTML_PRINCIPALADMIN		= "apps/siteadm/html/principal/template_principal.html";

// Constantes de areas comunes Admin
const TG_AD_HTML_COMMON_HEAD		= "COMMON_HEAD";
const PH_AD_HTML_COMMON_HEAD		= "apps/siteadm/html/common/CommonHead.html";
const TG_AD_HTML_COMMON_HEADER 		= "COMMON_HEADER";
const PH_AD_HTML_COMMON_HEADER 		= "apps/siteadm/html/common/CommonHeader.html";
const TG_AD_HTML_COMMON_SIDEMENU	= "COMMON_SIDEMENU";
const PH_AD_HTML_COMMON_SIDEMENU	= "apps/siteadm/html/common/CommonSideMenu.html";
const TG_AD_HTML_COMMON_FOOTER 		= "COMMON_FOOTER";
const PH_AD_HTML_COMMON_FOOTER 		= "apps/siteadm/html/common/CommonFooter.html";

// Constantes de cabecera de página
const TAG_SITE_TITLE   			= "SITE_TITLE";
const DESC_SITE_TITLE 			= "NITPER - Technology";
const TG_AD_CSS_BOOTSTRAP   		= "CSS_BOOTSTRAP";
const PH_AD_CSS_BOOTSTRAP 		= "libs/bootstrap/css/bootstrap.min.css";
const TG_AD_CSS_WITPER_COMMON 		= "CSS_WITPER_COMMON";
const PH_AD_CSS_WITPER_COMMON 		= "apps/siteadm/css/common/witper_general.css";
const TG_AD_CSS_WITPER_PAGE  		= "CSS_WITPER_PAGE";		// Tag general
const PH_AD_CSS_WITPER_LOGIN 		= "apps/siteadm/css/principal/witper_login.css";
const PH_AD_CSS_WITPER_PRINCIPAL 	= "apps/siteadm/css/principal/witper_principal.css";

// Constante pie de pagina
const TG_AD_JS_BOOTSTRAP_JQUERY		= "JS_BOOTSTRAP_JQUERY";
const PH_AD_JS_BOOTSTRAP_JQUERY 	= "libs/bootstrap/js/jquery-1.12.1.min.js";
const TG_AD_JS_BOOTSTRAP		= "JS_BOOTSTRAP";
const PH_AD_JS_BOOTSTRAP 		= "libs/bootstrap/js/bootstrap.min.js";
const TG_AD_JS_JQUERY 			= "JS_JQUERY";
const PH_AD_JS_JQUERY 			= "libs/jquery/jquery-3.3.1.min.js";
const TG_AD_JS_WITPER_COMMON 		= "JS_WITPER_COMMON";
const PH_AD_JS_WITPER_COMMON 		= "apps/siteadm/js/common/witper_general.js";
//const TAG_JS_WITPER_PAGE 		= "JS_WITPER_PAGE";
//const TG_AD_JS_WITPER_PAGE 		= "TAG_JS_WITPER_PAGE";		// Tag general
const TG_AD_JS_WITPER_PAGE 		= "JS_WITPER_PAGE";		// Tag general
const PH_AD_JS_WITPER_LOGIN 		= "apps/siteadm/js/principal/witper_login.js";
const PH_AD_JS_WITPER_PRINCIPAL 	= "apps/siteadm/js/principal/witper_principal.js";

// imagenes
const TG_AD_SITE_FAVICON     		= "SITE_FAVICON";
const PH_AD_SITE_FAVICON 		= "apps/siteadm/images/principal/site/favicon_nitper.ico";
const TG_AD_SITE_LOGO			= "SITE_LOGO";
const PH_AD_SITE_LOGO 			= "apps/siteadm/images/principal/site/logo_nitper.png";

/*
 ***************************************
 * CONSTANTES SITECLI 
 ***************************************
*/
// Constantes de rutas principales
// Small, Medium, Large
const SITECLI_PATH_DIR_MEDIUM 		= "static/witper";
const SITECLI_PATH_TAG_LARGE		= "PATH_LARGE";
const SITECLI_PATH_DIR_LARGE 		= "../../../../static/witper";
const SITECLI_PATH_DIR_SKIN		= '/apps/sitecli/skin/witper';

// Constantes de paginas comunes
const SITECLI_HTML_TAG_COMMONHEAD	= "COMMON_HEAD";
const SITECLI_HTML_DIR_COMMONHEAD	= SITECLI_PATH_DIR_SKIN . "/html/common/CommonHead.html";
const SITECLI_HTML_TAG_COMMONHEADER	= "COMMON_HEADER";
const SITECLI_HTML_DIR_COMMONHEADER 	= SITECLI_PATH_DIR_SKIN . "/html/common/CommonHeader.html";
const SITECLI_HTML_TAG_COMMONFOOTER	= "COMMON_FOOTER";
const SITECLI_HTML_DIR_COMMONFOOTER 	= SITECLI_PATH_DIR_SKIN . "/html/common/CommonFooter.html";
const SITECLI_HTML_TAG_CHAT		= "SITECLI_CHAT";
const SITECLI_HTML_DIR_CHAT 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_11101_clienteChat_v0.5.html";

// Constantes de cabecera de pagina
const SITECLI_HTML_TAG_SITETITLE	= "SITECLI_TITLE";
const SITECLI_HTML_DES_SITETITLE 	= "NITPER - Technology";
const SITECLI_HTML_TAG_SITEDESCRIP	= "SITECLI_DESCRIPTION";
const SITECLI_HTML_DES_SITEDESCRIP 	= "NITPER - Technology";
const SITECLI_HTML_TAG_SITEKEYWORDS	= "SITECLI_KEYWORDS";
const SITECLI_HTML_DES_SITEKEYWORDS 	= "NITPER - Technology";
const SITECLI_HTML_TAG_FAVICON 		= "SITECLI_FAVICON";
const SITECLI_HTML_DIR_FAVICON 		= SITECLI_PATH_DIR_SKIN . "/img/principal/site/favicon_nitper.ico";
const SITECLI_CSS_TAG_LIB_BOOTSTRAP	= "CSS_LIB_BOOTSTRAP";
const SITECLI_CSS_DIR_LIB_BOOTSTRAP	= "/libs/bootstrap/css/bootstrap.min.css";
const SITECLI_CSS_TAG_LIB_FONTAWESOME   = "CSS_LIB_FONTAWESOME";
const SITECLI_CSS_DIR_LIB_FONTAWESOME 	= "/libs/font-awesome/css/font-awesome.min.css";
const SITECLI_CSS_TAG_LIB_RESET  	= "CSS_LIB_RESET";
const SITECLI_CSS_DIR_LIB_RESET 	= "reset.css";

const SITECLI_HTML_TAG_LOGO		= "SITECLI_LOGO";
const SITECLI_HTML_DIR_LOGO		= SITECLI_PATH_DIR_SKIN . "/img/principal/site/logo_nitper.png";
const SITECLI_HTML_TAG_CARITEMS 	= "TAG_CAR_ITEMS";
const SITECLI_HTML_DES_CARITEMS 	= "0";

// Constantes de pie de pagina
const SITECLI_JS_TAG_LIB_JQUERY		= "JS_LIB_JQUERY";
const SITECLI_JS_DIR_LIB_JQUERY		= "/libs/jquery/jquery-3.3.1.min.js";
const SITECLI_JS_TAG_LIB_BSTRAP_JQ	= "JS_LIB_BSTRAP_JQ";
const SITECLI_JS_DIR_LIB_BSTRAP_JQ 	= "/libs/bootstrap/js/jquery-1.12.1.min.js";
const SITECLI_JS_TAG_LIB_BOOTSTRAP	= "JS_LIB_BOOTSTRAP";
const SITECLI_JS_DIR_LIB_BOOTSTRAP	= "/libs/bootstrap/js/bootstrap.min.js";
const SITECLI_JS_TAG_LIB_WITPER_CLI 	= "JS_LIB_WITPER_CLI";		// Tag general
const SITECLI_JS_DIR_LIB_WITPER_CLI 	= "/libs/witper-cli/js/witper_cli-0.0.1.js";
const SITECLI_HTML_TAG_COPYRIGHT	= "SITECLI_COPYRIGHT";
const SITECLI_HTML_DES_COPYRIGHT 	= "Copyright ©2021 Nitper. Todos los derechos reservados.";

// Constantes de archivos html
const SITECLI_HTML_DIR_PRINCIPAL	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10000_principal.html";
const SITECLI_HTML_DIR_INICIO 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10101_inicio.html";
const SITECLI_HTML_DIR_NOSOTROS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10201_nosotros.html";
const SITECLI_HTML_DIR_SOLUCIONES 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10301_solucion.html";
const SITECLI_HTML_DIR_SOLSYSEMP 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10302_solemp.html";
const SITECLI_HTML_DIR_SOLSYSGEST 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10303_solerp.html";
const SITECLI_HTML_DIR_SOLSYSCOMMER 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10304_solecommerce.html";
const SITECLI_HTML_DIR_SOLSYSGPS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10305_solgps.html";
const SITECLI_HTML_DIR_SOLSYSCMS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10306_solcms.html";
const SITECLI_HTML_DIR_SOLSYSTOOLS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10311_soltools.html";
const SITECLI_HTML_DIR_SOLTOOLS01 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10312_soltool1.html";
const SITECLI_HTML_DIR_SOLTOOLS02 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10313_soltool2.html";
const SITECLI_HTML_DIR_SERVICIOS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10401_servicio.html";
const SITECLI_HTML_DIR_SERVPROY 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10402_servproy.html";
const SITECLI_HTML_DIR_SERVHOST 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10403_servinfra.html";
const SITECLI_HTML_DIR_TIENDA 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10501_tienda.html";
const SITECLI_HTML_DIR_BLOG 		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10601_blog.html";
const SITECLI_HTML_DIR_POST		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10602_post.html";
const SITECLI_HTML_DIR_CONTACTENOS 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10701_contacto.html";
const SITECLI_HTML_DIR_LIBRORECLA 	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_11001_frmLibroRecla.html";
const SITECLI_HTML_DIR_FRMNEWUSER	= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10901_frmNewUser.html";
const SITECLI_HTML_DIR_FRMCAR		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10801_frmCarrito.html";
const SITECLI_HTML_DIR_PRODUCTO		= SITECLI_PATH_DIR_SKIN . "/html/principal/page_10502_frmProducto.html";
const SITECLI_HTML_DIR_SPCUENTA		= SITECLI_PATH_DIR_SKIN . "/html/cuenta/page_spCuenta.html";
const SITECLI_HTML_DIR_SPCARRITO	= SITECLI_PATH_DIR_SKIN . "/html/cuenta/page_spCarrito.html";

?>
