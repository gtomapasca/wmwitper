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
// Clase wip_suscripcion:
//  - SqlMap a la tabla wip_suscripcion
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla wip_suscripcion
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/ifz/src/php/SuscripcionDAO.php';

/* Clase SqlMapSuscripcionDAO */
class SqlMapSuscripcionDAO implements SuscripcionDAO{
      // Registrar suscripcion
	  public function insertSuscripcion($jsonParams){
		try{
			$ruc = $jsonParams->ruc_negocio;
			$nombre = $jsonParams->nombre;
			$celular = $jsonParams->celular;
			$mail = $jsonParams->email;
			$sql  = "insert into wip_suscripcion (ruc_negocio, nombre, celular, email, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act, fk_idusuario) "
		       	."values(?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW(), null)";
			// [INI] Setear data
			$values = [$ruc, $nombre, $celular, $mail]; 
			$types = 'ssss';
			$values = array_values($values); 
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			DBObject::ejecutar($sql, $data);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }
      	
}

?>
