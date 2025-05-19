<?php

require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/service/ifz/src/php/GaleriaImagenProductoService.php';
require_once 'apps/ecwitper-site-portaladmin/modules/ecwitper-salidamercancia-registroventa-modl/dao/imp/src/php/SqlMapGaleriaProductoTiendaDAO.php';

class GaleriaImagenProductoServiceImpl implements GaleriaImagenProductoService{

   	// 20210803 degui: modificar imagen producto tienda
	// 20211231 degui: se ajusta para redirigir a la nueva ruta: /var/www/html/webapps/wwwstore
	// 20231013 degui: - se asigna nueva ruta 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/'
	//				   - se agrega nuevos campos para registrar imagen
   	public function registrarImagenProductoTienda() {
		try{
			//------------------------------------------------------------------
			// Creacion de variables
			//------------------------------------------------------------------
			$ruta_raiz = '/var/www/html/webapps/wmwitper/';
			// 20231016 Degui: Se cambia de ruta de subida para imagen
			//$ruta_imgweb = 'apps/sitecli/skin/compuchiclayo/img/principal/productos/upload/';
			$ruta_subida = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
			$ruta_upload = 'static/witper/'.$ruta_subida;
			$cod_producto = $_POST["codProducto"];
			$nombre_carpeta_prod = $cod_producto.'/';
			$carpeta = $ruta_raiz.$ruta_upload.$nombre_carpeta_prod;
			$listaMensajes["M1"] = "ya existe la carpeta: " . $carpeta;
			$msjError = "No se encontraron errores";
			//------------------------------------------------------------------
			// Si no existe se crea la carpeta y nombre de archivo
			//------------------------------------------------------------------
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0777, true);
				$listaMensajes["M1"] = "Se crea la carpeta: " . $carpeta;
			}
			$nombre_img = "IMG".date("dHis") .".". pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
			$target_file = $carpeta . $nombre_img;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$listaMensajes["X1"] = "file: ".$target_file;
			$listaMensajes["X2"] = "fileType: ".$imageFileType;
			//------------------------------------------------------------------
			// validar el archivo que se intenta subir
			//------------------------------------------------------------------
			$archivoValido = true;
			// validar si el archivo es una imagen
			if($archivoValido && !isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					$listaMensajes["M2"] = "El archivo es una imagen: " . $check["mime"] . ".";
				} else {
					$msjError = "El archivo no es una imagen";
					$archivoValido = false;
				}
			}else{
				$listaMensajes["M3"] = "no submit";
			}
			// validar si la imagen existe
			if ($archivoValido && file_exists($target_file)) {
				$msjError = "La imagen ya se encuentra subido en el servidor.";
				$archivoValido = false;
			}
			// Validar el tamanio del archivo 
			if ($archivoValido && $_FILES["fileToUpload"]["size"] > 524288) {
				$msjError = "El archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
				$archivoValido = false;
			}
			// Validar la extension de la imagen
			if($archivoValido && $imageFileType != "jpg" && $imageFileType != "png" 
				&& $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					$msjError = "Sólo se permiten subir archivos: JPG, JPEG, PNG & GIF";
					$archivoValido = false;
			}
			//------------------------------------------------------------------
			// Si todas las validaciones son correctas, se procede a subir el archivo de imagen
			//------------------------------------------------------------------
			if ($archivoValido) {
				// if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$listaMensajes["M4"] = "El Archivo ha sido subido correctamente.";
					//------------------------------------------------------------------
					//$ruta_img = '../../../../'.$ruta_upload.'/'.$nombre_carpeta_prod.$nombre_archivo;
					$ruta_total = $ruta_subida.$nombre_carpeta_prod.$nombre_img;
					//$ruta_img = $nombre_archivo;
					/* 20231013 GTP: Se comenta para agregar nuevos campos
					$dataRequest = array(
							"cod_producto" => $cod_producto,
							"rutaImgagen1" => $ruta_img
						);*/
					$dataRequest = array(
							"codProducto" 	=> $cod_producto,
							"rutaSubidaImg" => $ruta_subida,
							"nombreCarpeta" => $cod_producto,
							"nombreImagen" 	=> $nombre_img,
							"rutaTotalImg" 	=> $ruta_total
						);
					$dao = new SqlMapGaleriaProductoTiendaDAO();
					$dao->updateImagenProductoTienda($dataRequest);
					$dataResponse["encontrado"] = true;
					$dataResponse["listaMensajes"] = $listaMensajes;
					$dataResponse["msjError"] = $msjError;
					//------------------------------------------------------------------
				} else {
					$listaErrores["E5"] = "Lo sentimos, hubo un error subiendo el archivo.";
					$dataResponse["encontrado"] = false;
					$dataResponse["listaMensajes"] = $listaMensajes;
					$dataResponse["msjError"] = $msjError;
				}
			} else {
				$msjError = "Lo sentimos, no se cumplieron las validaciones para subir la imagen: " . $msjError;
				$dataResponse["encontrado"] = false;
				$dataResponse["listaMensajes"] = $listaMensajes;
				$dataResponse["msjError"] = $msjError;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			$dataResponse["listaMensajes"]   = $listaMensajes;
			$dataResponse["msjError"]    	= "Se produjo un error inesperado, consulte con el webmaster";
			return $dataResponse;
		}
	}

	// 20210804: Obtener imagen producto
	public function obtenerImagenProductoTienda($dataRequest) {
		try{
			$dao = new SqlMapGaleriaProductoTiendaDAO();
			$data = $dao->selectImagenProductoTienda($dataRequest);
			if($data != null && count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data;
			}else{
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "no se obtuvieron resultados";
				$dataResponse["datos"] 	    = 0;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"]    = "Código de Error: "  . $e->getCode();
			$dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

	//---------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------
	// 20220518 Subir imagen de producto en galeria
	public function registrarImagenProductoGaleria() {
		try{
			//------------------------------------------------------------------
			// Creacion de variables
			//------------------------------------------------------------------
			$ruta_raiz = '/var/www/html/webapps/wmwitper/';
			// 20231016 Degui: Se cambia de ruta de subida para imagen
			//$ruta_imgweb = 'apps/sitecli/skin/compuchiclayo/img/principal/productos/upload/';
			$ruta_imgweb = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
			$ruta_upload = 'static/witper/'.$ruta_imgweb;
			$cod_producto = $_POST["codProducto"];
			$nombre_carpeta_prod = $cod_producto.'/';
			$carpeta 	= $ruta_raiz.$ruta_upload.$nombre_carpeta_prod;
			$num_orden 	= $_POST["txtModNumOrdenImgGaleria"];
			//$nomb_img 	= $_POST["txtModNombreImgGaleria"];
			//$desc_img 	= $_POST["txtModDescImgGaleria"];
			$estado 	= $_POST['chkEstadoImgGaleria'];
			//if(isset($_POST['chkModEstadoImgGaleria'])){$estado = 0;/*ver*/}
			//if($_POST['isChkEstadoGaleria']){$estado = 0;}
			//$listaMensajes["F1"] = "data-form: [".$cod_producto."-".$num_orden."-".$nomb_img."-".$desc_img."-".$estado."]";
			$listaMensajes["F1"] = "data-form: [".$cod_producto."-".$num_orden."-".$estado."]";
			$listaMensajes["M1"] = "ya existe la carpeta: " . $carpeta;
			$msjError = "No se encontraron errores";
			//------------------------------------------------------------------
			// Si no existe se crea la carpeta y nombre de archivo
			//------------------------------------------------------------------
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0777, true);
				$listaMensajes["M1"] = "Se crea la carpeta: " . $carpeta;
			}
			$nombre_clave = "IMG".date("dHis");
			$nombre_archivo = $nombre_clave.".". pathinfo($_FILES["fileToUploadGaleria"]["name"],PATHINFO_EXTENSION);
			$target_file = $carpeta . $nombre_archivo;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$listaMensajes["X1"] = "file: ".$target_file;
			$listaMensajes["X2"] = "fileType: ".$imageFileType;
			//------------------------------------------------------------------
			// validar el archivo que se intenta subir
			//------------------------------------------------------------------
			$archivoValido = true;
			// validar si el archivo es una imagen
			if($archivoValido && !isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUploadGaleria"]["tmp_name"]);
				if($check !== false) {
					$listaMensajes["M2"] = "El archivo es una imagen: " . $check["mime"] . ".";
				} else {
					$msjError = "El archivo no es una imagen";
					$archivoValido = false;
				}
			}else{
				$listaMensajes["M3"] = "no submit";
			}
			// validar si la imagen existe
			if ($archivoValido && file_exists($target_file)) {
				$msjError = "La imagen ya se encuentra subido en el servidor.";
				$archivoValido = false;
			}
			// Validar el tamanio del archivo 
			if ($archivoValido && $_FILES["fileToUploadGaleria"]["size"] > 524288) {
				$msjError = "El archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
				$archivoValido = false;
			}
			// Validar la extension de la imagen
			if($archivoValido && $imageFileType != "jpg" && $imageFileType != "png" 
				&& $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					$msjError = "Sólo se permiten subir archivos: JPG, JPEG, PNG & GIF";
					$archivoValido = false;
			}
			//------------------------------------------------------------------
			// Si todas las validaciones son correctas, se procede a subir el archivo de imagen
			//------------------------------------------------------------------
			if ($archivoValido) {
				// if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["fileToUploadGaleria"]["tmp_name"], $target_file)) {
					$listaMensajes["M4"] = "El Archivo ha sido subido correctamente.";
					//------------------------------------------------------------------
					//$ruta_img = '../../../../'.$ruta_upload.'/'.$nombre_carpeta_prod.$nombre_archivo;
					$ruta_img = $ruta_imgweb.$nombre_carpeta_prod.$nombre_archivo;
					$dataRequest = array(
							"cod_producto" 	=> $cod_producto,
							"cod_item" 		=> $nombre_clave,
							"num_orden" 	=> $num_orden,
							"nombre" 		=> $nombre_archivo,
							//"nombre" 		=> $nomb_img,
							//"descripcion" => $desc_img,
							"dir_imagen" 	=> $cod_producto,
							"extension"		=> $imageFileType,
							"estado" 		=> $estado,
							"rutaImgagen" 	=> $ruta_img
						);
					$dao = new SqlMapGaleriaProductoTiendaDAO();
					$dao->insertGaleriaImagenProducto($dataRequest);
					$dataResponse["encontrado"] = true;
					$dataResponse["listaMensajes"] = $listaMensajes;
					$dataResponse["msjError"] = $msjError;
					//------------------------------------------------------------------
				} else {
					$listaErrores["E5"] = "Lo sentimos, hubo un error subiendo el archivo.";
					$dataResponse["encontrado"] = false;
					$dataResponse["listaMensajes"] = $listaMensajes;
					$dataResponse["msjError"] = $msjError;
				}
			} else {
				$msjError = "Lo sentimos, no se cumplieron las validaciones para subir la imagen: " . $msjError;
				$dataResponse["encontrado"] = false;
				$dataResponse["listaMensajes"] = $listaMensajes;
				$dataResponse["msjError"] = $msjError;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			$dataResponse["listaMensajes"]  = $listaMensajes;
			$dataResponse["msjError"]    	= "Se produjo un error inesperado, consulte con el webmaster";
			return $dataResponse;
		}
	}

	// 20220522: Obtener imagenes galeria de productos
	public function obtenerImagenesGaleriaProductos($dataRequest) {
		try{
			$dao = new SqlMapGaleriaProductoTiendaDAO();
			$data = $dao->selectGaleriaImagenProducto($dataRequest);
			if($data != null && count($data) > 0){
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "encontrado";
				$dataResponse["datos"] 	    = $data;
			}else{
				$dataResponse["encontrado"] = true;
				$dataResponse["mensaje"]    = "no se obtuvieron resultados";
				$dataResponse["datos"] 	    = 0;
			}
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"]    = "Código de Error: "  . $e->getCode();
			$dataResponse["mensaje"]    = "Mensaje de Error: " . $e->getMessage();
			return $dataResponse;
		}
	}

	//---------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------
	// 20220525 Modificar imagen de producto en galeria
	public function modificarImagenProductoGaleria() {
		try{
			//------------------------------------------------------------------
			// Creacion de variables
			//------------------------------------------------------------------
			$ruta_raiz = '/var/www/html/webapps/wmwitper/';
			// 20231016 Degui: Se cambia de ruta de subida para imagen
			//$ruta_imgweb = 'apps/sitecli/skin/compuchiclayo/img/principal/productos/upload/';
			$ruta_imgweb = 'apps/ecwitper/img/tiendavirtual/galeria/productos/upload/';
			$ruta_upload = 'static/witper/'.$ruta_imgweb;
			$cod_producto 	= $_POST["codProducto"];
			$id_galeria 	= $_POST["idGaleria"];
			$nombre_carpeta_prod = $cod_producto.'/';
			$carpeta = $ruta_raiz.$ruta_upload.$nombre_carpeta_prod;
			$num_orden 	= $_POST["txtModNumOrdenImgGaleria"];
			//$nomb_img 	= $_POST["txtModNombreImgGaleria"];
			//$desc_img 	= $_POST["txtModDescImgGaleria"];
			$estado 	= $_POST['chkEstadoImgGaleria'];
			//$listaMensajes["F1"] = "data-form: [".$cod_producto."-".$num_orden."-".$nomb_img."-".$desc_img."-".$estado."]";
			$listaMensajes["F1"] = "data-form: [".$cod_producto."-".$num_orden."-".$estado."]";
			$listaMensajes["M1"] = "ya existe la carpeta: " . $carpeta;
			$msjError = "No se encontraron errores";
			//------------------------------------------------------------------
			// Si no existe se crea la carpeta y nombre de archivo
			//------------------------------------------------------------------
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0777, true);
				$listaMensajes["M1"] = "Se crea la carpeta: " . $carpeta;
			}
			$nombre_clave = "IMG".date("dHis");
			$nombre_archivo = $nombre_clave.".". pathinfo($_FILES["fileToUploadGaleria"]["name"],PATHINFO_EXTENSION);
			$target_file = $carpeta . $nombre_archivo;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$listaMensajes["X1"] = "file: ".$target_file;
			$listaMensajes["X2"] = "fileType: ".$imageFileType;
			//------------------------------------------------------------------
			// validar el archivo que se intenta subir
			//------------------------------------------------------------------
			$archivoValido = true;
			$ActualizarImg = true;
			// validar si el archivo es una imagen
			if($archivoValido && !isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUploadGaleria"]["tmp_name"]);
				if($check !== false) {
					$listaMensajes["M2"] = "El archivo es una imagen: " . $check["mime"] . ".";
				} else {
					$msjError = "El archivo no es una imagen";
					$archivoValido = false;
					$ActualizarImg = false;
				}
			}else{
				$listaMensajes["M3"] = "no submit";
			}
			// validar si la imagen existe
			if ($archivoValido && file_exists($target_file)) {
				$msjError = "La imagen ya se encuentra subido en el servidor.";
				$archivoValido = false;
				$ActualizarImg = false;
			}
			// Validar el tamanio del archivo 
			if ($archivoValido && $_FILES["fileToUploadGaleria"]["size"] > 524288) {
				$msjError = "El archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
				$archivoValido = false;
			}
			// Validar la extension de la imagen
			if($archivoValido && $imageFileType != "jpg" && $imageFileType != "png" 
				&& $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					$msjError = "Sólo se permiten subir archivos: JPG, JPEG, PNG & GIF";
					$archivoValido = false;
			}
			//------------------------------------------------------------------
			// Si todas las validaciones son correctas, se procede a subir el archivo de imagen
			//------------------------------------------------------------------
			$ruta_img = "";
			if ($archivoValido) {
				// if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["fileToUploadGaleria"]["tmp_name"], $target_file)) {
					$listaMensajes["M4"] = "El Archivo ha sido subido correctamente.";
					//------------------------------------------------------------------
					//$ruta_img = '../../../../'.$ruta_upload.'/'.$nombre_carpeta_prod.$nombre_archivo;
					$ruta_img = $ruta_imgweb.$nombre_carpeta_prod.$nombre_archivo;
					//------------------------------------------------------------------
				} else {
					$listaErrores["E5"] = "Lo sentimos, hubo un error subiendo el archivo.";
					$dataResponse["encontrado"] = false;
					$dataResponse["listaMensajes"] = $listaMensajes;
					$dataResponse["msjError"] = $msjError;
				}
			} else {
				$msjError = "Lo sentimos, no se cumplieron las validaciones para subir la imagen: " . $msjError;
				$dataResponse["encontrado"] = false;
				$dataResponse["listaMensajes"] = $listaMensajes;
				$dataResponse["msjError"] = $msjError;
			}
			// array
			$dataRequest = array(
				"id_galeria" 	=> $id_galeria,
				"cod_producto" 	=> $cod_producto,
				"cod_item" 		=> $nombre_clave,
				"num_orden" 	=> $num_orden,
				"nombre" 		=> $nombre_archivo,
				"dirImagen" 	=> $cod_producto,
				//"nombre" 		=> $nomb_img,
				//"descripcion" => $desc_img,
				"extension"		=> $imageFileType,
				"estado" 		=> $estado,
				"rutaImgagen" 	=> $ruta_img
			);
			$dao = new SqlMapGaleriaProductoTiendaDAO();
			$dao->updateGaleriaImagenProducto($dataRequest);
			$dataResponse["encontrado"] = true;
			$dataResponse["listaMensajes"] = $listaMensajes;
			$dataResponse["msjError"] = $msjError;
			return $dataResponse;
		}catch (Exception $e) {
			$dataResponse["encontrado"] = false;
			$dataResponse["codeErr"] 	= "Código de Error: " . $e->getCode();
			$dataResponse["mensaje"] 	= "Mensaje de Error: " . $e->getMessage();
			$dataResponse["listaMensajes"]  = $listaMensajes;
			$dataResponse["msjError"]    	= "Se produjo un error inesperado, consulte con el webmaster";
			return $dataResponse;
		}
	}


}

?>
