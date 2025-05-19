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
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/ifz/src/php/LibroReclamoDAO.php';

/* Clase SqlMapLibroReclamoDAO */
class SqlMapLibroReclamoDAO implements LibroReclamoDAO{
      // Registrar libro reclamo
      public function insertReclamo($dataRequest){
		$ruc = "10440440911";
		$usu = "1";
		$num_recl = $dataRequest["num_reclamo"];
		$tip_docu = $dataRequest["tip_docu"];
		$num_docu = $dataRequest["num_docu"];
		$usu_nomb = $dataRequest["usu_nomb"];
		//$usu_dni  = $dataRequest["usu_dni"];
		//$usu_telf = $dataRequest["usu_telf"];
		$usu_celu = $dataRequest["usu_celu"];
		$usu_mail = $dataRequest["usu_mail"];
		$usu_depa = $dataRequest["usu_depa"];
		$usu_prov = $dataRequest["usu_prov"];
		$usu_dist = $dataRequest["usu_dist"];
		$usu_domi = $dataRequest["usu_domi"];
		$tip_moti = $dataRequest["tip_moti"];
		$comp_tip = $dataRequest["comp_tip"];
		$comp_nro = $dataRequest["comp_nro"];
		$comp_fec = $dataRequest["comp_fec"];
		$prod_cod = $dataRequest["prod_cod"];
		$prod_des = $dataRequest["prod_des"];
		$prod_can = $dataRequest["prod_can"];
		$prod_pre = $dataRequest["prod_pre"];
		$des_moti = $dataRequest["des_moti"];
		//$det_pedi = $dataRequest["det_pedi"];
		$sql  = "insert into wip_libro_reclamo (ruc_negocio, id_usuario, num_reclamo, cod_tipdoc, num_tipdoc, cli_dni, cli_nombre, cli_cel, cli_email "
		       ."    	, cli_departamento, cli_provincia, cli_distrito, cli_domicilio, tipo_motivo, cod_tipcomp, nro_compra, fec_compra "
		       ."    	, cod_producto, des_producto, can_producto, pre_producto, desc_motivo, cli_pedido, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
		       ."values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
		$data = array('sssssssssssssisssssssss', "{$ruc}", "{$usu}", "{$num_recl}", "{$tip_docu}", "{$num_docu}", "", "{$usu_nomb}", "{$usu_celu}", "{$usu_mail}"
											, "{$usu_depa}", "{$usu_prov}", "{$usu_dist}", "{$usu_domi}", "{$tip_moti}", "{$comp_tip}", "{$comp_nro}", "{$comp_fec}"
											, "{$prod_cod}", "{$prod_des}", "{$prod_can}", "{$prod_pre}", "{$des_moti}", "");
											
		DBObject::ejecutar($sql, $data);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
      }
      	
}

?>
