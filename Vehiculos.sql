-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: VEHICULOS
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

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
-- Table structure for table `Inventario`
--

DROP TABLE IF EXISTS `Inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inventario` (
  `kilometraje` decimal(10,0) NOT NULL,
  `combustible` float NOT NULL,
  `golpe` varchar(45) DEFAULT NULL,
  `severidad` varchar(45) DEFAULT NULL,
  `piezaGolpeada` varchar(45) DEFAULT NULL,
  `vin` varchar(30) NOT NULL,
  `numEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`vin`),
  KEY `fk_Inventario_1_idx` (`numEmpleado`),
  CONSTRAINT `fk_Inventario_1` FOREIGN KEY (`numEmpleado`) REFERENCES `Usuario` (`num_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Inventario_2` FOREIGN KEY (`vin`) REFERENCES `Vehiculo` (`vin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventario`
--

LOCK TABLES `Inventario` WRITE;
/*!40000 ALTER TABLE `Inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ubicacion`
--

DROP TABLE IF EXISTS `Ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ubicacion` (
  `ubicacion` varchar(45) NOT NULL,
  `subUbicacion` varchar(45) NOT NULL,
  `vin` varchar(45) NOT NULL,
  PRIMARY KEY (`vin`),
  CONSTRAINT `fk_Ubicacion_1` FOREIGN KEY (`vin`) REFERENCES `Vehiculo` (`vin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ubicacion`
--

LOCK TABLES `Ubicacion` WRITE;
/*!40000 ALTER TABLE `Ubicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `num_empleado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`num_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (12345,'Mayra Garcia','mayra@gmail.com','36810573','Av Tonala','DFVGBMB454FGV'),(23456,'Alberto Hernandez','alberto@gmail.com','38899424','','FVGBDTH234565'),(45678,'Laura Garcia','laura@gmail.com','34567898','Av.loma Dorada sur 189','DFVCGRTD4545'),(56789,'Alejandro Guerrero','alejandro@gmail.com','34567898','','DFVCGRTD4545'),(67890,'Alejandro Guerrero','alejandro@gmail.com','34567898','Av.loma Dorada sur 189','DFVCGRTD4545'),(78901,'Laura Garcia','laura@gmail.com','34567898','Av.loma Dorada sur 189','DFVCGRTD4545');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vehiculo`
--

DROP TABLE IF EXISTS `Vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vehiculo` (
  `vin` varchar(30) NOT NULL,
  `marca` text,
  `tipo` text,
  `modelo` text,
  `fecha` date DEFAULT NULL,
  `dia` text,
  `numEmpleado` int(11) DEFAULT NULL,
  PRIMARY KEY (`vin`),
  KEY `fk_Vehiculo_1_idx` (`numEmpleado`),
  CONSTRAINT `fk_Vehiculo_1` FOREIGN KEY (`numEmpleado`) REFERENCES `Usuario` (`num_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehiculo`
--

LOCK TABLES `Vehiculo` WRITE;
/*!40000 ALTER TABLE `Vehiculo` DISABLE KEYS */;
INSERT INTO `Vehiculo` VALUES ('34567','Acura','carro','2012','2014-10-05','Sunday',NULL),('45678','Honda','carro','2009','2014-10-05','Sunday',NULL),('67890','Honda','moto','2012','2014-10-05','Sunday',NULL);
/*!40000 ALTER TABLE `Vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-05 16:58:08
