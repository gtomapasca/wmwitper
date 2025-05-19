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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/ProductoTiendaDAO.php';

/* Clase SqlMapProductoTiendaDAO */
class SqlMapProductoTiendaDAO implements ProductoTiendaDAO{
    // 20191209 GTP: obtener lista de productos tienda
    public function obtenerListaProductosTienda($dataRequest){
		$productoTienda = new ProductoTienda();
		//$fecIniBusq = $dataRequest["fecIniBusq"];
		//$fecFinBusq = $dataRequest["fecFinBusq"];
		$n = 0;
		$ordenar = $dataRequest["ordenar"];
		$where = " where pt.del = 0 ";
		foreach($dataRequest as $clave=>$valor){
			$encontrado = false;
			//if($valor != ''){
				//$data[0] .= "s"; 
				if($clave == "fecIniBusq" || $clave == "fecFinBusq"){
					$encontrado = true;
					if($clave == "fecFinBusq"){
						$data[0] .= "ss"; 
						$data[++$n] = $dataRequest["fecIniBusq"] . ' 23:59:59';
						$data[++$n] = $dataRequest["fecFinBusq"] . ' 23:59:59';
						$where .= (" and pt.fecha_act between ? and ? ");
						
					}
				}
				else if($clave == "producto" && $valor){
					$data[0] .= "s"; 
					$data[++$n] = "%" . "{$valor}" . "%";
					$where .= (" and pt." . $clave . " like ? ");
					$encontrado = true;
				}
				// producto ingreso a almacen
				else if($clave == "isProdAlm"){
					if($valor){
						$data[0] .= "s"; 
						$data[++$n] = "1";
						$where .= (" and pt.almacen_ind = ? ");
					}else{
						$data[0] .= "s"; 
						$data[++$n] = "0";
						$where .= (" and pt.almacen_ind = ? ");
					}
					$encontrado = true;
				}
				// vigencia de producto para reposicion
				/*else if($clave == "isActivoAlm"){
					if($valor){
						//$data[0] .= "s"; 
						//$data[++$n] = "1";
						$where .= (" and pt.almacen_del = 1 ");
					}
					$encontrado = true;
				}*/
				// stock de producto
				else if($clave == "isStockAlm"){
					if($valor){
						$data[0] .= "s"; 
						$data[++$n] = "0";
						$where .= (" and pt.almacen_stock > ? ");
					}else{
						$data[0] .= "s"; 
						$data[++$n] = "0";
						$where .= (" and pt.almacen_stock = ? ");
					}
					$encontrado = true;
				}
				else if($clave == "isDestacado"){
					if($valor){
						//$data[0] .= "s"; 
						//$data[++$n] = "1";
						$where .= (" and pt.destacado_ind = 1 ");
					}
					$encontrado = true;
				}
				else if($clave == "isDescuento"){
					if($valor){
						$data[0] .= "s"; 
						$ahora = date("Y-m-d H:i:s");
						$data[++$n] = $ahora;
						$where .= (" and ? between pt.descuento_fecini and pt.descuento_fecfin ");
					}
					$encontrado = true;
				}
				else if($clave == "ordenar"){
					$encontrado = true;
				}
				else{
					if(!$encontrado && $valor != ''){
						$data[0] .= "s"; 
						$data[++$n] = "{$valor}";
						$where .= (" and pt." . $clave . " = ? ");
					}
				}
			//}
		}

		$sql  = "select pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_tipcategoria, pt.cod_categoria, pt.cod_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				.", pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.key_word, pt.precio_compra_final, precio_venta_normal, pt.precio_venta_internet "
				.", pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				.", pt.stock, pt.cant_items, pt.puntaje, pt.almacen_ind, pt.almacen_stock, pt.almacen_est, pt.almacen_del, pt.estado, pt.estado_prod, pt.public_est, pt.fecha_reg, pt.fecha_act "
				.", NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from wip_producto_tienda pt "
				." inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante ";
		$sql .= $where;
		if($ordenar != ""){
			$sql .= $ordenar;
		}
		$fields = $productoTienda->toArrayProductoTienda();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }

    // 20210529 Degui: Registrar nuevo producto tienda
    public function insertProductoTienda($dataRequest){
		$nomProd  	= $dataRequest["nomProd"];
		$ind_especifi = 0; // 0: pendiente de publicar especificación
		$ind_galeria = 0;  // 0: pendiente de publicar galeria
		$codTipCateg 	= $dataRequest["codTipCateg"];
		$codCateg 		= $dataRequest["codCateg"];
		$codSubCateg 	= $dataRequest["codSubCateg"];
		$codMarca 	= $dataRequest["codMarca"];
		$codEstad 	= $dataRequest["codEstad"];
		//----------------------------------------
		// código producto: PDT202108942872
		// mínimo código: 942872
		$anio = date("Y");
		$mes = date("m");
		$aleatorio = mt_rand(1,999999);
		$miniCod = str_pad($aleatorio, 6, "0");
		//$codProd = "PDT". str_pad($miniCod, 12, "0", STR_PAD_LEFT);
		$codProd = "PDT".$anio.$mes.$miniCod;
		//----------------------------------------	
		$sql  = "insert into wip_producto_tienda (cod_producto, mini_codigo, cod_fabricante, cod_tipcategoria, cod_categoria, cod_subcategoria, "
				."	producto, ind_especificaciones, ind_galeriaImagenes, estado_prod, "
				."	stock, "
				."  del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				." values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('ssssssssss', "{$codProd}", "{$miniCod}", "{$codMarca}", "{$codTipCateg}", "{$codCateg}", "{$codSubCateg}",
				"{$nomProd}", "{$ind_especifi}", "{$ind_galeria}", "{$codEstad}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20210529 GTP: Modificar producto tienda
    public function updateProductoTienda($dataRequest){
		$codProd	= $dataRequest["codProd"];
		$miniCod	= $dataRequest["miniCod"];
		$nomProd  	= $dataRequest["nomProd"];
		$desProdCort 	= $dataRequest["desProdCort"];
		$desProdLarg  	= $dataRequest["desProdLarg"];
		//$especifProd   	= $dataRequest["especifProd"];
		$ind_especif   	= $dataRequest["indPubliEspec"];
		$ind_galeria   	= $dataRequest["indPubliGaleria"];
		$keyWord  		= $dataRequest["keyWord"];
		//$rutaImgSm 	= $dataRequest["rutaImgSm"];
		//$rutaImgMd 	= $dataRequest["rutaImgMd"];
		//$rutaImgLg 	= $dataRequest["rutaImgLg"];
		$precioCompra 	= $dataRequest["precioCompra"];
		$precioNormal 	= $dataRequest["precioNormal"];
		$precioInter 	= $dataRequest["precioInter"];
		//$stockProve		= $dataRequest["stockProve"];
		$stockAlmacMod	= $dataRequest["stockAlmacMod"];
		$precioDesc		= $dataRequest["precioDesc"];
		$fecIniDesc		= $dataRequest["fecIniDesc"];
		$fecFinDesc		= $dataRequest["fecFinDesc"];
		$isProdAlmac	= $dataRequest["isProdAlmac"];
		$isActivoAlmac	= $dataRequest["isActivoAlmac"];
		$codMarca 		= $dataRequest["codMarca"];
		$rucProveedor	= $dataRequest["rucProveedor"];
		$codProdProv	= $dataRequest["codProdProv"];
		$codTipCateg	= $dataRequest["codTipCateg"];
		$codCateg 		= $dataRequest["codCateg"];
		$codSubCateg	= $dataRequest["codSubCateg"];
		$codEstadProd	= $dataRequest["codEstadProd"];
		$codEstadAlmc	= $dataRequest["codEstadAlmc"];
		$codEstadPublic	= $dataRequest["codEstadPublic"];
		$isDestacado	= $dataRequest["isDestacado"];

		/*$sql  = "update wip_producto_tienda set mini_codigo=?, producto=?, descrip_corta=?, descrip_larga=?, ind_especificaciones=?, key_word=? "
					.",	precio_compra_final=?, precio_venta_normal=?, precio_venta_internet=?, stock=?, ind_galeriaImagenes=? "
					.", almacen_ind=?, almacen_del=?, almacen_stock=?, estado=?, cod_fabricante=?, cod_categoria=? "
					.", destacado_ind=?, descuento_precio=?, descuento_fecini=?, descuento_fecfin=?, proveedor_ruc=?, proveedor_codprod=? "
					.", fecha_act = NOW() "
					." where cod_producto=?";
		$data = array('ssssssdddisssissssdsssss', "{$miniCod}", "{$nomProd}", "{$desProdCort}", "{$desProdLarg}", "{$ind_especif}", "{$keyWord}"  
						, "{$precioCompra}", "{$precioNormal}", "{$precioInter}", "{$stockProve}", "{$ind_galeria}"
						, "{$isProdAlmac}", "{$isActivoAlmac}", "{$stockAlmacMod}", "{$codEstad}", "{$codFabri}", "{$codCateg}" 
						, "{$isDestacado}", "{$precioDesc}", "{$fecIniDesc}", "{$fecFinDesc}", "{$rucProveedor}", "{$codProdProv}", "{$codProd}");*/
		
		$sql  = "update wip_producto_tienda set mini_codigo=?, producto=?, descrip_corta=?, descrip_larga=?, ind_especificaciones=?, key_word=? "
						.",	precio_compra_final=?, precio_venta_normal=?, precio_venta_internet=?, ind_galeriaImagenes=? "
						.", almacen_ind=?, almacen_del=?, almacen_stock=?, estado_prod=?, almacen_est=?, public_est=?, cod_fabricante=? "
						.", cod_tipcategoria=?, cod_categoria=?, cod_subcategoria=? "
						.", destacado_ind=?, descuento_precio=?, descuento_fecini=?, descuento_fecfin=?, proveedor_ruc=?, proveedor_codprod=? "
						.", fecha_act = NOW() "
						." where cod_producto=?";
		$data = array('ssssssdddississsssssidsssss', "{$miniCod}", "{$nomProd}", "{$desProdCort}", "{$desProdLarg}", "{$ind_especif}", "{$keyWord}"  
							, "{$precioCompra}", "{$precioNormal}", "{$precioInter}", "{$ind_galeria}", "{$isProdAlmac}", "{$isActivoAlmac}", "{$stockAlmacMod}"
							, "{$codEstadProd}", "{$codEstadAlmc}", "{$codEstadPublic}", "{$codMarca}", "{$codTipCateg}", "{$codCateg}", "{$codSubCateg}"   
							, "{$isDestacado}", "{$precioDesc}", "{$fecIniDesc}", "{$fecFinDesc}", "{$rucProveedor}", "{$codProdProv}", "{$codProd}");
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
