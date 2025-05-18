<?php

require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/ifz/src/php/ConsultarCuentaUsuarioService.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/dao/imp/src/php/SqlMapUsuarioDAO.php';

class ConsultarCuentaUsuarioServiceImpl implements ConsultarCuentaUsuarioService {

	// iniciar sesion
	public function validarUsuarioCli($jsonParams) {
		try{
			$objRespuesta = new stdClass();
			$sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
			$data = $sqlMapUsuarioDAO->selectCountUser($jsonParams);
			if($data != null && count($data) > 0){
				$objRespuesta->tip = "I"; // Info
            	$objRespuesta->msj = "Encontrado";
            	$objRespuesta->val = true;
				$objRespuesta->datos = $data;

			}else{
				$objRespuesta->tip = "A"; // Advertencia
            	$objRespuesta->msj = "Disculpe, no tiene acceso a la cuenta, vuelva a intentarlo"; // no se obtuvieron resultados
            	$objRespuesta->val = false;
				$objRespuesta->datos = 0;
			}
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
            $objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
            $objRespuesta->val = false;
			$objRespuesta->datos = 0;
			return $objRespuesta;
		}
	}

}

?>
