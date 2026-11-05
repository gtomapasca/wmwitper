<?php

require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/ifz/src/php/RegistrarBlogService.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/imp/src/php/SqlMapPostDAO.php';

class RegistrarBlogServiceImpl implements RegistrarBlogService{

   // 20261021 registra comentario de publicacion
   public function registrarComentarioPost($jsonParams) {
		$objRespuesta = new stdClass();
		try{			
			$sqlMapPostDAO = new SqlMapPostDAO();
			$sqlMapPostDAO->insertComentPost($jsonParams);
			$objRespuesta->tip = "I"; // Info
			$objRespuesta->msj = "Comentario creado correctamente";
			$objRespuesta->val = true;
			return $objRespuesta;
		}catch (Exception $e) {
			$objRespuesta->tip = "E"; // Error
			$objRespuesta->msj = "(" . $e->getCode() .") ". $e->getMessage();
			$objRespuesta->val = false;
			return $objRespuesta;
		}
	}


}

?>
