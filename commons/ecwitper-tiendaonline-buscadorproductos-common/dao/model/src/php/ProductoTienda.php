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

/* Clase Producto */
class ProductoTienda{
    private $cod_producto;
    private $mini_codigo;
    private $cod_fabricante;
    private $marca;
    private $cod_categoria;
    private $nom_categoria;
    private $cod_subcategoria;
    private $nom_subcategoria;
    private $producto;
    private $descrip_corta;
    private $descrip_larga;
    private $ind_especificaciones;
    private $ind_galeriaImagenes;
    private $nom_img;
    private $dir_img;
    private $ruta_img;
    private $imagen_sm;
    private $imagen_md;
    private $imagen_lg;
    private $keyword;
    private $precio_compra_final;
    private $precio_venta_normal;
    private $precio_venta_internet;
    private $precio_venta_tarjeta;
    private $stock;
    private $puntaje;
    private $almacen_ind;
    private $almacen_stock;
    private $almacen_fecreg;
    private $almacen_fecmod;
    private $almacen_usureg;
    private $almacen_usumod;
    private $almacen_del;
    private $destacado_ind;
    private $descuento_precio;
    private $descuento_fecini;
    private $descuento_fecfin;
    private $proveedor_ruc;
    private $proveedor_codprod;
    private $isFecIni;
    private $isFecFin;
    private $estado;
    private $del;
    private $codusu_reg;
    private $fecha_reg;
    private $ip_reg;
    private $host_reg;
    private $codusu_act;
    private $fecha_act;
    private $ip_act;
    private $host_act;

    public function get_cod_producto(){
    	   return $this->cod_producto;
    }
    public function set_cod_producto($cod_producto){
    	   $this->cod_producto=$cod_producto;
    }
    public function get_mini_codigo(){
    	   return $this->mini_codigo;
    }
    public function set_mini_codigo($mini_codigo){
    	   $this->mini_codigo=$mini_codigo;
    }
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
    public function get_cod_categoria(){
    	   return $this->cod_categoria;
    }
    public function set_cod_categoria($cod_categoria){
    	   $this->cod_categoria=$cod_categoria;
    }
    public function get_nom_categoria(){
    	   return $this->nom_categoria;
    }
    public function set_nom_categoria($nom_categoria){
    	   $this->nom_categoria=$nom_categoria;
    }
    public function get_cod_subcategoria(){
        return $this->cod_subcategoria;
    }
    public function set_cod_subcategoria($cod_subcategoria){
            $this->cod_subcategoria=$cod_subcategoria;
    }
    public function get_nom_subcategoria(){
            return $this->nom_subcategoria;
    }
    public function set_nom_subcategoria($nom_subcategoria){
            $this->nom_subcategoria=$nom_subcategoria;
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
    public function get_ind_galeriaImagenes(){
        return $this->ind_galeriaImagenes;
    }
    public function set_ind_galeriaImagenes($ind_galeriaImagenes){
            $this->ind_galeriaImagenes=$ind_galeriaImagenes;
    }
    public function get_nom_img(){
        return $this->nom_img;
    }
    public function set_nom_img($nom_img){
            $this->nom_img=$nom_img;
    }
    public function get_dir_img(){
        return $this->dir_img;
    }
    public function set_dir_img($dir_img){
            $this->dir_img=$dir_img;
    }
    public function get_ruta_img(){
        return $this->ruta_img;
    }
    public function set_ruta_img($ruta_img){
            $this->ruta_img=$ruta_img;
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
    public function get_keyword(){
    	   return $this->keyword;
    }
    public function set_keyword($keyword){
    	   $this->keyword=$keyword;
    }
    public function get_precio_compra_final(){
    	   return $this->precio_compra_final;
    }
    public function set_precio_compra_final($precio_compra_final){
    	   $this->precio_compra_final=$precio_compra_final;
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
    public function get_puntaje(){
    	   return $this->puntaje;
    }
    public function set_puntaje($puntaje){
    	   $this->puntaje=$puntaje;
    }
    public function get_almacen_ind(){
        return $this->almacen_ind;
    }
    public function set_almacen_ind($almacen_ind){
        $this->almacen_ind=$almacen_ind;
    }
    public function get_almacen_stock(){
        return $this->almacen_stock;
    }
    public function set_almacen_stock($almacen_stock){
        $this->almacen_stock=$almacen_stock;
    }
    public function get_almacen_fecreg(){
        return $this->almacen_fecreg;
    }
    public function set_almacen_fecreg($almacen_fecreg){
        $this->almacen_fecreg=$almacen_fecreg;
    }
    public function get_almacen_fecmod(){
        return $this->almacen_fecmod;
    }
    public function set_almacen_fecmod($almacen_fecmod){
        $this->almacen_fecmod=$almacen_fecmod;
    }
    public function get_almacen_usureg(){
        return $this->almacen_usureg;
    }
    public function set_almacen_usureg($almacen_usureg){
        $this->almacen_usureg=$almacen_usureg;
    }
    public function get_almacen_usumod(){
        return $this->almacen_usumod;
    }
    public function set_almacen_usumod($almacen_usumod){
        $this->almacen_usumod=$almacen_usumod;
    }
    public function get_almacen_del(){
        return $this->almacen_del;
    }
    public function set_almacen_del($almacen_del){
        $this->almacen_del=$almacen_del;
    }
    public function get_destacado_ind(){
        return $this->destacado_ind;
    }
    public function set_destacado_ind($destacado_ind){
            $this->destacado_ind=$destacado_ind;
    }
    public function get_descuento_precio(){
        return $this->descuento_precio;
    }
    public function set_descuento_precio($descuento_precio){
            $this->descuento_precio=$descuento_precio;
    }
    public function get_descuento_fecini(){
        return $this->descuento_fecini;
    }
    public function set_descuento_fecini($descuento_fecini){
            $this->descuento_fecini=$descuento_fecini;
    }
    public function get_descuento_fecfin(){
        return $this->descuento_fecfin;
    }
    public function set_descuento_fecfin($descuento_fecfin){
            $this->descuento_fecfin=$descuento_fecfin;
    }
    public function get_proveedor_ruc(){
        return $this->proveedor_ruc;
    }
    public function set_proveedor_ruc($proveedor_ruc){
            $this->proveedor_ruc=$proveedor_ruc;
    }
    public function get_proveedor_codprod(){
        return $this->proveedor_codprod;
    }
    public function set_proveedor_codprod($proveedor_codprod){
            $this->proveedor_codprod=$proveedor_codprod;
    }
    public function get_isFecIni(){
    	   return $this->isFecIni;
    }
    public function set_isFecIni($isFecIni){
    	   $this->isFecIni=$isFecIni;
    }
    public function get_isFecFin(){
        return $this->isFecFin;
    }
    public function set_isFecFin($isFecFin){
            $this->isFecFin=$isFecFin;
    }
    public function get_estado(){
    	   return $this->estado;
    }
    public function set_estado($estado){
    	   $this->estado=$estado;
    }
    public function get_del(){
    	   return $this->del;
    }
    public function set_del($del){
    	   $this->del=$del;
    }
    public function get_codusu_reg(){
    	   return $this->codusu_reg;
    }
    public function set_codusu_reg($codusu_reg){
    	   $this->codusu_reg=$codusu_reg;
    }
    public function get_fecha_reg(){
    	   return $this->fecha_reg;
    }
    public function set_fecha_reg($fecha_reg){
    	   $this->fecha_reg=$fecha_reg;
    }
    public function get_ip_reg(){
    	   return $this->ip_reg;
    }
    public function set_ip_reg($ip_reg){
    	   $this->ip_reg=$ip_reg;
    }
    public function get_host_reg(){
    	   return $this->host_reg;
    }
    public function set_host_reg($host_reg){
    	   $this->host_reg=$host_reg;
    }
    public function get_codusu_act(){
    	   return $this->codusu_act;
    }
    public function set_codusu_act($codusu_act){
    	   $this->codusu_act=$codusu_act;
    }
    public function get_fecha_act(){
    	   return $this->fecha_act;
    }
    public function set_fecha_act($fecha_act){
    	   $this->fecha_act=$fecha_act;
    }
    public function get_ip_act(){
    	   return $this->ip_act;
    }
    public function set_ip_act($ip_act){
    	   $this->ip_act=$ip_act;
    }
    public function get_host_act(){
    	   return $this->host_act;
    }
    public function set_host_act($host_act){
    	   $this->host_act=$host_act;
    }
    public function toArray(){
    	return $data = array(
	   	    "cod_producto" 		=> $this->cod_producto,
    		"cod_fabricante" 	=> $this->cod_fabricante,
    		"cod_categoria" 	=> $this->cod_categoria,
            "cod_subcategoria" 	=> $this->cod_subcategoria,
    		"producto" 		    => $this->producto,
		    "descrip_corta" 	=> $this->descrip_corta,
		    "descrip_larga" 	=> $this->descrip_larga,
    		"ind_especificaciones" 	=> $this->ind_especificaciones,
            "ind_galeriaImagenes" 	=> $this->ind_galeriaImagenes,
            "nom_img"               => $this->nom_img,
            "dir_img"               => $this->dir_img,
            "ruta_img"              => $this->ruta_img,
    		"imagen_sm" 		    => $this->imagen_sm,
    		"precio_compra_final" 	=> $this->precio_compra_final,
		    "precio_venta_normal" 	=> $this->precio_venta_normal,
		    "precio_venta_internet" => $this->precio_venta_internet,
		    "precio_venta_tarjeta" 	=> $this->precio_venta_tarjeta,
		    "stock" 		=> $this->stock,
		    "puntaje" 		=> $this->puntaje,
		    "estado" 		=> $this->estado,
	        "del" 			=> $this->del,
		    "codusu_reg" 	=> $this->codusu_reg,
		    "fecha_reg" 	=> $this->fecha_reg,
		    "ip_reg" 		=> $this->ip_reg,
		    "host_reg" 		=> $this->host_reg,
		    "codusu_act" 	=> $this->codusu_act,
		    "fecha_act" 	=> $this->fecha_act,
		    "ip_act" 		=> $this->ip_act,
		    "host_act" 		=> $this->host_act
	   );
    }
    public function toArrayProductoTienda(){
    	return $data = array(
	   	    "cod_producto" 		=> $this->cod_producto,
		    "mini_codigo"		=> $this->mini_codigo,
    		"cod_fabricante" 	=> $this->cod_fabricante,
    		"marca" 		    => $this->marca,
    		"cod_categoria" 	=> $this->cod_categoria,
    		"nom_categoria" 	=> $this->nom_categoria,
            "cod_subcategoria" 	=> $this->cod_subcategoria,
    		"nom_subcategoria" 	=> $this->nom_subcategoria,
    		"producto" 		    => $this->producto,
		    "descrip_corta" 	=> $this->descrip_corta,
		    "descrip_larga" 	=> $this->descrip_larga,
    		"ind_especificaciones" 	=> $this->ind_especificaciones,
            "ind_galeriaImagenes" 	=> $this->ind_galeriaImagenes,
            "nom_img"           => $this->nom_img,
            "dir_img"           => $this->dir_img,
            "ruta_img"          => $this->ruta_img,
    		//"imagen_sm" 		=> $this->imagen_sm,
    		//"imagen_md" 		=> $this->imagen_md,
    		//"imagen_lg" 		=> $this->imagen_lg,
    		"key_word" 		    => $this->keyword,
    		"precio_compra_final" 	=> $this->precio_compra_final,
		    "precio_venta_normal" 	=> $this->precio_venta_normal,
		    "precio_venta_internet" => $this->precio_venta_internet,
		    "precio_venta_tarjeta" 	=> $this->precio_venta_tarjeta,
		    "stock" 		    => $this->stock,
		    "puntaje" 		    => $this->puntaje,
		    "estado" 		    => $this->estado,
		    "fecha_reg" 	    => $this->fecha_reg,
            "almacen_ind"       => $this->almacen_ind,
            "almacen_stock"     => $this->almacen_stock,
            "almacen_fecreg"    => $this->almacen_fecreg,
            "almacen_fecmod"    => $this->almacen_fecmod,
            "almacen_usureg"    => $this->almacen_usureg,
            "almacen_usumod"    => $this->almacen_usumod,
            "almacen_del"       => $this->almacen_del,
            "destacado_ind"     => $this->destacado_ind,
            "descuento_precio"  => $this->descuento_precio,
            "descuento_fecini"  => $this->descuento_fecini,
            "descuento_fecfin"  => $this->descuento_fecfin,
            "proveedor_ruc"     => $this->proveedor_ruc,
            "proveedor_codprod" => $this->proveedor_codprod,
            "isFecIni" => $this->isFecIni,
            "isFecFin" => $this->isFecFin
	   );
    }

}

?>
