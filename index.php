<?php
//Debug est sur true en mode debug et fait apparaitre les erreurs
$debug=false;
$contentDebug="";
require_once 'config.php';
require_once "model/connectDB.php";//Pas encore utilisé
require_once "model/crudTarifsVin.php";
require_once "model/commonsModel.php";
$db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PWD, DB_NAME, DB_PORT) OR die("La connection à la base de données a échouée");
mysqli_set_charset($db, DB_CHARSET);
//$pageArray charge le tableau déclaré dans config.php,
//Ce tableau est utilisé pour réaliser le menu(view_menu.php)
$pagesArray = PAGE_ARRAY;
 if (isset($_GET["page"])) {
  $page = $_GET["page"];
  $titre=$page;
	if ( in_array($page, $pagesArray) ) {
    require_once './views/view_' . $page . '.php';
	} else {
    require_once './views/view_accueil.php';
	}
} else {
	require_once './views/view_accueil.php';
}
?>