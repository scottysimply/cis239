-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 04:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogame_simplified`
--

-- --------------------------------------------------------

--
-- Table structure for table `vg_games`
--

CREATE TABLE `vg_games` (
  `game_id` int(11) NOT NULL,
  `title` varchar(48) NOT NULL,
  `genre` varchar(64) DEFAULT NULL,
  `platform` varchar(64) DEFAULT NULL,
  `image_path` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vg_games`
--

INSERT INTO `vg_games` (`game_id`, `title`, `genre`, `platform`, `image_path`) VALUES
(1, 'The Legend of Zelda: Tears of the Kingdom', 'Adventure', 'Nintendo Switch', 'totk.png'),
(2, 'Animal Crossing: New Horizons', 'Survival', 'Nintendo Switch', 'acnh.png'),
(3, 'Outer Wilds', 'Adventure', 'PC, Xbox, Playstation, Nintendo Switch', 'ow.png'),
(4, 'Hollow Knight', 'Action', 'PC, Xbox, Playstation, Nintendo Switch', 'hk.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vg_games`
--
ALTER TABLE `vg_games`
  ADD PRIMARY KEY (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
