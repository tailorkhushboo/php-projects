-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2020 at 01:47 PM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vbinfggt_bike_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'thanikachalambe@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminpanel`
--

CREATE TABLE `tbl_adminpanel` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adminpanel`
--

INSERT INTO `tbl_adminpanel` (`id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`b_id`, `b_name`, `b_image`, `b_status`) VALUES
(6, 'banner 6', '60179_Capture-1.PNG', 1),
(8, 'App-1', '9543_1.png', 1),
(9, 'App-2', '4250_4.png', 1),
(10, 'app-3', '41377_2.png', 1),
(11, 'app-4', '87462_3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bike`
--

CREATE TABLE `tbl_bike` (
  `bk_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `bk_type` int(11) NOT NULL,
  `bk_brand` varchar(200) NOT NULL,
  `bk_name` varchar(100) NOT NULL,
  `bk_number` varchar(50) NOT NULL,
  `bk_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bike`
--

INSERT INTO `tbl_bike` (`bk_id`, `u_id`, `bk_type`, `bk_brand`, `bk_name`, `bk_number`, `bk_status`) VALUES
(1, 1, 1, '1', '1', '789456', 1),
(2, 1, 1, '1', '2', '789456', 1),
(3, 10, 1, '2', '5', 'hs 64 js 4665', 1),
(4, 10, 1, '2', '5', 'bd 95 dg 5555', 1),
(5, 10, 2, '1', '1', 'bx 98 jd 6588', 1),
(6, 7, 2, '1', '1', 'gj 22 ty 6666', 1),
(7, 7, 1, '1', '1', '7418529', 1),
(8, 11, 2, '2', '4', 'sh 79 wy 7946', 1),
(9, 12, 1, '2', '3', 'vs 46 sh 6464', 1),
(10, 12, 1, '1', '1', 'cy 55 vv 5663', 1),
(11, 12, 2, '2', '5', 'vb 98 bx 9898', 1),
(12, 13, 1, '2', '3', 'gg 22 aa 1234', 1),
(13, 13, 1, '2', '3', 'bx 88 hh 6666', 1),
(14, 11, 2, '1', '1', 'wu 91 ey 4646', 1),
(15, 8, 1, '1', '1', 'Tn 20 Cc 3666', 1),
(16, 13, 1, '2', '3', 'hh 99 jj 6666', 1),
(17, 14, 1, '2', '3', 'gj 05 b 5', 1),
(18, 13, 1, '2', '3', 'bb 99 bh 5555', 1),
(19, 20, 1, '2', '3', 'bs 64 jd 6546', 1),
(20, 20, 2, '1', '2', 'bj 86 xj 8668', 1),
(21, 20, 1, '2', '4', 'vs 65 jd 5665', 1),
(22, 13, 1, '2', '3', 'vv 88 gg 5555', 1),
(23, 24, 1, '2', '5', 'bb 88 bb 8555', 1),
(24, 24, 1, '2', '3', 'bb 88 bb 8888', 1),
(25, 25, 1, '3', '6', 'TN 20 CR 8419', 1),
(26, 26, 1, '1', '1', 'wh 46 ye 1616', 1),
(28, 20, 1, '7', '4', 'hs 64 js 6446', 1),
(29, 20, 1, '9', '4', '   ', 1),
(30, 27, 2, '1', '1', 'hZ 64 su 7447', 1),
(31, 28, 1, '4', '0', 'mh 05 xy 2339', 1),
(32, 25, 1, '8', '0', 'TN 20 CC 3666', 1),
(33, 25, 1, '3', '8', 'TN 20 CA 2541', 1),
(34, 29, 2, '5', '0', 'js 45 js 6464', 1),
(35, 30, 1, '6', '0', 'tn 20 ct 5151', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bikebrand`
--

CREATE TABLE `tbl_bikebrand` (
  `bb_id` int(11) NOT NULL,
  `bb_name` varchar(255) NOT NULL,
  `bb_image` varchar(255) NOT NULL,
  `bb_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bikebrand`
--

INSERT INTO `tbl_bikebrand` (`bb_id`, `bb_name`, `bb_image`, `bb_status`) VALUES
(1, 'TVS', '94274_tvs-ics-squarelogo-1426165433278.png', 1),
(2, 'Bajaj', '20634_kisspng-bajaj-auto-logo-motorcycle-bajaj-pulsar-brand-motomania-5b713b0e2460a4.026680311534147342149.jpg', 1),
(3, 'Yamaha', '1557_kCe6gX.jpg', 1),
(4, 'Honda', '98014_imgbin-honda-logo-car-motorcycle-honda-nsx-supercross-z1cr1h9hBw3U1wmUA7fVX9JDu.jpg', 1),
(5, 'Hero', '8133_87-870133_hero-logo-design-india-png-transparent-images-hero.png', 1),
(6, 'Royal Enfield', '6920_73-739376_royal-enfield-logo-royal-enfield-bullet-enfield-bike.png', 1),
(7, 'Suzuki', '58824_Suzuki-Logo-PNG-Image.png', 1),
(8, 'KTM', '72788_download.png', 1),
(9, 'Kwasaki', '16094_16855acc06bc9c2e22cba5abf2872c19.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bikename`
--

CREATE TABLE `tbl_bikename` (
  `bn_id` int(11) NOT NULL,
  `bb_id` int(11) NOT NULL,
  `bn_name` varchar(255) NOT NULL,
  `bn_image` varchar(255) NOT NULL,
  `bn_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bikename`
--

INSERT INTO `tbl_bikename` (`bn_id`, `bb_id`, `bn_name`, `bn_image`, `bn_status`) VALUES
(1, 1, 'bike name 1', '53832_Birthday.jpg', 1),
(2, 1, 'bike name 2', '66054_Brave - Copy.jpg', 1),
(24, 5, 'Splender', '75736_', 1),
(25, 5, 'Passion Plus / Pro', '8586_', 1),
(26, 5, 'CD Deluxe', '59744_', 1),
(6, 3, 'FZ25', '60226_yamaha-fz-25-249-cc-warrior-white-bike-500x500.jpg', 1),
(7, 3, 'FZ OR FZS 15', '23908_yamaha-fz-s-fi-v3-640.jpg', 1),
(8, 3, 'MT 15', '65538_mt15.png', 1),
(9, 3, 'FASCINO', '88101_yamaha-fascino-glamorous-gold.png', 1),
(10, 3, 'RAYZR OR RAY Z', '45914_yamaha-ray-zr-125fi-cyan-blue.png', 1),
(11, 3, 'SALUTO 125', '26874_yamaha-saluto-matt-green-drum.jpg', 1),
(12, 2, 'PULSAR 150', '60234_bajaj-pulsar-150.jpg', 1),
(13, 2, 'PULSAR RS200', '96414_RS 200.jfif', 1),
(14, 2, 'PULSAR NS160', '94038_Bajaj-Pulsar-NS-160-Performance.jpg', 1),
(15, 2, 'PULSAR NS200', '96822_Bajaj-Pulsar-NS-200-Red-2.jpg', 1),
(16, 2, 'AVENGERS 160', '65212_AVENGER 160.jpg', 1),
(17, 2, 'AVENGERS 220', '53583_AVENGER 220.jfif', 1),
(18, 2, 'CT100', '51781_CT-100.jfif', 1),
(19, 2, 'PLATINA 110', '5484_m_platina_11540274333-110.webp', 1),
(20, 2, 'PULSAR 180', '53280_pulse180-right.webp', 1),
(21, 2, 'DOMINOR 250', '74715_bajaj-dominar-250-rear-view.jpg', 1),
(22, 2, 'DOMINOR 400', '77638_Bajaj-Dominar-400-Colours.jpg', 1),
(23, 2, 'PULSAR 220F', '10784_220.jpg', 1),
(27, 5, 'CBZ xtreme', '4289_', 1),
(28, 5, 'Super Splender', '97339_', 1),
(29, 5, 'Hero Glamour', '49674_', 1),
(30, 5, 'Pleasure', '63460_', 1),
(31, 5, 'Xpulse 200', '6844_', 1),
(32, 5, 'Maestro Edge', '89259_', 1),
(33, 5, 'Destini 125', '28699_', 1),
(34, 4, 'Shine', '5233_', 1),
(35, 4, 'Activa 3G / 4G / 5G', '75573_', 1),
(36, 4, 'Dio', '77219_', 1),
(37, 4, 'CB Hornet', '22399_', 1),
(38, 4, 'CB Unicorn', '54787_', 1),
(39, 4, 'X-Blade', '83089_', 1),
(40, 4, 'Livo', '62068_', 1),
(41, 4, 'Dream Yuga', '52700_', 1),
(42, 4, 'CD 100 dream', '89378_', 1),
(43, 4, 'Dream Neo', '12527_', 1),
(44, 4, 'Aviator', '65578_', 1),
(45, 4, 'Navi', '79259_', 1),
(46, 7, 'Access 125', '69640_', 1),
(47, 7, 'Gixerr SF', '62754_', 1),
(48, 7, 'Burgman street', '69925_', 1),
(49, 7, 'Gixxer 250', '39899_', 1),
(50, 7, 'Intruder 150', '34142_', 1),
(51, 1, 'Apache RTR 160', '88433_', 1),
(52, 1, 'Ntorq 125', '18193_', 1),
(53, 1, 'TVS Jupiter', '55219_', 1),
(54, 1, 'Apache RTR 200', '81775_', 1),
(55, 1, 'Sports', '67862_', 1),
(56, 1, 'XL Heavy Duty / Regular', '61780_', 1),
(57, 1, 'Star City', '39534_', 1),
(58, 1, 'Victor', '98079_', 1),
(59, 1, 'Other', '59546_', 1),
(60, 5, 'Other', '15832_', 1),
(61, 4, 'Other', '97700_', 1),
(62, 3, 'Other', '17472_', 1),
(63, 6, 'Classic 350', '56308_', 1),
(64, 6, 'Thunderbird 350', '25452_', 1),
(65, 6, 'Bullet 350', '73847_', 1),
(66, 6, 'Thunderbird 350X', '89231_', 1),
(67, 6, 'Himalayan', '17882_', 1),
(68, 6, 'Interceptor 650', '98110_', 1),
(69, 8, '200 Duke', '1361_', 1),
(70, 8, 'RC 200', '85451_', 1),
(71, 8, 'RC 125', '17077_', 1),
(72, 8, 'Duke 125', '60520_', 1),
(73, 8, '250 Duke', '32645_', 1),
(74, 8, 'RC 390', '91632_', 1),
(75, 8, '390 Duke', '95455_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `bog_id` int(11) NOT NULL,
  `bog_name` varchar(255) NOT NULL,
  `bog_image` varchar(255) NOT NULL,
  `bog_desc` text NOT NULL,
  `bog_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`bog_id`, `bog_name`, `bog_image`, `bog_desc`, `bog_status`) VALUES
(1, 'blog2', '10208_download (3).jpg', '<p>wsefqawedfqwedqqwedwdwedxASDASDAWD</p>\r\n', 1),
(3, 'News Update - Times Now', '20360_download (2).jpg', '<p>Vehicle News will be updated Here.. !!<br />\r\n&nbsp;</p>\r\n', 1),
(4, 'Royal Enfield Himalayan BS6 vs Bajaj Dominar 400 BS6: Competition Check', '69936_download (1).jpg', '<p>The&nbsp;<a href=\"https://www.bikewale.com/royalenfield-bikes/himalayan/\">Royal Enfield Himalayan</a>&nbsp;and&nbsp;<a href=\"https://www.bikewale.com/bajaj-bikes/dominar-400/\">Bajaj Dominar 400</a>&nbsp;seem like unlikely rivals. However, with touring characteristics and similar price tags, the two motorcycles indirectly compete against each other. While we will bring you a real-world test soon, here is an on-paper comparison of the Bajaj Dominar 400 BS6 and Royal Enfield Himalayan BS6.</p>\r\n\r\n<p><strong>Styling</strong></p>\r\n\r\n<p><img alt=\"Royal Enfield Himalayan Left Side View\" src=\"https://imgd.aeplcdn.com//642x361//n/cw/ec/47020/royalenfield-himalayan-left-side-view0.jpeg?wm=2\" /></p>\r\n\r\n<p>The Dominar 400 is styled on the lines of power cruiser motorcycles. It sports a muscular fuel tank and the full-LED headlamp lends the Dominar its distinctive face. Meanwhile, the well-contoured rear section of the motorcycle holds the split-seat setup and a split tail lamp. And to complete its look, the Bajaj Dominar 400 gets machine-cut alloy wheels and a dual-barrel exhaust. It offers a slightly bent-forward riding position thanks to the mildly rear-set footpegs and straight handlebar.</p>\r\n\r\n<p>On the other hand, the Himalayan offers an even more touring-friendly, upright riding position. And to make things comfortable at highway speeds, it comes with a tall windscreen as standard. In terms of styling, the Royal Enfield Himalayan&rsquo;s minimal bodywork and tall stance suit its adventure-touring character well. However, unlike the full-LED lighting on the Dominar, the Himalayan makes do with conventional lighting all over.</p>\r\n\r\n<p><strong>Features&nbsp;</strong></p>\r\n\r\n<p>The feature list on the Himalayan BS6 is an easy read. It consists of a switchable, dual-channel ABS and an instrument cluster that has an analogue speedometer, odometer, fuel-gauge as well as compass. The cluster sports a small, orange-backlit LCD that shows gear position, clock, odometer, trip meter, and ambient temperature.&nbsp;&nbsp;</p>\r\n\r\n<p><img alt=\"Royal Enfield Himalayan Instrument cluster\" src=\"https://imgd.aeplcdn.com//642x361//n/cw/ec/47020/royalenfield-himalayan-instrument-cluster1.jpeg?wm=2\" /></p>\r\n\r\n<p>Meanwhile, Bajaj has equipped the Dominar 400 with not one, but two fully digital instrument clusters. While the conventionally mounted unit shows speed, rpm, and fuel level, the secondary cluster fitted on the fuel tank displays time, tripmeter, and gear position. Moreover, the Dominar also gets a dual-channel ABS and comes with a slipper clutch, something that the Himalayan misses out on.</p>\r\n\r\n<p><strong>Engine&nbsp;</strong></p>\r\n\r\n<p><img alt=\"Royal Enfield Himalayan Left Side View\" src=\"https://imgd.aeplcdn.com//642x361//n/cw/ec/47020/royalenfield-himalayan-left-side-view2.jpeg?wm=2\" /></p>\r\n\r\n<p>The Royal Enfield Himalayan is powered by a 411cc, single-cylinder, air-cooled and fuel-injected motor that produces 24.3bhp of power and 32Nm of torque, paired to a five-speed transmission. The Bajaj Dominar 400 gets a 373cc, single-cylinder engine that is liquid-cooled and fuel-injected. The motor, which is mated to a six-speed gearbox and slipper clutch puts out 39.4bhp and 35Nm.</p>\r\n\r\n<p><strong>Cycle Parts</strong></p>\r\n\r\n<p>Now, the Dominar 400 rides on 17-inch alloy wheels with road-biased tyres sourced from MRF. For suspension, it uses 43mm inverted forks and a mono-shock at the rear. Meanwhile, braking on the Dominar is done by a 320mm disc at the front and a 230mm disc at the rear. &nbsp;</p>\r\n\r\n<p><img alt=\"Royal Enfield Himalayan Wheels-Tyres\" src=\"https://imgd.aeplcdn.com//642x361//n/cw/ec/47020/royalenfield-himalayan-wheels-tyres3.jpeg?wm=2\" /></p>\r\n\r\n<p>Nevertheless, apart from its touring capabilities, the Royal Enfield Himalayan is also off-road biased and sports dual-sport CEAT rubber wrapped on spoke wheels; 21-inch at the front and 17-inch at the rear. &nbsp;The 41mm telescopic forks offer a massive 200mm of travel, compared to the Dominar&rsquo;s 135mm travel. And the rear mono-shock offers 180mm of travel; 70mm more than the Dominar 400. Braking hardware includes a 300mm disc at the front and a 240mm disc at the rear.</p>\r\n\r\n<p><strong>Pricing</strong></p>\r\n\r\n<p>Bajaj offers the Dominar 400 in a single variant (Green and Black paint options) which is priced at Rs 1.91 lakh. On the other hand, the Royal Enfield Himalayan BS6&rsquo; pricing varies on the choice of colour. The dual-tone Rock Red and Lake Blue colours cost Rs 1.91 lakh whereas the Sleet Grey and Gravel Grey are priced at Rs 1.89 lakh. The most affordable colours, however, are the Snow White and Granite Black that were also available on the BS4 model.&nbsp;</p>\r\n\r\n<p><em>All prices ex-showroom</em></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `rate` float NOT NULL DEFAULT '0',
  `remark_comment` text NOT NULL,
  `s_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `o_puncture` int(11) NOT NULL,
  `o_breakdown` int(11) NOT NULL,
  `o_outoffuel` int(11) NOT NULL,
  `o_engineservices` int(11) NOT NULL,
  `o_oilservice` int(11) NOT NULL,
  `o_bikespares` int(11) NOT NULL,
  `o_bikepainting` int(11) NOT NULL,
  `o_generalservice` int(11) NOT NULL,
  `o_bikewashpolish` int(11) NOT NULL,
  `o_electricwork` int(11) NOT NULL,
  `o_stickering` int(11) NOT NULL,
  `o_others` varchar(255) NOT NULL,
  `b_type` int(11) NOT NULL,
  `o_remark` varchar(2000) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`b_id`, `u_id`, `rate`, `remark_comment`, `s_id`, `invoice_id`, `date`, `bike_id`, `service_type`, `o_puncture`, `o_breakdown`, `o_outoffuel`, `o_engineservices`, `o_oilservice`, `o_bikespares`, `o_bikepainting`, `o_generalservice`, `o_bikewashpolish`, `o_electricwork`, `o_stickering`, `o_others`, `b_type`, `o_remark`, `b_status`) VALUES
(1, 20, 0, '', 3, 1, '2020-04-29', 20, '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(2, 20, 3.5, 't hcjvibimh', 3, 2, '2020-04-29', 20, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(3, 25, 0, '', 19, 4, '2020-04-29', 25, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(4, 26, 0, '', 4, 3, '29-04-2020', 26, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(5, 25, 4.5, 'Service is Good ..', 19, 0, '29-04-2020', 25, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(6, 20, 0, '', 5, 0, '2020-04-30', 20, '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(8, 25, 0, '', 31, 5, '04-05-2020', 25, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(9, 25, 0, '', 31, 0, '04-05-2020', 32, '5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(10, 25, 0, '', 31, 6, '04-05-2020', 25, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(11, 20, 0, '', 3, 0, '05-05-2020', 20, '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(12, 20, 0, '', 27, 0, '05-05-2020', 20, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(13, 20, 0, '', 22, 0, '2020-05-05', 20, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(14, 1, 0, '', 1, 0, '2020-05-11', 1, '1', 1, 1, 1, 2, 1, 2, 2, 2, 2, 2, 1, 'this is a testing ksjndcajksdnc', 0, '', 1),
(15, 1, 0, '', 1, 0, '2020-06-11', 1, '1', 1, 1, 1, 2, 1, 2, 2, 2, 2, 2, 1, 'this is a testing ksjndcajksdnc', 0, '', 1),
(16, 1, 0, '', 1, 0, '2020-07-11', 1, '1', 1, 1, 1, 2, 1, 2, 0, 2, 2, 2, 1, 'this is a testing ksjndcajksdnc', 0, '', 1),
(17, 20, 0, '', 22, 0, '2020-05-11', 20, '0', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '', 1),
(18, 20, 0, '', 22, 0, '2020-05-11', 20, '1', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 1, '', 1),
(19, 20, 0, '', 22, 0, '2020-05-11', 20, '1', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '', 1, '', 1),
(20, 20, 0, '', 35, 0, '2020-05-02', 20, '1', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, '', 1),
(1000, 27, 0, '', 35, 0, '2020-05-07', 30, '5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 1),
(1001, 20, 0, '', 35, 0, '2020-05-13', 20, '1,2', 1, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, '0', 1, '', 1),
(1002, 1, 0, '', 35, 0, '2020-05-13', 1, '1,2', 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 'this is a testing ksjndcajksdnc', 1, '', 1),
(1003, 20, 0, '', 35, 0, '2020-05-13', 20, '1,2', 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, '0', 1, '', 1),
(1004, 29, 0, '', 26, 14, '2020-05-13', 34, '2', 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, '0', 1, '', 1),
(1005, 29, 0, '', 26, 15, '2020-05-13', 34, '1,2', 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '0', 1, '', 1),
(1006, 29, 0, '', 26, 0, '2020-05-13', 34, '1', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '0', 1, '', 1),
(1007, 29, 0, '', 29, 0, '2020-05-13', 34, '1,2', 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, '0', 1, '', 1),
(1009, 25, 5, 'Good and Efficient Service Done .', 12, 16, '2020-05-13', 33, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '0', 4, '', 1),
(1010, 25, 3.5, 'Good Services Done.', 12, 17, '2020-05-13', 25, '2', 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, '0', 4, '', 1),
(1011, 25, 0, '', 24, 0, '2020-05-13', 33, '2', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, '0', 1, '', 1),
(1012, 29, 0, '', 22, 0, '2020-05-15', 34, '1,2', 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '0', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiryform`
--

CREATE TABLE `tbl_inquiryform` (
  `if_id` int(11) NOT NULL,
  `if_name` varchar(255) NOT NULL,
  `if_garage_name` varchar(255) NOT NULL,
  `if_email` varchar(255) NOT NULL,
  `if_phone` varchar(255) NOT NULL,
  `if_adderss` text NOT NULL,
  `if_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inquiryform`
--

INSERT INTO `tbl_inquiryform` (`if_id`, `if_name`, `if_garage_name`, `if_email`, `if_phone`, `if_adderss`, `if_status`) VALUES
(1, 'khushboo', 'khush', 'khushboo@gmail.com', '7894561233', 'thiusis kjasdjaN.SJKNAksnak.sna.s,xna,scmxn,scnmzscnmzs', 1),
(2, 'khushboo', 'khush', 'khushboo@gmail.com', '7894561233', 'thiusis kjasdjaN.SJKNAksnak.sna.s,xna,scmxn,scnmzscnmzs', 1),
(3, 'by xjxjxj', 'nxjxkx', 'asd@gmail.com', '6737377679', 'hshsjsj', 1),
(4, 'Thanikachalam', 'Fhy', 'thanika', '94978', 'kadambathur', 1),
(5, 'vabzzz', 'vsgs', 'jxxh', '4949499449', 'sbsjzn', 1),
(6, 'v bj h', 'vhvv', 'vjvjvg', '9668538868', 'crctc', 1),
(7, 'aaaa', 'nsjsjss', 'j@gmail.com', '9767376677', 'sbdhdjjs', 1),
(8, 'bsjaja', 'bsjdjd', 'aa@gmail.com', '9673734644', 'bsjs', 1),
(9, 'ddd', 'hsjs', 'aa@gmail.com', '6767677676', 'abaha', 1),
(10, 'znnss', 'bsjs', 'aa@gmail.com', '9676767676', 'sgshah', 1),
(11, 'uhxh', 'jsja', 'a@gmail.com', '9767676766', 'hxhad', 1),
(12, 'nsjs', 'dsjdj', 'ozavaibhavi94@gmail.com', '9677676764', 'hsusus', 1),
(13, 'xbdj', 'kakaka', 'aaazzz@gmail.com', '9644965555', 'sgshsdnjsjsj', 1),
(14, 'bsbs', 'Thanikachalam', 'thanikachalambe@gmail.com', '9789565237', 'Kadambathur', 1),
(15, 'Micky one', 'Michel Ahop tech', 'thanikachalambe@gmail.com', '9789565237', 'Chennai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `i_id` int(11) NOT NULL,
  `srprovider_id` int(11) NOT NULL,
  `bikedetails_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `order_details` text NOT NULL,
  `i_total_amount` varchar(255) NOT NULL,
  `i_date` varchar(255) NOT NULL,
  `i_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`i_id`, `srprovider_id`, `bikedetails_id`, `u_id`, `o_id`, `order_details`, `i_total_amount`, `i_date`, `i_status`) VALUES
(1, 3, 20, 20, 1, '[{\"service_name\":\"Oil Change\",\"service_price\":\"100\"},{\"service_name\":\"Bike Water wash\",\"service_price\":\"100\"}]', '200.0', '29-04-2020', 1),
(2, 3, 20, 20, 2, '[{\"service_name\":\"Oil Change\",\"service_price\":\"120\"},{\"service_name\":\"Bike Eletrical work\",\"service_price\":\"100\"},{\"service_name\":\"Bike Water wash\",\"service_price\":\"50\"},{\"service_name\":\"extra\",\"service_price\":\"100\"}]', '370.0', '29-04-2020', 1),
(3, 4, 26, 26, 4, '[{\"service_name\":\"General Bike Service\",\"service_price\":\"10\"},{\"service_name\":\"Bike Repair\",\"service_price\":\"10\"},{\"service_name\":\"Bike Polish\",\"service_price\":\"10\"},{\"service_name\":\"Bike Engine Repair\",\"service_price\":\"10\"},{\"service_name\":\"abcd\",\"service_price\":\"10\"}]', '50.0', '29-04-2020', 1),
(4, 19, 25, 25, 3, '[{\"service_name\":\"Oil Changing\",\"service_price\":\"250\"}]', '250.0', '30-04-2020', 0),
(5, 31, 25, 25, 8, '[{\"service_name\":\"General Bike Service\",\"service_price\":\"450\"},{\"service_name\":\"Bike Eletrical work\",\"service_price\":\"200\"},{\"service_name\":\"Bike Engine Repair\",\"service_price\":\"1250\"},{\"service_name\":\"Other Charges\",\"service_price\":\"75\"}]', '1975.0', '04-05-2020', 1),
(6, 31, 25, 25, 10, '[{\"service_name\":\"Oil Change\",\"service_price\":\"100\"}]', '100.0', '04-05-2020', 1),
(16, 12, 33, 25, 1009, '[{\"service_name\":\"Out Of Fuel\",\"service_price\":\"300\"},{\"service_name\":\"Service Cost for Pickup\",\"service_price\":\"250\"}]', '550.0', '13-05-2020', 1),
(17, 12, 25, 25, 1010, '[{\"service_name\":\"Engine Service\",\"service_price\":\"1520\"},{\"service_name\":\"Oil Service\",\"service_price\":\"750\"},{\"service_name\":\"Service cost\",\"service_price\":\"150\"}]', '2420.0', '13-05-2020', 1),
(15, 26, 34, 29, 1005, '[{\"service_name\":\"puncture\",\"service_price\":\"100\"},{\"service_name\":\"Out Of Fuel\",\"service_price\":\"100\"},{\"service_name\":\"Oil Service\",\"service_price\":\"40\"},{\"service_name\":\"Bike Spare\",\"service_price\":\"200\"},{\"service_name\":\"extra\",\"service_price\":\"500\"}]', '940.0', '13-05-2020', 1),
(14, 26, 34, 29, 1004, '[{\"service_name\":\"Bike Painting\",\"service_price\":\"100\"},{\"service_name\":\"General Service\",\"service_price\":\"100\"},{\"service_name\":\"Bike Wash\",\"service_price\":\"100\"},{\"service_name\":\"Electric Work\",\"service_price\":\"100\"}]', '400.0', '13-05-2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `msg` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `date`, `title`, `msg`, `link`, `image`) VALUES
(1, 'Apr-13-2020 10:47:58', 'nnotoficaton1', 'asdcasd', 'http://themeforest.net', 'http://vbinfotech.website/khushboo/bike_service/images/10239_mpl_landing-BG_landscape.png'),
(3, 'Apr-19-2020 01:08:24', 'Bike Services Near you', 'Good to see you here. You can now service your bike Easy and affordable manner Near you', 'http://vbinfotech.website/khushboo/bike_service/images/10239_mpl_landing-BG_landscape.png', 'http://vbinfotech.website/khushboo/bike_service/images/96535_scooter-yamaha-motor-company-motorcycle-sport-bike-logo-png-favpng-9wU9FgDi931z9VauvFtKaHMHt.jpg'),
(4, 'Apr-26-2020 06:16:33', 'Stay home ! Stay Safe ', 'Have Safety day', 'https://nvshq.org/wp-content/uploads/2020/04/stayhomesafely-1024x899.jpg', 'http://vbinfotech.website/khushboo/bike_service/images/61882_3D9ABC8C-9629-476F-B199-AD3646A1210D.png'),
(5, 'May-15-2020 12:57:08', 'Find the Best Services for your Bike Nearby', 'Having difficulties in finding the Best services for your favorite Bike . Here we are to find the best categorized Services for all your Bike needs.  ', 'http://vbinfotech.website/khushboo/bike_service/images/10239_mpl_landing-BG_landscape.png', 'http://vbinfotech.website/khushboo/bike_service/images/21941_service-bikes.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_post_type` int(11) NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_spec` varchar(255) NOT NULL,
  `s_banner_image` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_lat` varchar(255) NOT NULL,
  `s_long` varchar(255) NOT NULL,
  `s_postal_code` varchar(255) NOT NULL,
  `s_adderss` varchar(255) NOT NULL,
  `s_phone` varchar(255) NOT NULL,
  `s_description` text NOT NULL,
  `s_o_time` varchar(50) NOT NULL,
  `s_c_time` varchar(50) NOT NULL,
  `s_token` text NOT NULL,
  `s_type` int(11) NOT NULL,
  `s_puncture` int(11) NOT NULL,
  `s_breakdown` int(11) NOT NULL,
  `s_outoffuel` int(11) NOT NULL,
  `s_engineservices` int(11) NOT NULL,
  `s_oilservice` int(11) NOT NULL,
  `s_bikespares` int(11) NOT NULL,
  `s_bikepainting` int(11) NOT NULL,
  `s_generalservice` int(11) NOT NULL,
  `s_bikewashpolish` int(11) NOT NULL,
  `s_electricwork` int(11) NOT NULL,
  `s_stickering` int(11) NOT NULL,
  `s_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`s_id`, `s_name`, `s_post_type`, `s_image`, `s_spec`, `s_banner_image`, `s_email`, `s_password`, `s_lat`, `s_long`, `s_postal_code`, `s_adderss`, `s_phone`, `s_description`, `s_o_time`, `s_c_time`, `s_token`, `s_type`, `s_puncture`, `s_breakdown`, `s_outoffuel`, `s_engineservices`, `s_oilservice`, `s_bikespares`, `s_bikepainting`, `s_generalservice`, `s_bikewashpolish`, `s_electricwork`, `s_stickering`, `s_status`) VALUES
(1, 'services 1', 0, '52007_', 'Honda, Yamaha', '83296_', 'services1@gmail.com', 'service1', '2000000000000000000', '1000000000000', '123456', 'aaaaaaaaaaaaaaaaa', '789456123', 'xcvxcv ', '6 PM', '7 PM', 'ctu_2U7MRJKxlVlFepwDT0:APA91bE54sh7cAlVNWEG2yCwZfEI-xs186OYEUix_KYD0p-l20-Tf22ktolWhBVgvaaHsbCT8JbQRd_fBD96ULTZ5ElMi6-BkusqN_sL_f01MBawmkmEfMuLbiT4XYFiNRfdBpF9ZrgU', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1),
(2, 'jay', 1, '99136_Education.jpg', 'Honda, Yamaha', '40352_Attitude.jpg', 'jay@gmail.com', 'jay', '91.54151', '64.5414515', '4523', 'sdvfbgbnefdsedfgzsedf', '7895462', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3 PM', '4 PM', 'xfvx6d5vzdvS', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1),
(3, 'zscsc', 2, '52731_1587731185867.png', 'Honda, Yamaha', '35067_1587731151840.png', 'scscsc@gmail.com', 'test3', '21.51561', '72.65165', '231', 'zsdczscz', '1111111111', 'dcdc', '6 PM', '7 PM', 'ctu_2U7MRJKxlVlFepwDT0:APA91bE54sh7cAlVNWEG2yCwZfEI-xs186OYEUix_KYD0p-l20-Tf22ktolWhBVgvaaHsbCT8JbQRd_fBD96ULTZ5ElMi6-BkusqN_sL_f01MBawmkmEfMuLbiT4XYFiNRfdBpF9ZrgU', 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1),
(4, 'test 2', 0, '69781_Koala.jpg', 'Honda, Yamaha', '40352_Attitude.jpg', 'test2@gmail.com', 'test2', '21.15639029999999', '72.87305839999999', '394210', 'FIORA HYPERMARKET LTD, REGENT PLAZZA,DHARSHON DEVELOPER, SOCIETY, opp. RAMI PARK, Guru Ram Pavan Bhumi, Adajan Gam, Dindoli, Surat, Gujarat 394210, India', '789456123', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '', 'dNgLHKORR9CSKUMeRqE5h-:APA91bFdw19sApXa_TKQgVz8CkY_iqJqr9Yjrovu8gcuJXaxOxPP61TcobSYooOjSUjpasctewHb3Dor-5fStjjJgnSxGxQQpQtVPf7T6lxfqvInwMm0QEOUVTQVASEZlBddNPRek-aP', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(5, 'test 3', 1, '74818_Koala.jpg', 'Honda, Yamaha,bullet,honda1,bullet1', '40352_Attitude.jpg', 'test3@gmail.com', 'test3', '21.1854997', '72.79503729999999', '395009', '401, Hazira Rd, opp Star Bazar, Jalaram Society, Adajan Gam, Adajan, Surat, Gujarat 395009, India', '9632258741', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8 AM', '9 PM', 'ctu_2U7MRJKxlVlFepwDT0:APA91bE54sh7cAlVNWEG2yCwZfEI-xs186OYEUix_KYD0p-l20-Tf22ktolWhBVgvaaHsbCT8JbQRd_fBD96ULTZ5ElMi6-BkusqN_sL_f01MBawmkmEfMuLbiT4XYFiNRfdBpF9ZrgU', 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(6, 'test 4 ', 2, '8472_Koala.jpg', 'Honda, Yamaha', '40352_Attitude.jpg', 'test4@gmail.com', 'test4', '21.1848192', '72.7917489', '395009', 'Hazira Rd, opp. Fish Aquirum, Adajan Gam, Adajan, Surat, Gujarat 395009, India', '963251547', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8 AM', '9 PM', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(7, 'test 5', 0, '11121_', 'Honda, Yamaha', '40352_Attitude.jpg', 'test5@gmail.com', 'test5', '21.146022', '73.2491613', '361315', 'Madhi, Gujarat 361315, India', '45154156', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8 AM', '9 PM', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(8, 'test 6', 1, '38307_', 'Honda, Yamaha', '40352_Attitude.jpg', 'test6@gmail.com', 'test6', '21.1835947', '72.7808704', '395009', 'Pal Hazira Road, Pal Rd, opp. Annapurna Temple, Adajan Gam, Adajan, Surat, Gujarat 395009, India', '89623213', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8 AM', '9 PM', 'fvAha0HxR4-D9pfjIoM26s:APA91bFt-sRza58TSNt5i-KJQYRYAckWJ_hiraZmhv_HLXgaN2zJr3thm_5hO-mRPIRJ9quHbAQ1BsgO0omMetWzkcekue6RoScmsIeswJEXcTm777936IOHVvN32UA-szsm4e-rHd0m', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(9, 'test 6', 2, '13918_Education.jpg', 'Honda, Yamaha', '15293_Attitude.jpg', 'jay@gmail.com', 'jay', '31.54151', '2.54154', '4523', 'sdvfbgbnefdsedfgzsedf', '7895462', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3 PM', '4 PM', 'xfvx6d5vzdvS', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(10, 'test 7', 0, '3178_Education.jpg', 'Honda, Yamaha', '40352_Attitude.jpg', 'jay@gmail.com', 'jay', '31.54151', '2.54154', '4523', 'sdvfbgbnefdsedfgzsedf', '7895462', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '3 PM', '4 PM', 'xfvx6d5vzdvS', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1),
(12, 'GK Automobile Services', 1, '95239_1588585636916.png', 'honda', '14033_1588585636916.png', 'thanikachalambe@gmail.com', 'Thanik123', '22.354878', '70.866504', '0', 'Kadambathur Rd, Kadambathur, Tamil Nadu 631203, India', '9789565237', 'Test Services. nearvby smmammamMzk', '9:00 AM', '9:00 PM', 'evLJASeTRI6iiU6S13wNNt:APA91bG-vgLq7TpImiij6S98XuKF18Na-D0unqUqT6aS3J7H1Fc_zjxscgm8JyDm8e9oDdlh8Ue-UkQQ2Y7ZmC_8YY07yDfwPK4WG7PZIp3V2TThejYnl_5U9wD_mgqC6UWjPgFGcpuy', 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(13, 'service15', 0, '', 'Honda, Yamaha', '', 'service15@gmail.com', 'service15', '0', '0', '0', '', '', '', '', '', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(14, 'asd', 0, '', 'Honda, Yamaha', '', 'asd@gmail.com', '123456', '0', '0', '0', '', '', '', '', '', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(15, 'service14', 0, '91527_Happiness - Copy.jpg', 'Honda, Yamaha', '48830_Friendship.jpg', 'service14@gmail.com', 'service14', '0', '0', '0', '', '55555555555', 'djhscbjSDcjkDJKSDjksdncjnsdcjnsdkjcnsdjkcnsdjkcsjkdcnsdjkcnkjdcnsdcns', '8:00 AM', '10:30 PM', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(16, 'hsh', 0, '70774_1587540904204.png', 'Honda, Yamaha', '24320_1587540904204.png', 'jsj@gmail.com', 'asd', '0', '0', '0', '', '9776766776', 'hdhdj', '', '', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(17, 's1', 0, '52909_1587541362273.png', 'Honda, Yamaha', '53976_1587541362273.png', 'hja@gmail.com', 'qwe', '0', '0', '0', '', '9896886686', 'Hu snsjsj', '8:0', '7:0', '', 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(20, 'service14', 0, '5383_Happiness - Copy.jpg', 'Honda, Yamaha', '31455_Friendship.jpg', 'service14@gmail.com', '', '21.4242', '2414412412', '123456', 'rgdrgdrgdgdrgdgdgdrgdrgdgdrgdrgtt', '55555555555', 'djhscbjSDcjkDJKSDjksdncjnsdcjnsdkjcnsdjkcnsdjkcsjkdcnsdjkcnkjdcnsdcns', '8:00 AM', '10:30 PM', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(21, 'shoppy', 0, '70924_1587725054118.png', 'Honda, Yamaha', '13551_1587725054118.png', 'sp@gmail.com', '', '23.692616541983426', '75.29622104018927', '457118', 'Jaora - Tal Rd, Mindli, Madhya Pradesh 457118, India', '9767376767', 'jssikss', '6:0', '6:13', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(22, 'eeeee', 0, '93277_1587726576228.png', 'Honda, Yamaha', '516_1587726576228.png', 'ee@gmail.com', '', '21.21257260176686', '72.78488986194132', '395005', '115, Bank of India Staff Society, Sima Nagar, Surat, Gujarat 395005, India', '9767373676', 'bzjxksks', '6:30', '7:39', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(23, 'abc', 0, '62178_', 'Honda, Yamaha', '83385_', 'abc@gmail.com', '', '23.1667043', '72.58095', '360003', 'Adalaj, Gujarat, India', '9099686960', 'vjcjci', '18:35', '1:49', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(24, 'Suvaa', 0, '74384_', 'Honda, Yamaha', '26973_', 'gsjssn', '', '13.101711197887447', '79.85989277687057', '631203', 'Unnamed Road, Venmanambudur, Tamil Nadu 631203, India', '46686', 'zhnsns', '22:40', '10:40', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(26, 'shoppy1', 0, '57843_1587962015218.png', 'Honda, Yamaha', '24514_1587962015218.png', 'shoppy1@gmail.com', 'qwe123', '21.196748751901367', '72.79224548488855', '395009', '41, Chatrapati Shivaji Marg, Bungalow Society, Akshar Dham Society, Adajan, Surat, Gujarat 395009, India', '9876737676', 'vxhxjzxom xjxixkxkx', '6:30 AM', '7:30 PM', 'ctu_2U7MRJKxlVlFepwDT0:APA91bE54sh7cAlVNWEG2yCwZfEI-xs186OYEUix_KYD0p-l20-Tf22ktolWhBVgvaaHsbCT8JbQRd_fBD96ULTZ5ElMi6-BkusqN_sL_f01MBawmkmEfMuLbiT4XYFiNRfdBpF9ZrgU', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(27, 'arpit tailor', 0, '30250_1588070781201.png', 'Honda, Yamaha', '21609_1588070781201.png', 'tailorarpit104@gmail.com', 'qwe1234', '21.1865788206241', '72.86718875169755', '395012', '104, Parvat Patiya, Surat, Gujarat 395012, India', '7567005767', 'resting sks eisb e9eje e dortt r9ri.r roeid. eoenen..', '16:16 AM', '4:16 PM', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(28, 'VR Motor Servicing', 0, '14664_', 'Honda, Yamaha', '95356_', 'thanan', '123456', '13.1162033', '79.9121261', '602001', 'Periyakuppam, Tamil Nadu 602001, India', '6445', 'We are doing good services for kind of Two wheelers\r\n\r\n- Oil change services \r\n- Complete Engine overhauling \r\n- Bike Modifications\r\n- Puncture works\r\n - Emergency services \r\n- Fuel Injector Cleaning\r\n- Fork and Shock observer Services \r\n\r\nplease contact for any kind of services for your  Bike', '9:30 AM', '9:00 PM', '', 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(29, 'shop', 0, '67803_1588153375624.png', 'Honda, Yamaha', '89851_1588153375624.png', 'b@gmail.com', 'qqq123', '21.196748751901367', '72.79224548488855', '395009', '41, Chatrapati Shivaji Marg, Bungalow Society, Akshar Dham Society, Adajan, Surat, Gujarat 395009, India', '7779677673', 'jdkdc cjcic. ci of cco oocd dkxoxocc jkfkdkfkdknffkf kddodkckxcnckc ckcofkfkfc fkfkfkfkfc ckfodkdl', '6:30 AM', '6:15 PM', '', 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0),
(30, 'testshop', 0, '52996_', 'Honda, Yamaha', '9756_', 'shop@gmail.com', 'qwe123', '21.196748751901367', '72.79224548488855', '395009', '41, Chatrapati Shivaji Marg, Bungalow Society, Akshar Dham Society, Adajan, Surat, Gujarat 395009, India', '9767376797', 'hdjdid xjxkxx cjxlxkdkf ddjdjdkdd djdjdkdnnfgnfnfcjckc cfkfkfkcncnfc ckckfkf fkfoddkd ffkvkccmckvkvkvkvv ckfkfkccnck kvkckvfofo. kvo lfl k kvkfkfnfjvn k kkvvkvkvkvkvkk k fkfkkv k k k k k k kvk kvnkdkfk k k k k vk kckckfodosnfi o o', '6:0 AM', '7:00 PM', '', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(31, 'Karur Minnt', 0, '90231_1588585878124.png', 'Honda, Yamaha', '26952_1588585878124.png', 'grandscapindia@gmail.com', 'SuvaA137', '13.145156452225605', '79.88992877304554', '602001', 'Tiruvallur-Uthukottai Rd, Veera Raghva Nagar, Thiruvallur, Tamil Nadu 602001, India', '9789565237', 'We are Service expert fo r all kind of Bikes ', '9:15 AM', '7:20 PM', 'eIg7o-AzQuiE3BB5HtQSoL:APA91bGbL76nxveRGjrRfP3zyCLSa0tmR-DUopKcFTSjvSCNcq01cKc7ORGU-QUUmL_sTZ4DsU7f8-pAuMXMAHk_BoQq9ZTXyLbYyGWaQEPnjBDkhUSr7dHdKmTtpmVTHlJC5gl-DKS3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(32, 'jayaaaaaaaaaaaa', 0, '95027_Education.jpg', 'Honda, Yamaha', '70337_Attitude.jpg', 'jay@gmail.com', 'jayaaa', '31.54151', '2.54154', '4523', 'sdvfbgbnefdsedfgzsedf', '7895462', '', '3 PM', '4 PM', '', 0, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1, 1),
(33, 'jay', 0, '24037_', 'Honda, Yamaha', '26209_', 'jay@gmail.com', 'jay', '31.54151', '2.54154', '4523', 'sdvfbgbnefdsedfgzsedf', '7895462', '', '3 PM', '4 PM', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(34, 's1', 0, '75829_1589270010142.png', 'Honda, Yamaha', '51621_1589270010142.png', 's@gmail.com', 'qwe123', '0', '0', '0', '', '9673737676', 'vxhxis', '6:30 AM', '7:30 PM', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 'shoopy', 0, '85898_1589275980887.png', 'Honda, Yamaha', '8872_1589275980887.png', 'shoopy@gmail.com', 'qwe123', '21.14527608008832', '72.84410633146763', '394221', 'ANNAPURNA INDUSTRY 210/B, Pandesara, Udhna, Surat, Gujarat 394221, India', '9767373464', 'vdjdidsodds', '6:30 AM', '6:35 PM', 'ctu_2U7MRJKxlVlFepwDT0:APA91bE54sh7cAlVNWEG2yCwZfEI-xs186OYEUix_KYD0p-l20-Tf22ktolWhBVgvaaHsbCT8JbQRd_fBD96ULTZ5ElMi6-BkusqN_sL_f01MBawmkmEfMuLbiT4XYFiNRfdBpF9ZrgU', 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1),
(36, 'Test Service 1', 1, '89062_aeps.png', 'Honda, Yamaha', '26795_mobile_banner.png', 'thanikachalambe@gmail.com', '123456', '13.098910', '79.861412', '631203', 'No.4/121, Mahatma Gandhi Nagar, Kadambathur', '09789565237', 'Test Service details \r\nTest Service details \r\nTest Service details Test Service details Test Service details \r\nTest Service details Test Service details Test Service details Test Service details ', '9:00 AM', '8:01 PM', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `onesignal_app_id` text NOT NULL,
  `onesignal_rest_key` text NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_author` varchar(255) NOT NULL,
  `app_contact` varchar(255) NOT NULL,
  `app_website` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `api_all_order_by` varchar(255) NOT NULL,
  `api_latest_limit` int(3) NOT NULL,
  `api_cat_order_by` varchar(255) NOT NULL,
  `api_cat_post_order_by` varchar(255) NOT NULL,
  `publisher_id` text NOT NULL,
  `interstital_ad` text NOT NULL,
  `interstital_ad_id` text NOT NULL,
  `interstital_ad_click` varchar(255) NOT NULL,
  `banner_ad` text NOT NULL,
  `banner_ad_id` text NOT NULL,
  `native_ad_id` varchar(255) NOT NULL,
  `publisher_id_ios` varchar(500) NOT NULL,
  `app_id_ios` varchar(500) NOT NULL,
  `interstital_ad_ios` varchar(500) NOT NULL,
  `interstital_ad_id_ios` varchar(500) NOT NULL,
  `interstital_ad_click_ios` varchar(500) NOT NULL,
  `banner_ad_ios` varchar(500) NOT NULL,
  `banner_ad_id_ios` varchar(500) NOT NULL,
  `native_ad_id_ios` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `email_from`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `native_ad_id`, `publisher_id_ios`, `app_id_ios`, `interstital_ad_ios`, `interstital_ad_id_ios`, `interstital_ad_click_ios`, `banner_ad_ios`, `banner_ad_id_ios`, `native_ad_id_ios`) VALUES
(1, 'bikeserivce@gmail.com', 'c6ce3d22-66b6-4e9d-96de-1c4a52779070', 'M2JhMGMzZjItYTE2OS00YzA3LWJhMmItNmEyOTlhNDE5NDMy', 'FortySix', '0F8BFF28-68B6-4278-92D4-317A9B300B1B.jpeg', 'bike_service', '1.0', 'Aavus Technologies', '+91 90876 92837', 'bike_service', '<p>bike_service</p>\r\n', 'Aavus Technologies', '<p><strong>We are committed to protecting your privacy</strong></p>\n\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\n\n<p><strong>Information Collected</strong></p>\n\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\n\n<p><strong>Information Use</strong></p>\n\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\n\n<p><strong>Cookies</strong></p>\n\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\n\n<p><strong>Disclosing Information</strong></p>\n\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\n\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\n\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\n\n<p><strong>Changes to this Policy</strong></p>\n\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\n\n<p><strong>Contacting Us</strong></p>\n\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\n', 'ASC', 15, 'cid', 'DESC', '2096905823943315', 'true', '2887875904580143_2887877791246621', '4', 'true', '2887875904580143_2893749237326143', '2887875904580143_3108839169150481', 'pub-', '', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-6736820514271711/5507792689', 'ca-app-pub-3940256099942544/2247696110');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialist`
--

CREATE TABLE `tbl_specialist` (
  `st_id` int(11) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `st_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_specialist`
--

INSERT INTO `tbl_specialist` (`st_id`, `st_name`, `st_status`) VALUES
(9, 'KTM', 1),
(10, 'Kawasaki', 1),
(5, 'Yamaha', 1),
(6, 'Honda', 1),
(7, 'Hero', 1),
(8, 'Royal Enfield', 1),
(11, 'Bajaj', 1),
(12, 'Tvs', 1),
(13, 'Suzuki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `login_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) NOT NULL,
  `confirm_code` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `login_type`, `name`, `email`, `imageurl`, `password`, `phone`, `device_id`, `confirm_code`, `token`, `status`) VALUES
(24, 1, 'Khushboo Tailoraa', 'khushbootailor111@gmail.com', '20691_1587647921723.png', 'abc', '9099686960', '732c0aa993f57a35', 0, 'f8gKaILqueE:APA91bHVWGEWJDtFq55i1HH19remj9vicaIa4q8OlaMN6ityo6sN8HDMuuZ3tu05OYMVzE1ao05NeYN7esVHLTUTUs0F3isl5RkhicZFNVshsjJLinmuQMgKOUOs26I_8WyoHScrNMRe', '1'),
(25, 3, 'Thanikachalam k', 'thanikachalambe@gmail.com', '', '', '9789565237', '8b0b771e58ae15f7', 5510, 'cqwdzbBom1o:APA91bHvP0XVv8M555rL2BjWvj7U-s43M855wO50xRcinwvFYk9CIJ4iLqcIqrYVKjO-hDhbuxQ8cLOUlSyusMXm6QzM0mwtgzXEidKw5B5UdSMQQnpVOlrSX70SN0IIOQrRgpYKErkV', '1'),
(28, 3, 'vonod chowdary', 'aaditya1030@gmail.com', '', '', '9700011800', '72ef7126709f2011', 1566, 'f6VCSBJfRzQ:APA91bFLyacnpFvaXuJ5c6T_-rf84p2ehkLIIZ2MB44l4hHF3uVQH9qsRgecTkOW5PQXWJA-vqC0DN3ElDwEnq7cAzhnntBRNQ75PC_oNwK2oYelf4jX1WomZhpDlnPh_OtzWqK2Db-M', '1'),
(29, 3, 'vabz oza', 'vabz@gmail.com', '', '', '8980503022', '022ac4a5943bcffe', 3718, 'ftBvXrGA-Os:APA91bEoKxun63pVZqzRVy8iowE3cSUa3znvHdg1nqDNPUZScsU48bczn77lTi3nQ_uE1cSLoGAz7IZXF0iN5wu7zLYy3Bxuq2A1EFvWtpKCT_dEgjN8GESL1J0kqyLfulSEu5sRnN3F', '1'),
(30, 2, 'Daniel Danu Reddy', 'dhanu7284@gmail.com', '', '', '8712224933', '0620ac26063e91c9', 0, 'cRcBNuSxrPk:APA91bEUdfhlX1cliqst6v4jtp03oT_321ljlsJkfJ7hcLpnVR2rxS_WPVdu8NiXAAXUgnaDQwkkrkbwsXhJeumdR67MS29_Vz7zJ76Tko_TvDoo_iFhnrG2RpzMHfJQNdSbyjCsBSgh', '1'),
(31, 3, 'khush', 'khushasd@gmail.com', '', '', '7567005767', 'ef56sef', 3046, '54sdsdsdcs5d4csdc', '0'),
(32, 1, 'Sid Tailor', 'sidt3158@gmail.com', '', '', '9876543210', '2ba92122bcef1bb3', 0, 'fvXuBE0ArXg:APA91bHiHdqkA_5xDi28YOY_frp0GUrUtIGNXLI8N3lN5hc0j9275t5D5Qd0Pmbe4gMQNL3OYXjus_il8UP9Q1HD20Fx81LKYNCMik8M_--GeEmx-mF6IVss-wb3W4jpkk0sx1uQZ6T5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adminpanel`
--
ALTER TABLE `tbl_adminpanel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_bike`
--
ALTER TABLE `tbl_bike`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `tbl_bikebrand`
--
ALTER TABLE `tbl_bikebrand`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `tbl_bikename`
--
ALTER TABLE `tbl_bikename`
  ADD PRIMARY KEY (`bn_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`bog_id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_inquiryform`
--
ALTER TABLE `tbl_inquiryform`
  ADD PRIMARY KEY (`if_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_specialist`
--
ALTER TABLE `tbl_specialist`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_adminpanel`
--
ALTER TABLE `tbl_adminpanel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bike`
--
ALTER TABLE `tbl_bike`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_bikebrand`
--
ALTER TABLE `tbl_bikebrand`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bikename`
--
ALTER TABLE `tbl_bikename`
  MODIFY `bn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `bog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `tbl_inquiryform`
--
ALTER TABLE `tbl_inquiryform`
  MODIFY `if_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_specialist`
--
ALTER TABLE `tbl_specialist`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
