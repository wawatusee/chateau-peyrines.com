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
  <h2>Modification d'un tarif existant.</h2>
    <section>
    <div class="debug">
        <?php
        echo "id du tarif à updater : ";
        var_dump($_POST);
        echo "Le tarif à modifier : ";
        var_dump($tarif);
        echo "les champs datedebut, datefin et tarif sont modifiables.</BR>";
        ?>
    </div>
    <p>Vin et contenant concerné :<span class="form-control" readonly> <?=$tarif->annee?> <?=$tarif->couleur?> <?=$tarif->nomApellation?> | <?=$tarif->remise?></span></p>
        <!--Formulaire de création de tarifs peuplé par les listes de vins, de conditionnements-->
        <form action="" method="post">
            <div class="input-group mb-3">
                <input name="idTarif" value=<?=$tarif->idTarif?>>Id  : <?=$tarif->idTarif?>, Valable du</input>
                <!--date de début de validité du tarif-->
                <input id="datedebut" class="form-control" type="date" name="date_debut_validite" value=<?=$tarif->date_debut_validite?>>
                <span>au</span>
                <!--date de fin de validité du tarif-->
                <input id="datefin" class="form-control" type="date" name="date_fin_validite" value=<?=$tarif->date_fin_validite?>>
                <!--Et enfin le tarif, nombre décimal-->
                <input name="tarif" type=number step=00.1 min="1.OO" max="100.00" value="<?=floatval($tarif->prix)?>"/>
            </div>
            <div class="button">
                <button type="submit">Modifier ce tarif</button>
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