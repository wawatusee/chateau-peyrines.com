<?php
//Connect User
function connectAdmin($c,$nom,$pwd){
    $nom = htmlspecialchars(strip_tags(trim($nom)),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)),ENT_QUOTES);
    $sql = "SELECT * FROM users WHERE username='$nom' AND password='$pwd'";
    $recup = $c->query($sql);
    return ($recup->rowCount())?  $recup->fetch(PDO::FETCH_ASSOC) : [];
}
// disconnect user
function disconnectModel(){
    // Destroy session's variables
    $_SESSION = array();

    // Destroy the cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy real session
    session_destroy();
    
}