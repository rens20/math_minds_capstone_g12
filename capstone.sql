-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `easy_questions`
--

CREATE TABLE `easy_questions` (
  `id` int(11) NOT NULL,
  `answer_a` varchar(200) NOT NULL,
  `correct_answer` varchar(200) NOT NULL,
  `answer_b` varchar(200) NOT NULL,
  `answer_c` varchar(255) NOT NULL,
  `answer_d` varchar(250) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `easy_questions`
--

INSERT INTO `easy_questions` (`id`, `answer_a`, `correct_answer`, `answer_b`, `answer_c`, `answer_d`, `question`) VALUES
(1, '0000-00-00', 'A', 'asdgas', 'asgg', 'sgagas', 'dsggdsgsd'),
(3, '0000-00-00', 'A', 'asdgas', 'asgg', 'sgagas', 'dsggdsgsd'),
(4, '0000-00-00', 'B', 'dsgds', 'dgds', 'dgsgds', 'dsggdsgsd'),
(5, 'sfsaf', 'B', 'safsa', 'fsafsa', 'fsafas', 'safsaf'),
(6, 'fsafsa', 'B', 'safsaf', 'fsafsa', 'fsafsafsa', 'sfasfsa'),
(7, 'gdsgdsg', 'A', 'dsgdsg', 'dsgdsg', 'gdds', 'gdsgsd'),
(8, 'gdsgdsgds', 'B', 'gdsgdsg', 'dsgdsg', 'dsgdsg', 'dgdsg'),
(9, 'gdsgdsg', 'A', 'dgdsgdsg', 'gdsgds', 'gdsgdsgdg', 'dsgdsg'),
(10, 'gdsgsdg', 'A', 'dsgdsgds', 'gdsgdsg', 'dsgdsgds', 'dsgdsgdsdd'),
(12, 'safsa', 'B', 'safsa', 'a', 'fs', 'fasfss');

-- --------------------------------------------------------

--
-- Table structure for table `hard_questions`
--

CREATE TABLE `hard_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer_a` varchar(250) NOT NULL,
  `answer_b` varchar(259) NOT NULL,
  `answer_c` varchar(250) NOT NULL,
  `answer_d` varchar(250) NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medium_questions`
--

CREATE TABLE `medium_questions` (
  `id` int(11) NOT NULL,
  `question` int(255) NOT NULL,
  `answer_a` varchar(250) NOT NULL,
  `answer_b` varchar(259) NOT NULL,
  `answer_c` varchar(250) NOT NULL,
  `answer_d` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medium_questions`
--

INSERT INTO `medium_questions` (`id`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`) VALUES
(1, 0, 'safsa', 'safsa', 'fas', 'gdds', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `id` int(11) NOT NULL,
  `score` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`id`, `score`, `name`) VALUES
(5, '<br />\r\n<b>Warning</b>:  Undefined variable $quiz_score in <b>C:\\Users\\CLienT\\Downloads\\capstone-new\\capstone-new\\quiz_result.php</b> on line <b>146</b><br />\r\n', '<br />\r\n<b>Warning</b>:  Undefined variable $user_name in <b>C:\\Users\\CLienT\\Downloads\\capstone-new\\capstone-new\\quiz_result.php</b> on line <b>145</b><br />\r\n'),
(6, '<br />\r\n<b>Warning</b>:  Undefined variable $quiz_score in <b>C:\\Users\\CLienT\\Downloads\\capstone-new\\capstone-new\\quiz_results.php</b> on line <b>146</b><br />\r\n', '<br />\r\n<b>Warning</b>:  Undefined variable $user_name in <b>C:\\Users\\CLienT\\Downloads\\capstone-new\\capstone-new\\quiz_results.php</b> on line <b>145</b><br />\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last` varchar(250) NOT NULL,
  `email` varchar(259) NOT NULL,
  `password` varchar(250) NOT NULL,
  `username` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `name`, `last`, `email`, `password`, `username`, `type`) VALUES
(1, 'test', 'wasie', 'test@gmail.com', 'test', 'test', 'admin'),
(2, 'ssss', 'wasie', 'wasie@gmail.com', 'fwfwq', 'admin', 'user'),
(3, 'ssss', 'wasie', 'wasie@gmail.com', 'fwfwq', 'admin', 'user'),
(4, 'fasfas', 'wasie', 'wasie@gmail.com', 'fwfwq', 'admin', 'user'),
(5, 'sfafas', 'wasie', 'dsgdsg@gmail.com', 'sfsaf', 'fsafsa', 'user'),
(6, 'dgd', 'wasie', 'anajane1127@gmail.com', 'fwfwq', 'admin', 'user'),
(7, 'ggg', 'wasie', 'wasie@gmail.com', 'ggg', 'ggg', 'user'),
(8, 'ss', 'wasie', 'wasie@gmail.com', 'ggg', 'ggg', 'user'),
(9, 'sss', 'wasie', 'cc@gamil.com', 'fwfwq', 'wasieacuna@gmail.com', 'user'),
(10, 'sfas', 'wasie', 'anajane1127@gmail.com', 'fwfwq', 'record', 'user'),
(11, 'dgg', 'wasie', 'dsgdsg@gmail.com', 'fwfwq', 'admin', 'user'),
(12, 'sqq', 'rens', 'anajane1127@gmail.com', 'fwfwq', 'admin', 'user'),
(13, 'ggg', 'rens', 'dsgdsg@gmail.com', 'fwfwq', 'admin', 'user'),
(14, 'dgd', 'rens', 'dsgdsg@gmail.com', 'fwfwq', 'admin', 'user'),
(15, 'sss', 'rens', 'anajane1127@gmail.com', 'ggg', 'admin', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `easy_questions`
--
ALTER TABLE `easy_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium_questions`
--
ALTER TABLE `medium_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `easy_questions`
--
ALTER TABLE `easy_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medium_questions`
--
ALTER TABLE `medium_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
