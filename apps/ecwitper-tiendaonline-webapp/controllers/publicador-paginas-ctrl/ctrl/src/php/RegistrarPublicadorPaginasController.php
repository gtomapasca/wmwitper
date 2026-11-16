<?php

require_once 'core/controller.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/service/imp/src/php/RegistrarPublicadorPaginasServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/imp/src/php/RegistrarCuentaUsuarioServiceImpl.php';

class RegistrarPublicadorPaginasController extends Controller{

	// 20240714: registrar suscripción mail
	public function registrarSuscripcionMail() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarPublicadorPaginasServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarSuscripcionMail($jsonDataForm);
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
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}

    // 20261107: registrar contacto
	public function registrarContacto() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarPublicadorPaginasServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarContacto($jsonDataForm);
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}

    // 20261108: registrar reclamo
	public function registrarReclamo() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarPublicadorPaginasServiceImpl();
            $jsonDataForm = json_decode($_POST['datos']);
            $objResponse = $service->registrarReclamo($jsonDataForm);
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos para registrar reclamo";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}

    // 20261108: enviar aviso reclamo
	public function enviarAvisoReclamo() {
		$objResponse = new stdClass();
		if($_GET['numAvisoAsoc']){ // si existe
            $service = new RegistrarPublicadorPaginasServiceImpl();
            $numAvisoAsoc = $_GET['numAvisoAsoc'];
            $objResponse = $service->enviarAvisoReclamo($numAvisoAsoc);
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos para enviar aviso de reclamo";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}


}

?>
