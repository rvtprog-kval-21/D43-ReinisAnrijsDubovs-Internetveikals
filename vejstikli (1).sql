-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 26, 2021 at 03:29 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vejstikli`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `sir_name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_latvian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `sir_name`, `password`) VALUES
(2, 'admin1', 'Reinis Anrijs', 'Dubovs', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Autostikli'),
(2, 'Instrumenti'),
(3, 'Ķīmijas'),
(4, 'Aksesuāri');

-- --------------------------------------------------------

--
-- Table structure for table `darbnicas`
--

DROP TABLE IF EXISTS `darbnicas`;
CREATE TABLE IF NOT EXISTS `darbnicas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Darbnica` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `darbnicas`
--

INSERT INTO `darbnicas` (`ID`, `Darbnica`) VALUES
(1, 'Šmerļa iela 3, LV-1006'),
(2, 'Lazdu iela 16d, LV-1029');

-- --------------------------------------------------------

--
-- Table structure for table `pakalpojums`
--

DROP TABLE IF EXISTS `pakalpojums`;
CREATE TABLE IF NOT EXISTS `pakalpojums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pakalpojums` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `pakalpojums`
--

INSERT INTO `pakalpojums` (`ID`, `Pakalpojums`) VALUES
(1, 'Servis'),
(2, 'Auto stiklu remonts'),
(3, 'Auto likturu pulēšana'),
(4, 'Auto stiklu tonēšana'),
(5, 'Lietus, gaismas sensora un kameras kalibrešana');

-- --------------------------------------------------------

--
-- Table structure for table `produkti`
--

DROP TABLE IF EXISTS `produkti`;
CREATE TABLE IF NOT EXISTS `produkti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_latvian_ci NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `products_picture` longblob,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `DarbnicasID` int(11) DEFAULT NULL,
  `UsersID` int(11) DEFAULT NULL,
  `PakalpojumaID` int(11) DEFAULT NULL,
  `Vards` varchar(50) CHARACTER SET utf8 COLLATE utf8_latvian_ci DEFAULT NULL,
  `Uzvards` varchar(50) CHARACTER SET utf8 COLLATE utf8_latvian_ci DEFAULT NULL,
  `Telefona Nr` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_latvian_ci DEFAULT NULL,
  `Datums` date DEFAULT NULL,
  `Laiks` time DEFAULT NULL,
  KEY `DarbnicasID` (`DarbnicasID`),
  KEY `PakalpojumaID` (`PakalpojumaID`),
  KEY `UsersID` (`UsersID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `sir_name` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_latvian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_latvian_ci NOT NULL,
  `create_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_latvian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `admin`, `name`, `sir_name`, `email`, `password`, `create_datetime`) VALUES
(1, 'reinisd17', NULL, 'Reinis Anrijs', 'Dubovs', 'reinisd17@inbox.lv', 'karlo117', '2021-02-11 21:26:00'),
(2, 'admin1', 1, 'Reinis Anrijs', 'Dubovs', 'reinisd17@inbox.lv', 'admin123', '2021-02-11 22:55:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkti`
--
ALTER TABLE `produkti`
  ADD CONSTRAINT `produkti_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_3` FOREIGN KEY (`UsersID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rezervacija_ibfk_4` FOREIGN KEY (`DarbnicasID`) REFERENCES `darbnicas` (`ID`),
  ADD CONSTRAINT `rezervacija_ibfk_5` FOREIGN KEY (`PakalpojumaID`) REFERENCES `pakalpojums` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
