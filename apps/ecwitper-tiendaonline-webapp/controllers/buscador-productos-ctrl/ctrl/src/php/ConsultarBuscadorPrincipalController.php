<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-buscadorproductos-common/service/imp/src/php/BuscarProductosServiceImpl.php';

class ConsultarBuscadorPrincipalController extends Controller{

	// 20240705 buscador de productos por descripción
    public function buscarProductoByDesc() {
        $objResponse = new stdClass();
		if($_POST['datos']){ // si existe
			$jsonDatos = json_decode($_POST['datos']);
            $service = new BuscarProductosServiceImpl();
            $objResponse = $service->buscarProductoByDesc($jsonDatos);
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
    }


}

?>
