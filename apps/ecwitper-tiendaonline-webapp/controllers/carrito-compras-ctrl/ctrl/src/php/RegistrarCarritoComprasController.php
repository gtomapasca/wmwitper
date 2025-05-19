<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
//require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-ventaselectronicas-carritocompras-modl/service/imp/src/php/ConsultarCarritoServiceImpl.php';
//require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-ventaselectronicas-carritocompras-modl/service/imp/src/php/RegistrarCarritoServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/ConsultarCarritoComprasServiceImpl.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/service/imp/src/php/RegistrarCarritoComprasServiceImpl.php';

class RegistrarCarritoComprasController extends Controller {

    // Degui 20191010: registrar cliente
    public function registrarClienteCarrito() {
		$dataRequest = array(
					"docnum" => $_POST["txtDNI"],
		      		"nombre" => $_POST["txtNombre"],
		      		"apepat" => $_POST["txtApePat"],
		      		"apemat" => $_POST["txtApeMat"],
		      		"telef"  => $_POST["txtCel"],
		      		"email"  => $_POST["txtEmail"],
		      		"direc"	 => $_POST["txtDireccion"]
		   	      );
		$service = new RegistrarCarritoComprasServiceImpl();
		$dataResponse = $service->addClienteCar($dataRequest);
    	echo json_encode($dataResponse);
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
