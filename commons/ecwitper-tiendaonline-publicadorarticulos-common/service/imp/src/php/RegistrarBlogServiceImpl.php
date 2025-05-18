<?php

require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/ifz/src/php/RegistrarBlogService.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/imp/src/php/SqlMapPostDAO.php';

class RegistrarBlogServiceImpl implements RegistrarBlogService{

   public function registrarComentarioPost($dataRequest) {
	try{
	    $sqlMapPostDAO = new SqlMapPostDAO();
	    $sqlMapPostDAO->insertComentPost($dataRequest);
	    $dataResponse["mensaje"] = "Se registro correctamente";
	    $dataResponse["encontrado"] = true;
	    $dataResponse["datos"] = $dataRequest;
	    return $dataResponse;
	}catch (Exception $e) {
	    $dataResponse["encontrado"] = false;
	    $dataResponse["mensaje"] = "Error " . $e->getMessage();
	    $dataResponse["datos"] = null;
	    return $dataResponse;
	}
   }


}

?>
