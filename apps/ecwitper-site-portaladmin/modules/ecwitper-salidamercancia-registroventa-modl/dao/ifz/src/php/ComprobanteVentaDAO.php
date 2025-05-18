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
//  2023/02/04  degui <degui@nitper.com>
//     - Se crea interfaz de producto
// ----------------------------------------------------------------------------

/* Interfaz ComprobanteVentaDAO */
interface ComprobanteVentaDAO{
    public function selectComprobanteVentas($dataRequest);
    public function selectCorreComprobanteVenta($dataRequest);
    public function selectIdComprobanteVenta($dataRequest);
    public function insertComprobanteVenta($dataRequest);
}

?>
