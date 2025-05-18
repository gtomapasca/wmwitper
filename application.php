<?php
// http://compucix.com/adm/principal/ver/menu/?page=login
// http://compucix.com/cli/principal/ver/menu/?page=principal
// http://compucix.com/cli/principal/ver/producto/?page=10502&mc=12345

/* Reemplazar setting por cada dominio */
//require_once 'settings_witper.php'; 
require_once 'settings_compuchiclayo.php'; 

#ini_set('include_path', APP_DIR);

require_once 'core/front_controller.php';
FrontController::start();

?>
