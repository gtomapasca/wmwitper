<?php
require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

// Cargar Página Modal
class CPModalPublicadorArticulosController extends Controller{

	public function mostrarArticuloSel() {
		$file = "";
		$dicc = array();
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;

		//$dicc = $datos;
		$dicc["cod_articulo"] = $_GET["id"];
		$file = SITECLI_HTML_DIR_POST;
		
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


}

?>
