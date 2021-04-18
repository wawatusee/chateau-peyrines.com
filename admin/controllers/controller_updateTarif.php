<?php
//Soit nous venons de remplir le formulaire
require_once "model/model_admin-tarifs.php";
if(isset($_POST["date_debut_validite"])){
    $dateDebut=$_POST["date_debut_validite"];
    $dateFin=$_POST["date_fin_validite"];
    $tarif=$_POST["tarif"];
    $idTarif=$_POST["idTarif"];
    $update=updateTarif($connection,$dateDebut,$dateFin,$tarif,$idTarif);
    if($update){
        header("location: ./?page=admin-tarifs&update=ok");
    }
}
//Soit nous le créons
//Les infos de tarif suffisent à remplir le formulaire de la page d'update
$tarif=getOneTarif($a_tarifs, $_POST["id"]);
require_once './views/view_'.$page.'.php';
