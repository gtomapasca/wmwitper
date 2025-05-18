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
//  09/02/2020  degui <degui@nitper.com>
//     - Se crea interfaz para Programa
// ----------------------------------------------------------------------------

/* Interfaz ProgramaDAO */
interface ProgramaDAO{
      // 09/02/2020 GTP: Seleccionar programa
      public function selectProgramaByCod($dataRequest);
}

?>
