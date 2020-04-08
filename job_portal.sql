-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db_server
-- Generation Time: Apr 08, 2020 at 01:20 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
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
  `ad_email` varchar(100) NOT NULL,
  `ad_created_at` date NOT NULL,
  `ad_modified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`ad_id`, `ad_name`, `ad_username`, `ad_password`, `ad_email`, `ad_created_at`, `ad_modified_at`) VALUES
(1, 'Administrator', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin@gmail.com', '2020-03-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `a_id` int(11) NOT NULL,
  `ee_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `er_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Applicants`
--

INSERT INTO `Applicants` (`a_id`, `ee_id`, `job_id`, `er_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`cat_id`, `cat_name`) VALUES
(1, 'PHP'),
(2, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_phone_number` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Companies`
--

INSERT INTO `Companies` (`com_id`, `com_name`, `com_address`, `com_phone_number`) VALUES
(1, 'Công ty A', 'Quận 7, tp.HCM', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `ee_id` int(11) NOT NULL,
  `ee_name` varchar(100) NOT NULL,
  `ee_username` varchar(100) NOT NULL,
  `ee_password` varchar(100) NOT NULL,
  `ee_email` varchar(100) NOT NULL,
  `ee_gender` varchar(3) NOT NULL,
  `ee_address` varchar(100) NOT NULL,
  `ee_current_occupation` varchar(50) DEFAULT NULL,
  `ee_phone_number` char(15) NOT NULL,
  `ee_avatar_path` char(100) NOT NULL,
  `ee_experience` varchar(100) NOT NULL,
  `ee_cv_path` varchar(100) DEFAULT NULL,
  `ee_created_at` date NOT NULL,
  `ee_modified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`ee_id`, `ee_name`, `ee_username`, `ee_password`, `ee_email`, `ee_gender`, `ee_address`, `ee_current_occupation`, `ee_phone_number`, `ee_avatar_path`, `ee_experience`, `ee_cv_path`, `ee_created_at`, `ee_modified_at`) VALUES
(1, 'Nguyễn Văn A', 'nva', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'nva@gmail.com', 'Nam', 'Xã A, huyện B, tỉnh C', 'Sinh Viên', '0123456787', 'avatar/employees/1.jpg', 'Không có', 'cv/1.docx', '2020-03-23', NULL),
(2, 'Test Employee 2', 'em2', 'abcd1234', 'em2@gmail.com', 'Nam', 'Khong biet', 'Dev', '0123456781', 'avatar/employees/1.jpg', 'Chua co', 'cv/1.docx', '2020-03-25', NULL),
(3, 'Test Employee 2', 'em2', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'em2@gmail.com', 'Nam', 'Khong biet', 'Dev', '0123456781', 'avatar/employees/1.jpg', 'Chua co', 'cv/1.docx', '2020-03-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Employers`
--

CREATE TABLE `Employers` (
  `er_id` int(11) NOT NULL,
  `er_name` varchar(100) NOT NULL,
  `er_gender` varchar(3) NOT NULL,
  `er_username` varchar(100) NOT NULL,
  `er_password` varchar(100) NOT NULL,
  `er_email` varchar(100) NOT NULL,
  `er_phone_number` char(15) NOT NULL,
  `er_address` varchar(100) NOT NULL,
  `er_avatar_path` varchar(100) NOT NULL,
  `er_created_at` date NOT NULL,
  `er_modified_at` date DEFAULT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employers`
--

INSERT INTO `Employers` (`er_id`, `er_name`, `er_gender`, `er_username`, `er_password`, `er_email`, `er_phone_number`, `er_address`, `er_avatar_path`, `er_created_at`, `er_modified_at`, `com_id`) VALUES
(1, 'Nguyễn Thị B', 'Nữ', 'ntb', '7ce0359f12857f2a90c7de465f40a95f01cb5da9', 'ntb@gmail.com', '0123456787', 'phường Tân Phong', 'avatar/employers/1.jpg', '2020-03-23', NULL, 1),
(2, 'Test Employer 1', 'Nam', 'er1', 'abcd1234', 'er1@gmail.com', '0123456780', 'Khong biet', 'avatar/employers/2.jpg', '2020-03-23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_type` char(10) NOT NULL,
  `job_salary` float NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `job_requirement` varchar(100) NOT NULL,
  `job_work_address` varchar(100) NOT NULL,
  `job_created_at` date NOT NULL,
  `job_expiry_at` date DEFAULT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`job_id`, `job_title`, `job_type`, `job_salary`, `job_description`, `job_requirement`, `job_work_address`, `job_created_at`, `job_expiry_at`, `com_id`) VALUES
(1, 'Tuyen dev PHP', 'full', 10000000, 'Tuyen dev PHP', 'Kinh nghiem 1 nam', 'TP. HCM', '2020-03-23', '2020-04-23', 1),
(2, 'Tuyen dev Java', 'full', 15000000, 'Tuyen dev Java', 'Moi ra truong', 'TP. HCM', '2020-03-25', '2020-03-30', 1),
(3, 'Tuyen dev Java', 'full', 15000000, 'Tuyen dev Java', 'Moi ra truong', 'TP. HCM', '2020-03-25', '2020-03-30', 1),
(4, 'Tuyen dev Java', 'full', 15000000, 'Tuyen dev Java', 'Moi ra truong', 'TP. HCM', '2020-03-25', '2020-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `JobsWithCategories`
--

CREATE TABLE `JobsWithCategories` (
  `jc_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `JobsWithCategories`
--

INSERT INTO `JobsWithCategories` (`jc_id`, `job_id`, `cat_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Responses`
--

CREATE TABLE `Responses` (
  `res_id` int(11) NOT NULL,
  `res_message` varchar(100) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Responses`
--

INSERT INTO `Responses` (`res_id`, `res_message`, `a_id`) VALUES
(1, 'Ban duoc nhan', 1);

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
  ADD KEY `job_id` (`job_id`),
  ADD KEY `er_id` (`er_id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cat_id`);
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
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `com_id` (`com_id`);
ALTER TABLE `Jobs` ADD FULLTEXT KEY `job_title` (`job_title`,`job_description`);
ALTER TABLE `Jobs` ADD FULLTEXT KEY `job_work_address` (`job_work_address`);

--
-- Indexes for table `JobsWithCategories`
--
ALTER TABLE `JobsWithCategories`
  ADD PRIMARY KEY (`jc_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `cat_id` (`cat_id`);

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
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Companies`
--
ALTER TABLE `Companies`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `ee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Employers`
--
ALTER TABLE `Employers`
  MODIFY `er_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `JobsWithCategories`
--
ALTER TABLE `JobsWithCategories`
  MODIFY `jc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Responses`
--
ALTER TABLE `Responses`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD CONSTRAINT `Applicants_ibfk_1` FOREIGN KEY (`ee_id`) REFERENCES `Employees` (`ee_id`),
  ADD CONSTRAINT `Applicants_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`),
  ADD CONSTRAINT `Applicants_ibfk_3` FOREIGN KEY (`er_id`) REFERENCES `Employers` (`er_id`);

--
-- Constraints for table `Employers`
--
ALTER TABLE `Employers`
  ADD CONSTRAINT `Employers_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `Companies` (`com_id`);

--
-- Constraints for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD CONSTRAINT `Jobs_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `Companies` (`com_id`);

--
-- Constraints for table `JobsWithCategories`
--
ALTER TABLE `JobsWithCategories`
  ADD CONSTRAINT `JobsWithCategories_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`),
  ADD CONSTRAINT `JobsWithCategories_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `Categories` (`cat_id`);

--
-- Constraints for table `Responses`
--
ALTER TABLE `Responses`
  ADD CONSTRAINT `Responses_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `Applicants` (`a_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
