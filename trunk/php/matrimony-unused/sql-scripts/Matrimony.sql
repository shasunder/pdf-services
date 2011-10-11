-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema matrimony
--

--
-- Definition of table `tm_admin`
--

DROP TABLE IF EXISTS `tm_admin`;
CREATE TABLE `tm_admin` (
  `ad_ID` int(10) unsigned NOT NULL auto_increment,
  `ad_Username` varchar(45) NOT NULL,
  `ad_Password` varchar(45) NOT NULL default 'A',
  `ad_Status` enum('A','B') NOT NULL,
  `ad_DOA` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `ad_DOM` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ad_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_admin`
--

/*!40000 ALTER TABLE `tm_admin` DISABLE KEYS */;
INSERT INTO `tm_admin` (`ad_ID`,`ad_Username`,`ad_Password`,`ad_Status`,`ad_DOA`,`ad_DOM`) VALUES 
 (1,'admin','admin','A','2009-07-18 16:34:27','2009-07-18 16:34:27');
/*!40000 ALTER TABLE `tm_admin` ENABLE KEYS */;


--
-- Definition of table `tm_family`
--

DROP TABLE IF EXISTS `tm_family`;
CREATE TABLE `tm_family` (
  `ProfileId` varchar(40) NOT NULL,
  `Familyvalue` varchar(15) default NULL,
  `Familytype` varchar(15) default NULL,
  `Familystatus` varchar(20) default NULL,
  `Fatheroccupation` varchar(45) default NULL,
  `Motheroccupation` varchar(45) default NULL,
  `Brothers` varchar(3) default NULL,
  `Sisters` varchar(3) default NULL,
  `Brothersmarried` varchar(3) default NULL,
  `Sistersmarried` varchar(3) default NULL,
  `Aboutfamily` text,
  PRIMARY KEY  (`ProfileId`),
  KEY `unique` (`ProfileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




--
-- Definition of table `tm_image`
--

DROP TABLE IF EXISTS `tm_image`;
CREATE TABLE `tm_image` (
  `Profile_ID` varchar(20) default NULL,
  `Image_ID` varchar(45) default NULL,
  `Image_Name` varchar(100) default NULL,
  `Image_Status` enum('I','A','B') default 'I',
  `Image_DOM` timestamp NOT NULL default '0000-00-00 00:00:00',
  `Image_DOA` timestamp NOT NULL default '0000-00-00 00:00:00',
  `Image_Priority` varchar(45) default 'I',
  `Image_Content` text,
  `Image_Password` varchar(45) default NULL,
  `Image_autoid` int(10) unsigned NOT NULL auto_increment,
  `image_thumb` varchar(45) default NULL,
  `image_small` varchar(45) NOT NULL,
  PRIMARY KEY  USING BTREE (`Image_autoid`),
  KEY `unique` (`Image_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 DELAY_KEY_WRITE=1;



--
-- Definition of table `tm_interest`
--

DROP TABLE IF EXISTS `tm_interest`;
CREATE TABLE `tm_interest` (
  `Interest_msgid` int(10) unsigned NOT NULL auto_increment,
  `Int_id` varchar(45) NOT NULL,
  `Interest_To` varchar(45) NOT NULL,
  `Interest_From` varchar(45) NOT NULL,
  `Interest_Msgstatus` enum('N','AC','DE','RD') NOT NULL default 'N',
  `Interest_Cstatus` enum('A','B','IA') NOT NULL default 'A',
  `Interest_DOC` datetime NOT NULL,
  `Interest_DOAT` datetime NOT NULL,
  `Interest_DOB` datetime NOT NULL,
  `Interest_DOAC` datetime NOT NULL,
  PRIMARY KEY  (`Interest_msgid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;



--
-- Definition of table `tm_interestmsg`
--

DROP TABLE IF EXISTS `tm_interestmsg`;
CREATE TABLE `tm_interestmsg` (
  `Int_id` int(10) unsigned NOT NULL auto_increment,
  `Int_Msg` varchar(250) NOT NULL,
  `Int_Type` varchar(45) NOT NULL,
  `Int_Status` enum('A','B') NOT NULL default 'A',
  `Int_DOA` datetime NOT NULL,
  `Int_DOM` datetime NOT NULL,
  PRIMARY KEY  (`Int_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



--
-- Definition of table `tm_message`
--

DROP TABLE IF EXISTS `tm_message`;
CREATE TABLE `tm_message` (
  `Profile_ID` varchar(15) default NULL,
  `To_profileId` varchar(15) NOT NULL,
  `Message_Subject` varchar(50) NOT NULL,
  `Message_Content` text NOT NULL,
  `Message_Status` enum('N','RE','RP','TR') NOT NULL default 'N',
  `Message_Cstatus` enum('IA','A','B') NOT NULL default 'A',
  `Message_DOC` datetime NOT NULL,
  `Message_DOA` datetime NOT NULL,
  `Message_DOM` datetime NOT NULL,
  `Messages_ID` bigint(20) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`Messages_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



--
-- Definition of table `tm_partnerpreference`
--

DROP TABLE IF EXISTS `tm_partnerpreference`;
CREATE TABLE `tm_partnerpreference` (
  `ProfileId` varchar(40) NOT NULL,
  `pAgeFrom` char(3) default NULL,
  `pAgeTO` char(3) default NULL,
  `pMaritialStatus` varchar(25) default NULL,
  `pMotherTonque` varchar(250) default NULL,
  `pReligion` varchar(250) default NULL,
  `pCastDivision` varchar(250) default NULL,
  `pSubcaste` varchar(20) default NULL,
  `pEducationCat` varchar(300) default NULL,
  `pOccupation` varchar(250) default NULL,
  `pEmployementtype` varchar(250) default NULL,
  `pCitizenchip` varchar(250) default NULL,
  `pResidingCountry` varchar(250) default NULL,
  `pState` varchar(250) default NULL,
  `pCity` varchar(250) default NULL,
  `pFood` varchar(25) default NULL,
  `pAboutPartner` text,
  `pPhysicalStatus` varchar(250) default NULL,
  `pHeightFrom` varchar(15) default NULL,
  `pHeightTo` varchar(15) default NULL,
  `pKujaDhosam` varchar(25) default NULL,
  PRIMARY KEY  (`ProfileId`),
  KEY `unique` (`ProfileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Definition of table `tm_profile`
--

DROP TABLE IF EXISTS `tm_profile`;
CREATE TABLE `tm_profile` (
  `LoginId` varchar(40) NOT NULL,
  `ProfileId` varchar(40) NOT NULL,
  `EmailId` varchar(40) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `ProfileStatus` char(1) NOT NULL,
  `CreatedBy` varchar(45) NOT NULL,
  `ProfileCategory` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) default NULL,
  `LastName` varchar(45) ,
  `Gender` char(1) NOT NULL,
  `DOB` date ,
  `Age` char(3) NOT NULL,
  `MaritialStatus` varchar(45) ,
  `NoofChildren` char(3) default NULL,
  `ChildrenLivingStatus` varchar(20) default NULL,
  `Citizenchip` varchar(45) ,
  `ResidingCountry` varchar(45) ,
  `Religion` varchar(45) NOT NULL,
  `CastDivision` varchar(45) NOT NULL,
  `Subcaste` varchar(45) default NULL,
  `State` varchar(45) default NULL,
  `City` varchar(45) default NULL,
  `Zip` varchar(15) default NULL,
  `Tele_country` varchar(8) ,
  `Tele_std` varchar(15) ,
  `Tele_Phone` varchar(15) default NULL,
  `Tee_mobile` varchar(15) default NULL,
  `Food` varchar(15) default NULL,
  `Smoking` varchar(15) default NULL,
  `Drinking` varchar(15) default NULL,
  `Complaexion` varchar(15) default NULL,
  `BodyType` varchar(15) default NULL,
  `Height` varchar(20) default NULL,
  `Weight` varchar(15) default NULL,
  `PhysicalStatus` varchar(25) default NULL,
  `BloodGroup` varchar(25) default NULL,
  `EducationCat` varchar(45) default NULL,
  `EducationQual` varchar(45) default NULL,
  `EducationSpecialization` varchar(45) default NULL,
  `Occupation` varchar(45) default NULL,
  `Employementtype` varchar(45) default NULL,
  `AnnCurrency` varchar(45) default NULL,
  `Salary` varchar(25) default NULL,
  `Gothram` varchar(25) default NULL,
  `Star` varchar(45) default NULL,
  `Raasi` varchar(25) default NULL,
  `KujaDhosam` varchar(15) default NULL,
  `DOJ` datetime default NULL,
  `DOA` datetime default NULL,
  `DOBK` datetime default NULL,
  `LastVisted` datetime default NULL,
  `tmid_count` int(11) default NULL,
  `tm_autoid` int(10) unsigned NOT NULL auto_increment,
  `Address` text,
  `AboutMe` text,
  `DOM` datetime NOT NULL,
  `Adminstatus` enum('A','B') ,
  `visit_id` int(10) unsigned NOT NULL,
  `contrycode` int(10) unsigned ,
  `register_stage` text,
  PRIMARY KEY  USING BTREE (`tm_autoid`),
  KEY `unique` (`ProfileId`,`tmid_count`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;



--
-- Definition of procedure `Insert_Family`
--

DROP PROCEDURE IF EXISTS `Insert_Family`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE PROCEDURE `Insert_Family`(
  `ValProfileId` VARCHAR(40),
  `ValFamilyvalue` VARCHAR(15),
  `ValFamilytype` VARCHAR(15),
  `ValFamilystatus` VARCHAR(20),
  `ValFatheroccupation` varchar(45),
  `ValMotheroccupation` varchar(45) ,
  `ValBrothers` INT(2) ,
  `ValSisters` INT(2),
  `ValBrothersmarried` INT(2) ,
  `ValSistersmarried` INT(2) ,
  `ValAboutfamily` TEXT
  )
BEGIN
INSERT INTO matrimony.tm_family VALUES
(
ValProfileId,
ValFamilyvalue,
ValFamilytype,
ValFamilystatus,
ValFatheroccupation,
ValMotheroccupation,
ValBrothers,
ValSisters,
ValBrothersmarried,
ValSistersmarried,
ValAboutfamily
);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Insert_PartnerPreference`
--

DROP PROCEDURE IF EXISTS `Insert_PartnerPreference`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE PROCEDURE `Insert_PartnerPreference`(


  ValProfileId varchar(40) ,
  ValAgeFrom char(3) ,
  ValAgeTO char(3) ,
  ValMaritialStatus varchar(20) ,
  ValMotherTonque varchar(15) ,
  ValReligion varchar(250) ,
  ValCastDivision varchar(250) ,
  ValSubcaste varchar(20) ,
  ValEducationCat varchar(300) ,
  ValOccupation varchar(250) ,
  ValEmployementtype varchar(250) ,
  ValCitizenchip varchar(250) ,
  ValValResidingCountry varchar(250) ,
  ValState varchar(250) ,
  ValCity varchar(250) ,
  ValFood char(1) ,
  ValAboutPartner Text ,
  ValPhysicalStatus varchar(25) ,
  ValHeightFrom VARCHAR(15) ,
  ValHeightTo VARCHAR(15) ,
  ValKujaDhosam char(1)
  )
BEGIN

INSERT INTO matrimony.tm_partnerpreference VALUES(



  ValProfileId  ,
  ValAgeFrom  ,
  ValAgeTO  ,
  ValMaritialStatus  ,
  ValMotherTonque  ,
  ValReligion  ,
  ValCastDivision  ,
  ValSubcaste  ,
  ValEducationCat ,
  ValOccupation  ,
  ValEmployementtype  ,
  ValCitizenchip  ,
  ValValResidingCountry  ,
  ValState  ,
  ValCity  ,
  ValFood  ,
  ValAboutPartner  ,
  ValPhysicalStatus  ,
  ValHeightFrom  ,
  ValHeightTo  ,
  ValKujaDhosam)

;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Insert_Profile`
--

DROP PROCEDURE IF EXISTS `Insert_Profile`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE PROCEDURE `Insert_Profile`(
  `ValLoginId` varchar(40),
  `ValEmailId` varchar(40),
  `ValPassword` varchar(60),
  `ValCreatedBy` varchar(45),
  `ValProfileCategory` varchar(45),
  `ValFirstName` varchar(45) ,
  `ValMiddleName` varchar(45) ,
  `ValLastName` varchar(45),
  `ValGender` char(1) ,
  `ValDOB` datetime ,
  `ValAge` char(3),
  `ValMaritialStatus` varchar(45) ,
  `ValNoofChildren` char(3) ,
  `ValChildrenLivingStatus` varchar(10) ,
  `ValCitizenchip` varchar(45),
  `ValResidingCountry` varchar(45) ,
  `ValReligion` varchar(45) ,
  `ValCastDivision` varchar(45) ,
  `ValSubcaste` varchar(45) ,
  `ValTele_country` varchar(8),
  `ValTele_std` varchar(15) ,
  `ValTele_Phone` varchar(15) ,
  `ValTele_mobile` varchar(15),
  `ValMotherTonque` varchar(15)

  )
BEGIN
DECLARE getProfile_ID varchar(45);
DECLARE ProfileCount varchar(8);

select count(ProfileId) into ProfileCount from matrimony.tm_profile where ProfileCategory=ValProfileCategory;


case ValProfileCategory
when 'Tamil' then SET getProfile_ID=concat('TA',ProfileCount+1);
when 'Telugu' then SET getProfile_ID=concat('TE',ProfileCount+1);
when 'Assamese' then SET getProfile_ID=concat('AS',ProfileCount+1);
when 'Bengali' then SET getProfile_ID=concat('BE',ProfileCount+1);
when 'Bodo' then SET getProfile_ID=concat('BO',ProfileCount+1);
when 'Dogri' then SET getProfile_ID=concat('DO',ProfileCount+1);
when 'Gujarati' then SET getProfile_ID=concat('GU',ProfileCount+1);
when 'Hindi' then SET getProfile_ID=concat('HI',ProfileCount+1);
when 'Kannada' then SET getProfile_ID=concat('KN',ProfileCount+1);
when 'Kashmiri' then SET getProfile_ID=concat('KS',ProfileCount+1);
when 'Konkani' then SET getProfile_ID=concat('KO',ProfileCount+1);
when 'Maithili' then SET getProfile_ID=concat('MI',ProfileCount+1);
when 'Malayali' then SET getProfile_ID=concat('ML',ProfileCount+1);
when 'Manipuri' then SET getProfile_ID=concat('MN',ProfileCount+1);
when 'Marathi' then SET getProfile_ID=concat('MA',ProfileCount+1);
when 'Marwari' then SET getProfile_ID=concat('MR',ProfileCount+1);
when 'Nepali' then SET getProfile_ID=concat('NP',ProfileCount+1);
when 'Oriya' then SET getProfile_ID=concat('OR',ProfileCount+1);
when 'Parsi' then SET getProfile_ID=concat('PR',ProfileCount+1);
when 'Punjabi' then SET getProfile_ID=concat('PN',ProfileCount+1);
when 'Sanskrit' then SET getProfile_ID=concat('Sk',ProfileCount+1);
when 'Santhali' then SET getProfile_ID=concat('SN',ProfileCount+1);
when 'Sindhi' then SET getProfile_ID=concat('SI',ProfileCount+1);
when 'Urdu' then SET getProfile_ID=concat('UR',ProfileCount+1);
when 'Others' then SET getProfile_ID=concat('OT',ProfileCount+1);






end case;

INSERT INTO matrimony.tm_Profile VALUES
(
  ValLoginId ,
getProfile_ID,
  ValEmailId,
  ValPassword,
  'I',
  ValCreatedBy,
  ValProfileCategory,
  ValFirstName,
  ValMiddleName,
  ValLastName,
  ValGender,
  ValDOB,
  ValAge,
  ValMaritialStatus,
  ValNoofChildren,
  ValChildrenLivingStatus,
  ValCitizenchip,
  ValResidingCountry,
  ValReligion,
  ValCastDivision,
  ValSubcaste,
   NULL,
   NULL,
   null,
   null,
  ValTele_country,
  ValTele_std,
  ValTele_Phone,
  ValTele_mobile,
  NULL,
  NULL,
  NULL,
   NULL,
   NULL,
   NULL,

   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   NULL,
   ValMotherTonque,
  current_Date(),
   NULL,
   NULL,
  current_Date()
);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `Insert_Profile2`
--

DROP PROCEDURE IF EXISTS `Insert_Profile2`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE PROCEDURE `Insert_Profile2`(


  `ValProfileId` varchar(40) ,
  `ValFood` char(1) ,
  `ValSmoking` char(1) ,
  `ValDrinking` char(1) ,
  `ValComplaexion` char(1) ,
  `ValBodyType` char(1) ,
  `ValBloodGroup` varchar(5) ,
  `ValHeight` VARCHAR(15) ,
  `ValWeight` VARCHAR(15) ,
  `ValWeightLBS` VARCHAR(15) ,
  `ValPhysicalStatus` varchar(25) ,
  `ValAddress` varchar(150) ,
  `ValZip` varchar(15) ,
  `ValState` varchar(45) ,
  `ValCity` varchar(45) ,
  `ValEducationCat` varchar(45) ,
  `ValEducationQual` varchar(45) ,
  `ValEducationSpecialization` varchar(45) ,
  `ValOccupation` varchar(45) ,
  `ValEmployementtype` varchar(45) ,
  `ValAnnCurrency` varchar(45) ,
  `ValSalary` varchar(15) ,
  `ValGothram` varchar(15) ,
  `ValStar` varchar(15) ,
  `ValRaasi` varchar(15) ,
  `ValKujaDhosam` char(1)
  )
BEGIN

Update matrimony.tm_Profile SET

  ProfileId=ValProfileId ,
  Food=ValFood  ,
  Smoking=ValSmoking,
  Drinking=ValDrinking,
  Complaexion=ValComplaexion ,
  BodyType=ValBodyType ,
  BloodGroup=ValBloodGroup ,
  Height=ValHeight ,
  Weight=ValWeight ,
  WeightLBS=ValWeightLBS ,
  PhysicalStatus=ValPhysicalStatus ,
  Address=ValAddress ,
  Zip=ValZip ,
  State=ValState ,
  City=ValCity ,
  EducationCat=ValEducationCat ,
  EducationQual=ValEducationQual ,
  EducationSpecialization=ValEducationSpecialization,
  Occupation=ValOccupation ,
  Employementtype=ValEmployementtype ,
  AnnCurrency=ValAnnCurrency ,
  Salary=ValSalary ,
  Gothram=ValGothram ,
  Star=ValStar ,
  Raasi=ValRaasi ,
  KujaDhosam=  ValKujaDhosam

;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
