<?php

//require_once 'settings.php';

/* Analiza la URI */
class ApplicationHandlerCli {

	public static function analizer() {	
		$valido = true;
		$msjErr = "";
		$uri = $_SERVER['REQUEST_URI'];
		$arrayUri = explode('/', $uri);
		array_shift($arrayUri);

		// ini-URI
		//echo '<p>dato[0]: '.$arrayUri[0].'</p>';
		//echo '<p>total: '.count($arrayUri).'</p>';
		//$pos = POS_INI;
		$pos = 1;
		if($arrayUri[0] == "ofertas"){
			// cargarPagina("app/store/publipages/CPModal-publicador-paginas/cargar-oferta-productos");
			//$arrayUri = array("cli", "app", "store", "publipages", "CPModal-publicador-paginas", "cargar-oferta-productos");
			$root = "page";
			$app = "ofertas";
			$ctrl = "";
		}else{
			$root = $arrayUri[0 + $pos]; 
			$app  = $arrayUri[1 + $pos];
			$ctrl = $arrayUri[2 + $pos];
		}
		//$root = $arrayUri[0 + $pos]; 
		//$app  = $arrayUri[1 + $pos];
		//$ctrl = $arrayUri[2 + $pos];
		//echo "root: " . $root;
		//echo "<p>app: " . $app;
		if ($root == "app"){ 
			$root = "apps";
			// $app 	= isset($arrayUri[0]) ? $arrayUri[0] : CLI_DEFAULT_APP;
			// 20230616-INI Degui: se reemplaza nombre app
			// uri sin virtual host apache (POS_INI = 3)
			// http://localhost/webapps/wmwitper/application.php/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo
			// uri con virtual host apache (POS_INI = 0)
			// http://compuchiclayo.com/ecwitper-site-tiendavirtual/principal/consultar/listar-productos-catalogo		
			if($app == 'store'){
				//echo  "<p>entre store...";
				if($ctrl == 'buscador'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_BUSCADORPROD;
				}else if($ctrl == 'catalogo'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_CATALOGOPROD;
				}else if($ctrl == 'blog'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_BLOGTIENDA;
				}else if($ctrl == 'carrito'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_CARTIENDA;
				}else if($ctrl == 'cuenta'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_CUENTAUSUARIO;
				}else if($ctrl == 'publipages'){
					$app 	= APP_MAIN_TIENDAONLINE;
					$modulo = APP_MODULE_PUBLIPAGINAS;
				}

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
		}else if ($root == "cpanel"){
			$root = "cpanels";
			if($app == 'store'){
				if($ctrl == 'commerce'){
					$app 	= CPANEL_TIENDAVIRTUAL;
					$modulo = CPANEL_DEFAULT_MODULE;
				}else if($ctrl == 'account'){
					$app 	= CPANEL_TIENDAVIRTUAL;
					$modulo = CPANEL_MODULE_CUENTAUSUARIO;
				}
			}

			$modelo = isset($arrayUri[3 + $pos]) ? $arrayUri[3 + $pos] : CPANEL_DEFAULT_MODEL;
			$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
			$recurso = isset($arrayUri[4 + $pos]) ? $arrayUri[4 + $pos] : CPANEL_DEFAULT_RESOURCE;
			// argumento opcional
			$arg = isset($arrayUri[5 + $pos]) ? $arrayUri[5 + $pos] : 0;
			$arg = ($arg == '') ? 0 : $arg;
		}else if ($root == "page"){
			if($app == 'producto'){
				// app/store/catalogo/consultar-catalogo-productos/cargar-producto-sel/?mc=
				//$arrayUri = array("cpanels", "ecwitper-tiendaonline-cpanel", "cpanel-tiendaonline-ctrl", "cpanel-store", "cargar-pagina-producto");
				$root 	= "cpanels";
				$app 	= "ecwitper-tiendaonline-cpanel";
				//$modulo = "cpanel-tiendaonline-ctrl";
				$modulo = "cpanel-comercioproductos-ctrl";
				//$modelo = "cpanel-store";
				$modelo = "cpanel-comercio-productos";
				$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
				$recurso= "cargar-pagina-producto";
			}else if($app == 'ofertas'){
				// app/store/catalogo/consultar-catalogo-productos/cargar-producto-sel/?mc=
				//$arrayUri = array("cpanels", "ecwitper-tiendaonline-cpanel", "cpanel-tiendaonline-ctrl", "cpanel-store", "cargar-pagina-producto");
				$root 	= "cpanels";
				$app 	= "ecwitper-tiendaonline-cpanel";
				//$modulo = "cpanel-tiendaonline-ctrl";
				$modulo = "cpanel-comercioproductos-ctrl";
				//$modelo = "cpanel-store";
				$modelo = "cpanel-comercio-productos";
				$modelo = str_replace('-', '_', $modelo); // para modelo con formato CamelCase
				$recurso= "cargar-pagina-ofertas";
			}
		}else{
			//echo  "<p>entre else...";
			//$arrayUri = array(APP_SITE_TIENDAVIRTUAL, CLI_DEFAULT_MODULE, CLI_DEFAULT_MODEL, CLI_DEFAULT_RESOURCE);
			$arrayUri = array(CPANEL_ROOT, CPANEL_TIENDAVIRTUAL, CPANEL_DEFAULT_MODULE, CPANEL_DEFAULT_MODEL, CPANEL_DEFAULT_RESOURCE);
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
