<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
//require_once 'commons/ecwitper-cuentausuario-common/service/imp/src/php/RegistrarCuentaServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/service/imp/src/php/RegistrarPublicadorPaginasServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/imp/src/php/RegistrarCuentaUsuarioServiceImpl.php';

class RegistrarPublicadorPaginasController extends Controller{

	// 20240714: registrar suscripción mail
	/*public function registrarSuscripcionMail() {
		//$email = $_POST["txtEmail"];
		$email = $_POST["email"];
		$service = new RegistrarPublicadorPaginasServiceImpl();
		$dataResponse = $service->registrarSuscripcionMail($email);
		echo json_encode($dataResponse);
		exit();
	}*/

	public function registrarSuscripcionMail() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarPublicadorPaginasServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarSuscripcionMail($jsonDataForm);
			//$objResponse = $jsonDataForm;
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}

	// 20240714: registrar suscripción
	public function registrarSuscripcion() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $jsonDataForm = json_decode($_POST['datos']);
			$service = new RegistrarCuentaUsuarioServiceImpl();
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
