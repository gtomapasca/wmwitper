<?php

interface RegistrarCarritoComprasService {
      // Degui 20191010: Agregar producto al carrito
      public function addProductoCar($dataRequest);
      // Degui 20191010: Agregar cliente al carrito
      public function addClienteCar($dataRequest);
      // Registrar Pedido
      public function registrarCarritoPedido($data_carrito);
      // Quitar producto pedido
      public function delProductoCar($index);
      
}

?>
