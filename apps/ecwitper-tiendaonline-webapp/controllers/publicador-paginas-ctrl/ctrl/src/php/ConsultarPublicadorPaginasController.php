<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
//require_once 'apps/ecwitper-tiendaonline-webapp/controllers/catalogo-productos-ctrl/libs/src/php/commons.php';
//require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/ConsultarCarritoComprasServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/imp/src/php/ConsultarOfertaProductosServiceImpl.php';

class ConsultarPublicadorPaginasController extends Controller{

	// 20210207 Degui: obtener total de items carrito
	/*public function obtenerCantItemsCarrito() {
		$service = new ConsultarCarritoComprasServiceImpl();
		$dataResponse = $service->getCantItemsCar();
		echo json_encode($dataResponse);
		exit();
	}*/

	// 20220328 Degui: obtener ofertas
	public function obtenerOfertasDeProductos() {
		$service = new ConsultarOfertaProductosServiceImpl();
		$dataResponse = $service->obtenerOfertasDeProductos();
		echo json_encode($dataResponse);
		exit();
	}


}

?>
