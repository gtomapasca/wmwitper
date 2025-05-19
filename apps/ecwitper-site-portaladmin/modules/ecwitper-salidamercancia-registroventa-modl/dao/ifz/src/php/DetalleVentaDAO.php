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
//  - Interfaz de detalle de venta
// ----------------------------------------------------------------------------
// Change History:
//  2023/03/13  degui <degui@nitper.com>
//     - Se crea interfaz de detalle de venta
// ----------------------------------------------------------------------------

/* Interfaz DetalleVentaDAO */
interface DetalleVentaDAO{
    public function insertDetalleVenta($dataRequest);
    public function selectListDetalleVentaById($dataRequest);
}

?>
