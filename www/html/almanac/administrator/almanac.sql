-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2015 at 08:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `almanac`
--

-- --------------------------------------------------------

--
-- Table structure for table `yr15_addlibrary`
--

CREATE TABLE IF NOT EXISTS `yr15_addlibrary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `library_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_agent`
--

CREATE TABLE IF NOT EXISTS `yr15_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_id` int(11) NOT NULL,
  `copy_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `corporate_name` varchar(100) NOT NULL,
  `bookseller_location` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_almanac`
--

CREATE TABLE IF NOT EXISTS `yr15_almanac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `year` int(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `yr15_almanac`
--

INSERT INTO `yr15_almanac` (`id`, `title`, `year`, `status`, `created_date`) VALUES
(1, 'Vox Stellarum', 0, '1', '2015-04-17 06:32:40'),
(2, 'Merlinus Liberatus', 0, '1', '2015-04-17 06:32:48'),
(3, 'The Imperial Almanac', 0, '1', '2015-04-17 06:32:55'),
(4, 'Speculum Anni', 0, '1', '2015-04-17 06:33:02'),
(5, 'Atlas Ouranios', 0, '1', '2015-04-17 06:33:09'),
(6, 'Phillipâ€™s British Merlin', 0, '1', '2015-04-17 06:33:15'),
(7, 'Diaria Britannica', 0, '1', '2015-04-17 06:33:22'),
(8, 'Parkerâ€™s Ephemeris', 0, '1', '2015-04-17 06:33:29'),
(9, 'The Ladies and Gentlemens Diary', 0, '1', '2015-04-17 06:33:36'),
(10, 'The Gentlemanâ€™s Diary', 0, '1', '2015-04-17 06:33:43'),
(11, 'Olympia Domata', 0, '1', '2015-04-17 06:33:50'),
(12, 'Poor Robin', 0, '1', '2015-04-17 06:34:01'),
(13, 'Ephemeris, or a Diary', 0, '1', '2015-04-17 06:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `yr15_annotation`
--

CREATE TABLE IF NOT EXISTS `yr15_annotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `library_id` int(11) NOT NULL,
  `callnumber` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `annotation_type` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_annotation_drawtext`
--

CREATE TABLE IF NOT EXISTS `yr15_annotation_drawtext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annotation_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `annotation_category` text NOT NULL,
  `child_annotator` enum('Yes','No') NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_annotation_mark`
--

CREATE TABLE IF NOT EXISTS `yr15_annotation_mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annotation_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_callnumber`
--

CREATE TABLE IF NOT EXISTS `yr15_callnumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `library_id` int(11) NOT NULL,
  `callnumber` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_contents`
--

CREATE TABLE IF NOT EXISTS `yr15_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `yr15_contents`
--

INSERT INTO `yr15_contents` (`id`, `description`) VALUES
(1, 'Fly leaf'),
(2, 'Title page'),
(3, 'Table of contents'),
(4, 'Advertisement'),
(5, 'Introduction'),
(6, 'Blank'),
(7, 'January'),
(8, 'February'),
(9, 'March'),
(10, 'April'),
(11, 'May'),
(12, 'June'),
(13, 'July'),
(14, 'August'),
(15, 'September'),
(16, 'October'),
(17, 'November '),
(18, 'December'),
(19, 'Terms and Returns'),
(20, 'Signs of the Zodiac'),
(21, 'Planetary or astronomical information (conjunctions, aspects, etc.)'),
(22, 'Common notes for the year (feasts, etc.)'),
(23, 'Regal table (Information about Kings, Queens, and the Royal Family)'),
(24, 'Judges of the law'),
(25, 'Religious officials and districts'),
(26, 'Government officials or civil servants'),
(27, 'Tide table'),
(28, 'Equation of time (setting of clocks by the sundial)'),
(29, 'Rising, setting of Pleiades (the Seven Stars)'),
(30, 'Chronology of events'),
(31, 'Account of eclipses or other celestial events'),
(32, 'Astrological predictions (often called Judicium Astrologicum)'),
(33, 'Lunar information'),
(34, 'Length of day (times of sunrise and sunset)'),
(35, 'Transfer days at the bank'),
(36, 'Holidays at public offices'),
(37, 'World calendars'),
(38, 'Geographic information'),
(39, 'Demographic information (population, GDP, etc).'),
(40, 'Actuarial calculations'),
(41, 'Specific gravities'),
(42, 'Coins and currency'),
(43, 'Enigmas, charades, rebuses or answers to them'),
(44, 'Math problems or solutions to math problems'),
(45, 'Fairs'),
(46, 'Taxes'),
(47, 'Stamps'),
(48, 'Transportation details'),
(49, 'Interest'),
(50, 'Scientific or astronomical commentary (eg. on Copernican system, on the calendar, etc.)'),
(51, 'Bread weights and prices'),
(52, 'Roads'),
(53, 'Wages'),
(54, 'Zodiac Man'),
(55, 'Collection days for sheriffs, bailiffs, etc.'),
(56, 'Observations on the four quarters of the year');

-- --------------------------------------------------------

--
-- Table structure for table `yr15_contents_index`
--

CREATE TABLE IF NOT EXISTS `yr15_contents_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_copy`
--

CREATE TABLE IF NOT EXISTS `yr15_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `library_id` int(11) NOT NULL,
  `callnumber` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `stamp` enum('1','0') NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_countries`
--

CREATE TABLE IF NOT EXISTS `yr15_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `yr15_countries`
--

INSERT INTO `yr15_countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegowina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Cote D''Ivoire'),
(53, 'Croatia'),
(54, 'Cuba'),
(55, 'Cyprus'),
(56, 'Czech Republic'),
(57, 'Denmark'),
(58, 'Djibouti'),
(59, 'Dominica'),
(60, 'Dominican Republic'),
(61, 'East Timor'),
(62, 'Ecuador'),
(63, 'Egypt'),
(64, 'El Salvador'),
(65, 'Equatorial Guinea'),
(66, 'Eritrea'),
(67, 'Estonia'),
(68, 'Ethiopia'),
(69, 'Falkland Islands (Malvinas)'),
(70, 'Faroe Islands'),
(71, 'Fiji'),
(72, 'Finland'),
(73, 'France'),
(74, 'France, Metropolitan'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Indonesia'),
(101, 'Iran (Islamic Republic of)'),
(102, 'Iraq'),
(103, 'Ireland'),
(104, 'Israel'),
(105, 'Italy'),
(106, 'Jamaica'),
(107, 'Japan'),
(108, 'Jordan'),
(109, 'Kazakhstan'),
(110, 'Kenya'),
(111, 'Kiribati'),
(112, 'Korea, Democratic People''s Republic of'),
(113, 'Korea, Republic of'),
(114, 'Kuwait'),
(115, 'Kyrgyzstan'),
(116, 'Lao People''s Democratic Republic'),
(117, 'Latvia'),
(118, 'Lebanon'),
(119, 'Lesotho'),
(120, 'Liberia'),
(121, 'Libyan Arab Jamahiriya'),
(122, 'Liechtenstein'),
(123, 'Lithuania'),
(124, 'Luxembourg'),
(125, 'Macau'),
(126, 'Macedonia, The Former Yugoslav Republic of'),
(127, 'Madagascar'),
(128, 'Malawi'),
(129, 'Malaysia'),
(130, 'Maldives'),
(131, 'Mali'),
(132, 'Malta'),
(133, 'Marshall Islands'),
(134, 'Martinique'),
(135, 'Mauritania'),
(136, 'Mauritius'),
(137, 'Mayotte'),
(138, 'Mexico'),
(139, 'Micronesia, Federated States of'),
(140, 'Moldova, Republic of'),
(141, 'Monaco'),
(142, 'Mongolia'),
(143, 'Montserrat'),
(144, 'Morocco'),
(145, 'Mozambique'),
(146, 'Myanmar'),
(147, 'Namibia'),
(148, 'Nauru'),
(149, 'Nepal'),
(150, 'Netherlands'),
(151, 'Netherlands Antilles'),
(152, 'New Caledonia'),
(153, 'New Zealand'),
(154, 'Nicaragua'),
(155, 'Niger'),
(156, 'Nigeria'),
(157, 'Niue'),
(158, 'Norfolk Island'),
(159, 'Northern Mariana Islands'),
(160, 'Norway'),
(161, 'Oman'),
(162, 'Pakistan'),
(163, 'Palau'),
(164, 'Panama'),
(165, 'Papua New Guinea'),
(166, 'Paraguay'),
(167, 'Peru'),
(168, 'Philippines'),
(169, 'Pitcairn'),
(170, 'Poland'),
(171, 'Portugal'),
(172, 'Puerto Rico'),
(173, 'Qatar'),
(174, 'Reunion'),
(175, 'Romania'),
(176, 'Russian Federation'),
(177, 'Rwanda'),
(178, 'Saint Kitts and Nevis'),
(180, 'Saint Vincent and the Grenadines'),
(181, 'Samoa'),
(182, 'San Marino'),
(183, 'Sao Tome and Principe'),
(184, 'Saudi Arabia'),
(185, 'Senegal'),
(186, 'Seychelles'),
(187, 'Sierra Leone'),
(188, 'Singapore'),
(189, 'Slovakia (Slovak Republic)'),
(190, 'Slovenia'),
(191, 'Solomon Islands'),
(192, 'Somalia'),
(193, 'South Africa'),
(194, 'South Georgia and the South Sandwich Islands'),
(195, 'Spain'),
(196, 'Sri Lanka'),
(197, 'St. Helena'),
(198, 'St. Pierre and Miquelon'),
(199, 'Sudan'),
(200, 'Suriname'),
(201, 'Svalbard and Jan Mayen Islands'),
(202, 'Swaziland'),
(203, 'Sweden'),
(204, 'Switzerland'),
(205, 'Syrian Arab Republic'),
(206, 'Taiwan'),
(207, 'Tajikistan'),
(208, 'Tanzania, United Republic of'),
(209, 'Thailand'),
(210, 'Togo'),
(211, 'Tokelau'),
(212, 'Tonga'),
(213, 'Trinidad and Tobago'),
(214, 'Tunisia'),
(215, 'Turkey'),
(216, 'Turkmenistan'),
(217, 'Turks and Caicos Islands'),
(218, 'Tuvalu'),
(219, 'Uganda'),
(220, 'Ukraine'),
(221, 'United Arab Emirates'),
(222, 'United Kingdom'),
(223, 'USA'),
(224, 'United States Minor Outlying Islands'),
(225, 'Uruguay'),
(226, 'Uzbekistan'),
(227, 'Vanuatu'),
(228, 'Vatican City State (Holy See)'),
(229, 'Venezuela'),
(230, 'Viet Nam'),
(231, 'Virgin Islands (British)'),
(232, 'Virgin Islands (U.S.)'),
(233, 'Wallis and Futuna Islands'),
(234, 'Western Sahara'),
(235, 'Yemen'),
(236, 'Yugoslavia'),
(237, 'Zaire'),
(238, 'Zambia'),
(239, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `yr15_format`
--

CREATE TABLE IF NOT EXISTS `yr15_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `format` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `yr15_format`
--

INSERT INTO `yr15_format` (`id`, `format`) VALUES
(1, 'Folio'),
(2, 'Quarto'),
(3, 'Octavo'),
(4, 'Long 12mo'),
(5, '12mo'),
(6, '16mo'),
(7, '24mo'),
(8, '32mo'),
(9, '48mo'),
(10, '64mo'),
(11, '96mo'),
(12, '128mo');

-- --------------------------------------------------------

--
-- Table structure for table `yr15_image`
--

CREATE TABLE IF NOT EXISTS `yr15_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `library_id` int(11) NOT NULL,
  `callnumber` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `digital_format` varchar(100) NOT NULL,
  `page_location` varchar(100) NOT NULL,
  `annotations` enum('yes','no') NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_issue`
--

CREATE TABLE IF NOT EXISTS `yr15_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `almanac_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `place_of_publication` varchar(100) NOT NULL,
  `format` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `price_pounds` varchar(50) NOT NULL,
  `price_shillings` varchar(50) NOT NULL,
  `price_pence` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_library`
--

CREATE TABLE IF NOT EXISTS `yr15_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `library_name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `library_url` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_owner`
--

CREATE TABLE IF NOT EXISTS `yr15_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `copy_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yr15_user`
--

CREATE TABLE IF NOT EXISTS `yr15_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `industry_company` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `website_url` varchar(50) NOT NULL,
  `logo_pic` varchar(100) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `cardNo` varchar(50) NOT NULL,
  `CCMonth` varchar(50) NOT NULL,
  `CCYear` varchar(50) NOT NULL,
  `cc_cvv` varchar(50) NOT NULL,
  `promoCode` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `subscriptionID` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `yr15_user`
--

INSERT INTO `yr15_user` (`id`, `uname`, `password`, `name`, `lname`, `email`, `contact`, `address`, `city`, `state`, `country`, `zip_code`, `photo`, `industry`, `industry_company`, `org_name`, `website_url`, `logo_pic`, `timezone`, `plan`, `price`, `cardNo`, `CCMonth`, `CCYear`, `cc_cvv`, `promoCode`, `payment_method`, `customerID`, `subscriptionID`, `status`, `role`, `reg_date`) VALUES
(2, 'admin', 'admin', 'Admin', '', 'admin@admin.com', '123456', '', '', '', '', '', 'Photo0647.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 'admin', '2013-04-06 20:15:30'),
(5, 'yogesh1234', 'yogesh', 'Yogesh', 'Rathore', 'yogesh@gmail.com', '1234567890', 'Regal Square', 'Indore', 'M.P.', '99', '452001', 'Photo0647.jpg', 'General', '', 'Virtual Infotech', 'virtualinfotechsolution.com', 'vmc-tech-logo.png', 'America/New_York', 'Basic', '125', '4242 4242 4242 1234', '03', '2016', '123', '', 'Credit-Card', 'cus_4ViuwzhvNuhQNn', 'sub_4ViutcCkqKJZUn', 1, 'user', '2013-07-26 21:01:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
