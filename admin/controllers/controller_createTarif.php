<?php
//Le model vin est également importé car il permet de composer les formulaires(tableVines)
require_once "model/model_admin-vins.php";
require_once "model/model_admin-tarifs.php";
if(isset($_POST["date_debut_validite"])){
    $dateDebut=$_POST["date_debut_validite"];
    $dateFin=$_POST["date_fin_validite"];
    $idContenant=(int)$_POST["conditionnement_idcontenants"];
    $tarif=$_POST["tarif"];
    $idVin=(int)$_POST["vins_idvins"];
    $insert=createTarif($connection,$dateDebut,$dateFin,$idContenant,$tarif,$idVin);
    if($insert){
        header("location: ./?page=admin-tarifs&insert=ok");
    }
}
//Créons les listes qui peupleront nos formulaires :
$conditionnements=getConditionnementsList($connection);
//var_dump($conditionnements);
//var_dump($_POST);
//La fonction selectAllVines est dans les modèles communs
$vins=selectAllVines($connection);
require_once './views/view_'.$page.'.php';
