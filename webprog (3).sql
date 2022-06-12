-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 11:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_input`
--

CREATE TABLE `client_input` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `description` text COLLATE utf8_croatian_ci DEFAULT NULL,
  `create_datre` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `firstname` varchar(34) COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(34) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(34) COLLATE utf8_croatian_ci NOT NULL,
  `date_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_to` timestamp NULL DEFAULT NULL,
  `person_count` int(11) NOT NULL,
  `note` text COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `create_date`, `firstname`, `lastname`, `email`, `date_from`, `date_to`, `person_count`, `note`) VALUES
(2, '2021-01-08 17:56:50', 'bnm', 'hgj', 'ghj@fgthgf.fghjgfh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, ''),
(3, '2021-01-08 18:18:59', 'test', 'test3', 'asdassd@asdasdasd.das', '2021-01-21 18:18:00', '2021-01-28 18:18:00', 8, ''),
(4, '2021-01-08 18:20:50', 'fdgfdg', 'dfgdfg', 'dfgfdgfdfdgd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, ''),
(5, '2021-01-08 18:21:06', 'sdfg', 'dsfgds', 'sdf@dsfsd.fsdfds', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, ''),
(6, '2021-01-08 18:22:00', 'hjngj', 'ghjgh', 'ghjghj', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, ''),
(7, '2021-01-08 20:08:21', 'fhgjgfh', 'fghfg', 'fghfgh@dfgfd.fdg', '2020-11-30 19:56:00', '2021-04-02 18:52:00', 6, ''),
(8, '2021-01-08 20:48:03', 'etrzrtzu', 'rtezertz', 'rtezrte@dfsgdfsg.dsfgfd', '2020-12-30 20:47:00', '2021-01-29 20:47:00', 5, ''),
(9, '2021-01-08 21:50:30', 'ssss', 'ssss', 'asdasd@asdfsa.asd', '2021-01-01 21:50:00', '2021-01-23 21:50:00', 5, ''),
(10, '2021-01-08 21:52:52', 'uuuuuuu', 'uuu', 'ghj@fgthgf.fghjgfh', '2021-01-01 21:52:00', '2021-01-28 21:52:00', 4, ''),
(11, '2021-01-08 21:55:38', 'uuuuuuu', 'uuu', 'ghj@fgthgf.fghjgfh', '2021-01-01 21:52:00', '2021-01-28 21:52:00', 4, ''),
(12, '2021-01-08 21:55:58', 'gfjhgj', 'ghjghj', 'sdf@dsfsd.fsdfds', '2021-01-09 21:55:00', '2021-01-21 21:55:00', 5, ''),
(13, '2021-01-08 22:07:51', ';drop table news;--', 'kjlč', 'sdf@dsfsd.fsdfds', '2021-01-08 22:07:00', '2021-01-28 22:07:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `description` text COLLATE utf8_croatian_ci NOT NULL,
  `person_count` int(11) NOT NULL,
  `picture` varchar(300) COLLATE utf8_croatian_ci NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `create_date`, `name`, `description`, `person_count`, `picture`, `price`) VALUES
(1, '2021-01-08 14:09:46', 'soba2', 'ghj', 2, '0-25.jpg', '6'),
(2, '2021-01-08 21:38:03', 'soba1', 'fdsg', 5, '', '25');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`id`, `room_id`, `reservation_id`, `create_date`, `price`) VALUES
(1, 1, 2, '2021-01-08 21:17:15', '0'),
(6, 1, 3, '2021-01-08 21:30:35', '4'),
(9, 2, 12, '2021-01-08 21:55:58', '0'),
(10, 1, 13, '2021-01-08 22:07:51', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `user_picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `country` char(2) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `archive` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `user_picture`, `username`, `password`, `email`, `country`, `create_date`, `archive`) VALUES
(14, 'Admin', 'Adminiović', '', 'admin', '$2y$12$f0byH.aF2pgZdh/aCHUqqePJiwTR2xGpb/YBpN57E//ZF2VtoCk7a', 'admin@example.com', 'HR', '2021-01-07 22:57:50', 'N'),
(15, 'aaa', 'aaa', '', 'aaaaa', '$2y$12$fsNlIC9ylY4xPEMFnVkkrecwlqmlej7a3NQRBP3uwDGi.7v6tf/Jq', 'aa@asdasd', 'BS', '2021-01-07 23:36:04', 'Y'),
(17, 'ddd', 'ddd', '', 'ddddd', '$2y$12$f0byH.aF2pgZdh/aCHUqqePJiwTR2xGpb/YBpN57E//ZF2VtoCk7a', 'ddd@dsd.dssadsad', 'AL', '2021-01-08 13:18:37', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_input`
--
ALTER TABLE `client_input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_id` (`room_id`),
  ADD KEY `fk_reservation_id` (`reservation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD CONSTRAINT `fk_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
