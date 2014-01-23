-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 182.50.133.140
-- Generation Time: Jan 22, 2014 at 06:45 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigneter`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `product_name` varchar(25) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` VALUES(1, 'shoes', 'nike', 'men');
INSERT INTO `product` VALUES(2, 'black shoes', 'nike', 'men');
INSERT INTO `product` VALUES(3, 'sandals', 'sports', 'women');
INSERT INTO `product` VALUES(4, 'sandals', 'nike', 'women');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` VALUES(43, 'Dharmendra', 'Singh', '625b09fb62a305f96551d8f0289f5e92', 'dharmendra25d@gmail.com');
