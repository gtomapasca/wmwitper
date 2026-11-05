<?php

require_once 'core/controller.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/imp/src/php/ConsultarOfertaProductosServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/service/imp/src/php/ConsultarPublicadorPaginasServiceImpl.php';

class ConsultarPublicadorPaginasController extends Controller{

	// 20220328 Degui: obtener ofertas
	public function obtenerOfertasDeProductos() {
		$service = new ConsultarOfertaProductosServiceImpl();
		$dataResponse = $service->obtenerOfertasDeProductos();
		echo json_encode($dataResponse);
		exit();
	}

	// 20240413: validar contacto
	// 20240416: validar suscipcion
	public function validarContacto() {
        $objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $jsonDataForm = json_decode($_POST['datos']);
            if(strlen($jsonDataForm->email) < 1){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "no se ha enviado el correo electrónico";
                $objResponse->val = false;
            }else if(strlen($jsonDataForm->mensaje) < 1){
                $objResponse->tip = "A";
                $objResponse->msj = "no se ha enviado mensaje";
                $objResponse->val = false;
            }else {
                $objResponse->tip = "I"; // Info
                $objResponse->msj = "se valido correctamente";
                $objResponse->val = true;
            }
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
