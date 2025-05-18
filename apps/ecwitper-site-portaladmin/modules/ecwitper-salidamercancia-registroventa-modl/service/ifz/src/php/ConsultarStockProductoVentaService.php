<?php

interface ConsultarStockProductoVentaService{
    public function obtenerListaProductosTienda($dataRequest);
    public function obtenerListaFabricantes();
	public function obtenerListaTipoCategoriaProd();
	//public function obtenerListaCategoriaProd();
	public function obtenerListaCategoriaByTipoCat($dataRequest);
	//public function obtenerListaSubCategoriaProd();
	public function obtenerListaSubCategoriaByCodCat($dataRequest);
	public function obtenerEspecificacionDeProducto($dataRequest);
}

?>
