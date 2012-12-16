-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Versione del server: 5.1.66
-- Versione PHP: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `placepuppy_db`
--
CREATE DATABASE `placepuppy_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `placepuppy_db`;

-- --------------------------------------------------------

--
-- Struttura della tabella `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `width` int(10) DEFAULT NULL,
  `height` int(10) NOT NULL,
  `prop` float NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `images`
--

INSERT INTO `images` (`ID`, `name`, `path`, `width`, `height`, `prop`) VALUES
(1, '1.jpg', 'images/1.jpg', 800, 600, 1.33333),
(2, '2.jpg', 'images/2.jpg', 3072, 2034, 1.51032),
(3, '3.jpg', 'images/3.jpg', 650, 488, 1.33197),
(4, '4.jpg', 'images/4.jpg', 3456, 2304, 1.5),
(5, '5.jpg', 'images/5.jpg', 1024, 768, 1.33333),
(6, '6.jpg', 'images/6.jpg', 2848, 1880, 1.51489),
(7, '7.jpg', 'images/7.jpg', 426, 526, 0.809886),
(8, '8.jpg', 'images/8.jpg', 1982, 1487, 1.33289),
(9, '9.jpg', 'images/9.jpg', 540, 400, 1.35),
(10, '10.jpg', 'images/10.jpg', 1024, 710, 1.44225),
(11, '11.jpg', 'images/11.jpg', 2896, 1944, 1.48971),
(12, '12.jpg', 'images/12.jpg', 800, 572, 1.3986),
(13, '13.jpg', 'images/13.jpg', 1024, 768, 1.33333),
(14, '14.jpg', 'images/14.jpg', 2048, 1782, 1.14927),
(15, '15.jpg', 'images/15.jpg', 2560, 1920, 1.33333),
(16, '16.jpg', 'images/16.jpg', 2048, 1536, 1.33333),
(17, '17.jpg', 'images/17.jpg', 3456, 2304, 1.5),
(18, '18.jpg', 'images/18.jpg', 2048, 1371, 1.4938),
(19, '19.jpg', 'images/19.jpg', 533, 640, 0.832812),
(20, '20.jpg', 'images/20.jpg', 2272, 1704, 1.33333),
(21, '21.jpg', 'images/21.jpg', 1600, 1200, 1.33333),
(22, '22.jpg', 'images/22.jpg', 1632, 1224, 1.33333),
(23, '23.jpg', 'images/23.jpg', 4383, 3951, 1.10934),
(24, '24.jpg', 'images/24.jpg', 1280, 851, 1.50411),
(25, '25.jpg', 'images/25.jpg', 2048, 1536, 1.33333),
(26, '26.jpg', 'images/26.jpg', 1143, 851, 1.34313),
(27, '27.jpg', 'images/27.jpg', 3648, 2736, 1.33333),
(28, '28.jpg', 'images/28.jpg', 640, 480, 1.33333);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
