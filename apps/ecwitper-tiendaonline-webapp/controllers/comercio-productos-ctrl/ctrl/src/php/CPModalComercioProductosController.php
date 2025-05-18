<?php
require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

// Cargar Página Modal
class CPModalComercioProductosController extends Controller{

	// 20240424 Degui: carga el catalogo de prudctos en la página inicial
	public function cargarCatalogoProductos($dataRequest) {
		$file = "";
		$dicc = array();	// diccionario
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		//$file = SITECLI_HTML_DIR_INICIO;
		$file = SITECLI_HTML_DIR_CATALOGO;

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
		//return $dataResponse;
		echo json_encode($dataResponse);
		exit();
	}

	// 20240429 Degui: cargar especificación de producto seleccionado
	public function cargarProductoSel() {
		$file = "";
		$dicc = array();
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		
		//$dataRequest["miniCodigo"] = $_GET["mc"];
		//$dicc["miniCodigo"] = $dataRequest["miniCodigo"];
		$dicc["miniCodigo"] = $_GET["mc"];
		$file = SITECLI_HTML_DIR_PRODUCTO;
		//echo $dicc["miniCodigo"];
		// renderizar paginas
		$html = file_get_contents($file);
		$tmpl = new Template($html);
		$pagina = $tmpl->render($dicc);

		// preparar datos a retornar
		if($pagina){
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] = "pagina encontrado";
			$dataResponse["datos"] = $pagina;
		}else{
			$dataResponse["encontrado"] = false;
			$dataResponse["mensaje"] = "no encontrado";
			$dataResponse["datos"] = '';
		}
		//return $dataResponse;
		echo json_encode($dataResponse);
		exit();
	}

	// 20240518 Degui: cargar productos por categoría
	public function cargarProductosPorCategoria($dataRequest) {

		$file = "";
		$dicc = array();	// diccionario
		// 20210310 Degui: mostrar producto por categoria
		// ($page == "20101"){
		$dicc["cod_categoria"] 		= $_GET["codcat"] != null ? $_GET["codcat"] : "";
		$dicc["cod_subcategoria"] 	= $_GET["codsubcat"] != null ? $_GET["codsubcat"] : "";
		$dicc["nom_categoria"] 		= $_GET["nomcat"] != null ? $_GET["nomcat"] : "";
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		//$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;
		//$dicc[SITECLI_PATH_TAG_STORE] = SITECLI_PATH_DIR_STORE;
		$file = SITECLI_HTML_DIR_PRODUCTOCAT;

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
		//return $dataResponse;
		echo json_encode($dataResponse);
		exit();
	}


}

?>
