/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.4.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: zantech
-- ------------------------------------------------------
-- Server version	11.4.2-MariaDB-4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicants` (
  `ApplicantID` int(11) NOT NULL AUTO_INCREMENT,
  `opportunityID` int(11) NOT NULL,
  `SpecialistID` int(255) NOT NULL,
  `ApplicationDate` date NOT NULL DEFAULT current_timestamp(),
  `LetterPath` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ApplicantID`),
  KEY `applicants_id` (`opportunityID`),
  KEY `applicants_fk` (`SpecialistID`),
  CONSTRAINT `applicants_fk` FOREIGN KEY (`SpecialistID`) REFERENCES `specialist` (`SpecialistID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`opportunityID`) REFERENCES `opportunity` (`opportunityID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(244) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Address` varchar(255) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

--
-- Table structure for table `company_opportunity`
--

DROP TABLE IF EXISTS `company_opportunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_opportunity` (
  `CompanyOpportunityID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `opportunityid` int(11) NOT NULL,
  PRIMARY KEY (`CompanyOpportunityID`),
  KEY `opportunityID` (`opportunityid`),
  KEY `CompanyID` (`CompanyID`),
  CONSTRAINT `company_opportunity_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`),
  CONSTRAINT `opportunityID` FOREIGN KEY (`opportunityid`) REFERENCES `opportunity` (`opportunityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_opportunity`
--

/*!40000 ALTER TABLE `company_opportunity` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_opportunity` ENABLE KEYS */;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `applicantId` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES
(9,'You loose','1','theBitRiddler','thebitriddler@gmail.com','U got nothing ','2024-08-15 15:24:14'),
(10,'Passed','16','theBitRiddler','thebitriddler@gmail.com','You made it. Bachu Ally. a.k.a Abudujana Ally','2024-08-15 15:46:51'),
(11,'ddsdfhgjhgfgc','1','mama','mama@gmail.com','asdfghjukughf','2024-08-15 19:22:00'),
(12,'dfsghjk','11','mama','mama@gmail.com','dsdfghjkl;ujhytgfr','2024-08-15 19:23:42'),
(13,'sdfg','17','mama','mama@gmail.com','sdfghjhgfds','2024-08-15 19:29:20'),
(14,'abdy','1','<br />\r\n<b>Warning</b>:  Undefined variable $co_name in <b>C:\\xampp\\htdocs\\zann\\message-users.php</b> on line <b>29</b><br />\r\n','<br />\r\n<b>Warning</b>:  Undefined variable $co_mail in <b>C:\\xampp\\htdocs\\zann\\message-users.php</b> on line <b>30</b><br />\r\n','aaaaaaa','2024-08-16 08:28:29'),
(15,'edah','1','mama','mama@gmail.com','aaaaaaaaaaaaaaaaaaaaaaaaa','2024-08-18 04:49:20'),
(16,'nahida','<br />\r\n<b>Warning</b>:  Undefined variable $applic in <b>C:\\xampp\\htdocs\\zann\\message-users.php</b> on line <b>28</b><br />\r\n','<br />\r\n<b>Warning</b>:  Undefined variable $co_name in <b>C:\\xampp\\htdocs\\zann\\message-users.php</b> on line <b>29</b><br />\r\n','<br />\r\n<b>Warning</b>:  Undefined variable $co_mail in <b>C:\\xampp\\htdocs\\zann\\message-users.php</b> on line <b>30</b><br />\r\n','sssssssssssssss','2024-08-18 04:49:32');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

--
-- Table structure for table `opportunity`
--

DROP TABLE IF EXISTS `opportunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opportunity` (
  `opportunityID` int(100) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(100) NOT NULL,
  `Tittle` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ApplicationDeadline` date NOT NULL,
  PRIMARY KEY (`opportunityID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opportunity`
--

/*!40000 ALTER TABLE `opportunity` DISABLE KEYS */;
INSERT INTO `opportunity` VALUES
(12,23,'Networing','Connecting WIfi Network','Full Time','No Req','2024-08-22','2024-08-22','2024-08-21');
/*!40000 ALTER TABLE `opportunity` ENABLE KEYS */;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `loginID` (`loginID`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `credentials` (`LoginID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;

--
-- Table structure for table `specialist`
--

DROP TABLE IF EXISTS `specialist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialist` (
  `SpecialistID` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone_Number` int(10) NOT NULL,
  `GitHub_Username` varchar(50) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `Expirience` varchar(255) NOT NULL,
  `Role` varchar(255) DEFAULT NULL,
  `Password` text DEFAULT NULL,
  PRIMARY KEY (`SpecialistID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialist`
--

/*!40000 ALTER TABLE `specialist` DISABLE KEYS */;
INSERT INTO `specialist` VALUES
(38,'nahida','nahida@gmail.com',7777,'nahidaGit','','4',NULL,'$2y$10$KQkpuQecGFCr1Yqk3p/0M.ozTKC/.mpXqc6fvGweR6iOqnM0qB6q6');
/*!40000 ALTER TABLE `specialist` ENABLE KEYS */;

--
-- Table structure for table `specialistopportunity`
--

DROP TABLE IF EXISTS `specialistopportunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialistopportunity` (
  `SpecialistOpportunityID` int(11) NOT NULL AUTO_INCREMENT,
  `SpecialistID` int(11) NOT NULL,
  `opportunityID` int(11) NOT NULL,
  PRIMARY KEY (`SpecialistOpportunityID`),
  KEY `SpecialistID` (`SpecialistID`),
  CONSTRAINT `specialistopportunity_ibfk_1` FOREIGN KEY (`SpecialistID`) REFERENCES `specialist` (`SpecialistID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialistopportunity`
--

/*!40000 ALTER TABLE `specialistopportunity` DISABLE KEYS */;
/*!40000 ALTER TABLE `specialistopportunity` ENABLE KEYS */;

--
-- Dumping routines for database 'zantech'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-08-21 11:46:28
