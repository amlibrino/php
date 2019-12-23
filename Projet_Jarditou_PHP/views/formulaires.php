<?php
/* ici j'ai fait inclusion d'un entete et bas de page ( include())
*avant tout : ne jamais inclure avant de mettre les controles ou des liens qui contiennent des rederections des header,
*mettre la variable titre avant d'inclure l'entete (important)
*entrer le code php*/
require_once "../controllers/controllers_formulaire.php"; // controleur du formulaire 
$titre = 'formulaire jarditou'; // titre de la page <title>... </title>
include('entete.php'); //inclusion de l'entete de la page avec la fonction include en php-->
?>

<hr><!-- division horizontale-->
<h2>* Ces zones sont obligatoires</h2>
<form action="#" method="POST">
    <!--recuperer les information saisie dans le formulaire coté serveur-->
    <div class="form-group">
        <!--rendre le formulaire responsif avec bootstrap-->
        <fieldset class="form-group">
            <legend> Coordonnnées </legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom"> Votre nom*: </label>
                    <input class="form-control" placeholder="saisissez votre nom" type="text" name="nom" id="nom" required>
                    <span id="missNom" value=""><?= isset($formError['nom']) ? $formError['nom'] : '' ?></span></div>
                <div class="form-group col-md-6">
                    <label for="prenom"> Votre prénom*: </label>
                    <input class="form-control" placeholder="saisissez votre prénom" type="text" name="prenom" id="prenom" required >
                    <span id="missPrenom"><?= isset($formError['prenom']) ? $formError['prenom'] : '' ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ddn"> Date de naissance*</label>
                    <input class="form-control" type="date" name="ddn" id="ddn" required> <span id="missDdn"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="sexe"> Sexe* :</label><br>
                    <input type="radio" name="sexe" id="sexe"  value="Feminin" required> Féminin
                    <input type="radio" name="sexe" id="sexe"  value="Masculin" required> Masculin 
                    <span id="missSexe"><?= isset($formError['sexe']) ? $formError['sexe'] : '' ?></span></div>
            </div>
            <div>
                <label for="adresse">Adresse :</label> 
                <input class="form-control" placeholder="saisissez votre adresse" type="text" name="adresse" id="adresse" required>
                <span id="missAdr"><?= isset($formError['adresse']) ? $formError['adresse'] : '' ?></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div><label for="ville">Ville : </label>
                    <input class="form-control" placeholder="saisissez le nom de votre ville" type="text" name="ville" id="ville" required>
                    <span id="missVille"><?= isset($formError['ville']) ? $formError['ville'] : '' ?></span></div>
                </div>
                <div class="form-group col-md-6">
                    <div><label for="cp">Code postal :</label> 
                    <input class="form-control" placeholder="saisissez le code postal" type="text" name="cp" id="cp" maxlength="5" required>
                    <span id="missCp"><?= isset($formError['cp']) ? $formError['cp'] : '' ?></span></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mail"> Email* : </label> 
                    <input class="form-control" type="mail" name="mail" id="mail" placeholder="deve.loper@afpa.fr" required>
                    <span id="missMail"></span><?= isset($formError['mail']) ? $formError['mail'] : '' ?></div>
                <div class="form-group col-md-6">
                    <label for="tel"> Telephone *:</label><input class="form-control" type="tel" name="tel" id="tel" required>
                    <span id="missTel"><?= isset($formError['tel']) ? $formError['tel'] : '' ?></span>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <legend> Votre demande </legend>
            <div class="form-row align-items-center">
                <label for="demande"> Sujet * : </label>
                <select class="custom-select my-1 mr-sm-2" name="commande" size="1" id="select" required>
                    <option value="" selected disabled> Selectionnez votre choix</option>
                    <option value="Mes demandes"> Mes demandes </option>
                    <option value="Question sur un produit"> Question sur un produit </option>
                    <option value="Réclamation"> Reclamation</option>
                    <option value="Autres"> Autres</option>
                </select>
            </div>
            <div>
                <label for="area"> Votre question* : </label> <textarea class="form-control" name="area" id="area" cols="30" rows="3" required ></textarea> 
                <span id="missArea"><?= isset($formError['area']) ? $formError['area'] : '' ?></span>
            </div>
        </fieldset>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="check" required>
            <label for="check" class="custom-control-label">J'accepte le traitement informatique de ce formulaire. </label>
            <span id="missCheck"></span>
        </div>
        <input type="submit" class="btn-lg btn-info" name="submit" value="Envoyer" id="envoyer">
        <input type="reset" class="btn-lg btn-danger" value="annuler">
    </div>
</form>
<hr>

<!-- inclusion du bas_de_page la fonction include en php (dans un fichier externe-->
<?php include('bas_de_page.php'); ?>

<script src="../assets/js/formulaire_jarditou.js"></script>
<!--liens le fichier javascript controle du formulaire -->


</body>

</html>