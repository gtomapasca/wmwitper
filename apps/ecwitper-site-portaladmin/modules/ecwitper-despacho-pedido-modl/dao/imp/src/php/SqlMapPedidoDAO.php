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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-despacho-pedido-modl/dao/model/src/php/Pedido.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-despacho-pedido-modl/dao/ifz/src/php/PedidoDAO.php';

/* Clase SqlMapPedidoDAO */
class SqlMapPedidoDAO implements PedidoDAO{

    // 20191209 GTP: obtener lista de pedidos
    public function obtenerListaPedidos(){
		$pedido = new Pedido();
		$del = '0';
		$sql  = "select id_pedido, id_usuario, nro_pedido, medio_pago, comentario, carrito_nropedido, carrito_dni, "
			."carrito_cliente, carrito_celular, carrito_email, carrito_direccion, estado, fecha_reg "
			." from wip_pedido where del = ?";
		$data = array('s', "{$del}");
		$fields = $pedido->toArrayPedido();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
	}
      	
}

?>
