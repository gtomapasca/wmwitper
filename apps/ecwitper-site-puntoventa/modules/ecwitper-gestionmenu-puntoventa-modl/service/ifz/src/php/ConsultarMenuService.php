<?php

interface ConsultarMenuService{
	public function cargarMenuPrincipal($dataRequest);
	public function obtenerMenuLateral($dataRequest);
	public function obtenerOpcionMenuLateral($dataRequest);
}

?>
