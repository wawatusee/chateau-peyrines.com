<!DOCTYPE html>
<html lang="fr">
<?php
include "files/head.php" ?>
<body>
<div class="grid-container">
  <?php include "views/header-space.php" ?>
  <div class="menu-space">
    <?php include "../views/view_menu.php"?>
  </div>
  <div class="main">
    <?php if(isset($_GET["insert"])) echo"Tarif créé avec succès"?>
    <?php if(isset($_GET["delete"])) echo"Tarif supprimé avec succès"?>
    <?php if(isset($_GET["update"])) echo"Tarif modifié avec succès"?>
    <p>Créer un nouveau tarif : <a href="?page=createTarif">+</a></p>
    <section>
      <h3>Tarifs existants</h3>
        <?php 
       //var_dump($a_tarifs);
       ?>
        <table BORDER="1">
          <tr><th>idtarif</th><th>Début validité</th><th>Fin validité</th><th>Vin</th><th>Remise</th><th>Tarif</th><th>Suppr</th><th>Modifier</th></tr>
        <!--TRAITEMENT DU SELECT DES VINS POUR AFFICHAGE-->
        <?php
        // tant que nous avons des tarifs
        foreach ($a_tarifs as $tarif):
        ?>
        <!--affichage en tableau, une ligne par tarif-->
        <TR>
          <tD><?=$tarif->idTarif?></tD><th><?=$tarif->date_debut_validite?></th><th><?=$tarif->date_fin_validite?></th>
          <tD><?=$tarif->annee?> <?=$tarif->couleur?> <?=$tarif->nomApellation?></tD><tD><?=$tarif->remise?></tD>
          <tD><?=$tarif->prix?></tD>
          <tD>
            <form method="POST" action="?page=deleteTarif">
            <button type="submit" name="id" value="<?=$tarif->idTarif?>">Suppr</button>
            </form>
          </tD>
          <tD>
            <form method="POST" action="?page=updateTarif">
            <button type="submit" name="id" value="<?=$tarif->idTarif?>">Modifier</button>
            </form>
          </tD>
        </TR>
        <!--FIN DU TRAITEMENT DES TARIFS-->
        <?php
        endforeach;
        ?>
        </table>
      </section>
  </div>  
  <div class="footer">Footer
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>