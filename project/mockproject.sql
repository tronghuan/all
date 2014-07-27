-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2014 at 06:38 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mockproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bran`
--

CREATE TABLE IF NOT EXISTS `tbl_bran` (
  `bran_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bran_name` varchar(200) NOT NULL,
  `pro_id` int(10) NOT NULL,
  PRIMARY KEY (`bran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_bran`
--

INSERT INTO `tbl_bran` (`bran_id`, `bran_name`, `pro_id`) VALUES
(1, 'Viet Nam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `cate_parent` int(10) NOT NULL DEFAULT '0',
  `cate_order` int(5) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`, `cate_parent`, `cate_order`) VALUES
(1, 'Laptop', 0, 12),
(5, 'Sony', 1, 45),
(6, 'Samsung', 1, 2),
(7, 'HTC', 1, 2),
(8, 'Blackberry', 1, 6),
(9, 'Nokia', 1, 5),
(11, 'Asus', 0, 10),
(12, 'Iphone 4s', 4, 4),
(14, 'Dell 1.1', 9, 7),
(15, 'Dell 1.1.1', 14, 2000),
(16, 'Dell 1.1.2', 14, 5),
(17, 'sdfds', 7, 0),
(18, 'sdfsdf', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cateproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_cateproduct` (
  `cate_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `catepro_order` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cateproduct`
--

INSERT INTO `tbl_cateproduct` (`cate_id`, `pro_id`, `catepro_order`) VALUES
(16, 1, 1),
(15, 1, 0),
(5, 7, 0),
(8, 7, 0),
(5, 8, 0),
(5, 9, 0),
(5, 10, 0),
(9, 11, 0),
(6, 11, 0),
(9, 12, 0),
(9, 13, 0),
(14, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `com_author` varchar(50) NOT NULL,
  `com_email` varchar(50) NOT NULL,
  `com_content` text NOT NULL,
  `com_score` float NOT NULL,
  `com_status` tinyint(1) NOT NULL,
  `pro_id` int(10) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
  `coun_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coun_name` varchar(50) NOT NULL,
  PRIMARY KEY (`coun_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `img_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_name` varchar(50) NOT NULL,
  `img_title` varchar(200) NOT NULL,
  `img_status` tinyint(1) NOT NULL DEFAULT '0',
  `pro_id` int(10) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`img_id`, `img_name`, `img_title`, `img_status`, `pro_id`) VALUES
(1, '1404182349mau4.jpg', '', 0, 10),
(2, '1404182349mau6.jpg', '', 0, 10),
(3, '1404184578', '', 0, 11),
(4, '1404354927', '', 0, 12),
(5, '1404355201', '', 0, 13),
(6, '1404355283', '', 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE IF NOT EXISTS `tbl_orderdetail` (
  `orderdetail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(200) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_number` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`orderdetail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(200) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_price_sale` float NOT NULL,
  `pro_images` varchar(255) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_info` text NOT NULL,
  `pro_status` tinyint(1) NOT NULL DEFAULT '0',
  `pro_bran` int(10) NOT NULL,
  `pro_country` int(10) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `pro_name`, `pro_price`, `pro_price_sale`, `pro_images`, `pro_desc`, `pro_info`, `pro_status`, `pro_bran`, `pro_country`) VALUES
(1, 'San pham', 22, 23, 'hgj', 'ghfg', 'fh', 0, 1, 0),
(2, 'rêtrt', 435435, 345, '4535', 'dtr', 'etrt', 0, 0, 0),
(8, 'Sony expria z3', 15000, 20000, '', 'Ã¡d', 'Ã¡d', 0, 1, 0),
(9, 'Sony expria z3', 15000, 20000, '1403996312mau4.jpg', 'Ã¡d', 'Ã¡d', 1, 1, 0),
(10, 'Nokia 8230', 1000, 12000, '1404182349mau1.jpg', 'sd', 'sd', 0, 1, 0),
(11, 'Nokia Lumia 9250', 1000, 1200, '1404184577mau3.jpg', 'Ã¡dsdadas', 'Ã¡d', 0, 1, 0),
(12, 'Nokia Lumia 930', 1000, 12000, '1404354927Nokia-Lumia-930-360-33.jpg', 'Nokia Lumia 930', 'Nokia Lumia 930', 0, 1, 0),
(13, 'Nokia Lumia 930', 1000, 12000, '1404355201Nokia-Lumia-930-360-33.jpg', 'Nokia Lumia 930', 'Nokia Lumia 930', 0, 1, 0),
(14, 'iPad Air Cellular 128GB', 1000, 12000, '1404355283Nokia-Lumia-930-360-33.jpg', 'iPad Air Cellular 128GB', 'iPad Air Cellular 128GB', 0, 1, 0),
(15, 'Sony Experia Z2 00000', 1500, 1000, '', 'Sony Experia Z2 00000', 'Sony Experia Z2 00000Sony Experia Z2 00000Sony Experia Z2 00000', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE IF NOT EXISTS `tbl_slide` (
  `slide_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(200) NOT NULL,
  `slide_desc` text NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_order` int(3) NOT NULL,
  `slide_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `password`, `email`, `address`, `phone`, `level`) VALUES
(29, 'administrator', 'e10adc3949ba59abbe56e057f20f883e', 'admin@local.com', 'Ha Noi', '0973980948', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
