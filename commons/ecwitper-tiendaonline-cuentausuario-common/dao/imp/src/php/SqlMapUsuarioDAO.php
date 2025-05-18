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
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/model/src/php/Usuario.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/ifz/src/php/UsuarioDAO.php';

/* Clase SqlMapCuentaDAO */
class SqlMapUsuarioDAO implements UsuarioDAO{
    // 20190830 GTP: Registrar nuevo usuario
    public function insertUsuario($jsonParams){
		try{
			$cta_per = "1";
			$perfil = "PF02";
			$nick = $jsonParams->nick;
			$cel  = $jsonParams->numCel;
			$mail = $jsonParams->email;
			$pass = $jsonParams->password;
			$sql  = "insert into wip_usuario (id_ctapersona, nick, cel, email, password, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
					."values (?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
			$data = array('sssss', "{$cta_per}", "{$nick}", "{$cel}", "{$mail}", "{$pass}");
			DBObject::ejecutar($sql, $data);
			//$resp_temp = array ("sql" => $sql, "data" => $data);
			//return $resp_temp;
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }

    // 20190830 GTP: iniciar sesion
    public function selectCountUser($jsonParams){
		try{
			$usuario = new Usuario();
			$user = $jsonParams->email;
			$pass = $jsonParams->password;
			$sql  = "select id_usuario, id_ctapersona, avatar, nick, email, cel, face, cod_tipo_usu, password, estado "
					."from wip_usuario where email = ? and password = ? and del = 0";
			$data = array('ss', "{$user}", "{$pass}");
			$fields = $usuario->toArrayLogin();
			return DBObject::ejecutar($sql, $data, $fields);
			//$resp_temp = array ("sql" => $sql, "data" => $data);
			//return $resp_temp;
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}		
    }
		
      	
}

?>
