<?php
require_once '../controllers/controller_form_modif.php'; // controleur du formulaire d'ajout de produits
$titre = 'tableau_de_modification';
include('entete.php'); //inclusion de l'entete de la page avec la fonction include en php-->

$pro_id = $_GET["pro_id"];
$requete = "SELECT * FROM produits WHERE pro_id=" . $pro_id;

$result = $db->query($requete);

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();

?>
<hr><!-- division horizontale-->

<form action="#" method="POST" enctype="multipart/form-data">
    <!--recuperer les information saisie dans le formulaire coté serveur-->
    <div class="form-group">
        <!--rendre le formulaire responsif avec bootstrap-->
        <fieldset>
            <legend> formulaire de modification </legend>
            <div>
                <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $produit->pro_id; ?>"></div>
            <div>
                <label for="pro_ref"> Référence : </label>
                <input class="form-control" type="text" name="pro_ref" id="pro_ref" value="<?php echo $produit->pro_ref; ?>"><span class="text-danger"><?= (isset($formError['pro_ref'])) ? $formError['pro_ref'] : '' ?></span>
            </div>
            <div>
                <?php
                $choixCat = 'SELECT  cat_id, cat_nom FROM `categories`';
                $result = $db->query($choixCat);
                // Renvoi de l'enregistrement sous forme d'un objet
                ?>
                <div class="form-row align-items-center">
                <label for="pro_cat_id"> Catégorie : </label>
                <select class="custom-select my-1 mr-sm-2" id="pro_cat_id" name="pro_cat_id" class="">
                    <?php
                    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <option value="<?= $row->cat_id ?>"><?= $row->cat_nom ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
            </div>
            <div>
                <label for="pro_libelle"> Libellé : </label>
                <input class="form-control" type="text" name="pro_libelle" id="pro_libelle" class="" value="<?php echo $produit->pro_libelle; ?>">
                <span class="text-danger"><?= (isset($formError['pro_libelle'])) ? $formError['pro_libelle'] : '' ?></span>
            </div>
            <div>
                <label for="pro_description"> Description : </label>
                <textarea class="form-control" name="pro_description" id="pro_description" class="" cols="30" rows="5"><?php echo $produit->pro_description; ?></textarea>
                <span class="text-danger"><?= (isset($formError['pro_description'])) ? $formError['pro_description'] : '' ?></span>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pro_prix"> Prix </label>
                    <input class="form-control" type="number" id="pro_prix" name="pro_prix" class="" min="0" max="9999.99" step="0.01" value="<?php echo $produit->pro_prix; ?>">
                    <span class="text-danger"><?= (isset($formError['pro_prix'])) ? $formError['pro_prix'] : '' ?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="pro_stock"> Stock : </label>
                    <input class="form-control" type="number" id="pro_stock" name="pro_stock" class="" min="0" max="9999.99" value="<?php echo $produit->pro_stock; ?>">
                    <span class="text-danger"><?= (isset($formError['pro_stock'])) ? $formError['pro_stock'] : '' ?></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="pro_couleur"> Couleur : </label>
                    <input class="form-control" type="text" id="pro_couleur" name="pro_couleur" class="" value="<?php echo $produit->pro_couleur; ?>">
                    <span class="text-danger"><?= (isset($formError['pro_couleur'])) ? $formError['pro_couleur'] : '' ?></span>
                </div>
            </div>
            <div>
                <label for="photo"> photo : </label>
                <img src="../assets/images/jarditou_photos/<?= $produit->pro_id . '.' . $produit->pro_photo; ?>" alt="Image de <?= $produit->pro_libelle; ?>">
            </div>
            <div>
                <label for="photo"> Image du produit : </label>
                <input type="file" name="pro_photo" id="pro_photo" ><span class="text-danger"><?= (isset($formError['photo'])) ? $formError['photo'] : '' ?></span>
            </div>
            <div>
                <label for="pro_bloque"> Produit bloqué :</label>
                <input type="checkbox" name="pro_bloque" id="pro_bloque" class="" value="1" <?php if ($produit->pro_bloque != null) {
                                                                                                echo 'checked';
                                                                                            } ?>> Oui
                <input type="checkbox" name="pro_bloque" id="pro_bloque" class="" value="0" <?php if ($produit->pro_bloque == null) {
                                                                                                echo 'checked';
                                                                                            } ?>> Non
            </div>
        </fieldset>
        <input type="submit" class="btn-lg btn-info" name="submit" value="Confirmer" id="envoyer">
        <input type="reset" class="btn-lg btn-danger" value="Annuler">

    </div>
</form>
<hr>

<!-- inclusion du bas_de_page la fonction include en php (dans un fichier externe-->
<?php include('bas_de_page.php'); ?>

<!--<script src="../assets/js/formulaire_jarditou.js"></script> liens le fichier javascript controle du formulaire -->

</body>

</html>