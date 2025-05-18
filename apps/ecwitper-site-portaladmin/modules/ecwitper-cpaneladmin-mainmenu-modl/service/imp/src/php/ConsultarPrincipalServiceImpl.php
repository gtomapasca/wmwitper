<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-cpaneladmin-mainmenu-modl/service/ifz/src/php/ConsultarPrincipalService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-cpaneladmin-mainmenu-modl/dao/imp/src/php/SqlMapProgramaDAO.php';

class ConsultarPrincipalServiceImpl implements ConsultarPrincipalService{
    // 20210505 obtener pagina id
    public function obtenerPaginaId($dataRequest) {
        try{
            $sqlMapProgramaDAO = new SqlMapProgramaDAO();
            $data = $sqlMapProgramaDAO->selectProgramaByCod($dataRequest);
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
