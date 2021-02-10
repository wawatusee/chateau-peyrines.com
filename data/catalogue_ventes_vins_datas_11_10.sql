-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 nov. 2020 à 10:54
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

--
-- Déchargement des données de la table `apellation`
--

INSERT INTO `apellation` (`idapellation`, `apellationcol`) VALUES
(8, 'A.O.C Bordeaux'),
(4, 'A.O.C Bordeaux Haut Benauge'),
(7, 'A.O.C Bordeaux Supérieur'),
(3, 'A.O.C Entre-deux-Mers Bordeaux Haut Benauge'),
(2, 'Bordeaux'),
(6, 'Méthode traditionnelle');

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
(7, '2020-10-01', '2021-09-30', 5, '7.60', 2),
(8, '2020-09-30', '2020-10-01', 3, '7.70', 3),
(9, '2020-09-30', '2020-10-01', 4, '7.40', 3),
(10, '2020-09-30', '2021-10-01', 5, '7.20', 3),
(11, '2020-09-30', '2021-10-01', 3, '11.10', 5),
(12, '2020-09-30', '2021-10-01', 4, '10.80', 5),
(13, '2020-09-30', '2021-10-01', 5, '10.60', 5);

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`idtypes`, `nom`) VALUES
(4, 'Blanc Moelleux'),
(1, 'Blanc sec'),
(6, 'Les Bulles de Peyrines'),
(5, 'Rosé'),
(2, 'Rouge');

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idvins`, `nom`, `annee`, `apellation_idapellation`, `types_idtypes`) VALUES
(1, 'Chateau-Peyrines', 2019, 3, 1),
(2, 'Chateau-Peyrines', 2017, 4, 4),
(3, 'Chateau-Peyrines', 2020, 8, 5),
(5, 'Chateau-Peyrines', 2020, 6, 6);

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
