<?php

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/model/src/php/CatalogoServicioTecnico.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/ifz/src/php/CatalogoServicioTecnicoDAO.php';

class SqlMapCatalogoServicioTecnicoDAO implements CatalogoServicioTecnicoDAO {

    // Listar catálogo activo de servicios técnicos del taller
    public function selectCatalogoServicios() {
        $del = '0';
        $estado = '1';
        $sql = "SELECT id_cat_servicio, nombre, descripcion, precio_base, estado "
             . "FROM wip_catalogo_servicio_tecnico WHERE del = ? AND estado = ? ORDER BY id_cat_servicio ASC";
        
        $values = [$del, $estado];
        $types = 'ss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $catalogo = new CatalogoServicioTecnico();
        $fields = $catalogo->toArrayCatalogo();
        return DBObject::ejecutar($sql, $data, $fields);
    }
}
?>
