-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2018 at 04:00 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `infodata`
--

DROP TABLE IF EXISTS `infodata`;
CREATE TABLE IF NOT EXISTS `infodata` (
  `infoid` int(11) NOT NULL AUTO_INCREMENT,
  `infolocation` varchar(50) NOT NULL,
  `infoorg` varchar(30) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `procedur` text NOT NULL,
  `technica` text NOT NULL,
  `analytica` text NOT NULL,
  `hr` text NOT NULL,
  `suggestio` text NOT NULL,
  `byshared` varchar(30) NOT NULL,
  `stream` varchar(30) NOT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infodata`
--

INSERT INTO `infodata` (`infoid`, `infolocation`, `infoorg`, `mode`, `procedur`, `technica`, `analytica`, `hr`, `suggestio`, `byshared`, `stream`) VALUES
(2, 'Chandigarh', 'Infosys', 'In-campus', 'Aptitude test, Technical Written, Technical Interview and HR', 'Technical written and Interview rounds', 'No', 'Yes', 'Skills: J2EE', 'Akash', 'CSE'),
(3, 'Noida', 'TCS', 'Online', 'group Discussion, Aptitude test, Technical Written, Technical Interview and HR', 'Technical written and Interview rounds', 'Yes', 'Yes', 'Electronics', 'Poonam', 'ECE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
