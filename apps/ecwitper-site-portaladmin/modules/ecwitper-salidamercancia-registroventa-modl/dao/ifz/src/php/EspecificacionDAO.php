<?php
// ----------------------------------------------------------------------------
// Copyright 2022, Nitper, Inc.
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
//  2022/05/05  degui <degui@nitper.com>
//     - Se crea interfaz de especificacion
// ----------------------------------------------------------------------------

/* Interfaz EspecificacionDAO */
interface EspecificacionDAO{
      public function insertEspecificacionProducto($dataRequest);
      public function updateEspecificacionProducto($dataRequest);
      public function selectEspecificacionDeProducto($dataRequest);
}

?>
