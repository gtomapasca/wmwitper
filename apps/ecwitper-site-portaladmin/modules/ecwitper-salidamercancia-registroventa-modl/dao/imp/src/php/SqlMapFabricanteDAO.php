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
//  - SqlMap a la tabla wip_fabricante
// ----------------------------------------------------------------------------
// Change History:
//  2021/12/29  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla wip_fabricante
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/Fabricante.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/FabricanteDAO.php';

/* Clase SqlMapFabricanteDAO */
class SqlMapFabricanteDAO implements FabricanteDAO{

    // 20211229 GTP: obtener lista de fabricantes
    public function selectListaFabricantes(){
		$fabricante = new Fabricante();
		$del = '0';
		$sql  = "select cod_fabricante, fabricante, marca, pais, estado, del from wip_fabricante where del = ? order by fabricante asc";
		$data = array('s', "{$del}");
		$fields = $fabricante->toArrayFabricante();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("sql" => $sql, "data" => $data);
    }
      	
}

?>
