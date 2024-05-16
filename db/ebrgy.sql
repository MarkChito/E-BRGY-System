-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 09:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebrgy`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `activity` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
);

--
-- Dumping data for table `activity_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `what` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `who` varchar(50) DEFAULT NULL,
  `docs` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active'
);

--
-- Dumping data for table `announcement`
--
-- --------------------------------------------------------

--
-- Table structure for table `barangay_info`
--

CREATE TABLE `barangay_info` (
  `id` int(11) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `town` text DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `purok` varchar(20) DEFAULT NULL,
  `background` text DEFAULT NULL,
  `starts` varchar(20) DEFAULT NULL,
  `end` varchar(20) DEFAULT NULL,
  `dashboard_text` text DEFAULT NULL,
  `dashboard_img` text DEFAULT NULL,
  `city_logo` text DEFAULT NULL,
  `brgy_logo` text DEFAULT NULL,
  `map` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_info`
--

INSERT INTO `barangay_info` (`id`, `province`, `town`, `brgy_name`, `number`, `email`, `street`, `purok`, `background`, `starts`, `end`, `dashboard_text`, `dashboard_img`, `city_logo`, `brgy_logo`, `map`) VALUES
(1, 'Manila', '', 'Caloocan City', '09217105653/09957747447', 'caloocan.barangay183@gmail.com', 'Midway Park subd.', 'Distrcit 3 Zone 16', 'Wala lang', '1980', '2025', 'to', '1c45a1a0a0b13849da4542c0ab89c75f.jpg', '1cf26f469d7bc38a122752de5140cc8a.png', '5c06dcb4aa34aa402c3ae8bd98d4aeef.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE `block_user` (
  `blocked_from` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `blocked_to` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `case_no` varchar(100) NOT NULL,
  `respondent` varchar(100) NOT NULL,
  `victim` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `incident_date` datetime NOT NULL,
  `details` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL
);

--
-- Dumping data for table `blotter`
--
-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`ID`, `title`, `start`, `end`, `description`) VALUES
(1, 'Samsung', '2021-09-30 08:50:00', '2021-10-01 19:48:00', 'fdsfsdfdsfds');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `pic` text DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `salutation` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cert_settings`
--

CREATE TABLE `cert_settings` (
  `id` int(11) NOT NULL,
  `flag` text DEFAULT NULL,
  `motto` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `watermark` text DEFAULT NULL,
  `color_bg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cert_settings`
--

INSERT INTO `cert_settings` (`id`, `flag`, `motto`, `signature`, `watermark`, `color_bg`) VALUES
(1, 'c7c4297166e2c5e3715032b5e44c8349.png', 'e7c732cb3a6819d9cac0378db51942b6.png', 'signature.png', 'c545b0b8698dfc6738a5c81cbb2f595f.png', 'transparent');

-- --------------------------------------------------------

--
-- Table structure for table `chairmanship`
--

CREATE TABLE `chairmanship` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chairmanship`
--

INSERT INTO `chairmanship` (`id`, `title`) VALUES
(1, 'PRESIDING OFFICER'),
(3, 'COMMITTEE ON HEALTH'),
(4, 'COMMITTEE ON APPROPRIATION'),
(5, 'COMMITTEE ON ENVIRONMENT'),
(6, 'COMMITTEE ON PEACE AND ORDER'),
(7, 'COMMITTEE ON EDUCATION'),
(8, 'COMMITTEE ON INFRASTRUCTURE'),
(9, 'COMMITTEE ON YOUTH DEVELOPMENT'),
(10, 'COMMITTEE ON GAD'),
(11, 'COMMITTEE ON AGRICULTURE'),
(12, 'COMMITTEE ON BAC'),
(13, 'COMMITTEE ON WAYS AND MEANS'),
(14, 'COMMITTEE ON VAW-C'),
(15, 'COMMITTEE ON SPORTS'),
(16, 'COMMITTEE ON APPROPRIATION / YOUTH DEVELOPMENT'),
(17, 'COMMITTEE ON HEALTH / SPORTS'),
(18, 'COMMITTEE ON INFRASTRUCTURE / BAC / WAYS AND MEANS'),
(19, 'COMMITTEE ON PEACE AND ORDER / SPORTS'),
(20, 'COMMITTEE ON VAW-C / COMMITTEE ON EDUCATION'),
(21, 'COMMITTEE ON ENVIRONMENT / GAD'),
(22, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `complainants`
--

CREATE TABLE `complainants` (
  `case_no` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `national_id` varchar(50) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complainants`
--

INSERT INTO `complainants` (`case_no`, `name`, `national_id`, `number`, `gender`, `age`, `remarks`, `address`) VALUES
('2022-0001', 'ad ad', '', '09122789468', 'Male', '31', '', 'mayapa'),
('2', 'ANGLE', '54557854', '092222222', 'Female', '22', 'DI NAGBAYAD NG UTANG', 'CALAMBA CITY'),
('3', 'MARJORIE CLEOFAS', '5787545', '65566', 'Female', '22', 'MANININGIL', 'CALAMBA'),
('3', 'MARJORIE CLEOFAS', '5787545', '65566', 'Female', '22', 'MANININGIL', 'CALAMBA'),
('2022-0001', 'ad ad', '', '09122789468', 'Male', '31', '', 'mayapa'),
('2', 'ANGLE', '54557854', '092222222', 'Female', '22', 'DI NAGBAYAD NG UTANG', 'CALAMBA CITY'),
('3', 'MARJORIE CLEOFAS', '5787545', '65566', 'Female', '22', 'MANININGIL', 'CALAMBA'),
('3', 'MARJORIE CLEOFAS', '5787545', '65566', 'Female', '22', 'MANININGIL', 'CALAMBA');

-- --------------------------------------------------------

--
-- Table structure for table `covid_status`
--

CREATE TABLE `covid_status` (
  `resident_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_vaccinated` date DEFAULT NULL,
  `vaccinator_name` text DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `batch_no` varchar(100) DEFAULT NULL,
  `lot_no` varchar(100) DEFAULT NULL,
  `date_vaccinated_1` date DEFAULT NULL,
  `vaccinator_name_1` varchar(100) DEFAULT NULL,
  `manufacturer_1` text DEFAULT NULL,
  `batch_no_1` varchar(100) DEFAULT NULL,
  `lot_no_1` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid_status`
--

INSERT INTO `covid_status` (`resident_id`, `status`, `date_vaccinated`, `vaccinator_name`, `manufacturer`, `batch_no`, `lot_no`, `date_vaccinated_1`, `vaccinator_name_1`, `manufacturer_1`, `batch_no_1`, `lot_no_1`, `remarks`) VALUES
(3, 'Negative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Negative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Positive', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(3, 'Negative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Negative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Positive', '0000-00-00', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(6, 'Negative', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `house_number`
--

CREATE TABLE `house_number` (
  `id` int(11) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_number`
--

INSERT INTO `house_number` (`id`, `number`, `info`) VALUES
(4853, '0001-a', 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `id_settings`
--

CREATE TABLE `id_settings` (
  `id` int(11) NOT NULL,
  `front` text DEFAULT NULL,
  `back` text DEFAULT NULL,
  `bg_color` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id_settings`
--

INSERT INTO `id_settings` (`id`, `front`, `back`, `bg_color`) VALUES
(1, 'aab0223983f6cd4a924fac2f130538cc.png', 'ee4568489d0a6cfd234d80ae99ca8fb0.png', 'transparent');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `chairmanship` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `avatar` text DEFAULT NULL
);

--
-- Dumping data for table `officials`
--
-- --------------------------------------------------------

--
-- Table structure for table `other_details`
--

CREATE TABLE `other_details` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `sss` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `precinct` varchar(50) DEFAULT NULL,
  `gsis` varchar(50) DEFAULT NULL,
  `pagibig` varchar(50) DEFAULT NULL,
  `philhealth` varchar(50) DEFAULT NULL,
  `blood` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_details`
--

INSERT INTO `other_details` (`id`, `resident_id`, `sss`, `tin`, `precinct`, `gsis`, `pagibig`, `philhealth`, `blood`) VALUES
(3, 3, '', '', 'Pag-asa-001', '', '', '', '0'),
(4, 4, '', '', NULL, '', '', '', ''),
(5, 5, '', '', NULL, '', '', '', ''),
(6, 6, '', '', NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `details` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `details`, `purpose`, `amount`, `user`, `recipient`, `created_at`) VALUES
(9, 'C E R T I F I C A T I O N Payment', NULL, '500.00', 'admin', NULL, '2022-06-27'),
(14, 'SAMPLE CERTIFICATION Payment', NULL, '250.00', 'admin', NULL, '2022-07-14'),
(15, 'SAMPLE CERTIFICATION Payment', NULL, '305.00', 'staff', NULL, '2022-07-14'),
(16, 'Resident Barangay ID Payment', 'Barangay ID', '20.00', 'staff', 'Alpha Charlie', '2022-07-14'),
(18, 'SAMPLE CERTIFICATION Payment', NULL, '20.00', 'admin', NULL, '2022-07-14'),
(20, 'Sample Certificate Payment', NULL, '250.00', 'admin', NULL, '2022-07-15'),
(21, 'SAMPLE CERTIFICATE Payment', NULL, '200.00', 'admin', NULL, '2022-07-27'),
(25, 'Resident Barangay ID Payment', 'Barangay ID', '200.00', 'admin', 'Alpha Charlie', '2022-07-27'),
(26, 'Barangay Clearance Payment', NULL, '500.00', 'admin', 'Alpha Beta Charlie', '2022-07-28'),
(27, 'SAMPLE CERTIFICATE Payment', NULL, '200.00', 'admin', NULL, '2022-07-28'),
(28, 'Business Clearance Payment', 'Business Permit', '1200.00', 'admin', 'ALPHA BETA', '2022-07-28'),
(29, 'Barangay Clearance Payment', NULL, '2342342.00', 'admin', 'Alpha Beta Charlie', '2022-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `owner1` varchar(100) DEFAULT NULL,
  `owner2` varchar(100) DEFAULT NULL,
  `nature` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `b_address` text DEFAULT NULL,
  `o_address` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`id`, `b_name`, `owner1`, `owner2`, `nature`, `status`, `expiration_date`, `number`, `b_address`, `o_address`, `remarks`, `created_at`) VALUES
(6, 'SARI-SARI STORE', 'ALPHA BETA', NULL, 'SARI-SARI', 'New', '2026-11-25', '0912245875', 'ORION STREET, RJVILLE SUBD. LUCENA CITY', 'ORION STREET, RJVILLE SUBD. LUCENA CITY', '', '2022-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `pos_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position`, `pos_order`) VALUES
(3, 'PUNONG BARANGAY', 1),
(4, 'SK Chairperson', 10),
(5, 'Councilor 2', 3),
(6, 'Councilor 3', 4),
(8, 'Councilor 5', 6),
(9, 'Councilor 6', 7),
(10, 'Councilor 7', 8),
(11, 'Barangay Secretary', 11),
(12, 'Barangay Treasurer', 12),
(13, 'Administrative Aid', 13),
(14, 'Kagawad', 9);

-- --------------------------------------------------------

--
-- Table structure for table `precinct`
--

CREATE TABLE `precinct` (
  `id` int(11) NOT NULL,
  `precinct_name` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `precinct`
--

INSERT INTO `precinct` (`id`, `precinct_name`, `details`) VALUES
(4, 'Pag-asa-001', ''),
(5, 'Pag-asa-002', ''),
(6, 'Pag-asa-003', ''),
(7, 'Pag-asa-004', ''),
(8, 'Pag-asa-005', ''),
(9, 'Pag-asa-006', '');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `id` int(11) NOT NULL,
  `purok_name` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `purok_name`, `details`) VALUES
(7, 'Sitio 1', ''),
(8, 'Sitio 2', ''),
(9, 'Sitio 3', ''),
(10, 'Sitio 4', ''),
(11, 'Sitio 5', ''),
(12, 'Sitio 6', ''),
(13, 'Sitio 7', ''),
(16, 'Sitio 8', ''),
(17, 'Sitio 9', ''),
(18, 'Sitio 10', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `files` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `request_stat` int(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
);

--
-- Dumping data for table `request`
--
-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `national_id` varchar(100) DEFAULT NULL,
  `citizenship` varchar(50) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `birthplace` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `civilstatus` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `purok` varchar(20) DEFAULT NULL,
  `voterstatus` varchar(20) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `employer_name` varchar(100) DEFAULT NULL,
  `pwd` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `resident_type` varchar(50) DEFAULT 'Alive',
  `remarks` text DEFAULT NULL
);

--
-- Dumping data for table `residents`
--
-- --------------------------------------------------------

--
-- Table structure for table `resident_house`
--

CREATE TABLE `resident_house` (
  `resident_id` int(11) DEFAULT NULL,
  `house_number` varchar(100) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `security_question`
--

CREATE TABLE `security_question` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `question_1` int(11) DEFAULT NULL,
  `answer_1` varchar(100) DEFAULT NULL,
  `question_2` int(11) DEFAULT NULL,
  `answer_2` varchar(100) DEFAULT NULL,
  `question_3` int(11) DEFAULT NULL,
  `answer_3` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_question`
--

INSERT INTO `security_question` (`id`, `resident_id`, `username`, `question_1`, `answer_1`, `question_2`, `answer_2`, `question_3`, `answer_3`, `date`) VALUES
(14, 1, 'roncajan', 1, 'Plaridel', 2, 'koki', 3, 'alabastro', '2021-10-22 09:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fees` decimal(10,2) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `requires` text DEFAULT NULL,
  `qr_code` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `fees`, `phone`, `requires`, `qr_code`, `status`) VALUES
(1, 'BARANGAY CLEARANCE', 'View the requirements needed for Barangay Clerance and acquire online now.', '100.00', '09122789468', 'CEDULA', '31181bf649e81222f2fc528a5ce3fa92.JPG', 'Active'),
(2, 'RESIDENCY CERTIFICATE', 'View the requirements needed for Barangay Residency and acquire online now.', '200.00', '09122789468', 'CEDULA and BRGY CLEARANCE', '9b638235f2288e6e91bdde565d468341.JPG', 'Active'),
(3, 'INDIGENCY CERTIFICATE', 'View the requirements needed for Barangay Indigency and acquire online now.', '60.00', '09122789468', 'cedula', '890c7efcac1248b406376e1f8343a13c.JPG', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `settled`
--

CREATE TABLE `settled` (
  `case_no` varchar(50) NOT NULL,
  `updates` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settled`
--

INSERT INTO `settled` (`case_no`, `updates`, `date`) VALUES
('2', '', '2022-07-15'),
('2022-0001', '', '2022-06-28'),
('3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `summon`
--

CREATE TABLE `summon` (
  `id` int(11) NOT NULL,
  `case_no` varchar(50) DEFAULT NULL,
  `blotter_update` text DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summon`
--

INSERT INTO `summon` (`id`, `case_no`, `blotter_update`, `number`, `date`) VALUES
(6, '2022-0001', 'sched ulit', '1st', '2022-06-28 09:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `acronym` varchar(100) NOT NULL,
  `powered_b` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `sname`, `acronym`, `powered_b`) VALUES
(1, 'E-Barangay: A Customized Barangay Management System with One-Time Password Authentication for Barangay 183, Caloocan City', 'E-BRGY System', 'GROUP 2 CAPSTONE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_type` text DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resident_id` int(11) DEFAULT NULL
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `username`, `fname`, `lname`, `email`, `bio`, `birth`, `phone`, `address`, `password`, `user_type`, `avatar`, `status`, `created_at`, `resident_id`) VALUES
(20, '2bc812', 'admin', 'Admin', 'System', 'admin@example.com', 'dsadasdasd', '2021-10-05', '09187112668', 'PUROK 3', 'efacc4001e857f7eba4ae781c2932dedf843865e', 'administrator', '0a67543417805f44be9cbf5b28d3c4ad.png', NULL, '2021-09-15 23:47:01', NULL),
(29, NULL, 'staff', NULL, NULL, 'jayr@gmail.com', NULL, NULL, NULL, NULL, '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'staff', 'ffb2b56ac6ca7d15663e5f968d858fec.png', 'Active', '2022-06-23 22:37:40', NULL),
(30, NULL, 'admin2', NULL, NULL, 'jayr12@gmail.com', NULL, NULL, NULL, NULL, '315f166c5aca63a157f7d41007675cb44a948b33', 'administrator', '43fb718a397568ef5460d42baada05c4.jpg', 'Active', '2022-07-09 02:46:21', NULL),
(31, NULL, 'resident', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '891cde22cc4a68f910b34799af7503b8229c74ea', 'resident', NULL, 'Active', '2022-11-20 08:15:39', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `time` datetime(6) NOT NULL,
  `sender_message_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `receiver_message_id` varchar(20) CHARACTER SET latin1 NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_info`
--
ALTER TABLE `barangay_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`case_no`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cert_settings`
--
ALTER TABLE `cert_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chairmanship`
--
ALTER TABLE `chairmanship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complainants`
--
ALTER TABLE `complainants`
  ADD KEY `case_no` (`case_no`);

--
-- Indexes for table `covid_status`
--
ALTER TABLE `covid_status`
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `house_number`
--
ALTER TABLE `house_number`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `id_settings`
--
ALTER TABLE `id_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_details`
--
ALTER TABLE `other_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_details_ibfk_1` (`resident_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precinct`
--
ALTER TABLE `precinct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_id` (`resident_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_house`
--
ALTER TABLE `resident_house`
  ADD KEY `resident_id` (`resident_id`),
  ADD KEY `resident_house_ibfk_2` (`house_number`);

--
-- Indexes for table `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settled`
--
ALTER TABLE `settled`
  ADD PRIMARY KEY (`case_no`);

--
-- Indexes for table `summon`
--
ALTER TABLE `summon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_no` (`case_no`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=641;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barangay_info`
--
ALTER TABLE `barangay_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cert_settings`
--
ALTER TABLE `cert_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chairmanship`
--
ALTER TABLE `chairmanship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `house_number`
--
ALTER TABLE `house_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4854;

--
-- AUTO_INCREMENT for table `id_settings`
--
ALTER TABLE `id_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `other_details`
--
ALTER TABLE `other_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `precinct`
--
ALTER TABLE `precinct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `security_question`
--
ALTER TABLE `security_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `summon`
--
ALTER TABLE `summon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complainants`
--
ALTER TABLE `complainants`
  ADD CONSTRAINT `complainants_ibfk_1` FOREIGN KEY (`case_no`) REFERENCES `blotter` (`case_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `covid_status`
--
ALTER TABLE `covid_status`
  ADD CONSTRAINT `covid_status_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_details`
--
ALTER TABLE `other_details`
  ADD CONSTRAINT `other_details_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resident_house`
--
ALTER TABLE `resident_house`
  ADD CONSTRAINT `resident_house_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resident_house_ibfk_2` FOREIGN KEY (`house_number`) REFERENCES `house_number` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `summon`
--
ALTER TABLE `summon`
  ADD CONSTRAINT `summon_ibfk_1` FOREIGN KEY (`case_no`) REFERENCES `blotter` (`case_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
