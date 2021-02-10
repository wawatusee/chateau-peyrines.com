<?php
require_once "model/model_admin-tarifs.php";
var_dump($_POST);
if(isset($_POST["idTarif"])){
    $idTarif=(int)$_POST["idTarif"];
    $delete=deleteTarif($connection,$idTarif);
    if($delete){
      header("location: ./?page=admin-tarifs&delete=$idTarif");
    }
}

//getTarif($connection,$_GET["id"]);
$tarifToDelete=$_POST["id"];
$objetTarif=getOneTarif($a_tarifs,$tarifToDelete);
var_dump($objetTarif);
//$descriptifVin=$objetVine->cuvee." ".$objetVine->couleur." ".$objetVine->nomapellation;
require_once './views/view_'.$page.'.php';
