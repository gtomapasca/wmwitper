<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/service/imp/src/php/RegistrarCuentaServiceImpl.php';

class RegistrarController extends Controller {
	
   	// Degui 20210514: Registrar Nuevo Usuario
   	public function registrarNuevoUsuario() {
		$dataRequest = array(
					"avatar" => $_POST["txtAvatar"],
		      		"nick" 	 => $_POST["txtNick"],
		      		"email"  => $_POST["txtEmail"],
		      		"pass" 	 => $_POST["txtPassword"],
					"cel" 	 => $_POST["txtCel"],
		      		"tipo"   => $_POST["selTipo"],
		      		"nivel"  => $_POST["selNivel"]
		   	      );
		$registrarCuentaServiceImpl = new RegistrarCuentaServiceImpl();
		$dataResponse = $registrarCuentaServiceImpl->registrarNuevoUsuario($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

   	// Degui 20210517: Modificar usuario
   	public function modificarUsuario() {
		$dataRequest = array(
					"id_usu" => $_POST["hid_idUsuario"],
					"avatar" => $_POST["txtAvatarMod"],
		      		"nick" 	 => $_POST["txtNickMod"],
		      		"email"  => $_POST["txtEmailMod"],
		      		"pass" 	 => $_POST["txtPasswordMod"],
					"cel" 	 => $_POST["txtCelMod"],
		      		"tipo"   => $_POST["selTipoMod"],
		      		"nivel"  => $_POST["selNivelMod"],
					"estado"  => $_POST["selEstadoMod"]
		   	      );
		$registrarCuentaServiceImpl = new RegistrarCuentaServiceImpl();
		$dataResponse = $registrarCuentaServiceImpl->modificarUsuario($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

   	// Degui 20210518: Eliminar usuario
   	public function eliminarUsuario() {
		$datosArray = json_decode($_POST['datos']);
		if($_POST['datos']){ // si existe
			foreach($datosArray as $clave=>$valor){
				$dataRequest[$clave] = $valor;
			}
		}
		$registrarCuentaServiceImpl = new RegistrarCuentaServiceImpl();
		$dataResponse = $registrarCuentaServiceImpl->eliminarUsuario($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
  	}

}

?>
