-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: witperdb
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `wip_articulo`
--

DROP TABLE IF EXISTS `wip_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_articulo` (
  `cod_articulo` char(10) NOT NULL,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_modifica` datetime DEFAULT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(100) DEFAULT NULL,
  `imagen_sm` varchar(800) DEFAULT NULL,
  `imagen_md` varchar(800) DEFAULT NULL,
  `imagen_xl` varchar(800) DEFAULT NULL,
  `resumen` text DEFAULT NULL,
  `contenido` longtext DEFAULT NULL,
  `key_word` varchar(500) DEFAULT NULL,
  `cant_comen` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idtipo` tinyint(4) NOT NULL,
  `fk_idcategoria` tinyint(4) NOT NULL,
  PRIMARY KEY (`cod_articulo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  KEY `fk_idtipo` (`fk_idtipo`),
  KEY `fk_idcategoria` (`fk_idcategoria`),
  CONSTRAINT `wip_articulo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_articulo_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_articulo_ibfk_3` FOREIGN KEY (`fk_idtipo`) REFERENCES `wip_tipo_art` (`id_tipo`),
  CONSTRAINT `wip_articulo_ibfk_4` FOREIGN KEY (`fk_idcategoria`) REFERENCES `wip_categoria_art` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_aviso`
--

DROP TABLE IF EXISTS `wip_aviso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_aviso` (
  `num_secuencia` bigint(20) NOT NULL AUTO_INCREMENT,
  `num_secaviso` bigint(10) DEFAULT NULL,
  `num_asocaviso` bigint(10) DEFAULT NULL,
  `num_servicio` bigint(10) DEFAULT NULL,
  `nom_plantilla` varchar(50) DEFAULT NULL,
  `cod_tipaviso` char(2) DEFAULT NULL,
  `remitente` varchar(150) DEFAULT NULL,
  `destinatario` varchar(250) DEFAULT NULL,
  `des_aviso` longtext NOT NULL,
  `rpt_aviso` longtext DEFAULT NULL,
  `err_aviso` longtext DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`num_secuencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_buzon`
--

DROP TABLE IF EXISTS `wip_buzon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_buzon` (
  `id_buzon` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `asunto` varchar(50) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_buzon`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_buzon_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_cabmenu`
--

DROP TABLE IF EXISTS `wip_cabmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_cabmenu` (
  `id_cabmenu` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cabmenu`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_cabmenu_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_catalogo`
--

DROP TABLE IF EXISTS `wip_catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_catalogo` (
  `cod_catalogo` char(3) NOT NULL,
  `ruc_negocio` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_catalogo`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_catalogo_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_categoria_art`
--

DROP TABLE IF EXISTS `wip_categoria_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_categoria_art` (
  `id_categoria` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_categoria_producto`
--

DROP TABLE IF EXISTS `wip_categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_categoria_producto` (
  `cod_tipo` char(3) NOT NULL,
  `cod_categoria` char(4) NOT NULL,
  `nom_categoria` varchar(100) NOT NULL,
  `des_categoria` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_categoria`),
  KEY `cod_tipo` (`cod_tipo`),
  CONSTRAINT `wip_categoria_producto_ibfk_1` FOREIGN KEY (`cod_tipo`) REFERENCES `wip_tipo_categoria` (`cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_comentario_articulo`
--

DROP TABLE IF EXISTS `wip_comentario_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_comentario_articulo` (
  `id_comentario` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_articulo` char(10) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `nick` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comentario` text NOT NULL,
  `estado` char(1) DEFAULT '0',
  `del` char(1) DEFAULT '0',
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idcomentario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `cod_articulo` (`cod_articulo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `fk_idcomentario` (`fk_idcomentario`),
  CONSTRAINT `wip_comentario_articulo_ibfk_1` FOREIGN KEY (`cod_articulo`) REFERENCES `wip_articulo` (`cod_articulo`),
  CONSTRAINT `wip_comentario_articulo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_comentario_articulo_ibfk_3` FOREIGN KEY (`fk_idcomentario`) REFERENCES `wip_comentario_articulo` (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_comentario_producto_tienda`
--

DROP TABLE IF EXISTS `wip_comentario_producto_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_comentario_producto_tienda` (
  `id_comentario` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `nick` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comentario` text NOT NULL,
  `estado` char(1) DEFAULT '0',
  `del` char(1) DEFAULT '0',
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idcomentario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `fk_idcomentario` (`fk_idcomentario`),
  KEY `cod_producto` (`cod_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `wip_comentario_producto_tienda_ibfk_1` FOREIGN KEY (`fk_idcomentario`) REFERENCES `wip_comentario_producto_tienda` (`id_comentario`),
  CONSTRAINT `wip_comentario_producto_tienda_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`),
  CONSTRAINT `wip_comentario_producto_tienda_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_compra`
--

DROP TABLE IF EXISTS `wip_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_compra` (
  `id_compra` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nro_serie` varchar(10) DEFAULT NULL,
  `nro_correlativo` varchar(15) DEFAULT NULL,
  `observacion` varchar(15) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `ruc_negocio` (`ruc_negocio`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `wip_compra_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_compra_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_cuenta_negocio`
--

DROP TABLE IF EXISTS `wip_cuenta_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_cuenta_negocio` (
  `ruc_negocio` varchar(11) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `direccion` varchar(25) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(40) DEFAULT NULL,
  `whatsapp` varchar(40) DEFAULT NULL,
  `facebook` varchar(40) DEFAULT NULL,
  `twitter` varchar(40) DEFAULT NULL,
  `googleplus` varchar(40) DEFAULT NULL,
  `googlemaps` varchar(40) DEFAULT NULL,
  `youtube` varchar(40) DEFAULT NULL,
  `instagram` varchar(40) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ruc_negocio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_cuenta_persona`
--

DROP TABLE IF EXISTS `wip_cuenta_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_cuenta_persona` (
  `id_ctapersona` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `tipo_usu` char(1) NOT NULL,
  `doc_tip` char(2) DEFAULT NULL,
  `doc_num` varchar(15) DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `ape_pat` varchar(25) DEFAULT NULL,
  `ape_mat` varchar(25) DEFAULT NULL,
  `fotografia` varchar(200) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cod_appreg` varchar(5) DEFAULT NULL,
  `cod_appact` varchar(5) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(25) DEFAULT NULL,
  `provincia` varchar(25) DEFAULT NULL,
  `distrito` varchar(25) DEFAULT NULL,
  `tipo_tarjeta` char(2) DEFAULT NULL,
  `nro_tarjeta` varchar(20) DEFAULT NULL,
  `nro_cuenta` varchar(20) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ctapersona`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_cuenta_persona_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=725 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_datacata`
--

DROP TABLE IF EXISTS `wip_datacata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_datacata` (
  `cod_catalogo` char(3) NOT NULL,
  `cod_datacata` char(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_datacata`),
  KEY `cod_catalogo` (`cod_catalogo`),
  CONSTRAINT `wip_datacata_ibfk_1` FOREIGN KEY (`cod_catalogo`) REFERENCES `wip_catalogo` (`cod_catalogo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_gpro_prog`
--

DROP TABLE IF EXISTS `wip_deta_gpro_prog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_gpro_prog` (
  `cod_gprog` char(6) NOT NULL,
  `cod_programa` char(10) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_gprog`,`cod_programa`),
  KEY `cod_programa` (`cod_programa`),
  CONSTRAINT `wip_deta_gpro_prog_ibfk_1` FOREIGN KEY (`cod_gprog`) REFERENCES `wip_grupo_prog` (`cod_gprog`),
  CONSTRAINT `wip_deta_gpro_prog_ibfk_2` FOREIGN KEY (`cod_programa`) REFERENCES `wip_programa` (`cod_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_mtgp_gpro`
--

DROP TABLE IF EXISTS `wip_deta_mtgp_gpro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_mtgp_gpro` (
  `cod_mtgp` char(6) NOT NULL,
  `cod_gprog` char(6) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_mtgp`,`cod_gprog`),
  KEY `cod_gprog` (`cod_gprog`),
  CONSTRAINT `wip_deta_mtgp_gpro_ibfk_1` FOREIGN KEY (`cod_mtgp`) REFERENCES `wip_meta_gprog` (`cod_mtgp`),
  CONSTRAINT `wip_deta_mtgp_gpro_ibfk_2` FOREIGN KEY (`cod_gprog`) REFERENCES `wip_grupo_prog` (`cod_gprog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_perf_mtgp`
--

DROP TABLE IF EXISTS `wip_deta_perf_mtgp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_perf_mtgp` (
  `cod_perfil` char(4) NOT NULL,
  `cod_mtgp` char(6) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`,`cod_mtgp`),
  KEY `cod_mtgp` (`cod_mtgp`),
  CONSTRAINT `wip_deta_perf_mtgp_ibfk_1` FOREIGN KEY (`cod_perfil`) REFERENCES `wip_perfil_usu` (`cod_perfil`),
  CONSTRAINT `wip_deta_perf_mtgp_ibfk_2` FOREIGN KEY (`cod_mtgp`) REFERENCES `wip_meta_gprog` (`cod_mtgp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_perf_rol`
--

DROP TABLE IF EXISTS `wip_deta_perf_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_perf_rol` (
  `cod_perfil` char(4) NOT NULL,
  `cod_rol` char(5) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`,`cod_rol`),
  KEY `cod_rol` (`cod_rol`),
  CONSTRAINT `wip_deta_perf_rol_ibfk_1` FOREIGN KEY (`cod_perfil`) REFERENCES `wip_perfil_usu` (`cod_perfil`),
  CONSTRAINT `wip_deta_perf_rol_ibfk_2` FOREIGN KEY (`cod_rol`) REFERENCES `wip_rol` (`cod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_prog_rol`
--

DROP TABLE IF EXISTS `wip_deta_prog_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_prog_rol` (
  `cod_programa` char(10) NOT NULL,
  `cod_rol` char(5) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_programa`,`cod_rol`),
  KEY `cod_rol` (`cod_rol`),
  CONSTRAINT `wip_deta_prog_rol_ibfk_1` FOREIGN KEY (`cod_programa`) REFERENCES `wip_programa` (`cod_programa`),
  CONSTRAINT `wip_deta_prog_rol_ibfk_2` FOREIGN KEY (`cod_rol`) REFERENCES `wip_rol` (`cod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_deta_usua_perf`
--

DROP TABLE IF EXISTS `wip_deta_usua_perf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_deta_usua_perf` (
  `id_usuario` bigint(20) NOT NULL,
  `cod_perfil` char(4) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `permiso` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Permiso 0:sin permiso, 1: permiso de lectura',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`cod_perfil`),
  KEY `cod_perfil` (`cod_perfil`),
  CONSTRAINT `wip_deta_usua_perf_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_deta_usua_perf_ibfk_2` FOREIGN KEY (`cod_perfil`) REFERENCES `wip_perfil_usu` (`cod_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_almacen`
--

DROP TABLE IF EXISTS `wip_detalle_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_almacen` (
  `id_compra` bigint(20) NOT NULL,
  `cod_producto` varchar(15) NOT NULL,
  `sku` char(10) NOT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_compra`,`cod_producto`,`sku`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_detalle_almacen_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `wip_compra` (`id_compra`),
  CONSTRAINT `wip_detalle_almacen_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_almacen` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_compra`
--

DROP TABLE IF EXISTS `wip_detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_compra` (
  `id_compra` bigint(20) NOT NULL,
  `ruc_proveedor` char(11) NOT NULL,
  `cod_producto` varchar(15) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unidad` decimal(7,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_compra`,`ruc_proveedor`,`cod_producto`),
  KEY `ruc_proveedor` (`ruc_proveedor`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `wip_compra` (`id_compra`),
  CONSTRAINT `wip_detalle_compra_ibfk_2` FOREIGN KEY (`ruc_proveedor`) REFERENCES `wip_producto_proveedor` (`ruc_proveedor`),
  CONSTRAINT `wip_detalle_compra_ibfk_3` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_proveedor` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_grupocata`
--

DROP TABLE IF EXISTS `wip_detalle_grupocata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_grupocata` (
  `cod_catalogo` char(3) NOT NULL,
  `cod_datacata` char(5) NOT NULL,
  `cod_grupocata` char(3) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_catalogo`,`cod_datacata`,`cod_grupocata`),
  KEY `cod_grupocata` (`cod_grupocata`),
  CONSTRAINT `wip_detalle_grupocata_ibfk_1` FOREIGN KEY (`cod_grupocata`) REFERENCES `wip_grupocata` (`cod_grupocata`),
  CONSTRAINT `wip_detalle_grupocata_ibfk_2` FOREIGN KEY (`cod_catalogo`, `cod_datacata`) REFERENCES `wip_datacata` (`cod_catalogo`, `cod_datacata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_pedido`
--

DROP TABLE IF EXISTS `wip_detalle_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_pedido` (
  `id_pedido` bigint(20) NOT NULL,
  `cod_producto` varchar(15) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciou` decimal(7,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `wip_pedido` (`id_pedido`),
  CONSTRAINT `wip_detalle_pedido_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_presentacion`
--

DROP TABLE IF EXISTS `wip_detalle_presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_presentacion` (
  `id_presentacion` bigint(20) NOT NULL,
  `id_propiedad` bigint(20) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_presentacion`,`id_propiedad`),
  KEY `id_propiedad` (`id_propiedad`),
  CONSTRAINT `wip_detalle_presentacion_ibfk_1` FOREIGN KEY (`id_presentacion`) REFERENCES `wip_presentacion` (`id_presentacion`),
  CONSTRAINT `wip_detalle_presentacion_ibfk_2` FOREIGN KEY (`id_propiedad`) REFERENCES `wip_propiedad` (`id_propiedad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_publicacion_articulo`
--

DROP TABLE IF EXISTS `wip_detalle_publicacion_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_publicacion_articulo` (
  `id_publicacion` bigint(20) NOT NULL,
  `cod_articulo` char(10) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`,`cod_articulo`),
  KEY `cod_articulo` (`cod_articulo`),
  CONSTRAINT `wip_detalle_publicacion_articulo_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `wip_publicacion_articulo` (`id_publicacion`),
  CONSTRAINT `wip_detalle_publicacion_articulo_ibfk_2` FOREIGN KEY (`cod_articulo`) REFERENCES `wip_articulo` (`cod_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_publicacion_producto`
--

DROP TABLE IF EXISTS `wip_detalle_publicacion_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_publicacion_producto` (
  `id_publicacion` bigint(20) NOT NULL,
  `cod_producto_tienda` varchar(15) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`,`cod_producto_tienda`),
  KEY `cod_producto_tienda` (`cod_producto_tienda`),
  CONSTRAINT `wip_detalle_publicacion_producto_ibfk_1` FOREIGN KEY (`cod_producto_tienda`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_tienda`
--

DROP TABLE IF EXISTS `wip_detalle_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_tienda` (
  `cod_producto_tienda` varchar(15) NOT NULL,
  `cod_producto_almacen` varchar(15) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_producto_tienda`,`cod_producto_almacen`),
  KEY `cod_producto_almacen` (`cod_producto_almacen`),
  CONSTRAINT `wip_detalle_tienda_ibfk_1` FOREIGN KEY (`cod_producto_tienda`) REFERENCES `wip_producto_tienda` (`cod_producto`),
  CONSTRAINT `wip_detalle_tienda_ibfk_2` FOREIGN KEY (`cod_producto_almacen`) REFERENCES `wip_producto_almacen` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_detalle_venta`
--

DROP TABLE IF EXISTS `wip_detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_detalle_venta` (
  `id_venta` bigint(20) NOT NULL,
  `cod_producto` varchar(15) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `cod_moneda` char(2) DEFAULT NULL,
  `cod_umedida` char(3) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciou` decimal(7,2) DEFAULT NULL,
  `cod_desc` char(3) DEFAULT NULL,
  `precio_desc` decimal(7,2) DEFAULT NULL,
  `valor_unit` decimal(7,2) DEFAULT NULL,
  `igv` int(11) DEFAULT NULL,
  `monto_igv` decimal(7,2) DEFAULT NULL,
  `importe` decimal(7,2) DEFAULT NULL,
  `importe_igv` decimal(7,2) DEFAULT NULL,
  `importe_total` decimal(7,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_venta`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `wip_venta` (`id_venta`),
  CONSTRAINT `wip_detalle_venta_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_especificacion_producto`
--

DROP TABLE IF EXISTS `wip_especificacion_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_especificacion_producto` (
  `id_especificacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `num_orden` int(11) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `valor` varchar(500) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_especificacion`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_especificacion_producto_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3184 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_fabricante`
--

DROP TABLE IF EXISTS `wip_fabricante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_fabricante` (
  `cod_fabricante` char(6) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_fabricante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_articulo`
--

DROP TABLE IF EXISTS `wip_galeria_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_articulo` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_articulo` char(10) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` char(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `cod_articulo` (`cod_articulo`),
  CONSTRAINT `wip_galeria_articulo_ibfk_1` FOREIGN KEY (`cod_articulo`) REFERENCES `wip_articulo` (`cod_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_comentario_articulo`
--

DROP TABLE IF EXISTS `wip_galeria_comentario_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_comentario_articulo` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_comentario` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` varchar(15) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `id_comentario` (`id_comentario`),
  CONSTRAINT `wip_galeria_comentario_articulo_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `wip_comentario_articulo` (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_comentario_pt`
--

DROP TABLE IF EXISTS `wip_galeria_comentario_pt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_comentario_pt` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_comentario` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` char(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `id_comentario` (`id_comentario`),
  CONSTRAINT `wip_galeria_comentario_pt_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `wip_comentario_producto_tienda` (`id_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_ctanegocio`
--

DROP TABLE IF EXISTS `wip_galeria_ctanegocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_ctanegocio` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` char(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_galeria_ctanegocio_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_ctapersona`
--

DROP TABLE IF EXISTS `wip_galeria_ctapersona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_ctapersona` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ctapersona` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` char(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `id_ctapersona` (`id_ctapersona`),
  CONSTRAINT `wip_galeria_ctapersona_ibfk_1` FOREIGN KEY (`id_ctapersona`) REFERENCES `wip_cuenta_persona` (`id_ctapersona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_producto_fabrica`
--

DROP TABLE IF EXISTS `wip_galeria_producto_fabrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_producto_fabrica` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `cod_item` char(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_galeria_producto_fabrica_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_fabrica` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_galeria_producto_tienda`
--

DROP TABLE IF EXISTS `wip_galeria_producto_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_galeria_producto_tienda` (
  `id_galeria` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `num_orden` int(11) DEFAULT 0,
  `cod_item` varchar(45) DEFAULT ' ' COMMENT 'nombre clave imagen',
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `dir_img` varchar(45) DEFAULT NULL,
  `ruta` varchar(400) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_galeria_producto_tienda_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=772 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_grupo_prog`
--

DROP TABLE IF EXISTS `wip_grupo_prog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_grupo_prog` (
  `cod_gprog` char(6) NOT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `nro_grup_prog` varchar(50) NOT NULL,
  `nom_grup_prog` varchar(100) NOT NULL,
  `des_grup_prog` varchar(100) NOT NULL,
  `cod_tipo_prog` char(2) NOT NULL DEFAULT '' COMMENT 'Tipo programa PW: Programa Web, PC: Programa CPanel',
  `cod_nivel_prog` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Nivel programa 0: sin nivel, 1: basico, 2: intermedio, 3: avanzado, 4: superior',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_gprog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_grupocata`
--

DROP TABLE IF EXISTS `wip_grupocata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_grupocata` (
  `cod_grupocata` char(3) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_grupocata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_libro_reclamo`
--

DROP TABLE IF EXISTS `wip_libro_reclamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_libro_reclamo` (
  `id_libro` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `num_reclamo` varchar(10) NOT NULL,
  `cod_tipdoc` char(1) DEFAULT NULL,
  `num_tipdoc` varchar(20) DEFAULT NULL,
  `cli_dni` char(8) NOT NULL,
  `cli_nombre` varchar(50) NOT NULL,
  `cli_telf` varchar(15) DEFAULT NULL,
  `cli_cel` varchar(15) NOT NULL,
  `cli_email` varchar(50) DEFAULT NULL,
  `cli_domicilio` varchar(100) NOT NULL,
  `cli_departamento` varchar(50) DEFAULT NULL,
  `cli_provincia` varchar(50) DEFAULT NULL,
  `cli_distrito` varchar(50) DEFAULT NULL,
  `cli_pedido` varchar(500) NOT NULL,
  `cod_tipcomp` char(1) DEFAULT NULL,
  `nro_compra` varchar(15) NOT NULL,
  `fec_compra` varchar(15) DEFAULT NULL,
  `cod_producto` varchar(15) DEFAULT NULL,
  `des_producto` varchar(500) DEFAULT NULL,
  `can_producto` varchar(4) DEFAULT NULL,
  `pre_producto` varchar(10) DEFAULT NULL,
  `tipo_motivo` bit(1) NOT NULL,
  `desc_motivo` varchar(500) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_libro_reclamo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_libro_reclamo_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_medio_pago`
--

DROP TABLE IF EXISTS `wip_medio_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_medio_pago` (
  `id_mediopago` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_mediopago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_menu`
--

DROP TABLE IF EXISTS `wip_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_menu` (
  `id_menu` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_cabmenu` bigint(20) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `uri_publi` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idmenu` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id_cabmenu` (`id_cabmenu`),
  KEY `fk_idmenu` (`fk_idmenu`),
  CONSTRAINT `wip_menu_ibfk_1` FOREIGN KEY (`id_cabmenu`) REFERENCES `wip_cabmenu` (`id_cabmenu`),
  CONSTRAINT `wip_menu_ibfk_2` FOREIGN KEY (`fk_idmenu`) REFERENCES `wip_menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_meta_gprog`
--

DROP TABLE IF EXISTS `wip_meta_gprog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_meta_gprog` (
  `cod_mtgp` char(6) NOT NULL COMMENT 'codigo de meta grupo de programa',
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `nro_meta_prog` varchar(50) NOT NULL,
  `nom_meta_prog` varchar(100) NOT NULL,
  `des_meta_prog` varchar(100) NOT NULL,
  `cod_tipo_prog` char(2) NOT NULL DEFAULT '' COMMENT 'Tipo programa PW: Programa Web, PC: Programa CPanel',
  `cod_nivel_prog` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Nivel programa 0: sin nivel, 1: basico, 2: intermedio, 3: avanzado, 4: superior',
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_mtgp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_meta_prog`
--

DROP TABLE IF EXISTS `wip_meta_prog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_meta_prog` (
  `cod_meta_prog` char(4) NOT NULL,
  `nom_meta_prog` varchar(100) NOT NULL,
  `des_meta_prog` varchar(200) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_meta_prog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_pedido`
--

DROP TABLE IF EXISTS `wip_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_pedido` (
  `id_pedido` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nro_pedido` varchar(10) DEFAULT NULL,
  `medio_pago` varchar(25) DEFAULT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  `carrito_nropedido` varchar(10) DEFAULT NULL,
  `carrito_dni` varchar(8) DEFAULT NULL,
  `carrito_cliente` varchar(100) DEFAULT NULL,
  `carrito_celular` varchar(15) DEFAULT NULL,
  `carrito_email` varchar(50) DEFAULT NULL,
  `carrito_direccion` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_pedido_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_perfil_usu`
--

DROP TABLE IF EXISTS `wip_perfil_usu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_perfil_usu` (
  `cod_perfil` char(4) NOT NULL,
  `nom_perfil` varchar(50) NOT NULL,
  `des_perfil` varchar(200) DEFAULT NULL,
  `cod_tipo_cat` char(4) NOT NULL DEFAULT '' COMMENT 'Catalogo tipo grupo',
  `cod_tipo_perf` char(2) NOT NULL DEFAULT '' COMMENT 'Tipo perfil PW: Perfil Web, PC: Perfil CPanel',
  `cod_nivel_perf` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Nivel perfil 0: sin nivel, 1: basico, 2: intermedio, 3: avanzado, 4: superior',
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_plaza_postulante`
--

DROP TABLE IF EXISTS `wip_plaza_postulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_plaza_postulante` (
  `num_sec` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_plaza` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `perfil_desc` varchar(500) DEFAULT NULL,
  `esp_economica` int(11) DEFAULT NULL,
  `cv` varchar(500) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`num_sec`,`id_plaza`,`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_plaza` (`id_plaza`),
  CONSTRAINT `wip_plaza_postulante_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_plaza_postulante_ibfk_2` FOREIGN KEY (`id_plaza`) REFERENCES `wip_plaza_trabajo` (`id_plaza`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_plaza_trabajo`
--

DROP TABLE IF EXISTS `wip_plaza_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_plaza_trabajo` (
  `id_plaza` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nro_plaza` varchar(50) DEFAULT NULL,
  `nom_plaza` varchar(50) DEFAULT NULL,
  `can_plaza` tinyint(4) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_plaza`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_plaza_trabajo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_plaza_trabajo_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_presentacion`
--

DROP TABLE IF EXISTS `wip_presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_presentacion` (
  `id_presentacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_producto` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_presentacion`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `wip_presentacion_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_tienda` (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_producto_almacen`
--

DROP TABLE IF EXISTS `wip_producto_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_producto_almacen` (
  `cod_producto` varchar(15) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `producto` varchar(150) DEFAULT NULL,
  `imagen_sm` varchar(800) DEFAULT NULL,
  `imagen_md` varchar(800) DEFAULT NULL,
  `imagen_xl` varchar(800) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `serie` varchar(15) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `num_partes` char(6) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `wip_producto_almacen_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_fabrica` (`cod_producto`),
  CONSTRAINT `wip_producto_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_producto_fabrica`
--

DROP TABLE IF EXISTS `wip_producto_fabrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_producto_fabrica` (
  `cod_producto` varchar(15) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `cod_fabricante` char(6) NOT NULL,
  `producto` varchar(150) DEFAULT NULL,
  `imagen_sm` varchar(800) DEFAULT NULL,
  `imagen_md` varchar(800) DEFAULT NULL,
  `imagen_xl` varchar(800) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `serie` varchar(15) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `num_partes` char(6) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `cod_fabricante` (`cod_fabricante`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `wip_producto_fabrica_ibfk_1` FOREIGN KEY (`cod_fabricante`) REFERENCES `wip_fabricante` (`cod_fabricante`),
  CONSTRAINT `wip_producto_fabrica_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_producto_proveedor`
--

DROP TABLE IF EXISTS `wip_producto_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_producto_proveedor` (
  `ruc_proveedor` char(11) NOT NULL,
  `cod_producto` varchar(15) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `imagen_sm` varchar(800) DEFAULT NULL,
  `imagen_md` varchar(800) DEFAULT NULL,
  `imagen_xl` varchar(800) DEFAULT NULL,
  `precio_unidad` decimal(7,2) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ruc_proveedor`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `wip_producto_proveedor_ibfk_1` FOREIGN KEY (`ruc_proveedor`) REFERENCES `wip_proveedor` (`ruc_proveedor`),
  CONSTRAINT `wip_producto_proveedor_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `wip_producto_fabrica` (`cod_producto`),
  CONSTRAINT `wip_producto_proveedor_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_producto_tienda`
--

DROP TABLE IF EXISTS `wip_producto_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_producto_tienda` (
  `cod_producto` varchar(15) NOT NULL,
  `cod_fabricante` char(6) NOT NULL,
  `cod_tipcategoria` char(2) DEFAULT '',
  `cod_categoria` char(4) NOT NULL,
  `cod_subcategoria` char(6) DEFAULT '',
  `producto` varchar(150) DEFAULT NULL,
  `descrip_corta` varchar(400) DEFAULT NULL,
  `descrip_larga` longtext DEFAULT NULL,
  `especificaciones` longtext DEFAULT NULL,
  `ind_especificaciones` char(1) NOT NULL DEFAULT '0',
  `ind_galeriaImagenes` char(1) NOT NULL DEFAULT '0',
  `nom_img` varchar(45) DEFAULT NULL,
  `dir_img` varchar(45) DEFAULT NULL,
  `ruta_img` varchar(150) DEFAULT NULL,
  `imagen_sm` varchar(800) DEFAULT NULL,
  `imagen_md` varchar(800) DEFAULT NULL,
  `imagen_lg` varchar(800) DEFAULT NULL,
  `key_word` varchar(500) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `precio_compra_final` decimal(7,2) DEFAULT NULL,
  `precio_venta_normal` decimal(7,2) DEFAULT NULL,
  `precio_venta_internet` decimal(7,2) DEFAULT NULL,
  `precio_venta_tarjeta` decimal(7,2) DEFAULT NULL,
  `descuento_internet` decimal(2,2) DEFAULT NULL,
  `descuento_tarjeta` decimal(2,2) DEFAULT NULL,
  `fecini_descinter` datetime DEFAULT NULL,
  `fecfin_descinter` datetime DEFAULT NULL,
  `fecini_desctarj` datetime DEFAULT NULL,
  `fecfin_desctarj` datetime DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `cant_items` int(11) DEFAULT NULL,
  `puntaje` int(11) DEFAULT NULL,
  `almacen_ind` char(1) NOT NULL DEFAULT '0',
  `almacen_stock` int(11) NOT NULL DEFAULT 0,
  `almacen_est` char(2) DEFAULT '',
  `almacen_fecreg` datetime DEFAULT NULL,
  `almacen_fecmod` datetime DEFAULT NULL,
  `almacen_usureg` varchar(45) DEFAULT NULL,
  `almacen_usumod` varchar(45) DEFAULT NULL,
  `almacen_del` char(1) NOT NULL DEFAULT '0',
  `destacado_ind` char(1) DEFAULT '0',
  `descuento_precio` decimal(7,2) DEFAULT 0.00,
  `descuento_fecini` datetime DEFAULT NULL,
  `descuento_fecfin` datetime DEFAULT NULL,
  `proveedor_ruc` varchar(11) DEFAULT NULL,
  `proveedor_codprod` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `estado_prod` char(2) DEFAULT '',
  `public_est` char(2) DEFAULT '',
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `mini_codigo` char(6) DEFAULT NULL,
  PRIMARY KEY (`cod_producto`),
  KEY `cod_fabricante` (`cod_fabricante`),
  KEY `cod_categoria` (`cod_categoria`),
  CONSTRAINT `wip_producto_tienda_ibfk_1` FOREIGN KEY (`cod_fabricante`) REFERENCES `wip_fabricante` (`cod_fabricante`),
  CONSTRAINT `wip_producto_tienda_ibfk_2` FOREIGN KEY (`cod_categoria`) REFERENCES `wip_categoria_producto` (`cod_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_programa`
--

DROP TABLE IF EXISTS `wip_programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_programa` (
  `cod_programa` char(10) NOT NULL,
  `cod_meta_prog` char(4) NOT NULL,
  `nro_prog` varchar(5) NOT NULL,
  `nom_prog` varchar(50) NOT NULL,
  `des_prog` varchar(100) DEFAULT NULL,
  `cod_page` varchar(10) NOT NULL,
  `nom_page` varchar(50) DEFAULT NULL,
  `dir_page` varchar(200) DEFAULT NULL,
  `contexto` varchar(50) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_programa`),
  KEY `cod_meta_prog` (`cod_meta_prog`),
  CONSTRAINT `wip_programa_ibfk_1` FOREIGN KEY (`cod_meta_prog`) REFERENCES `wip_meta_prog` (`cod_meta_prog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_propiedad`
--

DROP TABLE IF EXISTS `wip_propiedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_propiedad` (
  `id_propiedad` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_propiedad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_proveedor`
--

DROP TABLE IF EXISTS `wip_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_proveedor` (
  `ruc_proveedor` char(11) NOT NULL,
  `ruc_negocio` varchar(11) DEFAULT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ruc_proveedor`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_proveedor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_proveedor_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_publicacion_articulo`
--

DROP TABLE IF EXISTS `wip_publicacion_articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_publicacion_articulo` (
  `id_publicacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `cod_pagenom` char(6) DEFAULT NULL,
  `cod_pagesec` char(6) DEFAULT NULL,
  `url_publi` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_publicacion_articulo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_publicacion_articulo_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_publicacion_producto`
--

DROP TABLE IF EXISTS `wip_publicacion_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_publicacion_producto` (
  `id_publicacion` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) DEFAULT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `cod_pagenom` char(6) DEFAULT NULL,
  `cod_pagesec` char(6) DEFAULT NULL,
  `url_publi` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_publicacion_producto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `wip_usuario` (`id_usuario`),
  CONSTRAINT `wip_publicacion_producto_ibfk_2` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_rol`
--

DROP TABLE IF EXISTS `wip_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_rol` (
  `cod_rol` char(5) NOT NULL,
  `nom_rol` varchar(50) NOT NULL,
  `des_rol` varchar(100) NOT NULL,
  `vigencia_ini` datetime DEFAULT NULL,
  `vigencia_fin` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_subcategoria_producto`
--

DROP TABLE IF EXISTS `wip_subcategoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_subcategoria_producto` (
  `cod_categoria` char(4) NOT NULL,
  `cod_subcategoria` char(6) NOT NULL,
  `nom_subcategoria` varchar(100) NOT NULL,
  `des_subcategoria` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_subcategoria`),
  KEY `cod_categoria` (`cod_categoria`),
  CONSTRAINT `wip_subcategoria_producto_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `wip_categoria_producto` (`cod_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_suscripcion`
--

DROP TABLE IF EXISTS `wip_suscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_suscripcion` (
  `id_suscripcion` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idusuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_suscripcion`),
  KEY `ruc_negocio` (`ruc_negocio`),
  KEY `fk_idusuario` (`fk_idusuario`),
  CONSTRAINT `wip_suscripcion_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_suscripcion_ibfk_2` FOREIGN KEY (`fk_idusuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_tipo_art`
--

DROP TABLE IF EXISTS `wip_tipo_art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_tipo_art` (
  `id_tipo` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_tipo_categoria`
--

DROP TABLE IF EXISTS `wip_tipo_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_tipo_categoria` (
  `cod_tipo` char(2) NOT NULL,
  `nom_tipo` varchar(100) NOT NULL,
  `des_tipo` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_tipovalor`
--

DROP TABLE IF EXISTS `wip_tipovalor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_tipovalor` (
  `id_tipovalor` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `cod_tipvalor` char(2) DEFAULT NULL,
  `num_valor` varchar(15) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipovalor`),
  KEY `ruc_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_tipovalor_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_usuario`
--

DROP TABLE IF EXISTS `wip_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_usuario` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ctapersona` bigint(20) NOT NULL,
  `avatar` varchar(800) DEFAULT NULL,
  `nick` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cel` varchar(30) DEFAULT NULL,
  `face` varchar(30) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `cod_tipo_usu` char(2) NOT NULL DEFAULT '' COMMENT 'Tipo usuario UI: Usuario Interno, UX: Usuario Externo, UT: Usuario Temporal',
  `cod_nivel_usu` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Nivel usuario 0: sin nivel, 1: basico, 2: intermedio, 3: avanzado, 4: superior',
  `estado` char(1) NOT NULL,
  `del` char(1) NOT NULL,
  `codusu_reg` varchar(45) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) DEFAULT NULL,
  `fecha_act` datetime DEFAULT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_ctapersona` (`id_ctapersona`),
  CONSTRAINT `wip_usuario_ibfk_1` FOREIGN KEY (`id_ctapersona`) REFERENCES `wip_cuenta_persona` (`id_ctapersona`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wip_venta`
--

DROP TABLE IF EXISTS `wip_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wip_venta` (
  `id_venta` bigint(20) NOT NULL AUTO_INCREMENT,
  `ruc_negocio` varchar(11) NOT NULL,
  `fecha_emision` datetime DEFAULT NULL,
  `cod_mediopago` char(2) DEFAULT NULL,
  `cod_tipomoneda` char(2) DEFAULT NULL,
  `pago_total` decimal(7,2) DEFAULT NULL,
  `pago_monto` decimal(7,2) DEFAULT NULL,
  `pago_vuelto` decimal(7,2) DEFAULT NULL,
  `id_mediopago` bigint(20) NOT NULL,
  `nro_serie` varchar(10) DEFAULT NULL,
  `nro_correlativo` varchar(15) DEFAULT NULL,
  `cod_tipcom` char(2) DEFAULT NULL,
  `cod_tipdoc` char(2) DEFAULT NULL,
  `num_docume` varchar(15) DEFAULT NULL,
  `nom_cli` varchar(100) DEFAULT NULL,
  `envio_codest` char(2) DEFAULT NULL,
  `observacion_cambest` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `del` char(1) DEFAULT NULL,
  `codusu_reg` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `ip_reg` varchar(40) DEFAULT NULL,
  `host_reg` varchar(45) DEFAULT NULL,
  `codusu_act` varchar(45) NOT NULL,
  `fecha_act` datetime NOT NULL,
  `ip_act` varchar(40) DEFAULT NULL,
  `host_act` varchar(45) DEFAULT NULL,
  `fk_idusuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `ruc_negocio` (`ruc_negocio`),
  KEY `id_mediopago` (`id_mediopago`),
  KEY `fk_idusuario` (`fk_idusuario`),
  CONSTRAINT `wip_venta_ibfk_1` FOREIGN KEY (`ruc_negocio`) REFERENCES `wip_cuenta_negocio` (`ruc_negocio`),
  CONSTRAINT `wip_venta_ibfk_4` FOREIGN KEY (`fk_idusuario`) REFERENCES `wip_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1715 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-21 16:43:11
