-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: group9web
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `BusinessCredentials`
--

DROP TABLE IF EXISTS `BusinessCredentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BusinessCredentials` (
  `BusinessCredential_Email` varchar(40) NOT NULL,
  `BusinessCredential_Password` varchar(15) NOT NULL,
  `BusinessCredential_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BusinessCredentials`
--

LOCK TABLES `BusinessCredentials` WRITE;
/*!40000 ALTER TABLE `BusinessCredentials` DISABLE KEYS */;
INSERT INTO `BusinessCredentials` VALUES ('Danny@google.org','123456','Dannygo'),('Justin@facebook.org','123','Justinface');
/*!40000 ALTER TABLE `BusinessCredentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Businesses`
--

DROP TABLE IF EXISTS `Businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Businesses` (
  `Location` varchar(40) NOT NULL,
  `Industry` varchar(30) NOT NULL,
  `Bus_Name` varchar(15) NOT NULL,
  `Bus_Id` varchar(10) NOT NULL,
  `Bus_Email` varchar(40) NOT NULL,
  KEY `Bus_Id` (`Bus_Id`),
  CONSTRAINT `Businesses_ibfk_1` FOREIGN KEY (`Bus_Id`) REFERENCES `BusinessCredentials` (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Businesses`
--

LOCK TABLES `Businesses` WRITE;
/*!40000 ALTER TABLE `Businesses` DISABLE KEYS */;
INSERT INTO `Businesses` VALUES ('LA','IT&Tech','Facebook','Justinface','Justin@facebook.org'),('LA','Searching','Google','Dannygo','Danny@google.org');
/*!40000 ALTER TABLE `Businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `Comment_Id` varchar(10) NOT NULL,
  `User` varchar(15) NOT NULL,
  `OriginalPost` varchar(60) NOT NULL,
  `Comment_DateTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES ('Com_01','Vichanm','I got a job','2016-01-09'),('cOM_02','awesomemat','I have a job in facebbok','2016-02-06');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `Sender` varchar(20) NOT NULL,
  `Recipient` varchar(20) NOT NULL,
  `Message_Id` varchar(10) NOT NULL,
  `Message_DateTime` date DEFAULT NULL,
  `Subject` varchar(30) NOT NULL,
  `Content` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES ('Weihan','Matt','Mess_01','2016-03-25','groupwork','We need to work our web');
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Posts`
--

DROP TABLE IF EXISTS `Posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Posts` (
  `Post_Id` varchar(10) NOT NULL,
  `Post_UserId` varchar(10) NOT NULL,
  `Post_Content` varchar(60) NOT NULL,
  `Post_DateTime` date DEFAULT NULL,
  `Post_Comments` varchar(60) NOT NULL,
  `Likes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Posts`
--

LOCK TABLES `Posts` WRITE;
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;
INSERT INTO `Posts` VALUES ('Post_01','Vichanm','I got a job','2016-01-09','cool!!','like'),('Post_02','awesomemat','I have a job in facebook','2016-02-06','I like','like');
/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Fname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `User_Id` varchar(10) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Location` varchar(40) NOT NULL,
  `Employment_History` varchar(40) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Education` varchar(10) NOT NULL,
  `Connections` varchar(2) NOT NULL,
  `Skills` varchar(30) NOT NULL,
  `Volunteer_Work` varchar(40) DEFAULT NULL,
  `Organizations` varchar(30) NOT NULL,
  `User_PostId` varchar(10) NOT NULL,
  KEY `User_Id` (`User_Id`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `UserCredentials` (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('Wang','Weihan','Vichanm',21,'Columbia MO','Baidu','male','Undergrade','Y','C/C++/Java','intership in google','Mizzou','Vichanm'),('Regan','Matt','awesomemat',21,'Columbia MO','Google','male','Undergrade','Y','C++/JAVA/PHP/Swift','internship in facebook','Mizzou','awesomemat');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserCredentials`
--

DROP TABLE IF EXISTS `UserCredentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserCredentials` (
  `UserCredential_Email` varchar(40) NOT NULL,
  `UserCredential_Passward` varchar(15) NOT NULL,
  `UserCredential_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserCredentials`
--

LOCK TABLES `UserCredentials` WRITE;
/*!40000 ALTER TABLE `UserCredentials` DISABLE KEYS */;
INSERT INTO `UserCredentials` VALUES ('Matt.regn@gmail.com','matt123','awesomemat'),('Weihan@gmail.com','1234567','Vichanm');
/*!40000 ALTER TABLE `UserCredentials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-26  1:20:46
