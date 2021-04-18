<!DOCTYPE html>
<?php
 header("Location: ./admin/"); /* Redirection du navigateur */
 ?>
<html lang="fr">
<?php
include "files/head.php"
?>
<body>
  <div class="grid-container">
    <?php include "views/header-space.php" ?>
      <div class="menu-space">
      <?php 
      include "views/view_menu.php";
      ?>
      </div>
      <div class="main">
        <?php var_dump($page);?>
      </div>
    </div>  
    <div class="footer">
    <?php 
      include "views/view_footer.php";
    ?> 
    </div>
  </div>
</body>
</html>