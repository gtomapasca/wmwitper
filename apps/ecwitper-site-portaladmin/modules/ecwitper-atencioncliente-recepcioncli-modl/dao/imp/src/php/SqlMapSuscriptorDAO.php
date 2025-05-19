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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/model/src/php/Suscriptor.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/ifz/src/php/SuscriptorDAO.php';

/* Clase SqlMapSuscriptorDAO */
class SqlMapSuscriptorDAO implements SuscriptorDAO{

    // 20191209 GTP: obtener lista de suscriptores
    public function obtenerListaSuscriptores(){
		$suscriptor = new Suscriptor();
		$del = '0';
		$sql  = "select id_suscripcion, nombre, email, estado, fecha_reg from wip_suscripcion where del = ?";
		$data = array('s', "{$del}");
		$fields = $suscriptor->toArraySuscripcion();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
