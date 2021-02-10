<?php
//Crée un nouveau tarif correspondant à un vin  et à un contenant existant dans la table tarif
//En paramètres les dates de validité de ce nouveau tarif(ferment l'année comptable courante),
function createTarif($connection,$date_debut_validite,$date_fin_validite,$conditionnement_idcontenants,$prix,$vins_idvins){
    $sql="INSERT INTO tarifs_vins (date_debut_validite, date_fin_validite, conditionnement_idcontenants, prix, vins_idvins)
    VALUES (?,?,?,?,?);";
        // on prépare la requête
        $prepare = $connection->prepare($sql);
        $prepare->bindVAlue(1,$date_debut_validite,PDO::PARAM_STR);
        $prepare->bindVAlue(2,$date_fin_validite,PDO::PARAM_STR);
        $prepare->bindVAlue(3,$conditionnement_idcontenants,PDO::PARAM_INT);
        $prepare->bindVAlue(4,$prix,PDO::PARAM_STR);
        $prepare->bindVAlue(5,$vins_idvins,PDO::PARAM_INT);
        //Executons la requete
        $exec=$prepare->execute();
        if(!$exec){var_dump($prepare->errorInfo());
         echo $date_debut_validite;
      };
        return ($prepare);
};
function updateTarif($connection, $dateDebut,$dateFin,$tarif,$id){
   $sql="UPDATE tarifs_vins SET date_debut_validite=?, date_fin_validite=?, prix=? WHERE idtarifsvin=?";
   $prepare = $connection->prepare($sql);
   $prepare->execute([$dateDebut,$dateFin,$tarif,$id]);
   return $prepare;
}
function deleteTarif($connection, $idtarifsvin){
    $sql="DELETE FROM tarifs_vins WHERE idtarifsvin=:vinTarifId";
    $prepare=$connection->prepare($sql);
    $prepare->bindParam(':vinTarifId',$idtarifsvin,PDO::PARAM_INT);
    $exec=$prepare->execute();
    //if(!$exec){var_dump($prepare->errorInfo());};
    return ($exec);
}
$a_tarifs=selectAllTarifs($connection);
function selectAllTarifs($connection) {
    /*Prix de chaque vin triés par id de vins puis selon conditionnement*/
	$sql = "SELECT  vins.idvins,
    vins.annee,
    vins.types_idtypes as idTypes,
    types.nom as couleur,
    apellation.apellationcol as nomApellation,
    tarifs_vins.date_debut_validite,
    tarifs_vins.date_fin_validite,
    tarifs_vins.conditionnement_idcontenants as idRemise,
    tarifs_vins.idtarifsvin as idTarif,
    conditionnement.nom as remise,
    tarifs_vins.prix
    FROM tarifs_vins
       INNER JOIN conditionnement
       ON tarifs_vins.conditionnement_idcontenants=conditionnement.idconditionnement
       LEFT JOIN vins
       ON tarifs_vins.vins_idvins=vins.idvins
       LEFT JOIN types
       ON vins.types_idtypes=types.idtypes
       LEFT JOIN apellation
        ON apellation.idapellation=vins.apellation_idapellation
        ORDER BY vins.idvins, tarifs_vins.conditionnement_idcontenants";
	
    $result=$connection->query($sql);
   // Conditionnement des données issues de la requète dans un tableau associatif
   if($result->rowCount()) {
        $data = $result->fetchAll(PDO::FETCH_OBJ);
      return $data;
   } else {
      return "La sélection a échouée: "."<br>";
   }
};
$a_conditionnements=selectAllConditionnements($connection);
 function selectAllConditionnements($connection){
//Renvoie tous les conditionnements possibles
    $sql="SELECT * FROM conditionnement ORDER BY conditionnement.idconditionnement";
    $result=$connection->query($sql);
   // Conditionnement des données issues de la requète dans un tableau associatif
   if($result->rowCount()) {
        $data = $result->fetchAll(PDO::FETCH_OBJ);
      return $data;
   } else {
      return "La sélection a échouée: ";
   }
};
///////////////////////////////////////////////
///Fonctions pour alimenter les formulaires
function getConditionnementsList($connection){
        //Renvoie les conditionnements existants
        $sql="SELECT * FROM conditionnement";
        $result=$connection->query($sql);
       // Conditionnement des données issues de la requète dans un tableau associatif
       if($result->rowCount()) {
            $data = $result->fetchAll(PDO::FETCH_OBJ);
          return $data;
       }
};
//La fonction getOneTarif($tableTarifs, $tarifId)Renvoie un objet tarif isolé de tous les tarifs à partir de son idTarif
function getOneTarif($tableTarifs, $tarifId){
   $keyInArray=array_search($tarifId, array_column($tableTarifs, 'idTarif'));
   $ObjOneTarif=$tableTarifs[$keyInArray];
   return $ObjOneTarif;
 };
function getVinsList($connection){
            //Renvoie les conditionnements existants
            $sql="SELECT * FROM vins";
            $result=$connection->query($sql);
           // Conditionnement des données issues de la requète dans un tableau associatif
           if($result->rowCount()) {
                $data = $result->fetchAll(PDO::FETCH_OBJ);
              return $data;
           }
};
?>
