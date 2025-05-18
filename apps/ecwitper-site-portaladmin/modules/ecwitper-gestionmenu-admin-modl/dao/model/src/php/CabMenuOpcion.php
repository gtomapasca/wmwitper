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
* 03/02/2020
*/
class CabMenuOpcion{
    private $cod_programa;
    private $nro_prog;
    private $nom_prog;
    private $cod_page;
    private $nom_page;
    private $contexto;
    private $estado;

    public function get_cod_programa(){
    	   return $this->cod_programa;
    }
    public function set_cod_programa($cod_programa){
    	   $this->cod_programa=$cod_programa;
    }
    public function get_nro_prog(){
    	   return $this->nro_prog;
    }
    public function set_nro_prog($nro_prog){
    	   $this->nro_prog=$nro_prog;
    }
    public function get_nom_prog(){
    	   return $this->nom_prog;
    }
    public function set_nom_prog($nom_prog){
    	   $this->nom_prog=$nom_prog;
    }
    public function get_cod_page(){
    	   return $this->cod_page;
    }
    public function set_cod_page($cod_page){
    	   $this->cod_page=$cod_page;
    }
    public function get_nom_page(){
    	   return $this->nom_page;
    }
    public function set_nom_page($nom_page){
    	   $this->nom_page=$nom_page;
    }
    public function get_contexto(){
    	   return $this->contexto;
    }
    public function set_contexto($contexto){
    	   $this->contexto=$contexto;
    }
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function toArray(){
    	   return $data = array(
	   	"cod_programa" 	=> $this->cod_programa,
    		"nro_prog" 	=> $this->nro_prog,
		"nom_prog" 	=> $this->nom_prog,
    		"cod_page" 	=> $this->cod_page,
    		"nom_page" 	=> $this->nom_page,
    		"contexto" 	=> $this->contexto,
    		"estado" 	=> $this->estado
	   );
    }
}

?>
