<?php

// 20261111 Modo Desarrollador: Interfaz de Contrato para Inserciones de Soporte Técnico (Estilo Degui)
interface RegistrarSoporteTecnicoService {

    // Contrato para grabar la orden técnica o cotización completa (Cabecera y detalle de la grilla)
    public function grabarIngresoOrdenTecnica($dataRequest);

    // Contrato para registrar un nuevo cliente desde el modal flotante
    public function registrarCliente($dataRequest);

    // Contrato para dar de alta un nuevo dispositivo técnico asociado a un cliente
    public function registrarEquipo($dataRequest);

}

?>
