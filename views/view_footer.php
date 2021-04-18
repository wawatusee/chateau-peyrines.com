<a href="?page=admin">admin</a><br>
<?php 
if(!$db){
    // affichage de l'erreur et arrêt du scritp : die()
    die("Erreur n° ".mysqli_connect_errno()." Description : ".mysqli_connect_error());
}
else  $contentDebug.="Connected";
if($debug)echo "<div class='debug'>$contentDebug</div>";
?>