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

/* Clase Usuario */
class Usuario{
    private $id_usuario;
    private $id_ctapersona;
    private $avatar;
    private $nick;
    private $email;
    private $cel;
    private $face;
    private $password;
    private $cod_tipo_usu;
    private $cod_nivel_usu;
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

    public function get_id_usuario(){
    	   return $this->id_usuario;
    }
    public function set_id_usuario($id_usuario){
    	   $this->id_usuario=$id_usuario;
    }
    public function get_id_ctapersona(){
    	   return $this->id_ctapersona;
    }
    public function set_id_ctapersona($id_ctapersona){
    	   $this->id_ctapersona=$id_ctapersona;
    }
    public function get_avatar(){
    	   return $this->avatar;
    }
    public function set_avatar($avatar){
    	   $this->avatar=$avatar;
    }
    public function get_nick(){
    	   return $this->nick;
    }
    public function set_nick($nick){
    	   $this->nick=$nick;
    }
    public function get_email(){
    	   return $this->email;
    }
    public function set_email($email){
    	   $this->email=$email;
    }
    public function get_cel(){
    	   return $this->cel;
    }
    public function set_cel($cel){
    	   $this->cel=$cel;
    }
    public function get_face(){
    	   return $this->face;
    }
    public function set_face($face){
    	   $this->face=$face;
    }
    public function get_password(){
    	   return $this->password;
    }
    public function set_password($password){
    	   $this->password=$password;
    }
    public function get_cod_tipo_usu(){
    	   return $this->cod_tipo_usu;
    }
    public function set_cod_tipo_usu($cod_tipo_usu){
    	   $this->cod_tipo_usu=$cod_tipo_usu;
    }
    public function get_cod_nivel_usu(){
    	   return $this->cod_nivel_usu;
    }
    public function set_cod_nivel_usu($cod_nivel_usu){
    	   $this->cod_nivel_usu=$cod_nivel_usu;
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
	   	"id_usuario" 	=> $this->id_usuario,
    		"id_ctapersona" => $this->id_ctapersona,
    		"avatar" 	=> $this->avatar,
		"nick" 		=> $this->nick,
    		"email" 	=> $this->email,
    		"cel" 		=> $this->cel,
    		"face" 		=> $this->face,
		"password" 	=> $this->password,
		"cod_tipo_usu" 	=> $this->cod_tipo_usu,
		"cod_nivel_usu" => $this->cod_nivel_usu,
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
    public function toArrayLogin(){
    	   return $data = array(
	   	"id_usuario" 	=> $this->id_usuario,
    		"id_ctapersona" => $this->id_ctapersona,
    		"avatar" 	=> $this->avatar,
		"nick" 		=> $this->nick,
    		"email" 	=> $this->email,
    		"cel" 		=> $this->cel,
    		"face" 		=> $this->face,
		"cod_tipo_usu" 	=> $this->cod_tipo_usu,
		"cod_nivel_usu"	=> $this->cod_nivel_usu,
		"password" 	=> $this->password,
		"estado" 	=> $this->estado
	   );
    }
}

?>
