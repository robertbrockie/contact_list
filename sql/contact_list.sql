-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2012 at 11:49 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.3-1ubuntu9.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contact_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `number`
--

CREATE TABLE IF NOT EXISTS `number` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `contact_id` int(8) NOT NULL,
  `type` enum('MOBILE','HOME','OFFICE','OTHER') NOT NULL,
  `number` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `number`
--

