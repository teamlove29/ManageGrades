-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 07:59 PM
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
('12345', 'วิศวกรรมซอฟต์แวร์ ปี3');

-- --------------------------------------------------------

--
-- Table structure for table `course_tb`
--

CREATE TABLE `course_tb` (
  `Cos_id` int(11) NOT NULL,
  `Cos_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_code` int(11) NOT NULL,
  `ctr_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_tb`
--

INSERT INTO `course_tb` (`Cos_id`, `Cos_term`, `Sub_Code`, `Teach_code`, `Cos_code`, `ctr_number`) VALUES
(85, '1/2562', '5672602', '60122660130', 12345, 2),
(86, '1/2562', '5673602', '60122660130', 12345, 1),
(87, '1/2562', '5673605', '60122660130', 12345, 1);

-- --------------------------------------------------------

--
-- Table structure for table `criteria_tb`
--

CREATE TABLE `criteria_tb` (
  `ctr_id` int(10) NOT NULL,
  `ctr_number` int(10) NOT NULL,
  `ctr_score` varchar(10) COLLATE utf8_unicode_520_ci NOT NULL,
  `ctr_font` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ctr_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `criteria_tb`
--

INSERT INTO `criteria_tb` (`ctr_id`, `ctr_number`, `ctr_score`, `ctr_font`, `ctr_name`) VALUES
(19, 2, '70', 'A', 'A = 70'),
(20, 2, '65', 'B+', 'A = 70'),
(21, 2, '60', 'B', 'A = 70'),
(22, 2, '50', 'C+', 'A = 70'),
(23, 2, '55', 'C', 'A = 70'),
(24, 2, '45', 'D+', 'A = 70'),
(25, 2, '40', 'D', 'A = 70'),
(40, 1, '80', 'A', 'A = 80'),
(41, 1, '75', 'B+', 'A = 80'),
(42, 1, '70', 'B', 'A = 80'),
(43, 1, '60', 'C+', 'A = 80'),
(44, 1, '65', 'C', 'A = 80'),
(45, 1, '55', 'D+', 'A = 80'),
(46, 1, '50', 'D', 'A = 80');

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
(3, '60122660100', '5672202', 20, 'F'),
(4, '60122660100', '5672602', 39, 'F'),
(5, '60122660101', '5672602', 40, 'D'),
(6, '60122660102', '5672602', 46, 'D+');

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
(16, '60122660130', 'MTIzNA==', 2);

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
(8, '61122660100', 12346),
(9, '60122660132', 12345),
(10, '60122660101', 12345),
(11, '60122660102', 12345),
(12, '60122660103', 12345),
(13, '60122660104', 12345),
(14, '60122660105', 12345),
(15, '60122660107', 12345),
(16, '60122660108', 12345),
(17, '60122660109', 12345),
(18, '60122660110', 12345);

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
(1, '60122660134', 'นายนันทวัฒน์ กันทะยอด'),
(3, '60122660100', 'วรวิทย์ ใจคำวัง'),
(4, '60122660111', 'ทดสอบ นะครับ'),
(6, '60122660132', 'นายมารุตเทพ ร่มโพธิ์'),
(8, '60122660101', 'นายกิตติโชติ มุลทะโนช'),
(9, '60122660102', 'นายคณาศักดิ์ จ่าปัน'),
(10, '60122660103', 'นายชนาธิป ปานกลาง'),
(11, '60122660104', 'นางสาวณัฐมล มะวงค์ไวย'),
(12, '60122660105', 'นายธัญญะ เตชะ'),
(13, '60122660107', 'นายบัณฑิตพงษ์ ตาปินตา'),
(14, '60122660108', 'นายปณัทพงศ์ สุปินนะ'),
(15, '60122660109', 'นายพชรดนัย เทพแก้ว'),
(16, '60122660110', 'นางสาวเมรียา ลาดปาละ'),
(17, '60122660111', 'นายยุทธนา แสงจันทร์');

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
(1, '5672602', 'สถาปัตยกรรมซอฟต์แวร์', '3'),
(2, '5673101', 'พีชคณิตเชิงเส้นสำหรับวิศวกรรมซอฟต์แวร์', '3'),
(3, '5673602', 'การประกันคุณภาพในกระบวนการพัฒนาซอฟต์แวร์', '3'),
(4, '5673603', 'การสร้างและการวิวัฒน์ซอฟต์แวร์', '3'),
(5, '5673605', 'การทวนสอบและการทดสอบซอฟต์แวร์', '3'),
(6, '5674901', 'สัมมนาวิศวกรรมซอฟต์แวร์', '3'),
(11, '9011501', 'พลังงานและการอนุรักษ์พลังงาน', '3'),
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
-- Indexes for table `criteria_tb`
--
ALTER TABLE `criteria_tb`
  ADD PRIMARY KEY (`ctr_id`);

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
  MODIFY `Cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `criteria_tb`
--
ALTER TABLE `criteria_tb`
  MODIFY `ctr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `grade_tb`
--
ALTER TABLE `grade_tb`
  MODIFY `grad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_tb`
--
ALTER TABLE `member_tb`
  MODIFY `mb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register_tb`
--
ALTER TABLE `register_tb`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
