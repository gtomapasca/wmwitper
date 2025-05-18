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
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/model/src/php/ProductoTienda.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/model/src/php/FabricanteCat.php';
require_once 'commons/ecwitper-tiendaonline-comercioproductos-common/dao/ifz/src/php/ProductoDAO.php';

/* Clase SqlMapProductoDAO */
class SqlMapProductoDAO implements ProductoDAO{
    // 20200815 Consultar producto
    public function selectProductoById($dataRequest){
		try{
			$producto = new ProductoTienda();
			$codProducto = $dataRequest["codProducto"];
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria "
				//." where 	pt.del = '0' and pt.estado = '1' and pt.cod_producto = ?";
				." where 	pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.cod_producto = ?";
			$data = array('s', "{$codProducto}");
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//$resp_temp = array ("sql" => $sql, "data" => $data);
			//return $resp_temp;
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

    // 20210724 Consultar producto por mini código
    public function selectProductoByMinicodigo($dataRequest){
		try{
			$producto = new ProductoTienda();
			$miniCodigo = $dataRequest["miniCodigo"];
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria "
				//." where 	pt.del = '0' and pt.estado = '1' and pt.mini_codigo = ?";
				." where 	pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.mini_codigo = ?";
			$data = array('s', "{$miniCodigo}");
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

    // Consultar producto by descripcion
    public function selectProductoByDesc($dataRequest){
		try{
			$producto  = new ProductoTienda();
			$categoria = $dataRequest["categoria"];
			$buscar    = $dataRequest["buscar"];
			//$buscar    = "%".$dataRequest["buscar"]."%";
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria ";
			if($categoria=='0'){ // consulta contra todos
				$buscar    = "%".$buscar."%";
				//$where = " where pt.del = '0' and pt.estado = '1' and pt.producto like ?";
				$where = " where pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.producto like ?";
				$data = array('s', "{$buscar}");
			}else if($categoria=='1'){ // consulta por mini código
				//$where = " where pt.del = '0' and pt.estado = '1' and pt.mini_codigo = ?";
				$where = " where pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.mini_codigo = ?";
				$data = array('s', "{$buscar}");
			}else{	// consulta por categoría
				$buscar    = "%".$buscar."%";
				//$where = " where pt.del = '0' and pt.estado = '1' and pt.cod_categoria = ? and pt.producto like ?";
				$where = " where pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.cod_categoria = ? and pt.producto like ?";
				$data = array('ss', "{$categoria}", "{$buscar}");
			}
			$sql = $sql . $where;
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//$resp_temp = array ("sql" => $sql, "data" => $data);
			//return $resp_temp;
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }	

    // 20200815 GTP: listar productos catalogo para la página de inicio /***** GTPX ****/
    public function selectProductosCatalogo(){
		try{
			$producto = new ProductoTienda();
			//$del = '0';
			$estado = '03'; // 20220807 GTP: Se cambia estado
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria "
				//." where 	pt.del = ? and pt.estado = ? and pt.destacado_ind = 1 ";
				." where 	pt.del = 0 and cp.del = 0 and scp.del = 0 and pt.estado_prod = '03' and pt.public_est = ? and pt.destacado_ind = 1 ";
			//$data = array('ss', "{$del}", "{$estado}");
			$data = array('s', "{$estado}");
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }
	
    // 20210311 Degui:  Consultar producto por categoria
    public function selectProductoByCategoria($dataRequest){
		try{
			$producto = new ProductoTienda();
			//$codProductoCat = $dataRequest["productocat"];
			$n = 0;
			//$where = " where pt.del = '0' and pt.estado = '1' ";
			$where = " where pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' ";
			foreach($dataRequest as $clave=>$valor){
				if($valor != ''){
					$data[0] .= "s"; 
					$data[++$n] = "{$valor}";
					$where .= (" and pt." . $clave . " = ? ");
				}
			}
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria ";
				//." where 	pt.del = '0' and pt.estado = '1' and pt.cod_categoria = ?";
				//$data = array('s', "{$codProductoCat}");
			$sql .= $where;
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

	// 20220925 Seleccionar por fabricante
	public function selectProductoByFabricante($dataRequest){
		try{
			$producto = new ProductoTienda();
			$codCategoria = $dataRequest["cod_categoria"];
			$codSubCategoria = $dataRequest["cod_subcategoria"];
			$listFabricantes = $dataRequest["fabricantes"];
			$cadena = "";
			for($i=0;$i<count($listFabricantes);$i++){
				if($i == 0){
					$cadena .= "'".$listFabricantes[$i]."'";
				}else{
					$cadena .= ",'".$listFabricantes[$i]."'";
				}				
			}
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria "
				." where 	pt.del = '0' and pt.estado_prod = '03' and pt.public_est = '03' and pt.cod_categoria = ? and pt.cod_subcategoria = ? and pt.cod_fabricante in (".$cadena.") ";
			$data = array('ss', "{$codCategoria}", "{$codSubCategoria}");
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

    // 20210618 Degui:  Listar cantidad Fabricantes por categoria de productos habilitados
    public function selectCountFabByCategoria($dataRequest){
		try{
			$fabricanteCat = new FabricanteCat();
			//$codProductoCat = $dataRequest["productocat"];
			$n = 0;
			$where = " where p.del = '0' and p.estado_prod = '03' and p.public_est = '03' ";
			foreach($dataRequest as $clave=>$valor){
				if($valor != ''){
					$data[0] .= "s"; 
					$data[++$n] = "{$valor}";
					$where .= (" and p." . $clave . " = ? ");
				}
			}
			$sql = "select 	p.cod_fabricante, f.marca, count(p.cod_fabricante) as cantidad "
				." from 	wip_producto_tienda p inner join wip_fabricante f on p.cod_fabricante = f.cod_fabricante ";
				//." where 	p.del = '0' and p.estado = '1' and p.cod_categoria = ? GROUP BY p.cod_fabricante";
				//." where 	p.del = '0' and p.estado_prod = '03' and p.public_est = '03' and p.cod_categoria = ? GROUP BY p.cod_fabricante";
			//$data = array('s', "{$codProductoCat}");
			$sql .= $where ."GROUP BY p.cod_fabricante ";
			$fields = $fabricanteCat->toArray();
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

	// 20220328 DEGUI: obtener ofertas
    public function selectOfertasProductos(){

		try{
			$producto = new ProductoTienda();
			$del = '0';
			$estado = '03';
			$sql = "select 	pt.cod_producto, pt.mini_codigo, pt.cod_fabricante, fb.marca, pt.cod_categoria, cp.nom_categoria, pt.cod_subcategoria, scp.nom_subcategoria, pt.producto, pt.descrip_corta, pt.descrip_larga "
				."			,pt.ind_especificaciones, pt.ind_galeriaImagenes, pt.nom_img, pt.dir_img, pt.ruta_img, pt.key_word, pt.precio_compra_final, pt.precio_venta_normal "
				."			,pt.precio_venta_internet, pt.precio_venta_tarjeta, pt.stock, pt.puntaje, pt.estado, pt.fecha_reg "
				."			,pt.almacen_ind, pt.almacen_stock, pt.almacen_fecreg, pt.almacen_fecmod, pt.almacen_usureg, pt.almacen_usumod, pt.almacen_del "
				."			,pt.destacado_ind, pt.descuento_precio, pt.descuento_fecini, pt.descuento_fecfin, pt.proveedor_ruc, pt.proveedor_codprod "
				."			,NOW() >= pt.descuento_fecini isFecIni, NOW() <= pt.descuento_fecfin isFecFin "
				." from 	wip_producto_tienda pt "
				."			inner join wip_fabricante fb on fb.cod_fabricante = pt.cod_fabricante "
				."        	inner join wip_categoria_producto cp on cp.cod_categoria = pt.cod_categoria "
				."        	inner join wip_subcategoria_producto scp on scp.cod_subcategoria = pt.cod_subcategoria "
				//." where 	pt.del = ? and pt.estado = ? and NOW() between pt.descuento_fecini and pt.descuento_fecfin ";
				." where 	pt.del = ? and pt.estado_prod = '03' and pt.public_est = ? and NOW() between pt.descuento_fecini and pt.descuento_fecfin ";
			$data = array('ss', "{$del}", "{$estado}");
			$fields = $producto->toArrayProductoTienda();
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }
      	
}

?>
