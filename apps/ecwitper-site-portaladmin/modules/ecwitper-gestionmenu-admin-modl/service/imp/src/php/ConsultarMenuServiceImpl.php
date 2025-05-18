<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-gestionmenu-admin-modl/service/ifz/src/php/ConsultarMenuService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-gestionmenu-admin-modl/dao/imp/src/php/SqlMapCabMenuDAO.php';
//require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-mantenimiento-articulotienda-modl/service/imp/src/php/ConsultarAtencionClienteServiceImpl.php';
//require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-mantenimiento-articulotienda-modl/service/imp/src/php/GaleriaImagenProductoServiceImpl.php';
//require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/service/imp/src/php/ConsultarVentasServiceImpl.php';

class ConsultarMenuServiceImpl implements ConsultarMenuService{
   	// 20210503 Cargar menú principal
   	public function cargarMenuPrincipal($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListCabMenu($dataRequest);
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

   	// 20210504 Cargar menú lateral
   	public function obtenerMenuLateral($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListMenu($dataRequest);
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

   	// 20210504 Obtener opciones de menú lateral
   	public function obtenerOpcionMenuLateral($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListOpMenu($dataRequest);
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

   /*
   // 20210524: Obtener lista de clientes
   public function obtenerListaClientes() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaClientes();
	return $dataResponse;
   }
   // 20210524: Obtener lista de productos
   public function obtenerListaProductosTienda($dataRequest) {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaProductosTienda($dataRequest);
	return $dataResponse;
   }
   // 20210524: Obtener lista de pedidos
   public function obtenerListaPedidos() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaPedidos();
	return $dataResponse;
   }
   // 20210524: Obtener lista de suscriptores
   public function obtenerListaSuscriptores() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaSuscriptores();
	return $dataResponse;
   }
   // 20210524: Obtener lista de contactos
   public function obtenerListaContactos() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaContactos();
	return $dataResponse;
   }
   // 20210524: Obtener lista de libro reclamos
   public function obtenerListaLibroReclamos() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaLibroReclamos();
	return $dataResponse;
   }
	// 20210804: Obtener imagen de producto
	public function obtenerImagenProductoTienda($dataRequest) {
		$service = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $service->obtenerImagenProductoTienda($dataRequest);
		return $dataResponse;
	}
	// 20220522: Obtener imagenes de Galeria de productos
	public function obtenerImagenesGaleriaProductos($dataRequest) {
		$service = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $service->obtenerImagenesGaleriaProductos($dataRequest);
		return $dataResponse;
	}
   // 20211229: Obtener lista de fabricantes
   public function obtenerListaFabricantes() {
	$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
	$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaFabricantes();
	return $dataResponse;
   }
	// 20220729: Obtener lista de tipo categoria productos
	public function obtenerListaTipoCategoriaProd() {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaTipoCategoriaProd();
		return $dataResponse;
	}
	// 20211230: Obtener lista de categoria productos
	public function obtenerListaCategoriaProd() {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaCategoriaProd();
		return $dataResponse;
	}
	// 20220814: Obtener lista de categoria productos por tipo
	public function obtenerListaCategoriaByTipoCat($dataRequest) {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaCategoriaByTipoCat($dataRequest);
		return $dataResponse;
	}
	// 20220729: Obtener lista de sub categoria productos
	public function obtenerListaSubCategoriaProd() {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaSubCategoriaProd();
		return $dataResponse;
	}
	// 20220815: Obtener lista de sub categoria productos por código categoria
	public function obtenerListaSubCategoriaByCodCat($dataRequest) {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerListaSubCategoriaByCodCat($dataRequest);
		return $dataResponse;
	}
	// 20220505: obtener tabla de especificacion de producto
	public function obtenerEspecificacionDeProducto($dataRequest) {
		$consultarAtencionClienteServiceImpl = new ConsultarAtencionClienteServiceImpl();
		$dataResponse = $consultarAtencionClienteServiceImpl->obtenerEspecificacionDeProducto($dataRequest);
		return $dataResponse;
	}
	// 20230204 obtener datos de cliente para ventas
	public function obtenerDatosCliVentas($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->obtenerDatosCliVentas($dataRequest);
		return $dataResponse;
    }
	// 20230204 obtener datos de producto para ventas
	public function obtenerDatosProductoVentas($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->obtenerDatosProductoVentas($dataRequest);
		return $dataResponse;
    }
	// 20230225: consultar comprobante ventas
	public function consultarComprobanteVentas($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->consultarComprobanteVentas($dataRequest);
		return $dataResponse;
    }
	// 20230315 Degui: obtener correlativo comprobante venta
	public function obtenerCorrelativoComprobanteVenta($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->obtenerCorrelativoComprobanteVenta($dataRequest);
		return $dataResponse;
    }
	// 20230316 Degui: obtener ID comprobante venta
	public function obtenerIdComprobanteVenta($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->obtenerIdComprobanteVenta($dataRequest);
		return $dataResponse;
    }
	// 20230323 Degui: obtener detalle venta por id
	public function obtenerDetalleVentaById($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->obtenerDetalleVentaById($dataRequest);
		return $dataResponse;
    }

	// 20230615 Degui: consultar comprobante de compras
	public function consultarComprobanteCompras($dataRequest) {
		$consultarVentasServiceImpl = new ConsultarVentasServiceImpl();
		$dataResponse = $consultarVentasServiceImpl->consultarComprobanteVentas($dataRequest);
		return $dataResponse;
    }
	*/
	
}

?>
