-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2019 at 11:17 PM
-- Server version: 5.6.46-cll-lve
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
-- Database: `game_new`
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
(1, 'admin', 'admin', 'vbinfotech@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bat`
--

CREATE TABLE `tbl_bat` (
  `b_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `b_type` varchar(50) NOT NULL,
  `b_option` varchar(11) NOT NULL,
  `b_digit` varchar(11) NOT NULL,
  `b_points` varchar(11) NOT NULL,
  `b_date` varchar(20) NOT NULL,
  `b_time` varchar(255) NOT NULL,
  `b_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bat`
--

INSERT INTO `tbl_bat` (`b_id`, `m_id`, `user_id`, `b_type`, `b_option`, `b_digit`, `b_points`, `b_date`, `b_time`, `b_status`) VALUES
(3, 11, 9, '4', '1', '200', '10', '2019-12-07', '17:09:19', 1),
(4, 11, 9, '3', '2', '679', '10', '2019-12-07', '17:26:55', 1),
(5, 11, 12, '1', '1', '1', '20', '2019-12-07', '18:45:58', 1),
(6, 11, 12, '5', '1', '888', '70', '2019-12-07', '20:47:23', 1),
(7, 11, 13, '1', '2', '1', '20', '2019-12-09', '11:53:28', 1),
(8, 11, 14, '1', '2', '7', '10', '2019-12-09', '11:54:16', 1),
(9, 14, 13, '1', '1', '6', '5', '2019-12-09', '11:54:19', 1),
(10, 14, 13, '2', '1', '63', '10', '2019-12-09', '11:54:32', 1),
(11, 14, 14, '1', '2', '9', '15', '2019-12-09', '11:55:36', 1),
(12, 14, 13, '3', '1', '123', '5', '2019-12-09', '11:55:51', 1),
(13, 14, 13, '4', '1', '122', '5', '2019-12-09', '11:56:00', 1),
(14, 15, 14, '2', '1', '13', '5', '2019-12-09', '11:56:09', 1),
(15, 14, 13, '5', '1', '111', '5', '2019-12-09', '11:56:17', 1),
(16, 15, 13, '4', '1', '233', '10', '2019-12-09', '11:57:26', 1),
(17, 16, 14, '3', '1', '123', '10', '2019-12-09', '11:58:03', 1),
(18, 15, 13, '1', '1', '5', '10', '2019-12-09', '11:58:09', 1),
(19, 15, 13, '5', '1', '222', '5', '2019-12-09', '11:58:27', 1),
(20, 11, 13, '1', '2', '3', '10', '2019-12-09', '11:59:46', 1),
(21, 17, 14, '4', '1', '344', '5', '2019-12-09', '12:00:47', 1),
(22, 11, 13, '4', '2', '233', '10', '2019-12-09', '12:01:01', 1),
(23, 23, 14, '5', '1', '333', '5', '2019-12-09', '12:02:50', 1),
(24, 11, 13, '4', '2', '244', '5', '2019-12-09', '12:09:12', 1),
(25, 11, 13, '4', '2', '133', '5', '2019-12-09', '12:09:32', 1),
(26, 14, 14, '1', '2', '4', '5', '2019-12-09', '13:01:30', 1),
(27, 14, 14, '1', '2', '4', '5', '2019-12-09', '13:01:31', 1),
(28, 14, 14, '1', '1', '6', '5', '2019-12-09', '13:02:23', 1),
(29, 14, 14, '1', '1', '6', '5', '2019-12-09', '13:02:25', 1),
(30, 14, 14, '1', '2', '3', '5', '2019-12-09', '13:09:42', 1),
(31, 14, 13, '1', '2', '1', '1', '2019-12-09', '13:09:51', 1),
(32, 14, 13, '1', '1', '2', '2', '2019-12-09', '13:09:59', 1),
(33, 14, 12, '2', '1', '20', '2', '2019-12-09', '13:10:09', 1),
(34, 14, 14, '1', '2', '2', '10', '2019-12-09', '13:10:15', 1),
(35, 14, 14, '1', '2', '2', '10', '2019-12-09', '13:10:16', 1),
(36, 14, 14, '1', '2', '2', '10', '2019-12-09', '13:10:17', 1),
(37, 14, 14, '1', '2', '6', '5', '2019-12-09', '13:11:02', 1),
(38, 14, 14, '1', '2', '6', '5', '2019-12-09', '13:11:03', 1),
(39, 14, 13, '2', '1', '99', '2', '2019-12-09', '13:11:22', 1),
(40, 14, 13, '1', '2', '3', '3', '2019-12-09', '13:11:42', 1),
(41, 14, 13, '1', '1', '4', '4', '2019-12-09', '13:11:49', 1),
(42, 14, 13, '1', '1', '5', '10', '2019-12-09', '13:11:56', 1),
(43, 14, 13, '1', '1', '6', '10', '2019-12-09', '13:12:05', 1),
(44, 14, 14, '1', '2', '7', '5', '2019-12-09', '13:13:04', 1),
(45, 14, 14, '1', '2', '7', '5', '2019-12-09', '13:13:05', 1),
(46, 14, 14, '1', '2', '7', '5', '2019-12-09', '13:13:06', 1),
(47, 14, 13, '1', '2', '7', '10', '2019-12-09', '13:13:08', 1),
(48, 14, 13, '1', '2', '8', '20', '2019-12-09', '13:13:23', 1),
(49, 14, 13, '1', '1', '9', '20', '2019-12-09', '13:13:31', 1),
(50, 14, 13, '2', '1', '93', '10', '2019-12-09', '13:14:28', 1),
(51, 14, 14, '2', '1', '91', '5', '2019-12-09', '13:15:22', 1),
(52, 14, 14, '2', '1', '91', '5', '2019-12-09', '13:15:24', 1),
(53, 14, 14, '2', '1', '91', '5', '2019-12-09', '13:15:30', 1),
(54, 14, 13, '2', '1', '91', '10', '2019-12-09', '13:15:33', 1),
(55, 14, 13, '2', '1', '92', '15', '2019-12-09', '13:15:42', 1),
(56, 14, 14, '2', '1', '93', '5', '2019-12-09', '13:15:43', 1),
(57, 14, 13, '2', '1', '94', '20', '2019-12-09', '13:15:51', 1),
(58, 14, 14, '2', '1', '95', '5', '2019-12-09', '13:15:59', 1),
(59, 14, 13, '2', '1', '95', '25', '2019-12-09', '13:16:01', 1),
(60, 14, 13, '2', '1', '96', '30', '2019-12-09', '13:16:12', 1),
(61, 14, 13, '2', '1', '97', '35', '2019-12-09', '13:16:21', 1),
(62, 14, 13, '2', '1', '98', '40', '2019-12-09', '13:16:31', 1),
(63, 14, 13, '2', '1', '99', '40', '2019-12-09', '13:16:42', 1),
(64, 14, 14, '2', '1', '98', '4', '2019-12-09', '13:16:42', 1),
(65, 14, 14, '2', '1', '99', '10', '2019-12-09', '13:17:02', 1),
(66, 14, 12, '2', '1', '30', '30', '2019-12-09', '13:17:48', 1),
(67, 14, 14, '2', '1', '92', '10', '2019-12-09', '13:18:02', 1),
(68, 14, 14, '2', '1', '94', '10', '2019-12-09', '13:18:53', 1),
(69, 14, 13, '3', '1', '147', '10', '2019-12-09', '13:19:46', 1),
(70, 14, 13, '3', '1', '146', '23', '2019-12-09', '13:20:28', 1),
(71, 14, 14, '2', '1', '97', '10', '2019-12-09', '13:20:44', 1),
(72, 26, 11, '1', '1', '5', '1', '2019-12-09', '13:38:50', 1),
(73, 15, 14, '2', '1', '82', '5', '2019-12-09', '15:24:11', 1),
(74, 15, 14, '2', '1', '89', '5', '2019-12-09', '15:24:22', 1),
(75, 15, 14, '2', '1', '83', '5', '2019-12-09', '15:24:31', 1),
(76, 15, 14, '2', '1', '85', '5', '2019-12-09', '15:24:39', 1),
(77, 15, 14, '2', '1', '86', '5', '2019-12-09', '15:24:49', 1),
(78, 24, 9, '2', '1', '10', '10', '2019-12-09', '17:46:04', 1),
(79, 24, 9, '2', '1', '10', '10', '2019-12-09', '17:46:07', 1),
(80, 15, 11, '2', '1', '51', '1', '2019-12-09', '17:49:54', 1),
(81, 11, 9, '2', '1', '10', '10', '2019-12-09', '18:16:31', 1),
(82, 16, 14, '2', '1', '86', '5', '2019-12-09', '18:17:25', 1),
(83, 16, 14, '2', '1', '83', '5', '2019-12-09', '18:17:34', 1),
(84, 16, 14, '2', '1', '87', '5', '2019-12-09', '18:17:51', 1),
(85, 16, 14, '2', '1', '84', '5', '2019-12-09', '18:19:00', 1),
(86, 16, 14, '2', '1', '82', '5', '2019-12-09', '18:19:24', 1),
(87, 17, 14, '2', '1', '56', '5', '2019-12-09', '18:19:46', 1),
(88, 17, 14, '2', '1', '53', '5', '2019-12-09', '18:20:00', 1),
(89, 17, 14, '2', '1', '59', '5', '2019-12-09', '18:20:10', 1),
(90, 17, 14, '2', '1', '57', '5', '2019-12-09', '18:20:21', 1),
(91, 17, 14, '2', '1', '51', '5', '2019-12-09', '18:20:31', 1),
(92, 23, 14, '2', '1', '46', '5', '2019-12-09', '18:20:51', 1),
(93, 23, 14, '2', '1', '49', '5', '2019-12-09', '18:21:09', 1),
(94, 23, 14, '2', '1', '41', '5', '2019-12-09', '18:21:21', 1),
(95, 26, 12, '2', '1', '20', '20', '2019-12-10', '01:15:27', 1),
(96, 11, 14, '1', '1', '8', '10', '2019-12-10', '10:20:01', 1),
(97, 11, 14, '1', '2', '3', '10', '2019-12-10', '10:20:15', 1),
(98, 11, 12, '1', '1', '1', '100', '2019-12-10', '10:20:28', 1),
(99, 11, 12, '1', '1', '2', '100', '2019-12-10', '10:20:36', 1),
(100, 11, 12, '1', '1', '3', '100', '2019-12-10', '10:20:44', 1),
(101, 14, 14, '1', '1', '9', '10', '2019-12-10', '10:20:52', 1),
(102, 11, 12, '1', '1', '4', '100', '2019-12-10', '10:20:52', 1),
(103, 11, 12, '1', '1', '5', '100', '2019-12-10', '10:21:03', 1),
(104, 11, 12, '1', '1', '6', '100', '2019-12-10', '10:21:10', 1),
(105, 14, 14, '1', '2', '4', '10', '2019-12-10', '10:21:13', 1),
(106, 11, 12, '1', '1', '7', '100', '2019-12-10', '10:21:16', 1),
(107, 11, 12, '3', '1', '129', '50', '2019-12-10', '10:21:27', 1),
(108, 11, 12, '2', '1', '50', '50', '2019-12-10', '10:21:40', 1),
(109, 11, 12, '2', '1', '10', '50', '2019-12-10', '10:21:48', 1),
(110, 11, 12, '2', '1', '20', '11', '2019-12-10', '10:21:56', 1),
(111, 11, 12, '2', '1', '38', '20', '2019-12-10', '10:22:04', 1),
(112, 11, 12, '2', '1', '55', '42', '2019-12-10', '10:22:15', 1),
(113, 11, 12, '2', '1', '35', '61', '2019-12-10', '10:22:24', 1),
(114, 11, 12, '3', '1', '236', '12', '2019-12-10', '10:22:35', 1),
(115, 11, 12, '3', '1', '678', '12', '2019-12-10', '10:22:48', 1),
(116, 11, 12, '3', '1', '790', '18', '2019-12-10', '10:23:01', 1),
(117, 11, 12, '3', '1', '578', '19', '2019-12-10', '10:23:13', 1),
(118, 11, 12, '4', '1', '119', '20', '2019-12-10', '10:23:23', 1),
(119, 11, 12, '4', '1', '399', '9', '2019-12-10', '10:23:30', 1),
(120, 11, 12, '4', '1', '200', '1', '2019-12-10', '10:23:41', 1),
(121, 11, 12, '4', '1', '229', '200', '2019-12-10', '10:24:00', 1),
(122, 11, 12, '4', '1', '900', '20', '2019-12-10', '10:24:11', 1),
(123, 11, 12, '4', '1', '110', '28', '2019-12-10', '10:24:21', 1),
(124, 11, 12, '4', '1', '255', '29', '2019-12-10', '10:24:28', 1),
(125, 11, 12, '4', '1', '117', '23', '2019-12-10', '10:24:36', 1),
(126, 11, 12, '4', '1', '699', '299', '2019-12-10', '10:24:46', 1),
(127, 14, 12, '1', '1', '2', '200', '2019-12-10', '10:38:21', 1),
(128, 14, 12, '2', '1', '21', '200', '2019-12-10', '10:38:28', 1),
(129, 14, 12, '2', '1', '38', '37', '2019-12-10', '10:38:35', 1),
(130, 14, 12, '1', '1', '9', '30', '2019-12-10', '10:38:40', 1),
(131, 14, 12, '3', '1', '678', '67', '2019-12-10', '10:38:46', 1),
(132, 14, 12, '3', '1', '345', '66', '2019-12-10', '10:39:01', 1),
(133, 14, 12, '4', '1', '660', '27', '2019-12-10', '10:39:07', 1),
(134, 14, 12, '4', '1', '335', '379', '2019-12-10', '10:39:15', 1),
(135, 14, 12, '4', '1', '228', '64', '2019-12-10', '10:39:24', 1),
(136, 14, 12, '4', '1', '900', '30', '2019-12-10', '10:39:30', 1),
(137, 14, 12, '3', '1', '289', '29', '2019-12-10', '10:39:36', 1),
(138, 14, 12, '5', '1', '888', '20', '2019-12-10', '10:39:44', 1),
(139, 14, 12, '4', '1', '699', '20', '2019-12-10', '10:39:51', 1),
(140, 11, 14, '1', '2', '1', '5', '2019-12-10', '11:10:22', 1),
(141, 11, 14, '1', '2', '2', '5', '2019-12-10', '11:10:38', 1),
(142, 11, 14, '1', '2', '3', '5', '2019-12-10', '11:10:45', 1),
(143, 11, 14, '1', '2', '5', '5', '2019-12-10', '11:10:57', 1),
(144, 11, 14, '1', '2', '4', '5', '2019-12-10', '11:11:23', 1),
(145, 11, 14, '1', '2', '6', '5', '2019-12-10', '11:11:31', 1),
(146, 11, 14, '1', '2', '7', '5', '2019-12-10', '11:11:38', 1),
(147, 11, 14, '1', '2', '8', '5', '2019-12-10', '11:11:47', 1),
(148, 11, 14, '1', '2', '9', '5', '2019-12-10', '11:11:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_market`
--

CREATE TABLE `tbl_market` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_date` varchar(20) NOT NULL,
  `m_open_time` varchar(20) NOT NULL,
  `m_close_time` varchar(20) NOT NULL,
  `m_open` varchar(11) NOT NULL,
  `m_close` varchar(11) NOT NULL,
  `m_score` varchar(50) NOT NULL,
  `m_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_market`
--

INSERT INTO `tbl_market` (`m_id`, `m_name`, `m_date`, `m_open_time`, `m_close_time`, `m_open`, `m_close`, `m_score`, `m_status`) VALUES
(11, 'SRIDEVI', '2019-12-10', '10:31:00', '12:15:00', '100', '0', '129-5*-***', 1),
(14, 'TIME BAZAR', '2019-12-10', '10:40:00', '2:0:00', '0', '0', '699-2*-***', 1),
(15, 'MILAN DAY', '2019-12-10', '18:33:00', '20:33:00', '20', '30', '***-**-***', 1),
(16, 'RAJDHANI DAY', '2019-12-10', '3:10:00', '5:10:00', '01', '06', '***-**-***', 1),
(17, 'SUPREME DAY', '2019-12-10', '3:20:00', '5:20:00', '476', '001', '***-**-***', 1),
(23, 'KALYAN', '2019-12-10', '3:35:00', '5:35:00', '111', '222', '***-**-***', 1),
(24, 'SRIDEVI NIGHT', '2019-12-10', '6:50:00', '7:50:00', '', '', '***-**-***', 1),
(25, 'MILAN NIGHT', '2019-12-10', '8:55:00', '11:55:00', '', '', '***-**-***', 1),
(26, 'RAJDHANI NIGHT', '2019-12-10', '9:25:00', '11:50:00', '', '', '***-**-***', 1),
(29, 'MAIN RATAN', '2019-12-10', '09:20:00', '11:55:00', '', '', '***-**-***', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `date`, `msg`, `image`) VALUES
(1, 'Dec,02,2019 12:53:01 PM', 'test', 'http://vbinfotech.website/2019/om_nursing_academy'),
(2, 'Dec-05-2019 10:44:40', 'trest11', 'http://vbinfotech.website/khushboo/game/images/80625_Desert.jpg'),
(3, 'Dec-05-2019 10:52:37', 'example', 'http://vbinfotech.website/khushboo/game/images/5642_Lighthouse.jpg'),
(4, 'Dec-05-2019 11:14:14', 'Heyyyy', 'http://vbinfotech.website/khushboo/game/images/82543_Koala.jpg'),
(5, 'Dec-05-2019 11:14:32', 'zsfcZSdfAS', 'http://vbinfotech.website/khushboo/game/images/73531_Koala.jpg'),
(6, 'Dec-05-2019 11:15:06', 'fdcsjnkxm', 'http://vbinfotech.website/khushboo/game/images/55911_Koala.jpg'),
(7, 'Dec-05-2019 11:15:10', 'fdcsjnkxm', 'http://vbinfotech.website/khushboo/game/images/48372_Koala.jpg'),
(8, 'Dec-09-2019 11:28:10', 'fscdzx', 'http://pmonline.club/game/images/33563_telephone.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_date` varchar(50) NOT NULL,
  `p_time` varchar(255) NOT NULL,
  `p_payment` varchar(100) NOT NULL,
  `p_type` int(11) NOT NULL,
  `p_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`p_id`, `user_id`, `p_date`, `p_time`, `p_payment`, `p_type`, `p_status`) VALUES
(32, 12, '27-11-2019', '', '500', 1, 1),
(31, 12, '27-11-2019', '', '1000', 1, 1),
(30, 11, '26-11-2019', '', '500', 1, 1),
(29, 9, '26-11-2019', '', '100', 1, 1),
(33, 12, '27-11-2019', '', '500', 1, 1),
(34, 12, '27-11-2019', '', '500', 1, 1),
(35, 12, '27-11-2019', '', '500', 2, 1),
(36, 12, '05-12-2019', '', '500', 1, 1),
(37, 12, '05-12-2019', '', '3835', 2, 1),
(38, 12, '05-12-2019', '', '300', 1, 1),
(39, 14, '09-12-2019', '', '500', 1, 1),
(40, 13, '09-12-2019', '', '500', 1, 1),
(41, 9, '09-12-2019', '', '100', 1, 1),
(42, 9, '09-12-2019', '', '20', 1, 1),
(43, 9, '09-12-2019', '16:46:45', '10', 1, 1),
(44, 11, '09-12-2019', '17:51:27', '5000', 1, 1),
(45, 9, '09-12-2019', '18:21:02', '10', 1, 1),
(46, 9, '09-12-2019', '18:21:25', '10', 2, 1),
(47, 14, '10-12-2019', '10:26:33', '20', 1, 1),
(48, 14, '10-12-2019', '10:26:44', '200', 2, 1),
(49, 14, '10-12-2019', '10:29:32', '200', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_redeem`
--

CREATE TABLE `tbl_redeem` (
  `r_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `r_date` varchar(30) NOT NULL,
  `r_type` int(11) NOT NULL,
  `r_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_redeem`
--

INSERT INTO `tbl_redeem` (`r_id`, `m_id`, `r_date`, `r_type`, `r_status`) VALUES
(205, 11, '2019-11-28', 1, 1),
(206, 14, '2019-11-28', 1, 1),
(207, 14, '2019-11-28', 2, 1),
(208, 11, '2019-12-05', 1, 1),
(209, 11, '2019-12-07', 1, 1),
(210, 11, '2019-12-09', 1, 1),
(211, 11, '2019-12-09', 2, 1),
(212, 14, '2019-12-09', 1, 1),
(213, 14, '2019-12-09', 2, 1),
(214, 15, '2019-12-09', 1, 1),
(215, 15, '2019-12-09', 2, 1),
(216, 16, '2019-12-09', 1, 1),
(217, 17, '2019-12-09', 1, 1),
(218, 23, '2019-12-09', 1, 1),
(219, 11, '2019-12-10', 1, 1),
(220, 14, '2019-12-10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `wallet` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone_number`, `password`, `wallet`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 0, 1),
(2, 'jay', 'jay@gmail.com', '9099686960', 'jay', 2, 1),
(3, 'neel', 'neel@gmail.com', '7878103028', 'neel', 0, 1),
(4, 'khush', 'khushboo@gmail.com', '9099686960', 'khush', 2, 1),
(5, 'dhrvin', 'dhrvin@gmail.com', '9099686960', 'dhrvin', 0, 1),
(6, 'khush', 'khush@gmail.com', '909686960', 'khush', 6, 1),
(7, 'khush', 'khush@gmail.com', '909686960', 'khush', 6, 1),
(8, 'khush', 'khush@gmail.com', '909686960', 'khush', 0, 1),
(9, 'abc', 'abc@gmail.com', '1234567890', 'abc', 146, 1),
(10, 'usbsb', 'ehs@ijsjs.sojd', '9937884846', '1234', 236, 1),
(11, 'ravi', 'ravikarma2020@gmail.com', '9975026961', '123456', 5008, 1),
(12, 'Nikhil More', 'nikhilmore320@gmail.com', '7709200431', '645445', 153105, 1),
(13, 'Rushikesh khandagale', 'rushikhandagale1999@gmail.com', '7083287306', '051099', 5186, 1),
(14, 'bhushan harwalkar', 'bhushan96377@gmail.com', '9637758270', 'bhushan7', 1321, 1);

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
(1, 'info@viaviweb.in', '1738ba20-04e8-4519-8698-bdc07c59a668', 'ZDI4ZmUwZDAtMjAwYy00YWZmLWI5MGItZTY0NGI5Njk4NjNl', 'Game App', '512.png', 'info@viaviweb.in', '1.0.0', 'viaviwebtech', '+91 922 7777 522', 'http://www.viaviweb.com/', '<p>This Application is best application for Video, User can play their favourite videos through applications.</p>\r\n\r\n<ul>\r\n	<li>Easy to play video</li>\r\n	<li>Great UI</li>\r\n	<li>You can set video to favourite list</li>\r\n	<li>Userfriendly</li>\r\n</ul>\r\n\r\n<p>AllInOneVideo Application is designed and developed by Viavi Webtech (INDIA), for more Applications contact viaviwebtech@gmail.com</p>\r\n\r\n<p>Website: www.viaviweb.com</p>\r\n\r\n<p>We also develop custom applications, if you need any kind of custom application contact us on given Email or Contact No.</p>\r\n\r\n<p><strong>Email:</strong> viaviwebtech@gmail.com<br />\r\n<strong>WhatsApp:</strong> +919227777522<br />\r\n<strong>Website:</strong> www.viaviweb.com</p>\r\n', 'Viavi Webtech', '<p><strong>We are committed to protecting your privacy</strong></p>\n\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\n\n<p><strong>Information Collected</strong></p>\n\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\n\n<p><strong>Information Use</strong></p>\n\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\n\n<p><strong>Cookies</strong></p>\n\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\n\n<p><strong>Disclosing Information</strong></p>\n\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\n\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\n\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\n\n<p><strong>Changes to this Policy</strong></p>\n\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\n\n<p><strong>Contacting Us</strong></p>\n\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\n', 'ASC', 15, 'category_name', 'DESC', 'pub-9456493320432553', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544/6300978111', 'pub-9456493320432553', 'ca-app-pub-8356404931736973~1544820074', 'true', 'ca-app-pub-3940256099942544/4411468910', '5', 'true', 'ca-app-pub-3940256099942544/2934735716');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `tid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `t_date` varchar(100) NOT NULL,
  `t_time` varchar(255) NOT NULL,
  `t_type` varchar(11) NOT NULL,
  `t_option` varchar(11) NOT NULL,
  `t_digit` varchar(11) NOT NULL,
  `t_wallet` varchar(11) NOT NULL,
  `trace_st` varchar(11) NOT NULL,
  `t_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`tid`, `user_id`, `m_id`, `t_date`, `t_time`, `t_type`, `t_option`, `t_digit`, `t_wallet`, `trace_st`, `t_status`) VALUES
(1, 9, 11, '2019-12-07', '17:09:19', '4', '1', '200', '10', '2', 1),
(2, 9, 11, '2019-12-07', '17:26:55', '3', '2', '679', '10', '2', 1),
(3, 12, 11, '2019-12-07', '18:45:58', '1', '1', '1', '20', '1', 1),
(4, 12, 11, '2019-12-07', '20:47:23', '5', '1', '888', '70', '1', 1),
(5, 13, 11, '2019-12-09', '11:53:28', '1', '2', '1', '20', '1', 1),
(6, 14, 11, '2019-12-09', '11:54:16', '1', '2', '7', '10', '1', 1),
(7, 13, 14, '2019-12-09', '11:54:19', '1', '1', '6', '5', '1', 1),
(8, 13, 14, '2019-12-09', '11:54:32', '2', '1', '63', '10', '1', 1),
(9, 14, 14, '2019-12-09', '11:55:36', '1', '2', '9', '15', '1', 1),
(10, 13, 14, '2019-12-09', '11:55:51', '3', '1', '123', '5', '1', 1),
(11, 13, 14, '2019-12-09', '11:56:00', '4', '1', '122', '5', '1', 1),
(12, 14, 15, '2019-12-09', '11:56:09', '2', '1', '13', '5', '1', 1),
(13, 13, 14, '2019-12-09', '11:56:17', '5', '1', '111', '5', '1', 1),
(14, 13, 15, '2019-12-09', '11:57:26', '4', '1', '233', '10', '1', 1),
(15, 14, 16, '2019-12-09', '11:58:03', '3', '1', '123', '10', '2', 1),
(16, 13, 15, '2019-12-09', '11:58:09', '1', '1', '5', '10', '2', 1),
(17, 13, 15, '2019-12-09', '11:58:27', '5', '1', '222', '5', '1', 1),
(18, 13, 11, '2019-12-09', '11:59:46', '1', '2', '3', '10', '1', 1),
(19, 14, 17, '2019-12-09', '12:00:47', '4', '1', '344', '5', '1', 1),
(20, 13, 11, '2019-12-09', '12:01:01', '4', '2', '233', '10', '1', 1),
(21, 14, 23, '2019-12-09', '12:02:50', '5', '1', '333', '5', '1', 1),
(22, 13, 11, '2019-12-09', '12:09:12', '4', '2', '244', '5', '1', 1),
(23, 13, 11, '2019-12-09', '12:09:32', '4', '2', '133', '5', '1', 1),
(24, 14, 14, '2019-12-09', '13:01:30', '1', '2', '4', '5', '1', 1),
(25, 14, 14, '2019-12-09', '13:01:31', '1', '2', '4', '5', '1', 1),
(26, 14, 14, '2019-12-09', '13:02:23', '1', '1', '6', '5', '1', 1),
(27, 14, 14, '2019-12-09', '13:02:25', '1', '1', '6', '5', '2', 1),
(28, 14, 14, '2019-12-09', '13:09:42', '1', '2', '3', '5', '1', 1),
(29, 13, 14, '2019-12-09', '13:09:51', '1', '2', '1', '1', '1', 1),
(30, 13, 14, '2019-12-09', '13:09:59', '1', '1', '2', '2', '1', 1),
(31, 12, 14, '2019-12-09', '13:10:09', '2', '1', '20', '2', '1', 1),
(32, 14, 14, '2019-12-09', '13:10:15', '1', '2', '2', '10', '1', 1),
(33, 14, 14, '2019-12-09', '13:10:16', '1', '2', '2', '10', '1', 1),
(34, 14, 14, '2019-12-09', '13:10:17', '1', '2', '2', '10', '1', 1),
(35, 14, 14, '2019-12-09', '13:11:02', '1', '2', '6', '5', '1', 1),
(36, 14, 14, '2019-12-09', '13:11:03', '1', '2', '6', '5', '1', 1),
(37, 13, 14, '2019-12-09', '13:11:22', '2', '1', '99', '2', '1', 1),
(38, 13, 14, '2019-12-09', '13:11:42', '1', '2', '3', '3', '1', 1),
(39, 13, 14, '2019-12-09', '13:11:49', '1', '1', '4', '4', '1', 1),
(40, 13, 14, '2019-12-09', '13:11:56', '1', '1', '5', '10', '1', 1),
(41, 13, 14, '2019-12-09', '13:12:05', '1', '1', '6', '10', '1', 1),
(42, 14, 14, '2019-12-09', '13:13:04', '1', '2', '7', '5', '1', 1),
(43, 14, 14, '2019-12-09', '13:13:05', '1', '2', '7', '5', '1', 1),
(44, 14, 14, '2019-12-09', '13:13:06', '1', '2', '7', '5', '1', 1),
(45, 13, 14, '2019-12-09', '13:13:08', '1', '2', '7', '10', '1', 1),
(46, 13, 14, '2019-12-09', '13:13:23', '1', '2', '8', '20', '1', 1),
(47, 13, 14, '2019-12-09', '13:13:31', '1', '1', '9', '20', '1', 1),
(48, 13, 14, '2019-12-09', '13:14:28', '2', '1', '93', '10', '1', 1),
(49, 14, 14, '2019-12-09', '13:15:22', '2', '1', '91', '5', '1', 1),
(50, 14, 14, '2019-12-09', '13:15:24', '2', '1', '91', '5', '1', 1),
(51, 14, 14, '2019-12-09', '13:15:30', '2', '1', '91', '5', '1', 1),
(52, 13, 14, '2019-12-09', '13:15:33', '2', '1', '91', '10', '1', 1),
(53, 13, 14, '2019-12-09', '13:15:42', '2', '1', '92', '15', '1', 1),
(54, 14, 14, '2019-12-09', '13:15:43', '2', '1', '93', '5', '1', 1),
(55, 13, 14, '2019-12-09', '13:15:51', '2', '1', '94', '20', '1', 1),
(56, 14, 14, '2019-12-09', '13:15:59', '2', '1', '95', '5', '1', 1),
(57, 13, 14, '2019-12-09', '13:16:01', '2', '1', '95', '25', '1', 1),
(58, 13, 14, '2019-12-09', '13:16:12', '2', '1', '96', '30', '1', 1),
(59, 13, 14, '2019-12-09', '13:16:21', '2', '1', '97', '35', '1', 1),
(60, 13, 14, '2019-12-09', '13:16:31', '2', '1', '98', '40', '1', 1),
(61, 13, 14, '2019-12-09', '13:16:42', '2', '1', '99', '40', '1', 1),
(62, 14, 14, '2019-12-09', '13:16:42', '2', '1', '98', '4', '1', 1),
(63, 14, 14, '2019-12-09', '13:17:02', '2', '1', '99', '10', '1', 1),
(64, 12, 14, '2019-12-09', '13:17:48', '2', '1', '30', '30', '1', 1),
(65, 14, 14, '2019-12-09', '13:18:02', '2', '1', '92', '10', '1', 1),
(66, 14, 14, '2019-12-09', '13:18:53', '2', '1', '94', '10', '1', 1),
(67, 13, 14, '2019-12-09', '13:19:46', '3', '1', '147', '10', '1', 1),
(68, 13, 14, '2019-12-09', '13:20:28', '3', '1', '146', '23', '1', 1),
(69, 14, 14, '2019-12-09', '13:20:44', '2', '1', '97', '10', '1', 1),
(70, 11, 26, '2019-12-09', '13:38:50', '1', '1', '5', '1', '1', 1),
(71, 14, 15, '2019-12-09', '15:24:11', '2', '1', '82', '5', '1', 1),
(72, 14, 15, '2019-12-09', '15:24:22', '2', '1', '89', '5', '1', 1),
(73, 14, 15, '2019-12-09', '15:24:31', '2', '1', '83', '5', '1', 1),
(74, 14, 15, '2019-12-09', '15:24:39', '2', '1', '85', '5', '1', 1),
(75, 14, 15, '2019-12-09', '15:24:49', '2', '1', '86', '5', '1', 1),
(76, 9, 24, '2019-12-09', '17:46:04', '2', '1', '10', '10', '1', 1),
(77, 9, 24, '2019-12-09', '17:46:07', '2', '1', '10', '10', '1', 1),
(78, 11, 15, '2019-12-09', '17:49:54', '2', '1', '51', '1', '1', 1),
(79, 9, 11, '2019-12-09', '18:16:31', '2', '1', '10', '10', '1', 1),
(80, 14, 16, '2019-12-09', '18:17:25', '2', '1', '86', '5', '1', 1),
(81, 14, 16, '2019-12-09', '18:17:34', '2', '1', '83', '5', '1', 1),
(82, 14, 16, '2019-12-09', '18:17:51', '2', '1', '87', '5', '1', 1),
(83, 14, 16, '2019-12-09', '18:19:00', '2', '1', '84', '5', '1', 1),
(84, 14, 16, '2019-12-09', '18:19:24', '2', '1', '82', '5', '1', 1),
(85, 14, 17, '2019-12-09', '18:19:46', '2', '1', '56', '5', '1', 1),
(86, 14, 17, '2019-12-09', '18:20:00', '2', '1', '53', '5', '1', 1),
(87, 14, 17, '2019-12-09', '18:20:10', '2', '1', '59', '5', '1', 1),
(88, 14, 17, '2019-12-09', '18:20:21', '2', '1', '57', '5', '1', 1),
(89, 14, 17, '2019-12-09', '18:20:31', '2', '1', '51', '5', '1', 1),
(90, 14, 23, '2019-12-09', '18:20:51', '2', '1', '46', '5', '1', 1),
(91, 14, 23, '2019-12-09', '18:21:09', '2', '1', '49', '5', '1', 1),
(92, 14, 23, '2019-12-09', '18:21:21', '2', '1', '41', '5', '1', 1),
(93, 12, 26, '2019-12-10', '01:15:27', '2', '1', '20', '20', '1', 1),
(94, 14, 11, '2019-12-10', '10:20:01', '1', '1', '8', '10', '1', 1),
(95, 14, 11, '2019-12-10', '10:20:15', '1', '2', '3', '10', '1', 1),
(96, 12, 11, '2019-12-10', '10:20:28', '1', '1', '1', '100', '1', 1),
(97, 12, 11, '2019-12-10', '10:20:36', '1', '1', '2', '100', '1', 1),
(98, 12, 11, '2019-12-10', '10:20:44', '1', '1', '3', '100', '1', 1),
(99, 14, 14, '2019-12-10', '10:20:52', '1', '1', '9', '10', '1', 1),
(100, 12, 11, '2019-12-10', '10:20:52', '1', '1', '4', '100', '1', 1),
(101, 12, 11, '2019-12-10', '10:21:03', '1', '1', '5', '100', '1', 1),
(102, 12, 11, '2019-12-10', '10:21:10', '1', '1', '6', '100', '1', 1),
(103, 14, 14, '2019-12-10', '10:21:13', '1', '2', '4', '10', '1', 1),
(104, 12, 11, '2019-12-10', '10:21:16', '1', '1', '7', '100', '1', 1),
(105, 12, 11, '2019-12-10', '10:21:27', '3', '1', '129', '50', '1', 1),
(106, 12, 11, '2019-12-10', '10:21:40', '2', '1', '50', '50', '1', 1),
(107, 12, 11, '2019-12-10', '10:21:48', '2', '1', '10', '50', '1', 1),
(108, 12, 11, '2019-12-10', '10:21:56', '2', '1', '20', '11', '1', 1),
(109, 12, 11, '2019-12-10', '10:22:04', '2', '1', '38', '20', '1', 1),
(110, 12, 11, '2019-12-10', '10:22:15', '2', '1', '55', '42', '1', 1),
(111, 12, 11, '2019-12-10', '10:22:24', '2', '1', '35', '61', '1', 1),
(112, 12, 11, '2019-12-10', '10:22:35', '3', '1', '236', '12', '1', 1),
(113, 12, 11, '2019-12-10', '10:22:48', '3', '1', '678', '12', '1', 1),
(114, 12, 11, '2019-12-10', '10:23:01', '3', '1', '790', '18', '1', 1),
(115, 12, 11, '2019-12-10', '10:23:13', '3', '1', '578', '19', '1', 1),
(116, 12, 11, '2019-12-10', '10:23:23', '4', '1', '119', '20', '1', 1),
(117, 12, 11, '2019-12-10', '10:23:30', '4', '1', '399', '9', '1', 1),
(118, 12, 11, '2019-12-10', '10:23:41', '4', '1', '200', '1', '1', 1),
(119, 12, 11, '2019-12-10', '10:24:00', '4', '1', '229', '200', '1', 1),
(120, 12, 11, '2019-12-10', '10:24:11', '4', '1', '900', '20', '1', 1),
(121, 12, 11, '2019-12-10', '10:24:21', '4', '1', '110', '28', '1', 1),
(122, 12, 11, '2019-12-10', '10:24:28', '4', '1', '255', '29', '1', 1),
(123, 12, 11, '2019-12-10', '10:24:36', '4', '1', '117', '23', '1', 1),
(124, 12, 11, '2019-12-10', '10:24:46', '4', '1', '699', '299', '1', 1),
(125, 12, 14, '2019-12-10', '10:38:21', '1', '1', '2', '200', '1', 1),
(126, 12, 14, '2019-12-10', '10:38:28', '2', '1', '21', '200', '1', 1),
(127, 12, 14, '2019-12-10', '10:38:35', '2', '1', '38', '37', '1', 1),
(128, 12, 14, '2019-12-10', '10:38:40', '1', '1', '9', '30', '1', 1),
(129, 12, 14, '2019-12-10', '10:38:46', '3', '1', '678', '67', '1', 1),
(130, 12, 14, '2019-12-10', '10:39:01', '3', '1', '345', '66', '1', 1),
(131, 12, 14, '2019-12-10', '10:39:07', '4', '1', '660', '27', '1', 1),
(132, 12, 14, '2019-12-10', '10:39:15', '4', '1', '335', '379', '1', 1),
(133, 12, 14, '2019-12-10', '10:39:24', '4', '1', '228', '64', '1', 1),
(134, 12, 14, '2019-12-10', '10:39:30', '4', '1', '900', '30', '1', 1),
(135, 12, 14, '2019-12-10', '10:39:36', '3', '1', '289', '29', '1', 1),
(136, 12, 14, '2019-12-10', '10:39:44', '5', '1', '888', '20', '1', 1),
(137, 12, 14, '2019-12-10', '10:39:51', '4', '1', '699', '20', '1', 1),
(138, 14, 11, '2019-12-10', '11:10:22', '1', '2', '1', '5', '1', 1),
(139, 14, 11, '2019-12-10', '11:10:38', '1', '2', '2', '5', '1', 1),
(140, 14, 11, '2019-12-10', '11:10:45', '1', '2', '3', '5', '1', 1),
(141, 14, 11, '2019-12-10', '11:10:57', '1', '2', '5', '5', '1', 1),
(142, 14, 11, '2019-12-10', '11:11:23', '1', '2', '4', '5', '1', 1),
(143, 14, 11, '2019-12-10', '11:11:31', '1', '2', '6', '5', '1', 1),
(144, 14, 11, '2019-12-10', '11:11:38', '1', '2', '7', '5', '1', 1),
(145, 14, 11, '2019-12-10', '11:11:47', '1', '2', '8', '5', '1', 1),
(146, 14, 11, '2019-12-10', '11:11:56', '1', '2', '9', '5', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bat`
--
ALTER TABLE `tbl_bat`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_market`
--
ALTER TABLE `tbl_market`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_redeem`
--
ALTER TABLE `tbl_redeem`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bat`
--
ALTER TABLE `tbl_bat`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tbl_market`
--
ALTER TABLE `tbl_market`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_redeem`
--
ALTER TABLE `tbl_redeem`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
