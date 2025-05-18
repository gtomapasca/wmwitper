<?php

interface ConsultarCarritoComprasService {
      //funcion para obtener items de carrito
      public function getCarList();
      public function getPedidoCar();
      // 20210207 consultar item carrito
      public function getCantItemsCar();
}

?>
