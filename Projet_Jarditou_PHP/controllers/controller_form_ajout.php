<?php
require_once "connexion_bdd.php"; // Inclusion de notre appel a la base de donnees
$db = connexionBase(); // Appel de la fonction de connexion

date_default_timezone_set('Europe/Paris');// decalage d une heure time zone paris
$date=date("Y-m-d H:i:s");

$formError = array(); // recuperation des erreur a afficher dans un tableau 

// declaration des regex vérifier la validité d’une chaîne 
$textValid = '/^[a-zA-Z0-9]+[\-_]?[0-9]*$/'; // Référence commence par des lettres, peut contenir un - ou un _ , peut contenir des chiffres de 0 à 9
$prixValid = '/^[0-9]{1,4}(?:\.[0-9]{0,2})?$/'; // Contient de 1 à 4 chiffres plus éventuellement un point suivi de 0 à 2 chiffres
$areaValid = '/^[^@+=|><\]\[{}]+$/'; // 
$rximg = "/^image/";
$stockValid = '/^[0-9]{1,11}$/'; // De 1 à 11 chiffres
$libelleValid = '/^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\d]+(?:(?:\-|\s|\')?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\d]+)*$/';

// verifier champs un par un , Vérification du format des valeurs entrées
// tester la presence du clic sur le bouton submit avec la fonction isset ( envoyer ou validation du formulaire)
if (isset($_POST['add'])) { //instruction si le formulaire est envoyé

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
        if (preg_match($stockValid, $_POST['pro_prix'])) {
            $pro_stock = htmlspecialchars($_POST['pro_stock']);
        } else {
            $formError['pro_stock'] = 'forme incorrect!!';
        }
    } else {
        $formError['pro_stock'] = 'champs vide, Veuillez renseigner le stock';
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

    if(isset($_POST['pro_bloque'])){
        $pro_bloque = $_POST['pro_bloque'];
    }else{
        $pro_bloque = null;
    }

    // Insertion du produit à l'aide d'une requête préparée
    $requete = "INSERT INTO `produits` (pro_ref, pro_cat_id, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_d_ajout, pro_bloque) 
            VALUES (:pro_ref, :pro_cat_id, :pro_libelle, :pro_description, :pro_prix, :pro_stock, :pro_couleur, '$date', :pro_bloque)";

    if (count($formError) === 0) {

        $result = $db->prepare($requete);
        $result->bindValue(":pro_ref", $pro_ref, PDO::PARAM_STR);
        $result->bindValue(":pro_cat_id", $pro_cat_id, PDO::PARAM_INT);
        $result->bindValue(":pro_libelle", $pro_libelle, PDO::PARAM_STR);
        $result->bindValue(":pro_description", $pro_description, PDO::PARAM_STR);
        $result->bindValue(":pro_prix", $pro_prix, PDO::PARAM_INT);
        $result->bindValue(":pro_stock", $pro_stock, PDO::PARAM_INT);
        $result->bindValue(":pro_couleur", $pro_couleur, PDO::PARAM_STR);
        $result->bindValue(":pro_bloque", $pro_bloque, PDO::PARAM_STR);
        if ($result->execute()) { //execution de la requete
            $result = $db->prepare("SELECT * FROM `produits` ORDER BY `pro_id` DESC");// recuperer id 
            $result->execute();
            $lastId = $result->fetchObject();
            if (!empty($_FILES['pro_photo']['name'])) {
                $dossier = '../assets/images/jarditou_photos/';
                $finfo = finfo_open(FILEINFO_MIME_TYPE); // info sur type MIME
                $mime = finfo_file($finfo, $_FILES['pro_photo']['tmp_name']); //on vérifie le type du fichier
                if (preg_match($rximg, $mime)) {
                    $extension = explode('/', $mime); // couper le type et lextention du fichier separer par le /
                    $ajoutphoto = "UPDATE `produits` SET `pro_photo`=:photo WHERE pro_id=:id";// nouvelle requete pour mettre a jour et rajouter la photo pour l id
                    $resultphoto = $db->prepare($ajoutphoto); // préparation de la requete
                    if (move_uploaded_file($_FILES['pro_photo']['tmp_name'], $dossier . $lastId->pro_id . '.' . $extension[1])) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        $photo = $extension[1];
                    } else { //Sinon (la fonction renvoie FALSE).
                        $formError['photo'] = "Erreur lors de l'upload";
                    }
                } else {
                    $photo = "Le fichier est invalide";
                }
            }
            $resultphoto->bindValue(':id', $lastId->pro_id);
            $resultphoto->bindValue(':photo', $photo);
            if (count($formError) === 0) {
                $resultphoto->execute();
                // Redirection du visiteur vers la page liste de produit et ajoute le produit inserer 
                header('location: ../views/liste.php');
            }
        }
    } else {
        $formError["exec"] = "Erreur le traitement avec la base de données à échoué ";
    }
}
