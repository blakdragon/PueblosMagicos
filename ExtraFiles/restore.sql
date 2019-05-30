-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: pueblosmagicos
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `curp` varchar(20) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apaterno` varchar(20) DEFAULT NULL,
  `amaterno` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`curp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('a','e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98','Nombre','AP','AM');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Aguascalientes'),(2,'Baja California'),(3,'Baja California Sur'),(4,'Campeche'),(5,'Chiapas'),(6,'Chihuahua'),(7,'Coahuila'),(8,'Colima'),(9,'Durango'),(10,'Estado de México'),(11,'Guanajuato'),(12,'Guerrero'),(13,'Hidalgo'),(14,'Jalisco'),(15,'Michoacán'),(16,'Morelos'),(17,'Nayarit'),(18,'Nuevo León'),(19,'Oaxaca'),(20,'Puebla'),(21,'Querétaro'),(22,'Quintana Roo'),(23,'San Luis Potosí'),(24,'Sinaloa'),(25,'Sonora'),(26,'Tabasco'),(27,'Tamaulipas'),(28,'Tlaxcala'),(29,'Veracruz'),(30,'Yucatán'),(31,'Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotoslugar`
--

DROP TABLE IF EXISTS `fotoslugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotoslugar` (
  `idlugar` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`idlugar`,`foto`),
  CONSTRAINT `fotoslugar_ibfk_1` FOREIGN KEY (`idlugar`) REFERENCES `lugar` (`idlugar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotoslugar`
--

LOCK TABLES `fotoslugar` WRITE;
/*!40000 ALTER TABLE `fotoslugar` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotoslugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar` (
  `idlugar` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `idpm` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idlugar`),
  KEY `idpm` (`idpm`),
  CONSTRAINT `lugar_ibfk_1` FOREIGN KEY (`idpm`) REFERENCES `pueblomagico` (`idpm`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar`
--

LOCK TABLES `lugar` WRITE;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pueblomagico`
--

DROP TABLE IF EXISTS `pueblomagico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pueblomagico` (
  `idpm` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `coordenadas` varchar(30) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpm`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `idestado` (`idestado`),
  KEY `curp` (`curp`),
  CONSTRAINT `pueblomagico_ibfk_1` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pueblomagico_ibfk_2` FOREIGN KEY (`curp`) REFERENCES `administrador` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pueblomagico`
--

LOCK TABLES `pueblomagico` WRITE;
/*!40000 ALTER TABLE `pueblomagico` DISABLE KEYS */;
INSERT INTO `pueblomagico` VALUES (1,'Ecatepec','0,0,0',1,'a','Un estado muy bonito, la verdad. +10 y a favoritos'),(2,'Taxco','0,0,0',1,'a','Un estado muy bonito, la verdad. +10 y a favoritos'),(3,'Mapimi','0,0,0',1,'a','Un estado muy bonito, la verdad. +10 y a favoritos'),(4,'Cancún','0, 0, 0',30,'a','Ufff');
/*!40000 ALTER TABLE `pueblomagico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resena`
--

DROP TABLE IF EXISTS `resena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resena` (
  `idresena` int(11) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `idpm` int(11) DEFAULT NULL,
  `curp` varchar(20) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `aprovada` int(11) DEFAULT NULL,
  PRIMARY KEY (`idresena`),
  KEY `nickname` (`nickname`),
  KEY `idpm` (`idpm`),
  KEY `curp` (`curp`),
  CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`nickname`) REFERENCES `usuario` (`nickname`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resena_ibfk_2` FOREIGN KEY (`idpm`) REFERENCES `pueblomagico` (`idpm`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resena_ibfk_3` FOREIGN KEY (`curp`) REFERENCES `administrador` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resena`
--

LOCK TABLES `resena` WRITE;
/*!40000 ALTER TABLE `resena` DISABLE KEYS */;
INSERT INTO `resena` VALUES (1,'a',2,'a',4,'Muy bueno. Muy bonito.',1),(2,'a',2,'a',1,' Muy bonito',1),(3,'a',2,NULL,3,'Me gustó',0),(4,'blakdragon',2,'a',5,'Me encantó\r\nMuy buen lugar para pasear',1),(5,'blakdragon',1,NULL,1,'Muy malo. Me perdí.',0);
/*!40000 ALTER TABLE `resena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nickname` varchar(20) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apaterno` varchar(20) DEFAULT NULL,
  `amaterno` varchar(20) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nickname`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('a','84a516841ba77a5b4648de2cd0dfcb30ea46dbb4','Nombres','AP','AM','correo3@yopmail.com'),('blakdragon','4d6b0bee293dd7ebea67f94518a4154cac6dd2ea','Ángel David','Ortega','Ramírez','blakdragon@yopmail.com'),('blak_dragon','4d6b0bee293dd7ebea67f94518a4154cac6dd2ea','Ángel David','Ortega','Ramírez','blak_dragon@yopmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-30 10:55:24
