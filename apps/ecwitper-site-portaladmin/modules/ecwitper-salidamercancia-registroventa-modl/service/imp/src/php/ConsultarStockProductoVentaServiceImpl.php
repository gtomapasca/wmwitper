<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/ifz/src/php/ConsultarStockProductoVentaService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapProductoTiendaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapFabricanteDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapTipoCategoriaProductoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapCategoriaProductoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapSubCategoriaProductoDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapEspecificacionProductoDAO.php';

class ConsultarStockProductoVentaServiceImpl implements ConsultarStockProductoVentaService{

    // 20210524: Obtener lista de productos
    public function obtenerListaProductosTienda($dataRequest) {
        try{
            $sqlMapProductoTiendaDAO = new SqlMapProductoTiendaDAO();
            $data = $sqlMapProductoTiendaDAO->obtenerListaProductosTienda($dataRequest);
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

    // 20211229: Obtener lista de fabricantes
	public function obtenerListaFabricantes() {
		try{
			$sqlMapFabricanteDAO = new SqlMapFabricanteDAO();
			$data = $sqlMapFabricanteDAO->selectListaFabricantes();
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

	// 20220729: Obtener lista de tipo categoria productos
	public function obtenerListaTipoCategoriaProd() {
		try{
			$sqlMapTipoCategoriaProductoDAO = new SqlMapTipoCategoriaProductoDAO();
			$data = $sqlMapTipoCategoriaProductoDAO->selectListaTipoCategoriaProd();
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
	/*
	// 20211230: Obtener lista de categoria productos
	public function obtenerListaCategoriaProd() {
		try{
			$sqlMapCategoriaProductoDAO = new SqlMapCategoriaProductoDAO();
			$data = $sqlMapCategoriaProductoDAO->selectListaCategoriaProd();
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
	}*/

	// 20220814: Obtener lista de categoria productos por tipo categoria
	public function obtenerListaCategoriaByTipoCat($dataRequest) {
		try{
			$sqlMapCategoriaProductoDAO = new SqlMapCategoriaProductoDAO();
			$data = $sqlMapCategoriaProductoDAO->selectListaCategoriaByTipoCat($dataRequest);
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
	/*
	// 20220729: Obtener lista de sub categoria productos
	public function obtenerListaSubCategoriaProd() {
		try{
			$sqlMapSubCategoriaProductoDAO = new SqlMapSubCategoriaProductoDAO();
			$data = $sqlMapSubCategoriaProductoDAO->selectListaSubCategoriaProd();
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
	*/
	// 20220729: Obtener lista de sub categoria productos por codigo categoria
	public function obtenerListaSubCategoriaByCodCat($dataRequest) {
		try{
			$sqlMapSubCategoriaProductoDAO = new SqlMapSubCategoriaProductoDAO();
			$data = $sqlMapSubCategoriaProductoDAO->selectListaSubCategoriaByCodCat($dataRequest);
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
	
    // 20220505: obtener tabla de especificacion de producto
	public function obtenerEspecificacionDeProducto($dataRequest) {
		try{
			$sqlMapEspecificacionProductoDAO = new SqlMapEspecificacionProductoDAO();
			$data = $sqlMapEspecificacionProductoDAO->selectEspecificacionDeProducto($dataRequest);
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
