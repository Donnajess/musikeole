-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Avril 2014 à 23:10
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
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `rue` varchar(200) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`rue`, `codePostal`, `ville`, `telephone`, `mail`) VALUES
('13 rue FranÃ§ois Mauriac', '59123', 'Zuydcoote', '33625340992', 'wavelet.alexandre@gmail.com');

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
  `fichier` varchar(255) NOT NULL,
  `indice` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `associations`
--

INSERT INTO `associations` (`id`, `nom`, `fichier`, `indice`) VALUES
(0, 'Musik''Eole', '', 10000000),
(1, 'Les Clar''minettes', 'les-clar-minettes.txt', 30),
(2, 'Ensemble orchestral', 'ensemble-orchestral.txt', 50),
(3, 'Orchestre minime', 'orchestre-minime.txt', 40);

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

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `idAutorisation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAutorisation` (`idAutorisation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membresBureau`
--

CREATE TABLE IF NOT EXISTS `membresBureau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `role` varchar(100) NOT NULL,
  `activite` varchar(1000) NOT NULL,
  `dateEntree` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `indice` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `membresBureau`
--

INSERT INTO `membresBureau` (`id`, `nom`, `prenom`, `role`, `activite`, `dateEntree`, `photo`, `indice`) VALUES
(2, 'Wavelet', 'Alexandre', 'DÃ©veloppeur', '<h1>D&eacute;veloppeur1</h1>\r\n<p>D&eacute;veloppeur du site internet, des modules sondages et gestion de contenu.</p>', '2014-03-25', 'c208ad5c6a1c4e66e755a3f2639f3375.jpg', 100),
(5, 'Doe', 'Alexandre1tg,jjk', '122', '<p>Activit&eacute; du membre &agrave; l''&eacute;cole de musique.</p>', '2014-05-02', '057a67a30291637a1c01ddbf919cef9a.jpg', 1);

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
-- Structure de la table `partenaires`
--

CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `fichier`) VALUES
(1, 'IUT de Calais', 'iut-de-calais.jpg'),
(2, 'Lorem ipsum', 'lorem-ipsum.jpg'),
(4, 'Terminal des Flandres', 'terminal-des-flandres.jpg'),
(5, 'Musik''Eole', 'musik-eole.jpg'),
(6, '#YOLO', '-yolo.jpg'),
(8, 'Foo Bar', 'foo-bar.jpg');

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
  `votes` int(11) NOT NULL DEFAULT '0',
  `idQuestion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `propositionssondages`
--

INSERT INTO `propositionssondages` (`id`, `proposition`, `votes`, `idQuestion`) VALUES
(1, 'Super', 8, 2),
(2, 'Moyen', 7, 2),
(3, 'Bof', 4, 2),
(4, '42', 5, 3),
(5, '42', 3, 3),
(6, '42', 3, 3),
(7, '42', 7, 3),
(8, '42', 2, 3),
(9, 'foo', 10, 4),
(10, 'bar', 7, 4),
(11, 'Aucun des 12', 3, 4),
(12, 'Pourquoi pas?', 15, 5),
(13, 'Oui, mais non, mais je sais pas', 5, 5);

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
  `indice` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `publicites`
--

INSERT INTO `publicites` (`id`, `nom`, `image`, `lien`, `mailAnnonceur`, `indice`, `active`) VALUES
(1, 'Jane Doe', 'pub1.jpg', 'http://loremipsum.com', 'wavelet.alexandre@gmail.com', 10, 1),
(2, 'yolo ohÃ©', 'pub2.jpg', 'http://yolo.com', 'yolo@yolo.com', 40, 0),
(3, 'Lorem ipsum', 'pub3.jpg', 'http://random.com', 'lorem@ipsum.com', 50, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `idType`, `idSondage`) VALUES
(2, 'Comment trouvez vous le site?', 1, 8),
(3, 'Quelle est la rÃ©ponse?', 1, 9),
(4, 'PÃ¢tes ou patates?', 2, 9),
(5, 'Faut-il une 3Ã¨me question?', 1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `reponsessondages`
--

CREATE TABLE IF NOT EXISTS `reponsessondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `idProposition` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProposition` (`idProposition`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Contenu de la table `reponsessondages`
--

INSERT INTO `reponsessondages` (`id`, `ip`, `idProposition`, `idQuestion`) VALUES
(1, '127.0.0.1', 6, 3),
(2, '127.0.0.1', 9, 4),
(3, '127.0.0.1', 12, 5),
(4, '127.0.0.1', 5, 3),
(5, '127.0.0.1', 10, 4),
(6, '127.0.0.1', 12, 5),
(7, '127.0.0.1', 4, 3),
(8, '127.0.0.1', 11, 4),
(9, '127.0.0.1', 12, 5),
(10, '127.0.0.1', 7, 3),
(11, '127.0.0.1', 10, 4),
(12, '127.0.0.1', 12, 5),
(13, '127.0.0.1', 8, 3),
(14, '127.0.0.1', 10, 4),
(15, '127.0.0.1', 13, 5),
(16, '127.0.0.1', 8, 3),
(17, '127.0.0.1', 10, 4),
(18, '127.0.0.1', 12, 5),
(19, '127.0.0.1', 7, 3),
(20, '127.0.0.1', 10, 4),
(21, '127.0.0.1', 12, 5),
(22, '127.0.0.1', 7, 3),
(23, '127.0.0.1', 9, 4),
(24, '127.0.0.1', 13, 5),
(25, '127.0.0.1', 7, 3),
(26, '127.0.0.1', 9, 4),
(27, '127.0.0.1', 12, 5),
(28, '127.0.0.1', 5, 3),
(29, '127.0.0.1', 10, 4),
(30, '127.0.0.1', 12, 5),
(31, '127.0.0.1', 1, 2),
(32, '127.0.0.1', 2, 2),
(33, '127.0.0.1', 3, 2),
(34, '127.0.0.1', 1, 2),
(35, '127.0.0.1', 1, 2),
(36, '127.0.0.1', 1, 2),
(37, '127.0.0.1', 1, 2),
(38, '127.0.0.1', 1, 2),
(39, '127.0.0.1', 3, 2),
(40, '127.0.0.1', 1, 2),
(41, '127.0.0.1', 1, 2),
(42, '127.0.0.1', 3, 2),
(43, '127.0.0.1', 3, 2),
(44, '127.0.0.1', 2, 2),
(45, '127.0.0.1', 2, 2),
(46, '127.0.0.1', 2, 2),
(47, '127.0.0.1', 2, 2),
(48, '127.0.0.1', 2, 2),
(49, '127.0.0.1', 2, 2),
(50, '127.0.0.1', 7, 3),
(51, '127.0.0.1', 9, 4),
(52, '127.0.0.1', 13, 5),
(53, '127.0.0.1', 4, 3),
(54, '127.0.0.1', 9, 4),
(55, '127.0.0.1', 12, 5),
(56, '127.0.0.1', 5, 3),
(57, '127.0.0.1', 9, 4),
(58, '127.0.0.1', 12, 5),
(59, '127.0.0.1', 7, 3),
(60, '127.0.0.1', 9, 4),
(61, '127.0.0.1', 12, 5),
(62, '127.0.0.1', 7, 3),
(63, '127.0.0.1', 9, 4),
(64, '127.0.0.1', 12, 5),
(65, '127.0.0.1', 6, 3),
(66, '127.0.0.1', 10, 4),
(67, '127.0.0.1', 12, 5),
(68, '127.0.0.1', 4, 3),
(69, '127.0.0.1', 9, 4),
(70, '127.0.0.1', 12, 5),
(71, '127.0.0.1', 4, 3),
(72, '127.0.0.1', 11, 4),
(73, '127.0.0.1', 13, 5),
(74, '127.0.0.1', 6, 3),
(75, '127.0.0.1', 9, 4),
(76, '127.0.0.1', 13, 5),
(77, '127.0.0.1', 4, 3),
(78, '127.0.0.1', 11, 4),
(79, '127.0.0.1', 12, 5);

-- --------------------------------------------------------

--
-- Structure de la table `sondages`
--

CREATE TABLE IF NOT EXISTS `sondages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `votants` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sondages`
--

INSERT INTO `sondages` (`id`, `titre`, `votants`, `dateCreation`, `actif`) VALUES
(8, 'Premier sondage', 19, '2014-03-28', 0),
(9, 'Sondage de fifou', 20, '2014-03-28', 1);

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
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typequestions`
--

INSERT INTO `typequestions` (`id`, `type`, `nom`) VALUES
(1, 'radio', 'Case à cocher'),
(2, 'select', 'Liste déroulante');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD CONSTRAINT `adherents_familles` FOREIGN KEY (`idFamille`) REFERENCES `familles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adherents_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `inscriptionsmanifestations_adherents` FOREIGN KEY (`idAdherent`) REFERENCES `adherents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptionsmanifestations_manifestations` FOREIGN KEY (`idManifestation`) REFERENCES `manifestations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `manifestations_associations` FOREIGN KEY (`idAssociation`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manifestations_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `membres_autorisations` FOREIGN KEY (`idAutorisation`) REFERENCES `autorisations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_sujets` FOREIGN KEY (`idSujet`) REFERENCES `sujets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Contraintes pour la table `reponsessondages`
--
ALTER TABLE `reponsessondages`
  ADD CONSTRAINT `reponses_propositions` FOREIGN KEY (`idProposition`) REFERENCES `propositionssondages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reponses_questions` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `sujets_categoriesforum` FOREIGN KEY (`idCategorieForum`) REFERENCES `categoriesforum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sujets_membres` FOREIGN KEY (`idMembre`) REFERENCES `membres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
