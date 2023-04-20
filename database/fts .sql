-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 07:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fts`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `complaint_name` varchar(255) NOT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `complaint_description` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `response` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `user_id`, `complaint_name`, `complaint_type`, `complaint_description`, `date_created`, `response`) VALUES
(0, 0, 'Response', 'Customer Care', 'How can i reach you', '2023-04-18', ''),
(5, 0, 'Connection', 'Technical issues', 'Problem logging in', '2023-04-17', 'Check your internet connection'),
(6, 0, 'Quiz', 'Accessibility', 'unable to access the quizzes', '2023-04-17', 'Please be patient, the quizzes will be available soon'),
(7, 0, 'modules', 'Technical issues', 'some modules are unavailable', '2023-04-17', 'Our team will get back to your shortly');

-- --------------------------------------------------------

--
-- Table structure for table `complaintstatus`
--

CREATE TABLE `complaintstatus` (
  `status_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `complaint_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `module_description` varchar(255) NOT NULL,
  `module_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `module_description`, `module_file`) VALUES
(1145, 'Others', 'Please add more notes on first aid', 'uploads/Answering Questions.docx'),
(1253, 'CPR', 'This study module deals majorly with CPR', ''),
(2255, 'Burns', 'burns handling procedures', 'uploads/2.pdf'),
(2341, 'Others', 'Please add more notes on first aid', 'uploads/Answering Questions.docx'),
(2354, 'Bleeding', 'How to deal with any kind of bleeding', ''),
(3255, 'Choking', 'how to deal with choking', ''),
(3341, 'Others', 'Please add more notes on first aid', 'uploads/Answering Questions.docx'),
(4321, 'Drowning', 'This gives guidelines on how to deal with drowning accidents', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `quiz_question` text NOT NULL,
  `quiz_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercomplaints`
--

CREATE TABLE `usercomplaints` (
  `ID` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `complaint_name` varchar(255) NOT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `complainte_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `ID` int(11) NOT NULL,
  `RegNum` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ConfirmPassword` varchar(255) NOT NULL,
  `Gender` enum('M','F','O','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`ID`, `RegNum`, `FirstName`, `MiddleName`, `LastName`, `Email`, `ConfirmPassword`, `Gender`) VALUES
(1, 'CIT/00105/019', 'Paul', 'Kavianga', 'Kithuku', 'paulkithuku137@gmail.com', '44e2134836aa2ab83abe0c5e8c8abea5', 'M'),
(2, 'CIT/00168/019', 'Clinton', 'Odhiambo', 'Omwanda', 'clintonomwanda@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `complaintstatus`
--
ALTER TABLE `complaintstatus`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `usercomplaints`
--
ALTER TABLE `usercomplaints`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `complaint_id` (`complaint_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
