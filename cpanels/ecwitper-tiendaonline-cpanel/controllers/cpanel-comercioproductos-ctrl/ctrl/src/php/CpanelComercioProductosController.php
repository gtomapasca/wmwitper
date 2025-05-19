<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

class CpanelComercioProductosController extends Controller {

	function opcionPrincipal() {
		$this->cargarPaginaPrincipal();
	}

   	function cargarPaginaPrincipal() {
		$paginaPrincipal = $this->paginaPrincipal();
		$paginaPrincipal = str_replace('{principal_opcion}', 'inicio', $paginaPrincipal);
		print $paginaPrincipal;
	}

	function cargarPaginaProducto() {
		$mc = $_GET["mc"]; 
		$paginaPrincipal = $this->paginaPrincipal();
		$paginaPrincipal = str_replace('{principal_opcion}', 'producto', $paginaPrincipal);
		$paginaPrincipal = str_replace('{principal_clave}', 'miniCodigo', $paginaPrincipal);
		$paginaPrincipal = str_replace('{principal_valor}', $mc, $paginaPrincipal);
		print $paginaPrincipal;
	}

	function cargarPaginaOfertas() {
		$paginaPrincipal = $this->paginaPrincipal();
		$paginaPrincipal = str_replace('{principal_opcion}', 'ofertas', $paginaPrincipal);
		print $paginaPrincipal;
	}

	function paginaPrincipal() {
		
		$dicc1 = array( CPANEL_HTML_TAG_COMMONHEADER	=> CPANEL_HTML_DIR_COMMONHEADER,
						CPANEL_HTML_TAG_COMMONFOOTER	=> CPANEL_HTML_DIR_COMMONFOOTER
						//TIENDA_HTML_TAG_LOGINUSER		=> TIENDA_HTML_DIR_LOGINUSER,
						//SITECLI_HTML_TAG_CHAT			=> SITECLI_HTML_DIR_CHAT
		    	     );
		
		$dicc2 = array( SITECLI_HTML_TAG_SITETITLE		=> SITECLI_HTML_DES_SITETITLE,
						SITECLI_HTML_TAG_SITEDESCRIP	=> SITECLI_HTML_DES_SITEDESCRIP,
						SITECLI_HTML_TAG_SITEKEYWORDS	=> SITECLI_HTML_DES_SITEKEYWORDS,
						SITECLI_HTML_TAG_FAVICON		=> SITECLI_PATH_DIR_LARGE . SITECLI_HTML_DIR_FAVICON,	
						SITECLI_CSS_TAG_LIB_BOOTSTRAP	=> SITECLI_PATH_DIR_LARGE . SITECLI_CSS_DIR_LIB_BOOTSTRAP,
						SITECLI_CSS_TAG_LIB_FONTAWESOME	=> SITECLI_PATH_DIR_LARGE . SITECLI_CSS_DIR_LIB_FONTAWESOME,
						SITECLI_CSS_TAG_LIB_JQUERY_UI	=> SITECLI_PATH_DIR_LARGE . SITECLI_CSS_DIR_LIB_JQUERY_UI,
						SITECLI_CSS_TAG_LIB_RESET		=> SITECLI_PATH_DIR_LARGE . SITECLI_CSS_DIR_LIB_RESET,
						SITECLI_HTML_TAG_LOGO			=> SITECLI_PATH_DIR_STORE . SITECLI_HTML_DIR_LOGO,
						SITECLI_HTML_TAG_LOGOPIE		=> SITECLI_PATH_DIR_STORE . SITECLI_HTML_DIR_LOGOPIE,
						SITECLI_HTML_TAG_CARITEMS		=> SITECLI_HTML_DES_CARITEMS,				
						SITECLI_JS_TAG_LIB_JQUERY		=> SITECLI_PATH_DIR_LARGE . SITECLI_JS_DIR_LIB_JQUERY,		  		
						SITECLI_JS_TAG_LIB_JQUERY_UI	=> SITECLI_PATH_DIR_LARGE . SITECLI_JS_DIR_LIB_JQUERY_UI,
						SITECLI_JS_TAG_LIB_BSTRAP_JQ	=> SITECLI_PATH_DIR_LARGE . SITECLI_JS_DIR_LIB_BSTRAP_JQ,
						SITECLI_JS_TAG_LIB_BOOTSTRAP	=> SITECLI_PATH_DIR_LARGE . SITECLI_JS_DIR_LIB_BOOTSTRAP,
						SITECLI_JS_TAG_LIB_WITPER_CLI	=> SITECLI_PATH_DIR_LARGE . SITECLI_JS_DIR_LIB_WITPER_CLI,
						//TAG_PRINCIPAL_GENERAL_CSS		=> DIR_PRINCIPAL_GENERAL_CSS,
						SITECLI_PATH_TAG_LARGE			=> SITECLI_PATH_DIR_LARGE,
						CPANEL_PATH_LOCALHOST_TAG		=>	CPANEL_PATH_LOCALHOST_DIR,
						SITECLI_PATH_TAG_STORE			=> SITECLI_PATH_DIR_STORE,
						SITECLI_HTML_TAG_COPYRIGHT		=> SITECLI_HTML_DES_COPYRIGHT				
		    	     );

		// ruta de pagina html
		//$file = SITECLI_PATH_DIR_MEDIUM . SITECLI_HTML_DIR_PRINCIPAL;
		//$file = SITECLI_HTML_DIR_PRINCIPAL;
		$file = CPANEL_HTML_DIR_PRINCIPAL;
		$html = file_get_contents($file);

		// Recorre la vistas a mostrar en el template
		foreach($dicc1 as $clave => $valor){
			$html = str_replace('{'. $clave .'}', file_get_contents($valor), $html);
		}

		$tmpl = new Template($html);
		$paginaPrincipal = $tmpl->render($dicc2);
		return $paginaPrincipal;
		//print $tmpl->render($dicc2);
	}

}

?>
