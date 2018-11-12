-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2015 at 05:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `results`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `middlename` text NOT NULL,
  `surname` text NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(10) NOT NULL,
  `branch_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kt_exam`
--

CREATE TABLE IF NOT EXISTS `kt_exam` (
  `sem_no` int(1) NOT NULL,
  `subject_code` int(10) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `seat_no` int(10) NOT NULL,
  `marks` int(3) NOT NULL,
  `result` text NOT NULL,
  `year` int(4) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kt_subject`
--

CREATE TABLE IF NOT EXISTS `kt_subject` (
  `sem_no` int(1) NOT NULL,
  `subject_code` int(10) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `engg_year` int(10) NOT NULL,
  `sem_no` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`engg_year`, `sem_no`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(100) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `dob` int(4) NOT NULL,
  `doa` varchar(7) NOT NULL,
  `dop` int(4) NOT NULL,
  `branch_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE IF NOT EXISTS `student_exam` (
  `engg_year` int(1) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `sem_no` int(10) NOT NULL,
  `sgp` float(3,2) NOT NULL,
  `result` varchar(10) NOT NULL,
  `exam_year` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_kt`
--

CREATE TABLE IF NOT EXISTS `student_kt` (
  `roll_no` int(10) NOT NULL,
  `sem_no` int(1) NOT NULL,
  `subject_code` int(10) NOT NULL,
  `year_cleared` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE IF NOT EXISTS `student_result` (
  `engg_year` int(1) DEFAULT NULL,
  `sem_no` int(1) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `subject_code` int(10) NOT NULL,
  `seat_no` int(10) NOT NULL,
  `th_marks` int(2) NOT NULL,
  `gr_marks` int(2) NOT NULL,
  `int_marks` int(2) NOT NULL,
  `th_total` int(3) NOT NULL,
  `th_gp` int(1) NOT NULL,
  `tw_marks` int(2) NOT NULL,
  `prac_marks` int(2) NOT NULL,
  `tp_total` int(2) NOT NULL,
  `tp_gp` int(1) NOT NULL,
  `exam_year` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_year`
--

CREATE TABLE IF NOT EXISTS `student_year` (
  `year` varchar(10) NOT NULL,
  `engg_year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_year`
--

INSERT INTO `student_year` (`year`, `engg_year`) VALUES
('FE', 1),
('SE', 2),
('TE', 3),
('BE', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `sem_no` int(1) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(10) NOT NULL,
  `exam_year` varchar(10) NOT NULL,
  `subject_type` varchar(10) NOT NULL,
  `credits` int(1) NOT NULL,
  `theory` int(1) NOT NULL,
  `practical` int(1) NOT NULL,
  `term_work` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sem_no`, `branch_id`, `subject_code`, `subject_name`, `exam_year`, `subject_type`, `credits`, `theory`, `practical`, `term_work`) VALUES
(3, 1, '301', 'Maths', '2013-14', 'regular', 5, 1, 0, 1),
(3, 1, '302', 'OOPM', '2013-14', 'regular', 5, 1, 1, 1),
(3, 1, '303', 'DS', '2013-14', 'regular', 5, 1, 1, 1),
(3, 1, '304', 'DLDA', '2013-14', 'regular', 4, 1, 0, 1),
(3, 1, '305', 'DIS', '2013-14', 'regular', 4, 1, 0, 0),
(3, 1, '306', 'ECCF', '2013-14', 'regular', 5, 1, 1, 1),
(4, 1, '401', 'AM', '2013-14', 'r', 5, 1, 0, 1),
(4, 1, '402', 'AOA', '2013-14', 'r', 5, 1, 1, 1),
(4, 1, '403', 'COA', '2013-14', 'r', 5, 1, 1, 1),
(4, 1, '404', 'DBMS', '2013-14', 'r', 5, 1, 1, 1),
(4, 1, '405', 'TCS', '2013-14', 'r', 5, 1, 0, 0),
(4, 1, '406', 'CG', '2013-14', 'r', 5, 1, 1, 1),
(1, 1, '101', 'MATHS 1', '2012-13', '', 4, 1, 0, 1),
(1, 1, '102', 'PHYSICS 1', '2012-13', '', 3, 1, 0, 1),
(1, 1, '103', 'CHEM 1', '2012-13', '', 3, 1, 0, 1),
(1, 1, '104', 'MECHANICS', '2012-13', '', 5, 1, 1, 1),
(1, 1, '105', 'BEE', '2012-13', '', 4, 1, 1, 1),
(1, 1, '106', 'EVS', '2012-13', '', 2, 1, 0, 0),
(2, 1, '201', 'MATHS 2 ', '2012-13', '', 4, 1, 0, 1),
(2, 1, '202', 'PHYSICS 2', '2012-13', '', 3, 1, 0, 1),
(2, 1, '203', 'CHEMISTRY ', '2012-13', '', 3, 1, 0, 1),
(2, 1, '204', 'ED', '2012-13', '', 3, 1, 1, 1),
(2, 1, '205', 'SPA', '2012-13', '', 4, 1, 1, 1),
(2, 1, '206', 'CS', '2012-13', '', 2, 1, 0, 1),
(5, 1, '501', 'MP', '2014-15', '', 4, 1, 1, 1),
(5, 1, '502', 'OS', '2014-15', '', 3, 1, 1, 1),
(5, 1, '503', 'SOOAD', '2014-15', '', 3, 1, 1, 1),
(5, 1, '504', 'CN', '2014-15', '', 5, 1, 1, 1),
(5, 1, '505', 'WT', '2014-15', '', 4, 0, 0, 1),
(5, 1, '506', 'BCE', '2014-15', '', 2, 0, 0, 1),
(6, 1, '601', 'SPCC', '2014-15', '', 4, 1, 1, 1),
(6, 1, '602', 'SE', '2014-15', '', 3, 1, 1, 1),
(6, 1, '603', 'DDB', '2014-15', '', 3, 1, 1, 1),
(6, 1, '604', 'MCC', '2014-15', '', 3, 1, 1, 1),
(6, 1, '605', 'ELECTIVE -', '2014-15', '', 4, 0, 0, 1),
(6, 1, '606', 'NPL', '2014-15', '', 2, 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
