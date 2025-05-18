<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
//require_once 'commons/ecwitper-cuentausuario-common/service/imp/src/php/RegistrarCuentaServiceImpl.php';

class RegistrarPublicadorPaginasController extends Controller{

	public function registrarSuscripcion() {
		$email = $_POST["txtEmail"];
		$service = new RegistrarPrincipalServiceImpl();
		$dataResponse = $service->registrarSuscripcion($email);

		//$dataResponse = funcRegistrarSuscripcion($_POST);
		echo json_encode($dataResponse);
		exit();
	}

	// 20240714: registrar suscripción mail
	public function registrarSuscripcionMail() {
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
