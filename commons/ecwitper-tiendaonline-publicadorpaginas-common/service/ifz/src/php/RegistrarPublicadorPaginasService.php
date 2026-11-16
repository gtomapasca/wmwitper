<?php

interface RegistrarPublicadorPaginasService{
      public function registrarSuscripcionMail($jsonParams);
      public function registrarContacto($jsonParams);
      public function registrarReclamo($jsonParams);
      public function registrarAviso($jsonParams);
      public function enviarAvisoReclamo($numAvisoAsoc);
}

?>
