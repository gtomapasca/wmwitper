<?php

require_once 'core/controller.php';
//require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/imp/src/php/ConsultarCatalogoProductosServiceImpl.php';

class ConsultarCatalogoProductosController extends Controller{

	// Degui 20191010: lista productos del catalogo
	public function listarProductosCatalogo(){
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->listarProductosCatalogo();
		echo json_encode($dataResponse);
		exit();
	}

	// 20220327 Obtener producto seleccionado por mini-codigo
	public function obtenerProductoSeleccionadoByMiniCodigo() {
		$dataRequest["miniCodigo"] = $_GET["mc"];
		// Consultamos los datos del producto
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->obtenerProductoByMinicodigo($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

   	// 20220515 Obtener especificacion producto 
	public function obtenerEspecificacionProducto() {
		$dataRequest["codProducto"] = $_GET["cod_prod"];
		// Consultamos los datos del producto
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->obtenerEspecificacionProducto($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20220527 Obtener galeria imagenes producto 
	public function obtenerGaleriaImagenesProducto() {
		$dataRequest["codProducto"] = $_GET["cod_prod"];
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->obtenerGaleriaImagenesProducto($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20210310 Mostrar producto por categoria
	public function listarProductosPorCategoria() {
		//$dataRequest["productocat"] = $_GET["productocat"];
		if($_POST['datos']){ // si existe
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->buscarProductosByCategoria($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   }

	// 20210618 Degui: obtener cantidad de fabricantes por categoria de productos habilitados
	public function obtenerCantidadFabricantesPorCategoria() {
		//$dataRequest["productocat"] = $_GET["productocat"];
		if($_POST['datos']){ // si existe
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->obtenerCantidadFabricantesPorCategoria($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	// 20220925 obtener productos por fabricante
	public function obtenerProductosPorFabricante() {
		if($_POST['datos']){ // si existe
			$datosArray = json_decode($_POST['datos']);
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$service = new ConsultarCatalogoProductosServiceImpl();
		$dataResponse = $service->buscarProductosByFabricante($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   }


}

?>
