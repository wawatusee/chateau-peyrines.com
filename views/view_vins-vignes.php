<!DOCTYPE html>
<html lang="fr">
<?php
include "files/head.php" ?>
<body>
<div class="grid-container">
  <?php include "views/header-space.php" ?>
  <div class="menu-space">
    <?php 
    include "views/view_menu.php";
    ?>
  </div>
  <div class="main">
    <!--DEBUT de Coeur de page -->
    <div class="debug">Illustration pour chaque section</div>
    <h2>Vignes et vins</h2>
    <section id="culture">
      <h3>Culture</h3>
      <p>
      Nous utilisons le plus possible des méthodes de culture naturelle, afin de respecter l’environnement, ainsi que l’activité biologique des sols. 
      Cette démarche s’adapte à chaque saison en fonction du climat...
      ...et ceci tout en respectant la qualité de notre production et la rentabilité de notre exploitation.
      </p>
    </section>
    <section id="conseils">
      <h3>Conseils</h3>
      <p>
      Il est conseillé d’aérer les vins rouges avant leur  dégustation, avec un passage en carafe par exemple.
      Les Bordeaux Supérieur sont des vins de garde. Ils peuvent très bien vieillir plusieurs années dans votre cave, et sont très agréables dès à présent.
      Les Blanc Sec et Rosé doivent se boire jeunes.
      Conservez toutes vos bouteilles couchées.
      Pour bien déguster le Peyrines  :
      Blanc Sec : apéritif, poisson et  fruits de mer
      Rosé : charcuterie, crudités, brochettes
      Moelleux : apéritif, foie gras, dessert
      Rouge : viande, fromage…
      </p>
    </section>
    <h2>Elaboration</h2>
    <section id="le-chai">
      <h3>Le chai</h3>
      <p>
      Nous élaborons nos vins dans des cuves d'acier inoxydable pour une meilleure gestion des températures de vinification lors de la fermentation alcoolique.
      Ensuite, nos vins sont élevés et conservés dans des cuves souterraines afin de profiter d’un environnement tempéré naturel*.
      *contribution non-négligeable pour lutter contre les émissions de CO2 - respect de l’environnement.
      </p>
    </section>
    <section id="la-cave">
      <h3>La cave</h3>
      <p>
      Notre cave, située en sous-sol aux conditions idéales de température*, est le lieu où nous laissons reposer le fruit de nos efforts, dans l'attente du désir des amateurs que vous êtes.
      </p>
    </section>
    <!--FIN de Coeur de page -->
  </div>  
  <div class="footer">
  <?php 
    include "views/view_footer.php";
  ?> 
  </div>
</div>
</body>
</html>