-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2023 at 12:31 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algo_results`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_photo` varchar(250) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_photo`) VALUES
(1, 'Albedo', 'albedo@gmail.com', 'Abc123', 'wp12159288-ceruledge-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

DROP TABLE IF EXISTS `tbl_assign`;
CREATE TABLE IF NOT EXISTS `tbl_assign` (
  `assign_id` int NOT NULL AUTO_INCREMENT,
  `programme_id` int NOT NULL,
  `courses_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`assign_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`assign_id`, `programme_id`, `courses_id`, `teacher_id`) VALUES
(6, 1, 12, 14),
(7, 1, 11, 17),
(8, 1, 13, 14),
(9, 1, 14, 16),
(10, 1, 15, 16),
(11, 1, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

DROP TABLE IF EXISTS `tbl_complaints`;
CREATE TABLE IF NOT EXISTS `tbl_complaints` (
  `complaint_id` int NOT NULL AUTO_INCREMENT,
  `complaint_name` varchar(250) NOT NULL,
  `complaint_email` varchar(50) NOT NULL,
  `complaint_title` varchar(250) NOT NULL,
  `complaint_message` varchar(350) NOT NULL,
  `complaint_date` varchar(250) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`complaint_id`, `complaint_name`, `complaint_email`, `complaint_title`, `complaint_message`, `complaint_date`) VALUES
(23, 'FASFDS', 'FFSD@GFDAF', 'fffffffffffff', 'eeeeeeeeeeeeee', '2023-10-30 12:19:43 AM'),
(22, 'GDF', 'FASDFSD@FD', 'gfds', 'gfdgf', '2023-10-30 12:17:52 AM'),
(21, 'FDAS', 'fasdf@gfdas', 'VFDGD', 'FDSAG', '2023-10-30 12:12:26 AM'),
(20, 'Achan', 'achan@gmail.com', 'About', 'Nice', '2023-10-29 11:25:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

DROP TABLE IF EXISTS `tbl_courses`;
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `courses_id` int NOT NULL AUTO_INCREMENT,
  `programme_id` int NOT NULL,
  `semester_id` int NOT NULL,
  `courses_code` varchar(50) NOT NULL,
  `courses_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `credits` int NOT NULL,
  PRIMARY KEY (`courses_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`courses_id`, `programme_id`, `semester_id`, `courses_code`, `courses_name`, `credits`) VALUES
(12, 1, 1, 'CA1811101', 'Computer Fundamentals and Digital Principles', 4),
(11, 1, 1, 'EN1811501', 'Fine-tune Your English', 4),
(13, 1, 1, 'CA1811102', 'Methodology of Programming and C Language', 3),
(14, 1, 1, 'CA1811601', 'Software Lab I', 2),
(15, 1, 1, 'MT1811202', 'Discrete Mathematics -I', 4),
(16, 1, 1, 'ST1811202', 'Basic Statistics and Introductory Probability Theory', 4),
(17, 1, 2, 'EN1812503', 'Issues that Matter', 4),
(18, 1, 2, 'CA1812103', 'Data Base Management Systems', 3),
(19, 1, 2, 'CA1812104', 'Computer Organization and Architecture', 4),
(20, 1, 2, 'CA1812105', 'Object Oriented Programming using C++', 4),
(21, 1, 2, 'CA1812602', 'Software Lab -II', 2),
(22, 1, 2, 'MT1812204', 'Discrete Mathematics -II', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

DROP TABLE IF EXISTS `tbl_exam`;
CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `exam_id` int NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(250) NOT NULL,
  `exam_status` int NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `exam_name`, `exam_status`) VALUES
(5, 'FIRST SEMESTER CBCS EXAMINATION JANUARY 2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_mark`
--

DROP TABLE IF EXISTS `tbl_exam_mark`;
CREATE TABLE IF NOT EXISTS `tbl_exam_mark` (
  `mark_id` int NOT NULL AUTO_INCREMENT,
  `courses_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `student_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `external_mark` int NOT NULL,
  `internal_mark` int NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_exam_mark`
--

INSERT INTO `tbl_exam_mark` (`mark_id`, `courses_id`, `teacher_id`, `student_id`, `exam_id`, `external_mark`, `internal_mark`) VALUES
(1, 12, 14, 2, 5, 80, 20),
(2, 12, 14, 4, 5, 79, 19),
(3, 13, 14, 4, 5, 78, 19),
(4, 12, 14, 5, 5, 15, 5),
(5, 13, 14, 5, 5, 21, 7),
(6, 13, 14, 2, 5, 70, 15),
(7, 14, 16, 4, 5, 79, 20),
(8, 15, 16, 4, 5, 79, 20),
(9, 14, 16, 5, 5, 55, 12),
(10, 15, 16, 5, 5, 40, 15),
(11, 11, 17, 4, 5, 78, 20),
(12, 11, 17, 5, 5, 57, 15),
(13, 16, 17, 4, 5, 79, 20),
(14, 16, 17, 5, 5, 66, 17),
(18, 11, 17, 2, 5, 76, 18),
(19, 16, 17, 2, 5, 75, 20),
(20, 14, 16, 2, 5, 79, 19),
(21, 15, 16, 2, 5, 75, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_status`
--

DROP TABLE IF EXISTS `tbl_exam_status`;
CREATE TABLE IF NOT EXISTS `tbl_exam_status` (
  `exam_id` int NOT NULL,
  `student_id` int NOT NULL,
  `result_status` int NOT NULL,
  PRIMARY KEY (`exam_id`,`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_exam_status`
--

INSERT INTO `tbl_exam_status` (`exam_id`, `student_id`, `result_status`) VALUES
(5, 5, -1),
(5, 4, 0),
(5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent`
--

DROP TABLE IF EXISTS `tbl_parent`;
CREATE TABLE IF NOT EXISTS `tbl_parent` (
  `parent_id` int NOT NULL AUTO_INCREMENT,
  `parent_email` varchar(50) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_contact` bigint NOT NULL,
  `parent_password` varchar(50) NOT NULL,
  `parent_photo` varchar(250) NOT NULL,
  PRIMARY KEY (`parent_id`),
  UNIQUE KEY `parent_email` (`parent_email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_parent`
--

INSERT INTO `tbl_parent` (`parent_id`, `parent_email`, `parent_name`, `parent_contact`, `parent_password`, `parent_photo`) VALUES
(2, 'amma@yahoo.com', 'Amma', 9645236234, 'Parent123', '1165487.jpg'),
(3, 'achan@gmail.com', 'Achan', 9535634634, 'Parent123', '545909.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programme`
--

DROP TABLE IF EXISTS `tbl_programme`;
CREATE TABLE IF NOT EXISTS `tbl_programme` (
  `programme_id` int NOT NULL AUTO_INCREMENT,
  `programme_name` varchar(50) NOT NULL,
  PRIMARY KEY (`programme_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_programme`
--

INSERT INTO `tbl_programme` (`programme_id`, `programme_name`) VALUES
(1, 'BCA'),
(2, 'BCOM'),
(3, 'BTTM'),
(5, 'Data Science'),
(7, 'B A Comm. Eng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sem`
--

DROP TABLE IF EXISTS `tbl_sem`;
CREATE TABLE IF NOT EXISTS `tbl_sem` (
  `sem_id` int NOT NULL,
  `sem_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sem`
--

INSERT INTO `tbl_sem` (`sem_id`, `sem_name`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII'),
(9, 'IX'),
(10, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

DROP TABLE IF EXISTS `tbl_semester`;
CREATE TABLE IF NOT EXISTS `tbl_semester` (
  `semester_id` int NOT NULL AUTO_INCREMENT,
  `programme_id` int NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semester_id`, `programme_id`, `semester_name`) VALUES
(14, 5, '1'),
(15, 1, '1'),
(16, 1, '2'),
(17, 1, '3'),
(18, 1, '4'),
(19, 2, '1'),
(20, 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `student_admno` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `student_dob` date NOT NULL,
  `student_contact` bigint NOT NULL,
  `student_photo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `programme_id` int NOT NULL,
  `parent_id` int NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_admno`, `student_name`, `student_email`, `student_password`, `student_dob`, `student_contact`, `student_photo`, `programme_id`, `parent_id`) VALUES
(2, 'SA4199', 'Elsa', 'elsa@gmail.com', 'Student123', '2004-11-11', 9856347571, '74790436_p0_master1200.jpg', 1, 2),
(4, 'SA4177', 'Alice', 'alice@gmail.com', 'Student123', '2003-10-01', 7456473456, '844601.png', 1, 3),
(5, 'SA4273', 'Eva', 'eva@gmail.com', 'Student123', '2000-01-01', 9864372576, 'wp6251358-red-and-black-anime-wallpapers.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(50) NOT NULL DEFAULT 'teacher123',
  `teacher_contact` bigint NOT NULL,
  `teacher_photo` varchar(250) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_email` (`teacher_email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_contact`, `teacher_photo`) VALUES
(14, 'Rose', 'rose@gmail.com', 'Teacher123', 7852446234, '902409.png'),
(16, 'William', 'william@gmail.com', 'Teacher123', 9842523542, 'n2pACus-absol-wallpaper.jpg'),
(17, 'Harry', 'harry@yahoo.com', 'Teacher123', 7958243953, 'wallpaperflare.com_wallpaper(21).jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
