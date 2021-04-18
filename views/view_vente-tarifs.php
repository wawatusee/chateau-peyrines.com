<!DOCTYPE html>
<html lang="fr">
<?php
include "files/head.php" ?>
<body>
<div class="grid-container">
  <?php include "views/header-space.php" ?>
  <div class="menu-space">
    <?php include "views/view_menu.php"?>
  </div>
  <div class="main">
    <h1>Vente Tarifs</h1>
    <h2>Commandes</h2>
    <div class="tarifs">
      <?php
      var_dump(selectTarifsVins($db));
      //Récupération des tarifs depuis model
      $array_TarifsVins=selectTarifsVins($db);
      //Trace pour le debug :
      $contentDebug.="Tarifs vins chargés"."<br>";
      ?>
      <?php function displayHtmlTableTarifsVins($fromSelectVins){
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
      $tableHtmlVineByContenants=displayHtmlTableTarifsVins($array_TarifsVins);
      echo $tableHtmlVineByContenants;
      $contentDebug.="Tarifs vins affichés"."<br>";
      ?>
    </div>
  </div>  
  <div class="footer">Footer
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>