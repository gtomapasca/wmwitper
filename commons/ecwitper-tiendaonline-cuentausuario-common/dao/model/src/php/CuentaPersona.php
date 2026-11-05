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
// Clase CuentaPersona:
//  - Clase CuentaPersona
// ----------------------------------------------------------------------------
// Change History:
//  28/10/2026  degui <degui@nitper.com>
//     - Se crea la calse CuentaPersona
// ----------------------------------------------------------------------------

/* Clase CuentaPersona */
class CuentaPersona{

    private $id_ctapersona;
    private $ruc_negocio;
    private $tipo_cuenta;
    private $doc_tip;
    private $doc_num;
    private $fecha_nac;
    private $nombres;
    private $ape_pat;
    private $ape_mat;
    private $fotografia;
    private $telefono;
    private $celular;
    private $email;
    private $cod_appreg;
    private $cod_appact;
    private $direccion;
    private $ciudad;
    private $provincia;
    private $distrito;
    private $tipo_tarjeta;
    private $nro_tarjeta;
    private $fec_inivig;
    private $fec_finvig;
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
    public function get_ruc_negocio(){
    	   return $this->ruc_negocio;
    }
    public function set_ruc_negocio($ruc_negocio){
    	   $this->ruc_negocio=$ruc_negocio;
    }
    public function get_tipo_cuenta(){
    	   return $this->tipo_cuenta;
    }
    public function set_tipo_cuenta($tipo_cuenta){
    	   $this->tipo_cuenta=$tipo_cuenta;
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
    public function get_fotografia(){
    	   return $this->fotografia;
    }
    public function set_fotografia($fotografia){
    	   $this->fotografia=$fotografia;
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
    public function get_cod_appreg(){
    	   return $this->cod_appreg;
    }
    public function set_cod_appreg($cod_appreg){
    	   $this->cod_appreg=$cod_appreg;
    }
    public function get_cod_appact(){
    	   return $this->cod_appact;
    }
    public function set_cod_appact($cod_appact){
    	   $this->cod_appact=$cod_appact;
    }
    public function get_direccion(){
    	   return $this->direccion;
    }
    public function set_direccion($direccion){
    	   $this->direccion=$direccion;
    }
    public function get_ciudad(){
    	   return $this->ciudad;
    }
    public function set_ciudad($ciudad){
    	   $this->ciudad=$ciudad;
    }
    public function get_provincia(){
    	   return $this->provincia;
    }
    public function set_provincia($provincia){
    	   $this->provincia=$provincia;
    }
    public function get_distrito(){
    	   return $this->distrito;
    }
    public function set_distrito($distrito){
    	   $this->distrito=$distrito;
    }
    public function get_tipo_tarjeta(){
    	   return $this->tipo_tarjeta;
    }
    public function set_tipo_tarjeta($tipo_tarjeta){
    	   $this->tipo_tarjeta=$tipo_tarjeta;
    }
    public function get_nro_tarjeta(){
    	   return $this->nro_tarjeta;
    }
    public function set_nro_tarjeta($nro_tarjeta){
    	   $this->nro_tarjeta=$nro_tarjeta;
    }
    public function get_fec_inivig(){
    	   return $this->fec_inivig;
    }
    public function set_fec_inivig($fec_inivig){
    	   $this->fec_inivig=$fec_inivig;
    }
    public function get_fec_finvig(){
    	   return $this->fec_finvig;
    }
    public function set_fec_finvig($fec_finvig){
    	   $this->fec_finvig=$fec_finvig;
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
    	return array(
	   	    "id_ctapersona" 	=> $this->id_ctapersona,
    		"ruc_negocio" 		=> $this->ruc_negocio,
            "tipo_cuenta" 		=> $this->tipo_cuenta,
    		"doc_tip" 			=> $this->doc_tip,
            "doc_num" 			=> $this->doc_num,
    		"fecha_nac" 		=> $this->fecha_nac,
            "nombres" 			=> $this->nombres,
            "ape_pat" 			=> $this->ape_pat,
            "ape_mat" 			=> $this->ape_mat,
            "fotografia" 		=> $this->fotografia,
            "telefono" 			=> $this->telefono,
            "celular" 			=> $this->celular,
            "email" 			=> $this->email,
            "cod_appreg" 		=> $this->cod_appreg,
            "cod_appact" 		=> $this->cod_appact,
            "direccion" 		=> $this->direccion,
            "ciudad" 			=> $this->ciudad,
            "provincia" 		=> $this->provincia,
            "distrito" 			=> $this->distrito,
            "tipo_tarjeta" 		=> $this->tipo_tarjeta,
            "nro_tarjeta" 		=> $this->nro_tarjeta,
            "fec_inivig" 		=> $this->fec_inivig,
            "fec_finvig" 		=> $this->fec_finvig,
            "estado" 			=> $this->estado,
            "del" 				=> $this->del,
            "codusu_reg" 		=> $this->codusu_reg,
            "fecha_reg" 		=> $this->fecha_reg,
            "ip_reg" 			=> $this->ip_reg,
            "host_reg" 			=> $this->host_reg,
            "codusu_act" 		=> $this->codusu_act,
            "fecha_act" 		=> $this->fecha_act,
            "ip_act" 			=> $this->ip_act,
            "host_act" 			=> $this->host_act
        );
    }

    public function toArrayCuentaPersona(){
    	return array(
	   	    "id_ctapersona" => $this->id_ctapersona,
    		"ruc_negocio" 	=> $this->ruc_negocio,
            "tipo_cuenta" 	=> $this->tipo_cuenta,
            "nombres" 		=> $this->nombres,
            "celular" 		=> $this->celular,
            "email" 		=> $this->email,
		    "estado" 	    => $this->estado
	   );
    }

    public function toArraySecuencia(){
    	return array("valor" => 0);
    }

}

?>
