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
  PRIMARY KEY (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BusinessCredentials`
--

LOCK TABLES `BusinessCredentials` WRITE;
/*!40000 ALTER TABLE `BusinessCredentials` DISABLE KEYS */;
INSERT INTO `BusinessCredentials` VALUES ('','$2y$10$DINa.v.c9ufaEZAVWZUR..iJ0IOjlBrHLhnHDdJo9rA8DgPTOqttG',''),('11@11.com','$2y$10$3b86oHYxXd6ww.xWs9n7qOQ2Eb7LvzB20XlSbNQiNCxsNfh5Nl3ae','11'),('1vv@vv.com','$2y$10$Cq0RYF9c5OuMLMnFd28a.eXqVnpFm8oXwRtqbqQ1xA7sL2QHmR6d.','1vv'),('test@test.com','$2y$10$yIOuloUBPKB9Ds/hjUtHcOYd8dDW0/oqarEeRMADMwGgZwGi7TN2C','22322'),('acme@acme.com','$2y$10$WWRTo9NMiIk2FPtPMDfQWe4qaIi9DXeovhF2pK3kaKxPeWRJ/4Ftm','ACME'),('asdf@a.com','$2y$10$WkjxE2TgrOqoUn1yEzZoj.6R3eZ0by3MzSPp8ytXvZo9Kop9EuFwG','asdf'),('Danny@google.org','123456','Dannygo'),('dpdbp7@mail.missouri.edu','$2y$10$/9KnzplTU1pK51BSLV7ClOeqvIGpHfgSzFRXU.37TmwYDSXJO2PXS','DC'),('doggystyles@mail.com','$2y$10$XN2v5gPSqjR4lyiWum29duEmL0kyA4hlzIYURpP2ceU3D/BlHmlxe','DoggyStyle'),('EEE@e.com','$2y$10$AyeUAkmQ8rbTE1UOTyRXmusKGc2ONGfQZZ5Bem6Tqel0VZTBtnQ8e','EEE'),('asdf@b.com','$2y$10$3Y8jW2OObsk5f3bpsZGy0uUjPKPc.J3SBDuFzbI9n0s0Qi97Hy5SO','Hi'),('aasdf@b.com','$2y$10$HTxHk7WX5LUD6XIjdkPMkeLevCLQanxvLJoYre7QLVtA5v4A7sV8u','Hiss'),('Justin@facebook.org','123','Justinface'),('qqq@z.com','$2y$10$irTkYwibcRfLRJL2g.fk3O1oYYVirIdPCJPI1Tnwej.gbJF297KQK','qqq'),('ramrod@mail.com','$2y$10$QYj4kSB2BoHNSmBEBSdtL.SxbG2279gguqDxZIv7E8O899vrVYZ8i','ramrod'),('rrr@r.com','$2y$10$k3AtPixjjujeRIkC.lsjDeCk9lf2Xb90lcBasUTOIGsqPM3LJGfKS','RRR'),('scbs@mail.com','$2y$10$FuCwCUXeM650BLroX6Hjne2JWo17u4E4j7AvrRKLBuUGfyTeqL7JO','scbs'),('sprint@sprint.com','$2y$10$G8nAw1G5.WlOyeFntMNgQO2YopIs2Q2dlnhX9YPRykgBXrkmeTlzW','sprint'),('vv@vv.com','$2y$10$VCO8DJFpA1CD40wXAV4REOM2WxletEQzZcYFvCa6tAF03wrB/AdcG','vv'),('vzw@v.com','$2y$10$2RFmEje8sXzqJ6239gJ4ruyy2GqxPprLomvgu098CtlSqY1RMV.0G','vzw'),('WWW@z.com','$2y$10$e6mqWCZigH2uSvAAxLXMV.Z8Ne4NzVocbhuE1U1uJtK/B2ohTlwpi','WWW');
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
  `Website` varchar(40) DEFAULT NULL,
  `Tele` varchar(13) DEFAULT NULL,
  KEY `Bus_Id` (`Bus_Id`),
  CONSTRAINT `Businesses_ibfk_1` FOREIGN KEY (`Bus_Id`) REFERENCES `BusinessCredentials` (`BusinessCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Businesses`
--

LOCK TABLES `Businesses` WRITE;
/*!40000 ALTER TABLE `Businesses` DISABLE KEYS */;
INSERT INTO `Businesses` VALUES ('LA','IT&Tech','Facebook','Justinface',NULL,NULL),('LA','Searching','Google','Dannygo',NULL,NULL),('USA','Technology','DunnCorp','DC','dc.com','5555555555'),('','','','','',''),('asdf','asdf','asdf','asdf','asdf@asdf.com','1234567891'),('asdf','Fake Stuff','Super Real Busi','Hi','asdf.com','5555555555'),('asdf','Fake Stuffss','Super Real Busi','Hiss','asdfasdfasdf.com','8888888888'),('asdf','11','11','11','111.com','1111111111'),('asdf','Food','Velveeta','vv','asdf.com','5555555555'),('asdf, asdf, asdf, 55555','Food','1Velveeta','1vv','asdf.com','5555555555'),('Columbia, MO, USA, 65202','Cellular','Sprint','sprint','sprint.com','5732562555'),('Columbia, MO, USA, 65202','Cool Stuff','Super-Cool Busi','scbs','scbs.com','5733755733'),('St. Clair, MO, USA, 63077','Dogs','Doggy Styles','DoggyStyle','doggystyles.net','3146501536'),('asdf, asdf, asdf, ','qqq','qqq','qqq','asdf.com','5555555555'),('asdf, asdf, asdf, ','qqq','qqq','qqq','asdf.com','5555555555'),('asdf, asdf, asdf, 55555','WWW','WWW','WWW','asdf.com','5555555555'),('asdf, asdf, asdf, 55555','EEE','EEE','EEE','asdf.com','5555555555'),('asdf, asdf, asdf, 55555','RRR','RRR','RRR','5555.com','5555555555'),('Columbia, MO, USA, 65202','Shitty Traps','ACME','ACME','acme.com','555555555'),('Kansas City, MO, USA, 64154','Cellular','Verizon','vzw','vzw.com','5555555555'),('Quebec, Quebec, Canada, 1','Manual Labor','RamRod','ramrod','ramrod.com','1'),(', , , ','','lkasd','','',''),('SOmewhere, MO, USA, 63380','test','test','22322','test.com','2222222222'),(', , , ','','','','',''),(', , , ','','','','','');
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
  `Gender` varchar(6) NOT NULL,
  `Connections` varchar(2) NOT NULL,
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
  KEY `User_Id` (`User_Id`),
  CONSTRAINT `User_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `UserCredentials` (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('Wang','Weihan','Vichanm',21,'Columbia MO','male','Y','C/C++/Java','intership in google','Mizzou',NULL,'y','University of Missouri',NULL,'y',NULL,NULL,NULL,NULL),('Regan','Matt','awesomemat',21,'Columbia MO','male','Y','C++/JAVA/PHP/Swift','internship in facebook','Mizzou',NULL,'y','University of Missouri',NULL,'y',NULL,NULL,NULL,NULL),('Daniel','Dunn','ddunn',21,'USA','male','','Programming','Marygrove','Delta Sigma Phi','y','y','University of Missouri','BS/MS in Computer Science','y','Boeing','Technology','Systems Integrator','2016-05-20'),('Justin','Nunn','14155469',22,'USA','Male','','','','','','y','University of Missouri','Computer Science','y','','','','0000-00-00'),('','','',0,'USA','','','','','','','','','','','','Technology','','0000-00-00'),('Joseph','Trammel','jatrammel',24,'United States','Noncon','','','','',NULL,'y','University of Missouri',NULL,'n',NULL,NULL,NULL,NULL),('Darius','Washington','dwashy21',21,'USA','Male','','','','',NULL,'y','University of Missouri',NULL,'y',NULL,NULL,NULL,NULL),('Darius','Washington','dwashy',21,'USA','Male','','','','',NULL,'y','University of Missouri',NULL,'n',NULL,NULL,NULL,NULL),('darius','washington','asdf',55,'asdf','asdf','','','','',NULL,'y','University of Missouri',NULL,'n',NULL,NULL,NULL,NULL),('Jane','Doe','janedoe',32,'USA','female','','','',NULL,'y','a','University of Columbia','English','y','Cisco','Networks','Network Specialist','2010-04-22'),('Johnny','Walker','jwalker',69,'USA','male','','whiskey maker','Special Olympics','Fun Club','y','y','University of Kentucky','BS in Chemistry','y','Johnny Walker Whiskey','Spirits','Distiller','1967-05-13'),('weihan','wang','wwww',21,'United States','male','','','','','y','y','mizzou','bbbb','','bb','bb','bb','1994-08-28'),('Austin','Cole','ac',22,'usa','male','','','','','','','','','','','','','0000-00-00'),('Haley','Stucky','bulldogs',22,'USA','female','','','','','y','y','Mizzou','Computer Science','y','Boone Valley','golf','Master','3333-01-22'),('John','Doe','abxJD',21,'USA','Undeci','','','','','y','y','University of Missouri-Columbia','BS Computer Science','y','ACME, Inc','Manual Labor','Underwater Basket Weaving','1996-03-15'),('Alan','Turing','aturing',45,'UK','male','','','','','y','y','University of Missouri','BS in Computer Science','y','MI6','Cryptography','Cryptanalyst','1941-10-28'),('Frank','Underwood','potus',57,'USA','male','','Leadership','stuff','gov','y','y','The Sentinel','BS in Political Science','y','US Government','Politics','President','2013-01-17'),('Claire','Underwood','firstlady',51,'USA','female','','Activism','Water drilling','those ones','y','a','John Hopkins University','MS in Psychology','y','US Government','Politics','First Lady','2013-03-04'),('Megan','Cochran','Megster',21,'USA','Female','','none','i dont like to help people','im a lone wolf','y','a','Lutheran High School - Saint Charles','Computer Science','y','Baja Grill','Food Service','Student Manager','2014-04-27');
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
  `UserCredential_Passward` varchar(60) DEFAULT NULL,
  `UserCredential_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`UserCredential_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserCredentials`
--

LOCK TABLES `UserCredentials` WRITE;
/*!40000 ALTER TABLE `UserCredentials` DISABLE KEYS */;
INSERT INTO `UserCredentials` VALUES ('','$2y$10$upIpIBGMq00ld7jK/txkYuqkUMJHEz2w3AVz7AUy/xPQBSC2LZRGO',''),('jrntg2@mail.missouri.edu','$2y$10$sqggqPyxohcKfKG3on8pRut6B6uaQZzXMKKcwKqSFKMQo.0TI0RO.','14155469'),('abx@sprint.com','$2y$10$.8Ds9EktzwUTC19RYcC7De7SXH1jNML.nqrN1F4Gf5bvE7FPpo4gm','abxJD'),('jesus@mail.com','$2y$10$O4wyEtSd8noufJGLO8/i5.BlFNpFqEEDoMcoMeHNYoIxDWXmiT21W','ac'),('asdf@asdg.com','$2y$10$b/yJ/1CC0aSH9xByIkfHv.qqYxaaPtcxraEYfJK4b5tPtW6q4qirO','asdf'),('aturing@yahoo.com','$2y$10$Tow958Ivkqt/U5nIVI51gOZf1/iPp62CCz/C2/010nCFWbt50qs96','aturing'),('Matt.regn@gmail.com','matt123','awesomemat'),('hstuck@mail.com','$2y$10$Gl8FeK5J7zuopBUDaQaf0.5qQiPGzQQPas0sn3eT5MCyqeQAF/CqO','bulldogs'),('dpdbp7@mail.missouri.edu','$2y$10$b0Gvg8TnEXIwdXa1svACiOF8dDK5LwoWpkSmnuQozfoIRF0b9p44C','ddunn'),('dc.wash95@gmail.com','$2y$10$d2U3rp6SwbcwkNkFRRnNbuK5r1rRIJdlDlaNjv7AHUae64u.1Kh2O','dwashy'),('dc.wash95@gmail.com','$2y$10$L9WvuK1vq7/YkTuaetj9AeEd3Mk1HDa3bkoa9qyBnnClpp81W8AlC','dwashy21'),('firstlady@whitehouse.gov','$2y$10$DMD7Gnk09KYvGVFkDTnu9Ol9r96CognMTynoKMyl6VzWj6mTbDLV6','firstlady'),('janedoe@mail.com','$2y$10$kNOsz1QdIyskfNl4bZ9gDeqPkqSv1sZ/AwtLq0l5gzT6Ry16qW6b6','janedoe'),('jatrammel@gmail.com','$2y$10$8EKH1xZkqrOseyDPTdi1qea3DMdIdENG/CAGoaRSikgYBoP5Gu4J6','jatrammel'),('jwalker@gmail.com','$2y$10$1Jc/0eBm6N.5il2TMmAFR.W.782ApLFkki2tjffDiUdmT9yxzfjH.','jwalker'),('mmc2n8@mail.missouri.edu','$2y$10$IJrBwmWeO/kWCt/QrvrZ2u6Jd96.iEHTbyYhBsdiC.vtFdbE9r10y','Megster'),('potus@whitehouse.gov','$2y$10$DCWkrGrTqNHzIHWO.vhP7.akJyHNVRUMSKEymvQ6SC0vOoqk7Nje6','potus'),('Weihan@gmail.com','1234567','Vichanm'),('wwww@qq.com','$2y$10$JOYPoN4R2s0UyQG9Trm8oeAUoQ6xDyqZkuf8ofRyRD05xoe102Ha2','wwww');
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

-- Dump completed on 2016-04-25  4:07:08
