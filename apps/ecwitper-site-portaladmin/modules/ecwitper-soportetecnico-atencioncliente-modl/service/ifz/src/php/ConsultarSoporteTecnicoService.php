<?php

interface ConsultarSoporteTecnicoService {
    public function obtenerListaOrdenesTecnicas($dataRequest);
    public function obtenerFichaCompletaPorId($dataRequest);
    public function buscarClientePorDniRuc($dataRequest);
    public function obtenerEquiposPorCliente($dataRequest);
    public function obtenerCatalogoServicios();
    public function buscarProductoTienda($dataRequest);
}

?>

