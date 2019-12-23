<?php

require_once "../controllers/controls_connexion.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/connexion.css">

    <title>form_connexion</title>
</head>

<body>
    <div class="container">
        <!--largeur par défaut de 980px sur PC(centrage)sur pc-->
        <header>

            <img width="300" height="100" id="logo" src="../assets/images/jarditou_logo.jpg" alt="jarditou_logo" title="logo-jarditou">
        </header>

        <form action="#" method="POST">
            <div class="form-group">
                <fieldset>
                    <legend class="card-title text-center">Connexion</legend>
                    <div class="text-danger"><?= isset($err['unkown']) ? $err['unkown'] : ''?> </div>
                    <div class="form-label-group offset-xl-4">
                        <label for="login">Identifiant :</label>
                        <input class="form-control col-xl-6 col-sm-12" type="text" name="login" id="login" placeholder="Votre identifiant">
                        <span class="text-warning"><?= isset($err['login']) ? $err['login'] : '' ?></span>
                    </div>
                    <div class="form-label-group offset-xl-4">
                        <label for="password"> Saisissez votre mot de passe :</label>
                        <input class="form-control col-xl-6 col-sm-12" type="password" name="password" id="password" placeholder="Votre mot de passe">
                        <span class="text-warning"><?= isset($err['password']) ? $err['password'] : '' ?></span>
                    </div>
                </fieldset>
                <div class="offset-xl-4">
                    <input class="btn btn-lg btn-block btn-success text-uppercase col-xl-6 col-sm-12" type="submit" id="connexion" name="connexion" value="Connexion">
                </div>
            </div>
        </form>
        <div class="offset-xl-4">
            <a href="create_user_form.php" title="creer un compte"><button class="btn btn-lg btn-block btn-primary text-uppercase col-xl-6 col-sm-12">Créer un compte </button></a>
            <a href="create_user_form.php"><button class="btn btn-lg btn-block btn-danger text-uppercase col-xl-6 col-sm-12"><i></i> Mot de passe oublié </button></a>
            <a href="index.php"><button class="btn btn-lg btn-block btn-warning text-uppercase col-xl-6 col-sm-12"><i></i> Retour au site </button></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
