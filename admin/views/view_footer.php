Footer-debug :<br>
<?php 
if(!$connection){
    // Give the error then stop the scritp : die()
    die("Erreur n° ".mysqli_connect_errno()." Description : ".mysqli_connect_error());
}
else  $contentDebug.="Connected";
if($debug)echo "<div class='debug'>$contentDebug</div>";
?>