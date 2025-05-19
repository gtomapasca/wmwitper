<?php

interface RegistrarPrincipalService{
      public function registrarSuscripcion($email);
      public function registrarContacto($dataRequest);
      public function validarReclamo($dataRequest);
      public function registrarReclamo($dataRequest);
      public function enviarAvisoReclamo($numAvisoAsoc);
}

?>
