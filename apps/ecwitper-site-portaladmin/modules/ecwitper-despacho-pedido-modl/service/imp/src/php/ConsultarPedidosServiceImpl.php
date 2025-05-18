<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-despacho-pedido-modl/service/ifz/src/php/ConsultarPedidosService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-despacho-pedido-modl/dao/imp/src/php/SqlMapPedidoDAO.php';

class ConsultarPedidosServiceImpl implements ConsultarPedidosService{

	// 20210524: Obtener lista de pedidos
	public function obtenerListaPedidos() {
		try{
			$sqlMapPedidoDAO = new SqlMapPedidoDAO();
			$data = $sqlMapPedidoDAO->obtenerListaPedidos();
			if($data != null && count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data;
			}else{
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "no se obtuvieron resultados";
				$dataResponse["datos"] 	    = 0;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"]    = "Código de Error: "  . $e->getCode();
			$dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

}

?>
