-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Avril 2014 à 23:09
-- Version du serveur: 5.6.14
-- Version de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `musikeole`
--

-- --------------------------------------------------------

--
-- Structure de la table `manifestations`
--

CREATE TABLE IF NOT EXISTS `manifestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `heure` text NOT NULL,
  `placesDisponibles` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gratuit` tinyint(1) NOT NULL,
  `prixAdherent` double(2,2) NOT NULL,
  `prixExterieur` double(2,2) NOT NULL,
  `prixEnfant` double(2,2) NOT NULL,
  `dateCreation` date NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `idAssociation` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAdherent` (`idMembre`),
  KEY `idAssociation` (`idAssociation`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `manifestations`
--
ALTER TABLE `manifestations`
  ADD CONSTRAINT `manifestations_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manifestations_associations` FOREIGN KEY (`idAssociation`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manifestations_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
