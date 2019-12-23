<?php
$pro_id = $_GET['pro_id'];
require_once "../controllers/connexion_bdd.php";// Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion

$dossier = '../assets/images/jarditou_photos/';
$sltext = "SELECT * FROM `produits` WHERE `pro_id`=:id"; //selection de l'extension
$resultext = $db->prepare($sltext);
$resultext->bindValue(":id", $pro_id);
if ($resultext->execute()) {
    $produit = $resultext->fetchObject();
    $photo = $dossier . $pro_id . '.' . $produit->pro_photo; //chemin vers l'image
    if (file_exists($photo)) {
        unlink($photo); //supprimer la photo
    }
}
$suppression="DELETE FROM `produits` WHERE pro_id=".$pro_id;// requete supp en fonction de id 
$result = $db->query($suppression);

if (!$result) { // si la variable $result vaut NULL ou query n a rien recuperer 
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2];
    die("Erreur dans la requête"); // on affiche un mesage d'erreur pour chaque cas.
}else{
    header("location:../views/liste.php");// redirection 
}

?>