<?php

interface RegistrarPublicadorPaginasService{
      public function registrarSuscripcionMail($email);
      public function validarContacto($dataRequest);
      public function registrarContacto($dataRequest);
      public function validarReclamo($dataRequest);
      public function registrarReclamo($dataRequest);
      public function enviarAvisoReclamo($numAvisoAsoc);
}

?>
