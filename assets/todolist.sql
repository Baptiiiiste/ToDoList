-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 déc. 2022 à 07:03
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `listtask`
--

DROP TABLE IF EXISTS `listtask`;
CREATE TABLE IF NOT EXISTS `listtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `owner` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`,`visibility`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `listtask`
--

INSERT INTO `listtask` (`id`, `name`, `visibility`, `owner`) VALUES
(50, 'School', 1, NULL),
(51, 'House', 0, 'loris'),
(52, 'Homework', 0, 'baptiste'),
(53, 'Christmas gift', 1, NULL),
(54, 'Holidays', 1, NULL),
(55, 'Shopping', 1, NULL),
(56, 'Music', 1, NULL),
(57, 'Game', 1, NULL),
(58, 'Party', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `listTask` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `listTask` (`listTask`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `done`, `listTask`) VALUES
(51, 'Cook', 'Make pasta', 0, 51),
(52, 'Housework', 'Clean the floor', 1, 51),
(53, 'Maths', 'Ex 2 page 62', 0, 52),
(54, 'English', 'Ex 5 page 152', 0, 52),
(55, 'PHP', 'Best course', 0, 50),
(56, 'Jean', 'Smartphone', 0, 53),
(57, 'Bob', 'Smartwatch', 1, 53),
(58, 'Bob', 'Shoes', 0, 53),
(59, 'Car', 'Repair tail light', 1, 54),
(60, 'Blazor', 'Minecraft project', 0, 50),
(61, 'Cake', 'Make a chocolate', 1, 58),
(62, 'Carrefour Market', 'Bread', 0, 55);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `password`) VALUES
('baptiste', '$2y$10$nAPuZKf7BtWqIwaB/P.yQuS5vLnsBRFz2qGJTFEZE9ko9nz3OEF8S'),
('loris', '$2y$10$s0JJnAcBIAnvqwSJ/ggq5OUwVjAgAt5.QFTl5gta.I8/NLbYDfkeq');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `listtask`
--
ALTER TABLE `listtask`
  ADD CONSTRAINT `owner` FOREIGN KEY (`owner`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `listTask` FOREIGN KEY (`listTask`) REFERENCES `listtask` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
