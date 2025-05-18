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
// Clase GaleriaProductoTienda:
//  - Clase GaleriaProductoTienda
// ----------------------------------------------------------------------------
// Change History:
//  18/05/2022  degui <degui@nitper.com>
//     - Se crea la calse Especificacion
// ----------------------------------------------------------------------------

/* Clase GaleriaProductoTienda */
class GaleriaProductoTienda{
    private $id_galeria;
    private $cod_producto;
    private $num_orden;
    private $fecha_creacion;
    private $cod_item;
    private $nombre;
    private $descripcion;
    private $dir_img;
    private $ruta;
    private $formato;
    private $dimensiones;
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

    public function get_id_galeria(){
    	   return $this->id_galeria;
    }
    public function set_id_galeria($id_galeria){
    	   $this->id_galeria=$id_galeria;
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
    public function get_fecha_creacion(){
        return $this->fecha_creacion;
    }
    public function set_fecha_creacion($fecha_creacion){
            $this->fecha_creacion=$fecha_creacion;
    }
    public function get_cod_item(){
        return $this->cod_item;
    }
    public function set_cod_item($cod_item){
        $this->cod_item=$cod_item;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function set_nombre($nombre){
        $this->nombre=$nombre;
    }
    public function get_descripcion(){
        return $this->descripcion;
    }
    public function set_descripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function get_dir_img(){
        return $this->dir_img;
    }
    public function set_dir_img($dir_img){
        $this->dir_img=$dir_img;
    }
    public function get_ruta(){
        return $this->ruta;
    }
    public function set_ruta($ruta){
        $this->ruta=$ruta;
    }
    public function get_formato(){
        return $this->formato;
    }
    public function set_formato($formato){
        $this->formato=$formato;
    }
    public function get_dimensiones(){
        return $this->dimensiones;
    }
    public function set_dimensiones($dimensiones){
        $this->dimensiones=$dimensiones;
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
	   	    "id_galeria"    => $this->id_galeria,
    		"cod_producto" 	=> $this->cod_producto,
            "num_orden" 	=> $this->num_orden,
            "fecha_creacion"=> $this->fecha_creacion,
            "cod_item" 	    => $this->cod_item,
            "nombre" 	    => $this->nombre,
            //"descripcion" 	=> $this->descripcion,
            "dir_img"       => $this->dir_img,
            "ruta" 	        => $this->ruta,
            "formato" 	    => $this->formato,
            "dimensiones" 	=> $this->dimensiones,
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
    public function toArrayGaleriaProd(){
    	return $data = array(
            "id_galeria"    => $this->id_galeria,
    		"cod_producto" 	=> $this->cod_producto,
            "fecha_creacion"=> $this->fecha_creacion,
            "num_orden" 	=> $this->num_orden,
            "cod_item" 	    => $this->cod_item,
            "nombre" 	    => $this->nombre,
            //"descripcion" 	=> $this->descripcion,
            "dir_img"       => $this->dir_img,
            "ruta" 	        => $this->ruta,
            "formato" 	    => $this->formato,
            "dimensiones" 	=> $this->dimensiones,
		    "estado" 	    => $this->estado,
            "fecha_act" 	=> $this->fecha_act
	   );
    }

}

?>
