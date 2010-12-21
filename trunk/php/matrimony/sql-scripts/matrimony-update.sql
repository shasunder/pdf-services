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
-- Dumping data for table `tm_membership`
--

INSERT INTO `tm_membership` (`Id`, `Type`, `Month`, `Profiles`, `Amount`, `Paypal`) VALUES
(1, 'classic', '3', 20, 2450, 'L8Z6YJDVJ96PU'),
(2, 'Gold', '3', 25, 2500, 'Q3Z572M2PNWM4'),
(3, 'Platinum', '3', 30, 2600, 'ghgfhghg'),
(4, 'classic', '6', 20, 3100, 'ghgfhgfhgfhgfh'),
(5, 'Gold', '6', 35, 3200, 'ghfhgfhgfhgfhgfh'),
(6, 'Platinum', '6', 45, 3500, 'gfyudfyhgfgh'),
(7, 'classic', '9', 35, 5464, 'dgdfgdfgfdgdfg'),
(8, 'Gold', '9', 45, 5556, 'fdgfdgdfgdf'),
(9, 'Platinum', '9', 50, 5645, 'dfgdfgfdgdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `tm_paymentdetail`
--

CREATE TABLE IF NOT EXISTS `tm_paymentdetail` (
  `Id` int(45) NOT NULL AUTO_INCREMENT,
  `Typeid` int(10) unsigned NOT NULL,
  `Viewedprofiles` int(45) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Profileid` varchar(45) NOT NULL,
  `ProfileCount` int(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tm_paymentdetail`
--

INSERT INTO `tm_paymentdetail` (`Id`, `Typeid`, `Viewedprofiles`, `Status`, `Profileid`, `ProfileCount`) VALUES
(1, 1, 10, 'P', 'BGGRT1', 20);

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

--
-- Dumping data for table `tm_savesearch`
--

INSERT INTO `tm_savesearch` (`Id`, `Profileid`, `Title`, `Query`, `Type`) VALUES
(33, 'BGGRT1', 'ghgfhfghh', 'select distinct tmp.FirstName,tmp.MiddleName,tmp.LastName,tmp.ProfileId,tmp.Gender,tmp.Age,tmp.Height,tmp.Religion,tmp.CastDivision,tmp.Subcaste,tmp.Star,tmp.Raasi,tmp.City,tmp.State,tmp.ResidingCountry,tmp.EducationQual,tmp.EducationSpecialization from tm_profile tmp,tm_family tmf WHERE tmp.ProfileId != ''BGGRT1'' AND tmp.ProfileId = tmf.ProfileId AND tmp.Gender = ''F'' AND tmp.Age BETWEEN ''18'' AND ''40'' AND tmp.Adminstatus = ''A'' AND tmp.MaritialStatus IN (''UnMarried'')', 'generalsrc'),
(31, 'BGGRT1', 'BGTML', 'select distinct tmp.FirstName,tmp.MiddleName,tmp.LastName,tmp.ProfileId,tmp.Gender,tmp.Age,tmp.Height,tmp.Religion,tmp.CastDivision,tmp.Subcaste,tmp.Star,tmp.Raasi,tmp.City,tmp.State,tmp.ResidingCountry,tmp.EducationQual,tmp.EducationSpecialization from tm_profile tmp,tm_family tmf WHERE tmp.ProfileId != ''BGGRT1'' AND tmp.ProfileId = tmf.ProfileId AND tmp.Gender = '''' AND tmp.Age BETWEEN '''' AND '''' AND tmp.Adminstatus = ''A'' AND (tmp.LoginId like ''%%'' OR tmp.FirstName like ''%%'' OR tmp.Citizenchip like ''%%'' OR tmp.CastDivision like ''%%'' OR tmp.ResidingCountry like ''%%'' OR tmp.EducationCat like ''%%'' OR tmp.ProfileCategory like ''%%'' OR tmp.Star like ''%%'' OR tmp.Occupation like ''%%'' OR tmp.Employementtype like ''%%'' OR tmp.MaritialStatus like ''%%'' OR tmp.Religion like ''%%'' OR tmp.Subcaste like ''%%'' OR tmp.PhysicalStatus like ''%%'' OR tmp.ChildrenLivingStatus like ''%%'' OR tmp.KujaDhosam like ''%%'' OR tmp.Food like ''%%'' OR tmp.Smoking like ''%%'' OR tmp.Drinking like ''%%'' OR tmf.Familyvalue like ''%%'' OR tmf.Familytype like ''%%'' OR tmf.Familystatus like ''%%'' OR tmf.Aboutfamily like ''%%'') LIMIT 0, 5', 'profileidsrc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
