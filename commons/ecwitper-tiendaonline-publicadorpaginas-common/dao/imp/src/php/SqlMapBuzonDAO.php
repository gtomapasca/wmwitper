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
// Clase Usuario:
//  - SqlMap a la tabla producto
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/ifz/src/php/BuzonDAO.php';

/* Clase SqlMapBuzonDAO */
class SqlMapBuzonDAO implements BuzonDAO{
      // Registrar buzon
      public function insertBuzon($dataRequest){
		$ruc 	 = "10440440911"; // ruc de negocio (defaul)
		$nom 	 = $dataRequest["nombre"];
		$cel 	 = $dataRequest["cel"];
		$mail 	 = $dataRequest["email"];
		$asunto	 = $dataRequest["asunto"];
		$mensaje = $dataRequest["mensaje"];
		$sql  = "insert into wip_buzon (ruc_negocio, nombre, celular, email, asunto, mensaje, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		       ."values (?, ?, ?, ?,  ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('ssssss', "{$ruc}", "{$nom}", "{$cel}", "{$mail}", "{$asunto}", "{$mensaje}");
		DBObject::ejecutar($sql, $data);
      }
      	
}

?>
