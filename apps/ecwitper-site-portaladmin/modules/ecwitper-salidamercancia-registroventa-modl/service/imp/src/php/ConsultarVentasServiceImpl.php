<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/service/ifz/src/php/ConsultarVentasService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapCuentaPersonaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapProductoVentaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapComprobanteVentaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapDetalleVentaDAO.php';

class ConsultarVentasServiceImpl implements ConsultarVentasService{

   // 20230204 obtener datos cliente para ventas
   public function obtenerDatosCliVentas($dataRequest) {
		try{
			$sqlMapCuentaPersonaDAO = new SqlMapCuentaPersonaDAO();
			$data = $sqlMapCuentaPersonaDAO->selectClienteVenta($dataRequest);
			if(count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data[0];
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

   	// 20230204 obtener datos producto para ventas
   	public function obtenerDatosProductoVentas($dataRequest) {
		try{
			$sqlMapProductoVentaDAO = new SqlMapProductoVentaDAO();
			$data = $sqlMapProductoVentaDAO->selectProductoVentas($dataRequest);
			if(count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data[0];
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

	// 20230225 consultar comprobante ventas
	public function consultarComprobanteVentas($dataRequest) {
		try{
			$sqlMapComprobanteVentaDAO = new SqlMapComprobanteVentaDAO();
			$data = $sqlMapComprobanteVentaDAO->selectComprobanteVentas($dataRequest);
			if(count($data) > 0){
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

	// 20230315: obtener correlativo comprobante venta
	public function obtenerCorrelativoComprobanteVenta($dataRequest) {
		try{
			$sqlMapComprobanteVentaDAO = new SqlMapComprobanteVentaDAO();
			$data = $sqlMapComprobanteVentaDAO->selectCorreComprobanteVenta($dataRequest);
			if(count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data[0];
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

	// 20230316 Degui: obtener Id comprobante venta
	public function obtenerIdComprobanteVenta($dataRequest) {
		try{
			$sqlMapComprobanteVentaDAO = new SqlMapComprobanteVentaDAO();
			$data = $sqlMapComprobanteVentaDAO->selectIdComprobanteVenta($dataRequest);
			if(count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data[0];
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

	// 20230323 Degui: obtener detalle venta por id
	public function obtenerDetalleVentaById($dataRequest) {
		try{
			$sqlMapDetalleVentaDAO = new SqlMapDetalleVentaDAO();
			$data = $sqlMapDetalleVentaDAO->selectListDetalleVentaById($dataRequest);
			if(count($data) > 0){
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
