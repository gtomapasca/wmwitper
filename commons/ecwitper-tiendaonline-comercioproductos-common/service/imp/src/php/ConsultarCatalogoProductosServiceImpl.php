<?php

require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/ifz/src/php/ConsultarCatalogoProductosService.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/imp/src/php/SqlMapCategoriaDAO.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/imp/src/php/SqlMapProductoDAO.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/imp/src/php/SqlMapEspecificacionProductoDAO.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/imp/src/php/SqlMapGaleriaProductoTiendaDAO.php';

class ConsultarCatalogoProductosServiceImpl implements ConsultarCatalogoProductosService{

	function listarCategoriaProductos() {
		$sqlMapCategoriaDAO = new SqlMapCategoriaDAO();
		$dataResponse = $sqlMapCategoriaDAO->selectCategoriaList();
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
		
	}

	function listarProductosCatalogo() {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectProductosCatalogo();
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
		
	}

	function buscarProductoById($dataRequest) {
			$sqlMapProductoDAO = new SqlMapProductoDAO();
			$dataResponse = $sqlMapProductoDAO->selectProductoById($dataRequest);
			if(count($dataResponse) > 0){
				$jsondata["encontrado"] = true;
				$jsondata["mensaje"] = "encontrado";
				$jsondata["datos"] = $dataResponse;
				//$jsondata["datos"] = $dataResponse[0];
			}else{
				$jsondata["encontrado"] = false;
				$jsondata["mensaje"] = "no encontrado";
				$jsondata["datos"] = "";
			}
			return $jsondata;
	}

	function obtenerProductoByMinicodigo($dataRequest) {
			$sqlMapProductoDAO = new SqlMapProductoDAO();
			$dataResponse = $sqlMapProductoDAO->selectProductoByMinicodigo($dataRequest);
			if(count($dataResponse) > 0){
				$jsondata["encontrado"] = true;
				$jsondata["mensaje"] = "encontrado";
				//$jsondata["datos"] = $dataResponse;
				$jsondata["datos"] = $dataResponse[0];
			}else{
				$jsondata["encontrado"] = false;
				$jsondata["mensaje"] = "no encontrado";
				$jsondata["datos"] = "";
			}
			return $jsondata;
	}

	function buscarProductoByDesc($dataRequest) {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectProductoByDesc($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = 0;
		}
		return $jsondata;
		
	}

	// 20210311 Degui: buscar producto por categoria
	function buscarProductosByCategoria($dataRequest) {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectProductoByCategoria($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
	}

	// 20210618 Degui: obtener cantidad de fabricantes por categoria de productos habilitados
	function obtenerCantidadFabricantesPorCategoria($dataRequest) {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectCountFabByCategoria($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
	}

   	// 20220515 obtener especificacion producto
	function obtenerEspecificacionProducto($dataRequest) {
		$dao = new SqlMapEspecificacionProductoDAO();
		$dataResponse = $dao->selectEspecificacionProductoByCodigo($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
	}

	// 20220527 obtener galeria imagenes producto
	function obtenerGaleriaImagenesProducto($dataRequest) {
		$dao = new SqlMapGaleriaProductoTiendaDAO();
		$dataResponse = $dao->selectGaleriaImagenProducto($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
	}

	// 20220925 buscar porductos por fabricante
	function buscarProductosByFabricante($dataRequest) {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectProductoByFabricante($dataRequest);
		if(count($dataResponse) > 0){
			$jsondata["encontrado"] = true;
			$jsondata["mensaje"] = "encontrado";
			$jsondata["datos"] = $dataResponse;
		}else{
			$jsondata["encontrado"] = false;
			$jsondata["mensaje"] = "no encontrado";
			$jsondata["datos"] = "";
		}
		return $jsondata;
	}

}

?>
