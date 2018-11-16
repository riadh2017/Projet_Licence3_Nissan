-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 17 Juin 2015 à 11:23
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `nissan`
--

-- --------------------------------------------------------

--
-- Structure de la table `bon_livraison`
--

CREATE TABLE IF NOT EXISTS `bon_livraison` (
  `id_bon_livraison` int(11) NOT NULL AUTO_INCREMENT,
  `date_livraison` date NOT NULL,
  `delivrais_adrese` varchar(50) NOT NULL,
  `ccp` varchar(50) NOT NULL,
  `numero_bon` varchar(15) NOT NULL,
  `id_command` int(11) NOT NULL,
  `code_facteur` varchar(50) NOT NULL,
  `code_client` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bon_livraison`),
  KEY `id_command` (`id_command`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `bon_livraison`
--

INSERT INTO `bon_livraison` (`id_bon_livraison`, `date_livraison`, `delivrais_adrese`, `ccp`, `numero_bon`, `id_command`, `code_facteur`, `code_client`) VALUES
(1, '2015-06-04', '2015-06-06', 'code', '2/2015', 55, 'lef,al', 'fezjf'),
(2, '2015-06-04', '2015-06-04', '1234', '1/2015', 54, 'zgz', 'zrgt'),
(3, '2015-06-04', '', '1234', '1/2015', 54, 'zgz', 'zrgt'),
(4, '2015-06-04', '2015-06-05', '1234', '3/2015', 56, 'zgz', 'zrgt'),
(5, '2015-06-04', '', '1234', '6/2015', 59, 'zgz', 'zrgt'),
(6, '2015-06-05', '', 'dflmk,bqefknb', '4/2015', 57, 'zgz', 'zrgt'),
(7, '2015-06-05', '2015-06-05', 'dflmk,bqefknb', '5/2015', 58, 'zgz', 'zrgt'),
(8, '2015-06-05', '', '1234', '7/2015', 60, 'zgz', 'zrgt');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `tele` varchar(50) NOT NULL,
  `n_registre` varchar(50) NOT NULL,
  `matricul_fiscal` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_enregistre` date NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `tele`, `n_registre`, `matricul_fiscal`, `adresse`, `date_enregistre`) VALUES
(60, 'djurdjura02', '+210365895', '45', 'oo', 'sidi ahmed', '2015-06-01'),
(61, 'brahim', '0791437073', '84984', '541', 'sf,d', '2015-06-01'),
(62, 'boukir kamel', '0123456789', '8998', '123456', 'akbou', '2015-06-01'),
(64, 'brahim messaodi', '0791437073', '', '', 'okdgsogk', '0000-00-00'),
(65, 'boukir kamel', '0123456789', '', '', 'sf,d', '0000-00-00'),
(67, 'mourad', '0791437073', '84984', '541', 'akbou', '2015-06-02'),
(68, 'brahim messaodi', 'dbdhb', '', '', 'okdgsogk', '0000-00-00'),
(69, 'brahim messaodi', '0791437073feg', ' ', ' ', 'sf,d', '0000-00-00'),
(70, 'b', '0791437073', '', '', 'akbou', '0000-00-00'),
(71, 'boukir kamel', '0791437073', '', '', 'sf,d', '0000-00-00'),
(72, 'brahim messaodi', '01549546', '0235', '', 'akbou bejaia', '0000-00-00'),
(73, 'brahim', '0123456789', '84984', '654321', 'sf,d', '2015-06-02'),
(74, 'b', '0', '8998', '654321', 'sf,d', '2015-06-03'),
(75, 'boukir kamel', '0791437073', '159', '951', 'akbou', '0000-00-00'),
(76, 'brahim messaoudi abkou brzvhezij tkfa labnza', '0791437073', '', '', 'akbou', '0000-00-00'),
(77, 'brahim messaodi', '596', '', '', 'akbou', '0000-00-00'),
(78, 'mourag e', '0791437073', '84984', '541', 'akbou', '2015-06-03'),
(79, ' g', '0791437073', '', '', 'akbou', '0000-00-00'),
(80, ' brahim', '0791437073', '', '', 'akbou', '0000-00-00'),
(81, ' brahim messaoudi', '0791437073', '', '', 'akbou', '0000-00-00'),
(82, ' brahim messaoudi ', '0791437073', '', '', 'akbou', '0000-00-00'),
(83, ' brahim mes', '0791437073', '', '', 'akbou', '0000-00-00'),
(84, 'brahim', '0123456789', '', '', 'akbou', '0000-00-00'),
(85, 'brahim messaou', '0791437073', '', '', 'akbou', '0000-00-00'),
(86, ' ', '0791437073', '', '', 'akbou', '0000-00-00'),
(87, 'brahim messaodi', '0123456789', '', '', 'g ', '0000-00-00'),
(88, 'hamidouche brahim', '.0', '', '', 'b', '0000-00-00'),
(89, 'mourad messaoudi', '079143707', '951', '159', 'sidi ali', '2015-06-04'),
(90, 'brahim messaoudi ', '0123456789', '84984', '541', 'okdgsogk', '2015-06-04'),
(91, 'ALI', '0791437073', '8998', '123465', 'akbou', '2015-06-04'),
(92, 'boukir kamel', '0', '84984', '541', 'akbou', '2015-06-05'),
(93, 'brahim messaodi', '0123456789', '', '', 'okdgsogk', '0000-00-00'),
(94, 'samir', 'v', '', '', 'jjk', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE IF NOT EXISTS `command` (
  `date_command` date NOT NULL,
  `dalai_livraison` varchar(50) NOT NULL,
  `adresse_livraison` varchar(50) NOT NULL,
  `montat` varchar(50) NOT NULL,
  `mode_de_paymant` varchar(50) NOT NULL,
  `mode_de_vente` varchar(30) NOT NULL,
  `date_de_versement` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `montant_verser` int(15) NOT NULL,
  `numero_bon` varchar(12) NOT NULL,
  `id_command` int(12) NOT NULL AUTO_INCREMENT,
  `rest_a_payer` double NOT NULL,
  `etat_command` varchar(50) NOT NULL,
  `date_rec_algere` date NOT NULL,
  `stock` varchar(50) NOT NULL,
  PRIMARY KEY (`id_command`),
  KEY `id_client` (`id_client`),
  KEY `id_user` (`id_user`),
  KEY `id_command` (`numero_bon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `command`
--

INSERT INTO `command` (`date_command`, `dalai_livraison`, `adresse_livraison`, `montat`, `mode_de_paymant`, `mode_de_vente`, `date_de_versement`, `id_client`, `id_user`, `montant_verser`, `numero_bon`, `id_command`, `rest_a_payer`, `etat_command`, `date_rec_algere`, `stock`) VALUES
('2015-06-05', '15 jours', 'SARL DJURDJURA MOTORS', '45', 'espace', 'TTC', '2015-06-04', 89, 5, 0, '1/2015', 54, 733, 'facturitation', '2015-06-05', 'SARL djurdjura motors'),
('2015-06-04', '45 jours', 'SARL DJURDJURA MOTORS', '1245', 'cheque', 'TTC ENTREPRISE', '2015-06-06', 75, 5, 0, '2/2015', 55, 192507, 'Traitement dossier', '2015-06-06', 'SARL djurdjura motors'),
('2015-06-04', 'Arrivage + 45 jours', 'SARL DJURDJURA MOTORS', '45', 'cheque', 'TTC', '2015-06-13', 90, 5, 0, '3/2015', 56, 29999999, 'Traitement dossier', '2015-06-06', 'Nissan algerie'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '198670', 'versement banqaire', 'ANDI', '2015-06-20', 87, 5, 0, '4/2015', 57, 198670, 'Traitement dossier', '0000-00-00', 'Nissan algerie'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '19382', 'versement banqaire', 'CNAC', '2015-06-04', 65, 5, 0, '5/2015', 58, 19362, 'Traitement dossier', '2015-06-04', 'Nissan algerie'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1200', 'versement banqaire', 'TTC', '2015-06-04', 87, 7, 0, '6/2015', 59, 1200, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1200', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 87, 7, 0, '7/2015', 60, 1200, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1200', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 87, 7, 0, '8/2015', 61, 1200, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '500000000', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 91, 7, 0, '9/2015', 62, 500000000, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '500000000', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 91, 7, 0, '10/2015', 63, 500000000, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '500000000', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 91, 7, 0, '11/2015', 64, 500000000, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '500000000', 'versement banqaire', 'TTC', '2015-06-04', 91, 7, 0, '12/2015', 65, 500000000, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1888888', 'versement banqaire', 'ANSJ', '2015-06-04', 91, 7, 0, '13/2015', 66, 1888888, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1888888', 'versement banqaire', 'CNAC', '2015-06-04', 91, 7, 0, '14/2015', 67, 1888888, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '15000000', 'versement banqaire', 'HDD', '2015-06-04', 91, 7, 0, '15/2015', 68, 15000000, 'facturitation', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '99714.641025641', 'versement banqaire', 'LEASING', '2015-06-04', 87, 7, 0, '16/2015', 69, 99714.641025641, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '646', 'versement banqaire', 'HDD', '2015-06-04', 87, 7, 0, '17/2015', 70, 646, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-04', '15 jours', 'SARL DJURDJURA MOTORS', '1200', 'versement banqaire', 'TTC ENTREPRISE', '2015-06-04', 87, 7, 0, '18/2015', 71, 1200, 'Traitement dossier', '2015-06-04', 'SARL djurdjura motors'),
('2015-06-05', '15 jours', 'SARL DJURDJURA MOTORS', '230', 'versement banqaire', 'TTC', '2015-06-05', 92, 5, 0, '19/2015', 72, 230, '', '2015-06-05', 'SARL djurdjura motors');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE IF NOT EXISTS `couleur` (
  `id_couleur` int(11) NOT NULL AUTO_INCREMENT,
  `code_couleur` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_modele_veh` int(11) NOT NULL,
  PRIMARY KEY (`id_couleur`),
  KEY `id_mv` (`id_modele_veh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `couleur`
--

INSERT INTO `couleur` (`id_couleur`, `code_couleur`, `quantite`, `id_modele_veh`) VALUES
(6, 'blonc', 0, 1),
(9, 'noire', 1, 9),
(11, '', 0, 10),
(13, 'blue', 1, 11),
(15, 'blue', 2, 2),
(16, 'blue', 15, 12),
(18, '0', 1, 13),
(19, 'blue', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `facture_pro`
--

CREATE TABLE IF NOT EXISTS `facture_pro` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `date_facture` date NOT NULL,
  `validete_de_loffre` date NOT NULL,
  `montant` int(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `numero_fact` varchar(50) NOT NULL,
  `mode_de_vente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Contenu de la table `facture_pro`
--

INSERT INTO `facture_pro` (`id_facture`, `date_facture`, `validete_de_loffre`, `montant`, `id_client`, `numero_fact`, `mode_de_vente`) VALUES
(21, '2015-06-03', '2015-06-03', 460, 76, '2/2015', 'TTC ENTERPRISE'),
(40, '2015-06-04', '2015-06-03', 0, 87, '21/2015', 'TTC'),
(41, '2015-06-04', '2015-06-03', 0, 87, '22/2015', 'HDD'),
(42, '2015-06-04', '2015-06-03', 0, 87, '23/2015', 'ANSJ'),
(43, '2015-06-04', '2015-06-03', 230, 87, '24/2015', 'TTC'),
(44, '2015-06-04', '2015-06-03', 0, 87, '25/2015', 'LICENCE'),
(45, '2015-06-04', '2015-06-03', 3236, 87, '26/2015', 'ANDI'),
(46, '2015-06-04', '2015-06-03', 3310, 87, '27/2015', 'LEASING'),
(47, '2015-06-04', '2015-06-04', 500000000, 70, '28/2015', 'TTC'),
(48, '2015-06-04', '2015-06-04', 1888888, 70, '29/2015', 'ANSJ'),
(49, '2015-06-04', '2015-06-04', 15000000, 70, '30/2015', 'HDD'),
(50, '2015-06-04', '2015-06-04', 1888888, 70, '31/2015', 'ANSJ'),
(52, '2015-06-04', '2015-06-04', 230, 75, '32/2015', 'TTC ENTERPRISE'),
(53, '2015-06-04', '2015-06-04', 0, 75, '33/2015', 'TTC'),
(54, '2015-06-04', '2015-06-04', 2400, 76, '34/2015', 'TTC'),
(55, '2015-06-04', '2015-06-04', 2400, 76, '35/2015', 'TTC ENTERPRISE'),
(56, '2015-06-04', '2015-06-04', 198670, 76, '36/2015', 'ANSJ'),
(57, '2015-06-04', '2015-06-04', 198670, 76, '37/2015', 'CNAC'),
(58, '2015-06-04', '2015-06-04', 1292, 76, '38/2015', 'HDD'),
(59, '2015-06-04', '2015-06-04', 0, 76, '38/2015', 'TTC'),
(60, '2015-06-06', '2015-06-06', 2400, 93, '39/2015', 'TTC'),
(61, '2015-06-04', '2015-05-28', 2400, 94, '40/2015', 'TTC ENTERPRISE');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(250) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_command` int(12) NOT NULL,
  `id_modele_veh` int(11) NOT NULL,
  `prix_selon_bon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_command` (`id_command`),
  KEY `id_modele_veh` (`id_modele_veh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id_item`, `designation`, `couleur`, `quantite`, `id_command`, `id_modele_veh`, `prix_selon_bon`) VALUES
(76, 'JUK 1.6e', 'blue', 1, 57, 3, '99335'),
(77, 'JUK 1.6e', 'blonc', 1, 57, 3, '99335'),
(78, 'micra vidiz+', 'blonc', 1, 58, 1, '9691'),
(79, 'micra vidiz+', 'blue', 1, 58, 1, '9691'),
(80, 'JUK 1.6e', 'blue', 1, 59, 3, '1200'),
(81, 'JUK 1.6e', 'blue', 1, 60, 3, '1200'),
(82, 'JUK 1.6e', 'blue', 1, 61, 3, '1200'),
(83, 'PATHFINDER takfa', 'blue', 1, 62, 4, '500000000'),
(84, 'PATHFINDER takfa', 'blue', 1, 63, 4, '500000000'),
(85, 'PATHFINDER takfa', 'blue', 1, 64, 4, '500000000'),
(86, 'PATHFINDER takfa', 'blue', 1, 65, 4, '500000000'),
(87, 'PATHFINDER takfa', 'blue', 1, 66, 4, '1888888'),
(88, 'PATHFINDER takfa', 'blue', 1, 67, 4, '1888888'),
(89, 'PATHFINDER takfa', 'blue', 1, 68, 4, '15000000'),
(90, 'JUK 1.6e', 'blue', 1, 69, 3, '99714.641025641'),
(91, 'JUK 1.6e', 'blue', 1, 70, 3, '646'),
(92, 'JUK 1.6e', 'blue', 1, 71, 3, '1200'),
(94, 'micra vidiz+', 'blonc', 1, 54, 1, '45'),
(95, 'QachQai 1.5e cinta', 'blue', 1, 72, 2, '230'),
(97, 'micra vidiz+', 'blonc', 1, 56, 1, '45'),
(98, 'micra vidiz+', 'blonc', 1, 55, 1, '1245');

-- --------------------------------------------------------

--
-- Structure de la table `iteme_facture`
--

CREATE TABLE IF NOT EXISTS `iteme_facture` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `prix_selon_facture` int(11) NOT NULL,
  `id_modele_veh` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_facture` (`id_facture`),
  KEY `id_modele_veh` (`id_modele_veh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Contenu de la table `iteme_facture`
--

INSERT INTO `iteme_facture` (`id_item`, `designation`, `couleur`, `quantite`, `id_facture`, `prix_selon_facture`, `id_modele_veh`) VALUES
(38, 'QachQai 1.5e cinta', 'blonc', 2, 21, 460, 2),
(84, 'QachQai 1.5e cinta', 'blonc', 1, 43, 230, 2),
(86, 'QachQai 1.5e cinta', 'blonc', 1, 45, 3236, 2),
(87, 'QachQai 1.5e cinta', 'blonc', 1, 46, 3310, 2),
(88, 'PATHFINDER takfa', 'noire', 3, 47, 500000000, 4),
(89, 'PATHFINDER takfa', 'noire', 1, 48, 1888888, 4),
(90, 'PATHFINDER takfa', 'noire', 1, 49, 15000000, 4),
(91, 'PATHFINDER takfa', 'noire', 1, 50, 1888888, 4),
(102, 'micra vidiz+', 'blonc', 0, 44, 0, 1),
(126, 'micra vidiz+', 'blonc', 0, 42, 0, 1),
(127, 'QachQai 1.5e cinta', 'noire', 1, 52, 230, 2),
(131, 'JUK 1.6e', 'blue', 2, 54, 2400, 3),
(132, 'JUK 1.6e', 'blue', 2, 55, 2400, 3),
(133, 'JUK 1.6e', 'blue', 2, 56, 198670, 3),
(134, 'JUK 1.6e', 'blue', 2, 57, 198670, 3),
(135, 'JUK 1.6e', 'blue', 2, 58, 1292, 3),
(142, 'micra vidiz+', 'blonc', 0, 41, 0, 1),
(145, 'micra vidiz+', 'blonc', 0, 53, 0, 1),
(146, 'micra vidiz+', 'blonc', 0, 40, 0, 1),
(147, 'JUK 1.6e', 'noire', 2, 60, 2400, 3),
(148, 'micra vidiz+', 'blonc', 2, 61, 2400, 1),
(149, 'micra vidiz+', 'blonc', 0, 59, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matricul_chassis`
--

CREATE TABLE IF NOT EXISTS `matricul_chassis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricul` varchar(50) NOT NULL,
  `chassis` varchar(50) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `matricul_chassis`
--

INSERT INTO `matricul_chassis` (`id`, `matricul`, `chassis`, `id_item`) VALUES
(3, 'khkjh', '123', 94),
(6, '123', 'kkk', 80),
(7, 'ddd', 'ss', 77),
(8, 'khkjh', '123', 79),
(9, '123', 'kkk', 81),
(10, 'vdv', 'fqf', 76),
(11, 'br', 'br', 77);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_messagerie` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(250) NOT NULL,
  `id_lexpiditeur` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `date_message` date NOT NULL,
  PRIMARY KEY (`id_messagerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id_messagerie`, `message`, `id_lexpiditeur`, `id_recepteur`, `date_message`) VALUES
(6, '    gggggggg', 1, 1, '2015-05-28'),
(7, '    hhhh', 1, 3, '2015-05-28'),
(8, '    nnn', 1, 1, '2015-05-28'),
(9, '    hhhhhhhhhhhhhhh', 1, 1, '2015-05-28'),
(10, '    ioojojojojo^pj^pj^j', 1, 1, '2015-06-01'),
(11, '    rzgsg', 1, 7, '2015-06-02'),
(12, '    rzgsg', 1, 7, '2015-06-02'),
(13, '    ', 1, 5, '2015-06-06');

-- --------------------------------------------------------

--
-- Structure de la table `modele_veh`
--

CREATE TABLE IF NOT EXISTS `modele_veh` (
  `id_modele_veh` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(50) NOT NULL,
  `TTC` int(11) NOT NULL,
  `quantite_stok` int(11) NOT NULL,
  `HT_HDD` int(11) NOT NULL,
  `HT_DDM` int(11) NOT NULL,
  `TIMBRE` int(11) NOT NULL,
  `REMISE` int(11) NOT NULL,
  PRIMARY KEY (`id_modele_veh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `modele_veh`
--

INSERT INTO `modele_veh` (`id_modele_veh`, `designation`, `TTC`, `quantite_stok`, `HT_HDD`, `HT_DDM`, `TIMBRE`, `REMISE`) VALUES
(1, 'micra vidiz+', 1200, 10, 454, 9646, 45, 4),
(2, 'QachQai 1.5e cinta', 230, 2, 123, 125, 3113, 1400),
(3, 'JUK 1.6e', 1200, 10, 646, 646, 98689, 646),
(4, 'PATHFINDER takfa', 500000000, 2, 15000000, 1888888, 0, 0),
(6, 'SUNNY takna', 5000, 54, 0, 0, 0, 0),
(9, 'micra', 800, 0, 180, 8, 700, 1),
(10, 'benz mer', 800, 0, 1800, 8552, 700, 1),
(11, 'b', 800, 0, 700, 8552, 700, 55),
(12, 'ttt', 15555555, 0, 15000000, 2147483647, 0, 0),
(13, 'izan', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mode_de_vente`
--

CREATE TABLE IF NOT EXISTS `mode_de_vente` (
  `id_mv` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `recu_verssement`
--

CREATE TABLE IF NOT EXISTS `recu_verssement` (
  `id_rv` int(11) NOT NULL AUTO_INCREMENT,
  `date_de_verssement` date NOT NULL,
  `rest_payer` double NOT NULL,
  `id_command` int(11) NOT NULL,
  `versement` double NOT NULL,
  PRIMARY KEY (`id_rv`),
  KEY `id_command` (`id_command`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `recu_verssement`
--

INSERT INTO `recu_verssement` (`id_rv`, `date_de_verssement`, `rest_payer`, `id_command`, `versement`) VALUES
(27, '2015-06-04', 743, 54, 12),
(28, '2015-06-04', 198511, 55, 159),
(29, '2015-06-04', 198507, 55, 4),
(30, '2015-06-04', 741, 54, 2),
(31, '2015-06-04', 739, 54, 2),
(32, '2015-06-04', 736, 54, 3),
(33, '2015-06-06', 192507, 55, 6000),
(34, '2015-06-05', 733, 54, 3),
(35, '2015-06-05', 29999999, 56, 1),
(36, '2015-06-19', 19362, 58, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `login`, `mot_de_passe`, `role`) VALUES
(5, 'takfa', 'm', '10', '10', 'commercial'),
(7, 'takfa', 'mourad', '1', '11', 'chef de vente');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bon_livraison`
--
ALTER TABLE `bon_livraison`
  ADD CONSTRAINT `bon_livraison_ibfk_1` FOREIGN KEY (`id_command`) REFERENCES `command` (`id_command`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `command_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `command_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD CONSTRAINT `couleur_ibfk_1` FOREIGN KEY (`id_modele_veh`) REFERENCES `modele_veh` (`id_modele_veh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture_pro`
--
ALTER TABLE `facture_pro`
  ADD CONSTRAINT `facture_pro_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`id_command`) REFERENCES `command` (`id_command`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`id_modele_veh`) REFERENCES `modele_veh` (`id_modele_veh`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `iteme_facture`
--
ALTER TABLE `iteme_facture`
  ADD CONSTRAINT `iteme_facture_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `facture_pro` (`id_facture`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iteme_facture_ibfk_2` FOREIGN KEY (`id_modele_veh`) REFERENCES `modele_veh` (`id_modele_veh`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `matricul_chassis`
--
ALTER TABLE `matricul_chassis`
  ADD CONSTRAINT `matricul_chassis_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recu_verssement`
--
ALTER TABLE `recu_verssement`
  ADD CONSTRAINT `recu_verssement_ibfk_1` FOREIGN KEY (`id_command`) REFERENCES `command` (`id_command`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
