<?php

// Cargar Página Menú
class CPMenuCarritoComprasController  {

	public function cargarCuentaCarrito($dataRequest) {
		$file = "";
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_SPCARRITO;

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

	public function cargarCarritoCompras($dataRequest) {
		$file = "";
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_FRMCAR;

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
