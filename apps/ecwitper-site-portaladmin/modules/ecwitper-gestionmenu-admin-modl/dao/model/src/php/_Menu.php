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
//  - Clase Menu
// ----------------------------------------------------------------------------
// Change History:
//  25/12/2019  degui <degui@nitper.com>
//     - Se crea la calse Menu
// ----------------------------------------------------------------------------

/* Clase Menu */
class Menu{
    private $id_menu;
    private $id_cabmenu;
    private $numero;
    private $nombre;
    private $uri_publi;
    private $estado;

    public function get_id_menu(){
    	   return $this->id_menu;
    }
    public function set_id_menu($id_menu){
    	   $this->id_menu=$id_menu;
    }
    public function get_id_cabmenu(){
    	   return $this->id_cabmenu;
    }
    public function set_id_cabmenu($id_cabmenu){
    	   $this->id_cabmenu=$id_cabmenu;
    }
    public function get_numero(){
    	   return $this->numero;
    }
    public function set_numero($numero){
    	   $this->numero=$numero;
    }
    public function get_nombre(){
    	   return $this->nombre;
    }
    public function set_nombre($nombre){
    	   $this->nombre=$nombre;
    }
    public function get_uri_publi(){
    	   return $this->uri_publi;
    }
    public function set_uri_publi($uri_publi){
    	   $this->uri_publi=$uri_publi;
    }
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function toArray(){
    	   return $data = array(
	   	"id_menu" => $this->id_menu,
		"id_cabmenu" => $this->id_cabmenu,
    		"numero" => $this->numero,
    		"nombre" => $this->nombre,
		"uri_publi" => $this->uri_publi,
    		"estado" => $this->estado
	   );
    }
}

?>
