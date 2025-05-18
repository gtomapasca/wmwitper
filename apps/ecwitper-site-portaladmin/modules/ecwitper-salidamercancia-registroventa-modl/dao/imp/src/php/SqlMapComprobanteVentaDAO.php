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
//  - SqlMap a la tabla wip_venta
// ----------------------------------------------------------------------------
// Change History:
//  2023/02/25  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla wip_venta
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/model/src/php/ComprobanteVenta.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-registro-venta-modl/dao/ifz/src/php/ComprobanteVentaDAO.php';

/* Clase SqlMapComprobanteVentaDAO */
class SqlMapComprobanteVentaDAO implements ComprobanteVentaDAO{

	public function selectComprobanteVentas($dataRequest){
		$comprobanteVenta = new ComprobanteVenta();
		$n = 0;
		//$ordenar = $dataRequest["ordenar"];
		$where = " where del = 0 ";
		foreach($dataRequest as $clave=>$valor){
			$encontrado = false;
			// rango de fecha
			if($clave == "fecIniBusq" || $clave == "fecFinBusq"){
				$encontrado = true;
				if($clave == "fecFinBusq"){
					$data[0] .= "ss"; 
					$data[++$n] = $dataRequest["fecIniBusq"] . ' 23:59:59';
					$data[++$n] = $dataRequest["fecFinBusq"] . ' 23:59:59';
					$where .= (" and fecha_emision between ? and ? ");
					
				}
			}
			// Estado comprobante: emitido, generado, etc.
			else if($clave == "estado"){
				$encontrado = true;
				$data[0] .= "s"; 
				$data[++$n] = $dataRequest["estado"];
				$where .= (" and estado = ? ");
			}
			// tipo comprobante: boleta factura
			else if($clave == "cod_tipcom"){
				$encontrado = true;
				$data[0] .= "s"; 
				$data[++$n] = $dataRequest["cod_tipcom"];
				$where .= (" and cod_tipcom = ? ");
			}
			// serie comprobante: B001/F001
			else if($clave == "nro_serie"){
				$encontrado = true;
				$data[0] .= "s"; 
				$data[++$n] = $dataRequest["nro_serie"];
				$where .= (" and nro_serie = ? ");
			}
			// numero comprobante: 001, 002, 003
			else if($clave == "nro_correlativo"){
				$encontrado = true;
				$data[0] .= "s"; 
				$data[++$n] = $dataRequest["nro_correlativo"];
				$where .= (" and nro_correlativo = ? ");
			}
			// documento: ruc, dni
			else if($clave == "cod_tipdoc"){
				$encontrado = true;
				$data[0] .= "ss"; 
				$data[++$n] = $dataRequest["cod_tipdoc"];
				$data[++$n] = $dataRequest["num_docume"];
				$where .= (" and cod_tipdoc = ? and num_docume = ? ");
			}
		}

		$sql  = "select 	id_venta, ruc_negocio, fecha_emision, cod_mediopago, cod_tipomoneda, pago_total, pago_monto, pago_vuelto "
				."			, envio_codest, id_mediopago, nro_serie, nro_correlativo, cod_tipcom "
				."			, cod_tipdoc, num_docume, nom_cli, observacion_cambest, fk_idusuario, estado, del, codusu_reg, fecha_reg "
				."from 		wip_venta ";
		$sql .= $where . " order by fecha_emision asc ";
		$fields = $comprobanteVenta->toArrayComprobanteVenta();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }

	public function selectCorreComprobanteVenta($dataRequest){
		$comprobanteVenta = new ComprobanteVenta();
		$tipComprob = $dataRequest["tipComprob"];
		$sql  = "select nro_correlativo from wip_venta where cod_tipcom = ? and del = 0 order by nro_correlativo desc limit 1";
		$data = array('s', "{$tipComprob}");
		$fields = $comprobanteVenta->toArrayCorreComprobanteVenta();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }

	public function selectIdComprobanteVenta($dataRequest){
		$comprobanteVenta = new ComprobanteVenta();
		$serieComprob = $dataRequest["serieComprob"];
		$nroComprob = $dataRequest["nroComprob"];
		$sql  = "select id_venta from wip_venta where nro_serie = ? and nro_correlativo = ? and del = 0";
		$data = array('ss', "{$serieComprob}", "{$nroComprob}");
		$fields = $comprobanteVenta->toArrayIdComprobanteVenta();
		return DBObject::ejecutar($sql, $data, $fields);
		//return $resp_temp = array ("parametros" => $dataRequest, "sql" => $sql, "data" => $data);
    }

	// 20230305 Registrar comprobante de venta
    public function insertComprobanteVenta($dataRequest){

		// -----------------------------------------------
		// 1. Registrar Cabecera Venta
		// -----------------------------------------------
		$nroSerie 		= $dataRequest["nroSerieVenta"];
		$nroComprob 	= $dataRequest["nroCorreVenta"];
		$rucNegocio 	= $dataRequest["rucNegocio"];
		//$codUsu 		= $dataRequest["correUsuCLi"];		
		$tipComprob 	= $dataRequest["codTipComprob"];
		$fechaEmision 	= $dataRequest["fechaEmision"];
		$tipDocu 		= $dataRequest["codTipDocu"];
		$numDocu 		= $dataRequest["desNumDocu"];
		$nombreCli 		= $dataRequest["nombreCli"];
		$tipMoneda 		= $dataRequest["codTipMoneda"];
		$tipPago 		= $dataRequest["codTipPago"];
		$pagoTotal 		= $dataRequest["pagoTotal"];
		$pagoMonto 		= $dataRequest["pagoMonto"];
		$pagoVuelto 	= $dataRequest["pagoVuelto"];
		$ventaEnvio 	= $dataRequest["ventaEnvio"];
		$codVendedor 	= $dataRequest["correUsuVent"];
		$codEstado 		= $dataRequest["CodEstado"];
		$observacion	= $dataRequest["observacion"];

		$sql  = "insert into wip_venta (ruc_negocio, cod_mediopago, cod_tipomoneda, pago_total, pago_monto, pago_vuelto, envio_codest "
				.", id_mediopago, nro_serie, nro_correlativo, cod_tipcom, cod_tipdoc, num_docume, nom_cli, observacion_cambest "
				.", fecha_emision, fk_idusuario, estado, del, codusu_reg, codusu_act, fecha_reg, fecha_act)  "
				." values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, USER(), USER(), NOW(), NOW()) ";
		$data = array('sssdddssssssssssss', "{$rucNegocio}", "{$tipPago}", "{$tipMoneda}", "{$pagoTotal}", "{$pagoMonto}", "{$pagoVuelto}", "{$ventaEnvio}"
										, "{$tipPago}", "{$nroSerie}", "{$nroComprob}", "{$tipComprob}", "{$tipDocu}"
										, "{$numDocu}", "{$nombreCli}", "{$observacion}", "{$fechaEmision}", "{$codVendedor}", "{$codEstado}");
		DBObject::ejecutar($sql, $data);
		//return $resp_temp = array ("sql" => $sql, "data" => $data);
    }
      	
}

?>
