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
// Clase Categpria:
//  - Clase TipoCategoriaProducto
// ----------------------------------------------------------------------------
// Change History:
//  29/07/2022  degui <degui@nitper.com>
//     - Se crea la calse wip_tipo_categoria
// ----------------------------------------------------------------------------

/* Clase TipoCategoriaProducto */
class TipoCategoriaProducto{
    private $cod_tipo;
    private $nom_tipo;
    private $des_tipo;
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

    public function get_cod_tipo(){
    	   return $this->cod_tipo;
    }
    public function set_cod_tipo($cod_tipo){
    	   $this->cod_tipo=$cod_tipo;
    }
    public function get_nom_tipo(){
    	   return $this->nom_tipo;
    }
    public function set_nom_tipo($nom_tipo){
    	   $this->nom_tipo=$nom_tipo;
    }
    public function get_des_tipo(){
        return $this->des_tipo;
    }
    public function set_des_tipo($des_tipo){
            $this->des_tipo=$des_tipo;
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
	   	    "cod_tipo"      => $this->cod_tipo,
		    "nom_tipo"      => $this->nom_tipo,
            "des_tipo"      => $this->des_tipo,
		    "estado" 	    => $this->estado,
	        "del" 		    => $this->del,
		    "codusu_reg" 	=> $this->codusu_reg,
            "fecha_reg" 	=> $this->fecha_reg,
            "ip_reg" 	    => $this->ip_reg,
            "host_reg" 	    => $this->host_reg,
            "codusu_act" 	=> $this->codusu_act,
            "fecha_act" 	=> $this->fecha_act,
            "ip_act" 	    => $this->ip_act,
            "host_act" 	    => $this->host_act
	   );
    }
    public function toArrayTipoCategoria(){
    	return $data = array(
            "cod_tipo"      => $this->cod_tipo,
		    "nom_tipo"      => $this->nom_tipo,
            "des_tipo"      => $this->des_tipo,
		    "estado" 	    => $this->estado,
	        "del" 		    => $this->del
	    );
    }

}

?>
