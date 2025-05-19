<?php

//require_once 'settings.php';

/* Analiza la URI */
class ApplicationHandlerVta {

	public static function analizer() {	
		$valido = true;
		$msjErr = "";
		$uri = $_SERVER['REQUEST_URI'];
		$arrayUri = explode('/', $uri);
		array_shift($arrayUri);

		// ini-URI
		//echo '<p>dato[0]: '.$arrayUri[0].'</p>';
		//echo '<p>total: '.count($arrayUri).'</p>';
		$pos = POS_INI;
		$root = $arrayUri[0 + $pos]; 
		$app = $arrayUri[1 + $pos];
		$ctrl = $arrayUri[2 + $pos];
		//echo "root: " . $root;
		//echo "<p>app: " . $app;
		if ($app == "app"){ 
			$root = "apps";
			// $app 	= isset($arrayUri[0]) ? $arrayUri[0] : CLI_DEFAULT_APP;
			// 20230616-INI Degui: se reemplaza nombre app
			// uri sin virtual host apache (POS_INI = 3)
			// http://localhost/webapps/wmwitper/application.php/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo
			// uri con virtual host apache (POS_INI = 0)
			// http://compuchiclayo.com/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo		
			if($ctrl == 'mainmenu'){
				//echo  "<p>entre vta...";
				$app 	= APP_SITE_PUNTOVENTA;
				$modulo = PVTA_CPANELCAJA_MAINMENU;
			}else if($ctrl == 'ingcaja'){
				$app 	= APP_SITE_PUNTOVENTA;
				$modulo = PVTA_CPANEL_INGCAJA;
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
		}else if ($app == "cpanel"){
			$root = "cpanels";

			if($ctrl == 'account'){
				$app 	= CPANEL_PORTAL_VTA;
				$modulo = CPANEL_MODULEVTA_PTOVTA;
			}

			$modelo = isset($arrayUri[3 + $pos]) ? $arrayUri[3 + $pos] : CPANEL_DEFAULT_MODEL;
			$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
			$recurso = isset($arrayUri[4 + $pos]) ? $arrayUri[4 + $pos] : CPANEL_DEFAULT_RESOURCE;
			// argumento opcional
			$arg = isset($arrayUri[5 + $pos]) ? $arrayUri[5 + $pos] : 0;
			$arg = ($arg == '') ? 0 : $arg;
		}else{
			//echo  "<p>entre else...";
			//$arrayUri = array(APP_SITE_TIENDAVIRTUAL, CLI_DEFAULT_MODULE, CLI_DEFAULT_MODEL, CLI_DEFAULT_RESOURCE);
			$arrayUri = array(CPANEL_ROOT, CPANEL_PORTAL_VTA, CPANEL_VTADEFAULT_MODULE, CPANEL_VTADEFAULT_MODEL, CPANEL_VTADEFAULT_RESOURCE);
			$root 	= $arrayUri[0];
			$app 	= $arrayUri[1];
			$modulo = $arrayUri[2];
			$modelo = $arrayUri[3];
			$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
			$recurso= $arrayUri[4];
		}
		// fin-URI
		return array($valido, $msjErr, $root, $app, $modulo, $modelo, $recurso, $arg);
	}
}


?>
