<!DOCTYPE html>
<html lang="fr">
<?php
include "files/head_tournee.php" ?>
<body>
<div class="grid-container">
<?php include "views/header-space.php" ?>
  <div class="menu-space">
    <?php 
    include "views/view_menu.php";
    ?>
  </div>
  <!--DEBUT de Coeur de page -->
  <div class="main">
    <div class="debug">
      <p>Compléter la carte, personnifier les pop-ups, externaliser le JSON qui peuple "var lieux", exporter ce json depuis une requète sql, créer avant la table qui comprendra :</p>
      <ul>
        <li>Le nom de la ville</li>
        <li>Sa longitude</li>
        <li>sa latitude</li>
        <li>Le descriptif de l'évènement</li>
        <li>La date de l'évènement</li>
        <li>Et comme Michael le dit il vaut mieux prévoir plus que ce qui est demandé, du coup, le type d'évènement lié à la date</li>
      </ul>
    </div>
    <section id="tournee">
    <h2>Tournée Chateau Peyrines </h2>
      <div id="ma_carte">
      </div>
    </section>
    <br />
    <script type="text/javascript" src="js/tournee.js"></script>  
  </div>  
    <!--FIN de Coeur de page -->
  <div class="footer">
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>