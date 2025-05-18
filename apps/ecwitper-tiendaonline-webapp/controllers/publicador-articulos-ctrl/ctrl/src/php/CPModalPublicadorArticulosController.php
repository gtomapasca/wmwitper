<?php
require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/imp/src/php/ConsultarBlogServiceImpl.php';

// Cargar Página Modal
class CPModalPublicadorArticulosController extends Controller{

	public function mostrarArticuloSel() {
		//$dataRequest["page"] = $_GET["page"];
		$dataRequest["codPost"] = $_GET["id"];
		// Consultamos los datos del articulo
		$service = new ConsultarBlogServiceImpl();
		//$dataRequest["data"] = $service->buscarPostById($dataRequest);
		$data = $service->buscarPostById($dataRequest);
		$datos = $data["datos"];
		// ---------------------------
		$file = "";
		$dicc = array();
		
		$dicc[SITECLI_PATH_TAG_LARGE] = SITECLI_PATH_DIR_LARGE;

		$dicc = $datos;

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
