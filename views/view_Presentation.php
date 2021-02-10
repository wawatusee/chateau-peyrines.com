<!DOCTYPE html>
<html lang="fr">
<?php 
include "files/head.php" ?>
<body>
<div class="grid-container">
  <?php include "views/header-space.php" ?>
  <div class="menu-space">
  <?php 
    include "views/view_menu.php"
    ?>
  </div>
  <!--DEBUT de Coeur de page -->
  <div class="main">
    <div class="debug">
      <p>Manquent : les  illustrations pour ces 3 sections :</p>
      <ul>
        <li>Pierre des armes de Peyrines</li>
      </ul>
      <ul>
        <li>Photo de familles dans un lightroom</li>
      </ul>
      <ul>
        <li>Une carte open map avec un symbole discret élégant et fort à la fois.</li>
      </ul>
    </div>
    <section id="historique">
      <h2>Historique</h2>
      <p>Construite en 1825 sur les ruines du Château Peyrines, la maison est au centre d’un vignoble de 38 hectares.
          Il ne reste du vieux château féodal que quelques pierres sculptées, dont celles où sont gravées les armes des Comtes de Peyrines.
          Ce sont elles qui, fidèlement reproduites, constituent la marque de notre cru.
      </p>
    </section>
    <section id="famille">
      <h2>Famille</h2>
      <p>  Depuis 70 ans, de père en fils, nous habitons Peyrines, nous cultivons sa vigne, nous récoltons ses grappes, nous vinifions son nectar...
          "C'est en forgeant que l'on devient forgeron", dit-on...
          Nous vous laissons conclure.
      </p>
    </section>
    <section id="situation">
      <h2>Situation</h2>
      <p>Le Château Peyrines est situé dans la région viticole appelée l‘Entre-Deux-Mers, à 45 km au sud-est de Bordeaux.
       L’Entre-deux-Mers est cette partie du département de la Gironde comprise entre la Garonne jusqu'à La Réole, et la Dordogne de l’estuaire de la Gironde jusqu’à Sainte-Foy-La-Grande, où la marée remonte (Entre-deux-Mers = entre deux marées).
       Aux forts coefficients de marée, on peut assister au mascaret, grosse vague qui remonte de l'océan, où surfeurs aguerris aiment se retrouver. L'Entre-deux-Mers est une région vallonnée de bois et de vignes, où l'on peut aussi visiter bon nombre de bastides, cités médiévales, abbayes, châteaux, moulins...et propriétés viticoles.
       </p>
    </section>
  </div>
    <!-- FIN de Coeur de page -->
  <div class="footer">Footer
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>