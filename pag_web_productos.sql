-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: pag_web
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (20,'Dona de con jarabe de manzana',3.00,'¡Deliciosa dona bañada de jarabe natural de manzana roja!','dona con jarabe de manzana.jpeg'),(21,'Dona de con ralladura de limon',3.00,'¡Deliciosa dona con ralladura de limon para un toque agridulse!','dona con ralladura de limon.jpeg'),(22,'Dona de chocolate con fresa',3.00,'¡Deliciosa dona de chocolate con franjas sabor fresa!','dona de chocolate con fresa.jpeg'),(23,'Dona de chocolate con vainilla',3.00,'¡Deliciosa dona de chocolate con franjas sabor vainilla!','dona de chocolate con vainilla.jpeg'),(24,'Dona de chocolate ',2.50,'¡Deliciosa dona de chocolate!','dona de chocolate.jpeg'),(25,'Dona de fresa con chocolate',3.00,'¡Deliciosa dona de fresa con franjas de chocolate!','dona de fresa con chocolate.jpeg'),(26,'Dona de fresa con vainilla',3.00,'¡Deliciosa dona de fresa con franjas de vainilla!','dona de fresa con vainilla.jpeg'),(27,'Dona con leche condensada',2.50,'¡Deliciosa dona con leche condensada!','dona con dulce de leche.jpeg'),(28,'Dona de vainilla',2.50,'¡Deliciosa dona de vainilla!','dona de vainilla.jpeg'),(29,'Dona natural',2.50,'¡Deliciosa dona con azucar glass!','dona natural.jpeg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-31 18:25:20
