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
      <div class="main">
      <p>Vous pouvez créer un nouveau vin : <a href="?page=createVine">+</a></p>
      <h2>Vins existants</h2>
        <section>
          <p>Ou choisir de modifier ou supprimer les vins existant.</p>
          <div class="debug">
          Lier les boutons create, delete et update à leurs fonctions.
          </div>
          <?php
          $tableVines=selectAllVines($connection);
          //var_dump();
          //echo displayVines($tableVines);
          ?>
            <H3>Vins existants</H3>
          <!--entête du tableau des vins-->
            <table BORDER="1">
              <tr><th>idvins</th><th>Cuvée</th><th>couleur</th><th>nomapellation</th><th>supprimer</th><th>Update</th></tr>
            <!--TRAITEMENT DU SELECT DES VINS POUR AFFICHAGE-->
            <?php
            // tant que nous avons des vins
            foreach ($tableVines as $vin):
            ?>
            <!--affichage en tableau, une ligne par vin-->
            <TR>
              <tD><?=$vin->idvins?></tD><tD><?=$vin->cuvee?></tD><tD><?=$vin->couleur?></tD><tD><?=$vin->nomapellation?></tD><tD><a href="">X</a></tD><tD><a href="">Update</a></tD>
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