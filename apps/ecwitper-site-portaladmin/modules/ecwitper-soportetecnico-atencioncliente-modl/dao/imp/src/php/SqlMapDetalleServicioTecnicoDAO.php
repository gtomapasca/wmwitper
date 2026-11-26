<?php

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/model/src/php/DetalleServicioTecnico.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/ifz/src/php/DetalleServicioTecnicoDAO.php';

class SqlMapDetalleServicioTecnicoDAO implements DetalleServicioTecnicoDAO {

        // Insertar cada línea de tarea o repuesto asociado al servicio
    public function insertDetalleServicioTecnico($dataRequest) {
        $idServicio     = $dataRequest["id_servicio"];
        $tipoConcepto   = $dataRequest["tipo_concepto"];
        $idCatServicio  = !empty($dataRequest["id_cat_servicio"]) ? $dataRequest["id_cat_servicio"] : null;
        $codProducto    = !empty($dataRequest["cod_producto"]) ? $dataRequest["cod_producto"] : null;
        $descripcion    = $dataRequest["descripcion"];
        $precioUnitario = $dataRequest["precio_unitario"];
        $cantidad       = $dataRequest["cantidad"];
        $subtotal       = $dataRequest["subtotal"];

        $sql = "INSERT INTO wip_detalle_servicio_tecnico (id_servicio, tipo_concepto, id_cat_servicio, cod_producto, descripcion, precio_unitario, cantidad, subtotal, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) "
             . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, '1', '0', USER(), NOW(), USER(), NOW())";

        $values = [$idServicio, $tipoConcepto, $idCatServicio, $codProducto, $descripcion, $precioUnitario, $cantidad, $subtotal];
        $types = 'ssssssss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }


    // Consultar las líneas de detalle de una ficha específica
    public function selectDetallePorServicio($dataRequest) {
        $idServicio = $dataRequest["id_servicio"];
        $sql = "SELECT id_detalle, id_servicio, tipo_concepto, id_cat_servicio, cod_producto, descripcion, precio_unitario, cantidad, subtotal "
             . "FROM wip_detalle_servicio_tecnico WHERE id_servicio = ? AND del = '0' ORDER BY id_detalle ASC";

        $values = [$idServicio];
        $types = 's';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $detalle = new DetalleServicioTecnico();
        $fields = $detalle->toArrayDetalle();
        return DBObject::ejecutar($sql, $data, $fields);
    }

        // Eliminar líneas previas antes de reinsertar las actualizadas al editar
    public function deleteDetallesPorServicio($idServicio) {
        $sql = "DELETE FROM wip_detalle_servicio_tecnico WHERE id_servicio = ?";
        $values = [$idServicio];
        $types = 's';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }

}
?>
