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
//  - Clase Usuario
// ----------------------------------------------------------------------------
// Change History:
//  30/08/2019  degui <degui@nitper.com>
//     - Se crea la calse Usuario
// ----------------------------------------------------------------------------

/* Clase Cliente */
class Cliente{
    private $id_ctapersona;
    private $tipo_usu;
    private $doc_tip;
    private $doc_num;
    private $fecha_nac;
    private $nombres;
    private $ape_pat;
    private $ape_mat;
    private $telefono;
    private $celular;
    private $email;
    private $direccion;
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

    public function get_id_ctapersona(){
    	   return $this->id_ctapersona;
    }
    public function set_id_ctapersona($id_ctapersona){
    	   $this->id_ctapersona=$id_ctapersona;
    }
    public function get_tipo_usu(){
    	   return $this->tipo_usu;
    }
    public function set_tipo_usu($tipo_usu){
    	   $this->tipo_usu=$tipo_usu;
    }
    public function get_doc_tip(){
    	   return $this->doc_tip;
    }
    public function set_doc_tip($doc_tip){
    	   $this->doc_tip=$doc_tip;
    }
    public function get_doc_num(){
    	   return $this->doc_num;
    }
    public function set_doc_num($doc_num){
    	   $this->doc_num=$doc_num;
    }
    public function get_fecha_nac(){
    	   return $this->fecha_nac;
    }
    public function set_fecha_nac($fecha_nac){
    	   $this->fecha_nac=$fecha_nac;
    }
    public function get_nombres(){
    	   return $this->nombres;
    }
    public function set_nombres($nombres){
    	   $this->nombres=$nombres;
    }
    public function get_ape_pat(){
    	   return $this->ape_pat;
    }
    public function set_ape_pat($ape_pat){
    	   $this->ape_pat=$ape_pat;
    }
    public function get_ape_mat(){
    	   return $this->ape_mat;
    }
    public function set_ape_mat($ape_mat){
    	   $this->ape_mat=$ape_mat;
    }
    public function get_telefono(){
    	   return $this->telefono;
    }
    public function set_telefono($telefono){
    	   $this->telefono=$telefono;
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
    public function get_direccion(){
    	   return $this->direccion;
    }
    public function set_direccion($direccion){
    	   $this->direccion=$direccion;
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
	   	"id_ctapersona" => $this->id_ctapersona,
    		"tipo_usu" 	=> $this->tipo_usu,
    		"doc_tip" 	=> $this->doc_tip,
		"doc_num" 	=> $this->doc_num,
    		"fecha_nac" 	=> $this->fecha_nac,
    		"nombres" 	=> $this->nombres,
    		"ape_pat" 	=> $this->ape_pat,
		"ape_mat" 	=> $this->ape_mat,
		"telefono" 	=> $this->telefono,
		"celular" 	=> $this->celular,
		"email" 	=> $this->email,
		"direccion" 	=> $this->direccion,
		"estado" 	=> $this->estado,
	        "del" 		=> $this->del,
		"codusu_reg" 	=> $this->codusu_reg,
		"fecha_reg" 	=> $this->fecha_reg,
		"ip_reg" 	=> $this->ip_reg,
		"host_reg" 	=> $this->host_reg,
		"codusu_act" 	=> $this->codusu_act,
		"fecha_act" 	=> $this->fecha_act,
		"ip_act" 	=> $this->ip_act,
		"host_act" 	=> $this->host_act
	   );
    }
    public function toArrayCliente(){
    	   return $data = array(
	   	"id_ctapersona" => $this->id_ctapersona,
    		"tipo_usu" 	=> $this->tipo_usu,
    		"doc_tip" 	=> $this->doc_tip,
		"doc_num" 	=> $this->doc_num,
    		"fecha_nac" 	=> $this->fecha_nac,
    		"nombres" 	=> $this->nombres,
    		"ape_pat" 	=> $this->ape_pat,
		"ape_mat" 	=> $this->ape_mat,
		"telefono" 	=> $this->telefono,
		"celular" 	=> $this->celular,
		"email" 	=> $this->email,
		"direccion" 	=> $this->direccion,
		"estado" 	=> $this->estado,
		"fecha_reg" 	=> $this->fecha_reg
	   );
    }

}

?>
