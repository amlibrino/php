<?php
function connexionBase()
{
   // Paramètre de connexion serveur
   $host = "localhost";
   $login= "root";     // hmdf Votre loggin d'accès au serveur de BDD 
   $password="";    //  Le Password pour vous identifier auprès du serveur
   $base = "jarditou";    // hmdf La bdd avec laquelle vous voulez travailler 
 
   try 
    {
        $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } 

    //si ya une erreur
    catch (Exception $e) 
    {
        echo 'Erreur : ' . $e->getMessage() . '<br>';// afficher le message d 'erreur 
        echo 'N° : ' . $e->getCode() . '<br>';// le code d erreur
        die('Connexion au serveur impossible.');//die() arrêtera l'exécution du script.
    } 
}
?>