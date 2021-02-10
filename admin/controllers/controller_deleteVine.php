<?php
require_once "model/model_admin-vins.php";
var_dump($_POST);
if(isset($_POST["idVin"])){
    $idVin=(int)$_POST["idVin"];
    $descriptifVin=$_POST["vineDescriptif"];
    $delete=deleteVine($connection,$idVin);
    if($delete){
      header("location: ./?page=admin-vins&delete=$idVin&descriptifVin=$descriptifVin");
    }
}

//Nom complet du vin à montrer
//getVine($connection,$_GET["id"]);
$vineToDelete=$_POST["id"];
$objetVine=getOneVine($tableVines,$vineToDelete);
$descriptifVin=$objetVine->cuvee." ".$objetVine->couleur." ".$objetVine->nomapellation;
require_once './views/view_'.$page.'.php';
