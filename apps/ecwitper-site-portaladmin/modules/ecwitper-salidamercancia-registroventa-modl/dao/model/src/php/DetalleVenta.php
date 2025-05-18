<?php
// ----------------------------------------------------------------------------
// Copyright 2019 - 2023, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase DetalleVenta:
//  - Clase DetalleVenta
// ----------------------------------------------------------------------------
// Change History:
//  23/03/2023  degui <degui@nitper.com>
//     - Se crea la calse DetalleVenta
// ----------------------------------------------------------------------------

/* Clase DetalleVenta */
class DetalleVenta{
    private $id_venta;
    private $cod_producto;
    private $mini_codigo;
    private $producto;
    private $tipo;
    private $cod_moneda;
    private $cod_umedida;
    private $cantidad;
    private $preciou;
    private $cod_desc;
    private $precio_desc;
    private $valor_unit;
    private $igv;
    private $monto_igv;
    private $importe;
    private $importe_igv;
    private $importe_total;
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

    public function get_id_venta(){
    	   return $this->id_venta;
    }
    public function set_id_venta($id_venta){
    	   $this->id_venta=$id_venta;
    }
    public function get_cod_producto(){
    	   return $this->cod_producto;
    }
    public function set_cod_producto($cod_producto){
    	   $this->cod_producto=$cod_producto;
    }
    public function get_mini_codigo(){
        return $this->mini_codigo;
    }
    public function set_mini_codigo($mini_codigo){
            $this->mini_codigo=$mini_codigo;
    }
    public function get_producto(){
        return $this->producto;
    }
    public function set_producto($producto){
            $this->producto=$producto;
    }
    public function get_tipo(){
        return $this->tipo;
    }
    public function set_tipo($tipo){
            $this->tipo=$tipo;
    }
    public function get_cod_moneda(){
        return $this->cod_moneda;
    }
    public function set_cod_moneda($cod_moneda){
            $this->cod_moneda=$cod_moneda;
    }
    public function get_cod_umedida(){
        return $this->cod_umedida;
    }
    public function set_cod_umedida($cod_umedida){
            $this->cod_umedida=$cod_umedida;
    }
    public function get_cantidad(){
    	   return $this->cantidad;
    }
    public function set_cantidad($cantidad){
    	   $this->cantidad=$cantidad;
    }
    public function get_preciou(){
        return $this->preciou;
    }
    public function set_preciou($preciou){
            $this->preciou=$preciou;
    }
    public function get_cod_desc(){
        return $this->cod_desc;
    }
    public function set_cod_desc($cod_desc){
            $this->cod_desc=$cod_desc;
    }
    public function get_precio_desc(){
        return $this->precio_desc;
    }
    public function set_precio_desc($precio_desc){
            $this->precio_desc=$precio_desc;
    }
    public function get_valor_unit(){
        return $this->valor_unit;
    }
    public function set_valor_unit($valor_unit){
            $this->valor_unit=$valor_unit;
    }
    public function get_igv(){
        return $this->igv;
    }
    public function set_igv($igv){
            $this->igv=$igv;
    }
    public function get_monto_igv(){
        return $this->monto_igv;
    }
    public function set_monto_igv($monto_igv){
            $this->monto_igv=$monto_igv;
    }
    public function get_importe(){
        return $this->importe;
    }
    public function set_importe($importe){
            $this->importe=$importe;
    }
    public function get_importe_igv(){
        return $this->importe_igv;
    }
    public function set_importe_igv($importe_igv){
            $this->importe_igv=$importe_igv;
    }
    public function get_importe_total(){
        return $this->importe_total;
    }
    public function set_importe_total($importe_total){
            $this->importe_total=$importe_total;
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
            "id_venta" =>  $this->id_venta,
            "cod_producto" => $this->cod_producto,
            "mini_codigo" => $this->mini_codigo,
            "producto" => $this->producto,
            "tipo" => $this->tipo,
            "cod_moneda" => $this->cod_moneda,
            "cod_umedida" => $this->cod_umedida,
            "cantidad" => $this->cantidad,
            "preciou" => $this->preciou,
            "cod_desc" => $this->cod_desc,
            "precio_desc" => $this->precio_desc,
            "valor_unit" => $this->valor_unit,
            "igv" => $this->igv,
            "monto_igv" => $this->monto_igv,
            "importe" => $this->importe,
            "importe_igv" => $this->importe_igv,
            "importe_total" => $this->importe_total,
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
    public function toArrayDetalle(){
    	return $data = array(
            "id_venta" =>  $this->id_venta,
            "cod_producto" => $this->cod_producto,
            "mini_codigo" => $this->mini_codigo,
            "producto" => $this->producto,
            "tipo" => $this->tipo,
            "cod_moneda" => $this->cod_moneda,
            "cod_umedida" => $this->cod_umedida,
            "cantidad" => $this->cantidad,
            "preciou" => $this->preciou,
            "cod_desc" => $this->cod_desc,
            "precio_desc" => $this->precio_desc,
            "valor_unit" => $this->valor_unit,
            "igv" => $this->igv,
            "monto_igv" => $this->monto_igv,
            "importe" => $this->importe,
            "importe_igv" => $this->importe_igv,
            "importe_total" => $this->importe_total,
            "estado" => $this->estado,
            "del" => $this->del,
            "fecha_reg" => $this->fecha_reg,
            "fecha_act" => $this->fecha_act
	   );
    }

   

}

?>
