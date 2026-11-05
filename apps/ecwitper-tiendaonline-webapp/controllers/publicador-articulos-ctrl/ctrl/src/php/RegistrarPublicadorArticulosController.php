<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
//require_once 'commons/ecwitper-tiendaonline-blogtienda-common/service/imp/src/php/RegistrarBlogServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/imp/src/php/RegistrarBlogServiceImpl.php';

class RegistrarPublicadorArticulosController extends Controller {

	// 20210210 registrar comentario post
	// 20261021 se adecua funcion para recibir datos de formulario en json
	public function agregarComentarioPost() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarBlogServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarComentarioPost($jsonDataForm);
			//$objResponse = $jsonDataForm;
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}


}

?>
