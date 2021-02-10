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
    <section>
        <!--Formulaire-->
        <form action="" method="POST">
          <div class="input-group mb-3">
            <label class="input-group-text" for="vineToDelete">Tarif à supprimer</label>
            <input class="form-control" name="idTarif" id="idTarif" placeholder="Nom" value="<?=$tarifToDelete?>"></input>
            <output><?=$objetTarif->annee." ".$objetTarif->couleur." ".$objetTarif->nomApellation."  ".$objetTarif->remise." ".$objetTarif->prix?></output>
            <button type="submit">Supprimer</button>
          </div>
        </form>
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