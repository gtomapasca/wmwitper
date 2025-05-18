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
// Clase funcSuscripcion:
//  - Clase funcSuscripcion
// ----------------------------------------------------------------------------
// Change History:
//  17/04/2024  degui <degui@nitper.com>
//     - Se crea la calse funcion Suscripcion
// ----------------------------------------------------------------------------

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';
//require_once 'apps/ecwitper-tiendaonline-webapp/controllers/catalogo-productos-ctrl/ctrl/src/php/MenuCatalogoProductosController.php';
require_once 'apps/ecwitper-tiendaonline-webapp/controllers/cuenta-usuario-ctrl/ctrl/src/php/CPMenuCuentaUsuarioController.php';

class MenuCuentaUsuarioController extends Controller{

    public function opcionCrearCuentaUsuario() {
        $control = new CPMenuCuentaUsuarioController();
        $dataResponse = $control->cargarCrearCuentaUsuario($dataRequest);
        echo json_encode($dataResponse);
        exit();
    }

}

?>
