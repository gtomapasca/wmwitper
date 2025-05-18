<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/service/imp/src/php/ConsultarAtencionClienteServiceImpl.php';

class ConsultarController extends Controller {

	// 20210524 Degui: listar suscriptores
	public function obtenerListaSuscriptores() {
		$service = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $service->obtenerListaSuscriptores();
		echo json_encode($dataResponse);
		exit();
	}
	// 20210524 Degui: listar contactos
	public function obtenerListaContactos() {
		$service = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $service->obtenerListaContactos();
		echo json_encode($dataResponse);
		exit();
	}
	// 20210524 Degui: listar libro reclamos
	public function obtenerListaLibroReclamos() {
		$service = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $service->obtenerListaLibroReclamos();
		echo json_encode($dataResponse);
		exit();
	}

}

?>
