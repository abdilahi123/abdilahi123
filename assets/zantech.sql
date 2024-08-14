-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 04:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zantech`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `ApplicantID` int(11) NOT NULL,
  `opportunityID` int(255) NOT NULL,
  `SpecialistID` int(255) NOT NULL,
  `ApplicationDate` date NOT NULL,
  `LetterPath` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantID`, `opportunityID`, `SpecialistID`, `ApplicationDate`, `LetterPath`, `Status`) VALUES
(1, 1, 11, '0000-00-00', '889981.pdf', 'Pending'),
(2, 1, 11, '0000-00-00', '670534.pdf', 'Pending'),
(3, 1, 11, '0000-00-00', '656394.pdf', 'Pending'),
(4, 1, 11, '0000-00-00', '101833.pdf', 'Pending'),
(5, 1, 11, '0000-00-00', '885632.pdf', 'Pending'),
(6, 1, 11, '0000-00-00', '600373.pdf', 'Pending'),
(7, 1, 11, '0000-00-00', '173985.pdf', 'Pending'),
(8, 1, 5, '0000-00-00', '5592.pdf', 'Pending'),
(9, 1, 0, '0000-00-00', '412459.pdf', 'Pending'),
(10, 1, 0, '0000-00-00', '811670.pdf', 'Pending'),
(11, 1, 0, '0000-00-00', '388324.pdf', 'Pending'),
(12, 1, 0, '0000-00-00', '480290.pdf', 'Pending'),
(13, 1, 0, '0000-00-00', '932623.pdf', 'Pending'),
(14, 1, 5, '0000-00-00', '887073.pdf', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompanyID` int(11) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Password` varchar(244) NOT NULL,
  `Comfirm_Password` varchar(244) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyID`, `Company_Name`, `email`, `Password`, `Comfirm_Password`, `Phone`, `Address`) VALUES
(4, 'codesolutin', 'cs@gmal.com', '54321', '', '779663389', 'ibweni'),
(5, 'sz', 'suza@gmal.com', '12345', '', '5567', 'hn'),
(6, 'TCRA', 'tcra@gmal.com', 'azm', '', '0778876', 'gjjk'),
(7, 'IPA', 'IPA@gmal.com', '12345', '', '064567899', 'Jumbi'),
(8, 'EDH', 'edh@gmal.com', 'edh', '', '0623380991', 'Seoul'),
(9, 'abdy', 'abdy12@gmail.com', '123', '', '06297633287', 'NGALAWA'),
(10, 'mama', 'mama@gmail.com', '123', '', '0777720436', 'VUGA'),
(11, 'mama', 'mama@gmail.com', '123', '', '06297633287', 'VUGA'),
(12, 'mama', 'mama@gmail.com', '123', '', '0777720436', 'NGALAWA'),
(13, 'mama', 'mama@gmail.com', '123', '', '06297633287', 'NGALAWA');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `LoginID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`LoginID`, `Email`, `Password`, `Role`, `Status`) VALUES
(10, 'straw@gmail.com', '123', 'IT', '1'),
(11, 'edh@gmal.com', '7d432f4a55a8ae2fb0426826e45e9506358b6bf39e7cb1dc9', 'COMPANY', '1'),
(13, 'moza@gmal.com', '086464a15c02d6a9290d3bcee68de444602a16a29798eaddd', 'IT', '1'),
(14, 'muniy@gmal.com', 'e15ded0f7020e2399e735862788b0f90d2416fdad04c7f477', 'IT', '1'),
(15, 'hisham@gmail.com', 'ed3f4b68dc240dee98ce6cec4d51029918c9d4d87fd7ff3bf', 'IT', '1'),
(16, 'abdy12@gmail.com', '57756b682ff3fba7698e5544b8a3b217a2510a116a23cb65d', 'IT', '1'),
(17, 'abdy12@gmail.com', '0e145ac56027c5f4dd3904ac0dddea8b0c2a0a5c037ac29d7', 'COMPANY', '1'),
(19, 'mama@gmail.com', '13e9b36814186e815e7c836508c8c176d81171338da09a0c2', 'COMPANY', '1'),
(20, 'nahida@gmail.com', '1c08cf7a69d8fe6cf51428b5742a3aaa26ea4a5d7d8899165', 'IT', '1'),
(21, 'nahida@gmail.com', 'abddbdc4a0a7b4e7e4d82cceeb8d907da71bdfb4689d0230d', 'IT', '1'),
(22, 'nahida@gmail.com', 'b01961afd61098bf57f4d07ccb40253974f231cd482cd9e02', 'IT', '1'),
(23, 'nahida@gmail.com', '2e4cc278f6ec6294643313986963925e75821d962eee59fd0', 'IT', '1'),
(26, 'nahida@gmail.com', '4e388fbe7d0026850a2eaa43d3095d4f8ca8d5588550f2c6c', 'IT', '1'),
(27, 'nahida@gmail.com', '2488ba1198a4d8bdfbc5a9f13955012b670bbf06bfac3915d', 'IT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `LoginID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `recipient_email` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_company` varchar(255) DEFAULT NULL,
  `message_content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `opportunityID` int(11) NOT NULL,
  `Tittle` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Requirements` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ApplicationDeadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`opportunityID`, `Tittle`, `Description`, `Type`, `Requirements`, `StartDate`, `EndDate`, `ApplicationDeadline`) VALUES
(1, 'Networking', 'Connect wifi and likes', 'part time', 'diploma', '2024-08-03', '2024-08-09', '2024-08-05'),
(2, 'Database admin', 'overall ', 'Full time', 'diploma', '2024-08-03', '2024-08-31', '2024-08-06'),
(3, 'Software development', 'Both front end and backend develpers needed', 'Full time', 'Degree ', '2024-08-07', '2024-12-06', '2024-08-10'),
(4, 'Software development', 'Both front end and backend develpers needed', 'Full time', 'Degree ', '2024-08-07', '2024-12-06', '2024-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `SpecialistID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone_Number` int(10) NOT NULL,
  `GitHub_Username` varchar(50) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `Expirience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`SpecialistID`, `FullName`, `Email`, `phone_Number`, `GitHub_Username`, `Speciality`, `Expirience`) VALUES
(5, 'Nahida', 'nahida@gmail.com', 714885542, 'nahida', 'Front end developer', '3'),
(8, 'Faraula', 'straw@gmail.com', 777123456, 'straw', 'Front end developer', '7'),
(10, 'Moza', 'moza@gmal.com', 779663389, 'mozasaed', 'Front end developer', '6'),
(11, 'Mounira T H', 'muniy@gmal.com', 779777789, 'muniy', 'Front end developer', '6'),
(12, 'Zena Ali Omar', 'zeyna@gmail.com', 623380991, 'zeyna', 'Front end developer', '6'),
(13, 'Zena Ali Omar', 'zeyna@gmail.com', 623380991, 'zeyna', 'Front end developer', '6'),
(14, 'Zena Ali Omar', 'zeyna@gmail.com', 623380991, 'zeyna', 'Front end developer', '6'),
(15, 'Hisham Mdungi', 'hisham@gmail.com', 685076445, 'hisham', 'Front end developer', '0'),
(16, 'abdy', 'abdy12@gmail.com', 629763287, 'abdilahi', 'developer', '2'),
(17, 'edah', 'nahida@gmail.com', 629763278, 'nahida', 'developer', '2'),
(18, 'edah', 'nahida@gmail.com', 777282828, 'nahida', 'developer', '1'),
(19, 'edah', 'nahida@gmail.com', 777282828, 'nahida', 'developer', '2'),
(20, 'edah', 'nahida@gmail.com', 629763287, 'nahida', 'developer', '2'),
(21, 'edah', 'nahida@gmail.com', 629763287, 'nahida', 'developer', '2'),
(22, 'edah', 'nahida@gmail.com', 629763278, 'nahida', 'developer', '2'),
(23, 'edah', 'nahida@gmail.com', 629763278, 'nahida', 'developer', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`ApplicantID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`LoginID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD PRIMARY KEY (`opportunityID`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`SpecialistID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `LoginID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
  MODIFY `opportunityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `SpecialistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
