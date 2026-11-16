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
require_once 'commons/ecwitper-tiendaonline-publicadorpaginas-common/dao/ifz/src/php/LibroReclamoDAO.php';

/* Clase SqlMapLibroReclamoDAO */
class SqlMapLibroReclamoDAO implements LibroReclamoDAO{
      // Registrar libro reclamo
      public function insertReclamo($jsonParams){
		try{
			$ruc 	  = $jsonParams->ruc_negocio;
			$num_recl = $jsonParams->numReclamo;
			$tip_docu = $jsonParams->codTipDocu;
			$num_docu = $jsonParams->numDocu;
			$usu_nomb = $jsonParams->nombCliente;
			$usu_celu = $jsonParams->numCelular;
			$usu_mail = $jsonParams->email;
			$usu_depa = $jsonParams->codRegion;
			$usu_prov = $jsonParams->codProvincia;
			$usu_dist = $jsonParams->codDistrito;
			$usu_domi = $jsonParams->domicilio;
			$tip_moti = $jsonParams->codMotivo;
			$comp_tip = $jsonParams->codTipoComprob;
			$comp_nro = $jsonParams->nroComprob;
			$comp_fec = $jsonParams->fecComprob;
			//$comp_fec = time();
			$prod_cod = $jsonParams->codProducto;
			$prod_des = $jsonParams->desProducto;
			$prod_can = $jsonParams->cantProducto;
			$prod_pre = $jsonParams->precProducto;
			$des_moti = $jsonParams->descMotivo;
			//$det_pedi = $jsonParams->detPedi;
			$sql  = "insert into wip_libro_reclamo (ruc_negocio, num_reclamo, cod_tipdoc, num_tipdoc, cli_nombre, cli_cel, cli_email "
				."    	, cli_departamento, cli_provincia, cli_distrito, cli_domicilio, tipo_motivo, cod_tipcomp, nro_compra, fec_compra "
				."    	, cod_producto, des_producto, can_producto, pre_producto, desc_motivo, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				."values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, USER(), USER(), NOW(), NOW())";
			// [INI] Setear data
			$values = [$ruc, $num_recl, $tip_docu, $num_docu, $usu_nomb, $usu_celu, $usu_mail
						, $usu_depa, $usu_prov, $usu_dist, $usu_domi, $tip_moti, $comp_tip, $comp_nro
						, $comp_fec, $prod_cod, $prod_des, $prod_can, $prod_pre, $des_moti]; 
			$types = 'sssssssssssissssssss';
			$values = array_values($values);
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			DBObject::ejecutar($sql, $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }
      	
}

?>
