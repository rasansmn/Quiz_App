-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2016 at 06:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizdb`
--
CREATE DATABASE IF NOT EXISTS `quizdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quizdb`;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
`adminid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `tblquiz`
--

DROP TABLE IF EXISTS `tblquiz`;
CREATE TABLE IF NOT EXISTS `tblquiz` (
`qid` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `opt1` varchar(250) NOT NULL,
  `opt2` varchar(250) NOT NULL,
  `opt3` varchar(250) NOT NULL,
  `opt4` varchar(250) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquiz`
--

INSERT INTO `tblquiz` (`qid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`) VALUES
(1, 'Who is the author of "Tom Sawyer"?', 'Bertrand Russell', 'Mark Twain', 'Johanna Spyri', 'Isaac Asimov', 2),
(2, 'This is question two?', 'First answer for question two.', 'Second answer for question two.', 'Third answer for question two.', 'Fourth answer for question two.', 3),
(3, 'This is question three?', 'First answer for question three.', 'Second answer for question three.', 'Third answer for question three.', 'Fourth answer for question three.', 4),
(4, 'This is question four?', 'First answer for question four.', 'Second answer for question four.', 'Third answer for question four.', 'Fourth answer for question four.', 4),
(5, 'This is question five?', 'First answer for question five.', 'Second answer for question five.', 'Third answer for question five.', 'Fourth answer for question five.', 2),
(6, 'This is question six?', 'First answer for question six.', 'Second answer for question six.', 'Third answer for question six.', 'Fourth answer for question six.', 1),
(7, 'This is question seven?', 'First answer for question seven.', 'Second answer for question seven.', 'Third answer for question seven.', 'Fourth answer for question seven.', 4),
(8, 'This is question eight?', 'First answer for question eight.', 'Second answer for question eight.', 'Third answer for question eight.', 'Fourth answer for question eight.', 3),
(9, 'This is question nine?', 'First answer for question nine.', 'Second answer for question nine.', 'Third answer for question nine.', 'Fourth answer for question nine.', 1),
(10, 'This is question ten?', 'First answer for question ten.', 'Second answer for question ten.', 'Third answer for question ten.', 'Fourth answer for question ten.', 2),
(11, 'This is question eleven?', 'First answer for question eleven.', 'Second answer for question eleven.', 'Third answer for question eleven.', 'Fourth answer for question eleven.', 4),
(12, 'This is question twelve?', 'First answer for question twelve.', 'Second answer for question twelve.', 'Third answer for question twelve.', 'Fourth answer for question twelve.', 3),
(13, 'This is question thirteen?', 'First answer for question thirteen.', 'Second answer for question thirteen.', 'Third answer for question thirteen.', 'Fourth answer for question thirteen.', 1),
(14, 'This is question fourteen?', 'First answer for question fourteen.', 'Second answer for question fourteen.', 'Third answer for question fourteen.', 'Fourth answer for question fourteen.', 4),
(15, 'This is question fifteen?', 'First answer for question fifteen.', 'Second answer for question fifteen.', 'Third answer for question fifteen.', 'Fourth answer for question fifteen.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblscore`
--

DROP TABLE IF EXISTS `tblscore`;
CREATE TABLE IF NOT EXISTS `tblscore` (
`attemptid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblscore`
--

INSERT INTO `tblscore` (`attemptid`, `score`, `total`, `uid`) VALUES
(35, 5, 15, 13),
(36, 3, 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
`uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `email`) VALUES
(13, 'user@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tblquiz`
--
ALTER TABLE `tblquiz`
 ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tblscore`
--
ALTER TABLE `tblscore`
 ADD PRIMARY KEY (`attemptid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblquiz`
--
ALTER TABLE `tblquiz`
MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tblscore`
--
ALTER TABLE `tblscore`
MODIFY `attemptid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
