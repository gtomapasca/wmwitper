<?php
// ----------------------------------------------------------------------------
// Copyright 2022, Nitper, Inc.
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
//  05/05/2022  degui <degui@nitper.com>
//     - Se crea la calse Especificacion
// ----------------------------------------------------------------------------

/* Clase Especificacion */
class Especificacion{
    private $id_especificacion;
    private $cod_producto;
    private $num_orden;
    private $clave;
    private $valor;
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

    public function get_id_especificacion(){
    	   return $this->id_especificacion;
    }
    public function set_id_especificacion($id_especificacion){
    	   $this->id_especificacion=$id_especificacion;
    }
    public function get_cod_producto(){
    	   return $this->cod_producto;
    }
    public function set_cod_producto($cod_producto){
    	   $this->cod_producto=$cod_producto;
    }
    public function get_num_orden(){
    	   return $this->num_orden;
    }
    public function set_num_orden($num_orden){
    	   $this->num_orden=$num_orden;
    }
    public function get_clave(){
        return $this->clave;
    }
    public function set_clave($clave){
            $this->clave=$clave;
    }
    public function get_valor(){
        return $this->valor;
    }
    public function set_valor($valor){
        $this->valor=$valor;
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
	   	    "id_especificacion" => $this->id_especificacion,
    		"cod_producto" 	    => $this->cod_producto,
            "num_orden" 	    => $this->num_orden,
            "clave" 	    => $this->clave,
            "valor" 	    => $this->valor,
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
    public function toArrayEspecificacion(){
    	return $data = array(
            "id_especificacion" => $this->id_especificacion,
            "cod_producto"   	=> $this->cod_producto,
            "num_orden" 	    => $this->num_orden,
            "clave" 	        => $this->clave,
            "valor" 	        => $this->valor,
            "estado" 	        => $this->estado,
            "fecha_reg" 	    => $this->fecha_reg
	   );
    }

}

?>
