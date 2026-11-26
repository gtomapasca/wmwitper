<?php

class CatalogoServicioTecnico {
    private $id_cat_servicio;
    private $ruc_negocio;
    private $nombre;
    private $descripcion;
    private $precio_base;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;

    public function get_id_cat_servicio() { return $this->id_cat_servicio; }
    public function set_id_cat_servicio($id_cat_servicio) { $this->id_cat_servicio = $id_cat_servicio; }

    public function get_ruc_negocio() { return $this->ruc_negocio; }
    public function set_ruc_negocio($ruc_negocio) { $this->ruc_negocio = $ruc_negocio; }

    public function get_nombre() { return $this->nombre; }
    public function set_nombre($nombre) { $this->nombre = $nombre; }

    public function get_descripcion() { return $this->descripcion; }
    public function set_descripcion($descripcion) { $this->descripcion = $descripcion; }

    public function get_precio_base() { return $this->precio_base; }
    public function set_precio_base($precio_base) { $this->precio_base = $precio_base; }

    public function get_estado() { return $this->estado; }
    public function set_estado($estado) { $this->estado = $estado; }

    public function get_del() { return $this->del; }
    public function set_del($del) { $this->del = $del; }

    public function get_codusu_reg() { return $this->codusu_reg; }
    public function set_codusu_reg($codusu_reg) { $this->codusu_reg = $codusu_reg; }

    public function get_fecha_reg() { return $this->fecha_reg; }
    public function set_fecha_reg($fecha_reg) { $this->fecha_reg = $fecha_reg; }

    public function toArrayCatalogo() {
        return array(
            "id_cat_servicio" => $this->id_cat_servicio,
            "nombre"          => $this->nombre,
            "descripcion"     => $this->descripcion,
            "precio_base"     => $this->precio_base,
            "estado"          => $this->estado
        );
    }
}
?>
