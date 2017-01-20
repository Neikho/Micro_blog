-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2017 at 08:53 PM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micro_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(3) NOT NULL,
  `contenu` text NOT NULL,
  `creation` int(11) DEFAULT NULL,
  `user_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `creation`, `user_id`) VALUES
(28, 'Iron man', 1479415440, 1),
(33, 'Deadpool', 1483629865, 1),
(35, 'Logan', 1484663927, 1),
(36, 'Aquaman', 1484666342, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `SID` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `pseudo`, `SID`) VALUES
(1, 'alba', 'thomas', 'toto@gmail.com', 'toto62', 'toto', '3c36674bac378a37abc1ee732453680f'),
(2, 'marvel', 'heroes', 'marvel@gmail.com', 'marvel62', 'marvel', 'bf6305611771d231318e7360144d1bbe'),
(3, 'Wayne', 'Bruce', 'batman@gmail.com', 'gotham', 'Batman', 'ac0dd8add6248c5a90958417e4eeeb24'),
(5, 'Wilson', 'Wade', 'deadpool@gmail.com', 'deadpool62', 'Deadpool', '5'),
(6, 'titi', 'titit', 'fdsfs@fsdfs', 'fdsfsf', 'titititititi', '5'),
(7, 'sdfsfd', 'fsdfsd', 'fsdf@fsdroot', 't815131sfsdfs', 'fsdfsd', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
