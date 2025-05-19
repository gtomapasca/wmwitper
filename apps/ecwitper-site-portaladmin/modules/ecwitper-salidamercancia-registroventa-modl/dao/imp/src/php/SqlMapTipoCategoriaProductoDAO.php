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
//  - SqlMap a la tabla wip_categoria_producto
// ----------------------------------------------------------------------------
// Change History:
//  30/12/2021  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla wip_categoria_producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/TipoCategoriaProducto.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/TipoCategoriaProductoDAO.php';

/* Clase SqlMapTipoCategoriaProductoDAO */
class SqlMapTipoCategoriaProductoDAO implements TipoCategoriaProductoDAO{

    // 20211230 degui: obtener lista de tipo categoria productos
    public function selectListaTipoCategoriaProd(){
		$tipoCategoriaProducto = new TipoCategoriaProducto();
		$del = '0';
		$sql  = "select cod_tipo, nom_tipo, des_tipo, estado, del from wip_tipo_categoria where del = ? order by nom_tipo asc";
		$data = array('s', "{$del}");
		$fields = $tipoCategoriaProducto->toArrayTipoCategoria();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
