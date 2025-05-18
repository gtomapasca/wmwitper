<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/imp/src/php/ConsultarClientesServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-despacho-pedido-modl/service/imp/src/php/ConsultarPedidosServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/imp/src/php/ConsultarStockProductoVentaServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/imp/src/php/GaleriaImagenProductoServiceImpl.php';

class ConsultarController extends Controller {

	// 20210523 Degui: listar clientes
	public function obtenerListaClientes() {
		$service = new ConsultarClientesServiceImpl();
		$dataResponse = $service->obtenerListaClientes();
		echo json_encode($dataResponse);
		exit();
	}

	// 20210524 Degui: listar pedidos
	public function obtenerListaPedidos() {
		$service = new ConsultarPedidosServiceImpl();
		$dataResponse = $service->obtenerListaPedidos();
		echo json_encode($dataResponse);
		exit();
	}

	// 20210524 Degui: listar productos
	public function obtenerListaProductosTienda() {
		$datosArray = json_decode($_POST['datos']);
		if($_POST['datos']){ // si existe
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaProductosTienda($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

	// 20210804: obtener imagen producto
	public function obtenerImagenProductoTienda() {
		$dataRequest["codProducto"] = $_GET["codProducto"];
		$service = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $service->obtenerImagenProductoTienda($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20220522 obtener imagenes Galeria
	public function obtenerImagenesGaleriaProductos() {
		$dataRequest["codProducto"] = $_GET["codProducto"];
		$service = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $service->obtenerImagenesGaleriaProductos($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20211229 Degui: Obtener lista de fabricantes
	public function obtenerListaFabricantes() {
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaFabricantes();
		echo json_encode($dataResponse);
		exit();
	}
   	// 20220729 Degui: Obtener lista tipo categoria de productos
   	public function obtenerListaTipoCategoriaProd() {
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaTipoCategoriaProd();
		echo json_encode($dataResponse);
		exit();
	}
	// 20211230 Degui: Obtener lista categoria de productos
	/*public function obtenerListaCategoriaProd() {
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaCategoriaProd();
		echo json_encode($dataResponse);
		exit();
	}*/
	// 20220814 Degui: Obtener lista categoria de productos por tipo
	public function obtenerListaCategoriaByTipoCat() {
		$dataRequest["codTipoCat"] = $_GET["codTipoCat"];
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaCategoriaByTipoCat($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20220729 Degui: Obtener lista sub-categoria de productos
	/*public function obtenerListaSubCategoriaProd() {
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaSubCategoriaProd();
		echo json_encode($dataResponse);
		exit();
	}*/
	// 20220815 Degui: Obtener lista sub-categoria de productos por codigo categoria
	public function obtenerListaSubCategoriaByCodCat() {
		$dataRequest["codCat"] = $_GET["codCat"];
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerListaSubCategoriaByCodCat($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20220505: obtener tabla de especificacion de producto
	public function obtenerEspecificacionDeProducto() {
		$dataRequest["codProducto"] = $_GET["codProducto"];
		$service = new ConsultarStockProductoVentaServiceImpl();
		$dataResponse = $service->obtenerEspecificacionDeProducto($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

}

?>
