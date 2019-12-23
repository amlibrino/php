<?php
/* ici j'ai fait inclusion d'un entete et bas de page ( include())
*avant tout : ne jamais inclure avant de mettre les controles ou des liens qui contiennent des rederections des header,
*mettre la variable titre avant d'inclure l'entete (important)
*entrer le code php*/
require_once '../controllers/controller_form_ajout.php'; // controleur du formulaire d'ajout de produits
require_once '../controllers/connexion_bdd.php'; // pour faire une requette et selectionner les catégorie
$titre = 'tableau_d\'ajout';
include('entete.php'); //inclusion de l'entete de la page avec la fonction include en php-->
$db = connexionBase(); // Appel de la fonction de connexion


?>
<hr><!-- division horizontale-->
<h1><?= (isset($formError["exec"])) ? $formError["exec"] : "" ?></h1> <!-- pour afficher l 'erreur de connexion sur la base si existe-->
<form action="#" method="POST" enctype="multipart/form-data">
    <!--recuperer les information saisie dans le formulaire coté serveur-->
    <div class="form-group">
        <!--rendre le formulaire responsif avec bootstrap-->
        <fieldset>
            <legend> formulaire d'ajout de produits </legend>

            <div>
                <?php
                $choixCat = 'SELECT * FROM `categories`';
                $result = $db->query($choixCat);
                // Renvoi de l'enregistrement sous forme d'un objet
                ?>
                <div class="form-row align-items-center">
                    <!--bootstrap-->
                    <label for="pro_cat_id"> Catégorie : </label>
                    <select class="custom-select my-1 mr-sm-2" name="pro_cat_id">
                        <?php
                        while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <option value="<?= $row->cat_id ?> "><?= $row->cat_nom ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span><?= (isset($formError['pro_cat_id'])) ? $formError['pro_cat_id'] : '' ?></span>
                </div>
            </div>
            <div>
                <label for="pro_ref"> Référence : </label>
                <input class="form-control" type="text" name="pro_ref" id="pro_ref" <?= (isset($_POST['pro_ref'])) ? ' value="' . $_POST['pro_ref'] . '"' : '' ?>>
                <span class="text-danger"><?= (isset($formError['pro_ref'])) ? $formError['pro_ref'] : '' ?></span>
            </div>
            <div>
                <label for="pro_libelle"> Libellé : </label>
                <input class="form-control" type="text" name="pro_libelle" id="pro_libelle" <?= (isset($_POST['pro_libelle'])) ? ' value="' . $_POST['pro_libelle'] . '"' : '' ?>>
                <span class="text-danger"><?= (isset($formError['pro_libelle'])) ? $formError['pro_libelle'] : '' ?></span>
            </div>
            <div><label for="pro_description"> Description du produit : </label> <textarea class="form-control" name="pro_description" id="pro_description" cols="30" rows="3" <?= (isset($_POST['pro_description'])) ? ' value="' . $_POST['pro_description'] . '"' : '' ?>>
                    </textarea> <span class="text-danger"><?= (isset($formError['pro_description'])) ? $formError['pro_description'] : '' ?></span>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6"><label for="pro_prix"> Prix </label> <input class="form-control" type="number" id="pro_prix" name="pro_prix" min="0" max="9999.99" step="0.01" <?= (isset($_POST['pro_prix'])) ? ' value="' . $_POST['pro_prix'] . '"' : '' ?>>
                    <span class="text-danger"><?= (isset($formError['pro_prix'])) ? $formError['pro_prix'] : '' ?></span></div>
                <div class="form-group col-md-6"><label for="pro_stock"> Stock : </label> <input class="form-control" type="number" id="pro_stock" name="pro_stock" min="0" max="9999.99" <?= (isset($_POST['pro_libelle'])) ? ' value="' . $_POST['pro_libelle'] . '"' : '' ?>>
                    <span class="text-danger"><?= (isset($formError['pro_stock'])) ? $formError['pro_stock'] : '' ?></span></div>
            </div>
            <div><label for="pro_couleur"> Couleur : </label> <input class="form-control" type="text" id="pro_couleur" name="pro_couleur" value="" <?= (isset($_POST['pro_libelle'])) ? ' value="' . $_POST['pro_libelle'] . '"' : '' ?>>
                <span class="text-danger"><?= (isset($formError['pro_couleur'])) ? $formError['pro_couleur'] : '' ?></span></div>
            <div>
                <label for="image"> Image du produit : </label>
                <input class="form-control-file" type="file" name="pro_photo" id="image"><span class="text-danger"><?= (isset($formError['photo'])) ? $formError['photo'] : '' ?></span>
            </div>
            <div><label for="pro_bloque"> Produit bloqué :</label>
                <input type="checkbox" id="pro_bloque" name="pro_bloque" value="1">
                <span class="text-danger"><?= (isset($formError['pro_bloque'])) ? $formError['pro_bloque'] : '' ?></span></div>
        </fieldset>
        <input type="submit" class="btn btn-info" name="add" value="Ajouter" id="envoyer">
        <input type="reset" class="btn btn-danger" value="annuler">

    </div>
</form>

<hr>

<!-- inclusion du bas_de_page la fonction include en php (dans un fichier externe-->
<?php include('bas_de_page.php'); ?>

<!--<script src="../assets/js/formulaire_jarditou.js"></script> liens le fichier javascript controle du formulaire -->

</body>

</html>