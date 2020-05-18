-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2020 at 01:43 PM
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
-- Database: `vbinfggt_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adderss`
--

CREATE TABLE `tbl_adderss` (
  `a_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `a_type` varchar(100) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_number` varchar(20) NOT NULL,
  `a_houser_no` varchar(20) NOT NULL,
  `a_lendmark` varchar(40) NOT NULL,
  `a_adderss` varchar(255) NOT NULL,
  `a_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adderss`
--

INSERT INTO `tbl_adderss` (`a_id`, `user_id`, `city_id`, `area_id`, `a_type`, `a_name`, `a_number`, `a_houser_no`, `a_lendmark`, `a_adderss`, `a_status`) VALUES
(7, 10, 2, 8, '1', 'Chris ', '0707963013', '2', 's', 'Unnamed Road, Nairobi, Kenya', 1),
(8, 10, 2, 3, '1', 'Chris ', '0707963013', '3E', 'BP', 'Next To BP Petrostation, Naivasha Rd, Nairobi, Kenya', 1),
(16, 0, 1, 4, '1', 'abcd', '8200609986', 'abcdbjs nsksks', 'abccdddd', 'Subham Residency, Behind Marvela Mall, Hazira - Adajan Rd, Adajan Gam, Surat, Gujarat 395009, India', 1),
(19, 1, 1, 6, '2', 'Tailor Khushboo', '7878103028', '101', 'Millers Road', 'Cantonment Railway Quarters, Shivaji Nager , Bengaluru Karnataka 560051, India', 1),
(24, 7, 4, 6, '1', 'hcjdj', '6868686868', 'ddljdjd', 'hdhdhdj', '3, Umra Gam, Athwa, Surat, Gujarat 395007, India', 1),
(25, 7, 4, 6, '1', 'abcd', '9797989898', 'ahhd sjkdkd djjdjdj ', 'ajjskkdkd', 'A-27, Umra Gam, Athwa, Surat, Gujarat 395007, India', 1),
(26, 24, 4, 6, '1', 'hdjdjd', '8689898989', 'dbhshdhd', 'dhdhudjd', 'Subham Residency, Behind Marvela Mall, Hazira - Adajan Rd, Adajan Gam, Surat, Gujarat 395009, India', 1),
(27, 22, 4, 6, '1', 'fsghs', '898689959', 'hdhdhdhdh', 'fdhdjdjd', 'Subham Residency, Behind Marvela Mall, Hazira - Adajan Rd, Adajan Gam, Surat, Gujarat 395009, India', 1),
(28, 7, 4, 6, '2', 'Pankaj kumar Mishra', '8299415585', '1234', 'hotel', 'arya nagar sitapur', 1),
(29, 25, 4, 6, '1', 'Aman', '7310087514', 'vikas Nagar  ', 'near BOI', 'Unnamed Road, Gujarat 360003, India', 1),
(31, 26, 4, 6, '1', 'ravi', '90057575', 'gvh', 'gghh', '162, Shekhupura, Vikas Nagar, Lucknow, Uttar Pradesh 226022, India', 1),
(32, 30, 1, 5, '1', 'pooja', '8200609986', '127 marvella', 'pal rto', 'Subham Residency, Behind Marvela Mall, Hazira - Adajan Rd, Adajan Gam, Surat, Gujarat 395009, India', 1),
(33, 33, 1, 7, '1', 'Amazing pizza', '8299415585', '124', 'water tank k pass', 'Arya nagar', 1),
(34, 34, 1, 1, '1', 'Jaiprakash Dubey', '9918000204', '12/2', 'hgs', '60 fita road, Janki Vihar Colony, Jankipuram, Lucknow, Uttar Pradesh 226001, India', 1),
(35, 36, 1, 27, '1', 'tashvi', '9161144622', '252', 'Army Cant', 'Unnamed Road, Gujarat 360003, India', 1);

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
(1, 'admin', 'admin', 'vbinfotech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `ar_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `ar_name` varchar(100) NOT NULL,
  `a_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`ar_id`, `c_id`, `ar_name`, `a_status`) VALUES
(1, 1, '11 BATALIYAN', 1),
(2, 1, '27 BATALIYAN', 1),
(3, 1, '2ND BATALIYAN', 1),
(4, 1, 'ADARSH NAGAR', 1),
(5, 1, 'ALAM NAGAR', 1),
(6, 1, 'ANAND NAGAR', 1),
(7, 1, 'ARYA NAGAR', 1),
(8, 1, 'AWAS VIKAS A', 1),
(9, 1, 'AWAS VIKAS B', 1),
(10, 1, 'AWAS VIKAS C', 1),
(11, 1, 'BRAHMPURI', 1),
(12, 1, 'CIVIL LINES', 1),
(13, 1, 'DURGA PURWA', 1),
(14, 1, 'EYE HOSPITAL ROAD', 1),
(15, 1, 'GHANTAGHAR', 1),
(16, 1, 'GHOORAMAU BAGLA', 1),
(17, 1, 'GURUNANAK COLONY', 1),
(18, 1, 'GWAL MANDI', 1),
(19, 1, 'HAPPY HOME', 1),
(20, 1, 'HOLI NAGAR', 1),
(21, 1, 'HUSAIN GANJ', 1),
(22, 1, 'JAIL ROAD', 1),
(23, 1, 'KAJIYARA', 1),
(24, 1, 'KASHIRAM COLONY', 1),
(25, 1, 'KESHAV GREEN CITY', 1),
(26, 1, 'KHAIRABAD', 1),
(27, 1, 'LAL BAGH', 1),
(28, 1, 'LOHAR BAGH', 1),
(29, 1, 'MISHRA COLONY', 1),
(30, 1, 'MUNSHI GANJ', 1),
(31, 1, 'NAI BASTI', 1),
(32, 1, 'NAIMISH PURAM', 1),
(33, 1, 'NEPALA PUR', 1),
(34, 1, 'POLICE LINE', 1),
(35, 1, 'PREM NAGAR', 1),
(36, 1, 'ROTI GODAM', 1),
(37, 1, 'SADAR', 1),
(38, 1, 'SHASTRI NAGAR', 1),
(39, 1, 'SHIVPURI', 1),
(40, 1, 'SHUBHAS NAGAR', 1),
(41, 1, 'SUDAMA PURI', 1),
(42, 1, 'TAREEN PUR', 1),
(43, 1, 'VIJAY LAXMI NAGAR', 1),
(44, 1, 'VIKAS NAGAR', 1),
(45, 1, 'KHOOBPUR', 1),
(46, 1, 'NARAYAN NAGAR', 1),
(47, 1, 'CHUNGI', 1),
(48, 1, 'BUTS GANJ', 1),
(49, 1, 'LMP BYPASS', 1),
(50, 6, 'B C M HOSPITAL', 1),
(51, 6, 'AWADH COLONY', 1),
(52, 6, 'KATRA', 1),
(53, 6, 'NAI BAZAR', 1),
(54, 6, 'PURANI BAZAR', 1),
(55, 6, 'QASBATI TOLA', 1),
(56, 6, 'MAHENDRI TOLA', 1),
(57, 6, 'MASWASI TOLA', 1),
(58, 6, 'BAZDARI TOLA', 1),
(59, 6, 'KISHANI TOLA', 1),
(60, 6, 'JOSHI TOLA', 1),
(61, 6, 'BAKSHARIYA TOLA', 1),
(62, 6, 'SHAIKH SARAI', 1),
(63, 6, 'KAMAL SARAI', 1),
(64, 6, 'CHILAY  SARAI', 1),
(65, 6, 'MIYA SARAI', 1),
(66, 6, 'KULHAAN SARAI', 1),
(67, 6, 'LALIYAPUR', 1),
(68, 6, 'ARJUNPUR', 1),
(69, 6, 'BHULANPUR', 1),
(70, 6, 'MAKHUPUR', 1),
(71, 6, 'SHUJAULPUR', 1),
(72, 6, 'KAJIYARA', 1),
(73, 6, 'KALA PIYADA', 1),
(74, 6, 'HATURA', 1),
(75, 6, 'TURKPATTI', 1),
(76, 6, 'NAI BASTI', 1),
(77, 6, 'KAREEM NAGAR', 1),
(78, 6, 'I T O OFFICE', 1),
(79, 6, 'LUCKNOW CHUNGI', 1),
(80, 6, 'LEHERPUR CHUNGI', 1),
(81, 6, 'PANWADIYA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `b_id` int(11) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`b_id`, `b_image`, `b_status`) VALUES
(10, '84966_offer-1..jpg', 1),
(11, '80771_offer-2.1.jpg', 1),
(12, '73639_offer-3.1.jpg', 1),
(13, '72022_offer-4.1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner2`
--

CREATE TABLE `tbl_banner2` (
  `b_id` int(11) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner2`
--

INSERT INTO `tbl_banner2` (`b_id`, `b_image`, `b_status`) VALUES
(1, '83636_promo_banner.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `c_id` int(11) NOT NULL,
  `c_order` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`c_id`, `c_order`, `c_name`, `c_image`, `c_status`) VALUES
(1, 7, 'Beverages', '46520_group.jpg', 1),
(2, 6, 'Side order', '36178_paneer-burger.png', 1),
(3, 1, 'Pizza Mania', '62371_pizza_mania.jpg', 1),
(4, 5, 'Veg Feast', '11798_Premium Pizza.jpg', 1),
(5, 4, 'Veg Special', '49425_Green Mexicana.jpg', 1),
(15, 3, 'Veg Treat', '1240_Fresh Veggie.jpg', 1),
(16, 2, 'Simply veg', '69271_Cheese  & Corn.jpg', 1),
(17, 8, 'Meals and Combos', '74934_Meals and Combos.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheez`
--

CREATE TABLE `tbl_cheez` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_reg_price` varchar(50) NOT NULL,
  `c_mid_price` varchar(50) NOT NULL,
  `c_lar_price` varchar(50) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cheez`
--

INSERT INTO `tbl_cheez` (`c_id`, `c_name`, `c_reg_price`, `c_mid_price`, `c_lar_price`, `c_image`, `c_status`) VALUES
(1, 'cheese_price', '15', '30', '60', '51730_Koala.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`c_id`, `c_name`, `c_status`) VALUES
(1, 'Sitapur', 1),
(6, 'Khairabad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crust`
--

CREATE TABLE `tbl_crust` (
  `cid` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_reg_price` varchar(100) NOT NULL,
  `c_mid_price` varchar(50) NOT NULL,
  `c_lar_price` varchar(50) NOT NULL,
  `c_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_crust`
--

INSERT INTO `tbl_crust` (`cid`, `c_name`, `c_image`, `c_reg_price`, `c_mid_price`, `c_lar_price`, `c_status`) VALUES
(2, 'Thin Crust', '90307_Desert.jpg', '20', '40', '0', 1),
(3, 'Cheese Burst', '47615_Koala.jpg', '65', '85', '0', 1),
(4, 'Fresh pan', '15549_Penguins.jpg', '10', '30', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `f_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_star` varchar(50) NOT NULL,
  `f_cat` varchar(255) NOT NULL,
  `f_desc` varchar(255) NOT NULL,
  `f_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`f_id`, `user_id`, `f_star`, `f_cat`, `f_desc`, `f_status`) VALUES
(1, 1, '1', 'this', 'is a testing ', 1),
(2, 1, '1', 'this', 'is a testing ', 1),
(3, 30, '4', 'MENU', 'good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `tittle`, `date`, `msg`, `image`) VALUES
(1, 'this is test', 'Jan-01-2020 11:47:12', 'wefhSDJKN,sjdc', 'http://vbinfotech.website/khushboo/pizza/images/6581_Hangover.jpg'),
(2, 'hello', 'Jan-01-2020 11:56:14', 'hello hello', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `order_details` text NOT NULL,
  `a_id` int(11) NOT NULL,
  `o_cdate` varchar(100) NOT NULL,
  `o_date` varchar(50) NOT NULL,
  `o_time` varchar(100) NOT NULL,
  `ori_amount` varchar(100) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `dis_amount` varchar(100) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `o_type` int(11) NOT NULL,
  `o_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `user_id`, `pro_id`, `order_details`, `a_id`, `o_cdate`, `o_date`, `o_time`, `ori_amount`, `p_price`, `dis_amount`, `payment_type`, `payment_id`, `o_type`, `o_status`) VALUES
(5, 30, 2, '[{\"cat\":\"5\",\"product\":\"120\",\"qunt\":\"4\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"499\"},{\"cat\":\"5\",\"product\":\"119\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Regular\",\"price\":\"210\"}]', 32, '10-01-2020 16:20:27', '10-01-2020', '04:20', '2206.0', '199', '2007', '1', '0', 1, 1),
(6, 30, 1, '[{\"cat\":\"5\",\"product\":\"119\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Regular\",\"price\":\"210\"},{\"cat\":\"5\",\"product\":\"120\",\"qunt\":\"4\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"499\"}]', 32, '10-01-2020 16:21:54', '10-01-2020', '04:21', '2206.0', '499', '1707', '1', '0', 1, 1),
(7, 30, 1, '[{\"cat\":\"3\",\"product\":\"101\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"199\"},{\"cat\":\"15\",\"product\":\"115\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"460\"},{\"cat\":\"15\",\"product\":\"116\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"460\"},{\"cat\":\"15\",\"product\":\"117\",\"qunt\":\"1\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"460\"}]', 32, '10-01-2020 16:23:58', '10-01-2020', '04:23', '1579.0', '460', '1119', '1', '0', 1, 1),
(8, 30, 2, '[{\"cat\":\"5\",\"product\":\"120\",\"qunt\":\"2\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"499\"},{\"cat\":\"5\",\"product\":\"121\",\"qunt\":\"2\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Large\",\"price\":\"499\"}]', 32, '10-01-2020 16:25:51', '10-01-2020', '04:25', '1996.0', '199', '1797', '1', '0', 1, 1),
(9, 30, 0, '[{\"cat\":\"5\",\"product\":\"120\",\"qunt\":\"4\",\"crust\":\"\",\"toppings\":\"\",\"cheez\":\"No\",\"size\":\"Regular\",\"price\":\"210\"}]', 32, '10-01-2020 16:30:43', '10-01-2020', '04:30', '840.0', '0', '840', '1', '0', 1, 1),
(10, 27, 0, '[ { \"cat\":\"16\", \"product\":\"24\",\"qunt\":\"1\",\"crust\":\"4\",\"toppings\":\"9\",\"cheez\":\"yes\",\"size\":\"regular\"}]', 1, '13-01-2020 17:28:56', '18-12-2019', '15:44', '10', '0', '0', '1', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_dec` varchar(255) NOT NULL,
  `p_reg_price` varchar(11) NOT NULL,
  `p_med_price` varchar(11) NOT NULL,
  `p_lar_price` varchar(100) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_featured` int(11) NOT NULL,
  `p_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `c_id`, `p_name`, `p_dec`, `p_reg_price`, `p_med_price`, `p_lar_price`, `p_image`, `p_featured`, `p_status`) VALUES
(74, 1, '600ml Maza', '', '35', '0', '0', '89108_maza.jpg', 0, 1),
(75, 1, '750ml Thumbsup', '', '40', '0', '0', '58092_thumps_up.jpg', 0, 1),
(101, 3, 'Single Topping Tometo', 'Single topping tomato pizza', '59', '150', '199', '83682_single-topping-tometo-pizaa.jpg', 0, 1),
(102, 3, 'Single Topping Onion', 'Single topping onion pizza', '69', '150', '199', '60782_Single-Topping-Onion.jpg', 0, 1),
(103, 3, 'Single Topping Corn', 'Single topping sweet corn pizza', '79', '150', '199', '32963_Single_Topping_Corn.jpg', 0, 1),
(104, 3, 'Single Topping Capsicum', 'Single topping capsicum pizza', '79', '150', '199', '1807_Capsicum.jpg', 0, 1),
(105, 3, 'Double Topping Onion & Capsicum', 'Double topping onion & capsicum pizza', '99', '170', '229', '56929_onion-capsicums.jpg', 0, 1),
(106, 3, 'Double Topping Corn & Tomato', 'Double topping corn & tomato pizza', '99', '170', '299', '32963_Single_Topping_Corn.jpg', 0, 1),
(107, 3, 'Double Topping Onion & Paneer', 'Double topping onion & paneer pizza', '99', '170', '229', '79282_Paneer &  Onion.jpg', 0, 1),
(108, 3, 'Double Topping Jalapeno & Mashrom', 'Double topping jalapeno & mushrooms pizza', '99', '170', '299', '40933_Double-Topping-Jalapeno-Mashrom.jpg', 0, 1),
(109, 3, 'Veg Loaded', 'Veg delight - onion , capsicum , grilled mashroom ...', '130', '199', '249', '76877_Veg Loaded.jpg', 0, 1),
(110, 3, 'Spicy Pizza', 'Red & Yellow Bell Pepper', '110', '189', '239', '49503_Spicy-Chiles-Pizza.jpg', 0, 1),
(111, 16, 'African Peri- Peri', 'grill Bell papper & Black Olives With Peri-peri Souce', '205', '385', '595', '75075_African Peri-Peri.jpg', 1, 1),
(112, 16, 'Double Cheese Margherita', 'loaded with extra cheese', '140', '260', '399', '72582_Cheese Margherita.jpg', 0, 1),
(113, 16, 'Cheese & Corn', 'Loaded With extra Cheese With Sweet Corn', '140', '260', '399', '96291_Cheese  & Corn.jpg', 0, 1),
(114, 16, 'Cheese & Tomato', 'Loaded With Extra Cheese With Tomato Topping', '140', '260', '399', '99101_Cheese  & Tomato.jpg', 1, 1),
(115, 15, 'Paneer & Onion', 'Cheese Paneer Onion', '170', '320', '460', '97333_Paneer &  Onion.jpg', 1, 1),
(116, 15, 'Italiano Pizza', 'R& Y, Jalapeno ,Onion', '170', '320', '460', '32666_Italliano pizza.jpg', 0, 1),
(117, 15, 'Fresh Veggie', 'Onion , Capsicum', '170', '320', '460', '78946_Fresh Veggie.jpg', 0, 1),
(118, 15, 'County Special', 'Onion , Capsicum & Tomato', '170', '320', '460', '84553_Country Special.jpg', 0, 1),
(119, 5, 'Farmhouse', 'Onion, Capsicum , Tomato With Mushroom', '210', '370', '499', '65304_Farmhouse.jpg', 0, 1),
(120, 5, 'Paneer Makhani', 'Paneer,Capsicum With Makhani Souce', '210', '370', '499', '41185_Paneer Makhani.jpg', 0, 1),
(121, 5, 'Green Maxicana', 'Onion, Capsicum & Tomato & Jalapeno Sprikled With Maxican Herbs', '210', '370', '499', '6696_Green Mexicana.jpg', 1, 1),
(122, 5, 'Papper Paneer', 'paneer, capsicum & Red Paprika', '210', '370', '499', '47672_pepicano_pizza.jpg', 0, 1),
(123, 5, 'Special Paradise', 'Golden com, Black Olives, Capsicum & Red Paprika', '210', '370', '499', '37535_Special Paradise.jpg', 0, 1),
(124, 4, 'Veggie Deluxe', 'Onion , Capsicum , Mushroom , Golden Corn , Paneer', '220', '410', '560', '53062_Veggie Delux.jpg', 0, 1),
(125, 4, 'Spicy 5 Pepper Pizza', 'Capsicum & Red Papper, Jalapeno , Yellow & Red Bell Pepper', '220', '410', '560', '8695_Spicy 5 Pepper Pizza.jpg', 0, 1),
(126, 4, 'Amazing Pizza', 'Onion, Capsicum , Tomato , Mashroom Corn & Jalapeno Black Olives', '220', '410', '560', '10407_Amazing Pizza.jpg', 0, 1),
(127, 4, 'Premium Pizza', 'Capsicum , Tomato , Mushroom , Paneer , Red Pepper, Black Olives', '220', '410', '560', '79011_Premium Pizza.jpg', 1, 1),
(128, 2, 'Chocolava', 'chocolate cake is a popular dessert that combines the elements of a flourless chocolate cake and a soufflé.', '70', '0', '0', '74569_chocolava.jpg', 1, 1),
(129, 2, 'Nutty Chocolava', 'A hot chocolate volcano cake which erupts in a delicious explosion, causing tasty, molten chocolate magma to ooze out, and makes you lick the spoon and your fingers afterwards..!', '90', '0', '0', '64438_Nutty Chocolava.jpg', 0, 1),
(130, 2, 'Garlic Bread', 'Garlic bread (also called garlic toast) consists of bread (usually a baguette or sour dough like a ciabatta), topped with garlic and olive oil or butter and may include additional herbs, such as oregano or chives.', '49', '0', '0', '1951_garlic_bread.jpg', 0, 1),
(131, 2, 'Stuff Garlic Bread', 'Garlic bread (also called garlic toast) consists of bread (usually a baguette or sour dough like a ciabatta), topped with garlic and olive oil or butter and may include additional herbs, such as oregano or chives.', '120', '0', '0', '49953_Stuff Garlic Bread.jpg', 1, 1),
(132, 2, 'Cheese Garlic Bread', 'Garlic bread (also called garlic toast) consists of bread (usually a baguette or sour dough like a ciabatta), topped with garlic and olive oil or butter and may include additional herbs, such as oregano or chives.', '80', '0', '0', '30724_garlic_bread.jpg', 0, 1),
(133, 2, 'Italiano Pasta ', ' Italy is famous for its pasta. Depending on the region, Italian pasta can be thin or fat, long or short, curly or straight. ', '99', '0', '0', '25649_itailiano pasta.jpg', 0, 1),
(134, 2, 'Paneer Cheese Pasta', 'Paneer, Cheese ,Pasta', '120', '0', '0', '32939_italiano _pasta.jpg', 0, 1),
(135, 2, 'Calzone pocket', 'carrot, beans, capsicum, onion, sweet corn, and olives.', '99', '0', '0', '50019_pocket.jpg', 0, 1),
(136, 2, 'Veg Burger', 'carrot, beans, capsicum, onion, sweet corn, and olives.', '49', '0', '0', '81149_Veg Burger.jfif', 0, 1),
(137, 2, 'Cheese Burger', 'carrot, beans, capsicum, onion, sweet corn, and olives.', '65', '0', '0', '3494_cheese burger.jpg', 0, 1),
(138, 2, 'Panner Burger', 'carrot, beans, capsicum, onion, sweet corn, and olives.', '70', '0', '0', '66148_paneer-burger.png', 0, 1),
(139, 1, '750ml Coke', '750ml', '40', '0', '0', '68330_Coke-1.jpg', 0, 1),
(140, 1, '750ml Sprite', '750ml', '40', '0', '0', '51390_Sprite.jpg', 0, 1),
(141, 1, '750ml Fanta ', ' Fanta is the soft drink that intensifies fun.', '50', '0', '0', '22964_Fanta.jpg', 0, 1),
(142, 1, 'Diet Coke', 'carrot, beans, capsicum, onion, sweet corn, and olives.', '70', '0', '0', '53517_Diet-Coke.jpg', 0, 1),
(143, 1, 'Coke cane', 'Be it Club soda, Pepsi, Diet Coke or red bull, You name it we have it. ', '33', '0', '0', '59728_Coke.jpg', 0, 1),
(145, 17, 'Combo for 1 ', 'Single Topping Corn Pizza + 1 Coke ', '99', '0', '0', '5625_offer-1..jpg', 0, 1),
(146, 17, 'Combo for 2', 'Onion and Capsicum Pizza + Onion and Paneer Double toppings Pizza + 1 Coke ', '199', '0', '0', '30254_offer-2.1.jpg', 0, 1),
(147, 17, 'Small Family Combo Combo 1 ', 'Paneer and Onion Medium Pizza + Veg burger', '299', '0', '0', '81052_offer-3.1.jpg', 0, 1),
(148, 17, 'Large Family Combo 2', 'Medium African Peri Peri + Medium Veggie Deluxe   Pizza + Pasta + 2 Coke  ', '799', '0', '0', '78888_offer-4.1.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_desc` text NOT NULL,
  `p_tandc` text NOT NULL,
  `p_start_date` varchar(50) NOT NULL,
  `p_end_date` varchar(50) NOT NULL,
  `min_price` varchar(50) NOT NULL,
  `p_discount` varchar(10) NOT NULL,
  `p_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promocode`
--

INSERT INTO `tbl_promocode` (`p_id`, `p_name`, `p_desc`, `p_tandc`, `p_start_date`, `p_end_date`, `min_price`, `p_discount`, `p_status`) VALUES
(1, 'BUT1GET1', '<p>Download Amazing Pizza App & Avail Offer-“BUY 1 GET 1 FREE PIZZA.</p>\r\n', '<p>Offer is applicable only for Medium/Large size Pizza of any category of Amazing Pizza excluding Pizza Mania(Single & Double Topping Pizzas)  & Side Orders.</p>\r\n', '2019-12-11', '2019-12-28', '200', '50', 1),
(2, 'PARTY', '<p>Celebrate Your Birthday Party/Kitty/Wedding Anniversary/Any Other Party at Amazing Pizza Restaurant & Get Flat 20% Discount with No Floor Charge.</p>\r\n', '<p>Offer is applicable only for Medium/Large size Pizza of any category of Amazing Pizza excluding Pizza Mania(Single & Double Topping Pizzas)  & Side Orders.</p>\r\n', '2019-12-18', '2019-12-26', '500', '10', 1),
(3, 'FLATE20', '<p>Offer is applicable Only on Order amount above 1000 Rs</p>\r\n', '<p>Offer is applicable only for Medium/Large size Pizza of any category of Amazing Pizza excluding Pizza Mania(Single & Double Topping Pizzas)  & Side Orders.</p>\r\n', '2019-12-10', '2019-12-27', '1000', '20', 1),
(4, 'MINUS100', '<p>On minimum order of 399</p>\r\n', '<p>On minimum order of 399</p>\r\n', '2020-01-08', '2020-01-29', '399', '101', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `confirm_code` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`id`, `f_name`, `l_name`, `password`, `mobile`, `email`, `image`, `confirm_code`, `status`) VALUES
(1, 'khush', 'tailor', 'khush', '9099686960', 'khush@gmail.com', '', 0, 1),
(2, 'jayaaa', 'tayloraa', 'jay', '7878103028999', 'jay@gmail.comaaaa', '27789_Jellyfish.jpg', 0, 1),
(7, 'haj', 'gaha', '123456', '9641111111', 'asd@gmail.com', '71402_1574946427562.png', 0, 1),
(10, 'Christopher ', 'Waweru ', 'evolution', '0707963013', 'krissaykristal@gmail.com', '', 0, 1),
(11, 'khush', 'tailor', 'khush', '9099686960', 'khush@gmail.comaa', '', 0, 1),
(13, 'ravi', 'karma', '123456', '9975026961', 'ravikarma2020@gmail.com', '', 0, 1),
(25, 'Aman', 'Awasthi', '12345', '7310087514', 'awasthiaman19@gmail.com', '', 4484, 1),
(26, 'ravi', 'verma', 'ravi', '9005757575', 'raviverma6@gmail.com', '', 7087, 0),
(27, 'tailor', 'arpit', 'abcd', '7567005767', 'tailorarpit104@gmail.com', '', 2980, 0),
(30, 'pooja', 'pach ', 'abc', '8200609986', '', '', 6055, 1),
(31, 'Shweta', 'singh', '54321', '8707865842', '', '', 7810, 1),
(32, 'shipra', 'dixit', '12345', '7007615124', '', '', 7755, 1),
(33, 'Pankaj', 'Mishra', 'pankaj@1', '8299415585', 'pankajmishrapanchhi@gmail.com', '', 5930, 1),
(34, 'Jaiprakash Narayan', 'Dubey', 'target@2025', '9918000204', 'jaiprkashdubey88@gmail.com', '', 1081, 1),
(35, 'ravi', 'erma', 'ravi', '9005757575', '', '', 7118, 1),
(36, 'Tashvi', 'Pandey', '12345', '9161144622', '', '', 3390, 1),
(37, 'rgregg', 'hgersghe', '1234', '7777991598', 'tailorarpit104@gmail.com', '', 2990, 0),
(38, 'aryan ', 'dixz', 'hardoi@123', '7007554842', 'ishudaddy686@gmail.com', '', 6480, 1);

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
  `publisher_id_ios` varchar(500) NOT NULL,
  `app_id_ios` varchar(500) NOT NULL,
  `interstital_ad_ios` varchar(500) NOT NULL,
  `interstital_ad_id_ios` varchar(500) NOT NULL,
  `interstital_ad_click_ios` varchar(500) NOT NULL,
  `banner_ad_ios` varchar(500) NOT NULL,
  `banner_ad_id_ios` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `email_from`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `publisher_id_ios`, `app_id_ios`, `interstital_ad_ios`, `interstital_ad_id_ios`, `interstital_ad_click_ios`, `banner_ad_ios`, `banner_ad_id_ios`) VALUES
(1, 'Vbinfotechinfo@gmail.in', 'def822fe-2f0f-4dcb-b24f-db7fc07dbc18', 'YTFhMzhlMGYtNzhjMS00MjA5LTllZDUtOTJlZjZlNjE3OWM2', 'Amazing Pizza', 'logo.png', 'vbinfotech@gmail.com', '1.0.0', 'Vbinfotech', '+91 922 7777 522', 'http://www.vbinfotech.co.in/', '<p>This Application is best application for Video, User can play their favourite videos through applications.</p>\r\n\r\n<ul>\r\n	<li>Easy to play video</li>\r\n	<li>Great UI</li>\r\n	<li>You can set video to favourite list</li>\r\n	<li>Userfriendly</li>\r\n</ul>\r\n\r\n<p>AllInOneVideo Application is designed and developed by Viavi Webtech (INDIA), for more Applications contact viaviwebtech@gmail.com</p>\r\n\r\n<p>Website: www.viaviweb.com</p>\r\n\r\n<p>We also develop custom applications, if you need any kind of custom application contact us on given Email or Contact No.</p>\r\n\r\n<p><strong>Email:</strong> viaviwebtech@gmail.com<br />\r\n<strong>WhatsApp:</strong> +919227777522<br />\r\n<strong>Website:</strong> www.viaviweb.com</p>\r\n', 'Vbinfotech', '<p><strong>1.Order Delivery-</strong></p>\r\n\r\n<p>Delivery Orders are subjected to:</p>\r\n\r\n<p>i.Your address falling in the defined delivery area of the nearest restaurant.</p>\r\n\r\n<p>ii.Availability of the restaurant online.</p>\r\n\r\n<p>iii.Free Home Delivery&nbsp; applicable for Min. amount of 200 Rs.Your order must have at least 1 pizza(excluding Pizza Mania) or the minimum bill must be Rs. 200/- or more (inclusive of taxes for delivery)</p>\r\n\r\n<p>iv.For any order below 200 Rs delivery charges&nbsp; 20 Rs will be&nbsp; added.</p>\r\n\r\n<p><strong>2.Menu-</strong></p>\r\n\r\n<p>i.In case certain menu items are not listed in the menu page , the particular restaurant does not carry those items in the menu.</p>\r\n\r\n<p>ii.In case of non-availability of the ordered product at the particular restaurant , the order would not be executed. Same would be be informed by the restaurant near you.</p>\r\n\r\n<p>iii.Drinks (750 ml) shall be available at the discounted rate of Rs. 40 solely with the Pizza Mania Range( Single &amp; Double Topping Pizzas).</p>\r\n\r\n<p><strong>3.Coupons-</strong></p>\r\n\r\n<p>Only Amazing Pizza authorised e-coupons shall be applicable for the online order</p>\r\n\r\n<p>i.The complete code has to be punched in the coupon section for availing the coupon.</p>\r\n\r\n<p>ii.The coupon code is not case sensitive.</p>\r\n\r\n<p>iii.Thecoupn may not work if the conditions defined in the coupon details are not fulfilled in the order.</p>\r\n\r\n<p>iv.Amazing Pizza holds the right to accept or reject any coupon without giving any reason whatsoever.</p>\r\n\r\n<p>v.The coupons are valid for specified period only and will not be accepted after the expiry of the validity period.</p>\r\n\r\n<p>vi.Couponscan not be clubbed with any other offer/scheme.</p>\r\n\r\n<p>vii. Coupons are not applicable on Margarita pizza, Beverages and Pizza Mania Range(Single &amp; Double Topping Pizzas).</p>\r\n\r\n<p>viii.Only one coupon is valid per user.</p>\r\n\r\n<p><strong>4.Modify/Cancel the Online Order-</strong></p>\r\n\r\n<p>i.The online order once placed cannot be modified or cancelled via any digital medium.</p>\r\n\r\n<p>ii.You can get updates on the status of the order by calling the restaurant directly.</p>\r\n\r\n<p>iii.In case the order which is paid through digital payment method is cancelled due to non-availability&nbsp; of the ordered product at the restaurant, the amount will be refund by reversing the transaction by Amazing Pizza Restaurant. This refund will be returned on the actual source within 5 to 7 working days.</p>\r\n\r\n<p>However, Amazing Pizza is not responsible for any delay on the bank side.</p>\r\n\r\n<p><strong>5.BirthDay Party/Kitty/Other Parties Or Celebrations-</strong></p>\r\n\r\n<p>For Birthday or any other Celebration at Amazing Pizza Restaurant our Offer -20% Flat Discount with No Floor Charge includes-</p>\r\n\r\n<p>i.Offer is not applicable for&nbsp; Pizza Mania(Single &amp; Double topping Pizzas) , Side Orders &amp; Beverages.</p>\r\n\r\n<p>ii.No outside Food allowed at Amazing Pizza Restaurant.</p>\r\n', 'ASC', 15, 'category_name', 'DESC', 'pub-9456493320432553', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544/6300978111', 'pub-9456493320432553', 'ca-app-pub-8356404931736973~1544820074', 'true', 'ca-app-pub-3940256099942544/4411468910', '5', 'true', 'ca-app-pub-3940256099942544/2934735716');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toppings`
--

CREATE TABLE `tbl_toppings` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_image` varchar(255) NOT NULL,
  `t_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toppings`
--

INSERT INTO `tbl_toppings` (`t_id`, `t_name`, `t_image`, `t_status`) VALUES
(9, 'Paneer', '33912_panner.jpg', 1),
(2, 'Onion', '76689_onion.jpg', 1),
(3, 'Capsicum', '38296_capsicum.jpg', 1),
(4, 'Tomato', '7334_tometo.jpg', 1),
(5, 'Mushroom', '76674_mushroom.jpg', 1),
(6, 'Sweet Corn', '85769_sweet_corn.jpg', 1),
(7, 'Red Paprika & Jalapeno', '42061_red_peprika.jpg', 1),
(8, 'Black Olives ', '55507_black_olive.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toppings_price`
--

CREATE TABLE `tbl_toppings_price` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_reg_price` varchar(50) NOT NULL,
  `t_mid_price` varchar(50) NOT NULL,
  `t_lar_price` varchar(50) NOT NULL,
  `t_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_toppings_price`
--

INSERT INTO `tbl_toppings_price` (`t_id`, `t_name`, `t_reg_price`, `t_mid_price`, `t_lar_price`, `t_status`) VALUES
(1, 'topping_price', '20', '40', '80', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adderss`
--
ALTER TABLE `tbl_adderss`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_banner2`
--
ALTER TABLE `tbl_banner2`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_cheez`
--
ALTER TABLE `tbl_cheez`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_crust`
--
ALTER TABLE `tbl_crust`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_toppings`
--
ALTER TABLE `tbl_toppings`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_toppings_price`
--
ALTER TABLE `tbl_toppings_price`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adderss`
--
ALTER TABLE `tbl_adderss`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_banner2`
--
ALTER TABLE `tbl_banner2`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_cheez`
--
ALTER TABLE `tbl_cheez`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_crust`
--
ALTER TABLE `tbl_crust`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_toppings`
--
ALTER TABLE `tbl_toppings`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_toppings_price`
--
ALTER TABLE `tbl_toppings_price`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
