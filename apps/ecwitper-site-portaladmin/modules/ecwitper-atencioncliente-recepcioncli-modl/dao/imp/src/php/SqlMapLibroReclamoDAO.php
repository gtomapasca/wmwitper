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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/model/src/php/LibroReclamo.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-atencioncliente-recepcioncli-modl/dao/ifz/src/php/LibroReclamoDAO.php';

/* Clase SqlMapLibroReclamoDAO */
class SqlMapLibroReclamoDAO implements LibroReclamoDAO{

    // 20191209 GTP: obtener lista de libro reclamos
    public function obtenerListaLibroReclamos(){
		$libroReclamo = new LibroReclamo();
		$del = '0';
		$sql  = "select id_libro, id_usuario, cli_dni, cli_nombre, cli_telf, cli_cel, cli_email, cli_domicilio, "
			."nro_compra, fec_compra, cod_producto, des_producto, can_producto, pre_producto, tipo_motivo, desc_motivo, estado, fecha_reg "
			." from wip_libro_reclamo where del = ?";
		$data = array('s', "{$del}");
		$fields = $libroReclamo->toArrayLibroReclamo();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("sql" => $sql, "data" => $data);
    }
      	
}

?>
