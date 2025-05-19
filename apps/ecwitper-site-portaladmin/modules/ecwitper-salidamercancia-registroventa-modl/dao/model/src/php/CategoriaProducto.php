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
//  - Clase CategoriaProducto
// ----------------------------------------------------------------------------
// Change History:
//  30/12/2021  degui <degui@nitper.com>
//     - Se crea la calse wip_categoria_producto
// ----------------------------------------------------------------------------

/* Clase CategoriaProducto */
class CategoriaProducto{
    private $cod_tipo;
    private $cod_categoria;
    private $nom_categoria;
    private $des_categoria;
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
    public function get_cod_categoria(){
    	   return $this->cod_categoria;
    }
    public function set_cod_categoria($cod_categoria){
    	   $this->cod_categoria=$cod_categoria;
    }
    public function get_nom_categoria(){
    	   return $this->nom_categoria;
    }
    public function set_nom_categoria($nom_categoria){
    	   $this->nom_categoria=$nom_categoria;
    }
    public function get_des_categoria(){
        return $this->des_categoria;
    }
    public function set_des_categoria($des_categoria){
            $this->des_categoria=$des_categoria;
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
    		"cod_categoria" => $this->cod_categoria,
		    "nom_categoria" => $this->nom_categoria,
            "des_categoria" => $this->des_categoria,
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
    public function toArrayCategoria(){
    	return $data = array(
            "cod_tipo"      => $this->cod_tipo,
    		"cod_categoria" => $this->cod_categoria,
		    "nom_categoria" => $this->nom_categoria,
            "des_categoria" => $this->des_categoria,
		    "estado" 	    => $this->estado,
	        "del" 		    => $this->del
	    );
    }

}

?>
