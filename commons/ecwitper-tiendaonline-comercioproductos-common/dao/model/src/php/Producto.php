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
// Clase Producto:
//  - Clase producto
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea la calse producto
// ----------------------------------------------------------------------------

/* Clase Producto  */
class Producto{
    private $cod_producto;
    private $cod_fabricante;
    private $cod_categoria;
    private $producto;
    private $descrip_corta;
    private $descrip_larga;
    private $ind_especificaciones;
    private $imagen_sm;
    private $imagen_md;
    private $imagen_lg;
    private $key_word;
    private $precio_venta_normal;
    private $precio_venta_internet;
    private $precio_venta_tarjeta; 
    private $stock;
    private $serie;
    private $modelo;
    private $marca;
    private $fabricante;

    // Constructor
    function __construct(){
	$this->id_producto = '';
    }

    // Destructor
    /*function __destruct(){
	unset($this);
    }*/
    public function get_cod_producto(){
           return $this->cod_producto;
    }
    public function set_cod_producto($cod_producto){
           $this->cod_producto=$cod_producto;
    }
    public function get_cod_fabricante(){
    	   return $this->cod_fabricante;
    }
    public function set_cod_fabricante($cod_fabricante){
    	   $this->cod_fabricante=$cod_fabricante;
    }
    public function get_cod_categoria(){
    	   return $this->cod_categoria;
    }
    public function set_cod_categoria($cod_categoria){
    	   $this->cod_categoria=$cod_categoria;
    }
    public function get_producto(){
    	   return $this->producto;
    }
    public function set_producto($producto){
    	   $this->producto=$producto;
    }
    public function get_descrip_corta(){
    	   return $this->descrip_corta;
    }
    public function set_descrip_corta($descrip_corta){
    	   $this->descrip_corta=$descrip_corta;
    }
    public function get_descrip_larga(){
    	   return $this->descrip_larga;
    }
    public function set_descrip_larga($descrip_larga){
    	   $this->descrip_larga=$descrip_larga;
    }
    public function get_ind_especificaciones(){
    	   return $this->ind_especificaciones;
    }
    public function set_ind_especificaciones($ind_especificaciones){
    	   $this->ind_especificaciones=$ind_especificaciones;
    }
    public function get_key_word(){
    	   return $this->key_word;
    }
    public function set_key_word($key_word){
    	   $this->key_word=$key_word;
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
    public function get_imagen_lg(){
    	   return $this->imagen_lg;
    }
    public function set_imagen_lg($imagen_lg){
    	   $this->imagen_lg=$imagen_lg;
    }
    public function get_precio_venta_normal(){
    	   return $this->precio_venta_normal;
    }
    public function set_precio_venta_normal($precio_venta_normal){
    	   $this->precio_venta_normal=$precio_venta_normal;
    }
    public function get_precio_venta_internet(){
    	   return $this->precio_venta_internet;
    }
    public function set_precio_venta_internet($precio_venta_internet){
    	   $this->precio_venta_internet=$precio_venta_internet;
    }
    public function get_precio_venta_tarjeta(){
    	   return $this->precio_venta_tarjeta;
    }
    public function set_precio_venta_tarjeta($precio_venta_tarjeta){
    	   $this->precio_venta_tarjeta=$precio_venta_tarjeta;
    }
    public function get_stock(){
    	   return $this->stock;
    }
    public function set_stock($stock){
    	   $this->stock=$stock;
    }
    public function get_serie(){
    	   return $this->serie;
    }
    public function set_serie($serie){
    	   $this->serie=$serie;
    }
    public function get_modelo(){
    	   return $this->modelo;
    }
    public function set_modelo($modelo){
    	   $this->modelo=$modelo;
    }
    public function get_marca(){
    	   return $this->marca;
    }
    public function set_marca($marca){
    	   $this->marca=$marca;
    }
    public function get_fabricante(){
    	   return $this->fabricante;
    }
    public function set_fabricante($fabricante){
    	   $this->marca=$fabricante;
    }
    public function toArray(){
    	   return $data = array(
		    "cod_producto" 	    => $this->cod_producto,
		    "cod_fabricante" 	=> $this->cod_fabricante,
		    "cod_categoria" 	=> $this->id_categoria,
		    "producto" 		    => $this->producto,
		    "descrip_corta" 	=> $this->descrip_corta,
		    "descrip_larga" 	=> $this->descrip_larga,
		    "ind_especificaciones" 	=> $this->ind_especificaciones,
		    "imagen_sm" 	    => $this->imagen_sm,
		    "imagen_md" 	    => $this->imagen_md,
		    "imagen_lg" 	    => $this->imagen_lg,
		    "key_word" 		    => $this->key_word,
		    "precio_venta_normal"   => $this->precio_venta_normal,
		    "precio_venta_internet" => $this->precio_venta_internet,
		    "precio_venta_tarjeta"  => $this->precio_venta_tarjeta,
		    "stock" 		    => $this->stock,
		    "serie" 		    => $this->serie,
		    "modelo" 		    => $this->modelo,
		    "marca" 		    => $this->marca,
		    "fabricante" 	    => $this->fabricante
	   );
    }
    
}

?>
