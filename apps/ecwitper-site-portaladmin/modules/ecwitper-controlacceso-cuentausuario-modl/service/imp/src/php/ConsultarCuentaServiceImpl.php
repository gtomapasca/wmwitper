<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/service/ifz/src/php/ConsultarCuentaService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/dao/imp/src/php/SqlMapUsuarioDAO.php';

class ConsultarCuentaServiceImpl implements ConsultarCuentaService{
   // 20210502 validar cuenta usuario
   public function validarUsuarioAdm($dataRequest) {
	try{
	    $sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
	    $data = $sqlMapUsuarioDAO->selectCountUser($dataRequest);
	    if(count($data) > 0){
		$dataResponse["encontrado"] = true;
		$dataResponse["mensaje"]    = "encontrado";
		$dataResponse["datos"] 	    = $data;
	    }else{
		$dataResponse["encontrado"] = true;
		$dataResponse["mensaje"]    = "no se obtuvieron resultados";
		$dataResponse["datos"] 	    = 0;
	    }
	    return $dataResponse;
	}catch (Exception $e) {
	    $dataResponse["encontrado"] = false;
	    $dataResponse["codeErr"]    = "Código de Error: "  . $e->getCode();
	    $dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
	    return $dataResponse;
	}
   }

   	// 20210506: Obtener lista de usuarios
   	public function obtenerListaUsuarios() {
		try{
			$sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
			$data = $sqlMapUsuarioDAO->selectUsersList();
			if(count($data) > 0){
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"]    = "encontrado";
			$dataResponse["datos"] 	    = $data;
			}else{
			$dataResponse["encontrado"] = true;
			$dataResponse["mensaje"]    = "no se obtuvieron resultados";
			$dataResponse["datos"] 	    = 0;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"]    = "Código de Error: "  . $e->getCode();
			$dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
   	}

}

?>
