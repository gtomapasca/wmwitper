<?php

//require_once 'settings.php';

/* Analiza la URI */
class ApplicationHandler {

	public static function analizer() {	
		$valido = true;
		$msjErr = "";
		$uri = $_SERVER['REQUEST_URI'];
		$arrayUri = explode('/', $uri);
		array_shift($arrayUri);

		// ini-uri
		//echo '<p>dato[0]: '.$arrayUri[0].'</p>';
		//echo '<p>total: '.count($arrayUri).'</p>';
		$pos = POS_INI;
		$root = $arrayUri[0 + $pos]; 
		$app = $arrayUri[1 + $pos];
		//echo "root: " . $root;
		if (count($arrayUri) < 4){ 
			//$arrayUri = array(APP_SITE_TIENDAVIRTUAL, CLI_DEFAULT_MODULE, CLI_DEFAULT_MODEL, CLI_DEFAULT_RESOURCE);
			$arrayUri = array(CPANEL_ROOT, CPANEL_TIENDAVIRTUAL, CPANEL_DEFAULT_MODULE, CPANEL_DEFAULT_MODEL, CPANEL_DEFAULT_RESOURCE);
			$root 	= $arrayUri[0];
			$app 	= $arrayUri[1];
			$modulo = $arrayUri[2];
			$modelo = $arrayUri[3];
			$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
			$recurso= $arrayUri[4];
		}else{
			// $app 	= isset($arrayUri[0]) ? $arrayUri[0] : CLI_DEFAULT_APP;
			// 20230616-INI Degui: se reemplaza nombre app
			// uri sin virtual host apache (POS_INI = 3)
			// http://localhost/webapps/wmwitper/application.php/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo
			// uri con virtual host apache (POS_INI = 0)
			// http://compuchiclayo.com/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo
			if($app == 'tiendaonline-cpanel'){
				//$app 	= APP_SITE_TIENDAVIRTUAL;
				//$modulo = CLI_DEFAULT_MODULE;
				//$root 	= CPANEL_ROOT;
				$app 	= CPANEL_TIENDAVIRTUAL;
				$modulo = CPANEL_DEFAULT_MODULE;
			}else if($app == 'tiendaonline-web'){
				//$app 	= APP_TIENDAVIRTUAL;
				//$modulo = APP_DEFAULT_MODULE;
				$app 	= APP_MAIN_TIENDAONLINE;
				$modulo = APP_MODULE_CATALOGOPROD;
			}else if($app == 'tiendaonline-blog'){
				$app 	= APP_MAIN_TIENDAONLINE;
				$modulo = APP_MODULE_BLOGTIENDA;
			}else if($app == 'adm'){
				$app 	= APP_SITE_PORTALADMIN;
				$modulo = PADM_CPANELADMIN_MENU;
			}else if($app == 'vta'){
				$app 	= APP_SITE_PUNTOVENTA;
				$modulo = PVTA_CPANELCAJA_MENU;
			}else{
				$app 	= $arrayUri[1 + $pos];
				$modulo = $arrayUri[2 + $pos];
				//echo "<p> app: " . $app;
				//echo "<p> modulo: " . $modulo;
			}
			// 20230616-FIN
			//$modulo = isset($arrayUri[1]) ? $arrayUri[1] : CLI_DEFAULT_MODULE;
			//$modelo = isset($arrayUri[2 + $pos]) ? $arrayUri[2 + $pos] : CLI_DEFAULT_MODEL;
			$modelo = isset($arrayUri[3 + $pos]) ? $arrayUri[3 + $pos] : CPANEL_DEFAULT_MODEL;
			$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
			//$recurso = isset($arrayUri[3 + $pos]) ? $arrayUri[3 + $pos] : CLI_DEFAULT_RESOURCE;
			$recurso = isset($arrayUri[4 + $pos]) ? $arrayUri[4 + $pos] : CPANEL_DEFAULT_RESOURCE;
			// argumento opcional
			$arg = isset($arrayUri[5 + $pos]) ? $arrayUri[5 + $pos] : 0;
			$arg = ($arg == '') ? 0 : $arg;
		}
		// fin-URI
		return array($valido, $msjErr, $root, $app, $modulo, $modelo, $recurso, $arg);
	}
}


?>
