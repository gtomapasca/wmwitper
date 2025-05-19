<?php
// ----------------------------------------------------------------------------
// Copyright 2019, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase Usuario:
//  - SqlMap a la tabla producto
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/ProductoTienda.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/GaleriaProductoTienda.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/GaleriaProductoTIendaDAO.php';

/* Clase SqlMapGaleriaProductoTiendaDAO */
class SqlMapGaleriaProductoTiendaDAO implements GaleriaProductoTIendaDAO{
    
    // 20210804 GTP: actualizar imagen producto
    public function updateImagenProductoTienda($dataRequest){
		$codProducto 	= $dataRequest["codProducto"];
		$rutaSubidaImg 	= $dataRequest["rutaSubidaImg"];
		$nombreCarpeta 	= $dataRequest["nombreCarpeta"];
		$nombreImagen 	= $dataRequest["nombreImagen"];
		$rutaTotalImg 	= $dataRequest["rutaTotalImg"];
		$sql  = "update wip_producto_tienda set codusu_act = USER(), fecha_act = NOW(), nom_img = ?, dir_img = ?, ruta_img = ?, imagen_lg = ? "
				." where cod_producto = ?";
		$data = array('sssss', "{$nombreImagen}", "{$nombreCarpeta}", "{$rutaSubidaImg}", "{$rutaTotalImg}", "{$codProducto}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
	}

	// 20210804 GTP: obtener ruta de imagen de producto tienda
	public function selectImagenProductoTienda($dataRequest){
		$productoTienda = new ProductoTienda();
		$codProd = $dataRequest["codProducto"];
		$sql  = "select cod_producto, nom_img, dir_img from wip_producto_tienda where cod_producto = ? and del = 0 ";
		$data = array('s', "{$codProd}");
		$fields = $productoTienda->toArrayImagenProductoTienda();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	//----------------------------------------------------------------------------------
	//----------------------------------------------------------------------------------

	// 20220522 degui: registra en la galería de imagenes del producto
	public function insertGaleriaImagenProducto($dataRequest){
		$codProd 	= $dataRequest["cod_producto"];
		$codItem 	= $dataRequest["cod_item"];
		$numOrden 	= $dataRequest["num_orden"];
		$nombre 	= $dataRequest["nombre"];
		//$descrip 	= $dataRequest["descripcion"];
		$dirImg 	= $dataRequest["dir_imagen"];
		$formato 	= $dataRequest["extension"];
		$estado 	= $dataRequest["estado"];
		$rutaImg 	= $dataRequest["rutaImgagen"];
		//$sql  = "insert into wip_galeria_producto_tienda (cod_producto, ruta, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		//		." values(?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$sql  = "insert into wip_galeria_producto_tienda (cod_producto, fecha_creacion, num_orden, cod_item, nombre, "
				." dir_img, formato, ruta, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				." values(?, NOW(), ?, ?, ?, ?, ?, ?, ?, 0, USER(), USER(), NOW(), NOW())";
		$data = array('sissssss', "{$codProd}", "{$numOrden}", "{$codItem}", "{$nombre}", "{$dirImg}", "{$formato}", "{$rutaImg}", "{$estado}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	// 20220522 degui: obtener galería de imagenes productos
	public function selectGaleriaImagenProducto($dataRequest){
		$obj = new GaleriaProductoTienda();
		$codProd = $dataRequest["codProducto"];
		$sql  = "select id_galeria, cod_producto, fecha_creacion, num_orden, cod_item, nombre, dir_img, ruta, formato, dimensiones, estado, fecha_act "
				." from wip_galeria_producto_tienda where cod_producto = ? and del = 0 order by num_orden asc";
		$data = array('s', "{$codProd}");
		$fields = $obj->toArrayGaleriaProd();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
	}

	// 20220525 degui: modificar imagene del producto
	public function updateGaleriaImagenProducto($dataRequest) {
		$idGaleria 	= $dataRequest["id_galeria"];
		$codProd 	= $dataRequest["cod_producto"];
		$codItem 	= $dataRequest["cod_item"];
		$numOrden 	= $dataRequest["num_orden"];
		$nombre 	= $dataRequest["nombre"];
		//$descrip 	= $dataRequest["descripcion"];
		$dirImg 	= $dataRequest["dirImagen"];
		$formato 	= $dataRequest["extension"];
		$estado 	= $dataRequest["estado"];
		$rutaImg 	= $dataRequest["rutaImgagen"];
		if($rutaImg != ''){
			$sql  = "update wip_galeria_producto_tienda set num_orden = ?, cod_item = ?, nombre = ?, dir_img = ?, formato = ?, "
					." ruta = ?, estado = ?, del = 0, codusu_act = USER(), fecha_act = NOW() "
					." where id_galeria = ? and cod_producto = ? ";
			$data = array('issssssss', "{$numOrden}", "{$codItem}", "{$nombre}", "{$dirImg}", "{$formato}", "{$rutaImg}", "{$estado}", "{$idGaleria}", "{$codProd}");
		}else{
			$sql  = "update wip_galeria_producto_tienda set num_orden = ?, nombre = ?, dir_img = ?, "
					." estado = ?, del = 0, codusu_act = USER(), fecha_act = NOW() "
					." where id_galeria = ? and cod_producto = ? ";
			$data = array('isssss', "{$numOrden}", "{$nombre}", "{$dirImg}", "{$estado}", "{$idGaleria}", "{$codProd}");
		}
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
