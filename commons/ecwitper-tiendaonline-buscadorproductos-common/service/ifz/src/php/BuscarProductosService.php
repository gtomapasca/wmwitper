<?php

interface BuscarProductosService{
	public function buscarProductoByDesc($dataRequest); 
	public function buscarProductosByCategoria($dataRequest);
	public function buscarProductosByFabricante($dataRequest);
}

?>
