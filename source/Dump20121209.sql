CREATE DATABASE  IF NOT EXISTS `riseabove` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `riseabove`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: riseabove
-- ------------------------------------------------------
-- Server version	5.5.25a

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
-- Table structure for table `image_master`
--

DROP TABLE IF EXISTS `image_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_master` (
  `id_topic_master` int(11) NOT NULL,
  `id_image_master` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_image_master`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_master`
--

LOCK TABLES `image_master` WRITE;
/*!40000 ALTER TABLE `image_master` DISABLE KEYS */;
INSERT INTO `image_master` VALUES (1,1,NULL),(1,2,NULL),(2,3,NULL),(2,4,NULL),(3,5,NULL),(3,6,NULL);
/*!40000 ALTER TABLE `image_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quote_master`
--

DROP TABLE IF EXISTS `quote_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quote_master` (
  `id_quote_master` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic_master` int(11) NOT NULL,
  `quote_content` varchar(200) NOT NULL,
  PRIMARY KEY (`id_quote_master`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quote_master`
--

LOCK TABLES `quote_master` WRITE;
/*!40000 ALTER TABLE `quote_master` DISABLE KEYS */;
INSERT INTO `quote_master` VALUES (1,1,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(2,1,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(3,1,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(4,1,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(5,1,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(6,2,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(7,2,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(8,2,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(9,3,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(10,3,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(11,3,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(12,4,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(13,4,'You are special, you are unique; may your Christmas be also as special and unique as you are! '),(14,4,'You are special, you are unique; may your Christmas be also as special and unique as you are! ');
/*!40000 ALTER TABLE `quote_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_contact`
--

DROP TABLE IF EXISTS `order_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_contact` (
  `idorder_contact` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`idorder_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_contact`
--

LOCK TABLES `order_contact` WRITE;
/*!40000 ALTER TABLE `order_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_contact` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`riseabove`@`%`*/ /*!50003 TRIGGER `riseabove`.`trigger_order_contact_insert`
BEFORE INSERT ON `riseabove`.`order_contact`
FOR EACH ROW
begin
SET NEW.addtime=utc_timestamp();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `topic_master`
--

DROP TABLE IF EXISTS `topic_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic_master` (
  `id_topic_master` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(45) NOT NULL,
  `topic_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_topic_master`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic_master`
--

LOCK TABLES `topic_master` WRITE;
/*!40000 ALTER TABLE `topic_master` DISABLE KEYS */;
INSERT INTO `topic_master` VALUES (1,'topic_1',NULL),(2,'topic_2',NULL),(3,'topic_3',NULL),(4,'topic_4',NULL),(5,'topic_5',NULL),(6,'topic_6',NULL);
/*!40000 ALTER TABLE `topic_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_master`
--

DROP TABLE IF EXISTS `template_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_master` (
  `id_template_master` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_template_master`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_master`
--

LOCK TABLES `template_master` WRITE;
/*!40000 ALTER TABLE `template_master` DISABLE KEYS */;
INSERT INTO `template_master` VALUES (1,'img_bigtext'),(2,'bigtext_img'),(3,'2_smalltext_img');
/*!40000 ALTER TABLE `template_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-09 22:27:59
