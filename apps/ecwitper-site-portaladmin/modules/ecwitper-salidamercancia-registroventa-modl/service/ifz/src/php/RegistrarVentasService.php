<?php

interface RegistrarVentasService{
    public function registrarComprobanteVenta($dataRequest);
    public function registrarDetalleVenta($dataRequest);
    public function registrarNuevoClienteParaVenta($dataRequest);
}

?>
