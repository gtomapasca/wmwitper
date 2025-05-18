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
//  - Clase Programa
// ----------------------------------------------------------------------------
// Change History:
//  09/02/2020  degui <degui@nitper.com>
//     - Se crea la calse Programa
// ----------------------------------------------------------------------------

/* Clase Programa */
class Programa{
    private $cod_programa;
    private $cod_meta_prog;
    private $nro_prog;
    private $nom_prog;
    private $cod_page;
    private $nom_page;
    private $dir_page;
    private $contexto;
    private $vigencia_ini;
    private $vigencia_fin;
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

    public function get_cod_programa(){
    	   return $this->cod_programa;
    }
    public function set_cod_programa($cod_programa){
    	   $this->cod_programa=$cod_programa;
    }
    public function get_cod_meta_prog(){
    	   return $this->cod_meta_prog;
    }
    public function set_cod_meta_prog($cod_meta_prog){
    	   $this->cod_meta_prog=$cod_meta_prog;
    }
    public function get_nro_prog(){
    	   return $this->nro_prog;
    }
    public function set_nro_prog($nro_prog){
    	   $this->nro_prog=$nro_prog;
    }
    public function get_nom_prog(){
    	   return $this->nom_prog;
    }
    public function set_nom_prog($nom_prog){
    	   $this->nom_prog=$nom_prog;
    }
    public function get_cod_page(){
    	   return $this->cod_page;
    }
    public function set_cod_page($cod_page){
    	   $this->cod_page=$cod_page;
    }
    public function get_nom_page(){
    	   return $this->nom_page;
    }
    public function set_nom_page($nom_page){
    	   $this->nom_page=$nom_page;
    }
    public function get_dir_page(){
    	   return $this->dir_page;
    }
    public function set_dir_page($dir_page){
    	   $this->dir_page=$dir_page;
    }
    public function get_contexto(){
    	   return $this->contexto;
    }
    public function set_contexto($contexto){
    	   $this->contexto=$contexto;
    }
    public function get_vigencia_ini(){
    	   return $this->vigencia_ini;
    }
    public function set_vigencia_ini($vigencia_ini){
    	   $this->vigencia_ini=$vigencia_ini;
    }
     public function get_vigencia_fin(){
    	   return $this->vigencia_fin;
    }
    public function set_vigencia_fin($vigencia_fin){
    	   $this->vigencia_fin=$vigencia_fin;
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
	   	"cod_programa" => $this->cod_programa,
    		"cod_meta_prog" => $this->cod_meta_prog,
    		"nro_prog" => $this->nro_prog,
		"nom_prog" => $this->nom_prog,
    		"cod_page" => $this->cod_page,
    		"nom_page" => $this->nom_page,
    		"dir_page" => $this->dir_page,
		"contexto" => $this->contexto,
		"vigencia_ini" => $this->vigencia_ini,
		"vigencia_fin" => $this->vigencia_fin,
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
