<?php
//Crée un vin par envoi de requète à la base de données.
// En parametre $database(la DB), vin_anne(number), vin_appelation_id(number), vin_type_id(number) .
function createVine($database,$vin_annee,$vin_appelation_id,$vin_type_id){
    $sql="INSERT INTO vins (annee, apellation_idapellation, types_idtypes)
    VALUES (?, ?, ?)";
        $prepare=$database->prepare($sql);
        $prepare->bindValue(1,$vin_annee,PDO::PARAM_INT);
        $prepare->bindValue(2,$vin_appelation_id,PDO::PARAM_INT);
        $prepare->bindValue(3,$vin_type_id,PDO::PARAM_INT);
        $prepare->execute();
        return ($prepare);
}

//Efface un vin de la table vin
//En paramêtre $database(la DB), $vin_id(id du vin à supprimer)
function deleteVine($database, $vin_id){
    $sql="DELETE FROM vins WHERE idarticles=$vin_id";
    // Retourne vrai si il est effacé, retourne faux si echec.
    return (mysqli_query($database,$sql))? true : false;
}
////////////////////////////////////////////
//GROUPE DE FONCTIONS POUR LES FORMULAIRES//
function getApellationList($connection){
    //Renvoie les apellations existantes
    $sql="SELECT * FROM `apellation`";
    $result=$connection->query($sql);
	// Conditionnement des données issues de la requète dans un tableau associatif
	if($result->rowCount()) {
        $data = $result->fetchAll(PDO::FETCH_OBJ);
		return $data;
	} else {
        //Kieran c'est quoi cette daube pourquoi on trouve mysqli_error avec du PDO?
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
};
function getTypesList($connection){
    //Renvoie les types de vins existants
    $sql="SELECT * FROM `types`";
    $result=$connection->query($sql);
	// Conditionnement des données issues de la requète dans un tableau associatif
	if($result->rowCount()) {
        $data = $result->fetchAll(PDO::FETCH_OBJ);
		return $data;
	} else {
        //Kieran c'est quoi cette daube pourquoi on trouve mysqli_error avec du PDO?
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
};

function selectAllVines($connection){
//Renvoie les vins existants avec tous les champs en clair
    $sql="SELECT vins.idvins, vins.annee as cuvee,types.nom as couleur,apellation.apellationcol as nomapellation
    FROM `vins` 
    LEFT JOIN apellation ON vins.apellation_idapellation=apellation.idapellation 
    LEFT JOIN types ON vins.types_idtypes=types.idtypes ";
    $result=$connection->query($sql);
	// Conditionnement des données issues de la requète dans un tableau associatif
	if($result->rowCount()) {
        $data = $result->fetchAll(PDO::FETCH_OBJ);
		return $data;
	} else {
        //Kieran c'est quoi cette daube pourquoi on trouve mysqli_error avec du PDO?
		return "La sélection a échouée: " . mysqli_error($database) . "<br>";
	}
};



