-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 oct. 2020 à 10:38
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

--
-- Déchargement des données de la table `conditionnement`
--

INSERT INTO `conditionnement` (`idconditionnement`, `nom`) VALUES
(5, '120 bouteilles et +'),
(3, '36 bouteilles et +'),
(4, '60 bouteilles et +'),
(2, 'Bouteille 75cl'),
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
(4, '2020-10-01', '2021-11-01', 2, '6.30', 1);

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
(1, 'Chateau-Peyrines', 2019, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la vue `vincomplet`
--
DROP TABLE IF EXISTS `vincomplet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vincomplet`  AS  select `vins`.`nom` AS `vinNom`,`vins`.`annee` AS `annee`,`types`.`nom` AS `typeNom`,`apellation`.`apellationcol` AS `apellationcol` from ((`vins` join `types` on(`types`.`idtypes` = `vins`.`types_idtypes`)) join `apellation` on(`apellation`.`idapellation` = `vins`.`apellation_idapellation`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
