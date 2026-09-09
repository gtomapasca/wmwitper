<?php

require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/ifz/src/php/RegistrarCarritoComprasService.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/imp/src/php/ConsultarCatalogoProductosServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/imp/src/php/SqlMapPedidoDAO.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/imp/src/php/SqlMapDetPedidoDAO.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/model/src/php/Carrito.php';

class RegistrarCarritoComprasServiceImpl implements RegistrarCarritoComprasService {
	// Degui 20191010: Agregar producto al carrito
	public function addProductoCar($dataRequest){
		$service = new ConsultarCatalogoProductosServiceImpl();
		$data = $service->obtenerProductoByMinicodigo($dataRequest);
		if($data["encontrado"]){
			// Se inicia la sesion
			session_start(); 
			if (!isset($_SESSION["carrito"])){
				// Se crea el objeto carrito en sesion
				$_SESSION["carrito"] = new Carrito();
			}
			// Se agrega producto al carrito
			//$data_producto = $dataResponse["datos"][0];
			$data_producto = $data["datos"];
			$cantidad 	   = $dataRequest["cantidad"];
			$car_producto  = $_SESSION["carrito"]->set_car_detalle_producto($data_producto, $cantidad);
			// valores a retornar
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] = "Se añadio el producto al carrito";
			$dataResponse["datos"]   = $car_producto;
			$dataResponse["ncar"]    = $_SESSION["carrito"]->get_car_nproductos();
		}else{
			$dataResponse["encontrado"] = false;
		}
		return $dataResponse;
	}

	// Degui 20191010: Agregar cliente al carrito
	public function addClienteCar($jsonParams) {
		// Se inicia la sesion
		session_start();
		$objRespuesta = new stdClass();
		try{			
			if (isset($_SESSION["carrito"])){
				// se agrega al carrito
				$_SESSION["carrito"]->set_datos_cliente($jsonParams);
				$car_detalle_pedido = $_SESSION["carrito"]->get_car_pedido();
				// valores a retornar
				$objRespuesta->tip = "I"; // Info
				$objRespuesta->msj = "Se registraron los datos del cliente al carrito";
				$objRespuesta->val = true;
				$objRespuesta->datos = $car_detalle_pedido;
				return $objRespuesta;
			}else{
				//mensaje no existe sesión
				$dataResponse["encontrado"] = false;
				$dataResponse["mensaje"] = "No se pudo agregar cliente al carrito porque no existe sesión";
				$dataResponse["datos"] = null;
			}
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

	public function registrarCarritoPedido($data_carrito) {
		try{
			// Se inicia la sesion
			//session_start();
			//$dataResponse = array();
			$objRespuesta = new stdClass();
			if (isset($_SESSION["carrito"])){
				// setear RUC del negocio
				$dataPedidoReq["ruc_negocio"] = RUC_NEGOCIO;
				// setea data carrito
				$dataPedidoReq["datos_cliente"] = $data_carrito["datos_cliente"];
				$data_list_productos = $data_carrito["car_detalle_producto"];
				
				// Registrar pedido
				$sqlMapPedidoDAO = new SqlMapPedidoDAO();
				//$dataPedidoReq["nro_pedido"] = strval($nro_pedido);
				//----------------------------------------
				$anio = date("Y");
				$mes = date("m");
				$aleatorio = mt_rand(1,999999);
				$formatNum = str_pad($aleatorio, 6, "0");
				$nroPedido = $anio.$mes.$formatNum;
				//----------------------------------------	
				$dataPedidoReq["nro_pedido"] = $nroPedido;
				$sqlMapPedidoDAO->insertPedidoCar($dataPedidoReq);

				// Consultar ultimo pedido
				//$sqlMapPedidoDAO = new SqlMapPedidoDAO();
				$dataPedido = $sqlMapPedidoDAO->getLastPedido();
				$id_last    = $dataPedido[0]["id_pedido"];
				//$id_pedido  = ($id_last != null && $id_last > 0 ? $id_last : 0);
				//$nro_pedido = $id_pedido != null ? $id_pedido + 1000 : 0;

				// Registrar detalle pedido
				$sqlMapDetPedidoDAO = new SqlMapDetPedidoDAO();
				$dataDetPedidoReq["id_pedido"] = $id_last;
				$dataDetPedidoReq["nro_pedido"] = $nroPedido;
				foreach($data_list_productos as $item){
					if($item["estado"]==0){
						$dataDetPedidoReq["item"] = $item;
						$sqlMapDetPedidoDAO->insertDetallePedidoCar($dataDetPedidoReq);
					}
				}

				// actualizar pedido

				// Retornamos numero de pedido
				//$dataResponse = array("nro_pedido" => $nro_pedido, "encontrado" => true, "mensaje" => "Se registro correctamente");
				$objRespuesta->tip = "I"; // Info
				$objRespuesta->msj = "Se registro correctamente";
				$objRespuesta->val = true;
				$objRespuesta->datos = $nroPedido;
				//Limpiar carrito y session
				$_SESSION["carrito"] = null; // 20251228 GTP agregado
				session_destroy();
			}else{
				//mensaje no existe sesión
				$objRespuesta->tip = "A"; // Advertencia
				$objRespuesta->msj = "No se pudo registrar carrito porque no existe sesión";
				$objRespuesta->val = false;
			}
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

	// Quitar item del carrito
	public function delProductoCar($index) {
		session_start();
		$objRespuesta = new stdClass();
		try{			
			if (isset($_SESSION["carrito"])){
				$data = $_SESSION["carrito"]->del_car_producto($index);
				$objRespuesta->tip = "I"; // Info
				$objRespuesta->msj = "Se retiro item del carrito";
				$objRespuesta->val = true;
				$objRespuesta->datos = $data;
				//return $objRespuesta;
			}else{
				$objRespuesta->tip = "A"; // Advertencia
				$objRespuesta->msj = "No se pudo elimnar item del carrito porque no existe sesión";
				$objRespuesta->val = false;
				//return $objRespuesta;
			}
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

}

?>
