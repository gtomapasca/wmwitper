<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
// Importación semántica corregida sin el sufijo rápido
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/service/imp/src/php/RegistrarSoporteTecnicoServiceImpl.php';

class RegistrarController extends Controller {

	// 20261111 Modo Desarrollador: Grabar la orden técnica completa o cotización (Cabecera y Grilla)
	public function grabarIngresoOrdenTecnica() {
		$dataRequest = array();
		if($_POST['datos']){ 
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new RegistrarSoporteTecnicoServiceImpl();
		$dataResponse = $service->grabarIngresoOrdenTecnica($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20261111 Modo Desarrollador: Inserción de cliente de contingencia desde el modal flotante
	public function registrarCliente() {
		$dataRequest = array();
		if($_POST['datos']){ 
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new RegistrarSoporteTecnicoServiceImpl();
		$dataResponse = $service->registrarCliente($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20261111 Modo Desarrollador: Alta de nuevo dispositivo técnico asociado a un cliente
	public function registrarEquipo() {
		$dataRequest = array();
		if($_POST['datos']){ 
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new RegistrarSoporteTecnicoServiceImpl();
		$dataResponse = $service->registrarEquipo($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

}

?>
