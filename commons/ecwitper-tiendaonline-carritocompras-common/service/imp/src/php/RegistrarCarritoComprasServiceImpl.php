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
	public function addClienteCar($dataRequest){
		// Se inicia la sesion
		session_start();
		$dataResponse = array();
		if (isset($_SESSION["carrito"])){
			// se agrega al carrito
			$_SESSION["carrito"]->set_datos_cliente($dataRequest);
			$car_detalle_pedido = $_SESSION["carrito"]->get_car_pedido();
			// valores a retornar
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] = "Se registraron los datos del cliente al carrito";
			$dataResponse["datos"] = $car_detalle_pedido;
		}else{
			//mensaje no existe sesión
			$dataResponse["encontrado"] = false;
			$dataResponse["mensaje"] = "No se registraron los datos del cliente al carrito";
			$dataResponse["datos"] = array();
		}
		return $dataResponse;
	}

	public function registrarCarritoPedido($data_carrito) {
		try{
			// setea data carrito
			$dataPedidoReq["datos_cliente"] = $data_carrito["datos_cliente"];
			$data_list_productos  		= $data_carrito["car_detalle_producto"];
			// Consultar ultimo pedido
			$sqlMapPedidoDAO = new SqlMapPedidoDAO();
			$dataPedido = $sqlMapPedidoDAO->getLastPedido();
			$id_last    = $dataPedido[0]["id_pedido"];
			$id_pedido  = ($id_last != null && $id_last > 0 ? $id_last : 0);
			$id_pedido++;
			$nro_pedido = $id_pedido != null ? $id_pedido + 1000 : 0;
			// Registrar pedido
			$dataPedidoReq["nro_pedido"] = strval($nro_pedido);
			$sqlMapPedidoDAO->insertPedidoCar($dataPedidoReq);
			// Registrar detalle pedido
			$sqlMapDetPedidoDAO = new SqlMapDetPedidoDAO();
			$dataDetPedidoReq["id_pedido"] = $id_pedido;
			foreach($data_list_productos as $item){
			   if($item["estado"]==0){
				$dataDetPedidoReq["item"] = $item;
				$sqlMapDetPedidoDAO->insertDetallePedidoCar($dataDetPedidoReq);
			   }
			}
			// Retornamos numero de pedido
			$dataResponse = array("nro_pedido" => $nro_pedido, "encontrado" => true, "mensaje" => "Se registro correctamente");
			//Limpiar carrito y session
			if($dataResponse["encontrado"]){
				session_start();
				$_SESSION = array();
				session_destroy();
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"]    = "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

	// Quitar producto pedido
	public function delProductoCar($index){
		session_start();
		$dataResponse = array();
		if (isset($_SESSION["carrito"])){
			$data = $_SESSION["carrito"]->del_car_producto($index);
			if($data){
				//mensaje a retornar
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"] = "Se quito producto del carrito";
				$dataResponse["datos"]   = $data;
				$dataResponse["ncar"]    = $_SESSION["carrito"]->get_car_nproductos();
			}
		}else{
			//mensaje no existe sesión
			$dataResponse["encontrado"] = false;
			$dataResponse["mensaje"]    = "No se registraron los datos del cliente al carrito";
			$dataResponse["datos"]      = array();
		}
		return $dataResponse;
	}

}

?>
