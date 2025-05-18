<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/ifz/src/php/ConsultarClientesService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapClienteDAO.php';

class ConsultarClientesServiceImpl implements ConsultarClientesService{

    // 20210524: Obtener lista de clientes
    public function obtenerListaClientes() {
        try{
            $sqlMapClienteDAO = new SqlMapClienteDAO();
            $data = $sqlMapClienteDAO->listarClientesAll();
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
