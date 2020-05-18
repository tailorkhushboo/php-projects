-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2020 at 01:31 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u343386227_daskadam`
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
(1, 'admin', 'admin', 'admin@gmail.com', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_image`) VALUES
(10, 'Top', '87538_Badshah-Rapper-Background-Wallpaper-14929.jpg'),
(12, 'World', '59464_arijit-singh.jpg'),
(13, 'Business', '43365_Hindi-1.jpg'),
(14, 'Politics', '66062_G4N1yV.jpg'),
(21, 'Education', '85272_');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_task`
--

CREATE TABLE `tbl_daily_task` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_link` varchar(255) NOT NULL,
  `d_point` varchar(200) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daily_task`
--

INSERT INTO `tbl_daily_task` (`d_id`, `d_name`, `d_link`, `d_point`, `d_status`) VALUES
(1, 'Subscribe Honey Money', 'https://m.youtube.com/channel/UC4TedjLXrVoDzPsgezfm52A', '2', 1),
(3, 'Join HONEY MONEY Telegram', 'https://t.me/joinchat/AAAAAFSV9-1fE7_Jy1OUBA', '2', 1),
(4, 'Subscribe Developer Channel', 'https://www.youtube.com/channel/UCBzw8tVps1JVs1eL1RTEAFQ', '2', 1),
(5, 'Join Developer Telegram', 'http://t.me/jlexpert', '2', 1),
(6, 'Follow on Instagram', 'https://www.instagram.com/jlexpert', '2', 1),
(7, 'Subscribe Honey Money Old', 'https://www.youtube.com/channel/UCm4847VqXpnW3PmaBEa-STQ', '2', 1),
(8, 'Subscribe Kumar Piyush Channel', 'https://youtu.be/T0zihvLUdjU', '2', 1),
(18, 'Install and play games ', 'https://taptap.gg/join/gY7RF1W3k0ejChSdA61ay52NZGW2', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_network`
--

CREATE TABLE `tbl_network` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `money` varchar(255) NOT NULL,
  `refferal_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `vid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `news_title` varchar(500) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`vid`, `cat_id`, `news_title`, `news_image`, `url`, `status`) VALUES
(16, 10, 'Soccer Free Kick', '56649_Screenshot_20200318-162211~2.png', 'https://games.cdn.famobi.com/html5games/0/3d-free-kick/v080/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=2ee096ab-4cd7-4f9a-baa9-f58a54413c47&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=492&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2F3D', 1),
(17, 12, 'Iran: At least 20 paramilitary Revolutionary Guard personnel killed in bombing', '82495_image4.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(19, 10, 'Highway Rider', '46525_Screenshot_20200318-154006~2.png', 'https://games.cdn.famobi.com/html5games/h/highway-rider-extreme/v060/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=83175bfa-1c89-46d9-91da-7ea5fc7a642f&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=461&original_ref=https%3A%2F%2Fhtml5games.com%2F', 1),
(20, 13, 'Iran: At least 20 paramilitary Revolutionary Guard personnel killed in bombing', '32055_image3.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(21, 10, 'Hago Pizza', '61370_Screenshot_20200318-162020~2.png', 'https://games.cdn.famobi.com/html5games/h/hippo-pizza-chef/v150/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=70fb3295-3e28-4f81-9d8e-508f804216d5&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=491&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%', 1),
(22, 10, 'Adventure Drivers', '2831_Screenshot_20200318-161736~2.png', 'https://games.cdn.famobi.com/html5games/a/adventure-drivers/v040/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=7adef9f1-9ddd-437a-b5ee-196da61ba5c7&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=489&original_ref=https%3A%2F%2Fhtml5games.com%2FGame', 1),
(23, 10, 'Maze Game', '8249_Screenshot_20200318-161513~2.png', 'https://games.cdn.famobi.com/html5games/m/maze/v070/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=73ae54ea-f54f-480b-bf80-7e42dc3b9fe6&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=489&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FMaze%2F73a', 1),
(24, 10, 'Puzzle Mahjong 3D', '69968_Screenshot_20200318-161252~2.png', 'https://games.cdn.famobi.com/html5games/m/mahjong-3d/v040/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=a98f414e-385d-4e57-a62e-bb306c0f77cb&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=483&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FMahj', 1),
(25, 10, 'Running Jack', '57055_Screenshot_20200318-155559~3.png', 'https://games.cdn.famobi.com/html5games/r/running-jack/v040/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=3d29f086-1059-4efb-9b1a-4b6460d35607&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=476&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FRu', 1),
(27, 10, 'Archery World', '26959_Screenshot_20200318-154904~2.png', 'https://games.cdn.famobi.com/html5games/a/archery-world-tour/v450/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=ebcb987a-3fd0-4b4a-bae6-f456fff9cac3&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=470&original_ref=https%3A%2F%2Fhtml5games.com%2FGam', 1),
(28, 12, 'Iran: At least 20 paramilitary Revolutionary Guard personnel killed in bombing', '90921_Muskrat-Falls-Inquiry-Scott-Shaffer-Grant-Thornton-2.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(29, 12, 'India-US strategic partnership advancing at historic pace: Pentagon', '22225_18encounter6.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(30, 13, 'China wants a deal with US very badly: Donald Trump', '18189_merlin_143401740_5d16de55-d5cd-4384-b6c2-d25558e183f1-articleLarge.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(31, 13, 'Iran: At least 20 paramilitary Revolutionary Guard personnel killed in bombing', '59479_jbareham_180220_2271_0045.1519499474.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(32, 14, 'China urges restraint by India, Pakistan on Pulwama terror a', '66458_Muskrat-Falls-Inquiry-Scott-Shaffer-Grant-Thornton-2.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(33, 14, 'Kulbhushan Jadhav ICJ hearing LIVE: Pakistan calls India\'s claim...', '47123_Pulwama-Attack-1-378x213.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(34, 14, 'Today\'s sitting comes to an end. The Court is now adjourned', '75309_Modi-varanasi.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(35, 21, 'China wants a deal with US very badly: Donald Trump', '84518_SKP134505387_large.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(36, 21, 'SNC-LAVALIN STORM AWAITS RETURNING MPS', '76147_CPT503515542.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(37, 21, 'WILSON-RAYBOULD SUPPORTED BY MANY RIDING RESIDENT', '29523_cpt503530768.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(38, 10, 'Bubble Woods', '64319_Screenshot_20200318-154653~2.png', 'https://games.cdn.famobi.com/html5games/b/bubble-woods/v290/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=53159388-d515-45e5-b65a-56d21c595405&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=467&original_ref=https%3A%2F%2Fhtml5games.com%2FGame%2FBu', 1),
(39, 12, 'Russia has taken note of attempts to disrupt the Moscow-', '92422_sensex_NSE_BSE_Stocks_Stock_market_bse1-770x433.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(40, 10, 'Pirates The Game', '62867_Screenshot_20200318-160256~2.png', 'https://games.cdn.famobi.com/html5games/p/pirates-the-match-3/v300/?fg_domain=play.famobi.com&fg_aid=A1000-1&fg_uid=cbca0811-a161-4040-81ad-29e8f4d8d772&fg_pid=4638e320-4444-4514-81c4-d80a8c662371&fg_beat=479&original_ref=https%3A%2F%2Fhtml5games.com%2FGa', 1),
(41, 12, 'Honey Money - As Smart Support', '30622_Screenshot_20200316-160640.png', 'https://youtu.be/4qqXg_I18RI', 1),
(42, 12, 'Hindi Altitude for Boys', '23809_hindi-status.jpg', 'https://hindishayrisite.blogspot.com/2020/03/attitude-status.html?m=1', 1),
(43, 13, ' Alberta Premier Rachel Notley will provide an update today on the crude-by-rail negotiations.', '30753_BBmSc6D.jpg', 'https://iamsjchangers.blogspot.com/', 1),
(44, 22, 'SURYASAMACHAR', '32668_SURYA SAMACHAR.jpg', 'http://www.suryasamachar.com/', 1),
(45, 12, 'How to Use Honey Money', '29983_IMG-20200315-WA0096.jpg', 'https://youtu.be/lhWp8efefGc', 1),
(47, 13, 'RSAHYOGAM.IN', '16550_Rsahyogam logo.png', 'http://rsahyogam.in/site/index.html', 1),
(48, 22, 'ZEE NEWS', '30864_ZEE NEWS.jpg', 'https://zeenews.india.com/hindi/live-tv', 1),
(49, 22, 'NEWS 24', '17066_NEWS 24.png', 'https://hindi.news24online.com/live-tv', 1),
(50, 22, 'AAJ TAK', '83298_AAJ TAK.png', 'https://aajtak.intoday.in/', 1),
(51, 22, 'INDIA TV', '83202_INDIA TV.jpg', 'https://www.indiatvnews.com/', 1),
(52, 22, 'NDTV INDIA', '40798_NDTV INDIA 2.png', 'https://www.ndtv.com/', 1),
(53, 21, 'GOOGLE SEARCH', '47673_GOOGLE LOGO.jpg', 'https://www.google.co.in/', 1),
(54, 12, 'Hindi Shayri', '37266_Attitude-Status-In-Hindi-2-Line.jpg', 'https://hindishayrisite.blogspot.com/2020/03/attitude-status.html?m=1', 1),
(55, 12, 'Motivational Quotes', '80455_Best-Attitude-Status-Hindi-Images.png', 'https://hindishayrisite.blogspot.com/2020/03/attitude-status.html?m=1', 1),
(56, 22, 'NEWS NATION', '2458_NEWS NATION.jpg', 'https://www.newsnation.in/live-tv', 1),
(57, 22, 'ABP NEWS', '65816_ABP NEWS.jpg', 'https://abpnews.abplive.in/live-tv', 1),
(58, 22, 'R.BHARAT NEWS', '49984_R.BHARAT NEWS.png', 'https://bharat.republicworld.com', 1),
(59, 22, 'NEWS18 HINDI', '84441_NEWS18 INDIA.png', 'https://hindi.news18.com/livetv/', 1),
(60, 22, 'ZEE HINDUSTAN', '40996_ZEE HIINDUSTAN.jpg', 'https://zeenews.india.com/hindi/zee-hindustan', 1),
(61, 21, 'CRYPTO PRICE', '43878_BYTECOIN IMAGE.png', 'https://coinmarketcap.com/', 1),
(62, 22, 'SUDARSHAN NEWS', '74835_SUDARSHAN NEWS.jpg', 'http://www.sudarshannews.in/', 1),
(63, 22, 'ZEE BUSINESS', '39004_ZEE BUSINESS.jpg', 'https://www.zeebiz.com/live-tv', 1),
(66, 12, 'Altitude Status', '67193_Attitude-Statu-In-Hindi.jpg', 'https://hindishayrisite.blogspot.com/2020/03/attitude-status.html?m=1', 1);

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
(4, 'Mar,15,2020 06:54:09 AM', 'Welcome Users', 'Activate your Id to get extra benefits and extra Earning', '', ''),
(21, 'Apr,19,2020 12:09:31 PM', 'Honey Money - Watch full video', 'Watch how to use honey Money', 'https://youtu.be/XUxOZRqHsc8', ''),
(17, 'Apr,09,2020 11:43:19 AM', 'HONEY MONEY Payment Update', 'Payment will start after Sunday..', '', ''),
(19, 'Apr,19,2020 07:17:23 AM', 'Honey Money', 'Activate your Id to get Extra Income..', '', ''),
(15, 'Apr,04,2020 06:31:43 AM', 'Warning', 'We are taking legal action on all Scripters .. who created scripts and who used script..\r\nWe know your telegram channel. Now it\'s your first or last mistake..\r\n#honeymoney #Legalaction', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_transaction`
--

CREATE TABLE `tbl_payment_transaction` (
  `tid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `txtstatus` varchar(255) NOT NULL,
  `txtid` varchar(255) NOT NULL,
  `txtdate` varchar(255) NOT NULL,
  `txtamount` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `res_code` varchar(255) NOT NULL,
  `res_msg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_transaction`
--

INSERT INTO `tbl_payment_transaction` (`tid`, `user_id`, `email`, `orderid`, `checksum`, `bankname`, `txtstatus`, `txtid`, `txtdate`, `txtamount`, `currency`, `payment_mode`, `res_code`, `res_msg`, `status`) VALUES
(74, 54083, 'sharwankr04744@gmail.com', '54083_12331', '9dbZhm/WhM8t+sTAUuQBiwWigF47d/I13+8ih1Kj4OLhkyolefyPjgJijCYWpRNo/RHywGDcRI5GjVU95+yBqdLDOGPlNB3P4lVxOi86C5w=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168159319500730', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(73, 54011, 'joshikumud73@gmail.com', '54011_16086', 'hYd+J96vV696UC/zbhGbyWeZGehGAF4Ex/xr6EkZqQmUdVvhMfVpuS5DZxbAi6c+KRc/fIKdUw3WODxvFz0r4g8zQ3zMl5m/UITLR3pw+X0=', 'null', 'TXN_SUCCESS', '20200317111212800110168934619820553', '17-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(72, 54041, 'sofiqul65886@gmail.com', '54041_20460', 'g/4ehP4kIFn+9tw8xKoXjiLOL7ydyJCraNNYavpV3moCEnq5LL+jpt0QSO7oDt6PNvOYJilJPFJCGg37d7m001vqJ4pKLIvBH3uTWkdZQmk=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168334019758234', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(71, 53688, 'sofiqulislam8647@gmail.com', '53688_21392', '5gwalFB7iHmJ96K5mzUcjotkeJ2n5llNsxIR2AA098Bcg4+PcTqtsx2sWfeApm9l4RojwlUmHcj0ALjo3UXR6nf+RaJicIyt5uf1uLwpG4s=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168260719530594', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(111, 233, 'rajkumarduari608@gmail.com', '233_25410', 'qrf7T5u2FW8I9H48qA8szWnibs/a14u28NdOqDcVeJS2xoeg/oqKxnoYtNK+40JL0oepjEA3X9XNUrPF7nOxgBBkdyIYe4YV5d/AoZh33uY=', 'WALLET', 'TXN_SUCCESS', '20200319111212800110168835720285880', '19-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(109, 89, 'kumarpiyush786786@gmail.com', '89_12339', 'DN2alg8GRXbUH2UNwRXBmQfvs4KK3AyBlgCozk5v+T9PPugPDKg3XzxFWESia6YX6l/O2lO0w4fqJPIPEipXYO/Xk0Q3nNemCUYynEWamTc=', 'WALLET', 'TXN_SUCCESS', '20200319111212800110168020219844945', '19-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(108, 112, 'test15@gmail.com', '112', 't5sUsRnGB4bM5zkEMaZSdGx93W+EEFrqlUtxUpke7m+CDB89sCGKYVRfmy8dOngxzlxptw5Dl76eNRf3exZiXaymZsMRGrQhHo33Zteg/7Q=', 'manual', 'TXN_SUCCESS', '112', '19-03-2020', '', 'INR', 'NB', '01', 'Txn Success', 1),
(107, 115, 'adityasingh23894@gmail.com', '115_11611', 'sMZ2CQrbtPE7euKT9t4MpQJ4zb2HpCdWVwCFQsgK6JNrvZ9ycE3SjMADpumASWqZhsVGzpTvJWPS6ewlxCsHI86dGJrAPLCGI4uQIzTFaIc=', 'WALLET', 'TXN_SUCCESS', '20200318111212800110168766020139579', '18-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(105, 113, 'ravikarma2020@gmail.com', '53881_25025', 't5sUsRnGB4bM5zkEMaZSdGx93W+EEFrqlUtxUpke7m+CDB89sCGKYVRfmy8dOngxzlxptw5Dl76eNRf3exZiXaymZsMRGrQhHo33Zteg/7Q=', 'AXIS', 'TXN_SUCCESS', '20200316111212800110168502301357132', '18-03-2020', '25.00', 'INR', 'NB', '01', 'Txn Success', 1),
(106, 113, 'ravikarma2020@gmail.com', '53881_25025', 't5sUsRnGB4bM5zkEMaZSdGx93W+EEFrqlUtxUpke7m+CDB89sCGKYVRfmy8dOngxzlxptw5Dl76eNRf3exZiXaymZsMRGrQhHo33Zteg/7Q=', 'AXIS', 'TXN_SUCCESS', '20200316111212800110168502301357132', '18-03-2020', '25.00', 'INR', 'NB', '01', 'Txn Success', 1),
(25, 26, '20honeysharma03@gmail.com', '26', '6yP226k2b9hcrlAo869clMClld0SIAD32ofsrRu31BrML+X+X7G4YOxozFopRKbeCysiuR8UXbmOqzAzJb2iZz1elIQhFLL8UGgrVDA50BQ=', 'manual', 'TXN_SUCCESS', '26', '21-03-2020', 'manual', 'INR', 'UPI', '01', 'Txn Success', 1),
(26, 31, 'kumarpiyush786786@gmail.com', '31_15650', 'sr2V6Qhj55sZ+McdM/w7Of8dP4AhvlU0iLFdV3G3oWNwSlxVfI64AR0ldaWbU/a5QNv0LvSidLwRwIASf33dw3Ca9sQXwaDv9lSwyyV5IBg=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168680719481376', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(27, 36, 'officialtechh@gmail.com', '36_26957', 'kBn/oe84uw18zLpVdYRWPHyfmjttK7S+NSDvRju5skOY0i4Wn582aDoS7oAINV1qmuZg3qo+DXaBQ35YwRtIe//zJy3POjTZjBWp7/G4ZTs=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168797919648310', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(28, 75, 'oomprakashtiwari11@gmail.com', '75_23557', 'm4XB83FaGzcuwOsrK/wCg6o9cszHF/fIAC957CfO0gSKgX8+fxdQyHGK9jnZ1gu+f7xvFQsPaH7q/HLsJErSb9WcE1Q2YJoVemrNYq2nHFM=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168711019303948', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(29, 140, 'khodabhaitopiya699@gmail.com', '140_10427', 'hZIwt6t2UcN+GY7jxDJrqzcTHfopbV6HaCym/YxVMMsU1K23LEO7HM1e+43TA49nhRAn9J2EJlS+wOaTa4piqrv3h4VB0ncKzN+Y46ZF24M=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168962519447855', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(30, 145, 'sravanasravana58652@gmail.com', '145_20113', 'w3S8JddVxTGr9gg4RLEG/HugtmGdBrUffCez6jHj/UVmLVnTxlOYG7F+zJnQSSLfMXVK6myqgM//czpWhYd44bTx2eelnWfjHE5zpknHVp4=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168848519592077', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(31, 152, 'kkamatchi768@gmail.com', '152_15462', '+qferTFIHqHpOul9d19J/u/rtJcHXI6emz7RyzWvrDbbu1wOwAf0xasrh9HCC8yj0CAUJrTbucrNt5VCDJQmvq+LzEQ+R+3SdwlacdEwN30=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168757418991715', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(32, 179, 'sagardebnath958@gmail.com', '179_10685', 'yz3ZBXDwkOioXJf9EWVc64489i+4W06KsNVh2FBDuHbSZ56fY7BvqSFz538IQ+DDzynT+emQBvr46MikXZ+CiG2cgLT526j8Snk1Y0IdFE0=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168447319592789', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(33, 760, 'amit28520@gmail.com', '760_29368', 'VtagozBYjMlHy9SryUVhrr8wXvnAcKrrPXM+Lz/8uu8kK3Avuwlz/reZD/5lSxAC6E6Jm/72N0QOP2fUL6lPbOcgYRq1o4NlkYNZv5M2wSA=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168086019832271', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(34, 13545, 'sharfaraz021@gmail.com', '13545_14296', 'ZLYfN4FA8xjCYMutiTZKR6uTiVFbPbXRESCbwNJiNclOqalgrsaoWnatncIuwPurYbIGlaFnSPqJdNMa+vVNdziFYBh2KlDkUlWQSHsihXY=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168376718988222', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(35, 19232, 'chandreshpatel900@gmail.com', '19232_20393', 'xmk43MY67ODkzh1x5Qly0kvE/wcKz4T2uoG/9SrZ8UApzG4+uRe5PIP/7YTsTCneYNt+A/+NjGIi7BIHLTNIFQMgApmQSsKkgdCXITdADS0=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168330019478339', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(36, 28623, 'maniram60838@gmail.com', '28623_23171', 'D5aFbPMWHAAYMK0cNOM/rOurUD+E6fhqRFxHshCNkOemVG8lV8ayDSmqlSp+aTmJrQmEQNDacaR0m1GVXe5Zd0A2ohsoSzdzaofpdf586MI=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168482919244224', '15-03-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(37, 30908, 'tayadeshubham119@gmail.com', '30908_26002', 'DV1syUR+pKbbeuhWJnMTe3C/t7P4/r0GSIDKjozM6RoDiHhpLDH3nQsi+HUEGQZcZLNorGjT8dPeZoWmYwj35r82RJNVGjdHbMGPRQTlPLs=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168299319851051', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(38, 44905, 'parmarjigarkumar186@gmail.com', '44905_22179', 'XO1Szn47QlIBY1trkh0t73fMTKSINxj/u1hJjjesQfnmS8s6a+c3WWgayo5FIZ4a++eTH3tjTU5KGkfC/295D6O1c38huWJiK4PrzXIRuyA=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168341019385844', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(39, 46062, 'mrsouravstb@gmail.com', '46062_12478', 'lN7GqbLZ9+WwBcPpIsnuwlhqdA36tprxvXvVOjsrB392hnVCHnINr6BWN3WA0PxOJsFkliIBJ2QLT5sOD7jU12JQd/mn6ffygggQneF5bBw=', 'null', 'TXN_SUCCESS', '20200315111212800110168717019451932', '15-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(40, 45221, 'killerom27@gmail.com', '45221_16486', 'grVOsWenNKmS713Ctl+tSnY9kzr/vyz7KSpV1U7IWAcNq6ppB/uUZqgIas0NSSJ8iVRTzur6RE2/nVDjkQRIrPvPohUj+M9xL4u+Z2gk8cU=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168864619243392', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(41, 45917, 'athaniya152@gmail.com', '45917_13128', 'WqKTOqtd1C1WOHkeJ1gvKVJVqI2f/3ob+UEWM5gTSMnHc66tKEBxfzqpuu3EwTOU7BTJALZ8SECkDkc7f9oOeaigEnmQVej5bXHCkuqZzrE=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168728419332652', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(42, 48619, 'maheshvanjara7773@gmail.com', '48619_26131', 'imPksUAgNUpWizrjCot8ciTP3N3v4vtg+X+t29u71r0Npo3B3a9LRmTrzy8XcERsf/ogGiAPPefni45DDuv6AFr3U3fFYw05PJAt2ssPgfo=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168667519307870', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(43, 48885, 'kusumsolanki153@gmail.com', '48885_20112', '8NjMABfuOnfFCU6PJz+EhNF3z/Sb87kZ5Jgwbs/2nv81tWeFuW79z9Knsz4iIXwQs6WiCcDcOurfegz2WH+ispVNbiYRR5MWCE+GUMwE8QY=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168262119262041', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(44, 49208, 'ravindrajathar9@gmail.com', '49208_25290', 'FIMFgBTtyj2Tli2oNT+b3VzrBqWrr3CcJY7LSKuYtAfN+RiV9n5jZyZ6qzDZnDhBgoFeLwEGwhWAQ2QM2oCptVSFVYSUjTWLR9/tY0cgH9g=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168767519523804', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(45, 52705, 'naveenbror123@gmail.com', '52705_20843', '+Om4GXlR2K+FrlhPh4Nw8zsmihA/FZhgqJlGUQxh5Iz8stC/1we9Fjj5ORmNevPH5ODDQ3kGKMt0dLDjwG7YS5pgpEZNAFEtIXFr1goNY60=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168895119190240', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(46, 40239, 'yemrajrebari579@gmail.com', '40239_22634', 'eHaYWJpbXlZTmpHlN63d4HbbhHsADR+wM8ZYJ64D+fYtC4jIx4lMSixBvZVTpzRfedMhWp1LSjE4KdLL3xjs94kPKqW7QL+2baxI40ODPgo=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168481919324284', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(47, 53637, 'roopramabclko100@gmail.com', '53637_10227', 'ycCQhkMqC/zh7QtSoxWK8DEOazAin++KUaMSOpveYXmOwikhpoOjUztDt9bqEubGeGuRZv+HlCJV8R2PHqwoi5gBuWkWDi67xwGhKK/+VJg=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168773819442307', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(48, 53662, 'saptabhusan454@gmail.com', '53662_21127', 'odlSduiEZt/D4xhrcrhEKkhVt8yrjzI4jURK/U7B2YKKpIGSrJ0YEJYDnNN/0TE3woXV58cvhlShQzz/tHi/3ROqRXHgsWJcpoTDsjg4Dh0=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168285919994845', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(49, 53671, 'pankajvaghela3622@gmail.com', '53671_17574', 'jZn5Xb/7m99RscReZvZNV3whZO9BQCJieDpBh1lm1rVxDsbKYlQO9LIwx+enuWyN6+ikGiG6Ez5z+7hIa82MqhR+f8bK8KHxp22Q+JJcTuQ=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168930719620616', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(50, 53431, 'adityasingh23894@gmail.com', '53431_10406', 'W7OBEozpscFaKkDQXBfAYpd+DBJNsOAgTfU03hTL3pLYVC7FwvmehSX5n9kOUtp6M2lnK6bLN+KeU2XwlzJ0h2Q9Q8TkkR+0U02PJyZoMAY=', 'WALLET', 'TXN_SUCCESS', '20200315111212800110168246419616159', '15-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(51, 53708, 'saivamsij123@gmail.com', '53708_28557', 'Zk8BXJzu9N9wcrHa1ab44NIyN3nbR36qUCXgid1Ik5P+GWrN653OhXL0dTzg0z5UcyzANRZNj90XKxGehaRnZkkUg2hS9hKT3FChkcr/EP4=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168890919174413', '16-03-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(52, 53645, 'phoolchandmeena632@gmail.com', '53645_21131', '5DrKIQDlrwt6PSUJQF20+TpCl0vpXl/fm47Z/pgiQ9xt23EPiubVTYbo9jPpmIlV243tK+hxb5AHIhl446DHht3ig7rPY3UH1NmFdRZTu8s=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168263719283720', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(53, 53752, 'munnaf1920@gmail.com', '53752_29831', 'YeM7hij4VWkCLsRt6rFYt/H9RB6VGk14FbuQxpSzArk8lCl97c81yipZwtGjq0f1Wq4z13n+x41DOqB0uxHlJ7A1VaWwEF9YFjya2M/V56k=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168906219444434', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(54, 53822, 'kishansudhir29@gmail.com', '53822_19029', 'LXb76+wMlRHgyvzh8eWRxHiMs3URpGvzs2ZymtuUmbA3eC08IVurbm7wBxD39cI31VFxxhZCJGn9JXR/tP/A9pcc4D1V8+eTjy9wwi8K7SQ=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168983020465363', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(55, 53873, 'gundlasathish10888@gmail.com', '53873_11014', 'ZmDk5rsQSVixIsglmaR2G38H5oXXK2Z7SAjgAy5borsJF0e99YeBmK9S593yimhZ/8RFvz+6syjbcCPkWm6l49D6LLa9Vq6PmfGwn5vMFvg=', 'null', 'PENDING', '20200316111212800110168027119263466', '16-03-2020', '25.00', 'INR', 'UPI', '402', 'Looks like the payment is not complete. Please wait while we confirm the status with your bank.', 1),
(56, 53896, 'www.bhaskar2004@gmail.com', '53896_23637', '3iiVRwkrb1tjwU8T9bE3QTjGHL6lKzyaA4rJus/LHWvekCEJ5A6eM5S29lUD7RL6k/IKV6F/G7D2pWyOSr+Yn8TN1azvVRPNljN6kbm0cPc=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168433619659749', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(57, 53776, 'putelghanashyam86@gmail.com', '53776_28043', 'r20y6/SxOwRJ8XyOoXsh+w92y2CdX+Qvv26+DigrytveeAKsfxyaMzY0iNlg5ZdQdeAto9xsWKNyuuy9i4nXD+U1xHzjESZV0eudYu+hdiE=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168620719731218', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(58, 53929, 'ismailhussain224611@gmail.com', '53929_27607', 'qMPffnU+q80XHXlp7gHW9sbOKVo06qTa6HF0fPqgqhnVqY3JEVLQkehF98571MnzKa5T8Y+xsJLVGU0v5A+WXkV4QhePY1//4wvw+HOKvDo=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168497919596473', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(59, 53937, 'rk732450@gmail.com', '53937_16409', 'F+QD3CCatokH03coPcjPkyEeQHdBZO6KWkI+FG99DpZRmX0khLOuHXJGj6XOXWr+vWRw67QgYS+K8TLrDEo2J0uxjJdubUnklirv8jHLfDA=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168082520008176', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(60, 53956, 'sunilrp2201@gmail.com', '53956_12104', 'S8h2sAckogaGeNpC5PFSUFhkaoa8rezrTi6PiXKgScI30NeyYlnh4RYAVovHXS2oN4YBnqeswMEORPm8bas458Qr4vx5yUsZWS0OQ6pRIDA=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168677919492231', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(61, 53956, 'sunilrp2201@gmail.com', '53956_12104', 'S8h2sAckogaGeNpC5PFSUFhkaoa8rezrTi6PiXKgScI30NeyYlnh4RYAVovHXS2oN4YBnqeswMEORPm8bas458Qr4vx5yUsZWS0OQ6pRIDA=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168677919492231', '16-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(70, 54030, 'kruparana017@gmail.com', '54030_23100', 'bS6Ckzi2Uz4xhnUWHs013KybD2/JTQay/MHv0cDr8IH0QqlT3tN8Dft4NQQgnJaCX6wmbGY/tnityoTpc8Gj0whU90kjjJI5tXVdEAx4yi4=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168511319890074', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(65, 53971, 'ashumeen835@gmail.com', '53971_28555', '5LU1i3oYhkulQPtEdjEpQOMSLd4inmVHIq4kfWt7JEmzsZ5hRpS5iy8b33wvlCfgDD1gXb0HOKttBos0qJOP5p6JcMCAOFFJSFExYavAA5M=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168618920299419', '16-03-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(66, 53971, 'ashumeen835@gmail.com', '53971_28555', '5LU1i3oYhkulQPtEdjEpQOMSLd4inmVHIq4kfWt7JEmzsZ5hRpS5iy8b33wvlCfgDD1gXb0HOKttBos0qJOP5p6JcMCAOFFJSFExYavAA5M=', 'WALLET', 'TXN_SUCCESS', '20200316111212800110168618920299419', '16-03-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(144, 62, 'tailorarpit104@gmail.com	', '62', '62', 'manual', 'TXN_SUCCESS', '62', '20-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(146, 616, 'onkars193@gmail.com', '616_27687', 'DkKujJA2DBqWRu4x54ex1m+GOWBUbAcyjNFS1gEkD6jyPPWeTODysd0HjsCp37YMtD5BPHfv1YYtycgOgwZ0FNA9BHeTbqH+jWiZdiRuBDg=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168726920237713', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(75, 54097, 'hh9746786@gmail.com', '54097_18741', '64EvwPXIRBJ/jFtZ5Ayvb5ECxPpkLKc1IFEUqBHeEBKCSs+qD55ecBlHtpcAK9ZD7S8aX6cxx0TGOjZZHaAeM0stvjQA0XPcPRbFssdS+Ws=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168691019435405', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(76, 54097, 'hh9746786@gmail.com', '54097_18741', '64EvwPXIRBJ/jFtZ5Ayvb5ECxPpkLKc1IFEUqBHeEBKCSs+qD55ecBlHtpcAK9ZD7S8aX6cxx0TGOjZZHaAeM0stvjQA0XPcPRbFssdS+Ws=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168691019435405', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(77, 283, 'romidhamija@gmail.com', '283', 'RxcwIpdqEpJv8cR4GVbSKQcLAA9nZFsIu+gKwR7XB/vPx2KvmdBJm51Jl6X8dMvCzLWVSjt3ZxYtaaAoz+8iAmZiaLqdLFa7d2SANHwbrR0=', 'manual', 'TXN_SUCCESS', '283', '18-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(78, 283, 'romidhamija@gmail.com', '283', 'RxcwIpdqEpJv8cR4GVbSKQcLAA9nZFsIu+gKwR7XB/vPx2KvmdBJm51Jl6X8dMvCzLWVSjt3ZxYtaaAoz+8iAmZiaLqdLFa7d2SANHwbrR0=', 'manual', 'TXN_SUCCESS', '283', '18-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(79, 54052, 'hardeepbuttar2213@gmail.com', '54052_28531', 'si619jo6UB6otlIuWqrKSekgOjiYKW1ye2xl0Xm/z4XnpsctDBuPz0B442VMgO3hrCPQcYmLqzO46vE5HHGPEdgRwJkrBfs8MH1sa7RAoD8=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168803519693298', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(80, 54093, 'kamtapatel9630@gmail.com', '54093_16448', 'kEjMe6BpNgJFgfLbAvpAQmzw5WbIIH4djEfC9dqxXA1W2J/YP8dKX+V+pZj5UC4Q/Ym7v/i1MVwfeIiYE6coY096yHTrZZP40p1Zw/zmuYA=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168838219854355', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(81, 54115, 'nagaa6556@gmail.com', '54115_19365', '3G1/q6VwVeY7S0mDF7lopm8mghwYE7HR9CBIE81byyRv+OwO2kZyYrp3WasbLy3mPIDeYr35fvzO2U9Jdjm+f2+XUfIpjY/cRCnWAWYPXJs=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168612120476695', '17-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(110, 214, 'chandreshpatel900@gmail.com', '214_21869', 'npVC6gMEwXXx8lqMKo7Nb7Ics82xuCwIhYs7pT79AnpZBwGE5my6MCx73ZaIc1Iy9uorYEc6c/Zn14YauiU4xa2nPKv4Mus5t2LYgY8LvpU=', 'WALLET', 'TXN_SUCCESS', '20200319111212800110168624420290253', '19-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(112, 304, 'nareshkumarlodhi89433@gmail.com', '304_26494', 'lxI0O1II2XwkkUexcIkmdJFYUZSaTNVYCp6RlMUTl/7CY7tY5ZDIEOVWyhS9todW2KLFfQaNlwpBjJS/ZxpiUIifa7je6ce+okHiGBiZBkw=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168351120333714', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(113, 323, 'usman24913@gmail.com', '323_28673', 'hJY0LfZmyuri+Nx4U9O5iHGu8CvH0Wn3fdBcJ4kVDkuLjyxTvYUB5vxCEiLi1xQ2xSIicQEcTYMkm527HzIzdXf0w8WsY3QdFdI0pAk9Od8=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168313919809267', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(91, 19, 'officialtechh@gmail.com', '19_19147', 'MxMaASax5Oaa/D7J7doZ60kLN1O98f8a5iy3DDARb1XB8TYOPgpwULD+9D7mRJ7lgmKYynEW7LMZOgt++xeUPdZY0s18J+JGaTbUo3AaNso=', 'WALLET', 'TXN_SUCCESS', '20200317111212800110168858619879482', '17-03-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(114, 313, 'amar230641@gmail.com', '313_21459', 'iRX37VWF6b15DtlDixV2udXN+YkMumrh6pCgA7U2AVqQsYPtHfBt2XI0wj9KEaeTnIizqxd21/BmrgoKz7VoHB5Ni2FhdgHrFvWhwykjSJY=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168159619932558', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(94, 72, 'agarwalmuskangts@gmail.com', '72_24177', 'xXVJ4FLqenYl68LYG3SSoY3I067KtUCbzdLFZGhWkc8VNrdXqqLOOC0gkhwjXPVVifU1wHt6+ZxYmruyJ41x7mfkODMuKsdScXEMJC3JKf4=', 'WALLET', 'TXN_SUCCESS', '20200318111212800110168911419754698', '18-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(95, 19232, 'chandreshpatel900@gmail.com', '19232_18617', 'ZRdn1Xiav2WRshRDTANqj6/ZYLw8MzRpDlmf0uuv0VySjH23lCSlhPlCnOKDnIyD8TWMumF1keL4yCWLKppClAdIy4JHd3x4FYfFd5WbX/A=', 'PPBL', 'TXN_SUCCESS', '20200318111212800110168796720083340', '18-03-2020', '25.00', 'INR', 'NB', '01', 'Txn Success', 1),
(115, 330, 'robinchaudhary601@gmail.com', '330_18245', 'DcDlTPbWrDPxq9+onLyNDPgOd9akJcUvHqNiDsDaJSHMgp45wXPArYC5HMKbFyF/uvfGXQFpW09/Gb3z0+wmOESfPnFVSUZUUqMXC0Fq/EQ=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168012120218838', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(116, 330, 'robinchaudhary601@gmail.com', '330_18245', 'DcDlTPbWrDPxq9+onLyNDPgOd9akJcUvHqNiDsDaJSHMgp45wXPArYC5HMKbFyF/uvfGXQFpW09/Gb3z0+wmOESfPnFVSUZUUqMXC0Fq/EQ=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168012120218838', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(117, 336, 'adilnaseem2020@gmail.com', '336_24218', 'UIYC2zZSkrWxa+/DrQGlImYR5r2bIePAzT1V/ualjOb+ExQWQeysKeQ34jTiOUSiSMSQyTQMfza49021PKZ8qPO0ZY1jd71/KRNtLWeOBQo=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168381620468561', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(118, 334, 'mdmujiburrahman185@gmail.com', '334_23442', 'mn6yQYGrVukSw1w95a04kbCm+7Gn+mwZ69kabcCpQQA5nnGg+Ig2zLuCjU70q0ZdQHXWrae+VnQ5lf4nOxKl6aT5mEt6p/pUm2niwbwdxds=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168143320146315', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(119, 354, 'sunilfa75@gmail.com', '354_12583', '3QDy6mGNsGwksnlyStZvEQAzTfYiaeurGr7nX6L6M3DDJjBiosRQ114OGHVctKQ9d9LwhecTOWRzMK7Fv0FCekDIQXJCkc3cwc1+KjrCSvg=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168621320299303', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(120, 370, 'uc3374346@gmail.com', '370_18179', 'qYQ8pBP07AFzEWIvnWkrtzCBGpV0ly+fS5W8CAJ7XGb6Zd+AYUT3WhfLBghGwrqZ1gHzPg6IxKW+adoc6B3COhcMbKiwHe5WVXnOJShjODo=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168851920245978', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(121, 384, 'zrahmadzubair28444@gmail.com', '384_19820', '7UrYAxrOhqb+IXh1DmTdAlZ1mChIO3p4AkfjazpuWA6YwGDjM6iJFZeJmvAoG2+3bp4LObFm7y6lab28+dV1oJ77j+kJu8gN76cQwhOFDM4=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168024220037319', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(122, 205, 'brijseem143@gmail.com', '205_13264', 'XGPkRUBJjXZVZhkIkbTAs3fe48zaXyCkd0JZC0BuhdIiTe3ZYKZqYhuxdYG+Ur1jUKsvBSDYew/rJsvJL4M+wZM1zmJTyZT0qTp1/Uq7G7c=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168269019983322', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(123, 401, 'soheb57@gmail.com', '401_23722', 'Sj9zdp0yAEExbqEjp5jbydIdTXRX6STiRMvCk5qeLVtk42pz0AK7Xgrfs6qJoOuJNHlmmvSffJceXFJRGwjGBxmM3OA4aNGmWaR5AB1kAdg=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168840320424769', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(124, 241, 'depalisau@gmail.com', '241_19740', 'f7GlinoX+iIEzwP6EtRMY113T25ORwHvstPrrfDDnvrJcFM2yvCUdHQ/1JbL9KZjbGjjvJZSWnXgpSCpueXiZB3kaVRuS2NywrhninHTLaE=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168752819922587', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(125, 404, 'iambhatta0@gmail.com', '404_11241', '0QXcn2RThtz4zQl/qax23RJbUsKVlcnQf3ANTG1e7wl4KRoyfr44VuoFGnzRr/xJlGLCvkoMig5f1EwmdQNl48U2iwgxaeiBNqqtG6zFPKg=', 'null', 'TXN_SUCCESS', '20200320111212800110168844820369986', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(126, 404, 'iambhatta0@gmail.com', '404_11241', '0QXcn2RThtz4zQl/qax23RJbUsKVlcnQf3ANTG1e7wl4KRoyfr44VuoFGnzRr/xJlGLCvkoMig5f1EwmdQNl48U2iwgxaeiBNqqtG6zFPKg=', 'null', 'TXN_SUCCESS', '20200320111212800110168844820369986', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(127, 411, 'krishanpal10798@gmail.com', '411_26145', 'fIlt/If+YfStnxUDanfC4aK2mWnQ0WEksBfFnRjkr1EWeq4i+GDXxx0VsQUutULCer87FVDFD3olF6XrbUvYEK1jOKTE5eZ1dnkb0u0KvtM=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168232620459284', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(128, 422, 'sagarwaseem514@gmail.com', '422_28359', 'Dy3Wf7Yjp2qjzFDUSTcPJLBOU+5+JWR5LsHCTFqvG68KlKXrQ/+2bKWW3ixnKnBX0JD+cfACOdh2hRaml5cO5WCleaYqAH9BoA3GQn/Y3V4=', 'null', 'TXN_SUCCESS', '20200320111212800110168824320412251', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(129, 307, 'rajr40299@gmail.com', '307_25312', '0oau4wrWMhngOtYJNtG83/04gUgJfbEZw+FSoQP5hTOQy83FuhQSL5ApYdUcfodCmHlEQRY/UaG+pLs7Z0THw8p06/EFAArOxwJ3MfAdLug=', 'null', 'TXN_SUCCESS', '20200320111212800110168206720227641', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(130, 439, 'rampukarchaurasia2012@gmail.com', '439_17459', 'usFW6y3NNDFId9cMZh9qh8QTgehbQrHp6waJn0k8yYFpLCr2+70k4oEQWJkr5cAWsFnijvwnXxVECO6Cs3V5sfPpgFI8TT6G0UsXWeRQdVY=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168593120382918', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(131, 440, 'sg1642512@gmail.com', '440_27647', 'q7rpIKoCG5PaxiV+gd87Oq3jRV0pwZkLrZ9puSGWWJPZtN8pu2PL4VUKISITurmQlmSX/MXCjPHb9FJ0zpsx4KmgpGWukH8PfX4WJiPOuco=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168495520370014', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(132, 442, 'iambhatta11@gmail.com', '442_14070', 'G/LQWf8+7VWWDIgIFJTD7pXaquLm681vnHdadbGcdwCeUi4uInKieua36xQVHfIvT4NFpYekpxnkJlqGiDYHyr3vysuApmoFhXLE1RlcmY4=', 'null', 'TXN_SUCCESS', '20200320111212800110168591620462878', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(133, 446, 'deabhijit73@gmail.com', '446_14020', 'hN+VZ9k4gc2RkFvVZViJMBfQNHMCCUMcHMI431gnKXlKn7I2xrLkOLHL+qm7ewLJyB0R0KH8wRcH7WZT+y+B3/3APFlpzrqtDWQZ4hWGucs=', 'null', 'TXN_SUCCESS', '20200320111212800110168861820097861', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(134, 476, 'ashikali446@gmail.com', '476_20560', 'ojVaR9I8FZlzlid14BwLgah9RSKiXl4MLvWIbs7v3Z1Kh2IDy+IRdkPm/E+9Kcx5GPJPrybM8kukaa1WRAE+5qVwlth1mBFLD8kj/OcJnDI=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168917220160446', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(135, 482, 'skkamal574@gmail.com', '482_28637', 'fWmDRZB00Sjr+WB5I5Q6I4wCWd12wcTBwaotoH1JQQiHfsMIqgIVQa5AOx6e1vqqV0SgSrDAYRFRiiQwbJeqCVF5OPfROLTTS9pQd/oduHQ=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168191120707668', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(136, 496, 'atulpaswan8858@gmail.com', '496_13222', '6GsU8fUAzTUUB+sGD6NEsuE9+bfslxrk0VBSTwhNHO4twgyfCtWEsM+ga9o5tnBJge3KewyqWZ7BTAD5lfQNtNrnzww7YtGwIUtRQPMipxw=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168709520106231', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(137, 382, 'humanabanta@gmail.com', '382_28727', 'Fv//uGrub2bwLz1Rn1qVWHX3F7MooNYlgWdoSu5eZzcDN856BZkjlY3Ksgl5XvJvvvo/EB7zb/S2zThUWlNI1N7oMW2U5DNt3RpOJKFPzPQ=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168841220479429', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(138, 516, 'asrafali7860786@gmail.com', '516_25600', 'Q/VVBO4IjbaHAWXMhhZ75j0Tp7R5BYnbpjYsf/KVoTotCYIjbmbNMi2Ny2npxfPtCUnkEn97H8qYLXRliXA7lsHXibVtJ3vd3yZw5A5typo=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168548419965922', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(139, 450, 'mexayjariwala05@gmail.com', '450_16271', 'newFehbE5V1/CzJU7PkqGZY78xCp3xLYGX457pSczx/0vvJTiy2BE3EWdjiThXuHuAmlPb7qm86u12cOIDCNdi6FDfS00GJTpCqojnffw18=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168811620572295', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(140, 548, 'rajb8504@gmail.com', '548_23581', 'z3lQSqkd1KBJeT1eync3P0uPu8Gtg9/gUZJxxvJCeESR2CWSWkxaK9uTLtJvHc07vgMQqWpfYO3spWXBDuS1J5SAEwVY9POVpsYVx4dnczc=', 'WALLET', 'TXN_SUCCESS', '20200320111212800110168659520670461', '20-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(141, 578, 'nishantshikher62@gmail.com', '578_24995', 'OBE3uKVko3jRDshfqquzgGNc1feI53NEMxPgohXjySZgwplqYrHeNZLo5JrNN0N/BoxiTV1+yskHIKm8ABX0QvCj5QiC/3ZP1s+k1K9j5iw=', 'null', 'TXN_SUCCESS', '20200320111212800110168860820076094', '20-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(145, 100, '20honeysharma03@gmail.com', '100', '100', 'manual', 'TXN_SUCCESS', '100', '20-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(147, 604, 'jahangeerkhanjkd@gmail.com', '604_12426', 'bxMKTxbCIQwP90Dtm3R2WCG16MyQQeKowzTJhWXjDJxZcpk0Ql1GEDbNBqpYfnLHB8Vbd8yPk0qfcebeOYnsehuWNg8nEwr0KSJQ0vVvSH0=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168580121230960', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(148, 582, 'amitk89557@gmail.com', '582_26198', 'aWWbkDHvfTVa+oq47voVlmMJjisOvc7OyJOoj7tEYb+f6H8S8TQ4Nkx3+5ifgueKBK25PGBG8xkshIAE1Sh9O/DHbbYrphTduFb1q2H/SQ8=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168563420099329', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(149, 714, 'dwitunnarzary54@gmail.com', '714_18533', 'cI1gR4gXKk7kAMJfHoh6tKjImMQMQqjcsFXVqvGzlotbV63JjY/a8L19f1j6mN+lzne+7u6Fpgx/kuCzAH1cbAsCvCjGmBr2ysa4FGvWI4E=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168512520601608', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(150, 748, 'kavyajaiswal102@gmail.com', '748_29766', 'mIbAPa44tLwomiDsVBOPguuFyzx8+R50RXCaKT4bFGDdBdsF71wiHkbvijeEzrrRV7YeTpYwr5vD6RyMacZiR1X6iIHUwesC675xrwpFMLE=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168849320550567', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(151, 790, 'rajanna.bg00@gmail.com', '790_15850', 'IjNpO8hTEsr06SZbNC3ARA2vaqZgEEBHSWPsINI+pbIWV66iBOqmN/WLI4tONtokZ4GoacrvSw13ZH+He77SqgfcDwswBKoiwOTTQyVRwPM=', 'null', 'TXN_SUCCESS', '20200321111212800110168828820666888', '21-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(152, 803, 'patelhimanshuramubhai17@gmail.com', '803_25945', '9aBPNqSHAuoGCMDCVMndjhLqZVW3l+jYkSeKvatelZWv4GOCaVJVdl0ml+b04FVQV1kMCZvn7XEozGczevs8YSEEmJyiCz+Sk2kQ6/mqUkQ=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168097620799052', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(153, 1298, 'premgowda01@gmail.com', '1298_23696', 'OxXyU9p0/mijHgHO9eumsU1rDCpbyzSY1j+YB8HplrwsB41GxtdeHFdQ9tYrJnkuVrCYSLqJz9hiq13BM8VrLFCa/2rQNLe/xiVeW7sszME=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168078920626329', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(154, 1350, 'nnareti200@gmail.com', '1350_29888', 'IZNfsF67ZqL8OVNciZZJbDE99PKXinkj3bKeXRIZdtldNb8eVP9+Daa0G2a9+2ylUsJTS6BzulM59NF1/CRkcPHQzVWbUnF37pyg75sOCUU=', 'WALLET', 'TXN_SUCCESS', '20200321111212800110168174220404232', '21-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(155, 74, 'rubanfctechno@gmail.com', '74', '74', 'manual', 'TXN_SUCCESS', '74', '22-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(156, 1383, 'koralatan@gmail.com', '1383_16195', 'VfhHbQakY2GI3CWzs7hK2h5DRv1Kj6uI096L7JLRo2B7XBfdES+w1ql0DmMh/wRczhvU14321IgSz1bhX18gilSpLXTECosEtJQPr8S7lO8=', 'WALLET', 'TXN_SUCCESS', '20200322111212800110168544320180065', '22-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(157, 1372, 'rinkunath0559@gmail.com', '1372_24729', 'Sad4w5kNiLyXNNeIRkeIt3tpX1GTYggbg/BHXnfxKXkFufi9mVIwBr2MH/pgH1OM2gMinyCq6GvjvZSSXDtVquxCNBHm017Lox+puaVT2cg=', 'WALLET', 'TXN_SUCCESS', '20200322111212800110168822020693356', '22-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(158, 1382, 'jpaswan559@gmail.com', '1382_20066', 'yfiCMQH3gd1OAKEYuhc3WbeMABZdAr0iYxaUXmL7fHMM/rp+jY1lJIa94oYUKKJASVq+AMzLz5banOn8twuAxacnVepuKk0nI37iGv6HlrA=', 'WALLET', 'TXN_SUCCESS', '20200322111212800110168838920693695', '22-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(159, 1393, 'sowmiyameganathan1998@gmail.com', '1393_25703', 'jrG2N7MyaFXWc1uhgURvlYdLyYWWNYUSTegzO8N8NiSKRRtpuy+yr1Fi9TVliBH44gy4H7vyI0PCKyFZ8VJq5hULvVtyakxinPVdsurmDOk=', 'WALLET', 'TXN_SUCCESS', '20200322111212800110168964120637395', '22-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(160, 152, 'kkamatchi768@gmail.com', '152_14108', '3KZfKWSDek0PUFpd4WjjOJWYDbVxIq4TGaZjHR2TU/pVjey6zO4i70olQLyTSiiJy3w1amiycIdCMr7SXqYDk8ZE0hFxOfdD7MhA4rDW63A=', 'WALLET', 'TXN_SUCCESS', '20200322111212800110168210420527641', '22-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(161, 563, 'rajivku9818@gmail.com', '563_27901', 'Xyq/lgDpazokndMgjZTpkT6HNe9PYkEDyutLpEUr9/2vsSIQ5zhwJWCU/McZ1ZTvTphH7m1ticYcfxR/zj/sUPDIxdxxccf1twG7mJGEgUQ=', 'WALLET', 'TXN_SUCCESS', '20200323111212800110168568720419271', '23-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(162, 763, 'kuldeeps88022@gmail.com', '763_19595', 'TOHoyAwI7tMNVV10Lh3lRpfFCIivfvxwtKNY4cqFSf+1FT0AoTQg4T+WlogR9L8Q2+G1B2Rjc/xWsrphau1Q1zBX+l8sz2GiAyKxCP8yOhg=', 'WALLET', 'TXN_SUCCESS', '20200323111212800110168700320426994', '23-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(163, 1484, 'haseenahmad365@gmail.com', '1484_19024', '/3hkInYTBjthyg+Zs/iPT5YpdnChqmOtjX5yW6Laeij9wKTeqaqMbbhGZ4jo0hSsy7gFsb8D+132k/EEZd5ucxmIqQlc+2fHNytqpbitFiA=', 'WALLET', 'TXN_SUCCESS', '20200323111212800110168541120399264', '23-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(164, 1490, 'pankajgupta6332@gmail.com', '1490_16565', 'M9Q3EmA9h62cDpdVjrS86wT6SOEe8iWN6qgIxaOAB0FGeV8F19X+IOkkDhmkOX++IWNajlRicq/w0ihwVMISjTZT52ec02KbsoWeuDij3rA=', 'WALLET', 'TXN_SUCCESS', '20200324111212800110168786120452676', '24-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(165, 92, 'ramakantsingh623@gmail.com', '92_17458', 'jCHk4gszouo44+wopwQc+MhELzkS5IS5Fbj7KoHt2ilfVTVzp+HjRgjLZrBJjvqgoFNPysI/+UNcr6QQAlTnjppg0MwCPnlun8nHHKFl78Q=', 'WALLET', 'TXN_SUCCESS', '20200325111212800110168616621565751', '25-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(166, 1552, 'neetuyadav7789@gmail.com', '1552_22556', '2EjBaj+2u/Mqsg6r6BUpDsL0K9TnB86MsePFj7XfKutj1+X0dZayR3YORBHbHQLnhFAjYZFjtNF+kxYQdOTtzKGLbvGjNnOpR6b0A0kv0/4=', 'WALLET', 'TXN_SUCCESS', '20200325111212800110168003120646131', '25-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(167, 55, 'amitchheda33@gmail.com', '55_10246', 'mdxLNVAuNSCNwIhEyoL04lWGhPuuGqtEmnA7R+3zKYTscaqJx/vE62TA8us85r4607TROzDUBFrgbQC96TheFwPnLojEKhhecRv/R98e/JE=', 'WALLET', 'TXN_SUCCESS', '20200326111212800110168548620775981', '26-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(168, 1591, 'armankalawant58@gmail.com', '1591_10928', 'UKfcqEnZCPc4msRUHZibeZj1dLVva3BLnLW+yPqrDeNoRJ1V586dlLCSVakjuOU6Vrr6HypZQGXAOmqjPZJKIIfQc4rvZS5DKlqMyGiByBU=', 'WALLET', 'TXN_SUCCESS', '20200326111212800110168839721310953', '26-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(169, 1617, 'zombie3896@gmail.com', '1617_16386', 'dj8eiVC5xeX8pMjtYQ9lQQRtXN/kzi5E/2VIhUOO9H+97S0l93lI4GYM+AaaZ7Sm4SpdMgBdKg+YqOXNmovVzPCjtfmj0hs4bJ5MzWbeqn4=', 'null', 'TXN_SUCCESS', '20200327111212800110168121921149614', '27-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(171, 1689, 'pardeepjohal347@gmail.com', '1689_10723', 'jDkZjSptjyJ7dwo3GdD/E01qH23gsC2mnSyqgqRyd42CE7OEAmcVno9dMUX69HSyYeYyPxB89RwRC/V86621rug9DDWhASnn0WWgbmgVo+o=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168565420901258', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(172, 1689, 'pardeepjohal347@gmail.com', '1689_10723', 'jDkZjSptjyJ7dwo3GdD/E01qH23gsC2mnSyqgqRyd42CE7OEAmcVno9dMUX69HSyYeYyPxB89RwRC/V86621rug9DDWhASnn0WWgbmgVo+o=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168565420901258', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(173, 1571, 'ak3640053@gmail.com', '1571_21924', 'U1IKPvAjxngRHL3CSPuUOYBLX6d04lribgidxsRMeGAFyfFIjsQ+2+hWZailIL98R+lbJJZhZ5OfKuhWLMlAq9ZSDanwxZJxzWq6kXLnVWQ=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168491621312696', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(174, 1689, 'pardeepjohal347@gmail.com', '1689_29205', 'Bg3vv2pt5fnOgucK4W3+Ga/eP900Hoc+Dv/dM4k8vX3CP3fWPQVpdWidcH2ABebJ+vBXv5KQ9es0lbw2/s8fM0wHcCopEvDTKelclfdiZ1A=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168816721537114', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(175, 1689, 'pardeepjohal347@gmail.com', '1689_29205', 'Bg3vv2pt5fnOgucK4W3+Ga/eP900Hoc+Dv/dM4k8vX3CP3fWPQVpdWidcH2ABebJ+vBXv5KQ9es0lbw2/s8fM0wHcCopEvDTKelclfdiZ1A=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168816721537114', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(176, 1738, 'sourav.dlf@gmail.com', '1738_18224', 'heMhjyQVqzR9cE2qrV3NN/sFw98gwbp781stVtw8x3eU2tFwG0gyAy76FcPnHyz+mEhNsStW/DCVMi54lPYHOdE0dROuf2OTkU5/wcBGMDQ=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168632720912358', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(177, 1744, 'ramsir817@gmail.com', '1744_23693', 'KkbNGPkD48V1q1hxzq6hhm77QiwfxEcdKxxiCKzA1o2ufZmkhRaRoLwk/iIi6tDwp8KOK/PGhTaw6cfW6dhQ8VLYMfM6Z/6/nx0pb+h+7jA=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168267920972517', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(178, 1737, 'jksnz123@gmail.com', '1737_14086', 'mVk6/NG7yFZyBnl96Y1F+A96egNg0Jufelrr/yf5eTonP7DTrj0fYr8k7HtMTYZ0Ma59sZUFTvOu0LKLN0YfefZQI9x0K5RebLs3IZN/n5U=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168421921374552', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(249, 900046, 'pramodagarwal382@gmail.com', '900046', '900046', 'manual', 'TXN_SUCCESS', '900046', '30-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(180, 1748, 'pmahilang7@gmail.com', '1748_19233', 'QbS6O1/SvCwmYdNDSnmhIz8oXBz5sqbUlzAxY89nmH/+YDFA5BMaOjKe9DJVi8HtqrAuDSGARBmzZ00Z3PTjJ1Dg2kRXgG721dHEvInmJak=', 'WALLET', 'TXN_SUCCESS', '20200327111212800110168937521276577', '27-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(181, 1761, 'sheleshyadav984@gmail.com', '1761_19540', 'zrow0e0GEks6ssYLRY32dHsrGM6LZCXO8yIw1BM098uT68zeeA4pnVrJfyVF9nHI0Hqjmio4DSyU6OIVS9XpoWIMG4iQzHy6r5t3K5fvvtA=', 'WALLET', 'TXN_SUCCESS', '20200328111212800110168931021404501', '28-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(182, 18, 'manpreetsandhu7474@gmail.com', '18_16698', 'u6tz+SWJ5E7i3BKD8DdlhFbWKMXyqx0FwdezSVz+S8YOt08KHbdwcwWznaAKTcJJB11QjbqLpsOz5D+mW4O6HLmGvolWDg0U2XVZNZl2cOs=', 'null', 'TXN_SUCCESS', '20200328111212800110168084821755127', '28-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(183, 1364, 'alsaoodgour4@gmail.com', '1364_22375', 'cIKbF5l2HIU8Yl/ZWc0AtlDVY8rgTE+euGiMN1NmMZil8YhSXKXxITpW9YxmK65p1Go1pm5/qEea8EIEI4j9j13rSEyyM5+0NbTh9CQwrDc=', 'WALLET', 'TXN_SUCCESS', '20200328111212800110168700421108273', '28-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(184, 1767, 'sharwankr04744@gmail.com', '1767_17472', 'R0E32KcnU4PV8p8Y9HBUJ2qKjBxviOwgJ01Fexw4o5srJUwWuge8CDveyUOfaUmA8K/u5faSwPIMvs6paDF6wot1yQeK2TkCb3scLAZawsU=', 'WALLET', 'TXN_SUCCESS', '20200328111212800110168515821502055', '28-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(185, 1795, 'geniuseducation009@gmail.com', '1795_22416', '9IvmWYUlD1580ukfIMA6zqfMMsIQOo+dBh19GRFMQ/5OUKaqWFY2iKW4BFGqpEPmVWlXgsJFLl0WtIt7SrY19C55yT5frjAIYYh4ayB0hY8=', 'WALLET', 'TXN_SUCCESS', '20200328111212800110168202921333891', '28-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(186, 1739, 'dasc52636@gmail.com', '1739_10233', 'hb3YPEeTT1seFYWn5hYz7qAiGfxqjJZ5HmUPsf34WYH6BhYdBErME2NMet0zP2tQMFMhe377g8WhZAqV/y/H/N49LHExbk5hMFsBszhApa4=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168206821325394', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(187, 1837, 'sukhdev010176@gmail.com', '1837_14869', 'OlqSrieC8HZTrymMKzwRKH9vjNyhEmRSH6ms7cVnyA2dC/dY8M6ps8hnzMADQfL/TiBqmbhcyny1dGxDu4Aldl5a/0whtrZMRI7CFM6K6ik=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168200521346060', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(188, 1863, 'dipakupadhyay01101991@gmail.com', '1863_12953', 'ZFBITRPPt/NlkQWi1iEIhLjlRi772W/lpANAqRlWo+I5nUm5OaOWRCkvQQRrxYfj/A/bN995RcPih7jkEOIl6lHQSWzPQrYScF6rGL5D6y8=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168534121675171', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(189, 1874, 'rsthatte@gmail.com', '1874_12443', 'l/ei94LS8+IXuwFZXtjw/rvPMTt7rip6xlw1ZZlLmJwrcF0W9ChPNaopYJfdEOw3xPqFZQEHrjTp4wHX9tXRAkI55eYfd+mn1aQQMPxSd6E=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168275121794950', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(190, 1882, 'rahatguddu1020@gmail.com', '1882_29924', 'GnZhUYtefkSKj+4ZcjL4TRt8spJv6WXZUdjqUlZe68MWcyE31+zbM/1rqq3ApZVaio328fOH1b0iyWNLTnGE1jAxVKp8RInYWGxVTxzEsdA=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168028021168245', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(191, 1884, 'bestindia435@gmail.com', '1884_14206', '01CHx0gXH0YWINujXxGz2JAMnIJ/DMJAsBpvNe1fuXbtMGlyCHKWaeIfqqGp5oPXUjV7IftCxYnl1f7vWTmAdEV666e9oQOyMAiPrfDeO9Q=', 'null', 'TXN_SUCCESS', '20200329111212800110168957721178324', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(192, 1889, 'anvaralam929@gmail.com', '1889_11590', 'kXdrbp4AUTVAokDAP5njU87JEp3hi29wyQ5C7yeNNNS6o9El0mrjnU7rMGDvxdBQfy8Mgwb1xBTHdO/LmBlB0cUHUxV+nSJVvUQr3kZxsBc=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168032421739547', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(193, 1893, 'bhp242401@gmail.com', '1893_12284', '4HThdFI8Eska16NFwuzKVzW7yBDaPX75+DJ6wI6OqWqErPgxVLzFZmf9fHUWZiNvMkcPV/W+NHhvtT+6fHSGbYKi9n0OHhHFuNnM7X83ADE=', 'null', 'TXN_SUCCESS', '20200329111212800110168774021333346', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(194, 1893, 'bhp242401@gmail.com', '1893_12284', '4HThdFI8Eska16NFwuzKVzW7yBDaPX75+DJ6wI6OqWqErPgxVLzFZmf9fHUWZiNvMkcPV/W+NHhvtT+6fHSGbYKi9n0OHhHFuNnM7X83ADE=', 'null', 'TXN_SUCCESS', '20200329111212800110168774021333346', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(195, 1808, 'ritikgujjargujjar231@gmail.com', '1808_16227', 'vUEqSANDKlrk84u1wxoY38QYkS95TcgWNHV/ONcyOtrEhop7wTG9evcW853XRLkIPB3G9tCShyAwU5RoAyiuKxxI9RDiqDHj7/KftGV/seU=', 'null', 'TXN_SUCCESS', '20200329111212800110168828121638544', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(196, 1894, 'singhmahesh7063@gmail.com', '1894_19640', '3G8ZMGO0ijxewslX/gOf7hlzBrtXwYvkm1J+rffwxCFHelCWn0zNmk22YF3s0HRw84+Gl/vgwYlI1muGmj7imi9X6AxOcDGFdN5Cjag/dFg=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168575621435629', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(197, 1912, 'rplled7014@gmail.com', '1912_23487', '0liCfoqx/fpc4S2VaBYw16Li8A5kVrVkVa/t+xEZrM+RyyKONPBMuYabEtFOTAj1IYCnFZbJpmONJaLhymBIUmGDeSvPFYP0PmNxlxzeSpg=', 'null', 'TXN_SUCCESS', '20200329111212800110168209621358984', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(198, 1915, 'echcgccngbn@gmail.com', '1915_20944', 'LnxCPzRhpnPYH4wLsocPRz/LRnYDpORoZsiUa5tS3hHJeLkV9SRv8Umf94dI9J2qr4upOIVLfmxXrkraiXjL+/sjtovdOqs4HlMsSaV5Le0=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168287921875833', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(199, 1898, 'rk9591053@gmail.com', '1898_16786', 'MM12BqAmA2qsGCPWd8XZxTu6y+dgQ4rCUp7NXmYxUXMneNuLlccseEcIpPvdLF7y1A0/fniecsorsJWtW0qNgQCzA3CetFyujVcz2ogWJJU=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168971322149884', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(200, 1937, 'devk88777@gmail.com', '1937_14427', 'd8eQ6oLmfFwbi2J794607U7ECXX4hbVFqxrJRIAYHndIU7tzihtmzP+bqjzVT6HLWzpmBdrOuDD+44B/lAF7He56T0aNDsZX9LaQdU0E4Y0=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168134721541389', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(201, 1948, 'bishnukumar9893@gmail.com', '1948_23507', 'jHrvmo0UVsKokBVkKtytkJwbSs8coh0Rutyke+L9AHfAqyBUaOj6XvBsO6A9jS5gsmLLdOD8F+bDRsnAaoU/cAEchvYpUetycV6Qt01G+EQ=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168324121680997', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(202, 1949, 'vickykymar086@gmail.com', '1949_26249', 'YKrOb7Qvv25ymKo8sU0YmXyFwa6QerAItdzm3cFUhmJrnRYxYBb4KsqzoESzhKFM7orgVBcivW+26hXWIyOuzNy14v/X1NwuzeQOU4iCiXQ=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168675621221278', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(203, 1952, 'ramn52681@gmail.com', '1952_20502', 'knkftpjk9OsBgSL8/KCk80bPuHBQ6fFm6VmhLyJGqN9dn//Cys1Z8Jg2PdcXCLMWr5R0YwYMhcU4HUBGVhDwAmruvI3Zsfu9lUJL6bXN5xE=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168974122093922', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(204, 1962, 'singhkishan5719@gmail.com', '1962_11652', 'I+GG6rdSZvkDbyLejn0ErzpaE95rrdvNvkIW3/GFalDT+Xi9zL2SASPXe24WThh30JXVSxcN1s5m7kolCS1+o6TS8t9+IqDvMQaCmITykNY=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168248921564419', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(205, 1606, 'micferns29@gmail.com', '1606_19659', 'mbQa0mjBZqpjVNizffOUWVpZKB6fQ/MiB/k3placIHjBxAIvtlVw/+X18JcHKGODkz75EjXRiU6WabQBBPlhiTtN/iVgq5+xI+l7ze6OirM=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168381221703078', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(206, 1964, 'prajapatidineshbhai9913@gmail.com', '1964_24774', 'S3Crw/vFq6+9n0VPtduqePjCsyxyj+Yo3ke4Hg8Q+LQPkUoyKOewibvv7v+Bisuo7nuYC9v4g8WxUgSL9KqnwuW6F0CTY/osRY5+25psS4A=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168058321543808', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(207, 1964, 'prajapatidineshbhai9913@gmail.com', '1964_24774', 'S3Crw/vFq6+9n0VPtduqePjCsyxyj+Yo3ke4Hg8Q+LQPkUoyKOewibvv7v+Bisuo7nuYC9v4g8WxUgSL9KqnwuW6F0CTY/osRY5+25psS4A=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168058321543808', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(208, 1970, 'aks.bst@gmail.com', '1970_20359', 'lkhM+GN9TTj+HYXvh5+4qcKuvS2jjiwTeq4kz1hJaP/y+d5rf+mj5FeyXAqAk6iqVbCp2ekY20RwKFh2N0FA4Ti8E6aTSWQ2vK5bitX5d+k=', 'null', 'TXN_SUCCESS', '20200329111212800110168512921561709', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(209, 1984, 'payalji862@gmail.com', '1984_15286', 'irlIbhhnl91/L88Y0TwLeLwM7Iqq9EyR4BFgVVV1E62l41ACv/ragK+SDsIKAEcn2v9tSk6HuH/EnAUclWMg5k53/bf7SLW/HTDNTN2MZBk=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168776321351896', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(210, 1991, 'mdsiddikrai0650@gmail.com', '1991_22756', '+vDAX0gyHaGqcbcqhlMT6ExxrKeNaiCRUBRqw2zsrQu4K4CgmMDJLCbja/Qa5jlJ3NGNUNhFS9sOegPeVkyZAW45VwLn/QemXC+eRE9tYPE=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168294621847073', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(211, 1887, 'khemc989@gmail.com', '1887_26467', 'VTOXvX7fSozze0/mN1Jt32UJjLWkP77PGnjgGwC8y+Y77/olHuTv3hAGFqYWbA1OcURBCJkEWRa88Pz2kTQae2SyrKKyF9z3KmrUCOZ5tNQ=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168605521254463', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(212, 1995, 'shubhamsrivastava2100@gmail.com', '1995_12852', '0WDlHLK0TE0n8CB3wGM9JMAUGPbmEZybSRn+s36PS/l6iDhvF9cETVUaAYKCLG4Df5LREj6MjYQAT9mozPf9C64y1H0i86rVGXxdHv25iX8=', 'null', 'TXN_SUCCESS', '20200329111212800110168071721653079', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(213, 2003, 'archanas6400@gmail.com', '2003_28310', 'JzW44mEiS3UnSQvPb64IJms0kTbfXAGT6elnvugwoFPM+HFEeamMtIlJP1uMbkjjQBpgFO0Ndcj1+4A9PxGJEbcYJv/yWILWV8VUrYoYeYQ=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168868621228244', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(214, 2016, 'sharmadevnarayan57@gmail.com', '2016_24648', 'c0/mq3Er+H5Vm1qAOxnh2xYe97OkpZWgGx8E8zmGvZH4SuYSptAntg3G5/7Xk34iD3Di0tnRD7PwYOd09p9PGd4uxGZG3qOAAmpRP7kPDvg=', 'null', 'TXN_SUCCESS', '20200329111212800110168849021607508', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(215, 2043, 'sbhabatosh5@gmail.com', '2043_16288', 'v7ltCHad9Q3H6NetPwe5acOlmD1nF4A/O09F8J4BVjyQgj8TiqeR3prS/EPx1gAR/NtRTLiurZb/3IWNT/ofME45x6vnfQqdVW9H6snNFQU=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168195921927370', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(216, 1491, 'lalk80014@gmail.com', '1491', '1491', 'manual', 'TXN_SUCCESS', '1491', '29-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(217, 2063, 'mohantysanjay982@gmail.com', '2063_21962', '0TGhUqVqJIjj/7R48B/Z+sK4pn9hNpRV7zNcv2KHTj7scS2zlcVIsYyX95xydq0B5y3zdvEp5+pQwGgTc25+qv5GMzzzrnCm5QO0cahw/v0=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168184821345010', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(218, 2071, 'chandrajeetsingh834@gmail.com', '2071_12592', '8Kbjc6whNbRLccop90B9+ZKNtPABkvHGq89qwqzZL4363DyLqAQ0Jev3S7f7iKq9lRaeN6qWmEMGD7kLXJkpujL3FSR5PvpBLDIZ7s5PLdE=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168102921377088', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(219, 2083, 'kkbirendra7677@gmail.com', '2083_20142', '+Sq2V2OyypAtHPbqPxvTKIg4Yu01x9bkPE1bGOqUDFhB+wel/586bl90VDC0qu2htus396ISJGfRV2w4rRkeYt84nSvjuUOHWfnmrZtLgCo=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168497521461590', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(220, 1979, 'jk8842980@gmail.com', '1979_20429', 'OM7YbCAa+HdAlcb8QXBbCr4y3kX6eypnAC7vb82MGv7twg9+8BabVFiRvpuFxk/QWc55ohY37mGanHEN7TPsW7v45ZQLuKm3dFkc4PRmG4E=', 'null', 'TXN_SUCCESS', '20200329111212800110168441121663711', '29-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(221, 2084, 'jasin.singh2010@gmail.com', '2084_25388', 'b0HH0iMONdGoc+eTfJuj4ZemoGlCR0DxSy+e92v2nvSN58NzJG+9zlurB1JG35EhPC8jqEC06Q20OHvq9BxA7tL9hGbADv66wFocR25XPHI=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168392521787637', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(222, 2050, 'golugt712@gmail.com', '2050_21202', 'RS38wwef55Gr1ybEPtWjZ1lCzmdoqqTnaRk2oElmdojKVnQFb5GdqFi3BKETkJJjDe6LbUHyvUWrPHdDkmYNZXTea4Pu+JW1U0CHsQ3Ifdw=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168771821375295', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(223, 315, 'Flstudiomobile2222@gmail.com', '315', '315', 'manual', 'TXN_SUCCESS', '315', '29-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(224, 2106, 'pandurangpawar722@gmail.com', '2106_14434', '1+lB8DTfua8zXKQXb0x5Nw9Tgd4B7GntIQZXn2+otTfLkTPz7KXUVrDm+X23t1pDIPv9MRO2MjOpWWc12Jazjte9kiT1MjZIMbhLR9VJbmk=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168647321209895', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(225, 2101, 'fareedindraje@gmail.com', '2101_13820', '4KTGt9P57QlygVXjPZiipw0DPgT9en3GMz2JubQ4LAK0s5Lbgj1tAsEeQGffMg98fQyzPfoMOg4A5Wj+/Fxx+FVl0o+IOjd8/Aw5aHQFYJc=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168555021192353', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(226, 2116, 'jitendrapurnea2011@gmail.com', '2116_14647', 'U+3rdzKi9JdEoldNCyeiKmwWbrcjit8VYbcMzbyi39S+5whqG7BR1DJnOmgQX0smUZB7DUi+NMLWXsOjZ1Xfp+TQSM0BxO5UYtcLhhET+HI=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168278121921092', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(227, 2128, 'denisgeorge013@gmail.com', '2128_28707', 'C96ZI8dJasAj+kap5nFWNPefjQlTRPHIKS9SpwzwudItWWye6bGVzExQ9nm/rlYrc4ww+jXX/YX5sqyqYXSDXxweXDh2aNH1/3unxk5x0aY=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168500421508638', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(228, 2130, 'dennis.george1964@gmail.com', '2130_12512', 'gKi+6/CVniVdqfnFEtE1M5EowxR/whiKO7PypvYF7HLa3R+y4u0ozm5z8eBFdQU64p0mZUr6u0pATzoGsXragLc+KlmUBokBPznmCuRzvl4=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168303221583344', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1);
INSERT INTO `tbl_payment_transaction` (`tid`, `user_id`, `email`, `orderid`, `checksum`, `bankname`, `txtstatus`, `txtid`, `txtdate`, `txtamount`, `currency`, `payment_mode`, `res_code`, `res_msg`, `status`) VALUES
(229, 2140, 'ajitkumarparjapti8@gmail.com', '2140_26071', 's36sx8zXrQU3GHA5tsUXVdLMO+RJtStXONevboKIgOH2mypinVSUPqtmLtiR/UZgKL/5q6MHYqziioMvp5DfByZ2LTlVH4zrUIInBZytDNk=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168703921273159', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(230, 2271, 'sudamsahu737@gmail.com', '2271_11261', 'XyJ0pksbvFrH0rztqFEjgt5ixQXKay6d+ObI0qbTyxkqRLHLUD6I4nIdFX1/K4GHlV0AQ8LijqV6sraFJhzd/TR+8qWJWw7TV33xTeKDFws=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168122521455478', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(231, 2261, 'swasthrahiye@gmail.com', '2261_17695', '+34N0LCISDRzD0VVJPSu8HSZb26pYaH8V+uuaAlzPnsAKUgiFpG15jOnSfRUuhYdjsXhfkGolTymAryQJrkIrnePSCfOIeUZbk4tca1T/+Y=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168364921776690', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(232, 2283, 'arvindsbaria147@gmail.com', '2283_25445', 'FKVciQlkhiX73b7vTO4hfO7gRigAG19atGvMae14UaAMteb/XJoOI8rvBCmw8jj0JXm6bunUeqmxMGLmjOoPiHsdgukS/fTajALOyX/Ku7Q=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168385521736491', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(233, 2298, 'aliahmad00667700@gmail.com', '2298_16424', 'mDxocd0IRdnzZbMop0iaMeJ+jkaEZpCHlqpO6gwLcpmSlfbQggvNfo11RdRnhuTv3LOlIGR0SN7I8mv/g321p3O1iXFF3qrnop7/o0SuPDU=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168133421586000', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(234, 2200, 'archanamonu2007@gmail.com', '2200_11831', 'qywW7Cpiu0c2ZsNaaIeiaDLSb9HRxX3uSyBMRC02fmBxH1QR8F7stkd69og+yulVA/up7bZpTChfsj3sRW/jbsgZoY4rnjfpqE9Ph+7TDwU=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168477621272018', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(235, 2133, 'santoshkumar9654158499@gmail.com', '2133_15417', '+SzIOloZEvsjQt7ggWWWgUF04LSpTzSLqFJxoXkPWO0jhgd353foRlGBcx16dAkB7rly9NdQawiPyIY6lOM0LUhATb4t4XSZigQG8ieFEWQ=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168306621631357', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(236, 1602, 'satishons16@gmail.com', '1602_20253', 'B4Iq3Kz5nN4mk4IdA3w/Bs49G1jzAHbhRt6yVXSnKR4XvzqE3MGxIQTyBU+oomfvArOnCvm2ZuGy5MhS4tEOoXR2n5Esd+FchY7aKRiae7c=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168145521345321', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(237, 2358, 'jikenali36924@gmail.com', '2358_18458', 'Pcm98wM3s1NjwdgHihdJcWYF64Bf1RF2LP8vXUDMgG11kToKZGJsc9216ZiYYGqOiXx4vE6SaQDaRBcsuSL2cgaTiLOYZ4fWXzQDHPZngdI=', 'WALLET', 'TXN_SUCCESS', '20200329111212800110168811021796295', '29-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(238, 2407, 'mdyamin100@gmail.com', '2407_17564', 'oJg/4q83AbWkYR94G2b0CdxiR7QcztMcMjL6ipbJTj7nYgUJGD8gjXQ3zGL99UeLB9qRzvCpSF76DFN/7NhoNXrV+HOSo9lqyVYB9JFBxaY=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168495421601097', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(239, 2411, 'niarulislam75@gmail.com', '2411_11155', 'Fw5IS5G0NBJd5uU3A1I7xg6SoUwe7CBBHdyNpga3l6eZh4Z/C9YEpHHm2mwf0IpeR86Di/PJRAzH9cPYp45zfD/QiKVb4hZbjbOZgWAHliI=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168248821639135', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(240, 2411, 'niarulislam75@gmail.com', '2411_11155', 'Fw5IS5G0NBJd5uU3A1I7xg6SoUwe7CBBHdyNpga3l6eZh4Z/C9YEpHHm2mwf0IpeR86Di/PJRAzH9cPYp45zfD/QiKVb4hZbjbOZgWAHliI=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168248821639135', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(241, 1925, 'ramv5545@gmail.com', '1925_28941', '2gn1adM/73ZtMPULUCBO7e5i3DtwdiSYRp4l7zFOSxzN4LPb1fyyAh852knP+px/4D2GUbsxOFGWJx6VOmg+iJo2pkfnQXwrLhFatILwuU8=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168320321736112', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(242, 2441, 'maxcomputer89@gmail.com', '2441_15666', 'wTdRxXxv1QzOGUeInyI+HLNRfrHXE9IkQ5d5mruAfiedZRQOEijuCzo7hLKkfntmwMCl3kPbchu2lXcdAwZi7CN4kKqGYiDNaYIwxiiswuk=', 'null', 'TXN_SUCCESS', '20200330111212800110168865521291892', '30-03-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(243, 2449, 'samirkumarmajhi1@gmail.com', '2449_22430', 'rSKn50H7bZcwNmUq8hxm2K2e96rLKylbVlFlSveHPUYGCjjjXz83BqSFbk8MRjyd96qkhN8J6uL/WkImGKD/JlzYvKTXK89umScFwcwq09o=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168318321194075', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(244, 2346, 'narmrata62@gmail.com', '2346_11289', 'GOuTrRRtIRZ34mXF0/Rs86QbMpCXSKy/1oO644cXufAQJJG0gYlqYKdHMQOzKXj10IJf38y8f4terGG+gUcNMREN2adiZtocoCGPaECu6a4=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168818221806388', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(245, 2008, 'bablukumardas49@gmail.com', '2008_28428', 'JKlhNgz06D5lRkiViB/+svfeLv/JoToFb1AePLP7p06/GQWE+EXtmj0GyaOydvA4qbBzZ9cSzb1zkViMT0bwjyl8afAy+jVEQMIs0BorH+s=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168776721446661', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(246, 2008, 'bablukumardas49@gmail.com', '2008_28428', 'JKlhNgz06D5lRkiViB/+svfeLv/JoToFb1AePLP7p06/GQWE+EXtmj0GyaOydvA4qbBzZ9cSzb1zkViMT0bwjyl8afAy+jVEQMIs0BorH+s=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168776721446661', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(247, 2488, 'chudasamav37@gmail.com', '2488_17603', 'xFuEWzwngwq0AkzEsdOFqDLxkQpF1Cd0e03M6hAU0w7HV2cfo2SQIg8HbqK3cD3tr0N9E2SprtQSvTnOL/KrN/WNvcQWRf00CahBij7Yp7A=', 'WALLET', 'TXN_SUCCESS', '20200330111212800110168980722519102', '30-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(248, 900003, 'sugrivs946@gmail.com', '900003_29481', 'EdMHWVnZSRF6DssMhbK+UJS67IygQ6nc+BRFoKMy5lhZgjjn5WogO/W/yEprxgBt2eASSdL0F9AwRD2aUKYZON/q8+hhR2O4QIujoe0AJ3k=', 'PPBL', 'TXN_SUCCESS', '20200330111212800110168353921631231', '30-03-2020', '25.00', 'INR', 'NB', '01', 'Txn Success', 1),
(250, 333, 'rajatpanditg17@gmail.com', '333', '333', 'manual', 'TXN_SUCCESS', '333', '30-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(251, 2347, 'Srinibash57@gmail.com', '2347', '2347', 'manual', 'TXN_SUCCESS', '2347', '30-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(252, 900287, 'gautamkumar03798@gmail.com', '900287', '900287', 'manual', 'TXN_SUCCESS', '900287', '31-03-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(253, 900350, 'sreevatsaasreevani@gmail.com', '900350_21277', 'BJQ26DZb52LyTADX7GgKOpGbJMc16WprrlMARzNXmaNfz9vJmmqF+Jq69PHqh+VIBH7x6DuB+mqx/tg5Md6db0HRFfJI0E0bSm8+xIraAjg=', 'WALLET', 'TXN_SUCCESS', '20200331111212800110168679121562528', '31-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(254, 900359, 'indrajits932@gmail.com', '900359_19145', 'FjxUfYQ1+G7qIOn77K9thRhu8odGFTQwlvGs7lpNQUKTlimnnAbbFOBkWWIm9zp6wVZ6b+nrlxoHrE+i5aM9V952zEK8zJSxVnovDot2Z2w=', 'WALLET', 'TXN_SUCCESS', '20200331111212800110168798921963645', '31-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(255, 900369, 'sanatankumar379@gmail.com', '900369_17099', '68vsDh81GlGpcZn69QowrvHtGuOyRSY+oUpM21Vuk5HRocxmDwjoccWSY+nO0xiA6AmPRzCV2XNLfp7GFPYN+rUqUON8sXagOtE4y3phoyM=', 'WALLET', 'TXN_SUCCESS', '20200331111212800110168721521604442', '31-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(256, 0, '', '', '', '', '', '', '31-03-2020', '', '', '', '', '', 1),
(257, 900388, 'khangauspeer@gmail.com', '900388_28048', 'jrwqn4l6PRndXCuMFAzWiXMRnyGVjzBIF3Icr6Sosdecpq7Yzz+EqMeQEm0Sts/hfC7YHf7YnXzyWyFHG17Ceem0zV1bsDwakGp7iDbLqrM=', 'WALLET', 'TXN_SUCCESS', '20200331111212800110168798221968875', '31-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(258, 900393, 'diliprajaji4@gmail.com', '900393_21128', 'yhxSak79/HGn3vV76WVyaMcjIDVYvbqOiMtDl5OSUtmDqPtCNoL4eI5pX0iLxZvb9s8WwoKRazN4LYpsmmbGJiMxqvWHygz9B8Ju7OOGrkM=', 'WALLET', 'TXN_SUCCESS', '20200331111212800110168092522055506', '31-03-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(259, 900280, 'khansahil9769@gmail.com', '900280', '900280', 'manual', 'TXN_SUCCESS', '900280', '01-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(260, 2421, 'wasimrazaansari@gmail.com', '2421', '2421', 'manual', 'TXN_SUCCESS', '2421', '01-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(261, 1477, 'udaybirfdc@gmail.com', '1477_21175', 'h9c6eBmUBZVCskw3tbHwxyXMTJ1pUWjRUNTkWUF8+PTQ2Xn7wpkpRKZ3A9KymCHTHOSEjk2WjZ7yHB/XeKEhLri90S0JGlka8BJ7R2EuITs=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168245021901359', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(262, 1985, 'nazishofficial@gmail.com', '1985_25475', 'LFDTpi+9ss5wjeVfg9weU6ctx848OxXZAwn4+2BtnJv74rkd0KFg3JwfFur1KYU9S5Bpd6WQwH3P5oHSTp9ml3jFY/Ehrt8ihZXMXvkK7Tw=', 'null', 'TXN_SUCCESS', '20200401111212800110168279622260364', '01-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(263, 900433, 'vinayreddy0109@gmail.com', '900433_21043', '3CygKPAA+qk9Iw6hucvIolzZg4CF5LMubk5irDdF/TMa23UIgvq+SplkqkprDJdhgUwQrsUYOhxFPIc+V9PQ7Qc8DyBVuBaS+qN0MBiOBiw=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168204421760617', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(264, 900434, 'surajnirala903@gmail.com', '900434_17438', 'QcMqDm99spr1dwGf94JzhU/bxre3pZy0MG9kNETqnGIcRP4jOIHBanMr83X0v/Dk/IMOrrsXDp4qBfEMEFhIITHDkaOXHlfsA2SkS8BKUfI=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168528521538420', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(265, 900442, 'shashankyadav1sk1234@gmail.com', '900442_15107', 'nlwHKB/rbwb7mkxny5hf19AiQ9+fWgjsj+h2A0zzQDDuu4A54J8NONPrXx83uZEcAQEj7R8CjT8RVrpR+4pbWeLMCsfo7KzFIw0QVuzDjZQ=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168588422615059', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(266, 900445, 'harishsharma5482@gmail.com', '900445_20783', '8V8PhpUTxrgFSDNDDga/DXsh2ZIRDkeEZusdxZo2IkCd3GwfZKtklOwLWuo7jTWaBQTehCeFV1IXPlSU6YlnT7Y+qwIm55zWXPaM4hYvWps=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168817922055703', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(267, 900474, 'kajalkaushik550@gmail.com', '900474_26294', '1OUwJXqEje8NjGG7oLtTWl1tXJ+C3BS5cMsfSR5395ser3fhNIP5mLNZz692UOdWzkpOlN5Fh9eiFx3JLyLShU5dyen6ZV0wnrbE+Fnvue8=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168826022031288', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(268, 900182, 'bikashhaluwa1@gmail.com', '900182', '900182', 'manual', 'TXN_SUCCESS', '900182', '01-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(269, 900491, 'raghunathchauhan610@gmail.com', '900491_22962', 'RZItGtSWu18MVLhggp3SkdwH0tep1v2IwM2R9sz36/wEia7PlSVenFqQjH0eUmo6hBx9MZpdHF/FqOXx4uZjokGSsCnF2rkXq4hI+5/K7d8=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168775021720754', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(270, 900390, 'ronakmohata80@gmail.com', '900390', '900390', 'manual', 'TXN_SUCCESS', '900390', '01-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(271, 900477, 'Yemrajrebari579@gmail.com', '900477', '900477', 'manual', 'TXN_SUCCESS', '900477', '01-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(272, 900542, 'pradyutroyasn@gmail.com', '900542_18558', 'olAPT0ZR2Tf9Mh+mJj1y6nIIF+a8AJtmBxBMzRt+R238OXjQ+5pW5+IxkGrs5ru6tuL5Y7Oc+YyXh4eij5uJIwubJVoNkLEtOj4dGyHFFaA=', 'WALLET', 'TXN_SUCCESS', '20200401111212800110168681122021869', '01-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(273, 900627, 'rahuladhikary6294561696@gmail.com', '900627_16001', 'QLVLHT7ywxOpcvHl6mb6RqwoUT/2YlDbt3ma7Ac/5jaxYodu8wtYNqPcnkme1jYK/6reQ3fHGJsLlgwAiCZ/Siz8n/9pizLMIXgHa8aCkXQ=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168090822243453', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(274, 900630, 'harishmeena246kunhadi@gmail.com', '900630_10891', '7YKKuJTTfiNtlBTrDxVcMwRhriQd9XL8KBNf4Ajdl/EroHDqVrS4QZ1YZMOC79R1MCnt609KMjrYgEdsmLYjeI9JBEmyEROp0mm1rZX/8+I=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168242321990311', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(275, 900631, 'alimulislamsardar@gmail.com', '900631_28726', 'zrhhnW09KP7lDFLUL6vWTtqaQ4LwVPi2iZ0WFfjv6KWp+20FR1qRSV/1DyrMTJznxRP+jSXay9/NXwyx4Qk11NJ69xKbb7fX9rZ3KmzRmOo=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168337621937787', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(276, 900663, 'makwanamukesh2001@gmail.com', '900663_14238', 'xdKGNbGfwMa1J8Biz8dlgYFEH8bxPy+Ff9UeL6GuOIlKBcvz4CAGd59H870eHlMHBdNwz7IcXF7Orpcqj15/8p7C0Q1C88RKsBLgz5b9e7Y=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168490322020539', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(277, 2413, 'jadhavsuresh11@gmail.com', '2413', '2413', 'manual', 'TXN_SUCCESS', '2413', '02-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(278, 900658, 'techashik1@gmail.com', '900658_29727', 'ZgAI8VCzVmoR8YKunaNTeIicNqPT7r5IWUp5k9emx+wZTS4kys2zFf9z6Ol8Cl9rjRMG2Ppo1DrJu1r0xazFo0AOb8T+78GDoYrmD84FTVY=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168709621741600', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(279, 900717, 'vibhajain2802@gmail.com', '900717_29752', 'LrQ91FkVdxmDA5THEzYUWia78r4/7V8Lhd/9ntyYbEWoApjtMLtVwhz95i64zrXl+OcnSgRXd64NheE/Miex1tZYAO7pLOBwdoL5roCucWA=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168663821800611', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(280, 2437, 'skdungdung8@gmail.com', '2437_19073', 'e+Hlef9pATSPJLeBVjYo7z6PdexMqubLf7fA9KJBt5cr+c8UkxwfiAPx4AdH3Mu7cP9oBhyoN1c4Tye6qUfpiDj0PsDgKLRZWMLUFgpzfxw=', 'WALLET', 'TXN_SUCCESS', '20200402111212800110168336822032889', '02-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(281, 900804, 'murmubabulal86@gmail.com', '900804_13551', 'PoCvnUiwsEhD6QsJm73tcG+8labWUNre2XLwX8rFBnW0Sfwe/RTtkqc36yDaVmHO+ustgBIYshbNjYLluZs/FhyJGqZYKEmWRIAUTf4/kvY=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168694021723784', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(282, 2372, 'debasishdebnath247@gmail.com', '2372_14348', 'UQCd2mAtdcuunbP75jWHNU+pqTlsR3GR6ddmQPQ88ckFT4D8Umx2wn3+pEUhVhgCQLfBjsxJcPVKSSlE/E+fIX/zhnVPTftaFndvI5EeqVY=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168911121942984', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(283, 900821, 'chaure408@gmail.com', '900821_26023', 'fCtxV56BCFtWt/3OrTJf6PFJg/FX0JXcZo+KCStCxLBsx4zHhLNlKp6olpKReJxrxRpXsDQ136ZBZ6LTgWsTFHn6lTNg2RT5zbj2pv6/Em0=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168445222215252', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(284, 1858, 'sekhonz1official@gmail.com', '1858_25754', 'Q6RFkwKE1gQj1xTWdc3e+UGII2hAHIgzt31LvszyFz3hk6csDOqOXf2c2sAcQn6psp2xrcIMqJyOqMZjn4Hz0axXYhRmrnoAQnW3yVUcboM=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168902721977503', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(285, 900617, 'vittalhasilakar@gmail.com', '900617_17469', '1EMKFxV845kZmYVIv5ZSnsM+KXiUcDfdJ8wTgU+38KnLrh40Mq50Hi3+31gav/C21G1tFJ8wNvTxaS97MkGyUkA553c4lIKNI/xwFz4cKaQ=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168811422319272', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(286, 900874, 'ks311097@gmail.com', '900874_12843', 'lgY9SBEYhnsnTMZ2A0RA69GvPLJJmZUJMNLSvCA/rnAyNuYFV7DW44lYAg3SvtyoIJ2i7bcusFA4mC1hm7ZMaFK6RXBuXK+sGA7ujmO9mE0=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168476821785507', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(287, 900878, 'ajayd95483@gmail.com', '900878_22543', 'P48GBais76jf74PHQjh65n4Rd3OUeCgp6xOzWC5AeV2iTB0S1Pd8mEp8rEHjEHtmNpbnGSsfCJy3EHttItqrMN8NuG5tUoq0xtqmG4yCN4k=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168138122097897', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(288, 900881, 'sammaun.mistry135@gmail.com', '900881_20498', '3YCDIfG0SF1cYUCmuCt8Z2teL7v+B7S11ecnJKB78SL3raOIAQwcYCbnqS+kxAM6WxJFg/99zYsrbX+d3UMLrR0QoUWcKIj2NGGJSuLfbmo=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168944122324045', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(289, 2262, 'muskanshaikh7056@gmail.com', '2262_26048', 'b/9zYHEYsAo6QoBOykwLpyfAhICT8vIrYIj9e+krp7i12BLb9HtWNcDuaTs6QObIwZPRLpxtK4Aomq/H7CJKtHKAoifs8Lj0n8RMUZhjWRs=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168438222133396', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(290, 901077, 'satiya.moorthys@gmail.com', '901077_19876', 'Z/IRhJ2a9gqHxI+2MTjeOJjz4VSLfAFJGa5ZXrEOMh257TpECACRvRdMjAJMOFlUGUrL2/EzRgc+HlWU/L7p5mVtvB1lsxo/ovtevxEODO8=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168382422395909', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(291, 905848, 'ajithaj2001@gmail.com', '905848_21245', 'oJpjyi4JjfLLZUIo9px63TG+K6W06YHHfxkwUqsSlkAVe8gjLclV5X2kSjwoOVvWw24GJrdliM1dfKA+jLz7mQxEwB5BiMh8iYhNnQ9qWy8=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168938122200251', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(292, 932706, 'sm7761948@gmail.com', '932706_22983', 'TQzLZMRRveaYfBiIlQ6ikd8L6xn1HvD0vSla8JyzMrV/5w4wM6/kU0iWjpvLT3RfoUZ+nsf5h4qcG+IJjnFaGZhnfyOVOx3jJPbnrn96W+o=', 'WALLET', 'TXN_SUCCESS', '20200403111212800110168342422150365', '03-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(293, 932711, 'raneyroney779@gmail.com', '932711_20146', '+OiEkp33uNDJwBQUs+/eFTQDJPLxDaY691t3vR3q4mYLksweEyvs3pt1Bad/v0YmFPOTh0jJumnWoh1Hvd32oGhYc3XbHuUNhLN6cjYHPB0=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168694221798771', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(294, 903604, 'ajeetrolaniya@gmail.com', '903604_24941', 'OD5bJTLtHdcKSy97PugYtv7csBXI9t/9ChB3308OPGHsWxZ7+KA1e7/Eo/cNCy4UsHDxSKpgOOX0g0LLV3OKwzZA6zwitWEPdmRQ3W+17vY=', 'null', 'TXN_SUCCESS', '20200404111212800110168676721963370', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(295, 932930, 'slimshadyisback07@gmail.com', '932930_22087', 'tNdwc535UhEdfdOxdncqwn3AYr495tvJuojeMSSUA+cvkwLawmqV9u21w8GvqCoAe4i9+Yhlyepdl24kEqZhj3mwl4miHi9u5dKCV9SRdw8=', 'null', 'TXN_SUCCESS', '20200404111212800110168787421874241', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(296, 937796, 'madangopal91053@gmail.com', '937796_21866', 'shBJV6DQfawQ3LDj6aITozo2bL1IcZPlyEPJPMfLrJvWt2ko6qULbwvrqXqlZBF4hysFa917w5NHBW1WbuuCkyx7d/joXDBJ3CQZHHv3oow=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168711522166128', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(297, 942825, 'santhish1234567@gmail.com', '942825_14105', 'KIj9y/znbSamiyHgK75fW7htFulWheok0k5m/f/xQ7sCxRkAdy28jHRMi5ijOmL/X3AbAqw96ErnmFVscwVTG9bCMDa/sv1I5ZDjdTigfdI=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168723122008888', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(298, 932968, 'harishroshan2903@gmail.com', '932968_23944', '6Lb9UyXMRYvDZr4JY9IUqUzUJ+htiqYLiFwZryvJuPswUxMbjsXNUh1G8I5Srk3peeziwIHtapVyA6dqqki6yw7K9IMignFCXo2C6CLte48=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168564521873286', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(299, 1989, 'devendragoud7974@gmail.com', '1989_28933', 'gbAyyn6km+3ypp4r0cVybVTp+q/oHsbSKGii0BzIjhvDvkXFuDbesTMkPJzOFCFysFW0j9yMLpEekZxRXixDr0j7QzuKEjmw1ZNK7/b/k0M=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168498122303467', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(300, 903190, 'rajendran.kavitha21@gmail.com', '903190_26174', 'ddXfyefMpRF8gjQytS0SVDcF250gVbbtb/CPJ4Mt5uL8miXM07i/Lpxv9Y28YGXVNPG9gihlNA1B4CdEpUKm/65ei516uFUBu5mfewqu8vE=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168830822341425', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(301, 963243, 'pradipsaha4268@gmail.com', '963243_16793', 'BpWo/1ksRvf6h0BJTHPSOe8GvyXui6i+uQH2qkl6nexP88HgSSYuzZcKLFGTlDwgs5bniTkdGwOL5FYhM756vvFqLVpHXtPj+F4pCNsPY+U=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168763822312988', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(302, 940225, 'ngamers0707@gmail.com', '940225_17148', 'tlmf67tENLFudZSgAgiqdT0mgYTLkAwgxkhB/ybbvWMHCBv48g1TulSYrGbMVUQRiEuh7EveR+o2/pP7iVojEysNNdyZoP5A32agr7bF0FY=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168242822312075', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(303, 905069, 'monutha123@gmail.com', '905069_12185', '2OI5ZlRYrGhfobHfj4UiQ1fye8J4fxi4mz6ilub29SvLHrmmr4wmaC/Ow0OFgwm0kofQ37LPCYt+3iiIaG1Gq4cZs+HJO3ub5XsKCxEzsWI=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168117722436245', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(304, 972217, 'rushikeshrath10@gmail.com', '972217_16993', 'ZPgNE1LZyODYyNEeGo7QJYhgxWYNDynO1HIhhC5/Ky1s0quYrfdXIjXY5h+BCqVxanU0rFNiylSWDi+OaumL1CJxL+WZuQUHi9iKxi3cNdA=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168074422401855', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(305, 900893, 'mohammedthaha8138837679@gmail.com', '900893_22871', 'ysxz5+pZCM+ht84Loi/FPYb+3bclBG2G25UScx9D4oUvlGJu4jyaZDggBwfSNqdxVxW1Sxi7dm5By76bzJDWkfQYqKWJ+1nf3lBcfD5h/Jg=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168529121958803', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(306, 975507, 'vimalsinhr@gmail.com', '975507_29964', 'qJkyCZOJFr8RHPgvd1zhBbTxN+HozLFTnd3jri6gxb/Rp04J5sTpiaA5xRPgQhXChvbIswMjY0mIy97hDrGtRC6PzjfJ4Y2gvuh3Xh2O/lg=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168628722286285', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(307, 978762, 'rajputmukul894@gmail.com', '978762_10030', 'yFewbtfiAWW8VK4aGl+ydEygtbhxmU49pTc2LsaNo/vjM5z3UPgKWooLJk6t3HFWvR5cy+iXcec61uLDs2yC7Z2TOHSvm1PCVk12AtkAYVA=', 'null', 'TXN_SUCCESS', '20200404111212800110168561021937353', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(308, 986195, 'sanjayksharma00013@gmail.com', '986195_14630', 'uP7YbPrS+GXKhiiH/kh7dZCKApHZlxL+1GyT02ujHg6kDUn8bpWc1COyYxtCglTGdFqO+rCZZhomYnU9ExWA/wzLctZsfThRhyuZjJGZk/Y=', 'null', 'TXN_SUCCESS', '20200404111212800110168335922238643', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(309, 2432, 'sanjuvarma4129737@gmail.com', '2432_20916', '1sLAEE17v/rfxlXM4tKlCSEJOnnYB8dvR87MyEAzOqtZE8LjQhKa5+ggdXTVWkIK1FwddmupMC+62coS4MTZaepT+LgVnJdhsvrNkucKlVE=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168746222658534', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(310, 986692, 'nir.1984ku@gmail.com', '986692_25373', 'astr4v+qnQTRH0pty1TcA5/S55T6jKiu434IUtC1Z8ioHErpVADfgVd1X9oZnzVYkJ0XwB8+4kuB47wuyWrqrgMbwTVzUrASCCdipyfS91g=', 'null', 'TXN_SUCCESS', '20200404111212800110168537422392738', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(311, 946518, 'vkv56116@gmail.com', '946518_20714', 'm3nSKOAnqteNCi7LNIxXt6BacdUC3UBLOe/FpwPyoGjS69fMx+6RUXx1ZumQeOE2lnbLz93jGNX3SA2PDVMIH82/xkRCRe5AK3MiFB1WCu0=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168629122350928', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(312, 987490, 'santosh07062003@gmail.com', '987490_20988', 'kP6kwE8U8Oo4w7WbyxjP+cvYt7w1OPlHsTXyAB3fY42oTpVCWfIvVpmdcckmybW3lJF8HU8Ols4Qbr3s2yuW7VNq9YdE9DGe4upGfIMzdzU=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168598922380379', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(313, 987807, 'kishanswain0000@gmail.com', '987807_24787', 'LkwQ3bwCE3bkJSKRxOH+qVSTHWHN3PsdjMHew1hHYHWRMZSer8wRsxSvbQ5pmigtVxrN2ustqxxZxs+lLQcDc9bqGWeHiTaUyXTVcKJDX3Q=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168124922139830', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(314, 991873, 'kutubkhan99@gmail.com', '991873_16576', '7hjOFbgOZxyXYQuqFUzZjC2bI3IGgdXgITA0z2AYeFTgKXYRCCMaf/VSw7TYHgiZ+7S700NvetPd/PKv+cJgknYeUMhdZCaz/2KjpvZG+6o=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168918822140554', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(315, 2154, 'pabanm423@gmail.com', '2154_27701', 'Fb34GPRiMUbGVfVj2lR1DMTuQNg4UbNXAiPGHxnHDLJ0HPTKL5vYMjoFbEAHLSa7oTxrl5zGPYIpQ/QzJobQbm+ZPBpxD1nJnB3Cgc0cPiA=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168347822142139', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(316, 991906, 'singhabhi4430@gmail.com', '991906_10396', 'SdSehM9oSsa9Rg6SM+MD68FHfyq/ihAYVx8FXP2AUVBP0Mb612SK52v5FBt6F9xGvRAmJ3rB2TzS3TSec8KloLGSDE3PT8F+gV4uT27zJt4=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168886622389569', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(317, 998396, 'aurnkumar7778@gmail.com', '998396_20903', 'cEx0wxLGwJodz1Hx4yuIub6QVtC2Zf2PeX4cJciQXHhFS5aGZwSl9Ac32NHnO9b+GF6KG1frRsTjkLLhiXcEOT/DwUNAS9fEcl1wtosZhqs=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168012122187146', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(318, 1000104, 'jrsaravanan75@gmail.com', '1000104_11331', 'D3KZGKSWno8tTiNqesP8enR+vA4f4ZahLEThog0zohp/YtvDu3U68I0JQQ05dNI9ckYtR82RG4xtcuT7J0OhU402FuP60zslqJUnCmJSNgA=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168121122184596', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(319, 379, 'pulkitmittal.rrps@gmail.com', '379_23683', 'o3lvjkMDa1YbW6ZYABoVVLjlH4kY4yboDiwkUB2iyiqnYeUXEg6C+HUDZrw0E7JhDd8Qt68krXWnv8aCfk2uDU22RXvBJhqe17SDM6uBUek=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168821822387723', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(320, 2092, 'zahidkhan66285@gmail.com', '2092_28543', 'T2L2RG+p81NopfF9pzz7x17cC/NuTnCF0mtSLxAcD4IW336UBh/DZaSXADxK+fA7m/yj8D2Pe6u3yyBLiT6boDME0rzDEKflFOrtVUoZdik=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168785421929331', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(321, 1003444, 'holisharma04@gmail.com', '1003444_25511', '3E/K42nonDKRPe4R7suK9RDfj2oNcQe4ccANt6GzaNa/SNIv5aP4FInnln1BixCTasSBo+PVHc+mgkYjHBYwYIZPjCjutZEgpvZNZzYd0HY=', 'null', 'TXN_SUCCESS', '20200404111212800110168938122292151', '04-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(322, 900255, 'ww.tiko785@gmail.com', '900255_24748', 'wN+IFiuSn08WvfYgCn2SstZr5RWsSsmGj8cojRQK2ryzNdpig7R/MNmn30KH5M/vsjEsWdWoSEWZetttcDcxGKDin/AuiOxQN+jyVAXIf1g=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168918422171533', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(323, 1000490, 'arunkumarsang73@gmail.com', '1000490_22049', 'sR4Fdi1zYCxrTgw4wSxaIYZyob/TX0+wVC/+cOXPQK6tTWL3iqg36+2MJQfEdzN4rLuAtOacktyxhijs+iCC9uZWDLPWLaKtbrNXdqO1c1Y=', 'WALLET', 'TXN_SUCCESS', '20200404111212800110168103522181401', '04-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(324, 1005480, 'avijitmalik193@gmail.com', '1005480_27865', 'VHeFz35sp+Jcmx90wqJIbuX5TYSZztRCAyscr2MIuaSRQOigPPs7tC04Y0mZygcF33MMbPxMnG966egRALNwFecH25XpqbWrmw4JKDChBuQ=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168274622712580', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(325, 1005608, 'neeta.punjabi64@gmail.com', '1005608_25058', 'etQ4MyaynUw2KUxOqZC+OfrUYZabHZf72toGs86z53Te0h6ALWykbmAXWAiuWx5XHdTqzl5UJNbp9L6EphsrgoQF5RLv9HKEiyk8+9K9Sag=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168370521873931', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(326, 946820, 'amreenaijaz9845@gmail.com', '946820_13635', 'rNwnxb496hemTB3/td4TwaK/fOFbJO8WjkIacG0gEQ+A1vLvXzmTeQJXRK0MhmhBcg7Z0T9zu1ToGKX1NvPUQHSe4es0pO8CaE9uLGMw1Ls=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168948722509031', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(327, 1005626, 'annamsrihitha66@gmail.com', '1005626_29552', '6Q74JqCL7c8xoRK/BeeGp8n4PQ1wFQEiTYfhT6/kfxy14S9exG2XuclxhVKuSCtor2ElQIVCOxHy2sgHPfB+ZSlfz0A+RjaN10Wl85L/jUw=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168665922134312', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(328, 900561, 'dayashankardsk4@gmail.com', '900561_25449', 'Cf0+125jRJZFITAyTlmrM9SWh0orpjKLWdfV4ZmPHN4dNS+RXMDwYynSEaLc8fMu0jhWn9oyjUEL7uV7O4cJChrrrBAbKDuhbCvxEfVFrW4=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168820922583121', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(329, 1621, 'raja01x5@gmail.com', '1621_22084', 'X+zqNi0dPGwZEpXE5lF8yj8GiWTZeGXPyFrCT2z2hm+RUTINf+3KHcABVCemu4XvM6ssu5B/nutjnANs7QjKn+uRJ1B+FXYRwfgRpKEQxwc=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168677522217267', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(330, 1621, 'raja01x5@gmail.com', '1621_22084', 'X+zqNi0dPGwZEpXE5lF8yj8GiWTZeGXPyFrCT2z2hm+RUTINf+3KHcABVCemu4XvM6ssu5B/nutjnANs7QjKn+uRJ1B+FXYRwfgRpKEQxwc=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168677522217267', '05-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(331, 1005788, 'kabitamaurya099@gmail.com', '1005788_10284', 'h+7SxZufkMSfF64k6Uyv0Z2LSqGBoAzg9fU6yXnBpiru7dRzTkzH68HA8wO22iJ/2UBrM7ORXSoiwXCcG+7r1o6g7TEKMleYJTy0AJKKywA=', 'null', 'TXN_SUCCESS', '20200405111212800110168239722563917', '05-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(332, 901513, 'abdulhaleem100313@gmail.com', '901513_29906', 'rzCC+ZqNj/S85EpJP1rz7mMG4INKtCXPdyVJjGvDzq9mlT73+FG4SjS9wQSTfBepsFFVDL4zPEoPtZDR7Buo+yuq/Djud/jL9fmkO/vaFtU=', 'WALLET', 'TXN_SUCCESS', '20200405111212800110168348822395246', '05-04-2020', '1.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(333, 1005808, 'aaakashagrawal3@gmail.com', '1005808_24800', 'KKsYR4a4VwgXUaQBrHGOAjwFM7XbPeCQimgxvHbV8dlOACyfSFZ8lNxd9b/dDJq2b6VU1mHiDO1ICeBSUwnblzYd0lKar4Vd+P+lRmmFpek=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168336922385123', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(334, 1005786, 'ajeetvaid@gmail.com', '1005786_18347', '2zJotPnEvUUm63DdUCDyMff//Af7zfzaq2IOGBW5uWDxcs6tXqzem8yB2zKtz/f/JIiXjTfvNe0gJuRbJ4LQHs6TfG8DagDCyO8qkYV2IYo=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168716222388043', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(335, 1005814, 'raopoonam1982@gmail.com', '1005814_23570', 'N8jGDwmI1d/0gb8R5DzEiXm5nBj3yerez3QEPFJS9gVPdbiB9UOIRSoJi1tTVlpNXL/CLyfInvFa1HsmT6CO2EBpabZypYAbLK/xwuftFAo=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168171622274929', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(336, 1005815, 'nagokumar5106@gmail.com', '1005815_18772', '3gfs+OcNjRLwbZS6eyfQw6UjdjkDMpSoZQuD32MTfRJLmPn/s9ugH9uBfkfgyD3IB/CXlipMj7VxjH1UkcrEr9enLyqInFchs7LcJjCLnF8=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168408422229483', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(337, 1005823, 'vishalnagar637811@gmail.com', '1005823_23341', 'kM5T1s9YPEv8p0cu5Gg7EiBKANKPcYuXdJgAQ+EKZY0HJrmDk+TZmJJqXukw4yhjHwRQPDMygN/NcBHAz4HTQvmU8Hk7IXPtmF11gvWBHA4=', 'null', 'TXN_SUCCESS', '20200406111212800110168392322801568', '06-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(338, 1005832, 'karandhruw935@gmail.com', '1005832_27904', 'zyJBnwUudRuQVXj/IheRIqCqSIJnsQtQC2L/ZWcZdpDohbzXyMYTz089MjrtgHSTKGEIvsZQ2p4mDIrtCJ7F3K2p+OD8Y/UjNziXRnwEMrY=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168765022490058', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(339, 1005855, 'jeetkaurphogat@gmail.com', '1005855_11874', 'L6+qZ3Jcc/UeQYGYKFd5DTbQd1dXZPX6RtQIxHxeC5rxv17zYjCq5Uw1CcbIXStHG0909XAixiWJ16sfa6+IEcFE+HsYvwVe4t8WI5isAdU=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168307822553798', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(340, 1005852, 'manojkuvaid@gmail.com', '1005852_28869', 'riV69URNTMliJdJ4GkhD/7atsuHpr/Mdee894hQIr95pb+WoGkKziFA9jOGrSy0s7v3BaSlgAhAfhmC3KE03ivrPtA4HWfFovkFyrmJMfUc=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168817722750010', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(341, 1005852, 'manojkuvaid@gmail.com', '1005852_28869', 'riV69URNTMliJdJ4GkhD/7atsuHpr/Mdee894hQIr95pb+WoGkKziFA9jOGrSy0s7v3BaSlgAhAfhmC3KE03ivrPtA4HWfFovkFyrmJMfUc=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168817722750010', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(342, 1005856, 'raghubirvaid.1949@gmail.com', '1005856_26756', '8spvoLguycWBEU66gsh3SWjmpAxh/NOaQTg9ediDBIE61Gejxd3W00W+PNMHr6iucNOnYzI91BtPig6xyT5I9q2mfvCOTPq+vqvBZHx+hLs=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168665922285168', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(343, 1005856, 'raghubirvaid.1949@gmail.com', '1005856_26756', '8spvoLguycWBEU66gsh3SWjmpAxh/NOaQTg9ediDBIE61Gejxd3W00W+PNMHr6iucNOnYzI91BtPig6xyT5I9q2mfvCOTPq+vqvBZHx+hLs=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168665922285168', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(344, 1005747, 'mh8836727@gmail.com', '1005747_26525', 'AKtn36Q+L+TmLvipfKyhhmKDKZ8AGBUi7p3j8oOrKI2K0hGq8OL2KZ2kIQsTgREHxYVPOnJp5nOeT39d5ifknHE9pI+hYQ3YnaOEu7Cobi4=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168379622064956', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(345, 1005883, 'singh9815389732@gmail.com', '1005883_20091', 'pdzh+WmslT1BazXClIQiyUU3Uf1SRwtKCjohTLOY3jsOPeCoLtmNoo81aFzV6/hrlpOFf41gPml0VzlHN/hNf53fMUtkQaDIebceMSpNnn8=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168228822846779', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(346, 1005884, 'mohdzabihullah3@gmail.com', '1005884_16969', 'crJ8z0jxw8La/bDQuvZm2DKplCYoNQ5e2oFzeRC0LBbiiUI1IRMc4xFeQlHjY+68YxG8SjoIZ8fI1M2mg1tnuGFkfvG+bIltWLh66FcURoE=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168487122330080', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(347, 1005886, 'anuragborgohain56@gmail.com', '1005886_14493', '3/srlPlnAIsWCGpReQtM2TTyPZCcDqcvkcmpOZNqnXhzcs4zROyJW2BeXIqTj+4nIPqR3+JrbpgcmCQkYSemDfAoeuv1SZVpXqQJK6cwK7s=', 'WALLET', 'TXN_SUCCESS', '20200406111212800110168868622323588', '06-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(348, 1005879, 'aniketadak148@gmail.com', '1005879_10730', 'ARGpczligpJMVvzoIcP9a8IxTSx8Gd38N24RizYttKpWCnua2Fd93CpmZ7ZoDTX26J1WZs0oPZ1x+wMfrWyoGcVjcmb25qzbyRbSTPaFONc=', 'null', 'TXN_SUCCESS', '20200407111212800110168489022441721', '07-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(349, 1005819, 'rambhai4617@gmail.com', '1005819_21532', 'wpm6GR0P8YDMnYIyExVunAdB29ssrkXh92pA9y8PFQ5UwgJKLmBkrN7+thSuGn8oCE5AJ6EWWnVQ1bp3l0FCZuLzgzz9Ond6Jw5USoWLMNc=', 'WALLET', 'TXN_SUCCESS', '20200407111212800110168221122917406', '07-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(350, 1005990, 'sahilsk06927@gmail.com', '1005990_10300', 'mCGz2ysWBgoD2cD8RvyDq5j4wJqfnLneWtLXW/EsWiAJHA+iAYRFj6xtEpvxAKCq9IIuwqkQByTqu3PoHs8OOcy+4rWqTr2yCZUjkKu0XqM=', 'WALLET', 'TXN_SUCCESS', '20200407111212800110168858022562496', '07-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(351, 1006034, 'jijabapubalme244@gmail.com', '1006034_14567', '1P2vsq1xCzE4wbGcBO5K7z5+KUywWH8G1RvCvJ4+ZaEq5H5SOby/cjc5UcAyiXz5v3UH1K50GTxmY3fqFGCxTxvy+Av3CNXjJDJtZs2vCa4=', 'WALLET', 'TXN_SUCCESS', '20200407111212800110168484422500205', '07-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(352, 1006022, 'pertimemukut@gmail.com', '1006022_27659', 'VaWcGuyccQ8TkmPY02apO0Srh5qKjiftnrA+Bkqq+SoqGVT/6gk3uvTwjJtw7fDFVoVWBgSbxdS05y6ifaNoWjhsKLoSkJdde2JYbXGR4l0=', 'null', 'TXN_SUCCESS', '20200407111212800110168234222754891', '07-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(353, 1006105, 'hafiglp@gmail.com', '1006105_25162', '+d9a5KicLBJC87Sn1gyt35ZnxIoLq9cGP+lc+7QStlbr2CK0/Kj/2wKcVB0RuHNVuyWP2NUpScuHyRBB3AuaVgcAdJH2n7fxK9NzaitXUoM=', 'WALLET', 'TXN_SUCCESS', '20200407111212800110168206022540608', '07-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(354, 1006105, 'hafiglp@gmail.com', '1006105_25162', '+d9a5KicLBJC87Sn1gyt35ZnxIoLq9cGP+lc+7QStlbr2CK0/Kj/2wKcVB0RuHNVuyWP2NUpScuHyRBB3AuaVgcAdJH2n7fxK9NzaitXUoM=', 'WALLET', 'TXN_SUCCESS', '20200407111212800110168206022540608', '07-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(355, 1006121, 'kajiajijulhaque@gmail.com', '1006121_11066', '/Zerr8s083VsuwMp7Fp8tuZLGnXe7bip0HqtrXvxXr8uX49IUxkGbYiQtK8J5Y9gXNwfGE6psJeYGS5c+ntIOjdMHApx5Bvbk1bzhHeolXA=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168249022780230', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(356, 1006121, 'kajiajijulhaque@gmail.com', '1006121_11066', '/Zerr8s083VsuwMp7Fp8tuZLGnXe7bip0HqtrXvxXr8uX49IUxkGbYiQtK8J5Y9gXNwfGE6psJeYGS5c+ntIOjdMHApx5Bvbk1bzhHeolXA=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168249022780230', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(357, 1006084, 'hafizur.glp@gmail.com', '1006084_11897', '1bgT/ZbiQjnjtUYce46KZMfbz0mAUKFEoy+2XrLk1lU7kk7Ylk/UT0gZLIoQWA43UgY86m3O/ACxEj4yehui+Zir87a5wC8lME3tq54hRVM=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168342922639253', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(358, 1006131, 'sainisainisaini7027642069@gmail.com', '1006131_14422', 'PBGoUluL2+ByvQXyl2FMkyoWyUU7DRJBM6EG04vjGNnOMxh7NVrbrNHrs2X2xwZjlwj3/ngIkn7l55Gs2tmXgh7zTAznrvqUK4lT8tfBAzw=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168480522528437', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(359, 1006131, 'sainisainisaini7027642069@gmail.com', '1006131_14422', 'PBGoUluL2+ByvQXyl2FMkyoWyUU7DRJBM6EG04vjGNnOMxh7NVrbrNHrs2X2xwZjlwj3/ngIkn7l55Gs2tmXgh7zTAznrvqUK4lT8tfBAzw=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168480522528437', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(360, 1006125, 'sikandarwasta4@gmail.com', '1006125_27183', 'eByuZdc/+CVemqNCARxVcESPNa5jpHgtBawyKOB/Y4x8Vu/PoTRgsmQuew7UB1wymWz1hVBfko5fBNQtYTGZcXnGHV4ZT9rHv9CRelutxsc=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168614023418207', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(361, 1006146, 'skhan752021@gmail.com', '1006146_25687', 'bf+F9W07ciZETe6KxiHI28JKGOTQCP7Lz1Agkt9T/RtYJDUGikcW/CSQUNdKUy/NBiDJZUF+dVnVMvubCFc+98XRpTgRvX5hdvVd+TPXPBE=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168793022925190', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(362, 1006172, 'mohakudsubham157@gmail.com', '1006172_28190', '77O7HkjvS4Ud5WIHAQD6MhxDP/2hqRtLm5j+CBxvXy69yBSILvni2t1gz9lPARhdkXJwb7rxGb1vMc5qa5NnFiNWZnm0i0uj4JZ2tLFXHIY=', 'null', 'TXN_SUCCESS', '20200408111212800110168942522925402', '08-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(363, 1006184, 'lachhaminn@gmail.com', '1006184_19949', 'N1bO7Y+Wmi9/ym1YpNm1Ci/lx541xzJVclIdeAHJ2dueaXL5cgpuJij6XqfdtuTFMU/4l+PdGCRfl7EZjZ/Rys9SygcRqQYqELwt+pwUo3U=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168073722954325', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(364, 1006200, 'dhaval121083@gmail.com', '1006200_16928', 'yESKTQBREE9m9WmqkIuT/f/wlYZQKlOm3d4E+swTqVZPc//yWx5El+7ZHiG94x8YkjVlwqEDOzY0a5tEupW7pLiWHCwKZ0Ll9B81pXxiNXs=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168121022719128', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(365, 1006253, 'vk4008457@gmail.com', '1006253_15415', 'Y1Hu+tlR/vvKM/EPwVByn/ZRrvDHBFWMY3cgbQJ0wtPXYjvymNraKaZ7Okx6o0FOwHUf/2dbQg2/NxWVh4w+DuCcKszcytJTJQgCTs9hxgg=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168849222924942', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(366, 1006320, 'akashkumar54883@gmail.com', '1006320_23647', '/G0NPLhRYspY97Xc48++0Zr4sSV4lTTgZC08HiYGftpAU542cZJ3Vhsrs4pkohlAz3fGm+poLYumHoDOMqWUUzT1eiBtdcXDLI6fElfYXbI=', 'null', 'TXN_SUCCESS', '20200408111212800110168798922923441', '08-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(367, 1006324, 'rms595787@gmail.com', '1006324_18108', 'Xz37QCxlJLJgpxIhU0H0rBNqi5vik3Z7Z/ySDbzKvIf1YzT2W3vVCDma+UbSl3DDM90d9YCxY4AtqQae8hNG4sA4CEH1NRGuAaQ7hUzWrHc=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168450622868160', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(368, 1006370, 'shitalprajapati034@gmail.com', '1006370_10618', 'rtTjI3RZGgZXe8GgR2AYs0P2KLE/fkmCH6kyWyR/HXNKcLftYWOvOA6ONMp4gI+qIMxMScF/FAs19DE6+7rBFX04v8IWEGwF4hHRhPgB/xE=', 'WALLET', 'TXN_SUCCESS', '20200408111212800110168824022927682', '08-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(369, 1006392, 'pushpalekhag@gmail.com', '1006392_25758', '8AJ7BFaD4JCO79VnT555nAKqP6+0v0gAThiDjacbqE5Cc7Hwbxie1Fz9nqjkE8FxCVLXsHp2QTHWBiwypcQUIdz2p7LOVCpUy3ju+wO0zcQ=', 'null', 'TXN_SUCCESS', '20200408111212800110168158722562428', '08-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(370, 163, 'anwarcsccenter@gmail.com', '163_21104', 'CKEDBROsKgSOG8+ZpN0bHK5DU+ZgSuVQ/mx7+jjPkreRl47aFH7mCxNgmfQ7Evh+FvD0F0rn6YhufgrpWCm9E/mUQkuBM10A9QDTfAgyDVQ=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168858422884609', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(371, 1006436, 'souvikbednath@gmail.com', '1006436_21899', 'H8PsaZq1bkpQDZmMmdHDyNwv4B05sd2TgNnANcpS2t1U0ds0xbls+jgNIjNmlLoeLMeshIoKYnaT5QxiQ7KvdE/Y40r4KcNRoOA7zUj92oA=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168805022810112', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(372, 900335, 'kumarsonu6203805748@gmail.com', '900335_21834', 'R46GbvqStBnHi+Z0WAlAPzqSmaZpTCVzt90lqjWgXZ3m7E0c6nrrtEGgT9xK/vN3/MPkkn6JNs54CWf502ITaboRsYU0Km4m7qPT/uO/3ak=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168071123036115', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(373, 1006495, 'anithestylishboy@gmail.com', '1006495_13659', 'mhGikHL8UZKtQwbBIq221Pt6TPQ5uw5vp1W9irEcR376tjsL6/zyYHKWd/RjY2hae8cH67FOeFqhMXNWAvgrnT1nsPG/FwAkSTn2aa0gS6w=', 'null', 'TXN_SUCCESS', '20200409111212800110168326523096042', '09-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(374, 900602, 'nitingupta5874@gmail.com', '900602_13363', '0oK3t4/ryeK4J+88mWu/kQrdHfxSX1zfngO9C7vgdRKKrCfoIx8f2IgIhTz2hob/9ieuXgx133CsRhftLomRBvVOEoYdREqLgJkCeCoP+HE=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168061022455373', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(375, 1006504, 'rajkumarsahu91301@gmail.com', '1006504_21155', 'cgxkJdwe+wh8eCrixGgWHRhb7/oj63dAGkD4cYsW7jRfm9H+56OBCen4QsIJNqzUmrzGVN+/RvHcfPQe5cdEccrzcw9ycOXkWhWV3mBL7xw=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168875323231759', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(376, 1006538, 'shivarayilla@gmail.com', '1006538_20736', 'Q+NM0fIWmlt8ZyZLtqIRo8DpC0/2W+op6dPBbSVJySet0jYW0f5wPbi5mcXfP2rk41vOMjQh2VAJijEywb+LbLuLC608D+6yDQlzIYT8ryQ=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168388823213542', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(377, 1006250, 'ivanlobo21@gmail.com', '1006250', '1006250', 'manual', 'TXN_SUCCESS', '1006250', '09-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(378, 900408, 'prakashequal@gmail.com', '900408_29875', 'BTtne0jYfEB5ZWe5Akwkhbk+YTCaJb059k/XnhGgM6luhCtc/AmeaEWTNkMhTei3Gwv+nb8jxIoeb2JRiBYaULnYw7DqJJGgaB5H/Zi4Z2w=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168311422527232', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(379, 1006662, 'patelsujalshamji7@gmail.com', '1006662_26503', 'yQ81Q2jNvaEPc1fGyTy1wZxhQyHwDnByHED5aHr9kvD0SGOV8OVrXk5ZScmqwshXTovE8RJkZMMZfLJ4Z35BKY7vPCD5T4TSI/cSDgEkbGQ=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168781322514408', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(380, 1006662, 'patelsujalshamji7@gmail.com', '1006662_26503', 'yQ81Q2jNvaEPc1fGyTy1wZxhQyHwDnByHED5aHr9kvD0SGOV8OVrXk5ZScmqwshXTovE8RJkZMMZfLJ4Z35BKY7vPCD5T4TSI/cSDgEkbGQ=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168781322514408', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(381, 1006690, 'harishmehra57@gmail.com', '1006690_14262', 'cXWwYXmC0Wos4DmH0NowkHF3RLlu2WqiY7f96Tw2GsBmWRzeTNprkoafsyREK7akkqLh4Inn1rU2QPg+KjvE67W5xgqpuFfzQ22zvPPL/kc=', 'null', 'TXN_SUCCESS', '20200409111212800110168320123130142', '09-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(382, 1006719, 'mujeebsd20@gmail.com', '1006719_23578', 'HM2ntfJURXVM2QVEeOcpufjRSCc8h3f0rgunz0KxST3sgXuS+/kRw4E3doD3gxLMK8M9AI98wyeiLFH3hRg9qXQe4UYPkgeBXux4kuQZ33U=', 'null', 'TXN_SUCCESS', '20200409111212800110168041122798029', '09-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(383, 1006719, 'mujeebsd20@gmail.com', '1006719_23578', 'HM2ntfJURXVM2QVEeOcpufjRSCc8h3f0rgunz0KxST3sgXuS+/kRw4E3doD3gxLMK8M9AI98wyeiLFH3hRg9qXQe4UYPkgeBXux4kuQZ33U=', 'null', 'TXN_SUCCESS', '20200409111212800110168041122798029', '09-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(384, 1006385, 'sonuking0690@gmail.com', '1006385_27101', 'vp6RfqpDXTD6TNBcNhKGNJQBPSpuCq8nUjvyF8BtkpvGJOljRQDCcAxj7GfU11c8rgvbfLxF+QP+o1S4X7Tu+a6rpxbbl5MX+MXyQs6lnfk=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168772822753439', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(385, 900354, 'rockasharma1992@gmail.com', '900354_19701', 'okKmugpvI6YJyspJQbBdNDbWT2M6n2ZutB+88XoF+TGaD09IZ+LRtVC3hmaGjhY9IPPQW2mrXovIPHPsjzL6kX+hkzXnQ29ky0PUvNcyaaw=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168501522976708', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(386, 900354, 'rockasharma1992@gmail.com', '900354_19701', 'okKmugpvI6YJyspJQbBdNDbWT2M6n2ZutB+88XoF+TGaD09IZ+LRtVC3hmaGjhY9IPPQW2mrXovIPHPsjzL6kX+hkzXnQ29ky0PUvNcyaaw=', 'WALLET', 'TXN_SUCCESS', '20200409111212800110168501522976708', '09-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(387, 1006743, 'rautkalpana100@gmail.com', '1006743_17834', '5Mtamzh0X8X2OALlbUnvAd353iWC5Qo+gK9DiTYEy3nIaGPziED26KrggxuS4A2j4JM2cpYoA7usbH/e3NSKOXXOqTWGLVO1nfgrghVoJ8Q=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168873323359260', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(388, 1006135, 'kamaljeetsingh080@gmail.com', '1006135', '1006135', 'manual', 'TXN_SUCCESS', '1006135', '10-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(389, 1006141, 'nicesravanthi4@gmail.com', '1006141_11182', '4b3xUnqW8FEJ4CHdzOdxbumaHQWdWvics51AiVlSSMwIUivopn8VNa9Vlp0SHNBThwJ5nF7qvDURbZS7lRKi0mA/zOoN4j0APed5pp2Wli8=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168833123137279', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(390, 1006141, 'nicesravanthi4@gmail.com', '1006141_11182', '4b3xUnqW8FEJ4CHdzOdxbumaHQWdWvics51AiVlSSMwIUivopn8VNa9Vlp0SHNBThwJ5nF7qvDURbZS7lRKi0mA/zOoN4j0APed5pp2Wli8=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168833123137279', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(391, 1006799, 'puspendrasarmapk@gmail.com', '1006799_24555', '417hQaL5x4xdIrQpY1zQEO7ibbA8n1XiNi6FMHUDtIhv6rEeL/9fHUVdrnLWpV0nd0weXF+CAXwHYz2CunhpQcmXr3VmdXX9ehaczjvWqnQ=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168864722849231', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(392, 1006818, 'jsahu7719@gmail.com', '1006818_25979', 'J/1TApRKAG4PkMq3Hbgfo01uzmApoABsVvo1MibLjh6jo9qY6SfRSzio65V0ydTPETuH7MWjtEnTKdFKdz+1K/Oks3m+MKU6Yg1vXcZSgig=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168753422641728', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(393, 1006830, 'anujkhot7@gmail.com', '1006830_21100', 'AEYU0O3LsjFesjd+CB1QfKEGmT2kSmfJ/EVgwchjj4ufkrzkrVu5dIN02OJep4jabpfrtzuMm8eZQl/xkpDEuCq0qRL/YnN+5OWVT8RNN+0=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168152322726003', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(394, 1006877, 'tirupatihait80@gmail.com', '1006877_23482', 'djttAKZyQ6F9Zb2covX9SNZvuPgx1PNvLpqzktMx9Ef+8Y9YGfBg49d2OMBY31OdVMadowMF5AjHzRRpRG/34+8cs0CSiVW2uZkwl1Ujfq8=', 'null', 'TXN_SUCCESS', '20200410111212800110168497523139303', '10-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(395, 900247, 'kamleshjee42@gmail.com', '900247_15765', 'TYD/Q9rmPIaIvKSwDS4zgFJg8F+wXYMiy3dTGR1dlB5y7CbHJsG10qCP4e4GPG/49X93byGsRdluumqXQHrD88QKK1eJXZgWLOnKd14TzwQ=', 'WALLET', 'TXN_SUCCESS', '20200410111212800110168470522764460', '10-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(396, 1006447, 'tanimanjhi111@gmail.com', '1006447_11924', 'ZLPjd1STdDSw410X7KEBqEU4bE+hRJ22nRQBaXQN3zkZ45mouewZj04kcr2bIi9/4fseaT72OYguZOhCQ2FBdA6djc4yoHwsWUmh1hGEIKM=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168825123299081', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(397, 1005741, 'gkku1015@gmail.com', '1005741_23309', 'o5KqCZvsSt7cGUkGgLVdBnNegy/VTkvVRzrn0l6USQKLWb8phCQQknGL2jBNuAITOfjne12AY06qmPWtGrxDEOGOY5wGZorxT8Qcdfr9g+0=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168163723167594', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(398, 1007012, 'khirodramajhi630@gmail.com', '1007012_10597', '8uUUGTDEDb27k+4RXLH9W7oL080ggUY5ynrr+NTsWIEvlS4yQBvHEKxTWWK67bec0Ap35hsHH0Ybue96vspK8GmT2co8Wf4arzg880Z2HFU=', 'null', 'TXN_SUCCESS', '20200411111212800110168368823500465', '11-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(399, 1007012, 'khirodramajhi630@gmail.com', '1007012_10597', '8uUUGTDEDb27k+4RXLH9W7oL080ggUY5ynrr+NTsWIEvlS4yQBvHEKxTWWK67bec0Ap35hsHH0Ybue96vspK8GmT2co8Wf4arzg880Z2HFU=', 'null', 'TXN_SUCCESS', '20200411111212800110168368823500465', '11-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(400, 1007023, 'ashishban591@gmail.com', '1007023_10229', 'rtsoS7CnW6lw30hJTsaQMmnYPpX9L7ggvHQuHU3dYDXYnZHXve2XSV1g6e/fZFDiIfpcCRkv3u3FemUEn6WXGwRyGNKScOF9diZ7d+lUi2A=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168427823302235', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(401, 1007055, 'mahakaljayesh143@gmail.com', '1007055_25074', '5/Z+iuEe7jek/iLceTVl/jhjiHz0CLH/1PiZvoqlzDctCV4M0l0oGS60v2mLS0gwW6uZ4CYuLD3KwwoLgaWjQXFc3rgLg6iozWDUD2U4YAc=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168335423255336', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(402, 1007078, 'kishore.kujur75@gmail.com', '1007078_13598', 'w1XhEFPGkmcBFGENk3UAt7EDTgx1XSaSsyXwZlkut5CM0etOr2VZdTdBeAzzcYWYdL4AbX+v7QcTdNN05TxsGME+CmE5ETnDg31V/OBEMAg=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168788522907128', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(403, 1007078, 'kishore.kujur75@gmail.com', '1007078_13598', 'w1XhEFPGkmcBFGENk3UAt7EDTgx1XSaSsyXwZlkut5CM0etOr2VZdTdBeAzzcYWYdL4AbX+v7QcTdNN05TxsGME+CmE5ETnDg31V/OBEMAg=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168788522907128', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(404, 1007083, 'shahmitu70@gmail.com', '1007083_25911', '1P3VLwob0vcs9mqPz82JwnTKr2EBw8yk7HKQC0gn3c8xcUGQ3f0APCMDPYx3HN5W8tZAOirY2PD0t+1fpLjcDSAcBRNXY2v+U4Jja4JuxYQ=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168401623025449', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1);
INSERT INTO `tbl_payment_transaction` (`tid`, `user_id`, `email`, `orderid`, `checksum`, `bankname`, `txtstatus`, `txtid`, `txtdate`, `txtamount`, `currency`, `payment_mode`, `res_code`, `res_msg`, `status`) VALUES
(405, 53732, 'ashok454555255@gmail.com', '53732_16350', 'FvLjcYDvogTtRbx89gW9JZ/7ZfcntS3uNqS+QOBt2UmpqCCH2SiqDZPMKtEkk0nTmjpkv3zStwWb2/KiBD1bLBw26e2gKdFi5umj0AqxiUg=', 'WALLET', 'TXN_SUCCESS', '20200411111212800110168025522963630', '11-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(406, 1007166, 'd7401224@gmail.com', '1007166_29662', 'vmvcqsj8ZfwlzASmKrKjHTeFEiWVBhFZ4sEXY2q0DJj0t3RwHHvJoqvuxPw/MRe6V3KGk9Z6qL+qNevYZV33Dvrq0u1cXe9FNlpL+ATSLPw=', 'WALLET', 'TXN_SUCCESS', '20200412111212800110168136223319607', '12-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(408, 1007231, 'nithyarichard123@gmail.com', '1007231_12321', 'Z5yRBEdQiczFeLkgBMpMk5NhHdZacmTHa+L8nBqM3OB1VsM3C5U7IL9pqg7p3TG87KF0TtL9Rq/fDBtdkeoSg2et0hJnwMip0PH/rsIWCyU=', 'WALLET', 'TXN_SUCCESS', '20200412111212800110168640823079488', '12-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(409, 1007290, 'rajindersingh5590@gmail.com', '1007290_22363', 'c3X1hHOWRlzRZHlenbtqH8JPTSTpri1mxdfF00BYb3QwlorKhuAg6UK1kPOH6FVbrKIR5wcVwNjkz5Bibxf0c99/hBRlwdi0BXXjCarCK2E=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168209623237719', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(410, 1007290, 'rajindersingh5590@gmail.com', '1007290_22363', 'c3X1hHOWRlzRZHlenbtqH8JPTSTpri1mxdfF00BYb3QwlorKhuAg6UK1kPOH6FVbrKIR5wcVwNjkz5Bibxf0c99/hBRlwdi0BXXjCarCK2E=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168209623237719', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(411, 1007239, 'aryankushwaha404@gmail.com', '1007239', '1007239', 'manual', 'TXN_SUCCESS', '1007239', '13-04-2020', '', 'INR', 'PPI', '01', 'Txn Success', 1),
(412, 1007315, 'jamshedalam7392@gmail.com', '1007315_25722', 'RSDT/KJapugtqOE9fyAh9d8Byje5WmIEB8RDkPq0o7H8V2G/nzsymVwdMoDiJlzAcMV+nCPG1aAPiIBdYMFVPd7qdw7P86G/Lrd+6fuLk5U=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168343323324893', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(413, 1007315, 'jamshedalam7392@gmail.com', '1007315_25722', 'RSDT/KJapugtqOE9fyAh9d8Byje5WmIEB8RDkPq0o7H8V2G/nzsymVwdMoDiJlzAcMV+nCPG1aAPiIBdYMFVPd7qdw7P86G/Lrd+6fuLk5U=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168343323324893', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(414, 1007300, 'lalithaprabhu74@gmail.com', '1007300_12283', 'Kn8wFgjYQHe+OgRq4h+XvWgtza8S4qXEElgFAANgBhWlpkYP76Kx6VWe891pQE1hkelpDMuQKZER2qhK8eiFGZixclSQ7El6WVUleVQwoWU=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168069022943355', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(415, 1007300, 'lalithaprabhu74@gmail.com', '1007300_12283', 'Kn8wFgjYQHe+OgRq4h+XvWgtza8S4qXEElgFAANgBhWlpkYP76Kx6VWe891pQE1hkelpDMuQKZER2qhK8eiFGZixclSQ7El6WVUleVQwoWU=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168069022943355', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(416, 1007338, 'gaganmehta211@gmail.com', '1007338_26957', 'tDpr3Q/BqZ2RSQ2doa/1W2hy3yKp+lw4NQfMFO1cjYgp/vVv2ZYOXdLiISL+ZfdQ3KIZFlOCjXf7u0TwjMFpjNca0IZW6gsfI4FtX+XqqDM=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168066522944793', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(417, 1007345, 'rahul2121bamhwar@gmail.com', '1007345_24624', 'mq7WsNCbG6ToJ05jlzT5EaycwLGO6iWmiwuAB6vzOb+QJitFE692aSK1y7gZfAsmdbKSu/sbYrHoRUqS3G9jGRc+m2TbHM2T4xU5z9fSPbA=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168757823006810', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(418, 1007416, 'hazikmudaser33@gmail.com', '1007416_16268', 'fZWpsHM2ghcC6R3hEUBpGImx/RGmrkFAjZYZXCRF672UDJ6IUfm1zxAXQ4gi28T1VbVD8ZIvoqXOC9+VQA8Or2KPFjiO6RvaVMK9q7NfrWI=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168756123079595', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(419, 1007416, 'hazikmudaser33@gmail.com', '1007416_16268', 'fZWpsHM2ghcC6R3hEUBpGImx/RGmrkFAjZYZXCRF672UDJ6IUfm1zxAXQ4gi28T1VbVD8ZIvoqXOC9+VQA8Or2KPFjiO6RvaVMK9q7NfrWI=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168756123079595', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(420, 1007404, 'yukeshsrm13@gmail.com', '1007404_11100', 'qbAXxkR9hHraIfoCX5DGIm9qCgnX67Mi9rN3mGDLfWeZenwdaNw0yHwGIr64KzBf7gtw48zBNBFWuXewMLpReX130oujrS6o4EBOiPYSboc=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168325423621718', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(421, 1007433, 'kishorekannan95@gmail.com', '1007433_18472', '2cIahgSl151LvXlNHDDPmx01W9rBXOOHRxG0c0jHYn/9ERo7LZ94PbPi438JD4YQQGhwUVb373VSAHE7BPEt65oAmFTTbtpGrrGYxXRv/Z8=', 'null', 'TXN_SUCCESS', '20200413111212800110168651523748553', '13-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(422, 1007435, 'thalakamesh301@gmail.com', '1007435_17624', '7kFLMZPagwpgyontTKAVoUIfIyJrORNmaa1VAZJMajdE8CJjJVS6pMm9vdD28n+I5tKGCzsjfaL0tavkYu9sjyr4pJScsOdyjyna04Xn1tc=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168253123131375', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(423, 1007435, 'thalakamesh301@gmail.com', '1007435_17624', '7kFLMZPagwpgyontTKAVoUIfIyJrORNmaa1VAZJMajdE8CJjJVS6pMm9vdD28n+I5tKGCzsjfaL0tavkYu9sjyr4pJScsOdyjyna04Xn1tc=', 'WALLET', 'TXN_SUCCESS', '20200413111212800110168253123131375', '13-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(424, 1007512, 'marrikandru493@gmail.com', '1007512_18284', 'tgJUBec2wOvUxipzkC0yiv39WIOLVwsjk56YchfWq/yenLuivSZvfz21UhK8Cuv+Ehmk6KMWw3mhmwHxbMgmDcP0TP3xb2mJ1F99gI5uh9Y=', 'WALLET', 'TXN_SUCCESS', '20200414111212800110168245723620944', '14-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(425, 1007319, 'pankajkumarpandit408@gmail.com', '1007319_17801', 'lZSZDxcPD4ApER5aqEXG2j7Pl+x+EjokJ+QVL4VR1ltINcmPSPrMOk8rF/53awNj6s8y0ASL6ug1OP6Q97GvBK6+gfASCOoHibdn+B4CpxM=', 'WALLET', 'TXN_SUCCESS', '20200414111212800110168496923556660', '14-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(426, 1007498, 'deepak.nisha007@gmail.com', '1007498_13529', 'e6k1zbl+4TyKW6MkIkPZeb7F+haGzQCHjToZm61dRBG2UHwaffpmInwFXhXKvEE9fZ4VSKk+H+B0Dnet1Z9AIl4ANzS0pmRcmnC9ibmbsBY=', 'WALLET', 'TXN_SUCCESS', '20200414111212800110168802623568676', '14-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(427, 1007057, 'subhanisubhani043@gmail.com', '1007057_28895', 'sKREc7CVcYCquuI6tMcCuipRd433ByUFIkDk5thqVm9yr2qazUvn2i+BUUYJQWqwL/ZLTz3AqPX0ZTS0EZfqfCIyM3nWJiGs/KdKUcgXK9o=', 'WALLET', 'TXN_SUCCESS', '20200414111212800110168772323470681', '14-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(428, 1007680, 'manoharsairaju123@gmail.com', '1007680_10100', 'FZmxtuRqgZ+j/DJQrpohyp2LyRTkOe+JCz7Ycprm12fugucwhBIEHruIIbkk8Aq9Ojkt+XEUqBnupfGOyXGOpeuneQrsHE5pychddSdGoBI=', 'WALLET', 'TXN_SUCCESS', '20200414111212800110168116623832461', '14-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(429, 438, 'sudarsanchandipur@gmail.com', '438_23703', 'ngYEWDY1MhGpA/eQUe/vv7GmDztcEF77JgupTTiZ6cZRix7nDbGoySvtnf9vt+kSsTvGQ5knD74BKtyGwjUywoKDzR5q80zXHKQPFPfW+pc=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168614724254290', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(430, 1007729, 'dhiraj6664@gmail.com', '1007729_19668', 'iv978QchfntKFBZrD4T0Zo2a47FZhGK5l7hGP7kGxl2UsCulySxA4PzLpgJsfr9WeOEFiDOef+WLNm4RZAx1mJ0eP7JqosIK19+8ltYGb5Q=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168813423881274', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(431, 1007732, 'kumarindresh862@gmail.com', '1007732_26713', 'SBjCU10aCpU3QDodG2FwMNAsqKX8OsuJLFUGywU4fmaSW6WRRHL1k5Rq4CwLjnN16TqZoeDerMXS9WUcjF0QTLfXetCbp3D94OkYdsCjyc8=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168946423796079', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(432, 1007732, 'kumarindresh862@gmail.com', '1007732_26713', 'SBjCU10aCpU3QDodG2FwMNAsqKX8OsuJLFUGywU4fmaSW6WRRHL1k5Rq4CwLjnN16TqZoeDerMXS9WUcjF0QTLfXetCbp3D94OkYdsCjyc8=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168946423796079', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(433, 1007327, 'garimaornigam1995@gmail.com', '1007327_28245', 'RPxB5fD9B2PIM/KJrSVlTJ20ajy6L+qhoc+3BLnU1gwvnB5xCgi+YCH2WTSy0yB94+sOctFmMRFpfBCEuxe9ySfTFh4hAJ8V12Z6XMsZb7M=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168961123723355', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(434, 1007762, 'tamilanal1996@gmail.com', '1007762_10337', 'U3BYox6/EUpGUCPKWs0jx8/n3KSiVz2m45pquIi0W2biR4jLWvyKdD8wi/v/NWn96I47SX5nsbUZ73tBtm1dhAEehPDcuLJzQnC7nM+FhDs=', 'null', 'TXN_SUCCESS', '20200415111212800110168586424541771', '15-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(435, 1006938, 'sandeepharbala1991@gmail.com', '1006938_18709', 'gE9f1fgJQvjZ1t4MvKNvTuReOP3WOjH6CtJ/QzSCeF18IE+y4PO2fGMfL8+m2l50Sqy7m2Dpig2uoD4G1brABhtHrHfTuJlIMKcH1vs2Vjg=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168951323428162', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(436, 1005623, 'khansamim905@gmail.com', '1005623_29538', 'E14d7Bk9QRiouu2RKeIMwqH2uuuZ+ChUFDDQRL8y/JxH6GigeWM3qTuy2Fl1qFcXy005AP6FMzf9xL/7jy3O1eO6eEtr5EPB2mrw5+s3gng=', 'WALLET', 'TXN_SUCCESS', '20200415111212800110168312923351136', '15-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(437, 1007844, 'anil.2krishna@gmail.com', '1007844_24302', '51+nYkW0lritR07zfwodxkkKDCcAh5AlvKOjwQIYEdFymCPWrq+fRi2bmgt1oq8Or/lXGOmccFn//6d/uWi8BVBsfzqTWjjsVBmcuU4+bJI=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168705123539091', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(438, 1007827, 'brajeshsingh927@gmail.com', '1007827_16021', 'rlIO0a6syAox7KezL2NxQPTbXPN9FJk5JCQb25MHZqqAC85swR12Y9qMXIooeJPSEGI/xlKtJ0OawVn1jVrNUPTSXlBhNfUnldW+zOlpUGs=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168827923951781', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(439, 1007885, 'borsey404@gmail.com', '1007885_21180', 'P7rAyhkDagIzxm8/u9Q+ar/i8o89ip5JVzrBItjXODjC2uhmW3l/ULn6mIYoqc2d1z2BMF7glkqLGLLiZWK+YRn00MCX3OLyztdt94WC4ik=', 'null', 'TXN_SUCCESS', '20200416111212800110168509123760317', '16-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(440, 472, 'anujram1994@gmail.com', '472_16182', 'rcdktNg/znuHtIrv8Q/slgwKsZXPmFjHOikamyhQ6m8Dro8Kh+kI48aOgUoN6+4QBBrQ5oiQjm5Q/iRP+vp3o//znC9aLAZ961m2VU+eGd8=', 'null', 'TXN_SUCCESS', '20200416111212800110168262023497736', '16-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(441, 1007925, 'riteshlakra94@gmail.com', '1007925_20814', 'GkOCWq+ErE+allIJyDZh7unS2h8tYD9RkyBIY+kSA83G1KdpBaJ6Y59FB5o0kUVvg0D7XQSZJ+nm5Iulq10v7zA3mx0bsfMbTR6riV8xqBE=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168887323943162', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(442, 1007935, 'a.s155060@gmail.com', '1007935_25253', 'TYzwzE/4rPsyZKOUMUBC9HwlwH3FlxTzAEgMwJeUOYP+RNLaNPTfgxYYR+8DRyxqBSeVudloGYMaQ3niJbZQzUkKzM+alLA8+I5eUFSagRU=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168615424417644', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(443, 1007931, 'simranragde222@gmail.com', '1007931_18679', 'FOULS0SW7+IDQvFdKINihCVymyc5fOB3s3ON9KzaKXVRkyzQmm8K2uKADs+mdQbHIJi9PrX/3ukNJ6d8UvAq5wFqh4XhD/jAWzrnF5vDOZs=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168759523422228', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(444, 1007960, 'chakrarana3@gmail.com', '1007960_13321', 'qdsIlOjxkcCgqy/LHn0GDPI774NnUfi7OmPWUsoQGGa2tdNtY2wA1BSfU9CjK3fM9HWYFNamYliO00XsSASwg5PiAHjCedh9DgHUE4nj5k8=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168026023470481', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(445, 1007962, 'sabirmolla706385@gmail.com', '1007962_27971', 'Q1UZUL7iqk4wYcPTRkxB2TbgaRhbDokffyMqbiaOGDgCCHR0STdBd0l6x7gRrk69S19CzqCKi+IgYdR1StiLRq8Da87wS63Ya/XOMZEyJss=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168708023523678', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(446, 1007980, 'roshanbhorude74@gmail.com', '1007980_29735', 'oPHZ2Rv5qtCVS1jWfjWwIq3Tm8u+EkQQiTbUaM/6VfuroP6sA9oyoYisVugeaffizIOcijt57panb6/XqxvLv44AqwpvBpyTjkuk/nE++l4=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168783723467309', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(447, 1007980, 'roshanbhorude74@gmail.com', '1007980_29735', 'oPHZ2Rv5qtCVS1jWfjWwIq3Tm8u+EkQQiTbUaM/6VfuroP6sA9oyoYisVugeaffizIOcijt57panb6/XqxvLv44AqwpvBpyTjkuk/nE++l4=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168783723467309', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(448, 1007984, 'bharatgamit97121@gmail.com', '1007984_21000', 'raXtMGQmXHJHGwaJmQjNLcZL/s2Y/Qa+qHPeivq7a+iIZxN91MmsJx7U91sHsuiQ0oDYgMYdhJdNwBrjKd7qUmAgsgQHsSRd9GwpCYJyGXc=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168033824093340', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(449, 1008023, 'rajac19850@gmail.com', '1008023_22504', 'OGA4p3kF4mirKnKPdFhLO198J9WJrK/TpYMlz4yNr/m6hr08xdLQ/NOA+sWXsVtYMvLFisWcTjuaa77nzHMDkQAvim5Pro+kcFZjLDbVr0c=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168281124261032', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(450, 1008081, 'vinodpal611@gmail.com', '1008081_25451', 'vJk3D2WKFQiOILlgMxR06Z2FuknvqAsHh3TVHOiV+AOm6vcrhCdBnd+h5KuA93t6PtwV3MfKWudvsEotUp65F7BdZsFyLJH/eDkhCsS95xs=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168085024184758', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(451, 1008086, 'kalicharanmarandi1990@gmail.com', '1008086_11711', '7lchOZqhRVFxdiPrlPMAIfJJyncHXq1ALSFfi0YZl5B+fnOcVcghjft8STYh7eldVfOPvoNxzjK9bu05dVR79BR7KNjWNsYOI5KQkz6ngDE=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168255423416283', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(452, 1008095, 'dahiyalalitdahiya@gmail.com', '1008095_28756', 'E+yxyYDFIFN+XnCGhpyaQkIdXnZQxS268gR/vNxVN7rDJJ+9U8i68tPdG0hHI/capS6HJyAZzCZdJDq6LrPmH22biwYnlBDhuP3KaJtdI6o=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168169423851204', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(453, 1007604, 'duttapradipta44@gmail.com', '1007604_13151', 'd3KfD2xBnCPJXgek79HJ0b5x8eR0Nm/HKlT738w6spqzWDhXEQfQajMYUWXgqpv+10P4YvcPbbc9RckNKVwub+nu7Qg4dRrl8ghSuQIB+VQ=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168246223960261', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(454, 1008149, 'ud419141@gmail.com', '1008149_23843', 'V3jG+eaXaa2JodAVtC396JsPpqmtd8I9tjrIJ7XOZMk9uf6YxS0UbHkyKD0rm2cCreKvxC7JPnaEx62BOz65cSIi+dfPALO7Q/rHbJoNhTo=', 'WALLET', 'TXN_SUCCESS', '20200416111212800110168665023703450', '16-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(455, 1007901, 'ss486036@gmail.com', '1007901_12696', 'OCAWnk2YhGyNVtAYl7jMF5wtbpEEv/X1T9HaOfTQTD6pUX9X4e3C+BV/Z6g1Zo1qZs5fWcyt+6paCCxsCHS9mmMZPHLtzGvjIhzzDRz+lvs=', 'WALLET', 'TXN_SUCCESS', '20200417111212800110168217923703773', '17-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(456, 0, '', '', '', '', '', '', '17-04-2020', '', '', '', '', '', 1),
(457, 1008215, 'mosirsk03@gmail.com', '1008215_11670', 'pbl83o1LfUYlBqdewZ3ZGglurozj/gK3zGCoNfXewIMXZ3K5Df306zneK/hcjTIVhB83vyHeh1vaKbnwcYs1Yzcz/VALAq+by9OQ7plIxnA=', 'WALLET', 'TXN_SUCCESS', '20200417111212800110168695223537718', '17-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(458, 1008241, 'om1507254@gmail.com', '1008241_29664', 'QfHvmZWlFk2Ko/aaf6NnIvcgMKT94r5/QCaFrOExHHWEVuj1gdD1d/zNjk9K4c0oGZLSKfB+wvTIhRoZTovFe4pxVSEB+Sy2+sMDhaAADto=', 'null', 'TXN_SUCCESS', '20200417111212800110168343223816245', '17-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(459, 1008351, 'ka897699@gmail.com', '1008351_16449', 'ODngeB7w3RqejjiRTo8qnWFuSQ4f165DjAO42aOeDjP9pGZWCWfsfvsGZoHHwSRp4HKZbpHZZmx7Q9LQ9GqqcnvfIaiUZJBo92FvPgKvpNw=', 'null', 'TXN_SUCCESS', '20200418111212800110168336324004463', '18-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(460, 1008351, 'ka897699@gmail.com', '1008351_16449', 'ODngeB7w3RqejjiRTo8qnWFuSQ4f165DjAO42aOeDjP9pGZWCWfsfvsGZoHHwSRp4HKZbpHZZmx7Q9LQ9GqqcnvfIaiUZJBo92FvPgKvpNw=', 'null', 'TXN_SUCCESS', '20200418111212800110168336324004463', '18-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(461, 900119, 'skkandheri@gmail.com', '900119_13902', 'rOId+JvNPJu1Lm8G7BFLPr1slfBbld5sOwo+ACUWndHekqKB8Gq1c9cdTOO9xk1oIAspYk3/QVK966q4pGmJvsB98NeuQ0t7EnakdCN9MLw=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168824024093852', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(462, 0, '', '', '', '', '', '', '18-04-2020', '', '', '', '', '', 1),
(463, 1008414, 'alluraiahsoda@gmail.com', '1008414_18644', 'gvOAp7dabj7vZPuPWWbmlTNYIXPP//UOR36o8hw1+r34lVKzy+Dul1+9BriPC0+Bs4NipSP7wKdw0kOFCP7VYRO3Ohbm/GxvIAoH4IXy498=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168327924221106', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(464, 1008129, 'phatakb@gmail.com', '1008129_10141', '3RKrPLQPHpSu0TQQkqUDmPUA1yUdEDLFEBWMtY4E6j7WM0Dzed/ZTykPe5OA71CwVz5oQiRWuOwoFeiC21truncN4PLOczwazwEgJytablo=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168275524473964', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(465, 1008129, 'phatakb@gmail.com', '1008129_10141', '3RKrPLQPHpSu0TQQkqUDmPUA1yUdEDLFEBWMtY4E6j7WM0Dzed/ZTykPe5OA71CwVz5oQiRWuOwoFeiC21truncN4PLOczwazwEgJytablo=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168275524473964', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(466, 1007493, 'sharukmogal8@gmail.com', '1007493_20543', '6qrrAjL1OMB29yqj9Bwlu0V+y4w1DF6/R5htMtYkSaAttICrNL+8IKCgbVL2cth4S5PeUVPC2+oBqkG50lknusiWXFnbrxLHGjfR9KmU98Y=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168858724110745', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(467, 1007493, 'sharukmogal8@gmail.com', '1007493_20543', '6qrrAjL1OMB29yqj9Bwlu0V+y4w1DF6/R5htMtYkSaAttICrNL+8IKCgbVL2cth4S5PeUVPC2+oBqkG50lknusiWXFnbrxLHGjfR9KmU98Y=', 'WALLET', 'TXN_SUCCESS', '20200418111212800110168858724110745', '18-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(468, 1008270, 'pariharrajan93@gmail.com', '1008270_19227', 'XkcJzrB9kUz0NIoYBzA+7d+JC6PLgWWerzIZwiy2NHGdpoP52C6UMPFyQT6VMvuqRzGYXz3cy8/9TsXhY/49MiaVrJbfs0j4lnucUl6frJo=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168767324257940', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(469, 1008504, 'aamirmohd5168@gmail.com', '1008504_12238', '5vJakhwZ7R/xXR6JA4rCiE1OzOziQhXgGCw3eoGFDg+OEeZo/flAt+B00Pr+R1Zn1KSLYE0HrtuUlQ30GqMjA1wf9tXux/xZNKeqPkFJ28E=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168492824223866', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(470, 1008528, 'duttaprasnta323@gmail.com', '1008528_22404', 'p+Gs1OSgskBDs0hbvI/t8psHEMJ6X6OzRZEQqM3Vp11PwMPNpIfMgrn5vnrdWq55IvvnR25ZAfoLZuZLYoAQVV4+ulswsAcXrMxfII0dHaA=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168034424536803', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(471, 1008528, 'duttaprasnta323@gmail.com', '1008528_22404', 'p+Gs1OSgskBDs0hbvI/t8psHEMJ6X6OzRZEQqM3Vp11PwMPNpIfMgrn5vnrdWq55IvvnR25ZAfoLZuZLYoAQVV4+ulswsAcXrMxfII0dHaA=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168034424536803', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(472, 1008528, 'duttaprasnta323@gmail.com', '1008528_22677', '445FoFuLPx0smGHzvgB2BlyniX1GXzalltp/1QT7GscQfYhEKOiDF/6nfzLd4iDHe23f+gi5IGOoHkRW4z6+6Ac4K7G0P4E/eEWuN8zpGAc=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168616724850865', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(473, 1008550, 'manigoud925@gmail.com', '1008550_13093', 'krGZLhXJhqr4uUyhECh4qtvBsIjSyro1mo+uUfxCrjNHHrROgyMbuC6kwKU5Z19Ib7pKjBsd25CnRyvwrReiSrt4pADqszguEEgxizD4t5g=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168545823792753', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(474, 237, 'brijkishor3244@gmail.com', '237_14621', 'AIAN3Ga9Twb6V894fYFrhj87/0AIUfiZfauIq5WxBw+rrQdqpZ4detdk670eQcyENpNdKnD8HVvzBpAlcr8aKg4YdLfID/05XBK5hf5p+jQ=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168538524396826', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(475, 1008604, 'indersingh22693@gmail.com', '1008604_17308', '1fJZnYhr0f0cV6px3ya0Db1AViaNbNY11L2FUc9CxABPxY+MkOZ6pie4F/IWQSiQed0hhBwCZI9LO/wFCGPy9N1ijdcYkd7iRemAaEUbXLQ=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168917924032996', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(476, 1008604, 'indersingh22693@gmail.com', '1008604_17308', '1fJZnYhr0f0cV6px3ya0Db1AViaNbNY11L2FUc9CxABPxY+MkOZ6pie4F/IWQSiQed0hhBwCZI9LO/wFCGPy9N1ijdcYkd7iRemAaEUbXLQ=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168917924032996', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(477, 1008576, 'syedmustafa2843@gmail.com', '1008576_17229', 'i1uV4dquuzKf6bE4T1indPISQvVHSx1OSRpKzrf17utwWcndWDBtFoyjOlQaRIdVEDhX3VLvM3JB+xAOugvp7xdAN4UiqGVt/E6tPugCdPc=', 'null', 'TXN_SUCCESS', '20200419111212800110168938624224013', '19-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(478, 1008737, 'chandeshwar1961@gmail.com', '1008737_29507', 'pPdchuVfbhpMTM9QW5rPsMmhLmqiiIWdG9SoRE4rL8lG4q56DqBVOeKrKYTEw+h31UAoO4akP0TTTeg5qN2kFtjNuyDAdn+CnbqTQFLKCQI=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168222724521534', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(479, 1008894, 'sureshprasanth02@gmail.com', '1008894_26085', 'tm9RciDVHq7KvzQ5x7X3ZNKGmVwplM2VDFqfPpCJDwQB8bSCMsq4Bh8nw3g6J/Zi3LKBZJcfQz+M/cb63ZGLP6HggvICEf4syI3Tp+XtjBw=', 'WALLET', 'TXN_SUCCESS', '20200419111212800110168986625109412', '19-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(480, 1008899, 'yashviparikh2052000@gmail.com', '1008899_17225', '9ciCPFGCc6jqGIOOe4bgF1zZY3JMZsB9/Ha9qHlv3qtFhdI22mHrs6lIVyHuSze/Ji24h1xLq//9k6xywmOz/2KDPVGfxUnYYelNEA87a1M=', 'null', 'TXN_SUCCESS', '20200419111212800110168136124236338', '19-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(481, 0, '', '', '', '', '', '', '19-04-2020', '', '', '', '', '', 1),
(482, 1009212, 'sajadkuttapu@gmail.com', '1009212_20293', 'hMr4fJysqzcbNv+RrdVVI88D6tdAbO8Rp94RfAbEf1NNbR+wbbvdFZ6X7unKvO2r9k1MWYHKXivWvnxFTadihsAB1TXSiqTjorkjdnoeKD0=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168303224269880', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(483, 1009219, 'saleemuskan223@gmail.com', '1009219_14244', 'ig7jvIWyl7Nw315QbW86VM5qM2E9p52CTZ/LqlmhGOkVdfCUtXBJefcm5JhU9LxSkLKyyib8NMErLpPwr66q3tSuW0SPJKsHoJzEEXPAyR8=', 'null', 'TXN_SUCCESS', '20200420111212800110168062623783554', '20-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(484, 1009286, 'amrishrajput967@gmail.com', '1009286_13825', 'KeaOjN7Q9HGNi8HOay+BD7byECITxAjUnzToITI9fukgh8zTsKgomTN33lb8skwjLcv1LanUOjqLrG440ZJoEBSGOQr9N2o6PQnDhnmTXCE=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168828324475556', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(485, 1009294, 'kumarraju14198@gmail.com', '1009294_21565', 'Bg/6ci5w8J+fNy/5jTRpKF4OfDuxrZQG/k0nek2O36vVHGfoF9O3j1R/fM8PXH35MtztlYPulJxv0y7CAalCGRdGmJJglWiSES6D0NvIvps=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168294124690144', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(486, 1009367, 'sk813536@gmail.com', '1009367_12291', 'GYeTENpNgsBgibhLnmlyJj1I3Ap2HmAqIEKlhvi8L/9ulIeUUym2OQ2P8hmygCbIY6kWp79QdNg2RtAgUlGEK5JuwMGOGVcxJbs8fgQLLlU=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168822824456179', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(487, 1009391, 'sivasaimakaraj@gmail.com', '1009391_29238', 'M4Wivpdb00xfjpQeZXlvop/XB4F5C/opXx8dlMQvogMj49r5GAJ1bcK3KUVV/PFZDchS4RD6Ima0BHs5+0Y3mbsMxlQMEyr0TOz1Xp54JE8=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168840424408119', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(488, 1008829, 'blh623480@gmail.com', '1008829_20393', 'odw1anzQO5OTE/q11T2rghKQeaRDbSxQPPO2hqLsOyt7MXHlNg6fhxlhsAS+j5IgZI6v+R106ylapiXl8c9Oguuic14S7NVGYO5OAe9samM=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168802624262924', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(489, 1009464, 'sonujadhav3411@gmail.com', '1009464_17768', 'JSd0+idkWpn1L4vUdV6kUtU97qm9S2rNZqIkAcYbIcAc/5Tr56iRrOKJNL9OxRkb45OFzN+m6Rj/zv39StU9SVy9DH0FXNHIvBxNvAOmzAo=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168185424123822', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(490, 1009487, 'manikpurigovinda5@gmail.com', '1009487_29117', 'ylVQH4VSxgePSHCoQRoP7KdFLImkK+WGWDoPMZx0BIW59xxJ+uhKnCsjB9PMa0BlF67UKFmn4cF5YCM6SUe8SKUBlaHTCUiBtT5UXk9QfFY=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168809424271964', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(491, 1009174, 'sayyampirale@gmail.com', '1009174_23183', 'e51DQwFUf0rwg/H4G2U/D3BsqsDvJqyVGBD3YjKPMcLv/IloGc4+NqhkzKmI+iiEBlBiebqJ9fT6q5MnYfF1n0crwwPoDnx663tmQE0zH7g=', 'null', 'TXN_SUCCESS', '20200420111212800110168385024581158', '20-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(492, 1009236, 'repawalidevi111@gmail.com', '1009236_27783', 'Vb+uK93y/fdXa9Ecjmzo1O2jI+g5x36Yt4n9ygfTdCnqTbsCz+P88EEW2HmpIJ8U9PIWRkUEeF2fzVQNL/C8FWEshaY7/7kX4c9Tuiqr0xs=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168574324367169', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(493, 1009236, 'repawalidevi111@gmail.com', '1009236_27783', 'Vb+uK93y/fdXa9Ecjmzo1O2jI+g5x36Yt4n9ygfTdCnqTbsCz+P88EEW2HmpIJ8U9PIWRkUEeF2fzVQNL/C8FWEshaY7/7kX4c9Tuiqr0xs=', 'WALLET', 'TXN_SUCCESS', '20200420111212800110168574324367169', '20-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(494, 0, '', '', '', '', '', '', '21-04-2020', '', '', '', '', '', 1),
(495, 1008052, 'vishalktiwari143@gmail.com', '1008052_13668', 'hHXxJ8VMsa4u/WD0kz2dDmFoX95SaiBKNUE8ieEygCDKviLw2vA0F904OXJQmX4StTs+QBYCdwyBgmst1eQtNzsTJ1HnaBzcx+ChRrcDTEk=', 'null', 'TXN_SUCCESS', '20200421111212800110168794024515357', '21-04-2020', '25.00', 'INR', 'UPI', '01', 'Txn Success', 1),
(496, 1009565, 'an263012@gmail.com', '1009565_29467', '70aBxDD9+0V5EtBjBBDp48CTTl6mCPKbYaFOhcsIXQ7+CxQjmLO5shpeMlpWW/eaHSFSoXdMdjcsdI+udIZzMb21nONO75YtbtHrSaJ2qSo=', 'WALLET', 'TXN_SUCCESS', '20200421111212800110168819324685563', '21-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(497, 1009585, 'goutamshil1994@gmail.com', '1009585_12600', 'JZ3LtK6TZKYMdElzMGlA24hwk8d5JFKvyDp++s2sd24Yq6Av/Cfaz8wkjTjAZilmmyf5KBSzUFfQ3tb6+4T/qrCPQs4VJr3CtqQnR66Ncu4=', 'WALLET', 'TXN_SUCCESS', '20200421111212800110168600024251918', '21-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(498, 1009585, 'goutamshil1994@gmail.com', '1009585_12600', 'JZ3LtK6TZKYMdElzMGlA24hwk8d5JFKvyDp++s2sd24Yq6Av/Cfaz8wkjTjAZilmmyf5KBSzUFfQ3tb6+4T/qrCPQs4VJr3CtqQnR66Ncu4=', 'WALLET', 'TXN_SUCCESS', '20200421111212800110168600024251918', '21-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1),
(499, 1009499, 'sahilgarnal@gmail.com', '1009499_24343', 'gH+g65V8Z9kLHLbtQVJEOB86L/sK6eecR705mG+18z1wE+KGvkuI451v5mpAATDQZT0cks7pF/qVhiB/uLUmMtQsniXGEVqEVzp496QdNNo=', 'WALLET', 'TXN_SUCCESS', '20200421111212800110168370923985995', '21-04-2020', '25.00', 'INR', 'PPI', '01', 'Txn Success', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_redeem`
--

CREATE TABLE `tbl_redeem` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `Rewarded_ad` varchar(255) NOT NULL,
  `Rewarded_ad_id` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL,
  `coin` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `payment_desc` text NOT NULL,
  `activeidtext` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `email_from`, `onesignal_app_id`, `onesignal_rest_key`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_author`, `app_contact`, `app_website`, `app_description`, `app_developed_by`, `app_privacy_policy`, `api_all_order_by`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`, `Rewarded_ad`, `Rewarded_ad_id`, `points`, `coin`, `price`, `payment`, `payment_desc`, `activeidtext`) VALUES
(1, 'daskadam', '', '', 'daskadam', 'Dus ka dum.png', 'daskadam', '1.0', 'daskadam', '+91 900 0000 000', 'daskadam', '', 'daskadam', '<p><strong>We are committed to protecting your privacy</strong></p>\n\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\n\n<p><strong>Information Collected</strong></p>\n\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\n\n<p><strong>Information Use</strong></p>\n\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\n\n<p><strong>Cookies</strong></p>\n\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\n\n<p><strong>Disclosing Information</strong></p>\n\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\n\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\n\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\n\n<p><strong>Changes to this Policy</strong></p>\n\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\n\n<p><strong>Contacting Us</strong></p>\n\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\n', 'ASC', 10, 'category_name', 'DESC', 'pub-4061009507780652', 'true', 'ca-app-pub-4061009507780652/6445260055', '30', 'true', 'ca-app-pub-4061009507780652/6636831742', 'true', 'ca-app-pub-4061009507780652/7566770036', '100 Points = 1.00 INR', '100 coin', '25 RS', '25', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at honeymoneyyt@gmail.com . You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\r\n', 'Activate Your Id to Prime Membership to get Extra Earning. Earn upto 5 Level Income after Id Activation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_link` varchar(255) NOT NULL,
  `t_point` varchar(255) NOT NULL,
  `t_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`t_id`, `t_name`, `t_link`, `t_point`, `t_status`) VALUES
(1, 'Join Telegram', 'https://t.me/joinchat/AAAAAFSV9-1fE7_Jy1OUBA', '5', 1),
(2, 'Like On Instagram', 'https://www.instagram.com/honeymoneyyt', '5', 1),
(3, 'Subscribe to YouTube', 'https://m.youtube.com/channel/UC4TedjLXrVoDzPsgezfm52A', '5', 1),
(7, 'Give 5 Star Rating', 'https://play.google.com/store/apps/details?id=com.videosongs.newsapp.honeymoneyapp', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `v_type` int(11) NOT NULL,
  `v_id` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `score` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `user_id`, `v_type`, `v_id`, `type`, `date`, `score`) VALUES
(6, 5, 0, 0, 'Direct Refer Bonus', 'May-02-2020 08:55:09', '100');

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
  `wallet` varchar(255) NOT NULL DEFAULT '0',
  `refer_wallet` varchar(11) NOT NULL,
  `code` int(11) NOT NULL,
  `refferal_code` int(11) NOT NULL,
  `first_level_earn` varchar(50) NOT NULL DEFAULT '0',
  `second_level_earn` varchar(50) NOT NULL DEFAULT '0',
  `third_level_earn` varchar(50) NOT NULL DEFAULT '0',
  `four_level_earn` varchar(50) NOT NULL DEFAULT '0',
  `fifth_level_earn` varchar(50) NOT NULL DEFAULT '0',
  `network` int(11) NOT NULL DEFAULT 0,
  `payment_verify` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `login_type`, `name`, `email`, `imageurl`, `password`, `phone`, `device_id`, `wallet`, `refer_wallet`, `code`, `refferal_code`, `first_level_earn`, `second_level_earn`, `third_level_earn`, `four_level_earn`, `fifth_level_earn`, `network`, `payment_verify`, `status`) VALUES
(5, 1, 'admin', 'admin@gmail.com', '', '', '8678968', 'yrj', '104', '0', 1234, 1234, '104', '0', '0', '0', '0', 0, 0, '1'),
(8, 2, 'Tailor Arpit', 'tailorarpit104@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgW6KMq8yxJcyoAeVuC0-mFOKjPr19FoOMn2iykhw=s96-c', '', '4346787997', '9e6c9c3e972df1cb', '9', '0', 8995, 1234, '4', '0', '0', '0', '0', 0, 0, '1'),
(17, 2, 'Tushar palita', 'tushar.vbinfotech@gmail.com', 'https://lh4.googleusercontent.com/-vYX6Z4so90s/AAAAAAAAAAI/AAAAAAAAAAA/AAKWJJO9pqHahsg8sgebwsGKI6WJ0JwASQ/s96-c/photo.jpg', '', '9187805071', '6d7e0b7edc9819f6', '100', '0', 2384, 123456, '0', '0', '0', '0', '0', 0, 0, '1'),
(18, 2, 'Tushar palita', 'palitatushar@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgLlHxrkxFiEyKx2_IRGVFoUi49B8yt-bwg74KuJQ=s96-c', '', '9187805071', 'b0c3f1f2faf9bc4c', '0', '0', 1042, 0, '0', '0', '0', '0', '0', 0, 0, '1'),
(19, 2, 'P.R.O Sardar', 'manpreetsandhu7474@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GiDKOY0QZiAdzefilqazOTErHeykc6vZ7w6yxwSVg=s96-c', '', '9465037236', '2d9cde878df525ac', '0', '0', 6278, 1234, '0', '0', '0', '0', '0', 0, 0, '1'),
(20, 2, 'Android Developer', 'ravikarma2020@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjwRVuLY9oXikZEkOT8n6MzPaYRwpCPwDoI7HPqlg=s96-c', '', '9975026961', 'a3c4da8d3b7e696c', '0', '0', 9416, 123456, '0', '0', '0', '0', '0', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_task`
--

CREATE TABLE `tbl_user_task` (
  `ut_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ut_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_url` text NOT NULL,
  `video_thumbnail` text NOT NULL,
  `totel_viewer` int(11) NOT NULL DEFAULT 0,
  `totel_likes` int(11) NOT NULL,
  `totel_down` int(11) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `video_title`, `video_url`, `video_thumbnail`, `totel_viewer`, `totel_likes`, `totel_down`, `featured`, `status`) VALUES
(4, 'love 4', 'http://vidclipbestapp.com/honey_money/uploads/60669_1657_Dilbar-Dilbar-Lsw3.mp4', '51673_Hydrangeas.jpg', 3076, 200, 68, 0, 1),
(5, 'love 5', 'http://vidclipbestapp.com/honey_money/uploads/57127_2499_Pehli-Dafa-3rxM.mp4', '8396_Penguins.jpg', 2817, 194, 41, 0, 1),
(6, 'Sidhu Moosewala Leaked Song', 'http://amazingstatusapp.com/honey_money/uploads/98066_8524714812d232b33be3fc8b356628e8.mp4', '39906_IMG_20200221_173729_994.jpg', 3640, 91, 12, 0, 1),
(9, 'OutLaw - sidhu Moosewala', 'http://amazingstatusapp.com/honey_money/uploads/45540_Outlaw_whatsapp_status_sidhu_moosewala_outlaw_status_new_punjabi_song_Whatsapp_STATUS.mp4', '410_images (18).jpeg', 2502, 136, 20, 0, 1),
(10, 'Sidhu\'s Antham - Sidhu Moosewala', 'http://amazingstatusapp.com/honey_money/uploads/60769_Sidhu\'s_Anthem_WhatsApp_Status_•_Sidhu_Moosewala_•_Latest_Punjabi_Song_2019.mp4', '74696_images (19).jpeg', 1933, 131, 16, 0, 1),
(11, 'Famous - Sidhu Moosewala', 'http://amazingstatusapp.com/honey_money/uploads/13003_Famous-_Sidhu_Moosewala_|_Whatsapp_Status_2019_|_X_Marty.mp4', '76746_images (17).jpeg', 2563, 166, 41, 0, 1),
(12, 'AR', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/47074_1584286195651.mp4', '84340_1584286195780.png', 0, 0, 0, 0, 0),
(13, 'funny video ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/61014_1584310483119.mp4', '13726_1584310483962.png', 0, 0, 0, 0, 0),
(15, 'SURA BAI ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/94696_1584324744224.mp4', '5040_1584324744423.png', 0, 0, 0, 0, 0),
(16, 'teri aasiki me jana', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/83106_1584335029940.mp4', '71517_1584335030173.png', 0, 0, 0, 0, 0),
(17, 'teri aasiki', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/86673_1584335121229.mp4', '79583_1584335121464.png', 0, 0, 0, 0, 0),
(18, 'dddddk', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/82867_1584340098517.mp4', '91255_1584340098728.png', 0, 0, 0, 0, 0),
(19, 'Truck Driver - Sidhu Moosewala', 'http://amazingstatusapp.com/honey_money/uploads/49741_VID-20200119-WA0037.mp4', '49737_images (22).jpeg', 2211, 147, 2, 0, 1),
(21, 'Punjabi Shayri', 'http://amazingstatusapp.com/honey_money/uploads/30144_Punjabi_sad_????_song_Whatsapp_status_|_new_punjabi_song_status_|_punjabi_status_|_punjabi_sad_status.mp4', '22230_Screenshot_20200316-164407.png', 2593, 269, 10, 0, 1),
(22, 'Same Beef - Sidhu Moosewala', 'http://amazingstatusapp.com/honey_money/uploads/25820_Sidhu_Moosewala_Reply_To_Karan_Aujla_Whatsapp_Status.mp4', '81347_images (24).jpeg', 7618, 602, 70, 0, 1),
(23, 'Sidhu Moosewala - Altitude Shayri', 'http://amazingstatusapp.com/honey_money/uploads/47799_Sidhu_moosewala_WhatsApp_status.mp4', '98968_images (23).jpeg', 8356, 683, 47, 0, 1),
(24, '0@, &.@', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/28091_1584361395774.mp4', '74248_1584361395868.png', 0, 0, 0, 0, 0),
(25, 'funny videos', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/82919_1584450693714.mp4', '25936_1584450693930.png', 3, 0, 0, 1, 0),
(26, 'HAPPY HOLI', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/37772_1584455059441.mp4', '43344_1584455059655.png', 0, 0, 0, 0, 0),
(27, 'BC DJ k', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/93162_1584678989024.mp4', '91857_1584678989469.png', 0, 0, 0, 0, 0),
(28, 'comedy', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/90602_1584715194977.mp4', '37564_1584715195254.png', 0, 0, 0, 0, 0),
(29, 'Sad love ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/92404_1584715716591.mp4', '83839_1584715716762.png', 0, 0, 0, 0, 0),
(30, 'bjjj', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/92370_1584721040471.mp4', '3345_1584721040589.png', 0, 0, 0, 0, 0),
(31, 'holi ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/81831_1584723473219.mp4', '64130_1584723473323.png', 0, 0, 0, 0, 0),
(32, 'path', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/14757_1584750891525.mp4', '58457_1584750891730.png', 0, 0, 0, 0, 0),
(33, 'mmm', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/64974_1584758003031.mp4', '41562_1584758003235.png', 0, 0, 0, 0, 0),
(34, 'target', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/87476_1584759861101.mp4', '31544_1584759861923.png', 0, 0, 0, 0, 0),
(35, 'corona', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/44536_1584777174492.mp4', '74805_1584777174734.png', 0, 0, 0, 0, 0),
(36, 'Tahidul', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/73261_1584777905210.mp4', '78659_1584777905359.png', 0, 0, 0, 0, 0),
(37, 'comedy', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/96675_1584786456248.mp4', '17082_1584786456659.png', 0, 0, 0, 0, 0),
(38, 'love', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/53114_1584795653474.mp4', '94507_1584795653773.png', 0, 0, 0, 0, 0),
(39, 'new', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/85716_1584889211210.mp4', '17172_1584889211526.png', 0, 0, 0, 0, 0),
(40, 'corona zombie', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/84701_1584936839243.mp4', '13753_1584936839378.png', 0, 0, 0, 0, 0),
(42, 'HINDI', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/4467_1585221672075.mp4', '10291_1585221672182.png', 0, 0, 0, 0, 0),
(43, ' girl dance girl dance', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/54546_1585225860576.mp4', '97367_1585225860844.png', 0, 0, 0, 0, 0),
(44, 'image videos', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/2634_1585283818843.mp4', '65669_1585283819141.png', 0, 0, 0, 0, 0),
(45, 'Anand', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/7491_1585454111678.mp4', '84870_1585454111926.png', 0, 0, 0, 0, 0),
(46, 'Ajay Rana', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/90835_1585455652076.mp4', '52616_1585455652238.png', 0, 0, 0, 0, 0),
(47, 'Vicky Kumar', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/36368_1585458450767.mp4', '262_1585458451127.png', 0, 0, 0, 0, 0),
(48, 'sunil vand his good videos hr', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/33485_1585460372156.mp4', '74765_1585460372285.png', 0, 0, 0, 0, 0),
(49, 'Rakesh kumar Hansda ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/20369_1585467069518.mp4', '7741_1585467070776.png', 0, 0, 0, 0, 0),
(50, 'korona virus ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/57851_1585467245576.mp4', '80665_1585467245930.png', 0, 0, 0, 0, 0),
(51, 'videos', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/31843_1585473345053.mp4', '46111_1585473345158.png', 0, 0, 0, 0, 0),
(52, 'love', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/97508_1585490444890.mp4', '69370_1585490445064.png', 0, 0, 0, 0, 0),
(53, 'akki', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/76168_1585512603356.mp4', '91139_1585512603774.png', 0, 0, 0, 0, 0),
(54, 'amit', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/77188_1585513279127.mp4', '62369_1585513279611.png', 0, 0, 0, 0, 0),
(55, 'jivan ki Satya ghatna per aadharit\nyah video aapko ke liye hi jivan mein kahin ghatnaon ki jankari ke liye', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/14248_1585556895241.mp4', '83743_1585556895974.png', 0, 0, 0, 0, 0),
(56, 'Abinash', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/31852_1585560588099.mp4', '33418_1585560588461.png', 0, 0, 0, 0, 0),
(57, 'dil to pagal', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/46137_1585560846720.mp4', '50807_1585560847767.png', 0, 0, 0, 0, 0),
(58, 'song', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/95735_1585565018648.mp4', '42669_1585565018844.png', 0, 0, 0, 0, 0),
(59, 'range', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/19013_1585635983687.mp4', '2116_1585635983956.png', 0, 0, 0, 0, 0),
(60, 'song', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/14650_1585660167248.mp4', '81691_1585660167644.png', 0, 0, 0, 0, 0),
(61, 'sallu bhai', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/91154_1585669420486.mp4', '47961_1585669420632.png', 0, 0, 0, 0, 0),
(62, 'Dsk', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/72485_1585742284771.mp4', '37291_1585742284998.png', 0, 0, 0, 0, 0),
(63, ' logo ne hi bimar kar diya', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/95084_1585755827992.mp4', '65678_1585755828190.png', 0, 0, 0, 0, 0),
(64, 'pubg mobile entertainment', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/87954_1585773561517.mp4', '96994_1585773561628.png', 0, 0, 0, 0, 0),
(65, 'Harish Meena', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/88505_1585774703563.mp4', '84947_1585774703596.png', 0, 0, 0, 0, 0),
(66, 'koi pucha mara dil sa', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/64910_1585774782344.mp4', '36178_1585774790092.png', 0, 0, 0, 0, 0),
(67, 'sweet girl', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/99774_1585774880098.mp4', '50734_1585774880202.png', 0, 0, 0, 0, 0),
(68, 'comedy seence', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/99476_1585805609551.mp4', '64889_1585805609714.png', 0, 0, 0, 0, 0),
(69, 'Arvind fitness', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/72203_1585809759029.mp4', '22667_1585809759262.png', 0, 0, 0, 0, 0),
(70, 'super', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/40487_1585817739980.mp4', '2087_1585817740102.png', 0, 0, 0, 0, 0),
(71, 'kirisa', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/97986_1585829294123.mp4', '57417_1585829294205.png', 0, 0, 0, 0, 0),
(72, 'riyansh suryvanahy', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/59721_1585846330212.mp4', '35387_1585846330554.png', 0, 0, 0, 0, 0),
(73, 'yogesh', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/47602_1585911507499.mp4', '93453_1585911507743.png', 0, 0, 0, 0, 0),
(74, 'covid 19', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/28240_1585953736620.mp4', '41495_1585953736937.png', 0, 0, 0, 0, 0),
(75, 'ristedar bc', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/39350_1585976933502.mp4', '22818_1585976933872.png', 0, 0, 0, 0, 0),
(76, 'THE SONG ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/87051_1585982445418.mp4', '90396_1585982445916.png', 0, 0, 0, 0, 0),
(77, 'funny video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/98509_1586150955579.mp4', '96800_1586150956011.png', 0, 0, 0, 0, 0),
(78, 'this super video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/72640_1586160829962.mp4', '5038_1586160830431.png', 0, 0, 0, 0, 0),
(79, 'sad', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/14257_1586196157677.mp4', '16961_1586196157842.png', 0, 0, 0, 0, 0),
(80, 'Hm', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/37437_1586233131556.mp4', '34110_1586233131695.png', 0, 0, 0, 0, 0),
(81, 'nice=?=?=?', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/1630_1586261132095.mp4', '11312_1586261132584.png', 0, 0, 0, 0, 0),
(82, 'Sikandar Wasta ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/14336_1586321721606.mp4', '89251_1586321721861.png', 0, 0, 0, 0, 0),
(83, 'editor M.K', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/82416_1586345616530.mp4', '59368_1586345616941.png', 0, 0, 0, 0, 0),
(84, 'covid 19', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/98260_1586346409455.mp4', '54208_1586346409989.png', 0, 0, 0, 0, 0),
(85, 'sad song ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/52689_1586350748767.mp4', '62623_1586350749083.png', 0, 0, 0, 0, 0),
(86, 'pro', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/39144_1586375042079.mp4', '29986_1586375042375.png', 0, 0, 0, 0, 0),
(87, 'pusing2 dah tu ank', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/79873_1586375370749.mp4', '50048_1586375371407.png', 0, 0, 0, 0, 0),
(88, 'Nice video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/11656_1586389627154.mp4', '83343_1586389627374.png', 0, 0, 0, 0, 0),
(89, 'hi', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/98029_1586500482172.mp4', '48146_1586500482536.png', 0, 0, 0, 0, 0),
(90, 'status', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/73695_1586508665369.mp4', '138_1586508665552.png', 0, 0, 0, 0, 0),
(91, 'Love status', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/58374_1586519197173.mp4', '61457_1586519197451.png', 0, 0, 0, 0, 0),
(92, 'new whatsapp ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/74736_1586528916991.mp4', '48447_1586528917465.png', 0, 0, 0, 0, 0),
(93, 'Red eyes ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/75476_1586526041239.mp4', '40144_1586526041366.png', 0, 0, 0, 0, 0),
(94, 'tanimanjhi', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/77393_1586582186375.mp4', '20060_1586582186595.png', 0, 0, 0, 0, 0),
(95, 'online earning', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/45191_1586584769721.mp4', '18997_1586584769821.png', 0, 0, 0, 0, 0),
(96, 'hit', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/21203_1586588571019.mp4', '6836_1586588571408.png', 0, 0, 0, 0, 0),
(97, 'heart touching', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/55852_1586590107204.mp4', '86265_1586590107324.png', 0, 0, 0, 0, 0),
(98, 'YAAR meraa', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/90773_1586633688808.mp4', '11264_1586633688879.png', 0, 0, 0, 0, 0),
(99, 'funny', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/6163_1586671534301.mp4', '19277_1586671534402.png', 0, 0, 0, 0, 0),
(100, 'love1', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/75548_1586675183519.mp4', '65132_1586675183940.png', 0, 0, 0, 0, 0),
(101, 'ikrar', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/13826_1586772849564.mp4', '22257_1586772849737.png', 0, 0, 0, 0, 0),
(102, 'Love songs ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/60947_1586785061677.mp4', '83873_1586785061788.png', 0, 0, 0, 0, 0),
(103, 'Corano ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/6514_1586798514075.mp4', '38294_1586798514217.png', 0, 0, 0, 0, 0),
(104, 'vjfxkg', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/67122_1586844810504.mp4', '88281_1586844811167.png', 0, 0, 0, 0, 0),
(105, 'Dog\n', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/75825_1586879628753.mp4', '60611_1586879628931.png', 0, 0, 0, 0, 0),
(106, 'mask', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/12639_1586885015721.mp4', '82927_1586885016279.png', 0, 0, 0, 0, 0),
(107, 'Love', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/4144_1586912624169.mp4', '74040_1586912624564.png', 0, 0, 0, 0, 0),
(108, 'love states', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/15029_1586936394378.mp4', '80277_1586936394512.png', 0, 0, 0, 0, 0),
(109, 'Comedi Video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/10428_1586963033650.mp4', '45139_1586963033873.png', 0, 0, 0, 0, 0),
(110, 'Comedi Video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/33743_1586963424168.mp4', '94408_1586963424318.png', 0, 0, 0, 0, 0),
(111, 'like video', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/59884_1586964817152.mp4', '4652_1586964817385.png', 0, 0, 0, 0, 0),
(112, 'Dilwar dilwar', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/67804_1586965318265.mp4', '75529_1586965318463.png', 0, 0, 0, 0, 0),
(113, 'du sol', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/43205_1587017544953.mp4', '61509_1587017545198.png', 0, 0, 0, 0, 0),
(114, 'Anand', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/78844_1587017604795.mp4', '52188_1587017604989.png', 0, 0, 0, 0, 0),
(115, 'Amit Kumar ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/12907_1587032392755.mp4', '18507_1587032393071.png', 0, 0, 0, 0, 0),
(116, 'Sidhu moose wala ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/68924_1587036170978.mp4', '76561_1587036171121.png', 0, 0, 0, 0, 0),
(117, 'avjabs', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/62458_1587036480394.mp4', '29247_1587036480607.png', 0, 0, 0, 0, 0),
(118, 'Love song ', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/64081_1587045900643.mp4', '91603_1587045900842.png', 0, 0, 0, 0, 0),
(119, 'babu', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/85504_1587102083190.mp4', '64137_1587102083794.png', 0, 0, 0, 0, 0),
(120, 'love', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/34058_1587104483365.mp4', '2219_1587104483576.png', 0, 0, 0, 0, 0),
(121, 'fitness', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/20132_1587117649542.mp4', '62241_1587117649637.png', 0, 0, 0, 0, 0),
(122, 'funny', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/10632_1587285760871.mp4', '57179_1587285761019.png', 0, 0, 0, 0, 0),
(123, 'dal chaval', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/31775_1587294630818.mp4', '84545_1587294631084.png', 0, 0, 0, 0, 0),
(124, 'dance', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/80100_1587300953231.mp4', '67370_1587300953393.png', 0, 0, 0, 0, 0),
(125, 'YouTube gaming channel', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/57165_1587305592651.mp4', '2008_1587305594473.png', 0, 0, 0, 0, 0),
(126, 'boudi baaz', 'http://amazingstatusapp.com/khushboo/kmrgold/uploads/84361_1587367414340.mp4', '4100_1587367415613.png', 0, 0, 0, 0, 0),
(127, 'efwef', 'http://amazingstatusapp.com/daskadam/uploads/83993_35946Koi-Nahi-Hain-Apna.mp4', '9498_37439Screenshot_4.jpg', 4, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daily_task`
--
ALTER TABLE `tbl_daily_task`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_network`
--
ALTER TABLE `tbl_network`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_transaction`
--
ALTER TABLE `tbl_payment_transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tbl_redeem`
--
ALTER TABLE `tbl_redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  ADD PRIMARY KEY (`ut_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
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
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_daily_task`
--
ALTER TABLE `tbl_daily_task`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_network`
--
ALTER TABLE `tbl_network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_payment_transaction`
--
ALTER TABLE `tbl_payment_transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `tbl_redeem`
--
ALTER TABLE `tbl_redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
