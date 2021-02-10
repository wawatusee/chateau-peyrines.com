<?php 
//Functions needed for the views
function displayHtmlTableTarifsVins($fromSelectVins){
    //Affiche un tableau html, une rangée pour chaque vin, en colomne les prix unitaire selon le conditionnement
    //Ouverture du tableau et ligne d'entètes
    $tableHtmlVineByContenants='<table><tr><th>Vin</th><th>36btl et +</th><th>60btl et +</th><th>120btl et +</th>';
    //Instenciation de tempVine qui va recevoir le nom du dernier vin observé
    $tempVine='';
    //Boucle sur le tableau de tous les tarifs
    foreach($fromSelectVins as $vins){
      //Composition du nom du vin en cours stoqué dans vin
      $vin=$vins['annee'].' '.
      $vins['couleur'].' '.
      $vins['apellationcol'];
      //On vérifie si le vin traité dans la boucle est le même que le précédent
      if ($vin!=$tempVine){
        $tableHtmlVineByContenants.='</tr><tr><td>'.
        $vin.' '.
      '</td>';
      $tableHtmlVineByContenants.='<td>'.
      $vins['prix_unitaire'].
      '</td>';
    }
      else{
    //Si oui, inutile de remettre le nom, on ne stoquera que les prix de ce vin
    $tableHtmlVineByContenants.='<td>'.
    $vins['prix_unitaire'].
    '</td>';
      }
      //Notre itération étant passée, on laisse le nom du vin en mémoire
      $tempVine=$vin;
    }
    //On a bouclé sur tous les tarifs, on ferme le tableau
    $tableHtmlVineByContenants.='</tr></table>';
    return $tableHtmlVineByContenants;
  } 
  function displayVines($datasVines){
    $listeDesVins="";
    foreach ($datasVines as $vin) {
      $listeDesVins.='<div class="vin">'.'<a href="">-</a>'.'</div>';
    }
    //return $listeDesVins;
    
    return print_r($datasVines);

  }
?>