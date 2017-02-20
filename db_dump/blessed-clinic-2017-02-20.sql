-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 01:05 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blessed-clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(10) unsigned NOT NULL,
  `acc_username` varchar(150) NOT NULL,
  `acc_password` varchar(32) NOT NULL,
  `acc_last_name` varchar(30) NOT NULL,
  `acc_first_name` varchar(60) NOT NULL,
  `acc_type` enum('admin','dev') NOT NULL DEFAULT 'admin',
  `acc_failed_login` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `acc_status` enum('active','locked','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_username`, `acc_password`, `acc_last_name`, `acc_first_name`, `acc_type`, `acc_failed_login`, `acc_status`) VALUES
(1, 'developer@zeaple.com', 'bf5a6151c23ec6dc1616d6067e8fea42', 'Developer', 'Zeaple', 'dev', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bnr_id` int(10) unsigned NOT NULL,
  `bnr_image` varchar(200) NOT NULL,
  `bnr_image_thumb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE IF NOT EXISTS `examination` (
  `exm_id` int(10) unsigned NOT NULL,
  `exm_code` varchar(200) NOT NULL,
  `exm_name` varchar(200) NOT NULL,
  `exm_description` text NOT NULL,
  `exm_rate` float NOT NULL,
  `exm_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_results`
--

CREATE TABLE IF NOT EXISTS `laboratory_results` (
  `lab_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `exm_id` int(11) NOT NULL,
  `lab_result` int(11) NOT NULL,
  `lab_normal_value` float NOT NULL,
  `lab_normal_value_start` float NOT NULL,
  `lab_sequence` int(11) NOT NULL,
  `lab_remarks` text NOT NULL,
  `lab_date` datetime NOT NULL,
  `lab_status` enum('done','ongoing','undone') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_test`
--

CREATE TABLE IF NOT EXISTS `laboratory_test` (
  `lat_id` int(11) NOT NULL,
  `exm_id` int(11) NOT NULL,
  `lab_code` varchar(12) NOT NULL,
  `lab_name` varchar(100) NOT NULL,
  `lab_sequence` int(11) NOT NULL,
  `lab_unit` varchar(10) NOT NULL,
  `lab_normal_value` varchar(10) NOT NULL,
  `lab_normal_value_start` int(11) NOT NULL,
  `lab_normal_value_end` int(11) NOT NULL,
  `lab_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE IF NOT EXISTS `medical_record` (
  `mer_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `mer_height` float NOT NULL,
  `mer_height_unit` enum('inch(es)','foot/feet','centimeters','meters') NOT NULL,
  `mer_weight` float NOT NULL,
  `mer_weight_unit` enum('grams','kilograms','pound(s)') NOT NULL,
  `mer_temperature` enum('celcius(℃)','fahrenheit(℉)','','') NOT NULL,
  `mer_heartrate` int(11) NOT NULL,
  `mer_nose` text NOT NULL,
  `mer_skin` text NOT NULL,
  `mer_anus` text NOT NULL,
  `mer_throat` text NOT NULL,
  `mer_fecal` text NOT NULL,
  `mer_mouth` text NOT NULL,
  `mer_lower_abdomen` text NOT NULL,
  `mer_upper_abdomen` text NOT NULL,
  `mer_limbs` text NOT NULL,
  `mer_other_remarks` text NOT NULL,
  `mer_status` text NOT NULL,
  `mer_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `pag_id` int(10) unsigned NOT NULL,
  `pag_title` varchar(140) NOT NULL,
  `pct_id` int(10) unsigned DEFAULT '0',
  `pag_slug` varchar(80) DEFAULT NULL,
  `pag_content` text NOT NULL,
  `pag_date_created` datetime NOT NULL,
  `pag_date_published` datetime DEFAULT NULL,
  `pag_type` enum('editable','static') NOT NULL DEFAULT 'editable',
  `pag_status` enum('published','draft') NOT NULL DEFAULT 'published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `pct_id` int(10) unsigned NOT NULL,
  `pct_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `pet_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `pet_date_of_birth` date DEFAULT NULL,
  `pet_species` enum('Feline','Canine','Others') NOT NULL DEFAULT 'Others',
  `pet_breed` varchar(120) NOT NULL,
  `pet_gender` varchar(120) NOT NULL,
  `pet_color` varchar(120) NOT NULL,
  `pet_remarks` text NOT NULL,
  `pet_status` enum('active','inactive','dead') NOT NULL,
  `pet_date_added` date NOT NULL,
  `pet_death_datetime` datetime NOT NULL,
  `pet_cause_of_death` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `photo_album`
--

CREATE TABLE IF NOT EXISTS `photo_album` (
  `alb_id` int(10) unsigned NOT NULL,
  `alb_name` varchar(50) NOT NULL,
  `alb_description` text NOT NULL,
  `alb_slug` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `release_voucher`
--

CREATE TABLE IF NOT EXISTS `release_voucher` (
  `rev_id` int(11) NOT NULL,
  `rev_code` varchar(12) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `rev_admin_acc_id` int(11) NOT NULL,
  `rev_or_number` int(11) NOT NULL,
  `rev_datetime` datetime NOT NULL,
  `rev_remarks` text NOT NULL,
  `rev_status` enum('pending','paid','free') NOT NULL,
  `rev_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8a2968c1dbe1de5a9274e40758181b99', '0.0.0.0', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1487428421, 'a:1:{s:9:"user_data";s:0:"";}'),
('e68d6d8e2e2a1142752e56b0b369a7fb', '0.0.0.0', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1487419379, 'a:5:{s:12:"acc_username";s:20:"developer@zeaple.com";s:8:"acc_type";s:3:"dev";s:14:"acc_first_name";s:6:"Zeaple";s:13:"acc_last_name";s:9:"Developer";s:8:"acc_name";s:16:"Zeaple Developer";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `username` (`acc_username`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bnr_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exm_id`);

--
-- Indexes for table `laboratory_results`
--
ALTER TABLE `laboratory_results`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  ADD PRIMARY KEY (`lat_id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`mer_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pag_id`),
  ADD UNIQUE KEY `slug` (`pag_slug`);

--
-- Indexes for table `page_category`
--
ALTER TABLE `page_category`
  ADD PRIMARY KEY (`pct_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `photo_album`
--
ALTER TABLE `photo_album`
  ADD PRIMARY KEY (`alb_id`);

--
-- Indexes for table `release_voucher`
--
ALTER TABLE `release_voucher`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bnr_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exm_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory_results`
--
ALTER TABLE `laboratory_results`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  MODIFY `lat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `mer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pag_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_category`
--
ALTER TABLE `page_category`
  MODIFY `pct_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_album`
--
ALTER TABLE `photo_album`
  MODIFY `alb_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `release_voucher`
--
ALTER TABLE `release_voucher`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
