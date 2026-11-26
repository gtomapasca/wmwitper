<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/service/ifz/src/php/ConsultarSoporteTecnicoService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapServicioTecnicoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapDetalleServicioTecnicoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapEquipoClienteDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-soportetecnico-atencioncliente-modl/dao/imp/src/php/SqlMapCatalogoServicioTecnicoDAO.php';

class ConsultarSoporteTecnicoServiceImpl implements ConsultarSoporteTecnicoService {

    public function obtenerListaOrdenesTecnicas($dataRequest) {
        try {
            $dao = new SqlMapServicioTecnicoDAO();
            $data = $dao->selectListaOrdenesTecnicas($dataRequest);

            $dataResponse["encontrado"] = ($data != null && count($data) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "No se encontraron registros";
            $dataResponse["datos"]      = $data ? $data : array();
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }

        // 2. Obtener cabecera + lista de detalles de una orden al pulsar "Ver"
    public function obtenerFichaCompletaPorId($dataRequest) {
        try {
            $daoServicio = new SqlMapServicioTecnicoDAO();
            $daoDetalle  = new SqlMapDetalleServicioTecnicoDAO();

            $dataRequest["id_servicio"] = isset($dataRequest["idServicio"]) ? $dataRequest["idServicio"] : "";

            $cabeceraRaw = $daoServicio->selectServicioPorId($dataRequest);
            $detallesRaw = $daoDetalle->selectDetallePorServicio($dataRequest);

            $detallesLimpios = array();
            if ($detallesRaw != null) {
                foreach ($detallesRaw as $fila) {
                    if (isset($fila["tipo_concepto"]) && !empty($fila["tipo_concepto"])) {
                        $detallesLimpios[] = $fila;
                    }
                }
            }

            $dataResponse["encontrado"] = ($cabeceraRaw != null && count($cabeceraRaw) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "Ficha no encontrada";
            $dataResponse["cabecera"]   = $cabeceraRaw;
            $dataResponse["detalles"]   = $detallesLimpios;
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }


        public function buscarClientePorDniRuc($dataRequest) {
        try {
            $dao = new SqlMapServicioTecnicoDAO();
            $data = $dao->selectClientePorDniRuc($dataRequest);

            $dataResponse["encontrado"] = ($data != null && count($data) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "Cliente no registrado";
            $dataResponse["datos"]      = $dataResponse["encontrado"] ? $data : null;
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }


    public function obtenerEquiposPorCliente($dataRequest) {
        try {
            $dao = new SqlMapEquipoClienteDAO();
            $data = $dao->selectEquiposPorCliente($dataRequest);

            $dataResponse["encontrado"] = ($data != null && count($data) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "Sin equipos registrados";
            $dataResponse["datos"]      = $data ? $data : array();
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }

    public function obtenerCatalogoServicios() {
        try {
            $dao = new SqlMapCatalogoServicioTecnicoDAO();
            $data = $dao->selectCatalogoServicios();

            $dataResponse["encontrado"] = ($data != null && count($data) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "Sin catálogo";
            $dataResponse["datos"]      = $data ? $data : array();
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }

        // 6. Buscar repuesto o producto en wip_producto_tienda
    public function buscarProductoTienda($dataRequest) {
        try {
            $dao = new SqlMapServicioTecnicoDAO();
            $data = $dao->selectProductoTiendaPorCodigo($dataRequest);

            $dataResponse["encontrado"] = ($data != null && count($data) > 0);
            $dataResponse["mensaje"]    = $dataResponse["encontrado"] ? "encontrado" : "Producto no encontrado en tienda";
            $dataResponse["datos"]      = $dataResponse["encontrado"] ? $data : null;
            return $dataResponse;
        } catch (Exception $e) {
            return array("encontrado" => false, "mensaje" => "Error: " . $e->getMessage());
        }
    }

}
?>
