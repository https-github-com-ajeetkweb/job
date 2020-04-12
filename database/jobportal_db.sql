-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 04:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'job portal', 'sminfo@meemjob.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(30) NOT NULL,
  `state_id` int(10) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_name`) VALUES
(1, 13, 'Hyderabad'),
(3, 13, 'Khammam'),
(4, 13, 'Karimnagar'),
(6, 1, 'Visakhapatnam'),
(7, 1, 'Vijayawada'),
(8, 1, 'Guntur'),
(9, 1, 'Anantapur'),
(10, 1, 'Chittoor'),
(11, 1, 'Kurnool'),
(15, 1, 'Vizianagaram'),
(16, 3, 'Ahmedabad'),
(17, 3, 'Surat'),
(18, 3, ' Rajkot '),
(19, 3, 'Jamnagar'),
(20, 3, 'Gandhinagar'),
(21, 3, 'Porbandar'),
(23, 3, 'Patan'),
(24, 3, ' Bhuj '),
(25, 3, 'Palanpur'),
(27, 2, 'Bhopal'),
(28, 2, 'Jabalpur'),
(29, 2, 'Ujjain'),
(30, 2, 'Khandwa'),
(32, 2, ' Indore '),
(36, 2, 'Gwalior'),
(39, 4, 'Mumbai'),
(40, 4, 'Pune'),
(42, 4, 'Nagpur'),
(43, 4, 'Nashik'),
(45, 8, 'Kochi'),
(48, 10, 'Amritsar'),
(49, 10, 'Patiala'),
(50, 10, 'Mohali'),
(52, 7, 'Bengaluru'),
(53, 7, 'Mangalore'),
(54, 11, 'Jaipur'),
(55, 11, 'Jodhpur'),
(56, 11, 'Bikaner'),
(57, 11, 'Chittorgarh'),
(58, 11, 'Mount Abu'),
(59, 12, 'Chennai'),
(60, 12, 'Coimbatore'),
(61, 14, 'Patna'),
(62, 15, 'Lucknow'),
(63, 15, 'Agra'),
(64, 17, 'Kolkata'),
(65, 17, 'Durgapur'),
(66, 9, ' Bhubaneswar '),
(75, 1, 'West Godavari'),
(76, 1, 'Srikakulam'),
(77, 1, 'Prakasam'),
(78, 1, 'Nellore'),
(79, 1, 'Krishna'),
(80, 1, 'Kadapa'),
(81, 1, 'East Godavari'),
(82, 3, 'Anand '),
(83, 3, 'Bharuch'),
(84, 3, 'Chhota Udaipur'),
(85, 3, 'Dahod'),
(86, 3, 'Kheda'),
(87, 3, 'Mahisagar'),
(88, 3, 'Narmada'),
(89, 3, 'Panchmahal'),
(90, 3, 'Vadodara'),
(91, 3, 'Aravalli'),
(92, 3, 'Banaskantha'),
(93, 3, 'Mehsana'),
(94, 4, 'Ahmednagar'),
(96, 4, 'Amravati'),
(97, 4, 'Aurangabad'),
(98, 4, 'Beed'),
(99, 4, 'Thane'),
(100, 4, 'Solapur'),
(101, 4, 'Jalgaon'),
(102, 4, 'Kolhapur'),
(104, 4, 'Nanded '),
(105, 4, 'Satara'),
(106, 4, 'Sangli '),
(107, 4, 'Yavatmal '),
(108, 4, 'Raigarh '),
(109, 4, 'Latur'),
(110, 4, 'Chandrapur '),
(111, 4, 'Dhule'),
(112, 4, 'Jalna'),
(113, 4, 'Parbhani'),
(114, 4, 'Akola'),
(115, 4, 'Osmanabad'),
(116, 4, 'Nandurbar'),
(117, 4, 'Ratnagiri'),
(118, 4, 'Gondiya'),
(119, 4, 'Wardha'),
(120, 4, 'Bhandara '),
(121, 4, 'Washim '),
(122, 4, 'Hingoli '),
(123, 4, 'Gadchiroli '),
(124, 5, 'North Goa'),
(125, 5, 'South Goa'),
(126, 6, 'Ambala'),
(127, 6, 'Bhiwani'),
(128, 6, 'Charkhi Dadri'),
(129, 6, 'Faridabad'),
(130, 6, 'Fatehabad'),
(131, 6, 'Gurugram'),
(132, 6, 'Hisar'),
(133, 6, 'Jhajjar'),
(134, 6, 'Jind'),
(135, 6, 'Kaithal'),
(136, 6, 'Karnal'),
(137, 6, 'Kurukshetra'),
(138, 6, 'Panipat'),
(139, 6, 'Rohtak'),
(140, 6, 'Sonipat'),
(141, 7, 'Bagalkot'),
(142, 7, 'Belagavi'),
(143, 7, 'Bellary'),
(144, 7, 'Bidar'),
(145, 7, 'Vijayapura'),
(146, 7, 'Chamarajanagar'),
(147, 7, 'Chikballapur'),
(148, 7, 'Chikkamagaluru'),
(149, 7, 'Davanagere'),
(150, 7, 'Dharwad'),
(151, 7, 'Gadag'),
(152, 7, 'Kalaburagi'),
(153, 7, 'Hassan'),
(154, 7, 'Haveri'),
(155, 7, 'Raichur'),
(156, 7, 'Yadgir'),
(157, 7, 'Udupi'),
(158, 7, 'Hubli'),
(159, 8, 'Alappuzha'),
(160, 8, 'Ernakulam'),
(161, 8, 'Idukki'),
(162, 8, 'Kannur'),
(163, 8, 'Kasaragod'),
(164, 8, 'Kollam'),
(165, 8, 'Kottayam'),
(166, 8, 'Kozhikode'),
(167, 8, 'Malappuram'),
(168, 8, 'Palakkad'),
(169, 8, 'Pathanamthitta'),
(170, 8, 'Thiruvananthapuram'),
(171, 8, 'Thrissur'),
(172, 8, 'Wayanad'),
(173, 9, 'Angul'),
(174, 9, 'Balasore'),
(175, 9, 'Bargarh'),
(176, 9, 'Bhadrak'),
(177, 9, 'Balangir'),
(178, 9, 'Boudh'),
(179, 9, 'Cuttack'),
(180, 9, 'Jajpur'),
(181, 9, 'Khordha'),
(182, 9, 'Puri'),
(183, 9, 'Rayagada'),
(184, 9, 'Sambalpur'),
(185, 9, 'Sundergarh'),
(187, 10, 'Barnala'),
(188, 10, 'Bathinda'),
(189, 10, 'Faridkot'),
(190, 10, 'Fatehgarh Sahib'),
(191, 10, 'Firozpur'),
(192, 10, 'Gurdaspur'),
(193, 10, 'Hoshiarpur'),
(194, 10, 'Jalandhar'),
(195, 10, 'Ludhiana'),
(196, 10, 'Mansa'),
(197, 10, 'Moga'),
(199, 10, 'Rupnagar'),
(200, 10, 'Sahibzada Ajit Singh Nagar'),
(201, 11, 'Ajmer'),
(202, 11, 'Alwar'),
(203, 11, 'Banswara'),
(204, 11, 'Baran'),
(205, 11, 'Sawai Madhopur'),
(206, 11, 'Pratapgarh'),
(207, 11, 'Bundi'),
(208, 11, 'Rajsamand'),
(209, 11, 'Churu'),
(210, 11, 'Dausa'),
(211, 11, 'Hanumangarh'),
(212, 11, 'Pali'),
(213, 11, 'Jaisalmer'),
(214, 11, 'Jhalawar'),
(215, 11, 'Jalor'),
(216, 11, 'Karauli'),
(217, 11, 'Udaipur'),
(218, 11, 'Tonk'),
(219, 11, 'Karauli'),
(220, 11, 'Sirohi'),
(221, 12, 'Ariyalur'),
(222, 12, 'Cuddalore'),
(223, 12, 'Dharmapuri'),
(224, 12, 'Dindigul'),
(225, 12, 'Erode'),
(226, 12, 'Kancheepuram'),
(227, 12, 'Karur'),
(228, 12, 'Krishnagiri'),
(229, 12, 'Madurai'),
(230, 12, 'Nagapattinam'),
(231, 12, 'Kanyakumari'),
(232, 12, 'Namakkal'),
(233, 12, 'Perambalur'),
(234, 12, 'Salem'),
(235, 12, 'Sivagangai'),
(236, 12, 'Thanjavur'),
(237, 12, 'Theni'),
(238, 12, 'Tiruppur'),
(239, 12, 'Thiruvannamalai'),
(240, 12, 'Vellore'),
(241, 13, 'Adilabad'),
(242, 13, 'Mahabubnagar'),
(243, 13, 'Medak'),
(244, 13, 'Nalgonda'),
(245, 13, 'Nizamabad'),
(246, 13, 'Ranga Reddy'),
(247, 13, 'Warangal'),
(248, 0, ''),
(249, 0, ''),
(250, 14, 'Araria'),
(251, 14, 'Arwal'),
(252, 14, 'Banka'),
(253, 14, 'Begusarai'),
(254, 14, 'Bhagalpur'),
(255, 14, 'Bhojpur'),
(256, 14, 'Buxar'),
(257, 14, 'Darbhanga'),
(258, 14, 'Gaya'),
(259, 14, 'Kishanganj'),
(260, 14, 'Lakhisarai'),
(261, 14, 'Muzaffarpur'),
(263, 14, 'Sheohar'),
(264, 14, 'Sheikhpura'),
(265, 15, 'Pratapgarh'),
(266, 15, 'Allahabad'),
(267, 15, 'Aligarh'),
(268, 15, 'Ambedkar Nagar'),
(269, 15, 'Azamgarh'),
(270, 15, 'Barabanki'),
(271, 15, 'Badaun'),
(272, 15, 'Bijnor'),
(273, 15, 'Balrampur'),
(274, 15, 'Bareilly'),
(275, 15, 'Basti'),
(276, 15, 'Bulandshahr'),
(277, 15, 'Chandauli'),
(278, 15, 'Firozabad'),
(279, 15, 'Farrukhabad'),
(280, 15, 'Fatehpur'),
(281, 15, 'Faizabad'),
(282, 15, 'Gonda'),
(283, 15, 'Ghazipur'),
(284, 15, 'Gorkakhpur'),
(285, 15, 'Ghaziabad'),
(286, 15, 'Hapur District'),
(287, 15, 'Hardoi'),
(288, 15, 'Hathras'),
(289, 15, 'Jhansi'),
(290, 15, 'Amroha'),
(291, 15, 'Jaunpur District'),
(292, 15, 'Kanpur Dehat'),
(293, 15, 'Kannauj'),
(294, 15, 'Lalitpur'),
(295, 15, 'Muzaffarnagar'),
(296, 15, 'Meerut'),
(297, 15, 'Maharajganj'),
(298, 15, 'Mahoba'),
(299, 15, 'Mirzapur'),
(300, 15, 'Moradabad'),
(301, 15, 'Rampur'),
(302, 15, 'Rae Bareli'),
(303, 15, 'Saharanpur'),
(304, 15, 'Varanasi'),
(305, 16, 'Almora'),
(306, 16, 'Bageshwar'),
(307, 16, 'Chamoli'),
(308, 16, 'Champawat'),
(309, 16, 'Dehradun'),
(310, 16, 'Haridwar'),
(311, 16, 'Nainital'),
(312, 16, 'Pauri Garhwal'),
(313, 16, 'Pithoragarh'),
(314, 16, 'Rudraprayag'),
(315, 17, 'Alipurduar'),
(316, 17, 'Bankura'),
(317, 17, 'Bardhaman'),
(318, 17, 'Birbhum'),
(319, 17, 'Cooch Behar'),
(320, 17, 'Darjeeling'),
(321, 17, 'East Midnapore'),
(322, 17, 'Hooghly'),
(323, 17, 'Howrah'),
(324, 17, 'Jalpaiguri'),
(325, 17, 'Kalimpong'),
(326, 17, 'Malda'),
(327, 17, 'Murshidabad'),
(328, 17, 'Nadia'),
(329, 17, 'South Dinajpur'),
(330, 18, 'Garhwa'),
(331, 18, 'Palamu'),
(332, 18, 'Latehar'),
(333, 18, 'Chatra'),
(334, 18, 'Hazaribagh'),
(335, 18, 'Koderma'),
(336, 18, 'Giridih'),
(337, 18, 'Ramgarh'),
(338, 18, 'Bokaro'),
(339, 18, 'Lohardaga'),
(340, 18, 'Ranchi'),
(341, 18, 'Khunti'),
(342, 18, 'West Singhbhum'),
(343, 18, 'Jamtara'),
(344, 18, 'Pakur'),
(345, 19, 'Balod'),
(346, 19, 'Baloda Bazar'),
(347, 21, 'Riyadh'),
(348, 22, 'Mecca'),
(349, 23, 'Medina'),
(350, 24, 'Jeddah'),
(351, 26, 'Khamis Mushait'),
(352, 34, 'Hofuf'),
(353, 35, 'Taif'),
(354, 36, 'Dammam'),
(355, 37, 'Khamis Mushait'),
(356, 38, 'Buraidah'),
(357, 39, 'Khobar'),
(358, 40, 'Tabuk'),
(359, 41, 'Hail'),
(360, 42, 'Hafar Al-Batin'),
(361, 43, 'Jubail'),
(362, 44, 'Al-Kharj'),
(363, 45, 'Qatif'),
(364, 46, 'Abha'),
(365, 47, 'Najran'),
(366, 48, 'Yanbu'),
(367, 49, 'Al Qunfudhah'),
(368, 0, ''),
(369, 0, ''),
(370, 0, ''),
(371, 0, ''),
(372, 174, 'Sydney'),
(373, 175, 'Melbourne'),
(374, 176, 'Brisbane'),
(375, 177, 'Perth'),
(376, 178, 'Adelaide'),
(377, 179, 'Gold Coast'),
(378, 180, 'Canberra'),
(379, 181, 'Newcastle'),
(380, 182, 'Logan City'),
(381, 183, 'Geelong'),
(382, 161, 'Manama'),
(383, 162, 'Riffa'),
(384, 163, 'Muharraq'),
(385, 164, 'Hamad Town'),
(386, 165, 'Aali'),
(387, 166, 'Isa Town'),
(388, 167, 'Sitra'),
(389, 168, 'Budaiya'),
(390, 169, 'Jidhafs'),
(391, 170, 'Al-Malikiyah'),
(392, 171, 'Adliya'),
(393, 172, 'Sanabis'),
(394, 173, 'Tubli'),
(395, 184, 'Toronto'),
(396, 185, 'Montreal'),
(397, 186, 'Calgary'),
(398, 187, 'Ottawa'),
(399, 188, 'Edmonton'),
(400, 189, 'Mississauga'),
(401, 190, 'North York'),
(402, 191, 'Winnipeg'),
(403, 192, 'Scarborough'),
(404, 193, 'Vancouver'),
(425, 68, 'Kuwait City'),
(426, 69, 'Sharq'),
(427, 71, 'Daiya'),
(428, 72, 'Dasma'),
(429, 73, 'Kaifan'),
(430, 74, 'Al Mansouriya'),
(431, 75, 'Nuzha'),
(432, 76, 'Faiha'),
(433, 77, 'Shamiya'),
(434, 78, 'Adiliya'),
(435, 79, 'Khaldiya'),
(436, 80, 'Qadsiya'),
(437, 81, 'Qurtuba'),
(438, 82, 'Yarmuk'),
(459, 83, 'Muscat'),
(460, 84, 'Seeb'),
(461, 85, 'Salalah'),
(462, 86, 'Bawsha'),
(463, 87, 'Sohar'),
(464, 88, 'As Suwayq'),
(465, 89, 'Ibri'),
(466, 90, 'Saham'),
(467, 91, 'Barka'),
(468, 92, 'Rustaq'),
(478, 58, 'Doha'),
(479, 59, 'Dukhan'),
(480, 60, 'Mesaieed'),
(481, 61, 'Al Wakrah'),
(482, 62, 'Al Rayyan'),
(483, 63, 'Al Khor'),
(484, 64, 'Zubarah'),
(485, 65, 'Al Wukayr'),
(486, 66, 'Lusail'),
(487, 67, 'Simaisma'),
(488, 50, 'Abu Dhabi'),
(489, 51, 'Dubai'),
(490, 52, 'Sharjah'),
(491, 53, 'Ajman'),
(492, 54, 'Fujairah'),
(493, 55, 'Rasul al khaimah'),
(494, 56, 'Umm al quwain'),
(495, 57, 'Al Ain'),
(496, 214, 'London'),
(497, 215, 'Birmingham'),
(498, 216, 'Glasgow'),
(499, 217, 'liverpool '),
(500, 218, 'Leeds'),
(501, 219, 'Sheffield'),
(502, 220, 'Edinburgh'),
(503, 221, 'Bristol'),
(504, 222, 'Manchester'),
(505, 223, 'Crawley'),
(506, 224, 'Cambridge'),
(507, 225, 'Derby'),
(508, 226, 'New York'),
(509, 227, 'Los Angeles'),
(510, 228, 'Chicago'),
(511, 229, 'Brooklyn'),
(512, 230, 'Houston'),
(513, 231, 'Borough of Queens'),
(514, 232, 'Philadelphia'),
(515, 233, 'Phoenix'),
(516, 234, 'Manhattan'),
(517, 235, 'San Antonio'),
(522, 240, 'Comilla'),
(625, 31, 'Jammu'),
(626, 31, 'Srinagar'),
(627, 31, 'Leh Ladakh'),
(628, 31, 'Gulmarg'),
(629, 31, 'Sonamarg'),
(630, 31, 'Pahalgam'),
(631, 31, 'Bandipora'),
(632, 31, 'Baramulla'),
(633, 31, 'Poonch'),
(634, 31, 'Kulgam '),
(635, 20, 'Guwahati'),
(636, 20, 'Silchar'),
(637, 20, 'Dibrugarh'),
(638, 20, 'Jorhat'),
(639, 20, 'Nagaon'),
(640, 20, 'Tinsukia'),
(641, 20, 'Bongaigaon'),
(642, 20, 'Jorhat'),
(643, 29, 'Tezu'),
(644, 29, 'Roing'),
(645, 29, 'Khonsa'),
(646, 29, 'Jairampur'),
(647, 29, 'Ruksin'),
(649, 32, 'Imphal'),
(650, 32, 'Moirang'),
(651, 32, 'Ukhrul'),
(652, 32, 'Thoubal'),
(653, 32, 'Tamenglong'),
(654, 32, 'Kakching'),
(655, 32, 'Phek'),
(656, 32, 'Churachandpur'),
(657, 32, 'Humpum'),
(658, 32, 'Jessami'),
(659, 32, 'Wilong'),
(660, 316, 'Bellevue'),
(661, 316, 'Seattle'),
(662, 316, 'Spokane'),
(663, 316, 'Tacoma'),
(664, 316, 'Vancouver'),
(665, 316, 'Bellingham'),
(666, 316, 'Kennewick'),
(667, 316, 'Redmond'),
(668, 317, 'Los Angeles'),
(669, 317, 'San Francisco'),
(670, 317, 'San Diego'),
(671, 317, 'Sacramento'),
(672, 317, 'Oakland'),
(673, 317, 'San Jose'),
(674, 317, 'Beverly Hills'),
(675, 317, 'Santa Barbara'),
(676, 317, 'Santa Monica'),
(677, 317, 'Malibu'),
(678, 320, 'Florida'),
(679, 320, 'Miami'),
(680, 320, 'Fort Lauderdale'),
(681, 320, 'Orlando'),
(682, 320, 'Tampa'),
(683, 320, 'Jacksonville'),
(684, 320, 'Tallahassee'),
(685, 318, 'Houston'),
(686, 318, 'Dallas'),
(687, 318, 'Austin'),
(688, 318, 'San Antonio'),
(689, 318, 'Plano'),
(690, 319, 'Honolulu'),
(691, 319, 'Kaneohe'),
(692, 319, 'Kapolei'),
(693, 319, 'Haleiwa'),
(694, 0, ''),
(695, 10, 'Chandigarh'),
(696, 6, 'Chandigarh'),
(697, 13, 'zahirabad'),
(780, 403, 'Delhi'),
(781, 404, 'Memphis'),
(782, 13, 'Kothagudem');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(20) NOT NULL,
  `country_name` varchar(40) NOT NULL,
  `country_code` varchar(20) NOT NULL,
  `country_text` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `country_text`, `nationality`) VALUES
(1, 'India', '+91', 'India +91', 'Indian'),
(2, 'Saudi Arabia', '+966', 'Saudi Arabia +966', 'Saudi'),
(3, 'Australia', '+43', 'Australia +43', 'Australian'),
(4, 'Bahrain', '+973', 'Bahrian +973', 'Bahraini'),
(5, 'Canada', '+1', 'Canada +1', 'Canadian'),
(8, 'Kuwait', '+965', 'kuwait +965', 'Kuwaiti'),
(11, 'Oman', '+968', 'Oman +968', 'Omani'),
(13, 'Qatar', '+974', 'Qatar +974', 'Qatar'),
(14, 'United Arab Emirates', '+971', 'UAE +971', 'Emirati'),
(15, 'United Kingdom', '+44', 'UK +44', 'British'),
(16, 'United State of America', '+1', 'USA +1', 'American');

-- --------------------------------------------------------

--
-- Table structure for table `currency_tble`
--

CREATE TABLE `currency_tble` (
  `id` int(5) NOT NULL,
  `currency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_tble`
--

INSERT INTO `currency_tble` (`id`, `currency`) VALUES
(1, 'Australia Dollar'),
(2, 'Bahrain Dinar'),
(3, 'Bangladesh Taka'),
(4, 'Canada Dollar'),
(5, 'Egypt Pound'),
(6, 'Germany Euro'),
(7, 'INR'),
(8, 'Indonesia Rupiah'),
(9, 'Jordan Dinar'),
(10, 'Kuwait Dinar'),
(11, 'Lebnan Pound'),
(12, 'Libya Dinar'),
(13, 'Malaysia Ringgit'),
(14, 'Maldives Rufiyaa'),
(15, 'Mauritian Rupee'),
(16, 'Nepalese Rupee'),
(17, 'Oman Riyal'),
(18, 'Pakistan Rupee'),
(19, 'Qatar Riyal'),
(20, 'KSA Riyal'),
(21, 'South Africa Rand'),
(22, 'Sri Lanka Rupee'),
(23, 'Sudan Pound'),
(24, 'UAE Dirham'),
(25, 'UK Pound'),
(26, 'USA Dollar'),
(27, 'Yemen Riyal');

-- --------------------------------------------------------

--
-- Table structure for table `education_tble`
--

CREATE TABLE `education_tble` (
  `id` int(11) NOT NULL,
  `education` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_tble`
--

INSERT INTO `education_tble` (`id`, `education`) VALUES
(3, 'Intermediate'),
(4, 'Diploma'),
(5, 'Graduate'),
(6, 'B.Tech'),
(7, 'Post graduate'),
(8, 'M.Tech'),
(9, 'B.Ed'),
(10, 'B.Pharm'),
(11, 'M.Pharm'),
(12, 'MBA'),
(13, 'MCA'),
(14, 'Doctorate'),
(15, 'M.Phil');

-- --------------------------------------------------------

--
-- Table structure for table `employers_tble`
--

CREATE TABLE `employers_tble` (
  `id` int(20) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `industry_type` varchar(100) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `mcode` varchar(5) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `emp_photo` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `register_date` date NOT NULL,
  `otp` int(10) NOT NULL,
  `verify` varchar(5) NOT NULL,
  `code` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `paid` varchar(5) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `paid_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `expire` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers_tble`
--

INSERT INTO `employers_tble` (`id`, `emp_name`, `emp_email`, `emp_password`, `company`, `industry_type`, `company_type`, `designation`, `country`, `state`, `city`, `address`, `mcode`, `mobile`, `emp_photo`, `link`, `details`, `register_date`, `otp`, `verify`, `code`, `ip`, `status`, `paid`, `amount`, `plan`, `paid_date`, `expiry_date`, `expire`) VALUES
(1, 'Syed Obaid', 'ajiitkwebdevelopers@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'IT', 'IT', 'Company', 'mnbmn', 'India', 'Arunachal Pradesh', 'Khonsa', 'vIDYANAGAR', '+91', '9705298208', '580register.PNG', 'nnbnm', 'tuuyuytu', '2018-10-24', 0, '', '735c85b636f0aa6c6fd60ef215e4aec4', '::1', 'approved', 'Y', '', '1 month', '2018-10-15', '2019-03-07', ''),
(2, 'Syed Obaid', 'ajitkwebdeveloper@gmail.com', '6b850141e53a9d777d9b5095f5e6ba84', 'IT', 'IT', 'Company', 'DESIGNING', 'Saudi Arabia', 'Abha', 'Abha', 'vIDYANAGAR', '+91', '9705298208', '334meemdisk.PNG', 'bnmnbm', 'mnbmnbmnbmmnbmbn', '2018-10-24', 792893, 'Y', '6dde5f4319e13d43998d5a458b807e8d', '::1', 'approved', 'N', 'Free registration', '1 month', '2018-10-18', '1969-12-31', 'yes'),
(3, 'Syed Obaid', 'ajitkwebsasasdeveloper@gmail.comsd', '', 'mnbmnbmn', 'IT', 'Company', 'mnbmn', 'Saudi Arabia', 'Buraidah', 'Buraidah', 'sasas', '+91', '9705298208', '93meem_resseller.PNG', '', '', '2018-10-24', 0, '', '42cab895daef44a53644bac70b16f765', '::1', '', '', '', '', '0000-00-00', '0000-00-00', '0000-'),
(4, 'Ajay kumar', 'ajitkwebdeveloper@gmail.com', '6b850141e53a9d777d9b5095f5e6ba84', 'IT Solutions', 'IT', 'Company', 'Web DESIGN', 'India', 'Telangana', 'Hyderabad', 'HITECH CITY', '+91', '9705298208', '529949a4.jpg', '', '', '2018-10-30', 392495, 'Y', '678bf9bcd9152757d4e216ffc90cf194', '183.83.20.219', 'approved', 'N', 'Free registration', '1 month', '2018-10-30', '2018-11-30', 'yes'),
(5, 'Syed Obaid', 'saf.obaid1234@gmail.com', '631a2703492422715422dc0cd377180e', 'Rida ITS', 'IT', 'Company', 'project Manager', 'India', 'Telangana', 'Hyderabad', '11-235/A, Sk Mall, Vidiya Nagar, hyderabad.', '+91', '8686151489', '6851391099215267_hero2_niQ3B7S.jpg', 'www.ridaits.com', '', '2018-11-10', 837972, 'Y', '4d9643d08b6863be6501541f5a5aed23', '183.83.20.219', 'approved', 'N', 'Free registration', '1 month', '2018-11-10', '2018-12-10', 'yes'),
(6, 'emkm', 'majiddba@gmail.com', 'acf0c028f5ce1536e463edc2c5247826', 'Rida ITS', 'IT', 'Company', 'Manager', 'India', 'Telangana', 'Hyderabad', 'Hyderabad', '+91', '8008227262', '512MeeMone-st2.png', '', 'check', '2018-11-28', 19069, 'Y', '2529be168c0ae9b7ec310679fc3b0eef', '178.87.59.178', 'approved', 'N', 'Free registration', '1 month', '2018-11-28', '2018-12-28', 'yes'),
(7, 'KhHAn', 'mmoizkhan305@gmail.com', '912009f75d418d9b65b65e43639d1b7f', 'RidaIts', 'Health care', 'Consultant', 'Manager', 'India', 'Telangana', 'Hyderabad', 'Vidyanagar, Behind Batashowroom', '+91', '7093354175', '15719-512.png', 'https://www.linkedin.com/', 's simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release.', '2018-12-03', 380101, 'Y', '270b59f96a4a067a8f176da9200b5b61', '183.83.20.219', 'approved', 'N', 'Free registration', '', '2018-12-03', '1969-12-31', 'yes'),
(8, 'Khannn', 'kmoiz1199@gmail.com', '', 'Abacus', 'IT', 'Company', 'HR', 'India', 'Telangana', 'Hyderabad', 'Indian office', '+91', '7093354175', '61940e2fa93.png', '', '', '2018-12-03', 214050, '', 'be85560d4dd5d5403154d69a9e8d2969', '183.83.20.219', 'approved', '', '', '', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_renewal_tble`
--

CREATE TABLE `emp_renewal_tble` (
  `plan_id` int(10) NOT NULL,
  `plans` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `offer_duration` varchar(100) NOT NULL,
  `price_usd` varchar(100) NOT NULL,
  `price_inr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_renewal_tble`
--

INSERT INTO `emp_renewal_tble` (`plan_id`, `plans`, `duration`, `offer_duration`, `price_usd`, `price_inr`) VALUES
(2, '6 months INR 999 ($16.00 USD)', '6 months', '6 months', '16', '999'),
(3, '9 months INR 1499 ($24.00 USD)', '9 months', '9 months', '24', '1499'),
(4, '12 months INR 1999 ($31.00 USD) ', '12 months', '12 months', '31', '1999');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `image`) VALUES
(1, 'IT', '<i class=\"fa fa-laptop\" aria-hidden=\"true\"></i>'),
(2, 'Banking', '<i class=\"fa fa-university\" aria-hidden=\"true\"></i>'),
(3, 'BPO', '<i class=\"fa fa-phone-square\" aria-hidden=\"true\"></i>'),
(4, 'Management', '<i class=\"fa fa-shopping-bag\" aria-hidden=\"true\"></i>'),
(5, 'Sales & Marketing', '<i class=\"fa fa-line-chart\" aria-hidden=\"true\"></i>'),
(6, 'Health care', '<i class=\"fa fa-medkit\" aria-hidden=\"true\"></i>'),
(7, 'Design & Art', '<i class=\"fa fa-paint-brush\" aria-hidden=\"true\"></i>'),
(8, 'Education ', '<i class=\"fa fa-book\" aria-hidden=\"true\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(50) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `job_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `apply_date` date NOT NULL,
  `shortlisted` varchar(5) NOT NULL,
  `shortlisted_date` date NOT NULL,
  `mail_sent` varchar(5) NOT NULL,
  `sent_date` datetime(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `emp_id`, `job_id`, `user_id`, `apply_date`, `shortlisted`, `shortlisted_date`, `mail_sent`, `sent_date`) VALUES
(1, 1, 6, 17, '2018-11-28', '', '0000-00-00', '', '0000-00-00 00:00:00.00000'),
(2, 1, 11, 17, '2019-03-09', '', '0000-00-00', '', '0000-00-00 00:00:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `job_users`
--

CREATE TABLE `job_users` (
  `id` int(20) NOT NULL,
  `profileId` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `ncountry` varchar(100) NOT NULL,
  `nstate` varchar(100) NOT NULL,
  `ncity` varchar(100) NOT NULL,
  `rcountry` varchar(100) NOT NULL,
  `rstate` varchar(100) NOT NULL,
  `rcity` varchar(100) NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `body_type` varchar(50) NOT NULL,
  `health` varchar(50) NOT NULL,
  `height` varchar(20) NOT NULL,
  `height_cm` int(5) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `native_lang` varchar(50) NOT NULL,
  `mcode` varchar(6) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `education` varchar(100) NOT NULL,
  `industry` text NOT NULL,
  `exp_year` varchar(30) NOT NULL,
  `skill` text NOT NULL,
  `skill_exp` varchar(30) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `current_salary` varchar(150) NOT NULL,
  `languages_known` text NOT NULL,
  `english_label` varchar(100) NOT NULL,
  `urdu_label` varchar(200) NOT NULL,
  `telugu_label` varchar(200) NOT NULL,
  `hindi_lang` varchar(50) NOT NULL,
  `currency2` varchar(30) NOT NULL,
  `exp_salary` varchar(150) NOT NULL,
  `travel` varchar(5) NOT NULL,
  `travel_by` int(5) NOT NULL,
  `old_role` varchar(200) NOT NULL,
  `resume` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `social_link` text NOT NULL,
  `prefer_industry` text NOT NULL,
  `prefer_role` text NOT NULL,
  `prefer_jobType` varchar(200) NOT NULL,
  `prefer_country` varchar(100) NOT NULL,
  `prefer_state` varchar(100) NOT NULL,
  `prefer_city` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(50) NOT NULL,
  `otp` int(10) NOT NULL,
  `verify` varchar(4) NOT NULL,
  `paid` varchar(4) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `paid_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `expire` varchar(5) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `register_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resume_update_date` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `idproof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages_tble`
--

CREATE TABLE `languages_tble` (
  `id` int(5) NOT NULL,
  `language_name` varchar(100) NOT NULL,
  `language_name_urdu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language_name_Arabic` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages_tble`
--

INSERT INTO `languages_tble` (`id`, `language_name`, `language_name_urdu`, `language_name_Arabic`) VALUES
(1, 'Arabic', 'عربی', 'العربي'),
(2, 'Bengali', 'بنگالی', 'بنغالي'),
(3, 'Bhojpuri', 'بھوجپوری', 'لبهوجبرية'),
(4, 'English', 'انگریزی', 'الإنجليزية'),
(5, 'French', 'فرانسیسی', 'الفرنسية'),
(6, 'Gujrati', 'گجراتی', 'جوجراتي'),
(7, 'Hindi', 'ہندی', 'الهندية'),
(8, 'Indonesian', 'انڈونیشین', 'لأندونيسية'),
(9, 'Kannada', 'کناڈا', 'الكانادا'),
(10, 'Kashmiri', 'کشمیری', 'كشمير'),
(11, 'Marathi', 'مراٹهی', 'المهاراتية'),
(12, 'Malayalam', 'ملیالم', 'المالايالامية'),
(13, 'Panjabi', 'پنجابی', 'بنجابي'),
(14, 'Russian', 'روسی', 'الروسية'),
(15, 'Spanish', 'ہسپانوی', 'الأسبانية'),
(16, 'Tamil', 'تمل', 'التاميل'),
(17, 'Telugu', 'تیلگو', 'التيلجو'),
(18, 'Urdu', 'اردو', 'الأردية'),
(19, 'Chinese', 'چینی', 'صينى'),
(20, 'Turkish', 'ترکی', 'اللغة التركية'),
(21, 'Filipino', 'فلپنو', 'الفلبينية');

-- --------------------------------------------------------

--
-- Table structure for table `location_tble`
--

CREATE TABLE `location_tble` (
  `id` int(11) NOT NULL,
  `location` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tble`
--

INSERT INTO `location_tble` (`id`, `location`) VALUES
(1, 'Hyderabad'),
(2, 'Bangalore'),
(3, 'Pune'),
(4, 'Mumbay'),
(5, 'Delhi'),
(6, 'Kolkata'),
(7, 'Bhopal'),
(8, 'Chennai'),
(9, 'Jaipur'),
(10, 'Nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `matching_jobs`
--

CREATE TABLE `matching_jobs` (
  `id` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `matchcount` int(50) NOT NULL,
  `match_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matching_jobs`
--

INSERT INTO `matching_jobs` (`id`, `userid`, `matchcount`, `match_ids`) VALUES
(7, 17, 3, '1,6,11'),
(8, 25, 2, '1,6'),
(9, 0, 0, ''),
(10, 37, 2, '1,6');

-- --------------------------------------------------------

--
-- Table structure for table `matching_jobseekers`
--

CREATE TABLE `matching_jobseekers` (
  `id` int(50) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `job_id` int(50) NOT NULL,
  `matchcount` int(20) NOT NULL,
  `match_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matching_jobseekers`
--

INSERT INTO `matching_jobseekers` (`id`, `emp_id`, `job_id`, `matchcount`, `match_ids`) VALUES
(45, 1, 1, 1, '17'),
(46, 1, 6, 3, '20,21,25'),
(47, 1, 4, 1, '37'),
(48, 1, 11, 1, '17'),
(49, 1, 3, 1, '18');

-- --------------------------------------------------------

--
-- Table structure for table `meem_jobs`
--

CREATE TABLE `meem_jobs` (
  `id` int(30) NOT NULL,
  `emp_id` int(30) NOT NULL,
  `job_code` varchar(10) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `job_desc` text NOT NULL,
  `currency` varchar(50) NOT NULL,
  `min_salary` int(10) NOT NULL,
  `max_salary` int(10) NOT NULL,
  `Vacancies` int(5) NOT NULL,
  `industry` varchar(250) NOT NULL,
  `job_role` varchar(100) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_about` text NOT NULL,
  `website` varchar(250) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `contact_email` varchar(200) NOT NULL,
  `prefer_edu` varchar(200) NOT NULL,
  `prefer_skill` varchar(250) NOT NULL,
  `prefer_min_exp` int(2) NOT NULL,
  `prefer_max_exp` int(2) NOT NULL,
  `prefer_industry` text NOT NULL,
  `prefer_marital` varchar(200) NOT NULL,
  `prefer_health` varchar(150) NOT NULL,
  `prefer_gender` varchar(100) NOT NULL,
  `prefer_body` varchar(200) NOT NULL,
  `prefer_min_age` int(2) NOT NULL,
  `prefer_max_age` int(2) NOT NULL,
  `prefer_min_height` varchar(100) NOT NULL,
  `prefer_max_height` varchar(100) NOT NULL,
  `prefer_min_heightCM` int(5) NOT NULL,
  `prefer_max_heightCM` int(5) NOT NULL,
  `prefer_religion` text NOT NULL,
  `prefer_nation` text NOT NULL,
  `prefer_lang` text NOT NULL,
  `prefer_ncountry` text NOT NULL,
  `prefer_nstate` text NOT NULL,
  `prefer_ncity` text NOT NULL,
  `prefer_rcountry` text NOT NULL,
  `prefer_rstate` text NOT NULL,
  `prefer_rcity` text NOT NULL,
  `post_date` datetime NOT NULL,
  `ip` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meem_jobs`
--

INSERT INTO `meem_jobs` (`id`, `emp_id`, `job_code`, `job_title`, `job_desc`, `currency`, `min_salary`, `max_salary`, `Vacancies`, `industry`, `job_role`, `job_type`, `company_name`, `company_about`, `website`, `country`, `state`, `city`, `address`, `contact_number`, `contact_email`, `prefer_edu`, `prefer_skill`, `prefer_min_exp`, `prefer_max_exp`, `prefer_industry`, `prefer_marital`, `prefer_health`, `prefer_gender`, `prefer_body`, `prefer_min_age`, `prefer_max_age`, `prefer_min_height`, `prefer_max_height`, `prefer_min_heightCM`, `prefer_max_heightCM`, `prefer_religion`, `prefer_nation`, `prefer_lang`, `prefer_ncountry`, `prefer_nstate`, `prefer_ncity`, `prefer_rcountry`, `prefer_rstate`, `prefer_rcity`, `post_date`, `ip`, `status`) VALUES
(14, 1, 'MEEMJOB', 'PHP', 'FDFD', 'INR', 40, 50, 4, 'IT', 'DEVELOPER', 'Full Time', 'RidaITS', 'FDSFSDFDSF', 'ridaits.com', 'India', 'Andhra Pradesh, Bihar', 'Vijayawada, Bhojpur', 'SFSFSSF', '9705298208', 'mmoizkhan305@gmail.com', 'Graduate', 'PHP, HTML', 2, 5, 'Construction', 'Married', 'Healthy', 'Female', 'Athletic', 20, 22, '5.6', '6.3', 168, 191, 'Islam', 'Indian', 'English, Hindi', 'India, Saudi Arabia', 'Arunachal Pradesh, Qatif', 'Ruksin', 'India', 'Andhra Pradesh', 'Visakhapatnam', '2019-09-14 09:20:54', '::1', '0'),
(15, 1, 'MEEMJOB', 'VCNVNV', 'bbnbnbgf', 'INR', 55, 50, 4, 'IT', 'DEVELOPER', 'Full Time', 'BBNBVNV', 'fghfghfghfg', 'ridaits.com', 'India', 'Andhra Pradesh', 'Guntur', 'yiiuyiuiyuiuy', '9705298208', 'mmoizkhan305@gmail.com', 'Diploma', 'HTML', 4, 7, 'Manufacturing, Construction', 'Married', 'Healthy', 'Male', 'Athletic', 20, 22, '4.3', '2.2', 130, 66, 'Islam', 'Indian, American', 'English', 'India, Australia', 'Andhra Pradesh', 'Vijayawada', 'India', 'Andhra Pradesh', 'Visakhapatnam', '2019-09-22 09:18:38', '::1', '0'),
(16, 1, '', 'VCNVNV', 'fsfsdf', 'INR', 45, 40, 232, 'IT', 'NVNVBNVB', 'Full Time', 'AADADA', 'sdfsdfsdfds', 'ridaits.com', 'Saudi Arabia', 'Abha', 'Abha', '', '', '', 'Diploma', 'HTML', 2, 5, 'Construction', '', '', '', '', 0, 0, '.', '.', 0, 0, '', '', '', '', '', '', '', '', '', '2019-09-22 09:28:48', '::1', '0'),
(17, 1, '', 'VCNVNV', 'sfsd', 'INR', 35, 60, 232, 'Banking', 'DEVELOPER', '', 'AADADA', '', 'ridaits.com', 'Australia', 'Brisbane', 'Brisbane', '', '', '', 'Diploma', 'HTML', 2, 6, 'Construction', '', '', '', '', 0, 0, '.', '.', 0, 0, '', '', '', '', '', '', '', '', '', '2019-09-22 09:30:06', '::1', '0'),
(18, 1, '', 'VCNVNV', '', 'INR', 50, 40, 4, 'Banking', 'DEVELOPER', '', 'AADADA', '', 'ridaits.com', 'Australia', 'Brisbane', 'Brisbane', '', '', '', 'Diploma', 'HTML', 2, 7, 'Construction', '', '', '', '', 0, 0, '.', '.', 0, 0, '', '', '', '', '', '', '', '', '', '2019-09-22 09:31:50', '::1', '0'),
(19, 1, '', 'VCNVNV', '', 'INR', 35, 40, 4, '', 'DEVELOPER', '', 'sfsfs', '', '', 'Bahrain', 'Aali ', 'Aali', '', '', '', 'Diploma', 'HTML', 2, 3, 'Construction', '', '', '', '', 0, 0, '.', '.', 0, 0, '', '', '', '', '', '', '', '', '', '2019-09-22 09:35:08', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `plan_id` int(10) NOT NULL,
  `plans` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `offer_duration` varchar(100) NOT NULL,
  `price_usd` varchar(100) NOT NULL,
  `price_inr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`plan_id`, `plans`, `duration`, `offer_duration`, `price_usd`, `price_inr`) VALUES
(1, '1 Month Free Membership', '1 month', '1 month', '0', '0'),
(2, '6 months INR 999 ($16.00 USD)', '6 months', '6 months', '16', '999'),
(3, '9 months INR 1499 ($24.00 USD)', '9 months', '9 months', '24', '1499'),
(4, '12 months INR 1999 ($31.00 USD) ', '12 months', '12 months', '31', '1999');

-- --------------------------------------------------------

--
-- Table structure for table `membership_emp`
--

CREATE TABLE `membership_emp` (
  `plan_id` int(10) NOT NULL,
  `plans` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `price_inr` varchar(100) NOT NULL,
  `price_usd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_emp`
--

INSERT INTO `membership_emp` (`plan_id`, `plans`, `duration`, `price_inr`, `price_usd`) VALUES
(1, '1 Month Free Membership', '1 month', '399', 499),
(2, '6 months INR 999', '6 months', '799', 999),
(3, '9 months INR 1499', '9 months', '1199', 1499),
(4, '12 months INR 1999', '12 months', '1599', 1999);

-- --------------------------------------------------------

--
-- Table structure for table `nationality_tble`
--

CREATE TABLE `nationality_tble` (
  `id` int(5) NOT NULL,
  `nation_name` varchar(100) NOT NULL,
  `nation_name_urdu` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nation_name_Arabic` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nationality_tble`
--

INSERT INTO `nationality_tble` (`id`, `nation_name`, `nation_name_urdu`, `nation_name_Arabic`) VALUES
(1, 'Australian', 'آسٹریلوی', 'الأسترالي'),
(2, 'Bahraini', 'بحرینی', 'البحريني'),
(3, 'Bangladeshi', 'بنگلادیشی', 'بنجلاديش'),
(4, 'Canadian', 'کینڈین', 'الكندية'),
(5, 'Egyptian', 'مصری', 'مصري'),
(6, 'German', 'جرمن', 'ألمانية'),
(7, 'Indian', 'بھارتی', 'هندي'),
(8, 'Indonesian', 'انڈونیشین', 'الأندونيسية'),
(9, 'Jordanian', 'اردنی', 'أردني'),
(10, 'Kuwaiti', 'کویتی', 'كويتي'),
(11, 'Lebanese', 'لبنانی', 'لبنانی'),
(12, 'Libyan', 'لیبیائ', 'ليبي'),
(13, 'Malaysian', 'ملائیشیائ', 'الماليزية'),
(14, 'Maldivian', 'مالدیپی', 'المالديف'),
(15, 'Mauritian', 'ماریشیس', 'موريشيوس'),
(16, 'Nepalese', 'نیپالی', 'النيبالية'),
(17, 'Omani', 'عمانی', 'العماني'),
(18, 'Pakistani', 'پاکستانی', 'باكستاني'),
(19, 'Qatari', 'قطری', 'القطري'),
(20, 'Saudi', 'سعودی', 'سعودي'),
(21, 'South African', 'جنوبی آفریقی', 'جنوب افريقيا'),
(22, 'Sri Lankan', 'سری لنکن', 'سري لانكا'),
(23, 'Sudanese', 'سوڈانی', 'سوداني'),
(24, 'Emirati', 'اماراتی', 'الإماراتي'),
(25, 'United Kingdom', 'برطانوی', 'المملكة المتحدة'),
(26, 'American', 'أمريكي', 'أمريكي'),
(27, 'Yemeni', 'يمني', 'اليمني'),
(28, 'Chinese', 'چینی', 'صينى'),
(29, 'Moroccan', 'مغربي', 'مغربي'),
(30, 'filipino', 'فلپائنو', 'فلپائنو'),
(31, 'Turkish', 'ترکی', 'ترکی'),
(32, 'Kiwis', 'کییوس', 'کییوس');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tble`
--

CREATE TABLE `payment_tble` (
  `id` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `profileId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` int(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `payfor` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo_approval`
--

CREATE TABLE `photo_approval` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `pp_photo` enum('0','1','2') NOT NULL DEFAULT '0',
  `resume` enum('0','1','2') NOT NULL DEFAULT '0',
  `user_about` enum('0','1','2') NOT NULL DEFAULT '0',
  `date_on` date NOT NULL,
  `user_for` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_approval`
--

INSERT INTO `photo_approval` (`id`, `userid`, `pp_photo`, `resume`, `user_about`, `date_on`, `user_for`) VALUES
(1, 17, '1', '2', '0', '2018-11-28', 'jobseeker'),
(2, 17, '0', '0', '0', '2019-03-05', 'jobseeker');

-- --------------------------------------------------------

--
-- Table structure for table `physics_tble`
--

CREATE TABLE `physics_tble` (
  `id` int(10) NOT NULL,
  `body_type` varchar(100) NOT NULL,
  `body_type_urdu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body_type_Arabic` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physics_tble`
--

INSERT INTO `physics_tble` (`id`, `body_type`, `body_type_urdu`, `body_type_Arabic`) VALUES
(1, 'Slim', 'دبلے', 'معتدل البنيه'),
(2, 'Athletic', 'اتھلیٹک', 'رياضي'),
(3, 'Build Muscular', 'مضبوط جسم', 'بناء العضلات'),
(4, 'Slight over weight', 'تھوڑا سا موٹاپا', 'زيادة طفيفة في الوزن'),
(5, 'Moderate over weight', 'درمیانی موٹاپا', 'معتدل على الوزن'),
(6, 'Heavy over weight', 'بھاری موٹاپا', 'الوزن الزائد');

-- --------------------------------------------------------

--
-- Table structure for table `renewal_tble`
--

CREATE TABLE `renewal_tble` (
  `plan_id` int(10) NOT NULL,
  `plans` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `offer_duration` varchar(100) NOT NULL,
  `price_usd` varchar(100) NOT NULL,
  `price_inr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renewal_tble`
--

INSERT INTO `renewal_tble` (`plan_id`, `plans`, `duration`, `offer_duration`, `price_usd`, `price_inr`) VALUES
(2, '6 months INR 999 ($16.00 USD)', '6 months', '6 months', '16', '999'),
(3, '9 months INR 1499 ($24.00 USD)', '9 months', '9 months', '24', '1499'),
(4, '12 months INR 1999 ($31.00 USD) ', '12 months', '12 months', '31', '1999');

-- --------------------------------------------------------

--
-- Table structure for table `skill_tble`
--

CREATE TABLE `skill_tble` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_tble`
--

INSERT INTO `skill_tble` (`id`, `skill_name`) VALUES
(1, 'JavaScript'),
(2, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `smstry_count`
--

CREATE TABLE `smstry_count` (
  `id` int(50) NOT NULL,
  `userid` int(30) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smstry_count`
--

INSERT INTO `smstry_count` (`id`, `userid`, `mobile`) VALUES
(1, 25, '+919705298208'),
(2, 25, '+919705298208'),
(3, 25, '+919705298208'),
(4, 25, '+919705298208'),
(5, 25, '+919705298208'),
(6, 25, '+919705298208'),
(7, 25, '+919705298208'),
(8, 25, '+919705298208'),
(9, 25, '+919705298208'),
(10, 25, '+919705298208'),
(11, 25, '+919705298208'),
(12, 25, '+919705298208'),
(13, 25, '+919705298208'),
(14, 25, '+919705298208'),
(15, 25, '+919705298208'),
(16, 25, '+919705298208'),
(17, 25, '+919705298208'),
(18, 25, '+919705298208'),
(19, 25, '+919705298208'),
(20, 25, '+919705298208'),
(21, 25, '+919705298208'),
(22, 25, '+919705298208'),
(23, 25, '+919705298208'),
(24, 25, '+919705298208'),
(25, 25, '+919705298208');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(40) NOT NULL,
  `country_id` int(5) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'Andhra Pradesh'),
(2, 1, 'Madhya Pradesh'),
(3, 1, 'Gujrat'),
(4, 1, 'Maharastra'),
(5, 1, 'Goa'),
(6, 1, 'Haryana'),
(7, 1, 'Karnataka'),
(8, 1, 'Kerala'),
(9, 1, 'Odisha '),
(10, 1, 'Punjab'),
(11, 1, 'Rajasthan'),
(12, 1, 'Tamil Nadu'),
(13, 1, 'Telangana'),
(14, 1, 'Bihar'),
(15, 1, 'Uttar Pradesh'),
(16, 1, 'Uttarakhand'),
(17, 1, 'West Bengal'),
(18, 1, 'Jharkhand'),
(19, 1, 'Chhattisgarh'),
(20, 1, 'Assam'),
(21, 2, 'Riyadh'),
(22, 2, ' Mecca '),
(23, 2, 'Medina'),
(24, 2, 'Jeddah'),
(29, 1, 'Arunachal Pradesh'),
(31, 1, 'Jammu and Kashmir'),
(32, 1, 'Manipur'),
(33, 1, 'Tripura'),
(34, 2, 'Hofuf'),
(35, 2, 'Taif'),
(36, 2, 'Dammam'),
(37, 2, 'Khamis Mushait'),
(38, 2, 'Buraidah'),
(39, 2, 'Khobar'),
(40, 2, 'Tabuk'),
(41, 2, 'Hail'),
(42, 2, 'Hafar Al-Batin'),
(43, 2, 'Jubail'),
(44, 2, 'Al-Kharj'),
(45, 2, 'Qatif'),
(46, 2, 'Abha'),
(47, 2, 'Najran'),
(48, 2, 'Yanbu'),
(49, 2, 'Al Qunfudhah'),
(50, 14, 'Abu Dhabi'),
(51, 14, 'Dubai'),
(52, 14, 'Sharjah'),
(53, 14, 'Ajman'),
(54, 14, 'Fujairah'),
(55, 14, 'Rasul al khaimah'),
(56, 14, 'Umm al quwain'),
(57, 14, 'Al Ain'),
(58, 13, 'Doha'),
(59, 13, 'Dukhan'),
(60, 13, 'Mesaieed'),
(61, 13, 'Al Wakrah'),
(62, 13, 'Al Rayyan'),
(63, 13, 'Al Khor'),
(64, 13, 'Zubarah'),
(65, 13, 'Al Wukayr'),
(66, 13, 'Lusail'),
(67, 13, 'Simaisma'),
(68, 8, 'Kuwait City'),
(69, 8, 'Sharq'),
(71, 8, 'Daiya'),
(72, 8, 'Dasma'),
(73, 8, 'Kaifan'),
(74, 8, 'Al Mansouriya'),
(75, 8, 'Nuzha'),
(76, 8, 'Faiha'),
(77, 8, 'Shamiya'),
(78, 8, 'Adiliya'),
(79, 8, 'Khaldiya'),
(80, 8, 'Qadsiya'),
(81, 8, 'Qurtuba'),
(82, 8, 'Yarmuk'),
(83, 11, 'Muscat'),
(84, 11, 'Seeb'),
(85, 11, 'Salalah'),
(86, 11, 'Bawsha'),
(87, 11, 'Sohar'),
(88, 11, 'As Suwayq'),
(89, 11, 'Ibri'),
(90, 11, 'Saham'),
(91, 11, 'Barka'),
(92, 11, 'Rustaq'),
(161, 4, 'Manama'),
(162, 4, 'Riffa '),
(163, 4, 'Muharraq '),
(164, 4, 'Hamad Town'),
(165, 4, 'Aali '),
(166, 4, 'Isa Town'),
(167, 4, 'Sitra'),
(168, 4, 'Budaiya '),
(169, 4, 'Jidhafs'),
(170, 4, 'Al-Malikiyah'),
(171, 4, 'Adliya'),
(172, 4, 'Sanabis'),
(173, 4, 'Tubli'),
(174, 3, 'Sydney'),
(175, 3, 'Melbourne'),
(176, 3, 'Brisbane'),
(177, 3, 'Perth'),
(178, 3, 'Adelaide'),
(179, 3, 'Gold Coast'),
(180, 3, 'Canberra'),
(181, 3, 'Newcastle'),
(182, 3, 'Logan City'),
(183, 3, 'Geelong'),
(184, 5, 'Toronto '),
(185, 5, 'Montreal'),
(186, 5, 'Calgary '),
(187, 5, 'Ottawa '),
(188, 5, 'Edmonton'),
(189, 5, 'Mississauga'),
(190, 5, 'North York'),
(191, 5, 'Winnipeg'),
(192, 5, 'Scarborough'),
(193, 5, 'Vancouver'),
(214, 15, 'London'),
(215, 15, 'Birmingham'),
(216, 15, 'Glasgow'),
(217, 15, 'Liverpool'),
(218, 15, 'Leeds'),
(219, 15, 'Sheffield'),
(220, 15, 'Edinburgh'),
(221, 15, 'Bristol'),
(222, 15, 'Manchester'),
(223, 15, 'Crawley '),
(224, 15, 'Cambridge'),
(225, 15, 'Derby'),
(226, 16, 'New York'),
(227, 16, 'Los Angeles'),
(228, 16, 'Chicago '),
(229, 16, 'Brooklyn'),
(230, 16, 'Houston'),
(231, 16, 'Borough of Queens'),
(232, 16, 'Philadelphia'),
(233, 16, 'Phoenix'),
(234, 16, 'Manhattan'),
(235, 16, 'San Antonio'),
(316, 16, 'Washington'),
(317, 16, 'California'),
(318, 16, 'Texas'),
(319, 16, 'Hawaii'),
(320, 16, 'Florida'),
(403, 1, 'Delhi'),
(404, 16, 'Memphis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `idx_state` (`state_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `currency_tble`
--
ALTER TABLE `currency_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_tble`
--
ALTER TABLE `education_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers_tble`
--
ALTER TABLE `employers_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_renewal_tble`
--
ALTER TABLE `emp_renewal_tble`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_users`
--
ALTER TABLE `job_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_tble`
--
ALTER TABLE `languages_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_tble`
--
ALTER TABLE `location_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matching_jobs`
--
ALTER TABLE `matching_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matching_jobseekers`
--
ALTER TABLE `matching_jobseekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meem_jobs`
--
ALTER TABLE `meem_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `membership_emp`
--
ALTER TABLE `membership_emp`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `nationality_tble`
--
ALTER TABLE `nationality_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_tble`
--
ALTER TABLE `payment_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_approval`
--
ALTER TABLE `photo_approval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_indx` (`userid`);

--
-- Indexes for table `physics_tble`
--
ALTER TABLE `physics_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewal_tble`
--
ALTER TABLE `renewal_tble`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `skill_tble`
--
ALTER TABLE `skill_tble`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smstry_count`
--
ALTER TABLE `smstry_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `idx_country` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `currency_tble`
--
ALTER TABLE `currency_tble`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `education_tble`
--
ALTER TABLE `education_tble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employers_tble`
--
ALTER TABLE `employers_tble`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emp_renewal_tble`
--
ALTER TABLE `emp_renewal_tble`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_users`
--
ALTER TABLE `job_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages_tble`
--
ALTER TABLE `languages_tble`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `location_tble`
--
ALTER TABLE `location_tble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matching_jobs`
--
ALTER TABLE `matching_jobs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matching_jobseekers`
--
ALTER TABLE `matching_jobseekers`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `meem_jobs`
--
ALTER TABLE `meem_jobs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_emp`
--
ALTER TABLE `membership_emp`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nationality_tble`
--
ALTER TABLE `nationality_tble`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment_tble`
--
ALTER TABLE `payment_tble`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_approval`
--
ALTER TABLE `photo_approval`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `physics_tble`
--
ALTER TABLE `physics_tble`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `renewal_tble`
--
ALTER TABLE `renewal_tble`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill_tble`
--
ALTER TABLE `skill_tble`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `smstry_count`
--
ALTER TABLE `smstry_count`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
