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

/* Clase Pedido */
class Pedido{
    private $id_pedido;
    private $id_usuario;
    private $nro_pedido;
    private $medio_pago;
    private $comentario;
    private $carrito_nropedido;
    private $carrito_dni;
    private $carrito_cliente;
    private $carrito_celular;
    private $carrito_email;
    private $carrito_direccion;
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

    public function get_id_pedido(){
    	   return $this->id_pedido;
    }
    public function set_id_pedido($id_pedido){
    	   $this->id_pedido=$id_pedido;
    }
    public function get_id_usuario(){
    	   return $this->id_usuario;
    }
    public function set_id_usuario($id_usuario){
    	   $this->id_usuario=$id_usuario;
    }
    public function get_nro_pedido(){
    	   return $this->nro_pedido;
    }
    public function set_nro_pedido($nro_pedido){
    	   $this->nro_pedido=$nro_pedido;
    }
    public function get_medio_pago(){
    	   return $this->medio_pago;
    }
    public function set_medio_pago($medio_pago){
    	   $this->medio_pago=$medio_pago;
    }
    public function get_comentario(){
    	   return $this->comentario;
    }
    public function set_comentario($comentario){
    	   $this->comentario=$comentario;
    }
    public function get_carrito_nropedido(){
    	   return $this->carrito_nropedido;
    }
    public function set_carrito_nropedido($carrito_nropedido){
    	   $this->carrito_nropedido=$carrito_nropedido;
    }
    public function get_carrito_dni(){
    	   return $this->carrito_dni;
    }
    public function set_carrito_dni($carrito_dni){
    	   $this->carrito_dni=$carrito_dni;
    }
    public function get_carrito_cliente(){
    	   return $this->carrito_cliente;
    }
    public function set_carrito_cliente($carrito_cliente){
    	   $this->carrito_cliente=$carrito_cliente;
    }
    public function get_carrito_celular(){
    	   return $this->carrito_celular;
    }
    public function set_carrito_celular($carrito_celular){
    	   $this->carrito_celular=$carrito_celular;
    }
    public function get_carrito_email(){
    	   return $this->carrito_email;
    }
    public function set_carrito_email($carrito_email){
    	   $this->carrito_email=$carrito_email;
    }
    public function get_carrito_direccion(){
    	   return $this->carrito_direccion;
    }
    public function set_carrito_direccion($carrito_direccion){
    	   $this->carrito_direccion=$carrito_direccion;
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
	   	"id_pedido" 		=> $this->id_pedido,
    		"id_usuario" 		=> $this->id_usuario,
    		"nro_pedido" 		=> $this->nro_pedido,
		"medio_pago" 		=> $this->medio_pago,
    		"comentario" 		=> $this->comentario,
    		"carrito_nropedido" 	=> $this->carrito_nropedido,
    		"carrito_dni" 		=> $this->carrito_dni,
		"carrito_cliente" 	=> $this->carrito_cliente,
		"carrito_celular" 	=> $this->carrito_celular,
		"carrito_email" 	=> $this->carrito_email,
		"carrito_direccion" 	=> $this->carrito_direccion,
		"estado" 		=> $this->estado,
	        "del" 			=> $this->del,
		"codusu_reg" 		=> $this->codusu_reg,
		"fecha_reg" 		=> $this->fecha_reg,
		"ip_reg" 		=> $this->ip_reg,
		"host_reg" 		=> $this->host_reg,
		"codusu_act" 		=> $this->codusu_act,
		"fecha_act" 		=> $this->fecha_act,
		"ip_act" 		=> $this->ip_act,
		"host_act" 		=> $this->host_act
	   );
    }
    public function toArrayPedido(){
    	   return $data = array(
	   	"id_pedido" 		=> $this->id_pedido,
    		"id_usuario" 		=> $this->id_usuario,
    		"nro_pedido" 		=> $this->nro_pedido,
		"medio_pago" 		=> $this->medio_pago,
    		"comentario" 		=> $this->comentario,
    		"carrito_nropedido" 	=> $this->carrito_nropedido,
    		"carrito_dni" 		=> $this->carrito_dni,
		"carrito_cliente" 	=> $this->carrito_cliente,
		"carrito_celular" 	=> $this->carrito_celular,
		"carrito_email" 	=> $this->carrito_email,
		"carrito_direccion" 	=> $this->carrito_direccion,
		"estado" 		=> $this->estado,
		"fecha_reg" 		=> $this->fecha_reg
	   );
    }

}

?>
