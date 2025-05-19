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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/SubCategoriaProducto.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/SubCategoriaProductoDAO.php';

/* Clase SqlMapSubCategoriaProductoDAO */
class SqlMapSubCategoriaProductoDAO implements SubCategoriaProductoDAO{

    // 20211230 degui: obtener lista de sub ategoria productos
    public function selectListaSubCategoriaProd(){
		$subCategoriaProducto = new SubCategoriaProducto();
		$del = '0';
		$sql  = "select cod_categoria, cod_subcategoria, nom_subcategoria, des_subcategoria, estado, del from wip_subcategoria_producto where del = ? order by nom_subcategoria asc";
		$data = array('s', "{$del}");
		$fields = $subCategoriaProducto->toArraySubCategoria();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	// 20220814 degui: obtener lista de sub ategoria productos por codigo categoria
    public function selectListaSubCategoriaByCodCat($dataRequest){
		$subCategoriaProducto = new SubCategoriaProducto();
		$codCat = $dataRequest["codCat"];
		$del = '0';
		$sql  = "select cod_categoria, cod_subcategoria, nom_subcategoria, des_subcategoria, estado, del from wip_subcategoria_producto "
				." where del = ? and cod_categoria = ? order by nom_subcategoria asc";
		$data = array('ss', "{$del}", "{$codCat}");
		$fields = $subCategoriaProducto->toArraySubCategoria();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

      	
}

?>
