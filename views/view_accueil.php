<!DOCTYPE html>
<html lang="fr">

<?php
  $titre="accueil";
  include "files/head.php";
 ?>
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
    Illustration et complément de texte à voir avec Philippe, le traitement des blocs peut être généralisé mais pour casser la monotonie, les contenus peuvent être agrémentés de CSS particulières.
    Remplir des illustrations pour chaque section, et jouer ensuite avec les empilements, Flex est préconisé, tester chaque nouveaté dans les 3 displays nécessaires.
    </div>
    <section id="culture">
      <h2>Accueil</h2>
      <p>
      Les pins qui bordent les premières vignes de Peyrines sont des guerriers, depuis qu'ils ont planté leurs racines dans cette terre, ils abritent Peyrines des orages.
      Apprends étranger, que chacun de ceux qui sont déja venus, clients, cousins, amis, sur la route qui les ramène à Peyrines, attendent ce portail comme un escadron de bienvenue.
      C'est donc pour t'aider à trouver ton chemin, que nous avons choisi de les utiliser comme fonds de site internet.
      J'entends bien, Mappy t'a fait un itinéraire hyper clair et tu as le GPS dans ta voiture.
      Je dis juste que, si, malgré tout ton équipement, tu réalises que ça fait déja 4 fois que tu fais demi-tour sur la D230, et pourtant, tout te dit que tu es arrivé, à ce moment laisse-toi guider par les pins tordus de Peyrines, c'est Ariane qui les a filés pour toi.
      </p>
    </section>
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