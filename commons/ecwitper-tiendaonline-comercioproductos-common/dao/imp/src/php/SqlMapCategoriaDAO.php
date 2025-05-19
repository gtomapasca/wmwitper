<?php

require_once 'core/dblayer.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/model/src/php/Categoria.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/ifz/src/php/CategoriaDAO.php';

class SqlMapCategoriaDAO implements CategoriaDAO{

    // 20200815 GTP: obtener lista de categoria de productos (20220807 GTP: no se usa)
    public function selectCategoriaList(){
		try{
			$categoria = new Categoria();
			$est = '0';
			$del = '0';
			$sql = "select t.cod_tipo, t.nom_tipo, c.cod_categoria, c.nom_categoria "
				."from wip_tipo_categoria t inner join wip_categoria_producto c on t.cod_tipo = c.cod_tipo "
				."where c.del = ? and c.estado = ?";
			$data = array('ss', "{$del}", "{$est}");
			$fields = $categoria->toArray();
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }
}

?>
