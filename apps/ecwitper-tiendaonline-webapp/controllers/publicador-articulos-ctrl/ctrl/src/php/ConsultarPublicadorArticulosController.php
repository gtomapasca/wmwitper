<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/imp/src/php/ConsultarBlogServiceImpl.php';

class ConsultarPublicadorArticulosController extends Controller {
	
	// 20210208 Degui: obtener ultimos post
	public function obtenerUltimasPublicaciones() {
		$service = new ConsultarBlogServiceImpl();
		$dataResponse = $service->obtenerUltimasPublicaciones();
		echo json_encode($dataResponse);
		exit();
	}

	/*public function mostrarArticuloSel() {
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
		
		$datos[APP_PATH_LOCALHOST_TAG] = APP_PATH_LOCALHOST_DIR;

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
	}*/
	
	// 20210210 obtener comentarios post
	public function obtenerComentariosPost() {
		$dataRequest["codPost"] = $_GET["id"];
		$service = new ConsultarBlogServiceImpl();
		$dataResponse = $service->buscarComentariosPostById($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


}

?>
