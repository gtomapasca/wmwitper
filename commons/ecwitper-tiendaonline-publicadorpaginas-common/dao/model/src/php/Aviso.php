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
//  - Clase Aviso
// ----------------------------------------------------------------------------
// Change History:
//  02/04/2024  degui <degui@nitper.com>
//     - Se crea la calse Aviso
// ----------------------------------------------------------------------------

/* Clase Aviso */
class Aviso{
    private $num_secuencia;
    private $num_secaviso;
    private $num_asocaviso;
    private $num_servicio;
    private $nom_plantilla;
    private $cod_tipaviso;
    private $remitente;
    private $destinatario;
    private $des_aviso;
    private $rpt_aviso;
    private $err_aviso;
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

    public function get_num_secuencia(){
    	   return $this->num_secuencia;
    }
    public function set_num_secuencia($num_secuencia){
    	   $this->num_secuencia=$num_secuencia;
    }
    public function get_num_secaviso(){
    	   return $this->num_secaviso;
    }
    public function set_num_secaviso($num_secaviso){
    	   $this->num_secaviso=$num_secaviso;
    }
    public function get_num_asocaviso(){
    	   return $this->num_asocaviso;
    }
    public function set_num_asocaviso($num_asocaviso){
    	   $this->num_asocaviso=$num_asocaviso;
    }
    public function get_num_servicio(){
        return $this->num_servicio;
    }
    public function set_num_servicio($num_servicio){
        $this->num_servicio=$num_servicio;
    }
    public function get_nom_plantilla(){
        return $this->nom_plantilla;
    }
    public function set_nom_plantilla($nom_plantilla){
        $this->nom_plantilla=$nom_plantilla;
    }
    public function get_cod_tipaviso(){
    	   return $this->cod_tipaviso;
    }
    public function set_cod_tipaviso($cod_tipaviso){
    	   $this->cod_tipaviso=$cod_tipaviso;
    }
    public function get_remitente(){
    	   return $this->remitente;
    }
    public function set_remitente($remitente){
    	   $this->remitente=$remitente;
    }
    public function get_destinatario(){
    	   return $this->destinatario;
    }
    public function set_destinatario($destinatario){
    	   $this->destinatario=$destinatario;
    }
    public function get_des_aviso(){
    	   return $this->des_aviso;
    }
    public function set_des_aviso($des_aviso){
    	   $this->des_aviso=$des_aviso;
    }
    public function get_rpt_aviso(){
    	   return $this->rpt_aviso;
    }
    public function set_rpt_aviso($rpt_aviso){
    	   $this->rpt_aviso=$rpt_aviso;
    }
    public function get_err_aviso(){
        return $this->err_aviso;
    }
    public function set_err_aviso($err_aviso){
            $this->err_aviso=$err_aviso;
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
            "num_secuencia" => $this->num_secuencia,
            "num_secaviso" => $this->num_secaviso,
            "num_asocaviso" => $this->num_asocaviso,
            "num_servicio" => $this->num_servicio,
            "nom_plantilla" => $this->nom_plantilla,
            "cod_tipaviso" => $this->cod_tipaviso,
            "remitente" => $this->remitente,
            "destinatario" => $this->destinatario,
            "des_aviso" => $this->des_aviso,
            "rpt_aviso" => $this->rpt_aviso,
            "err_aviso" => $this->err_aviso,
            "estado" => $this->estado,
            "del" => $this->del,
            "codusu_reg" => $this->codusu_reg,
            "fecha_reg" => $this->fecha_reg,
            "ip_reg" => $this->ip_reg,
            "host_reg" => $this->host_reg,
            "codusu_act" => $this->codusu_act,
            "fecha_act" => $this->fecha_act,
            "ip_act" => $this->ip_act,
            "host_act" => $this->host_act
	   );
    }
    public function toArrayAviso(){
        return $data = array(
            "num_secuencia" => $this->num_secuencia,
            "num_secaviso" => $this->num_secaviso,
            "num_asocaviso" => $this->num_asocaviso,
            "num_servicio" => $this->num_servicio,
            "nom_plantilla" => $this->nom_plantilla,
            "cod_tipaviso" => $this->cod_tipaviso,
            "remitente" => $this->remitente,
            "destinatario" => $this->destinatario,
            "des_aviso" => $this->des_aviso,
            "estado" => $this->estado,
            "del" => $this->del,
            "codusu_reg" => $this->codusu_reg,
            "fecha_reg" => $this->fecha_reg,
            "codusu_act" => $this->codusu_act,
            "fecha_act" => $this->fecha_act
	   );
    }
}

?>
