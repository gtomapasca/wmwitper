<?php

require_once 'core/controller.php';
require_once 'core/helpers/template.php';
require_once 'commons/ecwitper-tiendaonline-cuentausuario-common/service/imp/src/php/ConsultarCuentaUsuarioServiceImpl.php';

class ConsultarCuentaUsuarioController extends Controller{

    // 20210213 iniciar sesion
    public function iniciarSesion() {
        $objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $service = new ConsultarCuentaUsuarioServiceImpl();
            $jsonDatos = json_decode($_POST['datos']);
            $objResponse = $service->validarUsuarioCli($jsonDatos);
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
        echo json_encode($objResponse);
        exit();
    }

    // 20240416: validar suscipcion
	public function validarFormNuevoUsuario() {
        $objResponse = new stdClass();
		if($_POST['datos']){ // si existe
            $datos = json_decode($_POST['datos']);
            if($datos->nick == null){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "no se ha enviado el nick";
                $objResponse->val = false;
            }else if($datos->nick != null && strlen($datos->nick) < 5){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "El nick debe tener como m&iacute;nimo 5 caracteres";
                $objResponse->val = false;
            }else if($datos->email == null){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "no se ha enviado el correo electr&oacute;nico";
                $objResponse->val = false;
            }else if($datos->numCel != null && strlen($datos->numCel) < 9){
                $objResponse->tip = "A";
                $objResponse->msj = "El n&uacute;mero de celular debe tener 9 d&iacute;gitos";
                $objResponse->val = false;
            }else if($datos->password == null){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "Debe ingresar una contraseña";
                $objResponse->val = false;
            }else if($datos->password != null && strlen($datos->password) < 6){
                $objResponse->tip = "A"; // Advertencia
                $objResponse->msj = "La contraseña debe tener como m&iacute;nimo 6 caracteres";
                $objResponse->val = false;
            }else {
                $objResponse->tip = "I"; // Info
                $objResponse->msj = "se valido correctamente";
                $objResponse->val = true;
            }
        }else{
            $objResponse->tip = "E"; // Error
            $objResponse->msj = "Error: no se encontraron datos a validar";
            $objResponse->val = false;
        }
		echo json_encode($objResponse);
		exit();
	}


}

?>
