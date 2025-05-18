<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/ifz/src/php/RegistrarStockProductoVentaService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapProductoTiendaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapEspecificacionProductoDAO.php';

class RegistrarStockProductoVentaServiceImpl implements RegistrarStockProductoVentaService{
    
	// 20210528 Registrar nuevo producto tienda
    public function registrarNuevoProductoTienda($dataRequest) {
        try{
            $sqlMapProductoTiendaDAO = new SqlMapProductoTiendaDAO();
            $sqlMapProductoTiendaDAO->insertProductoTienda($dataRequest);
            $dataResponse["encontrado"] = true;
            $dataResponse["mensaje"] 	= "Se registro correctamente";
            //$dataResponse["data"] = $data;
            return $dataResponse;
        }catch (Exception $e) {
            $dataResponse["encontrado"] = false;
            $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
            $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
            return $dataResponse;
        }
    }
    
    // 20210529 modificar producto tienda
    public function modificarProductoTienda($dataRequest) {
        try{
            $sqlMapProductoTiendaDAO = new SqlMapProductoTiendaDAO();
            $sqlMapProductoTiendaDAO->updateProductoTienda($dataRequest);
            $dataResponse["encontrado"] = true;
            $dataResponse["mensaje"] 	= "Se actualizo correctamente";
            //$dataResponse["data"] = $data;
            return $dataResponse;
        }catch (Exception $e) {
            $dataResponse["encontrado"] = false;
            $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
            $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
            return $dataResponse;
        }
    }
    
    // 20220506 Registrar especificacion producto
    public function registrarEspecificacionProducto($dataRequest) {
        try{
            $dao = new SqlMapEspecificacionProductoDAO();
            $dao->insertEspecificacionProducto($dataRequest);
            $dataResponse["encontrado"] = true;
            $dataResponse["mensaje"] 	= "Se registro correctamente";
            //$dataResponse["data"] = $data;
            return $dataResponse;
        }catch (Exception $e) {
            $dataResponse["encontrado"] = false;
            $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
            $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
            return $dataResponse;
        }
    }
    
    // 20220515 Modificar especificacion producto
    public function modificarEspecificacionProducto($dataRequest) {
        try{
            $dao = new SqlMapEspecificacionProductoDAO();
            $dao->updateEspecificacionProducto($dataRequest);
            $dataResponse["encontrado"] = true;
            $dataResponse["mensaje"] 	= "Se actualizo correctamente";
            //$dataResponse["data"] = $data;
            return $dataResponse;
        }catch (Exception $e) {
            $dataResponse["encontrado"] = false;
            $dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
            $dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
            return $dataResponse;
        }
    }
    

}

?>
