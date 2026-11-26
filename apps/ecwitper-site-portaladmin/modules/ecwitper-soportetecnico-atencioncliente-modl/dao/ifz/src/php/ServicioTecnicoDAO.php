<?php

interface ServicioTecnicoDAO {
    public function selectListaOrdenesTecnicas($dataRequest);
    public function selectServicioPorId($dataRequest);
    public function insertServicioTecnico($dataRequest);
    public function cerrarCotizacionOrigen($idCotizacion);
    public function selectClientePorDniRuc($dataRequest);
    public function insertClienteNuevo($dataRequest);
    public function selectProductoTiendaPorCodigo($dataRequest);
    public function updateServicioTecnico($dataRequest);
}

?>
