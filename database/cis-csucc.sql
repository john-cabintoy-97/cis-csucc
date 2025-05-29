-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis-csucc`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`) VALUES
(1, 'CEIT'),
(3, 'CITTE');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `college_id`) VALUES
(1, 'DCT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_id` int(11) NOT NULL,
  `article` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `property_num` varchar(100) NOT NULL,
  `unit_value` varchar(100) NOT NULL,
  `quantity_property` varchar(100) NOT NULL,
  `um_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `article`, `description`, `property_num`, `unit_value`, `quantity_property`, `um_id`) VALUES
(2, 'Chair', 'Wheel Chair', 'CLC-16-03-001', '5400', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `comment`, `timestamp`, `patient_id`) VALUES
(6, 'dadada', '2023-06-29 05:23:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

CREATE TABLE `illness` (
  `illness_id` int(11) NOT NULL,
  `illness_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`illness_id`, `illness_name`) VALUES
(1, 'Headache'),
(2, 'Cough/Colds/Flu'),
(3, 'Fever'),
(4, 'Dysmenorrhea'),
(5, 'Stomachache'),
(6, 'Toothache'),
(7, 'Dysuria'),
(8, 'Incr. BP'),
(9, 'Rashes/Allergy'),
(10, 'LBM'),
(11, 'Joint/Muscle Pain/BodyWeakness'),
(12, 'Dizziness'),
(13, 'DOB/Chest Pain/Asthma'),
(14, 'Burns'),
(15, 'Epitaxis'),
(16, 'Eye/Ear Problems'),
(17, 'Referrals'),
(18, 'Others(wound/bp check/etc.)');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `md_id` int(11) NOT NULL,
  `med_generic` varchar(100) NOT NULL,
  `med_brand` varchar(100) NOT NULL,
  `med_desc` varchar(100) NOT NULL,
  `med_dose` varchar(100) NOT NULL,
  `med_type` int(11) NOT NULL,
  `med_for` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`md_id`, `med_generic`, `med_brand`, `med_desc`, `med_dose`, `med_type`, `med_for`) VALUES
(5, 'Ciprofloxacin', 'Ciprofloxacin', '500mg (100tab/box)', '1', 2, ''),
(6, 'Cefuroxime', 'Cefuroxime', '500mg (100tab/box)', '500mg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_inventory`
--

CREATE TABLE `m_inventory` (
  `inv_id` int(11) NOT NULL,
  `inv_med_id` int(11) NOT NULL,
  `inv_totalcount` int(11) NOT NULL,
  `inv_orderlevel` int(11) NOT NULL,
  `inv_expiration` date NOT NULL,
  `inv_remaining` int(11) NOT NULL,
  `inv_issued` varchar(100) NOT NULL,
  `inv_batchdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_inventory`
--

INSERT INTO `m_inventory` (`inv_id`, `inv_med_id`, `inv_totalcount`, `inv_orderlevel`, `inv_expiration`, `inv_remaining`, `inv_issued`, `inv_batchdate`) VALUES
(9, 5, 100, 5, '2023-06-30', 98, '2', '2023-06-28'),
(10, 6, 100, 5, '2023-10-27', 99, '3', '2023-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_name`) VALUES
(1, 'OSAS');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `patient_lname` varchar(50) NOT NULL,
  `patient_mname` varchar(50) NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` varchar(50) NOT NULL,
  `patient_idno` varchar(50) NOT NULL,
  `patient_college_id` int(11) NOT NULL,
  `patient_course_id` int(11) NOT NULL,
  `patient_office_id` int(11) NOT NULL,
  `patient_position` varchar(50) NOT NULL,
  `patient_registered_sy` varchar(50) NOT NULL,
  `patient_type` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_fname`, `username`, `patient_lname`, `patient_mname`, `patient_age`, `patient_gender`, `patient_idno`, `patient_college_id`, `patient_course_id`, `patient_office_id`, `patient_position`, `patient_registered_sy`, `patient_type`, `email`, `password`, `timestamp`) VALUES
(7, 'juan', '', 'sento', '', 30, 'male', '2018-5057', 3, 0, 0, 'teacher', '', 'faculty', '', '$2y$10$rvtgzhmNTNiMLe6tl8y3/OTbvcs7qidPzY2e1dpiW7c6RuoU1B.4O', '2023-06-30 06:34:16'),
(49, 'administrator', 'administrator', 'administrator', 'administrator', 0, 'male', '', 0, 0, 0, '', '', 'admin', '', '$2y$10$Q6ZlmOpyjSvSl1r.5WZe6OpFo7rTBs9kCc74gpJWcAHi0KJafDb96', '2023-06-30 06:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `per_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `per_admin` tinyint(1) NOT NULL DEFAULT 0,
  `per_consultation` tinyint(1) NOT NULL,
  `per_reports` tinyint(1) NOT NULL,
  `rep_consultation` tinyint(1) NOT NULL,
  `rep_individual` tinyint(1) NOT NULL,
  `rep_medicine` tinyint(1) NOT NULL,
  `rep_registered` tinyint(1) NOT NULL,
  `rep_health` tinyint(1) NOT NULL,
  `per_inventory` tinyint(1) NOT NULL,
  `inv_medicine` tinyint(1) NOT NULL,
  `inv_equipment` tinyint(1) NOT NULL,
  `inv_stocks` tinyint(1) NOT NULL,
  `per_management` tinyint(1) NOT NULL,
  `mn_students` tinyint(1) NOT NULL,
  `mn_faculty` tinyint(1) NOT NULL,
  `mn_employee` tinyint(1) NOT NULL,
  `activation` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mn_personnel` tinyint(1) NOT NULL,
  `per_setup` tinyint(1) NOT NULL,
  `st_college` tinyint(1) NOT NULL,
  `st_course` tinyint(1) NOT NULL,
  `st_office` tinyint(1) NOT NULL,
  `st_illness` tinyint(1) NOT NULL,
  `st_nurse` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`per_id`, `patient_id`, `per_admin`, `per_consultation`, `per_reports`, `rep_consultation`, `rep_individual`, `rep_medicine`, `rep_registered`, `rep_health`, `per_inventory`, `inv_medicine`, `inv_equipment`, `inv_stocks`, `per_management`, `mn_students`, `mn_faculty`, `mn_employee`, `activation`, `created_at`, `mn_personnel`, `per_setup`, `st_college`, `st_course`, `st_office`, `st_illness`, `st_nurse`) VALUES
(22, 49, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2023-06-30 06:16:48', 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_nurse`
--

CREATE TABLE `school_nurse` (
  `nurse_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_nurse`
--

INSERT INTO `school_nurse` (`nurse_name`) VALUES
('nurse');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treat_id` int(11) NOT NULL,
  `treat_illness_id` int(11) NOT NULL,
  `treat_date` date NOT NULL,
  `treat_time` varchar(100) NOT NULL,
  `treat_sy` varchar(100) NOT NULL,
  `treat_semester` varchar(100) NOT NULL,
  `treat_personnel_id` int(11) NOT NULL,
  `treat_med` varchar(256) NOT NULL,
  `treat_month` varchar(100) NOT NULL,
  `treat_year` varchar(100) NOT NULL,
  `treat_action` varchar(200) NOT NULL,
  `treat_remarks` varchar(200) NOT NULL,
  `treat_patient_id` int(11) NOT NULL,
  `treat_temp` varchar(100) NOT NULL,
  `treat_pulse` varchar(100) NOT NULL,
  `treat_rr` varchar(100) NOT NULL,
  `treat_mm` varchar(100) NOT NULL,
  `treat_hg` varchar(100) NOT NULL,
  `personnel_custom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treat_id`, `treat_illness_id`, `treat_date`, `treat_time`, `treat_sy`, `treat_semester`, `treat_personnel_id`, `treat_med`, `treat_month`, `treat_year`, `treat_action`, `treat_remarks`, `treat_patient_id`, `treat_temp`, `treat_pulse`, `treat_rr`, `treat_mm`, `treat_hg`, `personnel_custom`) VALUES
(1, 6, '2023-06-30', '14:21', '2023', '1', 49, '(Cefuroxime, Cefuroxime,  #1)', '06', '2023', 'Good', 'Good', 7, '', '', '', '', '', 'John');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Type 1'),
(2, 'Type 2'),
(3, 'Type 3'),
(4, 'Type 4'),
(5, 'Type 5');

-- --------------------------------------------------------

--
-- Table structure for table `unit_measure`
--

CREATE TABLE `unit_measure` (
  `um_id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_measure`
--

INSERT INTO `unit_measure` (`um_id`, `unit_name`) VALUES
(1, 'Piece'),
(2, 'Tank'),
(3, 'Set'),
(4, 'Unit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `um_id` (`um_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`illness_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`md_id`),
  ADD KEY `med_type` (`med_type`);

--
-- Indexes for table `m_inventory`
--
ALTER TABLE `m_inventory`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `inv_med_id` (`inv_med_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `patient_office_id` (`patient_office_id`),
  ADD KEY `patient_college_id` (`patient_college_id`),
  ADD KEY `patient_course_id` (`patient_course_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treat_id`);

--
-- Indexes for table `unit_measure`
--
ALTER TABLE `unit_measure`
  ADD PRIMARY KEY (`um_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `illness`
--
ALTER TABLE `illness`
  MODIFY `illness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_inventory`
--
ALTER TABLE `m_inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
