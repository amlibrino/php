 <?php
    $titre = 'detail_produit'; // titre de la page <title>... </title>
    include('entete.php'); //inclusion de l'entete de la page avec la fonction include en php-->

    require "../controllers/connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions

    $db = connexionBase(); // Appel de la fonction de connexion
    $pro_id = $_GET["pro_id"];
    $requete = "SELECT * FROM produits, categories WHERE pro_id=" . $pro_id;

    $result = $db->query($requete);

    // Renvoi de l'enregistrement sous forme d'un objet
    $produit = $result->fetch(PDO::FETCH_OBJ);
    $result->closeCursor()
    ?>
 <hr><!-- division horizontale-->

 <main class="teal lighten-4">
     <div class="container white z-depth-1">
         <h1 class="center teal-text text-darken-4"><?= $produit->pro_libelle ?></h1>

         <div class="row">
             <div class="col s12 l6">
                 <h5> photo : </h5>
                 <img src="../assets/images/jarditou_photos/<?= $produit->pro_id . '.' . $produit->pro_photo; ?>" alt="Image de <?= $produit->pro_libelle; ?>">
             </div>
             <div class="col s12 l6 z-depth-2">
                 <blockquote>
                     <h4>Description:</h4>
                     <p><strong>Ref: </strong><?= $produit->pro_ref ?></p>
                     <p><b> Catégorie : <?php echo $produit->cat_nom; ?></b></p>
                     <p><?= $produit->pro_description ?></p>
                     <p><b> Date d'ajout : </b><?php echo $produit->pro_d_ajout; ?></p>
                     <p> <b> de modification : </b><?php if (($produit->pro_d_modif) == NULL) {
                                                        echo "le produit n'as pas été modifié.";
                                                    } else {
                                                        echo $produit->pro_d_modif;
                                                    } ?> </p>
                     <hr>
                     <strong>Prix: </strong><?= $produit->pro_prix ?> €
                 </blockquote>
             </div>
         </div>

     </div>

 </main>

 <div>
 <?php
    // si ya connexion ($_SESSION['login'] et session role et que le role est admin donc on affiche les boutton)
if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role']='admin' ){ 
    ?>
    <button class="btn-lg btn-info" name="modifier" id="modif">Modifier</button>
    <button class="btn-lg btn-danger" name="supp " id="supp">Supprimer</button>
<?php
}
?>
     <button class="btn-lg btn-success" name="retour" id="retour">Retour à la liste</button>
 </div>
 <hr>
 <!-- inclusion du bas_de_page la fonction include en php (dans un fichier externe-->
 <?php include('bas_de_page.php'); ?>
 </body>

 </html>