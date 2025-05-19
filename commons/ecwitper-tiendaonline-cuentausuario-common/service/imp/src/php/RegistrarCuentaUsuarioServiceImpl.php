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

   /*public function registrarUsuarioCli($jsonParams) {
		try{			
			$sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
			$usuario = new Usuario();
			$usuario->set_nick($params->get_nombre());
			$usuario->set_cel($params->get_celular());
			$usuario->set_email($params->get_email());
			$usuario->set_password($params->get_password());
			$sqlMapUsuarioDAO->insertUsuario($usuario);
			//$dataResponse["encontrado"] = true;
			//$dataResponse["mensaje"] 	= "Se registro correctamente";
			$dataResponse["tipo"] = "I"; // Información
            $dataResponse["msj"] = "Usuario creado correctamente";
            $dataResponse["exito"] = true;
			return $dataResponse;
		}catch (Exception $e) {
			//$dataResponse["encontrado"] = false;
			//$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			//$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			$dataResponse["tipo"] = "E"; // Error
            $dataResponse["msj"] = "(" . $e->getCode() .") ". $e->getMessage();
            $dataResponse["exito"] = false;
			return $dataResponse;
		}
   }*/


}

?>
