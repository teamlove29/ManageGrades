-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 03:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgg`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursename_tb`
--

CREATE TABLE `coursename_tb` (
  `Cos_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cos_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `coursename_tb`
--

INSERT INTO `coursename_tb` (`Cos_code`, `Cos_name`) VALUES
('12345', 'วิศวกรรมซอฟต์แวร์ ปี3'),
('12346', 'วิศวกรรมซอฟต์แวร์ ปี2');

-- --------------------------------------------------------

--
-- Table structure for table `course_tb`
--

CREATE TABLE `course_tb` (
  `Cos_id` int(11) NOT NULL,
  `Cos_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_tb`
--

INSERT INTO `course_tb` (`Cos_id`, `Cos_term`, `Sub_Code`, `Teach_code`, `Cos_code`) VALUES
(82, '1/2562', '5672202', '60122660130', 12345),
(84, '2/2560', '5672101', '60122660130', 12346);

-- --------------------------------------------------------

--
-- Table structure for table `criteria_tb`
--

CREATE TABLE `criteria_tb` (
  `ctr_id` int(11) NOT NULL,
  `ctr_score` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ctr_font` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `criteria_tb`
--

INSERT INTO `criteria_tb` (`ctr_id`, `ctr_score`, `ctr_font`) VALUES
(1, '80', 'A'),
(1, '75', 'B+'),
(1, '70', 'B'),
(1, '65', 'C+'),
(1, '60', 'C'),
(1, '55', 'D+'),
(1, '50', 'D'),
(1, '49', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `grade_tb`
--

CREATE TABLE `grade_tb` (
  `grad_id` int(11) NOT NULL,
  `std_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GPA` int(10) NOT NULL,
  `grade_font` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `grade_tb`
--

INSERT INTO `grade_tb` (`grad_id`, `std_code`, `sub_code`, `GPA`, `grade_font`) VALUES
(1, '60122660115', '5672202', 50, 'D'),
(3, '60122660100', '5672202', 20, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `member_tb`
--

CREATE TABLE `member_tb` (
  `mb_id` int(11) NOT NULL,
  `mb_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mb_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mb_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `member_tb`
--

INSERT INTO `member_tb` (`mb_id`, `mb_user`, `mb_pass`, `mb_type`) VALUES
(1, 'admin', 'YWRtaW4=', 1),
(16, '60122660130', 'MTIzNA==', 2),
(22, '60122660132', 'MTIzNA==', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register_tb`
--

CREATE TABLE `register_tb` (
  `reg_id` int(11) NOT NULL,
  `std_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cos_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `register_tb`
--

INSERT INTO `register_tb` (`reg_id`, `std_code`, `cos_code`) VALUES
(2, '60122660134', 12345),
(3, '60122660100', 12345),
(4, '60122660111', 12345),
(5, '60122660115', 12345),
(6, '', 12346),
(7, '61122660132', 12346),
(8, '61122660100', 12346);

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `std_id` int(11) NOT NULL,
  `std_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `std_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`std_id`, `std_code`, `std_name`) VALUES
(1, '60122660134', 'จู๋เล็ก นิดเดียว'),
(3, '60122660100', 'วรวิทย์ ใจคำวัง'),
(4, '60122660111', 'ทดสอบ นะครับ'),
(5, '60122660115', 'อิคึ อิไต'),
(6, '61122660132', 'กุลชี่เบล งูมันกัดหำมา'),
(7, '61122660100', 'อิไต อิไต');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tb`
--

CREATE TABLE `subject_tb` (
  `Sub_id` int(16) NOT NULL,
  `Sub_code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Credit` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_tb`
--

INSERT INTO `subject_tb` (`Sub_id`, `Sub_code`, `Sub_Name`, `Sub_Credit`) VALUES
(1, '9011103', 'ภาษาอังกฤษเพื่อทักษะการเรียน', '3'),
(2, '9011202', 'สุนทรียภาพของชีวิต', '3'),
(3, '9011403', 'เทคโนโลยีสารสนเทศเพื่อการเรียนรู้', '3'),
(4, '9011204', 'ทักษะการรู้สารสนเทศ', '3'),
(5, '5672202', 'การเขียนโปรแกรมเชิงวัตถุ', '3'),
(6, '5672101', 'คณิตศาสตร์ดิสครีตสำหรับวิศวกรรมซอฟต์แวร์', '3'),
(11, '1234', 'ทดสอบ ทวนสอบ', '3'),
(12, '147258', 'ทดสอบอีกรอบ', '3');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tb`
--

CREATE TABLE `teacher_tb` (
  `tc_id` int(11) NOT NULL,
  `tc_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tc_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tc_idCard` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tc_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tc_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `teacher_tb`
--

INSERT INTO `teacher_tb` (`tc_id`, `tc_code`, `tc_name`, `tc_idCard`, `tc_email`, `tc_date`) VALUES
(1, '60122660132', 'มารุตเทพ ร่มโพธิ์', '1520100104758', 'ScreenAnyWhere@gmail.com', '1994-05-22'),
(10, '60122660130', 'ญาดา ตาเมืองมูล', '1520100104758', 'test@gmail.com', '1994-05-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_tb`
--
ALTER TABLE `course_tb`
  ADD PRIMARY KEY (`Cos_id`);

--
-- Indexes for table `grade_tb`
--
ALTER TABLE `grade_tb`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `member_tb`
--
ALTER TABLE `member_tb`
  ADD PRIMARY KEY (`mb_id`);

--
-- Indexes for table `register_tb`
--
ALTER TABLE `register_tb`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subject_tb`
--
ALTER TABLE `subject_tb`
  ADD PRIMARY KEY (`Sub_id`);

--
-- Indexes for table `teacher_tb`
--
ALTER TABLE `teacher_tb`
  ADD PRIMARY KEY (`tc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_tb`
--
ALTER TABLE `course_tb`
  MODIFY `Cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `grade_tb`
--
ALTER TABLE `grade_tb`
  MODIFY `grad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_tb`
--
ALTER TABLE `member_tb`
  MODIFY `mb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register_tb`
--
ALTER TABLE `register_tb`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_tb`
--
ALTER TABLE `subject_tb`
  MODIFY `Sub_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher_tb`
--
ALTER TABLE `teacher_tb`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
