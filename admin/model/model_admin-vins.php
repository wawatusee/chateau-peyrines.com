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
function deleteVine($connection, $vin_id){
    $sql="DELETE FROM vins WHERE idVins=:vinId";
    $prepare=$connection->prepare($sql);
    $prepare->bindParam(':vinId',$vin_id,PDO::PARAM_INT);
    $exec=$prepare->execute();
    //if(!$exec){var_dump($prepare->errorInfo());};
    return ($exec);
}
////////////////////////////////////////////
//GROUPE DE FONCTIONS POUR LES FORMULAIRES//
//Funnction selectAllVines() is in the communs one
$tableVines=selectAllVines($connection);
//La fonction getOneVine($tousLesVins, $vin_id)Renvoie un objet vin isolé de tous les vins à partir de son idvins
function getOneVine($tousLesVins, $vin_id){
  $keyInArray=array_search($vin_id, array_column($tousLesVins, 'idvins'));
  $ObjOneVine=$tousLesVins[$keyInArray];
  return $ObjOneVine;
};
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



