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

/* Clase Categoria */
class Categoria{
    private $cod_tipo;
    private $nom_tipo;
    private $cod_categoria;
    private $nom_categoria;

    public function get_cod_tipo(){
    	   return $this->cod_tipo;
    }
    public function set_cod_tipo($cod_tipo){
    	   $this->cod_tipo=$cod_tipo;
    }
    public function get_cod_categoria(){
    	   return $this->cod_categoria;
    }
    public function set_cod_categoria($cod_categoria){
    	   $this->cod_categoria=$cod_categoria;
    }
    public function get_nom_tipo(){
    	   return $this->nom_tipo;
    }
    public function set_nom_tipo($nom_tipo){
    	   $this->nom_tipo=$nom_tipo;
    }
    public function get_nom_categoria(){
    	   return $this->nom_categoria;
    }
    public function set_nom_categoria($nom_categoria){
    	   $this->nom_categoria=$nom_categoria;
    }
    public function toArray(){
    	   return array(
		"cod_tipo" 	=> "{$this->cod_tipo}",
    		"nom_tipo" 	=> "{$this->nom_tipo}",
    		"cod_categoria" => "{$this->cod_categoria}",
		"nom_categoria" => "{$this->nom_categoria}"
	   );
    }
}

?>
