<?php
function selectTarifsVins($database) {
    //OBSOLETE
    //Prix de chaque vin selon conditionnement
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
function selectAllTarifs($database) {
    /*Prix de chaque vin triés par id de vins puis selon conditionnement*/
	$sql = "SELECT  vins.idvins,
    vins.annee,
    vins.types_idtypes as idTypes,
    types.nom as couleur,
    tarifs_vins.conditionnement_idcontenants as idRemise,
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
//Crée un nouveau tarif correspondant à un vin  et à un contenant existant dans la table tarif
//En paramètres les dates de validité de ce nouveau tarif(ferment l'année comptable courante),
function createTarif($database,$date_debut_validite,$date_fin_validite,$conditionnement_idcontenants,$prix,$vins_idvins){
    $sql="INSERT INTO tarifs_vins (idtarifsvin, date_debut_validite, date_fin_validite, conditionnement_idcontenants, prix, vins_idvins)
    VALUES (NULL, $date_debut_validite, $date_fin_validite, $conditionnement_idcontenants, $prix, $vins_idvins);";
            $request = mysqli_query($database,$sql);
            // Retourne vrai si il est créé, retourne faux si echec.
            return ($request)?true:false;
};
?>
<?php
 function selectAllConditionnements($database){
//Renvoie tous les conditionnements possibles
    $sql="SELECT * FROM conditionnement ORDER BY conditionnement.idconditionnement";
    $result=mysqli_query($database,$sql);
    // Conditionnement des données issues de la requète dans un tableau associatif
    if($result){
            $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $data;
        } else {
            return "La sélection a échouée: " . mysqli_error($database) . "<br>";
        }
    };
?>
<?php 
//Construction en cours
    function a_tarifs($sqli_tarifs,$conditionnements){
        //Prend le résultat d'un Fectch assoc sur la table tarifs et renvoie  un tableau multi dimensionnel
        //Création d'un tableau vide
        $a_vineForHtml=[];
        $lastVinId='';
        $longRemise=count($conditionnements);
        foreach ($sqli_tarifs as $vin) {
            $id=($vin['idvins']);

            if($id===$lastVinId){
                //Ce vin a déja été traité donc on ne donne que ses tarifs
                echo $vin['remise'].$vin['prix']." | ";
                for($i=0;$i<$longRemise;$i++){
            //Pour chaque vin on vérifie à quelle contenant correspond ce prix
                    if($conditionnements[$i]['idconditionnement']==$vin['idRemise']){
                        $a_vineForHtml[$lastVinId][$i]=$vin['prix'];
                    }
                }
            } else{
                //C'est la premiere fois que l'on voit ce vin donc on donne son nom et la liste des potentiels contenants vides
                echo '<BR>'.$vin['couleur'].': ';
                $a_vineForHtml[]=[$id];
                for($i=0;$i<$longRemise;$i++){
                    if($conditionnements[$i]['idconditionnement']==$vin['idRemise']){
                        $a_vineForHtml[$id][$i]=$vin['prix'];
                    }
                }
            };
            $lastVinId=$id;
        }
        return $a_vineForHtml;
    }
?>
