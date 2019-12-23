<?php
require_once "../controllers/control_create_user.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="../assets/css/connexion.css">
    <title>creer des utilisateurs</title>
</head>

<body>
    <div class="container">


        <form action="#" method="POST" class="well form-horizontal">
            <fieldset>
                <div class="form-group">
                    <legend class="card-title text-center">Formulaire d'inscription </legend>
                    <div>
                        <label for="login"> Login :</label>
                        <input class="form-control" type="text" name="login" id="login" placeholder="Choisissez votre login">
                        <span class="text-warning"><?= isset($msgErr['login']) ? $msgErr['login'] : '' ?></span>
                    </div>
                    <div>
                        <label for="login">Email :</label>
                        <input class="form-control" type="mail" name="mail" id="mail" placeholder="Votre Email">
                        <span class="text-warning"><?= isset($msgErr['mail']) ? $msgErr['mail'] : '' ?></span>
                    </div>
                    <div>
                        <label for="login">Nom :</label>
                        <input class="form-control" type="text" name="nom" id="nom" placeholder="Votre nom">
                        <span class="text-warning"><?= isset($msgErr['nom']) ? $msgErr['nom'] : '' ?></span>
                    </div>
                    <div>
                        <label for="login">prenom :</label>
                        <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Votre prenom">
                        <span class="text-warning"><?= isset($msgErr['prenom']) ? $msgErr['prenom'] : '' ?></span>
                    </div>
                    <div>
                        <label for="password1"> Saisissez votre mot de passe :</label>
                        <input class="form-control" type="password" name="password1" id="password1" placeholder="Votre mot de passe">
                        <span class="text-warning"><?= isset($msgErr['password']) ? $msgErr['password'] : '' ?></span>
                    </div>
                    <div>
                        <label for="password2">Confirmer votre mot de passe :</label>
                        <input class="form-control" type="password" name="password2" id="password2" placeholder="Votre mot de passe">
                        <span class="text-warning"><?= isset($msgErr['password']) ? $msgErr['password'] : '' ?></span>
                    </div>
                    <div>
                        <input class="btn-lg btn-info col-xl-6 col-sm-12" type="submit" id="create" name="create" value="Inscription">
                    </div>
                    <div>
                        <input class="btn-lg btn-warning col-xl-6 col-sm-12" type="reset" id="annule" name="annule" value="  Annuler  ">
                    </div>
                </div>
            </fieldset>

        </form>
        <div>
            <a href="liste.php" title="retour au site"><button class="btn-lg btn-success col-xl-6 col-sm-12">Retour au site </button></a>
        </div>
    </div>
    <!--scripte nécéssaire a bootstrap    mis en bas de page -->
    <!-- fichiers javascript nécessaire a bootstrap  avant la fermeture body-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>