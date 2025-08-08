-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: TFC
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.22.04.1

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
-- Current Database: `TFC`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `TFC` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `TFC`;

--
-- Table structure for table `artisan`
--

DROP TABLE IF EXISTS `artisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artisan` (
  `id_ar` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `profession` text,
  `fonction` text,
  `image_profil` text,
  `document` text,
  `tel` varchar(20) DEFAULT NULL,
  `email` text,
  `activer` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `remember` int DEFAULT NULL,
  `nom` text,
  PRIMARY KEY (`id_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan`
--

LOCK TABLES `artisan` WRITE;
/*!40000 ALTER TABLE `artisan` DISABLE KEYS */;
INSERT INTO `artisan` VALUES (18,'nyembo24','$2y$10$Eo6/AaixKMDlq1oE/DrXqeQVDaZMCkZH5ciZToOth0FWLtfR3MJMm',NULL,NULL,NULL,NULL,'0990578941','morishonyembo24@gmail.com',1,NULL,NULL,NULL),(19,'ny','$2y$10$APRc/F8EVVRVKl53rzlZ3uTq/TPoHLpAdUnDheuyFBRo8hZnAnNiy',NULL,NULL,NULL,NULL,'0990578941','ny@gmail.com',1,NULL,NULL,NULL),(20,'n1','$2y$10$vKSI9Cmntsgiphr3lf7Sg.mqVs/BoTbfrspsvz3kYs/rod4gVHRJ6',NULL,NULL,NULL,NULL,'0990578941','mori@gmail.com',0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `artisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avis` (
  `id_av` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `id_ar` int DEFAULT NULL,
  `valider` int DEFAULT NULL,
  PRIMARY KEY (`id_av`),
  KEY `nar` (`id_ar`),
  CONSTRAINT `nar` FOREIGN KEY (`id_ar`) REFERENCES `artisan` (`id_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id_cl` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` text,
  `tel` varchar(20) DEFAULT NULL,
  `email` text,
  `date` datetime DEFAULT NULL,
  `remember` int DEFAULT NULL,
  PRIMARY KEY (`id_cl`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (11,'nyembo24','$2y$10$lzAwT/pYShgI/G8Vzoyt8uXNI0OfrAqt67XYDOn0fT99dDWJsi3am','0990578941','morishonyembo24@gmail.com',NULL,NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande`
--

DROP TABLE IF EXISTS `demande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demande` (
  `id_de` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `id_cl` int DEFAULT NULL,
  `sujet` text,
  `suspendu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_de`),
  KEY `nt` (`id_cl`),
  CONSTRAINT `nt` FOREIGN KEY (`id_cl`) REFERENCES `client` (`id_cl`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande`
--

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;
INSERT INTO `demande` VALUES (34,'j&#039;aurai besoins de 3 menusier aux prix de 3$ par jours ...',11,'besoin de 3 menusier',0);
/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `id_ar` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_id_ar` (`nom`,`id_ar`),
  KEY `cmd1` (`id_ar`),
  CONSTRAINT `cmd1` FOREIGN KEY (`id_ar`) REFERENCES `artisan` (`id_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (19,'22.jpg',18),(18,'33.jpg',18),(17,'44.jpg',18),(21,'44.jpg',19),(16,'55.jpg',18),(15,'Capture d’écran du 2024-10-10 20-00-52.png',18),(14,'Capture d’écran du 2024-11-16 07-38-11.png',18),(8,'Capture d’écran du 2025-07-25 13-59-17.png',18),(7,'Copilot_20250605_200449.png',18),(9,'images.jpeg',18);
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id_me` int NOT NULL AUTO_INCREMENT,
  `description` text,
  `id_de` int DEFAULT NULL,
  `id_av` int DEFAULT NULL,
  `id_ar` int DEFAULT NULL,
  `editeur` int DEFAULT NULL,
  `client` int DEFAULT NULL,
  PRIMARY KEY (`id_me`),
  KEY `demande` (`id_de`),
  KEY `avis` (`id_av`),
  KEY `n_ar` (`id_ar`),
  CONSTRAINT `avis` FOREIGN KEY (`id_av`) REFERENCES `avis` (`id_av`),
  CONSTRAINT `demande` FOREIGN KEY (`id_de`) REFERENCES `demande` (`id_de`),
  CONSTRAINT `n_ar` FOREIGN KEY (`id_ar`) REFERENCES `artisan` (`id_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (124,'bonjour ça va suis partant pour cette démande',34,NULL,18,1,NULL),(125,'bonjour ',34,NULL,18,0,NULL),(126,'xonsernant cette offre ou est votre antélier',34,NULL,18,0,NULL),(127,'bonjour nyembo ça va',34,NULL,18,0,NULL);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `id_pr` int NOT NULL AUTO_INCREMENT,
  `nom` text,
  `profession` text,
  `image_profil` text,
  `document` text,
  `email` text,
  `tel` text,
  `id_ar` int DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_pr`),
  KEY `artisan` (`id_ar`),
  CONSTRAINT `artisan` FOREIGN KEY (`id_ar`) REFERENCES `artisan` (`id_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (5,'patrick','artiste','images.jpeg','document.txt','nnn@gmail.com','0990578941',18,'artsan par jour 5$'),(6,'kakuler mbusa','menusier','images.jpeg','QUATRIEME CHAPITRE.pdf','morishonyembo24@gmail.com','0990578941',19,'je suis un menusier travaillant à freelance aux prix de 5$ par jour'),(7,'name','artisan','defaul.png','Chapitre III.pdf','exemple@gmail.com','+243...',20,NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id_usr` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` text,
  `password` text,
  `privilège` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'admin','morishonyembo24@gmail.com','$2y$10$zaDBeKcnLP/mCpfe2qHpZup4bhHGWEkn5jj6H4jVcxsDQqq3tx6bG','root');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-06 12:20:08
