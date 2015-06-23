-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fxbl
CREATE DATABASE IF NOT EXISTS `fxbl` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fxbl`;


-- Dumping structure for table fxbl.home_page
CREATE TABLE IF NOT EXISTS `home_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT '0',
  `language_id` int(10) unsigned DEFAULT '1',
  `custom_url` varchar(512) DEFAULT '',
  `read_more_link` varchar(512) DEFAULT '',
  `parent_id` int(10) unsigned DEFAULT '0',
  `show_in_main_menu` enum('1','0') CHARACTER SET latin1 DEFAULT '0',
  `order_num` int(10) unsigned DEFAULT '0',
  `width` int(10) unsigned DEFAULT '0',
  `height` int(10) unsigned DEFAULT '0',
  `inline_styles` int(10) unsigned DEFAULT '0',
  `name` varchar(512) DEFAULT '',
  `banner` enum('Y','N','B') DEFAULT 'N',
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') CHARACTER SET latin1 DEFAULT '1',
  `created_by` int(10) DEFAULT NULL,
  `ip_address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- Dumping data for table fxbl.home_page: ~40 rows (approximately)
/*!40000 ALTER TABLE `home_page` DISABLE KEYS */;
INSERT INTO `home_page` (`id`, `page_id`, `language_id`, `custom_url`, `read_more_link`, `parent_id`, `show_in_main_menu`, `order_num`, `width`, `height`, `inline_styles`, `name`, `banner`, `date_added`, `status`, `created_by`, `ip_address`) VALUES
	(1, 32, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading', 'N', '2013-02-17 00:22:14', '1', NULL, '127.0.0.1'),
	(2, 33, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Software', 'N', '2013-02-17 00:22:19', '1', NULL, '127.0.0.1'),
	(3, 34, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Conditions', 'N', '2013-02-17 00:22:22', '1', NULL, '127.0.0.1'),
	(4, 229, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home menu - Why forexray', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(5, 32, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(6, 33, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Software', 'N', '2013-02-17 00:22:19', '1', NULL, '127.0.0.1'),
	(7, 34, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Conditions', 'N', '2013-02-17 00:22:22', '1', NULL, '127.0.0.1'),
	(8, 370, 0, '', '', 0, '0', 0, 0, 0, 0, 'Home Page Content', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(9, 32, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(10, 33, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Software', 'N', '2013-02-17 00:22:19', '1', NULL, '127.0.0.1'),
	(11, 34, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Trading Conditions', 'N', '2013-02-17 00:22:22', '1', NULL, '127.0.0.1'),
	(12, 38, 0, '', '', 0, '0', 0, 0, 0, 0, 'Home Page Content Russian', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(13, 39, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home Page Banner Code', 'N', '2015-06-20 18:14:45', '1', NULL, NULL),
	(15, 229, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home menu - Why forexray', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(16, 202, 1, '', '', 0, '0', 0, 0, 0, 0, 'Footer Below', 'N', '2013-02-17 00:22:26', '1', NULL, '49.205.173.157'),
	(17, 370, 0, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Footer Content', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(18, 41, 0, '', '', 0, '0', 0, 0, 0, 0, 'Home Page - Footer Content', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(19, 224, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home page - Above footerskype', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(20, 225, 1, '', '', 0, '0', 0, 0, 0, 0, 'Home page -welcome to forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(21, 226, 1, '', '', 0, '0', 0, 0, 0, 0, 'home page -open account image', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(22, 227, 1, '', '', 0, '0', 0, 0, 0, 0, 'home page -30percentage text', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(23, 228, 1, '', '', 0, '0', 0, 0, 0, 0, 'home page -start trading forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(24, 230, 1, '', '', 0, '0', 0, 0, 0, 0, 'testing_author', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(25, 41, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home Page Banner Code', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(26, 202, 3, '', '', 0, '0', 0, 0, 0, 0, 'Footer Below', 'N', '2013-02-17 00:22:26', '1', NULL, '49.205.173.157'),
	(27, 229, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home menu - Why forexray', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(28, 40, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home Page Banner Code', 'N', '2013-02-17 00:22:26', '1', NULL, '183.83.55.219'),
	(29, 202, 2, '', '', 0, '0', 0, 0, 0, 0, 'Footer Below', 'N', '2013-02-17 00:22:26', '1', NULL, '49.205.173.157'),
	(30, 224, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home page - Above footerskype', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(31, 225, 2, '', '', 0, '0', 0, 0, 0, 0, 'Home page -welcome to forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(32, 224, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home page - Above footerskype', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(33, 226, 2, '', '', 0, '0', 0, 0, 0, 0, 'home page -open account image', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(35, 227, 2, '', '', 0, '0', 0, 0, 0, 0, 'home page -30percentage text', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(37, 228, 2, '', '', 0, '0', 0, 0, 0, 0, 'home page -start trading forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(43, 230, 2, '', '', 0, '0', 0, 0, 0, 0, 'testing_author', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(45, 232, 1, '', '', 0, '0', 0, 0, 0, 0, 'sean', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(46, 225, 3, '', '', 0, '0', 0, 0, 0, 0, 'Home page -welcome to forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(47, 226, 3, '', '', 0, '0', 0, 0, 0, 0, 'home page -open account image', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(48, 227, 3, '', '', 0, '0', 0, 0, 0, 0, 'home page -30percentage text', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(49, 228, 3, '', '', 0, '0', 0, 0, 0, 0, 'home page -start trading forexbull', 'N', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(50, 230, 3, '', '', 0, '0', 0, 0, 0, 0, 'testing_author', 'Y', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(52, 232, 2, '', '', 0, '0', 0, 0, 0, 0, 'sean', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(53, 232, 3, '', '', 0, '0', 0, 0, 0, 0, 'sean', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(54, 233, 3, '', '', 0, '0', 0, 0, 0, 0, 'Braveheart', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(55, 233, 2, '', '', 0, '0', 0, 0, 0, 0, 'Braveheart', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1'),
	(56, 233, 1, '', '', 0, '0', 0, 0, 0, 0, 'Braveheart', 'B', '2013-02-17 00:22:26', '1', NULL, '127.0.0.1');
/*!40000 ALTER TABLE `home_page` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
