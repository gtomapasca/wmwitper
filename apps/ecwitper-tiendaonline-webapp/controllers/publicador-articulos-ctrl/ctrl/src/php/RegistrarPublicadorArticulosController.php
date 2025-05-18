<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-blogtienda-common/service/imp/src/php/RegistrarBlogServiceImpl.php';

class RegistrarPublicadorArticulosController extends Controller {
	
	// 20210210 registrar comentario post
	public function agregarComentarioPost() {
		$dataRequest["codPost"]    = $_POST["codPost"];
		$dataRequest["nick"] 	   = $_POST["txtNick"];
		$dataRequest["comentario"] = $_POST["txtComentario"];
		$service = new RegistrarBlogServiceImpl();
		$dataResponse = $service->registrarComentarioPost($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


}

?>
