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
//  - SqlMap a la tabla SqlMapAvisoDAO
// ----------------------------------------------------------------------------
// Change History:
//  01/04/2024  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla SqlMapAvisoDAO
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/ifz/src/php/AvisoDAO.php';
require_once 'apps/ecwitper-site-tiendavirtual/modules/ecwitper-iniciotienda-mainmenu-modl/dao/model/src/php/Aviso.php';

/* Clase SqlMapAvisoDAO */
class SqlMapAvisoDAO implements AvisoDAO{
    // Registrar aviso
    public function insertAviso($params){
		try{			
			$sql = "insert into wip_aviso (num_secaviso , num_asocaviso, num_servicio, nom_plantilla, cod_tipaviso, remitente, "
					." destinatario, des_aviso, rpt_aviso, estado, del, codusu_reg, fecha_reg, codusu_act,  fecha_act) "
					." values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, user(), now(), user(), now())";

			$data = array('iiisssssss'
					, "{$params->get_num_secaviso()}"
					, "{$params->get_num_asocaviso()}"
					, "{$params->get_num_servicio()}"
					, "{$params->get_nom_plantilla()}"
					, "{$params->get_cod_tipaviso()}"
					, "{$params->get_remitente()}"
					, "{$params->get_destinatario()}"
					, "{$params->get_des_aviso()}"
					, "{$params->get_rpt_aviso()}"
					, "{$params->get_estado()}"
				);

			DBObject::ejecutar($sql, $data);
			//$resp_temp = array ("sql" => $sql, "data" => $data);
			//return $resp_temp;
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

	// 20240402 Consultar aviso
	public function selectAvisoByPK($params){
		try{
			$sql = "select 	num_secuencia, num_secaviso , num_asocaviso, num_servicio, nom_plantilla, cod_tipaviso, remitente, "
				."			destinatario, des_aviso, estado, del, codusu_reg, fecha_reg, codusu_act, fecha_act "
				."	from 	wip_aviso "
				."	where 	num_asocaviso = ? and estado = 0 and del = 0 ";
			
			$data = array('i'
					, "{$params->get_num_asocaviso()}"
				);
			$aviso = new Aviso();
			$fields = $aviso->toArrayAviso();
			return DBObject::ejecutar($sql, $data, $fields);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }

	// 20240402 Actualización aviso
	public function updateAvisoByPK($params){
		try{
			$sql = "update wip_aviso set estado = ?, rpt_aviso = ?, err_aviso = ?, codusu_act = user(), fecha_act = now() where num_asocaviso = ?";
			$data = array('sssi'
					, "{$params->get_estado()}"
					, "{$params->get_rpt_aviso()}"
					, "{$params->get_err_aviso()}"
					, "{$params->get_num_asocaviso()}"
				);
			return DBObject::ejecutar($sql, $data);
			//return array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}
    }
      	
}

?>
