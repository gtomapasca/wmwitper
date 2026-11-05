<?php
// ----------------------------------------------------------------------------
// Copyright 2019, Nitper, Inc.
// All rights reserved
// nitper.com
// ----------------------------------------------------------------------------
// TERMINOS Y CONDICIONES:
// El uso de este software esta sujeto bajo los terminos y condiciones descrita
// en la licencia 'Comercial' proveida con este software. Si no ha obtenido una
// copia de la licencia, por favor solicite una copia a su proveedor.
// ----------------------------------------------------------------------------
// Clase Usuario:
//  - SqlMap a la tabla producto
// ----------------------------------------------------------------------------
// Change History:
//  2019/04/17  degui <degui@nitper.com>
//     - Se crea SqlMap a la tabla producto
// ----------------------------------------------------------------------------

require_once 'core/dblayer.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/ifz/src/php/PostDAO.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/model/src/php/Post.php';
require_once 'commons/ecwitper-tiendaonline-publicadorarticulos-common/dao/model/src/php/ComentPost.php';

/* Clase SqlMapPostDAO */
class SqlMapPostDAO implements PostDAO{
	// 20191022 Consultar ultima publicacion     
    public function selectLastPost($dataRequest){
		try{
			$ruc = $dataRequest["ruc_negocio"];
			$sql =  "select  a.cod_articulo, a.fecha_creacion, a.titulo, a.subtitulo, a.imagen_sm, a.imagen_md, a.imagen_xl, a.resumen, u.nick, u.avatar, p.nombres, p.ape_pat, p.ape_mat "
					."from    wip_articulo a inner join wip_usuario u on u.id_usuario = a.id_usuario "
					."        inner join wip_cuenta_persona p on p.id_ctapersona=u.id_ctapersona "
					."where   a.ruc_negocio = ? order by fecha_creacion desc limit 10";
			// [INI] Setear data
			$values = [$ruc]; 
			$types = 's';
			$values = array_values($values);
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			$post = new Post();
			$fields = $post->toArrayLastPost();
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }

	// 20191022 Consultar publicacion by id
    public function selectPostById($dataRequest){
		try{
			$cod_post = $dataRequest["codPost"];
			$sql = "select  a.cod_articulo, a.fecha_creacion, a.titulo, a.subtitulo, a.imagen_sm, a.imagen_md, a.imagen_xl, a.resumen, a.contenido, "
				."        u.nick, u.avatar, p.nombres, p.ape_pat, p.ape_mat "
				."from    wip_articulo a inner join wip_usuario u on u.id_usuario = a.id_usuario "
				."        inner join wip_cuenta_persona p on p.id_ctapersona=u.id_ctapersona "
				."where   a.cod_articulo = ?";
			//$data = array('s', "{$cod_post}");
			// [INI] Setear data
			$values = [$cod_post]; 
			$types = 's';
			$values = array_values($values);
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			$post = new Post();
			$fields = $post->toArrayPost();
			return DBObject::ejecutar($sql, $data, $fields);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }

	// 20191020 Consultar comentarios de una publicacion by id
    public function selectComentPostById($dataRequest){
		try{
			$cod_post = $dataRequest["codPost"];
			$sql = "select  co.fecha_creacion, co.comentario, co.nick, u.avatar, p.nombres, p.ape_pat, p.ape_mat "
				."from    wip_comentario_articulo co inner join wip_usuario u on co.id_usuario = u.id_usuario "
				."        inner join wip_cuenta_persona p on p.id_ctapersona=u.id_ctapersona "
				."where   co.del = 0 and co.cod_articulo = ? order by fecha_creacion asc";
			//$data = array('s', "{$cod_post}");
			// [INI] Setear data
			$values = [$cod_post]; 
			$types = 's';
			$values = array_values($values);
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			$comentPost = new ComentPost();
			$fields = $comentPost->toArray();
			return DBObject::ejecutar($sql, $data, $fields);
			//return $resp_temp = array ("sql" => $sql, "data" => $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }

	// 20191020 degui: Registrar comentario publicacion
	public function insertComentPost($jsonParams){
		try{
			$codPost = $jsonParams->codPost;
			$codUsuario = $jsonParams->codUsuario;
			$nick = $jsonParams->nick;
			$comentario = $jsonParams->comentario;

			$sql  = "insert into wip_comentario_articulo (cod_articulo, id_usuario, nick, comentario, estado, del " 				
				.", fecha_creacion, codusu_reg, codusu_act, fecha_reg, fecha_act, fk_idcomentario) "
				."values (?, ?, ?, ?, 0, 0, NOW(), USER(), USER(), NOW(), NOW(), null)";
			//$data = array('ssss', "{$codPost}", "{$codUsuario}", "{$nick}", "{$comentario}");
			// [INI] Setear data
			$values = [$codPost, $codUsuario, $nick, $comentario]; 
			$types = 'ssss';
			$values = array_values($values);
			$data[] = $types;
			foreach ($values as $i => $v) {
				$data[] = &$values[$i]; 
			}
			// [FIN] Setear data
			DBObject::ejecutar($sql, $data);
		}catch (Exception $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
		}	
    }
      	
}

?>
