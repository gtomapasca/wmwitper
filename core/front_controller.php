<?php

require_once 'core/apphandlerCli.php';
require_once 'core/appHandlerAdm.php';
require_once 'core/appHandlerVta.php';

class FrontController {

	public static function start() {
		//list($app, $modulo, $model, $recurso, $arg) = ApplicationHandler::analizer();
		//list($valido, $msjErr, $root, $app, $modulo, $model, $recurso, $arg) = ApplicationHandler::analizer();
		// 20241103 Degui: se desacopla handler
		$uri = $_SERVER['REQUEST_URI'];
		$arrayUri = explode('/', $uri);
		array_shift($arrayUri);
		$site = $arrayUri[0]; 
		//echo "<p>front-site: ".$site;
		if($site == "" || $site == "cli" || $site == "inicio" || $site == "ofertas"){
			list($valido, $msjErr, $root, $app, $modulo, $model, $recurso, $arg) = ApplicationHandlerCli::analizer();
		}else if($site == "adm"){
			list($valido, $msjErr, $root, $app, $modulo, $model, $recurso, $arg) = ApplicationHandlerAdm::analizer();
		}else if($site == "vta"){
			list($valido, $msjErr, $root, $app, $modulo, $model, $recurso, $arg) = ApplicationHandlerVta::analizer();
		}else{
			echo "<p>FrontController > Site no encontrado... site: " + $site;
		}
						
		if($valido){			
			// formato para nombres de clases compuestas
			$cname = str_replace('_', ' ', $model);
			$cname = ucwords($cname) . 'Controller';
			$cname = str_replace(' ', '', $cname);
			// formato para nombres de métodos compuestos
			$recurso = str_replace('-', ' ', $recurso);
			$recurso = ucwords($recurso);
			$recurso = str_replace(' ', '', $recurso);

			/*echo "<p>root: ".$root."</p>";
			echo "<p>app: ".$app."</p>";
			echo "<p>modulo: ".$modulo."</p>";
			echo "<p>model: ".$model."</p>";
			echo "<p>recurso: ".$recurso."</p>";
			echo "<p>arg: ".$arg."</p>";*/

			// ruta controller
			//$ruta = "apps/site{$app}/controllers/{$modulo}/src/php/{$cname}.php";
			//$ruta = "apps/$app/controllers/{$modulo}/src/php/{$cname}.php";
			// apps/ecwitper-site-tiendavirtual/controllers/ecwitper-iniciotienda-mainmenu-ctrl/principal/ctrl/src/php/VerController.php
			// $ruta = "apps/$app/controllers/{$modulo}/principal/ctrl/src/php/{$cname}.php";
			// cpanels/ecwitper-cpanel-tiendaonline/controllers/acceso-principal-ctrl/ctrl/src/php/PrincipalController.php
			//$ruta = "cpanels/$app/controllers/{$modulo}/ctrl/src/php/{$cname}.php";
			//$ruta = "{$root}/{$app}/controllers/{$modulo}/ctrl/src/php/{$cname}.php";
			//echo "<p>ruta: ".$ruta."</p>";

			// 20241103 Degui: Según opcion 
			if($site == "" || $site == "cli" || $site == "inicio" || $site == "ofertas"){
				$ruta = "{$root}/{$app}/controllers/{$modulo}/ctrl/src/php/{$cname}.php";
			}else if($site == "adm"){
				if($root == "cpanels"){
					$ruta = "{$root}/{$app}/controllers/{$modulo}/ctrl/src/php/{$cname}.php";
				}else{
					$ruta = "{$root}/{$app}/controllers/{$modulo}/src/php/{$cname}.php";
				}
			}else if($site == "vta"){
				if($root == "cpanels"){
					$ruta = "{$root}/{$app}/controllers/{$modulo}/ctrl/src/php/{$cname}.php";
				}else{
					$ruta = "{$root}/{$app}/controllers/{$modulo}/src/php/{$cname}.php";
				}
			}
			//echo "<p>FrontController-Ruta: ".$ruta."</p>";

			// importar
			require_once $ruta;
			$controller = new $cname($recurso, $arg);
		}else{
			echo $msjErr;		
		}
		
	}
}


?>
