-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 08 nov. 2020 à 00:08
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catalogue_ventes_vins`
--

-- --------------------------------------------------------

--
-- Structure de la table `apellation`
--

DROP TABLE IF EXISTS `apellation`;
CREATE TABLE IF NOT EXISTS `apellation` (
  `idapellation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apellationcol` varchar(200) NOT NULL,
  PRIMARY KEY (`idapellation`),
  UNIQUE KEY `apellationcol_UNIQUE` (`apellationcol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `apellation`
--

INSERT INTO `apellation` (`idapellation`, `apellationcol`) VALUES
(8, 'A.O.C Bordeaux'),
(7, 'A.O.C Bordeaux Supérieur'),
(2, 'Bordeaux'),
(4, 'Bordeaux Haut Benauge'),
(3, 'Entre-deux-Mers Bordeaux Haut Benauge'),
(6, 'Méthode traditionnelle');

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

DROP TABLE IF EXISTS `conditionnement`;
CREATE TABLE IF NOT EXISTS `conditionnement` (
  `idconditionnement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Liste des conditionnements possibles',
  PRIMARY KEY (`idconditionnement`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conditionnement`
--

INSERT INTO `conditionnement` (`idconditionnement`, `nom`) VALUES
(5, '120 btl et +'),
(3, '36 btl et +'),
(4, '60 btl et +'),
(2, 'Btl 75cl'),
(14, 'Cubitainer de 22 litres'),
(6, 'Cubitainer de 22 litres par 1 ou 2 colis'),
(8, 'Cubitainer de 22 litres par 3 colis et +'),
(7, 'Fontaine de  20 litres par 1 ou 2 colis'),
(12, 'Fontaine de 10 litres'),
(13, 'Fontaine de 20 litres'),
(9, 'Fontaine de 20 litres par 3 colis et +'),
(11, 'Fontaine de 5 litres '),
(10, 'Magnum 150 cl');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_vins`
--

DROP TABLE IF EXISTS `tarifs_vins`;
CREATE TABLE IF NOT EXISTS `tarifs_vins` (
  `idtarifsvin` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut_validite` date NOT NULL,
  `date_fin_validite` date NOT NULL,
  `conditionnement_idcontenants` int(11) NOT NULL,
  `prix` decimal(6,2) UNSIGNED NOT NULL,
  `vins_idvins` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idtarifsvin`),
  KEY `fk_tarifsvin_conditionnement1_idx` (`conditionnement_idcontenants`),
  KEY `fk_tarifs-vins_vins1_idx` (`vins_idvins`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tarifs_vins`
--

INSERT INTO `tarifs_vins` (`idtarifsvin`, `date_debut_validite`, `date_fin_validite`, `conditionnement_idcontenants`, `prix`, `vins_idvins`) VALUES
(1, '2020-10-01', '2021-11-01', 3, '7.70', 1),
(2, '2020-10-01', '2021-11-01', 4, '7.40', 1),
(3, '2020-10-01', '2021-11-01', 5, '7.20', 1),
(4, '2020-10-01', '2021-11-01', 2, '6.30', 1),
(5, '2020-10-31', '2021-11-01', 3, '8.10', 2),
(6, '2020-10-01', '2021-09-30', 4, '7.80', 2),
(7, '2020-10-01', '2021-09-30', 5, '7.60', 2);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `tarif_vins_view`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `tarif_vins_view`;
CREATE TABLE IF NOT EXISTS `tarif_vins_view` (
`chateau` varchar(100)
,`couleur` varchar(45)
,`annee` year(4)
,`apellationcol` varchar(200)
,`remise` varchar(100)
,`prix_unitaire` decimal(6,2) unsigned
);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `idtypes` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`idtypes`),
  UNIQUE KEY `typescol_UNIQUE` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`idtypes`, `nom`) VALUES
(4, 'Blanc Moelleux'),
(1, 'Blanc sec'),
(6, 'Les Bulles de Peyrines'),
(5, 'Rosé'),
(2, 'Rouge');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vincomplet`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `vincomplet`;
CREATE TABLE IF NOT EXISTS `vincomplet` (
`vinNom` varchar(100)
,`annee` year(4)
,`typeNom` varchar(45)
,`apellationcol` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure de la table `vins`
--

DROP TABLE IF EXISTS `vins`;
CREATE TABLE IF NOT EXISTS `vins` (
  `idvins` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL DEFAULT 'Chateau-Peyrines',
  `annee` year(4) NOT NULL,
  `apellation_idapellation` int(10) UNSIGNED NOT NULL,
  `types_idtypes` int(11) NOT NULL,
  PRIMARY KEY (`idvins`),
  UNIQUE KEY `idvins_UNIQUE` (`idvins`),
  KEY `fk_vins_apellation1_idx` (`apellation_idapellation`),
  KEY `fk_vins_types1_idx` (`types_idtypes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idvins`, `nom`, `annee`, `apellation_idapellation`, `types_idtypes`) VALUES
(1, 'Chateau-Peyrines', 2019, 3, 1),
(2, 'Chateau-Peyrines', 2017, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la vue `tarif_vins_view` exportée comme une table
--
DROP TABLE IF EXISTS `tarif_vins_view`;
CREATE TABLE IF NOT EXISTS `tarif_vins_view`(
    `chateau` varchar(100) COLLATE utf8_general_ci NOT NULL DEFAULT 'Chateau-Peyrines',
    `couleur` varchar(45) COLLATE utf8_general_ci DEFAULT NULL,
    `annee` year(4) NOT NULL,
    `apellationcol` varchar(200) COLLATE utf8_general_ci DEFAULT NULL,
    `remise` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT 'Liste des conditionnements possibles',
    `prix_unitaire` decimal(6,2) unsigned DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Structure de la vue `vincomplet` exportée comme une table
--
DROP TABLE IF EXISTS `vincomplet`;
CREATE TABLE IF NOT EXISTS `vincomplet`(
    `vinNom` varchar(100) COLLATE utf8_general_ci NOT NULL DEFAULT 'Chateau-Peyrines',
    `annee` year(4) NOT NULL,
    `typeNom` varchar(45) COLLATE utf8_general_ci NOT NULL,
    `apellationcol` varchar(200) COLLATE utf8_general_ci NOT NULL
);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tarifs_vins`
--
ALTER TABLE `tarifs_vins`
  ADD CONSTRAINT `fk_tarifs-vins_vins1` FOREIGN KEY (`vins_idvins`) REFERENCES `vins` (`idvins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarifsvin_conditionnement1` FOREIGN KEY (`conditionnement_idcontenants`) REFERENCES `conditionnement` (`idconditionnement`);

--
-- Contraintes pour la table `vins`
--
ALTER TABLE `vins`
  ADD CONSTRAINT `fk_vins_apellation1` FOREIGN KEY (`apellation_idapellation`) REFERENCES `apellation` (`idapellation`),
  ADD CONSTRAINT `fk_vins_types1` FOREIGN KEY (`types_idtypes`) REFERENCES `types` (`idtypes`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
