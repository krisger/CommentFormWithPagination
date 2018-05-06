-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 07:16 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `general_aptitude_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `SurName` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Message` varchar(255) NOT NULL,
  `Birthday` date NOT NULL DEFAULT '2011-01-26',
  `Date` datetime NOT NULL DEFAULT '2011-01-26 14:30:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `UserName`, `SurName`, `Email`, `Message`, `Birthday`, `Date`) VALUES
(119, 'Jonas', ' Jo', 'asbilas@gmail.com', 'asdsadsa', '1992-05-20', '2018-02-07 19:25:44'),
(127, 'Naujas', ' Ä®raÅ¡as', 'info@gmail.com', 'adasdas', '1993-06-20', '2018-02-07 21:30:03'),
(117, 'Kristijonas', ' Gerdvilis', 'info@gmail.com', 'sadsads', '1992-05-20', '2018-02-07 19:24:06'),
(89, 'As', ' Bilas', 'asbilas@gmail.com', 'Hahaha', '1990-08-10', '2018-02-05 17:35:13'),
(92, 'Bill', ' Gates', 'bilgates@ha.com', 'Hello There!', '1960-02-22', '2018-02-05 17:38:01'),
(129, 'Kristijonas', ' Gerdvilis', 'anicetap@gmail.com', 'asdasdsa', '1992-05-20', '2018-02-07 21:49:05'),
(125, 'test', ' name', 'info@gmail.com', 'asdsad', '1992-05-20', '2018-02-07 21:24:41'),
(126, 'Kristijonas', ' Gerdvilis', 'kristijonasgerdvilis@gmail.com', 'asdasd', '1992-05-20', '2018-02-07 21:29:35'),
(120, 'Albina', ' Juozapavicius', 'albinas@gmail.com', 'Sveiki atvyke', '1986-04-20', '2018-02-07 19:39:17'),
(121, 'Kristijonas', ' Gerdvilis', 'kristijonasgerdvilis@gmail.com', 'sdfdsfsd', '1992-05-20', '2018-02-07 21:23:39'),
(128, 'Kristijonas', ' Gerdvilis', 'kristijonasgerdvilis@gmail.com', 'asdsada', '1992-05-20', '2018-02-07 21:48:51'),
(102, 'Kristijonas', ' Gerdvilis', 'kristijonasgerdvilis@gmail.com', 'asdsadasdasd', '1992-05-20', '2018-02-05 17:41:57'),
(130, 'test', ' name', 'asbilas@gmail.com', 'asdsadas', '1993-06-20', '2018-02-07 21:49:40'),
(110, 'Josh', ' Abigeil', 'joshabigeil@gmail.com', 'Hello', '1995-06-18', '2018-02-05 20:31:04'),
(106, 'test albinas', 'test albinas', 'info@gmail.com', 'asdsadsad', '1993-06-20', '2018-02-05 17:47:12'),
(109, 'Kristijonas', ' Gerdvilis', 'kristijonasgerdvilis@gmail.com', 'fghfh', '1992-05-20', '2018-02-05 20:30:32'),
(111, 'Aniceta', ' Popa', 'anicetap@gmail.com', 'Sveikuciai', '1993-05-20', '2018-02-07 16:49:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
