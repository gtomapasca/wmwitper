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
//  - SqlMap a la tabla usuario
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     	- Se crea SqlMap a la tabla usuario
//	2024/06/16	degui <degui@nitper.com>
//		- Se ajusta métodos para usar clases
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/model/src/php/CuentaPersona.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/ifz/src/php/CuentaPersonaDAO.php';

/* Clase SqlMapCuentaPersonaDAO */
class SqlMapCuentaPersonaDAO implements CuentaPersonaDAO{

	// 20261101 GTP: incrementar secuencia
	public function updateSecuenciaCuentaPersona($nomSec){
		try{
			// [INI] Setear data
			$values = [$nomSec];
			$types = 's';
			$values = array_values($values); 
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			// paso 1. Incrementar secuencia
			$sql  = "update wip_contador_secuencia set valor = last_insert_id(valor + 1) where nombre = ?";
			DBObject::ejecutar($sql, $data);
			// paso 2. Consultar secuencia
			$cuentaPersona = new CuentaPersona();
			$fields = $cuentaPersona->toArraySecuencia();
			$sql  = "select valor from wip_contador_secuencia where nombre = ?";			
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }

    // 20261101 GTP: Registrar cuenta persona
    public function insertCuentaPersona($jsonParams){
		try{
			$secuencia 	= $jsonParams->secuencia;
			$rucNegocio = $jsonParams->rucNegocio;
			$tipCuenta 	= $jsonParams->tipCuenta;
			$nombres 	= $jsonParams->nick;
			$celular 	= $jsonParams->numCel;
			$mail 		= $jsonParams->email;
			$sql  = "insert into wip_cuenta_persona (id_ctapersona, ruc_negocio, tipo_cuenta, nombres, celular, email, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
					."values (?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
			// [INI] Setear data
			$values = [$secuencia, $rucNegocio, $tipCuenta, $nombres, $celular, $mail]; 
			$types = 'isssss';
			$values = array_values($values); 
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			DBObject::ejecutar($sql, $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }
      	
}

?>
