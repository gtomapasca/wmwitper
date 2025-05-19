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
// Clase Menu:
//  - Clase CabMenu
// ----------------------------------------------------------------------------
// Change History:
//  25/12/2019  degui <degui@nitper.com>
//     - Se crea la calse CabMenu
// ----------------------------------------------------------------------------

/* Clase CabMenuGrup 
* 01/02/2020
*/
class CabMenuGrup{
    private $cod_gprog;
    private $cod_tipo_cat;
    private $nro_grup_prog;
    private $nom_grup_prog;
    private $cod_tipo_prog;
    private $cod_nivel_prog;
    private $estado;

    public function get_cod_gprog(){
    	   return $this->cod_gprog;
    }
    public function set_cod_gprog($cod_gprog){
    	   $this->cod_gprog=$cod_gprog;
    }
    public function get_cod_tipo_cat(){
    	   return $this->cod_tipo_cat;
    }
    public function set_cod_tipo_cat($cod_tipo_cat){
    	   $this->cod_tipo_cat=$cod_tipo_cat;
    }
    public function get_nro_grup_prog(){
    	   return $this->nro_grup_prog;
    }
    public function set_nro_grup_prog($nro_grup_prog){
    	   $this->nro_grup_prog=$nro_grup_prog;
    }
    public function get_nom_grup_prog(){
    	   return $this->nom_grup_prog;
    }
    public function set_nom_grup_prog($nom_grup_prog){
    	   $this->nom_grup_prog=$nom_grup_prog;
    }
    public function get_cod_tipo_prog(){
    	   return $this->cod_tipo_prog;
    }
    public function set_cod_tipo_prog($cod_tipo_prog){
    	   $this->cod_tipo_prog=$cod_tipo_prog;
    }
    public function get_cod_nivel_prog(){
    	   return $this->cod_nivel_prog;
    }
    public function set_cod_nivel_prog($cod_nivel_prog){
    	   $this->cod_nivel_prog=$cod_nivel_prog;
    }
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function toArray(){
    	   return $data = array(
	   	"cod_gprog" 	=> $this->cod_gprog,
    		"cod_tipo_cat" 	=> $this->cod_tipo_cat,
    		"nro_grup_prog" => $this->nro_grup_prog,
    		"nom_grup_prog" => $this->nom_grup_prog,
    		"cod_tipo_prog" => $this->cod_tipo_prog,
    		"cod_nivel_prog" => $this->cod_nivel_prog,
    		"estado" => $this->estado
	   );
    }
}

?>
