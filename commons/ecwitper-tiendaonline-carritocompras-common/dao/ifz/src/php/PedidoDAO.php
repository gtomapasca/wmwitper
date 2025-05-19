<?php
// ----------------------------------------------------------------------------
// Copyright 2019, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Interfaz Usuario:
//  - Interfaz de producto
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea interfaz de producto
// ----------------------------------------------------------------------------

/* Interfaz PedidoDAO */
interface PedidoDAO{
      // Consultar ultimo pedido
      public function getLastPedido();
      // 20210201 Registrar pedido
      public function insertPedidoCar($dataRequest);
}

?>
