-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Décembre 2016 à 21:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `blog`
--

INSERT INTO `blog` (`ID`, `titre`, `message`, `auteur`, `date_creation`) VALUES
(1, 'Ma première news', 'Salut à tous, Je veux vous parler de php et des bases de données', '', '2016-12-04 23:38:34'),
(2, 'Ma deuxième news', 'J\'enchaine les news alors !', '', '2016-12-04 23:39:21'),
(3, 'test 3', 'message très important sur la qualité d\'ai à grenoble', '', '2016-12-04 23:39:52'),
(4, 'test 4', 'message très important sur la qualité de l\'eau à Grenoble', '', '2016-12-04 23:40:18'),
(5, 'test 5', 'message très important sur la qualité de des routes à Grenoble', '', '2016-12-04 23:40:39'),
(6, 'test 6', 'Au revoir tout le monde !!!', '', '2016-12-04 23:41:03');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `id_blog`, `auteur`, `message`, `date_creation`) VALUES
(1, 6, 'Michel', 'Super ce poste ! très pertinent.', '2016-12-05 01:01:26'),
(2, 6, 'christophe', 'J\'aime beaucoup ce que vous venez de dire', '2016-12-05 21:45:10'),
(3, 6, 'Mireille', 'trop bien', '2016-12-05 22:34:35'),
(4, 6, 'Anna', 'Oh trop cool ce post !!!', '2016-12-05 22:36:49'),
(5, 5, 'Anna', 'Vraiment utile ! merci', '2016-12-05 22:39:47'),
(6, 5, 'Frederic', 'Meric pour ce post !', '2016-12-05 22:40:08');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
