<?php

class DetalleServicioTecnico {
    private $id_detalle;
    private $id_servicio;
    private $tipo_concepto;
    private $id_cat_servicio;
    private $cod_producto;
    private $descripcion;
    private $precio_unitario;
    private $cantidad;
    private $subtotal;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;

    public function get_id_detalle() { return $this->id_detalle; }
    public function set_id_detalle($id_detalle) { $this->id_detalle = $id_detalle; }

    public function get_id_servicio() { return $this->id_servicio; }
    public function set_id_servicio($id_servicio) { $this->id_servicio = $id_servicio; }

    public function get_tipo_concepto() { return $this->tipo_concepto; }
    public function set_tipo_concepto($tipo_concepto) { $this->tipo_concepto = $tipo_concepto; }

    public function get_id_cat_servicio() { return $this->id_cat_servicio; }
    public function set_id_cat_servicio($id_cat_servicio) { $this->id_cat_servicio = $id_cat_servicio; }

    public function get_cod_producto() { return $this->cod_producto; }
    public function set_cod_producto($cod_producto) { $this->cod_producto = $cod_producto; }

    public function get_descripcion() { return $this->descripcion; }
    public function set_descripcion($descripcion) { $this->descripcion = $descripcion; }

    public function get_precio_unitario() { return $this->precio_unitario; }
    public function set_precio_unitario($precio_unitario) { $this->precio_unitario = $precio_unitario; }

    public function get_cantidad() { return $this->cantidad; }
    public function set_cantidad($cantidad) { $this->cantidad = $cantidad; }

    public function get_subtotal() { return $this->subtotal; }
    public function set_subtotal($subtotal) { $this->subtotal = $subtotal; }

    public function get_estado() { return $this->estado; }
    public function set_estado($estado) { $this->estado = $estado; }

    public function get_del() { return $this->del; }
    public function set_del($del) { $this->del = $del; }

    public function get_codusu_reg() { return $this->codusu_reg; }
    public function set_codusu_reg($codusu_reg) { $this->codusu_reg = $codusu_reg; }

    public function get_fecha_reg() { return $this->fecha_reg; }
    public function set_fecha_reg($fecha_reg) { $this->fecha_reg = $fecha_reg; }

    public function toArrayDetalle() {
        return array(
            "id_detalle"      => $this->id_detalle,
            "id_servicio"     => $this->id_servicio,
            "tipo_concepto"   => $this->tipo_concepto,
            "id_cat_servicio" => $this->id_cat_servicio,
            "cod_producto"    => $this->cod_producto,
            "descripcion"     => $this->descripcion,
            "precio_unitario" => $this->precio_unitario,
            "cantidad"        => $this->cantidad,
            "subtotal"        => $this->subtotal
        );
    }
}
?>
