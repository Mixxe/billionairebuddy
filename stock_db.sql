-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2016 at 03:23 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(128) NOT NULL,
  `admin_username` varchar(32) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(16) NOT NULL,
  `admin_company` varchar(512) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_company`, `admin_status`) VALUES
(1, 'System Administrator', 'admin', 'admin@#2016', ' admin@encoresky.com', '5656565656', 'EncoreSky Technologies', 1);

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE IF NOT EXISTS `institutions` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(255) NOT NULL,
  `manager_bio` varchar(2000) NOT NULL,
  `manager_photo` varchar(128) DEFAULT NULL,
  `institution_name` varchar(255) NOT NULL,
  `institution_bio` varchar(2000) NOT NULL,
  `creation_date` date NOT NULL,
  `institution_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`institution_id`, `manager_name`, `manager_bio`, `manager_photo`, `institution_name`, `institution_bio`, `creation_date`, `institution_status`) VALUES
(1, 'Mahesh Patidar', 'Warren Buffett. We could jot down the nearly endless list of descriptives that would just begin to portray his followers’ feelings towards him. But it’s time consuming, so let’s just put this as a constant: Warren Buffett is The Man. We know.\r\nBut let’s just explore this a bit further. Ordinary investors follow every step Warren Buffett makes. But so do the seasoned professional money managers. They even invest their clients’ funds in Berkshire Hathaway stock. Everybody knows that if they had invested $1000 with Warren Buffett back in the day, they would have been a zillionaire today. We can’t go back in time and invest in Warren Buffett’s investment vehicle, Berkshire Hathaway stock, but we can invest today. But does it make sense to invest in BRK today? Can Warren Buffett generate alpha today, like other smaller hedge fund managers like David Einhorn, Bill Ackman, Paul Tudor Jones or Dan Loeb?', 'mahesh_patidar.jpg', 'EncoreSky Technologies', 'Warren Buffett. We could jot down the nearly endless list of descriptives that would just begin to portray his followers’ feelings towards him. But it’s time consuming, so let’s just put this as a constant: Warren Buffett is The Man. We know.\r\nBut let’s just explore this a bit further. Ordinary investors follow every step Warren Buffett makes. But so do the seasoned professional money managers. They even invest their clients’ funds in Berkshire Hathaway stock. Everybody knows that if they had invested $1000 with Warren Buffett back in the day, they would have been a zillionaire today. We can’t go back in time and invest in Warren Buffett’s investment vehicle, Berkshire Hathaway stock, but we can invest today. But does it make sense to invest in BRK today? Can Warren Buffett generate alpha today, like other smaller hedge fund managers like David Einhorn, Bill Ackman, Paul Tudor Jones or Dan Loeb?', '2016-04-21', 1),
(2, 'David Einhorn', 'David Einhorn is the Founder and President of Greenlight Capital, a "long-short value-oriented hedge fund". David Einhorn is without a doubt a ridiculously smart man and has in about two decades managed to build his own net worth up to close to $2 billion along with turning his investors very rich as well of course. Mr. Einhorn is an active investor and known for his viciousness towards the big corporations and billion dollar companies and doesn’t shy away to twist their arms for unfair practices. ', 'david_einhorn.jpg', 'Greenlight Capital', 'Greenlight Capital is a long-short value-oriented hedge fund', '2016-04-29', 1),
(3, 'Paul Tudor Jones II', 'Paul Tudor Jones is the founder of Tudor Investment Corporation, a highly diversified investment firm both when it comes to securities traded and investment strategies employed. Paul Tudor Jones is almost always on the list of the highest earning investment managers in the world. To date he has made around $4.7 billion according to Forbes. ', 'paul_tudor_jones_ii.jpg', 'Tudor Investment Corp', 'Tudor Investment Corp is an investment vehicle focused on equity, venture capital, debt, currency, and commodity markets', '2016-04-29', 1),
(4, 'John Paulson', 'This high flying hedge fund manager is known for making a record breaking $5 billion for himself during a single year in 2010. Note that this $5 billion was not what his firm made; it was what John Paulson personally pocketed that year. And in 2007 he made almost just as much. Mr. Paulson is known for having huge swings in his performance and he’s often making bold and aggressive moves. John Paulson is the founder and President of Paulson & Co. and his net worth is estimated to be around $10 billion. ', 'john_paulson.jpg', 'Paulson & Co', 'Paulson & Co invest heavily in gold and other commodities', '2016-04-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE IF NOT EXISTS `instruments` (
  `instrument_id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `stock_price` float(10,2) NOT NULL,
  `stock_discount` float(10,2) DEFAULT NULL,
  `stock_description` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`instrument_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrument_id`, `institution_id`, `quote_id`, `stock_price`, `stock_discount`, `stock_description`) VALUES
(1, 1, 1, 120.00, 22.73, 'Apple Inc.'),
(2, 2, 5, 51.22, 1.62, 'Microsoft was founded by Bill Gates and Paul Allen'),
(3, 3, 7, 163.21, 9.75, 'IBM is a computer company'),
(4, 3, 5, 51.28, 1.74, 'Microsoft was founded by Bill Gates and Paul Allen'),
(5, 4, 6, 80.24, -13.21, 'Netflix shows shows'),
(6, 3, 10, 80.00, 94.89, ''),
(7, 3, 15, 40.00, 74.90, ''),
(8, 3, 1, 10.00, -827.20, ''),
(9, 3, 9, 100.00, 85.89, ''),
(10, 3, 20, 5.00, -1336.40, ''),
(11, 3, 18, 250.00, 91.97, ''),
(12, 3, 18, 50.00, 59.84, ''),
(13, 3, 8, 80.00, -49.36, ''),
(14, 3, 12, 35.00, 61.60, ''),
(15, 3, 11, 90.00, 86.90, ''),
(16, 2, 7, 74.32, -98.18, ''),
(17, 1, 10, 124.00, 96.70, 'This is sample stoc'),
(18, 2, 11, 105.00, 88.77, 'This is sample stock'),
(19, 3, 12, 108.00, 87.56, 'This is sample stock'),
(20, 4, 13, 117.00, 95.91, 'This is sample stock');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(255) NOT NULL,
  `manager_bio` varchar(2000) NOT NULL,
  `manager_institution` varchar(255) NOT NULL,
  `manager_institution_bio` varchar(2000) NOT NULL,
  `creation_date` date NOT NULL,
  `manager_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_name` varchar(255) NOT NULL,
  `quote_symbol` varchar(16) NOT NULL,
  `quote_current` float(10,2) NOT NULL,
  `quote_open` float(10,2) NOT NULL,
  `quote_high` float(10,2) NOT NULL,
  `quote_low` float(10,2) NOT NULL,
  `quote_close` float(10,2) NOT NULL,
  `quote_date` varchar(32) NOT NULL,
  `quote_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quote_name`, `quote_symbol`, `quote_current`, `quote_open`, `quote_high`, `quote_low`, `quote_close`, `quote_date`, `quote_status`) VALUES
(1, 'Apple Inc. USA', 'AAPL', 92.72, 93.37, 93.45, 91.85, 93.24, '', 1),
(5, 'Microsoft', 'MSFT', 50.39, 49.80, 50.39, 49.66, 49.94, '', 1),
(6, 'Netflix', 'NFLX', 90.84, 88.90, 90.88, 88.11, 89.37, '', 1),
(7, 'IBM', 'IBM', 147.29, 144.86, 147.97, 144.47, 145.07, '', 1),
(8, 'Facebook', 'FB', 119.49, 117.16, 119.64, 117.11, 117.81, '', 1),
(9, 'Bank of America Corporation', 'BAC', 14.11, 13.83, 14.14, 13.80, 14.05, '', 1),
(10, 'AK Steel Holding Corporation', 'AKS', 4.09, 4.11, 4.37, 3.97, 4.14, '', 1),
(11, 'Freeport-McMoRan Inc.', 'FCX', 11.79, 11.14, 12.12, 11.13, 11.29, '', 1),
(12, 'Ford Motor Co.', 'F', 13.44, 13.26, 13.48, 13.24, 13.32, '', 1),
(13, 'Vale S.A.', 'VALE', 4.78, 4.60, 4.92, 4.58, 4.63, '', 1),
(14, 'Groupon, Inc.', 'GRPN', 3.29, 3.23, 3.38, 3.18, 3.26, '', 1),
(15, 'Alcoa Inc.', 'AA', 10.04, 9.99, 10.29, 9.99, 10.02, '', 1),
(16, 'The Coca-Cola Company', 'KO', 45.32, 45.06, 45.41, 44.92, 45.06, '', 1),
(17, 'The Kraft Heinz Company', 'KHC', 84.00, 82.83, 84.04, 81.94, 82.97, '', 1),
(18, 'CVR Energy, Inc.', 'CVI', 20.08, 20.00, 20.65, 19.97, 20.17, '', 1),
(19, 'Novo Nordisk A/S', 'NVO', 53.35, 53.06, 53.44, 52.83, 53.54, '', 1),
(20, 'Colgate-Palmolive Co.', 'CL', 71.82, 71.49, 71.85, 71.18, 71.47, '', 1),
(21, 'VeriSign, Inc.', 'VRSN', 85.19, 84.30, 85.32, 84.04, 84.41, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_link_text` varchar(255) DEFAULT NULL,
  `extra_link_url` varchar(1024) DEFAULT NULL,
  `mailchimp_api_key` varchar(1024) DEFAULT NULL,
  `mailchimp_list_id` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `extra_link_text`, `extra_link_url`, `mailchimp_api_key`, `mailchimp_list_id`) VALUES
(2, '', '', '2694a2cf1ee17c22e09fa5e58d628cba-us13', '40c9d4e1d5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
