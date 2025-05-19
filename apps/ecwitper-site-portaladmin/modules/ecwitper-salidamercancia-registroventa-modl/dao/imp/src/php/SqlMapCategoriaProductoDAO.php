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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/CategoriaProducto.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/CategoriaProductoDAO.php';

/* Clase SqlMapCategoriaProductoDAO */
class SqlMapCategoriaProductoDAO implements CategoriaProductoDAO{

    // 20211230 degui: obtener lista de categoria productos
    public function selectListaCategoriaProd(){
		$categoriaProducto = new CategoriaProducto();
		$del = '0';
		$sql  = "select cod_tipo, cod_categoria, nom_categoria, des_categoria, estado, del from wip_categoria_producto where del = ? order by nom_categoria asc";
		$data = array('s', "{$del}");
		$fields = $categoriaProducto->toArrayCategoria();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	// 20220814 degui: obtener lista de categoria productos por categoria 
    public function selectListaCategoriaByTipoCat($dataRequest){
		$categoriaProducto = new CategoriaProducto();
		$codTipo = $dataRequest["codTipoCat"];
		$del = '0';
		$sql  = "select cod_tipo, cod_categoria, nom_categoria, des_categoria, estado, del from wip_categoria_producto "
				." where del = ? and cod_tipo = ? order by nom_categoria asc";
		$data = array('ss', "{$del}", "{$codTipo}");
		$fields = $categoriaProducto->toArrayCategoria();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
