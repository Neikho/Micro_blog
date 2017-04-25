-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 25 Avril 2017 à 19:17
-- Version du serveur :  5.7.17-0ubuntu0.16.10.1
-- Version de PHP :  7.0.15-0ubuntu0.16.10.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `albathomasblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(3) NOT NULL,
  `contenu` text NOT NULL,
  `creation` int(11) DEFAULT NULL,
  `user_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `creation`, `user_id`) VALUES
(60, 'iron man', 1490791862, 3),
(61, 'alba@gmail.com', 1490802961, 1),
(63, 'ici #fsfs fdsfs', 1490803883, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
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
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `pseudo`, `SID`) VALUES
(1, 'alba', 'thomas', 'toto@gmail.com', 'toto62', 'toto', '9bba7c8642ef11179b4e873702200691'),
(2, 'marvel', 'heroes', 'marvel@gmail.com', 'marvel62', 'marvel', 'bf6305611771d231318e7360144d1bbe'),
(3, 'Wayne', 'Bruce', 'batman@gmail.com', 'gotham', 'Batman', '051f60c1e037e9e043d391fc0481e3a0'),
(5, 'Wilson', 'Wade', 'deadpool@gmail.com', 'deadpool62', 'Deadpool', '5'),
(6, 'titi', 'titit', 'fdsfs@fsdfs', 'fdsfsf', 'titititititi', '5'),
(7, 'sdfsfd', 'fsdfsd', 'fsdf@fsdroot', 't815131sfsdfs', 'fsdfsd', '5'),
(8, 'lotbrock', 'ragnar', 'fsdfsd@fsdfsd', 'ragnar62', 'viking', '5');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
