<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-cpanelpvta-mainmenu-modl/service/imp/src/php/ConsultarPrincipalServiceImpl.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-controlacceso-cuentausuario-modl/service/imp/src/php/ConsultarCuentaServiceImpl.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/service/imp/src/php/ConsultarMenuServiceImpl.php';

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
	// Degui 20200201: obtener menu principal
	public function cargarMenuPrincipal() {
		$dataRequest["codUser"] = $_GET["codUser"];
		$consultarMenuServiceImpl = new ConsultarMenuServiceImpl();
		$dataResponse = $consultarMenuServiceImpl->cargarMenuPrincipal($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// Degui 20200201: obtener menu lateral
	public function obtenerMenuLateral() {
		$dataRequest["codMGProg"] = $_GET["codMGProg"];
		$consultarMenuServiceImpl = new ConsultarMenuServiceImpl();
		$dataResponse = $consultarMenuServiceImpl->obtenerMenuLateral($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// Degui 20200203: obtener opcion menu lateral
	public function obtenerOpcionMenuLateral() {
		$dataRequest["codGProg"] = $_GET["codGProg"];
		$consultarMenuServiceImpl = new ConsultarMenuServiceImpl();
		$dataResponse = $consultarMenuServiceImpl->obtenerOpcionMenuLateral($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}
	// Degui 20191219: obtener pagina Id
	public function obtenerPaginaId() {
		$dataRequest["codPage"] = $_GET["codPage"];
		$consultarPrincipalServiceImpl = new ConsultarPrincipalServiceImpl();
		$dataResponse = $consultarPrincipalServiceImpl->obtenerPaginaId($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

}

?>
