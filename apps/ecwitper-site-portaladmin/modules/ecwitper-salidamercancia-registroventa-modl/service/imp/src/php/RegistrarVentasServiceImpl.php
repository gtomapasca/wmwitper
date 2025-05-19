<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/service/ifz/src/php/RegistrarVentasService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapCuentaPersonaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapComprobanteVentaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/imp/src/php/SqlMapDetalleVentaDAO.php';

class RegistrarVentasServiceImpl implements RegistrarVentasService{

	// 20230305 registrar comprobante venta
	public function registrarComprobanteVenta($dataRequest) {
		try{
			$sqlMapComprobanteVentaDAO = new SqlMapComprobanteVentaDAO();
			$sqlMapComprobanteVentaDAO->insertComprobanteVenta($dataRequest);
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] 	= "Se registro correctamente";
			//$dataResponse["data"] = $data;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

	// 20230313 registrar detalle venta
	public function registrarDetalleVenta($dataRequest) {
		try{
			$sqlMapDetalleVentaDAO = new SqlMapDetalleVentaDAO();
			$sqlMapDetalleVentaDAO->insertDetalleVenta($dataRequest);
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] 	= "Se registro correctamente";
			//$dataResponse["data"] = $data;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

	// 20230407 Registrar nuevo cliente para venta
	public function registrarNuevoClienteParaVenta($dataRequest) {
		try{
			$sqlMapCuentaPersonaDAO = new SqlMapCuentaPersonaDAO();
			$sqlMapCuentaPersonaDAO->insertClienteVenta($dataRequest);
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"] 	= "Se registro correctamente";
			//$dataResponse["data"] = $data;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}


}

?>
