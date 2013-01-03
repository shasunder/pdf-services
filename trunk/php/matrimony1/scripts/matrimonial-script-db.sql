-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 07, 2008 at 12:51 PM
-- Server version: 4.1.9
-- PHP Version: 4.3.10
-- 
-- Database: `letusmatch`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `LoginID` varchar(250) NOT NULL default '',
  `Password` varchar(250) default NULL,
  `AdminEmail` text,
  `AdminEmailPassword` text,
  `smtp` text,
  `ScriptName` text,
  `url` text,
  `smtpstatus` int(11) default '0',
  `port` int(11) default '0',
  `nochex` varchar(250) default NULL,
  `twoco` varchar(250) default NULL,
  `paypal` varchar(250) default NULL,
  `goldmemberfee` varchar(250) default NULL,
  PRIMARY KEY  (`LoginID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES ('admin', 'admin', '', '', '', 'Matrimonial Website', 'http://www.', 0, 25, 'Enter Nochex Email here', 'enter 2 checkout Seller ID number here', 'enter paypal account email here', 'Enter gold member fee here (only numeric value)');

-- --------------------------------------------------------

-- 
-- Table structure for table `cities`
-- 

CREATE TABLE `cities` (
  `CityID` bigint(20) NOT NULL auto_increment,
  `CountryID` bigint(20) NOT NULL default '0',
  `City` varchar(250) default NULL,
  PRIMARY KEY  (`CityID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=706 ;

-- 
-- Dumping data for table `cities`
-- 

INSERT INTO `cities` VALUES (1, 1, 'Agra');
INSERT INTO `cities` VALUES (2, 1, 'Ahmedabad');
INSERT INTO `cities` VALUES (3, 1, 'Allahabad');
INSERT INTO `cities` VALUES (4, 1, 'B.R Hills');
INSERT INTO `cities` VALUES (5, 1, 'Bangalore');
INSERT INTO `cities` VALUES (6, 1, 'Baroda');
INSERT INTO `cities` VALUES (7, 1, 'Bhopal');
INSERT INTO `cities` VALUES (8, 1, 'Bhubaneswar');
INSERT INTO `cities` VALUES (9, 1, 'Bodhgaya');
INSERT INTO `cities` VALUES (10, 1, 'Calicut');
INSERT INTO `cities` VALUES (11, 1, 'Chennai');
INSERT INTO `cities` VALUES (12, 1, 'Chotanagpur');
INSERT INTO `cities` VALUES (13, 1, 'Coimbatore');
INSERT INTO `cities` VALUES (14, 1, 'Dispur');
INSERT INTO `cities` VALUES (15, 1, 'Ernakulam');
INSERT INTO `cities` VALUES (16, 1, 'Gandhi Nagar');
INSERT INTO `cities` VALUES (17, 1, 'Gwalior');
INSERT INTO `cities` VALUES (18, 1, 'Hyderabad');
INSERT INTO `cities` VALUES (19, 1, 'Imphal');
INSERT INTO `cities` VALUES (20, 1, 'Indore');
INSERT INTO `cities` VALUES (21, 1, 'Itanagar');
INSERT INTO `cities` VALUES (22, 1, 'Jaipur');
INSERT INTO `cities` VALUES (23, 1, 'Jhansi');
INSERT INTO `cities` VALUES (24, 1, 'Kanpur');
INSERT INTO `cities` VALUES (25, 1, 'Kanya Kumari');
INSERT INTO `cities` VALUES (26, 1, 'Karur');
INSERT INTO `cities` VALUES (27, 1, 'Kochi');
INSERT INTO `cities` VALUES (28, 1, 'Kolkata');
INSERT INTO `cities` VALUES (29, 1, 'Lucknow');
INSERT INTO `cities` VALUES (30, 1, 'Ludhiana');
INSERT INTO `cities` VALUES (31, 1, 'Mandi');
INSERT INTO `cities` VALUES (32, 1, 'Mangalore');
INSERT INTO `cities` VALUES (33, 1, 'Meerut');
INSERT INTO `cities` VALUES (34, 1, 'Mumbai');
INSERT INTO `cities` VALUES (35, 1, 'Mysore');
INSERT INTO `cities` VALUES (36, 1, 'Nagpur');
INSERT INTO `cities` VALUES (37, 1, 'Nashik');
INSERT INTO `cities` VALUES (38, 1, 'New Delhi');
INSERT INTO `cities` VALUES (39, 1, 'Panaji');
INSERT INTO `cities` VALUES (40, 1, 'Patna');
INSERT INTO `cities` VALUES (41, 1, 'Pune');
INSERT INTO `cities` VALUES (42, 1, 'Ranchi');
INSERT INTO `cities` VALUES (43, 1, 'Shillong');
INSERT INTO `cities` VALUES (44, 1, 'Shimla');
INSERT INTO `cities` VALUES (45, 1, 'Srinagar');
INSERT INTO `cities` VALUES (46, 1, 'Thane');
INSERT INTO `cities` VALUES (47, 1, 'Thiruvananthapuram');
INSERT INTO `cities` VALUES (48, 1, 'Tiruchirapalli');
INSERT INTO `cities` VALUES (49, 1, 'Udaipur');
INSERT INTO `cities` VALUES (50, 1, 'Vidisha');
INSERT INTO `cities` VALUES (51, 1, 'Vishakapatnam');
INSERT INTO `cities` VALUES (52, 2, 'Akron');
INSERT INTO `cities` VALUES (53, 2, 'Albuquerque');
INSERT INTO `cities` VALUES (54, 2, 'Anaheim');
INSERT INTO `cities` VALUES (55, 2, 'Anchorage');
INSERT INTO `cities` VALUES (56, 2, 'Arlington');
INSERT INTO `cities` VALUES (57, 2, 'Arlington');
INSERT INTO `cities` VALUES (58, 2, 'Atlanta');
INSERT INTO `cities` VALUES (59, 2, 'Augusta-Richmond');
INSERT INTO `cities` VALUES (60, 2, 'Aurora');
INSERT INTO `cities` VALUES (61, 2, 'Austin');
INSERT INTO `cities` VALUES (62, 2, 'Bakersfield');
INSERT INTO `cities` VALUES (63, 2, 'Baltimore');
INSERT INTO `cities` VALUES (64, 2, 'Baton Rouge');
INSERT INTO `cities` VALUES (65, 2, 'Birmingham');
INSERT INTO `cities` VALUES (66, 2, 'Boise');
INSERT INTO `cities` VALUES (67, 2, 'Boston');
INSERT INTO `cities` VALUES (68, 2, 'Buffalo');
INSERT INTO `cities` VALUES (69, 2, 'Charlotte');
INSERT INTO `cities` VALUES (70, 2, 'Chesapeake');
INSERT INTO `cities` VALUES (71, 2, 'Chicago');
INSERT INTO `cities` VALUES (72, 2, 'Cincinnati');
INSERT INTO `cities` VALUES (73, 2, 'Cleveland');
INSERT INTO `cities` VALUES (74, 2, 'Colorado Springs');
INSERT INTO `cities` VALUES (75, 2, 'Columbus');
INSERT INTO `cities` VALUES (76, 2, 'Corpus Christi');
INSERT INTO `cities` VALUES (77, 2, 'Dallas');
INSERT INTO `cities` VALUES (78, 2, 'Denver');
INSERT INTO `cities` VALUES (79, 2, 'Des Moines');
INSERT INTO `cities` VALUES (80, 2, 'Detroit');
INSERT INTO `cities` VALUES (81, 2, 'Durham');
INSERT INTO `cities` VALUES (82, 2, 'El Paso');
INSERT INTO `cities` VALUES (83, 2, 'Fort Wayne');
INSERT INTO `cities` VALUES (84, 2, 'Fort Worth');
INSERT INTO `cities` VALUES (85, 2, 'Fremont');
INSERT INTO `cities` VALUES (86, 2, 'Fresno');
INSERT INTO `cities` VALUES (87, 2, 'Garland');
INSERT INTO `cities` VALUES (88, 2, 'Glendale');
INSERT INTO `cities` VALUES (89, 2, 'Glendale');
INSERT INTO `cities` VALUES (90, 2, 'Grand Rapids');
INSERT INTO `cities` VALUES (91, 2, 'Greensboro');
INSERT INTO `cities` VALUES (92, 2, 'Hialeah');
INSERT INTO `cities` VALUES (93, 2, 'Honolulu');
INSERT INTO `cities` VALUES (94, 2, 'Houston');
INSERT INTO `cities` VALUES (95, 2, 'Huntington Beach');
INSERT INTO `cities` VALUES (96, 2, 'Indianapolis');
INSERT INTO `cities` VALUES (97, 2, 'Irving');
INSERT INTO `cities` VALUES (98, 2, 'Jersey City');
INSERT INTO `cities` VALUES (99, 2, 'Kansas City');
INSERT INTO `cities` VALUES (100, 2, 'Las Vegas');
INSERT INTO `cities` VALUES (101, 2, 'Lexington-Fayette');
INSERT INTO `cities` VALUES (102, 2, 'Lincoln');
INSERT INTO `cities` VALUES (103, 2, 'Long Beach');
INSERT INTO `cities` VALUES (104, 2, 'Los Angeles');
INSERT INTO `cities` VALUES (105, 2, 'Louisville');
INSERT INTO `cities` VALUES (106, 2, 'Lubbock');
INSERT INTO `cities` VALUES (107, 2, 'Madison');
INSERT INTO `cities` VALUES (108, 2, 'Mesa');
INSERT INTO `cities` VALUES (109, 2, 'Milwaukee');
INSERT INTO `cities` VALUES (110, 2, 'Minneapolis');
INSERT INTO `cities` VALUES (111, 2, 'Mobile');
INSERT INTO `cities` VALUES (112, 2, 'Modesto');
INSERT INTO `cities` VALUES (113, 2, 'Montgomery');
INSERT INTO `cities` VALUES (114, 2, 'New Orleans');
INSERT INTO `cities` VALUES (115, 2, 'New York');
INSERT INTO `cities` VALUES (116, 2, 'Newark');
INSERT INTO `cities` VALUES (117, 2, 'Norfolk');
INSERT INTO `cities` VALUES (118, 2, 'Oakland');
INSERT INTO `cities` VALUES (119, 2, 'Oklahoma City');
INSERT INTO `cities` VALUES (120, 2, 'Omaha');
INSERT INTO `cities` VALUES (121, 2, 'Other cities in USA');
INSERT INTO `cities` VALUES (122, 2, 'Philadelphia');
INSERT INTO `cities` VALUES (123, 2, 'Phoenix');
INSERT INTO `cities` VALUES (124, 2, 'Pittsburgh');
INSERT INTO `cities` VALUES (125, 2, 'Plano');
INSERT INTO `cities` VALUES (126, 2, 'Portland');
INSERT INTO `cities` VALUES (127, 2, 'Raleigh');
INSERT INTO `cities` VALUES (128, 2, 'Richmond)');
INSERT INTO `cities` VALUES (129, 2, 'Riverside');
INSERT INTO `cities` VALUES (130, 2, 'Rochester');
INSERT INTO `cities` VALUES (131, 2, 'Sacramento');
INSERT INTO `cities` VALUES (132, 2, 'San Antonio');
INSERT INTO `cities` VALUES (133, 2, 'San Diego');
INSERT INTO `cities` VALUES (134, 2, 'San Francisco');
INSERT INTO `cities` VALUES (135, 2, 'San Jose');
INSERT INTO `cities` VALUES (136, 2, 'Santa Ana)');
INSERT INTO `cities` VALUES (137, 2, 'Scottsdale');
INSERT INTO `cities` VALUES (138, 2, 'Seattle');
INSERT INTO `cities` VALUES (139, 2, 'Shreveport');
INSERT INTO `cities` VALUES (140, 2, 'Spokane');
INSERT INTO `cities` VALUES (141, 2, 'St.Louis');
INSERT INTO `cities` VALUES (142, 2, 'St.Paul');
INSERT INTO `cities` VALUES (143, 2, 'Stockton');
INSERT INTO `cities` VALUES (144, 2, 'Tacoma');
INSERT INTO `cities` VALUES (145, 2, 'Toledo');
INSERT INTO `cities` VALUES (146, 2, 'Tucson');
INSERT INTO `cities` VALUES (147, 2, 'Tulsa');
INSERT INTO `cities` VALUES (148, 2, 'Virginia Beach');
INSERT INTO `cities` VALUES (149, 2, 'Washington');
INSERT INTO `cities` VALUES (150, 2, 'Wichita');
INSERT INTO `cities` VALUES (151, 2, 'Winston-Salem');
INSERT INTO `cities` VALUES (152, 2, 'Yonkers');
INSERT INTO `cities` VALUES (153, 3, 'Birmingham');
INSERT INTO `cities` VALUES (154, 3, 'Bristol');
INSERT INTO `cities` VALUES (155, 3, 'Glasgow');
INSERT INTO `cities` VALUES (156, 3, 'Leeds');
INSERT INTO `cities` VALUES (157, 3, 'Liverpool');
INSERT INTO `cities` VALUES (158, 3, 'London');
INSERT INTO `cities` VALUES (159, 3, 'Manchester');
INSERT INTO `cities` VALUES (160, 3, 'Newcastle');
INSERT INTO `cities` VALUES (161, 3, 'Nottingham');
INSERT INTO `cities` VALUES (162, 3, 'Sheffield');
INSERT INTO `cities` VALUES (163, 4, 'Calgary');
INSERT INTO `cities` VALUES (164, 4, 'Edmonton');
INSERT INTO `cities` VALUES (165, 4, 'Hamilton');
INSERT INTO `cities` VALUES (166, 4, 'Kitchener');
INSERT INTO `cities` VALUES (167, 4, 'London');
INSERT INTO `cities` VALUES (168, 4, 'Montréal');
INSERT INTO `cities` VALUES (169, 4, 'Ottawa');
INSERT INTO `cities` VALUES (170, 4, 'Québec');
INSERT INTO `cities` VALUES (171, 4, 'St.Catharines');
INSERT INTO `cities` VALUES (172, 4, 'Toronto');
INSERT INTO `cities` VALUES (173, 4, 'Vancouver');
INSERT INTO `cities` VALUES (174, 4, 'Victoria');
INSERT INTO `cities` VALUES (175, 4, 'Winnipeg');
INSERT INTO `cities` VALUES (176, 5, 'Adelaide');
INSERT INTO `cities` VALUES (177, 5, 'Brisbane');
INSERT INTO `cities` VALUES (178, 5, 'Canberra');
INSERT INTO `cities` VALUES (179, 5, 'Geelong');
INSERT INTO `cities` VALUES (180, 5, 'Gold Coast');
INSERT INTO `cities` VALUES (181, 5, 'Gosford');
INSERT INTO `cities` VALUES (182, 5, 'Hobart');
INSERT INTO `cities` VALUES (183, 5, 'Melbourne');
INSERT INTO `cities` VALUES (184, 5, 'Newcastle');
INSERT INTO `cities` VALUES (185, 5, 'Perth');
INSERT INTO `cities` VALUES (186, 5, 'Sunshine Coast');
INSERT INTO `cities` VALUES (187, 5, 'Sydney');
INSERT INTO `cities` VALUES (188, 5, 'Townsville');
INSERT INTO `cities` VALUES (189, 5, 'Wollongong');
INSERT INTO `cities` VALUES (190, 6, 'Amsterdam');
INSERT INTO `cities` VALUES (191, 6, 'Athinai (Athens)');
INSERT INTO `cities` VALUES (192, 6, 'Barcelona');
INSERT INTO `cities` VALUES (193, 6, 'Barnaul');
INSERT INTO `cities` VALUES (194, 6, 'Beograd (Belgrade)');
INSERT INTO `cities` VALUES (195, 6, 'Berlin');
INSERT INTO `cities` VALUES (196, 6, 'Bremen');
INSERT INTO `cities` VALUES (197, 6, 'Bucuresti (Bucharest)');
INSERT INTO `cities` VALUES (198, 6, 'Budapest');
INSERT INTO `cities` VALUES (199, 6, 'Chelyabinsk');
INSERT INTO `cities` VALUES (200, 6, 'Dnepropetrovsk');
INSERT INTO `cities` VALUES (201, 6, 'Donetsk');
INSERT INTO `cities` VALUES (202, 6, 'Dortmund');
INSERT INTO `cities` VALUES (203, 6, 'Duisburg');
INSERT INTO `cities` VALUES (204, 6, 'Düsseldorf');
INSERT INTO `cities` VALUES (205, 6, 'Ekaterinoburg');
INSERT INTO `cities` VALUES (206, 6, 'Essen');
INSERT INTO `cities` VALUES (207, 6, 'Frankfurt');
INSERT INTO `cities` VALUES (208, 6, 'Genova');
INSERT INTO `cities` VALUES (209, 6, 'Hamburg');
INSERT INTO `cities` VALUES (210, 6, 'Hannover');
INSERT INTO `cities` VALUES (211, 6, 'Helsinki');
INSERT INTO `cities` VALUES (212, 6, 'Irkutsk');
INSERT INTO `cities` VALUES (213, 6, 'Izhevsk');
INSERT INTO `cities` VALUES (214, 6, 'Kazan');
INSERT INTO `cities` VALUES (215, 6, 'Kemerovo');
INSERT INTO `cities` VALUES (216, 6, 'Khabarovsk');
INSERT INTO `cities` VALUES (217, 6, 'Kharkov');
INSERT INTO `cities` VALUES (218, 6, 'Kiev');
INSERT INTO `cities` VALUES (219, 6, 'Kishinev');
INSERT INTO `cities` VALUES (220, 6, 'Kobenhavn (Copenhagen)');
INSERT INTO `cities` VALUES (221, 6, 'Köln (Cologne)');
INSERT INTO `cities` VALUES (222, 6, 'Kraków');
INSERT INTO `cities` VALUES (223, 6, 'Krasnodar');
INSERT INTO `cities` VALUES (224, 6, 'Krasnoyarsk');
INSERT INTO `cities` VALUES (225, 6, 'Kryvy Rig');
INSERT INTO `cities` VALUES (226, 6, 'Lipetsk');
INSERT INTO `cities` VALUES (227, 6, 'Lisboa (Lisbon)');
INSERT INTO `cities` VALUES (228, 6, 'Lódz');
INSERT INTO `cities` VALUES (229, 6, 'Lvov');
INSERT INTO `cities` VALUES (230, 6, 'Madrid');
INSERT INTO `cities` VALUES (231, 6, 'Málaga');
INSERT INTO `cities` VALUES (232, 6, 'Marseille');
INSERT INTO `cities` VALUES (233, 6, 'Milano (Milan)');
INSERT INTO `cities` VALUES (234, 6, 'Minsk');
INSERT INTO `cities` VALUES (235, 6, 'Moskva (Moscow)');
INSERT INTO `cities` VALUES (236, 6, 'München (Munich)');
INSERT INTO `cities` VALUES (237, 6, 'Mykolaiv');
INSERT INTO `cities` VALUES (238, 6, 'Naberezhnye Tchelny');
INSERT INTO `cities` VALUES (239, 6, 'Napoli (Naples)');
INSERT INTO `cities` VALUES (240, 6, 'Nizhny Novgorod');
INSERT INTO `cities` VALUES (241, 6, 'Novokuznetsk');
INSERT INTO `cities` VALUES (242, 6, 'Novosibirsk');
INSERT INTO `cities` VALUES (243, 6, 'Odessa');
INSERT INTO `cities` VALUES (244, 6, 'Omsk');
INSERT INTO `cities` VALUES (245, 6, 'Orenburg');
INSERT INTO `cities` VALUES (246, 6, 'Oslo');
INSERT INTO `cities` VALUES (247, 6, 'Palermo');
INSERT INTO `cities` VALUES (248, 6, 'Paris');
INSERT INTO `cities` VALUES (249, 6, 'Penza');
INSERT INTO `cities` VALUES (250, 6, 'Perm');
INSERT INTO `cities` VALUES (251, 6, 'Poznan');
INSERT INTO `cities` VALUES (252, 6, 'Praha (Prague)');
INSERT INTO `cities` VALUES (253, 6, 'Riga');
INSERT INTO `cities` VALUES (254, 6, 'Roma');
INSERT INTO `cities` VALUES (255, 6, 'Rostov-na-Donu');
INSERT INTO `cities` VALUES (256, 6, 'Rotterdam');
INSERT INTO `cities` VALUES (257, 6, 'Ryazan');
INSERT INTO `cities` VALUES (258, 6, 'Salonika');
INSERT INTO `cities` VALUES (259, 6, 'Samara');
INSERT INTO `cities` VALUES (260, 6, 'Sarajevo');
INSERT INTO `cities` VALUES (261, 6, 'Saratov');
INSERT INTO `cities` VALUES (262, 6, 'Sevilla');
INSERT INTO `cities` VALUES (263, 6, 'Sofia');
INSERT INTO `cities` VALUES (264, 6, 'St Petersburg');
INSERT INTO `cities` VALUES (265, 6, 'Stockholm');
INSERT INTO `cities` VALUES (266, 6, 'Stuttgart');
INSERT INTO `cities` VALUES (267, 6, 'Tolyatti');
INSERT INTO `cities` VALUES (268, 6, 'Torino (Turin)');
INSERT INTO `cities` VALUES (269, 6, 'Tula');
INSERT INTO `cities` VALUES (270, 6, 'Tyumen');
INSERT INTO `cities` VALUES (271, 6, 'Ufa');
INSERT INTO `cities` VALUES (272, 6, 'Ulyanovsk');
INSERT INTO `cities` VALUES (273, 6, 'Valencia');
INSERT INTO `cities` VALUES (274, 6, 'VILNIUS');
INSERT INTO `cities` VALUES (275, 6, 'Vladivostok');
INSERT INTO `cities` VALUES (276, 6, 'Volgograd');
INSERT INTO `cities` VALUES (277, 6, 'Voronezh');
INSERT INTO `cities` VALUES (278, 6, 'Warszawa (Warsaw)');
INSERT INTO `cities` VALUES (279, 6, 'Wien (Vienna)');
INSERT INTO `cities` VALUES (280, 6, 'Wroclaw (Breslau)');
INSERT INTO `cities` VALUES (281, 6, 'Yaroslave');
INSERT INTO `cities` VALUES (282, 6, 'Zagreb');
INSERT INTO `cities` VALUES (283, 6, 'Zaporozhye');
INSERT INTO `cities` VALUES (284, 6, 'Zaragoza');
INSERT INTO `cities` VALUES (285, 7, 'Aden');
INSERT INTO `cities` VALUES (286, 7, 'Agra');
INSERT INTO `cities` VALUES (287, 7, 'Ahmadãbãd');
INSERT INTO `cities` VALUES (288, 7, 'Almaty');
INSERT INTO `cities` VALUES (289, 7, 'Ambon');
INSERT INTO `cities` VALUES (290, 7, 'Anadyr');
INSERT INTO `cities` VALUES (291, 7, 'Ankara');
INSERT INTO `cities` VALUES (292, 7, 'Anshan');
INSERT INTO `cities` VALUES (293, 7, 'Aqtau');
INSERT INTO `cities` VALUES (294, 7, 'Aqtobe');
INSERT INTO `cities` VALUES (295, 7, 'Ashgabat');
INSERT INTO `cities` VALUES (296, 7, 'Astana');
INSERT INTO `cities` VALUES (297, 7, 'Baku');
INSERT INTO `cities` VALUES (298, 7, 'Balikpapan');
INSERT INTO `cities` VALUES (299, 7, 'Bandar Seri Begawan');
INSERT INTO `cities` VALUES (300, 7, 'Bandung');
INSERT INTO `cities` VALUES (301, 7, 'Bangalore');
INSERT INTO `cities` VALUES (302, 7, 'Bangkok');
INSERT INTO `cities` VALUES (303, 7, 'Banjarmasin');
INSERT INTO `cities` VALUES (304, 7, 'Baotou');
INSERT INTO `cities` VALUES (305, 7, 'Barisal');
INSERT INTO `cities` VALUES (306, 7, 'Basra');
INSERT INTO `cities` VALUES (307, 7, 'Beijing');
INSERT INTO `cities` VALUES (308, 7, 'Bethlehem');
INSERT INTO `cities` VALUES (309, 7, 'Bhopal');
INSERT INTO `cities` VALUES (310, 7, 'Bhubaneshwar');
INSERT INTO `cities` VALUES (311, 7, 'Bishkek');
INSERT INTO `cities` VALUES (312, 7, 'Bogor');
INSERT INTO `cities` VALUES (313, 7, 'Canton');
INSERT INTO `cities` VALUES (314, 7, 'Cebu City');
INSERT INTO `cities` VALUES (315, 7, 'Changchun');
INSERT INTO `cities` VALUES (316, 7, 'Changsha');
INSERT INTO `cities` VALUES (317, 7, 'Chelyabinsk');
INSERT INTO `cities` VALUES (318, 7, 'Chengdu');
INSERT INTO `cities` VALUES (319, 7, 'Chennai');
INSERT INTO `cities` VALUES (320, 7, 'Chittagong');
INSERT INTO `cities` VALUES (321, 7, 'Choibalsan');
INSERT INTO `cities` VALUES (322, 7, 'Chongqing');
INSERT INTO `cities` VALUES (323, 7, 'Cirebon');
INSERT INTO `cities` VALUES (324, 7, 'Colombo');
INSERT INTO `cities` VALUES (325, 7, 'Comilla');
INSERT INTO `cities` VALUES (326, 7, 'Delhi');
INSERT INTO `cities` VALUES (327, 7, 'Denpasar');
INSERT INTO `cities` VALUES (328, 7, 'Dhaka');
INSERT INTO `cities` VALUES (329, 7, 'Dili');
INSERT INTO `cities` VALUES (330, 7, 'Doha');
INSERT INTO `cities` VALUES (331, 7, 'Dushanbe');
INSERT INTO `cities` VALUES (332, 7, 'Endeh');
INSERT INTO `cities` VALUES (333, 7, 'Esfahãn');
INSERT INTO `cities` VALUES (334, 7, 'Faisalabad');
INSERT INTO `cities` VALUES (335, 7, 'Foochow');
INSERT INTO `cities` VALUES (336, 7, 'Fukuoka');
INSERT INTO `cities` VALUES (337, 7, 'Fushun');
INSERT INTO `cities` VALUES (338, 7, 'George Town');
INSERT INTO `cities` VALUES (339, 7, 'Guiyang');
INSERT INTO `cities` VALUES (340, 7, 'Hangzhou');
INSERT INTO `cities` VALUES (341, 7, 'Hanoi');
INSERT INTO `cities` VALUES (342, 7, 'Harbin');
INSERT INTO `cities` VALUES (343, 7, 'Hilla');
INSERT INTO `cities` VALUES (344, 7, 'Hiroshima');
INSERT INTO `cities` VALUES (345, 7, 'Ho Chi Minh');
INSERT INTO `cities` VALUES (346, 7, 'Hong Kong');
INSERT INTO `cities` VALUES (347, 7, 'Hovd');
INSERT INTO `cities` VALUES (348, 7, 'Hyderãbãd');
INSERT INTO `cities` VALUES (349, 7, 'Incheon');
INSERT INTO `cities` VALUES (350, 7, 'Indore');
INSERT INTO `cities` VALUES (351, 7, 'Irbil');
INSERT INTO `cities` VALUES (352, 7, 'Islamabad');
INSERT INTO `cities` VALUES (353, 7, 'Jaipur');
INSERT INTO `cities` VALUES (354, 7, 'Jakarta');
INSERT INTO `cities` VALUES (355, 7, 'Jambi');
INSERT INTO `cities` VALUES (356, 7, 'Jayapura');
INSERT INTO `cities` VALUES (357, 7, 'Jeddah');
INSERT INTO `cities` VALUES (358, 7, 'Jessore');
INSERT INTO `cities` VALUES (359, 7, 'Jilin');
INSERT INTO `cities` VALUES (360, 7, 'Jinan');
INSERT INTO `cities` VALUES (361, 7, 'Jinzhou');
INSERT INTO `cities` VALUES (362, 7, 'Kabul');
INSERT INTO `cities` VALUES (363, 7, 'Kamchatka');
INSERT INTO `cities` VALUES (364, 7, 'Kãnpur');
INSERT INTO `cities` VALUES (365, 7, 'Kaohsiung');
INSERT INTO `cities` VALUES (366, 7, 'Karachi');
INSERT INTO `cities` VALUES (367, 7, 'Karbala');
INSERT INTO `cities` VALUES (368, 7, 'Kathmandu');
INSERT INTO `cities` VALUES (369, 7, 'Kawasaki');
INSERT INTO `cities` VALUES (370, 7, 'Kediri');
INSERT INTO `cities` VALUES (371, 7, 'Khon Kaen');
INSERT INTO `cities` VALUES (372, 7, 'Khulna');
INSERT INTO `cities` VALUES (373, 7, 'Kirkuk');
INSERT INTO `cities` VALUES (374, 7, 'Kitakyushu');
INSERT INTO `cities` VALUES (375, 7, 'Kobe');
INSERT INTO `cities` VALUES (376, 7, 'Kolkata');
INSERT INTO `cities` VALUES (377, 7, 'Kowloon');
INSERT INTO `cities` VALUES (378, 7, 'Krasnoyarsk');
INSERT INTO `cities` VALUES (379, 7, 'Kuala Lumpur');
INSERT INTO `cities` VALUES (380, 7, 'Kudus');
INSERT INTO `cities` VALUES (381, 7, 'Kunming');
INSERT INTO `cities` VALUES (382, 7, 'Kupang');
INSERT INTO `cities` VALUES (383, 7, 'Kyoto');
INSERT INTO `cities` VALUES (384, 7, 'Lahore');
INSERT INTO `cities` VALUES (385, 7, 'Lanchow');
INSERT INTO `cities` VALUES (386, 7, 'Lhasa');
INSERT INTO `cities` VALUES (387, 7, 'Lucknow');
INSERT INTO `cities` VALUES (388, 7, 'Lüda');
INSERT INTO `cities` VALUES (389, 7, 'Ludhiana');
INSERT INTO `cities` VALUES (390, 7, 'Luoyang');
INSERT INTO `cities` VALUES (391, 7, 'Macau');
INSERT INTO `cities` VALUES (392, 7, 'Madiun');
INSERT INTO `cities` VALUES (393, 7, 'Madurai');
INSERT INTO `cities` VALUES (394, 7, 'Makassar');
INSERT INTO `cities` VALUES (395, 7, 'Makkah');
INSERT INTO `cities` VALUES (396, 7, 'Malang');
INSERT INTO `cities` VALUES (397, 7, 'Manado');
INSERT INTO `cities` VALUES (398, 7, 'Manama');
INSERT INTO `cities` VALUES (399, 7, 'Manila');
INSERT INTO `cities` VALUES (400, 7, 'Mashhad');
INSERT INTO `cities` VALUES (401, 7, 'Mataram');
INSERT INTO `cities` VALUES (402, 7, 'Medan');
INSERT INTO `cities` VALUES (403, 7, 'Mosul');
INSERT INTO `cities` VALUES (404, 7, 'Mumbai');
INSERT INTO `cities` VALUES (405, 7, 'Muscat');
INSERT INTO `cities` VALUES (406, 7, 'Mymensingh');
INSERT INTO `cities` VALUES (407, 7, 'Nagoya');
INSERT INTO `cities` VALUES (408, 7, 'Nãgpur');
INSERT INTO `cities` VALUES (409, 7, 'Naha');
INSERT INTO `cities` VALUES (410, 7, 'Najaf');
INSERT INTO `cities` VALUES (411, 7, 'Nanchang');
INSERT INTO `cities` VALUES (412, 7, 'Nasiriya');
INSERT INTO `cities` VALUES (413, 7, 'New Delhi');
INSERT INTO `cities` VALUES (414, 7, 'Nicosia');
INSERT INTO `cities` VALUES (415, 7, 'Novosibirsk');
INSERT INTO `cities` VALUES (416, 7, 'Okayama');
INSERT INTO `cities` VALUES (417, 7, 'Omsk');
INSERT INTO `cities` VALUES (418, 7, 'Osaka');
INSERT INTO `cities` VALUES (419, 7, 'Pabna');
INSERT INTO `cities` VALUES (420, 7, 'Padang');
INSERT INTO `cities` VALUES (421, 7, 'Palembang');
INSERT INTO `cities` VALUES (422, 7, 'Patna');
INSERT INTO `cities` VALUES (423, 7, 'Pattaya');
INSERT INTO `cities` VALUES (424, 7, 'Pekalongan');
INSERT INTO `cities` VALUES (425, 7, 'Pekanbaru');
INSERT INTO `cities` VALUES (426, 7, 'Pematangsiantar');
INSERT INTO `cities` VALUES (427, 7, 'Perm');
INSERT INTO `cities` VALUES (428, 7, 'Peshawar');
INSERT INTO `cities` VALUES (429, 7, 'Phnom Penh');
INSERT INTO `cities` VALUES (430, 7, 'Phuket');
INSERT INTO `cities` VALUES (431, 7, 'Port Blair');
INSERT INTO `cities` VALUES (432, 7, 'Port-aux-Francais');
INSERT INTO `cities` VALUES (433, 7, 'Pune');
INSERT INTO `cities` VALUES (434, 7, 'Pusan');
INSERT INTO `cities` VALUES (435, 7, 'Pyongyang');
INSERT INTO `cities` VALUES (436, 7, 'Qiqihar');
INSERT INTO `cities` VALUES (437, 7, 'Raba');
INSERT INTO `cities` VALUES (438, 7, 'Saidpur');
INSERT INTO `cities` VALUES (439, 7, 'Samarinda');
INSERT INTO `cities` VALUES (440, 7, 'Sana');
INSERT INTO `cities` VALUES (441, 7, 'Sapporo');
INSERT INTO `cities` VALUES (442, 7, 'Semarang');
INSERT INTO `cities` VALUES (443, 7, 'Sendai');
INSERT INTO `cities` VALUES (444, 7, 'Seoul');
INSERT INTO `cities` VALUES (445, 7, 'Seremban');
INSERT INTO `cities` VALUES (446, 7, 'Shanghai');
INSERT INTO `cities` VALUES (447, 7, 'Shenzhen');
INSERT INTO `cities` VALUES (448, 7, 'Shijiazhuang');
INSERT INTO `cities` VALUES (449, 7, 'Shillong');
INSERT INTO `cities` VALUES (450, 7, 'Sialkot');
INSERT INTO `cities` VALUES (451, 7, 'Sian');
INSERT INTO `cities` VALUES (452, 7, 'Singapore');
INSERT INTO `cities` VALUES (453, 7, 'Singaraja');
INSERT INTO `cities` VALUES (454, 7, 'Sulaimaniya');
INSERT INTO `cities` VALUES (455, 7, 'Surabaya');
INSERT INTO `cities` VALUES (456, 7, 'Surakarta');
INSERT INTO `cities` VALUES (457, 7, 'Surat');
INSERT INTO `cities` VALUES (458, 7, 'Sylhet');
INSERT INTO `cities` VALUES (459, 7, 'Tabriz');
INSERT INTO `cities` VALUES (460, 7, 'Taegu');
INSERT INTO `cities` VALUES (461, 7, 'Taichung');
INSERT INTO `cities` VALUES (462, 7, 'Taipei');
INSERT INTO `cities` VALUES (463, 7, 'Taiyuan');
INSERT INTO `cities` VALUES (464, 7, 'Tangshan');
INSERT INTO `cities` VALUES (465, 7, 'Tanjungkarang');
INSERT INTO `cities` VALUES (466, 7, 'Tashkent');
INSERT INTO `cities` VALUES (467, 7, 'Tasikmalaya');
INSERT INTO `cities` VALUES (468, 7, 'Tbilisi');
INSERT INTO `cities` VALUES (469, 7, 'Tegal');
INSERT INTO `cities` VALUES (470, 7, 'Ternate');
INSERT INTO `cities` VALUES (471, 7, 'The Settlement');
INSERT INTO `cities` VALUES (472, 7, 'Thimphu');
INSERT INTO `cities` VALUES (473, 7, 'Tianjin');
INSERT INTO `cities` VALUES (474, 7, 'Tokyo');
INSERT INTO `cities` VALUES (475, 7, 'Tsingtao');
INSERT INTO `cities` VALUES (476, 7, 'Ufa');
INSERT INTO `cities` VALUES (477, 7, 'Ulaanbaatar');
INSERT INTO `cities` VALUES (478, 7, 'Urümqi');
INSERT INTO `cities` VALUES (479, 7, 'Vadodara');
INSERT INTO `cities` VALUES (480, 7, 'Varanasi');
INSERT INTO `cities` VALUES (481, 7, 'Vientiane');
INSERT INTO `cities` VALUES (482, 7, 'Vishakhapatnam');
INSERT INTO `cities` VALUES (483, 7, 'Vladivostok');
INSERT INTO `cities` VALUES (484, 7, 'Wuhan');
INSERT INTO `cities` VALUES (485, 7, 'Yangon');
INSERT INTO `cities` VALUES (486, 7, 'Yekaterinburg');
INSERT INTO `cities` VALUES (487, 7, 'Yerevan');
INSERT INTO `cities` VALUES (488, 7, 'Yogyakarta');
INSERT INTO `cities` VALUES (489, 7, 'Yokohama');
INSERT INTO `cities` VALUES (490, 7, 'Yuzhno-Sakhalinsk');
INSERT INTO `cities` VALUES (491, 7, 'Zhengzhou');
INSERT INTO `cities` VALUES (492, 7, 'Zibo');
INSERT INTO `cities` VALUES (493, 8, 'Abu Dhabi');
INSERT INTO `cities` VALUES (494, 8, 'Aleppo');
INSERT INTO `cities` VALUES (495, 8, 'Amman');
INSERT INTO `cities` VALUES (496, 8, 'Baghdad');
INSERT INTO `cities` VALUES (497, 8, 'Beirut');
INSERT INTO `cities` VALUES (498, 8, 'Cairo');
INSERT INTO `cities` VALUES (499, 8, 'Dahab');
INSERT INTO `cities` VALUES (500, 8, 'Damascus');
INSERT INTO `cities` VALUES (501, 8, 'Dhahran');
INSERT INTO `cities` VALUES (502, 8, 'Dubai');
INSERT INTO `cities` VALUES (503, 8, 'Gaza');
INSERT INTO `cities` VALUES (504, 8, 'Haifa');
INSERT INTO `cities` VALUES (505, 8, 'Istanbul');
INSERT INTO `cities` VALUES (506, 8, 'Jerusalem');
INSERT INTO `cities` VALUES (507, 8, 'Kuwait');
INSERT INTO `cities` VALUES (508, 8, 'Mecca');
INSERT INTO `cities` VALUES (509, 8, 'Nukus');
INSERT INTO `cities` VALUES (510, 8, 'Riyadh');
INSERT INTO `cities` VALUES (511, 8, 'Tehran');
INSERT INTO `cities` VALUES (512, 8, 'Tel Aviv');
INSERT INTO `cities` VALUES (513, 9, 'Abidjan');
INSERT INTO `cities` VALUES (514, 9, 'Abuja');
INSERT INTO `cities` VALUES (515, 9, 'Accra');
INSERT INTO `cities` VALUES (516, 9, 'Addis Ababa');
INSERT INTO `cities` VALUES (517, 9, 'Al Jizah');
INSERT INTO `cities` VALUES (518, 9, 'Alexandria');
INSERT INTO `cities` VALUES (519, 9, 'Algiers');
INSERT INTO `cities` VALUES (520, 9, 'Antananarivo');
INSERT INTO `cities` VALUES (521, 9, 'Asmara');
INSERT INTO `cities` VALUES (522, 9, 'Bamako');
INSERT INTO `cities` VALUES (523, 9, 'Bangui');
INSERT INTO `cities` VALUES (524, 9, 'Banjul');
INSERT INTO `cities` VALUES (525, 9, 'Bissau');
INSERT INTO `cities` VALUES (526, 9, 'Brazzaville');
INSERT INTO `cities` VALUES (527, 9, 'Bujumbura');
INSERT INTO `cities` VALUES (528, 9, 'Cairo');
INSERT INTO `cities` VALUES (529, 9, 'Cape Town');
INSERT INTO `cities` VALUES (530, 9, 'Casablanca');
INSERT INTO `cities` VALUES (531, 9, 'Conakry');
INSERT INTO `cities` VALUES (532, 9, 'Dakar');
INSERT INTO `cities` VALUES (533, 9, 'Dar es Salaam');
INSERT INTO `cities` VALUES (534, 9, 'Djibouti');
INSERT INTO `cities` VALUES (535, 9, 'Dodoma');
INSERT INTO `cities` VALUES (536, 9, 'El Aaiún');
INSERT INTO `cities` VALUES (537, 9, 'Freetown');
INSERT INTO `cities` VALUES (538, 9, 'Gaborone');
INSERT INTO `cities` VALUES (539, 9, 'Harare');
INSERT INTO `cities` VALUES (540, 9, 'Jamestown');
INSERT INTO `cities` VALUES (541, 9, 'Johannesburg');
INSERT INTO `cities` VALUES (542, 9, 'Kampala');
INSERT INTO `cities` VALUES (543, 9, 'Kano Nigeria');
INSERT INTO `cities` VALUES (544, 9, 'Khartoum');
INSERT INTO `cities` VALUES (545, 9, 'Kigali');
INSERT INTO `cities` VALUES (546, 9, 'Kinshasa');
INSERT INTO `cities` VALUES (547, 9, 'Lagos');
INSERT INTO `cities` VALUES (548, 9, 'Libreville');
INSERT INTO `cities` VALUES (549, 9, 'Lilongwe');
INSERT INTO `cities` VALUES (550, 9, 'Lome');
INSERT INTO `cities` VALUES (551, 9, 'Luanda');
INSERT INTO `cities` VALUES (552, 9, 'Lubumbashi');
INSERT INTO `cities` VALUES (553, 9, 'Lusaka');
INSERT INTO `cities` VALUES (554, 9, 'Malabo');
INSERT INTO `cities` VALUES (555, 9, 'Mamoutzou');
INSERT INTO `cities` VALUES (556, 9, 'Maputo');
INSERT INTO `cities` VALUES (557, 9, 'Maseru');
INSERT INTO `cities` VALUES (558, 9, 'Mbabane');
INSERT INTO `cities` VALUES (559, 9, 'Mogadishu');
INSERT INTO `cities` VALUES (560, 9, 'Monrovia');
INSERT INTO `cities` VALUES (561, 9, 'Moroni');
INSERT INTO `cities` VALUES (562, 9, 'Nairobi');
INSERT INTO `cities` VALUES (563, 9, 'Ndjamena');
INSERT INTO `cities` VALUES (564, 9, 'Niamey');
INSERT INTO `cities` VALUES (565, 9, 'Nouakchott');
INSERT INTO `cities` VALUES (566, 9, 'Ouagadougou');
INSERT INTO `cities` VALUES (567, 9, 'Port Louis');
INSERT INTO `cities` VALUES (568, 9, 'Porto Novo');
INSERT INTO `cities` VALUES (569, 9, 'Praia');
INSERT INTO `cities` VALUES (570, 9, 'Pretoria');
INSERT INTO `cities` VALUES (571, 9, 'Rabat');
INSERT INTO `cities` VALUES (572, 9, 'Saint-Denis');
INSERT INTO `cities` VALUES (573, 9, 'São Tomé');
INSERT INTO `cities` VALUES (574, 9, 'Tanger');
INSERT INTO `cities` VALUES (575, 9, 'Tripoli');
INSERT INTO `cities` VALUES (576, 9, 'Tunis');
INSERT INTO `cities` VALUES (577, 9, 'Victoria');
INSERT INTO `cities` VALUES (578, 9, 'Windhoek');
INSERT INTO `cities` VALUES (579, 9, 'Yamoussoukro');
INSERT INTO `cities` VALUES (580, 9, 'Yaoundé');
INSERT INTO `cities` VALUES (581, 10, 'Abaco');
INSERT INTO `cities` VALUES (582, 10, 'Antigua');
INSERT INTO `cities` VALUES (583, 10, 'Aruba');
INSERT INTO `cities` VALUES (584, 10, 'Barbados');
INSERT INTO `cities` VALUES (585, 10, 'Bermuda');
INSERT INTO `cities` VALUES (586, 10, 'Bridgetown');
INSERT INTO `cities` VALUES (587, 10, 'Fort de France');
INSERT INTO `cities` VALUES (588, 10, 'Freeport');
INSERT INTO `cities` VALUES (589, 10, 'George Town');
INSERT INTO `cities` VALUES (590, 10, 'Grenada');
INSERT INTO `cities` VALUES (591, 10, 'Hamilton');
INSERT INTO `cities` VALUES (592, 10, 'Havana');
INSERT INTO `cities` VALUES (593, 10, 'Kingston');
INSERT INTO `cities` VALUES (594, 10, 'Montego Bay');
INSERT INTO `cities` VALUES (595, 10, 'Nassau');
INSERT INTO `cities` VALUES (596, 10, 'Nassau');
INSERT INTO `cities` VALUES (597, 10, 'Negril');
INSERT INTO `cities` VALUES (598, 10, 'Ocho Rios');
INSERT INTO `cities` VALUES (599, 10, 'Paradise Island');
INSERT INTO `cities` VALUES (600, 10, 'Pointe Pitre');
INSERT INTO `cities` VALUES (601, 10, 'Ponce');
INSERT INTO `cities` VALUES (602, 10, 'Port of Spain');
INSERT INTO `cities` VALUES (603, 10, 'Port-au-Prince');
INSERT INTO `cities` VALUES (604, 10, 'San Juan');
INSERT INTO `cities` VALUES (605, 10, 'Santo Domingo');
INSERT INTO `cities` VALUES (606, 10, 'St.Croix');
INSERT INTO `cities` VALUES (607, 10, 'St.George');
INSERT INTO `cities` VALUES (608, 10, 'St.Kitts');
INSERT INTO `cities` VALUES (609, 10, 'St.Lucia');
INSERT INTO `cities` VALUES (610, 10, 'St.Thomas');
INSERT INTO `cities` VALUES (611, 10, 'Tortola');
INSERT INTO `cities` VALUES (612, 10, 'Trinidad and Tobago');
INSERT INTO `cities` VALUES (613, 10, 'Varadero');
INSERT INTO `cities` VALUES (614, 11, 'Adamstown');
INSERT INTO `cities` VALUES (615, 11, 'Alofi');
INSERT INTO `cities` VALUES (616, 11, 'Apia');
INSERT INTO `cities` VALUES (617, 11, 'Auckland');
INSERT INTO `cities` VALUES (618, 11, 'Chatham Island');
INSERT INTO `cities` VALUES (619, 11, 'Christchurch');
INSERT INTO `cities` VALUES (620, 11, 'Funafuti');
INSERT INTO `cities` VALUES (621, 11, 'Gambier Islands');
INSERT INTO `cities` VALUES (622, 11, 'Honiara');
INSERT INTO `cities` VALUES (623, 11, 'Kingston (Au)');
INSERT INTO `cities` VALUES (624, 11, 'Kiritimati');
INSERT INTO `cities` VALUES (625, 11, 'Kolonia');
INSERT INTO `cities` VALUES (626, 11, 'Koror');
INSERT INTO `cities` VALUES (627, 11, 'Lord Howe Island');
INSERT INTO `cities` VALUES (628, 11, 'Majuro');
INSERT INTO `cities` VALUES (629, 11, 'Makwa');
INSERT INTO `cities` VALUES (630, 11, 'Mata-Utu');
INSERT INTO `cities` VALUES (631, 11, 'Noumea');
INSERT INTO `cities` VALUES (632, 11, 'Nukualofa');
INSERT INTO `cities` VALUES (633, 11, 'Pago Pago');
INSERT INTO `cities` VALUES (634, 11, 'Palikir');
INSERT INTO `cities` VALUES (635, 11, 'Papeete');
INSERT INTO `cities` VALUES (636, 11, 'Port Moresby');
INSERT INTO `cities` VALUES (637, 11, 'Port Vila');
INSERT INTO `cities` VALUES (638, 11, 'Rarotonga');
INSERT INTO `cities` VALUES (639, 11, 'Rawaki');
INSERT INTO `cities` VALUES (640, 11, 'Suva');
INSERT INTO `cities` VALUES (641, 11, 'Taiohae');
INSERT INTO `cities` VALUES (642, 11, 'Tarawa');
INSERT INTO `cities` VALUES (643, 11, 'Wellington');
INSERT INTO `cities` VALUES (644, 12, 'Arequipa');
INSERT INTO `cities` VALUES (645, 12, 'Asuncion');
INSERT INTO `cities` VALUES (646, 12, 'Barquisimeto');
INSERT INTO `cities` VALUES (647, 12, 'Barranquilla');
INSERT INTO `cities` VALUES (648, 12, 'Belém');
INSERT INTO `cities` VALUES (649, 12, 'Belo Horizonte');
INSERT INTO `cities` VALUES (650, 12, 'Boa Vista');
INSERT INTO `cities` VALUES (651, 12, 'Bogota');
INSERT INTO `cities` VALUES (652, 12, 'Brasilia');
INSERT INTO `cities` VALUES (653, 12, 'Bucaramanga');
INSERT INTO `cities` VALUES (654, 12, 'Buenos Aires');
INSERT INTO `cities` VALUES (655, 12, 'Cali');
INSERT INTO `cities` VALUES (656, 12, 'Campinas');
INSERT INTO `cities` VALUES (657, 12, 'Caracas');
INSERT INTO `cities` VALUES (658, 12, 'Cartagena');
INSERT INTO `cities` VALUES (659, 12, 'Cayenne');
INSERT INTO `cities` VALUES (660, 12, 'Córdoba');
INSERT INTO `cities` VALUES (661, 12, 'Cúcuta');
INSERT INTO `cities` VALUES (662, 12, 'Curitiba');
INSERT INTO `cities` VALUES (663, 12, 'Easter Island');
INSERT INTO `cities` VALUES (664, 12, 'Fernando de Noronha');
INSERT INTO `cities` VALUES (665, 12, 'Fortaleza');
INSERT INTO `cities` VALUES (666, 12, 'Galapagos Islands');
INSERT INTO `cities` VALUES (667, 12, 'Georgetown');
INSERT INTO `cities` VALUES (668, 12, 'Goiânia');
INSERT INTO `cities` VALUES (669, 12, 'Guayaquil');
INSERT INTO `cities` VALUES (670, 12, 'La Paz');
INSERT INTO `cities` VALUES (671, 12, 'La Plata');
INSERT INTO `cities` VALUES (672, 12, 'Lima');
INSERT INTO `cities` VALUES (673, 12, 'Maceió');
INSERT INTO `cities` VALUES (674, 12, 'Manaus');
INSERT INTO `cities` VALUES (675, 12, 'Manizales');
INSERT INTO `cities` VALUES (676, 12, 'Mar del Plata');
INSERT INTO `cities` VALUES (677, 12, 'Maracaibo');
INSERT INTO `cities` VALUES (678, 12, 'Maracay');
INSERT INTO `cities` VALUES (679, 12, 'Medellin');
INSERT INTO `cities` VALUES (680, 12, 'Mendoza');
INSERT INTO `cities` VALUES (681, 12, 'Montevideo');
INSERT INTO `cities` VALUES (682, 12, 'Natal');
INSERT INTO `cities` VALUES (683, 12, 'Niterói');
INSERT INTO `cities` VALUES (684, 12, 'Oranjestad');
INSERT INTO `cities` VALUES (685, 12, 'Paramaribo');
INSERT INTO `cities` VALUES (686, 12, 'Port of Spain');
INSERT INTO `cities` VALUES (687, 12, 'Porto Alegre');
INSERT INTO `cities` VALUES (688, 12, 'Pôrto Velho');
INSERT INTO `cities` VALUES (689, 12, 'Quito');
INSERT INTO `cities` VALUES (690, 12, 'Recife');
INSERT INTO `cities` VALUES (691, 12, 'Rio Branco');
INSERT INTO `cities` VALUES (692, 12, 'Rio de Janeiro');
INSERT INTO `cities` VALUES (693, 12, 'Rosario');
INSERT INTO `cities` VALUES (694, 12, 'Salta');
INSERT INTO `cities` VALUES (695, 12, 'Salvador');
INSERT INTO `cities` VALUES (696, 12, 'Santa Cruz');
INSERT INTO `cities` VALUES (697, 12, 'Santa Fe');
INSERT INTO `cities` VALUES (698, 12, 'Santiago');
INSERT INTO `cities` VALUES (699, 12, 'Santos');
INSERT INTO `cities` VALUES (700, 12, 'Sao Paulo');
INSERT INTO `cities` VALUES (701, 12, 'Stanley');
INSERT INTO `cities` VALUES (702, 12, 'Tucumán');
INSERT INTO `cities` VALUES (703, 12, 'Valencia');
INSERT INTO `cities` VALUES (704, 12, 'Valparaíso');
INSERT INTO `cities` VALUES (705, 12, 'Vitória');

-- --------------------------------------------------------

-- 
-- Table structure for table `countries`
-- 

CREATE TABLE `countries` (
  `CountryID` bigint(20) NOT NULL auto_increment,
  `Country` varchar(250) default NULL,
  PRIMARY KEY  (`CountryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `countries`
-- 

INSERT INTO `countries` VALUES (1, 'India');
INSERT INTO `countries` VALUES (2, 'USA');
INSERT INTO `countries` VALUES (3, 'UK');
INSERT INTO `countries` VALUES (4, 'Canada');
INSERT INTO `countries` VALUES (5, 'Australia');
INSERT INTO `countries` VALUES (6, 'Europe');
INSERT INTO `countries` VALUES (7, 'Asia');
INSERT INTO `countries` VALUES (8, 'Middle East');
INSERT INTO `countries` VALUES (9, 'Africa');
INSERT INTO `countries` VALUES (10, 'Caribbean');
INSERT INTO `countries` VALUES (11, 'Oceania');
INSERT INTO `countries` VALUES (12, 'South America');

-- --------------------------------------------------------

-- 
-- Table structure for table `districts`
-- 

CREATE TABLE `districts` (
  `DistrictID` bigint(20) NOT NULL auto_increment,
  `StateID` bigint(20) NOT NULL default '0',
  `CountryID` bigint(20) NOT NULL default '0',
  `District` varchar(250) default NULL,
  PRIMARY KEY  (`DistrictID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=594 ;

-- 
-- Dumping data for table `districts`
-- 

INSERT INTO `districts` VALUES (1, 1, 0, '');
INSERT INTO `districts` VALUES (2, 1, 0, '');
INSERT INTO `districts` VALUES (3, 2, 0, '');
INSERT INTO `districts` VALUES (4, 2, 0, '');
INSERT INTO `districts` VALUES (5, 2, 0, '');
INSERT INTO `districts` VALUES (6, 2, 0, '');
INSERT INTO `districts` VALUES (7, 2, 0, '');
INSERT INTO `districts` VALUES (8, 2, 0, '');
INSERT INTO `districts` VALUES (9, 2, 0, '');
INSERT INTO `districts` VALUES (10, 2, 0, '');
INSERT INTO `districts` VALUES (11, 2, 0, '');
INSERT INTO `districts` VALUES (12, 2, 0, '');
INSERT INTO `districts` VALUES (13, 2, 0, '');
INSERT INTO `districts` VALUES (14, 2, 0, '');
INSERT INTO `districts` VALUES (15, 2, 0, '');
INSERT INTO `districts` VALUES (16, 2, 0, '');
INSERT INTO `districts` VALUES (17, 2, 0, '');
INSERT INTO `districts` VALUES (18, 2, 0, '');
INSERT INTO `districts` VALUES (19, 2, 0, '');
INSERT INTO `districts` VALUES (20, 2, 0, '');
INSERT INTO `districts` VALUES (21, 2, 0, '');
INSERT INTO `districts` VALUES (22, 2, 0, '');
INSERT INTO `districts` VALUES (23, 2, 0, '');
INSERT INTO `districts` VALUES (24, 2, 0, '');
INSERT INTO `districts` VALUES (25, 2, 0, '');
INSERT INTO `districts` VALUES (26, 3, 0, '');
INSERT INTO `districts` VALUES (27, 3, 0, '');
INSERT INTO `districts` VALUES (28, 3, 0, '');
INSERT INTO `districts` VALUES (29, 3, 0, '');
INSERT INTO `districts` VALUES (30, 3, 0, '');
INSERT INTO `districts` VALUES (31, 3, 0, '');
INSERT INTO `districts` VALUES (32, 3, 0, '');
INSERT INTO `districts` VALUES (33, 3, 0, '');
INSERT INTO `districts` VALUES (34, 3, 0, '');
INSERT INTO `districts` VALUES (35, 3, 0, '');
INSERT INTO `districts` VALUES (36, 3, 0, '');
INSERT INTO `districts` VALUES (37, 3, 0, '');
INSERT INTO `districts` VALUES (38, 3, 0, '');
INSERT INTO `districts` VALUES (39, 3, 0, '');
INSERT INTO `districts` VALUES (40, 3, 0, '');
INSERT INTO `districts` VALUES (41, 3, 0, '');
INSERT INTO `districts` VALUES (42, 4, 0, '');
INSERT INTO `districts` VALUES (43, 4, 0, '');
INSERT INTO `districts` VALUES (44, 4, 0, '');
INSERT INTO `districts` VALUES (45, 4, 0, '');
INSERT INTO `districts` VALUES (46, 4, 0, '');
INSERT INTO `districts` VALUES (47, 4, 0, '');
INSERT INTO `districts` VALUES (48, 4, 0, '');
INSERT INTO `districts` VALUES (49, 4, 0, '');
INSERT INTO `districts` VALUES (50, 4, 0, '');
INSERT INTO `districts` VALUES (51, 4, 0, '');
INSERT INTO `districts` VALUES (52, 4, 0, '');
INSERT INTO `districts` VALUES (53, 4, 0, '');
INSERT INTO `districts` VALUES (54, 4, 0, '');
INSERT INTO `districts` VALUES (55, 4, 0, '');
INSERT INTO `districts` VALUES (56, 4, 0, '');
INSERT INTO `districts` VALUES (57, 4, 0, '');
INSERT INTO `districts` VALUES (58, 4, 0, '');
INSERT INTO `districts` VALUES (59, 4, 0, '');
INSERT INTO `districts` VALUES (60, 4, 0, '');
INSERT INTO `districts` VALUES (61, 4, 0, '');
INSERT INTO `districts` VALUES (62, 4, 0, '');
INSERT INTO `districts` VALUES (63, 4, 0, '');
INSERT INTO `districts` VALUES (64, 4, 0, '');
INSERT INTO `districts` VALUES (65, 5, 0, '');
INSERT INTO `districts` VALUES (66, 5, 0, '');
INSERT INTO `districts` VALUES (67, 5, 0, '');
INSERT INTO `districts` VALUES (68, 5, 0, '');
INSERT INTO `districts` VALUES (69, 5, 0, '');
INSERT INTO `districts` VALUES (70, 5, 0, '');
INSERT INTO `districts` VALUES (71, 5, 0, '');
INSERT INTO `districts` VALUES (72, 5, 0, '');
INSERT INTO `districts` VALUES (73, 5, 0, '');
INSERT INTO `districts` VALUES (74, 5, 0, '');
INSERT INTO `districts` VALUES (75, 5, 0, '');
INSERT INTO `districts` VALUES (76, 5, 0, '');
INSERT INTO `districts` VALUES (77, 5, 0, '');
INSERT INTO `districts` VALUES (78, 5, 0, '');
INSERT INTO `districts` VALUES (79, 5, 0, '');
INSERT INTO `districts` VALUES (80, 5, 0, '');
INSERT INTO `districts` VALUES (81, 5, 0, '');
INSERT INTO `districts` VALUES (82, 5, 0, '');
INSERT INTO `districts` VALUES (83, 5, 0, '');
INSERT INTO `districts` VALUES (84, 5, 0, '');
INSERT INTO `districts` VALUES (85, 5, 0, '');
INSERT INTO `districts` VALUES (86, 5, 0, '');
INSERT INTO `districts` VALUES (87, 5, 0, '');
INSERT INTO `districts` VALUES (88, 5, 0, '');
INSERT INTO `districts` VALUES (89, 5, 0, '');
INSERT INTO `districts` VALUES (90, 5, 0, '');
INSERT INTO `districts` VALUES (91, 5, 0, '');
INSERT INTO `districts` VALUES (92, 5, 0, '');
INSERT INTO `districts` VALUES (93, 5, 0, '');
INSERT INTO `districts` VALUES (94, 5, 0, '');
INSERT INTO `districts` VALUES (95, 5, 0, '');
INSERT INTO `districts` VALUES (96, 5, 0, '');
INSERT INTO `districts` VALUES (97, 5, 0, '');
INSERT INTO `districts` VALUES (98, 5, 0, '');
INSERT INTO `districts` VALUES (99, 5, 0, '');
INSERT INTO `districts` VALUES (100, 5, 0, '');
INSERT INTO `districts` VALUES (101, 5, 0, '');
INSERT INTO `districts` VALUES (102, 6, 0, '');
INSERT INTO `districts` VALUES (103, 7, 0, '');
INSERT INTO `districts` VALUES (104, 7, 0, '');
INSERT INTO `districts` VALUES (105, 7, 0, '');
INSERT INTO `districts` VALUES (106, 7, 0, '');
INSERT INTO `districts` VALUES (107, 7, 0, '');
INSERT INTO `districts` VALUES (108, 7, 0, '');
INSERT INTO `districts` VALUES (109, 7, 0, '');
INSERT INTO `districts` VALUES (110, 7, 0, '');
INSERT INTO `districts` VALUES (111, 7, 0, '');
INSERT INTO `districts` VALUES (112, 7, 0, '');
INSERT INTO `districts` VALUES (113, 7, 0, '');
INSERT INTO `districts` VALUES (114, 7, 0, '');
INSERT INTO `districts` VALUES (115, 7, 0, '');
INSERT INTO `districts` VALUES (116, 7, 0, '');
INSERT INTO `districts` VALUES (117, 7, 0, '');
INSERT INTO `districts` VALUES (118, 7, 0, '');
INSERT INTO `districts` VALUES (119, 8, 0, '');
INSERT INTO `districts` VALUES (120, 8, 0, '');
INSERT INTO `districts` VALUES (121, 9, 0, '');
INSERT INTO `districts` VALUES (122, 9, 0, '');
INSERT INTO `districts` VALUES (123, 10, 0, '');
INSERT INTO `districts` VALUES (124, 10, 0, '');
INSERT INTO `districts` VALUES (125, 10, 0, '');
INSERT INTO `districts` VALUES (126, 10, 0, '');
INSERT INTO `districts` VALUES (127, 10, 0, '');
INSERT INTO `districts` VALUES (128, 10, 0, '');
INSERT INTO `districts` VALUES (129, 10, 0, '');
INSERT INTO `districts` VALUES (130, 10, 0, '');
INSERT INTO `districts` VALUES (131, 10, 0, '');
INSERT INTO `districts` VALUES (132, 11, 0, '');
INSERT INTO `districts` VALUES (133, 11, 0, '');
INSERT INTO `districts` VALUES (134, 12, 0, '');
INSERT INTO `districts` VALUES (135, 12, 0, '');
INSERT INTO `districts` VALUES (136, 12, 0, '');
INSERT INTO `districts` VALUES (137, 12, 0, '');
INSERT INTO `districts` VALUES (138, 12, 0, '');
INSERT INTO `districts` VALUES (139, 12, 0, '');
INSERT INTO `districts` VALUES (140, 12, 0, '');
INSERT INTO `districts` VALUES (141, 12, 0, '');
INSERT INTO `districts` VALUES (142, 12, 0, '');
INSERT INTO `districts` VALUES (143, 12, 0, '');
INSERT INTO `districts` VALUES (144, 12, 0, '');
INSERT INTO `districts` VALUES (145, 12, 0, '');
INSERT INTO `districts` VALUES (146, 12, 0, '');
INSERT INTO `districts` VALUES (147, 12, 0, '');
INSERT INTO `districts` VALUES (148, 12, 0, '');
INSERT INTO `districts` VALUES (149, 12, 0, '');
INSERT INTO `districts` VALUES (150, 12, 0, '');
INSERT INTO `districts` VALUES (151, 12, 0, '');
INSERT INTO `districts` VALUES (152, 12, 0, '');
INSERT INTO `districts` VALUES (153, 12, 0, '');
INSERT INTO `districts` VALUES (154, 12, 0, '');
INSERT INTO `districts` VALUES (155, 12, 0, '');
INSERT INTO `districts` VALUES (156, 12, 0, '');
INSERT INTO `districts` VALUES (157, 12, 0, '');
INSERT INTO `districts` VALUES (158, 12, 0, '');
INSERT INTO `districts` VALUES (159, 13, 0, '');
INSERT INTO `districts` VALUES (160, 13, 0, '');
INSERT INTO `districts` VALUES (161, 13, 0, '');
INSERT INTO `districts` VALUES (162, 13, 0, '');
INSERT INTO `districts` VALUES (163, 13, 0, '');
INSERT INTO `districts` VALUES (164, 13, 0, '');
INSERT INTO `districts` VALUES (165, 13, 0, '');
INSERT INTO `districts` VALUES (166, 13, 0, '');
INSERT INTO `districts` VALUES (167, 13, 0, '');
INSERT INTO `districts` VALUES (168, 13, 0, '');
INSERT INTO `districts` VALUES (169, 13, 0, '');
INSERT INTO `districts` VALUES (170, 13, 0, '');
INSERT INTO `districts` VALUES (171, 13, 0, '');
INSERT INTO `districts` VALUES (172, 13, 0, '');
INSERT INTO `districts` VALUES (173, 13, 0, '');
INSERT INTO `districts` VALUES (174, 13, 0, '');
INSERT INTO `districts` VALUES (175, 13, 0, '');
INSERT INTO `districts` VALUES (176, 13, 0, '');
INSERT INTO `districts` VALUES (177, 13, 0, '');
INSERT INTO `districts` VALUES (178, 13, 0, '');
INSERT INTO `districts` VALUES (179, 14, 0, '');
INSERT INTO `districts` VALUES (180, 14, 0, '');
INSERT INTO `districts` VALUES (181, 14, 0, '');
INSERT INTO `districts` VALUES (182, 14, 0, '');
INSERT INTO `districts` VALUES (183, 14, 0, '');
INSERT INTO `districts` VALUES (184, 14, 0, '');
INSERT INTO `districts` VALUES (185, 14, 0, '');
INSERT INTO `districts` VALUES (186, 14, 0, '');
INSERT INTO `districts` VALUES (187, 14, 0, '');
INSERT INTO `districts` VALUES (188, 14, 0, '');
INSERT INTO `districts` VALUES (189, 14, 0, '');
INSERT INTO `districts` VALUES (190, 14, 0, '');
INSERT INTO `districts` VALUES (191, 15, 0, '');
INSERT INTO `districts` VALUES (192, 15, 0, '');
INSERT INTO `districts` VALUES (193, 15, 0, '');
INSERT INTO `districts` VALUES (194, 15, 0, '');
INSERT INTO `districts` VALUES (195, 15, 0, '');
INSERT INTO `districts` VALUES (196, 15, 0, '');
INSERT INTO `districts` VALUES (197, 15, 0, '');
INSERT INTO `districts` VALUES (198, 15, 0, '');
INSERT INTO `districts` VALUES (199, 15, 0, '');
INSERT INTO `districts` VALUES (200, 15, 0, '');
INSERT INTO `districts` VALUES (201, 15, 0, '');
INSERT INTO `districts` VALUES (202, 15, 0, '');
INSERT INTO `districts` VALUES (203, 15, 0, '');
INSERT INTO `districts` VALUES (204, 15, 0, '');
INSERT INTO `districts` VALUES (205, 16, 0, '');
INSERT INTO `districts` VALUES (206, 16, 0, '');
INSERT INTO `districts` VALUES (207, 16, 0, '');
INSERT INTO `districts` VALUES (208, 16, 0, '');
INSERT INTO `districts` VALUES (209, 16, 0, '');
INSERT INTO `districts` VALUES (210, 16, 0, '');
INSERT INTO `districts` VALUES (211, 16, 0, '');
INSERT INTO `districts` VALUES (212, 16, 0, '');
INSERT INTO `districts` VALUES (213, 16, 0, '');
INSERT INTO `districts` VALUES (214, 16, 0, '');
INSERT INTO `districts` VALUES (215, 16, 0, '');
INSERT INTO `districts` VALUES (216, 16, 0, '');
INSERT INTO `districts` VALUES (217, 16, 0, '');
INSERT INTO `districts` VALUES (218, 16, 0, '');
INSERT INTO `districts` VALUES (219, 16, 0, '');
INSERT INTO `districts` VALUES (220, 16, 0, '');
INSERT INTO `districts` VALUES (221, 16, 0, '');
INSERT INTO `districts` VALUES (222, 16, 0, '');
INSERT INTO `districts` VALUES (223, 16, 0, '');
INSERT INTO `districts` VALUES (224, 16, 0, '');
INSERT INTO `districts` VALUES (225, 16, 0, '');
INSERT INTO `districts` VALUES (226, 16, 0, '');
INSERT INTO `districts` VALUES (227, 17, 0, '');
INSERT INTO `districts` VALUES (228, 17, 0, '');
INSERT INTO `districts` VALUES (229, 17, 0, '');
INSERT INTO `districts` VALUES (230, 17, 0, '');
INSERT INTO `districts` VALUES (231, 17, 0, '');
INSERT INTO `districts` VALUES (232, 17, 0, '');
INSERT INTO `districts` VALUES (233, 17, 0, '');
INSERT INTO `districts` VALUES (234, 17, 0, '');
INSERT INTO `districts` VALUES (235, 17, 0, '');
INSERT INTO `districts` VALUES (236, 17, 0, '');
INSERT INTO `districts` VALUES (237, 17, 0, '');
INSERT INTO `districts` VALUES (238, 17, 0, '');
INSERT INTO `districts` VALUES (239, 17, 0, '');
INSERT INTO `districts` VALUES (240, 17, 0, '');
INSERT INTO `districts` VALUES (241, 17, 0, '');
INSERT INTO `districts` VALUES (242, 17, 0, '');
INSERT INTO `districts` VALUES (243, 17, 0, '');
INSERT INTO `districts` VALUES (244, 17, 0, '');
INSERT INTO `districts` VALUES (245, 17, 0, '');
INSERT INTO `districts` VALUES (246, 17, 0, '');
INSERT INTO `districts` VALUES (247, 17, 0, '');
INSERT INTO `districts` VALUES (248, 17, 0, '');
INSERT INTO `districts` VALUES (249, 17, 0, '');
INSERT INTO `districts` VALUES (250, 17, 0, '');
INSERT INTO `districts` VALUES (251, 17, 0, '');
INSERT INTO `districts` VALUES (252, 17, 0, '');
INSERT INTO `districts` VALUES (253, 17, 0, '');
INSERT INTO `districts` VALUES (254, 18, 0, '');
INSERT INTO `districts` VALUES (255, 18, 0, '');
INSERT INTO `districts` VALUES (256, 18, 0, '');
INSERT INTO `districts` VALUES (257, 18, 0, '');
INSERT INTO `districts` VALUES (258, 18, 0, '');
INSERT INTO `districts` VALUES (259, 18, 0, '');
INSERT INTO `districts` VALUES (260, 18, 0, '');
INSERT INTO `districts` VALUES (261, 18, 0, '');
INSERT INTO `districts` VALUES (262, 18, 0, '');
INSERT INTO `districts` VALUES (263, 18, 0, '');
INSERT INTO `districts` VALUES (264, 18, 0, '');
INSERT INTO `districts` VALUES (265, 18, 0, '');
INSERT INTO `districts` VALUES (266, 18, 0, '');
INSERT INTO `districts` VALUES (267, 18, 0, '');
INSERT INTO `districts` VALUES (268, 19, 0, '');
INSERT INTO `districts` VALUES (269, 20, 0, '');
INSERT INTO `districts` VALUES (270, 20, 0, '');
INSERT INTO `districts` VALUES (271, 20, 0, '');
INSERT INTO `districts` VALUES (272, 20, 0, '');
INSERT INTO `districts` VALUES (273, 20, 0, '');
INSERT INTO `districts` VALUES (274, 20, 0, '');
INSERT INTO `districts` VALUES (275, 20, 0, '');
INSERT INTO `districts` VALUES (276, 20, 0, '');
INSERT INTO `districts` VALUES (277, 20, 0, '');
INSERT INTO `districts` VALUES (278, 20, 0, '');
INSERT INTO `districts` VALUES (279, 20, 0, '');
INSERT INTO `districts` VALUES (280, 20, 0, '');
INSERT INTO `districts` VALUES (281, 20, 0, '');
INSERT INTO `districts` VALUES (282, 20, 0, '');
INSERT INTO `districts` VALUES (283, 20, 0, '');
INSERT INTO `districts` VALUES (284, 20, 0, '');
INSERT INTO `districts` VALUES (285, 20, 0, '');
INSERT INTO `districts` VALUES (286, 20, 0, '');
INSERT INTO `districts` VALUES (287, 20, 0, '');
INSERT INTO `districts` VALUES (288, 20, 0, '');
INSERT INTO `districts` VALUES (289, 20, 0, '');
INSERT INTO `districts` VALUES (290, 20, 0, '');
INSERT INTO `districts` VALUES (291, 20, 0, '');
INSERT INTO `districts` VALUES (292, 20, 0, '');
INSERT INTO `districts` VALUES (293, 20, 0, '');
INSERT INTO `districts` VALUES (294, 20, 0, '');
INSERT INTO `districts` VALUES (295, 20, 0, '');
INSERT INTO `districts` VALUES (296, 20, 0, '');
INSERT INTO `districts` VALUES (297, 20, 0, '');
INSERT INTO `districts` VALUES (298, 20, 0, '');
INSERT INTO `districts` VALUES (299, 20, 0, '');
INSERT INTO `districts` VALUES (300, 20, 0, '');
INSERT INTO `districts` VALUES (301, 20, 0, '');
INSERT INTO `districts` VALUES (302, 20, 0, '');
INSERT INTO `districts` VALUES (303, 20, 0, '');
INSERT INTO `districts` VALUES (304, 20, 0, '');
INSERT INTO `districts` VALUES (305, 20, 0, '');
INSERT INTO `districts` VALUES (306, 20, 0, '');
INSERT INTO `districts` VALUES (307, 20, 0, '');
INSERT INTO `districts` VALUES (308, 21, 0, '');
INSERT INTO `districts` VALUES (309, 21, 0, '');
INSERT INTO `districts` VALUES (310, 21, 0, '');
INSERT INTO `districts` VALUES (311, 21, 0, '');
INSERT INTO `districts` VALUES (312, 21, 0, '');
INSERT INTO `districts` VALUES (313, 21, 0, '');
INSERT INTO `districts` VALUES (314, 21, 0, '');
INSERT INTO `districts` VALUES (315, 21, 0, '');
INSERT INTO `districts` VALUES (316, 21, 0, '');
INSERT INTO `districts` VALUES (317, 21, 0, '');
INSERT INTO `districts` VALUES (318, 21, 0, '');
INSERT INTO `districts` VALUES (319, 21, 0, '');
INSERT INTO `districts` VALUES (320, 21, 0, '');
INSERT INTO `districts` VALUES (321, 21, 0, '');
INSERT INTO `districts` VALUES (322, 21, 0, '');
INSERT INTO `districts` VALUES (323, 21, 0, '');
INSERT INTO `districts` VALUES (324, 21, 0, '');
INSERT INTO `districts` VALUES (325, 21, 0, '');
INSERT INTO `districts` VALUES (326, 21, 0, '');
INSERT INTO `districts` VALUES (327, 21, 0, '');
INSERT INTO `districts` VALUES (328, 21, 0, '');
INSERT INTO `districts` VALUES (329, 21, 0, '');
INSERT INTO `districts` VALUES (330, 21, 0, '');
INSERT INTO `districts` VALUES (331, 21, 0, '');
INSERT INTO `districts` VALUES (332, 21, 0, '');
INSERT INTO `districts` VALUES (333, 21, 0, '');
INSERT INTO `districts` VALUES (334, 21, 0, '');
INSERT INTO `districts` VALUES (335, 21, 0, '');
INSERT INTO `districts` VALUES (336, 21, 0, '');
INSERT INTO `districts` VALUES (337, 21, 0, '');
INSERT INTO `districts` VALUES (338, 21, 0, '');
INSERT INTO `districts` VALUES (339, 21, 0, '');
INSERT INTO `districts` VALUES (340, 21, 0, '');
INSERT INTO `districts` VALUES (341, 21, 0, '');
INSERT INTO `districts` VALUES (342, 21, 0, '');
INSERT INTO `districts` VALUES (343, 22, 0, '');
INSERT INTO `districts` VALUES (344, 22, 0, '');
INSERT INTO `districts` VALUES (345, 22, 0, '');
INSERT INTO `districts` VALUES (346, 22, 0, '');
INSERT INTO `districts` VALUES (347, 22, 0, '');
INSERT INTO `districts` VALUES (348, 22, 0, '');
INSERT INTO `districts` VALUES (349, 22, 0, '');
INSERT INTO `districts` VALUES (350, 22, 0, '');
INSERT INTO `districts` VALUES (351, 22, 0, '');
INSERT INTO `districts` VALUES (352, 23, 0, '');
INSERT INTO `districts` VALUES (353, 23, 0, '');
INSERT INTO `districts` VALUES (354, 23, 0, '');
INSERT INTO `districts` VALUES (355, 23, 0, '');
INSERT INTO `districts` VALUES (356, 23, 0, '');
INSERT INTO `districts` VALUES (357, 23, 0, '');
INSERT INTO `districts` VALUES (358, 23, 0, '');
INSERT INTO `districts` VALUES (359, 24, 0, '');
INSERT INTO `districts` VALUES (360, 24, 0, '');
INSERT INTO `districts` VALUES (361, 24, 0, '');
INSERT INTO `districts` VALUES (362, 24, 0, '');
INSERT INTO `districts` VALUES (363, 24, 0, '');
INSERT INTO `districts` VALUES (364, 24, 0, '');
INSERT INTO `districts` VALUES (365, 24, 0, '');
INSERT INTO `districts` VALUES (366, 24, 0, '');
INSERT INTO `districts` VALUES (367, 25, 0, '');
INSERT INTO `districts` VALUES (368, 25, 0, '');
INSERT INTO `districts` VALUES (369, 25, 0, '');
INSERT INTO `districts` VALUES (370, 25, 0, '');
INSERT INTO `districts` VALUES (371, 25, 0, '');
INSERT INTO `districts` VALUES (372, 25, 0, '');
INSERT INTO `districts` VALUES (373, 25, 0, '');
INSERT INTO `districts` VALUES (374, 25, 0, '');
INSERT INTO `districts` VALUES (375, 26, 0, '');
INSERT INTO `districts` VALUES (376, 26, 0, '');
INSERT INTO `districts` VALUES (377, 26, 0, '');
INSERT INTO `districts` VALUES (378, 26, 0, '');
INSERT INTO `districts` VALUES (379, 26, 0, '');
INSERT INTO `districts` VALUES (380, 26, 0, '');
INSERT INTO `districts` VALUES (381, 26, 0, '');
INSERT INTO `districts` VALUES (382, 26, 0, '');
INSERT INTO `districts` VALUES (383, 26, 0, '');
INSERT INTO `districts` VALUES (384, 26, 0, '');
INSERT INTO `districts` VALUES (385, 26, 0, '');
INSERT INTO `districts` VALUES (386, 26, 0, '');
INSERT INTO `districts` VALUES (387, 26, 0, '');
INSERT INTO `districts` VALUES (388, 26, 0, '');
INSERT INTO `districts` VALUES (389, 26, 0, '');
INSERT INTO `districts` VALUES (390, 26, 0, '');
INSERT INTO `districts` VALUES (391, 26, 0, '');
INSERT INTO `districts` VALUES (392, 26, 0, '');
INSERT INTO `districts` VALUES (393, 26, 0, '');
INSERT INTO `districts` VALUES (394, 26, 0, '');
INSERT INTO `districts` VALUES (395, 26, 0, '');
INSERT INTO `districts` VALUES (396, 26, 0, '');
INSERT INTO `districts` VALUES (397, 26, 0, '');
INSERT INTO `districts` VALUES (398, 26, 0, '');
INSERT INTO `districts` VALUES (399, 26, 0, '');
INSERT INTO `districts` VALUES (400, 26, 0, '');
INSERT INTO `districts` VALUES (401, 26, 0, '');
INSERT INTO `districts` VALUES (402, 26, 0, '');
INSERT INTO `districts` VALUES (403, 26, 0, '');
INSERT INTO `districts` VALUES (404, 26, 0, '');
INSERT INTO `districts` VALUES (405, 27, 0, '');
INSERT INTO `districts` VALUES (406, 27, 0, '');
INSERT INTO `districts` VALUES (407, 27, 0, '');
INSERT INTO `districts` VALUES (408, 27, 0, '');
INSERT INTO `districts` VALUES (409, 28, 0, '');
INSERT INTO `districts` VALUES (410, 28, 0, '');
INSERT INTO `districts` VALUES (411, 28, 0, '');
INSERT INTO `districts` VALUES (412, 28, 0, '');
INSERT INTO `districts` VALUES (413, 28, 0, '');
INSERT INTO `districts` VALUES (414, 28, 0, '');
INSERT INTO `districts` VALUES (415, 28, 0, '');
INSERT INTO `districts` VALUES (416, 28, 0, '');
INSERT INTO `districts` VALUES (417, 28, 0, '');
INSERT INTO `districts` VALUES (418, 28, 0, '');
INSERT INTO `districts` VALUES (419, 28, 0, '');
INSERT INTO `districts` VALUES (420, 28, 0, '');
INSERT INTO `districts` VALUES (421, 28, 0, '');
INSERT INTO `districts` VALUES (422, 28, 0, '');
INSERT INTO `districts` VALUES (423, 28, 0, '');
INSERT INTO `districts` VALUES (424, 28, 0, '');
INSERT INTO `districts` VALUES (425, 28, 0, '');
INSERT INTO `districts` VALUES (426, 29, 0, '');
INSERT INTO `districts` VALUES (427, 29, 0, '');
INSERT INTO `districts` VALUES (428, 29, 0, '');
INSERT INTO `districts` VALUES (429, 29, 0, '');
INSERT INTO `districts` VALUES (430, 29, 0, '');
INSERT INTO `districts` VALUES (431, 29, 0, '');
INSERT INTO `districts` VALUES (432, 29, 0, '');
INSERT INTO `districts` VALUES (433, 29, 0, '');
INSERT INTO `districts` VALUES (434, 29, 0, '');
INSERT INTO `districts` VALUES (435, 29, 0, '');
INSERT INTO `districts` VALUES (436, 29, 0, '');
INSERT INTO `districts` VALUES (437, 29, 0, '');
INSERT INTO `districts` VALUES (438, 29, 0, '');
INSERT INTO `districts` VALUES (439, 29, 0, '');
INSERT INTO `districts` VALUES (440, 29, 0, '');
INSERT INTO `districts` VALUES (441, 29, 0, '');
INSERT INTO `districts` VALUES (442, 29, 0, '');
INSERT INTO `districts` VALUES (443, 29, 0, '');
INSERT INTO `districts` VALUES (444, 29, 0, '');
INSERT INTO `districts` VALUES (445, 29, 0, '');
INSERT INTO `districts` VALUES (446, 29, 0, '');
INSERT INTO `districts` VALUES (447, 29, 0, '');
INSERT INTO `districts` VALUES (448, 29, 0, '');
INSERT INTO `districts` VALUES (449, 29, 0, '');
INSERT INTO `districts` VALUES (450, 29, 0, '');
INSERT INTO `districts` VALUES (451, 29, 0, '');
INSERT INTO `districts` VALUES (452, 29, 0, '');
INSERT INTO `districts` VALUES (453, 29, 0, '');
INSERT INTO `districts` VALUES (454, 29, 0, '');
INSERT INTO `districts` VALUES (455, 29, 0, '');
INSERT INTO `districts` VALUES (456, 29, 0, '');
INSERT INTO `districts` VALUES (457, 29, 0, '');
INSERT INTO `districts` VALUES (458, 30, 0, '');
INSERT INTO `districts` VALUES (459, 31, 0, '');
INSERT INTO `districts` VALUES (460, 31, 0, '');
INSERT INTO `districts` VALUES (461, 31, 0, '');
INSERT INTO `districts` VALUES (462, 31, 0, '');
INSERT INTO `districts` VALUES (463, 31, 0, '');
INSERT INTO `districts` VALUES (464, 31, 0, '');
INSERT INTO `districts` VALUES (465, 31, 0, '');
INSERT INTO `districts` VALUES (466, 31, 0, '');
INSERT INTO `districts` VALUES (467, 31, 0, '');
INSERT INTO `districts` VALUES (468, 31, 0, '');
INSERT INTO `districts` VALUES (469, 31, 0, '');
INSERT INTO `districts` VALUES (470, 31, 0, '');
INSERT INTO `districts` VALUES (471, 31, 0, '');
INSERT INTO `districts` VALUES (472, 31, 0, '');
INSERT INTO `districts` VALUES (473, 31, 0, '');
INSERT INTO `districts` VALUES (474, 31, 0, '');
INSERT INTO `districts` VALUES (475, 31, 0, '');
INSERT INTO `districts` VALUES (476, 31, 0, '');
INSERT INTO `districts` VALUES (477, 31, 0, '');
INSERT INTO `districts` VALUES (478, 31, 0, '');
INSERT INTO `districts` VALUES (479, 31, 0, '');
INSERT INTO `districts` VALUES (480, 31, 0, '');
INSERT INTO `districts` VALUES (481, 31, 0, '');
INSERT INTO `districts` VALUES (482, 31, 0, '');
INSERT INTO `districts` VALUES (483, 31, 0, '');
INSERT INTO `districts` VALUES (484, 31, 0, '');
INSERT INTO `districts` VALUES (485, 31, 0, '');
INSERT INTO `districts` VALUES (486, 31, 0, '');
INSERT INTO `districts` VALUES (487, 31, 0, '');
INSERT INTO `districts` VALUES (488, 31, 0, '');
INSERT INTO `districts` VALUES (489, 32, 0, '');
INSERT INTO `districts` VALUES (490, 32, 0, '');
INSERT INTO `districts` VALUES (491, 32, 0, '');
INSERT INTO `districts` VALUES (492, 32, 0, '');
INSERT INTO `districts` VALUES (493, 33, 0, '');
INSERT INTO `districts` VALUES (494, 33, 0, '');
INSERT INTO `districts` VALUES (495, 33, 0, '');
INSERT INTO `districts` VALUES (496, 33, 0, '');
INSERT INTO `districts` VALUES (497, 33, 0, '');
INSERT INTO `districts` VALUES (498, 33, 0, '');
INSERT INTO `districts` VALUES (499, 33, 0, '');
INSERT INTO `districts` VALUES (500, 33, 0, '');
INSERT INTO `districts` VALUES (501, 33, 0, '');
INSERT INTO `districts` VALUES (502, 33, 0, '');
INSERT INTO `districts` VALUES (503, 33, 0, '');
INSERT INTO `districts` VALUES (504, 33, 0, '');
INSERT INTO `districts` VALUES (505, 33, 0, '');
INSERT INTO `districts` VALUES (506, 33, 0, '');
INSERT INTO `districts` VALUES (507, 33, 0, '');
INSERT INTO `districts` VALUES (508, 33, 0, '');
INSERT INTO `districts` VALUES (509, 33, 0, '');
INSERT INTO `districts` VALUES (510, 33, 0, '');
INSERT INTO `districts` VALUES (511, 33, 0, '');
INSERT INTO `districts` VALUES (512, 33, 0, '');
INSERT INTO `districts` VALUES (513, 33, 0, '');
INSERT INTO `districts` VALUES (514, 33, 0, '');
INSERT INTO `districts` VALUES (515, 33, 0, '');
INSERT INTO `districts` VALUES (516, 33, 0, '');
INSERT INTO `districts` VALUES (517, 33, 0, '');
INSERT INTO `districts` VALUES (518, 33, 0, '');
INSERT INTO `districts` VALUES (519, 33, 0, '');
INSERT INTO `districts` VALUES (520, 33, 0, '');
INSERT INTO `districts` VALUES (521, 33, 0, '');
INSERT INTO `districts` VALUES (522, 33, 0, '');
INSERT INTO `districts` VALUES (523, 33, 0, '');
INSERT INTO `districts` VALUES (524, 33, 0, '');
INSERT INTO `districts` VALUES (525, 33, 0, '');
INSERT INTO `districts` VALUES (526, 33, 0, '');
INSERT INTO `districts` VALUES (527, 33, 0, '');
INSERT INTO `districts` VALUES (528, 33, 0, '');
INSERT INTO `districts` VALUES (529, 33, 0, '');
INSERT INTO `districts` VALUES (530, 33, 0, '');
INSERT INTO `districts` VALUES (531, 33, 0, '');
INSERT INTO `districts` VALUES (532, 33, 0, '');
INSERT INTO `districts` VALUES (533, 33, 0, '');
INSERT INTO `districts` VALUES (534, 33, 0, '');
INSERT INTO `districts` VALUES (535, 33, 0, '');
INSERT INTO `districts` VALUES (536, 33, 0, '');
INSERT INTO `districts` VALUES (537, 33, 0, '');
INSERT INTO `districts` VALUES (538, 33, 0, '');
INSERT INTO `districts` VALUES (539, 33, 0, '');
INSERT INTO `districts` VALUES (540, 33, 0, '');
INSERT INTO `districts` VALUES (541, 33, 0, '');
INSERT INTO `districts` VALUES (542, 33, 0, '');
INSERT INTO `districts` VALUES (543, 33, 0, '');
INSERT INTO `districts` VALUES (544, 33, 0, '');
INSERT INTO `districts` VALUES (545, 33, 0, '');
INSERT INTO `districts` VALUES (546, 33, 0, '');
INSERT INTO `districts` VALUES (547, 33, 0, '');
INSERT INTO `districts` VALUES (548, 33, 0, '');
INSERT INTO `districts` VALUES (549, 33, 0, '');
INSERT INTO `districts` VALUES (550, 33, 0, '');
INSERT INTO `districts` VALUES (551, 33, 0, '');
INSERT INTO `districts` VALUES (552, 33, 0, '');
INSERT INTO `districts` VALUES (553, 33, 0, '');
INSERT INTO `districts` VALUES (554, 33, 0, '');
INSERT INTO `districts` VALUES (555, 33, 0, '');
INSERT INTO `districts` VALUES (556, 33, 0, '');
INSERT INTO `districts` VALUES (557, 33, 0, '');
INSERT INTO `districts` VALUES (558, 33, 0, '');
INSERT INTO `districts` VALUES (559, 33, 0, '');
INSERT INTO `districts` VALUES (560, 33, 0, '');
INSERT INTO `districts` VALUES (561, 33, 0, '');
INSERT INTO `districts` VALUES (562, 33, 0, '');
INSERT INTO `districts` VALUES (563, 34, 0, '');
INSERT INTO `districts` VALUES (564, 34, 0, '');
INSERT INTO `districts` VALUES (565, 34, 0, '');
INSERT INTO `districts` VALUES (566, 34, 0, '');
INSERT INTO `districts` VALUES (567, 34, 0, '');
INSERT INTO `districts` VALUES (568, 34, 0, '');
INSERT INTO `districts` VALUES (569, 34, 0, '');
INSERT INTO `districts` VALUES (570, 34, 0, '');
INSERT INTO `districts` VALUES (571, 34, 0, '');
INSERT INTO `districts` VALUES (572, 34, 0, '');
INSERT INTO `districts` VALUES (573, 34, 0, '');
INSERT INTO `districts` VALUES (574, 34, 0, '');
INSERT INTO `districts` VALUES (575, 34, 0, '');
INSERT INTO `districts` VALUES (576, 35, 0, '');
INSERT INTO `districts` VALUES (577, 35, 0, '');
INSERT INTO `districts` VALUES (578, 35, 0, '');
INSERT INTO `districts` VALUES (579, 35, 0, '');
INSERT INTO `districts` VALUES (580, 35, 0, '');
INSERT INTO `districts` VALUES (581, 35, 0, '');
INSERT INTO `districts` VALUES (582, 35, 0, '');
INSERT INTO `districts` VALUES (583, 35, 0, '');
INSERT INTO `districts` VALUES (584, 35, 0, '');
INSERT INTO `districts` VALUES (585, 35, 0, '');
INSERT INTO `districts` VALUES (586, 35, 0, '');
INSERT INTO `districts` VALUES (587, 35, 0, '');
INSERT INTO `districts` VALUES (588, 35, 0, '');
INSERT INTO `districts` VALUES (589, 35, 0, '');
INSERT INTO `districts` VALUES (590, 35, 0, '');
INSERT INTO `districts` VALUES (591, 35, 0, '');
INSERT INTO `districts` VALUES (592, 35, 0, '');
INSERT INTO `districts` VALUES (593, 35, 0, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `interests`
-- 

CREATE TABLE `interests` (
  `MessageID` bigint(20) NOT NULL auto_increment,
  `SenderID` varchar(250) default '0',
  `RecieverID` varchar(250) NOT NULL default '0',
  `AcceptStatus` int(11) NOT NULL default '0',
  `DenyStatus` int(11) NOT NULL default '0',
  `MessageDate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`MessageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `interests`
-- 

INSERT INTO `interests` VALUES (3, 'nadiralishah', 'bride3', 0, 0, '2008-03-01 10:06:21');
INSERT INTO `interests` VALUES (4, 'nadiralishah', 'nadiralishah', 1, 0, '2008-03-01 10:31:40');

-- --------------------------------------------------------

-- 
-- Table structure for table `messages`
-- 

CREATE TABLE `messages` (
  `MessageID` bigint(20) NOT NULL auto_increment,
  `SenderID` varchar(250) default '0',
  `RecieverID` varchar(250) NOT NULL default '0',
  `ReadStatus` int(11) NOT NULL default '0',
  `Message` text,
  `MessageDate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`MessageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `messages`
-- 

INSERT INTO `messages` VALUES (1, 'nadiralishah', 'nadiralishah', 1, 'testing...', '2008-01-11 10:44:37');

-- --------------------------------------------------------

-- 
-- Table structure for table `partner_profile`
-- 

CREATE TABLE `partner_profile` (
  `PartnerProfileID` bigint(20) NOT NULL auto_increment,
  `UserID` bigint(20) NOT NULL default '0',
  `Gender` varchar(250) default NULL,
  `AgeFrom` varchar(250) default NULL,
  `AgeTo` varchar(250) default NULL,
  `MaritalStatus` varchar(250) default NULL,
  `HaveChildren` varchar(250) default NULL,
  `HeightFrom` varchar(250) default '0',
  `BodyType` varchar(250) default NULL,
  `Manglik` varchar(250) default NULL,
  `Complexion` varchar(250) default NULL,
  `SpecialCases` varchar(250) default NULL,
  `HIV` varchar(250) default NULL,
  `Religion` text,
  `MotherTongue` text,
  `FamilyValues` varchar(250) default NULL,
  `EducationLevel` text,
  `EducationArea` text,
  `Profession` text,
  `Diet` varchar(250) default NULL,
  `Smoke` varchar(250) default NULL,
  `Drink` varchar(250) default NULL,
  `CountryOfResidence` text,
  `StateOfResidence` text,
  `ResidencyStatus` varchar(250) default NULL,
  `HeightTo` varchar(250) default '0',
  PRIMARY KEY  (`PartnerProfileID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `partner_profile`
-- 

INSERT INTO `partner_profile` VALUES (21, 24, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (2, 2, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (3, 3, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (4, 4, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (5, 5, 'Female', '18', '18', '', '', '53', '', '', '', '', 'No', '', ' ', '', '', '', '', '', '', '', '', '', '', '84');
INSERT INTO `partner_profile` VALUES (6, 6, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (7, 7, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (8, 8, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (9, 9, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (10, 10, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (11, 11, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (12, 12, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (13, 16, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (14, 17, 'Female', '18', '18', '', '', '53', '', '', '', '', '', '', ' ', '', '', '', '', '', '', '', '4|6|5', '23|20|22', '', '84');
INSERT INTO `partner_profile` VALUES (15, 18, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (16, 19, 'Female', '18', '18', '', '', '53', '', '', '', '', '', '', ' ', '', '', '', '', '', '', '', '7', '184', '', '84');
INSERT INTO `partner_profile` VALUES (17, 20, '', '18', '18', '', '', '5ft 7in - 170cm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6ft 8in - 203cm');
INSERT INTO `partner_profile` VALUES (18, 21, '', '22', '37', '', 'No', '5ft 0in - 152cm', '', 'No', '', '', '', '2', 'Arabic', '', 'Masters|Doctorate', 'Architecture|Administrative services', 'Accountant', '', 'No', '', '1|4', '2|5|7|104', 'Temporary Visa|Student Visa', '5ft 11in - 180cm');
INSERT INTO `partner_profile` VALUES (19, 22, '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');
INSERT INTO `partner_profile` VALUES (20, 23, 'Female', '18', '23', '', '', '4ft 5in - 134cm', '', '', '', '', '', '2', 'Aka|Arabic|Arunachali|Assamese', '', 'Doctorate|Diploma', 'Architecture|Armed Forces|Arts', 'Non-mainstream professional|Accountant', '', '', '', '4', '93', 'Temporary Visa', '7ft 0in - 213cm');

-- --------------------------------------------------------

-- 
-- Table structure for table `religion`
-- 

CREATE TABLE `religion` (
  `ReligionID` bigint(20) NOT NULL auto_increment,
  `Religion` varchar(250) default NULL,
  PRIMARY KEY  (`ReligionID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- 
-- Dumping data for table `religion`
-- 

INSERT INTO `religion` VALUES (1, 'Muslim');
INSERT INTO `religion` VALUES (2, 'Muslim: Sunni');
INSERT INTO `religion` VALUES (3, 'Muslim: Shia');
INSERT INTO `religion` VALUES (4, 'Muslim: Bengali');
INSERT INTO `religion` VALUES (5, 'Muslim: Dawoodi Bohra');
INSERT INTO `religion` VALUES (6, 'Christian');
INSERT INTO `religion` VALUES (7, 'Christian: Protestant');
INSERT INTO `religion` VALUES (8, 'Christian: Born Again');
INSERT INTO `religion` VALUES (9, 'Christian: Roman Catholic');
INSERT INTO `religion` VALUES (10, 'Hindu');
INSERT INTO `religion` VALUES (11, 'Hindu: Assamese');
INSERT INTO `religion` VALUES (12, 'Hindu: Bengali');
INSERT INTO `religion` VALUES (13, 'Hindu: Gujarati');
INSERT INTO `religion` VALUES (14, 'Hindu: Hindi');
INSERT INTO `religion` VALUES (15, 'Hindu: Kannada');
INSERT INTO `religion` VALUES (16, 'Hindu: Konkani');
INSERT INTO `religion` VALUES (17, 'Hindu: Malayalam');
INSERT INTO `religion` VALUES (18, 'Hindu: Marathi');
INSERT INTO `religion` VALUES (19, 'Hindu: Marwari');
INSERT INTO `religion` VALUES (20, 'Hindu: Oriya');
INSERT INTO `religion` VALUES (21, 'Hindu: Punjabi');
INSERT INTO `religion` VALUES (22, 'Hindu: Sindhi');
INSERT INTO `religion` VALUES (23, 'Hindu: Tamil');
INSERT INTO `religion` VALUES (24, 'Hindu: Telugu');
INSERT INTO `religion` VALUES (25, 'Parsi');
INSERT INTO `religion` VALUES (26, 'Sikh');
INSERT INTO `religion` VALUES (27, 'Sikh: Jat');
INSERT INTO `religion` VALUES (28, 'Sikh: Ramgharia');
INSERT INTO `religion` VALUES (29, 'Sikh: Khatri');
INSERT INTO `religion` VALUES (30, 'Sikh: Gursikh');
INSERT INTO `religion` VALUES (31, 'Jain');
INSERT INTO `religion` VALUES (32, 'Jain: Shewetamber');
INSERT INTO `religion` VALUES (33, 'Jain: Digambar');
INSERT INTO `religion` VALUES (34, 'Jain: Vania');
INSERT INTO `religion` VALUES (35, 'Buddhist');
INSERT INTO `religion` VALUES (36, 'Jewish');
INSERT INTO `religion` VALUES (37, 'No Religion');
INSERT INTO `religion` VALUES (38, 'Spiritual - not religious');
INSERT INTO `religion` VALUES (39, 'Other');

-- --------------------------------------------------------

-- 
-- Table structure for table `states`
-- 

CREATE TABLE `states` (
  `StateID` bigint(20) NOT NULL auto_increment,
  `CountryID` bigint(20) NOT NULL default '0',
  `State` varchar(250) default NULL,
  PRIMARY KEY  (`StateID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=350 ;

-- 
-- Dumping data for table `states`
-- 

INSERT INTO `states` VALUES (1, 1, 'Andaman and Nicobar');
INSERT INTO `states` VALUES (2, 1, 'Andhra Pradesh');
INSERT INTO `states` VALUES (3, 1, 'Arunachal Pradesh');
INSERT INTO `states` VALUES (4, 1, 'Assam');
INSERT INTO `states` VALUES (5, 1, 'Bihar');
INSERT INTO `states` VALUES (6, 1, 'Chandigarh');
INSERT INTO `states` VALUES (7, 1, 'Chhattisgarh');
INSERT INTO `states` VALUES (8, 1, 'Dadra and Nagar Haveli');
INSERT INTO `states` VALUES (9, 1, 'Daman and Diu');
INSERT INTO `states` VALUES (10, 1, 'Delhi');
INSERT INTO `states` VALUES (11, 1, 'Goa');
INSERT INTO `states` VALUES (12, 1, 'Gujarat');
INSERT INTO `states` VALUES (13, 1, 'Haryana');
INSERT INTO `states` VALUES (14, 1, 'Himachal Pradesh');
INSERT INTO `states` VALUES (15, 1, 'Jammu and Kashmir');
INSERT INTO `states` VALUES (16, 1, 'Jharkhand');
INSERT INTO `states` VALUES (17, 1, 'Karnataka');
INSERT INTO `states` VALUES (18, 1, 'Kerala');
INSERT INTO `states` VALUES (19, 1, 'Lakshadweep');
INSERT INTO `states` VALUES (20, 1, 'Madhya Pradesh');
INSERT INTO `states` VALUES (21, 1, 'Maharashtra');
INSERT INTO `states` VALUES (22, 1, 'Manipur');
INSERT INTO `states` VALUES (23, 1, 'Meghalaya');
INSERT INTO `states` VALUES (24, 1, 'Mizoram');
INSERT INTO `states` VALUES (25, 1, 'Nagaland');
INSERT INTO `states` VALUES (26, 1, 'Orissa');
INSERT INTO `states` VALUES (27, 1, 'Puducherry');
INSERT INTO `states` VALUES (28, 1, 'Punjab');
INSERT INTO `states` VALUES (29, 1, 'Rajasthan');
INSERT INTO `states` VALUES (30, 1, 'Sikkim');
INSERT INTO `states` VALUES (31, 1, 'Tamil Nadu');
INSERT INTO `states` VALUES (32, 1, 'Tripura');
INSERT INTO `states` VALUES (33, 1, 'Uttar Pradesh');
INSERT INTO `states` VALUES (34, 1, 'Uttarakhand');
INSERT INTO `states` VALUES (35, 1, 'West Benga');
INSERT INTO `states` VALUES (36, 2, 'Alabama');
INSERT INTO `states` VALUES (37, 2, 'Alaska');
INSERT INTO `states` VALUES (38, 2, 'Arizona');
INSERT INTO `states` VALUES (39, 2, 'Arkansas');
INSERT INTO `states` VALUES (40, 2, 'California');
INSERT INTO `states` VALUES (41, 2, 'Colorado');
INSERT INTO `states` VALUES (42, 2, 'Connecticut');
INSERT INTO `states` VALUES (43, 2, 'Delaware');
INSERT INTO `states` VALUES (44, 2, 'District of Columbia');
INSERT INTO `states` VALUES (45, 2, 'Florida');
INSERT INTO `states` VALUES (46, 2, 'Georgia');
INSERT INTO `states` VALUES (47, 2, 'Hawaii');
INSERT INTO `states` VALUES (48, 2, 'Idaho');
INSERT INTO `states` VALUES (49, 2, 'Illinois');
INSERT INTO `states` VALUES (50, 2, 'Indiana');
INSERT INTO `states` VALUES (51, 2, 'Iowa');
INSERT INTO `states` VALUES (52, 2, 'Kansas');
INSERT INTO `states` VALUES (53, 2, 'Kentucky');
INSERT INTO `states` VALUES (54, 2, 'Louisiana');
INSERT INTO `states` VALUES (55, 2, 'Maine');
INSERT INTO `states` VALUES (56, 2, 'Maryland');
INSERT INTO `states` VALUES (57, 2, 'Massachusetts');
INSERT INTO `states` VALUES (58, 2, 'Michigan');
INSERT INTO `states` VALUES (59, 2, 'Minnesota');
INSERT INTO `states` VALUES (60, 2, 'Mississippi');
INSERT INTO `states` VALUES (61, 2, 'Missouri');
INSERT INTO `states` VALUES (62, 2, 'Montana');
INSERT INTO `states` VALUES (63, 2, 'Nebraska');
INSERT INTO `states` VALUES (64, 2, 'Nevada');
INSERT INTO `states` VALUES (65, 2, 'New Hampshire');
INSERT INTO `states` VALUES (66, 2, 'New Jersey');
INSERT INTO `states` VALUES (67, 2, 'New Mexico');
INSERT INTO `states` VALUES (68, 2, 'New York');
INSERT INTO `states` VALUES (69, 2, 'North Carolina');
INSERT INTO `states` VALUES (70, 2, 'North Dakota');
INSERT INTO `states` VALUES (71, 2, 'Ohio');
INSERT INTO `states` VALUES (72, 2, 'Oklahoma');
INSERT INTO `states` VALUES (73, 2, 'Oregon');
INSERT INTO `states` VALUES (74, 2, 'Pennsylvania');
INSERT INTO `states` VALUES (75, 2, 'Rhode Island');
INSERT INTO `states` VALUES (76, 2, '');
INSERT INTO `states` VALUES (77, 2, 'South Carolina');
INSERT INTO `states` VALUES (78, 2, 'South Carolina');
INSERT INTO `states` VALUES (79, 2, 'South Dakota');
INSERT INTO `states` VALUES (80, 2, 'Tennessee');
INSERT INTO `states` VALUES (81, 2, 'Texas');
INSERT INTO `states` VALUES (82, 2, 'Utah');
INSERT INTO `states` VALUES (83, 2, 'Vermont');
INSERT INTO `states` VALUES (84, 2, 'Virginia');
INSERT INTO `states` VALUES (85, 2, 'Washington');
INSERT INTO `states` VALUES (86, 2, 'West Virginia');
INSERT INTO `states` VALUES (87, 2, 'Wisconsin');
INSERT INTO `states` VALUES (88, 2, 'Wyoming');
INSERT INTO `states` VALUES (89, 3, 'England');
INSERT INTO `states` VALUES (90, 3, 'Northern Ireland');
INSERT INTO `states` VALUES (91, 3, 'Scotland');
INSERT INTO `states` VALUES (92, 3, 'Wales');
INSERT INTO `states` VALUES (93, 4, 'Alberta');
INSERT INTO `states` VALUES (94, 4, 'British Columbia');
INSERT INTO `states` VALUES (95, 4, 'Labrado');
INSERT INTO `states` VALUES (96, 4, 'Manitoba');
INSERT INTO `states` VALUES (97, 4, 'New Brunswick');
INSERT INTO `states` VALUES (98, 4, 'Newfoundland');
INSERT INTO `states` VALUES (99, 4, 'Nova Scotia');
INSERT INTO `states` VALUES (100, 4, 'Ontario');
INSERT INTO `states` VALUES (101, 4, 'Prince Edward Island');
INSERT INTO `states` VALUES (102, 4, 'Quebec');
INSERT INTO `states` VALUES (103, 4, 'Saskatchewan');
INSERT INTO `states` VALUES (104, 4, 'ACT');
INSERT INTO `states` VALUES (105, 5, 'ACT');
INSERT INTO `states` VALUES (106, 5, 'New South Wales');
INSERT INTO `states` VALUES (107, 5, 'Northern Territory');
INSERT INTO `states` VALUES (108, 5, 'Queensland');
INSERT INTO `states` VALUES (109, 5, 'South Australia');
INSERT INTO `states` VALUES (110, 5, 'Tasmania');
INSERT INTO `states` VALUES (111, 5, 'Victoria');
INSERT INTO `states` VALUES (112, 5, 'Western Australia');
INSERT INTO `states` VALUES (113, 6, 'Albania');
INSERT INTO `states` VALUES (114, 6, 'Andorra');
INSERT INTO `states` VALUES (115, 6, 'Armenia');
INSERT INTO `states` VALUES (116, 6, 'Austria');
INSERT INTO `states` VALUES (117, 6, 'Belarus');
INSERT INTO `states` VALUES (118, 6, 'Belgium');
INSERT INTO `states` VALUES (119, 6, 'Bosnia');
INSERT INTO `states` VALUES (120, 6, 'Bulgaria');
INSERT INTO `states` VALUES (121, 6, 'Croatia');
INSERT INTO `states` VALUES (122, 6, 'Cyprus');
INSERT INTO `states` VALUES (123, 6, 'Czech Republic');
INSERT INTO `states` VALUES (124, 6, 'Denmark');
INSERT INTO `states` VALUES (125, 6, 'Estonia');
INSERT INTO `states` VALUES (126, 6, 'Faroe Islands');
INSERT INTO `states` VALUES (127, 6, 'Finland');
INSERT INTO `states` VALUES (128, 6, 'France');
INSERT INTO `states` VALUES (129, 6, 'Georgia');
INSERT INTO `states` VALUES (130, 6, 'Germany');
INSERT INTO `states` VALUES (131, 6, 'Gibraltar');
INSERT INTO `states` VALUES (132, 6, 'Greece');
INSERT INTO `states` VALUES (133, 6, 'Greenland');
INSERT INTO `states` VALUES (134, 6, 'Holland');
INSERT INTO `states` VALUES (135, 6, 'Hungary');
INSERT INTO `states` VALUES (136, 6, 'Iceland');
INSERT INTO `states` VALUES (137, 6, 'Ireland');
INSERT INTO `states` VALUES (138, 6, 'Italy');
INSERT INTO `states` VALUES (139, 6, 'Latvia');
INSERT INTO `states` VALUES (140, 6, 'Liechtenstein');
INSERT INTO `states` VALUES (141, 6, 'Lithuania');
INSERT INTO `states` VALUES (142, 6, 'Luxembourg');
INSERT INTO `states` VALUES (143, 6, 'Macedonia');
INSERT INTO `states` VALUES (144, 6, 'Malta');
INSERT INTO `states` VALUES (145, 6, 'Moldova');
INSERT INTO `states` VALUES (146, 6, 'Monaco');
INSERT INTO `states` VALUES (147, 6, 'Montenegro');
INSERT INTO `states` VALUES (148, 6, 'Norway');
INSERT INTO `states` VALUES (149, 6, 'Poland');
INSERT INTO `states` VALUES (150, 6, 'Portugal');
INSERT INTO `states` VALUES (151, 6, 'Romania');
INSERT INTO `states` VALUES (152, 6, 'Russia');
INSERT INTO `states` VALUES (153, 6, 'San Marino');
INSERT INTO `states` VALUES (154, 6, 'Serbia');
INSERT INTO `states` VALUES (155, 6, 'Slovakia');
INSERT INTO `states` VALUES (156, 6, 'Slovenia');
INSERT INTO `states` VALUES (157, 6, 'Spain');
INSERT INTO `states` VALUES (158, 6, 'Svalbard');
INSERT INTO `states` VALUES (159, 6, 'Sweden');
INSERT INTO `states` VALUES (160, 6, 'Switzerland');
INSERT INTO `states` VALUES (161, 6, 'Turkey');
INSERT INTO `states` VALUES (162, 6, 'Ukraine');
INSERT INTO `states` VALUES (163, 6, 'Vatican City');
INSERT INTO `states` VALUES (164, 7, 'Afghanistan');
INSERT INTO `states` VALUES (165, 7, 'Azerbaijan');
INSERT INTO `states` VALUES (166, 7, 'Bangladesh');
INSERT INTO `states` VALUES (167, 7, 'Bhutan');
INSERT INTO `states` VALUES (168, 7, 'Brunei');
INSERT INTO `states` VALUES (169, 7, 'Cambodia');
INSERT INTO `states` VALUES (170, 7, 'China');
INSERT INTO `states` VALUES (171, 7, 'Hong Kong');
INSERT INTO `states` VALUES (172, 7, 'Indonesia');
INSERT INTO `states` VALUES (173, 7, 'Japan');
INSERT INTO `states` VALUES (174, 7, 'Kazakhstan');
INSERT INTO `states` VALUES (175, 7, 'Kyrgyzstan');
INSERT INTO `states` VALUES (176, 7, 'Laos');
INSERT INTO `states` VALUES (177, 7, 'Macau');
INSERT INTO `states` VALUES (178, 7, 'Malaysia');
INSERT INTO `states` VALUES (179, 7, 'Maldives');
INSERT INTO `states` VALUES (180, 7, 'Mongolia');
INSERT INTO `states` VALUES (181, 7, 'Myanmar');
INSERT INTO `states` VALUES (182, 7, 'Nepal');
INSERT INTO `states` VALUES (183, 7, 'North Korea');
INSERT INTO `states` VALUES (184, 7, 'Pakistan');
INSERT INTO `states` VALUES (185, 7, 'Paracel Islands');
INSERT INTO `states` VALUES (186, 7, 'Philippines');
INSERT INTO `states` VALUES (187, 7, 'Singapore');
INSERT INTO `states` VALUES (188, 7, 'South Korea');
INSERT INTO `states` VALUES (189, 7, 'Spratly Islands');
INSERT INTO `states` VALUES (190, 7, 'Sri Lanka');
INSERT INTO `states` VALUES (191, 7, 'Taiwan');
INSERT INTO `states` VALUES (192, 7, 'Tajikistan');
INSERT INTO `states` VALUES (193, 7, 'Thailand');
INSERT INTO `states` VALUES (194, 7, 'Turkey');
INSERT INTO `states` VALUES (195, 7, 'Turkmenistan');
INSERT INTO `states` VALUES (196, 7, 'Uzbekistan');
INSERT INTO `states` VALUES (197, 7, 'Vietnam');
INSERT INTO `states` VALUES (198, 8, 'Bahrain');
INSERT INTO `states` VALUES (199, 8, 'Iran');
INSERT INTO `states` VALUES (200, 8, 'Iraq');
INSERT INTO `states` VALUES (201, 8, 'Israel');
INSERT INTO `states` VALUES (202, 8, 'Jordan');
INSERT INTO `states` VALUES (203, 8, 'Kuwait');
INSERT INTO `states` VALUES (204, 8, 'Lebanon');
INSERT INTO `states` VALUES (205, 8, 'Oman');
INSERT INTO `states` VALUES (206, 8, 'Qatar');
INSERT INTO `states` VALUES (207, 8, 'Saudi Arabia');
INSERT INTO `states` VALUES (208, 8, 'Syria');
INSERT INTO `states` VALUES (209, 8, 'UAE');
INSERT INTO `states` VALUES (210, 8, 'West Bank');
INSERT INTO `states` VALUES (211, 8, 'Yemen');
INSERT INTO `states` VALUES (212, 9, 'Algeria');
INSERT INTO `states` VALUES (213, 9, 'Angola');
INSERT INTO `states` VALUES (214, 9, 'Benin');
INSERT INTO `states` VALUES (215, 9, 'Botswana');
INSERT INTO `states` VALUES (216, 9, 'Burkina Faso');
INSERT INTO `states` VALUES (217, 9, 'Burundi');
INSERT INTO `states` VALUES (218, 9, 'Cameroon');
INSERT INTO `states` VALUES (219, 9, 'Cape Verde');
INSERT INTO `states` VALUES (220, 9, 'Cen. Afr. Rep.');
INSERT INTO `states` VALUES (221, 9, 'Chad');
INSERT INTO `states` VALUES (222, 9, 'Comoros');
INSERT INTO `states` VALUES (223, 9, 'Congo');
INSERT INTO `states` VALUES (224, 9, 'Djibouti');
INSERT INTO `states` VALUES (225, 9, 'Egypt');
INSERT INTO `states` VALUES (226, 9, 'Eq. Guinea');
INSERT INTO `states` VALUES (227, 9, 'Eritrea');
INSERT INTO `states` VALUES (228, 9, 'Ethiopia');
INSERT INTO `states` VALUES (229, 9, 'Gabon');
INSERT INTO `states` VALUES (230, 9, 'Ghana');
INSERT INTO `states` VALUES (231, 9, 'Guinea');
INSERT INTO `states` VALUES (232, 9, 'Guinea Bissau');
INSERT INTO `states` VALUES (233, 9, 'Ivory Coast');
INSERT INTO `states` VALUES (234, 9, 'Kenya');
INSERT INTO `states` VALUES (235, 9, 'Lesotho');
INSERT INTO `states` VALUES (236, 9, 'Liberia');
INSERT INTO `states` VALUES (237, 9, 'Libya');
INSERT INTO `states` VALUES (238, 9, 'Madagascar');
INSERT INTO `states` VALUES (239, 9, 'Malawi');
INSERT INTO `states` VALUES (240, 9, 'Mali');
INSERT INTO `states` VALUES (241, 9, 'Mauritania');
INSERT INTO `states` VALUES (242, 9, 'Mauritius');
INSERT INTO `states` VALUES (243, 9, 'Morocco');
INSERT INTO `states` VALUES (244, 9, 'Mozambique');
INSERT INTO `states` VALUES (245, 9, 'Namibia');
INSERT INTO `states` VALUES (246, 9, 'Niger');
INSERT INTO `states` VALUES (247, 9, 'Nigeria');
INSERT INTO `states` VALUES (248, 9, 'Reunion');
INSERT INTO `states` VALUES (249, 9, 'Rwanda');
INSERT INTO `states` VALUES (250, 9, 'Saint Helena');
INSERT INTO `states` VALUES (251, 9, 'Sao Tome');
INSERT INTO `states` VALUES (252, 9, 'Senegal');
INSERT INTO `states` VALUES (253, 9, 'Seychelles');
INSERT INTO `states` VALUES (254, 9, 'Sierra Leone');
INSERT INTO `states` VALUES (255, 9, 'Somalia');
INSERT INTO `states` VALUES (256, 9, 'South Africa');
INSERT INTO `states` VALUES (257, 9, 'Sudan');
INSERT INTO `states` VALUES (258, 9, 'Swaziland');
INSERT INTO `states` VALUES (259, 9, 'Tanzania');
INSERT INTO `states` VALUES (260, 9, 'The Gambia');
INSERT INTO `states` VALUES (261, 9, 'Togo');
INSERT INTO `states` VALUES (262, 9, 'Tunisia');
INSERT INTO `states` VALUES (263, 9, '');
INSERT INTO `states` VALUES (264, 9, 'Uganda');
INSERT INTO `states` VALUES (265, 9, 'W. Sahara');
INSERT INTO `states` VALUES (266, 9, 'Zaire');
INSERT INTO `states` VALUES (267, 9, 'Zambia');
INSERT INTO `states` VALUES (268, 9, 'Zimbabwe');
INSERT INTO `states` VALUES (269, 10, 'Anguilla');
INSERT INTO `states` VALUES (270, 10, 'Antigua');
INSERT INTO `states` VALUES (271, 10, 'Aruba');
INSERT INTO `states` VALUES (272, 10, 'Bahamas');
INSERT INTO `states` VALUES (273, 10, 'Barbados');
INSERT INTO `states` VALUES (274, 10, 'Belize');
INSERT INTO `states` VALUES (275, 10, 'Bermuda');
INSERT INTO `states` VALUES (276, 10, 'British V.I.');
INSERT INTO `states` VALUES (277, 10, 'Cayman Islands');
INSERT INTO `states` VALUES (278, 10, 'Colombia');
INSERT INTO `states` VALUES (279, 10, 'Costa Rica');
INSERT INTO `states` VALUES (280, 10, 'Cuba');
INSERT INTO `states` VALUES (281, 10, 'Dom. Republic');
INSERT INTO `states` VALUES (282, 10, 'Dominica');
INSERT INTO `states` VALUES (283, 10, 'Dutch Antilles');
INSERT INTO `states` VALUES (284, 10, 'El Salvador');
INSERT INTO `states` VALUES (285, 10, 'Grenada');
INSERT INTO `states` VALUES (286, 10, 'Grenadines');
INSERT INTO `states` VALUES (287, 10, 'Guadeloupe');
INSERT INTO `states` VALUES (288, 10, 'Haiti');
INSERT INTO `states` VALUES (289, 10, 'Jamaica');
INSERT INTO `states` VALUES (290, 10, 'Martinique');
INSERT INTO `states` VALUES (291, 10, 'Mexico');
INSERT INTO `states` VALUES (292, 10, 'Panama');
INSERT INTO `states` VALUES (293, 10, 'Puerto Rico');
INSERT INTO `states` VALUES (294, 10, 'St. Barths');
INSERT INTO `states` VALUES (295, 10, 'St. Kitts');
INSERT INTO `states` VALUES (296, 10, 'St. Lucia');
INSERT INTO `states` VALUES (297, 10, 'St. Martin');
INSERT INTO `states` VALUES (298, 10, 'St. Vincent');
INSERT INTO `states` VALUES (299, 10, 'Trinidad and Tobago');
INSERT INTO `states` VALUES (300, 10, 'Turks and Caicos');
INSERT INTO `states` VALUES (301, 10, 'US Virgin Islands');
INSERT INTO `states` VALUES (302, 10, 'Venezuela');
INSERT INTO `states` VALUES (303, 11, 'American Samoa');
INSERT INTO `states` VALUES (304, 11, 'Cook Islands');
INSERT INTO `states` VALUES (305, 11, 'East Timor');
INSERT INTO `states` VALUES (306, 11, 'Fiji');
INSERT INTO `states` VALUES (307, 11, 'French Polynesia');
INSERT INTO `states` VALUES (308, 11, 'Guam');
INSERT INTO `states` VALUES (309, 11, 'Kiribati');
INSERT INTO `states` VALUES (310, 11, 'Mariana Islands');
INSERT INTO `states` VALUES (311, 11, 'Marshall Islands');
INSERT INTO `states` VALUES (312, 11, 'Micronesia');
INSERT INTO `states` VALUES (313, 11, 'Nauru');
INSERT INTO `states` VALUES (314, 11, 'New Caledonia');
INSERT INTO `states` VALUES (315, 11, 'New Zealand');
INSERT INTO `states` VALUES (316, 11, 'Palau');
INSERT INTO `states` VALUES (317, 11, 'Pap. New Guinea');
INSERT INTO `states` VALUES (318, 11, 'Pitcairn Islands');
INSERT INTO `states` VALUES (319, 11, 'Samoa (Western)');
INSERT INTO `states` VALUES (320, 11, 'Solomon Isles');
INSERT INTO `states` VALUES (321, 11, 'Tokelau');
INSERT INTO `states` VALUES (322, 11, 'Tonga');
INSERT INTO `states` VALUES (323, 11, 'Tuvalu');
INSERT INTO `states` VALUES (324, 11, 'Vanuatu');
INSERT INTO `states` VALUES (325, 11, 'Wallis And Futuna');
INSERT INTO `states` VALUES (326, 11, 'Argentina');
INSERT INTO `states` VALUES (327, 11, 'Belize');
INSERT INTO `states` VALUES (328, 12, 'Belize');
INSERT INTO `states` VALUES (329, 12, 'Bolivia');
INSERT INTO `states` VALUES (330, 12, 'Brazil');
INSERT INTO `states` VALUES (331, 12, 'Chile');
INSERT INTO `states` VALUES (332, 12, 'Colombia');
INSERT INTO `states` VALUES (333, 12, 'Costa Rica');
INSERT INTO `states` VALUES (334, 12, 'Ecuador');
INSERT INTO `states` VALUES (335, 12, 'El Salvador');
INSERT INTO `states` VALUES (336, 12, 'Falklands');
INSERT INTO `states` VALUES (337, 12, 'Fr. Guiana');
INSERT INTO `states` VALUES (338, 12, 'Guatemala');
INSERT INTO `states` VALUES (339, 12, 'Guyana');
INSERT INTO `states` VALUES (340, 12, 'Honduras');
INSERT INTO `states` VALUES (341, 12, 'Mexico');
INSERT INTO `states` VALUES (342, 12, 'Nicaragua');
INSERT INTO `states` VALUES (343, 12, 'Panama');
INSERT INTO `states` VALUES (344, 12, 'Paraguay');
INSERT INTO `states` VALUES (345, 12, 'Peru');
INSERT INTO `states` VALUES (346, 12, 'Sth. Georgia');
INSERT INTO `states` VALUES (347, 12, 'Suriname');
INSERT INTO `states` VALUES (348, 12, 'Uruguay');
INSERT INTO `states` VALUES (349, 12, 'Venezuela');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_profile`
-- 

CREATE TABLE `user_profile` (
  `ProfileID` bigint(20) NOT NULL auto_increment,
  `UserID` bigint(20) NOT NULL default '0',
  `CreatedBy` varchar(250) default NULL,
  `MaritalStatus` varchar(250) default NULL,
  `HaveChildren` varchar(250) default NULL,
  `Height` varchar(250) default NULL,
  `BodyType` varchar(250) default NULL,
  `Complexion` varchar(250) default NULL,
  `SpecialCases` varchar(250) default NULL,
  `MotherTongue` varchar(250) default NULL,
  `Caste` varchar(250) default NULL,
  `SubCaste` varchar(250) default NULL,
  `Manglik` varchar(250) default NULL,
  `FamilyValues` varchar(250) default NULL,
  `Education` varchar(250) default NULL,
  `EducationIn` varchar(250) default NULL,
  `Profession` varchar(250) default NULL,
  `Diet` varchar(250) default NULL,
  `Smoke` varchar(250) default NULL,
  `Drink` varchar(250) default NULL,
  `StateID` bigint(20) NOT NULL default '0',
  `CityID` bigint(20) NOT NULL default '0',
  `ResidencyStatus` varchar(250) default NULL,
  `PhoneStatus` varchar(250) default NULL,
  `CountryCode` varchar(250) default NULL,
  `AreaStdCode` varchar(250) default NULL,
  `PhoneNumber` varchar(250) default NULL,
  `DisplayContactStatus` varchar(250) default NULL,
  `AboutYourself` text,
  `BloodGroup` varchar(250) default NULL,
  `Gotra` varchar(250) default NULL,
  `AnnualIncome` varchar(250) default NULL,
  `ContactPersonName` varchar(250) default NULL,
  `ContactPersonRelationShip` varchar(250) default NULL,
  `ConvenientCallTime` varchar(250) default NULL,
  `PersonalValues` varchar(250) default NULL,
  `CountryOfBirth` bigint(25) NOT NULL default '0',
  `GrewUpIn` varchar(250) default NULL,
  `Father` varchar(250) default NULL,
  `Mother` varchar(250) default NULL,
  `Brothers` varchar(250) default NULL,
  `Sisters` varchar(250) default NULL,
  `MarriedBrothers` varchar(250) default NULL,
  `MarriedSisters` varchar(250) default NULL,
  `AboutFamily` text,
  `BirthHour` varchar(250) default NULL,
  `BirthMin` varchar(250) default NULL,
  `BirthSec` varchar(250) default NULL,
  `BirthCity` int(11) default '0',
  `Hobbies` text,
  `Interests` text,
  `FavoriteMusic` text,
  `FavoriteReads` text,
  `PreferredMovies` text,
  `Sports` text,
  `FavoriteCuisine` text,
  `PreferredDress` text,
  `SpokenLanguages` text,
  `CountryCode2` varchar(250) default NULL,
  `photo1` varchar(250) default NULL,
  `photo2` varchar(250) default NULL,
  `photo3` varchar(250) default NULL,
  `Rasi` varchar(250) default NULL,
  `Nakshatra` varchar(250) default NULL,
  `Astroprofile` varchar(250) default NULL,
  PRIMARY KEY  (`ProfileID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `user_profile`
-- 

INSERT INTO `user_profile` VALUES (5, 2, 'Sibling', 'Never Married', '', '65', 'Slim', 'Wheatish', 'None', 'Coorgi', 'Hindu:Arunthathiyar', '', 'Don''t Know', 'Liberal', 'Doctorate', 'Management', 'Business Person', 'Non-Veg', 'No', 'Occasionally', 4, 2, 'Student Visa', 'telephone', '+244', '3434', '3434', 'Show', 'lka jdfl;k asdf;lk as;ldf kl;adsk f;laskd f;ldsak flkjads flkajds flkadsj flka jsdflkj asdlkf jasdlkjf lkasd jflkasd jflkasdj flkasdj flkas djflkasd jflkasdflk jadsf', '', '', '', 'testing', 'Parent', '123465', '', 3, '', 'Employed', 'Employed', '2', '0', '0', '', 'asd fds fa', '02', '01', '01', 154, '', '', '', '', '', '', '', '', '', '+244|Angola', 'memberphotos/img2_11.jpg', 'memberphotos/photo22_11.jpg', 'memberphotos/photo32_21.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (6, 3, 'Self', 'Never Married', '', '61', 'Athletic', 'Fair', 'None', 'Brij', 'Hindu:Ahom', '', 'No', 'Liberal', 'Masters', 'Armed Forces', 'Business Person', 'Eggetarian', 'Yes', 'Yes', 107, 179, 'Student Visa', 'telephone', '+971', '43434', '3434', 'Show', 'dfadf adf adf dsfasdlkjf klasdjf klasdj flkasdj flkads jflk jadslkf lkads jflkads flk asdlkf kldsajflkadsj fkladsj flkjd aslfkj adslkf lkas dflkasdklf adsf', 'A+', '', '', 'Don', 'Guardian', 'any time', 'Traditional', 3, '3', 'Business', 'Employed', '0', '0', '', '', 'a sdf dsafads fds', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+971|United Arab Emirates', 'memberphotos/img3_12.jpg', 'memberphotos/photo23_12.jpg', 'memberphotos/photo33_22.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (7, 4, 'Parent / Guardian', 'Divorced', 'No', '62', 'Athletic', 'Wheatish', 'None', 'Awadhi', 'Hindu:6000 Niyogi', '', 'Don''t Know', 'Moderate', 'Diploma', 'Education', 'Accountant', 'Non-Veg', 'No', 'Yes', 4, 3, 'Student Visa', 'mobile', '+971', '', '4545454', 'None', 'jsl dkfjklasd jfklasd jkfl jadsklf lkads jfklads jfkl jadsklfjklads fklads jfkladsklf jadsklfklads fklads fjlkads jfkl', 'B+', '', 'Rs.2,00,001 - 3,00,000', 'jllkjklj', 'Guardian', 'sasdas', 'Liberal', 2, '3', 'Professional', 'Homemaker', '1', '0', '0', '', 'k sjlkadjs kladsj lkdsa jlkads klads jkldsj kl', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+971|United Arab Emirates', 'memberphotos/img4_13.jpg', 'memberphotos/photo24_13.jpg', 'memberphotos/photo34_23.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (8, 5, 'Friend', 'Widowed', 'Yes. Living together', '55', 'Athletic', 'Fair', 'None', 'Awadhi', 'Hindu:Ambalavasi', '', 'Don''t Know', 'Liberal', 'Diploma', 'Armed Forces', 'Chartered Accountant', 'Eggetarian', 'Yes', 'No', 342, 658, 'Permanent Resident', 'telephone', '+43', '3434', '3434', 'Show', 'df dsfasdfasdkfj lsadkjf ladsjflkdsa flk dsajflkjdsfklsdlkfjskdlf lkads fklasdj fkl jadslfk jasdlkf jasdklf jlkasd fklads fkl asdjflk jaslkf alskdf jd', '', '', '', 'nadir', 'Guardian', 'test', '', 4, '', 'Professional', 'Homemaker', '2', '2', '1', '1', 'as fasd f', '01', '01', '03', 163, 'Film-making|Fishing', 'Nature|Net surfing', 'Instrumental - Western|Jazz', 'Philosophy / Spiritual|Poetry', 'Epics|Horror', 'Hockey|Horseback Riding', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+43|Austria', 'memberphotos/img5_14.jpg', 'memberphotos/photo25_14.jpg', 'memberphotos/photo35_24.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (9, 6, 'Sibling', 'Divorced', 'Yes. Living together', '53', 'Slim', 'Wheatish Brown', 'None', 'Arunachali', 'Hindu:96K Kokanastha', '', 'Don''t Know', 'Liberal', 'Doctorate', 'Law', 'Clerical Official', 'Occasionally Non-Veg', 'No', 'Yes', 307, 615, 'Student Visa', 'telephone', '+374', '543', '343434', 'Show', 'klasdj fklsdaj flkasdj flkads fkl jsadlk fjalsdk fjkla sdjfklasdflkaslkfdjkalsdjflkasdjflkjsda fklja sdklfaklsd jfkladsf', 'A-', '', '', 'adsfdf', 'Guardian', 'test', '', 0, '', 'Retired', 'Business', '0', '0', '', '', 'asdfasdfd', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+374|Armenia', 'memberphotos/img6_15.jpg', 'memberphotos/photo26_15.jpg', 'memberphotos/photo36_25.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (10, 7, 'Parent / Guardian', 'Divorced', 'Yes. Living together', '54', 'Slim', 'Fair', 'None', 'Awadhi', 'Hindu:Adi Dravida', '', 'Don''t Know', 'Moderate', 'Doctorate', 'Arts', 'Accountant', 'Occasionally Non-Veg', 'No', 'No', 90, 153, 'Permanent Resident', 'mobile', '+54', '', '4584554', 'None', 'lkaj dkflj dsaklf jlksda fkl asdkl flk sdajfkl adsfkl dslka fkldsa jfkl jdsaklf jkldsaj flkads jkfl jdsaklf jksadl  fjkldsajflk', '', '', '', 'dsafadsf', 'Guardian', 'asdf', 'Moderate', 3, '3', 'Business', 'Employed', '1', '0', '1', '', 'asdf ads fed f', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+54|Argentina', 'memberphotos/img7_11.jpg', 'memberphotos/photo27_11.jpg', 'memberphotos/photo37_21.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (11, 8, 'Other', 'Widowed', 'Yes. Not living together', '55', 'Athletic', 'Wheatish', 'None', 'Bhojpuri', 'Hindu:Adi Dravida', '', 'Don''t Know', 'Liberal', 'Masters', 'Computers/ IT', 'Civil Engineer', 'Eggetarian', 'No', 'Yes', 167, 287, 'Student Visa', 'telephone', '+27', '545', '4545', 'None', 'dgfdsfdasf das fdas fads f dfa dsfdas fda dsf adsf dasf das fdas fdasf adf adsf adsf adf adf adfadsf ads fdas fad f', '', '', '', 'test', 'Parent', 'test', '', 0, '', 'Professional', 'Employed', '0', '2', '', '0', 'a dfda sfadsf d fadf', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+27|South Africa', 'memberphotos/img8_12.jpg', 'memberphotos/photo28_12.jpg', 'memberphotos/photo38_22.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (12, 9, 'Friend', 'Widowed', 'Yes. Living together', '55', 'Heavy', 'Wheatish', 'None', 'Assamese', 'Hindu:Adi Dravida', '', 'Don''t Know', 'Liberal', 'Doctorate', 'Commerce', 'Biologist / Botanist', 'Occasionally Non-Veg', 'Yes', 'Yes', 98, 166, 'Student Visa', 'telephone', '+1', '54545', '54545', 'None', 'this is testing..ds fnl ksadfj lkasdj flkasdj flkas jdflk jsadklf jklasd fklsadj flkas djflkas djfk a sdfasdf', 'B+', '', 'Rs.4,00,001 - 5,00,000', 'adf', 'Sibling', 'test', '', 0, '', 'Professional', 'Employed', '0', '2', '', '1', 'koool family...', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+1|Canada', 'memberphotos/img9_13.jpg', 'memberphotos/photo29_13.jpg', 'memberphotos/photo39_23.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (13, 10, 'Friend', 'Widowed', 'Yes. Not living together', '53', 'Athletic', 'Fair', 'None', 'Bengali', 'Hindu:Agri', '', 'No', 'Moderate', 'Diploma', 'Architecture', 'Biologist / Botanist', 'Non-Veg', 'Yes', 'Yes', 17, 14, 'Permanent Resident', 'mobile', '+91', '', '545454', 'Show', 'asd fdsa fasd fdasf dsafasdf dsa fads fads fadsf adsfa sdf adsfdsafasdf asd fdsafadsf asdf dasfasdfdsf adsfd', '', '', '', 'afasdf', 'Guardian', 'ad fasd f', '', 0, '', 'Professional', 'Employed', '1', '0', '1', '', 'asdf dsaf dsafsd', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+91|India', 'memberphotos/img10_14.jpg', 'memberphotos/photo210_14.jpg', 'memberphotos/photo310_24.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (14, 11, 'Friend', 'Annulled', 'Yes. Not living together', '59', 'Slim', 'Wheatish', 'None', 'Bengali', 'Hindu:Agarwal', '', 'Don''t Know', 'Liberal', 'Honours degree', 'Management', 'Biologist / Botanist', 'Occasionally Non-Veg', 'No', 'Occasionally', 90, 155, 'Student Visa', 'telephone', '+1', '34343', '34343', 'None', 'dsaf dasf adsf dsaf dsaf dsa fdasf adsf ads fdsaf dsa fdsfds fdsaf dsf dsfdsf dasf das fdsaf dasf adf adfads', 'B+', '', 'Rs.2,00,001 - 3,00,000', 'dsfadsf', 'Parent', 'aa', '', 0, '', 'Retired', 'Business', '2', '2+', '1', '2', 'asd fads fads f', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+1|Canada', 'memberphotos/img11_15.jpg', 'memberphotos/photo211_15.jpg', 'memberphotos/photo311_25.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (15, 12, 'Other', 'Separated', 'Yes. Living together', '54', 'Athletic', 'Very Fair', 'None', 'Bhojpuri', 'Hindu:Adi Dravida', 'aaa', 'Don''t Know', 'Traditional', 'Masters', 'Home Science', 'Biologist / Botanist', 'Vegan', 'No', 'No', 94, 165, 'Student Visa', 'mobile', '+1', '', '43434', 'Show', 'ad fdsa fadsfasdf adsf adsf adsf adsfdsa fa dfa dsfds afadsf dsf adsf adsf adsf ads fds fdasf adsf dsaf ads fasdf dsaf asdfsdafds fasd f', 'B+', 'aa', 'Rs.3,00,001 - 4,00,000', 'adfasdf', 'Sibling', 'adfasdf', 'Moderate', 2, '2', 'Business', 'Homemaker', '1', '0', '0', '', 'asd fasdf', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+1|Canada', 'memberphotos/img12_16.jpg', 'memberphotos/photo212_16.jpg', 'memberphotos/photo312_26.jpg', '', '', '');
INSERT INTO `user_profile` VALUES (16, 16, 'Parent / Guardian', 'Divorced', 'No', '55', 'Average', 'Fair', '', 'Baluchi', 'Hindu:Agarwal', '', 'Don''t Know', 'Moderate', 'Doctorate', 'Armed Forces', 'Acting Professional', 'Eggetarian', 'No', 'Yes', 5, 2, 'Student Visa', 'telephone', '+1', '434', '3434', 'None', 'dfdasf adsf adsf sad fadsf dsafk sdafkldsa jklfjdsklafjklasdjfklsdjafkljsdaklf jkldsa fjlkasd jfsadlf la;sdjfkladsf', 'A+', '', '', 'asdf', 'Guardian', 'asdf', '', 0, '', 'Business', 'Homemaker', '0', '0', '', '', 'asdfsdaf', '', '', '', 0, '', '', '', '', '', '', '', '', '', '+1|USA', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (24, 24, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (17, 17, 'Self', 'Never Married', '', '81', 'Slim', 'Very Fair', '', 'Arabic', 'Hindu:6000 Niyogi', '', 'Don''t Know', 'Traditional', 'Masters', 'Science', 'Clerical Official', 'Veg', 'Yes', 'Yes', 18, 40, 'Citizen', 'mobile', '+994', '', '2121221', 'None', 'alkdjf lkasdj fklasjd fkl asdklf jaklds fklasd fklas dflka sdklf askldf klasdfklasd klfjasdlkfjkads kljasdf lkads', 'Don''t Know', '', 'Under Rs.50,000', 'nadir', 'Self', 'anytime', '', 0, '1|3|5', 'Employed', 'Employed', '1', '0', '0', '', 'kas dfklj asdklfj klasdj flkasjd kfl jaskldfj', '', '', '', 0, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+994|Azerbaijan', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (18, 18, 'Self', 'Divorced', 'Yes. Not living together', '55', 'Athletic', 'Fair', '', 'Awadhi', 'Hindu:Brahmin - Audichya', '', 'Yes', 'Moderate', 'Doctorate', 'Science', 'Customer Support Professional', 'Eggetarian', 'Occasionally', 'Yes', 89, 155, 'Student Visa', 'mobile', '+973', '', '3434324234', 'Show', 'ksdfljsad lfkj adsklfj asdlkfj lakdsjf lkasdj flksdaj flkasdj flkasdj flkasdj flkasj dflkjasdlfkjasdlkfj asdlkf jlasdkjf lkasdj flaksdj flkasdj flasdj flkasdj flksdafklasdjflkadsj klfjasd', 'A-', '', 'Rs.50,001 - 1,00,000', 'nadir', 'Guardian', 'adfad', '', 0, '', 'Business', 'Homemaker', '0', '0', '', '', 'afadsfads', '', '', '', 0, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+973|Bahrain', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (19, 19, 'Parent / Guardian', 'Divorced', 'Yes. Not living together', '6ft 3in - 190cm', 'Average', 'Very Fair', '', 'Arabic', 'Sikh:Gursikh', '', 'Yes', 'Moderate', 'Masters', 'Nursing/ Health Sciences', 'Defense Employee', 'Eggetarian', 'No', 'No', 91, 154, 'Permanent Resident', 'mobile', '+971', '', '54545', 'None', 'klasdf lksdaj flkdsaj flksadj flksdj flsdkfj lsdkfj aksldjf osad oeasur oewiur lksdjf kldsahf sdfjaosr lksjd flksdj flksdj flkdsjf', 'B+', '', 'Rs.2,00,001 - 3,00,000', 'adf', 'Relative', 'adf', 'Moderate', 2, '', 'Professional', 'Employed', '0', '0', '', '', 'asdf fsdaf', '', '', '', 0, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+971|United Arab Emirates', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (20, 20, 'Self', 'Never Married', 'No', '4ft 6in - 137cm', 'Heavy', 'Fair', '', 'Kanauji', 'Muslim:Bengali', '', '', 'Traditional', 'Masters', 'Shipping', 'Dentist', 'Veg', 'Yes', 'Occasionally', 90, 155, 'Permanent Resident', 'mobile', '+375', '', '333', 'Show', 'ssask hskjas hkjas hjks hjsah jkash sakjh askjh sajkh sakjhsa jkiyw iuyw ih sakjh sakjhs aiusahisanbjsia', 'A+', '', 'Rs.50,001 - 1,00,000', 'aa', 'Sibling', 'aa', '', 0, '2|3', 'Professional', 'Employed', '0', '0', '', '', 'aaaa', '', '', '', 0, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+375|Belarus', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (21, 21, 'Sibling', 'Divorced', 'Yes. Living together', '66', 'Average', 'Fair', '', 'Magahi', 'Muslim:Sunni', '', '', 'Moderate', 'Diploma', 'Commerce', 'Lecturer', 'Occasionally Non-Veg', 'No', 'No', 28, 27, 'Citizen', 'mobile', '+971', '', '44554', 'Show', 'kasjd flk aslkdfj lksaj dflkj asdklf jaslkdjf lkasdj flkasj dfklj askldfj alskd jfklasj dflkajs dfkl jasdlkfj aslkdjf klasdf', 'B+', '', 'Rs.3,00,001 - 4,00,000', 'aaaa', 'Guardian', 'aaa', 'Moderate', 0, '|2|3|4', 'Professional', 'Business', '2', '1', '0', '1', 'kjasldk fjlkasd jflkasdj flksadj flkasdjf', '06', '04', '05', 0, 'Gardening / Landscaping|Graphology', 'Net surfing|Pets', 'Instrumental - Western', 'Poetry', 'Epics', 'Golf', 'North Indian|Persian', 'Will tell you later', 'Manipuri', '+971|United Arab Emirates', 'memberphotos/img21_12171566128_60864e2768.jpg', 'memberphotos/photo221_12171566128_60864e2768.jpg', 'memberphotos/photo321_22171566128_60864e2768.jpg', 'hh', 'hh', 'memberphotos/astrochart21logo.jpg');
INSERT INTO `user_profile` VALUES (22, 22, 'Parent / Guardian', 'Divorced', 'Yes. Not living together', '4ft 7in - 139cm', 'Average', 'Fair', '', 'Awadhi', 'Sikh:Gursikh', '', '', 'Moderate', 'Bachelors', 'Architecture', 'Defense Employee', 'Eggetarian', 'Yes', 'Yes', 330, 670, 'Student Visa', 'mobile', '+91', '', '121231', 'Show', 'adfdfdsfdsakf lkasdj flkja sdflkj asldkfj laksdjf lksadj flkajsd flkjsad flkajsd flaksdjf asld;kfj asdl;kfj', 'Don''t Know', '', 'Under Rs.50,000', 'asdfads', 'Guardian', 'adf', '', 0, '9|10', 'Employed', 'Business', '0', '0', '', '', 'asdfd', '', '', '', 0, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+91|India', '', '', '', '', '', '');
INSERT INTO `user_profile` VALUES (23, 23, 'Self', 'Never Married', 'No', '6ft 9in - 205cm', 'Slim', 'Very Fair', '', 'Urdu', 'Muslim:Sunni', '', '', 'Traditional', 'Honours degree', 'Commerce', 'Acting Professional', 'Veg', 'No', 'Yes', 95, 165, 'Student Visa', 'mobile', '+971', '', '545454', 'Show', 'ajs dflkjas dlkf jasdlkfj laksdj flkasdj flkasdj flkasj dflkjas dflkj asdlkfj sladkf jalksd hfieur oiew rnasdfmnds,mfnm,dnf,amdflkasdj flkasdjflkajsdflkjasdfkl', '', '', '', 'Nadir Ali Shah', 'Self', 'any time..', 'Traditional', 1, '2|3|4', 'Employed', 'Homemaker', '0', '0', '', '', 'testing...', '', '', '', 1, 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', 'Will tell you later', '+971|United Arab Emirates', '', '', '', 'aa', 'aa', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `UserID` bigint(20) NOT NULL auto_increment,
  `LoginID` varchar(250) default NULL,
  `EmailAddress` varchar(250) default NULL,
  `Password` varchar(250) default NULL,
  `Gender` varchar(250) default NULL,
  `BirthDate` varchar(250) default NULL,
  `BirthMonth` varchar(250) default NULL,
  `BirthYear` varchar(250) default NULL,
  `dobstatus` int(11) NOT NULL default '0',
  `Age` int(11) NOT NULL default '0',
  `ReligionID` int(11) NOT NULL default '0',
  `CountryID` int(11) NOT NULL default '0',
  `ConfirmationCode` text,
  `Status` int(11) NOT NULL default '0',
  `ApprovalStatus` int(11) NOT NULL default '0',
  `GoldMember` int(11) NOT NULL default '0',
  `AddedDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `GoldMemberDate` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (2, 'groom1', 'groom11@abc.com', 'nadir', 'Male', '17', '06', '1978', 0, 29, 2, 1, '4a4e1feee1b6c8b5d525e851f74e4b54', 1, 1, 0, '2008-01-10 09:10:52', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (3, 'groom2', 'groom22@abc.com', 'nadir', 'Male', '03', '04', '1976', 0, 31, 6, 5, 'b878db6f2272778fe00317784853b5e5', 1, 1, 0, '2008-01-10 09:30:13', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (4, 'groom3', 'groom33@abc.com', 'nadir', 'Male', '15', '02', '1982', 0, 25, 10, 1, 'f5b908e7a1dd7b5fddf1f53a790cdc81', 1, 1, 0, '2008-01-10 09:39:35', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (5, 'groom4', 'groom44@abc.com', 'nadir', 'Male', '15', '03', '1982', 0, 25, 19, 12, '1ae94880102312cd2f9439ce145e854a', 1, 1, 0, '2008-01-10 09:45:14', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (6, 'groom5', 'groom55@abc.com', 'nadir', 'Male', '18', '06', '1969', 0, 38, 17, 11, 'e6baf366592eaf811a677994fcc57cc2', 1, 1, 0, '2008-01-10 09:48:27', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (7, 'bride1', 'bride11@abc.com', 'nadir', 'Female', '15', '05', '1985', 0, 22, 4, 3, '8c982c52f586c1dfd79df69c61286d1e', 1, 1, 0, '2008-01-10 09:51:00', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (8, 'bride2', 'bride22@abc.com', 'nadir', 'Female', '06', '05', '1985', 0, 22, 8, 7, '97ae5cdef0f6af50413dda793f556989', 1, 1, 0, '2008-01-10 09:53:48', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (9, 'bride3', 'bride33@abc.com', 'nadir', 'Female', '06', '09', '1990', 0, 17, 7, 4, '7c937e2f84dd89253f98ba80292a5c1d', 1, 1, 0, '2008-01-10 10:06:53', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (10, 'bride4', 'bride44@abc.com', 'nadir', 'Female', '07', '08', '1978', 0, 29, 2, 1, 'a01d4f6b74c4f7a1fd133fdd806583cb', 1, 1, 0, '2008-01-10 10:09:50', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (11, 'bride5', 'bride55@abc.com', 'nadir', 'Female', '06', '01', '1985', 0, 23, 4, 3, '6449839efb6fa091b87fd09939a81a71', 1, 1, 0, '2008-01-10 10:12:24', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (12, 'bride6', 'bride66@abc.com', 'nadir', 'Female', '05', '06', '1977', 0, 30, 5, 4, '2362f6c21a801da2ba1a61a6b0dd06fc', 1, 1, 0, '2008-01-10 10:14:55', '2008-03-01 11:12:53');
INSERT INTO `users` VALUES (16, 'test', 'test1@abc.com', 'nadir', 'Male', '15', '08', '1995', 0, 12, 10, 1, '668608502645295c38b40c652bfbb613', 1, 1, 0, '2008-01-16 09:18:07', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (17, 'nadir123', 'the@hotmail.com', 'nadir', 'Male', '18', '11', '1980', 1, 27, 1, 1, 'dd642865be78b6cfd10c87070dfd2ee5', 1, 0, 0, '2008-02-16 08:05:56', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (18, 'nadtest', 'a@hotmail.com', 'nadir', 'Male', '24', '09', '1964', 0, 43, 27, 3, 'e0a190604dc3dd2ee7b66bb95c20ef7f', 1, 0, 0, '2008-02-17 04:11:30', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (19, 'abcd', 'b@hotmail.com', 'nadir', 'Male', '27', '11', '1963', 1, 44, 28, 3, '4d705a0c8ef1e89116a067574c8b45b3', 1, 0, 0, '2008-02-17 05:07:24', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (20, 'theee', 'c@hotmail.com', 'nadir', 'Male', '26', '10', '1963', 1, 44, 4, 3, '278a7373c173012672d9d6c8155ae6a2', 1, 0, 0, '2008-02-17 06:40:33', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (21, 'nadirali', 'alishah_nadir@yahoo.com', 'nadir', 'Male', '26', '11', '1978', 1, 29, 2, 1, 'a383ddc20998684dfcfff52dfff9c02e', 1, 1, 0, '2008-02-21 09:21:45', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (22, 'nadirtest', 'abcd@aaa.com', 'nadir', 'Male', '26', '11', '1961', 1, 46, 28, 12, 'f23a9ae2ec871ab4f778c8b1a7323eda', 1, 0, 0, '2008-02-25 01:54:33', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (23, 'nadirtesting', 'thenadir@abcd.com', 'nadir', 'Male', '16', '02', '1974', 1, 34, 2, 4, '6a08242a27246b891b77419daa9de13b', 1, 0, 0, '2008-02-29 18:08:30', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES (24, 'nadiralishah', 'nadir_alishah@hotmail.com', 'nadir', 'Male', '02', '03', '1987', 1, 21, 2, 1, '13104d094c830047074dd0c1be6be8c8', 1, 0, 0, '2008-03-03 06:37:39', '0000-00-00 00:00:00');
