-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2020 at 08:01 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haais`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_id`
--

DROP TABLE IF EXISTS `answer_id`;
CREATE TABLE IF NOT EXISTS `answer_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `answer_text` varchar(255) NOT NULL,
  `answer_extra` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer_id`
--

INSERT INTO `answer_id` (`id`, `q_id`, `answer_text`, `answer_extra`) VALUES
(16, 12, 'Ò®Ñ Ð½ÑŒ ÑˆÐ¸Ñ€ÑÐ»Ð´ÑÑÐ½ ', ''),
(15, 12, 'Ð¥Ó©Ð»Ñ€Ó©Ó©Ð³Ò¯Ð¹', ''),
(14, 12, 'Ð¥Ó©Ð»Ó©Ñ€ÑÓ©Ð½', ''),
(17, 12, 'Ò®ÑÐ½Ð¸Ð¹ Ð±Ò¯Ñ‚ÑÑ† Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(18, 12, 'Ò®ÑÐ½Ð¸Ð¹ Ð±Ò¯Ñ‚ÑÑ† Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(19, 12, 'ÐÑ€ÑŒÑ Ò¯Ñ€ÑÐ²ÑÑÐ»Ñ‚ÑÐ¹', ''),
(20, 12, 'ÐÑ€ÑŒÑ Ò¯Ñ€ÑÐ²ÑÑÐ»Ð³Ò¯Ð¹', ''),
(21, 12, 'ÐÑ€ÑŒÑÐ½Ñ‹ Ð³Ð°Ð´Ð°Ñ€Ð³ÑƒÑƒ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(22, 12, 'ÐÑ€ÑŒÑÐ½Ñ‹ Ð³Ð°Ð´Ð°Ñ€Ð³ÑƒÑƒ Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(23, 12, 'ÐÑ€ÑŒÑÐ½Ñ‹ Ð³Ð°Ð´Ð°Ñ€Ð³ÑƒÑƒ Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(24, 12, 'ÐÑ€ÑŒÑÐ½Ñ‹ Ð±Ò¯Ñ‚ÑÑ† Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(25, 12, 'ÐÑ€ÑŒÑÐ°Ð½Ð´ Ð³Ð°Ð´Ð½Ñ‹ Ð±Ð¸ÐµÑ‚ Ð±Ð°Ð¹Ð³Ð°Ð° ÑÑÑÑ…', ''),
(26, 13, 'Ð“ÑÐ¼Ñ‚ÑÐ»Ñ‚ÑÐ¹', ''),
(27, 13, 'Ð“ÑÐ¼Ñ‚ÑÐ»Ð³Ò¯Ð¹', ''),
(28, 13, 'Ð‘Ð¸ÐµÐ¸Ð¹Ð½ Ð±Ð°Ð¹Ñ€Ð»Ð°Ð» Ñ‚ÑÐ³Ñˆ Ñ…ÑÐ¼Ñ‚ÑÐ¹', ''),
(29, 13, 'Ð‘Ð¸ÐµÐ¸Ð¹Ð½ Ð±Ð°Ð¹Ñ€Ð»Ð°Ð» Ñ‚ÑÐ³Ñˆ Ñ…ÑÐ¼Ð³Ò¯Ð¹', ''),
(30, 13, 'Ð¢Ð¾Ð»Ð³Ð¾Ð¹Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(31, 13, 'Ð¢Ð¾Ð»Ð³Ð¾Ð¹Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÑŒÐ¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(32, 13, 'Ð¦ÑÑÐ¶Ð¸Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(33, 13, 'Ð¦ÑÑÐ¶Ð¸Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(34, 13, 'Ð¥ÑÐ²Ð»Ð¸Ð¹Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÐ²Ð¸Ð¹Ð½ ', ''),
(35, 13, 'Ð¥ÑÐ²Ð»Ð¸Ð¹Ð½ Ñ…ÑÑÑÐ³ Ñ…ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(36, 13, 'ÐÐ°Ñ€Ñ†Ð°Ð³ ÑÑ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(37, 13, 'Ð¥ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(38, 13, 'Ð£Ñ€Ð´ Ð¼Ó©Ñ‡ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(39, 13, 'Ð¥ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', ''),
(40, 13, 'Ð¥Ð¾Ð¹Ð´ Ð¼Ó©Ñ‡ Ñ…ÑÐ²Ð¸Ð¹Ð½', ''),
(41, 13, 'Ð¥ÑÐ²Ð¸Ð¹Ð½ Ð±ÑƒÑ', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `group` int(3) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `group`, `username`, `password`) VALUES
(1, 1, 'admin', '$2y$10$WRYwTPywPSC8mVD/Oo.zHup7RVNcUBLIg/KgGcXayi.VVZkWB089a'),
(2, NULL, 'test', '$2y$10$WRYwTPywPSC8mVD/Oo.zHup7RVNcUBLIg/KgGcXayi.VVZkWB089a');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(5) NOT NULL,
  `sort` int(5) DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `label`, `link`, `target`, `sort`) VALUES
(2, 'Асуулт нэмэх', '../menu/add_question.php', 'SELF', 1),
(3, 'Хариулт нэмэх', '../menu/add_answer.php', 'SELF', 2),
(4, 'Нийтлэг шинж', '../menu/common_symptoms.php', 'SELF', 3),
(5, 'Өвөрмөц шинж', '../menu/unique_symptoms.php', 'SELF', 4),
(6, 'Удирдах самбар', '../menu/dashboard.php', 'SELF', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_id`
--

DROP TABLE IF EXISTS `question_id`;
CREATE TABLE IF NOT EXISTS `question_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `question_text` varchar(255) NOT NULL,
  `question_extra` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_id`
--

INSERT INTO `question_id` (`id`, `question_id`, `question_text`, `question_extra`) VALUES
(12, NULL, 'ÐÑ€ÑŒÑ, Ò¯ÑÐ½Ð¸Ð¹ Ó©Ó©Ñ€Ñ‡Ð»Ó©Ð»Ñ‚', 1),
(13, NULL, 'Ð‘Ð¸ÐµÐ¸Ð¹Ð½ Ð³Ð°Ð´Ð°Ð°Ð´ Ð±Ð°Ð¹Ð´Ð°Ð»', 1),
(14, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ð¨Ò¯Ð»ÑÐ½Ð¸Ð¹ ÑÐ»Ð³Ð°Ñ€Ð°Ð»Ñ‚Ñ‹Ð½ Ñ…ÑÐ¼Ð¶ÑÑ ', 1),
(15, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ð¨Ò¯Ð»ÑÐ½Ð¸Ð¹ Ñ…Ò¯Ñ‡Ð¸Ð»Ð»ÑÐ³ Ð±Ð°Ð¹Ð´Ð°Ð»', 1),
(16, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ð¨ÑÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ð»Ñ‚Ñ‹Ð½ Ñ…ÑÐ¼Ð¶ÑÑ ', 1),
(17, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ð¨ÑÑÑÐ½Ð¸Ð¹ Ñ…Ò¯Ñ‡Ð¸Ð»Ð»ÑÐ³ Ð±Ð°Ð¹Ð´Ð°Ð»', 1),
(18, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ó¨Ñ‚Ð³Ó©Ð½ ÑÐ»Ð³Ð°Ñ€Ð°Ð»Ñ‚Ñ‹Ð½ Ñ…ÑÐ¼Ð¶ÑÑ', 1),
(19, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ó¨Ñ‚Ð³Ó©Ð½Ð¸Ð¹ Ñ…Ò¯Ñ‡Ð¸Ð»Ð»ÑÐ³ Ð±Ð°Ð¹Ð´Ð°Ð»', 1),
(20, NULL, 'Ð‘Ð¸ÐµÑÑ ÑÐ»Ð³Ð°Ñ€Ð°Ñ… ÑˆÐ¸Ð½Ð³ÑÐ½Ð¸Ð¹ Ð±Ð°Ð¹Ð´Ð°Ð». Ó¨Ð²Ó©Ñ€Ð¼Ó©Ñ† Ð±ÑƒÑ ÑÐ»Ð³Ð°Ñ€Ð°Ð»Ñ‚', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
