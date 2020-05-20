-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db_server
-- Generation Time: May 20, 2020 at 01:38 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_username` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_created_at` date DEFAULT NULL,
  `ad_modified_at` date DEFAULT NULL,
  `ad_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`ad_id`, `ad_name`, `ad_username`, `ad_password`, `ad_created_at`, `ad_modified_at`, `ad_email`) VALUES
(1, 'Admin', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2020-05-20', NULL, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `a_id` int(11) NOT NULL,
  `ee_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Applicants`
--

INSERT INTO `Applicants` (`a_id`, `ee_id`, `job_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`cat_name`) VALUES
('Lập trình'),
('Nhân viên văn phòng'),
('Xây dựng');

-- --------------------------------------------------------

--
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_email` varchar(100) DEFAULT NULL,
  `com_scale` char(1) NOT NULL,
  `com_contact_name` varchar(100) NOT NULL,
  `com_contact_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Companies`
--

INSERT INTO `Companies` (`com_id`, `com_name`, `com_address`, `com_email`, `com_scale`, `com_contact_name`, `com_contact_phone`) VALUES
(1, 'Công ty A', 'Q7, HCM', 'ctya@gmail.com', '1', 'Nguyễn Văn A', '0123456788'),
(2, 'Công ty 2', 'Q1, HCM', 'ntd2@gmail.com', '2', 'Nguyễn Văn B', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `ee_id` int(11) NOT NULL,
  `ee_username` varchar(100) NOT NULL,
  `ee_password` varchar(100) NOT NULL,
  `ee_email` varchar(100) NOT NULL,
  `ee_phone_number` varchar(15) NOT NULL,
  `ee_created_at` date DEFAULT NULL,
  `ee_modified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`ee_id`, `ee_username`, `ee_password`, `ee_email`, `ee_phone_number`, `ee_created_at`, `ee_modified_at`) VALUES
(1, 'ntv1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntv1@gmail.com', '0123456789', '2020-05-20', NULL),
(2, 'ntv2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntv2@gmail.com', '0123456788', '2020-05-20', NULL),
(3, 'ntv2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntv2@gmail.com', '0123456788', '2020-05-20', NULL),
(4, 'ntv2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntv2@gmail.com', '0123456788', '2020-05-20', NULL),
(5, 'ntv2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntv2@gmail.com', '0123456788', '2020-05-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Employers`
--

CREATE TABLE `Employers` (
  `er_id` int(11) NOT NULL,
  `er_username` varchar(100) NOT NULL,
  `er_password` varchar(100) NOT NULL,
  `er_email` varchar(100) NOT NULL,
  `er_created_at` date DEFAULT NULL,
  `er_modified_at` date DEFAULT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employers`
--

INSERT INTO `Employers` (`er_id`, `er_username`, `er_password`, `er_email`, `er_created_at`, `er_modified_at`, `com_id`) VALUES
(1, 'ctya', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ctya@gmail.com', '2020-05-20', NULL, 1),
(2, 'ntd2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'ntd2@gmail.com', '2020-05-20', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Files`
--

CREATE TABLE `Files` (
  `ee_birth_date` date DEFAULT NULL,
  `ee_address` varchar(100) DEFAULT NULL,
  `ee_gender` varchar(10) DEFAULT NULL,
  `ee_academic_level` varchar(50) DEFAULT NULL,
  `ee_name` varchar(100) NOT NULL,
  `ee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Files`
--

INSERT INTO `Files` (`ee_birth_date`, `ee_address`, `ee_gender`, `ee_academic_level`, `ee_name`, `ee_id`) VALUES
('2000-01-01', 'Q7, HCM', 'Nam', 'Đại học', 'Sang', 1),
(NULL, NULL, NULL, NULL, 'Người tìm việc 2', 2),
(NULL, NULL, NULL, NULL, 'Người tìm việc 2', 4),
(NULL, NULL, NULL, NULL, 'Người tìm việc 2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `JobCategories`
--

CREATE TABLE `JobCategories` (
  `job_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `JobCategories`
--

INSERT INTO `JobCategories` (`job_id`, `cat_name`) VALUES
(1, 'Lập trình'),
(5, 'Nhân viên văn phòng'),
(6, 'Nhân viên văn phòng');

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_salary` float DEFAULT NULL,
  `job_description` varchar(100) DEFAULT NULL,
  `job_requirement` varchar(100) DEFAULT NULL,
  `job_created_at` date DEFAULT NULL,
  `job_expiry_at` date DEFAULT NULL,
  `job_location` varchar(100) DEFAULT NULL,
  `job_people_num` int(11) DEFAULT NULL,
  `job_type` varchar(10) DEFAULT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`job_id`, `job_title`, `job_salary`, `job_description`, `job_requirement`, `job_created_at`, `job_expiry_at`, `job_location`, `job_people_num`, `job_type`, `com_id`) VALUES
(1, 'Tuyển lập trình viên PHP', 10000000, 'Tạo ra các ứng dụng web thiết thực bằng PHP', 'Kinh nghiệm 1 năm', '2020-05-20', '2020-05-30', 'HCM', 2, 'Part time', 1),
(2, 'Tuyển nhân viên kế toán', 12000000, 'Tính toán, tổng kết, báo cáo các vấn đề tài chính,...', 'Tỉ mỉ, cẩn thận', '2020-05-20', '2020-05-25', NULL, 1, '0', 2),
(3, 'Tuyển nhân viên kế toán', 12000000, 'Tính toán, tổng kết, báo cáo các vấn đề tài chính,...', 'Tỉ mỉ, cẩn thận', '2020-05-20', '2020-05-25', NULL, 1, '0', 2),
(4, 'Tuyển nhân viên kế toán', 12000000, 'Tính toán, tổng kết, báo cáo các vấn đề tài chính,...', 'Tỉ mỉ, cẩn thận', '2020-05-20', '2020-05-25', NULL, 1, '0', 2),
(5, 'Tuyển nhân viên kế toán', 12000000, 'Tính toán, tổng kết, báo cáo các vấn đề tài chính,...', 'Tỉ mỉ, cẩn thận', '2020-05-20', '2020-05-25', 'HCM', 1, '0', 2),
(6, 'Tuyển nhân viên kế toán', 12000000, 'Tính toán, tổng kết, báo cáo các vấn đề tài chính,...', 'Tỉ mỉ, cẩn thận', '2020-05-20', '2020-05-25', 'HCM', 1, '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Responses`
--

CREATE TABLE `Responses` (
  `res_id` int(11) NOT NULL,
  `res_message` varchar(100) NOT NULL,
  `res_time` date DEFAULT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Responses`
--

INSERT INTO `Responses` (`res_id`, `res_message`, `res_time`, `a_id`) VALUES
(1, 'Bạn được nhận', '2020-05-20', 1),
(2, 'Khá tốt đó', '2020-05-20', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `ee_id` (`ee_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cat_name`);
ALTER TABLE `Categories` ADD FULLTEXT KEY `cat_name` (`cat_name`);

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `Employers`
--
ALTER TABLE `Employers`
  ADD PRIMARY KEY (`er_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `Files`
--
ALTER TABLE `Files`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `JobCategories`
--
ALTER TABLE `JobCategories`
  ADD PRIMARY KEY (`job_id`,`cat_name`),
  ADD KEY `cat_name` (`cat_name`);

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `com_id` (`com_id`);
ALTER TABLE `Jobs` ADD FULLTEXT KEY `job_title` (`job_title`,`job_description`);
ALTER TABLE `Jobs` ADD FULLTEXT KEY `job_location` (`job_location`);

--
-- Indexes for table `Responses`
--
ALTER TABLE `Responses`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `a_id` (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Applicants`
--
ALTER TABLE `Applicants`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Companies`
--
ALTER TABLE `Companies`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `ee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Employers`
--
ALTER TABLE `Employers`
  MODIFY `er_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Responses`
--
ALTER TABLE `Responses`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD CONSTRAINT `Applicants_ibfk_1` FOREIGN KEY (`ee_id`) REFERENCES `Employees` (`ee_id`),
  ADD CONSTRAINT `Applicants_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`);

--
-- Constraints for table `Employers`
--
ALTER TABLE `Employers`
  ADD CONSTRAINT `Employers_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `Companies` (`com_id`);

--
-- Constraints for table `Files`
--
ALTER TABLE `Files`
  ADD CONSTRAINT `Files_ibfk_1` FOREIGN KEY (`ee_id`) REFERENCES `Employees` (`ee_id`);

--
-- Constraints for table `JobCategories`
--
ALTER TABLE `JobCategories`
  ADD CONSTRAINT `JobCategories_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`),
  ADD CONSTRAINT `JobCategories_ibfk_2` FOREIGN KEY (`cat_name`) REFERENCES `Categories` (`cat_name`);

--
-- Constraints for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD CONSTRAINT `Jobs_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `Companies` (`com_id`);

--
-- Constraints for table `Responses`
--
ALTER TABLE `Responses`
  ADD CONSTRAINT `Responses_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `Applicants` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
