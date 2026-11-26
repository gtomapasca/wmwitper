<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/service/ifz/src/php/RegistrarSoporteTecnicoService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapServicioTecnicoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapDetalleServicioTecnicoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapEquipoClienteDAO.php';

class RegistrarSoporteTecnicoServiceImpl implements RegistrarSoporteTecnicoService {

            public function grabarIngresoOrdenTecnica($dataRequest) {
        try {
            $daoServicio = new SqlMapServicioTecnicoDAO();
            $daoDetalle  = new SqlMapDetalleServicioTecnicoDAO();

            $idServicioEditar = !empty($dataRequest["id_servicio_editar"]) ? intval($dataRequest["id_servicio_editar"]) : 0;

            if ($idServicioEditar > 0) {
                // MODO EDICIÓN: Actualiza la cabecera existente y reemplaza sus detalles sin duplicar
                $daoServicio->updateServicioTecnico($dataRequest);
                $daoDetalle->deleteDetallesPorServicio($idServicioEditar);

                if (!empty($dataRequest["detalles"])) {
                    foreach ($dataRequest["detalles"] as $item) {
                        $detalleItem = array(
                            "id_servicio"     => $idServicioEditar,
                            "tipo_concepto"   => $item->tipo_concepto,
                            "id_cat_servicio" => $item->id_cat_servicio,
                            "cod_producto"    => $item->cod_producto,
                            "descripcion"     => $item->descripcion,
                            "precio_unitario" => $item->precio_unitario,
                            "cantidad"        => $item->cantidad,
                            "subtotal"        => $item->subtotal
                        );
                        $daoDetalle->insertDetalleServicioTecnico($detalleItem);
                    }
                }

                return array(
                    "encontrado" => true,
                    "mensaje"    => "Registro actualizado exitosamente.",
                    "datos"      => array("id_servicio" => $idServicioEditar)
                );
            } else {
                // MODO NUEVO (O CONVERSIÓN COTIZACIÓN -> SERVICIO): Inserta un nuevo registro
                $prefijo = ($dataRequest["tipo_comprobante"] === "COTIZACION") ? "COT-" : "ST-";
                $dataRequest["ruc_negocio"]     = "20608326481";
                $dataRequest["codigo_servicio"] = $prefijo . date("His");
                $dataRequest["id_usuario"]      = isset($dataRequest["id_usuario"]) ? $dataRequest["id_usuario"] : 1;

                $daoServicio->insertServicioTecnico($dataRequest);

                $listaReciente = $daoServicio->selectListaOrdenesTecnicas(array("comprobante" => $dataRequest["tipo_comprobante"]));
                $primerRegistro = ($listaReciente != null && count($listaReciente) > 0) ? reset($listaReciente) : null;
                $idServicioGenerado = ($primerRegistro && isset($primerRegistro["id_servicio"])) ? $primerRegistro["id_servicio"] : 0;

                if ($idServicioGenerado > 0 && !empty($dataRequest["detalles"])) {
                    foreach ($dataRequest["detalles"] as $item) {
                        $detalleItem = array(
                            "id_servicio"     => $idServicioGenerado,
                            "tipo_concepto"   => $item->tipo_concepto,
                            "id_cat_servicio" => $item->id_cat_servicio,
                            "cod_producto"    => $item->cod_producto,
                            "descripcion"     => $item->descripcion,
                            "precio_unitario" => $item->precio_unitario,
                            "cantidad"        => $item->cantidad,
                            "subtotal"        => $item->subtotal
                        );
                        $daoDetalle->insertDetalleServicioTecnico($detalleItem);
                    }
                }

                // Si proviene de una cotización abierta, cambiar su estado a CERRADO automáticamente
                if (!empty($dataRequest["id_cotizacion_origen"]) && $dataRequest["tipo_comprobante"] === "SERVICIO") {
                    $daoServicio->cerrarCotizacionOrigen($dataRequest["id_cotizacion_origen"]);
                }

                return array(
                    "encontrado" => true,
                    "mensaje"    => "Registro " . $dataRequest["codigo_servicio"] . " guardado exitosamente.",
                    "datos"      => array("codigo_generado" => $dataRequest["codigo_servicio"])
                );
            }

        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error al grabar: " . $e->getMessage());
        }
    }



        public function registrarCliente($dataRequest) {
        try {
            $dao = new SqlMapServicioTecnicoDAO();
            $dao->insertClienteNuevo($dataRequest);
            return array("encontrado" => true, "mensaje" => "Cliente registrado correctamente.");
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error al registrar cliente: " . $e->getMessage());
        }
    }


    public function registrarEquipo($dataRequest) {
        try {
            $dao = new SqlMapEquipoClienteDAO();
            $dataRequest["ruc_negocio"] = "20608326481";
            $dao->insertEquipo($dataRequest);
            return array("encontrado" => true, "mensaje" => "Dispositivo registrado y asociado al cliente.");
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error al registrar equipo: " . $e->getMessage());
        }
    }
}
?>
