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
// Clase Post:
//  - Clase post
// ----------------------------------------------------------------------------
// Change History:
//  04/06/2019  degui <degui@nitper.com>
//     - Se crea la calse post
// ----------------------------------------------------------------------------

/* Clase Post */
class Post{
    private $cod_articulo;	// post
    private $fecha_creacion;	// post
    private $titulo;		// post
    private $subtitulo;		// post
    private $imagen_sm;		// post
    private $imagen_md;		// post
    private $imagen_xl;		// post
    private $resumen;		// post
    private $contenido;		// post
    private $nick;		// usuario
    private $avatar;  		// usuario
    private $nombres;		// cliente
    private $ape_pat;		// cliente
    private $ape_mat;		// cliente

    public function get_cod_articulo(){
    	   return $this->cod_articulo;
    }
    public function set_cod_articulo($cod_articulo){
    	   $this->cod_articulo=$cod_articulo;
    }
    public function get_fecha_creacion(){
    	   return $this->fecha_creacion;
    }
    public function set_fecha_creacion($fecha_creacion){
    	   $this->fecha_creacion=$fecha_creacion;
    }
    public function get_titulo(){
    	   return $this->titulo;
    }
    public function set_titulo($titulo){
    	   $this->titulo=$titulo;
    }
    public function get_subtitulo(){
    	   return $this->subtitulo;
    }
    public function set_subtitulo($subtitulo){
    	   $this->subtitulo=$subtitulo;
    }
    public function get_imagen_sm(){
    	   return $this->imagen_sm;
    }
    public function set_imagen_sm($imagen_sm){
    	   $this->imagen_sm=$imagen_sm;
    }
    public function get_imagen_md(){
    	   return $this->imagen_md;
    }
    public function set_imagen_md($imagen_md){
    	   $this->imagen_md=$imagen_md;
    }
    public function get_imagen_xl(){
    	   return $this->imagen_xl;
    }
    public function set_imagen_xl($imagen_xl){
    	   $this->imagen_xl=$imagen_xl;
    }
    public function get_resumen(){
    	   return $this->resumen;
    }
    public function set_resumen($resumen){
    	   $this->resumen=$resumen;
    }
    public function get_contenido(){
    	   return $this->contenido;
    }
    public function set_contenido($contenido){
    	   $this->contenido=$contenido;
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
    public function toArrayPost(){
    	   return $data = array(
	   	"cod_articulo" => $this->cod_articulo,
    		"fecha_creacion" => $this->fecha_creacion,
    		"titulo" => $this->titulo,
		"subtitulo" => $this->subtitulo,
		"imagen_sm" => $this->imagen_sm,
		"imagen_md" => $this->imagen_md,
		"imagen_xl" => $this->imagen_xl,
    		"resumen" => $this->resumen,
		"contenido" => $this->contenido,
    		"nick" => $this->nick,
    		"avatar" => $this->avatar,
    		"nombres" => $this->nombres,
    		"ape_pat" => $this->ape_pat,
    		"ape_mat" => $this->ape_mat
	   );
    }
    public function toArrayLastPost(){
    	   return $data = array(
	   	"cod_articulo" => $this->cod_articulo,
    		"fecha_creacion" => $this->fecha_creacion,
    		"titulo" => $this->titulo,
		"subtitulo" => $this->subtitulo,
		"imagen_sm" => $this->imagen_sm,
		"imagen_md" => $this->imagen_md,
		"imagen_xl" => $this->imagen_xl,
    		"resumen" => $this->resumen,
    		"nick" => $this->nick,
    		"avatar" => $this->avatar,
    		"nombres" => $this->nombres,
    		"ape_pat" => $this->ape_pat,
    		"ape_mat" => $this->ape_mat
	   );
    }
    
}

?>
