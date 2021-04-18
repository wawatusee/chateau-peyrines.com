<!DOCTYPE html>
<html lang="fr">

<?php
  $titre="tournée";
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
  <div class="main">Main
    <section>
      <h2>Dates et lieux de tournée existants</h2>
      <div class="debug">Voir partie public de la tournée pour debug.</div>
        <p>Créer une nouvelle date avec un petit "+"</p>
        <p>Mise en tableau des dates qui existent, chaque ligne suivie des boutons delete et update. Peut-être la carte affichée, si c'est justifié.</p>
        <?php
        var_dump($pagesArray[0]);
        ?>
    </section>
  </div>  

  <div class="footer">
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>