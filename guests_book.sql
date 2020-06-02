-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2020 at 09:41 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guests_book`
--
CREATE DATABASE IF NOT EXISTS `guests_book` DEFAULT CHARACTER SET utf16 COLLATE utf16_bin;
USE `guests_book`;

-- --------------------------------------------------------

--
-- Table structure for table `gb`
--

CREATE TABLE `gb` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf16_bin NOT NULL,
  `name` varchar(60) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `gb`
--

INSERT INTO `gb` (`id`, `text`, `name`) VALUES
(1, 'Hello', 'Vasya'),
(2, 'Hello', 'Vasya'),
(8, 'addssss', 'somedddd'),
(13, 'addss', 'nameass'),
(14, 'add', 'soe'),
(15, 'add', 's'),
(17, 'add', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) COLLATE utf16_bin NOT NULL,
  `adress` varchar(100) COLLATE utf16_bin NOT NULL,
  `name` varchar(60) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `phonebook`
--

INSERT INTO `phonebook` (`id`, `phone`, `adress`, `name`) VALUES
(1, '3463474', 'ffffff', 'Petya'),
(2, '4445454', 'gggggg', 'Nick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gb`
--
ALTER TABLE `gb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gb`
--
ALTER TABLE `gb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
