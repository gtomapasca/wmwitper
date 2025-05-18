<?php

interface ConsultarComprobanteVentasService{
    public function obtenerDatosCliVentas($dataRequest);
    public function obtenerDatosProductoVentas($dataRequest);
    public function consultarComprobanteVentas($dataRequest);
    public function obtenerCorrelativoComprobanteVenta($dataRequest);
    public function obtenerIdComprobanteVenta($dataRequest);
    public function obtenerDetalleVentaById($dataRequest);
}

?>
