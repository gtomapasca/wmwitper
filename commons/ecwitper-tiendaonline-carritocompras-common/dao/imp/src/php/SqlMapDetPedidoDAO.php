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
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/ifz/src/php/DetPedidoDAO.php';

/* Clase SqlMapDetPedidoDAO */
class SqlMapDetPedidoDAO implements DetPedidoDAO{
      // Registrar detalle de pedido
      public function insertDetallePedidoCar($dataRequest){
		$item 	   	= $dataRequest["item"];
		$id_pedido 	= $dataRequest["id_pedido"];
		$cod_producto 	= $item["cod_producto"];
		$cantidad     	= intval($item["cantidad"]);
		$precio_venta 	= intval($item["precio_venta"]);
		$sql = "insert into wip_detalle_pedido (id_pedido, cod_producto, cantidad, preciou, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		       	."values(?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('isii', "{$id_pedido}", "{$cod_producto}", "{$cantidad}", "{$precio_venta}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
      }
      	
}

?>
