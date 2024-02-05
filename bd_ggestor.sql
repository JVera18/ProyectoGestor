CREATE DATABASE  IF NOT EXISTS `id20291285_ggestor` /*!40100 DEFAULT CHARACTER SET utf8mb4  */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `id20291285_ggestor`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: id20291285_ggestor
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gg_archivos`
--

DROP TABLE IF EXISTS `gg_archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gg_archivos` (
  `id_archivos` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_categorias` int DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivos`),
  KEY `fkArchivosCategorias_idx` (`id_categorias`),
  KEY `fkUsuariosArchivos_idx` (`id_usuario`),
  CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categorias`) REFERENCES `gg_categorias` (`id_categorias`),
  CONSTRAINT `fkUsuariosArchivos` FOREIGN KEY (`id_usuario`) REFERENCES `gg_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gg_archivos`
--

LOCK TABLES `gg_archivos` WRITE;
/*!40000 ALTER TABLE `gg_archivos` DISABLE KEYS */;
INSERT INTO `gg_archivos` VALUES (1,1,NULL,'operaciones_matematicas.png','png','../../archivos/1/operaciones_matematicas.png','2023-02-09 01:08:18'),(2,1,NULL,'mundo.png','png','../../archivos/1/mundo.png','2023-02-09 01:09:08'),(3,1,NULL,'llamada-telefonica.png','png','../../archivos/1/llamada-telefonica.png','2023-02-09 01:16:32'),(4,3,NULL,'educacion.png','png','../../archivos/3/educacion.png','2023-02-09 01:28:04'),(5,3,NULL,'operaciones_matematicas.png','png','../../archivos/3/operaciones_matematicas.png','2023-02-09 01:37:09'),(9,3,5,'kpop.png','png','../../archivos/3/kpop.png','2023-02-09 15:53:28'),(11,1,3,'hornear.png','png','../../archivos/1/hornear.png','2023-02-09 17:02:12'),(14,3,6,'Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg','jpeg','../../archivos/3/Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg','2023-02-10 01:16:11'),(15,3,6,'code-alt-regular-24.png','png','../../archivos/3/code-alt-regular-24.png','2023-02-10 01:21:18'),(16,3,6,'Julitza Vera Oña – Actividad Asincrónica 01.pdf','pdf','../../archivos/3/Julitza Vera Oña – Actividad Asincrónica 01.pdf','2023-02-11 11:20:51'),(17,3,5,'Instructivo de Registro de Código Único (1).pdf','pdf','../../archivos/3/Instructivo de Registro de Código Único (1).pdf','2023-02-11 13:46:42'),(18,3,5,'juli.mp4','mp4','../../archivos/3/juli.mp4','2023-02-11 19:43:36'),(19,3,5,'The Weeknd - Nothing Is Lost (You Give Me Strength).mp3','mp3','../../archivos/3/The Weeknd - Nothing Is Lost (You Give Me Strength).mp3','2023-02-11 19:47:35'),(20,1,7,'The Weeknd - Nothing Is Lost (You Give Me Strength).mp3','mp3','../../archivos/1/The Weeknd - Nothing Is Lost (You Give Me Strength).mp3','2023-02-11 22:18:39'),(21,1,7,'juli.mp4','mp4','../../archivos/1/juli.mp4','2023-02-11 22:19:19'),(22,1,7,'ACREDITACIÓN_VeraJulitza.pdf','pdf','../../archivos/1/ACREDITACIÓN_VeraJulitza.pdf','2023-02-11 22:19:32'),(24,1,3,'API.rar','rar','../../archivos/1/API.rar','2023-02-13 22:22:06'),(25,1,3,'bts1.jpg','jpg','../../archivos/1/bts1.jpg','2023-02-13 22:49:44'),(26,1,3,'Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg','jpeg','../../archivos/1/Julitza Vera - PAGE 51 EXCERCISE 3 PRONUNCIATION.jpeg','2023-02-13 22:49:44');
/*!40000 ALTER TABLE `gg_archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gg_categorias`
--

DROP TABLE IF EXISTS `gg_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gg_categorias` (
  `id_categorias` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categorias`),
  KEY `fkCategoriaUsuario_idx` (`id_usuario`),
  CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `gg_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gg_categorias`
--

LOCK TABLES `gg_categorias` WRITE;
/*!40000 ALTER TABLE `gg_categorias` DISABLE KEYS */;
INSERT INTO `gg_categorias` VALUES (3,1,'Peliculas 2022','2023-02-07 23:28:43'),(5,3,'categoria','2023-02-09 01:27:26'),(6,3,'tesis1','2023-02-10 01:07:52'),(7,1,'Series1','2023-02-11 22:18:11');
/*!40000 ALTER TABLE `gg_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gg_usuarios`
--

DROP TABLE IF EXISTS `gg_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gg_usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `usuario` varchar(245) DEFAULT NULL,
  `password` text,
  `insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gg_usuarios`
--

LOCK TABLES `gg_usuarios` WRITE;
/*!40000 ALTER TABLE `gg_usuarios` DISABLE KEYS */;
INSERT INTO `gg_usuarios` VALUES (1,'joss','2000-10-03','joss@gmail.com','joss','be8d00cc108e81a112d3242ac047c222e6c1e54f','2023-02-07 15:10:23'),(2,'juan','2023-02-04','juan@gmail.com','juan','b49a5780a99ea81284fc0746a78f84a30e4d5c73','2023-02-07 15:16:33'),(3,'sol','2005-01-13','sol@hotmail.com','sol','fbb93bb966c801b3a72230e8f3b752b62ef22929','2023-02-09 01:26:28');
/*!40000 ALTER TABLE `gg_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'id20291285_ggestor'
--

--
-- Dumping routines for database 'id20291285_ggestor'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-07 22:31:38
