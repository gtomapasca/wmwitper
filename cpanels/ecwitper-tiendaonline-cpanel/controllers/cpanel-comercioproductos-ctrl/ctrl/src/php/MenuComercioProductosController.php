<?php
require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'core/helpers/template.php';

require_once 'apps/ecwitper-tiendaonline-webapp/controllers/publicador-paginas-ctrl/ctrl/src/php/CPMenuPublicadorPaginasController.php';
require_once 'apps/ecwitper-tiendaonline-webapp/controllers/carrito-compras-ctrl/ctrl/src/php/CPMenuCarritoComprasController.php';
require_once 'apps/ecwitper-tiendaonline-webapp/controllers/cuenta-usuario-ctrl/ctrl/src/php/CPMenuCuentaUsuarioController.php';
require_once 'apps/ecwitper-tiendaonline-webapp/controllers/publicador-articulos-ctrl/ctrl/src/php/CPMenuPublicadorArticulosController.php';
require_once 'apps/ecwitper-tiendaonline-webapp/controllers/categoria-productos-ctrl/ctrl/src/php/CPMenuCategoriaProductosPrincipalController.php';

class MenuComercioProductosController extends Controller{

	public function opcionInicio() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarInicioTienda();
		echo json_encode($dataResponse);
		exit();
	}
	
	public function opcionCategorias() {
		$dataRequest = "";
		$control = new CPMenuCategoriaProductosPrincipalController();
		$dataResponse = $control->cargarCategoriaProductos($dataRequest);
		echo json_encode($dataResponse);
		exit();
	}

	public function opcionOfertas() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarOfertaProductos();
		echo json_encode($dataResponse);
		exit();
	}

	// Opciones del menu lateral cuenta usuario
	public function opcionCuentaPerfil() {
		$control = new CPMenuCuentaUsuarioController();
		$dataResponse = $control->cargarCuentaPerfil();
		echo json_encode($dataResponse);
		exit();
	}

	// Opciones del menu lateral cuenta usuario
	public function opcionCuentaCarrito() {
		$control = new CPMenuCarritoComprasController();
		$dataResponse = $control->cargarCuentaCarrito();
		echo json_encode($dataResponse);
		exit();
	}

	public function opcionCarritoCompras() {
		$control = new CPMenuCarritoComprasController();
		$dataResponse = $control->cargarCarritoCompras();
		echo json_encode($dataResponse);
		exit();
	}

	// BLog
	public function opcionBlog() {
		$control = new CPMenuPublicadorArticulosController();
		$dataResponse = $control->cargarBlog();
		echo json_encode($dataResponse);
		exit();
	}

	// Paginas tienda
	public function opcionNosotros() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarNosotros();
		echo json_encode($dataResponse);
		exit();
	}

	// suscribir
	public function opcionSuscribete() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarSuscribir();
		echo json_encode($dataResponse);
		exit();
	}

	// contacto
	public function opcionContacto() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarContacto();
		echo json_encode($dataResponse);
		exit();
	}

	// postulante
	public function opcionPostulante() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarPostulante();
		echo json_encode($dataResponse);
		exit();
	}

	// libro reclamo
	public function opcionLibroReclamo() {
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarLibroReclamo();
		echo json_encode($dataResponse);
		exit();
	}
	
	// CixServtec
	public function opcionCixServtec() {
		$file = SITECLI_HTML_DIR_CIXSERVTEC;
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarServicios($file);
		echo json_encode($dataResponse);
		exit();
	}

	// CixServtec
	public function opcionCixDevelop() {
		$file = SITECLI_HTML_DIR_CIXDEVELOP;
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarServicios($file);
		echo json_encode($dataResponse);
		exit();
	}

	// CixServtec
	public function opcionCixTelecom() {
		$file = SITECLI_HTML_DIR_CIXTELECOM;
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarServicios($file);
		echo json_encode($dataResponse);
		exit();
	}

	// CixServtec
	public function opcionCixServers() {
		$file = SITECLI_HTML_DIR_CIXSERVERS;
		$control = new CPMenuPublicadorPaginasController();
		$dataResponse = $control->cargarServicios($file);
		echo json_encode($dataResponse);
		exit();
	}


}

?>
