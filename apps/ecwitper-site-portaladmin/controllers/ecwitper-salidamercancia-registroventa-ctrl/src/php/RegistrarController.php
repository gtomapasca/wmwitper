<?php

require_once 'core/controller.php';
require_once 'core/helpers/patterns.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/imp/src/php/RegistrarStockProductoVentaServiceImpl.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/imp/src/php/GaleriaImagenProductoServiceImpl.php';

class RegistrarController extends Controller {

    // Degui 20210528: Registrar Nuevo Producto Tienda
    public function registrarNuevoProductoTienda() {
		$dataRequest = array(
				//"codProd" 	=> $_POST["txtCodProd"],
				//"miniCod" 	=> $_POST["txtMiniCodigo"],
		      	"nomProd" 		=> $_POST["txtNomProd"],
		      	//* "desProdCort" 	=> $_POST["txtDescProdCorta"],
		      	//* "desProdLarg" 	=> $_POST["txtDescProdLarga"],
				//"especifProd" 	=> $_POST["txtEspecifProd"],
		      	//* "keyWord"   	=> $_POST["txtKeyWord"],
		      	//"rutaImgSm"  	=> $_POST["txtRutaImgSm"],
		      	//"rutaImgMd"  	=> $_POST["txtRutaImgMd"],
		      	//"rutaImgLg"  	=> $_POST["txtRutaImgLg"],
		      	//* "precioNormal" 	=> $_POST["txtPrecioNormal"],
		      	//* "precioInter"  	=> $_POST["txtPrecioInter"],
		      	//* "stock"  		=> $_POST["txtStock"],
		      	"codTipCateg"  => $_POST["cboTipoCategoriaReg"],
				"codCateg"  	=> $_POST["cboCategoriaReg"],
				"codSubCateg"  	=> $_POST["cboSubCategoriaReg"],
		      	"codMarca"  	=> $_POST["cboMarcaReg"],
		      	//"codEstad"  	=> $_POST["cboCodEstado"]
				//"codEstad"  	=> $_POST["hid_cboCodEstado"]
				"codEstad"  	=> $_POST["hid_codEstadoProdReg"]
		   	);
		$obj = new RegistrarStockProductoVentaServiceImpl();
		$dataResponse = $obj->registrarNuevoProductoTienda($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

   	// 20210529 Degui: Modificar producto tienda
   	public function modificarProductoTienda() {
		$isProdAlmac = 0;
		$isActivoAlmac = 0;
		$isDestacado = 0;
		if(isset($_POST['chkProdAlmacMod'])){
			$isProdAlmac = 1; // 1: producto en almacén
		}
		if(isset($_POST['chkActivoAlmacMod'])){
			$isActivoAlmac = 1; // 1: activo en almacén
		}
		if(isset($_POST['chkDestacadoMod'])){
			$isDestacado = 1; // 1: producto destacado
		}
		$dataRequest = array(
					"codProd" 		=> $_POST["hid_codProductoMod"],
					"miniCod" 		=> $_POST["txtMiniCodigoMod"],
		      		"nomProd" 		=> $_POST["txtNomProdMod"],
		      		"desProdCort" 	=> $_POST["txtDescProdCortaMod"],
		      		"desProdLarg" 	=> $_POST["txtDescProdLargaMod"],
					//"especifProd" 	=> $_POST["txtEspecifProdMod"],
					"indPubliEspec"		=> $_POST["cboIndEspecMod"],
					"indPubliGaleria"	=> $_POST["cboIndGaleriaImgMod"],
		      		"keyWord"   	=> $_POST["txtKeyWordMod"],
		      		//"rutaImgSm"  	=> $_POST["txtRutaImgSmMod"],
		      		//"rutaImgMd"  	=> $_POST["txtRutaImgMdMod"],
		      		//"rutaImgLg"  	=> $_POST["txtRutaImgLgMod"],
		      		"precioCompra" 	=> $_POST["txtPrecioCompraMod"],
					"precioNormal" 	=> $_POST["txtPrecioNormalMod"],
		      		"precioInter"  	=> $_POST["txtPrecioInterMod"],
		      		//"stockProve"	=> $_POST["txtStockProveMod"],
					"stockAlmacMod"	=> $_POST["txtStockAlmacMod"],
					"precioDesc"	=> $_POST["txtPrecioDescMod"],
					"fecIniDesc"  	=> $_POST["dpFecIniDescMod"] != '' ? $_POST["dpFecIniDescMod"] : '2001-01-01',
		      		"fecFinDesc"  	=> $_POST["dpFecFinDescMod"] != '' ? $_POST["dpFecFinDescMod"] : '2001-01-01',
					"isProdAlmac"	=> $isProdAlmac,
					"isActivoAlmac"	=> $isActivoAlmac,
					"codMarca"  	=> $_POST["cboMarcaMod"],
					"rucProveedor" 	=> $_POST["cboRucProveedorMod"],
					"codProdProv" 	=> $_POST["txtCodProdProvMod"],
		      		"codTipCateg"  	=> $_POST["cboTipoCategoriaMod"],
					"codCateg"  	=> $_POST["cboCategoriaMod"],
					"codSubCateg"  	=> $_POST["cboSubCategoriaMod"],
		      		"codEstadProd" 	=> $_POST["cboCodEstadoProdMod"],
					"codEstadAlmc" 	=> $_POST["cboCodEstadoAlmcMod"],
					"codEstadPublic"=> $_POST["cboCodEstadoPublicMod"],
					"isDestacado"	=> $isDestacado
		   	    );
		$obj = new RegistrarStockProductoVentaServiceImpl();
		$dataResponse = $obj->modificarProductoTienda($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}
   	
	// 20220506 Registrar especificacion producto
	public function registrarEspecificacionProducto() {
		$esVerdad = 1; // falso
		if(isset($_POST['chkModEspecEstado'])){
			$esVerdad = 0; // 1: producto en almacén
		}
		$dataRequest = array(
			"codProducto" => $_POST["hdModEspecCodProducto"],
			"txtNumOrden" => $_POST["txtModEspecNumOrden"],
			"txtClave" => $_POST["txtModEspecClave"],
			"txtValor" => $_POST["txtModEspecValor"],
			"txtEstado" => $esVerdad
		);
		$obj = new RegistrarStockProductoVentaServiceImpl();
		$dataResponse = $obj->registrarEspecificacionProducto($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

	// 20220515 Modificar especificacion producto
	public function modificarEspecificacionProducto() {
		$esVerdad = 1; // falso
		if(isset($_POST['chkModEspecEstado'])){
			$esVerdad = 0; // 1: producto en almacén
		}
		$dataRequest = array(
			"codProducto" => $_POST["hdModEspecCodProducto"],
			"idEspecificacion" => $_POST["cboModListaEspec"],
			"txtNumOrden" => $_POST["txtModEspecNumOrden"],
			"txtClave" => $_POST["txtModEspecClave"],
			"txtValor" => $_POST["txtModEspecValor"],
			"txtEstado" => $esVerdad
		);
		$obj = new RegistrarStockProductoVentaServiceImpl();
		$dataResponse = $obj->modificarEspecificacionProducto($dataRequest);
    	echo json_encode($dataResponse);
    	exit();
   	}

    // 20210726 subir archivo de imagen
    public function registrarImagenProductoTienda() {
		$obj = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $obj->registrarImagenProductoTienda();
    	echo json_encode($dataResponse);
    	exit();
   	}

	// 20220518 subir imagen galeria
	public function registrarImagenProductoGaleria() {
		$obj = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $obj->registrarImagenProductoGaleria();
    	echo json_encode($dataResponse);
    	exit();
   	}

	// 20220525 Modificar imagen producto galería
	public function modificarImagenProductoGaleria() {
		$obj = new GaleriaImagenProductoServiceImpl();
		$dataResponse = $obj->modificarImagenProductoGaleria();
    	echo json_encode($dataResponse);
    	exit();
   	}


}

?>
