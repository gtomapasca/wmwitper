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
//  - Interfaz de Usuario
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea interfaz de Usuario
// ----------------------------------------------------------------------------

/* Interfaz UsuarioDAO */
interface UsuarioDAO{
	public function insertUsuario($dataRequest);
	public function selectAccountUser($dataRequest);
	public function selectUsuarioAnonimo();
}

?>
