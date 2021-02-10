<!DOCTYPE html>
<html lang="fr">
<?php
  $titre="disconnect";
  include "files/head.php";
 ?>
<body>
<div class="grid-container">
<?php include "views/header-space.php" ?>
  <div class="menu-space">
  <?php include "../views/view_menu.php"?>
  </div>
  <div class="main">
    <div class="container">
      <h2>Deconnection</h2>
        <form action="?page=admin-login" method="post">
            <span>Se déconnecter</span>
            <button name="disconnect" type="submit" class="btn btn-primary" value="ok">OK</button>
        </form>
    </div>
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