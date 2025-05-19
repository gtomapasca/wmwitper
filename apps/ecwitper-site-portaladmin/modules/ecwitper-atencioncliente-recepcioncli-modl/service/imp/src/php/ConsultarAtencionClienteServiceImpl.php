<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/service/ifz/src/php/ConsultarAtencionClienteService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/imp/src/php/SqlMapSuscriptorDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/imp/src/php/SqlMapBuzonDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/imp/src/php/SqlMapLibroReclamoDAO.php';

class ConsultarAtencionClienteServiceImpl implements ConsultarAtencionClienteService{

   	// 20210524: Obtener lista de suscriptores
   	public function obtenerListaSuscriptores() {
		try{
			$sqlMapSuscriptorDAO = new SqlMapSuscriptorDAO();
			$data = $sqlMapSuscriptorDAO->obtenerListaSuscriptores();
			if(count($data) > 0){
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

   	// 20210524: Obtener lista de contactos
   	public function obtenerListaContactos() {
		try{
			$sqlMapBuzonDAO = new SqlMapBuzonDAO();
			$data = $sqlMapBuzonDAO->obtenerListaContactos();
			if(count($data) > 0){
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

   	// 20210524: Obtener lista de libro reclamos
   	public function obtenerListaLibroReclamos() {
		try{
			$sqlMapLibroReclamoDAO = new SqlMapLibroReclamoDAO();
			$data = $sqlMapLibroReclamoDAO->obtenerListaLibroReclamos();
			if(count($data) > 0){
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
