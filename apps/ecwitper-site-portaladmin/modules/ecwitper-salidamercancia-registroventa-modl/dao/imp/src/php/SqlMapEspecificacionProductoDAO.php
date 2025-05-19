<?php
// ----------------------------------------------------------------------------
// Copyright 2022, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase Usuario:
//  - SqlMap a la tabla Especificacion
// ----------------------------------------------------------------------------
// Change History:
//  2022/05/05  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla especificacion
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/Especificacion.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/EspecificacionDAO.php';

/* Clase SqlMapEspecificacionProductoDAO */
class SqlMapEspecificacionProductoDAO implements EspecificacionDAO{

	// 20220506 registrar especificacion producto
    public function insertEspecificacionProducto($dataRequest){
		$codProd	= $dataRequest["codProducto"];
		$num_orden	= $dataRequest["txtNumOrden"];
		$clave		= $dataRequest["txtClave"];
		$valor		= $dataRequest["txtValor"];
		$estado		= $dataRequest["txtEstado"];
		$sql  = "insert into wip_especificacion_producto (cod_producto, clave, valor, num_orden, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				." values (?, ?, ?, ?, ?, 0, USER(), USER(), NOW(), NOW())";
		$data = array('sssss', "{$codProd}", "{$clave}", "{$valor}", "{$num_orden}", "{$estado}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	// 20220515 modificar especificacion producto
    public function updateEspecificacionProducto($dataRequest){
		$codProd	= $dataRequest["codProducto"];
		$id_especif	= $dataRequest["idEspecificacion"];
		$num_orden	= $dataRequest["txtNumOrden"];
		$clave		= $dataRequest["txtClave"];
		$valor		= $dataRequest["txtValor"];
		$estado		= $dataRequest["txtEstado"];
		$sql  = "update wip_especificacion_producto set clave = ?, valor = ?, num_orden = ?, estado = ?, del = ?, codusu_act = USER(), fecha_act = NOW() "
				." where cod_producto = ? and id_especificacion = ?";
		$data = array('sssssss', "{$clave}", "{$valor}", "{$num_orden}", "{$estado}", "0", "{$codProd}", "{$id_especif}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20220505: obtener tabla de especificacion de producto
    public function selectEspecificacionDeProducto($dataRequest){
		$especificacion = new Especificacion();
		$codProd = $dataRequest["codProducto"];
		$del = '0';
		$sql  = "select id_especificacion, cod_producto, num_orden, clave, valor, estado, fecha_reg "
				."from wip_especificacion_producto Where del = 0 and cod_producto = ? order by num_orden asc";
		$data = array('s', "{$codProd}");
		$fields = $especificacion->toArrayEspecificacion();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
