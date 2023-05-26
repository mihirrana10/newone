-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2023 at 06:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_user`
--

DROP TABLE IF EXISTS `tbl_admin_user`;
CREATE TABLE IF NOT EXISTS `tbl_admin_user` (
  `admin_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(100) DEFAULT NULL,
  `admin_user_pwd` varchar(100) DEFAULT NULL,
  `admin_user_email` varchar(100) DEFAULT NULL,
  `admin_user_phone` varchar(100) DEFAULT NULL,
  `admin_user_mobile` varchar(100) DEFAULT NULL,
  `admin_user_doj` date DEFAULT NULL,
  `admin_user_last_login` datetime DEFAULT NULL,
  `role_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_user_id`),
  KEY `admin_user_id` (`admin_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_user`
--

INSERT INTO `tbl_admin_user` (`admin_user_id`, `admin_user_name`, `admin_user_pwd`, `admin_user_email`, `admin_user_phone`, `admin_user_mobile`, `admin_user_doj`, `admin_user_last_login`, `role_type_id`) VALUES
(2, 'admin', 'admin', 'admin@gmail.com', '', '9909437540', '2017-12-20', '2017-12-20 00:00:00', 0),
(3, 'sxs', '1234567890', 'mihif', NULL, NULL, NULL, NULL, NULL),
(4, 'xsxs', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL),
(5, 'sxsx', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL),
(6, 'sxsx', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL),
(7, 'mihir', '12', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'mihir', '12', 'mihir@gmail.com', NULL, NULL, NULL, NULL, NULL),
(9, 'mihir', '12', 'mihir12@gmail.com', NULL, NULL, NULL, NULL, NULL),
(10, 'test', '123', 'testhe64@gmail.com', NULL, NULL, NULL, NULL, NULL),
(11, 'miit', '12', 'mit@gmail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `name` varchar(100) NOT NULL,
  `discription` varchar(110) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`name`, `discription`, `image`, `category_id`) VALUES
('mihir rigs', 'what is this ', 'QUsyn_Y7Bix_7856673_HappyRamNavamiInstagramPost.png', 2),
('mihir rig', 'sxdc', 'JVEXa_Bk6qF_99864259_HappyRamNavamiInstagramPost.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prodect`
--

DROP TABLE IF EXISTS `tbl_prodect`;
CREATE TABLE IF NOT EXISTS `tbl_prodect` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(110) NOT NULL,
  `product_image` varchar(110) NOT NULL,
  `product_dec` varchar(110) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prodect`
--

INSERT INTO `tbl_prodect` (`product_id`, `product_name`, `product_image`, `product_dec`, `category_id`) VALUES
(4, 'ddfddfdf', 'iaOmW_F9LHo_91181184_IDBI-Bank-Emblem.png', 'dfdfdxddfd', 2),
(3, 'earing gold', 'vaHlO_BWqkY_90361357_EmeraldandwhiteStudioShowdeGeometricModernMinimalistElegantModernBusinessCard.png', 'swdwd', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
