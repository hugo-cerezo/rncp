-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 avr. 2020 à 15:27
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rncp`
--
CREATE DATABASE IF NOT EXISTS `rncp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rncp`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `qtt` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `categorie`, `title`, `description`, `price`, `qtt`, `date`) VALUES
(1, 'indé', 'super meat boy', 'plateforme', 25, 100, '0000-00-00'),
(2, 'indé', 'faster than light', 'is a space-based top-down real-time strategy roguelike game created by indie developer Subset Games, which was released for Microsoft Windows, OS X and Linux in September 2012.[2] In the game, the player controls the crew of a single spacecraft, holding critical information to be delivered to an allied fleet, while being pursued by a large rebel fleet. The player must guide the spacecraft over eight sectors, each with planetary systems and events procedurally generated in a roguelike fashion, while facing rebel and other hostile forces, recruiting new crew, and outfitting and upgrading their ship. Combat takes place in pausable real time, and if the ship is destroyed or all of its crew lost, the game ends, forcing the player to restart with a new ship.', 10, 100, '0000-00-00'),
(3, 'indé', 'dead cells', 'Dead Cells is a roguelike, Castlevania-inspired action-platformer, allowing you to explore a sprawling, ever-changing castle… assuming you’re able to fight your way past its keepers. To beat the game you’ll have to master 2D souls-like like combat with the ever present threat of permadeath looming. No checkpoints. Kill, die, learn, repeat.', 12, 100, '0000-00-00'),
(4, 'indé', 'factorio', 'Factorio is a game in which you build and maintain factories.\r\n\r\nYou will be mining resources, researching technologies, building infrastructure, automating production and fighting enemies. Use your imagination to design your factory, combine simple elements into ingenious structures, apply management skills to keep it working, and protect it from the creatures who don t really like you.\r\n\r\nThe game is very stable and optimized for building massive factories. You can create your own maps, write mods in Lua, or play with friends via Multiplayer.', 18, 100, '0000-00-00'),
(5, 'AAA', 'world of warcraft', '\r\nAffrontez le Dieu très ancien N’Zoth et ses sbires à Ny’alotha, la cité en éveil, plongez au cœur d’un nouveau raid à douze boss, terrassez vos adversaires dans l’arène et sur les champs de bataille, et mettez votre courage à l’épreuve dans les donjons de pierre mythique pour gagner d’incroyables récompenses !', 60, 50, '0000-00-00'),
(6, 'AAA', 'tomb raider', 'Shadow of the Tomb Raider is an action-adventure video game developed by Eidos Montréal and published by Square Enix. It continues the narrative from the 2015 game Rise of the Tomb Raider and is the twelfth mainline entry in the Tomb Raider series. The game was released worldwide on 14 September 2018 for Microsoft Windows, PlayStation 4 and Xbox One. A macOS and Linux version of the game was released by Feral Interactive on 5 November 2019', 60, 50, '0000-00-00'),
(7, 'AAA', 'anno 1800', 'Anno 1800 is a city-building real-time strategy video game, developed by Blue Byte and published by Ubisoft, and launched on April 16, 2019 in North America.[1] It is the seventh game in the Anno series, and returns to the use of a historical setting following the last two titles, Anno 2070 and Anno 2205, taking place during the Industrial Revolution in the 19th century. Following the previous installment, the game returns to the series traditional city-building and ocean combat mechanics, but introduces new aspects of gameplay, such as tourism, blueprinting, and the effects of industrialisation influences on island inhabitants.', 60, 50, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `description-achat` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_utilisateur`, `title`, `total`, `description-achat`, `date`) VALUES
(28, 3, 'cerezo baelo', 120, '1|world of warcraft|60|2</br>', '0000-00-00'),
(20, 3, '', 111, '1|super meat boy|25|3</br>2|dead cells|12|3</br>', '0000-00-00'),
(29, 3, '', 25, '1|super meat boy|25|1</br>', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `title`, `login`, `commentaire`, `date`) VALUES
(4, 'super meat boy', 'administrateur-hugo', 'Coucou', '2020-04-07'),
(3, 'super meat boy', 'administrateur-hugo', 'Caca', '2020-04-07'),
(5, 'super meat boy', 'hugo', 'Test', '2020-04-07');

-- --------------------------------------------------------

--
-- Structure de la table `pannier_caca`
--

DROP TABLE IF EXISTS `pannier_caca`;
CREATE TABLE IF NOT EXISTS `pannier_caca` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `qtt` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pannier_caca`
--

INSERT INTO `pannier_caca` (`id`, `title`, `prix`, `qtt`) VALUES
(1, 'faster than light', 10, 2),
(2, 'dead cells', 12, 2),
(3, 'tomb raider', 60, 2),
(4, 'dead cells', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rating_table`
--

DROP TABLE IF EXISTS `rating_table`;
CREATE TABLE IF NOT EXISTS `rating_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `game_title` varchar(255) NOT NULL,
  `rating` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rating_table`
--

INSERT INTO `rating_table` (`id`, `id_utilisateur`, `game_title`, `rating`) VALUES
(1, 1, 'super meat boy', '5'),
(2, 1, 'super meat boy', '1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rang` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `adresse`, `email`, `rang`) VALUES
(1, 'hugo', '$2y$10$4d6OUQzz6MpesuwAJdwdP.Qosz0JTnhPfW7RsYE10j4bpz2Ro6ig2', '', '', ''),
(2, 'caca', '$2y$10$RHMJHdMfZ.3Uv4DeDMBzauWijMX.a74m0KN0p6SzExPX.7YDbXAIy', '', '', ''),
(3, 'admin', '$2y$10$p0dsQ.UaqQnJBdq/agwKG.i0a5kmo7DZXL4X/.GRlbSurWr.RLfCO', '', '', ''),
(4, 'troll', '$2y$10$IH6xERsuGMt2T5kmtZSdvePby8EAHERZV0Kx4H73wsonFSIvwKZAC', '', '', ''),
(5, 'dede', '$2y$10$BgS6pBTT.5ZY/cnDCjA/qe6SXLmwUR2MJ//rUFWl5U0KBxWmb2fva', '30tamerelachevre', 'hugocerezobaelo@gmail.com', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
