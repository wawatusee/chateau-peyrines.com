/*Prix de chaque vin selon conditionnement*/
SELECT vins.nom as chateau,
 types.nom as couleur,
 annee,
 apellation.apellationcol,
 conditionnement.nom as remise,
 tarifs_vins.prix as prix_unitaire
 from  vins
LEFT JOIN tarifs_vins
ON vins.idvins=tarifs_vins.vins_idvins
 LEFT JOIN apellation
ON vins.apellation_idapellation=apellation.idapellation
left JOIN types
ON vins.types_idtypes=types.idtypes
LEFT JOIN conditionnement
ON tarifs_vins.conditionnement_idcontenants=conditionnement.idconditionnement
/*Si on ne veut que les commandes on ajoute :
   WHERE conditionnement.nom='36 btl et +'OR conditionnement.nom='60 btl et +'OR conditionnement.nom='120 btl et +'";
Mais on va tenter de trier ça en PHP d'abord puis en js serait idéal*/

/*Ajout d'un vin*/
INSERT INTO vins (idvins, nom, annee, apellation_idapellation, types_idtypes)
 VALUES (NULL, 'Chateau-Peyrines', '2017', '4', '4');
 
 /*ajout d'un tarif*/
 INSERT INTO `tarifs_vins` (`idtarifsvin`, `date_debut_validite`, `date_fin_validite`, `conditionnement_idcontenants`, `prix`, `vins_idvins`) 
 VALUES (NULL, '2020-10-31', '2021-11-01', '3', '8.10', '2');
 
 /*Creation d'une vue avec tous les tarifs existant*/
 CREATE VIEW tarifs_vins_view
AS
SELECT
    `vins`.`nom` AS `chateau`,
    `types`.`nom` AS `couleur`,
    `vins`.`annee` AS `annee`,
    `apellation`.`apellationcol` AS `apellationcol`,
    `conditionnement`.`nom` AS `remise`,
    `tarifs_vins`.`prix` AS `prix_unitaire`
FROM
    (
        (
            (
                (
                    `vins`
                LEFT JOIN `tarifs_vins` ON(
                        `vins`.`idvins` = `tarifs_vins`.`vins_idvins`
                    )
                )
            LEFT JOIN `apellation` ON(
                    `vins`.`apellation_idapellation` = `apellation`.`idapellation`
                )
            )
        LEFT JOIN `types` ON(
                `vins`.`types_idtypes` = `types`.`idtypes`
            )
        )
    LEFT JOIN `conditionnement` ON(
            `tarifs_vins`.`conditionnement_idcontenants` = `conditionnement`.`idconditionnement`
        )
    )