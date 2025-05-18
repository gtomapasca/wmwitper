<?php

interface ConsultarCatalogoProductosService{
    public function listarCategoriaProductos();
	public function listarProductosCatalogo(); 
    public function buscarProductoById($dataRequest);
    public function obtenerProductoByMinicodigo($dataRequest);
	public function buscarProductoByDesc($dataRequest); 
	public function buscarProductosByCategoria($dataRequest);
	public function obtenerCantidadFabricantesPorCategoria($dataRequest);
	//public function obtenerOfertasDeProductos();
	public function obtenerEspecificacionProducto($dataRequest);
	public function obtenerGaleriaImagenesProducto($dataRequest);
	public function buscarProductosByFabricante($dataRequest);
}

?>
