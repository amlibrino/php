<?php
session_start();
unset($_SESSION["login"]);

if (ini_get("session.use_cookies")) 
    {
        setcookie(session_name(), '', time()-42000);
    }

if (session_destroy()){
    header('location:../views/formulaire_connexion.php' );
}

?>