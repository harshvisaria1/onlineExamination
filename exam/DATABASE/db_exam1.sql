-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 09:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `secNo` int(11) NOT NULL DEFAULT '1',
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `secNo`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 1, 0, 'clean separation of design & content'),
(2, 1, 1, 0, 'minimal code duplication'),
(3, 1, 1, 1, 'Highest priority'),
(4, 1, 1, 0, 'Reduces page download time'),
(5, 1, 2, 0, 'Text-decoration:line-through'),
(6, 1, 2, 1, 'Text-decoration:in-line'),
(7, 1, 2, 0, 'Text-decoration:overline'),
(8, 1, 2, 0, 'Text-decoration:underline'),
(9, 1, 3, 0, 'Cue'),
(10, 1, 3, 0, 'Voice-family'),
(11, 1, 3, 1, 'Load'),
(12, 1, 3, 0, 'Speak'),
(13, 1, 4, 0, 'Class'),
(14, 1, 4, 1, 'Style'),
(15, 1, 4, 0, 'span'),
(16, 1, 4, 0, 'link'),
(17, 1, 5, 0, 'Slow'),
(18, 1, 5, 1, 'Normal'),
(19, 1, 5, 0, 'Fast'),
(20, 1, 5, 0, 'None'),
(66, 2, 1, 1, 'Yes'),
(67, 2, 1, 0, 'No'),
(68, 2, 1, 0, 'Maybe'),
(69, 2, 1, 0, 'Prefer not to say'),
(70, 3, 1, 1, 'fine'),
(71, 3, 1, 0, 'Noice'),
(72, 3, 1, 0, 'Doine'),
(73, 3, 1, 0, 'Shoine'),
(74, 2, 1, 1, 'yes'),
(75, 2, 1, 0, 'no'),
(76, 2, 1, 0, 'maybe'),
(77, 2, 1, 0, 'maybe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `secNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `secNo`, `ques`) VALUES
(1, 1, 1, 'Which of the following does not apply to external styles?'),
(2, 2, 1, 'Which of the following is not a valid text-decoration option?'),
(3, 3, 1, 'Which of the following is not a valid property of an aural style sheet?'),
(4, 4, 1, 'Which element property is required to define internal styles?'),
(5, 5, 1, 'What is the initial value of the marque speed property?'),
(17, 1, 2, 'Is coding easy?'),
(18, 1, 3, 'How you doin?'),
(19, 1, 2, 'Does Harsh have cold?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sec`
--

CREATE TABLE `tbl_sec` (
  `id` int(11) NOT NULL,
  `sec` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sec`
--

INSERT INTO `tbl_sec` (`id`, `sec`, `time`) VALUES
(1, 'Mathematics', 30),
(2, 'DLDA', 20),
(3, 'Chemistry', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(5, 'nayem', 'nayem', '202cb962ac59075b964b07152d234b70', 'nayem@gmail.com', 1),
(6, 'Harry Den', 'harry den', '202cb962ac59075b964b07152d234b70', 'harryden@ourmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sec`
--
ALTER TABLE `tbl_sec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_sec`
--
ALTER TABLE `tbl_sec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
