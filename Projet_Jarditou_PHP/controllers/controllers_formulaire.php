<?php

require_once "connexion_bdd.php";
$db = connexionBase();
// recuperation des erreur a afficher dans un tableau 
$formError = array();

// declaration des regex vérifier la validité d’une chaîne 
$textValid = '/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/'; // pour les prenom et nom , peut contenir des chiffres et des lettres 
$adresseValid = '/^[^@+=|><\]\[{}]+$/'; //(/^((?:[013-9]\d)|(?:2[0-9ABab]))\d{3}$/);
$ddnValid = '/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/';
$cpValid = '/^(?:(?:(?:(?:[013-8]\d)|(?:2[\dabAB])|(?:9[0-5]))\d{3})|(?:(?:97[1-5]\d{2})|(?:98[06-8]\d{2})))$/';
// filtre du code postale il doit contenir 5 nombres sauf la corse qui contien des lettres
$mailValid = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/';
// filtre email il divise le mail en 4 blocs le 1er accepte lettre, chiffre et caractere le 2nd @ obligatoire 3em pour la sone de texte et le 4em demande un .et des caractéres
$telValid = '/^[0-9]{10}|[0-9\s.]{14}$/';
$areaValid = '/^[^@+=|><\]\[{}]+$/';

// verifier champs un par un 
// tester la presence du clic sur le bouton submit avec la fonction isset ( envoyer ou validation du formulaire)
if (isset($_POST['submit'])) { //instruction si le formulaire est envoyé

  // vérification du champ nom   //htmlspecialchars Convertit les caractères html enpeche d etre lu comme du html mais juste comme du text
  if (!empty($_POST['nom'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($textValid, $_POST['nom'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $nom = htmlspecialchars($_POST['nom']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['nom'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['nom'] = 'champs vide, Veuillez renseigner le champs nom';
  }

  // vérification du champ prenom 
  if (!empty($_POST['prenom'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($textValid, $_POST['prenom'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $prenom = htmlspecialchars($_POST['prenom']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['prenom'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['prenom'] = 'champs vide, Veuillez renseigner le champs prenom';
  }

  // verification de cocher le bouton sexe 
  if (empty($_POST['sexe'])) {         // condition si le champs est vide   
    //instruction si le champs est vide
    $formError['sexe'] = 'Veuillez choisir votre sexe';
  } else {
    $sexe = $_POST['sexe'];
  }

  // vérification du champ date de naissnce  
  if (!empty($_POST['ddn'])) {         //instruction si le champs n'est pas vide   
    //if (preg_match($ddnValid, $_POST['ddn'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      if(true){
      $ddn = htmlspecialchars($_POST['ddn']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['ddn'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['ddn'] = 'champs vide, Veuillez renseigner votre date de naissance';
  }

  // vérification du champ code postale 
  if (!empty($_POST['cp'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($cpValid, $_POST['cp'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $cp = htmlspecialchars($_POST['cp']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['cp'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['cp'] = 'champs vide, Veuillez renseigner le code postal';
  }

  // vérification du champ Adresse
  if (!empty($_POST['adresse'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($adresseValid, $_POST['adresse'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $adresse = htmlspecialchars($_POST['adresse']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['adresse'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['adresse'] = 'champs vide, Veuillez renseigner votre adresse';
  }

  // vérification du champ Adresse
  if (!empty($_POST['ville'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($textValid, $_POST['ville'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $ville = htmlspecialchars($_POST['ville']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['ville'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['ville'] = 'champs vide, Veuillez renseigner votre ville';
  }

  // vérification du champ Adresse
  if (!empty($_POST['mail'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($mailValid, $_POST['mail'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $mail = htmlspecialchars($_POST['mail']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['mail'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['mail'] = 'champs vide, Veuillez renseigner email';
  }

  // vérification du champ  tel
  if (!empty($_POST['tel'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($telValid, $_POST['tel'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $tel = htmlspecialchars($_POST['tel']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['tel'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['tel'] = 'champs vide, Veuillez renseigner numero de telephone';
  }

  // vérification du champ commande
  if (empty($_POST['commande'])) {         //instruction si le champs est vide
    $formError['commande'] = 'champs vide, Veuillez faire votre choix';
  } else {
    $com = $_POST['commande'];
  }

  // vérification du champ  tel
  if (!empty($_POST['area'])) {         //instruction si le champs n'est pas vide   
    if (preg_match($areaValid, $_POST['area'])) {  //instruction si la saisie passe la regex avec la fonction perg_match 
      $area = htmlspecialchars($_POST['area']);
    } else {                //instruction si la saisie ne passe pas la regex
      $formError['area'] = 'forme incorrect!!';
    }
  } else {     //instruction si le champs est vide
    $formError['area'] = 'champs vide, Veuillez renseigner numero de telephone';
  }

  if (count($formError) === 0) {
    $req = "INSERT INTO `contact` (cont_nom, cont_prenom, cont_ddn, cont_sexe, cont_adr, cont_ville, cont_cp, cont_mail, cont_tel, cont_com, cont_area, cont_d_ajout) 
                                  VALUES (:nom, :prenom, :ddn, :sexe, :adr, :ville, :cp, :mail, :tel, :com , :area, NOW())";

    $result = $db->prepare($req);
    $result->bindValue(":nom", $nom);
    $result->bindValue(":prenom", $prenom);
    $result->bindValue(":ddn", $ddn);
    $result->bindValue(":sexe", $sexe);
    $result->bindValue(":adr", $adresse);
    $result->bindValue(":ville", $ville);
    $result->bindValue(":cp", $cp);
    $result->bindValue(":mail", $mail);
    $result->bindValue(":tel", $tel);
    $result->bindValue(":com", $com);
    $result->bindValue(":area", $area);

    if($result->execute()){

      header('location:../views/index.php');
    }
    
  }
}
// ici on a pas besoin de verfier si le formulaire est n'est pas envoyer 
// donc le else de la fin est inutile mais laissé juste pour apprentissage ;)
else {   //instruction si le formulaire n\est pas envoyé (pas de click sur le bouton d'envoie)
}
