<?php
 function mainMenuFromArray_view($arrayRubriques){
$mainMenu="";
$horsMenu=HORS_MENU;
   foreach($arrayRubriques as $rubrique){
       //En parsant le tableau $horsMenu on n'intègre pas au menu principal les pages qui ne doivent pas y être, exemple "admin".
       if(!in_array($rubrique,$horsMenu)){
       $boutonMainMenu='<a class='.'"btnMainMenu"'.' href="./?page='."$rubrique".'">'." $rubrique ".'</a>';
       $mainMenu=$mainMenu." $boutonMainMenu ";
    }

   }
   return $mainMenu;
}
function selectAllVines($connection){
   //Renvoie les vins existants avec tous les champs en clair
       $sql="SELECT vins.idvins, vins.annee as cuvee,types.nom as couleur,apellation.apellationcol as nomapellation
       FROM `vins` 
       LEFT JOIN apellation ON vins.apellation_idapellation=apellation.idapellation 
       LEFT JOIN types ON vins.types_idtypes=types.idtypes ";
       $result=$connection->query($sql);
      // Conditionnement des données issues de la requète dans un tableau associatif
      if($result->rowCount()) {
           $data = $result->fetchAll(PDO::FETCH_OBJ);
         return $data;
      } else {
           //Kieran c'est quoi cette daube pourquoi on trouve mysqli_error avec du PDO?
         return "La sélection a échouée: " . mysqli_error($database) . "<br>";
      }
   };
?>