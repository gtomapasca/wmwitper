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

/* Clase Buzon */
class Buzon{
    private $id_buzon;
    private $nombre;
    private $celular;
    private $email;
    private $asunto;
    private $mensaje;
    private $estado;
    private $fecha_reg;

    public function get_id_buzon(){
    	   return $this->id_buzon;
    }
    public function set_id_buzon($id_buzon){
    	   $this->id_buzon=$id_buzon;
    }
    public function get_nombre(){
    	   return $this->nombre;
    }
    public function set_nombre($nombre){
    	   $this->nombres=$nombre;
    }
    public function get_celular(){
    	   return $this->celular;
    }
    public function set_celular($celular){
    	   $this->celular=$celular;
    }
    public function get_email(){
    	   return $this->email;
    }
    public function set_email($email){
    	   $this->email=$email;
    }
    public function get_asunto(){
    	   return $this->asunto;
    }
    public function set_asunto($asunto){
    	   $this->asunto=$asunto;
    }
    public function get_mensaje(){
    	   return $this->mensaje;
    }
    public function set_mensaje($mensaje){
    	   $this->mensaje=$mensaje;
    }
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function get_fecha_reg(){
    	   return $this->fecha_reg;
    }
    public function set_fecha_reg($fecha_reg){
    	   $this->fecha_reg=$fecha_reg;
    }
    public function toArrayBuzon(){
    	   return $data = array(
	   	"id_buzon" 	=> $this->id_buzon,
    		"nombre" 	=> $this->nombre,
		"celular" 	=> $this->celular,
		"email" 	=> $this->email,
		"asunto" 	=> $this->asunto,
		"mensaje" 	=> $this->mensaje,
		"estado" 	=> $this->estado,
		"fecha_reg" 	=> $this->fecha_reg
	   );
    }

}

?>
