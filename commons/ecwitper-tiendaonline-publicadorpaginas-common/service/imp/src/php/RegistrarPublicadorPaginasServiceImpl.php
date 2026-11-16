<?php

require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/service/ifz/src/php/RegistrarPublicadorPaginasService.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/imp/src/php/SqlMapSuscripcionDAO.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/imp/src/php/SqlMapBuzonDAO.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/imp/src/php/SqlMapLibroReclamoDAO.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/imp/src/php/SqlMapAvisoDAO.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/model/src/php/Aviso.php';
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/model/src/php/Suscripcion.php';

class RegistrarPublicadorPaginasServiceImpl implements RegistrarPublicadorPaginasService{

	public function registrarSuscripcionMail($jsonParams) {
		$objRespuesta = new stdClass();
		try{			
			$jsonParams->ruc_negocio = RUC_NEGOCIO;
			$sqlMapSuscripcionDAO = new SqlMapSuscripcionDAO();
			$sqlMapSuscripcionDAO->insertSuscripcion($jsonParams);
			$objRespuesta->tip = "I"; // Info
			$objRespuesta->msj = "Se grabo la suscripción";
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

	public function registrarContacto($jsonParams) {
		$objRespuesta = new stdClass();
		try{
			$jsonParams->ruc_negocio = RUC_NEGOCIO;
			$sqlMapBuzonDAO = new SqlMapBuzonDAO();
			$sqlMapBuzonDAO->insertBuzon($jsonParams);
			$objRespuesta->tip = "I"; // Información
			$objRespuesta->msj = "se registro correctamente";
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

	public function registrarReclamo($jsonParams) {
		$objRespuesta = new stdClass();
		try{
			$fechaEntera = time();
			$anio = date("Y", $fechaEntera);
			//$mes = date("m", $fechaEntera);
			//$dia = date("d", $fechaEntera);
			$numCorrelativo = rand(1,999);

			$jsonParams->ruc_negocio = RUC_NEGOCIO;
			$num_reclamo = $anio . $numCorrelativo;
			//$dataRequest["num_reclamo"] = $num_reclamo;
			$jsonParams->numReclamo = $num_reclamo;

			$sqlMapLibroReclamoDAO = new SqlMapLibroReclamoDAO();
			$sqlMapLibroReclamoDAO->insertReclamo($jsonParams);

			$this->registrarAviso($jsonParams);
			// registrar en aviso
			/*$nomUsuario = $jsonParams->nombCliente;
			$destinatario = $jsonParams->email;
			$motivo = $jsonParams->descMotivo;
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
			$sqlMapAvisoDAO->insertAviso($paramsAviso);*/

			$objRespuesta->tip = "I"; // Información
			$objRespuesta->msj = "se registro correctamente";
			$objRespuesta->data = $num_reclamo;
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}

	public function registrarAviso($jsonParams) {
		$objRespuesta = new stdClass();
		try{
			// registrar en aviso
			$num_reclamo = $jsonParams->numReclamo;
			$nomUsuario = $jsonParams->nombCliente;
			$destinatario = $jsonParams->email;
			$motivo = $jsonParams->descMotivo;
			$sec_aviso = 1002003035;
			$servicio = "101";
			$tipoAviso = "01";
			$estado = "0"; // 0: pendiente de envio, 1: enviado correctamente, 8: error de envío
			$remitente = "noreply@compuchiclayo.com";
			$asunto = "NOTIFICACIÓN DE REGISTRO DE RECLAMO";
			$mensaje = "Estimado Cliente. Hemos recibido su reclamo conforme. Guarde su n&uacute;mero de reclamo: " . $num_reclamo . " para el seguimiento correspondiente.";
			$plantilla = "10010";
			$descAviso = array('name' => $nomUsuario, 'email' => $destinatario, 'message' => $mensaje);
			$sqlMapAvisoDAO = new SqlMapAvisoDAO();
			$paramsAviso = new Aviso();
			$paramsAviso->set_num_secaviso($sec_aviso);
			$paramsAviso->set_num_asocaviso($num_reclamo);
			$paramsAviso->set_num_servicio($servicio);
			$paramsAviso->set_nom_plantilla($plantilla);
			$paramsAviso->set_cod_tipaviso($tipoAviso);
			$paramsAviso->set_remitente($remitente);
			$paramsAviso->set_destinatario($destinatario);
			$paramsAviso->set_des_aviso(json_encode($descAviso));
			$paramsAviso->set_estado($estado);
			$sqlMapAvisoDAO->insertAviso($paramsAviso);

			$objRespuesta->tip = "I"; // Información
			$objRespuesta->msj = "se registro aviso correctamente";
			//$objRespuesta->data = $num_reclamo;
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
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
			//$plantilla = $dataAviso["nom_plantilla"];
			$numReclamo = $dataAviso["num_asocaviso"];
			$descAviso = $dataAviso["des_aviso"];
			$codEstado = "0"; // 0: Pendiente de envío
			//$avisoCcix = '{"name":"Aviso Libro de Reclamos","email":"compuchiclayo@gmail.com","message":"Se ha registrado nuevo reclamo: ' . $numReclamo . '."}';
			$nomUsuario = "Aviso Libro de Reclamaciones";
			$destinatario = "compuchiclayo@gmail.com";
			$mensaje = "Se ha registrado nuevo reclamo: " . $numReclamo;
			$descAvisoCcix = array('name' => $nomUsuario, 'email' => $destinatario, 'message' => $mensaje);
			if($descAviso){
				// Enviar aviso a cliente
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, "https://i84053t3wg.execute-api.us-east-1.amazonaws.com/api/aviso");
				curl_setopt($curl, CURLOPT_POST, true);
				// aviso cliente
				curl_setopt($curl, CURLOPT_POSTFIELDS, $descAviso);
				$rptEnvio = curl_exec($curl);
				// aviso Compuchiclayo
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($descAvisoCcix));
				$rptEnvio = curl_exec($curl);
				$errEnvio = curl_error($curl);
				curl_close($curl);
				
				if($errEnvio){
					$codEstado = "8";	// Error de envío
				}else{
					$codEstado = "1"; // Enviado correctamente
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
