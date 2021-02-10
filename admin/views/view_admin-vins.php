<!DOCTYPE html>
<html lang="fr">
<?php
  $titre="vins";
  include "files/head.php";
 ?>
<body>
<div class="grid-container">
<?php include "views/header-space.php" ?>
  <div class="menu-space">
    <?php 
      include "../views/view_menu.php";
    ?> 
  </div>
  <!--DEBUT de Coeur de page -->
  <div class="main"><p>
  <?php if(isset($_GET["insert"])) echo"Vin créé avec succès"?>
  <?php if(isset($_GET["delete"])) echo"Vin supprimé avec succès"?>
  <p>Créer un nouveau vin : <a href="?page=createVine">+</a></p>
    <section>
      <p>Ou supprimer un des vins existant, attention les tarifs affichés sur ce site sont dépendants de l'existance de ces vins.</p>
        <H3>Vins existants</H3>
      <!--entête du tableau des vins-->
        <table BORDER="1">
          <tr><th>idvins</th><th>Cuvée</th><th>couleur</th><th>nomapellation</th><th>supprimer</th></tr>
        <!--TRAITEMENT DU SELECT DES VINS POUR AFFICHAGE-->
        <?php
        // tant que nous avons des vins
        foreach ($tableVines as $vin):
        ?>
        <!--affichage en tableau, une ligne par vin-->
        <TR>
          <tD><?=$vin->idvins?></tD><tD><?=$vin->cuvee?></tD><tD><?=$vin->couleur?></tD><tD><?=$vin->nomapellation?></tD><tD><form method="POST" action="?page=deleteVine"><button type="submit" name="id" value="<?=$vin->idvins?>">Suppr</button></form></tD>
        </TR>
        <!--FIN DU TRAITEMENT DES VINS-->
        <?php
        endforeach;
        ?>
        </table>
    </section>
  </div>
  <!--FIN de Coeur de page -->
  <div class="footer">
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>