<?php
session_start();
//Debug est sur true en mode debug et fait apparaitre les erreurs
$debug=false;
$contentDebug="";
require_once 'config.php';
require_once "views/utils_views/functions.php";
require_once "../model/commonsModel.php";
require_once "model/connectDB.php";
require_once "model/usersModel.php";
// DB connection
$connection = connectDB();
// connect error
if(!$connection){
    // view  connect error
    include "view/errorConnectView.php";
    // stop working
    die();
}

if(isset($_POST['thename'],$_POST['thepwd'])){
    $recupUsers = connectAdmin($connection,$_POST['thename'],$_POST['thepwd']);
    if(!empty($recupUsers)){
        $_SESSION = $recupUsers;
        $_SESSION['idsession']=session_id();
    }
}
//$pageArray charge le tableau déclaré dans config.php,
//Ce tableau est utilisé pour réaliser le menu(view_menu.php)
$pagesArray = PAGE_ARRAY;
 if (isset($_GET["page"])) {
  $page = $_GET["page"];
  $titre=$page;
	if (in_array($page, $pagesArray) &&isset($_SESSION['idsession'])&&$_SESSION['idsession']==session_id() ) {
        require_once './controllers/controller_'.$page.'.php';
	} else {
        require_once './views/view_admin-login.php';
	}
} else {
	require_once './views/view_admin-login.php';
}
?>