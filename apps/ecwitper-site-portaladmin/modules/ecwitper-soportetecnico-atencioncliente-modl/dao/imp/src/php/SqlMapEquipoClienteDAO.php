<?php

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/model/src/php/EquipoCliente.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/ifz/src/php/EquipoClienteDAO.php';

class SqlMapEquipoClienteDAO implements EquipoClienteDAO {

    // Consultar equipos asociados a un cliente específico
    public function selectEquiposPorCliente($dataRequest) {
        $idCliente = $dataRequest["idCliente"];
        $del = '0';
        $sql = "SELECT id_equipo, id_ctapersona, tipo_equipo, marca, modelo, numero_serie, caracteristicas, estado "
             . "FROM wip_equipo_cliente WHERE id_ctapersona = ? AND del = ? ORDER BY id_equipo DESC";
        
        $values = [$idCliente, $del];
        $types = 'ss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $equipo = new EquipoCliente();
        $fields = $equipo->toArrayEquipo();
        return DBObject::ejecutar($sql, $data, $fields);
    }

        // Insertar nuevo dispositivo asociado a un cliente
    public function insertEquipo($dataRequest) {
        $rucNegocio      = $dataRequest["ruc_negocio"];
        $idCliente       = $dataRequest["id_cliente"];
        $tipoEquipo      = $dataRequest["tipo_equipo"];
        $marca           = $dataRequest["marca"];
        $modelo          = $dataRequest["modelo"];
        $numeroSerie     = $dataRequest["numero_serie"];
        $caracteristicas = $dataRequest["caracteristicas"];

        $sql = "INSERT INTO wip_equipo_cliente (ruc_negocio, id_ctapersona, tipo_equipo, marca, modelo, numero_serie, caracteristicas, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) "
             . "VALUES (?, ?, ?, ?, ?, ?, ?, '1', '0', USER(), NOW(), USER(), NOW())";
        
        $values = [$rucNegocio, $idCliente, $tipoEquipo, $marca, $modelo, $numeroSerie, $caracteristicas];
        $types = 'sssssss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }

}
?>
