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
-- Dumping data for table `tm_family`
--

/*!40000 ALTER TABLE `tm_family` DISABLE KEYS */;
INSERT INTO `tm_family` (`ProfileId`,`Familyvalue`,`Familytype`,`Familystatus`,`Fatheroccupation`,`Motheroccupation`,`Brothers`,`Sisters`,`Brothersmarried`,`Sistersmarried`,`Aboutfamily`) VALUES 
 ('BGBDO1','Moderate','Nuclear Family','Upper Middle Class','Labour','Not Working','1','0','0','0','About Family'),
 ('BGBGL1','Orthodox','Joint Family','Middle Class','Labour','Not Working','1','1','1','1','About Family'),
 ('BGBGL7','Orthodox','Joint Family','Middle Class','Select','Select','','','','',''),
 ('BGGRT1','Moderate','Others','Rich','Others','Others','','','','',''),
 ('BGTML1','Traditional','Nuclear Family','Middle Class','Salaried','Salaried','1','','','','About Family'),
 ('BGTML10','Moderate','Nuclear Family','Middle Class','Salaried','Not Working','1','1','','1','family    '),
 ('BGTML2','Liberal','Joint Family','Middle Class','Salaried','Not Working','','','','',''),
 ('BGTML4','Traditional','Nuclear Family','Upper Middle Class','Salaried','Salaried','','1','','1','About Family'),
 ('BGTML5','Liberal','Joint Family','Upper Middle Class','Salaried','Not Working','1','1','1','1','About Family');
/*!40000 ALTER TABLE `tm_family` ENABLE KEYS */;


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
-- Dumping data for table `tm_image`
--

/*!40000 ALTER TABLE `tm_image` DISABLE KEYS */;
INSERT INTO `tm_image` (`Profile_ID`,`Image_ID`,`Image_Name`,`Image_Status`,`Image_DOM`,`Image_DOA`,`Image_Priority`,`Image_Content`,`Image_Password`,`Image_autoid`,`image_thumb`,`image_small`) VALUES 
 ('BGTML4','BGT_1','BGTML4_add6_9783.jpg','A','2009-09-14 17:14:32','2009-08-07 16:05:26','I','update',NULL,1,'emb_BGTML4_add6_9783_E_T.jpg','BGTML4_add6_9783_E.jpg'),
 ('BGBDO1','BGT_2','BGBDO1_add1_9362.jpg','A','2009-08-07 16:06:09','2009-08-07 16:06:09','I','new',NULL,2,'BGBDO1_add1_9362_T.jpg','BGBDO1_add1_9362_E.jpg'),
 ('BGTML1','BGT_3','BGTML1_vennilagp_7547.jpg','A','2009-08-10 17:14:50','2009-08-10 17:14:50','I','new',NULL,3,'BGTML1_vennilagp_7547_T.jpg','BGTML1_vennilagp_7547_E.jpg'),
 ('BGTML1','BGT_5','BGTML1_ph3_3900.jpg','A','2009-09-14 17:17:56','2009-08-11 10:43:39','I','update',NULL,5,'fsy_BGTML1_ph3_3900_E_T.jpg','BGTML1_ph3_3900_E.jpg'),
 ('BGTML1','BGT_6','BGTML1_tmite2_m_1790.jpg','A','2009-09-14 17:14:49','2009-08-11 10:45:26','I','update',NULL,6,'reu_BGTML1_tmite2_m_1790_E_T.jpg','BGTML1_tmite2_m_1790_E.jpg'),
 ('BGTML2','BGT_6','BGTML2_ajith_9668.jpg','I','2009-09-14 17:14:49','2009-08-11 15:45:46','I','update',NULL,7,'reu_BGTML1_tmite2_m_1790_E_T.jpg','BGTML2_ajith_9668_E.jpg'),
 ('BGTML2','BGT_7','BGTML2_john_cena_4735.jpg','I','2009-09-08 20:17:32','2009-08-28 11:53:28','I','update',NULL,8,'yam_BGTML2_john_cena_4735_E_T.jpg','BGTML2_john_cena_4735_E.jpg');
/*!40000 ALTER TABLE `tm_image` ENABLE KEYS */;


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
-- Dumping data for table `tm_interest`
--

/*!40000 ALTER TABLE `tm_interest` DISABLE KEYS */;
INSERT INTO `tm_interest` (`Interest_msgid`,`Int_id`,`Interest_To`,`Interest_From`,`Interest_Msgstatus`,`Interest_Cstatus`,`Interest_DOC`,`Interest_DOAT`,`Interest_DOB`,`Interest_DOAC`) VALUES 
 (1,'1','BGTML2','BGTML1','N','A','2009-07-24 14:54:28','2009-07-24 14:54:28','2009-07-24 14:54:28','2009-07-24 14:54:28'),
 (2,'3','BGTML1','BGTML2','N','A','2009-07-25 13:03:46','2009-07-25 13:03:46','2009-07-25 13:03:46','2009-07-25 13:03:46'),
 (3,'3','BGTML4','BGTML1','N','A','2009-07-29 12:56:15','2009-07-29 12:56:15','2009-07-29 12:56:15','2009-07-29 12:56:15'),
 (4,'3','BGTML1','BGTML4','N','A','2009-07-29 12:56:15','2009-07-29 12:56:15','2009-07-29 12:56:15','2009-07-29 12:56:15'),
 (5,'2','BGTML1','BGTML4','N','A','2009-07-30 14:48:59','2009-07-30 14:48:59','2009-07-30 14:48:59','2009-07-30 14:48:59'),
 (6,'2','BGTML4','BGTML1','N','A','2009-07-30 18:24:32','2009-07-30 18:24:32','2009-07-30 18:24:32','2009-07-30 18:24:32'),
 (7,'2','BGBDO1','BGTML1','N','A','2009-08-11 15:08:40','2009-08-11 15:08:40','2009-08-11 15:08:40','2009-08-11 15:08:40'),
 (8,'2','BGTML1','BGBDO1','N','A','2009-08-11 15:09:24','2009-08-11 15:09:24','2009-08-11 15:09:24','2009-08-11 15:09:24'),
 (9,'1','BGTML1','BGTML2','AC','IA','2009-08-11 15:54:08','2009-08-11 15:52:52','2009-08-11 15:52:52','2009-08-11 15:52:52'),
 (10,'2','BGTML1','BGTML2','AC','IA','2009-08-11 15:54:03','2009-08-11 15:53:00','2009-08-11 15:53:00','2009-08-11 15:53:00');
/*!40000 ALTER TABLE `tm_interest` ENABLE KEYS */;


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
-- Dumping data for table `tm_interestmsg`
--

/*!40000 ALTER TABLE `tm_interestmsg` DISABLE KEYS */;
INSERT INTO `tm_interestmsg` (`Int_id`,`Int_Msg`,`Int_Type`,`Int_Status`,`Int_DOA`,`Int_DOM`) VALUES 
 (1,'Interested in your profile Would like to know more about you Please Accept if you are interested too','I','A','2009-02-20 10:41:47','2009-07-24 03:25:09'),
 (2,'My parents and I like your profile Please send me your contact details','I','A','2009-02-20 10:42:41','2009-07-24 03:25:02'),
 (3,'I feel we have a lot in common Please go through my profile and reply to my interest','I','A','2009-02-20 10:43:32','2009-08-10 17:35:45');
/*!40000 ALTER TABLE `tm_interestmsg` ENABLE KEYS */;


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
-- Dumping data for table `tm_message`
--

/*!40000 ALTER TABLE `tm_message` DISABLE KEYS */;
INSERT INTO `tm_message` (`Profile_ID`,`To_profileId`,`Message_Subject`,`Message_Content`,`Message_Status`,`Message_Cstatus`,`Message_DOC`,`Message_DOA`,`Message_DOM`,`Messages_ID`) VALUES 
 ('BGTML1','BGTML2','from vennila','hai prabu just testing message.....','N','A','2009-07-24 14:55:20','2009-07-24 14:55:20','2009-07-24 14:55:20',1),
 ('BGTML4','BGTML1','hai nila','this is from','N','A','2009-07-29 13:01:39','2009-07-29 13:01:39','2009-08-10 17:35:22',2),
 ('BGTML1','BGTML2','hai','hai......','N','A','2009-08-11 16:08:12','2009-08-11 16:08:12','2009-08-11 16:08:12',3),
 ('BGTML2','BGTML1','hai','hai......','N','A','2009-08-11 16:11:24','2009-08-11 16:11:24','2009-08-11 16:11:24',4),
 ('BGTML2','BGTML1','sdf','dsfdsf','N','A','2009-08-11 16:12:05','2009-08-11 16:12:05','2009-08-11 16:12:05',5);
/*!40000 ALTER TABLE `tm_message` ENABLE KEYS */;


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
-- Dumping data for table `tm_partnerpreference`
--

/*!40000 ALTER TABLE `tm_partnerpreference` DISABLE KEYS */;
INSERT INTO `tm_partnerpreference` (`ProfileId`,`pAgeFrom`,`pAgeTO`,`pMaritialStatus`,`pMotherTonque`,`pReligion`,`pCastDivision`,`pSubcaste`,`pEducationCat`,`pOccupation`,`pEmployementtype`,`pCitizenchip`,`pResidingCountry`,`pState`,`pCity`,`pFood`,`pAboutPartner`,`pPhysicalStatus`,`pHeightFrom`,`pHeightTo`,`pKujaDhosam`) VALUES 
 ('BGTML1','23','27','UnMarried','Tamil','Hindu','Nadar','','Bachelors - Engineering/ Computers,Masters - Engineering/ Computers,Bachelors - Arts/ Science/Commerce/ Others,Masters - Arts/ Science/ Commerce/ Others','Salaried','Government,Private','Australia,India,Singapore,United Kingdom,United States','India','Tamil Nadu','Tenkasi','Non-Vegetatrian','About Partner','Normal','4ft 5in 134cm','5ft 10in 177cm','Dont Know'),
 ('BGTML10','24','27','UnMarried','Tamil','Hindu','Nadar','','Bachelors - Engineering/ Computers,Masters - Engineering/ Computers,Bachelors - Arts/ Science/Commerce/ Others,Masters - Arts/ Science/ Commerce/ Others','Salaried','Government,Private','Australia,India,Singapore,United Kingdom,United States','India','','Chennai/Madras','Non-Vegetatrian','About Partner','Normal','5ft 6in 167cm','5ft 8in 172cm','No'),
 ('BGTML2','18','21','UnMarried','Tamil','Hindu','Kongu Vellala Gounder','','Masters - Arts/ Science/ Commerce/ Others','Salaried','Private','Guadeloupe','India','Tamil Nadu','Chennai/Madras','Non-Vegetatrian','AboutPartner..','Normal','5ft  2in  157cm','5ft  7in  170cm','Dont Know');
/*!40000 ALTER TABLE `tm_partnerpreference` ENABLE KEYS */;


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
  `LastName` varchar(45) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `Age` char(3) NOT NULL,
  `MaritialStatus` varchar(45) NOT NULL,
  `NoofChildren` char(3) default NULL,
  `ChildrenLivingStatus` varchar(20) default NULL,
  `Citizenchip` varchar(45) NOT NULL,
  `ResidingCountry` varchar(45) NOT NULL,
  `Religion` varchar(45) NOT NULL,
  `CastDivision` varchar(45) NOT NULL,
  `Subcaste` varchar(45) default NULL,
  `State` varchar(45) default NULL,
  `City` varchar(45) default NULL,
  `Zip` varchar(15) default NULL,
  `Tele_country` varchar(8) NOT NULL,
  `Tele_std` varchar(15) NOT NULL,
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
  `Adminstatus` enum('A','B') NOT NULL,
  `visit_id` int(10) unsigned NOT NULL,
  `contrycode` int(10) unsigned NOT NULL,
  PRIMARY KEY  USING BTREE (`tm_autoid`),
  KEY `unique` (`ProfileId`,`tmid_count`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_profile`
--

/*!40000 ALTER TABLE `tm_profile` DISABLE KEYS */;
INSERT INTO `tm_profile` (`LoginId`,`ProfileId`,`EmailId`,`Password`,`ProfileStatus`,`CreatedBy`,`ProfileCategory`,`FirstName`,`MiddleName`,`LastName`,`Gender`,`DOB`,`Age`,`MaritialStatus`,`NoofChildren`,`ChildrenLivingStatus`,`Citizenchip`,`ResidingCountry`,`Religion`,`CastDivision`,`Subcaste`,`State`,`City`,`Zip`,`Tele_country`,`Tele_std`,`Tele_Phone`,`Tee_mobile`,`Food`,`Smoking`,`Drinking`,`Complaexion`,`BodyType`,`Height`,`Weight`,`PhysicalStatus`,`BloodGroup`,`EducationCat`,`EducationQual`,`EducationSpecialization`,`Occupation`,`Employementtype`,`AnnCurrency`,`Salary`,`Gothram`,`Star`,`Raasi`,`KujaDhosam`,`DOJ`,`DOA`,`DOBK`,`LastVisted`,`tmid_count`,`tm_autoid`,`Address`,`AboutMe`,`DOM`,`Adminstatus`,`visit_id`,`contrycode`) VALUES 
 ('Vennilagp','BGTML1','vennilagp@gmail.com','krishnan','I','Self','Tamil','Ponvennila','gopala','Krishnan','F','1986-03-08','23','UnMarried','','','United States','India','Hindu','Nadar','Sub nadar','','Tenkasi','627852','+91','4633','9884606690','9884606690','Non-Vegetatrian','Non-Smoker','Occasionally','Fair','Slim','5ft 4in 162cm','44kg','Normal','O  ve','Masters - Arts/ Science/ Commerce/ Others','M.Sc','Information Technology','Salaried','Private','India - Rs','300000','Siva','Dhanista / Avittam','Kumbh (Aquarius)','No','2009-07-23 16:47:00','2009-08-05 14:20:11','0000-00-00 00:00:00','2009-10-11 10:50:45',1,1,'      nadar street,ayikudy.      ','About Me','2009-09-03 15:09:24','A',71,105),
 ('Prabu','BGTML2','abprabu84@gmail.com','prabu','B','Self','Tamil','Prabu','','B','M','1984-10-10','24','UnMarried','','','India','India','Hindu','Kongu Vellala Gounder','','Tamil Nadu','Chennai/Madras','600047','+91','44','9884978970','9884978970','Non-Vegetatrian','Non-Smoker','Non-liquor','Fair','Slim','5ft 4in 162cm','57kg','Normal','O  ve','Masters - Engineering/ Computers','Post graduate','','Salaried','Private','India - Rs','100000','','Vishaka /Vishakam','Vrishchik (Scorpio)','Dont Know','2009-07-24 00:16:24','2009-08-11 16:24:19','2009-08-27 17:03:07','2010-03-08 14:48:58',2,2,'       chennai-47       ','I am prabu..','2009-08-27 17:03:07','B',56,105),
 ('Santhanam','BGTML3','santhanam@gmail.com','aaaaa','B','Self','Tamil','Santhanam','','San','M','1985-03-02','23','UnMarried','','','India','India','Hindu','Gandla','',NULL,NULL,NULL,'+91','','','9884561232',NULL,NULL,NULL,'Wheatish','Slim','5ft 4in 162cm','54kg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Siva','Poorvabadrapada / Puratathi','Kark (Cancer)','No','2009-07-24 21:47:57','2009-08-11 16:24:19','2009-08-27 17:03:07','2009-07-25 12:01:53',3,3,NULL,NULL,'2009-08-27 17:03:07','B',5,105),
 ('Beng','BGBGL1','beng@gmail.com','beng','A','Father','Bengali','Fname','Mname','Lname','M','1980-03-04','29','UnMarried','','','Afghanistan','Antigua and Barbuda','Christian','Anglican/Episcopal','','Saint John',' Saint Johnston Village ','EREW34','+268','4656','54534534','98767567777','Non-Vegetatrian','Regular','Regular','Wheatish','Slim','5ft 4in 162cm','48kg','Normal','A1 +ve','Masters - Arts/ Science/ Commerce/ Others','M.Sc','','Unable to Work','','','','','Poorvabadrapada / Puratathi','Kark (Cancer)','No','2009-07-29 15:22:57','0000-00-00 00:00:00','0000-00-00 00:00:00','2009-07-30 18:53:01',1,6,'Address..........',NULL,'2009-07-29 15:22:57','B',4,9),
 ('Sujanila','BGBDO1','sujinila@gmail.com','nilasri','A','Self','Bodo','Bodofname','mname','Lname','M','1986-03-08','23','UnMarried','','','Australia','India','Hindu','Nadar','','Karnataka','bangalore','','91','44','4567321','9876543210','Vegetarian','Non-Smoker','Non-liquor','Very Fair','Average','5ft 4in 162cm','51kg','Normal','B +ve','Masters - Arts/ Science/ Commerce/ Others','MCA','','Salaried','Private','India - Rs','340000','','Punarvasu / Punarpusam','Kark (Cancer)','No','2009-07-30 10:15:06','2009-08-11 16:24:27','0000-00-00 00:00:00','2009-08-07 16:06:00',0,7,'Address ','AboutMe ','2009-08-11 16:24:27','A',1,105),
 ('Kannada','BGKND1','kannada@gmail.com','kannada','A','Father','Kannada','Kf','Km','Kl','M','1983-02-02','26','UnMarried','','','Canada','Australia','Christian','CSI','',NULL,NULL,NULL,'+61','222','21323232323','9876543210',NULL,NULL,NULL,NULL,NULL,'5ft 4in 162cm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-07-30 14:31:39',NULL,NULL,NULL,1,8,NULL,NULL,'2009-07-30 14:31:39','B',1,14),
 ('Sathish','BGTML5','sathishkumar.ar@gmail.com','aaaaaa','A','Self','Tamil','sathish','','R','M','1983-08-27','26','UnMarried','','','India','India','Hindu','Kongu Vellala Gounder','Sathanthaikulam','Tamil Nadu','Chennai/Madras','600042','+91','044','4645645646','4645645646','Non-Vegetatrian','Non-Smoker','Non-liquor','Fair','Average','5ft  6in  167cm','56kg','Normal','A1B +ve','Masters - Arts/ Science/ Commerce/ Others','MCA','computerscience','Salaried','Private','India - Rs','','','Revathi','Meen (Pisces)','No','2009-07-30 23:17:05','2009-09-01 17:00:41','2009-09-01 17:00:34','2009-08-08 01:00:53',5,9,' yiuiyuiuiuiui ','','2009-09-01 18:41:29','A',7,105),
 ('Priya','BGTML10','priya_devi_dhivya@yahoo.co.in','priya','A','Self','Tamil','Sathiya','','Sree','F','1985-11-15','24','UnMarried','','','India','India','Hindu','Karuneekar','','','Chennai/Madras','600042','+91','044','7677843','357795467','Vegetarian','Non-Smoker','Non-liquor','Brown','Average','5ft  3in  160cm','54kg','Normal','A2B +ve','Bachelors - Engineering/ Computers','B.E','computer science','Salaried','Private','India - Rs','','','Pushya / Poosam / Pooyam','Kark (Cancer)','No','2009-08-10 12:22:20','0000-00-00 00:00:00','0000-00-00 00:00:00','2009-08-12 10:28:49',10,10,'          chennai-42           ','hi....','2009-08-10 18:34:21','B',6,105),
 ('Bose','BGGRT1','bose@gmail.com','bose','A','Self','Gujarati','Chandra','','Bose','M','1985-02-02','24','UnMarried','','','India','India','Hindu','Caste No Bar','','Tamil Nadu','chennai','','+91','','','565458785454','Non-Vegetatrian','Non-Smoker','Non-liquor','Fair','Slim','177cm','66kg','Mentally challenged','O +ve','Bachelors - Engineering/ Computers','B.E','','Salaried','Private','India - Rs','46445','','Ardra / Thiruvathira','Vrishabh (Taurus)','No','2009-08-10 14:30:40','0000-00-00 00:00:00','0000-00-00 00:00:00','2009-08-10 14:34:17',1,11,'chennai10047',NULL,'2009-08-10 14:30:40','B',1,105),
 ('Ganesh','BGTML11','ganesh@gmail.com','ganesh','B','Self','Tamil','Ganesh','','K','M','1986-08-19','23','UnMarried','','','India','India','Hindu','Caste No Bar','','Tamil Nadu','Chennai/Madras','600042','+91','44','124523124512','12325212421','Vegetarian','Non-Smoker','Non-liquor','Very Fair','Average','5ft  8in  172cm','54kg','Normal','O +ve','Bachelors - Engineering/ Computers','B.E','','Salaried','Government','Afghanistan - AFA','','','Anuradha / Anusham / Anizham','Mesh (Aries)','Dont Know','2009-08-10 16:53:36','2009-08-11 16:24:19','2009-08-27 17:03:07','0000-00-00 00:00:00',0,12,'dfgdfgfgdfgdfg','','2009-08-27 17:03:07','B',0,105),
 ('Abprabu','BGBGL7','abprabu@gmail.com','abprabu','A','Self','Bengali','First Name','','Last Name','M','1955-02-18','54','UnMarried','','','Bahrain','Bahrain','Atheist','','','Al Mintaqah al Gharbiyah','chennai','','+973','','','334534545345','Non-Vegetatrian','Occasionally','Non-liquor','Very Fair','Average','177cm','57kg','Mentally challenged','A2B +ve','Bachelors - Arts/ Science/Commerce/ Others','B.Com','','Salaried','Select','Select','','','Ashwini / Ashwathi','Mesh (Aries)','No','2009-11-11 17:54:57','0000-00-00 00:00:00','0000-00-00 00:00:00','2009-11-11 17:58:27',7,13,'addressewrwe','','2009-11-11 17:54:57','B',1,18);
/*!40000 ALTER TABLE `tm_profile` ENABLE KEYS */;


--
-- Definition of procedure `Insert_Family`
--

DROP PROCEDURE IF EXISTS `Insert_Family`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER' */ $$
CREATE DEFINER=`marryban_test`@`localhost` PROCEDURE `Insert_Family`(
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
CREATE DEFINER=`marryban_test`@`localhost` PROCEDURE `Insert_PartnerPreference`(


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
CREATE DEFINER=`marryban_test`@`localhost` PROCEDURE `Insert_Profile`(
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
CREATE DEFINER=`marryban_test`@`localhost` PROCEDURE `Insert_Profile2`(


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
