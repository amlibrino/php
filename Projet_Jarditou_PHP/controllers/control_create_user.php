<?php

require_once "connexion_bdd.php";
$db= connexionBase();

//tableau d erreur
$msgErr = array();

//regex
$reglog = '/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/';
$regMail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/';
$regPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';
$regNom = '/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/';
/*
$requete = $db->query('SELECT * FROM `user`');
$result = $requete->fetchObject();
*/
if(isset($_POST['create'])){

    if(!empty($_POST['login'])){
        if(preg_match($reglog, $_POST['login'])){
            $requete=$db->prepare('SELECT * FROM `user` WHERE `user_login`=:login');
            $requete->bindValue(':login', $_POST['login']);
            $requete->execute();
            //if($_POST['mail'] != $result->user_mail){
            if($requete->rowCount()===0){ // pour verifier si la ligne (mail par exemple) existe deja 
                $login = $_POST['login'];
            }else{
                $msgErr['login'] = "nom d'utilisateur existe déjà";
            }
        }else{
            $msgErr['mail'] = "login invalide";
        }
    }else{
        $msgErr['mail'] = "login non renseigné";
    }
    
    if(!empty($_POST['mail'])){
        if(preg_match($regMail, $_POST['mail'])){
            $requete=$db->prepare('SELECT * FROM `user` WHERE `user_mail`=:mail');
            $requete->bindValue(':mail', $_POST['mail']);
            $requete->execute();
            //if($_POST['mail'] != $result->user_mail){
            if($requete->rowCount()===0){ // pour verifier si la ligne (mail par exemple) existe deja 
                $mail = $_POST['mail'];
            }else{
                $msgErr['mail'] = "Cet email existe déjà";
            }
        }else{
            $msgErr['mail'] = "Adresse mail invalide";
        }
    }else{
        $msgErr['mail'] = "Mail non renseigné";
    }
    if(!empty($_POST['nom'])){
        if (preg_match($regNom, $_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
        } else {
            $msgErr['nom'] = 'forme incorrect!!';
        }
    } else {     //instruction si le champs est vide
        $msgErr['nom'] = 'champs vide, Veuillez renseigner votre nom.';
    }
    if(!empty($_POST['prenom'])){
        if (preg_match($regNom, $_POST['prenom'])) {
            $prenom = htmlspecialchars($_POST['prenom']);
        } else {
            $msgErr['prenom'] = 'forme incorrect!!';
        }
    } else {     //instruction si le champs est vide
        $msgErr['prenom'] = 'champs vide, Veuillez renseigner votre prenom.';
    }
    // verification du mot de passe
    if (!empty($_POST['password1'])) {   //si pas vide
        if($_POST['password1']===$_POST['password2']){  //si mdpass1=motpass2
        if (preg_match($regPassword, $_POST['password1'])) { //si mot de passe respect la regex
            $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
        } else {
            $msgErr['password'] = 'Renseignez un mot de passe valide!';
        }
    }else{
        $msgErr['password']='Le mot de passe n\'est pas identique';
    }
    } else {
        $msgErr['password'] = 'Renseignez un mot de passe!';
    }
    if(count($msgErr)===0){
        $req = "INSERT INTO `user` (user_login, user_mail, user_nom, user_prenom, user_password) VALUES (:login, :mail, :nom, :prenom, :password)";
        
        $result = $db->prepare($req);
        $result->bindValue(":login", $login);
        $result->bindValue(":mail", $mail);
        $result->bindValue(":nom", $nom);
        $result->bindValue(":prenom", $prenom);
        $result->bindValue(":password", $password);
        
    
        if($result->execute()){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            header('location:../views/bienvenu.php?login='.$_SESSION['login']);
        }else {
            $msgErr["exec"] = "Erreur le traitement avec la base de données à échoué ";
        }
    }
}

