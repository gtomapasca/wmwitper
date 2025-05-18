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

/* Clase CabMenu 
* 01/02/2020
*/
class CabMenu{
    private $cod_mtgp;
    private $cod_tipo_cat;
    private $nro_meta_prog;
    private $nom_meta_prog;
    private $cod_tipo_prog;
    private $cod_nivel_prog;
    private $estado;

    public function get_cod_mtgp(){
    	   return $this->cod_mtgp;
    }
    public function set_cod_mtgp($cod_mtgp){
    	   $this->cod_mtgp=$cod_mtgp;
    }
    public function get_cod_tipo_cat(){
    	   return $this->cod_tipo_cat;
    }
    public function set_cod_tipo_cat($cod_tipo_cat){
    	   $this->cod_tipo_cat=$cod_tipo_cat;
    }
    public function get_nro_meta_prog(){
    	   return $this->nro_meta_prog;
    }
    public function set_nro_meta_prog($nro_meta_prog){
    	   $this->nro_meta_prog=$nro_meta_prog;
    }
    public function get_nom_meta_prog(){
    	   return $this->nom_meta_prog;
    }
    public function set_nom_meta_prog($nom_meta_prog){
    	   $this->nom_meta_prog=$nom_meta_prog;
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
	   	"cod_mtgp" 	=> $this->cod_mtgp,
    		"cod_tipo_cat" 	=> $this->cod_tipo_cat,
    		"nro_meta_prog" => $this->nro_meta_prog,
    		"nom_meta_prog" => $this->nom_meta_prog,
    		"cod_tipo_prog" => $this->cod_tipo_prog,
    		"cod_nivel_prog" => $this->cod_nivel_prog,
    		"estado" => $this->estado
	   );
    }
}

?>
