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
//  - Interfaz de GaleriaProductoTiendaDAO
// ----------------------------------------------------------------------------
// Change History:
//  2022/05/05  degui <degui@nitper.com>
//     - Se crea interfaz de especificacion
// ----------------------------------------------------------------------------

/* Interfaz GaleriaProductoTiendaDAO */
interface GaleriaProductoTiendaDAO{
      public function updateImagenProductoTienda($dataRequest);
      public function selectImagenProductoTienda($dataRequest);
      public function insertGaleriaImagenProducto($dataRequest);
	public function selectGaleriaImagenProducto($dataRequest);
      public function updateGaleriaImagenProducto($dataRequest);
}

?>
