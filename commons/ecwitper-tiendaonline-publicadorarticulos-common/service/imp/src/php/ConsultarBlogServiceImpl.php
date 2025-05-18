<?php

require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/service/ifz/src/php/ConsultarBlogService.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/imp/src/php/SqlMapPostDAO.php';

class ConsultarBlogServiceImpl implements ConsultarBlogService {

	public function obtenerUltimasPublicaciones() {
		try{
			$sqlMapPostDAO = new SqlMapPostDAO();
			$data = $sqlMapPostDAO->selectLastPost();
			if($data != null && count($data) > 0){
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

	public function buscarPostById($dataRequest) {
		try{
			$sqlMapPostDAO = new SqlMapPostDAO();
			$data = $sqlMapPostDAO->selectPostById($dataRequest);
			$data = $data[0];
			if($data != null && count($data) > 0){
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

	public function buscarComentariosPostById($dataRequest) {
		try{
			$sqlMapPostDAO = new SqlMapPostDAO();
			$data = $sqlMapPostDAO->selectComentPostById($dataRequest);
			if($data != null && count($data) > 0){
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
