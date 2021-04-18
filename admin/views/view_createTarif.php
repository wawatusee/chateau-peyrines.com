<!DOCTYPE html>
<html lang="fr">
<?php
  $titre="Tarifs";
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
  <h2>Création d'un nouveau tarif.</h2>
    <section>
        <!--Formulaire de création de tarifs peuplé par les listes de vins, de conditionnements-->
        <form action="" method="post">
            <div class="input-group mb-3">
                <span>Valable du</span>
                <!--date de début de validité du tarif-->
                <input id="datedebut" class="form-control" type="date" name="date_debut_validite" required>
                <span>au</span>
                <!--date de fin de validité du tarif-->
                <input id="datefin" class="form-control" type="date" name="date_fin_validite" required>
                <!--Choix du vin à aprécier-->
                <select id="type" class="form-control" name="vins_idvins" required>
                    <option value="">Vin à chiffrer</option>
                <?php
                //Liste déroulante peuplée par les vins existants
                foreach ($vins as $vin):
                ?>
                <!--Choix du conditionnement-->
                <option value="<?=$vin->idvins?>"><?=$vin->idvins?> <?=$vin->cuvee?> <?=$vin->couleur?> <?=$vin->nomapellation?></option>
                <?php
                endforeach;
                ?>
                </select>
                <select id="conditionnement" class="form-control" name="conditionnement_idcontenants" required>
                <option value="">Conditionnement</option>
                <?php
                //Liste déroulante peuplée par les conditionnements existants
                foreach ($conditionnements as $conditionnement):
                ?>
                <option value="<?=$conditionnement->idconditionnement?>"><?=$conditionnement->nom?></option>
                <?php
                endforeach;
                ?>
                </select>
                <!--Et enfin le tarif, nombre décimal-->
                <input name="tarif" type=number step=00.01 min="1.OO" max="100.00" placeholder="00.00"/>
            </div>
            <div class="button">
                <button type="submit">Créer ce tarif</button>
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