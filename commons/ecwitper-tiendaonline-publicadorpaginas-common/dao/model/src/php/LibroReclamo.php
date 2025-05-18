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
//  - Clase LibroReclamo
// ----------------------------------------------------------------------------
// Change History:
//  08/10/2019  degui <degui@nitper.com>
//     - Se crea la calse LibroReclamo
// ----------------------------------------------------------------------------

/* Clase LibroReclamo */
class LibroReclamo{
    private $id_libro;
    private $ruc_negocio;
    private $id_usuario;
    private $cod_tipdoc;
    private $num_tipdoc;
    private $cli_dni;
    private $cli_nombre;
    private $cli_telf;
    private $cli_cel;
    private $cli_email;
    private $cli_domicilio;
    private $cli_departamento;
    private $cli_provincia;
    private $cli_distrito;
    private $cli_pedido;
    private $cod_tipcomp;
    private $nro_compra;
    private $fec_compra;
    private $cod_producto;
    private $des_producto;
    private $can_producto;
    private $pre_producto;
    private $tipo_motivo;
    private $desc_motivo;
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

    public function get_id_libro(){
    	   return $this->id_libro;
    }
    public function set_id_libro($id_libro){
    	   $this->id_libro=$id_libro;
    }
    public function get_ruc_negocio(){
    	   return $this->ruc_negocio;
    }
    public function set_ruc_negocio($ruc_negocio){
    	   $this->ruc_negocio=$ruc_negocio;
    }
    public function get_id_usuario(){
    	   return $this->id_usuario;
    }
    public function set_id_usuario($id_usuario){
    	   $this->id_usuario=$id_usuario;
    }
    public function get_cod_tipdoc(){
        return $this->cod_tipdoc;
    }
    public function set_cod_tipdoc($cod_tipdoc){
        $this->cod_tipdoc=$cod_tipdoc;
    }
    public function get_num_tipdoc(){
        return $this->num_tipdoc;
    }
    public function set_num_tipdoc($num_tipdoc){
        $this->num_tipdoc=$num_tipdoc;
    }
    public function get_cli_dni(){
    	   return $this->cli_dni;
    }
    public function set_cli_dni($cli_dni){
    	   $this->cli_dni=$cli_dni;
    }
    public function get_cli_nombre(){
    	   return $this->cli_nombre;
    }
    public function set_cli_nombre($cli_nombre){
    	   $this->cli_nombre=$cli_nombre;
    }
    public function get_cli_telf(){
    	   return $this->cli_telf;
    }
    public function set_cli_telf($cli_telf){
    	   $this->cli_telf=$cli_telf;
    }
    public function get_cli_cel(){
    	   return $this->cli_cel;
    }
    public function set_cli_cel($cli_cel){
    	   $this->cli_cel=$cli_cel;
    }
    public function get_cli_email(){
    	   return $this->cli_email;
    }
    public function set_cli_email($cli_email){
    	   $this->cli_email=$cli_email;
    }
    public function get_cli_domicilio(){
    	   return $this->cli_domicilio;
    }
    public function set_cli_domicilio($cli_domicilio){
    	   $this->cli_domicilio=$cli_domicilio;
    }
    public function get_cli_departamento(){
    	   return $this->cli_departamento;
    }
    public function set_($cli_departamento){
    	   $this->cli_departamento=$cli_departamento;
    }
    public function get_cli_provincia(){
    	   return $this->cli_provincia;
    }
    public function set_cli_provincia($cli_provincia){
    	   $this->cli_provincia=$cli_provincia;
    }
    public function get_cli_distrito(){
    	   return $this->cli_distrito;
    }
    public function set_cli_distrito($cli_distrito){
    	   $this->cli_distrito=$cli_distrito;
    }
    public function get_cli_pedido(){
    	   return $this->cli_pedido;
    }
    public function set_cli_pedido($cli_pedido){
    	   $this->cli_pedido=$cli_pedido;
    }
    public function get_cod_tipcomp(){
        return $this->cod_tipcomp;
    }
    public function set_cod_tipcomp($cod_tipcomp){
        $this->cod_tipcomp=$cod_tipcomp;
    }
    public function get_nro_compra(){
    	   return $this->nro_compra;
    }
    public function set_nro_compra($nro_compra){
    	   $this->nro_compra=$nro_compra;
    }
    public function get_fec_compra(){
    	   return $this->fec_compra;
    }
    public function set_fec_compra($fec_compra){
    	   $this->fec_compra=$fec_compra;
    }
    public function get_cod_producto(){
    	   return $this->cod_producto;
    }
    public function set_cod_producto($cod_producto){
    	   $this->cod_producto=$cod_producto;
    }
    public function get_des_producto(){
    	   return $this->des_producto;
    }
    public function set_des_producto($des_producto){
    	   $this->des_producto=$des_producto;
    }
    public function get_can_producto(){
    	   return $this->can_producto;
    }
    public function set_can_producto($can_producto){
    	   $this->can_producto=$can_producto;
    }
    public function get_pre_producto(){
    	   return $this->pre_producto;
    }
    public function set_pre_producto($pre_producto){
    	   $this->pre_producto=$pre_producto;
    }
    public function get_tipo_motivo(){
    	   return $this->tipo_motivo;
    }
    public function set_tipo_motivo($tipo_motivo){
    	   $this->tipo_motivo=$tipo_motivo;
    }
    public function get_desc_motivo(){
    	   return $this->desc_motivo;
    }
    public function set_desc_motivo($desc_motivo){
    	   $this->desc_motivo=$desc_motivo;
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
            "id_libro" => $this->id_libro,
            "ruc_negocio" => $this->ruc_negocio,
            "id_usuario" => $this->id_usuario,
            "cod_tipdoc" => $this->cod_tipdoc,
            "num_tipdoc" => $this->num_tipdoc,
            "cli_dni" => $this->cli_dni,
            "cli_nombre" => $this->cli_nombre,
            "cli_telf" => $this->cli_telf,
            "cli_cel" => $this->cli_cel,
            "cli_email" => $this->cli_email,
            "cli_domicilio" => $this->cli_domicilio,
            "cli_departamento" => $this->cli_departamento,
            "cli_provincia" => $this->cli_provincia,
            "cli_distrito" => $this->cli_distrito,
            "cli_pedido" => $this->cli_pedido,
            "cod_tipcomp" => $this->cod_tipcomp,
            "nro_compra" => $this->nro_compra,
            "fec_compra" => $this->fec_compra,
            "cod_producto" => $this->cod_producto,
            "des_producto" => $this->des_producto,
            "can_producto" => $this->can_producto,
            "pre_producto" => $this->pre_producto,
            "tipo_motivo" => $this->tipo_motivo,
            "desc_motivo" => $this->desc_motivo,
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
