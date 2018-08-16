CREATE DATABASE  IF NOT EXISTS `relatorio` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `relatorio`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: relatorio
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.33-MariaDB

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
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `idDia` int(11) NOT NULL AUTO_INCREMENT,
  `dia` date NOT NULL,
  `horas` int(24) unsigned DEFAULT NULL,
  `minutos` int(60) unsigned DEFAULT NULL,
  `revisitas` int(10) unsigned DEFAULT NULL,
  `revistas` int(10) unsigned DEFAULT NULL,
  `livros` int(10) unsigned DEFAULT NULL,
  `broxuras` int(10) unsigned DEFAULT NULL,
  `idpessoa` int(11) DEFAULT NULL,
  `horasPessoa` int(24) unsigned DEFAULT NULL,
  `minutosPessoa` int(60) unsigned DEFAULT NULL,
  `revisitasPessoa` int(10) unsigned DEFAULT NULL,
  `revistasPessoa` int(10) unsigned DEFAULT NULL,
  `livrosPessoa` int(10) unsigned DEFAULT NULL,
  `broxurasPessoa` int(10) unsigned DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`idDia`),
  KEY `idpessoa` (`idpessoa`),
  CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`idpessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
INSERT INTO `entrada` VALUES (1,'2018-06-04',7,0,1,0,1,0,1,5,0,1,2,2,0,'vai viajar semana que vem!'),(2,'2018-06-04',0,0,0,0,0,0,2,4,0,1,1,0,0,''),(3,'2018-06-04',NULL,NULL,NULL,NULL,NULL,NULL,3,4,0,1,1,0,0,''),(10,'2018-07-30',1,1,1,1,1,1,5,1,1,1,1,1,1,'Teste');
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metaanual`
--

DROP TABLE IF EXISTS `metaanual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metaanual` (
  `idAno` year(4) NOT NULL,
  `hora` int(11) NOT NULL DEFAULT '1',
  `revisita` int(11) NOT NULL DEFAULT '1',
  `revista` int(11) NOT NULL DEFAULT '1',
  `livro` int(11) NOT NULL DEFAULT '1',
  `broxura` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metaanual`
--

LOCK TABLES `metaanual` WRITE;
/*!40000 ALTER TABLE `metaanual` DISABLE KEYS */;
INSERT INTO `metaanual` VALUES (2018,1,1,1,1,1);
/*!40000 ALTER TABLE `metaanual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metamensal`
--

DROP TABLE IF EXISTS `metamensal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metamensal` (
  `idMes` int(12) NOT NULL AUTO_INCREMENT,
  `hora` int(11) NOT NULL DEFAULT '1',
  `revisita` int(11) NOT NULL DEFAULT '1',
  `revista` int(11) NOT NULL DEFAULT '1',
  `livro` int(11) NOT NULL DEFAULT '1',
  `broxura` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idMes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metamensal`
--

LOCK TABLES `metamensal` WRITE;
/*!40000 ALTER TABLE `metamensal` DISABLE KEYS */;
INSERT INTO `metamensal` VALUES (1,1,1,1,1,1),(2,1,1,1,1,1);
/*!40000 ALTER TABLE `metamensal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`idpessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Rose','Rosy','revisitamos ela na casa de outra pessoa'),(2,'Lucia','tia lu','quer visita todo domingo'),(3,'Erika','a gordona','nao vale 1 real'),(5,'Patricia','paty','Ã© doida xp rss');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-01 11:36:20
