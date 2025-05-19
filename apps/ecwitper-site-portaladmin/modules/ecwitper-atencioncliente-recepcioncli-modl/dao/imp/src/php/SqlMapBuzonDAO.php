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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/model/src/php/Buzon.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/ifz/src/php/BuzonDAO.php';

/* Clase SqlMapBuzonDAO */
class SqlMapBuzonDAO implements BuzonDAO{

	// 20191209 GTP: obtener lista de productos tienda
    public function obtenerListaContactos(){
		$buzon = new Buzon();
		$del = '0';
		$sql  = "select id_buzon, nombre, celular, email, asunto, mensaje, estado, fecha_reg from wip_buzon where del = ?";
		$data = array('s', "{$del}");
		$fields = $buzon->toArrayBuzon();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("sql" => $sql, "data" => $data);
    }
      	
}

?>
