<?php

require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/service/ifz/src/php/ConsultarMenuService.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/dao/imp/src/php/SqlMapCabMenuDAO.php';

class ConsultarMenuServiceImpl implements ConsultarMenuService{
   	// 20210503 Cargar menú principal
   	public function cargarMenuPrincipal($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListCabMenu($dataRequest);
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

   	// 20210504 Cargar menú lateral
   	public function obtenerMenuLateral($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListMenu($dataRequest);
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

   	// 20210504 Obtener opciones de menú lateral
   	public function obtenerOpcionMenuLateral($dataRequest) {
		try{
			$sqlMapCabMenuDAO = new SqlMapCabMenuDAO();
			$data = $sqlMapCabMenuDAO->selectListOpMenu($dataRequest);
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
