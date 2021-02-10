<?php
function selectTarifsVins($database) {
    /*Prix de chaque vin selon conditionnement*/
	$sql = "SELECT vins.nom as chateau,
	vins.idvins as id_vin,
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
   LEFT JOIN types
   ON vins.types_idtypes=types.idtypes
   LEFT JOIN conditionnement
   ON tarifs_vins.conditionnement_idcontenants=conditionnement.idconditionnement
   ORDER by apellation.apellationcol DESC, prix_unitaire DESC";
	
    $result = mysqli_query($database, $sql);
	// Conditionnement des données issues de la requète dans un tableau associatif
	if($result) {
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $data;
	} else {
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
}
?>
<?php
//Crée un vin par envoi de requète à la base de données.
// En parametre $database(la DB), vin_anne(number), vin_appelation_id(number), vin_type_id(number) .
function createVine($database,$vin_anne,$vin_appelation_id,$vin_type_id){
    $sql="INSERT INTO vins (idvins, nom, annee, apellation_idapellation, types_idtypes)
    VALUES (NULL, 'Chateau-Peyrines', $vin_anne, $vin_appelation_id, $vin_type_id)";
        $request = mysqli_query($database,$sql);
        // Retourne vrai si il est créé, retourne faux si echec.
        return ($request)?true:false;
}
?>
<?php 
//Efface un vin de la table vin
//En paramêtre $database(la DB), $vin_id(id du vin à supprimer)
function deleteVine($database, $vin_id){
    $sql="DELETE FROM vins WHERE idarticles=$vin_id";
    // Retourne vrai si il est effacé, retourne faux si echec.
    return (mysqli_query($database,$sql))? true : false;
}
?>