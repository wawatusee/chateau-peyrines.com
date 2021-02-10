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
  <h2>Création d'un nouveau vin.</h2>
    <section>
        <!--Formulaire de création de vin peuplé par les listes de type de vins, d'appellations-->
        <form action="" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text">Chateau Peyrines</span>
                <input id="annee" class="form-control" type="number"  min="1980" max="2030" name="annee" required>
                <select id="type" class="form-control" name="type" required>
                    <option value="">type de vin</option>
                    //Liste déroulante peuplée par les apellations existantes
                <?php
                foreach ($listTypes as $type):
                ?>
                <option value="<?=$type->idtypes?>"><?=$type->nom?></option>
                <?php
                endforeach;
                ?>
                </select>
                <select id="apellation" class="form-control" name="appellation" required>
                <option value="">appellation</option>
                <?php
                //Liste déroulante peuplée par les appellations existantes
                foreach ($listApellations as $apellation):
                ?>
                <option value="<?=$apellation->idapellation?>"><?=$apellation->apellationcol?></option>
                <?php
                endforeach;
                ?>
                </select>
            </div>
            <div class="button">
                <button type="submit">Créer ce vin</button>
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