<?php

interface ConsultarBlogService {
    public function obtenerUltimasPublicaciones();
	public function buscarPostById($dataRequest);
	public function buscarComentariosPostById($dataRequest);
}

?>
