-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1-log

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
-- Table structure for table `DOC`
--

DROP TABLE IF EXISTS `DOC`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DOC` (
  `DocID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Publisher` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `PublisherID` varchar(60) DEFAULT NULL,
  `LibID` varchar(60) NOT NULL,
  `ISBN` varchar(60) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `borrowed` tinyint(1) DEFAULT '0',
  `branch` varchar(60) NOT NULL,
  PRIMARY KEY (`DocID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DOC`
--

LOCK TABLES `DOC` WRITE;
/*!40000 ALTER TABLE `DOC` DISABLE KEYS */;
INSERT INTO `DOC` VALUES (3,'Nady','50 Shades','1234','1234','6789679',1,'Newark'),(4,'Moses','Kill Bill','7789','4563','877896',1,'Orange'),(5,'Peter','Love and HipHop','2589','3574','56756',1,'Elizabeth'),(8,'God','The Bible','658','993','54663456',1,'Heaven'),(9,'fuckboys','Bitcoin','5555','987345','234523456',0,'ghetto'),(10,';lakjsdf','kalsjdf',';laksjdf',';lakjsdf','1234345',1,'hood'),(11,'SHITHEAD','SHIT','345345','34534534','888',1,'fuck'),(12,'Donna','Little Mouse','10934','02647','125879',0,'kids'),(14,'Dj Kehoe','The Kid','47865452','554+5+2','654545',0,'NJIT');
/*!40000 ALTER TABLE `DOC` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `SSN` int(9) NOT NULL,
  `User_Type_Admin` char(1) NOT NULL,
  `LoginName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`SSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (123456789,'Y','isaac','cat','isaac','clarke'),(987654321,'Y','Jordan','rat','Jordan','mike');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-08 18:02:31
