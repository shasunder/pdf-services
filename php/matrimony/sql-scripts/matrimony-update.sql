-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2010 at 04:20 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_membership`
--

CREATE TABLE IF NOT EXISTS `tm_membership` (
  `Id` int(45) NOT NULL AUTO_INCREMENT,
  `Type` varchar(45) NOT NULL,
  `Month` varchar(45) NOT NULL,
  `Profiles` int(45) NOT NULL,
  `Amount` int(45) NOT NULL,
  `Paypal` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


--
-- Table structure for table `tm_paymentdetail`
--

CREATE TABLE IF NOT EXISTS `tm_paymentdetail` (
  `Id` int(45) NOT NULL AUTO_INCREMENT,
  `Typeid` int(10) unsigned NOT NULL,
  `Viewedprofiles` int(45) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime,
  `Status` varchar(45) NOT NULL,
  `Profileid` varchar(45) NOT NULL,
  `ProfileCount` int(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Table structure for table `tm_savesearch`
--

CREATE TABLE IF NOT EXISTS `tm_savesearch` (
  `Id` int(45) NOT NULL AUTO_INCREMENT,
  `Profileid` varchar(45) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Query` text NOT NULL,
  `Type` varchar(14) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
