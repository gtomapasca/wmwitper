<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/ConsultarCarritoComprasServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/RegistrarCarritoComprasServiceImpl.php';

class RegistrarCarritoComprasController extends Controller {

    // Degui 20191010: registrar cliente
	public function registrarClienteCarrito() {
		$objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new RegistrarCarritoComprasServiceImpl();
            //$jsonDataForm = json_decode($_POST['datos']);
			$jsonDataForm = $_POST['datos'];
            $objResponse = $service->addClienteCar($jsonDataForm);
			//$objResponse = $jsonDataForm;
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
	}

	// Degui 20191010: Registrar pedido
	public function registrarCarritoPedido() {
        // consultar pedido
        $servicep = new ConsultarCarritoComprasServiceImpl();
		$dataCarrito = $servicep->getPedidoCar();
        // registrar pedido
		$service = new RegistrarCarritoComprasServiceImpl();
		$dataResponse = $service->registrarCarritoPedido($dataCarrito);
		echo json_encode($dataResponse);
		exit();
	}

	// Degui 20191010: Agregar producto al carrito
	public function agregarProductoCarrito() {
		$dataRequest["miniCodigo"]  = $_POST["miniCodigo"];
		$dataRequest["cantidad"]    = $_POST["txtCantidad"];
		$service = new RegistrarCarritoComprasServiceImpl();
		$dataResponse = $service->addProductoCar($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// Degui 20191010: Eliminar producto del carrito
	public function eliminarProductoCarrito() {
		$index = $_GET["index"];
		$service = new RegistrarCarritoComprasServiceImpl();
		$dataResponse = $service->delProductoCar($index);
		echo json_encode($dataResponse);
		exit();
	}

}

?>
