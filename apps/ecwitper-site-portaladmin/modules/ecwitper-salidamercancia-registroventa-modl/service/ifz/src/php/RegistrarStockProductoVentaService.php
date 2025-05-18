<?php

interface RegistrarStockProductoVentaService{
    public function registrarNuevoProductoTienda($dataRequest);
    public function modificarProductoTienda($dataRequest);
    public function registrarEspecificacionProducto($dataRequest);
    public function modificarEspecificacionProducto($dataRequest);
}

?>
