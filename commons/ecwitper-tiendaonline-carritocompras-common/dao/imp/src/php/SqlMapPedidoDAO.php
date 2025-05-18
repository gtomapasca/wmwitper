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
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/ifz/src/php/PedidoDAO.php';
require_once 'commons/ecwitper-tiendaonline-carritocompras-common/dao/model/src/php/Pedido.php';

/* Clase SqlMapPedidoDAO */
class SqlMapPedidoDAO implements PedidoDAO{
      // Consultar ultimo pedido
      public function getLastPedido(){
		// Consultamos id_pedido para generar nro_pedido
		$sql = "select id_pedido from wip_pedido where del = ? order by id_pedido desc limit 1";
		$data = array('s', "0");
		$pedido = new Pedido();
		$fields = $pedido->toArrayById();
		return DBObject::ejecutar($sql, $data, $fields);
      }

      // Registrar Pedido
      public function insertPedidoCar($dataRequest){
		$ruc_negocio 	 = "10440440911";
		$id_usuario 	 = 4;
		$data_cliente	 = $dataRequest["datos_cliente"];
		$nro_pedido 	 = $dataRequest["nro_pedido"];
		$docnum 	 = $data_cliente["docnum"];
		$telef	 	 = $data_cliente["telef"];
		$email	 	 = $data_cliente["email"];
		$direc	 	 = $data_cliente["direc"];
		$nombre_completo = $data_cliente["nombre"]." ".$data_cliente["apepat"]." ".$data_cliente["apemat"];
		/* Registramos datos del cliente */
		$sql = "insert into wip_pedido (ruc_negocio, id_usuario, nro_pedido, carrito_nropedido, carrito_dni, carrito_cliente, carrito_celular, carrito_email, carrito_direccion, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		       ."values(?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('sisssssss', "{$ruc_negocio}", "{$id_usuario}", "{$nro_pedido}", "{$nro_pedido}", "{$docnum}", "{$nombre_completo}", "{$telef}", "{$email}", "{$direc}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
      }
      	
}

?>
