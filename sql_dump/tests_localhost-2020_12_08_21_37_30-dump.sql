-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: tests
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `table_status`
--

DROP TABLE IF EXISTS `table_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_results` longtext COLLATE utf8_unicode_ci NOT NULL,
  `test_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_final_result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_status`
--

LOCK TABLES `table_status` WRITE;
/*!40000 ALTER TABLE `table_status` DISABLE KEYS */;
INSERT INTO `table_status` VALUES (1,'Aivars','Test A','[{\"question\":\"K\\u0101 sauc Latvijas galvaspils\\u0113tu?\",\"answer\":\"R\\u012bga\",\"correctAnswer\":\"R\\u012bga\"},{\"question\":\"K\\u0101 sauc R\\u012bgas galvaspils\\u0113tu?\",\"answer\":\"Nepareizs jaut\\u0101jums\",\"correctAnswer\":\"Nepareizs jaut\\u0101jums\"},{\"question\":\"Uz kuru pusi ka\\u0137im ir spalvas?\",\"answer\":\"Uz aizmuguri\",\"correctAnswer\":\"Uz \\u0101ru\"}]','finished','66.67%','2020-12-08 21:14:22','2020-12-08 21:14:36'),(2,'Anna','Test B','[{\"question\":\"Jaut\\u0101jums 1?\",\"answer\":\"Atbilde 2\",\"correctAnswer\":\"Atbilde 1\"},{\"question\":\"Jaut\\u0101jums 2?\",\"answer\":\"Atbilde 1\",\"correctAnswer\":\"Atbilde 1\"},{\"question\":\"Jaut\\u0101jums 3?\",\"answer\":\"Atbilde 1\",\"correctAnswer\":\"Atbilde 5\"},{\"question\":\"Jaut\\u0101jums 4?\",\"answer\":\"Atbilde 3\",\"correctAnswer\":\"Atbilde 1\"}]','finished','25%','2020-12-08 21:16:13','2020-12-08 21:16:20'),(3,'Igors','Test A','[{\"question\":\"K\\u0101 sauc Latvijas galvaspils\\u0113tu?\",\"answer\":\"Valmiera\",\"correctAnswer\":\"R\\u012bga\"},{\"question\":\"K\\u0101 sauc R\\u012bgas galvaspils\\u0113tu?\",\"answer\":\"R\\u012bga\",\"correctAnswer\":\"Nepareizs jaut\\u0101jums\"},{\"question\":\"Uz kuru pusi ka\\u0137im ir spalvas?\",\"answer\":\"Uz \\u0101ru\",\"correctAnswer\":\"Uz \\u0101ru\"}]','finished','33.33%','2020-12-08 21:17:38','2020-12-08 21:17:43');
/*!40000 ALTER TABLE `table_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_tests`
--

DROP TABLE IF EXISTS `table_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_tests`
--

LOCK TABLES `table_tests` WRITE;
/*!40000 ALTER TABLE `table_tests` DISABLE KEYS */;
INSERT INTO `table_tests` VALUES (1,'Test A','[{\"question\":\"K\\u0101 sauc Latvijas galvaspils\\u0113tu?\",\"answers\":[\"Valmiera\",\"C\\u0113sis\",\"Ogre\",\"R\\u012bga\"],\"correctAnswer\":\"R\\u012bga\"},{\"question\":\"K\\u0101 sauc R\\u012bgas galvaspils\\u0113tu?\",\"answers\":[\"Valmiera\",\"C\\u0113sis\",\"R\\u012bga\",\"Nepareizs jaut\\u0101jums\"],\"correctAnswer\":\"Nepareizs jaut\\u0101jums\"},{\"question\":\"Uz kuru pusi ka\\u0137im ir spalvas?\",\"answers\":[\"Uz \\u0101ru\",\"Uz aizmuguri\"],\"correctAnswer\":\"Uz \\u0101ru\"}]'),(2,'Test B','[{\"question\":\"Jaut\\u0101jums 1?\",\"answers\":[\"Atbilde 1\",\"Atbilde 2\",\"Atbilde 3\"],\"correctAnswer\":\"Atbilde 1\"},{\"question\":\"Jaut\\u0101jums 2?\",\"answers\":[\"Atbilde 1\"],\"correctAnswer\":\"Atbilde 1\"},{\"question\":\"Jaut\\u0101jums 3?\",\"answers\":[\"Atbilde 1\",\"Atbilde 2\",\"Atbilde 3\",\"Atbilde 4\",\"Atbilde 5\"],\"correctAnswer\":\"Atbilde 5\"},{\"question\":\"Jaut\\u0101jums 4?\",\"answers\":[\"Atbilde 1\",\"Atbilde 2\",\"Atbilde 3\",\"Atbilde 4\"],\"correctAnswer\":\"Atbilde 1\"}]');
/*!40000 ALTER TABLE `table_tests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08 21:37:30
