-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 03:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pray`
--

-- --------------------------------------------------------

--
-- Table structure for table `mosque`
--

CREATE TABLE `mosque` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(190) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `imsyak` time DEFAULT NULL,
  `subuh` time DEFAULT NULL,
  `syuru` time DEFAULT NULL,
  `dzuhur` time DEFAULT NULL,
  `ashar` time DEFAULT NULL,
  `maghrib` time DEFAULT NULL,
  `isya` time DEFAULT NULL,
  `info` text DEFAULT NULL,
  `wallpaper` varchar(190) DEFAULT NULL,
  `ramadhan` varchar(190) DEFAULT NULL,
  `tone` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mosque`
--

INSERT INTO `mosque` (`id`, `name`, `address`, `phone`, `imsyak`, `subuh`, `syuru`, `dzuhur`, `ashar`, `maghrib`, `isya`, `info`, `wallpaper`, `ramadhan`, `tone`) VALUES
(1, 'Masjid Darussalam', 'Jala utama II blok j2 no 11, Mata Air', '081371321971', '20:15:00', '16:20:00', '20:21:00', '13:19:27', '20:24:00', '18:36:00', '20:20:50', 'حُبِّبَ إِلَيَّ مِنَ الدُّنْيَا النِّسَاءُ وَالطِّيبُ، وَجُعِلَ قُرَّةُ عَيْنِي فِي الصَّلَاةِ حُبِّبَ إِلَيَّ مِنَ الدُّنْيَا النِّسَاءُ وَالطِّيبُ، وَجُعِلَ قُرَّةُ عَيْنِي فِي الصَّلَاةِ حُبِّبَ إِلَيَّ مِنَ الدُّنْيَا النِّسَاءُ وَالطِّيبُ، وَجُعِلَ قُرَّةُ عَيْنِي فِي الصَّلَاةِ حُبِّبَ إِلَيَّ مِنَ الدُّنْيَا النِّسَاءُ وَالطِّيبُ، وَجُعِلَ قُرَّةُ عَيْنِي فِي الصَّلَاةِ', 'img/1583897888', '2020-04-10', 'tone/beep_1.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mosque`
--
ALTER TABLE `mosque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mosque`
--
ALTER TABLE `mosque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
