-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : sql8614.phpnet.org:3306
-- Généré le : mer. 10 fév. 2021 à 10:40
-- Version du serveur :  10.3.25-MariaDB-1:10.3.25+maria~stretch-log
-- Version de PHP : 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web2020kieran`
--

-- --------------------------------------------------------

--
-- Structure de la table `apellation`
--

CREATE TABLE `apellation` (
  `idapellation` int(10) UNSIGNED NOT NULL,
  `apellationcol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

CREATE TABLE `conditionnement` (
  `idconditionnement` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Liste des conditionnements possibles'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tarifs_vins` (
  `idtarifsvin` int(11) NOT NULL,
  `date_debut_validite` date NOT NULL,
  `date_fin_validite` date NOT NULL,
  `conditionnement_idcontenants` int(11) NOT NULL,
  `prix` decimal(6,2) UNSIGNED NOT NULL,
  `vins_idvins` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `idtypes` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'doudou'),
(2, 'formateur', 'CF2M');

-- --------------------------------------------------------

--
-- Structure de la table `vincomplet`
--

CREATE TABLE `vincomplet` (
  `vinNom` varchar(100) NOT NULL DEFAULT 'Chateau-Peyrines',
  `annee` year(4) NOT NULL,
  `typeNom` varchar(45) NOT NULL,
  `apellationcol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vins`
--

CREATE TABLE `vins` (
  `idvins` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL DEFAULT 'Chateau-Peyrines',
  `annee` year(4) NOT NULL,
  `apellation_idapellation` int(10) UNSIGNED NOT NULL,
  `types_idtypes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vins`
--

INSERT INTO `vins` (`idvins`, `nom`, `annee`, `apellation_idapellation`, `types_idtypes`) VALUES
(1, 'Chateau-Peyrines', 2019, 3, 1),
(2, 'Chateau-Peyrines', 2017, 4, 4),
(4, 'Chateau-Peyrines', 2020, 8, 5),
(5, 'Chateau-Peyrines', 2012, 7, 2),
(6, 'Chateau-Peyrines', 2014, 7, 2),
(7, 'Chateau-Peyrines', 2015, 7, 2),
(8, 'Chateau-Peyrines', 2016, 8, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apellation`
--
ALTER TABLE `apellation`
  ADD PRIMARY KEY (`idapellation`),
  ADD UNIQUE KEY `apellationcol_UNIQUE` (`apellationcol`);

--
-- Index pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  ADD PRIMARY KEY (`idconditionnement`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`);

--
-- Index pour la table `tarifs_vins`
--
ALTER TABLE `tarifs_vins`
  ADD PRIMARY KEY (`idtarifsvin`),
  ADD KEY `fk_tarifsvin_conditionnement1_idx` (`conditionnement_idcontenants`),
  ADD KEY `fk_tarifs-vins_vins1_idx` (`vins_idvins`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`idtypes`),
  ADD UNIQUE KEY `typescol_UNIQUE` (`nom`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vins`
--
ALTER TABLE `vins`
  ADD PRIMARY KEY (`idvins`),
  ADD UNIQUE KEY `idvins_UNIQUE` (`idvins`),
  ADD KEY `fk_vins_apellation1_idx` (`apellation_idapellation`),
  ADD KEY `fk_vins_types1_idx` (`types_idtypes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apellation`
--
ALTER TABLE `apellation`
  MODIFY `idapellation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `conditionnement`
--
ALTER TABLE `conditionnement`
  MODIFY `idconditionnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `tarifs_vins`
--
ALTER TABLE `tarifs_vins`
  MODIFY `idtarifsvin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `idtypes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vins`
--
ALTER TABLE `vins`
  MODIFY `idvins` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
