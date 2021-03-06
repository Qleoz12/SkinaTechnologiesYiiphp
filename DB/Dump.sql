CREATE DATABASE  IF NOT EXISTS `skinatechnologies` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `skinatechnologies`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: skinatechnologies
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `estado` bigint(20) DEFAULT NULL,
  `creado` int(11) NOT NULL,
  `actualizado` int(11) NOT NULL,
  `creado_por` bigint(20) NOT NULL,
  `actualizado_por` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (11,'casa',1,1571975641,1571975641,19,20),(12,'tech',1,1571978112,1571978112,20,19),(13,'movil2',1,1572192160,1572193105,20,20),(15,'autos',1,1572222142,1572222142,19,19),(16,'comida fast',1,1572223304,1572223304,19,19),(17,'radar',1,1572224011,1572224011,19,19);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Activo'),(2,'Inactivo');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(45) NOT NULL,
  `estado` bigint(20) NOT NULL,
  `creado` int(11) NOT NULL,
  `actualizado` int(11) NOT NULL,
  `creado_por` bigint(20) NOT NULL,
  `actualizado_por` bigint(20) NOT NULL,
  `categoria` bigint(20) NOT NULL,
  `subcategoria` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_producto_UNIQUE` (`nombre_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (5,'pitillo fast food ',1,1572318658,1572320036,19,19,13,2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'basic'),(2,'administrator');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` bigint(20) NOT NULL,
  `creado` int(11) NOT NULL,
  `actualizado` int(11) NOT NULL,
  `creado_por` bigint(20) NOT NULL,
  `actualizado_por` bigint(20) NOT NULL,
  `categoria` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estado_idx_sub` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,'hamburguesa',1,1572225191,1572225191,19,19,16),(2,'android',1,1572225200,1572225200,19,19,13),(3,'ferrari',1,1572264979,1572264979,19,19,15);
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(55) NOT NULL,
  `rol` bigint(20) NOT NULL,
  `estado` bigint(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usuario_UNIQUE` (`nombre_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (19,'demo',1,1,'demodemo','xJo9F6_nbHzT0YGI6Dpzq9w_g5gFsy-l','F3271izkFUnZ64q2ZSOU8GVo1VcOekP7'),(20,'prueba',1,1,'prueba','','');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-28 23:58:18
