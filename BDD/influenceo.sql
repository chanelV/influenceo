-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 avr. 2022 à 07:56
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
-- Base de données : `influenceo`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Influenceur` int(11) NOT NULL,
  `nbre_comments` int(11) NOT NULL,
  `commentaire` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `influenceur`
--

DROP TABLE IF EXISTS `influenceur`;
CREATE TABLE IF NOT EXISTS `influenceur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_Influenceur` varchar(20) NOT NULL,
  `nom_Influenceur` varchar(40) NOT NULL,
  `prenom_Influenceur` varchar(40) NOT NULL,
  `photo_Influenceur` varchar(60) NOT NULL,
  `sexe_Influenceur` varchar(10) NOT NULL,
  `categorie_Influenceur` varchar(40) NOT NULL,
  `Langue_Influenceur` varchar(10) NOT NULL,
  `email_Influenceur` varchar(50) NOT NULL,
  `mp_Influenceur` varchar(50) NOT NULL,
  `avatar_Influenceur` varchar(60) NOT NULL,
  `instagram_Influenceur` varchar(60) NOT NULL,
  `facebook_Influenceur` varchar(60) NOT NULL,
  `twitter_Influenceur` varchar(60) NOT NULL,
  `ltiktok_Influenceur` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_Influenceur` int(20) NOT NULL,
  `nbre_likes` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_social_marque` varchar(40) NOT NULL,
  `logo_marque` varchar(60) NOT NULL,
  `localisation_marque` int(40) NOT NULL,
  `catégories_marque` int(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `id_Influenceur` int(40) NOT NULL,
  `id_marque` int(40) NOT NULL,
  `date_messagerie` date NOT NULL,
  `contenu_message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_influenceur` int(20) NOT NULL,
  `id_marques` int(20) NOT NULL,
  `titre_mission` varchar(40) NOT NULL,
  `catégorie_mission` varchar(60) NOT NULL,
  `description_mission` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
