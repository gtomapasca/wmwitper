<?php

interface DetalleServicioTecnicoDAO {
    public function insertDetalleServicioTecnico($dataRequest);
    public function selectDetallePorServicio($dataRequest);
    public function deleteDetallesPorServicio($idServicio);
}

?>
