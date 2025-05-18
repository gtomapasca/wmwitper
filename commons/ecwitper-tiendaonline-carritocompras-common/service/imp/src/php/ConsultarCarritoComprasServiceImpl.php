<?php

require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/ifz/src/php/ConsultarCarritoComprasService.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/model/src/php/Carrito.php';

class ConsultarCarritoComprasServiceImpl implements ConsultarCarritoComprasService {
	// obtener lista de carrito
	public function getCarList() {
		session_start();
		$dataResponse["encontrado"] = false;
		if (isset($_SESSION["carrito"])){
			if ($_SESSION["carrito"]->get_car_nproductos() > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "Detalle de carrito";
				$dataResponse["datos"] 	    = $_SESSION["carrito"]->get_car_detalle_producto();
			}
		}
		return $dataResponse;
	}

	// obtener pedido carrito
	public function getPedidoCar() {
		session_start();
		$dataResponse = array();
		if (isset($_SESSION["carrito"])){
			$dataResponse = $_SESSION["carrito"]->get_car_pedido();
		}
		return $dataResponse;
	}

	// Degui 20210207 consultar cantidad de productos
	public function getCantItemsCar(){
		session_start();
		$dataResponse = array("encontrado" => false);
		if (isset($_SESSION["carrito"])){
			$dataResponse["encontrado"]   = true;
			$dataResponse["cantItemsCar"] = $_SESSION["carrito"]->get_car_nproductos();
		}
		return $dataResponse;
	}

}

?>
