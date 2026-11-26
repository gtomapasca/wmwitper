<?php

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/model/src/php/ServicioTecnico.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/ifz/src/php/ServicioTecnicoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/Cliente.php';


class SqlMapServicioTecnicoDAO implements ServicioTecnicoDAO {

    // 1. Listar los 5 últimos servicios o cotizaciones (o filtrar si hay criterios)
        // 1. Listar los 5 últimos servicios o cotizaciones (o filtrar si hay criterios)
    public function selectListaOrdenesTecnicas($dataRequest) {
        $comprobante = isset($dataRequest["comprobante"]) ? $dataRequest["comprobante"] : 'SERVICIO';
        $del = '0';

                $sql = "SELECT st.id_servicio, st.codigo_servicio, st.fecha_ingreso, cp.doc_num, "
             . "cp.nombres AS cliente_nombre, "
             . "ec.modelo AS equipo_detalle, "
             . "st.estado_servicio "
             . "FROM wip_servicio_tecnico st "
             . "INNER JOIN wip_cuenta_persona cp ON st.id_ctapersona = cp.id_ctapersona "
             . "INNER JOIN wip_equipo_cliente ec ON st.id_equipo = ec.id_equipo "
             . "WHERE st.del = ? AND st.tipo_comprobante = ? ";


        $values = [$del, $comprobante];
        $types = 'ss';
        $tieneFiltros = false;

        if (!empty($dataRequest["codigo_servicio"])) {//filtrado por ns o codigo de ficha
            $sql .= "AND (st.codigo_servicio LIKE ? OR ec.numero_serie LIKE ?) ";
            $criterio = "%" . $dataRequest["codigo_servicio"] . "%";
            $values[] = $criterio;
            $values[] = $criterio;
            $types .= 'ss';
            $tieneFiltros = true;
        }
        //if (!empty($dataRequest["codigo_servicio"])) {
            //$sql .= "AND st.codigo_servicio LIKE ? ";
           // $values[] = "%" . $dataRequest["codigo_servicio"] . "%";
           // $types .= 's';
            //$tieneFiltros = true;
        //}
        //if (!empty($dataRequest["estado"])) {
            //$sql .= "AND st.estado_servicio = ? ";
            //$values[] = $dataRequest["estado"];
            //$types .= 's';
            //$tieneFiltros = true;
        //}
        //liste las cotizaciones anuladas y cerradas
        if (!empty($dataRequest["estado"])) {
            if ($comprobante === "COTIZACION" && $dataRequest["estado"] === "CERRADO") {
                $sql .= "AND st.estado_servicio IN ('CERRADO', 'ANULADO') ";
            } else {
                $sql .= "AND st.estado_servicio = ? ";
                $values[] = $dataRequest["estado"];
                $types .= 's';
            }
            $tieneFiltros = true;
        }

        if (!empty($dataRequest["fecha_inicio"]) && !empty($dataRequest["fecha_final"])) {
            $sql .= "AND DATE(st.fecha_ingreso) BETWEEN ? AND ? ";
            $values[] = $dataRequest["fecha_inicio"];
            $values[] = $dataRequest["fecha_final"];
            $types .= 'ss';
            $tieneFiltros = true;
        }

        $sql .= "ORDER BY st.id_servicio DESC ";
        if (!$tieneFiltros) {
            $sql .= "LIMIT 5";
        }

        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $servicio = new ServicioTecnico();
        $fields = $servicio->toArrayBandeja();
        return DBObject::ejecutar($sql, $data, $fields);
    }


    // 2. Obtener cabecera completa de una orden o cotización al pulsar "Ver"
        // 2. Obtener cabecera completa de una orden o cotización al pulsar "Ver"
        // 2. Obtener cabecera completa de una orden o cotización al pulsar "Ver"
    public function selectServicioPorId($dataRequest) {
        $idServicio = $dataRequest["idServicio"];
        $sql = "SELECT st.id_servicio, st.codigo_servicio, st.id_cotizacion_origen, "
             . "IFNULL(cot.codigo_servicio, '') AS codigo_cotizacion_origen, st.id_ctapersona, "
             . "cp.doc_tip, cp.doc_num, CONCAT(cp.nombres, ' ', IFNULL(cp.ape_pat, ''), ' ', IFNULL(cp.ape_mat, '')) AS cliente_nombre, "
             . "COALESCE(NULLIF(cp.celular, ''), NULLIF(cp.telefono, ''), '') AS telefono, IFNULL(cp.email, '') AS correo, IFNULL(cp.direccion, '') AS direccion, "
             . "st.id_equipo, ec.tipo_equipo, ec.marca, ec.modelo, ec.numero_serie, st.tipo_comprobante, st.fecha_ingreso, "
             . "st.accesorios, st.falla_reportada, st.observacion, st.cotizacion_estimada, st.costo_total, st.estado_servicio, st.motivo_estado "
             . "FROM wip_servicio_tecnico st "
             . "LEFT JOIN wip_servicio_tecnico cot ON st.id_cotizacion_origen = cot.id_servicio "
             . "INNER JOIN wip_cuenta_persona cp ON st.id_ctapersona = cp.id_ctapersona "
             . "INNER JOIN wip_equipo_cliente ec ON st.id_equipo = ec.id_equipo "
             . "WHERE st.id_servicio = ? AND st.del = '0'";

        $values = [$idServicio];
        $types = 's';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $servicio = new ServicioTecnico();
        $fields = $servicio->toArrayFichaCompleta();
        return DBObject::ejecutar($sql, $data, $fields);
    }



        // 3. Insertar cabecera con trazabilidad opcional a cotización origen
    public function insertServicioTecnico($dataRequest) {
        $codigoServicio   = $dataRequest["codigo_servicio"];
        $idCotizacionOrig = !empty($dataRequest["id_cotizacion_origen"]) ? $dataRequest["id_cotizacion_origen"] : null;
        $rucNegocio       = $dataRequest["ruc_negocio"];
        $idCliente        = $dataRequest["id_ctapersona"];
        $idEquipo         = $dataRequest["id_equipo"];
        $idUsuario        = $dataRequest["id_usuario"];
        $tipoComprobante  = $dataRequest["tipo_comprobante"];
        $fechaIngreso     = $dataRequest["fecha_ingreso"];
        $accesorios       = $dataRequest["accesorios"];
        $fallaReportada   = $dataRequest["falla_reportada"];
        $observacion      = $dataRequest["observacion"];
        $cotizacionEst    = $dataRequest["cotizacion_estimada"];
        $costoTotal       = $dataRequest["costo_total"];
        $estadoServicio   = $dataRequest["estado_servicio"];
        $motivoEstado     = $dataRequest["motivo_estado"];

        $sql = "INSERT INTO wip_servicio_tecnico (codigo_servicio, id_cotizacion_origen, ruc_negocio, id_ctapersona, id_equipo, id_usuario, tipo_comprobante, fecha_ingreso, "
             . "accesorios, falla_reportada, observacion, cotizacion_estimada, costo_total, estado_servicio, motivo_estado, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act) "
             . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '1', '0', USER(), NOW(), USER(), NOW())";

        $values = [
            $codigoServicio, $idCotizacionOrig, $rucNegocio, $idCliente, $idEquipo, $idUsuario, $tipoComprobante, $fechaIngreso,
            $accesorios, $fallaReportada, $observacion, $cotizacionEst, $costoTotal, $estadoServicio, $motivoEstado
        ];
        $types = 'sssssssssssssss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }

        // 3B. Actualizar servicio existente (al editar desde el botón Ver)
    public function updateServicioTecnico($dataRequest) {
        $idServicio      = $dataRequest["id_servicio_editar"];
        $idEquipo        = $dataRequest["id_equipo"];
        $fechaIngreso    = $dataRequest["fecha_ingreso"];
        $accesorios      = $dataRequest["accesorios"];
        $fallaReportada  = $dataRequest["falla_reportada"];
        $observacion     = $dataRequest["observacion"];
        $cotizacionEst   = $dataRequest["cotizacion_estimada"];
        $costoTotal      = $dataRequest["costo_total"];
        $estadoServicio  = $dataRequest["estado_servicio"];
        $motivoEstado    = $dataRequest["motivo_estado"];

        $sql = "UPDATE wip_servicio_tecnico SET id_equipo = ?, fecha_ingreso = ?, accesorios = ?, falla_reportada = ?, "
             . "observacion = ?, cotizacion_estimada = ?, costo_total = ?, estado_servicio = ?, motivo_estado = ?, "
             . "codusu_act = USER(), fecha_act = NOW() WHERE id_servicio = ?";

        $values = [$idEquipo, $fechaIngreso, $accesorios, $fallaReportada, $observacion, $cotizacionEst, $costoTotal, $estadoServicio, $motivoEstado, $idServicio];
        $types = 'ssssssssss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }

    // 4. Cerrar cotización original cuando se convierte en orden de servicio
        // 4. Cerrar cotización original cuando se convierte en orden de servicio
    public function cerrarCotizacionOrigen($idCotizacion) {
        $sql = "UPDATE wip_servicio_tecnico SET estado_servicio = 'CERRADO', codusu_act = USER(), fecha_act = NOW() WHERE id_servicio = ?";
        $values = [intval($idCotizacion)];
        $types = 'i';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }



        // 5. Buscar cliente por tipo y número de documento en wip_cuenta_persona
    public function selectClientePorDniRuc($dataRequest) {
        $tipDoc = $dataRequest["tipDoc"];
        $numDoc = $dataRequest["numDoc"];
        $sql = "SELECT id_ctapersona, tipo_usu, doc_tip, doc_num, fecha_nac, nombres, ape_pat, ape_mat, telefono, celular, email, direccion, estado, fecha_reg "
             . "FROM wip_cuenta_persona WHERE estado = '0' AND del = '0' AND doc_tip = ? AND doc_num = ?";

        $values = [$tipDoc, $numDoc];
        $types = 'ss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $cliente = new Cliente();
        $fields = $cliente->toArrayCliente();
        return DBObject::ejecutar($sql, $data, $fields);
    }

    // 6. Registrar nuevo cliente en wip_cuenta_persona
        // 6. Registrar nuevo cliente en wip_cuenta_persona
        // 6. Registrar nuevo cliente en wip_cuenta_persona
    public function insertClienteNuevo($dataRequest) {
        $ruc    = "20608326481";
        $tipUsu = "0";
        $tipDoc = $dataRequest["hdModalTipDocCli"];
        $numDoc = $dataRequest["hdModalNumDocCli"];
        $nomCli = $dataRequest["txtModalNombreCli"];
        $apePat = $dataRequest["txtModalApePatCli"];
        $apeMat = $dataRequest["txtModalApeMatCli"];
        $numCel = $dataRequest["txtModalCelCli"];
        $email  = $dataRequest["txtModalMailCli"];
        $dirCli = isset($dataRequest["txtModalDirCli"]) ? $dataRequest["txtModalDirCli"] : "";
        $appReg = "SRV01";
        $estado = "0";

        $sql = "INSERT INTO wip_cuenta_persona (ruc_negocio, tipo_usu, doc_tip, doc_num, nombres, ape_pat, ape_mat, celular, email, direccion, "
             . "cod_appreg, cod_appact, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
             . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0', USER(), USER(), NOW(), NOW())";

        $values = [$ruc, $tipUsu, $tipDoc, $numDoc, $nomCli, $apePat, $apeMat, $numCel, $email, $dirCli, $appReg, $appReg, $estado];
        $types = 'sssssssssssss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }
        DBObject::ejecutar($sql, $data);
    }

        // 7. Buscar repuesto/producto en wip_producto_tienda por mini_codigo o cod_producto
    public function selectProductoTiendaPorCodigo($dataRequest) {
        $codigo = $dataRequest["codigo"];
        $sql = "SELECT cod_producto, mini_codigo, producto, precio_venta_internet, stock "
             . "FROM wip_producto_tienda WHERE del = '0' AND estado = '0' AND (mini_codigo = ? OR cod_producto = ?) LIMIT 1";

        $values = [$codigo, $codigo];
        $types = 'ss';
        $values = array_values($values);
        $data[] = $types;
        foreach ($values as $i => $v) {
            $data[] = &$values[$i];
        }

        $fields = array(
            "cod_producto"          => "",
            "mini_codigo"           => "",
            "producto"              => "",
            "precio_venta_internet" => 0,
            "stock"                 => 0
        );
        return DBObject::ejecutar($sql, $data, $fields);
    }




}
?>
