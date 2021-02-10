<!DOCTYPE html>
<html lang="fr">
<?php
  $titre="login";
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
      <h2>Connexion</h2>
        <form action="" name="connection" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Votre login :</label>
                <input name="thename" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre login" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input name="thepwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
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