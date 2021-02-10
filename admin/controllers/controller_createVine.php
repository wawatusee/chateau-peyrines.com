<?php
require_once "model/model_admin-vins.php";
if(isset($_POST["annee"])){
    $annee=(int)$_POST["annee"];
    $idType=(int)$_POST["type"];
    $idAppellation=(int)$_POST["appellation"];
    $insert=createVine($connection,$annee,$idAppellation,$idType);
    if($insert){
        header("location: ./?page=admin-vins&insert=ok");
    }
}
//Créons les listes qui peupleront nos formulaires :
$listTypes=getTypesList($connection);
//var_dump($_POST);
$listApellations=getApellationList($connection);
//var_dump($listApellations);
require_once './views/view_'.$page.'.php';
