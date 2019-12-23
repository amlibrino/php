<?php
if(!isset($_SESSION['login'])){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--width=device-width : fixe la largeur de la fenêtre = celle de l'appareil-->
    <!--initial-scale=1.0 : niveau de zoom initial (ici échelle = 1, soit 100%)-->
    <!--shrink-to-fit=no : règle un bug spécifique du navigateur Apple Safari mobile IOS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- pour integrer la feuille de style css de bootstrap ici directement sur le site internet de bootstrap -->

    <link rel="stylesheet" href="../assets/css/mediaquerie.css">
    <!--liens vers le fichier css index-->
    <link rel="stylesheet" href="../assets/css/index.css.css">
    <!--liens vers le fichier css index-->
    <link rel="stylesheet" href="../assets/css/formulairecss.css">
    <!--liens vers le fichier css formulaire-->
    <link rel="stylesheet" href="../assets/css/tableaucss.css">
    <!--liens vers le fichier css tableau-->
    <title> <?= $titre ?> </title>
    <!--titre de la page barre  de navigation referencement-->
</head>

<body>
    <div class="container">
        <!--largeur par défaut de 980px sur PC(centrage)sur pc-->
        <header>
            <p class="jardin"> Tout le jardin</p>
            <img width="300" height="100" id="logo" src="../assets/images/jarditou_logo.jpg" alt="jarditou_logo" title="logo-jarditou">
        </header>
        <p class="text-success font-weight-bold"><?= isset($_SESSION['login']) ? 'Bonjour '.$_SESSION['nom'] .'  '.$_SESSION['prenom'].', bon retour parmis nous': '' ?> </p>
        <nav id="navbar" class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">

                    <li><a class="nav-link" href="index.php" title="accueil">Accueil</a></li>
                    <li> <a class="nav-link" href="formulaires.php" title="formulaire">Contact</a></li>
                    <li> <a class="nav-link" href="liste.php" title="liste">Liste des produits</a></li>
                    <?php
                    if (isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role'] = 'admin') { 
                        ?>
                        <li> <a class="nav-link" href="produits_ajout.php" title="liste">Ajouter un produits</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
            <?php
            if(isset($_SESSION['login'])){
            ?>
            <div><a href="../controllers/deconnexion.php" title="deconnexion">Déconnexion</a></div>
            <?php
            }else{
                ?>
                <div><a href="formulaire_connexion.php" title="connexion">Connexion</a></div>
                <?php
            }
            ?>
        </nav>
        <br>
        <img class="lames" src="../assets/images/promotion.jpg" alt="promotion sur les lames de terrasse" title="promotion sur les lames de terrasse">