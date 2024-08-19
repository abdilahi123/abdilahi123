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
  `opportunity_ID` int(100) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(244) NOT NULL,
  `Comfirm_Password` varchar(244) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Address` varchar(255) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES
(4,0,'codesolutin','cs@gmal.com','54321','','779663389','ibweni'),
(5,0,'sz','suza@gmal.com','12345','','5567','hn'),
(6,0,'TCRA','tcra@gmal.com','azm','','0778876','gjjk'),
(7,0,'IPA','IPA@gmal.com','12345','','064567899','Jumbi'),
(8,0,'EDH','edh@gmal.com','edh','','0623380991','Seoul'),
(9,0,'abdy','abdy12@gmail.com','123','','06297633287','NGALAWA'),
(10,0,'mama','mama@gmail.com','123','','0777720436','VUGA'),
(11,0,'mama','mama@gmail.com','123','','06297633287','VUGA'),
(12,0,'mama','mama@gmail.com','123','','0777720436','NGALAWA'),
(13,0,'mama','mama@gmail.com','123','','06297633287','NGALAWA'),
(14,0,'theBitRiddler','thebitriddler@gmail.com','123','','0769992202','Dar Es Salaam, P. O. Box 50, Tanzania'),
(15,0,'mama','mama@gmail.com','123','','06297633287','AFRICA'),
(16,0,'mama','mama@gmail.com','123','','06297633287','AFRICA'),
(17,0,'mama','mama@gmail.com','123','','0777720436','TUNGUU'),
(18,0,'mama','mama@gmail.com','123','','06297633287','AFRICA'),
(19,0,'mama','mama@gmail.com','123','','06297633287','NGALAWA'),
(20,0,'mama','mama@gmail.com','123','','06297633287','TUNGUU'),
(21,0,'mama','mama@gmail.com','123','','06297633287','VUGA'),
(22,0,'mama','mama@gmail.com','123','','06297633287','NGALAWA');
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
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credentials` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credentials`
--

/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;
INSERT INTO `credentials` VALUES
(10,'straw@gmail.com','123','IT','1'),
(11,'edh@gmal.com','7d432f4a55a8ae2fb0426826e45e9506358b6bf39e7cb1dc9','COMPANY','1'),
(13,'moza@gmal.com','086464a15c02d6a9290d3bcee68de444602a16a29798eaddd','IT','1'),
(14,'muniy@gmal.com','e15ded0f7020e2399e735862788b0f90d2416fdad04c7f477','IT','1'),
(15,'hisham@gmail.com','ed3f4b68dc240dee98ce6cec4d51029918c9d4d87fd7ff3bf','IT','1'),
(16,'abdy12@gmail.com','57756b682ff3fba7698e5544b8a3b217a2510a116a23cb65d','IT','1'),
(17,'abdy12@gmail.com','0e145ac56027c5f4dd3904ac0dddea8b0c2a0a5c037ac29d7','COMPANY','1'),
(19,'mama@gmail.com','13e9b36814186e815e7c836508c8c176d81171338da09a0c2','COMPANY','1'),
(20,'nahida@gmail.com','1c08cf7a69d8fe6cf51428b5742a3aaa26ea4a5d7d8899165','IT','1'),
(21,'nahida@gmail.com','abddbdc4a0a7b4e7e4d82cceeb8d907da71bdfb4689d0230d','IT','1'),
(22,'nahida@gmail.com','b01961afd61098bf57f4d07ccb40253974f231cd482cd9e02','IT','1'),
(23,'nahida@gmail.com','2e4cc278f6ec6294643313986963925e75821d962eee59fd0','IT','1'),
(26,'nahida@gmail.com','4e388fbe7d0026850a2eaa43d3095d4f8ca8d5588550f2c6c','IT','1'),
(27,'nahida@gmail.com','2488ba1198a4d8bdfbc5a9f13955012b670bbf06bfac3915d','IT','1'),
(28,'thebitriddler@gmail.com','d8025c7ad3d670fb39a812c74c67a35f10769aa533a42f6d5','COMPANY','1'),
(29,'abudujanaally@gmail.com','06365ef6b2f581865e41e949647cbc35826650a048f130f30','IT','1'),
(30,'nahida@gmail.com','0214c672066a9a0ccf76c4cd8656e1ccbe2e82ac5dd4cfe44','IT','1'),
(31,'nahida@gmail.com','7f755290043996c72b4c0adee8481020137e1bfc25b13727f','IT','1'),
(32,'nahida@gmail.com','a20c3766ee5946edd3aae16eb95934178da1a84dfaceec7b7','IT','1'),
(33,'mama@gmail.com','9dd8e1b7f59579141b9d3b6741c3f3a0762dd7b8ae5f92bc2','COMPANY','1'),
(34,'mama@gmail.com','a4aecc5e411c0e5ec941c6df93f321329043a539be7d87ddc','COMPANY','1'),
(35,'nahida@gmail.com','f2a17f16d9f70a2f876139c8eb2c4fbaefbeeb3681604cac9','IT','1'),
(36,'abdy12@gmail.com','79557fe847d8e35f306a1ff15f0f8c2950f28dc166140a38b','IT','1'),
(37,'mama@gmail.com','b6a4f77149e3978773986cbe5dad196375001e74f1d3643a8','COMPANY','1'),
(38,'mama@gmail.com','4e26808d0cd7d2ea6b71a40c1146d385406d9fe99b0e19190','COMPANY','1'),
(39,'nahida@gmail.com','028bea5d48aa08f4feb3a3aba3d1aa6f80db017839b2c32a4','IT','1'),
(40,'mama@gmail.com','751cd10576aaaafc3259295dc32d6d7c3d763af70844e4bd2','COMPANY','1'),
(41,'abdy12@gmail.com','d3bd89708cb7afe9a8b2e98de97695acb692716878dbc8ef1','IT','1'),
(42,'mama@gmail.com','36a3863b8c73101bbf20097b082d103a34eef30dd1f44aa96','COMPANY','1'),
(43,'mama@gmail.com','e363cdc37978775eb0df57219dc4d0bc116bf93c621578645','COMPANY','1'),
(44,'abdy12@gmail.com','3c48c2e65b8833213066eb7f4719d5d1e003beff07de16aae','IT','1'),
(45,'abdy12@gmail.com','e2a62292a7ad195542989767659590ea115fff9600bc43d56','IT','1'),
(46,'abdy12@gmail.com','5208585b85d21c87d9acef42df34c5d5bc9f5d5e81198aaf4','IT','1'),
(47,'nahida@gmail.com','7904a2d358d3617917006e2f4c65c1b64799d0299e8a0af61','IT','1'),
(48,'nahida@gmail.com','f425e4399ea881e3a3512b8e76c417a0caf7b3407d7f99fd3','IT','1'),
(49,'mama@gmail.com','f7b1ca38a1288191fa7617121003a3016e3ad6109ea4a51ab','COMPANY','1'),
(50,'nahida@gmail.com','40f67e5b733eecb062bd2496fba9f2eb4c531d6a6a8f47add','IT','1');
/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;

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
  `applicants_id` int(100) NOT NULL,
  `specialist_id` int(100) NOT NULL,
  `Tittle` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ApplicationDeadline` date NOT NULL,
  PRIMARY KEY (`opportunityID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opportunity`
--

/*!40000 ALTER TABLE `opportunity` DISABLE KEYS */;
/*!40000 ALTER TABLE `opportunity` ENABLE KEYS */;

--
-- Table structure for table `specialist`
--

DROP TABLE IF EXISTS `specialist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialist` (
  `SpecialistID` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(100) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone_Number` int(10) NOT NULL,
  `GitHub_Username` varchar(50) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `Expirience` varchar(255) NOT NULL,
  PRIMARY KEY (`SpecialistID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialist`
--

/*!40000 ALTER TABLE `specialist` DISABLE KEYS */;
INSERT INTO `specialist` VALUES
(5,0,'Nahida','nahida@gmail.com',714885542,'nahida','Front end developer','3'),
(8,0,'Faraula','straw@gmail.com',777123456,'straw','Front end developer','7'),
(10,0,'Moza','moza@gmal.com',779663389,'mozasaed','Front end developer','6'),
(11,0,'Mounira T H','muniy@gmal.com',779777789,'muniy','Front end developer','6'),
(12,0,'Zena Ali Omar','zeyna@gmail.com',623380991,'zeyna','Front end developer','6'),
(13,0,'Zena Ali Omar','zeyna@gmail.com',623380991,'zeyna','Front end developer','6'),
(14,0,'Zena Ali Omar','zeyna@gmail.com',623380991,'zeyna','Front end developer','6'),
(16,0,'abdy','abdy12@gmail.com',629763287,'abdilahi','developer','2'),
(26,0,'edah','nahida@gmail.com',777282828,'nahida','developer','2'),
(27,0,'edah','nahida@gmail.com',629763287,'nahida','developer','-3'),
(28,0,'edah','nahida@gmail.com',2147483647,'nahida','developer','1'),
(29,0,'abdy','abdy12@gmail.com',0,'abdilahi','developer','1'),
(30,0,'edah','nahida@gmail.com',629763287,'nahida','developer','1'),
(31,0,'abdy','abdy12@gmail.com',0,'abdilahi','developer','3'),
(32,0,'abdilahi haruna juma','abdy12@gmail.com',2147483647,'abdilahi','hacker','3'),
(33,0,'abdilahi haruna juma','abdy12@gmail.com',777282828,'abdilahi','hacker','3'),
(34,0,'abdilahi haruna juma','abdy12@gmail.com',777282828,'abdilahi','hacker','3'),
(35,0,'edah','nahida@gmail.com',777282828,'nahida','hacker','3'),
(36,0,'edah','nahida@gmail.com',718880710,'nahida','hacker','1'),
(37,0,'edah','nahida@gmail.com',629763287,'nahida','hacker','3');
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

-- Dump completed on 2024-08-19 12:26:39
