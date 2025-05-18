<?php

require_once 'commons/ecwitper-tiendaonline-buscadorproductos-common/service/ifz/src/php/BuscarProductosService.php';
require_once 'commons/ecwitper-tiendaonline-buscadorproductos-common/dao/imp/src/php/SqlMapProductoDAO.php';

class BuscarProductosServiceImpl implements BuscarProductosService{

	// 20240705 buscar productos
	public function buscarProductoByDesc($jsonParams) {
		try{
			$objRespuesta = new stdClass();
			$sqlMapProductoDAO = new SqlMapProductoDAO();
			$data = $sqlMapProductoDAO->selectProductoByDesc($jsonParams);
			if($data != null && count($data) > 0){
				$objRespuesta->tip = "I"; // Info
            	$objRespuesta->msj = "Encontrado";
            	$objRespuesta->val = true;
				$objRespuesta->datos = $data;

			}else{
				$objRespuesta->tip = "A"; // Advertencia
            	$objRespuesta->msj = "Disculpe, no se obtuvieron resultado"; 
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
