<?php

interface RegistrarMenuService{
    public function registrarNuevoUsuario($dataRequest);
	public function modificarUsuario($dataRequest);
	public function eliminarUsuario($dataRequest);
	public function registrarNuevoProductoTienda($dataRequest);
	public function modificarProductoTienda($dataRequest);
	public function registrarImagenProductoTienda();
	public function registrarImagenProductoGaleria();
	public function modificarImagenProductoGaleria();
	public function registrarEspecificacionProducto($dataRequest);
	public function modificarEspecificacionProducto($dataRequest);
	public function registrarComprobanteVenta($dataRequest);
	public function registrarDetalleVenta($dataRequest);
	public function registrarNuevoClienteParaVenta($dataRequest);
}

?>
