<?php

interface GaleriaImagenProductoService{
      public function registrarImagenProductoTienda();
      public function registrarImagenProductoGaleria();
      public function obtenerImagenProductoTienda($dataRequest);
      public function obtenerImagenesGaleriaProductos($dataRequest);
      public function modificarImagenProductoGaleria();
}

?>
