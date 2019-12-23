<?php
require_once "connexion_bdd.php";// Inclusion de notre appel a la base de donnees
$db = connexionBase();// Appel de la fonction de connexion
$id = $_GET["pro_id"];
$formError = array();// recuperation des erreur a afficher dans un tableau 

date_default_timezone_set('Europe/Paris');
$date=date("Y-m-d H:i:s");
// declaration des regex vérifier la validité d’une chaîne 
$textValid = '/^[a-zA-Z0-9]+[\-_]?[0-9]*$/'; // Référence commence par des lettres, peut contenir un - ou un _ , peut contenir des chiffres de 0 à 9
$prixValid = '/^[0-9]{1,4}(?:\.[0-9]{0,2})?$/'; // Contient de 1 à 4 chiffres plus éventuellement un point suivi de 0 à 2 chiffres
$areaValid = '/^[^@+=|><\]\[{}]+$/'; // 
$rximg = "/^image/";
$stockValid='/^[0-9]{1,11}$/'; // De 1 à 11 chiffres
$libelleValid='/^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\d]+(?:(?:\-|\s|\')?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\d]+)*$/'; 

$req = $db->query('SELECT * FROM produits WHERE pro_id=' .$id); // On récupère les valeurs actuelles
$curValues = $req->fetchObject();

// verifier champs un par un , Vérification du format des valeurs entrées
// tester la presence du clic sur le bouton submit avec la fonction isset ( envoyer ou validation du formulaire)
if (isset($_POST['submit'])) { //instruction si le formulaire est envoyé
   /*
    if (!empty($_POST['pro_id'])){
        $pro_id = $_POST['pro_id'];
    }*/

    // vérification du champ reference  //htmlspecialchars Convertit les caractères html empeche d etre lu comme du html mais juste comme du text
    if (!empty($_POST['pro_ref'])) {         //instruction si le champs n'est pas vide   
        if (preg_match($textValid, $_POST['pro_ref'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
            $pro_ref = htmlspecialchars($_POST['pro_ref']);
        } else {                //instruction si la saisie ne passe pas la regex
            $formError['pro_ref'] = 'forme incorrect!!';
        }
    } else {     //instruction si le champs est vide
        $formError['pro_ref'] = 'champs vide, Veuillez renseigner la référence.';
    }
    // vérification du champ catégorie
    if (!empty($_POST['pro_cat_id'])) {            
            $pro_cat_id = htmlspecialchars($_POST['pro_cat_id']);
    } else { 
        $formError['pro_cat_id'] = 'champs vide, Veuillez renseigner la catégorie.';
    }
    // vérification du champ libellé  
    if (!empty($_POST['pro_libelle'])) {    
        if (preg_match($libelleValid, $_POST['pro_libelle'])) { 
            $pro_libelle = htmlspecialchars($_POST['pro_libelle']);
        } else {
            $formError['pro_libelle'] = 'forme incorrect!!';
        }
    } else {
        $formError['pro_libelle'] = 'champs vide, Veuillez renseigner le libellé';
    }
    // vérification du champ description
    if (!empty($_POST['pro_description'])) {  
        if (preg_match($areaValid, $_POST['pro_description'])) {
            $pro_description = htmlspecialchars($_POST['pro_description']);
        } else {        
            $formError['pro_description'] = 'forme incorrect!!';
        }
    } else { 
        $formError['pro_description'] = 'champs vide, Veuillez renseigner la description du produit';
    }
    // vérification du champ prix
    if (!empty($_POST['pro_prix'])) {    
        if (preg_match($prixValid, $_POST['pro_prix'])) { 
            $pro_prix = htmlspecialchars($_POST['pro_prix']);
        } else {            
            $formError['pro_prix'] = 'forme incorrect!!';
        }
    } else {     
        $formError['pro_prix'] = 'champs vide, Veuillez renseigner le prix';
    }
    // vérification du champ stock
    if (!empty($_POST['pro_stock'])) {    
        if (preg_match($prixValid, $_POST['pro_prix'])) { 
            $pro_stock = htmlspecialchars($_POST['pro_stock']);
        } else {               
            $formError['pro_stock'] = 'forme incorrect!!';
        }
    } else {    
        $formError['pro_stock'] = 'champs vide, stock non Veuillez renseigné';
    }
    // vérification du champ reference
    if (!empty($_POST['pro_couleur'])) {  
        if (preg_match($textValid, $_POST['pro_couleur'])) { 
            $pro_couleur = htmlspecialchars($_POST['pro_couleur']);
        } else {                
            $formError['pro_couleur'] = 'forme incorrect!!';
        }
    } else {  
        $formError['pro_couleur'] = 'champs vide, Veuillez renseigner le champs';
    }

    // verification de cocher le bouton oui ou non  
    if (strlen($_POST['pro_bloque'])===0) {         
        $formError['pro_bloque'] = 'Veuillez choisir';
    }else{
        $pro_bloque = $_POST['pro_bloque'];
    }

    if (!empty($_FILES['pro_photo']['name'])) { // On gère l'envoi d'image si le nom est non vide
        $dossier = '../assets/images/jarditou_photos/';
        $photobdd = $dossier . $id .'.'. $curValues->pro_photo;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']);
        if (preg_match($rximg, $mime)) {
            if (file_exists($photobdd)) {
                unlink($photobdd);
            }
            $extension = explode('/', $mime);// 
            if (move_uploaded_file($_FILES['pro_photo']['tmp_name'], $dossier . $id . '.' . $extension[1])) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                $pro_photo = $extension[1];
            } else {
                $err['photo'] = "Erreur lors de l'upload";
            }
        } else {
            $err['photo'] = "Image invalide";
        }
    }else{
        $pro_photo = $curValues->pro_photo;
    }

    // Insertion du produit à l'aide d'une requête préparée
    $requete = "UPDATE `produits` SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock, 
    pro_couleur=:pro_couleur, pro_d_modif='$date', pro_photo=:pro_photo, pro_bloque=:pro_bloque WHERE pro_id=:pro_id";

   
    if(count($formError)===0){
        $result = $db->prepare($requete);
        $result->bindValue(":pro_ref", $pro_ref);
        $result->bindValue(":pro_cat_id", $pro_cat_id);
        $result->bindValue(":pro_libelle", $pro_libelle);
        $result->bindValue(":pro_description", $pro_description);
        $result->bindValue(":pro_prix", $pro_prix);
        $result->bindValue(":pro_stock", $pro_stock);
        $result->bindValue(":pro_couleur", $pro_couleur);
        $result->bindValue(":pro_bloque", $pro_bloque);
        $result->bindValue(":pro_id", $id);
        $result->bindValue(":pro_photo", $pro_photo);


        $result->execute(); // executer la requete d'insertion
        // Redirection du visiteur vers la page liste de produit et ajoute le produit inserer 

        header('location: ../views/liste.php');
        }
        else {
            $formError ["exec"] = "Erreur le traitement avec la base de données à échoué ";
    }
}

?>
