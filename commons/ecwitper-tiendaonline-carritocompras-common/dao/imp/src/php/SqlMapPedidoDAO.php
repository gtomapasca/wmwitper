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
		//$data = array('s', "0");
		// [INI] Setear data
		$values = ["0"]; 
		$types = 's';
		$values = array_values($values); 
		$data[] = $types;
		foreach ($values as $i => $v) {
			$data[] = &$values[$i]; 
		}
		// [FIN] Setear data
		$pedido = new Pedido();
		$fields = $pedido->toArrayById();
		return DBObject::ejecutar($sql, $data, $fields);
      }

      // Registrar Pedido
      public function insertPedidoCar($dataRequest){
		// 20251228 Degui: obtener ruc dinamicamente
		$ruc_negocio 	 = $dataRequest["ruc_negocio"];
		$data_cliente	 = $dataRequest["datos_cliente"];
		$jsonDataCliente = json_decode($data_cliente);
		$nro_pedido 	 = $jsonDataCliente->nro_pedido;
		$id_usuario  = $jsonDataCliente->idUsuario;
		$cod_usuario = $jsonDataCliente->codUsuario;
		$docnum 	 = $jsonDataCliente->dni;
		$numCel 	 = $jsonDataCliente->numCel;
		$email	 	 = $jsonDataCliente->email;
		$direc	 	 = $jsonDataCliente->direccion;
		$nombre_completo = $jsonDataCliente->nombre." ".$jsonDataCliente->apePat." ".$jsonDataCliente->apeMat;
		/* Registramos datos del cliente */
		$sql = "insert into wip_pedido (ruc_negocio, id_usuario, cod_usuario, nro_pedido, carrito_nropedido, carrito_dni, carrito_cliente, carrito_celular, carrito_email, carrito_direccion, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		       ."values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		// [INI] Setear data
		$values = [$ruc_negocio, $id_usuario, $cod_usuario, $nro_pedido, $nro_pedido, $docnum, $nombre_completo, $numCel, $email, $direc]; 
		$types = 'sissssssss';
		$values = array_values($values); 
		$data[] = $types;
		foreach ($values as $i => $v) {
			$data[] = &$values[$i]; 
		}
		// [FIN] Setear data
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
      }
      	
}

?>
