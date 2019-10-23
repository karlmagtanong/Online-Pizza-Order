-- phpMyAdmin SQL Dump
-- version 4.3.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2019 at 03:05 PM
-- Server version: 5.6.23
-- PHP Version: 5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizza_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizza_auth`
--

CREATE TABLE IF NOT EXISTS `pizza_auth` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pizza_customer`
--

CREATE TABLE IF NOT EXISTS `pizza_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_mobile` bigint(20) NOT NULL,
  `customer_address` longtext NOT NULL,
  `customer_code` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_customer`
--

INSERT INTO `pizza_customer` (`customer_id`, `customer_name`, `customer_mobile`, `customer_address`, `customer_code`) VALUES
(45, 'Breezy', 1223, 'Paranaque City', '001223'),
(44, 'Breezy', 1223, 'Paranaque City', '001223'),
(43, 'Badang', 917647, 'addre', '0917647'),
(42, 'Badang', 917647, 'addre', '0917647'),
(41, 'Badang', 917647, 'addre', '0917647'),
(40, 'Badang', 917647, 'addre', '0917647'),
(39, 'Badang', 917647, 'addre', '0917647'),
(38, 'Badang', 917647, 'addre', '0917647'),
(37, 'Badang', 917647, 'addre', '0917647');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_info`
--

CREATE TABLE IF NOT EXISTS `pizza_info` (
  `info_id` int(11) NOT NULL,
  `info_name` varchar(255) NOT NULL,
  `info_class` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_info`
--

INSERT INTO `pizza_info` (`info_id`, `info_name`, `info_class`) VALUES
(1, 'CHEESE', 1),
(2, 'NY CLASSIC', 1),
(3, 'PEP & MUSHROOM', 1),
(4, 'MANHATTAN', 1),
(5, 'GARDEN SPECIAL', 1),
(6, 'HAWAIIAN', 1),
(7, 'NY FINEST', 1),
(8, 'TRIBECA MUSHROOM', 2),
(9, 'ANCHOVY LOVERS', 2),
(10, 'CORONA CHICKEN', 2),
(11, '#4 CHEESE', 2),
(12, 'GOURMET GARDEN', 2),
(13, 'ROASTED GARLIC', 2),
(14, 'FOUR SEASONS', 2),
(15, 'CHEESE', 3),
(16, 'BACON', 3),
(17, 'GROUND BEEF', 3),
(18, 'HAM', 3),
(19, 'ITALIAN SAUSAGE', 3),
(20, 'PEPPERONI', 3),
(21, 'SALAMI', 3),
(22, 'CAPERS', 3),
(23, 'ROASTED GARLIC', 3),
(24, 'BELL PEPPER', 3),
(25, 'MUSHROOMS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pizza_order`
--

CREATE TABLE IF NOT EXISTS `pizza_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `order_variant` int(11) NOT NULL,
  `order_size` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_category` int(11) NOT NULL,
  `order_price` decimal(11,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_class` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_order`
--

INSERT INTO `pizza_order` (`order_id`, `order_code`, `order_variant`, `order_size`, `order_qty`, `order_category`, `order_price`, `order_date`, `order_status`, `order_class`) VALUES
(57, '001223', 8, 2, 1, 1, '390', '2019-10-23 21:58:06', 1, 2),
(58, '001223', 8, 3, 1, 1, '560', '2019-10-23 21:58:26', 1, 2),
(55, '0917647', 7, 3, 3, 3, '431', '2019-10-23 21:46:26', 1, 1),
(56, '0917647', 2, 1, 2, 2, '210', '2019-10-23 21:50:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizza_rate`
--

CREATE TABLE IF NOT EXISTS `pizza_rate` (
  `rate_id` int(11) NOT NULL,
  `rate_variant` int(11) NOT NULL,
  `rate_size` int(11) NOT NULL,
  `rate_class` int(11) NOT NULL,
  `rate_price` decimal(11,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_rate`
--

INSERT INTO `pizza_rate` (`rate_id`, `rate_variant`, `rate_size`, `rate_class`, `rate_price`) VALUES
(1, 1, 10, 1, '175.00'),
(2, 1, 14, 1, '285.00'),
(3, 1, 18, 1, '440.00'),
(4, 2, 10, 1, '210.00'),
(5, 2, 14, 1, '340.00'),
(6, 2, 18, 1, '530.00'),
(7, 3, 10, 1, '220.00'),
(8, 3, 14, 1, '250.00'),
(9, 3, 18, 1, '540.00'),
(10, 4, 10, 1, '250.00'),
(11, 4, 14, 1, '295.00'),
(12, 4, 18, 1, '565.00'),
(13, 5, 10, 1, '210.00'),
(14, 5, 14, 1, '340.00'),
(15, 5, 18, 1, '530.00'),
(16, 6, 10, 1, '210.00'),
(17, 6, 14, 1, '340.00'),
(18, 6, 18, 1, '530.00'),
(19, 7, 10, 1, '260.00'),
(20, 7, 14, 1, '420.00'),
(21, 7, 18, 1, '575.00'),
(22, 8, 10, 2, '240.00'),
(23, 8, 14, 2, '390.00'),
(24, 8, 18, 2, '560.00'),
(25, 9, 10, 2, '275.00'),
(26, 9, 14, 2, '450.00'),
(27, 9, 18, 2, '595.00'),
(28, 11, 10, 2, '250.00'),
(29, 11, 14, 2, '400.00'),
(30, 11, 18, 2, '560.00'),
(31, 10, 10, 2, '250.00'),
(32, 10, 14, 2, '420.00'),
(33, 10, 18, 2, '575.00'),
(34, 12, 10, 2, '250.00'),
(35, 12, 14, 2, '410.00'),
(36, 12, 18, 2, '585.00'),
(37, 13, 10, 2, '240.00'),
(38, 13, 14, 2, '405.00'),
(39, 13, 18, 2, '505.00'),
(40, 14, 10, 2, '275.00'),
(41, 14, 14, 2, '430.00'),
(42, 14, 18, 2, '590.00'),
(43, 15, 10, 3, '35.00'),
(44, 15, 14, 3, '45.00'),
(45, 15, 18, 3, '60.00'),
(46, 16, 10, 3, '35.00'),
(47, 16, 14, 3, '45.00'),
(48, 16, 18, 3, '60.00'),
(49, 17, 10, 3, '35.00'),
(50, 17, 14, 3, '45.00'),
(51, 17, 18, 3, '60.00'),
(52, 18, 10, 3, '35.00'),
(53, 18, 14, 3, '45.00'),
(54, 18, 18, 3, '60.00'),
(55, 19, 10, 3, '35.00'),
(56, 19, 14, 3, '45.00'),
(57, 19, 18, 3, '60.00'),
(58, 20, 10, 3, '35.00'),
(59, 20, 14, 3, '45.00'),
(60, 20, 18, 3, '60.00'),
(61, 21, 10, 3, '35.00'),
(62, 21, 14, 3, '45.00'),
(63, 21, 18, 3, '60.00'),
(64, 22, 10, 3, '35.00'),
(65, 22, 14, 3, '45.00'),
(66, 22, 18, 3, '60.00'),
(67, 23, 10, 3, '35.00'),
(68, 23, 14, 3, '45.00'),
(69, 23, 18, 3, '60.00'),
(70, 24, 10, 3, '35.00'),
(71, 24, 14, 3, '45.00'),
(72, 24, 18, 3, '60.00'),
(73, 25, 10, 3, '35.00'),
(74, 25, 14, 3, '45.00'),
(75, 25, 18, 3, '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_toppings`
--

CREATE TABLE IF NOT EXISTS `pizza_toppings` (
  `toppings_id` int(11) NOT NULL,
  `toppings_code` varchar(255) NOT NULL,
  `toppings_variant` int(11) NOT NULL,
  `toppings_option` int(11) NOT NULL,
  `toppings_price` decimal(11,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_toppings`
--

INSERT INTO `pizza_toppings` (`toppings_id`, `toppings_code`, `toppings_variant`, `toppings_option`, `toppings_price`) VALUES
(80, '001223', 8, 22, '60.00'),
(78, '001223', 8, 15, '45.00'),
(79, '001223', 8, 20, '45.00'),
(77, '0917647', 2, 20, '35.00'),
(76, '0917647', 7, 20, '60.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza_auth`
--
ALTER TABLE `pizza_auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `pizza_customer`
--
ALTER TABLE `pizza_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `pizza_info`
--
ALTER TABLE `pizza_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `pizza_order`
--
ALTER TABLE `pizza_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pizza_rate`
--
ALTER TABLE `pizza_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `pizza_toppings`
--
ALTER TABLE `pizza_toppings`
  ADD PRIMARY KEY (`toppings_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizza_auth`
--
ALTER TABLE `pizza_auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pizza_customer`
--
ALTER TABLE `pizza_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `pizza_info`
--
ALTER TABLE `pizza_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pizza_order`
--
ALTER TABLE `pizza_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `pizza_rate`
--
ALTER TABLE `pizza_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `pizza_toppings`
--
ALTER TABLE `pizza_toppings`
  MODIFY `toppings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
