<?php

class EquipoCliente {
    private $id_equipo;
    private $ruc_negocio;
    private $id_ctapersona;
    private $tipo_equipo;
    private $marca;
    private $modelo;
    private $numero_serie;
    private $caracteristicas;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;

    public function get_id_equipo() { return $this->id_equipo; }
    public function set_id_equipo($id_equipo) { $this->id_equipo = $id_equipo; }

    public function get_ruc_negocio() { return $this->ruc_negocio; }
    public function set_ruc_negocio($ruc_negocio) { $this->ruc_negocio = $ruc_negocio; }

    public function get_id_ctapersona() { return $this->id_ctapersona; }
    public function set_id_ctapersona($id_ctapersona) { $this->id_ctapersona = $id_ctapersona; }

    public function get_tipo_equipo() { return $this->tipo_equipo; }
    public function set_tipo_equipo($tipo_equipo) { $this->tipo_equipo = $tipo_equipo; }

    public function get_marca() { return $this->marca; }
    public function set_marca($marca) { $this->marca = $marca; }

    public function get_modelo() { return $this->modelo; }
    public function set_modelo($modelo) { $this->modelo = $modelo; }

    public function get_numero_serie() { return $this->numero_serie; }
    public function set_numero_serie($numero_serie) { $this->numero_serie = $numero_serie; }

    public function get_caracteristicas() { return $this->caracteristicas; }
    public function set_caracteristicas($caracteristicas) { $this->caracteristicas = $caracteristicas; }

    public function get_estado() { return $this->estado; }
    public function set_estado($estado) { $this->estado = $estado; }

    public function get_del() { return $this->del; }
    public function set_del($del) { $this->del = $del; }

    public function get_codusu_reg() { return $this->codusu_reg; }
    public function set_codusu_reg($codusu_reg) { $this->codusu_reg = $codusu_reg; }

    public function get_fecha_reg() { return $this->fecha_reg; }
    public function set_fecha_reg($fecha_reg) { $this->fecha_reg = $fecha_reg; }

    public function toArrayEquipo() {
        return array(
            "id_equipo"       => $this->id_equipo,
            "id_ctapersona"   => $this->id_ctapersona,
            "tipo_equipo"     => $this->tipo_equipo,
            "marca"           => $this->marca,
            "modelo"          => $this->modelo,
            "numero_serie"    => $this->numero_serie,
            "caracteristicas" => $this->caracteristicas,
            "estado"          => $this->estado
        );
    }
}
?>
