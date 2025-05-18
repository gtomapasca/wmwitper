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
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/model/src/php/GaleriaProductoTienda.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/ifz/src/php/GaleriaProductoTiendaDAO.php';

/* Clase SqlMapGaleriaProductoTiendaDAO */
class SqlMapGaleriaProductoTiendaDAO implements GaleriaProductoTiendaDAO{

	// 20220522 degui: obtener galería de imagenes productos
	public function selectGaleriaImagenProducto($dataRequest){
		$obj = new GaleriaProductoTienda();
		$codProd = $dataRequest["codProducto"];
		$sql  = "select id_galeria, cod_producto, fecha_creacion, num_orden, cod_item, nombre, dir_img, ruta, formato, dimensiones, estado, fecha_act "
				." from wip_galeria_producto_tienda where del = 0 and estado = 0 and cod_producto = ? order by num_orden asc limit 4";
		$data = array('s', "{$codProd}");
		$fields = $obj->toArrayGaleriaProd();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
	}
      	
}

?>
