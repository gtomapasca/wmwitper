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
//  - Clase Suscripcion
// ----------------------------------------------------------------------------
// Change History:
//  02/04/2024  degui <degui@nitper.com>
//     - Se crea la calse Suscripcion
// ----------------------------------------------------------------------------

/* Clase Suscripcion */
class Suscripcion{
    private $id_suscripcion;
    private $ruc_negocio;
    private $nombre;
    private $celular;
    private $email;
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

    public function get_id_suscripcion(){
    	   return $this->id_suscripcion;
    }
    public function set_id_suscripcion($id_suscripcion){
    	   $this->id_suscripcion=$id_suscripcion;
    }
    public function get_ruc_negocio(){
    	   return $this->ruc_negocio;
    }
    public function set_ruc_negocio($ruc_negocio){
    	   $this->ruc_negocio=$ruc_negocio;
    }
    public function get_nombre(){
    	   return $this->nombre;
    }
    public function set_nombre($nombre){
    	   $this->nombre=$nombre;
    }
    public function get_celular(){
        return $this->celular;
    }
    public function set_celular($celular){
        $this->celular=$celular;
    }
    public function get_email(){
        return $this->email;
    }
    public function set_email($email){
        $this->email=$email;
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
            "id_suscripcion" => $this->id_suscripcion,
            "ruc_negocio" => $this->ruc_negocio,
            "nombre" => $this->nombre,
            "celular" => $this->celular,
            "email" => $this->email,
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
    public function toArraySuscribir(){
        return $data = array(
            "id_suscripcion" => $this->id_suscripcion,
            "ruc_negocio" => $this->ruc_negocio,
            "nombre" => $this->nombre,
            "celular" => $this->celular,
            "email" => $this->email,
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
}

?>
