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
//  - Interfaz de Cliente
// ----------------------------------------------------------------------------
// Change History:
//  2023/01/05  degui <degui@nitper.com>
//     - Se crea interfaz de cliente
// ----------------------------------------------------------------------------

/* Interfaz ClienteDAO */
interface CuentaPersonaDAO{
      public function selectClienteVenta($dataRequest);
      public function insertClienteVenta($dataRequest);
}

?>
