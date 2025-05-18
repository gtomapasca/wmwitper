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
// Clase Suscripcion:
//  - SqlMap a la tabla Menu
// ----------------------------------------------------------------------------
// Change History:
//  25/12/2019  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla Menu
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-cpaneladmin-mainmenu-modl/dao/ifz/src/php/ProgramaDAO.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-cpaneladmin-mainmenu-modl/dao/model/src/php/Programa.php';

/* Clase SqlMapCabMenuDAO */
class SqlMapProgramaDAO implements ProgramaDAO{
    // 09/02/2020 GTP: get page
    public function selectProgramaByCod($dataRequest){
		$programa = new Programa();
		$cod_page = $dataRequest["codPage"];
		$sql  = "select  cod_programa, cod_meta_prog, nro_prog, nom_prog, cod_page, nom_page, dir_page, "
				."        contexto, vigencia_ini, vigencia_fin, estado, del, codusu_reg, fecha_reg, "
				."        ip_reg, host_reg, codusu_act, fecha_act, ip_act, host_act "
				."from    wip_programa "
				."where   cod_programa = ? and estado = 0 and del = 0";
		$data = array('s', "{$cod_page}");
		$fields = $programa->toArray();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
    
}

?>
