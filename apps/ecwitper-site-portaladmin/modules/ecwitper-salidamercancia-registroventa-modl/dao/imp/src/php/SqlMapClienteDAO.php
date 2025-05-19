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
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/model/src/php/Cliente.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/ifz/src/php/ClienteDAO.php';

/* Clase SqlMapClienteDAO */
class SqlMapClienteDAO implements ClienteDAO{

    // 20191209 GTP: obtener lista de clientes
    public function listarClientesAll(){
		$cliente = new Cliente();
		$del = '0';
		$sql  = "select id_ctapersona, tipo_usu, doc_tip, doc_num, fecha_nac, nombres, ape_pat, ape_mat, telefono, celular, email, direccion, estado, fecha_reg "
			." from wip_cuenta_persona where del = ?";
		$data = array('s', "{$del}");
		$fields = $cliente->toArrayCliente();
		return DBObject::ejecutar($sql, $data, $fields);
		//$resp_temp = array ("sql" => $sql, "data" => $data);
		//return $resp_temp;
    }
      	
}

?>
