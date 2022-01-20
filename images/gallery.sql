-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2021 at 05:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `date`, `image`) VALUES
(1, 'Jason Stuckless', 'revengeissweet@ontariotechu.net', 'Great gallery and a great website, your web designer should be proud!', '', 'images/Jason.png'),
(2, 'Daniel Amasowomwan', 'daisawesome@hotmail.com', 'I agree with Jason, are you guys hiring?', '', 'images/Daniel.png'),
(3, 'Darren Constantine', 'd_c02@gmail.com', 'Any chance you are going to have an Annie Leibovitz exhibition in the future?', '', 'images/Darren.png'),
(4, 'Ahmaad Ansari', 'aaa@yahoo.com', 'I like turtles.', '', 'images/Ahmaad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exhibitions`
--

DROP TABLE IF EXISTS `exhibitions`;
CREATE TABLE IF NOT EXISTS `exhibitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibitions`
--

INSERT INTO `exhibitions` (`id`, `name`, `start_date`, `end_date`, `description`, `image`, `link`) VALUES
(1, 'Charlie Jackson', '2021-11-21', '2021-12-05', 'Dark floral arrangements are the theme of his exhibition.', 'images/artist-charlieJackson.png', 'artists/Charlie_Jackson.html'),
(2, 'Woodrow Finnegan', '2021-11-14', '2021-11-28', 'Woodrow focuses on abstract interpretations of cityscapes.', 'images/artist-woodrowFinnegan.png', 'artists/Woodrow_Finnegan.html'),
(3, 'Selena Rosales', '2022-01-02', '2022-01-16', 'Impressionist Selena Rosales brings her striking work to AGOT.', 'images/artist-selenaRosales.png', 'artists/Selena_Rosales.html');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

DROP TABLE IF EXISTS `merchandise`;
CREATE TABLE IF NOT EXISTS `merchandise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `name`, `picture`, `description`, `price`) VALUES
(1, 'Gift Certificate', 'Gift Card.png', 'Gift card with folder that can be used to buy tickets or items from the shop. Can be purchased in denominations of 10.', 100),
(2, 'White Sweatshirt', 'White SweatShirt.png', '100% cotton white sweatshirt with AGOT logo.  Made in Canada. Comes in sizes XS, S, M, L, XL, XXL.', 44.99),
(3, 'Blue T-Shirt', 'Blue Shirt.png', '100% cotton blue t-shirt with AGOT logo. Made in Canada. Comes in sizes S, M, L.', 24.99),
(4, 'Blue Sweatshirt', 'Blue SweatShirt.png', '100% Cotton blue sweatshirt with AGOT logo. Made in Canada. Comes in sizes XS, S, M, L, XL, XXL.', 44.99),
(5, 'Coffee Mug', 'Blue Mug.png', 'Ceramic mug with AGOT logo.  Comes in blue, white, black and orange colours.', 14.99),
(6, 'Black T-Shirt', 'Black Shirt.png', '100% cotton blue t-shirt with AGOT logo. Made in Canada. Comes in sizes S, M, L.', 24.99);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `review` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `photo`, `review`) VALUES
(1, 'Eryn Hilton', 'images/Eryn.png', 'I loved it!  The art was amazing and the staff were super helpful.  I cannot wait to go back!'),
(2, 'Dillon McCray', 'images/Dillon.png', 'I just happened to come across this gallery one day when I was at OTU.  I was pleasantly surprised to find out that such a wonderful gallery was down the street from my home! A++'),
(3, 'Noa Stanton', 'images/Noa.png', 'Spectacular art on display at AGOT! 10/10 would visit again.');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `adult_tickets` int(11) NOT NULL,
  `child_tickets` int(11) NOT NULL,
  `student_tickets` int(11) NOT NULL,
  `senior_tickets` int(11) NOT NULL,
  `total` double NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `date_time`, `adult_tickets`, `child_tickets`, `student_tickets`, `senior_tickets`, `total`, `name`, `email`, `paid`) VALUES
(2, '2021-12-25 22:53:00', 2, 3, 1, 1, 123.45, 'Jason Stuckless', 'jason_stuckless@hotmail.com', 0),
(4, '2021-12-14 13:55:00', 1, 0, 0, 0, 28.25, 'John Smith', 'js@gmail', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
