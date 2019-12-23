<?php
if(!isset($_SESSION['login'])){ // si ya pas une connexion je la demare 
    session_start();
}
require_once "../controllers/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase();
$err = array();

if (isset($_POST['connexion'])) { // si se connecte (pressence du clic sur le submit connexion)
    $req = "SELECT * FROM `user` WHERE user_login= :login";//
    $result = $db->prepare($req);
    $result->bindValue(':login', $_POST['login']);
    $result->execute();
    if($result->rowCount()!==0){// pour verifier si le login existe 
        $user = $result->fetchObject();
        if ($_POST['login'] === $user->user_login) { 
            $_SESSION['login'] = $user->user_login;
        } else {
            $err['login'] = "Nom d'utilisateur incorrect";
        }
    
        if (!password_verify($_POST['password'], $user->user_password)) {
            $err['password'] = "Mot de passe incorrect";
        }
    }else{
        $err['unkown'] = "Session inexistante, veillez creé un compte";
    }

    if (count($err) === 0) {
        $_SESSION['role'] = $user->user_role;//role 
        $_SESSION['nom'] = $user->user_nom; // je recupere session nom 
        $_SESSION['prenom'] = $user->user_prenom;
        header('location: ../views/index.php');
    }
}
?>
