-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for wdv441_2021
CREATE DATABASE IF NOT EXISTS `wdv441_2021` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wdv441_2021`;

-- Dumping structure for table wdv441_2021.newsarticles
CREATE TABLE IF NOT EXISTS `newsarticles` (
  `articleID` int(11) NOT NULL AUTO_INCREMENT,
  `articleTitle` varchar(150) DEFAULT NULL,
  `articleContent` mediumtext,
  `articleAuthor` varchar(150) DEFAULT NULL,
  `articleDate` datetime DEFAULT NULL,
  PRIMARY KEY (`articleID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table wdv441_2021.newsarticles: ~0 rows (approximately)
/*!40000 ALTER TABLE `newsarticles` DISABLE KEYS */;
INSERT IGNORE INTO `newsarticles` (`articleID`, `articleTitle`, `articleContent`, `articleAuthor`, `articleDate`) VALUES
	(1, 'Test Article 1', 'Content 1', 'GG2', '2021-02-18 00:00:00'),
	(2, 'Test Article 2', 'test 3', 'GG', '2021-02-18 00:00:00');
/*!40000 ALTER TABLE `newsarticles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
