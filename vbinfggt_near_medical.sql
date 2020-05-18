-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2020 at 01:49 PM
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
-- Database: `vbinfggt_near_medical`
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
(1, 'admin', 'admin', 'viaviwebtech@gmail.com', 'profile.png');

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
(12, '94513_20200428_231218.jpg', 1),
(13, '6069_20200420_223355.jpg', 1),
(14, '97648_cannabis-cannabis-seeds-cannabis-oil-placed-wooden-floor-with-green-tree-background_1150-18860.jpg', 1),
(15, '33504_chamomile-tea-with-red-currants-lemons-sugar-cubes-leaves-cup-sauce-dark-placemat-background-flat-lay_176474-4753.jpg', 1),
(18, '2334_coronavirus-covid-19-virus-low-poly-style-design_68377-323.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business`
--

CREATE TABLE `tbl_business` (
  `b_id` int(11) NOT NULL,
  `b_phone` varchar(50) NOT NULL,
  `b_desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_business`
--

INSERT INTO `tbl_business` (`b_id`, `b_phone`, `b_desc`) VALUES
(1, '83838737878', '<h2>sit amet, tincidunt porta justo. Integer nisi massa, gravida sit amet tincidunt at, pellentesque eget orci.</h2>\r\n\r\n<p>Mauris sodales vitae leo id rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et luctus est. Sed eu lacinia erat, vitae vestibulum elit. Donec pulvinar sed erat sit amet ullamcorper. Mauris suscipit neque eu erat malesuada posuere. Mauris volutpat, neque in blandit pulvinar, odio purus aliquam ligula, vel tristique nibh ipsum eget magna. Mauris venenatis enim sed lorem venenatis porta. Fusce egestas malesuada ex sit amet consequat. Etiam ac sem ipsum.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `category_name`, `category_description`, `category_image`, `status`) VALUES
(9, 'Doctor', 'Book Visit', '49664_Adobe_Post_20200515_0226490.7123227420798144.png', 1),
(10, 'Pharmacy', 'Buy Medicines', '47279_medicine.png', 1),
(11, 'Path Lab ', 'Book Test', '51396_medicine.png', 1),
(12, 'Radiology', 'Book Visit', '7926_medicine.png', 1),
(13, 'Dentist', 'Book Visit', '93894_doctor.png', 1),
(14, 'Physiotherapy', 'Book Visit', '33487_doctor.png', 1),
(15, 'Nursing Care @ Home', 'Patient Care  |  Elder Care  |  Baby Care', '61900_nurse_1020-678.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dentist_list`
--

CREATE TABLE `tbl_dentist_list` (
  `dt_id` int(11) NOT NULL,
  `dt_name` varchar(255) NOT NULL,
  `dt_service` varchar(255) NOT NULL,
  `dt_certi` varchar(255) NOT NULL,
  `dt_image` varchar(255) NOT NULL,
  `dt_img` varchar(255) NOT NULL,
  `dt_banner_image` varchar(255) NOT NULL,
  `dt_phone_no` varchar(11) NOT NULL,
  `dt_degree` varchar(50) NOT NULL,
  `dt_experience` varchar(50) NOT NULL,
  `dt_address` varchar(100) NOT NULL,
  `dt_postal_code` varchar(255) NOT NULL,
  `dt_lattitude` varchar(255) NOT NULL,
  `dt_longitude` varchar(255) NOT NULL,
  `dt_fees` varchar(50) NOT NULL,
  `dt_home` int(1) NOT NULL,
  `dt_clinic` int(1) NOT NULL,
  `dt_km` int(11) NOT NULL,
  `dt_speciality` varchar(255) NOT NULL,
  `dt_mon_name` varchar(50) NOT NULL,
  `dt_mon_time` varchar(50) NOT NULL,
  `dt_tu_name` varchar(50) NOT NULL,
  `dt_tu_time` varchar(50) NOT NULL,
  `dt_we_name` varchar(50) NOT NULL,
  `dt_we_time` varchar(50) NOT NULL,
  `dt_th_name` varchar(50) NOT NULL,
  `dt_th_time` varchar(50) NOT NULL,
  `dt_fr_name` varchar(50) NOT NULL,
  `dt_fr_time` varchar(50) NOT NULL,
  `dt_sa_name` varchar(50) NOT NULL,
  `dt_sa_time` varchar(50) NOT NULL,
  `dt_su_name` varchar(50) NOT NULL,
  `dt_su_time` varchar(50) NOT NULL,
  `dt_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dentist_list`
--

INSERT INTO `tbl_dentist_list` (`dt_id`, `dt_name`, `dt_service`, `dt_certi`, `dt_image`, `dt_img`, `dt_banner_image`, `dt_phone_no`, `dt_degree`, `dt_experience`, `dt_address`, `dt_postal_code`, `dt_lattitude`, `dt_longitude`, `dt_fees`, `dt_home`, `dt_clinic`, `dt_km`, `dt_speciality`, `dt_mon_name`, `dt_mon_time`, `dt_tu_name`, `dt_tu_time`, `dt_we_name`, `dt_we_time`, `dt_th_name`, `dt_th_time`, `dt_fr_name`, `dt_fr_time`, `dt_sa_name`, `dt_sa_time`, `dt_su_name`, `dt_su_time`, `dt_status`) VALUES
(4, 'Dr Dentist', 'jshjjnndd dcjkndjkdnjkdc dcjjkn dcjkndjkcnd  djnkjdnkd', '', '95290_Dentist.png', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png', '99947_banner-1.png', '54649845', 'BDS, MDS', '15 years', 'Shivaji Chowk, Nilje Gaon, Maharashtra 421204', '421204', '19.1540485', '73.0830289', '', 1, 1, 15, 'Dentist', 'Monday', '9am - 9pm', 'Tuesday', '9am - 9pm', 'Wednesday', '9am - 9pm', 'Thursday', '9am - 9pm', 'Friday', '9am - 9pm', 'Saturday', '9am - 9pm', 'Sunday', 'Closed', 1),
(5, 'Dentist 234', 'hbbjnnkjsnkjnj jjncjknsk', '', '23778_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', 'DrPatientistock.jpg,himgiri-physiotherapy-center.jpg,hospitalisation-service-hospital-bed-israel-afp.jpg', '79596_hospitalisation-service-hospital-bed-israel-afp.jpg', '1787126665', 'BDS', '8 years', 'Lodha Xperia Mall, Mall Office, Basement Level, Kalyan - Shilphata Rd, Casa Bella Gold, Palava, Domb', '421204', '21.1835897', '72.7808704', '', 0, 1, 12, 'Dentist', 'Monday', '9am - 9pm', 'Tuesday', '9am - 9pm', 'Wednesday', '9am - 9pm', 'Thursday', '9am - 9pm', 'Friday', '9am - 9pm', 'Saturday', '9am - 9pm', 'Sunday', 'Closed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_cat`
--

CREATE TABLE `tbl_doctor_cat` (
  `dc_id` int(11) NOT NULL,
  `dc_name` varchar(255) NOT NULL,
  `dc_image` varchar(255) NOT NULL,
  `dc_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor_cat`
--

INSERT INTO `tbl_doctor_cat` (`dc_id`, `dc_name`, `dc_image`, `dc_status`) VALUES
(8, 'Paediatrician', '25846_doctor-category.png', 0),
(6, 'Physician', '2358_Adobe_Post_20200429_0000050.1779912473956652.png', 0),
(7, 'Surgeon', '31929_Adobe_Post_20200429_0000190.3279082127733536.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_list`
--

CREATE TABLE `tbl_doctor_list` (
  `did` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_img` varchar(255) NOT NULL,
  `d_image` varchar(255) NOT NULL,
  `d_banner_image` varchar(255) NOT NULL,
  `d_cat` int(255) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `lattitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `fees` int(11) NOT NULL,
  `home` int(1) NOT NULL,
  `clinic` int(1) NOT NULL,
  `d_km` int(11) NOT NULL,
  `d_service` text NOT NULL,
  `d_mon_name` varchar(255) NOT NULL,
  `d_mon_time` varchar(255) NOT NULL,
  `d_tu_name` varchar(255) NOT NULL,
  `d_tu_time` varchar(255) NOT NULL,
  `d_we_name` varchar(255) NOT NULL,
  `d_we_time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `d_th_name` varchar(50) NOT NULL,
  `d_th_time` varchar(50) NOT NULL,
  `d_fr_name` varchar(50) NOT NULL,
  `d_fr_time` varchar(50) NOT NULL,
  `d_sa_name` varchar(50) NOT NULL,
  `d_sa_time` varchar(50) NOT NULL,
  `d_su_name` varchar(50) NOT NULL,
  `d_su_time` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor_list`
--

INSERT INTO `tbl_doctor_list` (`did`, `cid`, `d_name`, `d_img`, `d_image`, `d_banner_image`, `d_cat`, `phone_no`, `degree`, `experience`, `address`, `postal_code`, `lattitude`, `longitude`, `fees`, `home`, `clinic`, `d_km`, `d_service`, `d_mon_name`, `d_mon_time`, `d_tu_name`, `d_tu_time`, `d_we_name`, `d_we_time`, `status`, `d_th_name`, `d_th_time`, `d_fr_name`, `d_fr_time`, `d_sa_name`, `d_sa_time`, `d_su_name`, `d_su_time`) VALUES
(13, 0, 'bssjd sajsdjdas snsbbnas', '68568_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png,BN-LI802_igener_G_20151119062740.jpg,campus-Riverside-Ottawa-The-Hospital-Ont.jpg', '6034_campus-Riverside-Ottawa-The-Hospital-Ont.jpg', 6, '7738419514', 'MBBS, MD Medicine', '6 years', 'Lodha Xperia Mall, Mall Office, Basement Level, Kalyan - Shilphata Rd, Casa Bella Gold, Palava, Dombivli, Maharashtra 421204, India', 421204, '19.165487', '73.0750669', 0, 0, 1, 15, 'jsdhjkkakajjsan, sjbjknajnjkansa, assjbasas, shjsbbs, sjsjs', 'Monday', '10 am-2 pm & 6 pm-9 pm', 'Tuesday', '10 am-2 pm & 6 pm-9 pm', 'Wednesday', '10 am-2 pm & 6 pm-9 pm', 1, 'Thursday', '10 am-2 pm & 6 pm-9 pm', 'Friday', '10 am-2 pm & 6 pm-9 pm', 'Saturday', '10 am-2 pm & 6 pm-9 pm', 'Sunday', 'Closed'),
(14, 0, 'Dr. Pande', '89042_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png,BN-LI802_igener_G_20151119062740.jpg', '4819_campus-Riverside-Ottawa-The-Hospital-Ont.jpg', 8, '8286640640', 'MBBS, MS Surgery', '12 years', 'Bhopar Rd, Patil Wadi, Taluka, Kalyan, Maharashtra 421201, India', 421201, '19.2007486', '73.07427229999999', 0, 1, 1, 20, 'sjdsjdsjcs cs, cjjcxcxzc, xckjnjcnkjnckj, xjxxnjs', 'Monday', '10 am-2 pm & 6 pm-9 pm', 'Tuesday', '10 am-2 pm & 6 pm-9 pm', 'Wednesday', '10 am-2 pm & 6 pm-9 pm', 1, 'Thursday', '10 am-2 pm & 6 pm-9 pm', 'Friday', '10 am-2 pm & 6 pm-9 pm', 'Saturday', '10 am-2 pm & 6 pm-9 pm', 'Sunday', 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health`
--

CREATE TABLE `tbl_health` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_image` varchar(255) NOT NULL,
  `h_desc` text NOT NULL,
  `h_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_health`
--

INSERT INTO `tbl_health` (`h_id`, `h_name`, `h_image`, `h_desc`, `h_status`) VALUES
(8, 'COVID-19 live updates: Total number of cases passes 2.5 million', '70073_critical-illness-health-insurance-1280x-720-770x433.jpg', '<h2><strong>COVID-19 live updates: Total number of cases passes 2.5 million</strong></h2>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p><a name=\"definition\">What is a coronavirus?</a></p>\r\n\r\n<p><img alt=\"a man sneezing into a tissue to help stop the spread of coronavirus\" src=\"https://i0.wp.com/post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/GettyImages-181135370_hero-1024x575.jpg?w=1155&amp;h=1528\" />Share on Pinterest</p>\r\n\r\n<p>Covering the mouth when sneezing may help stop the spread of coronaviruses.</p>\r\n\r\n<p>Researchers&nbsp;<a href=\"https://www.sciencedirect.com/science/article/pii/S0042682214004723\" target=\"_blank\">first isolated a coronavirus</a>&nbsp;in 1937. They found a coronavirus responsible for an infectious&nbsp;<a href=\"https://www.medicalnewstoday.com/articles/8888.php\">bronchitis</a>&nbsp;virus in birds that had the potential to devastate poultry stocks.</p>\r\n\r\n<p>Scientists first found evidence of human coronaviruses in the 1960s, in the noses of people with the common cold. Common human coronaviruses&nbsp;<a href=\"https://www.cdc.gov/coronavirus/general-information.html\" target=\"_blank\">include</a>&nbsp;229E, NL63, OC43, and HKU1.</p>\r\n\r\n<p>The name &ldquo;coronavirus&rdquo; comes from the crown-like projections on their surfaces. &ldquo;Corona&rdquo; in Latin means &ldquo;halo&rdquo; or &ldquo;crown.&rdquo;</p>\r\n\r\n<p>Among humans, coronavirus infections most often occur during the winter months and&nbsp;<a href=\"http://jcm.asm.org/content/48/8/2940.abstract?utm_source=TrendMDJClinMicrobiol&amp;utm_medium=TrendMDJClinMicrobiol&amp;utm_campaign=TrendMD_JCMCLIN_0\" target=\"_blank\">early spring</a>.</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p><a name=\"covid-19\">COVID-19</a></p>\r\n\r\n<p>In 2019, the&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/index.html\" target=\"_blank\">Centers for Disease Control and Prevention (CDC)</a>&nbsp;started monitoring the outbreak of a new coronavirus, SARS-CoV-2, which causes COVID-19. Authorities first identified the virus in Wuhan, China.</p>\r\n\r\n<p>Since then, the virus has spread to&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/cases-updates/world-map.html\" target=\"_blank\">nearly every country</a>, leading the&nbsp;<a href=\"https://www.who.int/dg/speeches/detail/who-director-general-s-opening-remarks-at-the-media-briefing-on-covid-19---11-march-2020\" target=\"_blank\">World Health Organization (WHO)</a>&nbsp;to declare this as a pandemic.</p>\r\n\r\n<p>The new coronavirus has been responsible for&nbsp;<a href=\"https://coronavirus.jhu.edu/map.html\" target=\"_blank\">millions</a>&nbsp;of infections globally, causing hundreds of thousands of deaths. The United States is the most affected country.</p>\r\n\r\n<p>The first people with COVID-19 had links to an animal and seafood market. This suggested that animals initially transmitted the virus to humans. However, people with a more recent diagnosis had no connections with or exposure to the market, confirming that humans can pass the virus to each other.</p>\r\n\r\n<p><a href=\"https://www.medicalnewstoday.com/articles/coronavirus-pangolins-may-have-spread-the-disease-to-humans\">Read about how pangolins could be the source of COVID-19 here.</a></p>\r\n\r\n<p>In the past, people have spread respiratory conditions that develop from coronaviruses through close physical contact.</p>\r\n\r\n<p>On February 17, 2020, the director general of the WHO presented at a media briefing the&nbsp;<a href=\"https://www.who.int/dg/speeches/detail/who-director-general-s-remarks-at-the-media-briefing-on-covid-2019-outbreak-on-17-february-2020\" target=\"_blank\">following updates</a>&nbsp;on how often the symptoms of COVID-19 are severe or fatal, using data from 44,000 people with a confirmed diagnosis:</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Stage of severity</td>\r\n			<td>Rough percentage of people with COVID-19</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mild disease from which a person can recover</td>\r\n			<td>More than 80%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Severe disease, causing breathlessness and pneumonia</td>\r\n			<td>Around 14%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Critical disease, including septic shock, respiratory failure, and the failure of more than one organ</td>\r\n			<td>About 5%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fatal disease</td>\r\n			<td>2%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>The&nbsp;<a href=\"https://www.who.int/docs/default-source/coronaviruse/situation-reports/20200311-sitrep-51-covid-19.pdf?sfvrsn=1ba62e57_8https://www.who.int/docs/default-source/coronaviruse/situation-reports/20200311-sitrep-51-covid-19.pdf?sfvrsn=1ba62e57_8\" target=\"_blank\">WHO</a>&nbsp;report that the two groups most at risk of experiencing severe illness due to a SARS-CoV-2 infection are older adults and people who have other health conditions that compromise their immune system.</p>\r\n\r\n<p>According to the&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/faq.html?CDC_AA_refVal=https%3A%2F%2Fwww.cdc.gov%2Fcoronavirus%2F2019-ncov%2Fprepare%2Fchildren-faq.html\" target=\"_blank\">CDC</a>, children are not at higher risk of COVID-19 than adults.</p>\r\n\r\n<p>Although there are currently no published scientific reports about the susceptibility of pregnant women, the&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/hcp/pregnant-women-faq.html\" target=\"_blank\">CDC</a>&nbsp;note that:<br />\r\n<br />\r\n&ldquo;Pregnant [women] have had a higher risk of severe illness when infected with viruses from the same family as COVID-19 and other viral respiratory infections.&rdquo;</p>\r\n\r\n<p>The&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/hcp/inpatient-obstetric-healthcare-guidance.html?deliveryName=FCP_3_USCDC_1052%20DM22033\" target=\"_blank\">CDC</a>&nbsp;also recommend that infants born to mothers with suspected or confirmed COVID-19 go into isolation.</p>\r\n\r\n<h3>Symptoms of COVID-19</h3>\r\n\r\n<p>Symptoms&nbsp;<a href=\"https://www.cdc.gov/coronavirus/2019-ncov/about/symptoms.html\" target=\"_blank\">vary</a>&nbsp;from person to person with COVID-19. It may produce few or no symptoms, but it can also lead to severe illness and may be fatal.</p>\r\n\r\n<p>Common symptoms include:</p>\r\n\r\n<ul>\r\n	<li>a fever</li>\r\n	<li>breathlessness</li>\r\n	<li>a cough</li>\r\n	<li>body aches and pains</li>\r\n	<li>a runny or congested nose</li>\r\n	<li>a&nbsp;<a href=\"https://post.medicalnewstoday.com/articles/311449\" target=\"_blank\">sore throat</a></li>\r\n	<li>a&nbsp;<a href=\"https://post.medicalnewstoday.com/articles/73936\" target=\"_blank\">headache</a></li>\r\n	<li>chills</li>\r\n	<li>repeated shaking with chills</li>\r\n	<li>new loss of taste or smell</li>\r\n</ul>\r\n\r\n<p>It may take 2&ndash;14 days for a person to notice symptoms after infection with the virus.</p>\r\n\r\n<p><a href=\"https://www.cdc.gov/coronavirus/2019-ncov/about/prevention-treatment.html\" target=\"_blank\">No vaccine</a>&nbsp;is currently available for COVID-19. However, scientists have now replicated the virus. This could allow for early detection and treatment in people who have the virus but are not yet showing symptoms.</p>\r\n', 1),
(9, 'Can CT scans diagnose COVID-19? Experts argue for and against', '40511_young-family-medical-masks-during-home-quarantine_109285-5698.jpg', '<h1>Can CT scans diagnose COVID-19? Experts argue for and against</h1>\r\n\r\n<p>What is the best way of establishing a firm diagnosis for COVID-19?</p>\r\n\r\n<p>For many, the use of&nbsp;<a href=\"https://jamanetwork.com/journals/jama/fullarticle/2764238\" target=\"_blank\">reverse transcriptase polymerase chain reaction (RT-PCR)</a>&nbsp;is the gold standard. This molecular biology technique detects genetic material that is specific for the SARS-CoV-2 virus. Yet, RT-PCR is not 100% accurate, and some&nbsp;<a href=\"https://www.mayoclinicproceedings.org/article/S0025-6196(20)30365-7/fulltext\" target=\"_blank\">experts</a>&nbsp;have raised questions around false-positive and false-negative test results.</p>\r\n\r\n<p><em>Stay informed with&nbsp;<a href=\"https://www.medicalnewstoday.com/articles/live-updates-coronavirus-covid-19\">live updates</a>&nbsp;on the current COVID-19 outbreak and visit our&nbsp;<a href=\"https://www.medicalnewstoday.com/coronavirus\">coronavirus hub</a>&nbsp;for more advice on prevention and treatment.</em></p>\r\n\r\n<p>Could computed tomography (CT) scans, which combine a series of X-ray images, serve as an alternative or an adjunct to RT-PCR diagnosis?</p>\r\n\r\n<p>There have been reports from Wuhan in China of healthcare professionals using&nbsp;<a href=\"https://www.medicalnewstoday.com/articles/153201\">CT scans</a>&nbsp;to diagnose COVID-19, yet medical and public health bodies in the United States have not followed suit.</p>\r\n\r\n<p><em>Medical News Today</em>&nbsp;spoke to two doctors on opposing sides of the argument around the use of CT scans during the pandemic.</p>\r\n\r\n<p>Arguing for the use of CT is Dr. Joseph Fraiman, M.D., an emergency doctor working in the New Orleans area, LA, and a former Medical Manager for Lousiana&rsquo;s Disaster Task Force 1 Urban Search and Rescue Team.</p>\r\n\r\n<p>On the opposing side is Dr. Mark Hammer, M.D., from the Department of Radiology at Brigham and Women&rsquo;s Hospital, Harvard Medical School, in Boston, MA. He writes on behalf of a group of doctors who recently published a viewpoint article on this topic in&nbsp;<a href=\"https://www.thelancet.com/journals/lancet/article/PIIS0140-6736(20)30728-5/fulltext\" target=\"_blank\"><em>The Lancet</em></a>.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labs_list`
--

CREATE TABLE `tbl_labs_list` (
  `lb_id` int(11) NOT NULL,
  `lb_name` varchar(255) NOT NULL,
  `lb_img` varchar(255) NOT NULL,
  `lb_image` varchar(255) NOT NULL,
  `lb_banner_image` varchar(255) NOT NULL,
  `lb_phone_no` varchar(11) NOT NULL,
  `lb_address` text NOT NULL,
  `lb_postal_code` int(11) NOT NULL,
  `lb_lattitude` varchar(255) NOT NULL,
  `lb_longitude` varchar(255) NOT NULL,
  `lb_fees` varchar(50) NOT NULL,
  `lb_certi` varchar(255) NOT NULL,
  `lb_speciality` varchar(255) NOT NULL,
  `lb_discount` varchar(50) NOT NULL,
  `lb_collection` int(1) NOT NULL,
  `lb_popular` int(1) NOT NULL,
  `lb_km` int(11) NOT NULL,
  `lb_service` varchar(255) NOT NULL,
  `lb_mon_name` varchar(50) NOT NULL,
  `lb_mon_time` varchar(50) NOT NULL,
  `lb_tu_name` varchar(50) NOT NULL,
  `lb_tu_time` varchar(50) NOT NULL,
  `lb_we_name` varchar(50) NOT NULL,
  `lb_we_time` varchar(50) NOT NULL,
  `lb_th_name` varchar(50) NOT NULL,
  `lb_th_time` varchar(50) NOT NULL,
  `lb_fr_name` varchar(50) NOT NULL,
  `lb_fr_time` varchar(50) NOT NULL,
  `lb_sa_name` varchar(50) NOT NULL,
  `lb_sa_time` varchar(50) NOT NULL,
  `lb_su_name` varchar(50) NOT NULL,
  `lb_su_time` varchar(50) NOT NULL,
  `lb_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_labs_list`
--

INSERT INTO `tbl_labs_list` (`lb_id`, `lb_name`, `lb_img`, `lb_image`, `lb_banner_image`, `lb_phone_no`, `lb_address`, `lb_postal_code`, `lb_lattitude`, `lb_longitude`, `lb_fees`, `lb_certi`, `lb_speciality`, `lb_discount`, `lb_collection`, `lb_popular`, `lb_km`, `lb_service`, `lb_mon_name`, `lb_mon_time`, `lb_tu_name`, `lb_tu_time`, `lb_we_name`, `lb_we_time`, `lb_th_name`, `lb_th_time`, `lb_fr_name`, `lb_fr_time`, `lb_sa_name`, `lb_sa_time`, `lb_su_name`, `lb_su_time`, `lb_status`) VALUES
(10, 'ABGJ djcndnckddc', '10969_scientist-special-equipment-is-showing-coronavirus-testing-sample_1157-31355.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,campus-Riverside-Ottawa-The-Hospital-Ont.jpg,chemists_149609345361_647x404_053017030344_0.jpg', '88142_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', '46584123354', 'Manpada Rd, Krishna Radha Society, Dombivli East, Dombivli, Maharashtra 421201, India', 421201, '19.217428', '73.089649', '', 'NABL', 'Pathology', 'Offer Not Available ', 1, 1, 20, 'hgghbsjsd sjsjsn sj  sj s sjc sjs sbss jcbbjkcks scjcsc cjkskccs c csc scscnskcs ckjskcsjk ', 'Monday', '9 am - 9 pm', 'Tuesday', '9 am - 9 pm', 'Wednesday', '9 am - 9 pm', 'Thursday', '9 am - 9 pm', 'Friday', '9 am - 9 pm', 'Saturday', '9 am - 9 pm', 'Sunday', 'Closed', 1),
(11, 'sdjdskjcsdj djjjd dsjjjkdnjk', '54116_two-liquid-samples-plastic-vials-hand-female-scientist_87646-4067.jpg', 'campus-Riverside-Ottawa-The-Hospital-Ont.jpg', '43979_chemists_149609345361_647x404_053017030344_0.jpg', '8286640640', 'Bhopar Rd, Patil Wadi, Taluka, Kalyan, Maharashtra 421201, India', 421201, '19.2007486', '73.07427229999999', '', 'NABL', 'Pathology', 'Offer not available today', 0, 1, 15, 'jjjjkdkdhjhkd sdjknnjkdns sjknsjksnd sdjksnjksn', 'Monday', '9 am - 9 pm', 'Tuesday', '9 am - 9 pm', 'Wednesday', '9 am - 9 pm', 'Thursday', '9 am - 9 pm', 'Friday', '9 am - 9 pm', 'Saturday', '9 am - 9 pm', 'Sunday', 'Closed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `name`, `lat`, `long`) VALUES
(1, 'test1', '21.186536', '72.793179'),
(2, 'test2', '21.183601', '72.783107');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nurse_list`
--

CREATE TABLE `tbl_nurse_list` (
  `nr_id` int(11) NOT NULL,
  `nr_name` varchar(255) NOT NULL,
  `nr_image1` varchar(255) NOT NULL,
  `nr_text1` varchar(255) NOT NULL,
  `nr_image2` varchar(255) NOT NULL,
  `nr_text2` varchar(255) NOT NULL,
  `nr_image3` varchar(255) NOT NULL,
  `nr_text3` varchar(255) NOT NULL,
  `nr_image4` varchar(255) NOT NULL,
  `nr_text4` varchar(255) NOT NULL,
  `nr_desc` text NOT NULL,
  `nr_terms_conditions` text NOT NULL,
  `nr_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nurse_list`
--

INSERT INTO `tbl_nurse_list` (`nr_id`, `nr_name`, `nr_image1`, `nr_text1`, `nr_image2`, `nr_text2`, `nr_image3`, `nr_text3`, `nr_image4`, `nr_text4`, `nr_desc`, `nr_terms_conditions`, `nr_status`) VALUES
(2, 'nurse 1a', '36887_chemists_149609345361_647x404_053017030344_0.jpg', 'Patient Care @ Home', '41480_hospitalisation-service-hospital-bed-israel-afp.jpg', 'image 2a', '14981_campus-Riverside-Ottawa-The-Hospital-Ont.jpg', 'image 3a', '4465_chemists_149609345361_647x404_053017030344_0.jpg', 'image 4a', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '<h1>Lorem Ipsum</h1>\r\n\r\n<p>&quot;Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...&quot;</p>\r\n\r\n<p>&quot;There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...&quot;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis mi id ante dapibus, a convallis sem pellentesque. Vivamus a ante in sem facilisis cursus nec non diam. Quisque eget risus tristique, suscipit metus vel, commodo nibh. Phasellus vulputate quam dictum ipsum blandit, sed faucibus sem auctor. Vestibulum ut risus ultricies neque posuere tempor. Etiam lorem metus, sollicitudin quis luctus nec, consequat cursus quam. Pellentesque a purus et lorem mollis porttitor a id orci. Cras et molestie lacus. Mauris massa odio, ornare et lectus sit amet, tincidunt porta justo. Integer nisi massa, gravida sit amet tincidunt at, pellentesque eget orci.</p>\r\n\r\n<p>Mauris sodales vitae leo id rutrum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut et luctus est. Sed eu lacinia erat, vitae vestibulum elit. Donec pulvinar sed erat sit amet ullamcorper. Mauris suscipit neque eu erat malesuada posuere. Mauris volutpat, neque in blandit pulvinar, odio purus aliquam ligula, vel tristique nibh ipsum eget magna. Mauris venenatis enim sed lorem venenatis porta. Fusce egestas malesuada ex sit amet consequat. Etiam ac sem ipsum.</p>\r\n\r\n<p>Nunc feugiat, diam ut egestas euismod, tellus ex ullamcorper erat, id porta mi odio ut massa. Cras ac lacus posuere sem ornare imperdiet. Nulla eget cursus lorem. Cras sit amet scelerisque sapien. In vitae dui posuere, lobortis magna id, tempor ligula. Suspendisse potenti. Nulla mollis justo vel interdum tristique. Praesent eget mollis purus, id cursus metus.</p>\r\n\r\n<p>Donec efficitur lorem eu est fermentum rutrum. Sed vulputate gravida suscipit. Sed congue diam diam, et accumsan neque lobortis et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien lorem, nec cursus ipsum pharetra et. Ut pellentesque purus vitae dui fringilla convallis. Donec a sapien ut odio aliquet fermentum rutrum non ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse in viverra lorem.</p>\r\n\r\n<p>Nam elit augue, suscipit et turpis non, porttitor placerat ligula. Etiam finibus leo eget libero fermentum lobortis. Donec placerat eget augue id molestie. In eu ultricies massa. Nullam pretium sollicitudin tristique. Sed nec velit sit amet augue dictum ornare at ut justo. Suspendisse non ullamcorper risus. Curabitur venenatis efficitur diam, vitae pellentesque turpis maximus vel. Suspendisse potenti. Phasellus feugiat quis purus ut porta. Pellentesque quis elit nulla.</p>\r\n\r\n<p>Generated 5 paragraphs, 372 words, 2489 bytes of&nbsp;<a href=\"https://www.lipsum.com/\">Lorem Ipsum</a></p>\r\n\r\n<hr />\r\n<p><a href=\"mailto:help@lipsum.com\">help@lipsum.com</a><br />\r\n<a href=\"https://www.lipsum.com/privacy.pdf\" target=\"_blank\">Privacy Policy</a></p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacy_list`
--

CREATE TABLE `tbl_pharmacy_list` (
  `ph_id` int(11) NOT NULL,
  `ph_name` varchar(255) NOT NULL,
  `ph_service` varchar(255) NOT NULL,
  `ph_desc` text NOT NULL,
  `ph_img` varchar(255) NOT NULL,
  `ph_image` varchar(255) NOT NULL,
  `ph_banner_image` varchar(255) NOT NULL,
  `ph_phone_no` varchar(11) NOT NULL,
  `ph_address` text NOT NULL,
  `ph_postal_code` int(11) NOT NULL,
  `ph_lattitude` varchar(255) NOT NULL,
  `ph_longitude` varchar(255) NOT NULL,
  `ph_fees` varchar(50) NOT NULL,
  `ph_discount` varchar(50) NOT NULL,
  `ph_delivery` int(1) NOT NULL,
  `ph_popular` int(1) NOT NULL,
  `ph_km` int(11) NOT NULL,
  `ph_licence` varchar(255) NOT NULL,
  `ph_mon_name` varchar(50) NOT NULL,
  `ph_mon_time` varchar(50) NOT NULL,
  `ph_tu_name` varchar(50) NOT NULL,
  `ph_tu_time` varchar(50) NOT NULL,
  `ph_we_name` varchar(50) NOT NULL,
  `ph_we_time` varchar(50) NOT NULL,
  `ph_th_name` varchar(50) NOT NULL,
  `ph_th_time` varchar(50) NOT NULL,
  `ph_fr_name` varchar(50) NOT NULL,
  `ph_fr_time` varchar(50) NOT NULL,
  `ph_sa_name` varchar(50) NOT NULL,
  `ph_sa_time` varchar(50) NOT NULL,
  `ph_su_name` varchar(50) NOT NULL,
  `ph_su_time` varchar(50) NOT NULL,
  `ph_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pharmacy_list`
--

INSERT INTO `tbl_pharmacy_list` (`ph_id`, `ph_name`, `ph_service`, `ph_desc`, `ph_img`, `ph_image`, `ph_banner_image`, `ph_phone_no`, `ph_address`, `ph_postal_code`, `ph_lattitude`, `ph_longitude`, `ph_fees`, `ph_discount`, `ph_delivery`, `ph_popular`, `ph_km`, `ph_licence`, `ph_mon_name`, `ph_mon_time`, `ph_tu_name`, `ph_tu_time`, `ph_we_name`, `ph_we_time`, `ph_th_name`, `ph_th_time`, `ph_fr_name`, `ph_fr_time`, `ph_sa_name`, `ph_sa_time`, `ph_su_name`, `ph_su_time`, `ph_status`) VALUES
(15, 'ABC Pharmacy', 'ajsbskkjcx, xbshhb, xnjs, jnnaa jnaajna axn  x jjnanxka', '', '90291_pharmacist-with-her-arms-crossed-smiling_146259-198.jpg', '', '10626_BN-LI802_igener_G_20151119062740.jpg', '7738419514', 'Bhopar Rd, Patil Wadi, Taluka, Kalyan, Maharashtra 421201, India', 421201, '19.2007486', '73.07427229999999', 'Rs. 200', '10% to 30%', 1, 1, 25, 'Yes', 'Monday', '10 am - 10 pm', 'Tuesday', '10 am - 10 pm', 'Wednesday', '10 am - 10 pm', 'Thurday', '10 am - 10 pm', 'Friday', '10 am - 10 pm', 'Saturday', '10 am - 10 pm', 'Sunday', '10 am - 10 pm', 1),
(16, 'XYZ Pharmacy & general stores', 'ajsskja aajjksjnsx kxnjsnjssnxjk ssxjsxjksx sxjsjk sxjbxak sjxjjxnkx sjxsxsxsx ssjxbssbxx sxjxjxnss sxjbxj sxj  x ssxn  sx   ssxb bsx   ssjxbsx  sxjbsxjsjx ssxj  ssxjs sxj sxj  ssxjs', '', '18318_portrait-cheerful-handsome-pharmacist-leaning-counter-drugstore_109710-1739.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,chemists_149609345361_647x404_053017030344_0.jpg', '66610_Apollo-Pharmacy-925643839-8448883-2.jpg', '8286640642', 'MIDC INDL Area, bldg no 5&6, mind space, MIDC INDL Area, Airoli, Navi Mumbai, Maharashtra 400708, India', 400708, '21.1835897', '72.7808704', 'No minimum order', '20% off on orders > Rs. 900', 0, 1, 30, 'Yes', 'Monday', '10 am - 10 pm', 'Tuesday', '10 am - 10 pm', 'Wednesday', '10 am - 10 pm', 'Thurday', '10 am - 10 pm', 'Friday', '10 am - 10 pm', 'Saturday', '10 am - 10 pm', 'Sunday', '10 am - 10 pm', 1),
(17, 'BDO Bjnjskdsj Pharamcy', 'sjsndkjsnkjnsd ssjsjknsjkd sjnsnsk sksjsnksnsa s s ks', '', '88967_portrait-cheerful-handsome-pharmacist-leaning-counter-drugstore_109710-1739.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png', '9009_campus-Riverside-Ottawa-The-Hospital-Ont.jpg', '132346511', 'Lodha Xperia mall, Kalyan - Shilphata Rd, Palava, Dombivli East, Nilje Gaon, Maharashtra 421201, India', 421201, '19.1655338', '73.0748734', 'Rs. 100', 'up to 30% off', 1, 1, 30, 'Yes', 'Monday', '10 am - 10 pm', 'Tuesday', '10 am - 10 pm', 'Wednesday', '10 am - 10 pm', 'Thurday', '10 am - 10 pm', 'Friday', '10 am - 10 pm', 'Saturday', '10 am - 10 pm', 'Sunday', '10 am - 10 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_physiotherapy_list`
--

CREATE TABLE `tbl_physiotherapy_list` (
  `py_id` int(11) NOT NULL,
  `py_name` varchar(255) NOT NULL,
  `py_certi` varchar(255) NOT NULL,
  `py_image` varchar(255) NOT NULL,
  `py_img` varchar(255) NOT NULL,
  `py_banner_image` varchar(255) NOT NULL,
  `py_phone_no` varchar(11) NOT NULL,
  `py_degree` varchar(255) NOT NULL,
  `py_experience` varchar(50) NOT NULL,
  `py_address` text NOT NULL,
  `py_postal_code` int(11) NOT NULL,
  `py_lattitude` varchar(255) NOT NULL,
  `py_longitude` varchar(255) NOT NULL,
  `py_service` varchar(255) NOT NULL,
  `py_fees` varchar(50) NOT NULL,
  `py_discount` varchar(50) NOT NULL,
  `py_home` int(1) NOT NULL,
  `py_clinic` int(1) NOT NULL,
  `py_km` int(11) NOT NULL,
  `py_speciality` varchar(255) NOT NULL,
  `py_mon_name` varchar(50) NOT NULL,
  `py_mon_time` varchar(50) NOT NULL,
  `py_tu_name` varchar(50) NOT NULL,
  `py_tu_time` varchar(50) NOT NULL,
  `py_we_name` varchar(50) NOT NULL,
  `py_we_time` varchar(50) NOT NULL,
  `py_th_name` varchar(50) NOT NULL,
  `py_th_time` varchar(50) NOT NULL,
  `py_fr_name` varchar(50) NOT NULL,
  `py_fr_time` varchar(50) NOT NULL,
  `py_sa_name` varchar(50) NOT NULL,
  `py_sa_time` varchar(50) NOT NULL,
  `py_su_name` varchar(50) NOT NULL,
  `py_su_time` varchar(50) NOT NULL,
  `py_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_physiotherapy_list`
--

INSERT INTO `tbl_physiotherapy_list` (`py_id`, `py_name`, `py_certi`, `py_image`, `py_img`, `py_banner_image`, `py_phone_no`, `py_degree`, `py_experience`, `py_address`, `py_postal_code`, `py_lattitude`, `py_longitude`, `py_service`, `py_fees`, `py_discount`, `py_home`, `py_clinic`, `py_km`, `py_speciality`, `py_mon_name`, `py_mon_time`, `py_tu_name`, `py_tu_time`, `py_we_name`, `py_we_time`, `py_th_name`, `py_th_time`, `py_fr_name`, `py_fr_time`, `py_sa_name`, `py_sa_time`, `py_su_name`, `py_su_time`, `py_status`) VALUES
(8, 'gchgvh gbjkjkjk', '', '2864_download.jpg', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png', '13277_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', '56455131215', 'BPTh', '11 years', 'Lodha Xperia Mall, Mall Office, Basement Level, Kalyan - Shilphata Rd, Casa Bella Gold, Palava, Dombivli, Maharashtra 421204, India', 421204, '21.1835897', '72.7808704', '', '', '10%', 1, 0, 15, 'Physiotherapy', 'Monday', '10 am - 9 pm', 'Tuesday', '10 am - 9 pm', 'Wednesday', '10 am - 9 pm', 'Thursday', '10 am - 9 pm', 'Friday', '10 am - 9 pm', 'Saturday', '10 am - 9 pm', 'Sunday', 'Closed', 1),
(7, 'Dr ABD SJKS', '', '49366_Apollo-Pharmacy-925643839-8448883-2.jpg', 'Apollo-Pharmacy-925643839-8448883-2.jpg,campus-Riverside-Ottawa-The-Hospital-Ont.jpg,chemists_149609345361_647x404_053017030344_0.jpg', '71509_BN-LI802_igener_G_20151119062740.jpg', '86542378', 'BPTh, MPTh', '12 years', 'Bhopar Rd, Patil Wadi, Taluka, Kalyan, Maharashtra 421201, India', 421201, '19.2007486', '73.07427229999999', 'this is demo text...', '', 'No', 1, 1, 15, 'Physiotherapy', 'Monday', '10 am - 9 pm', 'Tuesday', '10 am - 9 pm', 'Wednesday', '10 am - 9 pm', 'Thursday', '10 am - 9 pm', 'Friday', '10 am - 9 pm', 'Saturday', '10 am - 9 pm', 'Sunday', 'Closed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_radiology_list`
--

CREATE TABLE `tbl_radiology_list` (
  `rd_id` int(11) NOT NULL,
  `rd_name` varchar(255) NOT NULL,
  `rd_desc` text NOT NULL,
  `rd_image` varchar(255) NOT NULL,
  `rd_img` varchar(255) NOT NULL,
  `rd_banner_image` varchar(255) NOT NULL,
  `rd_phone_no` varchar(11) NOT NULL,
  `rd_address` text NOT NULL,
  `rd_postal_code` int(11) NOT NULL,
  `rd_lattitude` varchar(255) NOT NULL,
  `rd_longitude` varchar(255) NOT NULL,
  `rd_fees` varchar(50) NOT NULL,
  `rd_discount` varchar(50) NOT NULL,
  `rd_km` int(11) NOT NULL,
  `rd_service` text NOT NULL,
  `rd_degree` varchar(100) NOT NULL,
  `rd_speciality` varchar(100) NOT NULL,
  `rd_experience` varchar(100) NOT NULL,
  `rd_mon_name` varchar(50) NOT NULL,
  `rd_mon_time` varchar(50) NOT NULL,
  `rd_tu_name` varchar(50) NOT NULL,
  `rd_tu_time` varchar(50) NOT NULL,
  `rd_we_name` varchar(50) NOT NULL,
  `rd_we_time` varchar(50) NOT NULL,
  `rd_th_name` varchar(50) NOT NULL,
  `rd_th_time` varchar(50) NOT NULL,
  `rd_fr_name` varchar(50) NOT NULL,
  `rd_fr_time` varchar(50) NOT NULL,
  `rd_sa_name` varchar(50) NOT NULL,
  `rd_sa_time` varchar(50) NOT NULL,
  `rd_su_name` varchar(50) NOT NULL,
  `rd_su_time` varchar(50) NOT NULL,
  `rd_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_radiology_list`
--

INSERT INTO `tbl_radiology_list` (`rd_id`, `rd_name`, `rd_desc`, `rd_image`, `rd_img`, `rd_banner_image`, `rd_phone_no`, `rd_address`, `rd_postal_code`, `rd_lattitude`, `rd_longitude`, `rd_fees`, `rd_discount`, `rd_km`, `rd_service`, `rd_degree`, `rd_speciality`, `rd_experience`, `rd_mon_name`, `rd_mon_time`, `rd_tu_name`, `rd_tu_time`, `rd_we_name`, `rd_we_time`, `rd_th_name`, `rd_th_time`, `rd_fr_name`, `rd_fr_time`, `rd_sa_name`, `rd_sa_time`, `rd_su_name`, `rd_su_time`, `rd_status`) VALUES
(6, 'ABC Radiology centre', '', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png,BN-LI802_igener_G_20151119062740.jpg', '18120_img3.jpg', '64356_campus-Riverside-Ottawa-The-Hospital-Ont.jpg', '7738419514', 'Shivaji Chowk, Nilje Gaon, Maharashtra 421204', 421204, '19.1540485', '73.0830289', '', 'No', 15, 'shjhsjhs sxbsjbxjsx ssxjhbsjxbjsx ssxbjsxbjs sxjsjx', 'MBBS, MD Radiology', 'Radiology', '15', 'Monday', '10 am - 3 pm & 6 pm - 10 pm', 'Tuesday', '10 am - 3 pm & 6 pm - 10 pm', 'Wednesday', '10 am - 3 pm & 6 pm - 10 pm', 'Thursday', '10 am - 3 pm & 6 pm - 10 pm', 'Friday', '10 am - 3 pm & 6 pm - 10 pm', 'Saturday', '10 am - 3 pm & 6 pm - 10 pm', 'Sunday', 'Closed', 1),
(7, 'YQN Radiology', '', 'advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg,Apollo-Pharmacy-925643839-8448883-2.jpg,banner-1.png', '67696_advanced-radiology-centre-andheri-west-mumbai-pathology-labs-jarzdqjpyn.jpg', '8401_chemists_149609345361_647x404_053017030344_0.jpg', '13564541', 'shop no1,2,3, chandresh niketan, Lodha Casa Rio Gold Rd, Maduban Society, bhavani chowk, Dombivli East, Nilje Gaon, Maharashtra 421204, India', 421204, '19.158723', '73.0762307', '', '10%', 15, 'jdjjdnj dcdsjcndsk', 'MBBS, MD Radiology', 'Radiology', '25 years', 'Monday', '10 am - 3 pm & 6 pm - 10 pm', 'Tuesday', '10 am - 3 pm & 6 pm - 10 pm', 'Wednesday', '10 am - 3 pm & 6 pm - 10 pm', 'Thursday', '10 am - 3 pm & 6 pm - 10 pm', 'Friday', '10 am - 3 pm & 6 pm - 10 pm', 'Saturday', '10 am - 3 pm & 6 pm - 10 pm', 'Sunday', 'Closed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_cat` varchar(50) NOT NULL,
  `r_sub_cat` varchar(255) NOT NULL,
  `r_own` float NOT NULL,
  `r_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`r_id`, `u_id`, `r_cat`, `r_sub_cat`, `r_own`, `r_status`) VALUES
(1, 2, '1', '9', 4, 1),
(2, 2, '2', '2', 5, 1),
(3, 1, '1', '9', 2, 1),
(4, 7, '1', '6', 5, 1),
(5, 7, '1', '5', 5, 1),
(6, 7, '1', '4', 4, 1),
(7, 7, '1', '2', 3, 1),
(8, 7, '6', '1', 3, 1),
(9, 2, '1', '1', 4, 1),
(10, 1, '1', '1', 7, 1),
(11, 2, '1', '7', 5, 1),
(12, 2, '1', '6', 5, 1),
(13, 2, '1', '5', 5, 1),
(14, 2, '12', '12', 2, 1),
(15, 2, '2', '1', 1, 1),
(16, 2, '0', '6', 3, 1),
(17, 2, '0', '4', 5, 1),
(18, 2, '3', '3', 2, 1),
(19, 2, '2', '8', 5, 1),
(20, 2, '3', '1', 3, 1),
(21, 2, '3', '2', 4, 1),
(22, 7, '2', '8', 2, 1),
(23, 9, '1', '6', 4, 1),
(24, 9, '3', '1', 0, 1),
(25, 9, '3', '2', 0, 1),
(26, 9, '1', '7', 2.5, 1),
(27, 2, '3', '5', 5, 1),
(28, 9, '2', '1', 2, 1),
(29, 9, '2', '7', 4, 1),
(30, 9, '2', '2', 1, 1),
(31, 9, '1', '5', 0.5, 1),
(32, 9, '1', '4', 5, 1),
(33, 9, '1', '3', 2, 1),
(34, 9, '1', '2', 1, 1),
(35, 2, '1', '3', 5, 1),
(36, 10, '2', '2', 3, 1),
(37, 9, '2', '8', 3, 1),
(38, 2, '2', '7', 6, 1),
(39, 3, '2', '7', 6, 1),
(40, 10, '2', '1', 2, 1),
(41, 12, '2', '1', 1, 1),
(42, 2, '2', '3', 2.5, 1),
(43, 2, '6', '1', 5, 1),
(44, 7, '2', '1', 5, 1),
(45, 7, '2', '9', 3, 1),
(46, 7, '2', '10', 3, 1),
(47, 48, '6', '1', 0, 1),
(48, 7, '5', '3', 4, 1),
(49, 7, '2', '11', 5, 1),
(50, 23, '2', '9', 3.5, 1),
(51, 7, '2', '2', 4, 1),
(52, 7, '3', '7', 4.5, 1),
(53, 57, '2', '13', 4.5, 1),
(54, 57, '3', '8', 4, 1),
(55, 57, '4', '4', 5, 1),
(56, 57, '6', '5', 4, 1),
(57, 60, '6', '5', 4, 1),
(58, 61, '6', '5', 1, 1),
(59, 60, '2', '3', 5, 1),
(60, 60, '2', '13', 0, 1),
(61, 60, '5', '2', 2.5, 1),
(63, 1, '5', '2', 2, 1),
(64, 62, '5', '2', 0, 1),
(65, 57, '3', '11', 3.5, 1),
(66, 57, '3', '10', 4.5, 1),
(67, 57, '4', '6', 3.5, 1),
(68, 57, '0', '4', 3, 1),
(69, 57, '2', '17', 3.5, 1),
(70, 2, '2', '17', 3.5, 1),
(71, 2, '2', '16', 4, 1),
(72, 57, '2', '15', 4, 1);

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
(1, 'Medanzo', '52b8c16f-3c86-4f44-907d-71362036c114', 'ZTIxOWE3YWItZDBhMC00OGNiLWJjYzUtNTBkOWNiM2QxMzNh', 'Medanzo', 'FL-09-02-2020-03-28-12.png', 'Medanzo', '1.0.0', 'Medanzo', '+91 00000 00000', 'Medanzo', '<p>Medanzo</p>\r\n', 'Medanzo', '<p><strong>We are committed to protecting your privacy</strong></p>\r\n\r\n<p><strong>we are committed to .......</strong></p>\r\n\r\n<p>We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;</p>\r\n\r\n<p><strong>Information Collected</strong></p>\r\n\r\n<p>We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.</p>\r\n\r\n<p><strong>Information Use</strong></p>\r\n\r\n<p>We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>Your Internet browser has the in-built facility for storing small files - &quot;cookies&quot; - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</p>\r\n\r\n<p><strong>Disclosing Information</strong></p>\r\n\r\n<p>We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;</p>\r\n\r\n<p>We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;</p>\r\n\r\n<p>In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</p>\r\n\r\n<p><strong>Changes to this Policy</strong></p>\r\n\r\n<p>Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</p>\r\n\r\n<p><strong>Contacting Us</strong></p>\r\n\r\n<p>If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</p>\r\n', 'ASC', 15, 'category_name', 'DESC', 'pub-9456493320432553', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544/6300978111', 'pub-9456493320432553', 'ca-app-pub-8356404931736973~1544820074', 'true', 'ca-app-pub-3940256099942544/4411468910', '5', 'true', 'ca-app-pub-3940256099942544/2934735716');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `t_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `t_phone` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`t_id`, `u_id`, `cat_name`, `sub_cat_name`, `t_phone`, `date`, `status`) VALUES
(1, 0, '', '', '', '15-02-2020 18:08:16', 1),
(2, 1, 'Doctor', 'doctor1', '787878787', '15-02-2020 18:09:19', 1),
(3, 1, 'Doctor', 'doctor1', '787878787', '15-02-2020 18:09:27', 1),
(4, 2, 'Doctor', 'doctor6', '65', '18-02-2020 11:36:03', 1),
(5, 2, 'Doctor', 'doctor4', '5464', '18-02-2020 11:36:38', 1),
(6, 2, 'Doctor', 'doctor4', '5464', '18-02-2020 12:48:26', 1),
(7, 2, 'Doctor', 'doctor2', '12345678', '18-02-2020 12:48:46', 1),
(8, 2, 'Doctor', 'szdfgvnma', '2147483647', '18-02-2020 12:51:50', 1),
(9, 2, '1', 'szdfgvnma', '2147483647', '18-02-2020 12:55:56', 1),
(10, 1, 'doctor', 'doctor1', '787878787', '18-02-2020 15:12:18', 1),
(11, 1, '1', 'doctor1', '787878787', '18-02-2020 15:12:23', 1),
(12, 1, '1', 'doctor1', '787878787', '18-02-2020 15:28:59', 1),
(13, 1, '1', 'asedesfsef1', '787878787', '18-02-2020 15:29:06', 1),
(14, 2, '1', 'asedesfsef1', '787878787', '18-02-2020 15:31:13', 1),
(15, 2, '1', 'asedesfsef1', '787878787', '18-02-2020 15:32:17', 1),
(16, 2, '1', 'doctor7', '45644866', '18-02-2020 15:32:29', 1),
(17, 2, '1', 'doctor4', '546496587', '18-02-2020 15:38:55', 1),
(18, 2, '3', 'labs 1', '9999999999', '18-02-2020 15:46:46', 1),
(19, 2, '2', 'pharmacy 2', '7878787878', '18-02-2020 15:48:07', 1),
(20, 2, '2', 'pharmacy 3', '753357753', '18-02-2020 15:48:20', 1),
(21, 2, '2', 'pharmacy 6', '7878787878', '18-02-2020 15:48:30', 1),
(22, 2, '4', 'radiology 1kl;', '7894561236', '18-02-2020 15:48:50', 1),
(23, 2, '2', 'pharmacy 1 ', '9999999999', '18-02-2020 15:51:16', 1),
(24, 2, '2', 'pharmacy 2', '7878787878', '18-02-2020 15:57:04', 1),
(25, 2, '1', 'doctor4', '546496587', '18-02-2020 15:57:16', 1),
(26, 2, '6', 'physiotherapy 1rt', '9639639639', '18-02-2020 15:57:28', 1),
(27, 2, '1', 'doctor6', '789456123', '18-02-2020 17:04:09', 1),
(28, 2, '1', 'doctor6', '789456123', '18-02-2020 17:04:19', 1),
(29, 2, '1', 'doctor6', '789456123', '18-02-2020 17:05:02', 1),
(30, 2, '2', 'pharmacy 2', '7878787878', '18-02-2020 17:06:51', 1),
(31, 2, '2', 'pharmacy 2', '7878787878', '18-02-2020 17:07:00', 1),
(32, 2, '2', 'pharmacy 1 ', '9999999999', '18-02-2020 17:33:17', 1),
(33, 2, '2', 'pharmacy 1 ', '9999999999', '18-02-2020 17:34:50', 1),
(34, 2, '2', 'pharmacy 6', '7878787878', '18-02-2020 17:39:12', 1),
(35, 2, '6', 'physiotherapy 1rt', '9639639639', '18-02-2020 17:51:33', 1),
(36, 2, '2', 'pharmacy 2', '7878787878', '18-02-2020 18:01:41', 1),
(37, 2, '1', 'Woman`s  Health', '789456123', '18-02-2020 18:02:07', 1),
(38, 2, '6', 'physiotherapy 1rt', '9639639639', '18-02-2020 18:02:27', 1),
(39, 2, '1', '6', '789456123', '19-02-2020 14:52:47', 1),
(40, 2, '1', '6', '789456123', '19-02-2020 14:55:40', 1),
(41, 2, '1', 'doctor6', '789456123', '19-02-2020 15:00:46', 1),
(42, 2, '3', 'labs 1', '9999999999', '19-02-2020 15:01:38', 1),
(43, 2, '0', 'pharmacy 5', '9999999999', '19-02-2020 15:32:23', 1),
(44, 2, '1', 'Doctor1111', '787878787', '19-02-2020 15:45:11', 1),
(45, 2, '0', 'pharmacy 7', '9999999999', '19-02-2020 15:48:57', 1),
(46, 2, '0', 'labs 5', '77878787878', '19-02-2020 15:49:34', 1),
(47, 2, '2', 'pharmacy 1 ', '9999999999', '19-02-2020 15:49:57', 1),
(48, 2, '6', 'pharmacy 7', '9999999999', '19-02-2020 15:51:09', 1),
(49, 2, '2', 'pharmacy 7', '9999999999', '19-02-2020 15:52:59', 1),
(50, 2, '3', 'labs 5', '77878787878', '19-02-2020 15:53:09', 1),
(51, 2, '2', 'pharmacy 7', '9999999999', '19-02-2020 16:00:02', 1),
(52, 2, '3', 'labs 4', '8528528528', '19-02-2020 16:00:14', 1),
(53, 9, '1', 'doctor7', '45644866', '22-02-2020 10:03:18', 1),
(54, 2, '1', 'doctor5', '65965874', '25-02-2020 22:14:01', 1),
(55, 2, '1', 'doctor4', '546496587', '06-03-2020 14:04:28', 1),
(56, 7, '1', 'doctor1', '64554596', '06-03-2020 14:06:26', 1),
(57, 2, '1', 'doctor1', '64554596', '06-03-2020 14:35:59', 1),
(58, 7, '1', 'doctor5', '65965874', '06-03-2020 15:47:19', 1),
(59, 7, '2', 'pharmacy 2', '7878787878', '06-03-2020 15:47:54', 1),
(60, 7, '1', 'Dr. Sandeep Wankhede', '2147483647', '07-03-2020 02:16:55', 1),
(61, 48, '6', 'physiotherapy 1rt', '9639639639', '09-03-2020 14:58:08', 1),
(62, 2, '2', 'XYZ Pharmacy', '8286640642', '02-05-2020 09:56:43', 1),
(63, 2, '6', 'gchgvh gbjkjkjk', '56455131215', '02-05-2020 10:07:20', 1),
(64, 2, '1', 'Doctor1111', '787878787', '02-05-2020 10:22:30', 1),
(65, 2, '1', 'Doctor1111', '787878787', '02-05-2020 10:26:48', 1),
(66, 2, '9', 'Doctor1111', '787878787', '02-05-2020 10:31:47', 1),
(67, 2, '9', 'Doctor1111', '787878787', '02-05-2020 10:42:25', 1),
(68, 2, '1', 'Doctor1111', '787878787', '02-05-2020 10:47:48', 1),
(69, 2, '6', 'gchgvh gbjkjkjk', '56455131215', '02-05-2020 11:11:53', 1),
(70, 2, '6', 'gchgvh gbjkjkjk', '56455131215', '05-05-2020 16:12:15', 1),
(71, 2, '2', 'XYZ Pharmacy & general stores', '8286640642', '05-05-2020 16:24:02', 1),
(72, 2, '5', 'Dentist 234', '1787126665', '05-05-2020 16:31:27', 1),
(73, 2, '2', 'XYZ Pharmacy & general stores', '8286640642', '05-05-2020 16:32:29', 1),
(74, 2, '5', 'XYZ Pharmacy & general stores', '8286640642', '11-05-2020 09:52:46', 1),
(75, 2, '2', 'XYZ Pharmacy & general stores', '8286640642', '11-05-2020 09:54:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `login_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL DEFAULT '0',
  `first_level_earn` varchar(255) NOT NULL DEFAULT '0',
  `code` int(11) NOT NULL,
  `refferal_code` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `login_type`, `name`, `email`, `image`, `password`, `phone`, `device_id`, `wallet`, `first_level_earn`, `code`, `refferal_code`, `status`) VALUES
(1, 0, 'trt', 'rt@gmail.com', '56147_512.png', 'admin1233', '254355747425745748', '', '0', '', 0, '', '1'),
(2, 0, 'tushar', 'tushar@gmail.com', '67650_1583923778297.png', '123456', '8235866956', '', '0', '', 0, '', '1'),
(3, 0, 'gf', 'gfh', '', 'fsg', '34694', '', '0', '', 0, '', '1'),
(4, 0, 'yff', 'hd', '', 'gdh', 'gd', '', '0', '', 0, '', '1'),
(5, 0, 'hd', 'abc@gmail.com', '', 'abc', '1234567890', '', '0', '', 0, '', '1'),
(6, 0, 'admina', 'ad@gmail.com', '', 'admin123', '36', '', '0', '', 0, '', '1'),
(8, 0, '2', 'Doctor', '', '45644866', 'doctor7', '', '0', '', 0, '', '1'),
(9, 0, 'khusbo', 'k@gmail.com', '', '123456', '2212364237', '', '0', '', 0, '', '1'),
(10, 0, 'khush', 'khush@gmail.com', '', '123', '6543219789', '', '0', '', 0, '', '1'),
(11, 0, 'khush', 'kh@gmail.com', '', '123456', '1234567890', '', '0', '', 0, '', '1'),
(12, 0, 'ab', 'a@gmail.com', '', '123456', '1234567890', '', '0', '', 0, '', '1'),
(13, 1, 'neela', 'neeal@gmail.com', 'neela.png', '', '7894561236', 'af4asedf', '0', '0', 5748, '1376', '1'),
(15, 1, 'asd', 'aWSd@gmail.com', 'qaD.png', '', '96325178', 'af4asedf', '0', '0', 3515, '1376', '1'),
(16, 1, 'asdzsc', 'aWscSd@gmail.com', 'qascD.png', '', '7635224198', 'af4asedf', '0', '0', 1406, '1376', '1'),
(19, 2, 'vaibhavi oza', 'vaibhavi.vbinfotech@gmail.com', '', '123355', '9868745798', '8ef5977df83e7433', '0', '0', 8372, '', '1'),
(21, 2, 'Tailor Arpit', 'tailorarpit104@gmail.com', '', '123456', '7567005767', '9e6c9c3e972df1cb', '0', '0', 8151, '', '1'),
(24, 2, 'khush', 'khushbootailor111@gmail.com', '75588_Jellyfish.jpg', '', '7453621598', 'sdc45sdc', '0', '0', 8958, '1376', '1'),
(26, 1, 'trt', 'rt@gmail.com', '17791_512.png', '', '254355747425745748', '12574', '0', '0', 7138, '', '1'),
(46, 2, 'Tushar palita', 'tushar.vbinfotech@gmail.com', '', '789456123@1234567889', '9187805071', 'b0c3f1f2faf9bc4c', '0', '0', 4450, '', '1'),
(47, 2, 'khushas', 'khushbootailor111@gmail.com', '50252_Jellyfish.jpg', '1234569', '7453621598', 'sdc45sdcas', '0', '0', 7808, '1376', '1'),
(52, 0, 'khukajscf', 'AJSD@GMAIL.COM', '76104_Penguins.jpg', 'asdfgv', '756415641', '', '0', '0', 0, '0', '1'),
(53, 0, 'khukajscf', 'AJSDa@GMAIL.COM', '', 'asdfgv', '756415641', '', '0', '0', 0, '0', '1'),
(54, 0, 'Tushar', 'palitatushar@gmail.com', '', '123456', '8238906472', '', '0', '0', 0, '0', '1'),
(55, 1, 'khukajscf', 'AJSDa@GMAIL.COMa', '', 'asdfgv', '756415641', '', '0', '0', 0, '0', '0'),
(57, 3, 'sandeep', 'samwan30@gmail.com', '', 'papa1981', '7738419514', '9e01f83341a79c6e', '0', '0', 1494, '', '1'),
(58, 2, 'Supriya Wankhede', 'supriyaw95@gmail.com', '', '', '7767831352', '1b042e289bcfa9f3', '0', '0', 4381, '', '1'),
(59, 1, 'khushboo', 'khushbootailor@gmail.com', '', '123466', '9099686960', '', '0', '0', 0, '0', '1'),
(60, 1, 'tu', 'palitatu@gmail.com', '', '123456', '8780507118', '', '0', '0', 0, '0', '1'),
(61, 1, 'khushboooooo', 'khu@gmail.com', '', '123456', '9099686960', '', '0', '0', 0, '0', '1'),
(62, 2, 'vabz oza', 'vabz.vbinfotech@gmail.com', '', '', '9099686960', '732c0aa993f57a35', '0', '0', 9660, '', '1'),
(63, 1, 'parag', 'paragwasekar@gmail.com', '', 'chetan', '9664834287', '', '0', '0', 0, '0', '1'),
(64, 2, 'Pooja Pachchigar', 'poojapachchigar82@gmail.com', '', '', '8200609986', 'aee8f5240633c747', '0', '0', 6825, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `video_type` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_url` text NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `video_thumbnail` text NOT NULL,
  `video_duration` varchar(255) NOT NULL,
  `video_description` text NOT NULL,
  `total_rate` int(11) NOT NULL DEFAULT '0',
  `rate_avg` float(11,1) NOT NULL DEFAULT '0.0',
  `totel_viewer` int(11) NOT NULL DEFAULT '0',
  `featured` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_business`
--
ALTER TABLE `tbl_business`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_dentist_list`
--
ALTER TABLE `tbl_dentist_list`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `tbl_doctor_cat`
--
ALTER TABLE `tbl_doctor_cat`
  ADD PRIMARY KEY (`dc_id`);

--
-- Indexes for table `tbl_doctor_list`
--
ALTER TABLE `tbl_doctor_list`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_health`
--
ALTER TABLE `tbl_health`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_labs_list`
--
ALTER TABLE `tbl_labs_list`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nurse_list`
--
ALTER TABLE `tbl_nurse_list`
  ADD PRIMARY KEY (`nr_id`);

--
-- Indexes for table `tbl_pharmacy_list`
--
ALTER TABLE `tbl_pharmacy_list`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `tbl_physiotherapy_list`
--
ALTER TABLE `tbl_physiotherapy_list`
  ADD PRIMARY KEY (`py_id`);

--
-- Indexes for table `tbl_radiology_list`
--
ALTER TABLE `tbl_radiology_list`
  ADD PRIMARY KEY (`rd_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_business`
--
ALTER TABLE `tbl_business`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_dentist_list`
--
ALTER TABLE `tbl_dentist_list`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_doctor_cat`
--
ALTER TABLE `tbl_doctor_cat`
  MODIFY `dc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_doctor_list`
--
ALTER TABLE `tbl_doctor_list`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_health`
--
ALTER TABLE `tbl_health`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_labs_list`
--
ALTER TABLE `tbl_labs_list`
  MODIFY `lb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_nurse_list`
--
ALTER TABLE `tbl_nurse_list`
  MODIFY `nr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pharmacy_list`
--
ALTER TABLE `tbl_pharmacy_list`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_physiotherapy_list`
--
ALTER TABLE `tbl_physiotherapy_list`
  MODIFY `py_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_radiology_list`
--
ALTER TABLE `tbl_radiology_list`
  MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
