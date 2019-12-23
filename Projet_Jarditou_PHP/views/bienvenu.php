<?php
require_once "../controllers/connexion_bdd.php";
$db = connexionBase();
$login = $_GET['login'];
$select = "SELECT * FROM `user` WHERE user_login = :login";
$result = $db->prepare($select);
$result->bindValue(':login', $login);
if ($result->execute()) {
    $user = $result->fetchObject();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/connexion.css">

    <title>bienvenu</title>
</head>

<body>
    <div class="container">
        <!--largeur par défaut de 980px sur PC(centrage)sur pc-->
        <section class="center">
            <header>
                <h1 class=""> MERCI POUR VOTRE INSCRIPTION !</h1>
                <img class="responsive-img" width="300" height="100" id="logo" src="../assets/images/jarditou_logo.jpg" alt="jarditou_logo" title="logo-jarditou">
            </header>
            <div>
                <p class="text-success font-weight-bold"><?= 'Bonjour ' . $user->user_nom . '  ' . $user->user_prenom . ', bienvenu parmis nous' ?> </p>
            </div>
            <div>
                <a href="formulaire_connexion.php"><button class="waves-effect waves-light btn">Aller sur le site !</button> </a>
            </div>
        </section>
    </div>
</body>

</html>