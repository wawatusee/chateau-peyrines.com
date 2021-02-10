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
  <div class="main">Main
    <section>
    <h2>Erreur de connection</h2>
    
    </section>
  </div>  
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