<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-controlacceso-cuentausuario-modl/service/imp/src/php/ConsultarCuentaServiceImpl.php';

class ConsultarController extends Controller {
	// 20210502 validar cuenta usuario
	public function validarUsuario() {
		$dataRequest["user"] = $_POST["txtUser"];
		$dataRequest["pass"] = $_POST["txtPassword"];
		$consultarCuentaServiceImpl = new ConsultarCuentaServiceImpl();
		$dataResponse = $consultarCuentaServiceImpl->validarUsuarioAdm($dataRequest);
		echo json_encode($dataResponse);
		exit();
	 }
	// Degui 20191209: Obtener lista de usuarios
	public function obtenerListaUsuarios() {
		$consultarCuentaServiceImpl = new ConsultarCuentaServiceImpl();
		$dataResponse = $consultarCuentaServiceImpl->obtenerListaUsuarios();
		echo json_encode($dataResponse);
		exit();
	}

}

?>
