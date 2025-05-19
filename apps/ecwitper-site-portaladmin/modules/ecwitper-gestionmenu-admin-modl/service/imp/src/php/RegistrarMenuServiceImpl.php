<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-gestionmenu-admin-modl/service/ifz/src/php/RegistrarPrincipalService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-mantenimiento-articulotienda-modl/service/imp/src/php/RegistrarAtencionClienteServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-mantenimiento-articulotienda-modl/service/imp/src/php/GaleriaImagenProductoServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/service/imp/src/php/RegistrarVentasServiceImpl.php';

class RegistrarMenuServiceImpl implements RegistrarMenuService{

	// ---------------------------------------------------------------------------------------------

   public function registrarNuevoProductoTienda($dataRequest) {
	$registrarAtencionClienteServiceImpl = new RegistrarAtencionClienteServiceImpl();
	$dataResponse = $registrarAtencionClienteServiceImpl->registrarNuevoProductoTienda($dataRequest);
	return $dataResponse;
   }

   public function modificarProductoTienda($dataRequest) {
	$registrarAtencionClienteServiceImpl = new RegistrarAtencionClienteServiceImpl();
	$dataResponse = $registrarAtencionClienteServiceImpl->modificarProductoTienda($dataRequest);
	return $dataResponse;
   }

   	// 20210710 Registrar imagen de producto
	public function registrarImagenProductoTienda() {
		$service = new GaleriaImagenProductoServiceImpl();
		return $service->registrarImagenProductoTienda();
	}

	// 20220518 Registrar imagen de producto en galeria
	public function registrarImagenProductoGaleria() {
		$service = new GaleriaImagenProductoServiceImpl();
		return $service->registrarImagenProductoGaleria();
	}

	// 20220525 Registrar imagen de producto en galeria
	public function modificarImagenProductoGaleria() {
		$service = new GaleriaImagenProductoServiceImpl();
		return $service->modificarImagenProductoGaleria();
	}

   	//20220506 Registrar especificacion de producto
   	public function registrarEspecificacionProducto($dataRequest) {
		$registrarAtencionClienteServiceImpl = new RegistrarAtencionClienteServiceImpl();
		$dataResponse = $registrarAtencionClienteServiceImpl->registrarEspecificacionProducto($dataRequest);
		return $dataResponse;
   	}

	//20220515 Modificar especificacion de producto
	public function modificarEspecificacionProducto($dataRequest) {
		$registrarAtencionClienteServiceImpl = new RegistrarAtencionClienteServiceImpl();
		$dataResponse = $registrarAtencionClienteServiceImpl->modificarEspecificacionProducto($dataRequest);
		return $dataResponse;
   	}

	// 20230305 Registrar comprobante venta
	public function registrarComprobanteVenta($dataRequest) {
		$registrarVentasServiceImpl = new RegistrarVentasServiceImpl();
		$dataResponse = $registrarVentasServiceImpl->registrarComprobanteVenta($dataRequest);
		return $dataResponse;
	}

	// 20230313 Registrar detalle de venta
	public function registrarDetalleVenta($dataRequest) {
		$registrarVentasServiceImpl = new RegistrarVentasServiceImpl();
		$dataResponse = $registrarVentasServiceImpl->registrarDetalleVenta($dataRequest);
		return $dataResponse;
	}

	// 20230407 Registrar nuevo cliente para venta
	public function registrarNuevoClienteParaVenta($dataRequest) {
		$registrarVentasServiceImpl = new RegistrarVentasServiceImpl();
		$dataResponse = $registrarVentasServiceImpl->registrarNuevoClienteParaVenta($dataRequest);
		return $dataResponse;
	}

}

?>
