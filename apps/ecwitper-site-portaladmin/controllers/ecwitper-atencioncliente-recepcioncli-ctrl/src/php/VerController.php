<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

class VerController extends Controller {

   	function menu() {
		$dataRequest["page"] = $_GET["page"] != null ? $_GET["page"] : 'Error';
		if($dataRequest["page"] == "Error"){
			//echo "Cargar página Error!!";
		}else{
			$dataResponse = $this->cargarPaginaSel($dataRequest);
			echo json_encode($dataResponse);
			exit();
		}
		
   	}

	function cargarPaginaSel($dataRequest) {
		$file = "";
		$dicc = array();	// diccionario
		$page = $dataRequest["page"];
		$dicc[SITEADM_PATH_TAG_LARGE] = SITEADM_PATH_DIR_LARGE;

		if($page == SITEADM_ID_FRM_REGISTRAR_SUSCRIPTOR){	
			$file = SITEADM_PATH_FRM_REGISTRAR_SUSCRIPTOR;
		}else if($page == SITEADM_ID_FRM_REGISTRAR_CONTACTO){	
			$file = SITEADM_PATH_FRM_REGISTRAR_CONTACTO;
		}else if($page == SITEADM_ID_FRM_ATENDER_LIBRO_RECLAMO){	
			$file = SITEADM_PATH_FRM_ATENDER_LIBRO_RECLAMO;
		}

		// rederizar paginas
		$html = file_get_contents($file);
		$tmpl = new Template($html);
		$datahtm = $tmpl->render($dicc);
		// preparar datos a retornar
		if($datahtm){
		   $dataResponse["encontrado"] = true;
	    	   $dataResponse["mensaje"] = "encontrado";
	    	   $dataResponse["datos"] = $datahtm;
		}else{
		   $dataResponse["encontrado"] = false;
	    	   $dataResponse["mensaje"] = "no encontrado";
	    	   $dataResponse["datos"] = '';
		}
		return $dataResponse;
	}

}

?>
