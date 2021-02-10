-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 oct. 2020 à 10:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la vue `vincomplet`
--
DROP TABLE IF EXISTS `vincomplet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vincomplet`  AS  select `vins`.`nom` AS `vinNom`,`vins`.`annee` AS `annee`,`types`.`nom` AS `typeNom`,`apellation`.`apellationcol` AS `apellationcol` from ((`vins` join `types` on(`types`.`idtypes` = `vins`.`types_idtypes`)) join `apellation` on(`apellation`.`idapellation` = `vins`.`apellation_idapellation`)) ;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
