-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2015 at 06:43 PM
-- Server version: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webnweb_shopify_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appsettings`
--

CREATE TABLE IF NOT EXISTS `tbl_appsettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(300) DEFAULT NULL,
  `redirect_url` varchar(300) DEFAULT NULL,
  `permissions` text,
  `shared_secret` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_appsettings`
--

INSERT INTO `tbl_appsettings` (`id`, `api_key`, `redirect_url`, `permissions`, `shared_secret`) VALUES
(1, '219832235ff667b427847b8d22d2e6bb', 'http://webandweb.in/shopify_testing/shopify_testing.php', 'read_products', 'd127c9c127c129fe6a36ad2d39cbfdfc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usersettings`
--

CREATE TABLE IF NOT EXISTS `tbl_usersettings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` text NOT NULL,
  `store_name` varchar(300) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `Button1_text` varchar(255) NOT NULL,
  `Button1_color` varchar(255) NOT NULL,
  `Button2_text` varchar(255) NOT NULL,
  `Button2_color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_usersettings`
--

INSERT INTO `tbl_usersettings` (`id`, `access_token`, `store_name`, `heading`, `message_text`, `Button1_text`, `Button1_color`, `Button2_text`, `Button2_color`) VALUES
(1, 'ae725c0088a30b96494423152c8caea7', 'age-verification.myshopify.com', 'Amit', 'I am testing', 'ck', 'RED', '3g', 'black'),
(2, 'ae725c0088a30b96494723158c8c69a7', 'google.com', 'Test Head', 'Testing in progress...', 'Test Left', '#000', 'Test Right', '#0f0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
