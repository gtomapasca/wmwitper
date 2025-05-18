<?php

require_once 'core/controller.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/imp/src/php/RegistrarCuentaUsuarioServiceImpl.php';

class RegistrarCuentaUsuarioController extends Controller{

	// 20210213: registrar nuevo usuario
	public function registrarNuevoUsuario() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarCuentaUsuarioServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarUsuarioCli($jsonDataForm);
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
