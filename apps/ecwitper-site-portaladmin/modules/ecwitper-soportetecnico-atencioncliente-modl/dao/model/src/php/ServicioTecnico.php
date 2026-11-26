<?php

class ServicioTecnico {
    private $id_servicio;
    private $codigo_servicio;
    private $id_cotizacion_origen;
    private $ruc_negocio;
    private $id_ctapersona;
    private $id_equipo;
    private $id_usuario;
    private $tipo_comprobante;
    private $fecha_ingreso;
    private $accesorios;
    private $falla_reportada;
    private $observacion;
    private $cotizacion_estimada;
    private $costo_total;
    private $estado_servicio;
    private $motivo_estado;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;

    // Campos auxiliares para consultas con JOIN
    private $doc_tip;
    private $doc_num;
    private $cliente_nombre;
    private $equipo_detalle;
    private $modelo;
    private $numero_serie;

    //campos para imprimir la ficha recepcion del equipo
    private $telefono;
    private $correo;
    private $direccion;
    private $tipo_equipo;
    private $marca;


    //agregamos para poder ver la cotizacion de origen
    public function get_codigo_cotizacion_origen() { return $this->codigo_cotizacion_origen; }
    public function set_codigo_cotizacion_origen($v) { $this->codigo_cotizacion_origen = $v; }
    //fin
    public function get_id_servicio() { return $this->id_servicio; }
    public function set_id_servicio($v) { $this->id_servicio = $v; }

    public function get_codigo_servicio() { return $this->codigo_servicio; }
    public function set_codigo_servicio($v) { $this->codigo_servicio = $v; }

    public function get_id_cotizacion_origen() { return $this->id_cotizacion_origen; }
    public function set_id_cotizacion_origen($v) { $this->id_cotizacion_origen = $v; }

    public function get_ruc_negocio() { return $this->ruc_negocio; }
    public function set_ruc_negocio($v) { $this->ruc_negocio = $v; }

    public function get_id_ctapersona() { return $this->id_ctapersona; }
    public function set_id_ctapersona($v) { $this->id_ctapersona = $v; }

    public function get_id_equipo() { return $this->id_equipo; }
    public function set_id_equipo($v) { $this->id_equipo = $v; }

    public function get_id_usuario() { return $this->id_usuario; }
    public function set_id_usuario($v) { $this->id_usuario = $v; }

    public function get_tipo_comprobante() { return $this->tipo_comprobante; }
    public function set_tipo_comprobante($v) { $this->tipo_comprobante = $v; }

    public function get_fecha_ingreso() { return $this->fecha_ingreso; }
    public function set_fecha_ingreso($v) { $this->fecha_ingreso = $v; }

    public function get_accesorios() { return $this->accesorios; }
    public function set_accesorios($v) { $this->accesorios = $v; }

    public function get_falla_reportada() { return $this->falla_reportada; }
    public function set_falla_reportada($v) { $this->falla_reportada = $v; }

    public function get_observacion() { return $this->observacion; }
    public function set_observacion($v) { $this->observacion = $v; }

    public function get_cotizacion_estimada() { return $this->cotizacion_estimada; }
    public function set_cotizacion_estimada($v) { $this->cotizacion_estimada = $v; }

    public function get_costo_total() { return $this->costo_total; }
    public function set_costo_total($v) { $this->costo_total = $v; }

    public function get_estado_servicio() { return $this->estado_servicio; }
    public function set_estado_servicio($v) { $this->estado_servicio = $v; }

    public function get_motivo_estado() { return $this->motivo_estado; }
    public function set_motivo_estado($v) { $this->motivo_estado = $v; }

    public function get_estado() { return $this->estado; }
    public function set_estado($v) { $this->estado = $v; }

    public function get_del() { return $this->del; }
    public function set_del($v) { $this->del = $v; }

    public function get_codusu_reg() { return $this->codusu_reg; }
    public function set_codusu_reg($v) { $this->codusu_reg = $v; }

    public function get_fecha_reg() { return $this->fecha_reg; }
    public function set_fecha_reg($v) { $this->fecha_reg = $v; }

    public function get_doc_tip() { return $this->doc_tip; }
    public function set_doc_tip($v) { $this->doc_tip = $v; }

    public function get_doc_num() { return $this->doc_num; }
    public function set_doc_num($v) { $this->doc_num = $v; }

    public function get_cliente_nombre() { return $this->cliente_nombre; }
    public function set_cliente_nombre($v) { $this->cliente_nombre = $v; }

    public function get_equipo_detalle() { return $this->equipo_detalle; }
    public function set_equipo_detalle($v) { $this->equipo_detalle = $v; }

    public function get_modelo() { return $this->modelo; }
    public function set_modelo($v) { $this->modelo = $v; }

    public function get_numero_serie() { return $this->numero_serie; }
    public function set_numero_serie($v) { $this->numero_serie = $v; }

    public function toArrayBandeja() {
        return array(
            "id_servicio"     => &$this->id_servicio,
            "codigo_servicio" => &$this->codigo_servicio,
            "fecha_ingreso"   => &$this->fecha_ingreso,
            "doc_num"         => &$this->doc_num,
            "cliente_nombre"  => &$this->cliente_nombre,
            "equipo_detalle"  => &$this->equipo_detalle,
            "estado_servicio" => &$this->estado_servicio
        );
    }


    public function toArrayFichaCompleta() {
        return array(
            "id_servicio"          => &$this->id_servicio,
            "codigo_servicio"      => &$this->codigo_servicio,
            "id_cotizacion_origen" => &$this->id_cotizacion_origen,
            //agregamos para cotizacion de origen
            "codigo_cotizacion_origen" => &$this->codigo_cotizacion_origen,
            //fin
            "id_ctapersona"        => &$this->id_ctapersona,
            "doc_tip"              => &$this->doc_tip,
            "doc_num"              => &$this->doc_num,
            "cliente_nombre"       => &$this->cliente_nombre,
            //agregamos claves de referencia para imprimir ficha
            "telefono"                 => &$this->telefono,
            "correo"                   => &$this->correo,
            "direccion"                => &$this->direccion,
            "id_equipo"            => &$this->id_equipo,
            "tipo_equipo"              => &$this->tipo_equipo,
            "marca"                    => &$this->marca,

            //"id_equipo"            => &$this->id_equipo,
            "modelo"               => &$this->modelo,
            "numero_serie"         => &$this->numero_serie,
            "tipo_comprobante"     => &$this->tipo_comprobante,
            "fecha_ingreso"        => &$this->fecha_ingreso,
            "accesorios"           => &$this->accesorios,
            "falla_reportada"      => &$this->falla_reportada,
            "observacion"          => &$this->observacion,
            "cotizacion_estimada"  => &$this->cotizacion_estimada,
            "costo_total"          => &$this->costo_total,
            "estado_servicio"      => &$this->estado_servicio,
            "motivo_estado"        => &$this->motivo_estado
            
        );
    }

}
?>
