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
// Interfaz Suscripcion:
//  - Interfaz de Menu
// ----------------------------------------------------------------------------
// Change History:
//  24/12/2019  degui <degui@nitper.com>
//     - Se crea interfaz para Menu
// ----------------------------------------------------------------------------

/* Interfaz CabMenuDAO */
interface CabMenuDAO{
      // 20200201 GTP: obtener menu principal
      public function selectListCabMenu($dataRequest);
      // 20200201 GTP: obtener menu lateral
      public function selectListMenu($dataRequest);
      // 20200203 GTP: obtener opcion menu lateral
      public function selectListOpMenu($dataRequest);
}

?>
