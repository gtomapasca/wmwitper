<?php

// Cargar Página Menú
class CPMenuPublicadorPaginasController {

	// 20240627 Degui: carga página inicio tienda
	public function cargarInicioTienda($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_INICIO;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarNosotros($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_NOSOTROS;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarSuscribir($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_FRMSUSCRIBIR;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarContacto($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_CONTACTENOS;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarPostulante($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_POSTULANTE;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarLibroReclamo($dataRequest) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_LIBRORECLA;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	public function cargarServicios($file) {
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		//$file = SITECLI_HTML_DIR_CIXSERVTEC;
		return $dataResponse = $this->armarPagina($dicc, $file);
	}

	// 20240519 Degui: carga ofeta de productos
	public function cargarOfertaProductos($dataRequest) {

		$file = "";
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_VER_OFERTAS;

		// renderizar paginas
		$html = file_get_contents($file);
		$tmpl = new Template($html);
		$pagina = $tmpl->render($dicc);

		if($pagina){
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] = "encontrado";
			$dataResponse["datos"] = $pagina;
		}else{
			$dataResponse["encontrado"] = false;
			$dataResponse["mensaje"] = "no encontrado";
			$dataResponse["datos"] = '';
		}
		return $dataResponse;

	}

	public function armarPagina($dicc, $file) {
		// renderizar paginas
		$html = file_get_contents($file);
		$tmpl = new Template($html);
		$pagina = $tmpl->render($dicc);
		if($pagina){
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] = "encontrado";
			$dataResponse["datos"] = $pagina;
		}else{
			$dataResponse["encontrado"] = false;
			$dataResponse["mensaje"] = "no encontrado";
			$dataResponse["datos"] = '';
		}
		return $dataResponse;
	}

}

?>
