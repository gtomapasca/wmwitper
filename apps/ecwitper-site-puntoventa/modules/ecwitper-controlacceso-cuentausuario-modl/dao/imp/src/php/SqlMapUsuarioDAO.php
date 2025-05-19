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
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-controlacceso-cuentausuario-modl/dao/model/src/php/Usuario.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-controlacceso-cuentausuario-modl/dao/ifz/src/php/UsuarioDAO.php';

/* Clase SqlMapCuentaDAO */
class SqlMapUsuarioDAO implements UsuarioDAO{
    // 20190830 GTP: Registrar nuevo usuario
    public function insertUsuario($dataRequest){
		$cta_per = "2";	// 2: Anonimo (230130 GTP: se debe registrar la cuenta para obtener el código de cuenta)
		$avatar= $dataRequest["avatar"];
		$nick  = $dataRequest["nick"];
		$email = $dataRequest["email"];
		$pass  = $dataRequest["pass"];
		$cel   = $dataRequest["cel"];
		$tipo  = $dataRequest["tipo"];
		$nivel = $dataRequest["nivel"];
		$sql  = "insert into wip_usuario (id_ctapersona, avatar, nick, email, password, cel, cod_tipo_usu, cod_nivel_usu, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
			."values (?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('ssssssss', "{$cta_per}", "{$avatar}", "{$nick}", "{$email}", "{$pass}", "{$cel}", "{$tipo}", "{$nivel}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20210518 GTP: actualizar usuario
    public function updateUsuario($dataRequest){
		$id_usu= $dataRequest["id_usu"];
		$avatar= $dataRequest["avatar"];
		$nick  = $dataRequest["nick"];
		$email = $dataRequest["email"];
		$pass  = $dataRequest["pass"];
		$cel   = $dataRequest["cel"];
		$tipo  = $dataRequest["tipo"];
		$nivel = $dataRequest["nivel"];
		$estado = $dataRequest["estado"];
		$sql  = "update wip_usuario set avatar=?, nick=?, email=?, password=?, cel=?, cod_tipo_usu=?, cod_nivel_usu=?, estado=? "
			." where id_usuario=?";
		$data = array('sssssssss', "{$avatar}", "{$nick}", "{$email}", "{$pass}", "{$cel}", "{$tipo}", "{$nivel}", "{$estado}", "{$id_usu}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20190830 GTP: Validar cuenta usuario
    public function selectCountUser($dataRequest){
		$usuario = new Usuario();
		$user = $dataRequest["user"];
		$pass = $dataRequest["pass"];
		$tipu = "UI";
		$sql  = "select id_usuario, id_ctapersona, avatar, nick, email, cel, face, cod_tipo_usu, cod_nivel_usu, password, estado "
			."from wip_usuario where cod_tipo_usu = ? and nick = ? and password = ?";
		$data = array('sss', "{$tipu}", "{$user}", "{$pass}");
		$fields = $usuario->toArrayLogin();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20191209 GTP: obtener lista de usuarios
    public function selectUsersList(){
		$usuario = new Usuario();
		$del = 0;
		//$sql  = "select * from wip_usuario where del = ?";
		$sql  = "select id_usuario, id_ctapersona, avatar, nick, email, cel, face, cod_tipo_usu, cod_nivel_usu, password, estado "
			." from wip_usuario where del = ?";
		$data = array('i', "{$del}");
		$fields = $usuario->toArrayLogin();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20210519 GTP: eliminar usuario
    public function deleteUsuario($dataRequest){
		$id_usu= $dataRequest["id_usuario"];
		/*$avatar= $dataRequest["avatar"];
		$nick  = $dataRequest["nick"];
		$email = $dataRequest["email"];
		$pass  = $dataRequest["pass"];
		$cel   = $dataRequest["cel"];
		$tipo  = $dataRequest["tipo"];
		$nivel = $dataRequest["nivel"];*/
		$del   = '1'; // eliminación lógica
		$sql  = "update wip_usuario set del=? where id_usuario=?";
		$data = array('ss', "{$del}", "{$id_usu}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
