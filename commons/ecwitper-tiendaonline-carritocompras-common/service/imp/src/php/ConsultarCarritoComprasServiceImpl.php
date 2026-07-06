<?php

require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/ifz/src/php/ConsultarCarritoComprasService.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/model/src/php/Carrito.php';

class ConsultarCarritoComprasServiceImpl implements ConsultarCarritoComprasService {
	// obtener lista de carrito
	public function getCarList() {
		try{
			session_start();
			$objRespuesta = new stdClass();
			//$sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
			//$data = $sqlMapUsuarioDAO->selectAccountUser($jsonParams);
			if(isset($_SESSION["carrito"]) && $_SESSION["carrito"]->get_car_nproductos() > 0){
				//if ($_SESSION["carrito"]->get_car_nproductos() > 0){
				$data = $_SESSION["carrito"]->get_car_detalle_producto();
				$objRespuesta->tip = "I"; // Info
				$objRespuesta->msj = "Encontrado";
				$objRespuesta->val = true;
				$objRespuesta->datos = $data;
				//}
			}else{
				$objRespuesta->tip = "A"; // Advertencia
            	$objRespuesta->msj = "Disculpe, no tiene items en el carrito, vuelva a intentarlo"; 
            	$objRespuesta->val = false;
				$objRespuesta->datos = 0;
			}
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
            $objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
            $objRespuesta->val = false;
			$objRespuesta->datos = 0;
			return $objRespuesta;
		}
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
