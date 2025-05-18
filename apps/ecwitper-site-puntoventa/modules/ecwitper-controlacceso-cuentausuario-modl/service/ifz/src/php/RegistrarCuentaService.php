<?php

interface RegistrarCuentaService{
      public function registrarNuevoUsuario($dataRequest);
      public function modificarUsuario($dataRequest);
      public function eliminarUsuario($dataRequest);
}

?>
