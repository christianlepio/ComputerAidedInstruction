-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 09:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessontbl`
--

CREATE TABLE `lessontbl` (
  `lessonid` int(11) NOT NULL,
  `lessonChapter` varchar(125) NOT NULL,
  `lessonTitle` longtext NOT NULL,
  `fileLoc` longtext NOT NULL,
  `category` varchar(25) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessontbl`
--

INSERT INTO `lessontbl` (`lessonid`, `lessonChapter`, `lessonTitle`, `fileLoc`, `category`, `dateCreated`) VALUES
(3, '2', 'test video', 'files/2022-01-10 19-16-37.mkv', 'vid', '2022-02-20 20:01:06'),
(4, '1', 'test', 'files/Financial and Risk Assessment .pdf', 'docs/pdf', '2022-02-21 08:09:53'),
(7, '4', 'test2', 'files/thesis mobile ide.mp4', 'vid', '2022-02-21 08:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblexercise`
--

CREATE TABLE `tblexercise` (
  `ExerciseID` int(11) NOT NULL,
  `LessonID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `qpic` varchar(255) NOT NULL,
  `ChoiceA` text NOT NULL,
  `Apic` varchar(255) NOT NULL,
  `ChoiceB` text NOT NULL,
  `Bpic` varchar(255) NOT NULL,
  `ChoiceC` text NOT NULL,
  `Cpic` varchar(255) NOT NULL,
  `ChoiceD` text NOT NULL,
  `Dpic` varchar(255) NOT NULL,
  `Answer` varchar(90) NOT NULL,
  `Anspic` varchar(255) NOT NULL,
  `ExercisesDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblexercise`
--

INSERT INTO `tblexercise` (`ExerciseID`, `LessonID`, `Question`, `qpic`, `ChoiceA`, `Apic`, `ChoiceB`, `Bpic`, `ChoiceC`, `Cpic`, `ChoiceD`, `Dpic`, `Answer`, `Anspic`, `ExercisesDate`) VALUES
(5, 4, 'What is the fourth letter in alphabet?', '', 'B', '', 'G', '', 'D', '', 'A', '', 'D', '', '2022-02-21 17:45:46'),
(7, 4, '1+1=?', '', '1', '', '2', '', '4', '', '3', '', '2', '', '2022-02-22 23:25:33'),
(8, 4, '2+2=?', '', '2', '', '5', '', '4', '', '8', '', '4', '', '2022-02-22 23:26:10'),
(10, 7, 'What is the animal in the picture below?', 'files/pig.jpg', 'Chicken', '', 'Pig', '', 'Elephant', '', 'dog', '', 'Pig', '', '2022-02-24 16:13:00'),
(11, 7, 'What is the 7th letter in the alphabet?', '', 'Aa', '', 'Gg', '', 'Bb', '', 'Dd', '', 'Gg', '', '2022-02-24 16:16:43'),
(12, 3, '2 x 2 = ?', '', '8', 'files/8.jpg', '10', 'files/10.jpg', '5', 'files/5.jpg', '4', 'files/4.jpg', '4', 'files/4.jpg', '2022-02-24 16:20:16'),
(13, 3, 'What is the product in the equation below?', 'files/5x5.jpg', '30', '', '100', '', '25', '', '10', '', '25', '', '2022-02-24 16:22:32'),
(14, 3, '100 + 1000 = ?', '', '100', '', '900', '', '1,100', '', '1,000', '', '1,100', '', '2022-02-24 16:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblscore`
--

CREATE TABLE `tblscore` (
  `ScoreID` int(11) NOT NULL,
  `LessonID` int(11) NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `NoItems` int(11) NOT NULL DEFAULT 1,
  `Score` int(11) NOT NULL,
  `Submitted` tinyint(1) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblscore`
--

INSERT INTO `tblscore` (`ScoreID`, `LessonID`, `ExerciseID`, `StudentID`, `NoItems`, `Score`, `Submitted`, `answer`) VALUES
(40, 4, 5, 1, 1, 1, 1, 'D'),
(41, 4, 7, 1, 1, 1, 1, '2'),
(42, 4, 8, 1, 1, 1, 1, '4'),
(43, 7, 10, 1, 1, 1, 1, 'Pig'),
(44, 7, 11, 1, 1, 1, 1, 'Gg'),
(48, 4, 5, 2, 1, 0, 1, 'G'),
(49, 4, 7, 2, 1, 0, 1, '4'),
(50, 4, 8, 2, 1, 1, 1, '4'),
(51, 7, 10, 2, 1, 1, 1, 'Pig'),
(52, 7, 11, 2, 1, 1, 1, 'Gg'),
(53, 3, 12, 2, 1, 1, 1, '4'),
(54, 3, 13, 2, 1, 0, 1, '100'),
(55, 3, 14, 2, 1, 1, 1, '1,100'),
(56, 4, 5, 3, 1, 1, 1, 'D'),
(57, 4, 7, 3, 1, 1, 1, '2'),
(58, 4, 8, 3, 1, 0, 1, '2'),
(59, 7, 10, 3, 1, 1, 1, 'Pig'),
(60, 7, 11, 3, 1, 1, 1, 'Gg'),
(61, 3, 12, 3, 1, 0, 1, '8'),
(62, 3, 13, 3, 1, 1, 1, '25'),
(63, 3, 14, 3, 1, 1, 1, '1,100'),
(67, 7, 10, 4, 1, 0, 1, 'dog'),
(68, 7, 11, 4, 1, 0, 1, 'Aa'),
(69, 4, 5, 4, 1, 0, 1, 'G'),
(70, 4, 7, 4, 1, 0, 1, '1'),
(71, 4, 8, 4, 1, 0, 1, '5'),
(72, 3, 12, 4, 1, 0, 1, '10'),
(73, 3, 13, 4, 1, 0, 1, '30'),
(74, 3, 14, 4, 1, 0, 1, '100'),
(75, 4, 5, 5, 1, 1, 1, 'D'),
(76, 4, 7, 5, 1, 1, 1, '2'),
(77, 4, 8, 5, 1, 1, 1, '4'),
(78, 7, 10, 5, 1, 1, 1, 'Pig'),
(79, 7, 11, 5, 1, 1, 1, 'Gg'),
(80, 3, 12, 5, 1, 1, 1, '4'),
(81, 3, 13, 5, 1, 1, 1, '25'),
(82, 3, 14, 5, 1, 0, 1, '100'),
(86, 3, 12, 1, 1, 0, 1, '10'),
(87, 3, 13, 1, 1, 1, 1, '25'),
(88, 3, 14, 1, 1, 1, 1, '1,100');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentID` int(11) NOT NULL,
  `LRN` varchar(25) NOT NULL,
  `Fname` varchar(90) NOT NULL,
  `Lname` varchar(125) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `studentsec` varchar(125) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `MobileNo` varchar(90) NOT NULL,
  `STUDPASS` longtext NOT NULL,
  `imgsrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`StudentID`, `LRN`, `Fname`, `Lname`, `gender`, `studentsec`, `Address`, `MobileNo`, `STUDPASS`, `imgsrc`) VALUES
(1, '13675600001', 'Renald', 'Factolerin', 'Male', 'Matiyaga', 'Muntinlupa City', '09123456789', '$2y$10$EkxMqUUoHwoYA6xZ5.fRWuZu4qEC4Faf76KQuP5FD6R0VX1fNzwIa', 'files/264665017_276562411185672_9199685324427859298_n.jpg'),
(2, '13675600002', 'Jethro', 'Erasga', 'Male', 'Masinop', 'Muntinlupa City', '09123456789', '$2y$10$L6gWy669Ra31pheybJrLh.AJZVyBYWq9VMJYsb9EkhDRW3F443.f.', 'files/junie2.jpg'),
(3, '13675600003', 'Artchee', 'Risma', 'Male', 'Matinik', 'Muntinlupa City', '09123456789', '$2y$10$64J2GaHYBEbYioD7vHGK3e0mOuffw2mvjkmpasbbyITF25IhiXWUS', 'files/donny4.jpg'),
(4, '13675600004', 'Alyssa', 'Concepcion', 'Female', 'Matiyaga', 'Muntinlupa City', '09123456789', '$2y$10$ss3VONwQL4bqoMYLiCOI6OHARXu746eMw.0JzzFYhJIOBDxsD0n6S', 'files/josh1.jpg'),
(5, '13675600005', 'Babylen', 'Munsad', 'Female', 'Magalang', 'Muntinlupa City', '09123456789', '$2y$10$VE7XyMz10pGTiGyOdpofA.tAezzUqVsugXjxO.toPWy8UNvmTidPW', 'files/cong6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudreport`
--

CREATE TABLE `tblstudreport` (
  `reportid` int(11) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `lesson` varchar(255) NOT NULL,
  `totalstud` int(11) NOT NULL,
  `passed` float NOT NULL,
  `failed` float NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudreport`
--

INSERT INTO `tblstudreport` (`reportid`, `lessonid`, `lesson`, `totalstud`, `passed`, `failed`, `datecreated`) VALUES
(4, 4, 'test', 5, 60, 40, '2022-02-24 16:35:10'),
(5, 3, 'test video', 5, 80, 20, '2022-02-24 19:12:09'),
(6, 7, 'test2', 5, 80, 20, '2022-02-24 16:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `summaryid` int(11) NOT NULL,
  `studid` int(11) NOT NULL,
  `LRN` varchar(25) NOT NULL,
  `studname` varchar(255) NOT NULL,
  `studentsec` varchar(125) NOT NULL,
  `lessonid` int(11) NOT NULL,
  `lesson` longtext NOT NULL,
  `noItems` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `status` varchar(125) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsummary`
--

INSERT INTO `tblsummary` (`summaryid`, `studid`, `LRN`, `studname`, `studentsec`, `lessonid`, `lesson`, `noItems`, `score`, `percentage`, `status`, `datecreated`) VALUES
(9, 1, '13675600001', 'Factolerin, Renald', 'Matiyaga', 4, 'test', 3, 3, 100, 'PASSED', '2022-02-24 16:30:00'),
(10, 1, '13675600001', 'Factolerin, Renald', 'Matiyaga', 7, 'test2', 2, 2, 100, 'PASSED', '2022-02-24 16:30:00'),
(11, 1, '13675600001', 'Factolerin, Renald', 'Matiyaga', 3, 'test video', 3, 2, 66.6667, 'PASSED', '2022-02-24 19:12:08'),
(12, 2, '13675600002', 'Erasga, Jethro', 'Masinop', 4, 'test', 3, 1, 33.3333, 'FAILED', '2022-02-24 16:31:13'),
(13, 2, '13675600002', 'Erasga, Jethro', 'Masinop', 7, 'test2', 2, 2, 100, 'PASSED', '2022-02-24 16:31:14'),
(14, 2, '13675600002', 'Erasga, Jethro', 'Masinop', 3, 'test video', 3, 2, 66.6667, 'PASSED', '2022-02-24 16:31:14'),
(15, 3, '13675600003', 'Risma, Artchee', 'Matinik', 4, 'test', 3, 2, 66.6667, 'PASSED', '2022-02-24 16:32:21'),
(16, 3, '13675600003', 'Risma, Artchee', 'Matinik', 7, 'test2', 2, 2, 100, 'PASSED', '2022-02-24 16:32:21'),
(17, 3, '13675600003', 'Risma, Artchee', 'Matinik', 3, 'test video', 3, 2, 66.6667, 'PASSED', '2022-02-24 18:00:24'),
(18, 4, '13675600004', 'Concepcion, Alyssa', 'Matiyaga', 4, 'test', 3, 0, 0, 'FAILED', '2022-02-24 16:33:23'),
(19, 4, '13675600004', 'Concepcion, Alyssa', 'Matiyaga', 7, 'test2', 2, 0, 0, 'FAILED', '2022-02-24 16:33:23'),
(20, 4, '13675600004', 'Concepcion, Alyssa', 'Matiyaga', 3, 'test video', 3, 0, 0, 'FAILED', '2022-02-24 16:33:23'),
(21, 5, '13675600005', 'Munsad, Babylen', 'Magalang', 4, 'test', 3, 3, 100, 'PASSED', '2022-02-24 16:35:10'),
(22, 5, '13675600005', 'Munsad, Babylen', 'Magalang', 7, 'test2', 2, 2, 100, 'PASSED', '2022-02-24 16:35:10'),
(23, 5, '13675600005', 'Munsad, Babylen', 'Magalang', 3, 'test video', 3, 2, 66.6667, 'PASSED', '2022-02-24 16:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` int(11) NOT NULL,
  `LNAME` varchar(125) NOT NULL,
  `FNAME` varchar(125) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `PHONE` varchar(25) NOT NULL,
  `ADDRESS` longtext NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASS` longtext NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `imgsrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `LNAME`, `FNAME`, `GENDER`, `PHONE`, `ADDRESS`, `EMAIL`, `USERNAME`, `PASS`, `TYPE`, `imgsrc`) VALUES
(2, 'Pisingan', 'Rasol', 'Male', '09123456789', 'Muntinlupa City', 'pisinganrasol_bsit@plmun.edu.ph', 'Admin', '$2y$10$SIDzEeDvJb9e7babVO.FBe3egzlmY4OYtxdxG29GE3v3.1JnAIBky', 'Administrator', 'files/rasol.jpg'),
(5, 'Pialago', 'Apple', 'Female', '09123456789', 'Muntinlupa City', 'pialagoapple_bsit@plmun.edu.ph', 'teach', '$2y$10$ToUFDe6vCZfiGHWJQCz.9e2dLvmCNYSivPZHJzXompBdCjSrBMKZK', 'Teacher', 'files/6993454.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessontbl`
--
ALTER TABLE `lessontbl`
  ADD PRIMARY KEY (`lessonid`);

--
-- Indexes for table `tblexercise`
--
ALTER TABLE `tblexercise`
  ADD PRIMARY KEY (`ExerciseID`);

--
-- Indexes for table `tblscore`
--
ALTER TABLE `tblscore`
  ADD PRIMARY KEY (`ScoreID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `tblstudreport`
--
ALTER TABLE `tblstudreport`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`summaryid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessontbl`
--
ALTER TABLE `lessontbl`
  MODIFY `lessonid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblexercise`
--
ALTER TABLE `tblexercise`
  MODIFY `ExerciseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblscore`
--
ALTER TABLE `tblscore`
  MODIFY `ScoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblstudreport`
--
ALTER TABLE `tblstudreport`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `summaryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
