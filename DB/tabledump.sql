-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: webdata
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
  `BusinessCredential_Password` varchar(60) DEFAULT NULL,
  `BusinessCredential_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`BusinessCredential_Id`),
  UNIQUE KEY `BusinessCredential_Id` (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Businesses`
--

DROP TABLE IF EXISTS `Businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Businesses` (
  `Location` varchar(40) NOT NULL,
  `Industry` varchar(30) NOT NULL,
  `Bus_Name` varchar(30) NOT NULL,
  `Bus_Id` varchar(10) NOT NULL,
  `Website` varchar(40) DEFAULT NULL,
  `Tele` varchar(13) DEFAULT NULL,
  KEY `Bus_Id` (`Bus_Id`),
  CONSTRAINT `Businesses_ibfk_1` FOREIGN KEY (`Bus_Id`) REFERENCES `BusinessCredentials` (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `Connections`
--

DROP TABLE IF EXISTS `Connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Connections` (
  `User_Id1` varchar(10) DEFAULT NULL,
  `User_Id2` varchar(10) DEFAULT NULL,
  KEY `User_Id1` (`User_Id1`),
  KEY `User_Id2` (`User_Id2`),
  CONSTRAINT `Connections_ibfk_1` FOREIGN KEY (`User_Id1`) REFERENCES `User` (`User_Id`),
  CONSTRAINT `Connections_ibfk_2` FOREIGN KEY (`User_Id2`) REFERENCES `User` (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `Sender` varchar(10) DEFAULT NULL,
  `Recipient` varchar(10) DEFAULT NULL,
  `Message_Id` varchar(10) NOT NULL,
  `Message_DateTime` date DEFAULT NULL,
  `Subject` varchar(30) NOT NULL,
  `Content` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Likes` varchar(6) NOT NULL,
  KEY `Post_UserId` (`Post_UserId`),
  CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`Post_UserId`) REFERENCES `User` (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `User_Id` varchar(10) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Location` varchar(40) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Connections` varchar(20) NOT NULL,
  `Skills` text,
  `Volunteer_Work` text,
  `Organizations` text,
  `HSCompleted` char(1) DEFAULT NULL,
  `UniCompleted` char(1) DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `Degree` varchar(100) DEFAULT NULL,
  `Employed` char(1) DEFAULT NULL,
  `Company` varchar(50) DEFAULT NULL,
  `Industry` varchar(50) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  UNIQUE KEY `User_Id_2` (`User_Id`),
  KEY `User_Id` (`User_Id`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `UserCredentials` (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `UserCredentials`
--

DROP TABLE IF EXISTS `UserCredentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserCredentials` (
  `UserCredential_Email` varchar(40) NOT NULL,
  `UserCredential_Passward` varchar(60) DEFAULT NULL,
  `UserCredential_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`UserCredential_Id`),
  UNIQUE KEY `UserCredential_Id` (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-09  5:10:15
