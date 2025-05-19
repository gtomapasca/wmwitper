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
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/dao/ifz/src/php/CabMenuDAO.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/dao/model/src/php/CabMenu.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/dao/model/src/php/CabMenuGrup.php';
require_once 'apps/ecwitper-site-puntoventa/modules/ecwitper-gestionmenu-puntoventa-modl/dao/model/src/php/CabMenuOpcion.php';

/* Clase SqlMapCabMenuDAO */
class SqlMapCabMenuDAO implements CabMenuDAO{
	// 20200201 GTP: obtener menu principal
	public function selectListCabMenu($dataRequest){
		$cabMenu = new CabMenu();
		$cod_user = $dataRequest["codUser"];
		$sql  = "select  cod_mtgp, cod_tipo_cat, nro_meta_prog, nom_meta_prog, cod_tipo_prog, cod_nivel_prog, estado "
				."from    wip_meta_gprog "
				."where   cod_mtgp in (select cod_mtgp from wip_deta_perf_mtgp "
				."        where cod_perfil = (select cod_perfil from wip_deta_usua_perf "
				."        where id_usuario = ?)) "
				."        and estado = 0 and del = 0";
		$data = array('s', "{$cod_user}");
		$fields = $cabMenu->toArray();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20200201 GTP: obtener menu lateral
    public function selectListMenu($dataRequest){
		$cabMenuGrup = new CabMenuGrup();
		$cod_meta_grup_prog = $dataRequest["codMGProg"];
		$sql  = "select   cod_gprog, cod_tipo_cat, nro_grup_prog, nom_grup_prog, cod_tipo_prog, cod_nivel_prog, estado "
				."from    wip_grupo_prog "
				."where   cod_gprog in (select cod_gprog from wip_deta_mtgp_gpro where cod_mtgp = ?) "
				."        and estado = 0 and del = 0";
		$data = array('s', "{$cod_meta_grup_prog}");
		$fields = $cabMenuGrup->toArray();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

    // 20200203 GTP: obtener opcion menu lateral
    public function selectListOpMenu($dataRequest){
		$cabMenuOpcion = new CabMenuOpcion();
		$cod_grup_prog = $dataRequest["codGProg"];
		$sql  = "select  cod_programa, nro_prog, nom_prog, cod_page, nom_page, contexto, estado "
				."from    wip_programa "
				."where   cod_programa in (select cod_programa from wip_deta_gpro_prog "
				."        where cod_gprog = ?) and estado = 0 and del = 0";
		$data = array('s', "{$cod_grup_prog}");
		$fields = $cabMenuOpcion->toArray();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }

}

?>
