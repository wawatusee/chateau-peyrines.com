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