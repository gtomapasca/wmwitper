<?php

require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/service/ifz/src/php/RegistrarPrincipalService.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/imp/src/php/SqlMapSuscripcionDAO.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/imp/src/php/SqlMapBuzonDAO.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/imp/src/php/SqlMapLibroReclamoDAO.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/imp/src/php/SqlMapAvisoDAO.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/model/src/php/Aviso.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/model/src/php/Suscripcion.php';

class RegistrarPrincipalServiceImpl implements RegistrarPrincipalService{
  
	/*public function registrarSuscripcion($email) {
		try{
			$sqlMapSuscripcionDAO = new SqlMapSuscripcionDAO();
			$sqlMapSuscripcionDAO->insertSuscripcion($email);
			$dataResponse["msj"] = "todo bien";
			$dataResponse["encontrado"] = true;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["msj"] = "Error " . $e->getMessage();
			return $dataResponse;
		}
	}*/

	public function registrarSuscripcion($objParams) {
		try{
			$sqlMapSuscripcionDAO = new SqlMapSuscripcionDAO();
			$sqlMapSuscripcionDAO->insertSuscripcion($email);
			$dataResponse["msj"] = "todo bien";
			$dataResponse["encontrado"] = true;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["msj"] = "Error " . $e->getMessage();
			return $dataResponse;
		}
	}

	public function validarContacto($dataRequest) {
		try{
			$sqlMapBuzonDAO = new SqlMapBuzonDAO();
			$sqlMapBuzonDAO->insertBuzon($dataRequest);
			$dataResponse["msj"] = "todo bien";
			$dataResponse["encontrado"] = true;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["msj"] = "Error " . $e->getMessage();
			return $dataResponse;
		}

		
	}

	public function registrarContacto($dataRequest) {
		try{
			$sqlMapBuzonDAO = new SqlMapBuzonDAO();
			$sqlMapBuzonDAO->insertBuzon($dataRequest);
			$dataResponse["tipo"] = "I"; // Información
			$dataResponse["msj"] = "se registro correctamente";
			$dataResponse["exito"] = true;

			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["tipo"] = "E"; // Error
			$dataResponse["msj"] = "Error " . $e->getMessage();
			$dataResponse["exito"] = false;
			return $dataResponse;
		}
	}

	public function validarReclamo($dataRequest) {
		try{
			//$sqlMapLibroReclamoDAO = new SqlMapLibroReclamoDAO();
			//$sqlMapLibroReclamoDAO->insertReclamo($dataRequest);
			$tip_docu = $dataRequest["tip_docu"];
			$num_docu = $dataRequest["num_docu"];
			$usu_nomb = $dataRequest["usu_nomb"];
			$usu_celu = $dataRequest["usu_celu"];
			$usu_mail = $dataRequest["usu_mail"];
			$usu_depa = $dataRequest["usu_depa"];
			$usu_prov = $dataRequest["usu_prov"];
			$usu_dist = $dataRequest["usu_dist"];
			$usu_domi = $dataRequest["usu_domi"];
			$tip_moti = $dataRequest["tip_moti"];
			$comp_tip = $dataRequest["comp_tip"];
			$comp_nro = $dataRequest["comp_nro"];
			$comp_fec = $dataRequest["comp_fec"];
			$prod_cod = $dataRequest["prod_cod"];
			$prod_des = $dataRequest["prod_des"];
			$prod_can = $dataRequest["prod_can"];
			$prod_pre = $dataRequest["prod_pre"];
			$des_moti = $dataRequest["des_moti"];

			if($tip_docu == "" ){
				$dataResponse["tipo"] = "A"; // Advertencia
				$dataResponse["msj"] = "no se ha enviado el tipo de documento";
				$dataResponse["exito"] = false;
			}else{
				$dataResponse["tipo"] = "I"; // Información
				$dataResponse["msj"] = "se valido correctamente";
				$dataResponse["exito"] = true;
			}

			//$dataResponse["datos"] = $data;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["tipo"] = "E"; // Error
			$dataResponse["msj"] = "Error " . $e->getMessage();
			$dataResponse["exito"] = false;
			return $dataResponse;
		}
	}

	public function registrarReclamo($dataRequest) {
		try{
			$fechaEntera = time();
			$anio = date("Y", $fechaEntera);
			//$mes = date("m", $fechaEntera);
			//$dia = date("d", $fechaEntera);
			$numCorrelativo = rand(1,999);

			$num_reclamo = $anio . $numCorrelativo;
			$dataRequest["num_reclamo"] = $num_reclamo;

			$sqlMapLibroReclamoDAO = new SqlMapLibroReclamoDAO();
			$sqlMapLibroReclamoDAO->insertReclamo($dataRequest);

			// registrar en aviso
			$nomUsuario = $dataRequest["usu_nomb"];
			$destinatario = $dataRequest["usu_mail"];
			$motivo = $dataRequest["des_moti"];
			$asunto = "NOTIFICACIÓN DE REGISTRO DE RECLAMO";
			$mensaje = "Estimado Cliente. Hemos recibido su reclamo conforme. Guarde su n&uacute;mero de reclamo: " . $num_reclamo . " para el seguimiento correspondiente.";
			$plantilla = "10010";
			$descAviso = array('name' => $nomUsuario, 'email' => $destinatario, 'message' => $mensaje);
			$sqlMapAvisoDAO = new SqlMapAvisoDAO();
			$paramsAviso = new Aviso();
			$paramsAviso->set_num_secaviso(1002003034);
			$paramsAviso->set_num_asocaviso($num_reclamo);
			$paramsAviso->set_num_servicio("777");
			$paramsAviso->set_nom_plantilla($plantilla);
			$paramsAviso->set_cod_tipaviso("01");
			$paramsAviso->set_remitente("noreply@compuchiclayo.com");
			$paramsAviso->set_destinatario($destinatario);
			$paramsAviso->set_des_aviso(json_encode($descAviso));
			$paramsAviso->set_estado("0");

			$sqlMapAvisoDAO->insertAviso($paramsAviso);
			// enviar aviso
			//$this->enviarAvisoReclamo($paramsAviso);

			$dataResponse["tipo"] = "I"; // Información
			$dataResponse["msj"] = "se registro correctamente";
			$dataResponse["data"] = $num_reclamo;
			$dataResponse["exito"] = true;
			//$dataResponse["datos"] = $data;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["tipo"] = "E"; // Error
			$dataResponse["msj"] = "Error " . $e->getMessage();
			$dataResponse["exito"] = false;
			return $dataResponse;
		}
	}

	public function enviarAvisoReclamo($numAvisoAsoc) {		
		// consultar aviso
		$paramsAviso = new Aviso();
		$sqlMapAvisoDAO = new SqlMapAvisoDAO();
		$paramsAviso->set_num_asocaviso($numAvisoAsoc);
		$data = $sqlMapAvisoDAO->selectAvisoByPK($paramsAviso);
		$dataAviso = $data[0];

		if($dataAviso){
			// Enviar correo electrónico
			$plantilla = $dataAviso["nom_plantilla"];
			$descAviso = $dataAviso["des_aviso"];
			//$arrayDesAviso = json_decode($descAviso);
			$codEstado = "1"; // Enviado correctamente
			if($descAviso){
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, "https://i84053t3wg.execute-api.us-east-1.amazonaws.com/api/aviso");
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $descAviso);
				$rptEnvio = curl_exec($curl);
				$errEnvio = curl_error($curl);
				curl_close($curl);
				
				if($errEnvio){
					$codEstado = "8";	// Error de envío
				}
			}else{
				$codEstado = "8";	// Error de envío
			}
			// actualizar aviso
			$paramsAviso->set_rpt_aviso(json_encode($rptEnvio));
			$paramsAviso->set_err_aviso(json_encode($errEnvio));
			$paramsAviso->set_estado($codEstado);
			$sqlMapAvisoDAO->updateAvisoByPK($paramsAviso);

		}else{
			$paramsAviso->set_estado("8");
			$paramsAviso->set_err_aviso("Error:RegistrarPrincipalServiceImpl->enviarAvisoReclamo()");
			$sqlMapAvisoDAO->updateAvisoByPK($paramsAviso);
		}

	}

}

?>
