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
// Clase ComentPost:
//  - Clase coment post
// ----------------------------------------------------------------------------
// Change History:
//  20/10/2019  degui <degui@nitper.com>
//     - Se crea la calse coment post
// ----------------------------------------------------------------------------

/* Clase ComentPost */
class ComentPost{
    private $fecha_creacion;
    private $comentario;
    private $nick;
    private $avatar;
    private $nombres;
    private $ape_pat;
    private $ape_mat;

    // Constructor
    function __construct(){
	$this->cod_articulo = '';
    }

    // Destructor
    /*function __destruct(){
	unset($this);
    }*/
    
    public function get_fecha_creacion(){
    	   return $this->fecha_creacion;
    }
    public function set_fecha_creacion($fecha_creacion){
    	   $this->fecha_creacion=$fecha_creacion;
    }
    public function get_comentario(){
    	   return $this->comentario;
    }
    public function set_comentario($comentario){
    	   $this->comentario=$comentario;
    }
    public function get_nick(){
    	   return $this->nick;
    }
    public function set_nick($nick){
    	   $this->nick=$nick;
    }
    public function get_avatar(){
    	   return $this->avatar;
    }
    public function set_avatar($avatar){
    	   $this->avatar=$avatar;
    }
    public function get_nombres(){
    	   return $this->nombres;
    }
    public function set_nombres($nombres){
    	   $this->nombres=$nombres;
    }
    public function get_ape_pat(){
    	   return $this->ape_pat;
    }
    public function set_ape_pat($ape_pat){
    	   $this->ape_pat=$ape_pat;
    }
    public function get_ape_mat(){
    	   return $this->ape_mat;
    }
    public function set_ape_mat($ape_mat){
    	   $this->ape_mat=$ape_mat;
    }    
    public function toArray(){
    	   return $data = array(
    		"fecha_creacion" => $this->fecha_creacion,
    		"comentario" => $this->comentario,
    		"nick" => $this->nick,
    		"avatar" => $this->avatar,
		"nombres" => $this->nombres,
		"ape_pat" => $this->ape_pat,
		"ape_mat" => $this->ape_mat
	   );
    }
    
}

?>
