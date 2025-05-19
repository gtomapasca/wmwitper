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
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/model/src/php/Especificacion.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/ifz/src/php/EspecificacionDAO.php';
/* Clase SqlMapEspecificacionProductoDAO */
class SqlMapEspecificacionProductoDAO implements EspecificacionDAO{

    // 20220515: obtener tabla de especificacion de producto
    public function selectEspecificacionProductoByCodigo($dataRequest){
		$especificacion = new Especificacion();
		$codProd = $dataRequest["codProducto"];
		$del = '0';
		$sql  = "select id_especificacion, cod_producto, num_orden, clave, valor, estado, fecha_reg "
				."from wip_especificacion_producto Where del = 0 and estado = 0 and cod_producto = ? order by num_orden asc";
		$data = array('s', "{$codProd}");
		$fields = $especificacion->toArrayEspecificacion();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
