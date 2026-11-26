<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/service/imp/src/php/ConsultarSoporteTecnicoServiceImpl.php';

class ConsultarController extends Controller {

	// 1. Listar los 5 últimos servicios o cotizaciones
	public function obtenerListaOrdenesTecnicas() {
		$dataRequest = array();
		if (isset($_POST['datos'])) { 
			$datosArray = json_decode($_POST['datos']);
			foreach ($datosArray as $clave => $valor) {
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->obtenerListaOrdenesTecnicas($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 2. Buscar cliente por tipo y número de documento
		// 2. Buscar cliente por tipo y número de documento (vía POST limpio)
	public function buscarClientePorDniRuc() {
		$dataRequest = array();
		if (isset($_POST['datos'])) {
			$datosArray = json_decode($_POST['datos']);
			foreach ($datosArray as $clave => $valor) {
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->buscarClientePorDniRuc($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


		// 3. Consultar equipos vinculados a un cliente
	public function obtenerEquiposPorCliente() {
		$dataRequest = array();
		if (isset($_POST['datos'])) {
			$datosArray = json_decode($_POST['datos']);
			foreach ($datosArray as $clave => $valor) {
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->obtenerEquiposPorCliente($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


	// 4. Obtener catálogo de servicios del taller
	public function obtenerCatalogoServicios() {
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->obtenerCatalogoServicios();
		echo json_encode($dataResponse);
		exit();
	}

	// 5. Obtener ficha completa por ID al pulsar "Ver"
		// 5. Obtener ficha completa por ID al pulsar "Ver" (POST limpio)
	public function obtenerFichaCompletaPorId() {
		$dataRequest = array();
		if (isset($_POST['datos'])) {
			$datosArray = json_decode($_POST['datos']);
			foreach ($datosArray as $clave => $valor) {
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->obtenerFichaCompletaPorId($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


		// 6. Buscar producto/repuesto en tienda por código corto o completo (POST limpio)
	public function buscarProductoTienda() {
		$dataRequest = array();
		if (isset($_POST['datos'])) {
			$datosArray = json_decode($_POST['datos']);
			foreach ($datosArray as $clave => $valor) {
				$dataRequest[$clave] = $valor;
			}
		}
		
		$service = new ConsultarSoporteTecnicoServiceImpl();
		$dataResponse = $service->buscarProductoTienda($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}


}

?>
