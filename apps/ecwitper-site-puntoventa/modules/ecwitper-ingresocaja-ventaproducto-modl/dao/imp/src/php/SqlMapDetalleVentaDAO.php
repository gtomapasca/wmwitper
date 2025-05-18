<?php
// ----------------------------------------------------------------------------
// Copyright 2019, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase Usuario:
//  - SqlMap a la tabla wip_detalle_venta
// ----------------------------------------------------------------------------
// Change History:
//  2023/03/13  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla wip_detalle_venta
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/dao/model/src/php/DetalleVenta.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/dao/ifz/src/php/DetalleVentaDAO.php';

/* Clase SqlMapDetalleVentaDAO */
class SqlMapDetalleVentaDAO implements DetalleVentaDAO{

	// 20230313 Registrar detalle venta
    public function insertDetalleVenta($dataRequest){

		// -----------------------------------------------
		// 2. Registrar Detalle de venta
		// -----------------------------------------------
		$correVenta 	= $dataRequest["correVenta"];
		$codProducto 	= $dataRequest["codProd"];
		$cant 			= $dataRequest["cant"];
		$precio 		= $dataRequest["precProd"];
		$tipo 			= $dataRequest["tipo"];
		$codMoneda 		= $dataRequest["codMoneda"];
		$codUniMedida 	= $dataRequest["codUniMedida"];
		$codDescuento	= $dataRequest["codDescuento"]; 	
		$precioDescto 	= $dataRequest["precioDescto"];
		$valorUnit 		= $dataRequest["valorUnit"];
		$igv 			= $dataRequest["igv"];
		$montoIGV 		= $dataRequest["montoIGV"];
		$importe 		= $dataRequest["importe"];
		$importeIGV 	= $dataRequest["importeIGV"];
		$importeTotal	= $dataRequest["importeTotal"];

		$sql  = "insert into wip_detalle_venta (id_venta, cod_producto, tipo, cod_moneda, cod_umedida, cantidad, preciou, cod_desc, precio_desc "
				.", valor_unit, igv, monto_igv, importe, importe_igv, importe_total, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				." values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('sssssssssssssss', "{$correVenta}", "{$codProducto}", "{$tipo}", "{$codMoneda}", "{$codUniMedida}", "{$cant}", "{$precio}"
								, "{$codDescuento}", "{$precioDescto}", "{$valorUnit}", "{$igv}", "{$montoIGV}", "{$importe}", "{$importeIGV}", "{$importeTotal}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;

    }

	public function selectListDetalleVentaById($dataRequest){
		$id = $dataRequest["idVenta"];
		$sql  = "  select 	dv.id_venta, dv.cod_producto, pt.mini_codigo, pt.producto, dv.tipo, dv.cod_moneda, dv.cod_umedida, dv.cantidad, dv.preciou "
				.", dv.cod_desc, dv.precio_desc, dv.valor_unit, dv.igv, dv.monto_igv, dv.importe, dv.importe_igv, dv.importe_total "
				.", dv.estado, dv.del, dv.fecha_reg, dv.fecha_act "
				." from 	wip_detalle_venta dv inner join wip_producto_tienda pt on dv.cod_producto = pt.cod_producto "
				." where 	dv.id_venta = ? and dv.del = 0";
		$data = array('s', "{$id}");
		$detalleVenta = new DetalleVenta();
		$fields = $detalleVenta->toArrayDetalle();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }
      	
}

?>
