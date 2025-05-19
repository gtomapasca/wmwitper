<?php

require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/service/ifz/src/php/ConsultarOfertaProductosService.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/imp/src/php/SqlMapProductoDAO.php';

class ConsultarOfertaProductosServiceImpl implements ConsultarOfertaProductosService{

   // 20220328 Degui: obtener ofertas
   function obtenerOfertasDeProductos() {
		$sqlMapProductoDAO = new SqlMapProductoDAO();
		$dataResponse = $sqlMapProductoDAO->selectOfertasProductos();
		if($dataResponse != null && count($dataResponse) > 0){
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
