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
//  - SqlMap a la tabla producto
// ----------------------------------------------------------------------------
// Change History:
//  2023/02/04  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/dao/model/src/php/ProductoVenta.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-ingresocaja-ventaproducto-modl/dao/ifz/src/php/ProductoVentaDAO.php';

/* Clase SqlMapProductoVentaDAO */
class SqlMapProductoVentaDAO implements ProductoVentaDAO{

    // 20191209 GTP: obtener lista de productos tienda
    public function selectProductoVentas($dataRequest){
		$productoVenta = new ProductoVenta();
		$codFiltro = $dataRequest["codFiltro"];
		$codProd = $dataRequest["codProd"];
		$sql  = "select pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_tipcategoria, pt.cod_categoria, pt.cod_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				.", pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, key_word, pt.precio_compra_final, precio_venta_normal, pt.precio_venta_internet "
				.", pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				.", pt.stock, pt.puntaje, pt.almacen_ind, pt.almacen_stock, pt.almacen_est, pt.almacen_del, pt.estado, pt.estado_prod, pt.public_est, pt.fecha_reg, pt.fecha_act "
				.", NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from wip_producto_tienda pt "
				." 	inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				." where pt.del = 0 and pt.mini_codigo = ? ";
		$data = array('s', "{$codProd}");
		$fields = $productoVenta->toArrayProductoTienda();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }
      	
}

?>
