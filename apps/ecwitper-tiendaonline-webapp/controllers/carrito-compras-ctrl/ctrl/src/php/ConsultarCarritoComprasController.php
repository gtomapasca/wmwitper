<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
//require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-ventaselectronicas-carritocompras-modl/service/imp/src/php/ConsultarCarritoServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/ConsultarCarritoComprasServiceImpl.php';

class ConsultarCarritoComprasController extends Controller {

	// 20200117 Obtener lista de carrito
	public function obtenerListaCarrito() {
		$service = new ConsultarCarritoComprasServiceImpl();
		$dataResponse = $service->getCarList();
		echo json_encode($dataResponse);
		exit();
	}

	// 20210207 Degui: obtener total de items carrito
	public function obtenerCantItemsCarrito() {
		$service = new ConsultarCarritoComprasServiceImpl();
		$dataResponse = $service->getCantItemsCar();
		echo json_encode($dataResponse);
		exit();
	}

	
}

?>
