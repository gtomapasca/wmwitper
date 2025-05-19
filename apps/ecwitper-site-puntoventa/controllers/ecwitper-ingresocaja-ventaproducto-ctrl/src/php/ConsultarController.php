<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/service/imp/src/php/ConsultarComprobanteVentasServiceImpl.php';

class ConsultarController extends Controller {

	// 20230204 obtener datos de cliente para ventas
	public function obtenerDatosCliVentas() {
		$dataRequest["tipDoc"] = $_GET["tipDoc"];
		$dataRequest["numDoc"] = $_GET["numDoc"];
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->obtenerDatosCliVentas($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20230204 obtener datos de producto para ventas
	public function obtenerDatosProductoVentas() {
		$dataRequest["codFiltro"] = $_GET["codFiltro"];
		$dataRequest["codProd"] = $_GET["codProd"];
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->obtenerDatosProductoVentas($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20230225 consultar comprobante de ventas
	public function consultarComprobanteVentas() {
		$datosArray = json_decode($_POST['datos']);
		if($_POST['datos']){ // si existe
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->consultarComprobanteVentas($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}
	// 20230315 obtener correlativo comprobante venta
	public function obtenerCorrelativoComprobanteVenta() {
		$dataRequest["tipComprob"] = $_GET["tipComprob"];
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->obtenerCorrelativoComprobanteVenta($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20230316 obtener ID comprobante venta
	public function obtenerIdComprobanteVenta() {
		$dataRequest["serieComprob"] = $_GET["serieComprob"];
		$dataRequest["nroComprob"] = $_GET["nroComprob"];
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->obtenerIdComprobanteVenta($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// 20230323 obtener detalle venta por id
	public function obtenerDetalleVentaById() {
		$dataRequest["idVenta"] = $_GET["idVenta"];
		$obj = new ConsultarComprobanteVentasServiceImpl();
		$dataResponse = $obj->obtenerDetalleVentaById($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

}

?>
