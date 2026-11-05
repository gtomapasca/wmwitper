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

	// 20261021 Degui: obtener post seleccionado
	public function obtenerPostSeleccionado() {
		$dataRequest["codPost"] = $_GET["id"];
		$service = new ConsultarBlogServiceImpl();
		$dataResponse = $service->obtenerPostSeleccionadoById($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	
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
