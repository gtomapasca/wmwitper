<?php

require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/ifz/src/php/RegistrarCuentaUsuarioService.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/imp/src/php/SqlMapUsuarioDAO.php';
//require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/model/src/php/Usuario.php';

class RegistrarCuentaUsuarioServiceImpl implements RegistrarCuentaUsuarioService {

   // 20210214 registrar usuario de cliente web
   public function registrarUsuarioCli($jsonParams) {
		$objRespuesta = new stdClass();
		try{			
			$sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
			$sqlMapUsuarioDAO->insertUsuario($jsonParams);
			$objRespuesta->tip = "I"; // Info
			$objRespuesta->msj = "Usuario creado correctamente";
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

}

?>
