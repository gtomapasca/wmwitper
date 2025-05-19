<?php
// ----------------------------------------------------------------------------
// Copyright 2019 - 2023, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase Producto:
//  - Clase ComprobanteVenta
// ----------------------------------------------------------------------------
// Change History:
//  25/02/2023  degui <degui@nitper.com>
//     - Se crea la calse ComprobanteVenta
// ----------------------------------------------------------------------------

/* Clase ComprobanteVenta */
class ComprobanteVenta{
    private $id_venta;
    private $ruc_negocio;
    private $fecha_emision;
    private $cod_mediopago;
    private $cod_tipomoneda;
    private $pago_total;
    private $pago_monto;
    private $pago_vuelto;
    private $envio_codest;
    //private $id_usuario;
    private $id_mediopago;
    private $nro_serie;
    private $nro_correlativo;
    private $cod_tipcom;
    private $cod_tipdoc;
    private $num_docume;
    private $nom_cli;
    private $observacion_cambest;
    private $fk_idusuario;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;
    private $ip_reg;
    private $host_reg;
    private $codusu_act;
    private $fecha_act;
    private $ip_act;
    private $host_act;

    public function get_id_venta(){
    	   return $this->id_venta;
    }
    public function set_id_venta($id_venta){
    	   $this->id_venta=$id_venta;
    }
    public function get_ruc_negocio(){
    	   return $this->ruc_negocio;
    }
    public function set_ruc_negocio($ruc_negocio){
    	   $this->ruc_negocio=$ruc_negocio;
    }
    public function get_fecha_emision(){
    	   return $this->fecha_emision;
    }
    public function set_fecha_emision($fecha_emision){
    	   $this->fecha_emision=$fecha_emision;
    }
    public function get_cod_mediopago(){
        return $this->cod_mediopago;
    }
    public function set_cod_mediopago($cod_mediopago){
            $this->cod_mediopago=$cod_mediopago;
    }
    public function get_cod_tipomoneda(){
        return $this->cod_tipomoneda;
    }
    public function set_cod_tipomoneda($cod_tipomoneda){
            $this->cod_tipomoneda=$cod_tipomoneda;
    }
    public function get_pago_total(){
        return $this->pago_total;
    }
    public function set_pago_total($pago_total){
            $this->pago_total=$pago_total;
    }
    public function get_pago_monto(){
        return $this->pago_monto;
    }
    public function set_pago_monto($pago_monto){
            $this->pago_monto=$pago_monto;
    }
    public function get_pago_vuelto(){
        return $this->pago_vuelto;
    }
    public function set_pago_vuelto($pago_vuelto){
            $this->pago_vuelto=$pago_vuelto;
    }
    public function get_envio_codest(){
        return $this->envio_codest;
    }
    public function set_envio_codest($envio_codest){
            $this->envio_codest=$envio_codest;
    }
    /*public function get_id_usuario(){
        return $this->id_usuario;
    }
    public function set_id_usuario($id_usuario){
            $this->id_usuario=$id_usuario;
    }*/
    public function get_id_mediopago(){
        return $this->id_mediopago;
    }
    public function set_id_mediopago($id_mediopago){
            $this->id_mediopago=$id_mediopago;
    }
    public function get_nro_serie(){
    	   return $this->nro_serie;
    }
    public function set_nro_serie($nro_serie){
    	   $this->nro_serie=$nro_serie;
    }
    public function get_nro_correlativo(){
        return $this->nro_correlativo;
    }
    public function set_nro_correlativo($nro_correlativo){
            $this->nro_correlativo=$nro_correlativo;
    }
    public function get_cod_tipcom(){
        return $this->cod_tipcom;
    }
    public function set_cod_tipcom($cod_tipcom){
        $this->cod_tipcom=$cod_tipcom;
    }
    public function get_cod_tipdoc(){
    	   return $this->cod_tipdoc;
    }
    public function set_cod_tipdoc($cod_tipdoc){
    	   $this->cod_tipdoc=$cod_tipdoc;
    }
    public function get_num_docume(){
    	   return $this->num_docume;
    }
    public function set_num_docume($num_docume){
    	   $this->num_docume=$num_docume;
    }
    public function get_nom_cli(){
        return $this->nom_cli;
    }
    public function set_nom_cli($nom_cli){
            $this->nom_cli=$nom_cli;
    }
    public function get_observacion_cambest(){
    	   return $this->observacion_cambest;
    }
    public function set_observacion_cambest($observacion_cambest){
    	   $this->observacion_cambest=$observacion_cambest;
    }
    public function get_fk_idusuario(){
        return $this->fk_idusuario;
    }
    public function set_fk_idusuario($fk_idusuario){
            $this->fk_idusuario=$fk_idusuario;
    }    
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function get_del(){
    	   return $this->del;
    }
    public function set_del($del){
    	   $this->del=$del;
    }
    public function get_codusu_reg(){
    	   return $this->codusu_reg;
    }
    public function set_codusu_reg($codusu_reg){
    	   $this->codusu_reg=$codusu_reg;
    }
    public function get_fecha_reg(){
    	   return $this->fecha_reg;
    }
    public function set_fecha_reg($fecha_reg){
    	   $this->fecha_reg=$fecha_reg;
    }
    public function get_ip_reg(){
    	   return $this->ip_reg;
    }
    public function set_ip_reg($ip_reg){
    	   $this->ip_reg=$ip_reg;
    }
    public function get_host_reg(){
    	   return $this->host_reg;
    }
    public function set_host_reg($host_reg){
    	   $this->host_reg=$host_reg;
    }
    public function get_codusu_act(){
    	   return $this->codusu_act;
    }
    public function set_codusu_act($codusu_act){
    	   $this->codusu_act=$codusu_act;
    }
    public function get_fecha_act(){
    	   return $this->fecha_act;
    }
    public function set_fecha_act($fecha_act){
    	   $this->fecha_act=$fecha_act;
    }
    public function get_ip_act(){
    	   return $this->ip_act;
    }
    public function set_ip_act($ip_act){
    	   $this->ip_act=$ip_act;
    }
    public function get_host_act(){
    	   return $this->host_act;
    }
    public function set_host_act($host_act){
    	   $this->host_act=$host_act;
    }
    public function toArray(){
    	return $data = array(
            "id_venta"          =>  $this->id_venta,
            "ruc_negocio"       => $this->ruc_negocio,
            "fecha_emision"     => $this->fecha_emision,
            "cod_mediopago"     => $this->cod_mediopago,
            "cod_tipomoneda"    => $this->cod_tipomoneda,
            "pago_total"        => $this->pago_total,
            "pago_monto"        => $this->pago_monto,
            "pago_vuelto"       => $this->pago_vuelto,
            "envio_codest"      => $this->envio_codest,
            //"id_usuario"        => $this->id_usuario,
            "id_mediopago"      => $this->id_mediopago,
            "nro_serie"         => $this->nro_serie,
            "nro_correlativo"   => $this->nro_correlativo,
            "cod_tipcom"        => $this->cod_tipcom,
            "cod_tipdoc"        => $this->cod_tipdoc,
            "num_docume"        => $this->num_docume,
            "nom_cli"           => $this->nom_cli,
            "observacion_cambest" => $this->observacion_cambest,
            "fk_idusuario"      => $this->fk_idusuario,
            "estado"            => $this->estado,
            "del"               => $this->del,
            "codusu_reg"        => $this->codusu_reg,
            "fecha_reg"         => $this->fecha_reg,
            "ip_reg"            => $this->ip_reg,
            "host_reg"          => $this->host_reg,
            "codusu_act"        => $this->codusu_act,
            "fecha_act"         => $this->fecha_act,
            "ip_act"            => $this->ip_act,
            "host_act"          => $this->host_act
	   );
    }
    public function toArrayComprobanteVenta(){
    	return $data = array(
            "id_venta"          =>  $this->id_venta,
            "ruc_negocio"       => $this->ruc_negocio,
            "fecha_emision"     => $this->fecha_emision,
            "cod_mediopago"     => $this->cod_mediopago,
            "cod_tipomoneda"    => $this->cod_tipomoneda,
            "pago_total"        => $this->pago_total,
            "pago_monto"        => $this->pago_monto,
            "pago_vuelto"       => $this->pago_vuelto,
            "envio_codest"      => $this->envio_codest,
            //"id_usuario"        => $this->id_usuario,
            "id_mediopago"      => $this->id_mediopago,
            "nro_serie"         => $this->nro_serie,
            "nro_correlativo"   => $this->nro_correlativo,
            "cod_tipcom"        => $this->cod_tipcom,
            "cod_tipdoc"        => $this->cod_tipdoc,
            "num_docume"        => $this->num_docume,
            "nom_cli"           => $this->nom_cli,
            "observacion_cambest" => $this->observacion_cambest,
            "fk_idusuario"      => $this->fk_idusuario,
            "estado"            => $this->estado,
            "del"               => $this->del,
            "codusu_reg"        => $this->codusu_reg,
            "fecha_reg"         => $this->fecha_reg
	   );
    }

    public function toArrayCorreComprobanteVenta(){
    	return $data = array(
            "nro_correlativo" => $this->nro_correlativo
	   );
    }
    public function toArrayIdComprobanteVenta(){
    	return $data = array(
            "id_venta" => $this->id_venta
	   );
    }

}

?>
