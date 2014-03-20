-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Mars 2014 à 18:18
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `musikeole`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `id` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `idFamille` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idFamille` (`idFamille`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `adherentsassociations`
--

CREATE TABLE IF NOT EXISTS `adherentsassociations` (
  `idAdherent` varchar(20) NOT NULL,
  `idAssociation` int(11) NOT NULL,
  PRIMARY KEY (`idAdherent`,`idAssociation`),
  KEY `adherentsAssociations_associations` (`idAssociation`),
  KEY `idAdherent` (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `annoncesbourse`
--

CREATE TABLE IF NOT EXISTS `annoncesbourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` double(4,2) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idAdherent` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idAdherent` (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE IF NOT EXISTS `associations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `autorisations`
--

CREATE TABLE IF NOT EXISTS `autorisations` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autorisations`
--

INSERT INTO `autorisations` (`id`, `nom`) VALUES
(1, 'membre'),
(2, 'adhérent'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `boutique` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categoriesforum`
--

CREATE TABLE IF NOT EXISTS `categoriesforum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reglee` tinyint(1) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `demandesphotos`
--

CREATE TABLE IF NOT EXISTS `demandesphotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `idAdherent` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAdherent` (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

CREATE TABLE IF NOT EXISTS `familles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptionsmanifestations`
--

CREATE TABLE IF NOT EXISTS `inscriptionsmanifestations` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `placesAdherents` int(11) NOT NULL,
  `placesEnfants` int(11) NOT NULL,
  `placesExterieurs` int(11) NOT NULL,
  `date` date NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `idAdherent` varchar(20) NOT NULL,
  `idManifestation` int(11) NOT NULL,
  PRIMARY KEY (`idInscription`),
  KEY `idAdherent` (`idAdherent`,`idManifestation`),
  KEY `idManifestation` (`idManifestation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscritsnewsletter`
--

CREATE TABLE IF NOT EXISTS `inscritsnewsletter` (
  `mail` varchar(50) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`mail`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignescommande`
--

CREATE TABLE IF NOT EXISTS `lignescommande` (
  `idCommande` int(11) NOT NULL DEFAULT '0',
  `idProduit` int(11) NOT NULL DEFAULT '0',
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `idCommande` (`idCommande`,`idProduit`),
  KEY `lignesCommandes_produits` (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `manifestations`
--

CREATE TABLE IF NOT EXISTS `manifestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `placesDisponibles` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `prixAdherent` double(2,2) NOT NULL,
  `prixExterieur` double(2,2) NOT NULL,
  `prixEnfant` double(2,2) NOT NULL,
  `dateCreation` date NOT NULL,
  `idAssociation` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAssociation` (`idAssociation`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `idAutorisation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAutorisation` (`idAutorisation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `message` varchar(1000) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idSujet` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMembre` (`idMembre`,`idSujet`),
  KEY `idSujet` (`idSujet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAlbum` (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photosdemandees`
--

CREATE TABLE IF NOT EXISTS `photosdemandees` (
  `idPhoto` int(11) NOT NULL,
  `idDemande` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`,`idDemande`),
  KEY `photosdemandees_demandesphotos` (`idDemande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `quantiteInitiale` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` double(4,2) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `prioriteAdherent` tinyint(1) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `dateEstimation` date NOT NULL,
  `avancement` int(11) NOT NULL,
  `financement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `propositionsidees`
--

CREATE TABLE IF NOT EXISTS `propositionsidees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `image` varchar(50) NOT NULL,
  `reponse` varchar(1500) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `propositionssondages`
--

CREATE TABLE IF NOT EXISTS `propositionssondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proposition` varchar(50) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `publicites`
--

CREATE TABLE IF NOT EXISTS `publicites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `lien` varchar(150) NOT NULL,
  `mailAnnonceur` varchar(100) NOT NULL,
  `affichee` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) NOT NULL,
  `idType` int(11) NOT NULL,
  `idSondage` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idType` (`idType`),
  KEY `idSondage` (`idSondage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `responsessondages`
--

CREATE TABLE IF NOT EXISTS `responsessondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idProposition` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idQuestion` (`idQuestion`),
  KEY `idProposition` (`idProposition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE IF NOT EXISTS `sondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idCategorieForum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMembre` (`idMembre`),
  KEY `idCategorieForum` (`idCategorieForum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typequestions`
--

CREATE TABLE IF NOT EXISTS `typequestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adherents_familles` FOREIGN KEY (`idFamille`) REFERENCES `familles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `adherentsassociations`
--
ALTER TABLE `adherentsassociations`
  ADD CONSTRAINT `adherentsAssociations_adherents` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adherentsAssociations_associations` FOREIGN KEY (`idAssociation`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `annoncesbourse`
--
ALTER TABLE `annoncesbourse`
  ADD CONSTRAINT `annoncesBourse_adherents` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annoncesBourse_categories` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `demandesphotos`
--
ALTER TABLE `demandesphotos`
  ADD CONSTRAINT `demandesPhotos_adherents` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptionsmanifestations`
--
ALTER TABLE `inscriptionsmanifestations`
  ADD CONSTRAINT `inscriptionsmanifestations_manifestations` FOREIGN KEY (`idManifestation`) REFERENCES `manifestations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptionsmanifestations_adherents` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscritsnewsletter`
--
ALTER TABLE `inscritsnewsletter`
  ADD CONSTRAINT `inscritsNewsletter_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignescommande`
--
ALTER TABLE `lignescommande`
  ADD CONSTRAINT `lignesCommandes_produits` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignescommande_commandes` FOREIGN KEY (`idCommande`) REFERENCES `commandes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `manifestations`
--
ALTER TABLE `manifestations`
  ADD CONSTRAINT `manifestations_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manifestations_associations` FOREIGN KEY (`idAssociation`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `membres_autorisations` FOREIGN KEY (`idAutorisation`) REFERENCES `autorisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_sujets` FOREIGN KEY (`idSujet`) REFERENCES `sujets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_albums` FOREIGN KEY (`idAlbum`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photosdemandees`
--
ALTER TABLE `photosdemandees`
  ADD CONSTRAINT `photosdemandees_demandesphotos` FOREIGN KEY (`idDemande`) REFERENCES `demandesphotos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photosdemandees_photos` FOREIGN KEY (`idPhoto`) REFERENCES `photos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_categories` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `propositionsidees`
--
ALTER TABLE `propositionsidees`
  ADD CONSTRAINT `propositionsidees_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `propositionssondages`
--
ALTER TABLE `propositionssondages`
  ADD CONSTRAINT `propositions_questions` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_sondages` FOREIGN KEY (`idSondage`) REFERENCES `sondages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_types` FOREIGN KEY (`idType`) REFERENCES `typequestions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `responsessondages`
--
ALTER TABLE `responsessondages`
  ADD CONSTRAINT `reponsessondage_propositions` FOREIGN KEY (`idProposition`) REFERENCES `propositionssondages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reponsessondage_questions` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `sujets_categoriesforum` FOREIGN KEY (`idCategorieForum`) REFERENCES `categoriesforum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sujets_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
