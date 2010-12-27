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
-- Dumping data for table `tm_interestmsg`
--

/*!40000 ALTER TABLE `tm_interestmsg` DISABLE KEYS */;
INSERT INTO `tm_interestmsg` (`Int_id`,`Int_Msg`,`Int_Type`,`Int_Status`,`Int_DOA`,`Int_DOM`) VALUES 
 (1,'Interested in your profile Would like to know more about you Please Accept if you are interested too','I','A','2009-02-20 10:41:47','2009-07-24 03:25:09'),
 (2,'My parents and I like your profile Please send me your contact details','I','A','2009-02-20 10:42:41','2009-07-24 03:25:02'),
 (3,'I feel we have a lot in common Please go through my profile and reply to my interest','I','A','2009-02-20 10:43:32','2009-08-10 17:35:45');
/*!40000 ALTER TABLE `tm_interestmsg` ENABLE KEYS */;


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
-- Dumping data for table `tm_partnerpreference`
--

/*!40000 ALTER TABLE `tm_partnerpreference` DISABLE KEYS */;
INSERT INTO `tm_partnerpreference` (`ProfileId`,`pAgeFrom`,`pAgeTO`,`pMaritialStatus`,`pMotherTonque`,`pReligion`,`pCastDivision`,`pSubcaste`,`pEducationCat`,`pOccupation`,`pEmployementtype`,`pCitizenchip`,`pResidingCountry`,`pState`,`pCity`,`pFood`,`pAboutPartner`,`pPhysicalStatus`,`pHeightFrom`,`pHeightTo`,`pKujaDhosam`) VALUES 
 ('BGTML1','23','27','UnMarried','Tamil','Hindu','Nadar','','Bachelors - Engineering/ Computers,Masters - Engineering/ Computers,Bachelors - Arts/ Science/Commerce/ Others,Masters - Arts/ Science/ Commerce/ Others','Salaried','Government,Private','Australia,India,Singapore,United Kingdom,United States','India','Tamil Nadu','Tenkasi','Non-Vegetatrian','About Partner','Normal','4ft 5in 134cm','5ft 10in 177cm','Dont Know'),
 ('BGTML10','24','27','UnMarried','Tamil','Hindu','Nadar','','Bachelors - Engineering/ Computers,Masters - Engineering/ Computers,Bachelors - Arts/ Science/Commerce/ Others,Masters - Arts/ Science/ Commerce/ Others','Salaried','Government,Private','Australia,India,Singapore,United Kingdom,United States','India','','Chennai/Madras','Non-Vegetatrian','About Partner','Normal','5ft 6in 167cm','5ft 8in 172cm','No'),
 ('BGTML2','18','21','UnMarried','Tamil','Hindu','Kongu Vellala Gounder','','Masters - Arts/ Science/ Commerce/ Others','Salaried','Private','Guadeloupe','India','Tamil Nadu','Chennai/Madras','Non-Vegetatrian','AboutPartner..','Normal','5ft  2in  157cm','5ft  7in  170cm','Dont Know');
/*!40000 ALTER TABLE `tm_partnerpreference` ENABLE KEYS */;
