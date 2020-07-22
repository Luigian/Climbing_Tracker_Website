-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: db_climb
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `climbs`
--

DROP TABLE IF EXISTS `climbs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `climbs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `climbDate` date DEFAULT NULL,
  `routeId` int(11) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `climbs`
--

LOCK TABLES `climbs` WRITE;
/*!40000 ALTER TABLE `climbs` DISABLE KEYS */;
INSERT INTO `climbs` VALUES (1,'2020-02-02',10,'Top',2),(2,'2020-02-02',5,'Top',2),(3,'2020-02-02',12,'Top',2),(4,'2020-02-02',8,'Top',2),(5,'2020-02-02',14,'Top',2),(6,'2020-02-02',9,'Fall',2),(7,'2020-02-02',9,'Fall',2),(8,'2020-02-09',10,'Top',2),(9,'2020-02-09',5,'Top',2),(10,'2020-02-09',1,'Top',2),(11,'2020-02-09',12,'Top',2),(12,'2020-02-09',8,'Top',2),(13,'2020-02-09',4,'Top',2),(14,'2020-02-02',7,'Top',2),(15,'2020-02-09',11,'Top',2),(16,'2020-02-09',2,'Top',2),(17,'2020-02-09',6,'Fall',2),(18,'2020-02-09',13,'Top',2),(19,'2020-02-23',1,'Top',2),(20,'2020-02-23',12,'Top',2),(21,'2020-02-23',4,'Top',2),(22,'2020-02-23',3,'Top',2),(23,'2020-02-23',9,'Fall',2),(24,'2020-02-23',9,'Fall',2),(25,'2020-02-23',9,'Top',2),(26,'2020-02-23',6,'Fall',2),(27,'2020-02-23',6,'Fall',2),(28,'2020-02-23',6,'Fall',2),(29,'2020-02-23',6,'Fall',2),(30,'2020-02-23',6,'Fall',2),(31,'2020-02-23',8,'Top',2),(32,'2020-02-23',5,'Top',2),(33,'2020-02-28',12,'Top',2),(34,'2020-02-28',14,'Top',2),(35,'2020-02-28',11,'Top',2),(36,'2020-02-28',13,'Fall',2),(37,'2020-02-28',13,'Top',2),(38,'2020-02-28',19,'Top',2),(39,'2020-02-28',15,'Top',2),(40,'2020-02-28',18,'Top',2),(41,'2020-02-28',21,'Fall',2),(42,'2020-03-08',20,'Top',2),(43,'2020-03-08',15,'Top',2),(44,'2020-03-08',22,'Top',2),(45,'2020-03-08',28,'Top',2),(46,'2020-03-08',29,'Top',2),(47,'2020-03-08',26,'Fall',2),(48,'2020-03-10',27,'Top',2),(49,'2020-03-10',24,'Top',2),(50,'2020-03-10',25,'Top',2),(51,'2020-03-10',23,'Top',2),(52,'2020-03-10',15,'Top',2),(53,'2020-03-10',19,'Top',2),(54,'2020-03-13',22,'Top',2),(55,'2020-03-13',27,'Top',2),(56,'2020-03-13',18,'Top',2),(57,'2020-03-13',17,'Top',2),(58,'2020-03-13',16,'Top',2),(59,'2020-03-13',26,'Fall',2),(60,'2020-03-13',20,'Top',2),(61,'2020-03-13',29,'Top',2),(62,'2020-03-15',20,'Top',2),(63,'2020-03-15',29,'Top',2),(64,'2020-03-15',24,'Top',2),(65,'2020-03-15',18,'Top',2),(66,'2020-03-15',26,'Top',2),(67,'2020-03-15',21,'Fall',2),(68,'2020-03-15',28,'Top',2),(69,'2020-03-15',19,'Top',2),(70,'2020-03-15',15,'Top',2),(71,'2020-03-15',29,'Top',2),(72,'2020-03-15',22,'Top',2),(73,'2020-03-15',20,'Top',2),(76,'2020-05-26',15,'Top',4),(80,'2020-07-21',20,'Top',16),(81,'2020-07-21',18,'Top',16),(82,'2020-07-21',18,'Top',16),(83,'2020-07-21',26,'Fall',16),(84,'2020-07-22',22,'Top',16),(85,'2020-07-23',31,'Top',16),(86,'2020-07-24',26,'Top',16);
/*!40000 ALTER TABLE `climbs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gyms`
--

DROP TABLE IF EXISTS `gyms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gyms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gyms`
--

LOCK TABLES `gyms` WRITE;
/*!40000 ALTER TABLE `gyms` DISABLE KEYS */;
INSERT INTO `gyms` VALUES (1,'The Peak','Fremont',2),(2,'Mesa Rim','San Diego',4),(3,'One Way Up','Ensenada BC',16);
/*!40000 ALTER TABLE `gyms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(5) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `settingDate` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `gymId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,'5.10a','orange',1,'2020-02-02',0,1),(2,'5.11b','yellow',1,'2020-02-02',0,1),(3,'5.11c','purple',1,'2020-02-02',0,1),(4,'5.11a','green',2,'2020-02-02',0,1),(5,'5.9','red',2,'2020-02-02',0,1),(6,'5.11d','blue',2,'2020-02-02',0,1),(7,'5.11a','orange',6,'2020-02-02',0,1),(8,'5.10c','blue',6,'2020-02-02',0,1),(9,'5.12a','green',6,'2020-02-02',0,1),(10,'5.8','purple',6,'2020-02-02',0,1),(11,'5.11a','red',7,'2020-02-02',0,1),(12,'5.10b','yellow',7,'2020-02-02',0,1),(13,'5.11d','green',8,'2020-02-02',0,1),(14,'5.10d','blue',8,'2020-02-02',0,1),(15,'5.10a','yellow',1,'2020-02-28',1,1),(16,'5.11d','orange',1,'2020-02-28',1,1),(17,'5.11b','purple',1,'2020-02-28',1,1),(18,'5.11a','green',2,'2020-02-28',1,1),(19,'5.10c','purple',2,'2020-02-28',1,1),(20,'5.8','yellow',2,'2020-02-28',1,1),(21,'5.12b','blue',2,'2020-02-28',1,1),(22,'5.9','blue',6,'2020-02-28',1,1),(23,'5.11c','green',6,'2020-02-28',1,1),(24,'5.10c','orange',6,'2020-02-28',1,1),(25,'5.11a','yellow',6,'2020-02-28',1,1),(26,'5.12a','red',7,'2020-02-28',1,1),(27,'5.10b','purple',7,'2020-02-28',1,1),(28,'5.10d','green',8,'2020-02-28',1,1),(29,'5.10a','blue',8,'2020-02-28',1,1),(31,'5.9','red',2,'2020-06-07',1,2),(32,'5.11c','purple',1,'2020-07-21',1,3);
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `token` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'julian','coconut',5212),(4,'bill','smart',9916),(5,'elon','mars',6763),(16,'mikelron','1234',9054);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-22 14:32:20
