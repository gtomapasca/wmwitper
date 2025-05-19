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
// Clase Carrito:
//  - Clase Carrito
// ----------------------------------------------------------------------------
// Change History:
//  23/07/2019  degui <degui@nitper.com>
//     - Se crea la clase Carrito
// ----------------------------------------------------------------------------

class Carrito{
	private $datos_cliente;
	private $car_detalle_producto;

	// Constructor
	function __construct(){
		// datos del cliente
		$this->datos_cliente = array();
		// Detalle de producto
		$this->car_detalle_producto = array();
	}
	// Destructor
	/*function __destruct(){
		unset($this);
	}*/
	public function get_datos_cliente(){
		return $this->datos_cliente;
	}
	public function set_datos_cliente($data){
		$this->datos_cliente = array (
				"doctip" => "0",
				"docnum" => $data["docnum"],
				"nombre" => $data["nombre"],
				"apepat" => $data["apepat"],
				"apemat" => $data["apemat"],
				"telef"  => $data["telef"],
				"email"  => $data["email"],
				"direc"  => $data["direc"]
			);
	}
	public function get_car_detalle_producto(){
		return $this->car_detalle_producto;
	}
	public function get_car_producto($index){
		return $this->car_detalle_producto[$index];
	}
	public function get_car_nproductos(){
		//return count($this->car_detalle_producto);
		$n=0;
		foreach($this->car_detalle_producto as $item){
			if($item["estado"] == 0) $n++;
		}
		return $n;
	}
	public function set_car_detalle_producto($data, $cant){
		// Estados: 0 (producto registrado), 1(producto eliminado).
		$i = count($this->car_detalle_producto);
		return $this->car_detalle_producto[$i] = array (
				"cod_producto"	=> $data["cod_producto"],
				"mini_codigo"	=> $data["mini_codigo"],
				"nom_producto" 	=> $data["producto"],
				//"img_producto" 	=> $data["imagen_sm"],
				"img_dir" 	=> $data["dir_img"],
				"img_nom" 	=> $data["nom_img"],
				"cantidad" 		=> $cant,
				"precio_venta" 	=> $data["precio_venta_internet"],
				"estado" 		=> 0
			);
	}
	public function get_car_pedido(){
		return $car_pedido = array(
			"datos_cliente"   		=> $this->datos_cliente,
			"car_detalle_producto"  => $this->car_detalle_producto
		);
	}
	public function del_car_producto($index){
		$this->car_detalle_producto[$index]["estado"] = 1; // 1: eliminado
		//return $data = array("eliminado"=>"OK", "cod_producto" => $this->car_detalle_producto[$index]["cod_producto"]);
		return $data = array("eliminado"=>"OK", "cod_producto" => $this->car_detalle_producto[$index]["mini_codigo"]);
	}
} 

?>
