<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/service/ifz/src/php/RegistrarCuentaService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/dao/imp/src/php/SqlMapUsuarioDAO.php';

class RegistrarCuentaServiceImpl implements RegistrarCuentaService{
   // 20210214 registrar usuario de cliente web
   public function registrarNuevoUsuario($dataRequest) {
	try{
	    $sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
	    $sqlMapUsuarioDAO->insertUsuario($dataRequest);
	    $dataResponse["encontrado"] = true;
	    $dataResponse["mensaje"] 	= "Se registro correctamente";
	    return $dataResponse;
	}catch (Exception $e) {
	    $dataResponse["encontrado"] = false;
	    $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
	    $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
	    return $dataResponse;
	}
   }

   // 20210214 modificar usuario de cliente web
   public function modificarUsuario($dataRequest) {
	try{
	    $sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
	    $sqlMapUsuarioDAO->updateUsuario($dataRequest);
	    $dataResponse["encontrado"] = true;
	    $dataResponse["mensaje"] 	= "Se actualizo correctamente";
	    return $dataResponse;
	}catch (Exception $e) {
	    $dataResponse["encontrado"] = false;
	    $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
	    $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
	    return $dataResponse;
	}
   }

   // 20210519 eliminar usuario de cliente web
   public function eliminarUsuario($dataRequest) {
	try{
	    $sqlMapUsuarioDAO = new SqlMapUsuarioDAO();
	    $sqlMapUsuarioDAO->deleteUsuario($dataRequest);
	    $dataResponse["encontrado"] = true;
	    $dataResponse["mensaje"] 	= "Se elimino correctamente";
	    return $dataResponse;
	}catch (Exception $e) {
	    $dataResponse["encontrado"] = false;
	    $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
	    $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
	    return $dataResponse;
	}
   }

}

?>
