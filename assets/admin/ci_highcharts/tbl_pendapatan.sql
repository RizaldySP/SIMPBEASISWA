-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2013 at 05:59 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.0-ZS5.6.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_chart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendapatan`
--

CREATE TABLE IF NOT EXISTS `tbl_pendapatan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `hasil` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_pendapatan`
--

INSERT INTO `tbl_pendapatan` (`id`, `tanggal`, `hasil`) VALUES
(1, '2013-01-01', 30),
(2, '2013-02-01', 20),
(3, '2013-03-01', 90),
(4, '2013-04-01', 70),
(5, '2013-05-01', 20),
(6, '2013-06-01', 40),
(8, '2013-07-01', 90),
(9, '2013-08-01', 10),
(10, '2013-09-01', 90),
(11, '2013-10-01', 60),
(12, '2013-11-01', 90),
(13, '2013-12-01', 40);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
