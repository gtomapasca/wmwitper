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

/* Clase FabricanteCat */
class FabricanteCat{
    private $cod_fabricante;
    private $marca;
    private $cantidad;

    public function get_cod_fabricante(){
    	   return $this->cod_fabricante;
    }
    public function set_cod_fabricante($cod_fabricante){
    	   $this->cod_fabricante=$cod_fabricante;
    }
    public function get_marca(){
    	   return $this->marca;
    }
    public function set_marca($marca){
    	   $this->marca=$marca;
    }
    public function get_cantidad(){
    	   return $this->cantidad;
    }
    public function set_cantidad($cantidad){
    	   $this->cantidad=$cantidad;
    }
    public function toArray(){
    	   return array(
		"cod_fabricante" => "{$this->cod_fabricante}",
    		"marca" 	 => "{$this->marca}",
    		"cantidad" 	 => "{$this->cantidad}"
	   );
    }
}

?>
