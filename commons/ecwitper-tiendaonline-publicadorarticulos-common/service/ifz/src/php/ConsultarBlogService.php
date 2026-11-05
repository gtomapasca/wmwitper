<?php

interface ConsultarBlogService {
    public function obtenerUltimasPublicaciones();
	public function obtenerPostSeleccionadoById($dataRequest);
	public function buscarComentariosPostById($dataRequest);
}

?>
