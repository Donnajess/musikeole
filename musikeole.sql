-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Avril 2014 à 22:42
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
  `idManifestation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `albums`
--

INSERT INTO `albums` (`id`, `nom`, `idManifestation`) VALUES
(0, '', 0),
(4, 'Lorem ipsum', 20),
(5, 'Dolor sit amet', 19),
(7, 'Redirection', 14),
(8, 'yolo', 18),
(9, 'Consectetur', 13),
(10, 'grandes photos', 15),
(11, 'Longues photos', 17),
(12, 'Lorem ipsum', 0),
(13, 'Lorem ipsum', 0);

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
-- Structure de la table `manifestations`
--

CREATE TABLE IF NOT EXISTS `manifestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `dateManif` date NOT NULL,
  `heure` varchar(10) NOT NULL,
  `places` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gratuit` tinyint(1) NOT NULL,
  `prixAdherent` decimal(4,2) NOT NULL DEFAULT '0.00',
  `prixExterieur` decimal(4,2) NOT NULL DEFAULT '0.00',
  `prixEnfant` decimal(4,2) NOT NULL DEFAULT '0.00',
  `dateCreation` date NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `idAssociation` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAssociation` (`idAssociation`,`idAlbum`),
  KEY `idAlbum` (`idAlbum`),
  KEY `idMembre` (`idMembre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `manifestations`
--

INSERT INTO `manifestations` (`id`, `nom`, `description`, `dateManif`, `heure`, `places`, `image`, `gratuit`, `prixAdherent`, `prixExterieur`, `prixEnfant`, `dateCreation`, `valide`, `idAssociation`, `idAlbum`, `idMembre`) VALUES
(0, '', '', '0000-00-00', '', 0, '', 0, '0.00', '0.00', '0.00', '0000-00-00', 1, 0, 13, 0),
(6, 'Tous en choeur !', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, non fuga aut mollitia odio sapiente porro? Nam, obcaecati, ea, iure, nobis similique id reiciendis earum veniam perspiciatis minima nihil iste!</p>\r\n<p>Ducimus, vitae assumenda dolore quibusdam repellat qui voluptate nostrum pariatur aliquid eius. Voluptas, animi, illum maiores laborum corporis totam itaque voluptate dolorum ratione ipsa impedit dolorem illo aliquam rerum dolore.</p>', '2014-06-17', '13:00', 50, '6a5678ef0622d7f689fb36dffcb04ff5.jpg', 1, '0.00', '0.00', '0.00', '2014-04-04', 1, 3, 0, 0),
(11, 'Lorem ipsum', '<p>Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.</p>\r\n<h3>Consectetur</h3>\r\n<p>Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.</p>', '2014-04-27', '19:00', 50, '3ff3116223e146b7604c5f1bc4f0a050.jpg', 0, '5.00', '10.00', '2.00', '2014-04-06', 1, 0, 0, 0),
(12, 'Chorale de pÃ¢ques', '<p>Ergo ego senator inimicus, si ita vultis, homini, amicus esse, sicut semper fui, rei publicae debeo. Quid? si ipsas inimicitias, depono rei publicae causa, quis me tandem iure reprehendet, praesertim cum ego omnium meorum consiliorum atque factorum exempla semper ex summorum hominum consiliis atque factis mihi censuerim petenda.</p>', '2014-05-06', '13:00', 50, '84305343a9b56df4b70f7bdd8bbd0526.jpg', 1, '0.00', '0.00', '0.00', '2014-04-06', 1, 3, 0, 0),
(13, 'Chorale de NoÃ«l', '<p>Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia, applicatione magis animi cum quodam sensu amandi quam cogitatione quantum illa res utilitatis esset habitura. Quod quidem quale sit, etiam in bestiis quibusdam animadverti potest, quae ex se natos ita amant ad quoddam tempus et ab eis ita amantur ut facile earum sensus appareat. Quod in homine multo est evidentius, primum ex ea caritate quae est inter natos et parentes, quae dirimi nisi detestabili scelere non potest; deinde cum similis sensus exstitit amoris, si aliquem nacti sumus cuius cum moribus et natura congruamus, quod in eo quasi lumen aliquod probitatis et virtutis perspicere videamur.</p>\r\n<p>Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfus', '2013-12-27', '17:00', 50, '5bab6f40470b713f5274a5359522405c.jpg', 1, '0.00', '0.00', '0.00', '2014-04-06', 1, 2, 9, 0),
(14, 'Trompettes en folie', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-02-11', '19:00', 20, '9444bb727d0cdfaac0ddf66597fbf8dd.jpg', 0, '5.00', '7.00', '2.50', '2014-04-06', 1, 2, 7, 0),
(15, 'Clarinettes nettes nettes', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-03-23', '17:00', 30, '44bb7753f9bede107cf8dd4d46f9050e.jpg', 0, '4.00', '8.00', '2.00', '2014-04-06', 1, 1, 10, 0),
(16, 'Orchestre enfantin', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-01-15', '15:00', 70, '20a377219da7fed6db1b0ecde0e40124.jpg', 1, '0.00', '0.00', '0.00', '2014-04-06', 1, 3, 0, 0),
(17, 'FÃªte de la musique', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-02-09', '20:00', 75, '83435493c266ded328f7c068aece81ef.jpg', 0, '5.00', '10.00', '4.00', '2014-04-06', 1, 0, 11, 0),
(18, 'D''klassiques', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-02-03', '11:00', 100, '721dac8e1508851449c276a7cac12210.jpg', 0, '7.00', '15.00', '5.00', '2014-04-06', 1, 2, 8, 0),
(19, 'Leffrinchorale', '<p>Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.</p>\r\n<p>Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare le', '2014-02-26', '14:00', 40, 'bb2d1d418f264e8022a372fdd856a624.jpg', 1, '0.00', '0.00', '0.00', '2014-04-06', 1, 0, 5, 0),
(20, 'Carnaval enfantin', '<p>Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfusus, augente nocte adulta terrorem quievere paulisper lucem opperientes. arbitrabantur enim nullo inpediente transgressi inopino adcursu adposita quaeque vastare, sed in cassum labores pertulere gravissimos.</p>\r\n<p>Inter quos Paulus eminebat notarius ortus in Hispania, glabro quidam sub vultu latens, odorandi vias periculorum occultas perquam sagax. is in Brittanniam missus ut militares quosdam perduceret ausos conspirasse Magnentio, cum reniti non possent, iussa licentius supergressus fluminis modo fortunis conplurium sese repentinus infudit et ferebatur per strages multiplices ac ruinas, vinculis membra ingenuorum adfligens et quosdam obterens manicis, crimina scilicet multa', '2014-03-08', '15:00', 200, 'bbf6250de6602d513faf58c58e518259.jpg', 1, '0.00', '0.00', '0.00', '2014-04-07', 1, 3, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNaissance` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `idAutorisation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAutorisation` (`idAutorisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `dateNaissance`, `telephone`, `mail`, `motDePasse`, `idAutorisation`) VALUES
(0, '', '', '', '', '', '', 3),
(1, 'Wavelet', 'Alexandre', '13/09/1991', '33625340992', 'wavelet.alexandre@gmail.com', '6bab9ba7d9001e9126955bfb2c4ac48e', 3),
(2, 'Wavelet', 'Alexandre', '13/09/1991', '33625340992', 'azerty@azerty.com', 'ab4f63f9ac65152575886860dde480a1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `membresbureau`
--

CREATE TABLE IF NOT EXISTS `membresbureau` (
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
-- Contenu de la table `membresbureau`
--

INSERT INTO `membresbureau` (`id`, `nom`, `prenom`, `role`, `activite`, `dateEntree`, `photo`, `indice`) VALUES
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
  `lien` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `nom`, `fichier`, `lien`) VALUES
(1, 'IUT de Calais', 'iut-de-calais.jpg', ''),
(2, 'Lorem ipsum', 'lorem-ipsum.jpg', ''),
(4, 'Terminal des Flandres', 'terminal-des-flandres.jpg', ''),
(5, 'Musik''Eole', 'musik-eole.jpg', ''),
(6, '#YOLO', '-yolo.jpg', ''),
(8, 'Foo Bar', 'foo-bar.jpg', ''),
(9, 'LoremPixel', 'lorempixel.jpg', 'http://lorempixel.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `nom`, `idAlbum`) VALUES
(2, '103afb58edfefd316f4f25370d3a3b60.jpg', 4),
(3, 'ddff3ea800fc25e2722fee4926cdcfbe.jpg', 4),
(4, '9b99a9e44b85c9366a7d3beee4abfe95.jpg', 4),
(5, '11f57852ad67a864347a68b78e81f579.jpg', 4),
(6, '1eb903ffb5e1bb3fc8f56f02584da652.jpg', 4),
(7, '6960b463aa81da7e21a1591af6ced701.jpg', 4),
(8, 'ef4d1b722d5187db37fd78fd076fac31.jpg', 4),
(9, '3847db09d4a80dd66d5b4729ebe701f0.jpg', 4),
(10, '5a7ad3eecf6c5555c3ac8c74ccd20b1f.jpg', 4),
(11, '6b493c2f8065262dd1bbc8f47fc934a0.jpg', 4),
(12, 'c6ef4323f30e4b6f2a9100407224ef15.jpg', 4),
(13, '1df41da2aa06ab2367a3e240cdb192c2.jpg', 5),
(14, '8c86282a0abae24fb42485d64650dd27.jpg', 5),
(15, '96f378064930261d9d30d2c8547b1cbf.jpg', 5),
(16, 'c7d90d10806072962d02b51aa392bf53.jpg', 5),
(17, '3c58b689f44692d499fc69a6574a065b.jpg', 5),
(18, '069ce44217b04000fa91ff5ad9802bf5.jpg', 5),
(19, '71bf8f788fa734cbba5e2a950f2de54a.jpg', 5),
(20, '98d3baa8982bfdbb53ce14f2a36430a9.jpg', 5),
(21, '7a0d3877b9d5434b335ef04b1c672863.jpg', 5),
(22, '64d2aef09bfb1159aad3681976df2d13.jpg', 5),
(23, '55fd2d212e69df060f272ee6672bd243.jpg', 5),
(24, '45134f00522eace3b0cef4234b2dfc8f.jpg', 5),
(25, '8bd8ab609b71149705a28fd466f120d2.jpg', 5),
(26, '409b1924d865913e0a3a5d7ae3b46d10.jpg', 5),
(27, '274bf53d2b37cbd7094a8a1c62525939.jpg', 5),
(28, '6d11a61efac4b1c4cc36175a52795f4e.jpg', 5),
(29, '5a6473e47f06b49ff1cecbe362360b5f.jpg', 5),
(30, '1e53e202550f22694406d959c9d7b940.jpg', 5),
(31, 'dad1fd9c13fa110f2edcb847d3e98497.jpg', 5),
(41, '75e1f842e1c96c1e60ca6009321f477d.jpg', 7),
(42, '89ed4852185fb3a687e2266e8e19dbe1.jpg', 7),
(43, 'd266898cfa2ad10dc381a5fc77de3516.jpg', 7),
(44, 'd47ee5591f668fd33287d16809e534e1.jpg', 7),
(45, 'c2631ae7b7229251d67972ca84fa7a56.jpg', 7),
(46, '19700ecf2430c953ff6cde07a065bcac.jpg', 7),
(47, '2b17a01d26bac1a1b2d58131b732023c.jpg', 7),
(48, 'a7aab45744ecf2637dfab8fb0fa8223c.jpg', 7),
(49, 'd3a6446ebe597d49936e42c8b8ced19b.jpg', 7),
(50, '9976d266527a6fee07dd7ef2e222040e.jpg', 7),
(51, '56bd2c67d20c8c9395c7ee14692866e3.jpg', 8),
(52, '124f875a55bb951b76b572f0c921c955.jpg', 8),
(53, 'fea46c15bdaabc2de7c9b095e2edf605.jpg', 8),
(54, '55366ad9cfc2a0f0bf120c8218943ca6.jpg', 8),
(55, '851abeb4523a617ebcfc5c5d80906c37.jpg', 8),
(56, '4efbd50dcb899b764edb688f18538d0c.jpg', 8),
(57, 'ea768968c399d3bab566365f1e25fca9.jpg', 8),
(58, '287d48be2d2f327dae543446aae71c2a.jpg', 8),
(59, 'ae1fcdd8c97192d48728b789d95a9cb1.jpg', 8),
(60, 'f740ee04807bb280aee4f979cec36dfe.jpg', 8),
(61, 'f14ab9e3fbe4b97bd8af9a7ec77969ab.jpg', 8),
(62, '571d1a0f51c7e51618a05d07d77a4ca1.jpg', 8),
(63, '0787dcb50ccd2efa2ef8936b3033c0db.jpg', 8),
(64, '3a1e250d82d99c5123b3dd5b0bcb95f1.jpg', 8),
(65, '8dbfe20fa80aa36a56a2034b74466498.jpg', 8),
(66, '669cd17b3b8eaeff948ab8499c3363f9.jpg', 8),
(68, '884e6e8b9fd40b3107dbcaf7a5297e39.jpg', 8),
(69, 'a8a7e0f5717d29e6150834a9837b2194.jpg', 8),
(70, '749f48e11dc8f97f0f0d4518d45ec69d.jpg', 8),
(71, 'aca090f8445269660a2b9da8b4c249a7.jpg', 8),
(72, '8e1fae6ea354e115019f4be6df2067ec.jpg', 8),
(73, '05fd0e3e645fd65bff136f42247379c5.jpg', 8),
(74, '2a0b821a0fe123ea7b51592febd7a840.jpg', 8),
(75, 'f713effacff625183ffa71ac014e84db.jpg', 8),
(76, 'da4379bdc6c80df14ea427cec773104e.jpg', 8),
(78, 'a81ab729583720f451723624db425786.jpg', 8),
(79, '4423c5d3164f711b141e76fa56e8824d.jpg', 8),
(80, '2b70e233b01c121cc31c06d00bc94db3.jpg', 8),
(81, 'fbfb2dd8164bfc09d818e88dd7a55fe1.jpg', 9),
(82, '67d2a96808826b54636dcc3f33d6ebe4.jpg', 9),
(83, 'cea77d87a54c889fe2ab420cdc330c64.jpg', 9),
(84, '817b3be1030954320bac958a868de386.jpg', 9),
(85, '08040f4c2238092047484f1b91f9c059.jpg', 9),
(87, 'f4a882fd0f2a4714f853ae0360a31902.jpg', 9),
(88, '42e965362144dd872c5b5cc644013855.jpg', 9),
(98, '962f18fff049441b966353adf0822eeb.jpg', 9),
(99, '1cc98d60c8776db6de82f467bb84af41.jpg', 9),
(100, '42ff138e0933df1c5663bacce75d4cca.jpg', 9),
(101, 'd9e446868aea2dbf080aa5a18396fd63.jpg', 9),
(102, '9a0ed3940837845308d1ff9b43134e8f.jpg', 9),
(103, '1dc783dc252ec5e99ea90645f792871a.jpg', 9),
(104, '11b13a079acd59ca1903bdea58986a59.jpg', 9),
(105, '34494ebf91b8d8a1b44e6c17d1085834.jpg', 9),
(106, '61ebe6c204a69a0c3d41f8bbf3df4bb8.jpg', 9),
(107, '6d314e5d70c57801e35eaa7cc5ccc1f2.jpg', 10),
(108, 'e474a8de852a95f8a38ffc050af369b4.jpg', 10),
(109, '19ea32688cc27cc94cc5845c3423ae06.jpg', 10),
(110, '9ef2bc7ce3712b0e2bf0fea268adf184.jpg', 10),
(111, '0340d8842357b0d213d7a65728584c75.jpg', 10),
(112, 'db2dcbcc84b3ba2f8238659b31a59066.jpg', 10),
(113, '389777e37be8e1ec1f3b48a932a41d9f.jpg', 10),
(114, 'cd1b1c7705969a7d426e7989953c9bd4.jpg', 10),
(115, '8b3cea0271ffa4bfc2d6baffeebcdf23.jpg', 10),
(116, '0021f3101904c3fb59c74b1830bc4eb3.jpg', 10),
(117, '3103863a473370c73fcd29b0adb9608a.jpg', 10),
(118, 'ba6b30d2962e970dc3a16c49adb85573.jpg', 11),
(119, '3c4679ac9d25e15f355150dd08f0954f.jpg', 11),
(120, '75756ea659784e4fb11306fc296ee295.jpg', 11),
(121, '72441c9f65329542dfb40659a08f0be2.jpg', 11),
(122, '649b220f50955bc3217517c212bc7ce7.jpg', 11),
(123, 'd66bbbe782a6ed8569789db76cb328ac.jpg', 11),
(124, 'd3dc98fba311128f67f840df9513d4a6.jpg', 11),
(125, 'ce3383511c510e0170d6f9eb105f6c8d.jpg', 11),
(126, '97a952f070661a82165ee068e837001d.jpg', 11),
(127, '8febc19a030626d7a6c29ba2349752f2.jpg', 11),
(128, '73c77122851b5e0e71ac5058d3136c55.jpg', 12),
(129, '51828dba426ebc0ef0e03f598a416e54.jpg', 12),
(130, 'b13e58d94a095b16f9a0e49036b004eb.jpg', 12),
(131, 'a5e88db73c2a0e6ab7b3bb83510e9483.jpg', 12),
(132, 'c94bf7013205ee5d640f932752980c44.jpg', 12),
(133, 'd9d400af0baca6369a087cdf6e60fd09.jpg', 12),
(134, 'bf028fc56093f3c9cabfd10d8ed1869d.jpg', 12),
(135, '983ba9c18539b7c0b7630d1a8d987b5e.jpg', 12),
(136, '4b6c53a780f28e32d14fe00bd1ff15f3.jpg', 12),
(137, '4b082d70cdde7d586c9fe56f3a524abf.jpg', 12),
(138, '7955c51de6d1ca6ceb6fd8cada8d0097.jpg', 13),
(139, '595116bc0019a2a136e99f4cf661d398.jpg', 13),
(140, 'e4d8e0345a1b2139ba7adf0a83711a8c.jpg', 13),
(141, 'c2b4f95f899569fcfcdab3c70ba0621c.jpg', 13),
(142, '484ade29453127cf70164749e4ee0522.jpg', 13),
(143, '83b93051cf86e25cf6c9d80547107cf7.jpg', 13),
(144, 'f690bb718fc2604e1c41bbe6d21fe9a1.jpg', 13),
(145, '6859ddb5fe8059f04820ec7c404d2a69.jpg', 13),
(146, 'b0344b0f7d6bb23c66f20c4b107654d7.jpg', 13),
(147, '73ac7ea59cd5a935eb6a583e03965638.jpg', 13);

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
(1, 'Super', 11, 2),
(2, 'Moyen', 8, 2),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `publicites`
--

INSERT INTO `publicites` (`id`, `nom`, `image`, `lien`, `mailAnnonceur`, `indice`, `active`) VALUES
(1, 'Jane Doe', 'pub1.jpg', 'http://loremipsum.com', 'wavelet.alexandre@gmail.com', 10, 1),
(2, 'yolo ohÃ©', 'pub2.jpg', 'http://yolo.com', 'yolo@yolo.com', 40, 1),
(3, 'Lorem ipsum', 'pub3.jpg', 'http://lorempixel.com', 'lorem@ipsum.com', 50, 1),
(4, 'Zoo de Fort Mardyck', 'pub4.jpg', 'http://okay.com', 'zoo@fm.com', 15, 1),
(5, 'Dolor sit amet', 'pub5.jpg', 'http://lipsum.com', 'wavelet.alexandre@gmail.com', 20, 0);

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
(2, 'Comment trouvez-vous le site?', 1, 8),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

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
(79, '127.0.0.1', 12, 5),
(80, '127.0.0.1', 2, 2),
(81, '127.0.0.1', 1, 2),
(82, '127.0.0.1', 1, 2),
(83, '127.0.0.1', 1, 2);

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
(8, 'Premier sondage', 23, '2014-03-28', 1),
(9, 'Sondage de fifou', 20, '2014-03-28', 0);

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
