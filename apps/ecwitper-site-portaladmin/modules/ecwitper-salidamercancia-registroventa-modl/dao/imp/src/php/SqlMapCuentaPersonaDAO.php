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
// Clase Cliente:
//  - SqlMap a la tabla cliente
// ----------------------------------------------------------------------------
// Change History:
//  2023/02/04  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla cliente
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/model/src/php/CuentaPersona.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/ifz/src/php/CuentaPersonaDAO.php';

/* Clase SqlMapClienteDAO */
class SqlMapCuentaPersonaDAO implements CuentaPersonaDAO{
    
    // 20230204 GTP: Obtener datos cliente para ventas
    public function selectClienteVenta($dataRequest){
		$cuentaPersona = new CuentaPersona();
		$tipDoc = $dataRequest["tipDoc"];
		$numDoc = $dataRequest["numDoc"];
		$sql  = "select id_ctapersona, tipo_usu, doc_tip, doc_num, fecha_nac, nombres, ape_pat, ape_mat, telefono, celular, email, direccion, estado, fecha_reg "
				." from wip_cuenta_persona where estado = 0 and del = 0 and doc_tip = ? and doc_num = ?";
		$data = array('ss', "{$tipDoc}", "{$numDoc}");
		$fields = $cuentaPersona->toArrayCliente();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

	// 20230407 Registrar nuevo cliente para venta
	public function insertClienteVenta($dataRequest){
		$ruc = "20608326481"; // compuchiclayo eirl
		$tipUsu = "0";
		$tipDoc	= $dataRequest["hdModalTipDocCli"];
		$numDoc = $dataRequest["hdModalNumDocCli"];
		$nomCli	= $dataRequest["txtModalNombreCli"];
		$apePat	= $dataRequest["txtModalApePatCli"];		
		$apeMat	= $dataRequest["txtModalApeMatCli"];
		$numCel	= $dataRequest["txtModalCelCli"];
		$email 	= $dataRequest["txtModalMailCli"];
		$appReg = "VTA01";
		$estado = "0";
		
		$sql  = "insert into wip_cuenta_persona (ruc_negocio, tipo_usu, doc_tip, doc_num, nombres, ape_pat, ape_mat, celular, email "
				.", cod_appreg, cod_appact, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act) "
				." values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, USER(), USER(), NOW(), NOW()) ";
		$data = array('ssssssssssss', "{$ruc}", "{$tipUsu}", "{$tipDoc}", "{$numDoc}", "{$nomCli}", "{$apePat}", "{$apeMat}"
									, "{$numCel}", "{$email}", "{$appReg}", "{$appReg}", "{$estado}");
		DBObject::ejecutar($sql, $data);
		//return $resp_temp = array ("sql" => $sql, "data" => $data);
    }
      	
}

?>
