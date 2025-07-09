-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: TFC
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan`
--

LOCK TABLES `artisan` WRITE;
/*!40000 ALTER TABLE `artisan` DISABLE KEYS */;
INSERT INTO `artisan` VALUES (7,'ny','$2y$10$McFLTqw8H4vUwW06IWGvNeEX0SQJYeNkRbbobDouUnC4LYkiVxQoS',NULL,NULL,NULL,NULL,'0990578941','morishonyembo@gmail.com',0,NULL,NULL,NULL),(8,'nyembo','$2y$10$CfUi6eOXS6qF/s66ksaIjuF8lIBwA3ogGYiD6n/TwRUNHv5bBP6Y2',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(9,'nyemb','$2y$10$8RGZFfqliuh0VUgVDmn7dexseFpkkt4gUXOLvZdBtVVvm.omuZkfK',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(10,'nyem','$2y$10$UF5U/Q15krq30wBINgE8kORvUicE1xTyp.uaTOmPyOQbxoYOyPdQm',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(11,'nyem1','$2y$10$G3hK18nAeX2aW7y1tVtdhOJgCxgcvnqbhGjslTG9Q1ELvvZCs/WSu',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(12,'nyem12','$2y$10$otRaeGpvCsdeblida5nUAuZhyIMpE3tNBwQt0.fazJVOGqx2exN76',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(13,'nyem121','$2y$10$uIMHnHM9fzSul0ZlxPdqaeWm7n2TDkGJAj36eUjzZFZ5y4oLr9wcS',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(14,'nem121','$2y$10$t4w9O4MZMPiVklpaQgVBkewwUsG0fweX4592W9nCSE5EvA4CSCFPy',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(15,'Anem121','$2y$10$eEhlz2eqMPofV4ZqyY9BJ.KjHw2ohCTSSR4w0jBvPOz92ZYb6Dx1m',NULL,NULL,NULL,NULL,'0990578941','hhhh@gmail.com',0,NULL,NULL,NULL),(16,'nyy','$2y$10$0EV9UvjTsi.etKVdCutNIurNuoGMQz2ar00Oqb7id1K4P7cD1PWi2',NULL,NULL,NULL,NULL,'1236','jjj@gmail.com',0,NULL,NULL,NULL),(17,'nyny','$2y$10$Wrm2YOFqVesVBfuIeVB3ueJzlliLqDS6GWjAdi49VaVivAItsWq6u',NULL,NULL,NULL,NULL,'0990578941','nyny@gmail.com',1,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (5,'très bien',7,0),(6,'ny',7,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (10,'ny','$2y$10$fjIP/27pazXHRK2tIroK4OuDGSVetyeM9BKFIQO.24eGWsakTzeRa','0990578941','morishonyembo24@gmail.com',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande`
--

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;
INSERT INTO `demande` VALUES (33,'je suis à la recherche de 5 maçon aux prix des 50$ intéresser contacter moi inbox',10,' recherche de 5 maçon',0);
/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (90,'bonjour ça va',33,NULL,7,1,NULL),(91,'bonjour\r\n',33,NULL,7,1,NULL),(92,'oui ça va',33,NULL,7,0,NULL),(93,'Ça va ',33,NULL,7,0,NULL),(94,'Causé trop ',33,NULL,7,0,NULL),(95,'rien de spécial',33,NULL,7,1,NULL),(96,'Passé une excellente journée ',33,NULL,7,0,NULL),(97,'de meme que toi mon frère',33,NULL,7,1,NULL),(98,'Hhhcvvhjhhjjjjjjklegjgfhg',33,NULL,7,0,NULL),(99,'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhhhhhhhhhhh',33,NULL,7,1,NULL),(100,'Gg',33,NULL,7,0,NULL),(101,'Bonjour ',33,NULL,7,0,NULL),(102,'Hello ',33,NULL,7,0,NULL),(103,'Hh?',33,NULL,7,0,NULL),(104,'Uuj',33,NULL,7,0,NULL),(105,'jjj',33,NULL,7,1,NULL),(106,'Hhhhhhvhhhhhghhhhhhhhgcgggggggggghgggggggghhhjhjvhjjjjjjhhh',33,NULL,7,0,NULL),(107,'helo windows user',33,NULL,7,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (3,'name','artisan','defaul.png','Chapitre III.pdf','exemple@gmail.com','+243...',7,NULL),(4,'name','artisan','defaul.png','Chapitre III.pdf','exemple@gmail.com','+243...',17,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'ny','ny@gmail.com','$2y$10$McFLTqw8H4vUwW06IWGvNeEX0SQJYeNkRbbobDouUnC4LYkiVxQoS','root');
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

-- Dump completed on 2025-07-08 15:08:30
