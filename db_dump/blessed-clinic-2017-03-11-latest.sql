-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2017 at 09:19 PM
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
  `acc_type` enum('admin','dev','customer') NOT NULL DEFAULT 'customer',
  `acc_failed_login` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `acc_status` enum('active','locked','deleted') NOT NULL DEFAULT 'active',
  `acc_gender` enum('male','female','n/a') NOT NULL DEFAULT 'n/a',
  `acc_address` text NOT NULL,
  `acc_contact` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_username`, `acc_password`, `acc_last_name`, `acc_first_name`, `acc_type`, `acc_failed_login`, `acc_status`, `acc_gender`, `acc_address`, `acc_contact`) VALUES
(1, 'developer@vet.com', '693f615e87b08bf7a6571c007e576279', 'Admin', 'User', 'admin', 0, 'active', 'male', 'Blk 5. Lot 56 villa Espana 2 Tatalon', 2147483647),
(2, 'user@gmail.com', 'cba1f2d695a5ca39ee6f343297a761a4', 'Soberano', 'Liza', 'customer', 0, 'locked', 'male', 'Blk 5. Lot 56 villa Espana 2 Tatalon', 2147483647),
(4, 'customer@vet.com', '8c64f359ea5615f35ff0007eda9387aa', 'Dalisay', 'Coco Martin', 'customer', 0, 'active', 'male', 'Block 12. Lot  Villa Sta. Maria,  Brg, Lourdes, Quezon City 11110 ', 2147483647),
(5, 'developer@master.com', '693f615e87b08bf7a6571c007e576279', 'Developer', 'Account', 'dev', 1, 'active', 'male', 'Street St. Address, Country 1123', 2147483647),
(6, 'erica14dalmacio@gmail.com', 'ad9f91070abbb4f922601949a15050fa', 'Dalmacio', 'Erica', 'customer', 0, 'active', 'female', 'Roxas Quezon City', 2147483647),
(7, 'markanthony@yahoo.com', 'fc1fcaed398cdd48f85e5d29aea9a0c9', 'Lason', 'Enrique', 'customer', 0, 'active', 'male', 'Araneta', 2147483647),
(10, 'macardino@gmail.com.com', '25f9e794323b453885f5181f1b624d0b', 'Cardino', 'Mark', 'customer', 0, 'active', 'male', 'tatalon', 2147483647),
(11, 'mishairjoel@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Joel', 'Mish', 'customer', 0, 'active', 'male', 'Araneta', 2147483647),
(12, 'troll@lang.com', '101c31453c2a4856c27d410feec3960b', 'Daisy', 'Hello', 'customer', 0, 'active', 'male', 'Blk 15. Lot 13 villa Escudero, \nLa Land ', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `bnr_id` int(10) unsigned NOT NULL,
  `bnr_image` varchar(200) NOT NULL,
  `bnr_image_thumb` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bnr_id`, `bnr_image`, `bnr_image_thumb`) VALUES
(1, 'c35178daa746b8bb3bb39a2a29a396f7.jpg', 'c35178daa746b8bb3bb39a2a29a396f7_thumb.jpg'),
(2, '7e8f02bf2e37b047b020877fc1c01944.jpg', '7e8f02bf2e37b047b020877fc1c01944_thumb.jpg'),
(3, 'd6649ec52d2006a23f2db45b53b51861.jpg', 'd6649ec52d2006a23f2db45b53b51861_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE IF NOT EXISTS `breed` (
  `bre_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `bre_name` varchar(100) NOT NULL,
  `bre_other_names` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`bre_id`, `spe_id`, `bre_name`, `bre_other_names`) VALUES
(1, 2, 'Syberian Husky', 'Husky, Husk, Danger Beauty'),
(2, 2, 'Inushiba', 'Dogge'),
(3, 3, 'Sphinx', 'Hairless'),
(4, 3, 'Puspin', 'Philippine national cat breed'),
(5, 3, 'Bengal Cats', 'Bengal'),
(6, 3, 'Egyptian Mau', 'Mau'),
(8, 3, 'Japanese Bobtail', 'Bobtails'),
(9, 3, 'American Curl', 'Curl'),
(10, 2, 'Akita', 'Akita'),
(11, 2, 'Foxhound', 'Foxhound'),
(12, 2, 'Aspin', 'Aso, Pinoy Dogge, askal, '),
(13, 1, 'others', ''),
(14, 2, 'others', ''),
(15, 3, 'others', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`exm_id`, `exm_code`, `exm_name`, `exm_description`, `exm_rate`, `exm_status`) VALUES
(1, 'ecg', 'ECG', 'ECG', 100, 'inactive'),
(2, 'fecalysis', 'Fecalysis', 'Fecalysis', 100, 'active'),
(4, 'urinalysis', 'Urinalysis', 'Urinalysis', 130, 'inactive'),
(6, 'xray', 'X-ray', 'X-ray', 120, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `grooming`
--

CREATE TABLE IF NOT EXISTS `grooming` (
  `gro_id` int(10) unsigned NOT NULL,
  `pet_id` int(10) unsigned NOT NULL,
  `gro_description` text NOT NULL,
  `gro_cost` float NOT NULL,
  `gro_datetime` datetime NOT NULL,
  `gro_status` enum('active','done','rejected','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grooming`
--

INSERT INTO `grooming` (`gro_id`, `pet_id`, `gro_description`, `gro_cost`, `gro_datetime`, `gro_status`) VALUES
(1, 12, 'kokokokko', 100, '2017-02-08 09:00:00', 'active'),
(2, 15, 'napalinis', 200, '2017-02-26 14:00:00', 'active'),
(3, 12, 'gupit', 200, '2021-02-26 18:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_results`
--

CREATE TABLE IF NOT EXISTS `laboratory_results` (
  `lab_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `exm_id` int(11) NOT NULL,
  `lab_remark` text NOT NULL,
  `lab_date` datetime NOT NULL,
  `lab_status` enum('active','inactive','done','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory_results`
--

INSERT INTO `laboratory_results` (`lab_id`, `pet_id`, `exm_id`, `lab_remark`, `lab_date`, `lab_status`) VALUES
(1, 9, 6, 'asdasdsadsa', '2017-02-21 05:42:03', 'active'),
(2, 9, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '2017-02-21 20:39:46', 'active'),
(3, 10, 1, 'Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.', '2017-02-22 00:34:29', 'active'),
(4, 10, 2, 'Curabitur aliquet quam id dui posuere blandit. Proin eget tortor risus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', '2017-02-22 00:35:45', 'active'),
(5, 10, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat.', '2017-02-22 00:37:44', 'active'),
(6, 10, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis lorem ut libero malesuada feugiat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat.', '2017-02-22 00:38:20', 'active'),
(7, 12, 1, 'mahaba', '2017-02-26 07:00:13', 'active'),
(8, 13, 4, 'kumanche', '2017-02-26 09:27:11', 'active'),
(9, 17, 6, 'konisine', '2017-02-26 11:24:43', 'active'),
(10, 14, 4, 'ADAASDAS', '2017-02-26 12:47:21', 'active'),
(11, 18, 2, 'huhuh', '2017-02-26 13:02:56', 'active'),
(12, 19, 1, 'adnormal', '2021-02-26 18:35:57', 'active'),
(13, 20, 6, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada', '2017-03-11 18:06:14', 'active'),
(14, 20, 2, 'Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Nulla porttitor accumsan tincidunt. Donec rutrum congue leo eget malesuada.', '2017-03-11 20:48:16', 'active'),
(15, 20, 4, 'Sed porttitor lectus nibh. Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.', '2017-03-11 21:01:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_result_images`
--

CREATE TABLE IF NOT EXISTS `laboratory_result_images` (
  `lri_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `lri_image` varchar(100) NOT NULL,
  `lri_image_thumb` varchar(100) NOT NULL,
  `lri_image_original` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory_result_images`
--

INSERT INTO `laboratory_result_images` (`lri_id`, `lab_id`, `lri_image`, `lri_image_thumb`, `lri_image_original`) VALUES
(3, 1, 'b585f8476f7b30e9c5a9911d38d03460.jpg', 'b585f8476f7b30e9c5a9911d38d03460_thumb.jpg', ''),
(4, 1, '66d1bf71700ff16be1c0183ba2a7b21d.jpg', '66d1bf71700ff16be1c0183ba2a7b21d_thumb.jpg', ''),
(5, 2, '2322285abbf8e7dcbf264e997ee5a469.jpg', '2322285abbf8e7dcbf264e997ee5a469_thumb.jpg', ''),
(6, 2, 'a26388ba66e90db70f04d56ef8ca0ee1.jpg', 'a26388ba66e90db70f04d56ef8ca0ee1_thumb.jpg', ''),
(7, 2, 'e1d80680e35ae27afd1be77380620227.jpg', 'e1d80680e35ae27afd1be77380620227_thumb.jpg', ''),
(8, 2, '68c02398a04231812583474d0a9948dc.jpg', '68c02398a04231812583474d0a9948dc_thumb.jpg', ''),
(9, 2, 'ca7f5ea54ece909568a9584e8f79cdd6.jpg', 'ca7f5ea54ece909568a9584e8f79cdd6_thumb.jpg', ''),
(10, 2, '69fda2e4b37839e59ba0a33708bd1750.jpg', '69fda2e4b37839e59ba0a33708bd1750_thumb.jpg', ''),
(11, 2, '79154f5cdfe90e2b28bcd6a1f5bac803.jpg', '79154f5cdfe90e2b28bcd6a1f5bac803_thumb.jpg', ''),
(12, 1, 'ee90b692688a3a65a5c5af6dd74ba287.png', 'ee90b692688a3a65a5c5af6dd74ba287_thumb.png', ''),
(13, 1, '24c4944b88d33c02e92de5b23895999a.png', '24c4944b88d33c02e92de5b23895999a_thumb.png', ''),
(14, 1, '6c2701c07a53b735a12d08e42a9a7abe.png', '6c2701c07a53b735a12d08e42a9a7abe_thumb.png', ''),
(15, 2, '', '', ''),
(16, 0, 'e378f9011927f0bdb0caf9154dd73923.jpg', 'e378f9011927f0bdb0caf9154dd73923_thumb.jpg', ''),
(17, 0, '198c52d3779396937fc87689bd63219a.jpg', '198c52d3779396937fc87689bd63219a_thumb.jpg', ''),
(18, 3, '376aa37167386a646d125bd7d3a5c649.jpg', '376aa37167386a646d125bd7d3a5c649_thumb.jpg', ''),
(19, 3, 'd0c386a359e940f4b50cb36f51cd56d8.jpg', 'd0c386a359e940f4b50cb36f51cd56d8_thumb.jpg', ''),
(20, 0, '813c971a8f881f17753b62280d7ea97a.jpg', '813c971a8f881f17753b62280d7ea97a_thumb.jpg', ''),
(21, 0, '769147966747d36fbc0dcf0ff27f851b.jpg', '769147966747d36fbc0dcf0ff27f851b_thumb.jpg', ''),
(22, 0, '94ee69a436600879d5d1c1c4c0a10c60.jpg', '94ee69a436600879d5d1c1c4c0a10c60_thumb.jpg', ''),
(23, 0, '90dc9cabfaf8756080d4a485dc338343.jpeg', '90dc9cabfaf8756080d4a485dc338343_thumb.jpeg', ''),
(24, 0, 'b9000056c898dd3d65fe1ea1d62e5611.jpg', 'b9000056c898dd3d65fe1ea1d62e5611_thumb.jpg', ''),
(25, 6, 'f444948ca8234633d313ad3077529bcc.jpeg', 'f444948ca8234633d313ad3077529bcc_thumb.jpeg', ''),
(26, 6, '59b717f6d2b3b7e3fa52c4a7fd754b29.jpg', '59b717f6d2b3b7e3fa52c4a7fd754b29_thumb.jpg', ''),
(27, 7, 'df00d72924301c47f40434b4e8209c3d.JPG', 'df00d72924301c47f40434b4e8209c3d_thumb.JPG', ''),
(28, 8, 'f3fd0c960385da8311191e745e63a28d.jpg', 'f3fd0c960385da8311191e745e63a28d_thumb.jpg', ''),
(29, 9, '', '', ''),
(30, 10, '', '', ''),
(31, 11, '', '', ''),
(32, 12, '0d7ee149f9779868be45a4af9585d601.jpg', '0d7ee149f9779868be45a4af9585d601_thumb.jpg', ''),
(33, 13, '399938f38ec0efd81346695e809872cc.jpg', '399938f38ec0efd81346695e809872cc_thumb.jpg', ''),
(34, 14, '0629dd23ea1f18c1c841a297bfbec11c.jpg', '0629dd23ea1f18c1c841a297bfbec11c_thumb.jpg', ''),
(35, 15, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_test`
--

CREATE TABLE IF NOT EXISTS `laboratory_test` (
  `lat_id` int(11) NOT NULL,
  `exm_id` int(11) NOT NULL,
  `lat_code` varchar(12) NOT NULL,
  `lat_name` varchar(100) NOT NULL,
  `lat_sequence` int(11) NOT NULL,
  `lat_type` enum('numeric','array','') NOT NULL DEFAULT 'numeric',
  `lat_array_values` text NOT NULL,
  `lat_unit` varchar(10) NOT NULL,
  `lat_normal_value` varchar(10) NOT NULL,
  `lat_normal_value_start` int(11) NOT NULL,
  `lat_normal_value_end` int(11) NOT NULL,
  `lat_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory_test`
--

INSERT INTO `laboratory_test` (`lat_id`, `exm_id`, `lat_code`, `lat_name`, `lat_sequence`, `lat_type`, `lat_array_values`, `lat_unit`, `lat_normal_value`, `lat_normal_value_start`, `lat_normal_value_end`, `lat_status`) VALUES
(2, 1, 'Main Diagnos', 'Main Diagnosis', 1, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(3, 1, 'Anti Arrythm', 'Anti Arrythmics', 2, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(4, 1, 'Rr Interval', 'Rr Interval', 3, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(5, 1, 'Heart Rate', 'Heart Rate', 4, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(6, 1, 'Heart Cardia', 'Heart Cardia', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(7, 1, 'Pwave Synusr', 'Pwave Synusrhytm', 6, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(8, 1, 'Qrs Regular', 'Qrs Regular', 7, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(9, 1, 'Qrs Atrial', 'Qrs Atrial', 8, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(10, 1, 'Pr Interval', 'Pr Interval', 9, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(11, 1, 'Pr Interval ', 'Pr Interval Time', 10, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(12, 1, 'Axis Deviati', 'Axis Deviationpattern', 11, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(13, 1, 'Axis Rightle', 'Axis Rightleft', 12, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(14, 1, 'Qrs Duration', 'Qrs Duration', 13, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(15, 1, 'Qrs Duration', 'Qrs Duration No', 14, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(20, 2, 'Tid', 'Tid', 0, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(21, 2, 'Color', 'Color', 1, 'array', 'Transparent,Pale straw,Transparent yellow,Dark yellow,Amber,honey,Light orange,Orange,Dark orange/Brown,Pink,Red,Green,Blue,Dark Brown/Black,White/Milky', 'Color', 'Yellow', 0, 1, 'active'),
(22, 2, 'Consistency', 'Consistency', 2, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(23, 2, 'Microscopic', 'Microscopic', 3, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(24, 2, 'Puscells', 'Puscells', 4, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(25, 2, 'Rbc', 'Rbc', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(26, 2, 'Bacteria', 'Bacteria', 6, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(27, 2, 'Hookworm', 'Hookworm', 7, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(28, 2, 'Ehistolicacy', 'Ehistolicacysts', 8, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(29, 2, 'Trophogoitez', 'Trophogoitez', 9, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(30, 2, 'Fatglobules', 'Fatglobules', 10, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(31, 2, 'Yeastcell', 'Yeastcell', 11, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(32, 2, 'Others', 'Others', 12, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(38, 3, 'Hbasg', 'Hbasg', 1, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(39, 3, 'Anti Hbc', 'Anti Hbc', 2, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(40, 3, 'Anti Hbs', 'Anti Hbs', 3, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(41, 3, 'Findings', 'Findings', 4, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(42, 3, 'Hbasg1', 'Hbasg1', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(43, 3, 'Anti Hbc1', 'Anti Hbc1', 6, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(44, 3, 'Anti Hbs1', 'Anti Hbs1', 7, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(45, 3, 'Findings1', 'Findings1', 8, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(46, 3, 'Hbasg2', 'Hbasg2', 9, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(47, 3, 'Anti Hbc2', 'Anti Hbc2', 10, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(48, 3, 'Anti Hbs2', 'Anti Hbs2', 11, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(49, 3, 'Findings2', 'Findings2', 12, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(50, 3, 'Hbasg3', 'Hbasg3', 13, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(51, 3, 'Anti Hbc3', 'Anti Hbc3', 14, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(52, 3, 'Igm Anti Hbc', 'Igm Anti Hbc', 15, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(53, 3, 'Findings3', 'Findings3', 16, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(60, 4, 'Urine Color', 'Urine Color', 2, 'array', 'Transparent,Pale straw,Transparent yellow,Dark yellow,Amber,honey,Light orange,Orange,Dark orange/Brown,Pink,Red,Green,Blue,Dark Brown/Black,White/Milky', 'Color', 'Yellow', 0, 1, 'active'),
(61, 4, 'Appearance', 'Appearance', 3, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(62, 4, 'Specificgrav', 'Specificgravity', 4, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(63, 4, 'Glucose', 'Glucose', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(64, 4, 'Urobilinogen', 'Urobilinogen', 6, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(65, 4, 'Protein', 'Protein', 7, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(66, 4, 'Ph', 'Ph', 8, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(67, 4, 'Leukocytes', 'Leukocytes', 9, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(68, 4, 'Ketones', 'Ketones', 10, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(69, 4, 'Bilirubin', 'Bilirubin', 11, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(70, 4, 'Blood', 'Blood', 12, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(71, 4, 'Hemoglobin', 'Hemoglobin', 13, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(72, 4, 'Nitrite', 'Nitrite', 14, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(82, 5, 'Visual L', 'Visual L', 2, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(83, 5, 'Visual R', 'Visual R', 3, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(84, 5, 'Hearing L', 'Hearing L', 4, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(85, 5, 'Hearing R', 'Hearing R', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(92, 6, 'Radiologic F', 'Radiologic Findings', 1, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(96, 6, 'Caseno', 'Caseno', 5, 'numeric', '', 'cc', '50', 0, 100, 'active'),
(97, 1, 'ABCDEFG', 'TEST', 5, 'array', 'Red,Blue,Yellow,Pink', 'Color', '', 0, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_test_result`
--

CREATE TABLE IF NOT EXISTS `laboratory_test_result` (
  `ltr_id` int(11) NOT NULL,
  `lab_id` int(11) NOT NULL,
  `lat_id` int(11) NOT NULL,
  `ltr_result` varchar(11) NOT NULL,
  `ltr_remark` text NOT NULL,
  `ltr_status` enum('active','inactive','done') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratory_test_result`
--

INSERT INTO `laboratory_test_result` (`ltr_id`, `lab_id`, `lat_id`, `ltr_result`, `ltr_remark`, `ltr_status`) VALUES
(1, 1, 92, '99', 'lorem ipsum', 'done'),
(2, 1, 96, '23', '. Nulla quis lorem ut libero malesuada feugiat.', 'done'),
(3, 2, 20, '12', 'local1', 'done'),
(4, 2, 21, '32', '2local', 'done'),
(5, 2, 22, '32', '4local', 'done'),
(6, 2, 23, '12', 'local5', 'done'),
(7, 2, 24, '55', 'local', 'done'),
(8, 2, 25, '22', 'local', 'done'),
(9, 2, 26, '55', 'local', 'done'),
(10, 2, 27, '77', 'local', 'done'),
(11, 2, 28, '22', 'local', 'done'),
(12, 2, 29, '23', 'local', 'done'),
(13, 2, 30, '22', 'local', 'done'),
(14, 2, 31, '33', 'local', 'done'),
(15, 2, 32, '55', 'local', 'done'),
(16, 3, 2, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(17, 3, 3, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(18, 3, 4, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(19, 3, 5, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(20, 3, 6, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(21, 3, 7, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(22, 3, 8, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(23, 3, 9, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(24, 3, 10, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(25, 3, 11, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(26, 3, 12, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(27, 3, 13, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(28, 3, 14, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(29, 3, 15, '50', 'Cras ultricies ligula sed magna dictum porta.', 'done'),
(30, 4, 20, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(31, 4, 21, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(32, 4, 22, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(33, 4, 23, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(34, 4, 24, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(35, 4, 25, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(36, 4, 26, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(37, 4, 27, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(38, 4, 28, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(39, 4, 29, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(40, 4, 30, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(41, 4, 31, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(42, 4, 32, '79', 'Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit.', 'done'),
(43, 5, 92, '23', 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.', 'done'),
(44, 5, 96, '50', 'Proin eget tortor risus.', 'done'),
(45, 6, 92, '23', 'Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.', 'done'),
(46, 6, 96, '50', 'Proin eget tortor risus.', 'done'),
(47, 7, 2, '5', '5', 'done'),
(48, 7, 3, '5', '5', 'done'),
(49, 7, 4, '5', '5', 'done'),
(50, 7, 5, '5', '5', 'done'),
(51, 7, 6, '5', '5', 'done'),
(52, 7, 7, '5', '5', 'done'),
(53, 7, 8, '5', '5', 'done'),
(54, 7, 9, '5', '5', 'done'),
(55, 7, 10, '5', '5', 'done'),
(56, 7, 11, '5', '5', 'done'),
(57, 7, 12, '5', '5', 'done'),
(58, 7, 13, '5', '5', 'done'),
(59, 7, 14, '5', '5', 'done'),
(60, 7, 15, '5', '5', 'done'),
(61, 8, 60, '10', '10', 'done'),
(62, 8, 61, '10', '10', 'done'),
(63, 8, 62, '10', '10', 'done'),
(64, 8, 63, '10', '10', 'done'),
(65, 8, 64, '10', '10', 'done'),
(66, 8, 65, '10', '10', 'done'),
(67, 8, 66, '10', '10', 'done'),
(68, 8, 67, '10', '10', 'done'),
(69, 8, 68, '10', '10', 'done'),
(70, 8, 69, '10', '10', 'done'),
(71, 8, 70, '10', '10', 'done'),
(72, 8, 71, '10', '10', 'done'),
(73, 8, 72, '10', '10', 'done'),
(74, 9, 92, '90', '90', 'done'),
(75, 9, 96, '90', '90', 'done'),
(76, 10, 60, '1', '2', 'done'),
(77, 10, 61, '3', '4', 'done'),
(78, 10, 62, '4', '3', 'done'),
(79, 10, 63, '12', '12', 'done'),
(80, 10, 64, '12', '12', 'done'),
(81, 10, 65, '42', '23', 'done'),
(82, 10, 66, '4', '21', 'done'),
(83, 10, 67, '2', '23', 'done'),
(84, 10, 68, '2', '234', 'done'),
(85, 10, 69, '3', '3', 'done'),
(86, 10, 70, '2', '23', 'done'),
(87, 10, 71, '2', '2', 'done'),
(88, 10, 72, '1', '2', 'done'),
(89, 11, 20, '5', '5', 'done'),
(90, 11, 21, '5', '5', 'done'),
(91, 11, 22, '5', '5', 'done'),
(92, 11, 23, '5', '5', 'done'),
(93, 11, 24, '5', '5', 'done'),
(94, 11, 25, '5', '5', 'done'),
(95, 11, 26, '5', '5', 'done'),
(96, 11, 27, '5', '5', 'done'),
(97, 11, 28, '5', '5', 'done'),
(98, 11, 29, '5', '5', 'done'),
(99, 11, 30, '5', '5', 'done'),
(100, 11, 31, '5', '5', 'done'),
(101, 11, 32, '5', '5', 'done'),
(102, 12, 4, '3', 'normal', 'done'),
(103, 12, 5, '60', 'normal', 'done'),
(104, 12, 6, '60', 'normal', 'done'),
(105, 12, 7, '3', 'normal', 'done'),
(106, 12, 8, '5', 'normal', 'done'),
(107, 12, 10, '6', 'normal', 'done'),
(108, 12, 11, '6', 'normal', 'done'),
(109, 12, 12, '-999', 'abnormal', 'done'),
(110, 12, 13, 'a', 'normal', 'done'),
(111, 12, 14, '3', 'normal', 'done'),
(112, 13, 92, '12', '335345345345', 'done'),
(113, 14, 20, 'Normal', '50', 'done'),
(114, 14, 21, 'Critical', '', 'done'),
(115, 14, 22, 'Normal', '50', 'done'),
(116, 14, 23, 'Normal', '50', 'done'),
(117, 14, 24, 'Normal', '50', 'done'),
(118, 14, 25, 'Normal', '50', 'done'),
(119, 14, 26, 'Normal', '50', 'done'),
(120, 14, 27, 'Normal', '50', 'done'),
(121, 14, 28, 'Normal', '50', 'done'),
(122, 14, 29, 'Normal', '50', 'done'),
(123, 14, 30, 'Normal', '50', 'done'),
(124, 14, 31, 'Normal', '50', 'done'),
(125, 14, 32, 'Normal', '50', 'done'),
(126, 15, 60, 'honey', 'Normal with slight changes', 'done'),
(127, 15, 61, '50', 'Normal', 'done'),
(128, 15, 62, '30', 'Irregular', 'done'),
(129, 15, 63, '29', 'Irregular', 'done'),
(130, 15, 64, '50', 'Normal', 'done'),
(131, 15, 65, '90', 'Needs further testing', 'done'),
(132, 15, 66, '78', 'Irregular', 'done'),
(133, 15, 67, '40', 'Normal with slight changes', 'done'),
(134, 15, 68, '50', 'Normal', 'done'),
(135, 15, 69, '30', 'Critical', 'done'),
(136, 15, 70, '5', 'Critical', 'done'),
(137, 15, 71, '50', 'Normal', 'done'),
(138, 15, 72, '50', 'Normal', 'done');

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
  `mer_temperature` float NOT NULL,
  `mer_temperature_unit` enum('celcius(℃)','fahrenheit(℉)','','') NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`mer_id`, `pet_id`, `mer_height`, `mer_height_unit`, `mer_weight`, `mer_weight_unit`, `mer_temperature`, `mer_temperature_unit`, `mer_heartrate`, `mer_nose`, `mer_skin`, `mer_anus`, `mer_throat`, `mer_fecal`, `mer_mouth`, `mer_lower_abdomen`, `mer_upper_abdomen`, `mer_limbs`, `mer_other_remarks`, `mer_status`, `mer_date`) VALUES
(2, 10, 10, 'meters', 10, 'kilograms', 27, 'celcius(℃)', 77, '', '', '', '', '', '', '', '', '', '', '', '2017-02-22 00:27:31'),
(3, 9, 10, 'meters', 10, 'kilograms', 27, 'celcius(℃)', 77, '', '', '', '', '', '', '', '', '', '', '', '2017-02-22 00:27:31'),
(4, 11, 2, 'meters', 20, 'kilograms', 38, 'celcius(℃)', 190, '', '', '', '', '', '', '', '', '', '', '', '2017-02-25 15:01:14'),
(5, 12, 5.5, 'inch(es)', 5.5, 'grams', 5.5, 'celcius(℃)', 10, 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'namamaga', 'confine', '2017-02-26 06:55:00'),
(6, 13, 8.8, 'inch(es)', 8.8, 'grams', 8.8, 'celcius(℃)', 5, 'manas', 'manas', 'manas', 'manas', 'manas', 'manas', 'manas', 'manas', 'manas', 'manas', 'confine', '2017-02-26 09:24:31'),
(7, 16, 5.5, 'inch(es)', 5.5, 'grams', 5.5, 'celcius(℃)', 5, 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'maitim', 'confine', '2017-02-26 10:19:34'),
(8, 17, 7.7, 'inch(es)', 7.7, 'grams', 7.7, 'celcius(℃)', 5, 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'magaspang', 'confine', '2017-02-26 11:23:34'),
(9, 18, 5.5, 'inch(es)', 5.5, 'grams', 5.5, 'celcius(℃)', 5, 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'r', 'r', '2017-02-26 12:59:48'),
(10, 19, 4.4, 'inch(es)', 4.4, 'kilograms', 111.2, 'celcius(℃)', 5, 'sipon', 'pale', '', 'red', 'yellow,''', 'nanunuyo', '', '', '', '', '', '2021-02-26 18:18:07'),
(11, 20, 9, 'inch(es)', 1.2, 'kilograms', 38, 'celcius(℃)', 20, '', '', '', '', '', '', '', '', '', '', '', '2017-03-11 18:04:39');

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
  `spe_id` int(11) NOT NULL,
  `bre_id` int(11) NOT NULL,
  `pet_date_of_birth` date DEFAULT NULL,
  `pet_gender` enum('male','female') NOT NULL,
  `pet_color` varchar(120) NOT NULL,
  `pet_remarks` text NOT NULL,
  `pet_status` enum('active','inactive','dead','released') NOT NULL,
  `pet_date_added` date NOT NULL,
  `pet_death_datetime` date NOT NULL,
  `pet_cause_of_death` text NOT NULL,
  `pet_image` varchar(100) NOT NULL,
  `pet_image_thumb` varchar(120) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `acc_id`, `pet_name`, `spe_id`, `bre_id`, `pet_date_of_birth`, `pet_gender`, `pet_color`, `pet_remarks`, `pet_status`, `pet_date_added`, `pet_death_datetime`, `pet_cause_of_death`, `pet_image`, `pet_image_thumb`) VALUES
(1, 1, 'Blacky', 2, 10, '2017-02-20', 'male', 'yellow brown', 'Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus. Sed porttitor lectus nibh. Sed porttitor lectus nibh. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Cras ultricies ligula sed magna dictum porta. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.', 'active', '2017-02-20', '0000-00-00', '', '62acff835822813ff72d06719fb02643.jpg', '62acff835822813ff72d06719fb02643_thumb.jpg'),
(2, 2, 'Charist', 2, 11, '2009-02-10', 'female', 'orange', 'Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'dead', '2017-02-20', '2017-02-15', 'Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', '3b5f559f8844b5ef5b1cd8a8958bdba4.jpg', '3b5f559f8844b5ef5b1cd8a8958bdba4_thumb.jpg'),
(3, 4, 'Sherlyn', 2, 12, '2009-02-10', 'female', 'orange', 'Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'dead', '2017-02-20', '2017-02-15', 'Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'a984d18e86a5dffca1b2c72c90ae8d30.jpeg', 'a984d18e86a5dffca1b2c72c90ae8d30_thumb.jpeg'),
(4, 4, 'mistress pet 2', 1, 13, '2009-02-10', 'female', 'orange', 'Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'active', '2017-02-20', '2017-02-15', 'Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', '3bbaa550c2d16568ba37c59e57c73636.jpg', '3bbaa550c2d16568ba37c59e57c73636_thumb.jpg'),
(5, 4, 'doggee', 1, 13, '2009-02-10', 'female', 'white', 'Cras ultricies ligula sed magna dictum porta. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'active', '2017-02-20', '2017-02-15', 'Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus suscipit tortor eget felis porttitor volutpat.', 'fb1b03f86706728bf155ff1dba75c967.jpg', 'fb1b03f86706728bf155ff1dba75c967_thumb.jpg'),
(9, 2, 'YukieChan', 2, 14, '2010-02-10', 'female', 'Yellow', 'Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', 'active', '2017-02-21', '0000-00-00', '', 'f09f8ccc4486dcd8091640f41dfd31bb.jpg', 'f09f8ccc4486dcd8091640f41dfd31bb_thumb.jpg'),
(10, 2, 'Dogge', 2, 14, '2017-02-22', 'male', 'Orange Brown', 'Super popular', 'released', '2017-02-22', '0000-00-00', '', 'e4430f395df3461abb8e6f24ec07ff08.jpg', 'e4430f395df3461abb8e6f24ec07ff08_thumb.jpg'),
(11, 4, 'JoonJae', 2, 10, '2008-01-01', 'female', 'Yellow', 'Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Sed porttitor lectus nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.', 'active', '2017-02-25', '0000-00-00', '', 'ed0764337948888274bdfa44c2aa66c7.jpg', 'ed0764337948888274bdfa44c2aa66c7_thumb.jpg'),
(12, 6, 'Pards', 2, 2, '2016-02-03', 'male', 'brown', 'may balat', 'released', '2017-02-26', '0000-00-00', '', '82fb69280e02471d98bd645ecdde4401.jpg', '82fb69280e02471d98bd645ecdde4401_thumb.jpg'),
(13, 7, 'Daisy', 3, 5, '2015-02-10', 'female', 'gray', 'mabalbon', 'released', '2017-02-26', '0000-00-00', '', 'c36c13bd43c2d2d0e63ca7ed753fbb66.jpg', 'c36c13bd43c2d2d0e63ca7ed753fbb66_thumb.jpg'),
(14, 8, 'Jhonver', 2, 1, '2017-02-28', 'male', 'white brown', 'cute, malaki ang ulo', 'active', '2017-02-26', '0000-00-00', '', '', ''),
(15, 7, 'asdas', 2, 2, '2017-02-15', 'female', 'asdas', 'fra', 'active', '2017-02-26', '0000-00-00', '', '', ''),
(17, 9, 'Kosi', 2, 12, '2015-02-17', 'male', 'white', 'maikli ang buntot', 'active', '2017-02-26', '0000-00-00', '', '', ''),
(18, 9, 'friend', 3, 5, '2017-02-16', 'male', 'yellow', 'ko', 'active', '2017-02-26', '0000-00-00', '', '', ''),
(19, 11, 'Pards', 2, 10, '2017-02-05', 'male', 'brown', 'spot', 'released', '2021-02-26', '0000-00-00', '', '1764c8b49a300465ecfa182a5d43b110.jpg', '1764c8b49a300465ecfa182a5d43b110_thumb.jpg'),
(20, 12, 'Michelle', 3, 5, '2017-03-08', 'female', 'Fusha', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada', 'active', '2017-03-11', '0000-00-00', '', '43cdac72481a7a44f34bc7d8c5253c68.jpg', '43cdac72481a7a44f34bc7d8c5253c68_thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photo_album`
--

CREATE TABLE IF NOT EXISTS `photo_album` (
  `alb_id` int(10) unsigned NOT NULL,
  `alb_name` varchar(50) NOT NULL,
  `alb_description` text NOT NULL,
  `alb_slug` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo_album`
--

INSERT INTO `photo_album` (`alb_id`, `alb_name`, `alb_description`, `alb_slug`) VALUES
(2, 'First Banner', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat.', 'first-banner');

-- --------------------------------------------------------

--
-- Table structure for table `release_voucher`
--

CREATE TABLE IF NOT EXISTS `release_voucher` (
  `rev_id` int(11) NOT NULL,
  `rev_code` varchar(12) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `rev_admin_acc_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `rev_or_number` int(11) NOT NULL,
  `rev_datetime` datetime NOT NULL,
  `rev_remarks` text NOT NULL,
  `rev_status` enum('pending','paid','free') NOT NULL,
  `rev_total` float NOT NULL,
  `rev_emailed` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `release_voucher`
--

INSERT INTO `release_voucher` (`rev_id`, `rev_code`, `acc_id`, `rev_admin_acc_id`, `pet_id`, `rev_or_number`, `rev_datetime`, `rev_remarks`, `rev_status`, `rev_total`, `rev_emailed`) VALUES
(1, '3H3TA3N2MY7U', 2, 1, 10, 2147483647, '2017-02-22 03:03:44', 'N/A', 'paid', 300, 1),
(2, 'VGQ4A6OPBWZL', 6, 1, 12, 2147483647, '2017-02-26 07:01:29', 'N/A', 'paid', 100, 1),
(3, 'EOS36FN0TLRO', 7, 1, 13, 2147483647, '2017-02-26 09:30:14', 'N/A', 'paid', 100, 1),
(4, 'K80STAVYZEFF', 11, 1, 19, 2147483647, '2021-02-26 18:51:54', 'N/A', 'paid', 100, 1),
(5, 'WDOP1RNORXLE', 12, 1, 20, 2147483647, '2017-03-11 18:08:01', 'N/A', 'paid', 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `release_voucher_lineitem`
--

CREATE TABLE IF NOT EXISTS `release_voucher_lineitem` (
  `rvl_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL,
  `exm_id` int(11) NOT NULL,
  `rvl_value` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `release_voucher_lineitem`
--

INSERT INTO `release_voucher_lineitem` (`rvl_id`, `rev_id`, `exm_id`, `rvl_value`) VALUES
(1, 1, 6, 100),
(2, 1, 2, 100),
(3, 1, 1, 100),
(4, 2, 1, 100),
(5, 3, 4, 100),
(6, 4, 1, 100),
(7, 5, 6, 120);

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
('3980ade3bf1824f23a900267e24c5c6f', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53', 1614847358, 'a:1:{s:9:"user_data";s:0:"";}'),
('6c0c7410f46f7d9f19b8d4dba3737901', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/53', 1614337021, 'a:6:{s:9:"user_data";s:0:"";s:12:"acc_username";s:15:"admin@yahoo.com";s:8:"acc_type";s:5:"admin";s:14:"acc_first_name";s:4:"User";s:13:"acc_last_name";s:5:"Admin";s:8:"acc_name";s:10:"User Admin";}'),
('77a81a0df97f8c07fbb62b4b7b66d3b4', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1489238359, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `spe_id` int(11) NOT NULL,
  `spe_name` varchar(11) NOT NULL,
  `spe_common_name` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`spe_id`, `spe_name`, `spe_common_name`) VALUES
(1, 'Others', 'others'),
(2, 'Canine', 'Dog'),
(3, 'Feline', 'Cat');

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
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`bre_id`),
  ADD KEY `species` (`spe_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exm_id`);

--
-- Indexes for table `grooming`
--
ALTER TABLE `grooming`
  ADD PRIMARY KEY (`gro_id`);

--
-- Indexes for table `laboratory_results`
--
ALTER TABLE `laboratory_results`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `laboratory_result_images`
--
ALTER TABLE `laboratory_result_images`
  ADD PRIMARY KEY (`lri_id`);

--
-- Indexes for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  ADD PRIMARY KEY (`lat_id`),
  ADD KEY `exm_id` (`exm_id`);

--
-- Indexes for table `laboratory_test_result`
--
ALTER TABLE `laboratory_test_result`
  ADD PRIMARY KEY (`ltr_id`);

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
-- Indexes for table `release_voucher_lineitem`
--
ALTER TABLE `release_voucher_lineitem`
  ADD PRIMARY KEY (`rvl_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`spe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bnr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `bre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grooming`
--
ALTER TABLE `grooming`
  MODIFY `gro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laboratory_results`
--
ALTER TABLE `laboratory_results`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `laboratory_result_images`
--
ALTER TABLE `laboratory_result_images`
  MODIFY `lri_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  MODIFY `lat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `laboratory_test_result`
--
ALTER TABLE `laboratory_test_result`
  MODIFY `ltr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `mer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `photo_album`
--
ALTER TABLE `photo_album`
  MODIFY `alb_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `release_voucher`
--
ALTER TABLE `release_voucher`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `release_voucher_lineitem`
--
ALTER TABLE `release_voucher_lineitem`
  MODIFY `rvl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
