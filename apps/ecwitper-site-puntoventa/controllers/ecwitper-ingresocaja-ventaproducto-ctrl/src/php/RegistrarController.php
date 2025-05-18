<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/service/imp/src/php/RegistrarComprobanteVentasServiceImpl.php';

class RegistrarController extends Controller {

    // 20230305: Registrar comprobante venta
	public function registrarComprobanteVenta() {
		$datosArray = json_decode($_POST['datos']);
		if($_POST['datos']){ // si existe
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$obj = new RegistrarComprobanteVentasServiceImpl();
		$dataResponse = $obj->registrarComprobanteVenta($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
  	}

  	// 20230313: Registrar detalle venta
	public function registrarDetalleVenta() {
		$datosArray = json_decode($_POST['datos']);
		if($_POST['datos']){ // si existe
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$obj = new RegistrarComprobanteVentasServiceImpl();
		$dataResponse = $obj->registrarDetalleVenta($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
  	}

	// 20230407: Registrar nuevo cliente para venta
	public function registrarNuevoClienteParaVenta() {
		$dataRequest = $_POST;
		if($dataRequest){
			$obj = new RegistrarComprobanteVentasServiceImpl();
			$dataResponse = $obj->registrarNuevoClienteParaVenta($dataRequest);
		}else{
			$dataResponse["msjErr"] = "no se encontraron datos para continuar con el grabado.";
		}
    	echo json_encode($dataResponse);
    	exit();
  	}

}

?>
